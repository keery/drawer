<?php

namespace Module\Entity\Form;

use Module\Entity\Categorie;
use Module\Form\FormBuilderInterface;

use Module\Form\Type\InputType;
use Module\Form\Type\CheckboxType;
use Module\Form\Type\TextType;
use Module\Form\Type\FileType;
use Module\Form\Type\SubmitType;
use Module\Form\Type\EntityType;
use Module\Form\Type\ColorType;

class TemplateForm extends FormBuilderInterface
{

    public function __construct()
    {

        $this

            ->add('principal', new ColorType(), ['required' => false])
            ->add('secondaire', new ColorType(), ['required' => false])
            ->add('sousTitre', new ColorType(), ['required' => false])
            ->add('sousTitreSec', new ColorType(), ['required' => false])
            ->add('texte', new ColorType(), ['required' => false])
            ->add('submit', new SubmitType())
        ;
    }
}