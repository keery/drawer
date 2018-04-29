<?php

namespace Module\Entity\Form;

use Module\Form\FormBuilderInterface;

use Module\Form\Type\InputType;
use Module\Form\Type\TextType;
use Module\Form\Type\FileType;
use Module\Form\Type\SubmitType;
use Module\Form\Type\ChoiceType;

use Module\Entity\Article;

class ArticleForm extends FormBuilderInterface
{

    public function __construct()
    {
        $a = Article::all();

        $this
            ->add('titre', new InputType())
            ->add('contenu', new TextType())
            ->add('image', new FileType('Module\Entity\Article'))
            ->add('choix', new ChoiceType($a, 'titre'))
            ->add('submit', new SubmitType())
        ;
    }
}