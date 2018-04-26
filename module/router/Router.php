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
						if( isset($route['accessibility']) ) $childRoute['accessibility'] = $route['accessibility'];
						if(isset($route['prefix'])) $childRoute['path'] = $route['prefix'].DS.$childRoute['path'];
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
		foreach ($routes as $route) 
		{
			if($route['path'] == $path) 
			{
				$this->redirectTo($route);
				return $route;
			}
			elseif($params = $this->getParamsUrl($route['path']))
			{
				$findPathExploded = explode('/', $path);
				$searchPathExploded = explode('/', $route['path']);
				if(count($findPathExploded) == count($searchPathExploded))
				{
					foreach ($searchPathExploded as $key => $segment) {
						if($segment != $findPathExploded[$key] && in_array(trim($segment, '{}'), $params))
						{
							$indexParam = trim($segment, '{}');
							if(isset($route['params'][$indexParam]['pattern']) && preg_match('/'.$route['params'][$indexParam]['pattern'].'/', $findPathExploded[$key])) 
							{
								//TO DO a enlever de commentaire quand la session d'utilisateur sera prete
								// if(isset($route['accessibility'])) hasRole($route['accessibility'])
								$this->redirectTo($route);
								return $route;
							}
						}
					}
				}
			}

		}
		throw new Erreur('Aucune route ne correspond à "'.$path.'"');
		return false;
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
				if(method_exists($ctrl, $action)) $ctrl->$action();
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