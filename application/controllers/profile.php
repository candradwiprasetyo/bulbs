<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('profile_model');
		$this->load->library('session');
		$this->load->library('access');
		
		
		$logged = $this->session->userdata('logged');
		if($logged == ""){
			redirect('login');
		}else{
			if($this->session->userdata('user_type_id') == 3){
				redirect('account_regular');
			}
		}
	}
 	
	public function index() {
		
			$logged = $this->session->userdata('logged');
			$user_type_id = $this->session->userdata('user_type_id');
			
		if($logged){
			
			$data['title'] = "Profile";
			$data['nav']	= "Explore -> Interior Design -> Aldo Felix Studio";
			$list['list'] = "test";
			
			$data_creatives = array();
			$result = $this->profile_model->read_id($this->session->userdata('user_id'));
			
			if($result){
				$data_creatives  = $result;
			}
			
			$data_creatives['follower'] = $this->profile_model->get_profile_follower($this->session->userdata('user_id'));
			$data_creatives['following'] = $this->profile_model->get_profile_following($this->session->userdata('user_id'));
			$data_creatives['view'] = $this->profile_model->get_profile_view($this->session->userdata('user_id'));
			$data_creatives['like'] = $this->profile_model->get_profile_like($this->session->userdata('user_id'));
			
			$this->load->view('layout/header', array('list' => $list, 'data' => $data));
			$this->load->view('profile/content', array('data_creatives' => $data_creatives));
			$this->load->view('layout/footer'); 
		}else{
			redirect('login');
		}
		
 	}
	
	public function logout(){
		$this->load->library('facebook');
        // Logs off session from website
        $this->facebook->destroySession();
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
		$data['creative_img'] 					= str_replace(" ", "_", $data['creative_img']);
		
		}
		 
		 // simpan profile
		$data['creative_wp_name']	 			= $this->input->post('i_wp_name');
		$data['location_id'] 					= $this->input->post('i_location_id');
		$data['creative_wp_description'] 		= $this->input->post('i_description');
		
		$data['creative_website']	 			= $this->input->post('i_website');
		$data['creative_phone']	 				= $this->input->post('i_phone');
		$data['creative_facebook']	 			= '';//$this->input->post('i_facebook');
		$data['creative_twitter']	 			= '';//$this->input->post('i_twitter');
		$data['creative_instagram']	 			= '';//$this->input->post('i_instagram');
		//$data['creative_rss']	 				= $this->input->post('i_rss');
		
		// simpan account
		$data_account['user_first_name']			= $this->input->post('i_first_name');
		$data_account['user_last_name']				= $this->input->post('i_last_name');
		$data_account['user_email']					= $this->input->post('i_email');
		$data_account['user_username']				= $this->input->post('i_username');
		
		$id = $this->session->userdata('user_id');
		
		if($this->input->post('i_current_password') && $this->input->post('i_new_password')){
			$get_current_password = $this->profile_model->get_current_password($id);
			
			if($get_current_password == md5($this->input->post('i_current_password'))){
				$data_account['user_password']				= md5($this->input->post('i_new_password'));
			}
		}
		
		if($data['location_id']==0){
			$data['other_location'] = $this->input->post('i_other_location');
		}else{
			$data['other_location'] = '';
		}
		
		
		
		//echo $_FILES['i_img']['name'];
		
		$this->profile_model->save_profile($data, $id);
		$this->profile_model->save_account($data_account, $id);
		
		
		// hapus profile detail categories
		$this->profile_model->delete_detail($id);
		
		// create profile detail categories
		$data_detail['user_id'] = $id;
		$q_p_category = mysql_query("select * from profile_categories order by pc_id");
		while($r_p_category = mysql_fetch_array($q_p_category)){
			
			if($this->input->post('i_pc_'.$r_p_category['pc_id'])){
				$data_detail['pc_id'] = $r_p_category['pc_id'];
				$this->profile_model->save_detail($data_detail);
			}
			
		}
		
		redirect('profile/?id='.$id."&did=2");
		
	}
}