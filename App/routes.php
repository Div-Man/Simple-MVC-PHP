<?php
	return $routes = [
		"/" => ["users", "index"],
		"users=getAll" => ["users", "getAll"],
		"users=getUserId" => ["users", 'getUserId'],
		"users=add" => ["users", "add"],
		"users=newUser" => ["users", "newUser"]
	];
	
