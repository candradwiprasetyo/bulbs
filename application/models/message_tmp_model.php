<?php

class Message_tmp_model extends CI_Model{
	
	function __construct(){
		$this->load->database();
	}
	

	function addPost($id, $message) {
        $data = array(
            'id' => $id,
            'message' => $message
        );

        $this->db->insert('messages_tmp', $data);
	}

	function get($limit=5, $offset=0)
	{
		$this->db->orderby('id', 'DESC');
		$this->db->limit($limit, $offset);
	
		return $this->db->get('messages_tmp')->result();
	}
	
}