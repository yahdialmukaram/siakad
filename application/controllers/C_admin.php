<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_admin extends CI_Controller {

public function __construct()
{
	parent::__construct();
	$this->load->model('Model','model');
	$this->load->model('Model_guru','model_guru');
	date_default_timezone_set('Asia/jakarta');
	
	//Do your magic here
}

	public function index()
	{
		$data['title']='home';
		$this->load->view('admin/header',$data);
		$this->load->view('admin/home');
		$this->load->view('admin/footer');
	}

	public function v_data_user()
	{
		$data['title']='Data User';
		$this->load->view('admin/header',$data);
		$this->load->view('admin/v_data_user');
		$this->load->view('admin/footer');
	}
	
	public function getDataUser()
	{
		$data = $this->model->getDataUser();
		echo json_encode($data);
		// print_r($data);
	}

	public function addUser()
	{
		$username = $this->input->post('username');
		$this->form_validation->set_rules('username', 'username', 'trim|required',['required'=>'username wajib di isi']);
		$password=md5($this->input->post('password'));
		$this->form_validation->set_rules('password', 'password', 'trim|required',['required'=>'password wajib di isi']);
		$email = $this->input->post('email');
		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email',['valid_email'=>'masukan email yang benar']);
		$waktu = date(('d-m-Y h:i:s'));
		$level = $this->input->post('level');
		$this->form_validation->set_rules('level', 'level', 'trim|required',['required'=>'level wajib di isi']);
		
		if ($this->form_validation->run()==false) {
			$respon = [
				'status'=>'validation_error',
				'errors'=>$this->form_validation->error_array(),
			];
		}else {
			$data = [
				'username' =>$username,
				'password' =>$password,
				'email' =>$email,
				'waktu' =>$waktu,
				'level' =>$level,
			];
			
			$this->model->addUser($data,'tb_user');
			$respon = [
				'status'=>'success',
				'message'=>'data berhasil di simpan',
			];

		}
		echo json_encode($respon);
		
		
	}

	public function editUser()
	{
		$id_user = $this->input->post('id_user');
		$data = $this->model->editUser($id_user);
		echo json_encode($data);
	}

	public function updateUser()
	{

		$id_user =$this->input->post('id_user');
		$username =$this->input->post('username');
		$email =$this->input->post('email');
		$waktu = date(('d-m-Y h:i:s'));
		$password=md5($this->input->post('password'));	
		$data =[
			'username'=>$username,
			'email'=>$email,
			'waktu'=>$waktu,
			'password'=>$password
		];
		$data = $this->model->updateUser($id_user,$data);
		echo json_encode($data);	
	}

	public function deleteUser()
	{
		$id = $this->input->post('id_user');
		$data = $this->model->deleteUser($id);
		echo json_encode($data);
		
	}

	public function v_data_jurusan()
	{
		$data['title']='Data Jurusan';
		$this->load->view('admin/header',$data);
		$this->load->view('admin/v_data_jurusan');
		$this->load->view('admin/footer');
		

	}

	public function getJurusan()
	{
		$data = $this->model->getJurusan();
		echo json_encode($data);
	}

	public function addJurusan()
	{
		$kode_jurusan = $this->input->post('kode_jurusan');
		$this->form_validation->set_rules('kode_jurusan', 'kode jurusan', 'trim|required',['required'=>'kode jurusan wajib di isi']);
		
		$nama_jurusan = $this->input->post('nama_jurusan');
		$this->form_validation->set_rules('nama_jurusan','nama jurusan','required', ['required'=>'nama jurusan harus di isi']);
		if ($this->form_validation->run()== false) {
			$response = [
				'status' => 'validation_error',
				'errors' => $this->form_validation->error_array(),
			];
			
		}else {
			$data = [
				'kode_jurusan'=>$kode_jurusan,
				'nama_jurusan'=>$nama_jurusan,
			];
			$this->model->addJurusan('tb_jurusan', $data);
			$response = [
				'status'=>'success',
				'message'=>'berhasil du simpan',
			];
		}
			echo json_encode($response);
		
	}


	public function deletejurusan()
	{
		$id_jurusan = $this->input->post('id_jurusan');
		$data = $this->model->deleteJurusan($id_jurusan);
		echo json_encode($data);

		
	}
	public function editJurusan()
	{
		$id =$this->input->post('id_jurusan');
		$data =$this->model->editJurusan($id);
		echo json_encode($data);
		
	}
	public function updateJurusan()
	{
		$id = $this->input->post('id_jurusan');
		$kode_jurusan = $this->input->post('kode_jurusan');
		$nama_jurusan = $this->input->post('nama_jurusan');
		$data =[
			'kode_jurusan'=>$kode_jurusan,
			'nama_jurusan'=>$nama_jurusan,
		];
		$data = $this->model->updateJurusan($id,$data);
		echo json_encode($data);
		
	}
	public function v_data_guru()
	{
		$data['title']='Data Guru';
		$this->load->view('admin/header',$data);
		$this->load->view('admin/v_data_guru');
		$this->load->view('admin/footer');
	}
	function getGuru()
    {
        $list = $this->model_guru->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->nama_guru;
            $row[] = $field->alamat_guru;
            $row[] = $field->tgl_lahir_guru;
            $row[] = $field->jenis_kelamin_guru;
			$row[] =  '<a class="btn btn-success btn-sm"><i class="fa fa-edit"></i> </a>
            <a class="btn btn-danger btn-sm "><i class="fa fa-trash"></i> </a>';	
			
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->model_guru->count_all(),
            "recordsFiltered" => $this->model_guru->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }
	


}



?>
