<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Footer_menu extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('footer_menu_model');
		$this->load->library('session');
		$this->load->library('access');
	}
 	
	public function index() {
		
			$data['title'] = "Footer Menu";
			$data['nav']	= "Explore -> Interior Design -> Aldo Felix Studio";
			$list['list'] = "test";
			
			$id = $_GET['id'];
			
			$data_menu = array();
			$result = $this->footer_menu_model->read_id($id);
			
			if($result){
				$data_menu  = $result;
			}
			
			$this->load->view('layout/header', array('list' => $list, 'data' => $data));
			$this->load->view('footer_menu/content', array('data_menu' => $data_menu));
			$this->load->view('layout/footer'); 
		
		
 	}
	
	public function logout(){
		$this->session->sess_destroy();
		redirect('home');
	}
}