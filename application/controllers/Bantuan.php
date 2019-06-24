<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bantuan extends CI_Controller {

	public function __construct() 
    {
      	parent::__construct();
    }

	public function index()
	{
		if ($this->session->userdata('authenticated')) {
			redirect('dashboard');
		} else {
			$this->session->set_userdata('authenticated', 'TRUE');
			$this->load->view('bantuan');
		}
	}
	public function tentang()
	{
		if ($this->session->userdata('authenticated')) {
			redirect('dashboard');
		} else {
			$this->session->set_userdata('authenticated', 'TRUE');
			$this->load->view('tentang');
		}
	}

	public function kontak(){
		$flashdataSweetAlert = array();
		$belok = NULL;
		$dataKontak = array(
				'nip' => $this->input->post('nip'),
				'nama' => $this->input->post('nama_dosen'),
				'email' => $this->input->post('email'),
				'permintaan' => $this->input->post('permintaan'),
				'keterangan' => $this->input->post('keterangan')
			);
		if (!array_filter($dataKontak)) {
			$flashdataSweetAlert = array(
        		'pesan1' =>	'Harap mengisi form dengan benar!', 
        		'pesan2' =>	'error',
        		'pesan3' =>	'Error!',
        		'pesan4' =>	'btn btn-danger'
        	);
        	$belok = 'bantuan';
		} else {
        	$flashdataSweetAlert = array(
        		'pesan1' =>	'Admin akan segera menghubungi anda', 
        		'pesan2' =>	'success',
        		'pesan3' =>	'Permintaan terkirim!',
        		'pesan4' =>	'btn btn-success'
        	);
        	$belok = 'auth';
		}
		$this->session->set_flashdata('pesan', $flashdataSweetAlert);
		redirect($belok);
	}


}
