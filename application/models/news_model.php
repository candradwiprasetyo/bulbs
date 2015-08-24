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
			select a.*, b.creative_wp_name, c.news_type_name 
			from news a
			join creatives b on b.user_id = a.user_id
			join news_types c on c.news_type_id = a.news_type_id
			where news_id = '$id'
			
				";
	
		$query = $this->db->query($sql);
		//query();
		$result = null;
		foreach($query->result_array() as $row)	$result = ($row); // render dulu dunk!
		return $result; 

	}
	
	
}