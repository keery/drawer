<?php
namespace Controllers;

use Module\Entity\Article;
use Module\Entity\Image;
use Module\Entity\Categorie;
use Module\View\View;
use Module\Erreur\Erreur;
use Module\Rss\Rss;
use Module\Form\FormBuilder;
use Module\Entity\Form\ArticleForm;

class ArticleController {
	public function articlesAction()
	{
		if(isset($_GET['sort']) && in_array($_GET['sort'], ['active', 'unactive'])) {
			$data['articles'] = Article::find(['active' => ($_GET['sort'] === 'active' ? 1 : 0)]);
		}
		else $data['articles'] = Article::all();

		$data['categs'] = Categorie::all();
				
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
		
		if(request_is("POST")) {
			$data_article_form = $data_article = array_shift($_POST);
			$article->fromArray($data_article_form);
			$form = $fb->create(new ArticleForm(), $article);
            $_POST[$data_article['key']] = $data_article;
			$article = $form->handleRequest($_POST);
			if($form->validate()) {
				$article->setKeyword(convertToUrl($article->getTitre()));
				$id = $article->save();
				//Boucle uniquement si relation Many to one
				if($article->getImages() !== null) {
					foreach ($article->getImages() as $img) {
						$img->setId_article($id);
						$img->save();
					}
				}
				addNotif('Article bien enregistré', 'valid');
				//Genere le flux RSS	
				$this->generateRssArticle();
				redirectToRoute('articles');
			}
			else addNotif($form->getErrors(), 'error');
		}
		else $form = $fb->create(new ArticleForm(), $article);

		$data['form'] = $form->createView();
		View::render("backend/article-detail.view.php", 'layout.php', $data);
	}

	public function generateRssArticle() {		
		$articles = Article::all();

		if(sizeof($articles) > 0) {
			$rss = new Rss('rss-article.xml');

			foreach ($articles as $article) {
				$articleNode = $rss->addElement('article');
				$rss->addElement('id', $article->getId(), $articleNode);
				$rss->addElement('titre', $article->getTitre(), $articleNode);
				$rss->addElement('description', $article->getDescription(), $articleNode);
				$rss->addElement('auteur', $article->getAuteur(), $articleNode);
				$rss->addElement('creation', $article->getDate_creation(), $articleNode);
				$categorieNode = $rss->addElement('categorie', '', $articleNode);
				$categorie = $article->getCategorie();
				$rss->addElement('id', $categorie->getId(), $categorieNode);
				$rss->addElement('titre', $categorie->getNom(), $categorieNode);
			}

			$rss->generate();
		}
	}
}