<?php
namespace Module\Form;

use Module\Form\FormHTML;

class FormBuilder {
	private $form;

	public function create($form, $object)
	{
		$this->form = $form;
		$HTML_form = [];
		foreach($form->getStructure() as $key => $field) {
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