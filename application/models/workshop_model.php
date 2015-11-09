<?php

class Workshop_model extends CI_Model{

	function __construct(){
		$this->load->database();
	}
	
	
	
	function read_max_id()
	{
		
		
		$sql = "
			select max(workshop_id) as last_id from workshops 
			
				";
	
		$query = $this->db->query($sql);
		//query();
		$result = null;
		foreach($query->result_array() as $row)	$result = ($row); // render dulu dunk!
		return $result; 

	}
	
	function read_id($id)
	{
		$sql = "
			select a.*, b.creative_wp_name, b.creative_img
			from workshops a
			join creatives b on b.user_id = a.user_id
			
			where workshop_id = '$id'
			
				";
	
		$query = $this->db->query($sql);
		//query();
		$result = null;
		foreach($query->result_array() as $row)	$result = ($row); // render dulu dunk!
		return $result; 

	}
	
	
}