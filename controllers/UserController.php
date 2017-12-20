<?php

class UserController {

	public function indexAction()
	{
		echo "Action par défaut de User";
	}

	public function addAction($params)
	{
		var_dump($params);
		echo "Ajout d'un utilisateur";
	}
	
}