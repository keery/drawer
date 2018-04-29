<?php

namespace Module\Entity\Form;

use Module\Form\FormBuilderInterface;

use Module\Form\Type\InputType;
use Module\Form\Type\TextType;
use Module\Form\Type\SubmitType;

class ArticleForm extends FormBuilderInterface
{

    public function __construct()
    {
        $this
            ->add('titre', new InputType())
            ->add('contenu', new TextType())
            ->add('submit', new SubmitType())
            // ->add('auteur', new InputType(), ['label' => 'Author'])
        ;
    }
}