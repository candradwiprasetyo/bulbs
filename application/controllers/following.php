<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Following extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('following_regular_model');
		$this->load->library('session');
		$this->load->library('access');
	}
 	
	public function index() {
		
			$data['title'] = "following regular";
			$data['nav']	= "Explore -> Interior Design -> Aldo Felix Studio";
			$list['list'] = "test";
			
			$data_following = array();
			$result = $this->following_regular_model->read_id($this->session->userdata('user_id'));
			
			if($result){
				$data_following_regulars  = $result;
			}
			
			$this->load->view('layout/header', array('list' => $list, 'data' => $data));
			$this->load->view('following/content', array('data_following' => $data_following));
			$this->load->view('layout/footer'); 
		
 	}
	
	public function logout(){
		$this->session->sess_destroy();
		redirect('home');
	}
	

	
	public function unfollowing($creative_id){
		
		$this->following_regular_model->unfollowing($creative_id, $this->session->userdata('user_id'));
		
		redirect('following');
	}
}