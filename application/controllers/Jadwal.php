<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
		$this->load->model('JadwalM');
	}
    
	public function index()
	{
		$this->session->set_flashdata('activemenu','jadwal');
		$data['jadwal'] = $this->JadwalM->tampil_jadwal($this->session->nip);
    	$this->load->view('jadwal', $data);
	}

	public function updatejadwal($id_jadwal = null)
	{	
		if (empty($id_jadwal)) {
			redirect('jadwal');
		} else {
			$data['jadwalupdate'] = $this->JadwalM->tampil_jadwal_update($id_jadwal);
        	$this->load->view('updatejadwal', $data);
		}
	}

	public function update_jadwal(){
		$updatejadwal = array();
		$nip = $this->input->post('nip');
		$id_jadwal = $this->input->post('id_jadwal');
		$id_kelas = $this->input->post('id_kelas');
		$id_matkul = $this->input->post('id_matkul');
		$waktu = $this->input->post('waktu');
		if ((!empty($nip) && !empty($waktu) && !empty($id_matkul) && !empty($id_jadwal)) && !empty($id_kelas) ) {
			$data = array(
			   	'waktu'		=> $waktu,
			   	'id_kelas'	=> $id_kelas
			);
			$updatejadwal = array(
        		'pesan1' =>	'Berhasil memperbarui jadwal', 
        		'pesan2' =>	'success',
        		'pesan3' =>	'Sukses!',
        		'pesan4' =>	'btn btn-success'
        	);
			$this->JadwalM->update_jadwal_web($data, $id_jadwal);
		} else {
			$updateprofil = array(
        		'pesan1' =>	'Gagal memperbarui jadwal', 
        		'pesan2' =>	'error',
        		'pesan3' =>	'Error!',
        		'pesan4' =>	'btn btn-danger'
        	);
		}
		$this->session->set_flashdata('pesan', $updatejadwal);
		redirect('jadwal');
	}

	public function cetakjadwal()
	{
		$nis = $_POST['nis'];
		$data['posts'] = $this->model->tampil_jadwal("where nis = '$nis'");
    	$this->load->view('admin/cetakjadwal',$data);
	}
}
