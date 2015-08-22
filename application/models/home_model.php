<?php

class Home_model extends CI_Model{

	function __construct(){
		$this->load->database();
	}
	
	function create($data){
		$this->db->trans_start();
		$this->db->insert('users', $data);
		$id = $this->db->insert_id();
		
		$data_creative['user_id'] = $id;
		$this->db->insert('creatives', $data_creative);
		
		$this->db->trans_complete();
		return $id;
	}

	
	
	
	
}