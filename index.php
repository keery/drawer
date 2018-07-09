<?php 
use Conf\Autoloader;
use Module\Router\Router;
use Module\Entity\User;

require('conf/const.php');
require(CONF.'functions.php');

$loader = require(CONF.'autoload.php');
Autoloader::register();


if (!file_exists(CONF.'config.php')){
    $URI = "installer-config";
}
elseif( !User::findOneBy(['role' => "ADMINISTRATEUR"] )){
    $URI = "installer-user";
}
 elseif( isset($_SESSION[PREFIX."user"]['id']) ) {
	$expire = date('Y-m-d H:i:s');
	$user = User::findOneBy(['id' => $_SESSION[PREFIX."user"]['id']]);
	if((isset($_SESSION[PREFIX."user"]['token']) && $user->getToken() != $_SESSION[PREFIX."user"]['token']) || ($user->getExpire() < $expire) ) session_destroy();
	$token = uniqid();
	$_SESSION[PREFIX."user"]['token'] = $token;
	$user->setToken($token);
	$user->setExpire(date('Y-m-d H:i:s', strtotime('+4 hour')));
	$user->save();
}

else{
    $router = new Router();
    $URI = explode("?", $_SERVER["REQUEST_URI"]);
    $URI = $URI[0];
    $URI = str_replace(DIRECTORY, '', $URI);
    if ($URI != DS) $URI = urldecode(substr($URI, 1));
}

 $router->urlMatcher($URI);
?>