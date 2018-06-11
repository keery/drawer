<?php
namespace Controllers;

use Module\View\View;
use Module\Entity\InstallerConfig;

class InstallerConfigController {

	public function indexAction()
	{
		$installer = new InstallerConfig();
		$data['config'] = $installer->configFormAdd();
		$errors = [];

		if (request_is("POST") && !empty($_POST)) {

			$data['errors'] = $installer->addConfig($_POST);
		}

		View::render('installer.view.php', 'layout-installer-config.php', $data);
	}	
}