<?php

namespace Module\Form\Type;

use Module\Form\FormComponent;

class ColorType extends FormComponent
{
    public function toHTML() {
        $HTML = '<input type="color"';
        $HTML .= $this->defaultFields();
        $HTML .= '/>';
        return $HTML;
    }
}