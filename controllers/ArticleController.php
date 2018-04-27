<?php
namespace Controllers;

use Module\Entity\Article;
use Module\View\View;
use Module\Erreur\Erreur;

use Module\Form\FormBuilder;
use Module\Entity\Form\ArticleForm;

class ArticleController {
	

	public function editArticleAction($params)
	{
		if(isset($params['id'])) $article = Article::findOneBy(array('id' => $params['id']));
		else $article = new Article();

		if(empty($article)) {
			throw new Erreur("L'article contenant l'id ".$params['id']." n'existe pas");
			return false;
		}

		$fb = new FormBuilder();
		$form = $fb->create(new ArticleForm(), $article);
		$form->render();

		
        // var_dump($params['id']);
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

		// View::render("backend/article-detail.view.php");
	}

}