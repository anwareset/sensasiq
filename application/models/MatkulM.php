<?php
// extends class Model
class MatkulM extends CI_Model{

  // response jika field ada yang kosong
  public function empty_response(){
    $response['status']=502;
    $response['error']=true;
    $response['message']='Field tidak boleh kosong';
    return $response;
  }

  // function untuk insert data ke tabel tbmatkul
  public function add_matkul($nama_matkul){
    if(empty($nama_matkul)){
      return $this->empty_response();
    }else{
      $data = array(
        "nama_matkul"=>$nama_matkul
      );
      $insert = $this->db->insert("tbmatkul", $data);
      if($insert){
        $response['status']=200;
        $response['error']=false;
        $response['message']='Data matkul ditambahkan.';
        return $response;
      }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Data matkul gagal ditambahkan.';
        return $response;
      }
    }
  }

  // mengambil semua data matkul
  public function all_matkul(){
    $all = $this->db->get("tbmatkul")->result();
    $response['status']=200;
    $response['error']=false;
    $response['matkul']=$all;
    return $response;
  }

  // mengambil data matkul
  public function the_matkul($id_matkul){
    if($id_matkul == ''){
      $all = $this->db->get("tbmatkul")->result();
      $response['status']=200;
      $response['error']=false;
      $response['matkul']=$all;
      return $response;
    }else{
      $where = array(
        "id_matkul"=>$id_matkul
      );
      $this->db->where($where);
      $theid = $this->db->get("tbmatkul")->result();
      if($theid){
        $response['status']=200;
        $response['error']=false;
        $response['matkul']=$theid;
        return $response;
      }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Data matkul gagal ditampilkan.';
        return $response;
      }
    }
  }

  
  // hapus data matkul
  public function delete_matkul($id_matkul){
    if($id_matkul == ''){
      return $this->empty_response();
    }else{
      $where = array(
        "id_matkul"=>$id_matkul
      );
      $this->db->where($where);
      $delete = $this->db->delete("tbmatkul");
      if($delete){
        $response['status']=200;
        $response['error']=false;
        $response['message']='Data matkul dihapus.';
        return $response;
      }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Data matkul gagal dihapus.';
        return $response;
      }
    }
  }

  // update matkul
  public function update_matkul($id_matkul,$nama_matkul){
    if($id_matkul == '' || empty($nama_matkul)){
      return $this->empty_response();
    }else{
      $where = array(
        "id_matkul"=>$id_matkul
      );
      $set = array(
        "nama_matkul"=>$nama_matkul,
      );
      $this->db->where($where);
      $update = $this->db->update("tbmatkul",$set);
      if($update){
        $response['status']=200;
        $response['error']=false;
        $response['message']='Data matkul diubah.';
        return $response;
      }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Data matkul gagal diubah.';
        return $response;
      }
    }
  }
}

?>