<?php

namespace Module\Entity\Form;

use Module\Form\FormBuilderInterface;
use Module\Form\Type\InputType;
use Module\Form\Type\TextType;
use Module\Form\Type\SubmitType;

class ContactForm extends FormBuilderInterface
{

    public function __construct()
    {
        $this
            ->add('email', new InputType(), ['rules' => [
                "checkEmail" => true
            ]])
            ->add('titre', new InputType())
            ->add('message', new TextType())
            ->add('submit', new SubmitType())
        ;
    }
}