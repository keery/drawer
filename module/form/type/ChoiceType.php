<?php

namespace Module\Form\Type;

use Module\Form\FormComponent;
use Module\Erreur\Erreur;

class ChoiceType extends FormComponent
{
    protected $choices;
    private $manyChoices;

    public function __construct($choices, $manyChoices=true) {
        $this->choices = $choices;
        $this->manyChoices = $manyChoices;
    }

    public function toHTML() {

        $type = ($this->manyChoices ? 'checkbox' : 'radio');

        $HTML = '';
        foreach($this->choices as $key => $choice) {

            $HTML .= '<input type="hidden" value=0';
            if($this->name) $HTML .= ' name="'.$this->key.'['.$this->name.']"';
            $HTML .= '/>';            
            $HTML .= '<input type="'.$type.'" id="'.$key.'"';
            if($this->class) $HTML .= ' class="'.$this->class.'"';
            if($this->name) $HTML .= ' name="'.$this->key.'['.$this->name.']"';
            if(!empty($this->value)) $HTML .= ' value="'.$this->value.'"';
            if($this->getValue() == $choice || $this->getValue() == 1) $HTML .= " checked";
            $HTML .= '/>';
            $HTML .= '<label for="'.$key.'"></label>';
            $HTML .= '<span>'.$choice.'</span>';
        }
        return $HTML;
    }
}