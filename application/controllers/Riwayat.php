<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
		$this->load->model('AbsenM');
	}
    
	public function index()
	{
		$data['riwayat'] = $this->AbsenM->tampil_riwayat($this->session->nip);
		$this->session->set_flashdata('activemenu','riwayat');
 	   	$this->load->view('riwayat',$data);
	}
	
}