<?php
namespace Module\Form;

use Module\Form\FormHTML;

class FormBuilder {
	private $form;
	private $object;

	public function create($form, $object=false)
	{
		$uKey = $this->generateUniqKey($form);
		$form->setObject($object);
		$this->object[$uKey] = $object;
		$this->form[$uKey] = $form;
		$HTML_form = [];
		$rules = [];

		foreach($form->getStructure() as $key => $field) {
			$func = 'get'.ucfirst($key);
			if(method_exists($object, $func)) {
				$value = $object->$func();
				$value = is_object($value) ? $value->getId() : $value;
				$field->setValue($value);
			}
			if($field->getRules()) $rules[$key] = $field->getRules();
			$field->setKey($uKey);
		}

		$form->setRules($rules);

		return $form;
	}

	private function generateUniqKey($form){
		$key = uniqid();
		$options = [
			'value' => $key,
			'required' => true
		];

		$form->generateFieldKey($options);
		$_SESSION['form_keys'][] = $key;
		return $key;
	}

}