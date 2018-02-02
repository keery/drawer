<?php session_start();
// $dbh = new PDO('mysql:host=localhost;dbname=biscotto', 'root', '', array(
// 		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
// 		PDO::ATTR_DEFAULT_FETCH_MODE => PDO:: FETCH_ASSOC,
// 		PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8" ));

define("USER", 				"");
define("PREFIXE_TABLE", 	"");

//Informations sur le site
define("SITE", 				"");
define("NOM_SITE", 			"");
define("ADRESSE", 			"");
define("CODE_POSTAL", 		"");
define("VILLE", 			"");

//Réseaux Sociaux
define("FACEBOOK", 			"#");
define("TWITTER", 			"#");
define("INSTAGRAM", 		"#");



/*******/


// define("DS", DIRECTORY_SEPARATOR);
define("DS", "/");
define("DIRNAME", dirname($_SERVER["SCRIPT_NAME"]));
define("PROJECT_LINK", substr($_SERVER['DOCUMENT_ROOT'].DIRNAME.DS, 0, -1));

//FOLDER PATH
define('CONF', PROJECT_LINK."conf".DS);
define('MODULE', PROJECT_LINK."module".DS);
define('CSS', PROJECT_LINK."assets/css".DS);
define('FONTS', PROJECT_LINK."fonts".DS);
define('JS', PROJECT_LINK."js".DS);
define('IMG', PROJECT_LINK."assets/img".DS);
define('CTRL', PROJECT_LINK."controllers".DS);
define('TPL', PROJECT_LINK."tpl".DS);
define('LAYOUT', PROJECT_LINK."layout".DS);
define('ROOT', dirname(__FILE__).DS);