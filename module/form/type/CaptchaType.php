<?php

namespace Module\Form\Type;

use Module\Form\FormComponent;

class CaptchaType extends FormComponent
{
    public function toHTML() {
        // $_SESSION['captcha'] = "dfs";
        // $c = $captcha = new Captcha();
        // var_dump($c);
        // die;
        $HTML = '<img src="module/captcha/Captcha.php" />';
        $HTML .= "<input type='text' placeholder='Saisir le code'";
        $HTML .= $this->defaultFields();
        $HTML .= '/>';
        return $HTML;
    }
}