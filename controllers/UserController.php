<?php

namespace Controllers;

use Module\Entity\User;
use Module\View\View;

class UserController {

	public function indexAction()
	{
        View::render("user/user-list.view.php");
	}

	public function newAction()
	{
        View::render("user/user-new.view.php");
	}

	public function editAction($id)
    {
        View::render("user/user-edit.view.php");


    }

    public function showAction($id)
    {
        View::render("user/user-show.view.php");


    }

    public function deleteAction($id)
    {


    }
	
}