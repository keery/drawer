<?php
namespace Controllers;

use Module\View\View;

class SiteController {
	
	public function indexAction()
	{
		View::render("site.view.php", "layout-site.php");
	}
}