<?php
namespace Controllers;

use Module\View\View;
use Module\Entity\Article;
use Module\Entity\Commentaire;
use Module\Entity\User;
use Module\Erreur\Erreur;
use Module\Form\FormBuilder;
use Module\Entity\Form\CommentaireForm;

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
		View::render("frontend/contact.view.php", "layout-site.php");
	}
}