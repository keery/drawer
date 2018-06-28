<?php
namespace Module\Entity;
use Module\Bdd\BaseSql;
use Module\Bdd\SqlManager;
use Module\Entity\Categorie;

class Commentaire extends BaseSql {
	protected $id;
    protected $commentaire;
    protected $publication;
    protected $active;
    protected $idarticle;
    // protected $iduser;
    protected $user;
	public $mapping = [
		// "id_article" => [
		// 	"relation" => ONE_TO_MANY,
		// 	"target" => "Module\Entity\Article",
		// 	"property" => "article"
        // ],
        "iduser" => [
			"relation" => ONE_TO_MANY,
			"target" => "Module\Entity\User",
			"property" => "user"
		]
	];

	public function __construct() {
		parent::__construct();
		$this->publication = date("Y-m-d G:h:i");
	}

	public function getCommentaire() {
		return $this->commentaire;
	}
	public function setCommentaire($commentaire) {
		$this->commentaire = $commentaire;
	}

	public function getCategorie() {
		return $this->categorie;
	}
	public function setCategorie(Categorie $categorie) {
		$this->categorie = $categorie;
	}

    public function getPublication() {
        return $this->publication;
	}
	public function setPublication($publication) {
		$this->publication = $publication;
	}

	public function getActive() {
		return $this->active;
	}
	public function setActive($active) {
		$this->active = $active;
    }
    
    public function getIdarticle() {
		return $this->idarticle;
	}
	public function setIdarticle($idarticle) {
		$this->idarticle = $idarticle;
	}

    // public function getIduser() {
	// 	return $this->iduser;
	// }
	// public function setIduser($iduser) {
	// 	$this->iduser = $iduser;
	// }
	
	public function getUser() {
		return $this->user;
	}
	public function setUser($user) {
		$this->user = $user;
    }
    
	public static function get_table_class() { return "cd_commentaire"; }
}