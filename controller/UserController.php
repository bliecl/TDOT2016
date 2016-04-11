<?php

require_once('model/UserModel.php');

class UserController
{

	public function __construct()
	{
		$view = new View('header', array('title' => 'Benutzer', 'heading' => 'Benutzer'));
		$view->display();
	}

	public function index()
	{
		$userModel = new UserModel();

		$view = new View('user_index');
		$view->users = $userModel->readAll();
		$view->display();
	}

	public function create()
	{
		$view = new View('user_create');
		$view->display();
	}

	public function doCreate()
	{
		if ($_POST['send']) {
			$firstName = $_POST['firstName'];
			$lastName  = $_POST['lastName'];
			$email     = $_POST['email'];
			$password  = $_POST['password'];

			$userModel = new UserModel();
			$userModel->create($firstName, $lastName, $email, $password);
		}

		$this->index();
	}

	public function delete($id)
	{
		$userModel = new UserModel();
		$userModel->deleteById($id);

		$this->index();
	}

	public function __destruct(){
		$view = new View('footer');
		$view->display();
	}
}
