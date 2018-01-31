<?php
namespace Drawer\Controllers;

use Drawer\Module\View\View;

class MainController {
	
	public function indexAction()
	{
		echo "Action par défaut de Index";

		View::render("main.php");
	}
	public function testAction()
	{
		echo "Ma deuxième action";
	}			
}