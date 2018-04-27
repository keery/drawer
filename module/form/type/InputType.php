<?php

namespace Module\Form\Type;

use Module\Form\FormComponent;

class InputType extends FormComponent
{
    public function toHTML() {
        $HTML = '<input type="text"';
        $HTML = $this->defaultFields();
        $HTML .= '/>';
        return $HTML;
    }
}