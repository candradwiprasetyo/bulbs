<?php

class Profile_mobile_model extends CI_Model{

	function __construct(){
		$this->load->database();
	}
	
	
	
	function read_id($id)
	{
		$this->db->select('a.*, b.*, c.location_name', 1); // ambil seluruh data
		$this->db->join('creatives b', 'b.user_id = a.user_id');
		$this->db->join('locations c', 'c.location_id = b.location_id');
		$this->db->where('a.user_id', $id);
		$query = $this->db->get('users a', 1); // parameter limit harus 1
		$result = null; // inisialisasi variabel. biasakanlah, untuk mencegah warning dari php.
		foreach($query->result_array() as $row)	$result = ($row); // render dulu dunk!
		return $result; 
	}
	
	function save_profile($data, $id){

		$this->db->trans_start();
		$this->db->where('user_id', $id);
		$this->db->update('creatives', $data);
	
		$this->db->trans_complete();
		return $id;
	}
	
	function save_account($data_account, $id){

		$this->db->trans_start();
		$this->db->where('user_id', $id);
		$this->db->update('users', $data_account);
	
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

	
	function delete_detail($user_id){

		$this->db->trans_start();
		$this->db->where('user_id', $user_id);
		$this->db->delete('profile_detail_categories');
		$this->db->trans_complete();
		
	}
	
		function get_profile_follower($creative_id)
	{
		$sql = "select count(tr_following_id) as jumlah 
				from tr_following
				where user_creative_id = '$creative_id' 
				";
		
		$query = $this->db->query($sql);
		
		$result = null;
		foreach ($query->result_array() as $row) $result = ($row);
		
		$result['jumlah'] = ($result['jumlah']) ? $result['jumlah'] : 0;
		return $result['jumlah'];
	}
	
	function get_profile_following($regular_id)
	{
		$sql = "select count(tr_following_id) as jumlah 
				from tr_following
				where user_regular_id = '$regular_id' 
				";
		
		$query = $this->db->query($sql);
		
		$result = null;
		foreach ($query->result_array() as $row) $result = ($row);
		
		$result['jumlah'] = ($result['jumlah']) ? $result['jumlah'] : 0;
		return $result['jumlah'];
	}
	
	function get_profile_view($creative_id)
	{
		$sql = "select count(pv_id) as jumlah 
				from profile_views
				where user_creative_id = '$creative_id' 
				";
		
		$query = $this->db->query($sql);
		
		$result = null;
		foreach ($query->result_array() as $row) $result = ($row);
		
		$result['jumlah'] = ($result['jumlah']) ? $result['jumlah'] : 0;
		return $result['jumlah'];
	}
	
	function get_profile_like($creative_id)
	{
		$sql = "select count(pl_id) as jumlah 
				from profile_likes
				where user_creative_id = '$creative_id' 
				";
		
		$query = $this->db->query($sql);
		
		$result = null;
		foreach ($query->result_array() as $row) $result = ($row);
		
		$result['jumlah'] = ($result['jumlah']) ? $result['jumlah'] : 0;
		return $result['jumlah'];
	}
	
	function get_current_password($user_id)
	{
		$sql = "select user_password as result from users where user_id = '$user_id' 
				";
		
		$query = $this->db->query($sql);
		
		$result = null;
		foreach ($query->result_array() as $row) $result = ($row);
		
		return $result['result'];
	}
	
}