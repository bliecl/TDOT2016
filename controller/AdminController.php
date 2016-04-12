<?php
require_once("/model/UserModel.php");

class AdminController
{
	public function __construct()
	{
		$view = new View('adminHeader', array('title' => 'Startseite', 'heading' => 'Startseite'));
		$view->display();
	}

	public function index()
	{
		$view = new View('login');
		$view->display();
	}

	public function register()
	{
		$view = new View('register');
		$view->display();
	}

	public function registerAction()
	{
		$check = false;

		if (empty($_POST ['password'])) {
			echo "Passwort wird bennötigt! ";
			$check1 = false;
		}else{
			$password = htmlspecialchars($_POST ['password']);
			$check1 = true;
		}

		if (empty($_POST ['repeatpassword'])) {
			echo "Passwort wird bennötigt! ";
			$check2 = false;
		}else{
			$password2 = htmlspecialchars($_POST ['repeatpassword']);
			$check2 = true;
		}

		if (empty($_POST ['name'])) {
			echo "Name wird bennötigt!  ";
			$check3 = false;
		}else{
			$name = htmlspecialchars($_POST ['name']);
			$check3 = true;
		}

		if (empty($_POST ['prename'])) {
			echo "Vorname wird bennötigt! ";
			$check4 = false;
		}else{
			$prename = htmlspecialchars($_POST ['prename']);
			$check4 = true;
		}

		if (empty($_POST ['username'])) {
			echo "Username wird bennötigt! ";
			$check5 = false;
		}else{
			$username = htmlspecialchars($_POST ['username']);
			$check5 = true;
		}

		if($password == $password2 && $check1 && $check2 && $check3 && $check4 && $check5) {
			$userModel = new UserModel();
			$user = $userModel->create($prename,$name,$username,$password);
			header ( 'location: /admin/register' );
		} else {
				echo "Passwörter stimmen nicht überein! ";
		}
	}

	public function __destruct()
	{
		$view = new View('adminFooter');
		$view->display();
	}
}
