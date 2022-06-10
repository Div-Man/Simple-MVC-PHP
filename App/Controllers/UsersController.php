<?php

class UsersController extends Controller
{
	public $offset;
	
	public function __construct($method, $id)
	{
		$this->offset = $id;
		$this->$method($id);
	}

	public function index()
	{
		$view = new View();
		$view->render('index', [], []);
	}
	
    public function getAll()
    {
    		$limit = 3; //это можно менять (количество строк на страницу)
		$model = new UsersModel();
		$users = $model->allUsers($this->offset, $limit);

		$counAllUsers = $model->countUsers();

		


		$pagination = new Pagination($counAllUsers, $limit);

    		$view = new View();
    		$view->render('users', [
    						"users" => $users, 
    						"pagination" => $pagination
    						]);
    		
    }

    public function getUserId($id)
    {
    		
    		$model = new UsersModel();
    		$data = $model->getUserId($id);


		if($data["usersEmpty"]){
			$view = new View();
			$view->render('error');
		}
		
		$view = new View();
		$view->render('getUser', $data);
    }

    public function add()
    {
    		$view = new View();
    		$view->render("add", []);
    }

    public function newUser()
    {
    		$model = new UsersModel();
    		$model->addUser($_POST);
    		
    		header('Location: http://localhost/?users=getAll&page=1');
    		exit;
    		
    }



}
