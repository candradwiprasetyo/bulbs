<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('profile_model');
		$this->load->library('session');
		$this->load->library('access');
	}
 	
	public function index() {
		
			$logged = $this->session->userdata('logged');
			$user_type_id = $this->session->userdata('user_type_id');
			
			if($logged != "" && $user_type_id == 2){
			
			$data['title'] = "Profile";
			$data['nav']	= "Explore -> Interior Design -> Aldo Felix Studio";
			$list['list'] = "test";
			
			$data_creatives = array();
			$result = $this->profile_model->read_id($this->session->userdata('user_id'));
			
			if($result){
				$data_creatives  = $result;
			}
			
			$this->load->view('layout/header', array('list' => $list, 'data' => $data));
			$this->load->view('profile/content', array('data_creatives' => $data_creatives));
			$this->load->view('layout/footer'); 
		}else{
			redirect('login');
		}
		
 	}
	
	public function logout(){
		$this->session->sess_destroy();
		redirect('home');
	}
	
	public function edit() {
		
			$logged = $this->session->userdata('logged');
			$user_type_id = $this->session->userdata('user_type_id');
			
			if($logged != "" && $user_type_id == 2){
			
			$data['title'] = "Edit Profile";
			$data['nav']	= "Explore -> Interior Design -> Aldo Felix Studio";
			$list['list'] = "test";
			
			$data_creatives = array();
			$result = $this->profile_model->read_id($this->session->userdata('user_id'));
			
			if($result){
				$data_creatives  = $result;
			}
			
			$this->load->view('layout/header', array('list' => $list, 'data' => $data));
			$this->load->view('profile/edit_form', array('data_creatives' => $data_creatives));
			$this->load->view('layout/footer'); 
		}else{
			redirect('login');
		}
		
 	}
	
	public function save_profile() {
		
		// upload gambar
		if($_FILES['i_img']['name']){
		$new_name = time()."_".$_FILES['i_img']['name'];
		
		$configUpload['upload_path']    = './assets/images/profile/';                 #the folder placed in the root of project
		$configUpload['allowed_types']  = 'gif|jpg|png|bmp|jpeg';       #allowed types description
		$config['max_size']	= '100';
		$config['max_width'] = '1024';
		$config['max_height'] = '768';                       #max height
		$configUpload['encrypt_name']   = false;   
		$configUpload['file_name'] 		= $new_name;                      	#encrypt name of the uploaded file
		$this->load->library('upload', $configUpload);                  #init the upload class
		if(!$this->upload->do_upload('i_img')){
			$uploadedDetails    = $this->upload->display_errors();
		}else{
			$uploadedDetails    = $this->upload->data(); 
			//$this->_createThumbnail($uploadedDetails['file_name']);
 
           	$thumbnail_name = $uploadedDetails['raw_name']. '_thumb' .$uploadedDetails['file_ext'];   
		}
		
		$data['creative_img'] 					= $new_name;
		}
		 
		 // simpan di table
		$data['creative_wp_name']	 			= $this->input->post('i_wp_name');
		$data['location_id'] 					= $this->input->post('i_location_id');
		$data['creative_wp_description'] 		= $this->input->post('i_description');
		
		$data['creative_website']	 			= $this->input->post('i_website');
		$data['creative_phone']	 				= $this->input->post('i_phone');
		$data['creative_facebook']	 			= $this->input->post('i_facebook');
		$data['creative_twitter']	 			= $this->input->post('i_twitter');
		$data['creative_instagram']	 			= $this->input->post('i_instagram');
		$data['creative_rss']	 				= $this->input->post('i_rss');
		
		$id = $this->session->userdata('user_id');
		echo $_FILES['i_img']['name'];
		
		$this->profile_model->save_profile($data, $id);
		
		redirect('profile/?id='.$id);
	}
}