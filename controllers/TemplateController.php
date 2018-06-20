<?php
namespace Controllers;

use Module\Entity\Template;
use Module\View\View;
use Module\Erreur\Erreur;

use Module\Form\FormBuilder;
use Module\Entity\Form\TemplateForm;

class TemplateController {
    public function templateAction()
    {
        $template = new Template();
        $data['titre'] = (!empty($template->getTitre()) ? $template->getTitre() : "Modifié votre template" );

        $fb = new FormBuilder();
        $form = $fb->create(new TemplateForm());

        if(request_is("POST")) {
            $template = $form->handleRequest($_POST);
            if($form->validate()) {
                $id = $template->save();
                addNotif('Template bien enregistré', 'valid');
                redirectToRoute('/');
            }
            else addNotif($form->getErrors(), 'error');
        }

        $data['form'] = $form->createView();

        View::render("backend/template.view.php", 'layout.php', $data);


    }


}