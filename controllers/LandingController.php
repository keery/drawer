<?php
namespace Controllers;
use Module\View\View;
class LandingController {
	
	public function indexAction()
	{
		View::render('', "layout-landing.php");
	}	
}