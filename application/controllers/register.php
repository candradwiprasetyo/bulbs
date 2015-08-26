<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('register_model');
		$this->load->library('image_lib');
		$this->load->library('session');
		$this->load->library('access');
	}
 	
	public function index() {
		
			$data['id'] = $_GET['user_id']; 
		
			$data['title'] = "Register";
			
			$this->load->view('layout/header', array('data' => $data));
			$this->load->view('register/form', $data);
			$this->load->view('layout/footer'); 
		
 	}
	
	
	
	public function save_registration($id) {
		
		// upload gambar
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
			$this->_createThumbnail($uploadedDetails['file_name']);
 
           	$thumbnail_name = $uploadedDetails['raw_name']. '_thumb' .$uploadedDetails['file_ext'];   
		}
		 
		 // simpan di table
		$data['creative_wp_name']	 			= $this->input->post('i_wp_name');
		$data['location_id'] 					= $this->input->post('i_location_id');
		$data['creative_wp_description'] 		= $this->input->post('i_description');
		$data['creative_img'] 					= $new_name;
		$data['creative_website']	 			= $this->input->post('i_website');
		$data['creative_phone']	 				= $this->input->post('i_phone');
		$data['creative_facebook']	 			= $this->input->post('i_facebook');
		$data['creative_twitter']	 			= $this->input->post('i_twitter');
		$data['creative_instagram']	 			= $this->input->post('i_instagram');
		$data['creative_rss']	 				= $this->input->post('i_rss');
		
		// buat sesi login
		$this->session->set_userdata('logged', 1);
		$this->session->set_userdata('user_id', $id);
		$this->session->set_userdata('user_type_id', 2);
		
		$this->register_model->registration($data, $id);
		
		// create profile detail categories
		$data_detail['user_id'] = $id;
		
		$q_p_category = mysql_query("select * from profile_categories order by pc_id");
		while($r_p_category = mysql_fetch_array($q_p_category)){
			
			if($this->input->post('i_pc_'.$r_p_category['pc_id'])){
				$data_detail['pc_id'] = $r_p_category['pc_id'];
				$this->register_model->save_detail($data_detail);
			}
			
		}
		
		redirect('profile/?id='.$id);
	}
	
	function _createThumbnail($filename)
 
    {
 
        $config['image_library']    = "gd2";      
 
        $config['source_image']     = "assets/images/profile/" .$filename;      
 
        $config['create_thumb']     = TRUE;      
 
        $config['maintain_ratio']   = TRUE;      
 
        $config['width'] = "260";      
 
        $config['height'] = "260";
 
        $this->load->library('image_lib',$config);
 
        if(!$this->image_lib->resize())
 
        {
 
            echo $this->image_lib->display_errors();
 
        }      
 
    }
	
}