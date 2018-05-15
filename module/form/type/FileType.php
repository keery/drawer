<?php

namespace Module\Form\Type;

use Module\Form\FormComponent;

class FileType extends FormComponent
{
    private $manyFiles;
    private $entity;

    public function __construct($entity, $manyFiles=true) {
        $this->entity = $entity;
        $this->manyFiles = $manyFiles;
    }

    public function toHTML() {

        if(empty($this->entity)) {
            throw new Erreur("La propriéte entity est obligatoire pour objet FileType");
			return false;
        }
        $ref = $this->entity::get_table_class();

        $HTML = '
            <input type="hidden" name="id_entity" value="'.$this->entity.'">
            <input type="hidden" '.$this->defaultFields().' id="id_files">
            <div class="input-form">
            <input type="file" id="'.$ref.'_image_image" name="'.$ref.'[image][image]" class="input-file '.$ref.'">
            <button class="btn-validate button" type="button">Choisir un fichier</button>
            </div>
            <div class="dropzone" id="dz_'.$ref.'" data-message="Déposer votre fichier ici"></div>
            <ul class="img-list container-grid">';
            
            if(!$this->manyFiles) {   
                $HTML .= '<li class="row">
                <div class="col-xs-4 photo"></div>
                <div class="panel-action">
                <button class="delete button btn-icone dial" type="button" title="Supprimer l\'image" data-id=""></button>
                </div>
                <div class="col-xs-8 img-input">
                <div class="input-form">
                    <label for="'.$ref.'_image_alt">Alt</label>
                    <input type="text" id="'.$ref.'_image_alt" name="'.$ref.'[image][alt]" class="input">
                </div>
                <div class="input-form">
                    <label for="'.$ref.'_image_title">Title</label>
                    <input type="text" id="'.$ref.'_image_title" name="'.$ref.'[image][title]" class="input">
                </div>
                </div>
                <div class="position">
                    <i class="fa fa-sort"></i>
                    <input type="text" id="'.$ref.'_image_position" name="'.$ref.'[image][position]">
                </div>
            </li>';
        }
        $HTML .= "</ul>
        </div>";

        return $HTML;
    }
}