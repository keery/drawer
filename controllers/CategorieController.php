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
        if(isset($_GET['sort']) && in_array($_GET['sort'], ['active', 'unactive'])) {
			$data['categories'] = Categorie::find(['active' => ($_GET['sort'] === 'active' ? 1 : 0)]);
		}
		else $data['categories'] = Categorie::all();
		
		View::render("backend/categories-list.view.php", 'layout.php', $data);
	}

	public function editCategorieAction($params)
	{
		if(isset($params['id'])) $categorie = Categorie::findOneBy(array('id' => $params['id']));
		else $categorie = new Categorie();

		$data['titre'] = (!empty($categorie->getNom()) ? $categorie->getNom() : "Ajout d'une nouvelle catégorie" );

		if(empty($categorie)) {
			throw new Erreur("La catégorie contenant l'id ".$params['id']." n'existe pas");
			return false;
		}
		
		$fb = new FormBuilder();		

		if(request_is("POST")) {
			$data_categorie_form = $data_categorie = array_shift($_POST);
			$categorie->fromArray($data_categorie_form);
			$form = $fb->create(new CategorieForm(), $categorie);
			$_POST[$data_categorie['key']] = $data_categorie;
			$categorie = $form->handleRequest($_POST);
			if($form->validate())  {
				$categorie->save();
				addNotif('Catégorie bien enregistrée', 'valid');
				redirectToRoute('categories');
			}
			else addNotif($form->getErrors(), 'error');
		}
		else $form = $fb->create(new CategorieForm(), $categorie);

        $data['form'] = $form->createView();
		View::render("backend/categorie-detail.view.php", 'layout.php', $data);
	}

}