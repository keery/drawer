<?php
namespace Module\Form;

class FormHTML {
    
    private $fields;
    private $config;

    public function __construct($fields, $configHead) {
        $this->fields = $fields;
        $this->config = $configHead;
    }

    public function render($id){
        if(array_key_exists($id, $this->fields)) {
            $this->fields[$id]['displayed'] = true;
            return $this->fields[$id]['HTML'];
        }
    }

    public function form_rest() {
        foreach ($this->fields as $field) {
            if(!$field['displayed']) echo $field['HTML'];
        }
    }

    public function form_head() {
        echo '<form '.$this->config.'>';
    } 

    public function form_bottom() {
        echo '</form>';
    }    

    public function print($contextBefore="", $contextAfter="") {
        echo $this->form_head();
        foreach ($this->fields as $key => $field) {
            echo $contextBefore.$this->render($key).$contextAfter;
        }
        echo $this->form_rest();
        echo $this->form_bottom();
    }
}