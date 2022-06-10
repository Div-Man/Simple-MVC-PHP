<?php

class Model {
	public $pdo;
	private $host = 'localhost';
	private $db   = 'postgres';
	private $user = 'mexatpoh11';
	private $pass = '123456';
	private $charset = 'utf8';

	public function __construct()
	{
		$dsn = "pgsql:host=$this->host;port=5432;dbname=$this->db;";
		
		$this->pdo = new PDO($dsn, $this->user, $this->pass);
	}

}
