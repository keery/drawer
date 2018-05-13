<?php

namespace Module\Form\Type;

use Module\Form\FormComponent;

class SubmitType extends FormComponent
{
    public function toHTML() {
        $HTML = '<input type="submit"';
        if($this->name) $HTML .= ' name="'.$this->name.'"';
        if($this->class) $HTML .= ' class="'.$this->class.'"';
        $HTML .= ' value="';
        $HTML .= ($this->value) ? $this->value : 'Enregistrer';
        $HTML .= '"/>';
        return $HTML;
    }
}