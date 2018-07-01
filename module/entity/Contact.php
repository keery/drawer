<?php
namespace Module\Entity;
use Module\Bdd\BaseSql;
use Module\Bdd\SqlManager;
use Module\Entity\Categorie;

class Contact extends BaseSql {
	protected $id;
	protected $titre;
	protected $email;
	protected $message;
	protected $date_creation;

	public function __construct() {
		parent::__construct();
		$this->date_creation = date("Y-m-d G:h:i");
	}

    public function getEmail() {
		return $this->email;
	}
	public function setEmail($email) {
		$this->email = $email;
    }
    
	public function getTitre() {
		return $this->titre;
	}
	public function setTitre($titre) {
		$this->titre = $titre;
	}

	public function getMessage() {
		return $this->message;
	}
	public function setMessage($message) {
		$this->message = $message;
	}

	public function setDate_creation($date) {
		$this->date_creation = $date;
	}
    
    public function getDate_creation() {
        return $this->date_creation;
	}

    public static function get_table_class() { return "cd_contact"; }
}