<?php
/**
* 
*/
class Group_model extends MY_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function group_managed($user_id)
	{
		$result = $this->db->get_where('groups', array('managed_by' => $user_id));
	
		return $result->result_array();
	}
}
?>