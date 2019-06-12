<?php
require APPPATH . 'libraries/REST_Controller.php';
class Dosen extends REST_Controller{
  // construct
  public function __construct(){
    parent::__construct();
    $this->load->model('DosenM');
  }

  // method index untuk menampilkan semua data dosen dengan get
  public function index_get(){
    $response = $this->DosenM->all_dosen();
    $this->response($response);
  }

  // hapus data dosen menggunakan method delete
  public function index_post(){
    $response = $this->DosenM->the_dosen(
        $this->post('nip')
      );
    $this->response($response);
  }

  // untuk menambah dosen menggunakan method post
  public function add_post(){
    $response = $this->DosenM->add_dosen(
        $this->post('nip'),
        $this->post('nama_dosen'),
        $this->post('password')
      );
    $this->response($response);
  }

  // update data dosen menggunakan method put
  public function update_put(){
    $response = $this->DosenM->update_dosen(
        $this->put('nip'),
        $this->put('nama_dosen'),
        $this->put('password')
      );
    $this->response($response);
  }

  // hapus data dosen menggunakan method delete
  public function delete_delete(){
    $response = $this->DosenM->delete_dosen(
        $this->delete('nip')
      );
    $this->response($response);
  }
}

?>