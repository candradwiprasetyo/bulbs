<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Creative extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('creative_model');
		$this->load->library('session');
		$this->load->library('access');
	}
 	
	public function index() {
		
			
			$data['title'] = "creatives";
			$data['nav']	= "Explore -> Interior Design -> Aldo Felix Studio";
			$list['list'] = "test";
			
			$data_creatives = array();
			$result = $this->creative_model->read_id($this->session->userdata('user_id'));
			
			if($result){
				$data_creatives  = $result;
			}
			
			$this->load->view('layout/header', array('list' => $list, 'data' => $data));
			$this->load->view('creative/content', array('data_creatives' => $data_creatives));
			$this->load->view('layout/footer'); 
		
 	}
	
	public function logout(){
		$this->session->sess_destroy();
		redirect('home');
	}
	
	public function following($creative_id){
		$data['user_creative_id']	 			= $creative_id;
		$data['user_regular_id'] 				= $this->session->userdata('user_id');
		
		$this->creative_model->following($data);
		
		redirect('creative');
	}
	
	public function unfollowing($creative_id){
		
		$this->creative_model->unfollowing($creative_id, $this->session->userdata('user_id'));
		
		redirect('creative');
	}
}