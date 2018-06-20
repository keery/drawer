<?php 

namespace Module\Router;
use Module\Erreur\Erreur;

class Router
{
	private $routes = [];

	public function __construct()
	{
		$routes = CONF."routing.php";
		if (file_exists($routes)) {
			$routes = include($routes);
			foreach ($routes as $routeName => $route) {
				//Si c'est un groupe de route
				if(isset($route['routes'])) {
					foreach ($route['routes'] as $childRouteName => $childRoute) {
						if( isset($route['role']) && empty($childRoute['role']) ) $childRoute['role'] = $route['role'];
						if(isset($route['prefix'])) {
							$childRoute['path'] = $route['prefix'].($childRoute['path'] != DS ? DS : '').$childRoute['path'];
						}
						$this->routes[$childRouteName] = $childRoute;
					}
				}
				else $this->routes[$routeName] = $route;
			}
		}
		else {
			throw new Erreur('Le fichier "'.$routes.'" n\'existe pas');
			return false;
		}

	}

	public function urlMatcher($path)
	{
		$routes = $this->getRoutes();
		foreach ($routes as $routeName => $route) 
		{
			$route['name'] = $routeName;

			//Si le nom de la route est exacte au path
			if($route['path'] == $path) 
			{
				if(isset($route['role']) && !isGranted($route['role'])) {
					throw new Erreur("Vous n'avez pas les droits nécessaires pour accéder à la route [".$route['name']."]");
					return false;
				}
				$_SERVER['CURRENT_ROUTE'] = $route;
				$this->redirectTo($route);
				return $route;
			}
			//Si la route contient des params
			elseif($params = $this->getParamsUrl($route['path']))
			{
				$findPathExploded = explode('/', $path);
				$searchPathExploded = explode('/', $route['path']);

				if(count($findPathExploded) === count($searchPathExploded))
				{		
					$match = true;
					$getParams = array();
					foreach ($searchPathExploded as $key => $segment) {
						if($segment != $findPathExploded[$key])
						{
							if($this->isParam($segment)) {
								$indexParam = trim($segment, '{}');
							
								if(empty($findPathExploded[$key]) && isset($route['params'][$indexParam]['default'] )) {
									$findPathExploded[$key] = $route['params'][$indexParam]['default'];
								}

								if(!in_array($indexParam, $params) ) {
									$match = false;
									break;
								}
								
								if(!isset($route['params'][$indexParam]['pattern'])) 
								{
									$match = false;
									break;
								}
								
								if(!preg_match('/'.$route['params'][$indexParam]['pattern'].'/', $findPathExploded[$key])) {
									$match = false;
									break;
								}
								else $getParams[$indexParam] = addslashes($findPathExploded[$key]);
							}
							else {
								$match = false;
								break;
							}
						}
						
					}

					if($match) {
						if(isset($route['role']) && !isGranted($route['role'])) {
							throw new Erreur("Vous n'avez pas les droits nécessaires pour accéder à la route [".$route['name']."]");
							return false;
						}
						$_SERVER['CURRENT_ROUTE'] = $route;
						$this->redirectTo($route, $getParams);
						return $route;
					}
				}
			}

		}
		echo ('Aucune route ne correspond à "'.$path.'"');
		// throw new Erreur('Aucune route ne correspond à "'.$path.'"');
		return false;
	}

	public function isParam($path) {
		return strpos($path, '{') !== false;
	}

	public function redirectTo($route, $params=null)
	{
		$cName = $route['controller']."Controller";
		if(file_exists(CTRL.$cName.".php"))
		{
			if(isset($route['action']))
			{
				$namespace = "\\Controllers\\".$cName;
				$ctrl = new $namespace();
				$action = $route['action']."Action";
				if(method_exists($ctrl, $action)) $ctrl->$action($params);
				else
				{
					throw new Erreur("L'action [".$action."] n'existe pas dans le controlleur [".$namespace."]");
					return false;
				}
			}
			else
			{
				throw new Erreur('La route "'.$route['path'].'" ne possède pas d\'action');
				return false;
			}
		}
		else
		{
			throw new Erreur('Le controlleur "'.$cName.'" n\'éxiste pas');
			return false;
		}

	}

	public function routeHandler($routeName, $params=null)
	{
		if($route = $this->routeExist($routeName))
		{
			$path = $route['path'];
			if($params) $path = $this->convertParams($route, $params);
			return $path;
		}
	}

	private function getRoutes()
	{
		return $this->routes;
	}

	public function getRouteByName($name)
	{
		$target = $this->routes[$name];
		if(isset($target)) return $target;

		throw new Erreur('La route "'.$name.'" n\'éxiste pas');
		return false;
	}

	private function convertParams($route, $params)
	{
		$path = $route['path'];

		if($indexParams = $this->getParamsUrl($path))
		{
			foreach ($indexParams as $index) {

				if(isset($params[$index]))
				{
					if(preg_match("/".$route['params'][$index]['pattern']."/", $params[$index]))
					{
						$path = preg_replace('#\{'.$index.'}#', $params[$index], $path);
					}
					else throw new Erreur('Le paramètre "'.$index.'" n\'est pas valide');
				}
				else throw new Erreur('Le paramètre "'.$index.'" n\'est pas renseigné');
			}
			return $path;
		}
	}

	private function getParamsUrl($url)
	{
		preg_match_all('#\{(\w+)}#', $url, $indexParams);
		if(empty($indexParams[1])) return false;
		return $indexParams[1];
	}


	public function routeExist($routeName)
	{
		$routes = $this->getRoutes();

		if(!isset($routes[$routeName]))
		{
			throw new Erreur('La route '.$routeName.' n\'est pas déclarée');
			return false;
		}
		return $routes[$routeName];
	}
}
?>