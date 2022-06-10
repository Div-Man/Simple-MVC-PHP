<?php

class Router {

	public $controller;
	public $method;
	public $id = 0;
	
	public function __construct($routes)
	{

	$urlBrowser = $_SERVER['REQUEST_URI'];

	if($urlBrowser == "/"){
		$indexPage = new View();
		$indexPage->render('index', []);
		
	}

	else{
		
		$urlBrowser = parse_url($urlBrowser, PHP_URL_QUERY);

		
		$urlArr = explode("&", $urlBrowser);
		
		if (array_key_exists($urlArr[0], $routes)) {
			
			$controllerMethod = explode("=", $urlArr[0]);
			
			$this->controller = $controllerMethod[0];
			$this->method = $controllerMethod[1];
			
			if(count($urlArr) > 1){
				$key2 = explode("=", $urlArr[1]);
	
				if($key2[0] == "id"){
					$this->id = $key2[1];

				}
				
				else if($key2[0] == "page"){
					$this->id = $key2[1];
					
				}	
			}

			
			return $this->getController();
			
		}

		else{
			$page404 = new View();
			$page404->render('404', []);
		}	
		
	}
		
	}

	
	public function getController()
	{	
	
		$cont = new Controller();
		return $cont->getController($this->controller, $this->method, $this->id);
	}
	
}