<?php

namespace Module\Form\Type;

use Module\Form\FormComponent;
use Module\Erreur\Erreur;
use Module\Form\Type\ChoiceType;

class EntityType extends ChoiceType
{
    public function __construct($choices=null, $field=null, $manyChoices=true) {

        if(!is_array($choices)) {
            throw new Erreur("EntityType nécessite un tableau de choix");
            return false;
        }

        if(is_object($choices[0])){
            if(!$field) {
                throw new Erreur("EntityType nécessite le nom de l'attribut à afficher");
                return false;
            }

            $label = [];
            $getter = 'get'.ucFirst($field);
            if(method_exists($choices[0], $getter)) {
                foreach($choices as $choice) {
                    $label[$choice->getId()] = $choice->$getter();
                }
            }
            else {
                throw new Erreur("La méthode ". $getter ." n'existe pas dans la classe ".get_class($choices[0]));
                return false;
            }

            parent::__construct($label, $manyChoices);
        }
    }

    public function toHTML() {

        $HTML = '<select';
        $HTML .= $this->defaultFields(false).'>';

        foreach($this->choices as $primaryKey => $choice) {
            $HTML .= '<option value="'.$primaryKey.'">';
            $HTML .= $choice;
            $HTML .= '</option>';
        }

        $HTML .= '</select>';

        return $HTML;
    }
}