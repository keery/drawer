<?php
namespace Controllers;

use Module\Entity\Commentaire;
use Module\Entity\Image;
use Module\View\View;
use Module\Erreur\Erreur;

use Module\Form\FormBuilder;
use Module\Entity\Form\CommentaireForm;

class CommentaireController {
	public function commentairesAction()
	{
		if(isset($_GET['sort']) && in_array($_GET['sort'], ['active', 'unactive'])) {
			$data['commentaires'] = Commentaire::find(['active' => ($_GET['sort'] === 'active' ? 1 : 0)]);
		}
		else $data['commentaires'] = Commentaire::all();
		
		
		View::render("backend/commentaires-list.view.php", 'layout.php', $data);
	}

	public function editCommentaireAction($params)
	{

		if(isset($params['id'])) $commentaire = Commentaire::findOneBy(array('id' => $params['id']));
		else $commentaire = new Commentaire();

		$data['titre'] = (!empty($commentaire->getTitre()) ? $commentaire->getTitre() : "Ajout d'un nouveau commentaire" );

		if(empty($commentaire)) {
			throw new Erreur("Le commentaire contenant l'id ".$params['id']." n'existe pas");
			return false;
		}
		
		$fb = new FormBuilder();
		$form = $fb->create(new CommentaireForm(), $commentaire);
		
		if(request_is("POST")) {
			$commentaire = $form->handleRequest($_POST);
			if($form->validate()) {
				$id = $commentaire->save();
				addNotif('Commentaire bien enregistré', 'valid');
				redirectToRoute('commentaires');
			}
			else addNotif($form->getErrors(), 'error');
		}

		$data['form'] = $form->createView();
		View::render("backend/commentaire-detail.view.php", 'layout.php', $data);
	}

}