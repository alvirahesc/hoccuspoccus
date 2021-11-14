<?php

require APPPATH . 'libraries/REST_Controller.php';

class Student extends REST_Controller{

  public function __construct(){
    parent::__construct();
    $this->load->model('M_student');
  }

  public function index_get(){
      if($this->get('nim')!=null){
        $response = $this->M_student->student_by_nim($this->get('nim'));
        $this->response($response);
      }    
  }



  

}

?>
