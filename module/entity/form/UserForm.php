<?php
namespace Module\Entity\Form;

use Module\Form\FormBuilderInterface;
use Module\Form\Type\PasswordType;
use Module\Form\Type\TextType;
use Module\Form\Type\SubmitType;

class UserForm extends FormBuilderInterface
{

    public function __construct()
    {


        $this
            ->add('email', new TextType())
            ->add('password', new PasswordType())
            ->add('firstname', new TextType())
            ->add('lastname', new TextType())
            ->add('age', new TextType())
            ->add('submit', new SubmitType())
        ;
    }
}


?>