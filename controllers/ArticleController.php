<?php
namespace Controllers;

use Module\Entity\Article;
use Module\Entity\Categorie;
use Module\View\View;

class ArticleController {
	

	public function editArticleAction($params)
	{

        var_dump($params);
		// $article = new Article();
		// $article->setId(1);
		// // $article->setTitre("Mon deuxieme dessin");
		// // $article->setDescription("Lorem ipsum");
		// $article->fromArray(array(
		// 	'titre' => 'Mon 19men dessin',
		// 	'description' => 'Lorem Ipsum
		// ));

		// // $articles = Article::all();

		// $cat = new Categorie();
		// $cat->setNom("Ma categ numero 2");

		// $article->setCategorie($cat);
		
		// $article->save();

		View::render("backend/article-detail.view.php");
	}

}