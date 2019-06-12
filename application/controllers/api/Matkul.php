<?php
require APPPATH . 'libraries/REST_Controller.php';
class Matkul extends REST_Controller{
  // construct
  public function __construct(){
    parent::__construct();
    $this->load->model('MatkulM');
  }

  // method index untuk menampilkan semua data matkul dengan get
  public function index_get(){
    $response = $this->MatkulM->all_matkul();
    $this->response($response);
  }

  // hapus data matkul menggunakan method delete
  public function index_post(){
    $response = $this->MatkulM->the_matkul(
        $this->post('id_matkul')
      );
    $this->response($response);
  }

  // untusoen menambah matkul menggunakan method post
  public function add_post(){
    $response = $this->MatkulM->add_matkul(
        $this->post('nama_matkul')
      );
    $this->response($response);
  }

  // update data matkul menggunakan method put
  public function update_put(){
    $response = $this->MatkulM->update_matkul(
        $this->put('id_matkul'),
        $this->put('nama_matkul')
      );
    $this->response($response);
  }

  // hapus data matkul menggunakan method delete
  public function delete_delete(){
    $response = $this->MatkulM->delete_matkul(
        $this->delete('id_matkul')
      );
    $this->response($response);
  }
}

?>