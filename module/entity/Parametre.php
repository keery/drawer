<?php

namespace Module\Entity;

use Module\Bdd\BaseSql;
use Module\Bdd\SqlManager;

class Parametre extends BaseSql
{
    public $id = null;
    public $titre;
    public $soustitre;
    public $description;
    public $facebook;
    public $linkedin;
    public $twitter;
    public $instagram;
    public $id_image;
    public $image;
    public $mapping = [
		"id_image" => [
			"relation" => ONE_TO_ONE,
			"target" => "Module\Entity\Image",
			"property" => "image"
		],
	];


    public function __construct()
    {
        parent::__construct();
    }

        /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
        /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getTitre() {
		return $this->titre;
	}
	public function setTitre($titre) {
		$this->titre = $titre;
    }

    public function getSoustitre() {
		return $this->soustitre;
	}
	public function setSoustitre($soustitre) {
		$this->soustitre = $soustitre;
    }
    
    public function getDescription() {
		return $this->description;
	}
	public function setDescription($description) {
		$this->description = $description;
    }
    
    public function getFacebook() {
		return $this->facebook;
	}
	public function setFacebook($facebook) {
		$this->facebook = $facebook;
    }
    
    public function getLinkedin() {
		return $this->linkedin;
	}
	public function setLinkedin($linkedin) {
		$this->linkedin = $linkedin;
    }
    
    public function getTwitter() {
		return $this->twitter;
	}
	public function setTwitter($twitter) {
		$this->twitter = $twitter;
    }
    
    public function getInstagram() {
		return $this->instagram;
	}
	public function setInstagram($instagram) {
		$this->instagram = $instagram;
	}

  public function getId_Image()
  {
      return $this->id_image;
  }

  public function setId_Image($id){
      $this->id_image=$id;
  }

  public function getImage() {
		return $this->image;
	}
	public function setImage(Image $image) {
		$this->image = $image;
  }

  public static function get_table_class() { return "cd_settings"; }
}