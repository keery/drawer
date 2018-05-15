<?php

namespace Controllers;

use Module\Entity\Form\UserForm;
use Module\Entity\User;
use Module\Form\FormBuilder;
use Module\View\View;
use Module\bdd\BaseSql;

class UserController {

	public function indexAction()
	{
	    $user = new User();
	    $users = $user::all();
        View::render("backend/user/user-list.view.php","layout.php",array(
           "users" => $users

        ));

	}

	public function addAction($params)
	{
	    $user = new User();
        $form = new FormBuilder();

        $data['form'] = $form->create(new UserForm(),$user);
        // faire une verification si le form est soumis et valide.

        $user->save();

        View::render("backend/user/user-add.view.php", 'layout.php', $data);



	}

	public function editAction()
    {



    }

    public function deleteAction($params)
    {

    }
	
}