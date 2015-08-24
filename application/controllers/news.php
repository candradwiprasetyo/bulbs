<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('news_model');
		$this->load->library('session');
		$this->load->library('access');
	}
 	
	public function index() {
		
			
			$data['title'] = "news";
			$data['nav']	= "Explore -> Interior Design -> Aldo Felix Studio";
			$list['list'] = "test";
			
			$data_news = array();
			$result = $this->news_model->read_max_id();
			
			if($result){
				$data_news  = $result;
			}
			
			$this->load->view('layout/header', array('list' => $list, 'data' => $data));
			$this->load->view('news/content', array('data_news' => $data_news));
			$this->load->view('layout/footer'); 
	}
	
	public function view($id) {
			$data['title'] = "View News";
			
			$result = $this->news_model->read_id($id);
			
			if($result){
				$data_news  = $result;
			}
			
			$this->load->view('layout/header', array('data' => $data));
			$this->load->view('news/view', array('data_news' => $data_news));
			$this->load->view('layout/footer'); 
		
 	}
	

}