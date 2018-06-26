<?php
/**
 * Created by PhpStorm.
 * User: MSI-HASSAN
 * Date: 03/04/2018
 * Time: 14:29
 */

namespace Module\Entity;

use Module\Bdd\BaseSql;
use Module\Bdd\SqlManager;



class User extends BaseSql
{
    public $id = null;
    public $pseudo;
    public $prenom;
    public $nom;
    public $email;
    public $password;
    public $token;
    public $role;
    public $active;
    public $profession;
    public $banned;
    public $expire;
    public $date_inscription;
    public $date_update;
    public $id_image;
    public $image;
    public $mapping = [
		"id_image" => [
			"relation" => ONE_TO_MANY,
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
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }


    public function getAge()
    {
        return $this->age;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }
    public function getDate_Inscription()
    {
        return $this->date_inscription;
    }
    public function getDate_Edition()
    {
        return $this->date_edition;
    }

    public function getStatus()
    {
        return $this->status;
    }
    public function getId_Image()
    {
        return $this->id_image;

    }
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }
    public function setDate_Inscription(){
        $this->date_inscription = date("Y-m-d");
    }
    public function setDate_Update(){
        $this->date_update = date("Y-m-d");
    }

    public function setPrenom($prenom)
    {
        $this->prenom = ucfirst(strtolower(trim($prenom)));
    }
    public function setNom($nom)
    {
        $this->nom = strtoupper(trim($nom));
    }


    public function setEmail($email)
    {
        $this->email = strtolower(trim($email));
    }


    public function setPassword($pwd)
    {
        $this->password = $pwd;
        // $this->password = password_hash($pwd, PASSWORD_DEFAULT);
    }

    public function setAge($age){
        $this->age=$age;
    }

    public function setId_Image($id){
        $this->id_image=$id;
    }
    public function setToken($token)
    {
        $this->token = $token;
    }

    public function getActive() {
		return $this->active;
	}
	public function setActive($active) {
		$this->active = $active;
    }
    
    public function getBanned() {
		return $this->banned;
	}
	public function setBanned($banned) {
		$this->banned = $banned;
    }
    
    public function getPseudo() {
		return $this->pseudo;
	}
	public function setPseudo($pseudo) {
		$this->pseudo = $pseudo;
    }
    public function getImage() {
		return $this->image;
	}
	public function setImage(Image $image) {
		$this->image = $image;
    }

    public function getProfession() {
		return $this->profession;
	}
	public function setProfession($profession) {
		$this->profession = $profession;
    }

    public function getExpire() {
		return $this->expire;
	}
	public function setExpire($expire) {
		$this->expire = $expire;
    }    
    
    public function formInscription(){

        return [
            "config"=>["method"=>"POST", "action"=>"", "submit"=>["text"=> "Inscription"]],
            "input"=>[

                "firstName"=>[
                    "type"=>"text",
                    "placeholder"=>"Votre prénom",
                    "required"=>true,
                    "maxString"=>100,
                    "minString"=>2
                ],
                "nom"=>[
                    "type"=>"text",
                    "placeholder"=>"Votre nom",
                    "required"=>true,
                    "maxString"=>100,
                    "minString"=>2
                ],
                "email"=>[
                    "type"=>"email",
                    "placeholder"=>"Votre email",
                    "required"=>true],
                "emailConfirm"=>[
                    "type"=>"email",
                    "placeholder"=>"Confirmer votre email",
                    "required"=>true,
                    "confirm"=>"email"
                ],
                "pwd"=>[
                    "type"=>"password",
                    "placeholder"=>"Votre mot de passe",
                    "required"=>true],
                "pwdConfirm"=>[
                    "type"=>"password",
                    "placeholder"=>"Confirmer votre mot de passe",
                    "required"=>true,
                    "confirm"=>"pwd"
                ],
                "age"=>[
                    "type"=>"number",
                    "placeholder"=>"Votre age",
                    "required"=>true,
                    "maxNum"=>100,
                    "minNum"=>18
                ]

            ]
        ];

    }

    public function formAdd(){

        return [
            "config"=>["method"=>"POST", "action"=>"", "submit"=>['text'=> 'Ajouter']],

            "input"=>[
                "firstName"=>[
                    "type"=>"text",
                    "placeholder"=>"Prénom",
                    "required"=>true,
                    "minString"=>2,
                    "maxString"=>100
                ],

                "nom"=>[
                    "type"=>"text",
                    "placeholder"=>"Nom",
                    "required"=>true,
                    "minString"=>2,
                    "maxString"=>100

                ],

                "email"=>[
                    "type"=>"email",
                    "placeholder"=>"Votre email",
                    "required"=>true],

                "role"=>[
                    "type"=>"select",
                    "options" => [
                    ["id" => 'visiteur', "name" => "visiteur"],
                    ["id" => 'moderateur', "name" => "moderateur"],
                    ["id" => 'admin', "name" => "admin"]
                ],
                    "placeholder"=>"Choisir un role",

                ]
            ]
        ];
    }



    public static function get_table_class() { return "cd_user"; }
}