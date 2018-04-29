<?php

namespace Module\Entity\Form;

use Module\Form\FormBuilderInterface;

use Module\Form\Type\InputType;

class ArticleForm extends FormBuilderInterface
{

    public function __construct()
    {
        $this
            ->add('titre', new InputType())
            ->add('test', new InputType())
            // ->add('auteur', new InputType(), ['label' => 'Author'])
        ;
    }
}