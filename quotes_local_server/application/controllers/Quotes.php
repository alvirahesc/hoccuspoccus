<?php

require APPPATH . 'libraries/REST_Controller.php';
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');
class Quotes extends REST_Controller{

  public function __construct(){
    parent::__construct();
    $this->load->model('M_quotes');
  }
  public function index_options(){ 
    $this->response(null, REST_Controller::HTTP_OK); 
  }
  public function index_get(){
      if($this->get('quote_id')!=null){
        $response = $this->M_quotes->quote_by_id($this->get('quote_id'));
        $this->response($response);
      }
      elseif($this->get('class_id')!=null){
        $response = $this->M_quotes->quote_by_class($this->get('class_id'));
        $this->response($response);
      }
      elseif($this->get('my_quote')!=null){
        $response = $this->M_quotes->quote_by_nim($this->get('my_quote'));
        $this->response($response);
    }
    else{
        $response = $this->M_quotes->all_quotes();
        $this->response($response);
    }
    
    
  }

  public function index_post(){
    // print_r($this->post());
    if($this->get('edit')!=null){
      $response = $this->M_quotes->update_quote($this->post(),$_FILES);
      $this->response($response);
    }
  elseif($this->get()==null){
    $response = $this->M_quotes->add_quote($this->post(),$_FILES);
    $this->response($response);
  }
  }

  public function index_put(){
    print_r($this->put());
    $data['quote_id'] = $this->put('quote_id');
    $data['title'] = $this->put('title');
    $data['description'] = $this->put('description');
    $response = $this->M_quotes->update_quote($data,$_FILES);
    $this->response($response);
  }

  public function index_delete(){
    $response = $this->M_quotes->delete_quote(
        $this->get('quote_id')
      );
    $this->response($response);
  }

}

?>
