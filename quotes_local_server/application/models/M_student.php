<?php


class M_student extends CI_Model{

  public function empty_response(){
    $response['status']=502;
    $response['error']=true;
    $response['message']='Field tidak boleh kosong';
    return $response;
  }


  public function student_by_nim($nim){
    $q = "
    select
    s.*, c.name as class_name from
    student s
    left join class c on c.class_id=s.class_id
    where nim = $nim
    ";
    $all = $this->db->query($q)->result();
    $response['status']=200;
    $response['error']=false;
    $response['student']=$all;
    return $response;
  }


}

?>
