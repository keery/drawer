<?php
namespace Controllers;

use Module\Entity\Article;
use Module\Entity\Categorie;
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
		$article = new Article();
		$article->setId(3);
		$article->setTitre("Mon deuxieme dessin");
		$article->setDescription("Lorem ipsum");
		Article::all();

		$cat = new Categorie();
		$cat->setNom("Ma categ numero 2");

		$article->setCategorie($cat);
		
		$article->delete();

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