<?php
require APPPATH . 'libraries/REST_Controller.php';
class Absen extends REST_Controller{
  // construct
  public function __construct(){
    parent::__construct();
    $this->load->model('AbsenM');
  }

  // method index untuk menampilkan semua data absen dengan get
  public function index_get(){
    $response = $this->AbsenM->all_absen();
    $this->response($response);
  }

  // menampilkan berdasarkan id_absen tertentu
  public function index_post(){
    $response = $this->AbsenM->the_absen(
        $this->post('id_absen')
      );
    $this->response($response);
  }

  // menampilkan history absen berdasarkan nim tertentu
  public function absen_post(){
    $response = $this->AbsenM->riwayat_absen(
        $this->post('nim')
      );
    $this->response($response);
  }

  // untuk menambah absen menggunakan method post
  public function add_post(){
    $response = $this->AbsenM->add_absen(
        $this->post('id_jadwal'),
        $this->post('id_qr'),
        $this->post('nim')
      );
    $this->response($response);
  }

  // update data absen menggunakan method put
  public function update_put(){
    $response = $this->AbsenM->update_absen(
        $this->put('id_absen'),
        $this->put('id_jadwal'),
        $this->put('id_qr'),
        $this->put('nim'),
        $this->put('waktu')
      );
    $this->response($response);
  }

  // hapus data absen menggunakan method delete
  public function delete_delete(){
    $response = $this->AbsenM->delete_absen(
        $this->delete('id_absen')
      );
    $this->response($response);
  }

  // cek apakah sudah absen
  public function cekabsen_post(){
    $response = $this->AbsenM->cek_absen(
        $this->post('nim'),
        $this->post('id_qr'),
        $this->post('id_jadwal')
      );
    $this->response($response);
  }
}

?>