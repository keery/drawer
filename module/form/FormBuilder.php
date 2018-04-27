<?php
namespace Module\Form;

use Module\Form\FormHTML;

class FormBuilder {
	private $form;

	public function create($form, $object)
	{
		$this->form = $form;
		$HTML_form = '';
		foreach($form->getStructure() as $key => $field) {
			$HTML_form[$key] = ['HTML' => $field->toHtml(), 'displayed' => false];
		}
		return new FormHTML($HTML_form, $this->setHeadForm());
	}

	private function setHeadForm(){
		$HTML_head = $this->form->getMethod();
		$HTML_head .= $this->form->getAction();
		$HTML_head .= $this->form->getEnctype();
		return $HTML_head;
	}
}