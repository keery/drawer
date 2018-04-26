<?php 
class InstallerConfig extends \Module\Bdd\BaseSql {

	protected $databasename;
	protected $host;
	protected $user;
	protected $pwd;
    protected $websitetitle;


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

	public function configFormAdd(){

		return [
		            "name"=>"Database",
					"config"=>["method"=>"POST", "action"=>"", "submit"=>"Envoyer"],
					"input"=>[

                        "websitetitle"=>[
                            "type"=>"text",
                            "placeholder"=>"website title",
                            "required"=>true,
                            "maxString"=>200,
                            "minString"=>2
                        ],

						"databasename"=>[
										"type"=>"text",
										"placeholder"=>"database name",
										"required"=>true,
										"maxString"=>200,
										"minString"=>2
									],
						"host"=>[
										"type"=>"text",
										"placeholder"=>"host",
										"required"=>true,
										"maxString"=>100,
										"minString"=>2
									],
						"user"=>[
										"type"=>"text",
										"placeholder"=>"user",
										"required"=>true],

						"pwd"=>[
										"type"=>"password",
										"placeholder"=>"Votre mot de passe",
										"required"=>true],
						"pwdConfirm"=>[
										"type"=>"password",
										"placeholder"=>"Confirmer votre mot de passe",
										"required"=>true,
										"confirm"=>"pwd"],


					]
		];

	}


    public function addConfig($params){


        $installerConfig = new \InstallerConfig();
        $config = $installerConfig->configFormAdd();
        $errors = [];

        if(!empty($params)){
            $validate = new \Validate();
            $errors = $validate->checkForm($config, $params);
//            $errors = \Validate::checkForm($config, $params);



            if(empty($errors)){

                $txtconfi= '<?php
                 define("TITLE", "'.$params['websitetitle'].'");
                 define("HOST", "'.$params['host'].'");
                 define("DB_NAME", "'.$params['databasename'].'");
                 define("USER", "'.$params['user'].'");
                 define("PASS", "'.$params['pwd'].'");

				';

                file_put_contents(CONF.'config.php', $txtconfi, FILE_APPEND | LOCK_EX);
                header("refresh:0");

            }
            foreach ($errors as $error) {
                echo$error;
                echo"</br>";
            }

        }

    }

}





