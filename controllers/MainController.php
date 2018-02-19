<?php
namespace Controllers;

use Module\View\View;

class MainController {
	
	public function indexAction()
	{
		View::render("dashboard.view.php");
	}

	public function articlesAction()
	{
		View::render("articles-list.view.php");
	}

	public function editArticleAction()
	{
		View::render("article-detail.view.php");
	}

	public function pagesAction()
	{
		View::render("pages-list.view.php");
	}

	public function editPageAction()
	{
		View::render("page-detail.view.php");
	}

	public function parametresAction()
	{
		View::render("parametres.view.php");
	}	
}