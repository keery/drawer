<?php 
use Conf\Autoloader;
use Module\Router\Router;
use Module\Entity\User;

require('conf/const.php');
require(CONF.'functions.php');

$loader = require(CONF.'autoload.php');
Autoloader::register();

if( isset($_SESSION[PREFIX."user"]['id']) ) {
	$user = User::findOneBy(['id' => $_SESSION[PREFIX."user"]['id']]);
	if(isset($_SESSION[PREFIX."user"]['token']) && $user->getToken() != $_SESSION[PREFIX."user"]['token']) session_destroy();
	$token = uniqid();
	$_SESSION[PREFIX."user"]['token'] = $token;
	$user->setToken($token);
	$user->save();
}

$router = new Router();
//A décommenter si besoin du 1er form de config
// if (!file_exists(CONF.'config.php')) $URI = "installer-config";

// TO DO need SQL get admin user
//elseif (USERADMINEXISTE?)$URI = "installer-user";
// else {

	$URI = explode("?", $_SERVER["REQUEST_URI"]);
	$URI = $URI[0];
	$URI = str_replace(DIRECTORY, '', $URI);
	if ($URI != DS) $URI = urldecode(substr($URI, 1));
//  }
 $router->urlMatcher($URI);
?>