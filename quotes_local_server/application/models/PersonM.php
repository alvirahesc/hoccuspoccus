<?php

// extends class Model
class PersonM extends CI_Model{

  // response jika field ada yang kosong
  public function empty_response(){
    $response['status']=502;
    $response['error']=true;
    $response['message']='Field tidak boleh kosong';
    return $response;
  }

  // function untuk insert data ke tabel tb_person
  public function add_student($class_id,$nim,$name,$gendre){

    if(empty($class_id) || empty($nim) || empty($name)|| empty($gendre)){
      return $this->empty_response();
    }else{
      $data = array(
        "class_id"=>$class_id,
        "nim"=>$nim,
        "name"=>$name,
        "gendre"=>$gendre
      );

      $insert = $this->db->insert("student", $data);

      if($insert){
        $response['status']=200;
        $response['error']=false;
        $response['message']='Data person ditambahkan.';
        return $response;
      }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Data person gagal ditambahkan.';
        return $response;
      }
    }

  }

  // mengambil semua data person
  public function all_student(){

    $all = $this->db->get("student")->result();
    $response['status']=200;
    $response['error']=false;
    $response['person']=$all;
    return $response;

  }

  // hapus data person
  public function delete_student($student_id){

    if($student_id == ''){
      return $this->empty_response();
    }else{
      $where = array(
        "student_id"=>$student_id
      );

      $this->db->where($where);
      $delete = $this->db->delete("student");
      if($delete){
        $response['status']=200;
        $response['error']=false;
        $response['message']='Data person dihapus.';
        return $response;
      }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Data person gagal dihapus.';
        return $response;
      }
    }

  }

  // update person
  public function update_student($id,$class_id,$nim,$name,$gendre){

    if(empty($class_id) || empty($nim) || empty($name) || empty($gendre)|| empty($id)){
      // return $this->empty_response();
      print_r($id);
    }else{
      $where = array(
        "student_id"=>$id
      );

      $set = array(
        "class_id"=>$class_id,
        "nim"=>$nim,
        "name"=>$name,
        "gendre"=>$gendre
      );

      $this->db->where($where);
      $update = $this->db->update("student",$set);
      if($update){
        $response['status']=200;
        $response['error']=false;
        $response['message']='Data person diubah.';
        return $response;
      }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Data person gagal diubah.';
        return $response;
      }
    }

  }

}

?>
