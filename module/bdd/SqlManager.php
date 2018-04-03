<?php
namespace Module\Bdd;

class SqlManager{

	private $table;
	private $pdo;

	public function __construct(){
	}

	public function exec($action, $object) {
		$qb = $action."QueryBuilder";
		var_dump($object);

		if(in_array($action, array(UPDATE, DELETE, INSERT))) {
			// $this->$qb($this->getProperties($object));
		}
		else {
			throw new Erreur('Type de requête invalide');
			return false;
		}
	}

	public function updateQueryBuilder() {
	}

	public function insertQueryBuilder($properties) {
		var_dump($properties);
		var_dump(implode(',', $properties));
		var_dump("INSERT INTO ".$this->table." (".implode(',', $properties).") VALUES (".implode(',:', $properties).")");		
	}

	public function deleteQueryBuilder() {
		
	}		

	public function query($query) {

	}


	public function connectBDD() {
		// try {
		// 	$this->pdo = new \PDO('mysql:host='.HOST.';dbname='.DB_NAME, 'root', PASS);
		// }
		// catch(PDOException $e) {
		// 	// throw new Erreur("Connexion à la base de donnée impossible");
		// }

	}

	// public function getProperties($object) {
	// 	return array_diff_key(
	// 			$object->toArray(), 
	// 			get_class_vars(get_called_class())
	// 	);
	// }
}