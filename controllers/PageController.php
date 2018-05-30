<?php
namespace Controllers;

use Module\Entity\Page;
use Module\View\View;
use Module\Erreur\Erreur;

use Module\Form\FormBuilder;
use Module\Entity\Form\PageForm;

class PageController {
	public function pagesAction()
	{
		$data['pages'] = Page::all();
		View::render("backend/pages-list.view.php", 'layout.php', $data);
	}

	public function editPageAction($params)
	{
		if(isset($params['id'])) $article = Page::findOneBy(array('id' => $params['id']));
		else $article = new Page();

		if(empty($article)) {
			throw new Erreur("L'article contenant l'id ".$params['id']." n'existe pas");
			return false;
		}
		
		$fb = new FormBuilder();
		$form = $fb->create(new PageForm(), $article);

		if(request_is("POST")) {
			$article = $form->handleRequest($_POST);
			if($form->validate())  {
				$article->save();
				addNotif('Page bien enregistré', 'valid');
				redirectToRoute('pages');
			}
			else addNotif($form->getErrors(), 'error');
		}

        $data['form'] = $form->createView();
		View::render("backend/page-detail.view.php", 'layout.php', $data);
	}

}