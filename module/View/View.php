<?php 
namespace Drawer\Module\View;

class View
{
	private $v;
	private $t;
	private $data = [];

	public static function render($tpl, $data, $layout=LAYOUT."layout.php")
	{
		if (file_exists(LAYOUT.$layout)) 
		{
			if (file_exists(TPL.$tpl)) 
			{
				extract($this->data);
				include($layout);
			}
			else
			{
				return new Erreur("Le template [".$tpl."] n'éxiste pas");
			}			
		}
		else
		{
			return new Erreur("Le layout [".$layout."] n'éxiste pas");
		}
	}
}
?>