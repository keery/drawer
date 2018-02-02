<?php
namespace Controllers;

use Module\View\View;

class MainController {
	
	public function indexAction()
	{
		echo "Ma first action";

		View::render("main.view.php");
	}
	public function testAction()
	{
		echo "Ma deuxième action";
		View::render("main.php");
	}			
}