<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_category extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('admin_category_model');
		$this->load->library('session');
		$this->load->library('access');
		
		$logged_admin = $this->session->userdata('logged_admin');
		if($logged_admin == ""){
			redirect('login_admin');
		}
	}
 	
	public function index() {
		
			$data_head['title'] = "category ";
			$data_head['add_button'] = site_url().'admin_category/form/';
			
			$data_user = array();
			$result = $this->access->get_data_user_admin($this->session->userdata('user_id'));
			
			if($result){
				$data_user  = $result;
			}
			
			$list =  $this->admin_category_model->list_data();
			
			$this->load->view('admin_layout/header', array( 'data_head' => $data_head, 'data_user' => $data_user));
			$this->load->view('admin_category/list', array('data_head' => $data_head, 'list' => $list));
			$this->load->view('admin_layout/footer'); 
	
 	}
	
	public function form($id = 0) {
		
			$data_head['title'] = "category ";
			$data_head['action'] = site_url().'admin_category/form_action/'.$id;
			$data_head['close_button'] = site_url().'admin_category/';
			
			$data_user = array();
			$result_user = $this->access->get_data_user_admin($this->session->userdata('user_id'));
			
			if($result_user){
				$data_user  = $result_user;
			}
			
			
			$data = array();
			$data['row_id'] = "";
			if($id){
				$result = $this->admin_category_model->read_id($id);
				if($result){
					$data  = $result;
					$data['row_id'] = $data['pc_id'];
				}
			}
			
			
			$this->load->view('admin_layout/header', array( 'data_head' => $data_head, 'data_user' => $data_user));
			$this->load->view('admin_category/form', array('data_head' => $data_head, 'data' => $data));
			$this->load->view('admin_layout/footer'); 
		
 	}
	
	public function form_action($id = 0) {
		
		
		 
		 // simpan di table
		$data['pc_name']	 				= $this->input->post('i_name');
		$data['pc_color']	 				= $this->input->post('i_color');
		
		
		if($id){
			$this->admin_category_model->update($data, $id);
		}else{
			
			$this->admin_category_model->create($data);
		}
		
		redirect('admin_category/?did=2');
		
	}

	
	public function delete($id = 0) {
	
		$this->admin_category_model->delete($id);
		
		redirect('admin_category/?did=3');
	
	}
	



	
}