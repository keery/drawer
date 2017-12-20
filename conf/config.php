<?php session_start();
// $dbh = new PDO('mysql:host=localhost;dbname=biscotto', 'root', '', array(
// 		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
// 		PDO::ATTR_DEFAULT_FETCH_MODE => PDO:: FETCH_ASSOC,
// 		PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8" ));

define("USER", 				"Biscotto");
define("PREFIXE_TABLE", 	"bs_");

//Informations sur le site
define("SITE", 				"Biscotto | Sandwicherie italienne");
define("NOM_SITE", 			"Biscotto");
define("ADRESSE", 			"10 Rue Saint-Epvre");
define("CODE_POSTAL", 		"54000");
define("VILLE", 			"Nancy");

//Réseaux Sociaux
define("FACEBOOK", 			"#");
define("TWITTER", 			"#");
define("INSTAGRAM", 		"#");

define("TABLE_USER", 		PREFIXE_TABLE."utilisateur");
define("TABLE_SLIDER", 		PREFIXE_TABLE."slider");
define("TABLE_MENU", 		PREFIXE_TABLE."menu");



/*******/


// define("DS", DIRECTORY_SEPARATOR);
define("DS", "/");
define("DIRNAME", dirname($_SERVER["SCRIPT_NAME"]));
define("PROJECT_LINK", $_SERVER['DOCUMENT_ROOT'].DIRNAME.DS);

//FOLDER PATH
define('CONF', PROJECT_LINK."conf".DS);
define('MODULE', PROJECT_LINK."module".DS);
define('CSS', PROJECT_LINK."css".DS);
define('FONTS', PROJECT_LINK."fonts".DS);
define('JS', PROJECT_LINK."js".DS);
define('IMG', PROJECT_LINK."img".DS);
define('CTRL', PROJECT_LINK."controllers".DS);
define('TPL', PROJECT_LINK."tpl".DS);
define('ROOT', dirname(__FILE__).DS);