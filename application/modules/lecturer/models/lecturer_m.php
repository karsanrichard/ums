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

	function get_lecturer_units($uid)
	{
		$sql = "SELECT `ud`.`id` AS `unit_details_id`,
						`ud`.`lecturer_id`,
						`un`.`id` AS `unit_id`,
						`un`.`unit_name` 
				FROM `unit_details` `ud` 
				JOIN `units` `un` 
				ON `ud`.`unit_id` =`un`.`id` 
				WHERE `ud`.`lecturer_id` = '$uid'";

		$result = $this->db->query($sql);

		return $result->result_array();
	}
}
?>