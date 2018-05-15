<?php
namespace Controllers;

use Module\Entity\Article;
use Module\Entity\Categorie;
use Module\View\View;

class MainController {
	
	public function indexAction()
	{
		View::render("backend/dashboard.view.php");
	}

	public function articlesAction()
	{
		View::render("backend/articles-list.view.php");
	}

	public function pagesAction()
	{
		View::render("backend/pages-list.view.php");
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
		if(!isset($props['id'])) {
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

		call_user_func($class_name."::delete" , $props['id']);
	}	
}