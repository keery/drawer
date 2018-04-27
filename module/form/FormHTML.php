<?php
namespace Module\Form;

class FormHTML {
    
    private $fields;
    private $config;

    public function __construct($fields, $configHead) {
        $this->fields = $fields;
        $this->config = $configHead;
    }

    public function input($id){
        if(array_key_exists($id, $this->fields)) {
            $this->fields[$id]['displayed'] = true;
            return $this->fields[$id]['HTML'];
        }
    }

    public function label($id){
        if(array_key_exists($id, $this->fields)) {
            return '<label>'.$this->fields[$id]['label'].'</label>';
        }
    }

    public function form_rest() {
        foreach ($this->fields as $field) {
            if(!$field['displayed']) echo $field['HTML'];
        }
    }

    public function form_head() {
        var_dump($this->config);
        echo '<form '.$this->config.'>';
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