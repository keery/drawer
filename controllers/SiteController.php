<?php
namespace Controllers;

use Module\View\View;
use Module\Entity\Article;
use Module\Entity\Contact;
use Module\Entity\Commentaire;
use Module\Entity\User;
use Module\Erreur\Erreur;
use Module\Form\FormBuilder;
use Module\Entity\Form\CommentaireForm;
use Module\Entity\Form\ContactForm;

class SiteController {
	
	public function indexAction()
	{
		View::render("frontend/site.view.php", "layout-site.php");
	}

	public function articlesAction()
	{
		$data['articles'] = Article::all();
		View::render("frontend/oeuvre.view.php", "layout-site.php", $data);
	}

	public function articleDetailAction($request)
	{
		if(isset($request['id'])) {
			if($data['article'] = Article::findOneBy(['id' => $request['id']])) {
				if(isGranted(ROLE_UTILISATEUR)) {
					$commentaire = new Commentaire();
					$fb = new FormBuilder();
					$form = $fb->create(new CommentaireForm(), $commentaire);
					$form->setAction(path('commentaire_add', ['id' => $request['id']]));

					$data['form'] = $form->createView();
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
							$link = path("commentaire_edit", ['id' => $request['id']]);
							sendMail($destinataires, PROJECT_NAME." - Nouveau commentaire", 'Bonjour,<br>Un nouveau commentaire a été ajouté par '.$_SESSION[PREFIX."user"]['prenom'].' '.$_SESSION[PREFIX."user"]['nom'].', vous pouvez accepter ou refuser ce message en vous rendant sur '.$link.".");
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

	public function contactAction()
	{
		$fb = new FormBuilder();
		$form = $fb->create(new ContactForm());
		$form->setAction(path('send_contact'));
		$data['form'] = $form->createView();
		View::render("frontend/contact.view.php", "layout-site.php", $data);
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