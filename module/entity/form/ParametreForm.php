<?php

namespace Module\Entity\Form;

use Module\Entity\Categorie;
use Module\Form\FormBuilderInterface;

use Module\Form\Type\InputType;
use Module\Form\Type\TextType;
use Module\Form\Type\FileType;
use Module\Form\Type\SubmitType;
use Module\Form\Type\EntityType;
use Module\Form\Type\HiddenType;

class ParametreForm extends FormBuilderInterface
{

    public function __construct()
    {
        $listCateg = Categorie::all();

        $this
            ->add('titre', new InputType(), ['rules' => [
                "minLength" => 10
            ]])
            ->add('soustitre', new InputType(), ['required' => false, 'label' => "Sous titre"])
            ->add('description', new TextType(), ['required' => false])
            ->add('image', new FileType('Module\Entity\User', false))
            ->add('facebook', new InputType(), ['required' => false])
            ->add('linkedin', new InputType(), ['required' => false])
            ->add('twitter', new InputType(), ['required' => false])
            ->add('instagram', new InputType(), ['required' => false])
            ->add('submit', new SubmitType())
        ;
    }
}