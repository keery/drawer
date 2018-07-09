<?php
namespace Module\Entity;
use Module\Bdd\BaseSql;
use Module\Bdd\SqlManager;

class RelUserArticle extends BaseSql {
	protected $id;
	protected $id_user;
	protected $id_article;
	protected $vote;

	public function __construct() {
		parent::__construct();
	}

	public function getId_user() {
		return $this->id_user;
	}
	public function setId_user($id_user) {
		$this->id_user = $id_user;
	}
	public function getId_article() {
		return $this->id_article;
	}
	public function setId_article($id_article) {
		$this->id_article = $id_article;
    }
    public function getVote() {
		return $this->vote;
	}
	public function setVote($vote) {
		$this->vote = $vote;
	}

	public static function get_table_class() { return "cd_user_article"; }		
}