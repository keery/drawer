<?php
namespace Module\Entity;
use Module\Bdd\BaseSql;

class Article extends BaseSql {
	protected $titre;
	protected $description;
	protected $categorie;

	public function __construct() {
		parent::__construct();
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
	public function setCategorie($categorie) {
		$this->categorie = $categorie;
	}				
} 