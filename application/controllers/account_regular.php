<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account_regular extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('account_regular_model');
		$this->load->library('session');
		$this->load->library('access');
	}
 	
	public function index() {
		
			$logged = $this->session->userdata('logged');
			if($logged){
			
			$data['title'] = "Profile";
			$data['nav']	= "Explore -> Interior Design -> Aldo Felix Studio";
			$list['list'] = "test";
			
			$data_user = array();
			$result = $this->account_regular_model->read_id($this->session->userdata('user_id'));
			
			if($result){
				$data_user  = $result;
			}
			
			$this->load->view('layout/header', array('list' => $list, 'data' => $data));
			$this->load->view('account_regular/content', array('data_user' => $data_user));
			$this->load->view('layout/footer'); 
		}else{
			redirect('login');
		}
		
 	}
	
	public function sign_up($id) {
		// buat sesi login
		$this->session->set_userdata('logged', 1);
		$this->session->set_userdata('user_id', $id);
		$this->session->set_userdata('user_type_id', 3);
		
		redirect('account_regular/');
	}
	
	public function save_account() {
		
		$id = $this->session->userdata('user_id');
		 // simpan di table
		$data['user_username']	 				= $this->input->post('i_username');
		if($this->input->post('i_password')){
			$data['user_password'] 					= md5($this->input->post('i_password'));
		}
		$data['user_first_name'] 				= $this->input->post('i_first_name');
		$data['user_last_name'] 				= $this->input->post('i_last_name');
		$data['user_email']	 					= $this->input->post('i_email');
		
		$this->account_regular_model->save_account($data, $id);
		
		if($this->session->userdata('user_type_id') == 2){
			redirect('profile/?did=3');
		}else{
			redirect('account_regular/?did=1');			
		}
	}
	
}