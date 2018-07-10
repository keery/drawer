<?php
namespace Controllers;
use Module\View\View;
use Module\Entity\Form\UserForm;
use Module\Entity\Form\UserInscriptionForm;
use Module\Entity\User;
use Module\bdd\BaseSql;
use Module\Form\FormBuilder;
use Module\Erreur\Erreur;
use Module\Entity\Parametre;
use Module\Bdd\SqlManager;

class InstallerUserController{

    public function indexAction()
    {
        //Création de la structure
        if(file_exists('structure.sql')) {
            $structure = file_get_contents('structure.sql');
            $m = new SqlManager();
            $m->query($structure);
        }
        else $data['errors'][] = "Le fichier de structure n'existe pas, contactez un modérateur";

        if(count(Parametre::all()) == 0 ) {
            $ligneParam = new Parametre();
            $ligneParam->setTitre(TITLE);
            $ligneParam->save();
        }


        $user = new User();
        $fb = new FormBuilder();

        $data_user_form = $data_user = array_shift($_POST);

        if(request_is("POST")) {
            unset($data_user_form['password']);
            $user->fromArray($data_user_form);
            $_POST[$data_user['key']] = $data_user;
            $form = $fb->create(new UserInscriptionForm(), $user);
            $user = $form->handleRequest($_POST);
            $errors = [];
            if( !isset($data_user['password_confirmation']) || !isset($data_user['password']) || $data_user['password'] != $data_user['password_confirmation'] ) $errors[] = "Les mots de passe sont différents";

            if( sizeof($errors) > 0 ) addNotif($errors, 'error');
            else {
                if($form->validate()) {
                    $user->setRole(ROLE_ADMINISTRATEUR);
                    $token = date('Y-m-d H:i:s', strtotime('+4 hour'));
                    $user->setActive(1);
                    $user->setExpire(date('Y-m-d H:i:s', strtotime('+4 hour')));
                    
                    $id = $user->save();
                    $token = chaine_encode(['expire' => $token, 'id' => $id]);

                    redirectToRoute('connexion');
                }
                else addNotif($form->getErrors(), 'error');
            }
        }
        else $form = $fb->create(new UserInscriptionForm(), $user);

        $data['form'] = $form->createView();
        View::render("installer-user.view.php", 'layout-installer-user.php', $data);
    }
}