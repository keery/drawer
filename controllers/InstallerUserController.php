<?php
namespace Controllers;
use Module\View\View;
class InstallerUserController{
	
	public function indexAction()
	{
		View::render('', 'layout-installer-user.php');
	}	
}