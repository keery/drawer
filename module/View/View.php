<?php 
namespace Drawer\Module\View;

class View
{
	private $params;

	public static function render($tpl, $params=null)
	{
		// $this->params = $params;
		include(TPL.$tpl);
	}
}
?>