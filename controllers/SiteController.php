<?php
namespace Controllers;

use Module\View\View;

class SiteController {
	
	public function indexAction()
	{
		View::render("frontend/site.view.php", "layout-site.php");
	}

	public function oeuvreAction()
	{
		View::render("frontend/oeuvre.view.php", "layout-site.php");
	}

	public function contactAction()
	{
		View::render("frontend/contact.view.php", "layout-site.php");
	}
}