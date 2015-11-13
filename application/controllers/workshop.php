<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Workshop extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('workshop_model');
		$this->load->library('session');
		$this->load->library('access');
	}
 	
	public function index() {
		
			
			$data['title'] = "event";
			$data['nav']	= "Explore -> Interior Design -> Aldo Felix Studio";
			$list['list'] = "test";
			
			$data_workshop = array();
			$result = $this->workshop_model->read_max_id();
			
			if($result){
				$data_workshop  = $result;
			}
			
			$this->load->view('layout/header', array('list' => $list, 'data' => $data));
			if($data_workshop['last_id']){
				$this->load->view('workshop/content', array('data_workshop' => $data_workshop));
			}
			$this->load->view('layout/footer'); 
	}
	
	public function view($id) {
			$data['title'] = "View event";
			
			$result = $this->workshop_model->read_id($id);
			
			if($result){
				$data_workshop  = $result;
			}
			
			$this->load->view('layout/header', array('data' => $data));
			$this->load->view('workshop/view', array('data_workshop' => $data_workshop));
			$this->load->view('layout/footer'); 
		
 	}
	

}