<?php

class Message_model extends CI_Model{

	function __construct(){
		$this->load->database();
	}
	
	
	
	function read_id($id)
	{
		$this->db->select('b.*, c.location_name', 1); // ambil seluruh data
		$this->db->join('creatives b', 'b.user_id = a.user_id');
		$this->db->join('locations c', 'c.location_id = b.location_id');
		$this->db->where('a.user_id', $id);
		$query = $this->db->get('users a', 1); // parameter limit harus 1
		$result = null; // inisialisasi variabel. biasakanlah, untuk mencegah warning dari php.
		foreach($query->result_array() as $row)	$result = ($row); // render dulu dunk!
		return $result; 
	}
	
	function read_message_id($id)
	{
		$this->db->select('a.*, c.creative_wp_name as user_creative_name,
								c.creative_img as user_creative_img,
								d.creative_wp_name as user_regular_name,
								d.creative_img as user_regular_img,
								', 1); // ambil seluruh data
		$this->db->join('messages b', 'b.message_id = a.message_id');
		$this->db->join('creatives c', 'c.user_id = b.user_creative_id');
		$this->db->join('creatives d', 'd.user_id = b.user_regular_id');
		$this->db->where('a.user_creative_id', $id);
		$query = $this->db->get('message_details a', 1); // parameter limit harus 1
		$result = null; // inisialisasi variabel. biasakanlah, untuk mencegah warning dari php.
		foreach($query->result_array() as $row)	$result = ($row); // render dulu dunk!
		return $result; 
	}
	
	function save_message($data){

		$this->db->trans_start();
		$this->db->insert('messages', $data);
		$id = $this->db->insert_id();
		
		$this->db->trans_complete();
		return $id;
	}
	
	function save_message_detail($data){

		$this->db->trans_start();
		$this->db->insert('message_details', $data);
		$id = $this->db->insert_id();
		
		$this->db->trans_complete();
		return $id;
	}

	
	function delete_detail($user_id){

		$this->db->trans_start();
		$this->db->where('user_id', $user_id);
		$this->db->delete('message_detail_categories');
		$this->db->trans_complete();
		
	}
	
	function get_message_id($creative_id, $regular_id)
	{
		$sql = "select message_id from messages where user_creative_id = '$creative_id' and user_regular_id = '$regular_id'";
		
		$query = $this->db->query($sql);
		
		$result = null;
		foreach ($query->result_array() as $row) $result = ($row);
		
		return $result['message_id'];
	}
	
	function get_exists($creative_id, $regular_id)
	{
		$sql = "select count(message_id) as jumlah from messages where user_creative_id = '$creative_id' and user_regular_id = '$regular_id'";
		
		$query = $this->db->query($sql);
		
		$result = null;
		foreach ($query->result_array() as $row) $result = ($row);
		
		$result['jumlah'] = ($result['jumlah']) ? $result['jumlah'] : 0;
		return $result['jumlah'];
	}
	
	function get_last_id($regular_id)
	{
		$sql = "select max(m_id) as result from messages where user_regular_id = '$regular_id'";
		
		$query = $this->db->query($sql);
		
		$result = null;
		foreach ($query->result_array() as $row) $result = ($row);
		
		return $result['result'];
	}
	
	function get_last_message($id)
	{
		$sql = "select user_creative_id as result from messages where m_id = '$id'";
		
		$query = $this->db->query($sql);
		
		$result = null;
		foreach ($query->result_array() as $row) $result = ($row);
		
		return $result['result'];
	}
	
}