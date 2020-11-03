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

		if ($username && $name && $email && $password) {
			//$checkuser = false;
			$checkuser = $model->getUserByName($username);
			if ($checkuser) {
				$return = [
					'code' => 'username_already_exists',
					'msg' => "username already exists",
					'stt' => false,
				];
			} else {
				$data = [
					'username' => $username,
					'name' => $name,
					'email' => $email,
					'password' => $password,
				];
				$a = $model->insert($data);

				$return = [
					'code' => 'register_successfully',
					'msg' => "register successfully",
					'stt' => true,
				];
			}

		} else {
			$return = [
				'code' => 'missing_field_require',
				'msg' => "Unable to register",
				'stt' => false,
			];

		}
		echo json_encode($return);
	}


}