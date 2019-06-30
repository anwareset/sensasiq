<?php
require APPPATH . 'libraries/REST_Controller.php';
class Jadwal extends REST_Controller{
  // construct
  public function __construct(){
    parent::__construct();
    $this->load->model('JadwalM');
  }

  // method index untuk menampilkan semua data jadwal dengan get
  public function index_get(){
    $response = $this->JadwalM->all_jadwal();
    $this->response($response);
  }

  // hapus data jadwal menggunakan method delete
  public function index_post(){
    $response = $this->JadwalM->the_jadwal(
        $this->post('id_jadwal')
      );
    $this->response($response);
  }

  // untuk menambah jadwal menggunakan method post
  public function add_post(){
    $response = $this->JadwalM->add_jadwal(
        $this->post('id_matkul'),
        $this->post('id_kelas'),
        $this->post('nip'),
        $this->post('waktu')
      );
    $this->response($response);
  }

  // update data jadwal menggunakan method put
  public function update_put(){
    $response = $this->JadwalM->update_jadwal(
        $this->put('id_jadwal'),
        $this->put('id_matkul'),
        $this->put('id_kelas'),
        $this->put('nip'),
        $this->put('waktu'),
      );
    $this->response($response);
  }

  // hapus data jadwal menggunakan method delete
  public function delete_delete(){
    $response = $this->JadwalM->delete_jadwal(
        $this->delete('id_jadwal')
      );
    $this->response($response);
  }

  public function jadwal_post(){
    $response = $this->JadwalM->mahasiswa_jadwal(
        $this->post('nim')
    );
    $this->response($response);
  }
}

?>