<?php

namespace Module\Entity\Form;

use Module\Entity\Categorie;
use Module\Form\FormBuilderInterface;

use Module\Form\Type\InputType;
use Module\Form\Type\CheckboxType;
use Module\Form\Type\SubmitType;

class CategorieForm extends FormBuilderInterface
{

    public function __construct()
    {
        $this
            ->add('nom', new InputType())
            ->add('active', new CheckboxType(['Active']), ['class' => "on-off"])
            ->add('submit', new SubmitType())
        ;
    }
}