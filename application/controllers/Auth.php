<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('AuthM');
	}

	public function index(){
	    if($this->session->userdata('authenticated')) {
    	  redirect('dashboard');
    	} else {
    	  $this->load->view('login');
    	}
	}

	public function login(){
    	$nip = $this->input->post('nip');
    	$password = md5($this->input->post('password')); 
    	$user = $this->AuthM->get($nip); 
		
		if(empty($user)){ 
			$this->session->set_flashdata('message', 'Username tidak ditemukan');
			redirect('auth');
    	} else {
    		if($password == $user->password){ 
        	$session = array(
        		'authenticated'	=>	TRUE, 
        		'nip'			=>	$user->nip,
        		'nama_dosen'	=>	$user->nama_dosen,
        		'password'		=>	$user->password,
        	);

	        $this->session->set_userdata($session);
	        redirect('dashboard'); 
	    	} else {
	        	$this->session->set_flashdata('message', 'Password salah');
	        	redirect('auth');
	      	}
	    }
	}

	public function logout(){
		$this->session->sess_destroy();
		$this->session->set_flashdata('Anda telah keluar.');
		redirect('auth');
	}
}
