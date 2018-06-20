<?php

namespace Module\Form\Type;

use Module\Form\FormComponent;
use Module\Erreur\Erreur;
use Module\Form\Type\ChoiceType;

class SelectType extends ChoiceType
{
    public function __construct($choices=null, $field=null, $manyChoices=true) {

        if(!is_array($choices)) {
            throw new Erreur("SelectType nécessite un tableau de choix");
            return false;
        }

        // if(count($choices) > 0 && is_object($choices[0])){
        //     if(!$field) {
        //         throw new Erreur("SelectType nécessite le nom de l'attribut à afficher");
        //         return false;
        //     }

        //     $label = [];
        //     $getter = 'get'.ucFirst($field);
        //     if(method_exists($choices[0], $getter)) {
        //         foreach($choices as $choice) {
        //             $label[$choice->getId()] = $choice->$getter();
        //         }
        //     }
        //     else {
        //         throw new Erreur("La méthode ". $getter ." n'existe pas dans la classe ".get_class($choices[0]));
        //         return false;
        //     }  

        // }
        // else $label = [];

        parent::__construct($choices);
    }

    public function toHTML() {

        $HTML = '<select';
        $HTML .= $this->defaultFields(false).'>';
        $HTML .= "<option value=''>Choisir un élément</option>";
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