<?php
namespace Module\Entity;
use Module\Bdd\BaseSql;
use Module\Bdd\SqlManager;

class Categorie extends BaseSql {
	protected $id;
	protected $nom;
	protected $active;

	public function __construct() {
		parent::__construct();
	}

	public function getId() {
		return $this->id;
	}
	public function setId($id) {
		$this->id = $id;
	}

	public function getNom() {
		return $this->nom;
	}
	public function setNom($nom) {
		$this->nom = $nom;
	}

	public function getActive() {
		return $this->active;
	}
	public function setActive($active) {
		$this->active = $active;
	}

	public static function get_table_class() { return "cd_categorie_article"; }		
} 