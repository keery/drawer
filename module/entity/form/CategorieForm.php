<?php

namespace Module\Entity\Form;

use Module\Entity\Categorie;
use Module\Form\FormBuilderInterface;

use Module\Form\Type\InputType;
use Module\Form\Type\CheckboxType;
use Module\Form\Type\TextType;
use Module\Form\Type\FileType;
use Module\Form\Type\SubmitType;
use Module\Form\Type\EntityType;

class CategorieForm extends FormBuilderInterface
{

    public function __construct()
    {
        $this
            ->add('nom', new InputType())
            ->add('submit', new SubmitType())
        ;
    }
}