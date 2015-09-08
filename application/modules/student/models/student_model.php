<?php 
class Student_model extends MY_Model
{
	function __construct(){

	}

	public function get_messages($user_id = NULL){
		$query = "CALL get_messages($user_id)";

		$result = $this->db->query($query);
		
		return $result->result_array();
	}

	public function get_message_details($msg_id = NULL){
		$query = "
		SELECT 
		    m.id AS id,
		    m.time_sent,
		    m.recepient_id,
		    m.status,
		    m.subject,
		    m.message,
		    m.sender_id,
		    m.reply_to,
		    s.first_name AS sender_fname,
		    s.last_name AS sender_lname,
		    s.other_name AS sender_onames,
		    s.course_id
		FROM
		    messages m,
		    students s,
		    users u
		WHERE
		    m.id = $msg_id and m.recepient_id = u.id AND s.user_id = u.id
		";

		$result = $this->db->query($query);
		
		return $result->result_array();
	}

	public function get_students(){
		$query = "SELECT * FROM students";

		$result = $this->db->query($query);
		
		return $result->result_array();

	}

	public function get_unread_messages_count($user_id){
		$query = "SELECT COUNT(id) AS unread_count FROM messages WHERE recepient_id = $user_id AND status = 1";

		$result = $this->db->query($query);
		
		return $result->result_array();

	}

	public function get_student_data($user_id){
		$query = "SELECT * FROM students WHERE user_id = $user_id";
		$result = $this->db->query($query)->result_array();
		return $result;
	}

}
//end of file
 ?>