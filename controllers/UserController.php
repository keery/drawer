<?php

namespace Controllers;

use Module\Entity\Form\UserForm;
use Module\Entity\User;
use Module\View\View;
use Module\bdd\BaseSql;
use Module\Form\FormBuilder;


class UserController {

	public function indexAction()
	{
	    $user = new User();
	    $users = $user::all();
        View::render("user/user-list.view.php","layout.php",array(
           "users" => $users

        ));

	}

    public function editUserAction($params)
    {

        if(isset($params['id'])) $user = User::findOneBy(array('id' => $params['id']));
        else $user = new User();

        // $data['email'] = (!empty($user->getEmail()) ? $user->getEmail() : "Ajout d'un nouvel utilisateur" );

        if(empty($user)) {
            throw new Erreur("L'utilisateur contenant l'id ".$params['id']." n'existe pas");
            return false;
        }

        $fb = new FormBuilder();
        $form = $fb->create(new UserForm(), $user);

        if(request_is("POST")) {
            $user = $form->handleRequest($_POST);
            if($form->validate())  {
                $user->save();
                addNotif('Votre compte à  bien été  enregistré', 'valid');
                redirectToRoute('users');
            }
            else addNotif($form->getErrors(), 'error');
        }

        $data['form'] = $form->createView();
        View::render("user/user-detail.view.php", 'layout.php', $data);
    }

    public function connexionAction() {
        View::render("user/connexion.view.php", 'layout-login.php');
    }

    public function forgetPasswordAction() {
        View::render("user/forget-password.view.php", 'layout-login.php');
    }

}