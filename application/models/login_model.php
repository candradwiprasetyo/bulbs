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
		
		$query = $this->db->get_where('users u', array('user_type_id != 1  && `user_username` =' => $username, 'user_active_status' => 1, 'user_password' => md5($password)));
		
		# debug($this->db->last_query());
		
/*
		$sql = "select * 
				from users 
				where user_username = '$username' 
				and user_password = '".md5($password)."'
				and user_active_status = '1'
				 
				";
		
		$query = $this->db->query($sql);*/

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
	
	function cek_registration($user_id)
	{
		$sql = "select b.creative_wp_name 
				from users a
				join creatives b on b.user_id = a.user_id
				where a.user_id = '$user_id' 
				";
		
		$query = $this->db->query($sql);
		
		$result = null;
		foreach ($query->result_array() as $row) $result = ($row);
		return $result['creative_wp_name'];
	}
	
	
}