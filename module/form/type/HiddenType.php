<?php

namespace Module\Form\Type;

use Module\Form\FormComponent;

class HiddenType extends FormComponent
{
    public function toHTML() {
        $HTML = '<input type="hidden"';
        $HTML .= $this->defaultFields();
        $HTML .= '/>';
        return $HTML;
    }
}