<?php

namespace Module\Form\Type;

use Module\Form\FormComponent;

class PasswordType extends FormComponent
{
    public function toHTML() {
        $HTML = '<input type="password"';
        $HTML .= $this->defaultFields();
        $HTML .= '/>';
        return $HTML;
    }
}