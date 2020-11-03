<?php namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
	protected $table = 'users';
	protected $primaryKey = 'id';
	protected $returnType = 'array';
	protected $useSoftDeletes = false;
	protected $allowedFields = [];
	protected $useTimestamps = false;
	protected $protectFields = false;
	protected $createdField = 'created_at';
	protected $updatedField = 'updated_at';
	protected $deletedField = 'deleted_at';
	protected $validationRules = [
		'username' => 'required|alpha_numeric_space|min_length[3]',];
	protected $validationMessages = [
		'username' => [
			'required' => 'Tên người dùng trống',
			'min_length[3]' => 'Sai tài khoản',
		]
	];
	protected $skipValidation = false;
	protected $selectFields = ['users.id', 'username', 'password'];

	public function getUserByUsername($username, $password)
	{
		$query = $this->select($this->selectFields);
		$query = $query->where('username', $username);
		$query = $query->Where('password', $password);
		return $query->get()->getRowArray();
	}

	public function getUserById($userID)
	{
		$query = $this->select($this->selectFields);
		return $query->get($userID)->getRowArray();
	}
}

?>
