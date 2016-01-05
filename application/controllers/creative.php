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
	
	public function action_search() {
		
		// concentration
		$multiple1 =  $this->creative_model->multiple1();
		$data_multiple1 = '';
		$no1 = 1;
		$nomor1 = 1;
		foreach($multiple1 as $row1):
		
		// hapus sesi concentration
		$this->session->unset_userdata('sess_multiple1_'.$row1['pc_id']);
		
		if($this->input->post('i_multiple1_'.$no1)){
			if($nomor1 > 1){  $data_multiple1 .= " or "; }
			$data_multiple1	 				.= " d.pc_id = ".$this->input->post('i_multiple1_'.$no1);
			
			// buat sesi concentration
			//$this->session->set_userdata('sess_multiple1_'.$row1['pc_id'], 1);
			$nomor1++;
			
		}
		$no1++;
		
		endforeach; 
		
		// location
		$multiple2 =  $this->creative_model->multiple2();
		$data_multiple2 = '';
		
		$no2 = 1;
		$nomor2 = 1;
		foreach($multiple2 as $row2):
		
		//$this->input->post('i_multiple2_'.$no2) == 0 hapus sesi location
		$this->session->unset_userdata('sess_multiple2_'.$row2['location_id']);
		
		if($this->input->post('i_multiple2_'.$no2) != ""){
			if($nomor2 > 1){  $data_multiple2 .= " or "; }
			$data_multiple2	 				.= " b.location_id = ".$this->input->post('i_multiple2_'.$no2);
			
			// buat sesi location
			//$this->session->set_userdata('sess_multiple2_'.$row2['location_id'], 1);
			$nomor2++;
		}
		$no2++;

		
		
		endforeach; 
		
		$data_search = '';
		
		// hapus sesi search
		$this->session->unset_userdata('sess_search');
		
		if($this->input->post('i_search_keyword')){
			$data_search = " a.creative_wp_name like '%".$this->input->post('i_search_keyword')."%'";
			
			// buat sesi search
			//$this->session->set_userdata('sess_search', $this->input->post('i_search_keyword'));
		}
		
		$parameter = '';
		if( $data_multiple1){ $parameter .= " and (".$data_multiple1." ) ";  }
		if( $data_multiple2){ $parameter .= " and (".$data_multiple2." ) ";  }
		if( $data_search){ $parameter .= " and (".$data_search." ) ";  }
		
		//echo $parameter;
		
		$this->session->set_userdata('parameter', $parameter);
		
		//echo $parameter;
		redirect('creative/search');
		
		
 	}
	
	public function search() {
			
			
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
	
	public function get_follow_status(){
		if( $_REQUEST["id"] ) {

		   $id = $_REQUEST['id'];
		   
		   $get_follow_status = $this->creative_model->get_follow_status($id,  $this->session->userdata('user_id'));
		   
		   echo $get_follow_status;
		}
	
	}
	
	public function follow_ajax(){
		$data['user_creative_id']	 			= $this->input->post('id');
		$data['user_regular_id'] 				= $this->session->userdata('user_id');
		
		$get_follow_status = $this->creative_model->get_follow_status($data['user_creative_id'], $data['user_regular_id']);
		
		if($get_follow_status > 0){
			$this->creative_model->unfollowing($data['user_creative_id'], $data['user_regular_id']);
		}else{
			$this->creative_model->following($data);
		}
		//redirect('profile_view/?id='.$creative_id);
	}
}