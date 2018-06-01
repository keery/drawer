<?php

namespace Module\Entity\Form;

use Module\Form\FormBuilderInterface;

use Module\Form\Type\InputType;
use Module\Form\Type\PasswordType;
use Module\Form\Type\SubmitType;
use Module\Form\Type\TextType;

class UserForm extends FormBuilderInterface
{

    public function __construct()
    {
        $this
            ->add('email', new InputType())
            ->add('firstName', new TextType())
            ->add('lastName', new TextType())
            ->add('submit', new SubmitType())
        ;
    }
}