<?php

namespace Module\Form\Type;

use Module\Form\FormComponent;
use Module\Erreur\Erreur;

class ChoiceType extends FormComponent
{
    private $choices;
    private $manyChoices;

    public function __construct($choices=null, $field=null, $manyChoices=true) {

        if(!is_array($choices)) {
            throw new Erreur("ChoiceType nécessite un tableau de choix");
			return false;
        }

        if(is_object($choices[0])){
            if(!$field) {
                throw new Erreur("ChoiceType nécessite le nom de l'attribut à afficher");
			    return false;
            }

            $label = [];
            $getter = 'get'.ucFirst($field);
            foreach($choices as $choice) {
                $label[] = $choice->$getter();
            }
            $choices = $label;
        }
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