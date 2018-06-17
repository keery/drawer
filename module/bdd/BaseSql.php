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
			if($value != '') {
				foreach($this->getMapping() as $mapping) {
					if($mapping['property'] === $key && !is_object($value)) $value = $mapping['target']::findOneBy(['id' => $value]);
					
					if($mapping['relation'] == MANY_TO_ONE && $key."s" == $mapping['property']) {
						$adding = $mapping['adding'];
						if(is_array($value)) {
							foreach ($value as $linkedObject) {
								if($entity = $mapping['target']::findOneBy(['id' => $linkedObject['id']])) {
									$entity->fromArray($linkedObject);
									$this->$adding($entity);
								}
							}
						}
					}
				}
			}
			else $value = null;
			$f = "set".ucfirst($key);
			if(method_exists($this, $f)) $this->$f($value);

		}
	}

	public function save(){
		$action = (empty($this->getId()) ? INSERT : UPDATE);
		return self::getManager()->exec($action, $this->getProperties(), $this->table::get_table_class());
	}


	public static function delete($id){
		return self::getManager()->exec(DELETE, $id, get_called_class()::get_table_class());
	}

	public function toArray() {
		return (array) $this;
	}

	public static function all() {
		return self::getManager()->select(get_called_class());
	}

	public static function find($where, $fields = array("*"), $groupBy = null, $limit=null) {
		return self::getManager()->select(get_called_class(), $fields, $where, false, $groupBy, $limit);
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