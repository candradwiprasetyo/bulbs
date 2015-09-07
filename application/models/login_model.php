<?php

class Login_model extends CI_Model{

	function __construct(){
		$this->load->database();
	}

	function is_valid($username, $password)
	{
		$param['user_username'] = $username;
		$param['user_password'] = md5($password);
		$param['user_active_status'] = '1';
		
		$query = $this->db->get_where('users u', $param);
		
		# debug($this->db->last_query());

		if ($query->num_rows() == 0) return NULL;
		$data = $query->row_array();
		
		return array($data['user_id'], $data['user_type_id']);
	}
	
	function is_facebook_valid($username)
	{
		$param['user_username'] = $username;
		$param['user_active_status'] = '1';
		
		$query = $this->db->get_where('users', $param);
		
		# debug($this->db->last_query());

		if ($query->num_rows() == 0) return NULL;
		$data = $query->row_array();
		
		return array($data['user_id'], $data['user_type_id']);
	}
	
	function create_user($data){
		$this->db->trans_start();
		$this->db->insert('users', $data);
		$id = $this->db->insert_id();
		
		if($data['user_type_id'] == 2){
			$data_creative['user_id'] = $id;
			$this->db->insert('creatives', $data_creative);
		}
		
		$this->db->trans_complete();
		return $id;
	}
	
	function create_user_facebook($data, $data_creative){
		$this->db->trans_start();
		$this->db->insert('users', $data);
		$id = $this->db->insert_id();
		
		if($data['user_type_id'] == 2){
			$data_creative['user_id'] = $id;
			$this->db->insert('creatives', $data_creative);
		}
		
		$this->db->trans_complete();
		return $id;
	}
	
	
	
	
}