<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('profile_model');
		
	}
 	
	public function index() {
		
		$data['title'] = "Profile";
		$data['nav']	= "nav";
		$list['list'] = "test";
		
 		$this->load->view('layout/header', array('list' => $list, 'data' => $data));
		$this->load->view('profile/content');
		$this->load->view('layout/footer'); 
		
 	}
	
	public function signup() {
		 
		$data['user_type_id']	 				= 1;
		$data['user_first_name'] 				= $this->input->post('i_first_name');
		$data['user_last_name'] 				= $this->input->post('i_last_name');
		$data['user_email'] 					= $this->input->post('i_email');
		$data['user_username']	 				= $this->input->post('i_username');
		$data['user_password']	 				= md5($this->input->post('i_password'));
		$data['user_active_status']	 			= 1;
		
		$error = $this->profile_model->create($data);
		
		header("Location: ../login?type=1");
		
 	}
}