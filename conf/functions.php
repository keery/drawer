<?php
	use Drawer\Module\Router\Router;

	function path($routeName, $params=null)
	{
		$router = new Router();
		echo $router->route($routeName, $params);
	}
 ?>