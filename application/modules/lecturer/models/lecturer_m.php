<?php
/**
* 
*/
class Lecturer_m extends MY_Model
{
	
	function __construct()
	{
		parent:: __construct();
	}

	function get_lecturer_details($uid)
	{
		$sql = "";

		$result = $this->db->query($sql);
	}

	function get_lecturer_units_details($uid)
	{
		$sql = "SELECT `ud`.`id` AS `unit_details_id`,
						`ud`.`lecturer_id`,
						`un`.`id` AS `unit_id`,
						`un`.`unit_name`,
						`cd`.`course_id`,
						`cs`.`course_name`
				FROM `unit_details` `ud` 
				JOIN `units` `un`
				ON `ud`.`unit_id` =`un`.`id`
				JOIN `course_details` `cd`
				ON `un`.`id` = `cd`.`unit_id`
				JOIN `courses` `cs`
				ON `cd`.`course_id` = `cs`.`id`
				WHERE `ud`.`lecturer_id` = '$uid';";

		$result = $this->db->query($sql);

		return $result->result_array();
	}

	function get_unit_details($user_id,$unit_id)
	{
		$sql = "SELECT `ud`.`id` AS `unit_details_id`,
						`ud`.`lecturer_id`,
						`un`.`id` AS `unit_id`,
						`un`.`unit_name`,
						`cd`.`course_id`,
						`cs`.`course_name`
				FROM `unit_details` `ud` 
				JOIN `units` `un`
				ON `ud`.`unit_id` =`un`.`id`
				JOIN `course_details` `cd`
				ON `un`.`id` = `cd`.`unit_id`
				JOIN `courses` `cs`
				ON `cd`.`course_id` = `cs`.`id`
				WHERE `ud`.`lecturer_id` = '$user_id' AND `un`.`id` = '$unit_id';";

		$result = $this->db->query($sql);

		return $result->result_array();
	}

	function get_topics()
	{
		$sql = "SELECT * FROM `topics`";

		$result = $this->db->query($sql);

		return $result->result_array();
	}
}
?>