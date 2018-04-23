<?php
namespace Module\Bdd;

class BaseSql{

	private $table;
	private $pdo;
	private $properties;
	private $manager;

	public function __construct(){
		$this->table = get_called_class();	
		$this->manager = new SqlManager();	
	}

	public function getProperties() {
		return array_diff_key(get_object_vars($this), get_class_vars(__CLASS__));
	}

	public function fromArray($array) {

	}

	public function save(){
		$action = (empty($this->getId()) ? INSERT : UPDATE);
		return $this->manager->exec($action, $this->getProperties(), $this->get_table_class());
	}

	public function delete(){
		return $this->manager->exec(DELETE, $this->getProperties(), $this->get_table_class());
	}

	public function toArray() {
		return (array) $this;
	}

	public static function findAll() {}
	public static function find() {}

}