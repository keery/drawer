<?php

namespace Controllers;

use Module\Entity\User;
use Module\View\View;

class UserController {

	public function indexAction()
	{
	    $user = new User();
	    $users = $user::all();
        View::render("user/user-list.view.php","layout.php",array(
            $users = "users"
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

    }
	
}