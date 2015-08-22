<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('register_model');
		$this->load->library('session');
	}
 	
	public function index() {
		
		
			$data['title'] = "Register";
			
			$this->load->view('layout/header', array('data' => $data));
			$this->load->view('register/register_form', $data);
			$this->load->view('layout/footer'); 
		
 	}
	
	public function submit_register() {
		
		$username 	= $this->input->post('i_first_name');
		$password 	= $this->input->post('i_password');
		
		$user_id = $this->register_model->is_valid($username, $password);

		if(!$user_id)
		{				
			
			header("Location: register?err=1");
			
		}else{
			$this->session->set_userdata('logged', 1);
			$this->session->set_userdata('user_id', $user_id[0]);
			$this->session->set_userdata('user_type_id', $user_id[1]);
			
			$this->session->userdata('user_id');
			header("Location: ../profile");
			
		}
	
		
	}
	
}