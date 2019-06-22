<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
		$this->load->model('JadwalM');
	}
    
	public function index()
	{
		$data['kelas'] = $this->JadwalM->count($this->session->nip);
		$data['mahasiswa'] = $this->JadwalM->count_mahasiswa($this->session->nip);
		//$data['posts'] = $this->model->index();
		$this->session->set_flashdata('activemenu','dashboard');
 	   	$this->load->view('dashboard',$data);
	}
	
}
