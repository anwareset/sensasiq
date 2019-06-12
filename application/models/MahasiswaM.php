<?php
// extends class Model
class MahasiswaM extends CI_Model{

  // response jika field ada yang kosong
  public function empty_response(){
    $response['status']=502;
    $response['error']=true;
    $response['message']='Field tidak boleh kosong';
    return $response;
  }

  // function untuk insert data ke tabel tbmahasiswa
  public function add_mahasiswa($nim, $nama_mahasiswa, $password, $device_id, $id_kelas){
    if(empty($nama_mahasiswa) || empty($nim) || empty($password) || empty($device_id) || empty($id_kelas) ){
      return $this->empty_response();
    }else{
      $data = array(
        "nim"=>$nim,
        "nama_mahasiswa"=>$nama_mahasiswa,
        "password"=>$password,
        "device_id"=>$device_id,
        "id_kelas"=>$id_kelas
      );
      $insert = $this->db->insert("tbmahasiswa", $data);
      if($insert){
        $response['status']=200;
        $response['error']=false;
        $response['message']='Data mahasiswa ditambahkan.';
        return $response;
      }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Data mahasiswa gagal ditambahkan.';
        return $response;
      }
    }
  }

  // mengambil semua data mahasiswa
  public function all_mahasiswa(){
    $all = $this->db->get("tbmahasiswa")->result();
    $response['status']=200;
    $response['error']=false;
    $response['mahasiswa']=$all;
    return $response;
  }

  // mengambil data mahasiswa
  public function the_mahasiswa($nim){
    if($nim == ''){
      $all = $this->db->get("tbmahasiswa")->result();
      $response['status']=200;
      $response['error']=false;
      $response['mahasiswa']=$all;
      return $response;
    }else{
      $where = array(
        "nim"=>$nim
      );
      $this->db->where($where);
      $theid = $this->db->get("tbmahasiswa")->result();
      if($theid){
        $response['status']=200;
        $response['error']=false;
        $response['mahasiswa']=$theid;
        return $response;
      }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Data mahasiswa gagal ditampilkan.';
        return $response;
      }
    }
  }

  
  // hapus data mahasiswa
  public function delete_mahasiswa($nim){
    if($nim == ''){
      return $this->empty_response();
    }else{
      $where = array(
        "nim"=>$nim
      );
      $this->db->where($where);
      $delete = $this->db->delete("tbmahasiswa");
      if($delete){
        $response['status']=200;
        $response['error']=false;
        $response['message']='Data mahasiswa dihapus.';
        return $response;
      }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Data mahasiswa gagal dihapus.';
        return $response;
      }
    }
  }

  // update mahasiswa
  public function update_mahasiswa($nim, $nama_mahasiswa, $password, $device_id, $id_kelas){
    if($nim == '' || empty($nama_mahasiswa) || empty($password) || empty($device_id) || empty($id_kelas) ){
      return $this->empty_response();
    }else{
      $where = array(
        "nim"=>$nim
      );
      $set = array(
        "nama_mahasiswa"=>$nama_mahasiswa,
        "password"=>$password,
        "device_id"=>$device_id,
        "id_kelas"=>$id_kelas
      );
      $this->db->where($where);
      $update = $this->db->update("tbmahasiswa",$set);
      if($update){
        $response['status']=200;
        $response['error']=false;
        $response['message']='Data mahasiswa diubah.';
        return $response;
      }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Data mahasiswa gagal diubah.';
        return $response;
      }
    }
  }
}

?>