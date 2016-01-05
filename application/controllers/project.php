<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Project extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('project_model');
		$this->load->library('session');
		$this->load->library('access');
	}
 	
	public function add() {
		
			$logged = $this->session->userdata('logged');
			if($logged == ""){
				redirect('login');
			}else{

			$data['title'] = "Add project";

			// hapus semua tmp
			$project_tmp_id	 		= $this->project_model->get_project_tmp_id($this->session->userdata('user_id'));
			$this->project_model->delete_project_detail_categories_tmp($project_tmp_id);
			$this->project_model->delete_project_detail_tmp($project_tmp_id);
			$this->project_model->delete_tmp($this->session->userdata('user_id'));
			
			$data_project['project_name'] = "";
			$data_project['project_description'] = "";
			$data_project['project_img'] = "";
			
			$data_project['action'] = site_url('project/save/');
			$data_project['action_upload'] = site_url('project/upload/');
			
			$this->load->view('layout/header', array('data' => $data));
			$this->load->view('project/content', array('data_project' => $data_project));
			$this->load->view('layout/footer'); 
			}
		
 	}

 	public function add_next() {
		
			$logged = $this->session->userdata('logged');
			if($logged == ""){
				redirect('login');
			}else{

			$data['title'] = "Add project";
			
			$result_tmp = $this->project_model->read_tmp_id();
				if($result_tmp){
					$data_project  = $result_tmp;
				}

			$data_project['project_description'] = "";
			
			$data_project['action'] = site_url('project/save_next/');
			
			$this->load->view('layout/header', array('data' => $data));
			$this->load->view('project/content_next', array('data_project' => $data_project));
			$this->load->view('layout/footer'); 
			}
		
 	}

 	public function form_edit_img($id) {
		
			$logged = $this->session->userdata('logged');
			if($logged == ""){
				redirect('login');
			}else{

			$data['title'] = "Add project";
			
			$result_tmp = $this->project_model->read_tmp_img($id);
				if($result_tmp){
					$data_project  = $result_tmp;
				}

			
			$data_project['action'] = site_url('project/edit_img/'.$id);
			
			$this->load->view('layout/header', array('data' => $data));
			$this->load->view('project/content_edit_img', array('data_project' => $data_project));
			$this->load->view('layout/footer'); 
			}
		
 	}

 
 	public function form_edit_img2($id) {
		
			$logged = $this->session->userdata('logged');
			if($logged == ""){
				redirect('login');
			}else{

			$data['title'] = "Add project";
			
			$result_tmp = $this->project_model->read_img2($id);
				if($result_tmp){
					$data_project  = $result_tmp;
				}

			
			$data_project['action'] = site_url('project/edit_img2/'.$id.'/'.$data_project['project_id']);
			
			$this->load->view('layout/header', array('data' => $data));
			$this->load->view('project/content_edit_img2', array('data_project' => $data_project));
			$this->load->view('layout/footer'); 
			}
		
 	}

 	public function form_edit_text($id) {
		
			$logged = $this->session->userdata('logged');
			if($logged == ""){
				redirect('login');
			}else{

			$data['title'] = "Add project";
			
			$result_tmp = $this->project_model->read_tmp_img($id);
				if($result_tmp){
					$data_project  = $result_tmp;
				}

			
			$data_project['action'] = site_url('project/edit_text/'.$id);
			
			$this->load->view('layout/header', array('data' => $data));
			$this->load->view('project/content_edit_text', array('data_project' => $data_project));
			$this->load->view('layout/footer'); 
			}
		
 	}

 	public function form_edit_text2($id) {
		
			$logged = $this->session->userdata('logged');
			if($logged == ""){
				redirect('login');
			}else{

			$data['title'] = "Edit project";
			
			$result_tmp = $this->project_model->read_img2($id);
				if($result_tmp){
					$data_project  = $result_tmp;
				}

			
			$data_project['action'] = site_url('project/edit_text2/'.$id.'/'.$data_project['project_id']);
			
			$this->load->view('layout/header', array('data' => $data));
			$this->load->view('project/content_edit_text2', array('data_project' => $data_project));
			$this->load->view('layout/footer'); 
			}
		
 	}
	
	public function form_edit($id) {
		
			$logged = $this->session->userdata('logged');
			if($logged == ""){
				redirect('login');
			}else{

			$data['title'] = "Edit project";
			
			$result_tmp = $this->project_model->read_id($id);
				if($result_tmp){
					$data_project  = $result_tmp;
				}

			
			$data_project['action'] = site_url('project/edit/'.$id);
			
			$this->load->view('layout/header', array('data' => $data));
			$this->load->view('project/content_edit', array('data_project' => $data_project));
			$this->load->view('layout/footer'); 
			}
		
 	}
	
	public function view($id) {
		
			
			
			
			$result = $this->project_model->read_id($id);
			
			if($result){
				$data_project  = $result;
			}

			$data['title'] = $data_project['project_name'];
			
			$this->load->view('layout/header', array('data' => $data));
			$this->load->view('project/view', array('data_project' => $data_project));
			$this->load->view('layout/footer'); 
		
 	}
	
	public function view_preview($id) {
		
			
			$logged = $this->session->userdata('logged');
			if($logged == ""){
				redirect('login');
			}else{
			
			$result = $this->project_model->read_id($id);
			
			if($result){
				$data_project  = $result;
			}

			$data['title'] = $data_project['project_name'];
			
			$this->load->view('layout/header', array('data' => $data));
			$this->load->view('project/view_preview', array('data_project' => $data_project));
			$this->load->view('layout/footer'); 
			}
		
 	}

 	public function edit_img($id) {
		
		// tambah gambar

		
						

		if($_FILES['i_img_detail']['name']){

			$get_old_img = $this->project_model->get_old_img($id);
		
			unlink('assets/images/project/detail/' . $get_old_img);

			$new_name = time()."_".$_FILES['i_img_detail']['name'];
			$new_name = str_replace(" ", "_", $new_name);

			move_uploaded_file(
	            $_FILES['i_img_detail']['tmp_name'],
	            'assets/images/project/detail/'.$new_name
	        );

	        // simpan di table
		$data['pdt_value']	 				= $new_name;
		
		$id = $this->project_model->edit_img($data, $id);

		redirect('project/add_next/?type=1#frame_img');

		}else{
			redirect("project/form_edit_img/$id");
		}
		 
		 
		 
			
		
	}

	public function edit_img2($id, $project_id) {

		
		if($_FILES['i_img_detail']['name']){

			$get_old_img = $this->project_model->get_old_img2($id);
		
			unlink('assets/images/project/detail/' . $get_old_img);

			$new_name = time()."_".$_FILES['i_img_detail']['name'];
			$new_name = str_replace(" ", "_", $new_name);

			move_uploaded_file(
	            $_FILES['i_img_detail']['tmp_name'],
	            'assets/images/project/detail/'.$new_name
	        );

	        // simpan di table
		$data['pdi_value']	 				= $new_name;
		
		$id = $this->project_model->edit_img2($data, $id);

			redirect("project/form_edit/$project_id");

		}else{
			redirect("project/form_edit_img2/$id");
		}
		 

		 
			
		
	}

	public function delete_img($id) {
		
			$get_old_img = $this->project_model->get_old_img($id);
		
			unlink('assets/images/project/detail/' . $get_old_img);

			$this->project_model->delete_img($id);

			redirect('project/add_next/?type=1#frame_img');
	

	}

	public function delete_text($id) {

			$this->project_model->delete_img($id);

			redirect('project/add_next/?type=1#frame_img');
	

	}

	public function delete_img2($id, $project_id) {
		
		
			$get_old_img = $this->project_model->get_old_img2($id);
		
			unlink('assets/images/project/detail/' . $get_old_img);

			$this->project_model->delete_img2($id);

			redirect("project/form_edit/$project_id");


	}

	public function delete_text2($id, $project_id) {

			$this->project_model->delete_img2($id);

			redirect("project/form_edit/$project_id");
	

	}
	

	public function edit_text($id) {

		$data['pdt_value']	 				= $this->input->post('i_description');
		
		$id = $this->project_model->edit_img($data, $id);

		redirect('project/add_next/?type=1#frame_img');

	}

	public function edit_text2($id, $project_id) {

		$data['pdi_value']	 				= $this->input->post('i_description');
		
		$id = $this->project_model->edit_img2($data, $id);

		redirect("project/form_edit/$project_id");
			
	}
	
	public function save() {
		
		// tambah gambar
		if(isset($_POST['i_button_save'])){

			$data_user = $this->access->get_data_user($this->session->userdata('user_id'));
		// upload gambar
		
		$new_name = '';

		if($_FILES['i_img']['name']){
		$new_name = time()."_".$_FILES['i_img']['name'];
		$new_name = str_replace(" ", "_", $new_name);
		
		
		/*
		$configUpload['upload_path']    = './assets/images/project/';                 #the folder placed in the root of project
		$configUpload['allowed_types']  = 'gif|jpg|png|bmp|jpeg';       #allowed types description
		$configUpload['max_size']	= '';
		$configUpload['max_width'] = '';
		$configUpload['max_height'] = '';                       #max height
		$configUpload['encrypt_name']   = false;   
		$configUpload['file_name'] 		= $new_name;
		$this->load->library('upload', $configUpload);                  #init the upload class
		$this->upload->initialize($configUpload); 
		if(!$this->upload->do_upload('i_img')){
			$uploadedDetails    = $this->upload->display_errors();
		}else{
			$uploadedDetails    = $this->upload->data(); 
			
		}
		*/
		
			move_uploaded_file(
	            $_FILES['i_img']['tmp_name'],
	            'assets/images/project/'.$new_name
	        );
		}
		 
		 
		 // simpan di table
		$data['creative_id']	 				= $data_user['creative_id'];
		$data['project_img'] 					= str_replace(" ", "_", $new_name);
		$data['project_name']	 				= $this->input->post('i_name');
		$data['project_description']	 		= $this->input->post('i_description');
		$data['project_date']	 				= date("Y-m-d H:m:s");
		$data['project_active_status']			= 1;
		
		$id = $this->project_model->save($data);
		$data_detail['project_id'] = $id;
		
		// save profile categories
		$q_project_category = mysql_query("select * from profile_categories order by pc_id");
		while($r_project_category = mysql_fetch_array($q_project_category)){
			
			if($this->input->post('i_pc_'.$r_project_category['pc_id'])){
				$data_detail['pc_id'] = $r_project_category['pc_id'];
				$this->project_model->save_detail($data_detail);
			}
			
		}

		// save detail images
		

		$new_name_detail = '';
		if($_FILES['i_img_detail']['name']){
		$new_name_detail = time()."_".$_FILES['i_img_detail']['name'];
		$new_name_detail = str_replace(" ", "_", $new_name_detail);

			move_uploaded_file(
	            $_FILES['i_img_detail']['tmp_name'],
	            'assets/images/project/detail/'.$new_name_detail
	        );
		}

		
		// save images
		$data_detail_img['project_id'] = $id;
		$data_detail_img['pdi_type'] = 1;
		$data_detail_img['pdi_value'] = str_replace(" ", "_", $new_name_detail);
		$this->project_model->save_detail_images($data_detail_img);

		// save text
		$data_detail_img['pdi_type'] = 2;
		$data_detail_img['pdi_value'] = $this->input->post('i_description');
		$this->project_model->save_detail_images($data_detail_img);
		
		
		redirect('project/view_preview/'.$id);
			
		}else{

			// simpan data project_tmp
			$data_tmp['project_name']	 				= $this->input->post('i_name');

			$new_name = '';

			if($_FILES['i_img']['name']){
				$new_name = time()."_".$_FILES['i_img']['name'];
				$new_name = str_replace(" ", "_", $new_name);
				move_uploaded_file(
		            $_FILES['i_img']['tmp_name'],
		            'assets/images/project/'.$new_name
		        );
			}

			$data_tmp['project_img']	 				= $new_name;
			$data_tmp['user_id']	 				= $this->session->userdata('user_id');
			$id_tmp = $this->project_model->save_tmp($data_tmp);

			// save profile categories
			$data_detail_cat['project_tmp_id'] = $id_tmp;
			$q_project_category = mysql_query("select * from profile_categories order by pc_id");
			while($r_project_category = mysql_fetch_array($q_project_category)){
				
				if($this->input->post('i_pc_'.$r_project_category['pc_id'])){
					$data_detail_cat['pc_id'] = $r_project_category['pc_id'];
					$this->project_model->save_detail_categories_tmp($data_detail_cat);
				}
				
			}

			$data_detail_tmp['project_tmp_id'] = $id_tmp;
			// save images details
			$new_name_detail = '';
			if(isset($_FILES['i_img_detail']['name']) && $_FILES['i_img_detail']['name'] != "" ){

				$new_name_detail = time()."_".$_FILES['i_img_detail']['name'];
				$new_name_detail = str_replace(" ", "_", $new_name_detail);

				move_uploaded_file(
		            $_FILES['i_img_detail']['tmp_name'],
		            'assets/images/project/detail/'.$new_name_detail
		        );
				
				$data_detail_tmp['pdt_type'] = 1;
				$data_detail_tmp['pdt_value'] = str_replace(" ", "_", $new_name_detail);
				
				$this->project_model->save_detail_tmp($data_detail_tmp);
				
			}

			// save text
			if($this->input->post('i_description')){
				$data_detail_tmp['pdt_type'] = 2;
				$data_detail_tmp['pdt_value'] = $this->input->post('i_description');
				
				$this->project_model->save_detail_tmp($data_detail_tmp);
			}

			if(isset($_POST['i_button_add_image'])){
				redirect('project/add_next/?type=1#frame_img');
			}else if(isset($_POST['i_button_add_text'])){
				redirect('project/add_next/?type=2#frame_text');
			}
		}
	}
	
	public function save_next() {
		
		// tambah gambar
		if(isset($_POST['i_button_save'])){
			
		$data_user = $this->access->get_data_user($this->session->userdata('user_id'));
		// upload gambar
		

		if($_FILES['i_img']['name']){
			$new_name = time()."_".$_FILES['i_img']['name'];
			$new_name = str_replace(" ", "_", $new_name);
		
			move_uploaded_file(
	            $_FILES['i_img']['tmp_name'],
	            'assets/images/project/'.$new_name
	        );
		}else{
			$new_name	 = $this->project_model->get_project_tmp_img($this->session->userdata('user_id'));
			
		}
		 
		
		 // simpan di table
		$data['creative_id']	 				= $data_user['creative_id'];
		$data['project_img'] 					= str_replace(" ", "_", $new_name);
		$data['project_name']	 				= $this->input->post('i_name');
		$data['project_description']	 		= $this->input->post('i_description');
		$data['project_date']	 				= date("Y-m-d H:m:s");
		$data['project_active_status']			= 1;
		
		$id = $this->project_model->save($data);
		$data_detail['project_id'] = $id;
		
		// save profile categories
		$q_project_category = mysql_query("select * from profile_categories order by pc_id");
		while($r_project_category = mysql_fetch_array($q_project_category)){
			
			if($this->input->post('i_pc_'.$r_project_category['pc_id'])){
				$data_detail['pc_id'] = $r_project_category['pc_id'];
				$this->project_model->save_detail($data_detail);
			}
		}

		$data_old_tmp['project_id'] = $id;
		// looping data tmp kemudian masukkan ke data project_detail_images
		
		$q_tmp = mysql_query("select a.* from project_detail_tmp a
                                                        join projects_tmp b on b.project_tmp_id = a.project_tmp_id
                                                        where b.user_id = '".$this->session->userdata('user_id')."' 
                                                        order by pdt_id asc");
		while($r_tmp = mysql_fetch_array($q_tmp)){
			
			$data_old_tmp['pdi_type'] = $r_tmp['pdt_type'];
			$data_old_tmp['pdi_value'] = $r_tmp['pdt_value'];
			$this->project_model->save_detail_images($data_old_tmp);
		}


		$data_detail_img['project_id'] = $id;
		// save detail images
		
		
		$new_name_detail = '';
		if(isset($_FILES['i_img_detail']['name']) && $_FILES['i_img_detail']['name'] != "" ){

			$new_name_detail = time()."_".$_FILES['i_img_detail']['name'];
			$new_name_detail = str_replace(" ", "_", $new_name_detail);

			move_uploaded_file(
	            $_FILES['i_img_detail']['tmp_name'],
	            'assets/images/project/detail/'.$new_name_detail
	        );

	        // save images
			
			$data_detail_img['pdi_type'] = 1;
			$data_detail_img['pdi_value'] = str_replace(" ", "_", $new_name_detail);
			$this->project_model->save_detail_images($data_detail_img);
		}

		
		

		// save text
		if($this->input->post('i_description')){
			$data_detail_img['pdi_type'] = 2;
			$data_detail_img['pdi_value'] = $this->input->post('i_description');
			$this->project_model->save_detail_images($data_detail_img);
		}


		
		
		// hapus semua tmp
		
		$project_tmp_id	 		= $this->project_model->get_project_tmp_id($this->session->userdata('user_id'));
		$this->project_model->delete_project_detail_categories_tmp($project_tmp_id);
		$this->project_model->delete_project_detail_tmp($project_tmp_id);
		$this->project_model->delete_tmp($this->session->userdata('user_id'));
		
		redirect('project/view_preview/'.$id);
		
			
		}else{


			// ambil data project_tmp
			$project_tmp_id	 				= $this->project_model->get_project_tmp_id($this->session->userdata('user_id'));
			
			$data_detail_tmp['project_tmp_id'] = $project_tmp_id;

			$new_name_detail = '';
			
			// save images
			if(isset($_FILES['i_img_detail']['name']) && $_FILES['i_img_detail']['name'] != "" ){

				$new_name_detail = time()."_".$_FILES['i_img_detail']['name'];
				$new_name_detail = str_replace(" ", "_", $new_name_detail);

				move_uploaded_file(
		            $_FILES['i_img_detail']['tmp_name'],
		            'assets/images/project/detail/'.$new_name_detail
		        );
				
				$data_detail_tmp['pdt_type'] = 1;
				$data_detail_tmp['pdt_value'] = str_replace(" ", "_", $new_name_detail);
				$this->project_model->save_detail_tmp($data_detail_tmp);
				
			}

			// save text
			if($this->input->post('i_description')){
				$data_detail_tmp['pdt_type'] = 2;
				$data_detail_tmp['pdt_value'] = $this->input->post('i_description');
				$this->project_model->save_detail_tmp($data_detail_tmp);
			}

			if(isset($_POST['i_button_add_image'])){
				redirect('project/add_next/?type=1#frame_img');
			}else if(isset($_POST['i_button_add_text'])){
				redirect('project/add_next/?type=2#frame_text');
			}
		}
	}
	
	public function edit($id) {
		// tambah gambar
		
		
		$new_name = '';

		if($_FILES['i_img']['name']){

			$new_name = time()."_".$_FILES['i_img']['name'];
			$new_name = str_replace(" ", "_", $new_name);
		
			$get_old_project_img = $this->project_model->get_old_project_img($id);
			unlink('assets/images/project/'.$get_old_project_img);
		
			move_uploaded_file(
	            $_FILES['i_img']['tmp_name'],
	            'assets/images/project/'.$new_name
	        );

	        $data['project_img'] 					= str_replace(" ", "_", $new_name);
		}
		 
		 
		 // simpan di table
		
		
		$data['project_name']	 				= $this->input->post('i_name');
		//$data['project_description']	 		= $this->input->post('i_description');
		
		
		$this->project_model->edit($data, $id);
		$data_detail['project_id'] = $id;
		

		$this->project_model->delete_detail($id);

		// save profile categories
		$q_project_category = mysql_query("select * from profile_categories order by pc_id");
		while($r_project_category = mysql_fetch_array($q_project_category)){
			
			if($this->input->post('i_pc_'.$r_project_category['pc_id'])){
				$data_detail['pc_id'] = $r_project_category['pc_id'];
				$this->project_model->save_detail($data_detail);
			}
			
		}

		// save detail images
		$new_name_detail = '';
		if(isset($_FILES['i_img_detail']['name']) && $_FILES['i_img_detail']['name'] != "" ){
		$new_name_detail = time()."_".$_FILES['i_img_detail']['name'];
		$new_name_detail = str_replace(" ", "_", $new_name_detail);

			move_uploaded_file(
	            $_FILES['i_img_detail']['tmp_name'],
	            'assets/images/project/detail/'.$new_name_detail
	        );

	        // save images
			$data_detail_img['project_id'] = $id;
			$data_detail_img['pdi_type'] = 1;
			$data_detail_img['pdi_value'] = str_replace(" ", "_", $new_name_detail);
			$this->project_model->save_detail_images($data_detail_img);
		}

		// save text
			if($this->input->post('i_description')){
				$data_detail_text['project_id'] = $id;
				$data_detail_text['pdi_type'] = 2;
				$data_detail_text['pdi_value'] = $this->input->post('i_description');
				$this->project_model->save_detail_images($data_detail_text);
			}

		
		

			if(isset($_POST['i_button_save'])){
				redirect('profile');
			}else if(isset($_POST['i_button_add_image'])){
				redirect("project/form_edit/$id/?type=1#frame_img");
			}else if(isset($_POST['i_button_add_text'])){
				redirect("project/form_edit/$id/?type=2#frame_text");
			}
		
		
	}
	
	public function following($creative_id, $project_id){
		$data['user_creative_id']	 			= $creative_id;
		$data['user_regular_id'] 				= $this->session->userdata('user_id');
		
		$this->project_model->following($data);
		
		redirect('project/view/'.$project_id);
	}
	
	public function unfollowing($creative_id, $project_id){
		
		$this->project_model->unfollowing($creative_id, $this->session->userdata('user_id'));
		
		redirect('project/view/'.$project_id);
	}
	
	public function get_follow_status(){
		if( $_REQUEST["id"] ) {

		   $id = $_REQUEST['id'];
		   
		   $get_follow_status = $this->project_model->get_follow_status($id,  $this->session->userdata('user_id'));
		   
		   echo $get_follow_status;
		}
	
	}
	
	
	public function follow_ajax(){
		$data['user_creative_id']	 			= $this->input->post('id');
		$data['user_regular_id'] 				= $this->session->userdata('user_id');
		
		$get_follow_status = $this->project_model->get_follow_status($data['user_creative_id'], $data['user_regular_id']);
		
		if($get_follow_status > 0){
			$this->project_model->unfollowing($data['user_creative_id'], $data['user_regular_id']);
		}else{
			$this->project_model->following($data);
		}
		//redirect('profile_view/?id='.$creative_id);
	}
	
	public function delete($id){
		
		$this->project_model->delete($id);
		redirect('profile/?did=5');
	}

}