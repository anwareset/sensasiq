<?php
// extends class Model
class AbsenM extends CI_Model{

  // response jika field ada yang kosong
  public function empty_response(){
    $response['status']=502;
    $response['error']=true;
    $response['message']='Field tidak boleh kosong';
    return $response;
  }

  // function untuk insert data ke tabel tbabsen
  public function add_absen($id_jadwal, $id_qr, $nim){
    if(empty($id_jadwal) || empty($id_qr) || empty($nim)){
      return $this->empty_response();
    }else{
      $data = array(
        "id_jadwal"=>$id_jadwal,
        "id_qr"=>$id_qr,
        "nim"=>$nim
      );
      $insert = $this->db->insert("tbabsen", $data);
      if($insert){
        $response['status']=200;
        $response['error']=false;
        $response['message']='Data absen ditambahkan.';
        return $response;
      }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Data absen gagal ditambahkan.';
        return $response;
      }
    }
  }

  // mengambil semua data absen
  public function all_absen(){
    $all = $this->db->get("tbabsen")->result();
    $response['status']=200;
    $response['error']=false;
    $response['absen']=$all;
    return $response;
  }

  // mengambil data absen berdasarkan id_absen tertentu
  public function the_absen($id_absen){
    if($id_absen == ''){
      $all = $this->db->get("tbabsen")->result();
      $response['status']=200;
      $response['error']=false;
      $response['absen']=$all;
      return $response;
    }else{
      $where = array(
        "id_absen"=>$id_absen
      );
      $this->db->where($where);
      $theid = $this->db->get("tbabsen")->result();
      if($theid){
        $response['status']=200;
        $response['error']=false;
        $response['absen']=$theid;
        return $response;
      }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Data absen gagal ditampilkan.';
        return $response;
      }
    }
  }


  // mengambil data absen berdasarkan nim tertentu
  public function riwayat_absen($nim){
    if($nim == ''){
      return $this->empty_response();
    }else{
      $this->db->select('tbabsen.waktu as waktu, tbmatkul.nama_matkul as nama_matkul, tbdosen.nama_dosen as nama_dosen');
      $this->db->from('tbjadwal');
      $this->db->join('tbmatkul','tbmatkul.id_matkul = tbjadwal.id_matkul');
      $this->db->join('tbdosen', 'tbdosen.nip = tbjadwal.nip');
      $this->db->join('tbkelas','tbkelas.id_kelas = tbjadwal.id_kelas');
      $this->db->join('tbabsen','tbabsen.id_jadwal = tbjadwal.id_jadwal');
      $this->db->join('tbmahasiswa', 'tbmahasiswa.nim = tbabsen.nim');
      $this->db->join('tbqr', 'tbqr.id_qr = tbabsen.id_qr');
      $this->db->where('tbabsen.nim', $nim);
      $theid = $this->db->get()->result();
      if($theid){
        return $theid;
      }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Data absen gagal ditampilkan.';
        return $response;
      }
    }
  }

  // cek apakah sudah absen
  public function cek_absen($nim, $id_qr, $id_jadwal){
    if(empty($nim) || empty($id_qr) || empty($id_jadwal)){
      return $this->empty_response();
    }else{
      $where = array(
        "nim"=>$nim,
        "id_qr"=>$id_qr,
        "id_jadwal"=>$id_jadwal
      );
      $this->db->where($where);
      $theid = $this->db->get("tbabsen")->result();
      if($theid){
        $response['status']=200;
        $response['error']=false;
        $response['absen']=$theid;
        return $response;
      }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Data absen gagal ditampilkan.';
        return $response;
      }
    }
  }

  
  // hapus data absen
  public function delete_absen($id_absen){
    if($id_absen == ''){
      return $this->empty_response();
    }else{
      $where = array(
        "id_absen"=>$id_absen
      );
      $this->db->where($where);
      $delete = $this->db->delete("tbabsen");
      if($delete){
        $response['status']=200;
        $response['error']=false;
        $response['message']='Data absen dihapus.';
        return $response;
      }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Data absen gagal dihapus.';
        return $response;
      }
    }
  }

  // update absen
  public function update_absen($id_absen, $id_jadwal, $id_qr, $nim, $waktu){
    if( empty($id_absen) || empty($id_jadwal) || $id_qr == '' || empty($nim) || empty($waktu) ){
      return $this->empty_response();
    }else{
      $where = array(
        "id_absen"=>$id_absen
      );
      $set = array(
        "id_jadwal"=>$id_jadwal,
        "id_qr"=>$id_qr,
        "nim"=>$nim,
        "waktu"=>$waktu
      );
      $this->db->where($where);
      $update = $this->db->update("tbabsen",$set);
      if($update){
        $response['status']=200;
        $response['error']=false;
        $response['message']='Data absen diubah.';
        return $response;
      }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Data absen gagal diubah.';
        return $response;
      }
    }
  }

  //riwayat generate qr
   public function tampil_riwayat($nip){    
    $this->db->select('tbmatkul.nama_matkul, tbabsen.waktu, tbkelas.nama_kelas');
    $this->db->from('tbjadwal');
    $this->db->group_by('tbabsen.id_qr');    
    $this->db->join('tbmatkul','tbmatkul.id_matkul = tbjadwal.id_matkul');
    $this->db->join('tbkelas','tbkelas.id_kelas = tbjadwal.id_kelas');
    $this->db->join('tbabsen','tbabsen.id_jadwal = tbjadwal.id_jadwal');
    $this->db->where('tbjadwal.nip',$nip);
    $result = $this->db->get();
    return $result->result_array();
  }

  public function riwayat_generate($nip){
    $this->db->select('tbjadwal.nip as nip,tbmatkul.nama_matkul as matkul, tbabsen.waktu as waktu');
    $this->db->from('tbjadwal');      
    $this->db->group_by('tbabsen.id_qr');
    $this->db->order_by('tbabsen.id_absen','desc');
    $this->db->join('tbmatkul','tbmatkul.id_matkul = tbjadwal.id_matkul');
    $this->db->join('tbkelas','tbkelas.id_kelas = tbjadwal.id_kelas');
    $this->db->join('tbabsen','tbabsen.id_jadwal = tbjadwal.id_jadwal');
    $this->db->where('tbjadwal.nip',$nip);
    $result = $this->db->limit(5,0)->get();
    return $result->result_array();
  }

  //tampil data rekapitulasi
  public function tampil_rekapitulasi($nip){
    $this->db->select('tbabsen.id_absen as id,tbabsen.waktu as waktu,tbmahasiswa.nim as nim,tbmahasiswa.nama_mahasiswa as nama, tbmatkul.nama_matkul as matkul, tbkelas.nama_kelas as kelas');
    $this->db->from('tbabsen');          
    $this->db->join('tbjadwal','tbabsen.id_jadwal = tbjadwal.id_jadwal');    
    $this->db->join('tbkelas','tbkelas.id_kelas = tbjadwal.id_kelas');  
    $this->db->join('tbmatkul','tbmatkul.id_matkul = tbjadwal.id_matkul');
    $this->db->join('tbmahasiswa','tbmahasiswa.nim = tbabsen.nim'); 
    $this->db->where('tbjadwal.nip',$nip);
    $result = $this->db->get();
    return $result->result_array();
  }

  public function info_kelas($nip){
    $this->db->select('tbjadwal.id_kelas as id,tbkelas.nama_kelas as kelas');
    $this->db->from('tbabsen');
    $this->db->group_by('tbkelas.nama_kelas');          
    $this->db->join('tbjadwal','tbabsen.id_jadwal = tbjadwal.id_jadwal');    
    $this->db->join('tbkelas','tbkelas.id_kelas = tbjadwal.id_kelas');  
    $this->db->join('tbmatkul','tbmatkul.id_matkul = tbjadwal.id_matkul');
    $this->db->join('tbmahasiswa','tbmahasiswa.nim = tbabsen.nim'); 
    $this->db->where('tbjadwal.nip',$nip);
    $result = $this->db->get();
    return $result->result_array();
  }

   public function cetak_rekapitulasi($kelas){
    if( empty($kelas)){
      return $this->empty_response();
    }else{
    $this->db->select('tbabsen.id_absen as id,tbabsen.waktu as waktu,tbmahasiswa.nim as nim,tbmahasiswa.nama_mahasiswa as nama, tbmatkul.nama_matkul as matkul, tbkelas.nama_kelas as kelas');
    $this->db->from('tbabsen');          
    $this->db->join('tbjadwal','tbabsen.id_jadwal = tbjadwal.id_jadwal');    
    $this->db->join('tbkelas','tbkelas.id_kelas = tbjadwal.id_kelas');  
    $this->db->join('tbmatkul','tbmatkul.id_matkul = tbjadwal.id_matkul');
    $this->db->join('tbmahasiswa','tbmahasiswa.nim = tbabsen.nim'); 
    $this->db->where('tbjadwal.id_kelas',$kelas);
    $this->db->where('tbjadwal.nip',$this->session->nip);
    $result = $this->db->get();
    return $result->result_array();
    }
  }
}

?>