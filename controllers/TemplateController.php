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
//            $template = $form->handleRequest($_POST);
            if($form->validate()) {

                $arr= array_shift($_POST);
                $txttpl= '$dark: '.$arr['principal'].';
$dark2: '.$arr['secondaire'].';
$grey2: '.$arr['highlight'].';
$highlight: '.$arr['highlight secondaire'].';
$highlight2: '.$arr['sous titre secondaire'].';
$white: '.$arr['sous titre'].';
$text: '.$arr['texte'].';
                ';
                $lines = file(CSS.'style.scss');
                unset($lines[0]);
                unset($lines[1]);
                unset($lines[2]);
                unset($lines[3]);
                unset($lines[4]);
                unset($lines[5]);
                unset($lines[6]);
                file_put_contents(CSS.'style.scss', $lines);

                $txttpl .= file_get_contents(CSS.'style.scss');
                file_put_contents(CSS.'style.scss', $txttpl);



                addNotif('Template bien enregistré', 'valid');

                header("Cache-Control: no-cache, must-revalidate");
                redirectToRoute('template');
            }
            else addNotif($form->getErrors(), 'error');
        }

        $data['form'] = $form->createView();

        View::render("backend/template.view.php", 'layout.php', $data);


    }


}