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
	
	public function action_search() {
		
		// concentration
		$multiple1 =  $this->showcase_model->multiple1();
		$data_multiple1 = '';
		$no1 = 1;
		foreach($multiple1 as $row1):
		
		// hapus sesi concentration
		$this->session->unset_userdata('sess_multiple1_'.$row1['pc_id']);
		
		if($this->input->post('i_multiple1_'.$row1['pc_id'])){
			if($no1 > 1){  $data_multiple1 .= " or "; }
			$data_multiple1	 				.= " d.pc_id = ".$this->input->post('i_multiple1_'.$row1['pc_id']);
			
			// buat sesi concentration
			$this->session->set_userdata('sess_multiple1_'.$row1['pc_id'], 1);
			
			$no1++;
		}
		

		endforeach; 
		
		// location
		$multiple2 =  $this->showcase_model->multiple2();
		$data_multiple2 = '';
		
		$no2 = 1;
		foreach($multiple2 as $row2):
		
		// hapus sesi location
		$this->session->unset_userdata('sess_multiple2_'.$row2['location_id']);
		
		if($this->input->post('i_multiple2_'.$row2['location_id'])){
			if($no2 > 1){  $data_multiple2 .= " or "; }
			$data_multiple2	 				.= " b.location_id = ".$this->input->post('i_multiple2_'.$row2['location_id']);
			
			// buat sesi location
			$this->session->set_userdata('sess_multiple2_'.$row2['location_id'], 1);
			
			$no2++;
		}
		
		endforeach; 
		
		$data_search = '';
		
		// hapus sesi search
		$this->session->unset_userdata('sess_search');
		
		if($this->input->post('i_search_keyword')){
			$data_search = " a.project_name like '%".$this->input->post('i_search_keyword')."%'";
			
			// buat sesi search
			$this->session->set_userdata('sess_search', $this->input->post('i_search_keyword'));
		}
		
		$parameter = '';
		if( $data_multiple1){ $parameter .= " and (".$data_multiple1." ) ";  }
		if( $data_multiple2){ $parameter .= " and (".$data_multiple2." ) ";  }
		if( $data_search){ $parameter .= " and (".$data_search." ) ";  }
		
		echo $parameter;
		
		$this->session->set_userdata('parameter', $parameter);
		
		redirect('showcase/search');
		
		
 	}
	
	public function search() {
		
			
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