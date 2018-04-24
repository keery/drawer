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
	

		//Gestion des relations
		if(isset($properties['mapping'])){
			foreach ($properties['mapping'] as $key => $mapping) {
				if(!isset($mapping['property'])) {
					throw new Erreur('Champ "property" manquant pour "'.$this->table.'"');
					return false;
				}

				//Si l'attribut comporte bien au objet
				if(!empty($properties[$mapping['property']])){
					if(isset($mapping['relation'])) {
						if(in_array($mapping['relation'], array(ONE_TO_ONE, ONE_TO_MANY))) {
							
							$insertId = $properties[$mapping['property']]->save();
							$properties[$key] = $insertId;
						}elseif($mapping['relation'] == MANY_TO_MANY){
							
						}				
					}else{
						throw new Erreur('Champ "relation" manquant pour "'.$this->table.'"');
						return false;
					}
				}
				unset($properties[$mapping['property']]);
			}
			unset($properties['mapping']);
		}

		// $this->properties = $properties;
		// $this->table = $table;


		if(in_array($action, array(UPDATE, DELETE, INSERT))) {
			$res = $this->$qb($properties, $table);
			if(!$res) $this->printError();
			else return $this->pdo->lastInsertId();
		}
		else {
			throw new Erreur('Type de requête invalide');
			return false;
		}
	}

	public function updateQueryBuilder($properties, $table) {
		$props = $properties;
		unset($props['id']);
		$iProps = $this->prepareInlineKeys($props);

		$this->query = $this->pdo->prepare("UPDATE ".$table." SET ".implode(",",$iProps)." WHERE id = :id");
		return $this->query->execute($properties);
	}

	public function insertQueryBuilder($properties, $table) {
		$keys = array_keys($properties);
		$this->query = $this->pdo->prepare("INSERT INTO ".$table." (".implode(',', $keys).") VALUES (:".implode(',:', $keys).")");
		return $this->query->execute($properties);
	}

	public function deleteQueryBuilder() {
		$this->query = $this->pdo->prepare("DELETE FROM ".$this->table." WHERE id = :id");
		return $this->query->execute(array('id' => $this->properties['id']));
	}		

	public function select(
		$table, 
		$fields = array('*'),
		$where = array(), 
		$onlyOne = false) {

		if(!is_array($fields)) {
			throw new Erreur('Le deuxième paramètre de la fonction select doit être un tableau');
			return false;
		}
		$fields = implode(',', $fields);
		
		$q = "SELECT ".$fields." FROM ".$table::get_table_class();


		//CLAUSE WHERE
		if(!empty($where)) {
			$inlineWhere = $this->prepareInlineKeys($where);
			$q .= " WHERE ".$inlineWhere;	
		}

		$this->query = $this->pdo->prepare($q);
		$this->query->execute($where);


		$res = $this->query->fetchAll(PDO::FETCH_ASSOC);

		//HYDRATE OBJECTS
		if(sizeof($res) > 0) {
			foreach ($res as $key => $val) {
				$res[$key] = $this->hydrateObject($table, $val);
			}
		}
		return $onlyOne ? array_shift($res) : $res;
	}

	public function prepareInlineKeys($data, $glue ="=:"){
		$iProps = [];

		foreach (array_keys($data) as $props) {
			$iProps[] = $props.$glue.$props;
		}
		return implode(',', $iProps);
	}

	public function hydrateObject($table, $data) {
		$t = new $table();

		if(!empty($t->getMapping())){
			foreach ($t->getMapping() as $key => $mapping) {
				if(isset($data[$key]) && !empty($data[$key])) {
					$func = 'set'.ucfirst($mapping['property']);
					$jointedElement = $mapping['target']::findOneBy(array('id' => $data[$key]));
					$t->$func($jointedElement);
					unset($data[$key]);
				}
			}
		}
		$t->fromArray($data);
		return $t;
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