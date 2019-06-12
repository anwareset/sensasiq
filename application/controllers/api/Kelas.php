<?php
require APPPATH . 'libraries/REST_Controller.php';
class Kelas extends REST_Controller{
  // construct
  public function __construct(){
    parent::__construct();
    $this->load->model('KelasM');
  }

  // method index untuk menampilkan semua data kelas dengan get
  public function index_get(){
    $response = $this->KelasM->all_kelas();
    $this->response($response);
  }

  // hapus data kelas menggunakan method delete
  public function index_post(){
    $response = $this->KelasM->the_kelas(
        $this->post('id_kelas')
      );
    $this->response($response);
  }

  // untuk menambah kelas menggunakan method post
  public function add_post(){
    $response = $this->KelasM->add_kelas(
        $this->post('nama_kelas')
      );
    $this->response($response);
  }

  // update data kelas menggunakan method put
  public function update_put(){
    $response = $this->KelasM->update_kelas(
        $this->put('id_kelas'),
        $this->put('nama_kelas')
      );
    $this->response($response);
  }

  // hapus data kelas menggunakan method delete
  public function delete_delete(){
    $response = $this->KelasM->delete_kelas(
        $this->delete('id_kelas')
      );
    $this->response($response);
  }
}

?>