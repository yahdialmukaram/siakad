<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_login extends CI_Model {

	public function check_login($username, $password)
	{
		$this->db->from('tb_user');
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		return $this->db->get();
		
	}

}

/* End of file ModelName.php */


?>