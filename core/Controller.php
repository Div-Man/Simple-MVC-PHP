<?php

class Controller {
	
	public function getController($controller, $method, $id)
	{
		$controller = ucfirst($controller) . "Controller";
		return new $controller($method, $id);
	}

}