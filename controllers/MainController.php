<?php
namespace Controllers;

use Module\View\View;

class MainController {
	
	public function indexAction()
	{
		View::render("main.view.php");
	}

	public function articlesAction()
	{
		View::render("articles-list.view.php");
	}

	public function pagesAction()
	{
		View::render("pages-list.view.php");
	}

	public function parametresAction()
	{
		View::render("parametres.view.php");
	}	
}