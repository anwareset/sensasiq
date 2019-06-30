<?php
// extends class Model
class QrM extends CI_Model {

///////////////////////// CRUD API  /////////////////////////

  // response jika field ada yang kosong
  public function empty_response(){
    $response['status']=502;
    $response['error']=true;
    $response['message']='Field tidak boleh kosong';
    return $response;
  }

  // function untuk insert data ke tabel tbqr
  public function add_qr($nip, $qr){
    if(empty($nip) || empty($qr) ){
      return $this->empty_response();
    }else{
      $data = array(
        "nip"=>$nip,
        "qr"=>$qr
      );
      $insert = $this->db->insert("tbqr", $data);
      if($insert){
        $response['status']=200;
        $response['error']=false;
        $response['message']='Data qr ditambahkan.';
        return $response;
      }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Data qr gagal ditambahkan.';
        return $response;
      }
    }
  }

  // mengambil semua data qr
  public function all_qr(){
    $all = $this->db->get("tbqr")->result();
    $response['status']=200;
    $response['error']=false;
    $response['qr']=$all;
    return $response;
  }

  // mengambil data qr
  public function the_qr($id_qr){
    if($id_qr == ''){
      $all = $this->db->get("tbqr")->result();
      $response['status']=200;
      $response['error']=false;
      $response['qr']=$all;
      return $response;
    }else{
      $where = array(
        "id_qr"=>$id_qr
      );
      $this->db->where($where);
      $theid = $this->db->get("tbqr")->result();
      if($theid){
        $response['status']=200;
        $response['error']=false;
        $response['qr']=$theid;
        return $response;
      }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Data qr gagal ditampilkan.';
        return $response;
      }
    }
  }

  
  // hapus data qr
  public function delete_qr($id_qr){
    if($id_qr == ''){
      return $this->empty_response();
    }else{
      $where = array(
        "id_qr"=>$id_qr
      );
      $this->db->where($where);
      $delete = $this->db->delete("tbqr");
      if($delete){
        $response['status']=200;
        $response['error']=false;
        $response['message']='Data qr dihapus.';
        return $response;
      }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Data qr gagal dihapus.';
        return $response;
      }
    }
  }

  // update qr
  public function update_qr($id_qr, $nip, $qr){
    if($id_qr == '' || empty($nip) || empty($qr)){
      return $this->empty_response();
    }else{
      $where = array(
        "id_qr"=>$id_qr
      );
      $set = array(
        "nip"=>$nip,
        "qr"=>$qr
      );
      $this->db->where($where);
      $update = $this->db->update("tbqr",$set);
      if($update){
        $response['status']=200;
        $response['error']=false;
        $response['message']='Data qr diubah.';
        return $response;
      }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Data qr gagal diubah.';
        return $response;
      }
    }
  }

///////////////////////// CRUD WEB  /////////////////////////

  public function generateQr($datainsert){
    $insert = $this->db->insert("tbqr", $datainsert);
  }

  public function updateQr($data = NULL){
    if (!empty($data)) {      
      $this->db->where($data);
      $dataQr = $this->db->get("tbqr")->result_array();
      if (!empty($dataQr[0]['qr'])) {   
        unlink($_SERVER['DOCUMENT_ROOT'].'/sensasiq/assets/qrimg/'.$dataQr[0]['qr'].".png");     
        $set['qr'] = substr($dataQr[0]['qr'],0,10).time();
        $whereupdate['id_qr'] = $dataQr[0]['id_qr'];
        $this->db->where($whereupdate);
        $update = $this->db->update("tbqr", $set);
        $this->db->where($whereupdate);
        $dataQr = $this->db->get("tbqr")->result_array();
        return $dataQr;        
      }
    }
  }

}

?>