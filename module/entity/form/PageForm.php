<?php

namespace Module\Entity\Form;

use Module\Entity\Page;
use Module\Form\FormBuilderInterface;

use Module\Form\Type\InputType;
use Module\Form\Type\CheckboxType;
use Module\Form\Type\TextType;
use Module\Form\Type\SubmitType;
use Module\Form\Type\SelectType;
use Module\Form\Type\EntityType;

class PageForm extends FormBuilderInterface
{

    public function __construct($id)
    {
        $listPages = Page::find([['id', '!=', (!$id ? 0 : $id) ]]);

        $this
            ->add('titre', new InputType())
            ->add('url', new InputType())
            ->add('description', new TextType(), ['required' => false])
            ->add('active', new CheckboxType(['Active']), ['class' => "on-off"])
            ->add('inmenu', new CheckboxType(['Dans le menu']), ['class' => "on-off", "label" => ""])
            ->add('parent', new EntityType($listPages, 'titre'), ['required' => false])
            ->add('type', new SelectType(['contenu' => 'Contenu', 'contact' => 'Contact', 'oeuvre' => 'Articles']), ['class' => "select"])
            ->add('submit', new SubmitType())
        ;
    }
}