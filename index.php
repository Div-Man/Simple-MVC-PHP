<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 'on');


	
	include_once __DIR__ . "/components/Pagination.php";
	include_once __DIR__ . "/core/Model.php";
	include_once __DIR__ . "/App/Models/UsersModel.php";
	include_once __DIR__ . "/core/View.php";
	include_once __DIR__ . "/core/Controller.php";
	include_once __DIR__ . "/App/Controllers/UsersController.php";
	include_once __DIR__ . "/core/Router.php";
	include_once __DIR__ . "/App/routes.php";
	
	$router = new Router($routes);



	
