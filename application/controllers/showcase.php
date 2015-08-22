<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Showcase extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('showcase_model');
		$this->load->library('session');
		$this->load->library('access');
	}
 	
	public function index() {
		
			
			$data['title'] = "Showcase";
			$data['nav']	= "Explore -> Interior Design -> Aldo Felix Studio";
			$list['list'] = "test";
			
			$data_creatives = array();
			$result = $this->showcase_model->read_id($this->session->userdata('user_id'));
			
			if($result){
				$data_creatives  = $result;
			}
			
			$this->load->view('layout/header', array('list' => $list, 'data' => $data));
			$this->load->view('showcase/content', array('data_creatives' => $data_creatives));
			$this->load->view('layout/footer'); 
		
		
 	}
	

}