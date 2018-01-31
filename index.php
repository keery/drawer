<?php 
// namespace ;

use Conf\Autoloader;
use Module\Router\Router;

require('conf/config.php');
require(CONF.'functions.php');

$loader = require(CONF.'autoload.php');
Autoloader::register();

$router = new Router();

$URI = explode("?", $_SERVER["REQUEST_URI"]);
$URI = $URI[0];

if ($URI[0] != DS) $URI = str_ireplace(DIRNAME, "", urldecode($URI));

$router->urlMatcher($URI);
?>