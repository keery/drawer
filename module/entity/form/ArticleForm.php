<?php

namespace Module\Entity\Form;

use Module\Form\FormBuilderInterface;

use Module\Form\Type\InputType;
use Module\Form\Type\TextType;
use Module\Form\Type\FileType;
use Module\Form\Type\SubmitType;
use Module\Form\Type\ChoiceType;

class ArticleForm extends FormBuilderInterface
{

    public function __construct()
    {
        $choices =  [
            "First",
            "Secpnd",
            "Third"
        ];


        $this
            ->add('titre', new InputType())
            ->add('contenu', new TextType())
            ->add('image', new FileType('Module\Entity\Article'))
            ->add('choix', new ChoiceType($choices))
            ->add('submit', new SubmitType())
        ;
    }
}