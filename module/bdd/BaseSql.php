<?php
namespace Module\Bdd;

class BaseSql{

	private $table;
	private $bdd;

	public function __construct(){
		$this->table = get_called_class();
		$this->connectBDD();
	}

	public function connectBDD() {
		try {
			$this->bdd = new \PDO('mysql:host='.HOST.';dbname='.DB_NAME, 'root', PASS);
		}
		catch(PDOException $e) {
			// throw new Erreur("Connexion à la base de donnée impossible");
		}

	}

	public function fromArray($array) {

	}

	public function save(){
		$properties = array_diff_key(get_object_vars($this), get_class_vars(__CLASS__));

	}

}