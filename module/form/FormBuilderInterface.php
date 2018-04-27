<?php

namespace Module\Form;

class FormBuilderInterface
{
    private $structure = [];
    public $method = "POST";
    public $action;
    public $enctype;
    
    
    public function add($name, $type, $options=null) {
        $options['name'] = $name;
        $type->build($options);
        $this->structure[$name] = $type;
        if( $this->isTypeFile(get_class($type)) ) $this->enctype = " enctype='multipart/form-data'";
    }

    public function getStructure() {
        return $this->structure;
    }

    public function isTypeFile($type) {
        return $type == "Module\Form\Type\FileType";
    }

    public function getMethod() {
        return $this->method;
    }
    public function setMethod($method) {
        $this->method = $method;
    }  
    
    public function getAction() {
        return $this->action;
    }   
    public function setAction($action) {
        $this->action = $action;
    }  

    public function getEnctype() {
        return $this->enctype;
    }   
    public function setEnctype($enctype) {
        $this->enctype = $enctype;
    }      
}