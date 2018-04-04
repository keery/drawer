<?php

namespace Controllers;

use Module\Entity\User;
use Module\View\View;

class UserController {

	public function indexAction()
	{
        View::render("user/user-list.view.php");
	}

	public function addAction($params)
	{
		var_dump($params);
		echo "Ajout d'un utilisateur";
	}

	public function editAction()
    {
        View::render("user/user-edit.view.php");
        

    }

    public function deleteAction()
    {

    }
	
}