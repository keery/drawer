<?php

namespace Module\Entity\Form;

use Module\Entity\Categorie;
use Module\Form\FormBuilderInterface;

use Module\Form\Type\TextType;
use Module\Form\Type\SubmitType;
use Module\Form\Type\CheckboxType;

class CommentaireEditForm extends FormBuilderInterface
{

    public function __construct()
    {
        $this
            ->add('commentaire', new TextType(), ['required' => false])
            ->add('active', new CheckboxType(['Publié']), ['class' => "on-off"])
            ->add('submit', new SubmitType())
        ;
    }
}