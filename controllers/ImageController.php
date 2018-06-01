<?php

namespace Controllers;

use Module\Entity\Form\ImageForm;
use Module\Entity\Image;
use Module\View\View;
use Module\Erreur\Erreur;

use Module\Form\FormBuilder;
use Module\Entity\Form\ArticleForm;

class ImageController {

    public function imagesAction()
    {
        $data['images'] = Image::all();
        View::render("backend/images-list.view.php", 'layout.php', $data);
    }


    public function editImageAction($params)
    {
        if(isset($params['id'])) $image = Image::findOneBy(array('id' => $params['id']));
        else $image = new Image();

        if(empty($image)) {
            throw new Erreur("L'image contenant l'id ".$params['id']." n'existe pas");
            return false;
        }

        $fb = new FormBuilder();
        $form = $fb->create(new ImageForm(), $image);

        if(request_is("POST")) {
            $image = $form->handleRequest($_POST);
            if($form->validate())  {
                $image->save();
                addNotif('Image bien enregistré', 'valid');
                redirectToRoute('images');
            }
            else addNotif($form->getErrors(), 'error');
        }

        $data['form'] = $form->createView();
        View::render("backend/image-detail.view.php", 'layout.php', $data);
    }



}