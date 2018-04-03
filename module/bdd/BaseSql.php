<?php
namespace Module\Bdd;

class BaseSql{

	private $table;
	private $pdo;
	private $properties;

	public function __construct(){
		$this->getProperties($this);
		$this->table = get_called_class();		
		$this->connectBDD();
	}

	public function connectBDD() {
		try {
			$this->pdo = new \PDO('mysql:host='.HOST.';dbname='.DB_NAME, 'root', PASS);
		}
		catch(PDOException $e) {
			// throw new Erreur("Connexion à la base de donnée impossible");
		}

	}

	public function getProperties() {
		var_dump(get_class($this));
			var_dump(get_class_vars(get_called_class()));
		return array_diff_key(get_object_vars($this), get_class_vars(get_called_class()));
	}

	public function fromArray($array) {

	}

	public function save(){
		$manager = new SqlManager();
		$manager->exec(INSERT, $this->properties);
	}

	public function toArray() {
		return (array) $this;
	}

}