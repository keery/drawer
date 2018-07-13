<?php

namespace Module\Entity\Form;

use Module\Form\FormBuilderInterface;
use Module\Form\Type\InputType;
use Module\Form\Type\FileType;
use Module\Form\Type\SubmitType;
use Module\Form\Type\PasswordType;

class ProfilForm extends FormBuilderInterface
{

    public function __construct()
    {
        $this
            ->add('email', new InputType(), ['rules' => [
                "checkEmail" => true,
                'required' => true
            ]])
            ->add('password', new PasswordType(), ['required' => false])
            ->add('password_confirmation', new PasswordType(), ['label' => "Confirmation du mot de passe","required" => false])
            ->add('prenom', new InputType(), ['rules' => [
                'required' => true
            ]])
            ->add('nom', new InputType(), ['rules' => [
                'required' => true
            ]])
            ->add('profession', new InputType(), ['required' => false])
            ->add('submit', new SubmitType())
        ;
    }
}