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
	
	
}