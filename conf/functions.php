<?php
	use Module\Router\Router;

	function path($routeName, $params=null)
	{
		$router = new Router();
		echo $this->routeHandler($routeName, $params);
	}
 ?>