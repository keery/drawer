<?php 
// namespace ;

use Conf\Autoloader;
use Module\Router\Router;

require('conf/config.php');
require(CONF.'functions.php');
require(MODULE."View/View.php");
// include(MODULE."Erreur/Erreur.php");


$loader = require(CONF.'autoload.php');
Autoloader::register();

$router = new Router();

$URI = explode("?", $_SERVER["REQUEST_URI"]);
$URI = str_ireplace(DIRNAME, "", urldecode($URI[0]));
$router->urlMatcher($URI);

// $router->getRouteByName('erreur');

// $URIExploded = explode(DS, $URI);

// $c = (empty($URIExploded[0]) ? "index" : ucfirst(strtolower($URIExploded[0]))."Controller");
// $a = (empty($URIExploded[1]) ? "index" : strtolower($URIExploded[1])."Action");
// unset($URIExploded[0]);
// unset($URIExploded[1]);

// $params = ["POST" => $_POST, "GET"=> $_GET, "URL" => array_values($URIExploded)];

// if (file_exists("controllers/".$c.".php")) {
// 	include("controllers/".$c.".php");
// 	if(class_exists($c))
// 	{
// 		$oCtrl = new $c();
// 		if(method_exists($oCtrl, $a))
// 		{
// 			$oCtrl->$a($params);
// 		}
// 	}
// }
?>