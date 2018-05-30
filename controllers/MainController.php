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

		call_user_func($class_name."::delete" , $id);

		addNotif('Suppression réussie', 'valid');
		redirectToRoute(strtolower($props['entity']."s"));		
	}	
}