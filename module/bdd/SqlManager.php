<?php
namespace Module\Bdd;
use Module\Erreur\Erreur;

class SqlManager{

	private $table;
	private $pdo;
	private $query;
	private $properties;

	public function __construct(){
		$this->connectBDD();
	}

	public function exec($action, $properties, $table) {
		$qb = $action."QueryBuilder";
		$this->properties = $properties;
		$this->table = $table;

		if(isset($properties['mapping'])){
			foreach ($properties['mapping'] as $key => $mapping) {
				switch ($mapping['relation']) {
					case ONE_TO_ONE:
						var_dump("1 to 1");
					break;
					case ONE_TO_MANY:
						if(!isset($mapping['column'])) {
							throw new Erreur('Champ "column" manquant pour le mapping "'.ONE_TO_MANY.'" dans "'.$this->table.'"');
							return false;
						}
						$insertId = $this->properties[$key]->save();
						unset($this->properties[$key]);
						$this->properties[$mapping['column']] = $insertId;
					break;
					case MANY_TO_MANY:
						var_dump("Many to many");
					break;												
				}
			}
			unset($this->properties['mapping']);
		}

		if(in_array($action, array(UPDATE, DELETE, INSERT))) {
			$res = $this->$qb();

			if(!$res) $this->printError();
			else return $this->pdo->lastInsertId();
		}
		else {
			throw new Erreur('Type de requête invalide');
			return false;
		}
	}

	public function updateQueryBuilder() {
	}

	public function insertQueryBuilder() {
		$keys = array_keys($this->properties);
		$this->query = $this->pdo->prepare("INSERT INTO ".$this->table." (".implode(',', $keys).") VALUES (:".implode(',:', $keys).")");
		return $this->query->execute($this->properties);
	}

	public function deleteQueryBuilder() {
		
	}		

	public function query($query) {

	}

	public function printError() {
		$infos = $this->query->errorInfo();
		throw new Erreur('SQL : ' . $infos[1] . ' - '. $infos[2]);
		return false;
	} 


	public function connectBDD() {
		try {
			$this->pdo = new \PDO('mysql:host='.HOST.';dbname='.DB_NAME, USER, '');
		}
		catch(PDOException $e) {
			throw new Erreur("Connexion à la base de donnée impossible");
			return false;
		}
	}

}