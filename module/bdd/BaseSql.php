<?php
namespace Module\Bdd;

class BaseSql{

	private $table;
	private static $manager;
	private $pdo;
	private $properties;

	public function __construct(){
		$this->table = get_called_class();	
	}

	public function getProperties() {
		return array_diff_key(get_object_vars($this), get_class_vars(__CLASS__));
	}

	public function fromArray($data) {
		foreach ($data as $key => $value) {
			$f = "set".ucfirst($key);
			$this->$f($value);
		}
	}

	public function save(){
		$action = (empty($this->getId()) ? INSERT : UPDATE);
		//return self::getManager()->exec($action, $this->getProperties(), $this->table::get_table_class());
	}

	public function delete(){
		//return self::getManager()->exec(DELETE, $this->getProperties(), $this->table::get_table_class());
	}

	public function toArray() {
		return (array) $this;
	}

	public static function all() {
		return self::getManager()->select(get_called_class());
	}

	public static function find($where, $fields = array("*")) {
		return self::getManager()->select(get_called_class(), $fields, $where);
	}

	public static function findOneBy($where, $fields = array("*")) {
		return self::getManager()->select(get_called_class(), $fields, $where, true);
	}

	public static function getManager() {
		if(empty(self::$manager)) self::$manager = new SqlManager();
		return self::$manager;
	}

	//Fonctions communes à toutes les classes
	public function getMapping() {
		return isset($this->mapping) ? $this->mapping : array();
	}
	public function getId() {
		return $this->id;
	}
	public function setId($id) {
		$this->id = $id;
	}
}