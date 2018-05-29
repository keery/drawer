<?php

namespace Controllers;

use Module\Entity\Image;
use Module\View\View;
use Module\bdd\BaseSql;

class ImageController {

    public function indexAction()
    {
        $image = new Image();
        $images = $image::all();
        View::render("backend/images-list.view.php","layout.php",array(
            "images" => $images

        ));

    }

    public function addAction($params)
    {

    }

    public function editAction()
    {



    }

    public function deleteAction($params)
    {
        if(isset($params['id'])) $image = Image::findOneBy(array('id' => $params['id']));
        else $image = new Image();

        if(empty($image)) {
            throw new Erreur("L'image contenant l'id ".$params['id']." n'existe pas");
            return false;
        }

        View::render("backend/image-delete.view.php", 'layout.php',array(
            "image" => $image
        ));
    }

}