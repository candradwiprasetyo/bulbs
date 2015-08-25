<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('login_model');
		$this->load->library('session');
	}
 	
	public function index() {
		
		if($this->session->userdata('logged') == 1){
			if($this->session->userdata('user_type_id') == 2){
				redirect('profile');
			}else{
				redirect('account_regular');
			}
		}else{
			$data['title'] = "Login";
			
			$type = (isset($_GET['type'])) ? $_GET['type'] : "";
			if($type == 1){
				$data['message'] = "Signup Success";
			}else{
				$data['message'] = "";
			}
			
			$this->load->view('layout/header', array('data' => $data));
			$this->load->view('login/login_form', $data);
			$this->load->view('layout/footer'); 
		
		}
		
 	}
	
	public function submit_login() {
		
		$username 	= $this->input->post('i_first_name');
		$password 	= $this->input->post('i_password');
		
		$user_id = $this->login_model->is_valid($username, $password);

		if(!$user_id)
		{				
			
			header("Location: login?err=1");
			
		}else{
			$this->session->set_userdata('logged', 1);
			$this->session->set_userdata('user_id', $user_id[0]);
			$this->session->set_userdata('user_type_id', $user_id[1]);
			
			if($user_id[1] == 2){
				header("Location: ../profile");
			}else{
				header("Location: ../showcase_regular/");
			}
		}
	
		
	}
	
}