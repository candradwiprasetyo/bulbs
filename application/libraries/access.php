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
	
	public function format_date($date){
		$phpdate = strtotime( $date );
		$new_date = date( 'd M Y', $phpdate );
		
		return $new_date;
	}
	
	public function get_valid_img($img){
		$data_image = getimagesize($img);
		
		$width = $data_image[0];
		$height = $data_image[1];
		
		$ratio = $width / $height;
		if($ratio > 1.43){
			$class = "img_class2";
		}else{
			$class = "img_class";
		}
		return $class;
	}
	
	public function get_valid_profile_img($img){
		$data_image = getimagesize($img);
		
		$width = $data_image[0];
		$height = $data_image[1];
		
		$ratio = $width / $height;
		if($ratio > 1){
			$class = "img_class2";
		}else{
			$class = "img_class";
		}
		return $class;
	}
}

# -- end file -- #
