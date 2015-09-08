<?php 
/**
* 
*/
class Messages_model extends MY_Model
{
	
	function __construct()
	{
		parent:: __construct();
	}
	public function get_messages($user_id = NULL){
		$query = "CALL get_messages($user_id)";

		$result = $this->db->query($query);
		
		return $result->result_array();
	}

	public function get_unread_messages_count($user_id){
		$query = "SELECT COUNT(id) AS unread_count FROM messages WHERE recepient_id = $user_id AND status = 1";

		$result = $this->db->query($query);
		return $result->result_array();
	}
}

?>