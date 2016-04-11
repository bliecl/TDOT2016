<?php

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

	public function addPoints()
	{
		$view = new View('addPoints');
		$view->display();
	}

	public function pointsTable()
	{
		$view = new View('pointsTable');
		$view->display();
	}

	public function __destruct()
	{
		$view = new View('adminFooter');
		$view->display();
	}
}
