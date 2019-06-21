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
		$kelas = $this->input->post('kelas');
		$waktu = $this->input->post('waktu');
		$matkul = $this->input->post('matkul');
		if (!empty($id_jadwal)) {
			$data = array(
			   	'waktu'		=> $waktu,
			   	'matkul'	=> $matkul,
			   	'kelas'		=> $kelas,
			   	'nip'		=> $this->session->nip
			);
			$sweetAlertQr = array(
        		'pesan1' =>	'Berhasil memperbarui jadwal', 
        		'pesan2' =>	'success',
        		'pesan3' =>	'Sukses!',
        		'pesan4' =>	'btn btn-success'
        	);
			$this->QrM->generateQr($data, $id_jadwal);
		} else {
			$sweetAlertQr = array(
        		'pesan1' =>	'Gagal memperbarui jadwal', 
        		'pesan2' =>	'error',
        		'pesan3' =>	'Error!',
        		'pesan4' =>	'btn btn-danger'
        	);
		}
		$this->session->set_flashdata('pesan', $sweetAlertQr); // Untuk sweetalert dinamis
		redirect('aktivitas');
	}
	
}
