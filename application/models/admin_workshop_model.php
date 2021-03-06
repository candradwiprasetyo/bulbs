<?php

class Admin_workshop_model extends CI_Model{

	function __construct(){
		$this->load->database();
	}
	
	function list_data() {
		$query = "select * from workshops order by workshop_id desc";
        $query = $this->db->query($query);
       // query();
        if ($query->num_rows() == 0)
            return array();
        $data = $query->result_array();
        foreach ($data as $index => $row) {}
        return $data;
	}

	function read_id($id)
	{
		$this->db->select('a.*', 1); // ambil seluruh data
		
		$this->db->where('a.workshop_id', $id);
		$query = $this->db->get('workshops a', 1); // parameter limit harus 1
		$result = null; // inisialisasi variabel. biasakanlah, untuk mencegah warning dari php.
		foreach($query->result_array() as $row)	$result = ($row); // render dulu dunk!
		return $result; 
	}
	
	
	
	function create($data){

		$this->db->trans_start();
		$this->db->insert('workshops', $data);
		$id = $this->db->insert_id();
		
		$this->db->trans_complete();
		return $id;
	}

	function update($data, $id){

		$this->db->trans_start();
		$this->db->where('workshop_id', $id);
		$this->db->update('workshops', $data);
	
		$this->db->trans_complete();
		return $id;
	}
	function delete($id){

		$this->db->trans_start();
		$this->db->where('workshop_id', $id);
		$this->db->delete('workshops');
		$this->db->trans_complete();
		
	}

	function get_img($table, $column, $param){



		$sql = "select $column as result from $table where $param";
		
		$query = $this->db->query($sql);
		
		$result = null;
		foreach ($query->result_array() as $row) $result = ($row);
		return $result['result'];
	
		

	}	
	
	function save_detail($data){

		$this->db->trans_start();
		$this->db->insert('workshop_details', $data);
		$id = $this->db->insert_id();
		
		$this->db->trans_complete();
		return $id;
	}
	
	function delete_detail($workshop_id){

		$this->db->trans_start();
		$this->db->where('workshop_id', $workshop_id);
		$this->db->delete('workshop_details');
		$this->db->trans_complete();
		
	}
	
}