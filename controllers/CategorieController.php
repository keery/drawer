<?php
namespace Controllers;

use Module\Entity\Categorie;
use Module\View\View;
use Module\Erreur\Erreur;

use Module\Form\FormBuilder;
use Module\Entity\Form\CategorieForm;

class CategorieController {
	public function categoriesAction()
	{
        $data['categories'] = Categorie::all();
		View::render("backend/categories-list.view.php", 'layout.php', $data);
	}

	public function editCategorieAction($params)
	{

		if(isset($params['id'])) $categorie = Categorie::findOneBy(array('id' => $params['id']));
		else $categorie = new Categorie();

		$data['titre'] = (!empty($categorie->getTitre()) ? $categorie->getTitre() : "Ajout d'une nouvelle categorie" );

		if(empty($categorie)) {
			throw new Erreur("La categorie contenant l'id ".$params['id']." n'existe pas");
			return false;
		}
		
		$fb = new FormBuilder();
		$form = $fb->create(new CategorieForm(), $categorie);

		if(request_is("POST")) {
			$categorie = $form->handleRequest($_POST);
			if($form->validate())  {
				$categorie->save();
				addNotif('Categorie bien enregistrée', 'valid');
				redirectToRoute('categories');
			}
			else addNotif($form->getErrors(), 'error');
		}

        $data['form'] = $form->createView();
		View::render("backend/categorie-detail.view.php", 'layout.php', $data);
	}

}