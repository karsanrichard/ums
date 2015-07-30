<?php 
/**
* 
*/
class Notes_model extends MY_Model
{
	function get_notes_types()
	{
		$sql = "SELECT 
					*
				FROM
					`notes_type`";
		$return = $this->db->query($sql);

		$return = $return->result_array();
		
		return $return;
	}
}
?>