<?php
namespace Controllers;

use Module\Entity\Article;
use Module\Entity\Parametre;
use Module\Entity\Commentaire;
use Module\Entity\Categorie;
use Module\Entity\RelUserArticle;
use Module\Entity\User;
use Module\View\View;
use Module\Erreur\Erreur;
use Module\Entity\Form\ParametreForm;
use Module\Form\FormBuilder;

class MainController {
	
	public function indexAction()
	{
		//Nombre d'article
		$data['nbarticles'] = 0;
		if($nbarts = Article::all()) $data['nbarticles'] = sizeof($nbarts);

		$data['articles'] = Article::find(null, ['*'], null, 5);
		$data['commentaires'] = Commentaire::find(null, ['*'], null, 5);
		
		$totalVote = 0;
		if($nbLike = RelUserArticle::all()) $totalVote = sizeof($nbLike);

		$data['like'] = 0;
		if($nbLike = RelUserArticle::find(['vote' => 'like'])) $data['like'] = percent(sizeof($nbLike), $totalVote);

		$data['dislike'] = 0;
		if($nbLike = RelUserArticle::find(['vote' => 'dislike'])) $data['dislike'] = percent(sizeof($nbLike), $totalVote);

		$totalComm = 0;
		if($nbComm = Commentaire::all()) $totalComm = sizeof($nbComm);

		$data['com_unactive'] = 0;
		if($nbComm = Commentaire::find(['active' => 0])) $data['com_unactive'] = percent(sizeof($nbComm), $totalComm);

		$data['com_active'] = 0;
		if($nbComm = Commentaire::find(['active' => 1])) $data['com_active'] = percent(sizeof($nbComm), $totalComm);

		$totalUser = 0;
		if($nbuser = User::all()) $totalUser = sizeof($nbuser);

		$data['user_active'] = 0;
		if($nbuser = User::find(['banned' => 0])) $data['user_active'] = percent(sizeof($nbuser), $totalUser);

		$data['user_banned'] = 0;
		if($nbuser = User::find(['banned' => 1])) $data['user_banned'] = percent(sizeof($nbuser), $totalUser);

		View::render("backend/dashboard.view.php", "layout.php", $data);
	}

	public function statsAction()
	{
		View::render("backend/statistic.view.php");
	}

	public function editPageAction()
	{
		View::render("backend/page-detail.view.php");
	}

	public function parametresAction()
	{
		if(!$parametre = Parametre::findOneBy(array('id' => 1))) {
			$parametre = new Parametre();
		} 

		$data['titre'] = "Configuration des paramètres";

		
		$fb = new FormBuilder();
		$form = $fb->create(new ParametreForm(), $parametre);
		
		if(request_is("POST")) {
			$parametre = $form->handleRequest($_POST);
			if($form->validate()) {
				$id = $parametre->save();
				addNotif('Paramètres bien enregistré', 'valid');
				redirectToRoute('parametres');
			}
			else addNotif($form->getErrors(), 'error');
		}

		$data['form'] = $form->createView();
		View::render("backend/parametres.view.php", 'layout.php', $data);
	}	

	public function deleteAction($props)
	{
		$id = $props['id'];

		if(!isset($id)) {
			throw new Erreur("Le paramètre id est nécessaire à la suppression");
			return false;
		}
		
		if(!isset($props['entity'])) {
			throw new Erreur("Le paramètre entity est nécessaire à la suppression");
			return false;
		}
		
		$class_name = "\Module\Entity\\".ucfirst($props['entity']);

		if(!class_exists($class_name)) {
			throw new Erreur("La classe ".$class_name." n'éxiste pas [Case sensitive]");
			return false;
		}

		$object = call_user_func($class_name."::findOneBy" , ['id' => $id]);
		if($object) {
			if(method_exists($object, 'getProtected') && $object->getProtected() == "1") {
				throw new Erreur("L'objet de la classe ".$class_name." avec l'id ".$id." ne peut pas être supprimé");
				return false;
			}
		}
		else {
			throw new Erreur("L'objet de la classe ".$class_name." avec l'id ".$id." n'existe pas");
			return false;
		}

		call_user_func($class_name."::delete" , $id);

		addNotif('Suppression réussie', 'valid');
		redirectToRoute(strtolower($props['entity']."s"));		
	}	
}