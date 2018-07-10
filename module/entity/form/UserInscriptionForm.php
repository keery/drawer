<?php

namespace Module\Entity\Form;

use Module\Form\FormBuilderInterface;

use Module\Form\Type\InputType;
use Module\Form\Type\CheckboxType;
use Module\Form\Type\PasswordType;
use Module\Form\Type\SelectType;
use Module\Form\Type\FileType;
use Module\Form\Type\SubmitType;

class UserInscriptionForm extends FormBuilderInterface
{

    public function __construct()
    {
        $this
            ->add('pseudo', new InputType(), ['rules' => [
                'minLength' => 2,
                'required' => true
            ]])
            ->add('email', new InputType(), ['rules' => [
                "checkEmail" => true,
                'required' => true
            ]])
            ->add('password', new PasswordType(), ['rules' => [
                'checkPwd' => true,
                'required' => true
            ]])
            ->add('password_confirmation', new PasswordType(), ['label' => "Confirmation du mot de passe"])
            ->add('prenom', new InputType(), ['rules' => [
                'required' => true
            ]])
            ->add('nom', new InputType(), ['rules' => [
                'required' => true
            ]])
            ->add('profession', new InputType(), ['required' => false])
            ->add('image', new FileType('Module\Entity\User', false))
            ->add('submit', new SubmitType())
        ;
    }
}




