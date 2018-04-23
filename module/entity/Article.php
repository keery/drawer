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

	public $mapping = [
		"categorie" => [
			"relation" => ONE_TO_MANY,
			"target" => "Categorie",
			"column" => "id_categorie"
		]
	];

	public function __construct() {
		parent::__construct();
	}

	public function getId() {
		return $this->id;
	}
	public function setId($id) {
		$this->id = $id;
	}

	public function getTitre() {
		return $this->titre;
	}
	public function setTitre($titre) {
		$this->titre = $titre;
	}

	public function getDescription() {
		return $this->titre;
	}
	public function setDescription($description) {
		$this->description = $description;
	}

	public function getCategorie() {
		return $this->titre;
	}
	public function setCategorie(Categorie $categorie) {
		$this->categorie = $categorie;
	}

	public function get_table_class() { return "cd_article"; }		
} 