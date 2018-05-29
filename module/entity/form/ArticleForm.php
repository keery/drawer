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

use Module\Entity\Article;

class ArticleForm extends FormBuilderInterface
{

    public function __construct()
    {
        $listCateg = Categorie::all();

        $this
            ->add('titre', new InputType(), ['rules' => [
                "minLength" => 10
            ]])
            ->add('description', new TextType(), ['required' => false])
            ->add('active', new CheckboxType(['Active']), ['class' => "on-off"])
            ->add('image', new FileType('Module\Entity\Article'))
            ->add('categorie', new EntityType($listCateg, 'nom'))
            ->add('submit', new SubmitType())
        ;
    }
}