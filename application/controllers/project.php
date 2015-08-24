<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Project extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('project_model');
		$this->load->library('session');
		$this->load->library('access');
	}
 	
	public function add() {
		
			
			$data['title'] = "Add project";
			
			$this->load->view('layout/header', array('data' => $data));
			$this->load->view('project/content');
			$this->load->view('layout/footer'); 
		
 	}
	
	public function view($id) {
		
			
			$data['title'] = "Edit project";
			
			$result = $this->project_model->read_id($id);
			
			if($result){
				$data_project  = $result;
			}
			
			$this->load->view('layout/header', array('data' => $data));
			$this->load->view('project/view', array('data_project' => $data_project));
			$this->load->view('layout/footer'); 
		
 	}
	
	public function save() {
		
		// upload gambar
		$new_name = time()."_".$_FILES['i_img']['name'];
		
		$data_user = $this->access->get_data_user($this->session->userdata('user_id'));
		
		$configUpload['upload_path']    = './assets/images/project/';                 #the folder placed in the root of project
		$configUpload['allowed_types']  = 'gif|jpg|png|bmp|jpeg';       #allowed types description
		$configUpload['max_size']	= '';
		$configUpload['max_width'] = '';
		$configUpload['max_height'] = '';                       #max height
		$configUpload['encrypt_name']   = false;   
		$configUpload['file_name'] 		= $new_name;                      	#encrypt name of the uploaded file
		$this->load->library('upload', $configUpload);                  #init the upload class
		if(!$this->upload->do_upload('i_img')){
			$uploadedDetails    = $this->upload->display_errors();
		}else{
			$uploadedDetails    = $this->upload->data(); 
			
		}
		 
		 // simpan di table
		$data['creative_id']	 				= $data_user['creative_id'];
		$data['project_img'] 					= $new_name;
		$data['project_name']	 				= $this->input->post('i_name');
		$data['project_description']	 		= $this->input->post('i_description');
		$data['project_date']	 				= date("Y-m-d H:m:s");
		
		$id = $this->project_model->save($data);
		$data_detail['project_id'] = $id;
		$data_detail_img['project_id'] = $id;
		
		$q_project_category = mysql_query("select * from project_categories order by pc_id");
		while($r_project_category = mysql_fetch_array($q_project_category)){
			
			if($this->input->post('i_pc_'.$r_project_category['pc_id'])){
				$data_detail['pc_id'] = $r_project_category['pc_id'];
				$this->project_model->save_detail($data_detail);
			}
			
		}
		
		/*
		
		if($_FILES['i_detail_img']['name']){
			$img_detail_name = time()."_".$_FILES['i_detail_img']['name'];
		
			$configUploadDetail['upload_path']    = './assets/images/project/';                 #the folder placed in the root of project
			$configUploadDetail['allowed_types']  = 'gif|jpg|png|bmp|jpeg';       #allowed types description
			$configUploadDetail['max_size']	= '100';
			$configUploadDetail['max_width'] = '1024';
			$configUploadDetail['max_height'] = '768';                       #max height
			$configUploadDetail['encrypt_name']   = false;   
			$configUploadDetail['file_name'] 		= $img_detail_name;                      	#encrypt name of the uploaded file
			$this->load->library('upload', $configUploadDetail);                  #init the upload class
			if(!$this->upload->do_upload('i_detail_img')){
				$uploadedDetails2    = $this->upload->display_errors();
			}else{
				$uploadedDetails2    = $this->upload->data(); 
				
			}
			
			$data_detail_img['pdi_img'] 					= $img_detail_name;
			$this->project_model->save_detail_img($data_detail_img);
		}
		*/
		
		redirect('project/view/'.$id);
	}
}