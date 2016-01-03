<?php

class Project_model extends CI_Model{

	function __construct(){
		$this->load->database();
	}
	
	
	
	
	function save($data){

		$this->db->trans_start();
		$this->db->insert('projects', $data);
		$id = $this->db->insert_id();
		
		$this->db->trans_complete();
		return $id;
	}

	function save_tmp($data){

		$this->db->trans_start();
		$this->db->insert('projects_tmp', $data);
		$id = $this->db->insert_id();
		
		$this->db->trans_complete();
		return $id;
	}
	
	function edit($data, $id){

		$this->db->trans_start();
		$this->db->where('project_id', $id);
		$this->db->update('projects', $data);
	
		$this->db->trans_complete();
		return $id;
	}

	function edit_img($data, $id){

		$this->db->trans_start();
		$this->db->where('pdt_id', $id);
		$this->db->update('project_detail_tmp', $data);
	
		$this->db->trans_complete();
		return $id;
	}
	
	function delete($id){
		
		$data['project_active_status'] = 0;
		
		$this->db->trans_start();
		$this->db->where('project_id', $id);
		$this->db->update('projects', $data);
	
		$this->db->trans_complete();
		return $id;
	}
	
	
	function save_detail($data){

		$this->db->trans_start();
		$this->db->insert('project_detail_categories', $data);
		$id = $this->db->insert_id();
		
		$this->db->trans_complete();
		return $id;
	}

	function save_detail_categories_tmp($data){

		$this->db->trans_start();
		$this->db->insert('project_detail_categories_tmp', $data);
		$id = $this->db->insert_id();
		
		$this->db->trans_complete();
		return $id;
	}

	function save_detail_images($data){

		$this->db->trans_start();
		$this->db->insert('project_detail_images', $data);
		$id = $this->db->insert_id();
		
		$this->db->trans_complete();
		return $id;
	}

	function save_detail_tmp($data){

		$this->db->trans_start();
		$this->db->insert('project_detail_tmp', $data);
		$id = $this->db->insert_id();
		
		$this->db->trans_complete();
		return $id;
	}
	
	function save_detail_img($data){

		$this->db->trans_start();
		$this->db->insert('project_detail_images', $data);
		$id = $this->db->insert_id();
		
		$this->db->trans_complete();
		return $id;
	}
	
	function read_id($id)
	{
		$this->db->select('a.*, b.creative_wp_name, c.location_name, b.user_id, b.creative_img', 1); // ambil seluruh data
		$this->db->join('creatives b', 'b.creative_id = a.creative_id');
		$this->db->join('locations c', 'c.location_id = b.location_id', 'left');
		$this->db->where('a.project_id', $id);
		$query = $this->db->get('projects a', 1); // parameter limit harus 1
		$result = null; // inisialisasi variabel. biasakanlah, untuk mencegah warning dari php.
		foreach($query->result_array() as $row)	$result = ($row); // render dulu dunk!
		return $result; 
	}

	function delete_tmp($user_id){

		$this->db->trans_start();
		$this->db->where('user_id', $user_id);
		$this->db->delete('projects_tmp');
		$this->db->trans_complete();
		
	}

	function delete_project_detail_categories_tmp($project_tmp_id){

		$this->db->trans_start();
		$this->db->where('project_tmp_id', $project_tmp_id);
		$this->db->delete('project_detail_categories_tmp');
		$this->db->trans_complete();
		
	}


	function delete_project_detail_tmp($project_tmp_id){

		$this->db->trans_start();
		$this->db->where('project_tmp_id', $project_tmp_id);
		$this->db->delete('project_detail_tmp');
		$this->db->trans_complete();
		
	}

	
	function read_edit_id($id)
	{
		$this->db->select('a.*', 1); // ambil seluruh data
		$this->db->where('a.project_id', $id);
		$query = $this->db->get('projects a', 1); // parameter limit harus 1
		$result = null; // inisialisasi variabel. biasakanlah, untuk mencegah warning dari php.
		foreach($query->result_array() as $row)	$result = ($row); // render dulu dunk!
		return $result; 
	}

	function read_tmp_id()
	{
		$this->db->select('a.*', 1); // ambil seluruh data
		$this->db->where('a.user_id', $this->session->userdata('user_id'));
		$query = $this->db->get('projects_tmp a', 1); // parameter limit harus 1
		$result = null; // inisialisasi variabel. biasakanlah, untuk mencegah warning dari php.
		foreach($query->result_array() as $row)	$result = ($row); // render dulu dunk!
		return $result; 
	}

	function read_tmp_img($id)
	{
		$this->db->select('a.*, b.*', 1); // ambil seluruh data
		$this->db->where('pdt_id', $id);
		$this->db->join('projects_tmp b', 'b.project_tmp_id = a.project_tmp_id');
		$query = $this->db->get('project_detail_tmp a', 1); // parameter limit harus 1
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
	
	function delete_detail($project_id){

		$this->db->trans_start();
		$this->db->where('project_id', $project_id);
		$this->db->delete('project_detail_categories');
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

	function get_project_tmp_id($user_id)
	{
		$sql = "select project_tmp_id as result from projects_tmp where user_id = '$user_id'
				";
		
		$query = $this->db->query($sql);
		
		$result = null;
		foreach ($query->result_array() as $row) $result = ($row);
		
		return $result['result'];
	}

	function get_project_tmp_img($user_id)
	{
		$sql = "select project_img as result from projects_tmp where user_id = '$user_id'
				";
		
		$query = $this->db->query($sql);
		
		$result = null;
		foreach ($query->result_array() as $row) $result = ($row);
		
		return $result['result'];
	}

	function get_old_img($id)
	{
		$sql = "select pdt_value as result from project_detail_tmp where pdt_id = '$id'
				";
		
		$query = $this->db->query($sql);
		
		$result = null;
		foreach ($query->result_array() as $row) $result = ($row);
		
		return $result['result'];
	}

	
	
}