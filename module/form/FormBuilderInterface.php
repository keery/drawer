<?php

namespace Module\Form;

use Module\Form\Type\HiddenType;
use Module\Form\Validator;

class FormBuilderInterface
{
    private $structure = [];
    public $key_form;
    public $method = "POST";
    public $action;
    public $enctype;
    public $object;
    public $rules;

    public function generateFieldKey($options) {
        $this->add('key', $this->key_form = new \Module\Form\Type\HiddenType(), $options);
    }    
    
    public function add($name, $type, $options=null) {
        $options['name'] = $name;
        $type->build($options);
        $this->structure[$name] = $type;

        //Attribut pour les formulaires qui contiennent des fichiers
        if( $this->isTypeFile(get_class($type)) ) $this->enctype = "multipart/form-data";
        return $this;
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
    
    public function getKey() {
        return $this->key;
    }   
    public function setKey($key) {
        $this->key = $key;
    }  
    
    public function getObject() {
        return $this->object;
    }   
    public function setObject($object) {
        $this->object = $object;
    }  

    public function getRules() {
        return $this->rules;
    }   
    public function setRules($rules) {
        $this->rules = $rules;
    }      

    private function setHeadForm(){
		$HTML_head = ' method="'.$this->getMethod().'"';
		if($action = $this->getAction()) $HTML_head .= ' action="'.$action.'"';
		if($enctype = $this->getEnctype()) $HTML_head .= ' enctype="'.$enctype.'"';
		return $HTML_head;
	}
    
    public function createView() {
        foreach($this->structure as $key => $field) {
			$HTML_form[$key] = ['field' => $field, 'displayed' => false, 'label' => $field->getLabel()];
        }
        
        return new FormHTML($HTML_form, $this->setHeadForm());
    }

    public function handleRequest($request) {
        $key = $this->key_form->getValue();

        if(sizeof($request) > 0) {
            foreach($request as $key => $value) {
                if(in_array($key, $_SESSION['form_keys'])) $this->getObject()->fromArray($value);                         
            }

            return $this->getObject();
        }
    }

    public function validate() {
        var_dump($this->rules);
        $validator = new Validator($this->rules, $this->object);
        return $validator->verify();
    }
}