<?php

namespace Module\Form;

abstract class FormComponent
{
    public $name;
    public $value;
    public $placeholder;
    public $required;
    public $class;
    public $label;
    public $key;
    public $rules;

    public function build($options) {
        $this->name = isset($options['name']) ? $options['name'] : null;
        $this->value = isset($options['value']) ? $options['value'] : null;
        $this->required = isset($options['required']) ? $options['required'] : true;
        $this->placeholder = isset($options['placeholder']) ? $options['placeholder'] : false;
        $this->class = isset($options['class']) ? $options['class'] : null;
        $this->label = (isset($options['label'])) ? $options['label'] : ucfirst($options['name']);
        $this->rules = isset($options['rules']) ? $options['rules'] : null;
    }
    
    public function setClass($class) { $this->class = $class; }
    public function getClass() { return $this->class; }

    public function setLabel($label) { $this->label = $label; }
    public function getLabel() { return $this->label; }

    public function setName($name) { $this->name = $name; }
    public function getName() { return $this->name; }
    
    public function getValue() { return $this->value; }
    public function setValue($value) { $this->value = $value; }
    
    public function getPlaceholder() { return $this->placeholder; }
    public function setPlaceholder($placeholder) { $this->placeholder = $placeholder; }
    
    public function getRequired() { return $this->required; }
    public function setRequired($required) { $this->required = $required; }

    public function getKey() { return $this->key; }
    public function setKey($key) { $this->key = $key; }

    public function getRules() { return $this->rules; }
    public function setRules($rules) { $this->rules = $rules; }
    
    public function defaultFields($isInput=true) {
        $HTML = '';
        if($this->class) $HTML .= ' class="'.$this->class.'"';
        if($this->name) $HTML .= ' name="'.$this->key.'['.$this->name.']"';
        if($this->placeholder) $HTML .= ' placeholder="'.$this->placeholder.'"';
        if($this->required) $HTML .= ' required="required"';
        if($this->value && $isInput) $HTML .= ' value="'.$this->value.'"';
        return $HTML;
    }
}