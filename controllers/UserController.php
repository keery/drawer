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
        if(isset($_GET['sort']) && in_array($_GET['sort'], ['active', 'banned'])) {
            if($_GET['sort'] === "active") $data['users'] = User::find(['active' => 1]);
            else $data['users'] = User::find(['banned' => 1]);
			
		}
		else $data['users'] = User::all();
		
		
		View::render("user/user-list.view.php", 'layout.php', $data);
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
        if(request_is("POST") && isset($_POST['_email'], $_POST['_password'])) {
            if($user = User::findOneBy(['email' => $_POST['_email'], 'password' => $_POST['_password']])) {
                $_SESSION[PREFIX."user"] = (array) $user;
                if(in_array($user->getRole(), [ROLE_MODERATEUR, ROLE_ADMINISTRATEUR])) redirectToRoute("dashboard");
                else  redirectToRoute("site");		
            }
            else addNotif("Ce couple email et mot de passe n'existe pas", 'error');
        }
        View::render("user/connexion.view.php", 'layout-login.php');
    }

    public function inscriptionAction() {
        if(request_is("POST")) {
           
        }
        View::render('user/inscription.view.php', 'layout-installer-config.php');
    }

    public function forgetPasswordAction() {
        
        if(request_is("POST") && isset($_POST['_email'])) {

            if (filter_var($_POST['_email'], FILTER_VALIDATE_EMAIL)) {

                if($user = User::find(['email' => $_POST['_email']])) {
                    //Envoyer un email ici
                    addNotif("Votre mot de passe vous a été renvoyé", 'valid');
                }
                else addNotif("Cet email ne correspond à aucun compte", 'error');

            }
            else addNotif("Format d'email incorrect", 'error');
        }
        View::render("user/forget-password.view.php", 'layout-login.php');
    }

}