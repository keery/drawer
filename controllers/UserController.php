<?php

namespace Controllers;

use Module\Entity\User;
use Module\View\View;
use Module\bdd\BaseSql;

class UserController {

	public function indexAction()
	{
	    $user = new User();
	    $users = $user::all();
        View::render("user/user-list.view.php","layout.php",array(
           "users" => $users

        ));

	}

	public function addAction($params)
	{

	}

	public function editAction()
    {



    }

    public function deleteAction($params)
    {
		if(isset($params['id'])) $user = User::findOneBy(array('id' => $params['id']));
		else $user = new User();

		if(empty($user)) {
			throw new Erreur("L'user contenant l'id ".$params['id']." n'existe pas");
			return false;
		}

		View::render("user/user-delete.view.php", 'layout.php',array(
			"user" => $user
		 ));
    }
	
}