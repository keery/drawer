<?php
namespace Module\Entity;
use Module\Bdd\BaseSql;
use Module\Bdd\SqlManager;
use Module\Entity\Categorie;

class Article extends BaseSql {
	protected $id;
	protected $titre;
	protected $description;
	protected $categorie;
	protected $date_creation;
	protected $date_update;

	public $mapping = [
		"id_categorie" => [
			"relation" => ONE_TO_MANY,
			"target" => "Module\Entity\Categorie",
			"property" => "categorie"
		]
	];
	// public $mapping = [
	// 	"categorie" => [
	// 		"relation" => ONE_TO_MANY,
	// 		"target" => "Categorie",
	// 		"column" => "id_categorie"
	// 	]
	// ];

	public function __construct() {
		parent::__construct();
		$this->date_creation = date("Y-m-d G:h:i");
	}

	public function getTitre() {
		return $this->titre;
	}
	public function setTitre($titre) {
		$this->titre = $titre;
	}

	public function getDescription() {
		return $this->description;
	}
	public function setDescription($description) {
		$this->description = $description;
	}

	public function getCategorie() {
		return $this->categorie;
	}
	public function setCategorie(Categorie $categorie) {
		$this->categorie = $categorie;
	}


	public function setDate_creation($date) {
		$this->date_creation = $date;
	}
	public function setDate_update($date) {
		$this->date_update = $date;
	}
	public static function get_table_class() { return "cd_article"; }		
} 