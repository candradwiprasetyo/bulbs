<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile_view extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('profile_view_model');
		$this->load->library('session');
		$this->load->library('access');
	}
 	
	public function index() {
		
			$logged = $this->session->userdata('logged');
			
			$id = $_GET['id'];
			
			$data['title'] = "profile view";
			$data['nav']	= "Explore -> Interior Design -> Aldo Felix Studio";
			$list['list'] = "test";
			
			$data_creatives = array();
			$result = $this->profile_view_model->read_id($id);
			
			if($result){
				$data_creatives  = $result;
			}
			
			$this->load->view('layout/header', array('list' => $list, 'data' => $data));
			$this->load->view('profile_view/content', array('data_creatives' => $data_creatives));
			$this->load->view('layout/footer'); 
		
		
 	}
	
	public function logout(){
		$this->session->sess_destroy();
		redirect('home');
	}
}