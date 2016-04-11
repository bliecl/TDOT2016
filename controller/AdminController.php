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
		$view = new View('default_index');
		$view->display();
	}

	public function __destruct()
	{
		$view = new View('adminFooter');
		$view->display();
	}
}
