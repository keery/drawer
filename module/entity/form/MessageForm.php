<?php

namespace Module\Entity\Form;

use Module\Form\FormBuilderInterface;

use Module\Form\Type\InputType;
use Module\Form\Type\PasswordType;
use Module\Form\Type\SubmitType;
use Module\Form\Type\TextType;

class MessageForm extends FormBuilderInterface
{



    public function __construct()
    {
        $this
            ->add('email', new InputType())
            ->add('$fullName', new TextType())
            ->add('lastName', new TextType())
            ->add('message', new TextType())
            ->add('submit', new SubmitType())
        ;
    }



}