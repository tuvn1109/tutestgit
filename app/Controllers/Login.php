<?php namespace App\Controllers;

use App\Models\UsersModel;

class Login extends BaseController
{
	private function setUserSession($user)
	{
		$data = [
			'id' => $user['id'],
			'fullname' => $user['fullname'],
			'username' => $user['username'],
			'email' => $user['email'],
			'isLoggedIn' => true,
		];

		session()->set(['user' => $data]);
		return true;
	}

	public function index()
	{
		echo view('templates/header');
		if (session('user')) {
			echo view('login');
		} else {
			echo view('login');
		}
		echo view('templates/footer');

	}

	public function checklogin()
	{
		$model = new UsersModel();
		$username = $this->request->getPost('username');
		$password = $this->request->getPost('password');
		$user = $model->getUserByUsername($username, $password);
		if ($user) {
			$this->setUserSession($user);
			return '1';
		} else {
			return '0';
		}
	}

	public function logout()
	{
		session()->destroy();
		return redirect()->to('');
	}
	//--------------------------------------------------------------------

}
