<?php

namespace Module\Form\Type;

use Module\Form\FormComponent;

class ChoiceType extends FormComponent
{
    private $choices;
    private $manyChoices;

    public function __construct($choices, $manyChoices=true) {
        $this->choices = $choices;
        $this->manyChoices = $manyChoices;
    }

    public function toHTML() {

        $type = ($this->manyChoices ? 'checkbox' : 'radio');

        $HTML = '';

        foreach($this->choices as $choice) {

            $HTML .= '<input type="'.$type.'"';
            $HTML .= $this->defaultFields();
            $HTML .= '/>';
            $HTML .= '<span>'.$choice.'</span>';
        }
        return $HTML;
    }
}