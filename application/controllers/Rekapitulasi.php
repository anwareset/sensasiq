<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekapitulasi extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
	}
    
	public function index()
	{
		//$data['hitung'] = $this->model->count();
		//$data['posts'] = $this->model->index();
		$this->session->set_flashdata('activemenu','rekapitulasi');
 	   	$this->load->view('rekapitulasi');
	}
	
}
