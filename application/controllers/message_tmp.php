<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Message_tmp extends CI_Controller {
	
	function index () {
        $this->load->view('message_tmp/default');
    }

	function add()
	{
		//if ($this->input->post('submit')) {
				$id = $this->input->post('id');
				$message = $this->input->post('message');
	
				// Add the post
				$this->load->model('message_tmp_model');
				$this->message_tmp_model->addPost($id, $message);
			//}
	}
	
	 function view($type = NULL)
	{
		$data['messages'] = $this->db->get('message');
	
		if ($type == "ajax")
			$this->load->view('message_tmp/messages_list', $data);
		else // load the default view
			$this->load->view('message_tmp/default', $data);
	}
	
	
}