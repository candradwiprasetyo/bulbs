<?php

class Profile_view_model extends CI_Model{

	function __construct(){
		$this->load->database();
	}
	
	function read_id($id)
	{
		$this->db->select('b.*, c.location_name', 1); // ambil seluruh data
		$this->db->join('creatives b', 'b.user_id = a.user_id');
		$this->db->join('locations c', 'c.location_id = b.location_id', 'left');
		$this->db->where('a.user_id', $id);
		$query = $this->db->get('users a', 1); // parameter limit harus 1
		$result = null; // inisialisasi variabel. biasakanlah, untuk mencegah warning dari php.
		foreach($query->result_array() as $row)	$result = ($row); // render dulu dunk!
		return $result; 
	}
	
	function following($data){

		$this->db->trans_start();
		$this->db->insert('tr_following', $data);
		$id = $this->db->insert_id();
		
		$this->db->trans_complete();
		return $id;
	}
	
	function unfollowing($creative_id, $user_id){

		$this->db->trans_start();
		$this->db->where('user_creative_id', $creative_id);
		$this->db->where('user_regular_id', $user_id);
		$this->db->delete('tr_following');
	
		$this->db->trans_complete();
		
	}
	
	function like($data){

		$this->db->trans_start();
		$this->db->insert('profile_likes', $data);
		$id = $this->db->insert_id();
		
		$this->db->trans_complete();
		return $id;
	}
	
	function dislike($creative_id, $user_id){

		$this->db->trans_start();
		$this->db->where('user_creative_id', $creative_id);
		$this->db->where('user_regular_id', $user_id);
		$this->db->delete('profile_likes');
	
		$this->db->trans_complete();
		
	}
	
	function check_profile_view($creative_id, $regular_id)
	{
		$sql = "select count(pv_id) as jumlah 
				from profile_views
				where user_creative_id = '$creative_id' 
				and user_regular_id = '$regular_id'
				";
		
		$query = $this->db->query($sql);
		
		$result = null;
		foreach ($query->result_array() as $row) $result = ($row);
		return $result['jumlah'];
	}
	
	function create_profile_view($creative_id, $regular_id){
			
		$data['user_creative_id'] = $creative_id;
		$data['user_regular_id'] = $regular_id;
		
		$this->db->trans_start();
		$this->db->insert('profile_views', $data);
		$id = $this->db->insert_id();
		
		$this->db->trans_complete();
		return $id;
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
	
	function get_follow_status($creative_id, $regular_id)
	{
		$sql = "select count(tr_following_id) as jumlah 
				from tr_following
				where user_creative_id = '$creative_id'
				and user_regular_id = '$regular_id' 
				";
		
		$query = $this->db->query($sql);
		
		$result = null;
		foreach ($query->result_array() as $row) $result = ($row);
		
		$result['jumlah'] = ($result['jumlah'] > 0) ? $result['jumlah'] : 0;
		return $result['jumlah'];
	}
	
	function get_like_status($creative_id, $regular_id)
	{
		$sql = "select count(pl_id) as jumlah 
				from profile_likes
				where user_creative_id = '$creative_id'
				and user_regular_id = '$regular_id' 
				";
		
		$query = $this->db->query($sql);
		
		$result = null;
		foreach ($query->result_array() as $row) $result = ($row);
		
		$result['jumlah'] = ($result['jumlah'] > 0) ? $result['jumlah'] : 0;
		return $result['jumlah'];
	}

	function review($data){

		$this->db->trans_start();
		$this->db->insert('profile_reviews', $data);
		$id = $this->db->insert_id();
		
		$this->db->trans_complete();
		return $id;
	}
	
}