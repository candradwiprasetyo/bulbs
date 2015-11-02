<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Follower extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('follower_model');
		$this->load->library('session');
		$this->load->library('access');
		
		$logged = $this->session->userdata('logged');
		if($logged == ""){
			redirect('login');
		}
	}
 	
	public function index() {
		
			
			$data['title'] = "follower";
			$data['nav']	= "Explore -> Interior Design -> Aldo Felix Studio";
			$list['list'] = "test";
			
			$data_followers = array();
			$result = $this->follower_model->read_id($this->session->userdata('user_id'));
			
			if($result){
				$data_followers  = $result;
			}
			
			$this->load->view('layout/header', array('list' => $list, 'data' => $data));
			$this->load->view('follower/content', array('data_followers' => $data_followers));
			$this->load->view('layout/footer'); 
		
 	}
	
	public function logout(){
		$this->session->sess_destroy();
		redirect('home');
	}
	
	public function following($creative_id){
		$data['user_creative_id']	 			= $creative_id;
		$data['user_regular_id'] 				= $this->session->userdata('user_id');
		
		$this->follower_model->following($data);
		
		redirect('follower');
	}
	
	public function unfollowing($creative_id){
		
		$this->follower_model->unfollowing($creative_id, $this->session->userdata('user_id'));
		
		redirect('follower');
	}
}