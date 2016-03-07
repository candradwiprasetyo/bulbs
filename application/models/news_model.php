<?php

class News_model extends CI_Model{

	function __construct(){
		$this->load->database();
	}
	
	
	
	function read_max_id()
	{
		
		
		$sql = "
			select max(news_id) as last_id from news 
			
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
			select a.*, b.user_first_name, b.user_last_name 
			from news a
			join users b on b.user_id = a.user_id
			
			where news_id = '$id'
			
				";
	
		$query = $this->db->query($sql);
		//query();
		$result = null;
		foreach($query->result_array() as $row)	$result = ($row); // render dulu dunk!
		return $result; 

	}
	
	
}