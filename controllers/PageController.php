<?php
namespace Controllers;

use Module\Entity\Page;
use Module\View\View;
use Module\Erreur\Erreur;
use Module\Sitemap\SeoAnalyzer;
use Module\Form\FormBuilder;
use Module\Entity\Form\PageForm;

class PageController {
	public function pagesAction()
	{
		$data['pages'] = Page::all();
		$data['pages'] = $this->sortPage();
		View::render("backend/pages-list.view.php", 'layout.php', $data);
	}

	public function editPageAction($params)
	{
		if(isset($params['id'])) $page = Page::findOneBy(array('id' => $params['id']));
		else $page = new Page();

		$data['titre'] = (!empty($page->getTitre()) ? $page->getTitre() : "Ajout d'une nouvelle page" );
		

		if(empty($page)) {
			throw new Erreur("La page contenant l'id ".$params['id']." n'existe pas");
			return false;
		}
		$fb = new FormBuilder();				

		if(request_is("POST")) {
			$data_page_form = $data_page = array_shift($_POST);
			$page->fromArray($data_page_form);
			$form = $fb->create(new PageForm($page->getId()), $page);
            $_POST[$data_page['key']] = $data_page;
			$page = $form->handleRequest($_POST);
			$page = $form->handleRequest($_POST);
			if($form->validate())  {
				$page->setUrl(convertToUrl($page->getUrl()));
				$page->save();
				addNotif('Page bien enregistrée', 'valid');
				redirectToRoute('pages');
			}
			else addNotif($form->getErrors(), 'error');
		}
		else $form = $fb->create(new PageForm($page->getId()), $page);

        $data['form'] = $form->createView();
		View::render("backend/page-detail.view.php", 'layout.php', $data);
	}

	public function sortPage($idParent = null, $data = []) {
		$pages = Page::find(['id_parent' => $idParent]);
		foreach($pages as $page) {
			$data[$page->getId()] = [
				'object' => $page,
				'childrens' => $this->sortPage($page->getId())
			];
		}

		return $data;
	}

}