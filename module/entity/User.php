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
    public $firstName;
    public $lastName;
    public $email;
    public $password;
    public $token;
    public $date_inscription;
    public $date_edition;
    public $id_image;
    public $status = 0;
    public $age = 0;


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
    public function getLastName()
    {
        return $this->lastName;
    }


    public function getAge()
    {
        return $this->age;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
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
    public function setDate_Edition(){
        $this->date_edition = date("Y-m-d");
    }

    public function setFirstName($firstName)
    {
        $this->firstName = ucfirst(strtolower(trim($firstName)));
    }
    public function setLastName($lastName)
    {
        $this->lastName = strtoupper(trim($lastName));
    }


    public function setEmail($email)
    {
        $this->email = strtolower(trim($email));
    }


    public function setPassword($pwd)
    {
        $this->password = password_hash($pwd, PASSWORD_DEFAULT);
    }

    public function setAge($age){
        $this->age=$age;
    }

    public function setId_Image($id){
        $this->id²=$id;
    }


    public function setToken($token)
    {
        $this->token = $token;
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
                "lastName"=>[
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

                "lastName"=>[
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