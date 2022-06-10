<?php

class UsersModel extends Model
{
	public function getUserId($id)
	{
		$usersEmpty = true;
		
		$sql = "SELECT * FROM users WHERE id = " . $id . ";";

		$result = [];

		$result = $this->pdo->query($sql, PDO::FETCH_ASSOC)->fetch();

		$users = ["id" => "", "name" => ""];

		
		if(!empty($result)){
			$users['id'] = $result['id'];
			$users['name'] = $result['name'];
			$usersEmpty = false;
		}
	

		return ["users" => $users, "usersEmpty" => $usersEmpty];
	}

	public function allUsers($page = 0, $limit)
	{
		
		$offset = ($page-1) * $limit;

		$sql = "SELECT * FROM users LIMIT " . $limit . " OFFSET " . $offset;
		
		$result = $this->pdo->query($sql,PDO::FETCH_ASSOC)->fetchAll();

		return $result;
	}

	public function addUser($request)
	{
		$name = $request["name"];
		$age = $request["age"];

		$sql = "INSERT INTO users (name, age) VALUES('". $name . "', '" . $age . "');";
		$this->pdo->query($sql);
	}

	public function countUsers()
	{
		$sql = "SELECT count(*) FROM users;";
		$result = $this->pdo->query($sql)->fetchColumn();
		return $result;
	}
}