<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Generate extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
		$this->load->model('JadwalM');
		$this->load->model('QrM');
	}
    
	public function index()
	{
		//$data['hitung'] = $this->model->count();
		//$data['posts'] = $this->model->index();
		$this->session->set_flashdata('activemenu','generate'); // Untuk active sidebar dinamis
 	   	$data['jadwal'] = $this->JadwalM->tampil_jadwal($this->session->nip);
 	   	$this->load->view('generate', $data);
	}

	public function generated(){
		$sweetAlertQr = array();  // Untuk sweetalert dinamis
		$id_jadwal = $this->input->post('id_jadwal');
		if (!empty($id_jadwal)) {
			$sweetAlertQr = array(
        		'pesan1' =>	'Berhasil generate QR Code', 
        		'pesan2' =>	'success',
        		'pesan3' =>	'Sukses!',
        		'pesan4' =>	'btn btn-success'
        	);
        	$data['datajadwal'] = $this->JadwalM->tampil_jadwal_update($id_jadwal);
			$this->QrM->generateQr($data);
		} else {
			$sweetAlertQr = array(
        		'pesan1' =>	'Gagal generate QR Code', 
        		'pesan2' =>	'error',
        		'pesan3' =>	'Error!',
        		'pesan4' =>	'btn btn-danger'
        	);
		}
		$this->session->set_flashdata('pesan', $sweetAlertQr); // Untuk sweetalert dinamis
		$this->load->view('generated');
	}
	
}
