<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bantuan extends CI_Controller {

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
		$this->load->view('tentang');
	}
	public function faq()
	{
		$this->load->view('faq');
	}
}
