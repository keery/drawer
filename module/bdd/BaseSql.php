<?php
namespace Module\Bdd;

class BaseSql{

	private $table;
	private $pdo;
	private $properties;

	public function __construct(){
		$this->table = get_called_class();		
	}

	public function getProperties() {
		return array_diff_key(get_object_vars($this), get_class_vars(__CLASS__));
	}

	public function fromArray($array) {

	}

	public function save(){
		$manager = new SqlManager();
		$manager->exec(INSERT, $this->getProperties());
	}

	public function toArray() {
		return (array) $this;
	}

}