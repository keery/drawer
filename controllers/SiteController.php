<?php
namespace Controllers;

use Module\View\View;
use Module\Entity\Article;
use Module\Entity\Contact;
use Module\Entity\Categorie;
use Module\Entity\Page;
use Module\Entity\Commentaire;
use Module\Entity\User;
use Module\Entity\RelUserArticle;
use Module\Erreur\Erreur;
use Module\Form\FormBuilder;
use Module\Entity\Form\CommentaireForm;
use Module\Entity\Form\ContactForm;

class SiteController {
	public function getArbo($pages= [], $idParent = null) {
		if($pageZero = Page::find(['active' => 1, 'id_parent' => $idParent])) {
			foreach ($pageZero as $page) {
				$pages[$page->getId()]['page'] = $page;
				if($childs = Page::find(['active' => 1, 'id_parent' => $page->getId()])) {
					$pages[$page->getId()]['childs'] = $childs;
				}
			}
		}
		return $pages;
	}
	
	public function indexAction()
	{
		if($data['current_page'] = Page::findOneBy(['id' => 1])) {
			$data['arbo'] = $this->getArbo();
			
			$data['last_article'] = null;
			if($articles = Article::all()) {
				$data['last_article'] = array_pop($articles);
			}
			View::render("frontend/site.view.php", "layout-site.php", $data);
		}
	}

	public function contenuAction($request)
	{
		if($page = Page::findOneBy(['url' => $request['url']])) {
			$data['current_page'] = $page;
			View::render("frontend/contenu.view.php", "layout-site.php", $data);
		}
		else redirectToRoute('site');
	}

	public function articlesAction($request)
	{
		if($data['current_page'] = Page::findOneBy(['url' => $request['url']])) {
			if(isset($_POST['filter-cat']) && !empty($_POST['filter-cat'])) {
				$data['articles'] = Article::find(['id_categorie' => $_POST['filter-cat']]);
			}
			else $data['articles'] = Article::all();
			$data['categories'] = Categorie::find(['active' => 1]);		
			View::render("frontend/oeuvre.view.php", "layout-site.php", $data);
		}
		else redirectToRoute('site');
	}

	public function articleDetailAction($request)
	{
		if(isset($request['id'])) {
			$data['idarticle'] = $request['id'];
			if($data['article'] = Article::findOneBy(['id' => $request['id']])) {
				if(isGranted(ROLE_UTILISATEUR)) {
					$data['rel'] = RelUserArticle::findOneBy(['id_article' => $request['id'], 'id_user' => $_SESSION[PREFIX."user"]['id']]);					
					$commentaire = new Commentaire();
					$fb = new FormBuilder();
					$form = $fb->create(new CommentaireForm(), $commentaire);
					$form->setAction(path('commentaire_add', ['id' => $request['id']]));

					$data['form'] = $form->createView();
					
					$data['like'] = 0;
					$data['dislike'] = 0;
					if($rels = RelUserArticle::find(['id_article' => $request['id']])) {
						foreach ($rels as $rel) {
							if($rel->getVote() == "dislike") $data['dislike']++;
							elseif($rel->getVote() == "like") $data['like']++;
						}
					}
				}

				$data['commentaires'] = Commentaire::find(['idarticle' => $request['id'], "active" => 1]);

				View::render("frontend/oeuvre-detail.view.php", "layout-site.php", $data);
			}
			else {
				throw new Erreur("Cet article n'existe pas");
				return false;
			}
		}
		else redirectToRoute('site');
	}

	public function addCommentAction($request) {

		if(isset($request['id'])) {
			if($data['article'] = Article::findOneBy(['id' => $request['id']])) {
				$commentaire = new Commentaire();
				$fb = new FormBuilder();
				$form = $fb->create(new CommentaireForm(), $commentaire);

				if(request_is("POST")) {
					$commentaire = $form->handleRequest($_POST);
					$commentaire->setIdarticle($request['id']);
					$commentaire->setUser( User::findOneby(['id' => $_SESSION[PREFIX."user"]['id']]) );
					if($form->validate()) {
						$commentaire->save();

						$moderateurs = User::find(["role" => ROLE_MODERATEUR]);
						$admins = User::find(["role" => ROLE_ADMINISTRATEUR]);
						$users = array_merge($moderateurs, $admins);

						if(sizeof($users) > 0) {
							$destinataires = [];
							foreach ($users as $user) {
								$destinataires[] = $user->getEmail();
							}
							$link = '<a href="'.URL_SITE.path("commentaire_edit", ['id' => $request['id']]).'">lien</a>';
							sendMail($destinataires, PROJECT_NAME." - Nouveau commentaire", 'Bonjour,<br>Un nouveau commentaire a été ajouté par '.$_SESSION[PREFIX."user"]['prenom'].' '.$_SESSION[PREFIX."user"]['nom'].', vous pouvez accepter ou refuser ce message en vous rendant sur le '.$link.".");
						}
						addNotif('Votre commentaire a bien été ajouté, un administrateur validera son contenu sous peu', 'valid');
					}
					else addNotif($form->getErrors(), 'error');
				}

				redirectToRoute('site_article_detail', ['name' => $data['article']->getTitre(), 'id' => $request['id']]);
			}
			else {
				throw new Erreur("Cet article n'existe pas");
				return false;
			}
		}
		else redirectToRoute('site');
	}

	public function contactAction($request)
	{
		if($data['current_page'] = Page::findOneBy(['url' => $request['url']])) {
			$fb = new FormBuilder();
			$form = $fb->create(new ContactForm());
			$form->setAction(path('send_contact'));
			$data['form'] = $form->createView();
			View::render("frontend/contact.view.php", "layout-site.php", $data);
		}
		else redirectToRoute('site');
	}

	public function sendContactAction()
	{
		$contact = new Contact();
		$fb = new FormBuilder();
		$form = $fb->create(new ContactForm(), $contact);

		if(request_is("POST")) {
			$article = $form->handleRequest($_POST);
			
			if($form->validate()) {
				
				$users = User::find(["role" => ROLE_ADMINISTRATEUR]);

				if(sizeof($users) > 0) {
					$destinataires = [];
					foreach ($users as $user) {
						$destinataires[] = $user->getEmail();
					}

					sendMail($destinataires, PROJECT_NAME." - ".$contact->getTitre(), 'Bonjour,<br>Un nouveau message a été envoyé par '.$contact->getEmail().": <br/>".$contact->getMessage());
				}
				
				addNotif('Votre message a bien été envoyé', 'valid');				
			}
			else addNotif($form->getErrors(), 'error');
		}
		redirectToRoute('contact');
	}
}