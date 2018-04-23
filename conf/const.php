<?php 
//BDD
if($_SERVER['HTTP_HOST'] == "localhost") {

	define("HOST", "localhost");
	define("PASS", "");
} else {

	define("HOST", "projectdb");
	define("PASS", "password");
}
define("DB_NAME", "drawer");
define("USER", "root");





/*******/
session_start();
// define("DS", DIRECTORY_SEPARATOR);
define("DS", "/");
define("DIRNAME", dirname($_SERVER["SCRIPT_NAME"]));
define("DIRECTORY", str_replace($_SERVER['CONTEXT_DOCUMENT_ROOT'], '', pathinfo($_SERVER['SCRIPT_FILENAME'])['dirname']) );

define("PROJECT_LINK", substr($_SERVER['DOCUMENT_ROOT'].DIRNAME.DS, 0, -1));

//FOLDER PATH 
define('PREFIX', 'cd_');
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

//Constante SQL
define('UPDATE', 'update');
define('INSERT', 'insert');
define('DELETE', 'delete');

//Relations entités
define('ONE_TO_ONE', "11");
define('ONE_TO_MANY', "1n");
define('MANY_TO_MANY', "nn");