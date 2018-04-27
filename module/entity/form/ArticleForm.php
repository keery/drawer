<?php

namespace Module\Entity\Form;

use Module\Form\FormBuilderInterface;

use Module\Form\Type\InputType;

class ArticleForm extends FormBuilderInterface
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this
            ->add('titre', new InputType())
        ;
    }
}