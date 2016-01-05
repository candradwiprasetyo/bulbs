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


	
	public function submit_email() {
		
		
		
		$email 	= $this->input->post('i_email');
		
		$data = $this->forgot_model->is_valid($email);

		if(!$data)
		{				
			
			redirect("forgot?err=1");
			
		}else{

			$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    		$new_password = substr(str_shuffle($chars),0,8);
			
			$this->sendMailReset_manual($email, $new_password);

			redirect("forgot?did=1");

		}
	
		
	}

	 function sendmailreset_manual($email, $new_password){
			

			$ci = get_instance();
	        $ci->load->library('email');
	        
	        $config['protocol'] = "smtp";
	        $config['smtp_host'] = "localhost";
	        $config['smtp_port'] = "465";
	        $config['smtp_user'] = "donotreplay@bulbs.co";
	        $config['smtp_pass'] = "y8p!og3@X;ZT";
	        
	        $config['charset'] = "utf-8";
	        $config['newline'] = "\r\n";
	        $config['mailtype'] = 'html';
			//$config['smtp_crypto'] = 'ssl';
	        
			
	        $ci->email->initialize($config);
	 		
			$data['new_password'] = $new_password;
			
	        $ci->email->from('donotreply@8bulbs.co', 'Admin 8bulbs');
	       // $ci->email->reply_to('bisnisiob@gmail.com', 'Admin 8bulbs');
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