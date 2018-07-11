<?php
namespace Controllers;

use Module\View\View;
use Module\Entity\InstallerConfig;
use PDO;

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
                    $res = include('module/bdd/try-connection.php');
                    if(is_object($res)) {

                        //Génération du fichier de config
                            $txtconfi= '<?php
                        define("TITLE", "'.$params['websitetitle'].'");
                        define("HOST", "'.$params['host'].'");
                        define("DB_NAME", "'.$params['databasename'].'");
                        define("USER", "'.$params['user'].'");
                        define("PASS", "'.$params['pwd'].'"); ';
                        file_put_contents(CONF.'config.php', $txtconfi, FILE_APPEND | LOCK_EX);
                        
                        redirectToRoute("installer-user");
                    }
                    else $data['errors'][] = $res;
                }
                else $data['errors'] = $errors;
            }
		}

		View::render('installer.view.php', 'layout-installer-config.php', $data);
	}	
}