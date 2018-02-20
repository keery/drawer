<?php
namespace Controllers;

use Module\View\View;

class StatsController {
	
	public function indexAction()
	{
		View::render("statistique.view.php");
	}		
}