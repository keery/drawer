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


//BDD
// define("HOST", "localhost");
define("HOST", "localhost:3306");
define("DB_NAME", "drawer");
define("USER", "root");
define("PASS", "password");



/*******/


// define("DS", DIRECTORY_SEPARATOR);
define("DS", "/");
define("DIRNAME", dirname($_SERVER["SCRIPT_NAME"]));
define("PROJECT_LINK", substr($_SERVER['DOCUMENT_ROOT'].DIRNAME.DS, 0, -1));

//FOLDER PATH //////////////.DS avant ""
define('CONF', PROJECT_LINK.DS."conf".DS);
define('MODULE', PROJECT_LINK.DS."module".DS);
define('CSS', PROJECT_LINK.DS."assets/css".DS);
define('FONTS', PROJECT_LINK.DS."fonts".DS);
define('JS', PROJECT_LINK.DS."js".DS);
define('IMG', PROJECT_LINK.DS."assets/img".DS);
define('CTRL', PROJECT_LINK.DS."controllers".DS);
define('TPL', PROJECT_LINK.DS."tpl".DS);
define('LAYOUT', PROJECT_LINK.DS."layout".DS);
define('ASSETS', PROJECT_LINK.DS."assets".DS);
define('ROOT', DS.dirname(__FILE__).DS);