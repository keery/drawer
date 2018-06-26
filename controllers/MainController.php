<?php
namespace Controllers;

use Module\Entity\Article;
use Module\Entity\Categorie;
use Module\View\View;

class MainController {
	
	public function indexAction()
	{
		$data['articles'] = Article::find(null, ['*'], null, 5);
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
		View::render("backend/parametres.view.php");
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
		die;
		call_user_func($class_name."::delete" , $id);

		addNotif('Suppression réussie', 'valid');
		redirectToRoute(strtolower($props['entity']."s"));		
	}	
}