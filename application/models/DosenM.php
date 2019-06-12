<?php
// extends class Model
class DosenM extends CI_Model{

  // response jika field ada yang kosong
  public function empty_response(){
    $response['status']=502;
    $response['error']=true;
    $response['message']='Field tidak boleh kosong';
    return $response;
  }

  // menampilkan data dosen untuk profile page
  public function tampildosen($nip){
    $where = array(
      "nip"=>$nip
    );
    $this->db->where($where);
    $result = $this->db->get('tbdosen')->row();
    if($result){
      return $result;
    }
  }

  // function untuk insert data ke tabel tbdosen
  public function add_dosen($nip, $nama_dosen, $password){
    if(empty($nama_dosen) || empty($nip) || empty($password)){
      return $this->empty_response();
    }else{
      $data = array(
        "nip"=>$nip,
        "nama_dosen"=>$nama_dosen,
        "password"=>$password
      );
      $insert = $this->db->insert("tbdosen", $data);
      if($insert){
        $response['status']=200;
        $response['error']=false;
        $response['message']='Data dosen ditambahkan.';
        return $response;
      }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Data dosen gagal ditambahkan.';
        return $response;
      }
    }
  }

  // mengambil semua data dosen
  public function all_dosen(){
    $all = $this->db->get("tbdosen")->result();
    $response['status']=200;
    $response['error']=false;
    $response['dosen']=$all;
    return $response;
  }

  // mengambil data dosen tertentu berdasarkan nip
  public function the_dosen($nip){
    if($nip == ''){
      $all = $this->db->get("tbdosen")->result();
      $response['status']=200;
      $response['error']=false;
      $response['dosen']=$all;
      return $response;
    }else{
      $where = array(
        "nip"=>$nip
      );
      $this->db->where($where);
      $theid = $this->db->get("tbdosen")->result();
      if($theid){
        $response['status']=200;
        $response['error']=false;
        $response['dosen']=$theid;
        return $response;
      }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Data dosen gagal ditampilkan.';
        return $response;
      }
    }
  }

  
  // hapus data dosen
  public function delete_dosen($nip){
    if($nip == ''){
      return $this->empty_response();
    }else{
      $where = array(
        "nip"=>$nip
      );
      $this->db->where($where);
      $delete = $this->db->delete("tbdosen");
      if($delete){
        $response['status']=200;
        $response['error']=false;
        $response['message']='Data dosen dihapus.';
        return $response;
      }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Data dosen gagal dihapus.';
        return $response;
      }
    }
  }

  // update dosen
  public function update_dosen($nip, $nama_dosen, $password){
    if($nip == '' || empty($nama_dosen) || empty($password)){
      return $this->empty_response();
    }else{
      $where = array(
        "nip"=>$nip
      );
      $set = array(
        "nama_dosen"=>$nama_dosen,
        "password"=>$password
      );
      $this->db->where($where);
      $update = $this->db->update("tbdosen",$set);
      if($update){
        $response['status']=200;
        $response['error']=false;
        $response['message']='Data dosen diubah.';
        return $response;
      }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Data dosen gagal diubah.';
        return $response;
      }
    }
  }

  public function update_profil($nip, $nama_dosen, $password){
    if (empty($nip) || empty($nama_dosen || empty($password))) {
      $this->session->set_flashdata('message', 'Data gagal diperbarui.');
      $this->load->view('profil');
    } else {
      $where = array(
        "nip"=>$nip
      );
      $set = array(
        "nama_dosen"=>$nama_dosen,
        "password"=>$password
      );
      $this->db->where($where);
      $update = $this->db->update("tbdosen",$set);
      $this->session->set_flashdata('message', 'Data berhasil diperbarui.');
      $this->load->view('profil');
    }
  }

}

?>