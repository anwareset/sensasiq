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
		$response = $this->DosenM->update_profil(
			$this->put('nip'),
			$this->put('nama_dosen'),
			$this->put('password');
		);
		$this->response($response);
	}
}
