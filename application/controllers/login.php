<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('login_model');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->library('recaptcha');
		
		$logged = $this->session->userdata('logged');
		if($logged){
			redirect('profile');
		}
	}
 	
	public function index() {
		
		$this->load->library('facebook'); // Automatically picks appId and secret from config
		
		// captcha lama
		/*
		$this->load->helper('captcha');
		$vals = array(
			'image' => 'test', 
			'img_path' => './assets/capimg/',
			'img_url' => site_url().'assets/capimg/'
			);
		
		$cap = create_captcha($vals);
		
		$data = array(
			'captcha_time'	=> $cap['time'],
			'ip_address'	=> $this->input->ip_address(),
			'word'	=> $cap['word']
			);
		
		$query = $this->db->insert_string('captcha', $data);
		$this->db->query($query);
		
		$this->session->set_userdata('keycode',md5($cap['word']));
		$data['captcha_img'] = $cap['image'];
		*/
		
		if($this->session->userdata('logged') == 1){
			if($this->session->userdata('user_type_id') == 2){
				redirect('profile');
			}else{
				redirect('account_regular');
			}
		}else{
			
			
			
			$data['title'] = "Login";
			
			$type = (isset($_GET['type'])) ? $_GET['type'] : "";
			if($type == 1){
				$data['message'] = "Signup Success";
			}else{
				$data['message'] = "";
			}
			
			$data['login_facebook_url'] = $this->facebook->getLoginUrl(array(
                          'redirect_uri' => site_url('login/submit_login_facebook2'), 
                          'scope' => 'public_profile, email' // permissions here
                        ));
			
			$this->load->view('layout/header', array('data' => $data));
			$this->load->view('login/login_form', $data);
			$this->load->view('layout/footer'); 
		
		}
		
 	}
	
	public function submit_login() {
		
		
		
		$username 	= $this->input->post('i_first_name');
		$password 	= $this->input->post('i_password');
		
		$user_id = $this->login_model->is_valid($username, $password);

		if(!$user_id)
		{				
			
			redirect("login?err=1");
			
		}else{
			$this->session->set_userdata('logged', 1);
			$this->session->set_userdata('user_id', $user_id[0]);
			$this->session->set_userdata('user_type_id', $user_id[1]);
			
			if($user_id[1] == 2){
					redirect("profile?did=1");
			}else{
					redirect("showcase/");
			}
		}
	
		
	}
	
	public function signup_facebook($type)
	{
	
	$this->load->library('facebook'); // Automatically picks appId and secret from config
	
	redirect($this->facebook->getLoginUrl(array(
                          'redirect_uri' => site_url('login/submit_login_facebook/'.$type), 
                          'scope' => 'public_profile, email' // permissions here
                        )));
	
	}
	
	public function submit_login_facebook($type){
		$this->load->library('facebook'); 
		
		$user = $this->facebook->getUser();
		
		$data['user_type_id'] = $type;
		
		
        
        if ($user) {
            try {
                $data_user_profile = $this->facebook->api('/me');
                $data_user_profile_complete = $this->facebook->api('/me?fields=id,name,last_name,link,email,gender,locale,first_name');
            } catch (FacebookApiException $e) {
                $user = null;
            }
			
			$user_id = $this->login_model->is_facebook_valid($data_user_profile['id']);
			
			// jika username tidak ada maka input data ke table users
			if(!$user_id){
				
				$data['user_category_id']                               = 2;
				$data['user_first_name'] 				= $data_user_profile_complete ['first_name'];
				$data['user_last_name'] 				= $data_user_profile_complete ['last_name'];
				$data['user_email'] 					= $data_user_profile_complete ['email'];
				$data['user_username']	 				= $data_user_profile_complete ['id'];
				$data['user_password']	 				= '';
				$data['user_active_status']	 			= 1;
				
				// get profile facebook image
				
				$fid=$data_user_profile ['id'];
				 /*
				$data_img = file_get_contents("https://graph.facebook.com/$fid/picture?width=378&height=378");
				$file = fopen('fbphoto.jpg', 'w+');
				fputs($file, $data_img );
				fclose($file);*/
				
				$url = "https://graph.facebook.com/$fid/picture?width=378&height=378";
				$data_img = 'assets/images/profile/'.$fid.'.jpg';
				file_put_contents($data_img , file_get_contents($url));
												
				$creative_img = $data_user_profile ['id'];
				$data_creative['creative_img'] = $fid.".jpg";
				$data_creative['creative_facebook'] = $data_user_profile_complete['link'];
				
				$id = $this->login_model->create_user_facebook($data, $data_creative);
				
				$this->session->set_userdata('logged', 1);
				$this->session->set_userdata('user_id', $id);
				$this->session->set_userdata('user_type_id', $data['user_type_id']);
				
				if($data['user_type_id'] == 2){
					redirect("register?user_id=$id");
				}else{
					
					redirect("account_regular/sign_up/$id");
				}
				
			}else{
				$this->session->set_userdata('logged', 1);
				$this->session->set_userdata('user_id', $user_id[0]);
				$this->session->set_userdata('user_type_id', $user_id[1]);
				
				$id = $user_id[0];
				
				if($user_id[1] == 2){
					redirect("profile?did=1");
				}else{
					redirect("showcase_regular/");
				}
			}
			
			
			
			
        }else {
            // Solves first time login issue. (Issue: #10)
            //$this->facebook->destroySession();
        }
        
	}
	
	public function submit_login_facebook2(){
		$this->load->library('facebook'); 
		
		$user = $this->facebook->getUser();
		
        
        if ($user) {
            try {
                $data_user_profile = $this->facebook->api('/me');
                $data_user_profile_complete = $this->facebook->api('/me?fields=id,name,last_name,link,email,gender,locale,first_name');
            } catch (FacebookApiException $e) {
                $user = null;
            }
			
			$user_id = $this->login_model->is_facebook_valid($data_user_profile['id']);
			
			// jika username tidak ada maka input data ke table users
			if(!$user_id){
				
					
				redirect("login");
				
				
			}else{
				$this->session->set_userdata('logged', 1);
				$this->session->set_userdata('user_id', $user_id[0]);
				$this->session->set_userdata('user_type_id', $user_id[1]);
				
				$id = $user_id[0];
				
				if($user_id[1] == 2){
					redirect("profile?did=1");
				}else{
					redirect("showcase_regular/");
				}
			}
			
			
			
			
        }else {
            // Solves first time login issue. (Issue: #10)
            //$this->facebook->destroySession();
        }
        
	}
	
}