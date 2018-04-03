<?php
namespace Controllers;
use Module\View\View;
class InstallerController {
	
	public function indexAction()
	{
		View::render('', 'layout-installer.php');
	}	
}