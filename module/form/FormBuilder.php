<?php
namespace Module\Form;

use Module\Form\FormHTML;

class FormBuilder {
	private $form;
	private $object;

	public function create($form, $object=false)
	{
		$uKey = $this->generateUniqKey($form);
		$this->object[$uKey] = $object;
		$this->form[$uKey] = $form;
		$HTML_form = [];
		
		foreach($form->getStructure() as $key => $field) {
			$func = 'get'.ucfirst($key);
			if(method_exists($object, $func)) {
				$value = $object->$func();
				$value = is_object($value) ? $value->getId() : $value;
				$field->setValue($value);
			}
			$field->setKey($uKey);
		}

		return $form;
	}

	private function generateUniqKey($form){
		$key = uniqid();
		$options = [
			'value' => $key,
			'required' => true
		];

		$form->generateFieldKey($options);

		return $key;
	}
}