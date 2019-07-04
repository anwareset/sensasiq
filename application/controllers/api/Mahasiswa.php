<?php
require APPPATH . 'libraries/REST_Controller.php';
class Mahasiswa extends REST_Controller{
  // construct
  public function __construct(){
    parent::__construct();
    $this->load->model('MahasiswaM');
  }

  // method index untuk menampilkan semua data mahasiswa dengan get
  public function index_get(){
    $response = $this->MahasiswaM->all_mahasiswa();
    $this->response($response);
  }

  // hapus data mahasiswa menggunakan method delete
  public function index_post(){
    $response = $this->MahasiswaM->the_mahasiswa(
        $this->post('nim')
      );
    $this->response($response);
  }

  // untusoen menambah mahasiswa menggunakan method post
  public function add_post(){
    $response = $this->MahasiswaM->add_mahasiswa(
        $this->post('nim'),
        $this->post('nama_mahasiswa'),
        $this->post('password'),
        $this->post('device_id'),
        $this->post('id_kelas')
      );
    $this->response($response);
  }

  // update data mahasiswa menggunakan method put
  public function update_put(){
    $response = $this->MahasiswaM->update_mahasiswa(
        $this->put('nim'),
        $this->put('password')
      );
    $this->response($response);
  }

  // mendaftarkan Device ID jika belum terdaftar
  public function device_put(){
    $response = $this->MahasiswaM->device_mahasiswa(
        $this->put('nim'),
        $this->put('device_id')
      );
    $this->response($response);
  }

  // hapus data mahasiswa menggunakan method delete
  public function delete_delete(){
    $response = $this->MahasiswaM->delete_mahasiswa(
        $this->delete('nim')
      );
    $this->response($response);
  }
}

?>