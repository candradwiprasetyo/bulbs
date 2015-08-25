<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('home_model');
		$this->load->library('access');
		$this->load->library('session');
	}
 	
	public function index() {
		
		$data['title'] = "8BULBS";
		$list['list'] = "test";
		
 		$this->load->view('layout/header', array('data' => $data));
		//$this->load->view('layout/header', $data);
		$data_img['id1'] = "project/view/".$this->home_model->get_project_id(1, 1);
		$data_img['id2'] = "project/view/".$this->home_model->get_project_id(2, 2);
		$data_img['id3'] = "project/view/".$this->home_model->get_project_id(3, 3);
		$data_img['id4'] = "project/view/".$this->home_model->get_project_id(4, 4);
		$data_img['id5'] = "project/view/".$this->home_model->get_project_id(5, 5);
		$data_img['id6'] = "project/view/".$this->home_model->get_project_id(6, 6);
		
		$data_img['no1'] = $this->home_model->get_project_img(1, 1);
		$data_img['no2'] = $this->home_model->get_project_img(2, 2);
		$data_img['no3'] = $this->home_model->get_project_img(3, 3);
		$data_img['no4'] = $this->home_model->get_project_img(4, 4);
		$data_img['no5'] = $this->home_model->get_project_img(5, 5);
		$data_img['no6'] = $this->home_model->get_project_img(6, 6);
		
		$this->load->view('home/index', $data_img);
		$this->load->view('layout/footer'); 
		
 	}
	
	public function signup() {
		 
		$data['user_type_id']	 				= $this->input->post('t_sign_up3');
		$data['user_first_name'] 				= $this->input->post('i_first_name');
		$data['user_last_name'] 				= $this->input->post('i_last_name');
		$data['user_email'] 					= $this->input->post('i_email');
		$data['user_username']	 				= $this->input->post('i_username');
		$data['user_password']	 				= md5($this->input->post('i_password'));
		$data['user_active_status']	 			= 1;
		
		$id = $this->home_model->create($data);
		
		if($data['user_type_id'] == 2){
			header("Location: ../register?user_id=$id");
		}else{
			//header("Location: ../register?user_id=$id");
			header("Location: ../account_regular/sign_up/$id");
		}
 	}
	
	public function search(){
		$location_id = $this->input->post('i_location_id');
		$pc_id = $this->input->post('i_pc_id');
		//echo $location_id."-".$pc_id;
		redirect("creative?location_id=$location_id&pc_id=$pc_id");
		
	}
}