<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About_us extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('home_model');
		$this->load->library('access');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->library('recaptcha');
		
		
	}
 	
	public function index() {
		
		$this->load->library('facebook'); // Automatically picks appId and secret from config
		
		$data['title'] = "8BULBS";
		$list['list'] = "test";

 		$this->load->view('layout/header', array('data' => $data));
		$this->load->view('about_us/content');
		$this->load->view('layout/footer'); 
		
 	}
	
	
}