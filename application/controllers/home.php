<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
 	
	public function index() {
 		
		$data=array('title' => '8BULBS',
 					'isi' => 'home/index'
 					);
					
 		$this->load->view('layout/wrapper', $data); 
		
 	}
}