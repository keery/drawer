<?php
namespace Module\Entity;
use Module\Bdd\BaseSql;
use Module\Bdd\SqlManager;
use Module\Entity\Categorie;

class Article extends BaseSql {
	protected $id;
	protected $titre;
	protected $auteur;
	protected $description;
	protected $categorie;
	protected $date_creation;
	protected $date_update;
	protected $active;

	public $mapping = [
		"id_categorie" => [
			"relation" => ONE_TO_MANY,
			"target" => "Module\Entity\Categorie",
			"property" => "categorie"
		]
	];

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

	public function getAuteur() {
		return $this->auteur;
	}
	public function setAuteur($auteur) {
		$this->auteur = $auteur;
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

	public function getDate_update() {
		return $this->date_update;
	}
	public function setDate_update($date) {
		$this->date_update = $date;
	}

	public function getActive() {
		return $this->active;
	}
	public function setActive($active) {
		$this->active = $active;
	}

	public static function get_table_class() { return "cd_article"; }

    public function getDate_creation() {
        return $this->date_creation;
    }

    public function articleTimeAgo()
    {
        // Pour le décalage horraire.
        date_default_timezone_set("Europe/Paris");
        // Je prend la date de l'objet article via l'accesseur
        $time_ago = strtotime($this->getDate_creation());
        $current_time = time();
        // je calcule la différence avec la date actuelle
        $time_difference = $current_time - $time_ago;

        $seconds = $time_difference;
        $minutes      = round($seconds / 60 );           // value 60 is seconds
        $hours           = round($seconds / 3600);           //value 3600 is 60 minutes * 60 sec
        $days          = round($seconds / 86400);          //86400 = 24 * 60 * 60;
        $weeks          = round($seconds / 604800);          // 7*24*60*60;
        $months          = round($seconds / 2629440);     //((365+365+365+365+366)/5/12)*24*60*60
        $years          = round($seconds / 31553280);     //(365+365+365+365+366)/5 * 24 * 60 * 60
        if($seconds <= 60)
        {
            return "Ajouté à l'instant";
        }
        else if($minutes <=60)
        {
            if($minutes==1)
            {
                return "Il y'a une minute";
            }
            else
            {
                return "Il y'a ".$minutes." minutes.";
            }
        }
        else if($hours <=24)
        {
            if($hours==1)
            {
                return "Il y'a une heure";
            }
            else
            {
                return "Il y'a ".$hours." heures";
            }
        }
        else if($days <= 7)
        {
            if($days==1)
            {
                return "Ajouté hier";
            }
            else
            {
                return "Il y'a ".$days." jours.";
            }
        }
        else if($weeks <= 4.3) //4.3 == 52/12
        {
            if($weeks==1)
            {
                return "Ajouté il y'a une semaine";
            }
            else
            {
                return "Il y'a ".$weeks." semaines";
            }
        }
        else if($months <=12)
        {
            if($months==1)
            {
                return "Ajouté il y'a un mois";
            }
            else
            {
                return "Il y'a ".$months." mois";
            }
        }
        else
        {
            if($years==1)
            {
                return "Ajouté il y'a un an";
            }
            else
            {
                return "Il y'a ".$years." ans";
            }
        }
    }
}