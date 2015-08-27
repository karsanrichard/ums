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

	function upload_notes($insert_array)
	{
		$result = $this->db->insert_batch('notes', $insert_array);

		return $result;
	}

	function get_notes($unit_id,$lec_id)
	{
		$sql = "SELECT
				`nt`.`id`,
				`nt`.`path`,
				`nt`.`date_uploaded`,
				`un`.`unit_name`,
				`ntt`.`note_type`,
				`tp`.`topic_name`
			FROM `notes` `nt` JOIN `unit_details` `ud` ON `nt`.`unit_details_id` = `ud`.`id` JOIN `units` `un` ON `ud`.`unit_id`=`un`.`id` JOIN `topics` `tp` ON `nt`.`topic_id` = `tp`.`id` JOIN `lecturers` `lt` ON `ud`.`lecturer_id` = `lt`.`id` JOIN `notes_type` `ntt` ON `nt`.`note_type_id` = `ntt`.`id`
			WHERE `lt`.`id` = '$lec_id' AND `un`.`id` = '$unit_id'";

		$result = $this->db->query($sql);
		$result = $result->result_array();

		return $result;
	}

	function get_topics()
	{
		$sql = "SELECT * FROM `topics`";

		$result = $this->db->query($sql);

		return $result->result_array();
	}
}
?>