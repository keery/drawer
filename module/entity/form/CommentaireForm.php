<?php

namespace Module\Entity\Form;

use Module\Entity\Categorie;
use Module\Form\FormBuilderInterface;

use Module\Form\Type\TextType;
use Module\Form\Type\SubmitType;

class CommentaireForm extends FormBuilderInterface
{

    public function __construct()
    {
        $this
            ->add('commentaire', new TextType(), ['required' => false, "label" => "Publier un commentaire :"])
            ->add('submit', new SubmitType())
        ;
    }
}