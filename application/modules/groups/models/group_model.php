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

	function get_all_groups(){
		$result = $this->db->query("
			SELECT 
			    g.group_id,
			    g.group_name,
			    g.managed_by,
			    g.authentication,
			    g.password,
			    s.first_name,
			    s.last_name,
			    s.other_name
			FROM
			    groups g,users u,students s
			    WHERE
			    s.user_id = u.id AND g.managed_by = u.id
    ");
	
		return $result->result_array();
	}

	function get_group_data($courseID)
	{
		$result = $this->db->query("SELECT `g`.`group_id`, `g`.`group_name`, `g`.`managed_by`, `sg`.`user_id`, `sg`.`user_id`, `gn`.`group_notes_id`, `gn`.`topic`, `gn`.`path`, `gn`.`status` FROM `groups` `g` JOIN `student_groups` `sg` ON `g`.`group_id` = `sg`.`group_id` JOIN `group_notes` `gn` ON `g`.`group_id` = `gn`.`group_id` WHERE `g`.`group_id` = '$courseID' GROUP BY `gn`.`group_notes_id`");
	
		return $result->result_array();
	}

	function get_group_topics($courseID)
	{
		$result = $this->db->query("SELECT DISTINCT `topic` FROM `group_notes` WHERE `group_id` = '$courseID'");

		return $result->result_array();
	}

	function get_auth_status($group_id)
	{
		$result = $this->db->query("SELECT authentication FROM `groups` WHERE `group_id` = '$group_id'");

		return $result->result_array();
	}

	function group_auth($group_pass = NULL,$group_id = NULL){
		$result = $this->db->query("SELECT group_id FROM `groups` WHERE `password` = '$group_pass' AND group_id = '$group_id'");

		$result = $result->result_array();
		$return = array();
		// echo "<pre>"; print_r($result);exit;
		if (isset($result)) {
			$return['truth'] = TRUE;
			$return['group_id'] = $result[0]['group_id'];
			return $return;
		}else{
			$return['truth'] = FALSE;
			return $return;
		}
		// return $result->result_array();
	}
}
?>