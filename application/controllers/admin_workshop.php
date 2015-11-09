<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_workshop extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('admin_workshop_model');
		$this->load->library('session');
		$this->load->library('access');
		
		$logged_admin = $this->session->userdata('logged_admin');
		if($logged_admin == ""){
			redirect('login_admin');
		}
	}
 	
	public function index() {
		
			$data_head['title'] = "Event ";
			$data_head['add_button'] = site_url().'admin_workshop/form/';
			
			$data_user = array();
			$result = $this->access->get_data_user_admin($this->session->userdata('user_id'));
			
			if($result){
				$data_user  = $result;
			}
			
			$list =  $this->admin_workshop_model->list_data();
			
			$this->load->view('admin_layout/header', array( 'data_head' => $data_head, 'data_user' => $data_user));
			$this->load->view('admin_workshop/list', array('data_head' => $data_head, 'list' => $list));
			$this->load->view('admin_layout/footer'); 
	
 	}
	
	public function form($id = 0) {
		
			$data_head['title'] = "Event ";
			$data_head['action'] = site_url().'admin_workshop/form_action/'.$id;
			$data_head['close_button'] = site_url().'admin_workshop/';
			
			$data_user = array();
			$result_user = $this->access->get_data_user_admin($this->session->userdata('user_id'));
			
			if($result_user){
				$data_user  = $result_user;
			}
			
			
			$data = array();
			$data['row_id'] = "";
			$data['user_id'] = "";
			if($id){
				$result = $this->admin_workshop_model->read_id($id);
				if($result){
					$data  = $result;
					$data['row_id'] = $data['workshop_id'];
					$data['workshop_date'] = $this->access->format_real_date($data['workshop_date']);
				}
			}
			
			
			$this->load->view('admin_layout/header', array( 'data_head' => $data_head, 'data_user' => $data_user));
			$this->load->view('admin_workshop/form', array('data_head' => $data_head, 'data' => $data));
			$this->load->view('admin_layout/footer'); 
		
 	}
	
	public function form_action($id = 0) {
		
		// upload gambar
		if($_FILES['i_img']['name']){

			if($id){
				$get_img = $this->admin_workshop_model->get_img("workshops", "workshop_img", "workshop_id = '$id'");
			
				$oldfile   = "assets/images/workshop/".$get_img;
			
				if( file_exists( $oldfile ) ){
	    			unlink( $oldfile );
				}
			}

			$new_name = $this->upload_img('i_img');

			$data['workshop_img'] 					= str_replace(" ", "_", $new_name);

		}

		

		 
		 // simpan di table
		$data['user_id']	 					= $this->input->post('i_user_id');
		$data['workshop_name']	 				= $this->input->post('i_name');
		$data['workshop_description'] 			= $this->input->post('editor');
		$data['workshop_price'] 				= $this->input->post('i_price');
		$data['workshop_place'] 				= $this->input->post('i_place');
		$data['workshop_link'] 					= $this->input->post('i_link');
		$data['workshop_date']				 	= $this->access->format_back_date($this->input->post('i_date'));
		$data['workshop_time'] 					= $this->input->post('i_time');
		
		
		
		if($id){
			$this->admin_workshop_model->update($data, $id);
			
			// hapus project detail categories
			$this->admin_workshop_model->delete_detail($id);
			$data_detail['workshop_id'] = $id;
		}else{
			
			$data_detail['workshop_id'] = $this->admin_workshop_model->create($data);
		}
		
		$q_project_category = mysql_query("select * from profile_categories order by pc_id");
		while($r_project_category = mysql_fetch_array($q_project_category)){
			
			if($this->input->post('i_pc_'.$r_project_category['pc_id'])){
				$data_detail['pc_id'] = $r_project_category['pc_id'];
				$this->admin_workshop_model->save_detail($data_detail);
			}
			
		}
		
		redirect('admin_workshop/?did=2');
		
	}
	
	public function delete($id){
		
		$get_img = $this->admin_workshop_model->get_img("workshops", "workshop_img", "workshop_id = '$id'");
			
		$oldfile   = "assets/images/workshop/".$get_img;
			
		if( file_exists( $oldfile ) ){
	    	unlink( $oldfile );
		}
		
		$this->admin_workshop_model->delete($id);
		redirect('admin_workshop/?did=3');
	}

	public function upload_img($img){
		$new_name = time()."_".$_FILES[$img]['name'];
			
			$configUpload['upload_path']    = './assets/images/workshop/';                 #the folder placed in the root of project
			$configUpload['allowed_types']  = 'gif|jpg|png|bmp|jpeg';       #allowed types description
			$config['max_size']	= '100';
			$config['max_width'] = '1024';
			$config['max_height'] = '768';                       #max height
			$configUpload['encrypt_name']   = false;   
			$configUpload['file_name'] 		= $new_name;                      	#encrypt name of the uploaded file
			$this->load->library('upload', $configUpload);                  #init the upload class
			if(!$this->upload->do_upload($img)){
				$uploadedDetails    = $this->upload->display_errors();
			}else{
				$uploadedDetails    = $this->upload->data(); 
				//$this->_createThumbnail($uploadedDetails['file_name']);
	 
				//$thumbnail_name = $uploadedDetails['raw_name']. '_thumb' .$uploadedDetails['file_ext'];   
			}
			
			return $new_name;
	}

	



	
}