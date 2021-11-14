<?php


class M_quotes extends CI_Model{

  public function empty_response(){
    $response['status']=502;
    $response['error']=true;
    $response['message']='Field tidak boleh kosong';
    return $response;
  }


  public function all_quotes(){
    $q = "
    select
    q.quote_id,
    q.student_id,
    s.name as name,
    s.nim,
    c.name class,
    q.title,
    q.description,
    case
      when q.image is null then concat('".base_url()."','images/no_image.jpg')
      when q.image = '' then concat('".base_url()."','images/no_image.jpg')
      else concat('".base_url()."','images/', q.image)
    end as images,
    q.created,
    q.updated
    from quote q
    left join student s on (s.student_id=q.student_id)
    left join class c on (c.class_id=s.class_id)
    order by created desc
    ";
    $all = $this->db->query($q)->result();
    $response['status']=200;
    $response['error']=false;
    $response['quotes']=$all;
    return $response;
  }

  public function quote_by_id($quote_id){
    $q = "
    select
    q.quote_id,
    q.student_id,
    s.name as name,
    s.nim,
    c.name class,
    q.title,
    q.description,
    case
      when q.image is null then concat('".base_url()."','images/no_image.jpg')
      when q.image = '' then concat('".base_url()."','images/no_image.jpg')
      else concat('".base_url()."','images/', q.image)
    end as images,
    q.created,
    q.updated
    from quote q
    left join student s on (s.student_id=q.student_id)
    left join class c on (c.class_id=s.class_id)
    where q.quote_id = $quote_id
    order by created desc
    ";
    $all = $this->db->query($q)->result();
    $response['status']=200;
    $response['error']=false;
    $response['quotes']=$all;
    return $response;
  }

  public function quote_by_class($class_id){
    $q = "
    select
    q.quote_id,
    q.student_id,
    s.name as name,
    s.nim,
    c.name class,
    q.title,
    q.description,
    case
      when q.image is null then concat('".base_url()."','images/no_image.jpg')
      when q.image = '' then concat('".base_url()."','images/no_image.jpg')
      else concat('".base_url()."','images/', q.image)
    end as images,
    q.created,
    q.updated
    from quote q
    left join student s on (s.student_id=q.student_id)
    left join class c on (c.class_id=s.class_id)
    where c.class_id = $class_id
    order by created desc
    ";
    $all = $this->db->query($q)->result();
    $response['status']=200;
    $response['error']=false;
    $response['quotes']=$all;
    return $response;
  }

  public function quote_by_nim($nim){
    $q = "
    select
    q.quote_id,
    q.student_id,
    s.name as name,
    s.nim,
    c.name class,
    q.title,
    q.description,
    case
      when q.image is null then concat('".base_url()."','images/no_image.jpg')
      when q.image = '' then concat('".base_url()."','images/no_image.jpg')
      else concat('".base_url()."','images/', q.image)
    end as images,
    q.created,
    q.updated
    from quote q
    left join student s on (s.student_id=q.student_id)
    left join class c on (c.class_id=s.class_id)
    where s.nim = $nim
    order by created desc
    ";
    $all = $this->db->query($q)->result();
    $response['status']=200;
    $response['error']=false;
    $response['quotes']=$all;
    return $response;
  }

  public function add_quote($data,$files){
    // print_r($data);
    if(empty($data['student_id']) || empty($data['title']) || empty($data['description'])){
      return $this->empty_response();
    }else{
      $image_name = "";
      if(!empty($_FILES['imagename']['name'])){
        $extension=explode(".", $_FILES['imagename']['name']);
        $image_name = time().(rand(100,999)).'.'.end($extension);
      }
      
      $data = array(
        "student_id"=>$data['student_id'],
        "title"=>$data['title'],
        "description"=>$data['description'],
        "image"=>$image_name
      );


      $insert = $this->db->insert("quote", $data);

      if($insert){

        if(!empty($_FILES['imagename']['name'])){
          move_uploaded_file($_FILES['imagename']['tmp_name'], "images/".$image_name);
        }

        $response['status']=200;
        $response['error']=false;
        $response['message']='Data quote ditambahkan.';
        // $response['data']=$data;
        // $response['file']=$files;
        return $response;
      }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Data quote gagal ditambahkan.';
        // $response['data']=$data;
        // $response['file']=$files;
        return $response;
      }
      

      return $response;
    }

  }

  public function update_quote($data,$files){
    if(empty($data['quote_id']) || empty($data['title']) || empty($data['description'])){
      return $this->empty_response();
    }else{
      $image_name = "";
      if(!empty($_FILES['imagename']['name'])){
        $extension=explode(".", $_FILES['imagename']['name']);
        $image_name = time().(rand(100,999)).'.'.end($extension);
        $set = array(
          "title"=>$data['title'],
          "description"=>$data['description'],
          "image" => $image_name
        );
      }
      else{
        $set = array(
          "title"=>$data['title'],
          "description"=>$data['description']
        );
      }


      $this->db->where('quote_id', $data['quote_id']);
      $update = $this->db->update("quote",$set);

      if($update){
        if(!empty($_FILES['imagename']['name'])){
          move_uploaded_file($_FILES['imagename']['tmp_name'], "images/".$image_name);
        }
        $response['status']=200;
        $response['error']=false;
        $response['message']='Data quote diubah.';
        return $response;
      }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Data quote gagal diubah.';
        return $response;
      }
    }

  }


  public function delete_quote($quote_id){

    if($quote_id == ''){
      return $this->empty_response();
    }else{
      $where = array(
        "quote_id"=>$quote_id
      );

      $this->db->where($where);
      $delete = $this->db->delete("quote");
      if($delete){
        $response['status']=200;
        $response['error']=false;
        $response['message']='Data quote dihapus.';
        return $response;
      }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Data quote gagal dihapus.';
        return $response;
      }
    }

  }

}

?>
