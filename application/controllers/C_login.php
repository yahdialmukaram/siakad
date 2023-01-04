<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_login extends CI_Controller {

public function __construct()
{
	parent::__construct();
	//Do your magic here
}

	public function index()
	{
		$data['title']='login';
		$this->load->view('login/login.php',$data);
	}

	public function aksi_login()
	{
		$email= $this->input->post('email');
		$username = htmlspecialchars($this->input->post('username', true), ENT_QUOTES);
        $password = htmlspecialchars($this->input->post('password', true), ENT_QUOTES);

		$checkEmail= $this->model_login->check_login($email, hash('md5', $password));
		if ($checkEmail->num_rows()=='0') {
			# code...
		}
		
	}

}



?>
