<?php

class Forgot_model extends CI_Model{

	function __construct(){
		$this->load->database();
	}

	function is_valid($email)
	{
		
		$param['user_email'] = $email;
		
		$query = $this->db->get_where('users', $param);


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

	function create_forgot($data){
		$this->db->trans_start();
		$this->db->insert('user_forgots', $data);
		$id = $this->db->insert_id();
		
		$this->db->trans_complete();
		return $id;
	}

	function edit_forgot($data, $id){

		$this->db->trans_start();
		$this->db->where('user_id', $id);
		$this->db->update('user_forgots', $data);
	
		$this->db->trans_complete();
		return $id;
	}

	function edit_status_forgot($user_id, $code){

		$this->db->trans_start();
		$data['status'] = 0;
		$this->db->where('user_id', $user_id);
		$this->db->where('code', $code);
		$this->db->update('user_forgots', $data);
	
		$this->db->trans_complete();
		return $id;
	}

	function edit_password($data, $id){

		$this->db->trans_start();
		$this->db->where('user_id', $id);
		$this->db->update('users', $data);
	
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
	
	function is_data_exist($user_id)
	{
		$sql = "select count(uf_id) as jumlah 
				from user_forgots
				where user_id = '$user_id' 
				";
		
		$query = $this->db->query($sql);
		
		$result = null;
		foreach ($query->result_array() as $row) $result = ($row);
		
		$result['jumlah'] = ($result['jumlah'] > 0) ? $result['jumlah'] : 0;
		return $result['jumlah'];
	}

	function check_code($user_id, $code)
	{
		$sql = "select count(uf_id) as jumlah 
				from user_forgots
				where user_id = '$user_id' and code = '$code'
				and status = '1'
				";
		
		$query = $this->db->query($sql);
		
		$result = null;
		foreach ($query->result_array() as $row) $result = ($row);
		
		$result['jumlah'] = ($result['jumlah'] > 0) ? $result['jumlah'] : 0;
		return $result['jumlah'];
	}
	
	
	
}