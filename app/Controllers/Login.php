<?php namespace App\Controllers;

class Login extends BaseController
{
	public function index()
	{
		echo view('templates/header');
		echo view('login');
		echo view('templates/footer');

	}

	//--------------------------------------------------------------------

}
