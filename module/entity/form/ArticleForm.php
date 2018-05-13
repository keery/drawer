<?php

namespace Module\Entity\Form;

use Module\Entity\Categorie;
use Module\Form\FormBuilderInterface;

use Module\Form\Type\InputType;
use Module\Form\Type\TextType;
use Module\Form\Type\FileType;
use Module\Form\Type\SubmitType;
use Module\Form\Type\EntityType;

use Module\Entity\Article;

class ArticleForm extends FormBuilderInterface
{

    public function __construct()
    {
        $listCateg = Categorie::all();

        $this
            ->add('titre', new InputType())
            ->add('description', new TextType())
            ->add('image', new FileType('Module\Entity\Article'))
            ->add('categorie', new EntityType($listCateg, 'nom'))
            ->add('submit', new SubmitType())
        ;
    }
}