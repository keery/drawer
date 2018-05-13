<?php

namespace Module\Form\Type;

use Module\Form\FormComponent;

class TextType extends FormComponent
{
    public function toHTML() {
        $HTML = '<textarea';
        $HTML .= $this->defaultFields(false);
        $HTML .= '>'.$this->getValue().'</textarea>';
        return $HTML;
    }
}