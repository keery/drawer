<?php
namespace Module\Form;

class FormBuilder {

	public function create($form, $object)
	{
		$HTML_form = '';
		foreach($form as $field) {
			$HTML_form .= $field->toHtml();
		}
		return $HTML_form;
	}
}