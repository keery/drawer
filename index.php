<?php 
use Conf\Autoloader;
use Module\Router\Router;
use Module\Entity\User;
use Module\Sitemap\SeoAnalyzer;
use Module\Rss\Rss;



require('conf/const.php');
require(CONF.'functions.php');
if (file_exists (CONF.'config.php')){
    require(CONF.'config.php');
}
else unset($_SESSION[PREFIX."user"]);

$loader = require(CONF.'autoload.php');
Autoloader::register();

// SITE MAP GENERATOR
$anal = new SeoAnalyzer();
$res = $anal->analyze("www.creative-drawer.ovh/site");
if(sizeof($res) > 0) {
    $rss = new Rss('sitemap.xml');
    foreach ($res as $url)  $urlNode = $rss->addElement('url', $url);
    $rss->generate();
}

if( isset($_SESSION[PREFIX."user"]['id']) ) {
    $expire = date('Y-m-d H:i:s');
    $user = User::findOneBy(['id' => $_SESSION[PREFIX."user"]['id']]);
    // if((isset($_SESSION[PREFIX."user"]['token']) && $user->getToken() != $_SESSION[PREFIX."user"]['token']) || ($user->getExpire() < $expire) ) session_destroy();
    $token = uniqid();
    $_SESSION[PREFIX."user"]['token'] = $token;
    $user->setToken($token);
    $user->setExpire(date('Y-m-d H:i:s', strtotime('+6 hour')));
    $user->save();
}


$router = new Router();
$URI = explode("?", $_SERVER["REQUEST_URI"]);
$URI = $URI[0];
$URI = str_replace(DIRECTORY, '', $URI);
if ($URI != DS) $URI = urldecode(substr($URI, 1));

if (!file_exists(CONF.'config.php')) $URI = "installer-config";
else if(!isXmlHttpRequest() && !User::findOneBy(['role' => "ADMINISTRATEUR"] )) $URI = "installer-user";

$router->urlMatcher($URI);
?>