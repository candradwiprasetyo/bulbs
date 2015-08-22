<?php 

class Access
{
	
	function get_data_user($id)
	{
		$ci = & get_instance();
		$sql = "select a.*, b.creative_id from users a 
				join creatives b on b.user_id = a.user_id 
				where a.user_id = $id
				";
		
		$query = $ci->db->query($sql);
		
		$result = null;
		foreach ($query->result_array() as $row) $result = ($row);
		return array(
					'user_name' => $result['user_first_name']." ".$result['user_last_name'],
					'creative_id' => $result['creative_id']
		);
	}
	
	
}

# -- end file -- #
