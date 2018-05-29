<?php
namespace Module\Form;

class FormHTML {
    
    private $fields;
    private $config;

    public function __construct($fields, $configHead) {
        $this->fields = $fields;
        $this->config = $configHead;
    }

    public function input($id, $options=null){
        if(array_key_exists($id, $this->fields)) {
            $field = $this->fields[$id];
            $field['displayed'] = true;
            
            if(isset($options['class'])) $field['field']->setClass($options['class']);
            return $field['field']->toHtml();
        }
    }

    public function label($id, $tag = true){
        if(array_key_exists($id, $this->fields)) {
            $HTML = $this->fields[$id]['label'];
            if($tag) $HTML = '<label>'.$HTML.'</label>';
            return $HTML;
        }
    }

    public function form_rest() {
        foreach ($this->fields as $field) {
            if(!$field['displayed']) echo $field['field']->toHtml();
        }
    }

    public function form_head() {
        echo '<form '.$this->config.'>';
        echo $this->input('key');
    } 

    public function form_bottom() {
        echo '</form>';
    }    

    public function render($contextBefore="", $contextAfter="") {
        echo $this->form_head();
        foreach ($this->fields as $key => $field) {
            echo '<div>';
            echo $this->label($key);
            echo $contextBefore.$this->input($key).$contextAfter;
            echo '</div>';
        }
        echo $this->form_rest();
        echo $this->form_bottom();
    }
}