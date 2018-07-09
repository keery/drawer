<?php 
namespace Module\Entity;


class InstallerConfig extends \Module\Bdd\BaseSql {

	protected $databasename;
	protected $host;
	protected $user;
	protected $pwd;
	protected $websitetitle;
	public $errors;

	public function __construct(){
		parent::__construct();
	}

	public function setDatabasename($databasename){
		$this->databasename=strtolower(trim($databasename));
	}
	public function setHost($host){
		$this->host=strtolower(trim($host));
	}
	public function setUser($user){
		$this->user=trim($user);
	}
	public function setWebsitetitle($websitetitle){
		$this->websitetitle=$websitetitle;
	}
	public function setPwd($pwd){
		$this->pwd = password_hash($pwd, PASSWORD_DEFAULT);
	}

	public function getErrors() { return $this->errors; }
	public function setErrors($errors) { $this->errors = $errors; }

	public function configFormAdd(){
		return [
		            "name"=>"Database",
					"config"=>["method"=>"POST", "action"=>"", "submit"=>"Envoyer"],
					"input"=>[

                        "websitetitle"=>[
                            "type"=>"text",
                            "placeholder"=>"Titre du site",
                            "required"=>true,
                            "maxString"=>200,
                            "minString"=>2
                        ],

						"databasename"=>[
										"type"=>"text",
										"placeholder"=>"Nom de la BDD",
										"required"=>true,
										"maxString"=>200,
										"minString"=>2
									],
						"host"=>[
										"type"=>"text",
										"placeholder"=>"Host",
										"required"=>true,
										"maxString"=>100,
										"minString"=>2
									],
						"user"=>[
										"type"=>"text",
										"placeholder"=>"Utilisateur",
										"required"=>true],

						"pwd"=>[
										"type"=>"password",
										"placeholder"=>"Mot de passe",
										],


					]
		];

	}


}





