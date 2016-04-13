<?php
require_once('/model/UserModel.php');
require_once('/model/PointModel.php');

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

	public function pointsTable(){
		$view = new View('pointsTable');
		$view->display();
	}

	public function addPoints(){
		$view = new View('addPoints');
		$view->display();
	}

	public function deletePoints($id){
		//TODO:: check if user is logged in
		$pointModel = new PointModel();
		if ($pointModel->doesGameRowExist($id)){
			$pointModel->deletePointRow($id);
		}
	}

	public function registerAction()
	{
		$check = false;

		if (empty($_POST ['password'])) {
			$this->fail("register", "Passwort wird bennötigt! ");
			$check1 = false;
		}else{
			$password = htmlspecialchars($_POST ['password']);
			$check1 = true;
		}

		if (empty($_POST ['repeatpassword'])) {
			$this->fail("register", "Passwort wiederholen! ");
			$check2 = false;
		}else{
			$password2 = htmlspecialchars($_POST ['repeatpassword']);
			$check2 = true;
		}

		if (empty($_POST ['name'])) {
			$this->fail("register", "Name wird bennötigt!  ");
			$check3 = false;
		}else{
			$name = htmlspecialchars($_POST ['name']);
			$check3 = true;
		}

		if (empty($_POST ['prename'])) {
			$this->fail("register", "Vorname wird bennötigt! ");
			$check4 = false;
		}else{
			$prename = htmlspecialchars($_POST ['prename']);
			$check4 = true;
		}

		if (empty($_POST ['username'])) {
			$this->fail("register", "Username wird bennötigt! ");
			$check5 = false;
		}else{
			$username = htmlspecialchars($_POST ['username']);
			$check5 = true;
		}

		$userModel = new UserModel();
		$users = $userModel->getUser($username);
		if($users->id != null) {
			$this->fail("register", "User existiert bereits! ");
		} else {
			if($password == $password2 && $check1 && $check2 && $check3 && $check4 && $check5) {
				$userModel = new UserModel();
				$user = $userModel->create($prename,$name,$username,$password);
				header ( 'location: /admin/register' );
			} else {
				$this->fail("register", "Passwörter stimmen nicht überein! ");
			}
		}
	}

	public function fail($seite, $fehlermeldung)
	{
		if($seite == "register") {
			$view = new View('register');
			$view->fail = true;
			$view->failText = $fehlermeldung;
			$view->display();
		} elseif ($seite == "login") {
			$view = new View('login');
			$view->fail = true;
			$view->failText = $fehlermeldung;
			$view->display();
		}
	}

	public function login()
	{
		if (isset($_POST ["username"]))
		{
			$username = $_POST ["username"];
			$password = $_POST ["password"];
			$model = new UserModel();
			$result = $model->getByUserAndPass($username, $password);
			if ($result == null)
			{
				$this->fail("login", "Fehler beim Anmelden");
			} else {
				$row = $result->fetch_object();
				$_SESSION ['username'] = $row->username;
				$_SESSION ['loggedin'] = true;
				header ( 'location: /admin/addPoints' );
			}
		}
	}

	public function logout()
	{
		unset($_SESSION['loggedin']);
		unset($_SESSION['username']);

		header ( 'location: /admin/');
	}

	public function __destruct()
	{
		$view = new View('adminFooter');
		$view->display();
	}
}
