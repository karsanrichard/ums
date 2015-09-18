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

	function get_group($courseID){
		$result = $this->db->query("SELECT * FROM `groups` WHERE `group_id` = '$courseID'");
	
		return $result->result_array();
	}

	function group_belong($user_id)
	{
		$result = $this->db->query("SELECT * FROM `groups` `g` JOIN `student_groups` `sg` ON `g`.`group_id` = `sg`.`group_id` WHERE `sg`.`user_id` = '$user_id'");
	
		return $result->result_array();
	}

	function get_group_data($courseID)
	{
		$result = $this->db->query("SELECT * FROM `groups` `g` JOIN `student_groups` `sg` ON `g`.`group_id` = `sg`.`group_id` JOIN `group_notes` `gn` ON `g`.`group_id` = `gn`.`group_id` WHERE `g`.`group_id` = '$courseID'");
	
		return $result->result_array();
	}

	function get_group_topics($courseID)
	{
		$result = $this->db->query("SELECT DISTINCT `topic` FROM `group_notes` WHERE `group_id` = '$courseID'");

		return $result->result_array();
	}
}
?>