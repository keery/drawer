<?php 
namespace Drawer;

require('conf/config.php');
require(MODULE."View/View.php");
require(MODULE."Erreur/Erreur.php");
// require(MODULE."Router/Router.php");


use Drawer\Conf\Autoloader;
use Drawer\Module\Router\Router;

$loader = require(CONF.'autoload.php');
Autoloader::register();

$router = new Router();

$URI = explode("?", $_SERVER["REQUEST_URI"]);
$URI = str_ireplace(DIRNAME, "", urldecode($URI[0]));
var_dump($URI);
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
<head>
	<base href="<?php echo DIRNAME.DS; ?>" />
	<link rel="stylesheet" href="css/style.css">
</head>

<nav class="container">

	<div class="row">
		<div class="blue col-xs-6 col-sm-8"></div>
		<div class="red col-xs-6 col-sm-4"></div>
	</div>
	<ul>
		<li>
			<a href="<?php echo $router->route('contact') ?>">test</a>
		</li>
		<li>
			<a href="<?php echo $router->route('article', ['id' => 1]) ?>">Article numero 1</a>	
		</li>
	</ul>
</nav>
