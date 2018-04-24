<?php
namespace Module\Bdd;

class BaseSql{

	private static $table;
	private static $manager;
	private $pdo;
	private $properties;

	public function __construct(){
		self::$table = get_called_class();	
	}

	public function getProperties() {
		return array_diff_key(get_object_vars($this), get_class_vars(__CLASS__));
	}

	public function fromArray($array) {

	}

	public function save(){
		$action = (empty($this->getId()) ? INSERT : UPDATE);
		return self::getManager()->exec($action, $this->getProperties(), self::$table::get_table_class());
	}

	public function delete(){
		return self::getManager()->exec(DELETE, $this->getProperties(), self::$table::get_table_class());
	}

	public function toArray() {
		return (array) $this;
	}

	public static function all() {
		return self::getManager()->select(self::$table::get_table_class(),'*');
	}

	public static function find() {}

	public static function getManager() {
		if(empty(self::$manager)) self::$manager = new SqlManager();
		return self::$manager;
	}
}