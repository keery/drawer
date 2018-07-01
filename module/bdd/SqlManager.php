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
							
						}elseif($mapping['relation'] == MANY_TO_ONE){
							foreach ($properties[$mapping['property']] as $linkedObject) {
								$linkedObject->save();
							}
						}				
					}else{
						throw new Erreur('Champ "relation" manquant pour "'.$this->table.'"');
						return false;
					}
				}
				else $properties[$key] = null;
				unset($properties[$mapping['property']]);
			}
			unset($properties['mapping']);
		}

		if(in_array($action, array(UPDATE, DELETE, INSERT))) {
			$res = $this->$qb($properties, $table);
			if(!$res) $this->printError();
			else return $action == INSERT ? $this->pdo->lastInsertId() : $properties['id'];
		}
		else {
			throw new Erreur('Type de requête invalide');
			return false;
		}
	}

	public function updateQueryBuilder($properties, $table) {
		
		unset($properties['date_update']);
		unset($properties['date_inscription']);
		$properties = $this->notEmptyValue($properties);
		$props = $properties;
		unset($props['id']);
		$iProps = $this->prepareInlineKeys($props);
		$this->query = $this->pdo->prepare("UPDATE ".$table." SET ".$iProps." WHERE id = :id");
		return $this->query->execute($properties);
	}

	public function insertQueryBuilder($properties, $table) {

		$properties = $this->notEmptyValue($properties);
		$keys = array_keys($properties);
		$this->query = $this->pdo->prepare("INSERT INTO ".$table." (".implode(',', $keys).") VALUES (:".implode(',:', $keys).")");
		return $this->query->execute($properties);
	}

	public function deleteQueryBuilder($id, $table) {
		$this->query = $this->pdo->prepare("DELETE FROM ".$table." WHERE id = :id");
		return $this->query->execute(['id' => $id]);
	}		

	public function select(
		$table, 
		$fields = array('*'),
		$where = array(), 
		$onlyOne = false,
		$groupBy=null,
		$limit=null) {

		if(!is_array($fields)) {
			throw new Erreur('Le deuxième paramètre de la fonction select doit être un tableau');
			return false;
		}
		$fields = implode(',', $fields);

		
		$q = "SELECT ".$fields." FROM ".$table::get_table_class();

		//CLAUSE WHERE
		if(!empty($where)) {
			if(is_array(current($where))) {
				$inlineWhere = "";
				$formatWhere = [];
				foreach($where as $cond) {
					if(count($cond) != 3) {
						throw new Erreur('Les requêtes select à tableau imbriqué nécessitent 3 paramètres [champ, operateur, valeur]');
						return false;
					}
					$inlineWhere .= " ".$cond[0]." ".$cond[1]." :".$cond[0];
					$formatWhere[$cond[0]] = $cond[2];
				}
				$where = $formatWhere;
			}
			else  {
				$res = $this->prepareInlineSelectKeys($where, "=:", " AND ");
				$inlineWhere = $res['inline'];
				$where = $res['where'];
			}
			
			$q .= " WHERE ".$inlineWhere;	
		}
		if(is_int($limit)) $q .= " LIMIT ".$limit;
		$this->query = $this->pdo->prepare($q);
		$this->query->execute($where);
		$res = $this->query->fetchAll(PDO::FETCH_ASSOC);

		//HYDRATE OBJECTS
		if(sizeof($res) > 0) {
			foreach ($res as $key => $val) {
				$res[$key] = $this->hydrateObject($table, $val);
			}
		}
		else $res = [];
		return $onlyOne ? array_shift($res) : $res;
	}

	public function prepareInlineKeys($data, $glue ="=:"){
		$iProps = [];
		foreach ($data as $key => $props) {
			$iProps[] = $key.$glue.$key;
		}
		return implode(',', $iProps);
	}

	public function prepareInlineSelectKeys($data, $glue ="=:", $separator=","){
		$iProps = [];
		foreach ($data as $key => $props) {
			if(is_null($props)) {
				unset($data[$key]);
				$iProps[] = $key." IS NULL";
			}
			else $iProps[] = $key.$glue.$key;
		}
		return ['where' => $data, 'inline' =>implode($separator, $iProps)];
	}

	public function hydrateObject($table, $data) {
		$t = new $table();

		if(!empty($t->getMapping())){
			foreach ($t->getMapping() as $key => $mapping) {
				if(isset($data[$key]) && !empty($data[$key])) {
					if(in_array($mapping['relation'], array(ONE_TO_ONE, ONE_TO_MANY))) {
						$func = 'set'.ucfirst($mapping['property']);
						if(method_exists($t, $func)) {
							$jointedElement = $mapping['target']::findOneBy(array('id' => $data[$key]));
							$t->$func($jointedElement);
						}
						else {
							throw new Erreur("La fonction ".$func." n'existe pas");
							return false;
						}
					}					
				}
				if($mapping['relation'] === MANY_TO_ONE) {
					$func = $mapping['adding'];
					if(method_exists($t, $func)) {
						$jointedElements = $mapping['target']::find(array($key => $data['id']));
						if(sizeof($jointedElements) > 0) {
							foreach($jointedElements as $element) {
								$t->$func($element);
							}
						}
					}
					else {
						throw new Erreur("La fonction ".$func." n'existe pas");
						return false;
					}
				}
				unset($data[$key]);
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

	public function notEmptyValue($data) {
		$values = [];
		foreach ($data as $key => $value) {
			if($value) $values[$key] = $value;
		}
		return $values;
	}
}