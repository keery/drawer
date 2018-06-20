<?php

namespace Module\Entity\Form;

use Module\Form\FormBuilderInterface;

use Module\Form\Type\InputType;
use Module\Form\Type\CheckboxType;
use Module\Form\Type\PasswordType;
use Module\Form\Type\SelectType;
use Module\Form\Type\SubmitType;

class UserForm extends FormBuilderInterface
{

    public function __construct()
    {
        $this
            ->add('email', new InputType())
            ->add('prenom', new InputType())
            ->add('nom', new InputType())
            ->add('active', new CheckboxType(['Active']), ['class' => "on-off"])
            ->add('banned', new CheckboxType(['Banni']), ['class' => "on-off"])
            ->add('role', new SelectType([ROLE_ADMINISTRATEUR, ROLE_MODERATEUR, ROLE_UTILISATEUR]), ['class' => 'select'])
            ->add('submit', new SubmitType())
        ;
    }
}