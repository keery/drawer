<?php

namespace Module\Entity\Form;


use Module\Entity\Article;
use Module\Form\FormBuilderInterface;
use Module\Form\Type\InputType;
use Module\Form\Type\CheckboxType;
use Module\Form\Type\TextType;
use Module\Form\Type\FileType;
use Module\Form\Type\SubmitType;
use Module\Form\Type\EntityType;

use Module\Entity\Image;

class ImageForm extends FormBuilderInterface
{

    public function __construct()
    {
        $listArticle = Article::all();

        $this
            ->add('src', new TextType())
            ->add('title', new TextType(),['required' => false])
            ->add('alt', new TextType(),['required' => false])
            ->add('position', new TextType(),['required' => false])
            ->add('article', new EntityType($listArticle, 'nom') , ['required' => false])
            ->add('submit', new SubmitType())
        ;
    }
}