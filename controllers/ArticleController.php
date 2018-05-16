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
		
		if(request_is("POST")) {
			$form->handleRequest();
		}

		$data['form'] = $form->createView();
		View::render("backend/article-detail.view.php", 'layout.php', $data);
	}

}