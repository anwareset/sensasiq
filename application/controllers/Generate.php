<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Generate extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
		$this->load->model('JadwalM');
		$this->load->model('QrM');
		$this->load->library('ciqrcode');
	}
    
	public function index()
	{
		if (!empty($this->session->file)) {
			unlink($_SERVER['DOCUMENT_ROOT'].'/sensasiq/assets/qrimg/'.$this->session->file);
			$this->session->unset_userdata('file');
		}
		$this->session->set_flashdata('activemenu','generate'); // Untuk active sidebar dinamis
 	   	$data['jadwal'] = $this->JadwalM->tampil_jadwal($this->session->nip);
 	   	$this->load->view('generate', $data);
	}
	public function generated(){		
		$id_jadwal = $this->input->post('id_jadwal');
		if (!empty($id_jadwal)) {			
        	$data['datajadwal'] = $this->JadwalM->tampil_jadwal_update($id_jadwal);
        	foreach ($data as $dataJadwal) :
		      $datainsert = array(
		        "nip" => $dataJadwal[0]['nip'],
		        "qr"  => $qrRaw = md5($this->encryption->encrypt($dataJadwal[0]['nama_matkul']."-".$dataJadwal[0]['nama_kelas']."-".$dataJadwal[0]['nip']."-".$dataJadwal[0]['waktu']))
		      );
		    endforeach;
		    $lokasiFileQr = $_SERVER['DOCUMENT_ROOT'].'/sensasiq/assets/qrimg/';
			$file_name = $qrRaw.".png";
			$tempdir = $lokasiFileQr.$file_name;
			QRcode::png($qrRaw,$tempdir,QR_ECLEVEL_H,15,0);
			$this->QrM->generateQr($datainsert);
			$infoQr = array(
				"fileQr"	=> $file_name,
				"qr"		=> $qrRaw,
			);				
			$session['file'] = $file_name;
			$this->session->set_userdata('file', $file_name);					
			$this->load->view('generated', $infoQr);
		} else {				
			redirect('generate');
		}
	}
	public function generated_refresh($qr){	
		$data = array(
			"nip"	=>	$this->session->nip,
			"qr"	=>	$qr,			
		);
		$dataQr['dataQr'] = $this->QrM->updateQr($data);			
		foreach ($dataQr as $datanya) :
		    $dataku = array(
		        "nip" => $datanya[0]['nip'],
		        "qr"  => $qrRaw = $datanya[0]['qr'],		        
		    );
		endforeach;
		$lokasiFileQr = $_SERVER['DOCUMENT_ROOT'].'/sensasiq/assets/qrimg/';		
		$file_name = $qrRaw.".png";
		$tempdir = $lokasiFileQr.$file_name;
		QRcode::png($qrRaw,$tempdir,QR_ECLEVEL_H,15,0);
		$infoQr = array(
			"fileQr"	=> $file_name,
			"qr"		=> $qrRaw,
		);
		$session['file'] = $file_name;
		$this->session->set_userdata($session);
		$this->load->view('generated_qr_img', $infoQr);
	}
	
}