<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Message extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('message_model');
		$this->load->library('session');
		$this->load->library('access');
		
		$logged = $this->session->userdata('logged');
		if($logged == ""){
			redirect('login');
		}
	}
 	

	
	public function view($id = 0) {
		
			$logged = $this->session->userdata('logged');
			$user_type_id = $this->session->userdata('user_type_id');
			
			if($logged){
			
				$data['title'] = "message";
				$data['nav']	= "Explore -> Interior Design -> Aldo Felix Studio";
				$list['list'] = "test";
				
				if($id){
					$id = $id;
				}else{
					$last_id = $this->message_model->get_last_id( $this->session->userdata('user_id') );
					$id = $this->message_model->get_last_message( $last_id );
				}
				
				if($id){

				$data_creatives = array();
				$result = $this->message_model->read_id($id);
				
				if($result){
					$data_creatives  = $result;
				}
				
				}else{
					$data_creatives['user_id'] = "";
				}
				
				$this->load->view('layout/header', array('list' => $list, 'data' => $data));
				$this->load->view('message/content', array('data_creatives' => $data_creatives));
				$this->load->view('layout/footer'); 

			}else{
				redirect('login');
			}
			
 	}
	
	

	
	public function send($user_id) {
		
		$get_exists = $this->message_model->get_exists($user_id, $this->session->userdata('user_id'));
		
		if($get_exists > 0){
			
			$message_id = $this->message_model->get_message_id($user_id, $this->session->userdata('user_id'));
		
			// create message detail
			$data_detail['message_id'] 				= $message_id;
			$data_detail['user_id']	 				= $this->session->userdata('user_id');
			$data_detail['md_date'] 				= date("Y-m-d H:m:s");
			$data_detail['md_comment']	 			= $this->input->post('i_comment');
			
			$this->message_model->save_message_detail($data_detail);
			
		}else{
			
			 // simpan di table message
			$data['user_creative_id']	 			= $user_id;
			$data['user_regular_id'] 				= $this->session->userdata('user_id');
			$waktu = time();
			$data['message_id']						= $this->session->userdata('user_id').$waktu;
		
			$this->message_model->save_message($data);
			
			$data2['user_regular_id']	 			= $user_id;
			$data2['user_creative_id'] 				= $this->session->userdata('user_id');
			$data2['message_id']					= $data['message_id'];
		
			$this->message_model->save_message($data2);
			
			// create message detail
			$data_detail['message_id'] 				= $data['message_id'];
			$data_detail['user_id']	 				= $this->session->userdata('user_id');
			$data_detail['md_date'] 				= date("Y-m-d H:m:s");
			$data_detail['md_comment']	 			= $this->input->post('i_comment');
			
			$this->message_model->save_message_detail($data_detail);
			
		}
		
		redirect('message/view/'.$user_id."?did=1");
	}
}