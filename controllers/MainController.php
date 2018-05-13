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
}