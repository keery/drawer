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

            ->add('principal', new ColorType(), ['required' => false, 'value' => "#304A52"])
            ->add('secondaire', new ColorType(), ['value' => "#379085", 'required' => false])
            ->add('highlight', new ColorType(), ['value' => "#77D3C8", 'required' => false])
            ->add('highlight secondaire', new ColorType(), ['value' => "#49C5B6", 'required' => false])
            ->add('sous titre', new ColorType(), ['value' => "#FFFFFF", 'required' => false])
            ->add('sous titre secondaire', new ColorType(), ['value' => "#D5DCE3", 'required' => false])
            ->add('texte', new ColorType(), ['value' => "#304A52", 'required' => false])

            ->add('mainfront', new ColorType(), ['label' => "Couleur principal", 'required' => false])
            ->add('font1front', new ColorType(), ['label' => "Couleur des titres", 'required' => false])
            ->add('font2front', new ColorType(), ['label' => "Couleur des textes", 'required' => false])
            ->add('background', new ColorType(), ['label' => "Couleur de fond", 'required' => false])
            ->add('submit', new SubmitType())
        ;
    }
}