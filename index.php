<?php 
use Conf\Autoloader;
use Module\Router\Router;

require('conf/const.php');
require(CONF.'functions.php');

$loader = require(CONF.'autoload.php');
Autoloader::register();

$router = new Router();


if (file_exists(CONF.'config.php')) $URI = "installer";
else {

	$URI = explode("?", $_SERVER["REQUEST_URI"]);
	$URI = $URI[0];
	$URI = str_replace(DIRECTORY, '', $URI);
	if ($URI != DS) $URI = urldecode(substr($URI, 1));
 }
$router->urlMatcher($URI);
?>