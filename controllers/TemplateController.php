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

        if(!$template = Template::findOneBy(['id' => 1])) {
            $template = new Template();
        }

        $data['titre'] = "Modifier votre site";

        $fb = new FormBuilder();
        $form = $fb->create(new TemplateForm(), $template);
        

        $form->setAction(path('template_edit'));
        $data['form'] = $form->createView();

        View::render("backend/template.view.php", 'layout.php', $data);


    }
    public function editTemplateAction() {
        if(!$template = Template::findOneBy(['id' => 1])) {
            $template = new Template();
        }

        $fb = new FormBuilder();
        $form = $fb->create(new TemplateForm(), $template);

        if(request_is("POST")) {
            $template = $form->handleRequest($_POST);
            if($form->validate()) {
                $template->save();
                $content = file_get_contents(CSS.'dist/style.css');
                $content = preg_replace("/#([a-f0-9]*)(\;\/\*\!mainfront)/", $template->getMainfront().'$2', $content);
                $content = preg_replace("/#([a-f0-9]*)(\;\/\*\!font1front)/", $template->getFont1front().'$2', $content);
                $content = preg_replace("/#([a-f0-9]*)(\;\/\*\!font2front)/", $template->getFont2front().'$2', $content);
                $content = preg_replace("/#([a-f0-9]*)(\;\/\*\!background)/", $template->getBackground().'$2', $content);
                file_put_contents(CSS.'dist/style.css', $content);
//                 $txttpl= '$dark: '.$arr['principal'].';
// $dark2: '.$arr['secondaire'].';
// $grey2: '.$arr['highlight'].';
// $highlight: '.$arr['highlight secondaire'].';
// $highlight2: '.$arr['sous titre secondaire'].';
// $white: '.$arr['sous titre'].';
// $text: '.$arr['texte'].';
//                 ';
//                 $lines = file(CSS.'style.scss');
//                 unset($lines[0]);
//                 unset($lines[1]);
//                 unset($lines[2]);
//                 unset($lines[3]);
//                 unset($lines[4]);
//                 unset($lines[5]);
//                 unset($lines[6]);
//                 file_put_contents(CSS.'style.scss', $lines);

//                 $txttpl .= file_get_contents(CSS.'style.scss');
//                 file_put_contents(CSS.'style.scss', $txttpl);




                addNotif('Template bien enregistré', 'valid');
            }
            else addNotif($form->getErrors(), 'error');
            redirectToRoute('template');            
        }
    }
}