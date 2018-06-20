<?php
namespace Module\Entity;
use Module\Bdd\BaseSql;
use Module\Bdd\SqlManager;
use Module\Entity\Categorie;

class template extends BaseSql {
    protected $titre;
    protected $principal;
    protected $secondaire;
    protected $highlight;
    protected $highlight2;
    protected $sousTitre;
    protected $sousTitreSec;
    protected $texte;



    public function __construct() {
        parent::__construct();
    }

    public function getTitre() {
        return $this->titre;
    }
    public function setTitre($titre) {
        $this->titre = $titre;
    }

    public function getPrincipal() {
        return $this->principal;
    }
    public function setPrincipal($principal) {
        $this->principal = $principal;
    }
    public function getHighlight() {
        return $this->highlight;
    }
    public function setHighlight($highlight) {
        $this->highlight = $highlight;
    }
    public function getHighlight2() {
        return $this->highlight2;
    }
    public function setHighlight2($highlight2) {
        $this->highlight2 = $highlight2;
    }

    public function getSecondaire() {
        return $this->secondaire;
    }
    public function setSecondaire($secondaire) {
        $this->secondaire = $secondaire;
    }

    public function getSousTitre() {
        return $this->sousTitre;
    }
    public function setSousTitre($sousTitre) {
        $this->sousTitre = $sousTitre;
    }

    public function getSousTitreSec() {
        return $this->sousTitreSec;
    }
    public function setSecondaireSec($sousTitreSec) {
        $this->sousTitreSec = $sousTitreSec;
    }

    public function getTexte() {
        return $this->texte;
    }
    public function setText($texte) {
        $this->texte = $texte;
    }

}