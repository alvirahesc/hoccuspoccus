<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$q = "
		select * from class
		";
		$data["class"] = $this->db->query($q)->result_array();
		$this->load->view('welcome_message',$data);
	}

	function do_insert(){
		$data = array(
			"nim"=>$_POST['nim'],
			"name"=>$_POST['name'],
			"class_id"=>$_POST['class_id']
		  );
	
		  $insert = $this->db->insert("student", $data);
		  header("Location: /");
	}
}
