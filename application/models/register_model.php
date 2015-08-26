<?php

class Register_model extends CI_Model{

	function __construct(){
		$this->load->database();
	}
	
	function registration($data, $id){

		$this->db->trans_start();
		$this->db->where('user_id', $id);
		$this->db->update('creatives', $data);
	
		$this->db->trans_complete();
		return $id;
	}
	
	function save_detail($data){

		$this->db->trans_start();
		$this->db->insert('profile_detail_categories', $data);
		$id = $this->db->insert_id();
		
		$this->db->trans_complete();
		return $id;
	}

	
	
	
	
}