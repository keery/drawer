<?php
namespace Controllers;

use Module\View\View;
use Module\Entity\Article;

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

	// public function articleAction($request)
	// {
	// 	$data['articles'] = Article::all();
	// 	View::render("frontend/oeuvre.view.php", "layout-site.php", $data);
	// }

	public function contactAction()
	{
		View::render("frontend/contact.view.php", "layout-site.php");
	}
}