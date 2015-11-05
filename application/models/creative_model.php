<?php

class Creative_model extends CI_Model{

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
	
	function multiple1() {
		$query = "select * from profile_categories order by pc_id";
        $query = $this->db->query($query);
       // query();
        if ($query->num_rows() == 0)
            return array();
        $data = $query->result_array();
        foreach ($data as $index => $row) {}
        return $data;
	}
	
	function multiple2() {
		$query = "select * from locations order by location_id";
        $query = $this->db->query($query);
       // query();
        if ($query->num_rows() == 0)
            return array();
        $data = $query->result_array();
        foreach ($data as $index => $row) {}
        return $data;
	}

	
}