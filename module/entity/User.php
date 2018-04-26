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
    protected $id = null;
    protected $firstName;
    protected $lastName;
    protected $email;
    protected $role;
    protected $password;
    protected $token;
    protected $dateInserted;
    protected $dateUpdated;
    protected $status = 0;
    protected $age = 0;


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
    public function getDateupdated()
    {
        return $this->dateUpdated;
    }
    public function getDateinserted()
    {
        return $this->dateInserted;
    }

    public function getStatus()
    {
        return $this->status;
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
    public function setDateInserted(){
        $this->dateInserted = date("Ymd");
    }
    public function setDateUpdated(){
        $this->dateUpdated = date("Ymd");
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

    public function setRole($role)
    {
        $this->role = $role;
    }

    public function setAge($age){
        $this->age=$age;
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



}