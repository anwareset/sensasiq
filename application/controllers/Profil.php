<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Profil extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('DosenM');
	}

	public function index(){
    	$this->load->view('profil');
	}

	public function update(){
		$updateprofil = array();
		$nip = $this->input->post('nip');
		$nama_dosen = $this->input->post('nama_dosen');
		$password = $this->input->post('password');
		$password2 = $this->input->post('password2');
		if ((!empty($nip) && !empty($nama_dosen) && !empty($password) && !empty($password2)) && ($password == $password2) ) {
			$data = array(
			   	'nama_dosen' => $nama_dosen,
			   	'password' => md5($password)
			);
			$updateprofil = array(
        		'pesan1' =>	'Berhasil memperbarui informasi akun', 
        		'pesan2' =>	'success',
        		'pesan3' =>	'Sukses!',
        		'pesan4' =>	'btn btn-success'
        	);
			$this->DosenM->update_profil($data, $nip);
		} else {
			$updateprofil = array(
        		'pesan1' =>	'Gagal memperbarui informasi akun', 
        		'pesan2' =>	'error',
        		'pesan3' =>	'Error!',
        		'pesan4' =>	'btn btn-danger'
        	);
		}
		$this->session->set_flashdata('pesan', $updateprofil);
		redirect('profil');
	}
}
