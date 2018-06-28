<?php
namespace Controllers;

use Module\View\View;
use Module\Entity\Article;
use Module\Erreur\Erreur;

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
				View::render("frontend/oeuvre-detail.view.php", "layout-site.php", $data);
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