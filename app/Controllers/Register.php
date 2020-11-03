<?php namespace App\Controllers;

use App\Models\UsersModel;
use CodeIgniter\Controller;

class Register extends Controller
{
	public function index()
	{
		$data['temp'] = 'register';
		echo view('layout', $data);
	}


	public function register()
	{
		$model = new UsersModel();
		$username = $this->request->getPost('username');
		$name = $this->request->getPost('name');
		$email = $this->request->getPost('email');
		$password = $this->request->getPost('password');
		$data = [
			'username' => $username,
			'name' => $name,
			'email' => $email,
			'password' => $password,
		];
		$a = $model->insert($data);
		echo json_encode($a);
	}


}