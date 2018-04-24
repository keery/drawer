<?php
namespace Module\Bdd;
use Module\Erreur\Erreur;
use PDO;

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

		//Gestion des relations
		if(isset($properties['mapping'])){
			foreach ($properties['mapping'] as $key => $mapping) {

				if(isset($mapping['relation'])) {
					if(in_array($mapping['relation'], array(ONE_TO_ONE, ONE_TO_MANY))) {
						if(!isset($mapping['column'])) {
							throw new Erreur('Champ "column" manquant pour "'.$this->table.'"');
							return false;
						}

						$insertId = $this->properties[$key]->save();
						unset($this->properties[$key]);
						$this->properties[$mapping['column']] = $insertId;

					}elseif($mapping['relation'] == MANY_TO_MANY){
						
					}				
				}else{
					throw new Erreur('Champ "relation" manquant pour "'.$this->table.'"');
					return false;
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
		$properties = $this->properties;
		unset($properties['id']);
		$props = [];

		foreach (array_keys($properties) as $properties) {
			$props[] = $properties."=:".$properties;
		}
		$this->query = $this->pdo->prepare("UPDATE ".$this->table." SET ".implode(",",$props)." WHERE id = :id");
		return $this->query->execute($this->properties);
	}

	public function insertQueryBuilder() {
		$keys = array_keys($this->properties);
		$this->query = $this->pdo->prepare("INSERT INTO ".$this->table." (".implode(',', $keys).") VALUES (:".implode(',:', $keys).")");
		return $this->query->execute($this->properties);
	}

	public function deleteQueryBuilder() {
		$this->query = $this->pdo->prepare("DELETE FROM ".$this->table." WHERE id = :id");
		return $this->query->execute(array('id' => $this->properties['id']));
	}		

	public function select($table, $fields) {
		$req = $this->pdo->query("SELECT ".$fields." FROM ".$table);
		$res = $req->fetchAll(PDO::FETCH_ASSOC);
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