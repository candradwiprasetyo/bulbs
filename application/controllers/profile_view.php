<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile_view extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('profile_view_model');
		$this->load->library('session');
		$this->load->library('access');
		$this->load->library('recaptcha');
	}
 	
	public function index() {
		
			$logged = $this->session->userdata('logged');
			
			$id = $_GET['id'];
			
			
			$data['nav']	= "Explore -> Interior Design -> Aldo Felix Studio";
			$list['list'] = "test";
			
			$data_creatives = array();
			$result = $this->profile_view_model->read_id($id);
			
			$data['title'] = $result['creative_wp_name'];
			
			// simpan profile views
			$check_profile_view = $this->profile_view_model->check_profile_view($id, $this->session->userdata('user_id'));
			if($check_profile_view == 0){
				$this->profile_view_model->create_profile_view($id, $this->session->userdata('user_id'));
			}
			
			if($result){
				$data_creatives  = $result;
			}
			
			$data_creatives['follower'] = $this->profile_view_model->get_profile_follower($id);
			$data_creatives['following'] = $this->profile_view_model->get_profile_following($id);
			$data_creatives['view'] = $this->profile_view_model->get_profile_view($id);
			$data_creatives['like'] = $this->profile_view_model->get_profile_like($id);
			
			$data_creatives['follow_status'] = $this->profile_view_model->get_follow_status($id,  $this->session->userdata('user_id'));
			
			
			$this->load->view('layout/header', array('list' => $list, 'data' => $data));
			$this->load->view('profile_view/content', array('data_creatives' => $data_creatives));
			$this->load->view('layout/footer'); 
		
		
 	}
	
	public function logout(){
		$this->session->sess_destroy();
		redirect('home');
	}
	
	public function get_follow_status(){
		if( $_REQUEST["id"] ) {

		   $id = $_REQUEST['id'];
		   
		   $get_follow_status = $this->profile_view_model->get_follow_status($id,  $this->session->userdata('user_id'));
		   
		   echo $get_follow_status;
		}
	
	}
	
	public function get_like_status(){
		if( $_REQUEST["id"] ) {

		   $id = $_REQUEST['id'];
		   
		   $get_follow_status = $this->profile_view_model->get_like_status($id,  $this->session->userdata('user_id'));
		   
		   echo $get_follow_status;
		}
	
	}
	
	public function following($creative_id){
		$data['user_creative_id']	 			= $creative_id;
		$data['user_regular_id'] 				= $this->session->userdata('user_id');
		
		$this->profile_view_model->following($data);
		
		redirect('profile_view/?id='.$creative_id);
	}
	
	public function follow_ajax(){
		$data['user_creative_id']	 			= $this->input->post('id');
		$data['user_regular_id'] 				= $this->session->userdata('user_id');
		
		$get_follow_status = $this->profile_view_model->get_follow_status($data['user_creative_id'], $data['user_regular_id']);
		
		if($get_follow_status > 0){
			$this->profile_view_model->unfollowing($data['user_creative_id'], $data['user_regular_id']);
		}else{
			$this->profile_view_model->following($data);
		}
		//redirect('profile_view/?id='.$creative_id);
	}
	
	public function like_ajax(){
		$data['user_creative_id']	 			= $this->input->post('id');
		$data['user_regular_id'] 				= $this->session->userdata('user_id');
		
		$get_follow_status = $this->profile_view_model->get_like_status($data['user_creative_id'], $data['user_regular_id']);
		
		if($get_follow_status > 0){
			$this->profile_view_model->dislike($data['user_creative_id'], $data['user_regular_id']);
		}else{
			$this->profile_view_model->like($data);
		}
		//redirect('profile_view/?id='.$creative_id);
	}
	
	public function unfollow_ajax(){
		
		$this->profile_view_model->unfollowing($this->input->post('id'), $this->session->userdata('user_id'));
		
		//redirect('profile_view/?id='.$creative_id);
	}
	
	
	
	public function unfollowing($creative_id){
		
		$this->profile_view_model->unfollowing($creative_id, $this->session->userdata('user_id'));
		
		redirect('profile_view/?id='.$creative_id);
	}
	
	public function like($creative_id){
		$data['user_creative_id']	 			= $creative_id;
		$data['user_regular_id'] 				= $this->session->userdata('user_id');
		
		$this->profile_view_model->like($data);
		
		redirect('profile_view/?id='.$creative_id);
	}
	
	public function dislike($creative_id){
		
		$this->profile_view_model->dislike($creative_id, $this->session->userdata('user_id'));
		
		redirect('profile_view/?id='.$creative_id);
	}

	public function review($creative_id){
		
		// Catch the user's answer
		$captcha_answer = $this->input->post('g-recaptcha-response');
		
		// Verify user's answer
		$response = $this->recaptcha->verifyResponse($captcha_answer);
		
		// Processing ...	
		if ($response['success']) {
		
			$data['user_creative_id']	 			= $creative_id;
			$data['user_regular_id'] 				= $this->session->userdata('user_id');
			$data['pr_rating']	 					= $this->input->post('i_rating');
			$data['pr_description']		 			= $this->input->post('i_description');
			$data['pr_date']						= date("Y-m-d H:i:s");
	
			$this->profile_view_model->review($data);
			
			redirect('profile_view/?id='.$creative_id."&did=1");
		}else{
			redirect('profile_view/?id='.$creative_id."&err=1");
		}
	}

}