<?php
namespace Controllers;

use Module\View\View;
use Module\Entity\InstallerConfig;

class InstallerConfigController {

	public function indexAction()
	{
		$installer = new InstallerConfig();
		$data['config'] = $installer->configFormAdd();


		if (request_is("POST") && !empty($_POST)) {


            $params = $_POST;

            $config = $data['config'];

            if(!empty($params)){
                $validate = new \Module\form_validate\Validate();
                $errors = $validate->checkForm($config, $params);

                if(empty($errors)){
                    try {
                        $this->pdo = new \PDO('mysql:host='.$params['host'].';dbname='.$params['databasename'], $params['user'], $params['pwd']);


                            $txtconfi= '<?php
                        define("TITLE", "'.$params['websitetitle'].'");
                        define("HOST", "'.$params['host'].'");
                        define("DB_NAME", "'.$params['databasename'].'");
                        define("USER", "'.$params['user'].'");
                        define("PASS", "'.$params['pwd'].'");

                        ';

                        file_put_contents(CONF.'config.php', $txtconfi, FILE_APPEND | LOCK_EX);
                        redirectToRoute("installer-user");
                    }
                    catch(PDOException $e) {
                        throw new Erreur("Connexion à la base de donnée impossible");
                        return false;
                    }
                }
                else $data['errors'] = $errors;
            }
		}

		View::render('installer.view.php', 'layout-installer-config.php', $data);
	}	
}