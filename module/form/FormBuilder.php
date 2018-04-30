<?php
namespace Module\Form;

use Module\Form\FormHTML;

class FormBuilder {
	private $form;
	private $object;

	public function create($form, $object=false)
	{
		$this->form = $form;
		$this->object = $object;
		$HTML_form = [];
		foreach($form->getStructure() as $key => $field) {
			$func = 'get'.ucfirst($key);
			if(method_exists($object, $func)) {
				$value = $object->$func();
				$value = is_object($value) ? $value->getId() : $value;
				$field->setValue($value);
			}
			$HTML_form[$key] = ['field' => $field, 'displayed' => false, 'label' => $field->getLabel()];

		}
		return new FormHTML($HTML_form, $this->setHeadForm());
	}

	private function setHeadForm(){
		$HTML_head = ' method="'.$this->form->getMethod().'"';
		if($action = $this->form->getAction()) $HTML_head .= ' action="'.$action.'"';
		if($enctype = $this->form->getEnctype()) $HTML_head .= ' enctype="'.$enctype.'"';
		return $HTML_head;
	}
}