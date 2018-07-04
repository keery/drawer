<?php
namespace Module\Form;

class FormHTML {
    
    private $fields;
    private $config;

    public function __construct($fields, $configHead) {
        $this->fields = $fields;
        $this->config = $configHead;
    }

    public function input($id, $options=null, $asterisque=null){
        if(array_key_exists($id, $this->fields)) {
            $field = $this->fields[$id];
            $field['displayed'] = true;
            
            if(isset($options['class'])) $field['field']->setClass($options['class']);
            if(isset($options['value'])) $field['field']->setValue($options['value']);
            return $field['field']->toHtml(true);
        }
    }

    public function label($id, $tag = true, $asterisque=true){
        if(array_key_exists($id, $this->fields)) {
            $HTML = $this->fields[$id]['label'];
            if($tag) $HTML = '<label>'.$HTML.'</label>'.($asterisque ? "<i class='asterisque'>*</i>" : "");
            return $HTML;
        }
    }

    public function form_rest() {
        foreach ($this->fields as $field) {
            if(!$field['displayed']) echo $field['field']->toHtml();
        }
    }

    public function form_head($class=null) {
        echo '<form '.$this->config.' '.($class ? 'class="'.$class.'"' : '').'>';
        echo $this->input('key');
    } 

    public function form_bottom() {
        // echo $this->form_rest();
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