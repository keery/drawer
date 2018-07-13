<?php

namespace Controllers;

use Module\Entity\Form\UserForm;
use Module\Entity\Form\ProfilForm;
use Module\Entity\Form\UserInscriptionForm;
use Module\Entity\User;
use Module\View\View;
use Module\bdd\BaseSql;
use Module\Form\FormBuilder;
use Module\Erreur\Erreur;


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
		$data['titre'] = (!empty($user->getPseudo()) ? $user->getPseudo() : "Ajout d'un nouvel utilisateur" );

		if(empty($user)) {
			throw new Erreur("L'utilisateur contenant l'id ".$params['id']." n'existe pas");
			return false;
		}
		
		$fb = new FormBuilder();
		$form = $fb->create(new UserForm(), $user);
		
		if(request_is("POST")) {
            $user = $form->handleRequest($_POST);
			if($form->validate()) {
				$id = $user->save();

				addNotif('Utilisateur bien enregistré', 'valid');
				redirectToRoute('users');
			}
			else addNotif($form->getErrors(), 'error');
		}

		$data['form'] = $form->createView();
		View::render("user/user-detail.view.php", 'layout.php', $data);
	}

    public function connexionAction() {
        if(isset($_SESSION[PREFIX."user"])) redirectToRoute("site");
        if(request_is("POST") && isset($_POST['_email'], $_POST['_password'])) {
            
            if( ($user = User::findOneBy(['pseudo' => $_POST['_email'], 'password' => $_POST['_password']]))
            || ($user2 = User::findOneBy(['email' => $_POST['_email'], 'password' => $_POST['_password']]))  ) {
                
                $user = $user ? $user : $user2;
                if($user->getBanned() != 1) {
                    $_SESSION[PREFIX."user"] = (array) $user;
                    if($user->getImage()) $_SESSION[PREFIX."user"]['image'] = $user->getImage()->getSrc();
                    if(in_array($user->getRole(), [ROLE_MODERATEUR, ROLE_ADMINISTRATEUR])) redirectToRoute("dashboard");
                    else  redirectToRoute("site");		
                }
                else addNotif("Vous avez été banni par un modérateur, votre accès est momentanément suspendu", 'error');
            }
            else addNotif("Ce couple pseudo et mot de passe n'existe pas", 'error');
        }
        View::render("user/connexion.view.php", 'layout-login.php');
    }

    public function logoutAction() {
        unset($_SESSION[PREFIX."user"]);
        session_destroy();
        redirectToRoute("site");
    }

    public function inscriptionAction() {

        $user = new User();
        $fb = new FormBuilder();
        
        
		if(request_is("POST")) {
            $data_user_form = $data_user = array_shift($_POST);
            unset($data_user_form['password']);
            $user->fromArray($data_user_form);
            $_POST[$data_user['key']] = $data_user;
            $form = $fb->create(new UserInscriptionForm(), $user);
            $user = $form->handleRequest($_POST);
            $errors = [];
            if( User::findOneBy(['pseudo' => $user->getPseudo()] )) $errors[] = "Ce pseudo est déjà utilisé";
            if( User::findOneBy(['email' => $user->getEmail()] )) $errors[] = "Cet email est déjà utilisé, si vous avez oublié votre mot de passe rendez vous sur cette <a href='".path('forget_password')."'>page</a>";
            if( !isset($data_user['password_confirmation']) || !isset($data_user['password']) || $data_user['password'] != $data_user['password_confirmation'] ) $errors[] = "Les mots de passe sont différents";
            
            if( sizeof($errors) > 0 ) addNotif($errors, 'error');
            else {
                if($form->validate()) {
                    $user->setRole(ROLE_UTILISATEUR);
                    $token = date('Y-m-d H:i:s', strtotime('+4 hour'));
                    $user->setToken($token);
                    $id = $user->save();
                    $token = chaine_encode(['expire' => $token, 'id' => $id]);

                    sendMail($user->getEmail(), PROJECT_NAME." - Confirmation d'inscription", 'Bonjour,<br>Afin de confirmer votre inscription vous devez valider votre adresse email en vous rendant sur le <a href="'.URL_SITE.path('verif_email', ['token' => urlencode($token)], false).'">lien</a>');
                    addNotif('Inscription confirmée, vous allez recevoir un email de confirmation', 'valid');
                    redirectToRoute('connexion');
                }
                else addNotif($form->getErrors(), 'error');
            }
        }
        else $form = $fb->create(new UserInscriptionForm(), $user);

		$data['form'] = $form->createView();
        View::render("user/user-inscription.view.php", 'layout-inscription.php', $data);
    }

    public function verifEmailAction($request) {
        if(isset($request)) {
            $infoUser = unserialize(chaine_decode($request['token']));
            if($infoUser['expire'] < date('Y-m-d H:i:s')) $errors[] = "Votre lien de confirmation a expiré, vous allez recevoir un nouveau lien dans quelques instant.";
            if(!$user = User::findOneBy(['id' => $infoUser['id']])) $errors[] = "Erreur interne, veuillez vous inscrire à nouveau.";

            if(sizeof($errors) > 0) {
                addNotif($errors, 'error');
            }
            else {
                $user->setActive(1);
                $user->save();
                addNotif("Confirmation réussie, vous pouvez désormais vous connecter à votre espace utilisateur", 'valid');
            }
        }
        
        redirectToRoute('connexion');

    }

    public function forgetPasswordAction() {

        if(isset($_SESSION[PREFIX."user"])) redirectToRoute("site");
        
        if(request_is("POST") && isset($_POST['_email'])) {

            if (filter_var($_POST['_email'], FILTER_VALIDATE_EMAIL)) {

                if($user = User::findOneBy(['email' => $_POST['_email']])) {
                    $date = date('Y-m-d H:i:s', strtotime('+4 hour'));
                    $token = strtotime($date);
                    $user->setExpire($date);
                    $user->save();
                    sendMail($user->getEmail(), PROJECT_NAME." - Mot de passe oublié", 'Bonjour,<br>Suite à votre demande, voici un <a href="'.URL_SITE.path('new_password', ['token' => $token]).'">lien</a> vous permettant de créer un nouveau mot de passe');
                    addNotif("Un lien pour réinitialiser votre mot de passe vous a été renvoyé", 'valid');
                }
                else addNotif("Cet email ne correspond à aucun compte", 'error');

            }
            else addNotif("Format d'email incorrect", 'error');
        }
        View::render("user/forget-password.view.php", 'layout-login.php');
    }

    public function newPasswordAction($request) {

        if(isset($_SESSION[PREFIX."user"])) redirectToRoute("site");

        if(isset($request['token'])) {
            $expire = date('Y-m-d H:i:s', $request['token']);
            if( $expire < date('Y-m-d H:i:s')) {
                throw new Erreur("Le lien de récupération de mot de passe n'est plus valide");
                return false;
            }
            if($user = User::findOneBy(['expire' => $expire])) {
                if(request_is("POST")) {
                    if($_POST['password'] == $_POST['confirm']) {
                        $user->setPassword($_POST['confirm']);
                        $user->save();                        
                        addNotif("Votre mot de passe a bien été changé", 'valid');
                    }
                    else addNotif("Les mots de passe sont différents", 'error');
                }
                View::render("user/new-password.view.php", 'layout-login.php', ['token' => $request['token']]);
            }
            else {
                throw new Erreur("Erreur interne");
                return false;
            }
        }
        else {
            throw new Erreur("Token requis");
            return false;
        }
    }

    public function profilAction() {
        if(!($user = User::findOneBy(['id' => $_SESSION[PREFIX."user"]['id']])) || !isset($_SESSION[PREFIX."user"])) redirectToRoute("dashboard");

        $fb = new FormBuilder();
        $user->setPassword('');    
        $form = $fb->create(new ProfilForm(), $user);

		if(request_is("POST")) {
            $data_user_form = $data_user = array_shift($_POST);
            unset($data_user_form['password']);
            $user->fromArray($data_user_form);
            $_POST[$data_user['key']] = $data_user;
            $form = $fb->create(new ProfilForm(), $user);
            $user = $form->handleRequest($_POST);
            $errors = [];
            if($data_user['email'] != $user->getEmail()) {
                if( User::findOneBy(['email' => $user->getEmail()] )) $errors[] = "Cet email est déjà utilisé, si vous avez oublié votre mot de passe rendez vous sur cette <a href='".path('forget_password')."'>page</a>";
            }

            if(isset($data_user['password'])) {
                if( !isset($data_user['password_confirmation']) || $data_user['password'] != $data_user['password_confirmation'] ) $errors[] = "Les mots de passe sont différents";
            }
            
            if( sizeof($errors) > 0 ) addNotif($errors, 'error');
            else {
                if($form->validate()) {
                    $id = $user->save();
                    $_SESSION[PREFIX."user"] = (array) $user;
                    if($user->getImage()) $_SESSION[PREFIX."user"]['image'] = $user->getImage()->getSrc();
                    addNotif('Modifications enregistrées', 'valid');
                    // redirectToRoute('profil');
                }
                else addNotif($form->getErrors(), 'error');
            }
        }

		$data['form'] = $form->createView();
        View::render("backend/profil.view.php", 'layout.php', $data);
    }
}