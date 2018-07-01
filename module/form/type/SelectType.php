<?php

namespace Module\Form\Type;

use Module\Form\FormComponent;
use Module\Erreur\Erreur;
use Module\Form\Type\ChoiceType;

class SelectType extends ChoiceType
{
    public function __construct($choices=null) {

        if(!is_array($choices)) {
            throw new Erreur("SelectType nécessite un tableau de choix");
            return false;
        }

        parent::__construct($choices);
    }

    public function toHTML() {
        $HTML = '<select';
        $HTML .= $this->defaultFields(false).'>';
        if(!$this->getRequired()) $HTML .= "<option value=''>Choisir un élément</option>";
        foreach($this->choices as $primaryKey => $choice) {
            $HTML .= '<option value="'.$primaryKey.'"';
            if($primaryKey == $this->getValue()) $HTML .= " selected";
            $HTML .= '>';
            $HTML .= $choice;
            $HTML .= '</option>';
        }

        $HTML .= '</select>';

        return $HTML;
    }
}