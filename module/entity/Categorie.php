<?php
namespace Module\Entity;
use Module\Bdd\BaseSql;
use Module\Bdd\SqlManager;

class Categorie extends BaseSql {
	protected $nom;

	public function __construct() {
		parent::__construct();
	}

	public function getNom() {
		return $this->nom;
	}
	public function setNom($nom) {
		$this->nom = $nom;
	}

	public function get_table_class() { return "cd_categorie_article"; }		
} 