<?php
namespace Controllers;

use Module\Entity\Article;
use Module\View\View;
use Module\Erreur\Erreur;

use Module\Form\FormBuilder;
use Module\Entity\Form\ArticleForm;

class ArticleController {
	public function articlesAction()
	{
		if(isset($_GET['sort']) && in_array($_GET['sort'], ['active', 'unactive'])) {
			$data['articles'] = Article::find(['active' => ($_GET['sort'] === 'active' ? 1 : 0)]);
		}
		else $data['articles'] = Article::all();
		
		
		View::render("backend/articles-list.view.php", 'layout.php', $data);
	}

	public function editArticleAction($params)
	{

		if(isset($params['id'])) $article = Article::findOneBy(array('id' => $params['id']));
		else $article = new Article();

		$data['titre'] = (!empty($article->getTitre()) ? $article->getTitre() : "Ajout d'un nouvel article" );

		if(empty($article)) {
			throw new Erreur("L'article contenant l'id ".$params['id']." n'existe pas");
			return false;
		}
		
		$fb = new FormBuilder();
		$form = $fb->create(new ArticleForm(), $article);

		if(request_is("POST")) {
			$article = $form->handleRequest($_POST);
			if($form->validate())  {
				$article->save();
				addNotif('Article bien enregistré', 'valid');
				redirectToRoute('articles');
			}
			else addNotif($form->getErrors(), 'error');
		}
		// var_dump($_SERVER);
		$data['form'] = $form->createView();
		View::render("backend/article-detail.view.php", 'layout.php', $data);
	}

}