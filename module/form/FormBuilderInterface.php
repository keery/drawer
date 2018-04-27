<?php

namespace Module\Form;

class FormBuilderInterface
{
    private $structure = [];
    
    public function add($name, $type, $options=null) {
        $options['name'] = $name;
        $this->structure[$name] = $type->build($options);
    }
}