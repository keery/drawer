<?php
namespace Module\Bdd;

class SqlManager{

	private $table;
	private $pdo;
	private $properties;

	public function __construct(){
		$this->connectBDD();
		var_dump($this->pdo);
	}

	public function exec($action, $properties) {
		$qb = $action."QueryBuilder";
		$this->properties = $properties;
		unset($this->properties['categorie']);
		echo "<pre>";
		var_dump($this->properties);
		echo "</pre>";


		// var_dump($object);

		if(in_array($action, array(UPDATE, DELETE, INSERT))) {
			$this->$qb();
		}
		else {
			throw new Erreur('Type de requête invalide');
			return false;
		}
	}

	public function updateQueryBuilder() {
	}

	public function insertQueryBuilder() {
		// var_dump($this->properties);
		// var_dump(implode(',', $properties));
		$keys = array_keys($this->properties);
		var_dump("INSERT INTO ".$this->table." (".implode(',', $keys).") VALUES (:".implode(',:', $keys).")");
		$query = $this->pdo->prepare("INSERT INTO ".$this->table." (".implode(',', $keys).") VALUES (:".implode(',:', $keys).")");
		$res = $query->execute($this->properties);
		var_dump($res);
		// var_dump("INSERT INTO ".$this->table." (".implode(',', $this->properties).") VALUES (".implode(',:', $this->properties).")");		
	}

	public function deleteQueryBuilder() {
		
	}		

	public function query($query) {

	}


	public function connectBDD() {
		try {
			$this->pdo = new \PDO('mysql:host='.HOST.';dbname='.DB_NAME, 'root', PASS);
		}
		catch(PDOException $e) {
			var_dump($e);
			// throw new Erreur("Connexion à la base de donnée impossible");
		}
	}

}