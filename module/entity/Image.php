<?php
namespace Module\Entity;
use Module\Bdd\BaseSql;
use Module\Bdd\SqlManager;
use Module\Entity\Article;

class Image extends BaseSql {
	protected $id;
	protected $src;
	protected $alt;
	protected $title;
	protected $position;
	protected $article;

	public function __construct() {
		parent::__construct();
	}

	public function getSrc() {
		return $this->src;
	}
	public function setSrc($src) {
		$this->src = $src;
    }
    
	public function getAlt() {
		return $this->alt;
	}
	public function setAlt($alt) {
		$this->alt = $alt;
    }

    public function getTitle() {
		return $this->title;
	}
	public function setTitle($title) {
		$this->title = $title;
    }

    public function getPosition() {
		return $this->position;
	}
	public function setPosition($position) {
		$this->position = $position;
    }    
    
    public function getArticle() {
		return $this->titre;
	}
	public function setArticle(Article $article) {
		$this->article = $article;
	}

	public static function get_table_class() { return "cd_image"; }		
} 