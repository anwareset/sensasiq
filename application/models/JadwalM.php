<?php
// extends class Model
class JadwalM extends CI_Model{

///////////////////////// CRUD API  /////////////////////////

  // response jika field ada yang kosong
  public function empty_response(){
    $response['status']=502;
    $response['error']=true;
    $response['message']='Field tidak boleh kosong';
    return $response;
  }

  // function untuk insert data ke tabel tbjadwal
  public function add_jadwal($id_matkul, $id_kelas, $nip, $waktu){
    if(empty($id_matkul) || empty($id_kelas) || empty($nip) || empty($waktu) ){
      return $this->empty_response();
    }else{
      $data = array(
        "id_matkul"=>$id_matkul,
        "id_kelas"=>$id_kelas,
        "nip"=>$nip,
        "waktu"=>$waktu
      );
      $insert = $this->db->insert("tbjadwal", $data);
      if($insert){
        $response['status']=200;
        $response['error']=false;
        $response['message']='Data jadwal ditambahkan.';
        return $response;
      }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Data jadwal gagal ditambahkan.';
        return $response;
      }
    }
  }

  // mengambil semua data jadwal
  public function all_jadwal(){
    $all = $this->db->get("tbjadwal")->result();
    $response['status']=200;
    $response['error']=false;
    $response['jadwal']=$all;
    return $response;
  }

  // mengambil data jadwal
  public function the_jadwal($id_jadwal){
    if($id_jadwal == ''){
      $all = $this->db->get("tbjadwal")->result();
      $response['status']=200;
      $response['error']=false;
      $response['jadwal']=$all;
      return $response;
    }else{
      $where = array(
        "id_jadwal"=>$id_jadwal
      );
      $this->db->where($where);
      $theid = $this->db->get("tbjadwal")->result();
      if($theid){
        $response['status']=200;
        $response['error']=false;
        $response['jadwal']=$theid;
        return $response;
      }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Data jadwal gagal ditampilkan.';
        return $response;
      }
    }
  }

  
  // hapus data jadwal
  public function delete_jadwal($id_jadwal){
    if($id_jadwal == ''){
      return $this->empty_response();
    }else{
      $where = array(
        "id_jadwal"=>$id_jadwal
      );
      $this->db->where($where);
      $delete = $this->db->delete("tbjadwal");
      if($delete){
        $response['status']=200;
        $response['error']=false;
        $response['message']='Data jadwal dihapus.';
        return $response;
      }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Data jadwal gagal dihapus.';
        return $response;
      }
    }
  }

  // update jadwal
  public function update_jadwal($id_jadwal, $id_matkul, $id_kelas, $nip, $waktu){
    if($id_jadwal == '' || empty($id_matkul) || empty($id_kelas) || empty($nip) || empty($waktu) ){
      return $this->empty_response();
    }else{
      $where = array(
        "id_jadwal"=>$id_jadwal
      );
      $set = array(
        "id_matkul"=>$id_matkul,
        "id_kelas"=>$id_kelas,
        "nip"=>$nip,
        "waktu"=>$waktu
      );
      $this->db->where($where);
      $update = $this->db->update("tbjadwal",$set);
      if($update){
        $response['status']=200;
        $response['error']=false;
        $response['message']='Data jadwal diubah.';
        return $response;
      }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Data jadwal gagal diubah.';
        return $response;
      }
    }
  }

///////////////////////// CRUD WEB  /////////////////////////


  // menampilkan jadwal berdasarkan nip
  public function tampil_jadwal($nip){
    $this->db->select('tbjadwal.id_jadwal as id_jadwal, tbjadwal.waktu as waktu, tbkelas.nama_kelas as nama_kelas, tbmatkul.nama_matkul as nama_matkul');
    $this->db->order_by('waktu', 'ASC');
    $this->db->from('tbjadwal');
    $this->db->join('tbkelas', 'tbkelas.id_kelas = tbjadwal.id_kelas');
    $this->db->join('tbdosen', 'tbdosen.nip = tbjadwal.nip');
    $this->db->join('tbmatkul', 'tbmatkul.id_matkul = tbjadwal.id_matkul');
    $this->db->where('tbjadwal.nip', $nip);
    $result = $this->db->get();
    return $result->result_array();
  }

  //menampilkan jadwal berdasarkan id_jadwal untuk update
  public function tampil_jadwal_update($id_jadwal){
    $result =  $this->db->get_where('tbjadwal', array('id_jadwal'=>$id_jadwal));
    return $result->result_array();
  }

  // update profil
  public function update_jadwal_web($data, $id_jadwal){
    $this->db->where('id_jadwal', $id_jadwal);
    $this->db->update("tbjadwal", $data);
  }


}

?>