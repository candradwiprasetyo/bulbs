<?php

class Home_model extends CI_Model{

	function __construct(){
		$this->load->database();
	}
	
	function create($data){
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

	function get_project_img($limit)
	{
		$sql = "select project_img from projects  order by project_id limit $limit
				";
		
		$query = $this->db->query($sql);
		
		$result = null;
		foreach ($query->result_array() as $row) $result = ($row);
		return $result['project_img'];
	}
	
	function get_project_id($limit)
	{
		$sql = "select project_id from projects  order by project_id limit $limit
				";
		
		$query = $this->db->query($sql);
		
		$result = null;
		foreach ($query->result_array() as $row) $result = ($row);
		return $result['project_id'];
	}

	
	
	
	
}