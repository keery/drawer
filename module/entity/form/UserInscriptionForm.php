<?php

namespace Module\Entity\Form;

use Module\Form\FormBuilderInterface;

use Module\Form\Type\InputType;
use Module\Form\Type\CheckboxType;
use Module\Form\Type\PasswordType;
use Module\Form\Type\SelectType;
use Module\Form\Type\FileType;
use Module\Form\Type\SubmitType;

class UserForm extends FormBuilderInterface
{

    public function __construct()
    {
        $this
            ->add('pseudo', new InputType())
            ->add('email', new InputType())
            ->add('password', new PasswordType())
            ->add('prenom', new InputType())
            ->add('nom', new InputType())
            ->add('profession', new InputType(), ['required' => false])
            ->add('image', new FileType('Module\Entity\User', false))
            ->add('submit', new SubmitType())
        ;
    }
}