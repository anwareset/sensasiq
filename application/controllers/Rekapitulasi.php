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
		$data['kelas'] = $this->AbsenM->info_kelas($this->session->nip);
 	   	$this->load->view('rekapitulasi',$data);
	}

	public function cetak()
	{
		if (!empty($_POST['kelas'])) {
		$kelas = $_POST['kelas'];
		$data['cetak'] = $this->AbsenM->cetak_rekapitulasi($kelas);
    	$this->load->view('cetak_rekapitulasi',$data);
    	}else {
    		redirect('rekapitulasi');
    	}
	}
	
}
