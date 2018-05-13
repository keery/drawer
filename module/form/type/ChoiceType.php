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

        foreach($this->choices as $choice) {

            $HTML .= '<input type="'.$type.'"';
            $HTML .= $this->defaultFields();
            if($this->getValue() == $choice) $HTML .= " checked";
            $HTML .= '/>';
            $HTML .= '<span>'.$choice.'</span>';
        }
        return $HTML;
    }
}