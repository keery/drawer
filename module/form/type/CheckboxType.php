<?php

namespace Module\Form\Type;

use Module\Form\FormComponent;
use Module\Erreur\Erreur;

class CheckboxType extends FormComponent
{
 
    public function toHTML() {
        $key = uniqid();
        $HTML = '';
        $HTML .= '<input type="hidden" value=0';
        if($this->name) $HTML .= ' name="'.$this->key.'['.$this->name.']"';
        $HTML .= '/>';            
        $HTML .= '<input type="checkbox" id="'.$key.'"';
        if($this->class) $HTML .= ' class="'.$this->class.'"';
        if($this->name) $HTML .= ' name="'.$this->key.'['.$this->name.']"';
        $HTML .= ' value="1"';
        if( $this->getValue() == 1) $HTML .= " checked";
        $HTML .= '/>';
        $HTML .= '<label for="'.$key.'"></label>';
        $HTML .= '<span>'.$this->getLabel().'</span>';
        return $HTML;
    }
}