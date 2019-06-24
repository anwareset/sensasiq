<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekapitulasi extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
		$this->load->model('AbsenM');
	}
    
	public function index()
	{
		$this->session->set_flashdata('activemenu','rekapitulasi');
		$data['rekap'] = $this->AbsenM->tampil_rekapitulasi($this->session->nip);
 	   	$this->load->view('rekapitulasi',$data);
	}
	
}
