<?php
// extends class Model
class KelasM extends CI_Model{

  // response jika field ada yang kosong
  public function empty_response(){
    $response['status']=502;
    $response['error']=true;
    $response['message']='Field tidak boleh kosong';
    return $response;
  }

  // function untuk insert data ke tabel tbkelas
  public function add_kelas($nama_kelas){
    if(empty($nama_kelas)){
      return $this->empty_response();
    }else{
      $data = array(
        "nama_kelas"=>$nama_kelas,
      );
      $insert = $this->db->insert("tbkelas", $data);
      if($insert){
        $response['status']=200;
        $response['error']=false;
        $response['message']='Data kelas ditambahkan.';
        return $response;
      }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Data kelas gagal ditambahkan.';
        return $response;
      }
    }
  }

  // mengambil semua data kelas
  public function all_kelas(){
    $all = $this->db->get("tbkelas")->result();
    $response['status']=200;
    $response['error']=false;
    $response['kelas']=$all;
    return $response;
  }

  // mengambil data kelas
  public function the_kelas($id_kelas){
    if($id_kelas == ''){
      $all = $this->db->get("tbkelas")->result();
      $response['status']=200;
      $response['error']=false;
      $response['kelas']=$all;
      return $response;
    }else{
      $where = array(
        "id_kelas"=>$id_kelas
      );
      $this->db->where($where);
      $theid = $this->db->get("tbkelas")->result();
      if($theid){
        $response['status']=200;
        $response['error']=false;
        $response['kelas']=$theid;
        return $response;
      }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Data kelas gagal ditampilkan.';
        return $response;
      }
    }
  }

  
  // hapus data kelas
  public function delete_kelas($id_kelas){
    if($id_kelas == ''){
      return $this->empty_response();
    }else{
      $where = array(
        "id_kelas"=>$id_kelas
      );
      $this->db->where($where);
      $delete = $this->db->delete("tbkelas");
      if($delete){
        $response['status']=200;
        $response['error']=false;
        $response['message']='Data kelas dihapus.';
        return $response;
      }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Data kelas gagal dihapus.';
        return $response;
      }
    }
  }

  // update kelas
  public function update_kelas($id_kelas,$nama_kelas){
    if($id_kelas == '' || empty($nama_kelas)){
      return $this->empty_response();
    }else{
      $where = array(
        "id_kelas"=>$id_kelas
      );
      $set = array(
        "nama_kelas"=>$nama_kelas,
      );
      $this->db->where($where);
      $update = $this->db->update("tbkelas",$set);
      if($update){
        $response['status']=200;
        $response['error']=false;
        $response['message']='Data kelas diubah.';
        return $response;
      }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Data kelas gagal diubah.';
        return $response;
      }
    }
  }
}

?>