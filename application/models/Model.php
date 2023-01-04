<?php

use JetBrains\PhpStorm\Internal\ReturnTypeContract;

defined('BASEPATH') OR exit('No direct script access allowed');

class Model extends CI_Model {

	public function getDataUser()
	{
		$this->db->from('tb_user');
		$this->db->order_by('id_user', 'desc');
		return $this->db->get()->result();
		
	}

	public function addUser($data, $table)
	{
		$this->db->insert($table, $data);
	}
	public function editUser($id_user)
	{
		$this->db->where('id_user', $id_user);
		return $this->db->get('tb_user')->result();
	
	}
	public function updateUser($id_user, $data)
	{
		$this->db->where('id_user', $id_user);
		$this->db->update('tb_user', $data);
		
	}

	public function deleteUser($id)
	{
		$this->db->where('id_user', $id);
		$this->db->delete('tb_user');
		
	}

	public function getJurusan()
	{
		$this->db->from('tb_jurusan');
		$this->db->order_by('id_jurusan', 'desc');
		return $this->db->get()->result();
		
	}
	public function addJurusan($table,$data)
	{
		$this->db->insert($table,$data);
		
	}

	public function deleteJurusan($id_jurusan)
	{
		$this->db->where('id_jurusan',$id_jurusan);
		$this->db->delete('tb_jurusan');
	}

	public function editJurusan($id)
	{
		$this->db->where('id_jurusan', $id);
		return $this->db->get('tb_jurusan')->result_array();
		
		
	}
	public function updateJurusan($id, $data)
	{
		$this->db->where('id_jurusan', $id);
		$this->db->update('tb_jurusan', $data);
		
	}
	







}

/* End of file ModelName.php */

?>
