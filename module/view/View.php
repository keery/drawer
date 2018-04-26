<?php 
namespace Module\View;

use Module\Erreur\Erreur;

class View
{
	private static $v;
	private static $t;
	private static $data = [];


	//Affiche un template
	public static function render($tpl, $layout="layout.php", $data=[])
	{
		self::assignData($data);

		if (file_exists(LAYOUT.$layout)) 
		{
			if (file_exists(TPL.$tpl)) 
			{
				extract(self::$data);
				include(LAYOUT.$layout);
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

	//Assigne les datas à la classe (les datas sont les variables que l'on passe à notre template)
	private static function assignData($data)
	{
		if(count($data) > 0)
		{
			self::$data = $data;
		}
	}

    public function addForm($form,$config, $errors=[] ){
        include "module/view/form/".$form.".frm.php";
    }
}
?>