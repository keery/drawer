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
		if(isset($params['id'])) $page = Page::findOneBy(array('id' => $params['id']));
		else $page = new Page();

		if(empty($page)) {
			throw new Erreur("La page contenant l'id ".$params['id']." n'existe pas");
			return false;
		}
		$fb = new FormBuilder();		
		$form = $fb->create(new PageForm($page->getId()), $page);

		if(request_is("POST")) {
			$page = $form->handleRequest($_POST);

			if($form->validate())  {
				$page->save();
				addNotif('Page bien enregistré', 'valid');
				redirectToRoute('pages');
			}
			else addNotif($form->getErrors(), 'error');
		}

        $data['form'] = $form->createView();
		View::render("backend/page-detail.view.php", 'layout.php', $data);
	}

}