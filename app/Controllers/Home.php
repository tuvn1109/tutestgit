<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$data['temp'] = 'homenew';
		echo view('layout', $data);
	}

	//--------------------------------------------------------------------

}
