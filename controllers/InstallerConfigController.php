<?php
namespace Controllers;
use Module\View\View;
class InstallerConfigController {



	public function indexAction()
	{

		View::render('installer-config.view.php', 'layout-installer-config.php');
	}	
}