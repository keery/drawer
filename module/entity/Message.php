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

class Message extends BaseSql
{
    protected $id;
    protected $lastName;
    protected $fullName;
    protected $email;
    protected $message;
    protected $id_user;

    public function __construct() {
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
    public function getIdUser()
    {
        return $this->id_user;
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
    public function getName()
    {
        return $this->lastName;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @return mixed
     */
    public function getFullname()
    {
        return $this->fullName;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->lastName = $name;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @param mixed $fullname
     */
    public function setFullname($fullname)
    {
        $this->fullName = $fullname;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @param mixed $id_user
     */
    public function setIdUser($id_user)
    {
        $this->id_user = $id_user;
    }




}