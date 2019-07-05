<?php
require APPPATH . 'libraries/REST_Controller.php';
class Qr extends REST_Controller{
  // construct
  public function __construct(){
    parent::__construct();
    $this->load->model('QrM');
  }

  // method index untuk menampilkan semua data qr dengan get
  public function index_get(){
    $response = $this->QrM->all_qr();
    $this->response($response);
  }

  // hapus data qr menggunakan method delete
  public function index_post(){
    $response = $this->QrM->the_qr(
        $this->post('id_qr')
      );
    $this->response($response);
  }

  // untuk menambah qr menggunakan method post
  public function add_post(){
    $response = $this->QrM->add_qr(
        $this->post('nip'),
        $this->post('qr'),
        $this->post('nip')
      );
    $this->response($response);
  }

  // update data qr menggunakan method put
  public function update_put(){
    $response = $this->QrM->update_qr(
        $this->put('id_qr'),
        $this->put('nip'),
        $this->put('qr')
      );
    $this->response($response);
  }

  // hapus data qr menggunakan method delete
  public function delete_delete(){
    $response = $this->QrM->delete_qr(
        $this->delete('id_qr')
      );
    $this->response($response);
  }

  //pencocokan
  public function cocok_post(){
    $response = $this->QrM->cocok_qr(
      $this->post('qr')
    );
   $this->response($response); 
  }
  
}

?>