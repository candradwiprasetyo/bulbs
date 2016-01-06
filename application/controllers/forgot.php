<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Forgot extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('forgot_model');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->library('recaptcha');
		
		$logged = $this->session->userdata('logged');
		if($logged){
			redirect('profile');
		}
	}
 	
	public function index() {
		
		
		if($this->session->userdata('logged') == 1){
			if($this->session->userdata('user_type_id') == 2){
				redirect('profile');
			}else{
				redirect('account_regular');
			}
		}else{

			$type = (isset($_GET['type'])) ? $_GET['type'] : "";
			if($type == 1){
				$data['message'] = "Your username and details about how to reset your password have been sent to you by email ";
			}else{
				$data['message'] = "";
			}

			$data['title'] = "Forgot Password";
			
		
			
			$data['action'] = site_url('forgot/submit_email');
			
			$this->load->view('layout/header', array('data' => $data));
			$this->load->view('forgot/form', $data);
			$this->load->view('layout/footer'); 
		
		}
		
 	}


	public function form_reset_password($user_id, $code) {
			$data['title'] = "Forgot Password";
			
		
			$check_code = $this->forgot_model->check_code($user_id, $code);

			if($check_code > 0){
				$data['title'] = "Forgot Password";
				
				$data['action'] = site_url('forgot/create_new_password/'.$user_id.'/'.$code);
				
				$this->load->view('layout/header', array('data' => $data));
				$this->load->view('forgot/form_reset_password', $data);
				$this->load->view('layout/footer'); 
			}else{
				$this->load->view('layout/header', array('data' => $data));
				$this->load->view('forgot/form_invalid', $data);
				$this->load->view('layout/footer'); 
			}
		
		
		
 	}


	
	public function submit_email() {
		
		
		
		$email 	= $this->input->post('i_email');
		
		$data = $this->forgot_model->is_valid($email);

		if(!$data)
		{				
			
			redirect("forgot?err=1");
			
		}else{

			$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    		$new_password = substr(str_shuffle($chars),0,8);

			$data_forgot['user_id'] = $data[0];

			$data_exist = $this->forgot_model->is_data_exist($data[0]);

			if($data_exist > 0){
				$data_forgot['code'] = $new_password;
				$data_forgot['status'] = 1;
				$this->forgot_model->edit_forgot($data_forgot, $data[0]);
			}else{
				$data_forgot['code'] = $new_password;
				$data_forgot['status'] = 1;
				$this->forgot_model->create_forgot($data_forgot);
			}
				
			$this->sendMailReset_manual($email, $new_password, $data[0]);

    		redirect("forgot?did=1");
			
		}

	}

	public function create_new_password($user_id, $code) {

		$password 	= $this->input->post('i_password');
		$confirm_password 	= $this->input->post('i_confirm_password');
		
		if($password == $confirm_password){
			$data_forgot['user_password'] = md5($password);
			$this->forgot_model->edit_password($data_forgot, $user_id);

			$this->forgot_model->edit_status_forgot($user_id, $code);
		

    		redirect("login?did=1");
    	}else{
    		redirect("forgot/form_reset_password/$user_id/$code?err=1");
    	}
			
		
	
	}

	 function sendmailreset_manual($email, $new_password, $user_id){
			

			$ci = get_instance();
	        $ci->load->library('email');
	        $config['protocol'] = "smtp";
	        $config['smtp_host'] = "ssl://smtp.gmail.com";
	        $config['smtp_port'] = "465";
	        $config['smtp_user'] = "candradwiprasetyo@gmail.com";
	        $config['smtp_pass'] = "cm3l0n pc";
	        
	        $config['charset'] = "utf-8";
	        $config['newline'] = "\r\n";
	        $config['mailtype'] = 'html';
	        
			
	        $ci->email->initialize($config);
	 		
			$data['new_password'] = $new_password;
			$data['user_id'] = $user_id;
			
	        $ci->email->from('candradwiprasetyo@gmail.com', 'Admin 8bulbs');
	        $ci->email->reply_to('candradwiprasetyo@gmail.com', 'Admin 8bulbs');
	        $ci->email->to($email);
	        $ci->email->subject('Reset Password 8bulbs');
	       
	        $message=$this->load->view('forgot/reset_password',$data,TRUE);
			$ci->email->message($message);
			if ($this->email->send()) {
	            //echo 'Email sent.';
	        } else {
	            //show_error($this->email->print_debugger());
	        }
		
			  
			    
	}
	
	
}