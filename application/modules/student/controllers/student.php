<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student extends MY_Controller {
	function __construct(){
		$this -> load ->model('student_model');
	}

	public function index()
	{
		$this ->load ->view('student_template');
	}

	public function student_inbox(){
		$unread_messages = $this->student_model->get_unread_messages_count(1);
		$messages = $this->student_model->get_messages(1);
		$unread_messages = $unread_messages[0]['unread_count'];
		// echo "<pre>";print_r($messages);echo "</pre>";exit;
		$data['messages'] = $messages;
		$data['message_count'] = count($messages);
		$data['unread_count'] = $unread_messages;
		$data['content'] = "student/student_inbox";
		$this->load->view('student_template',$data);
	}

	public function student_msg_details($msg_id){
		$query = "UPDATE messages SET status=2 WHERE id=$msg_id";
		$set_as_read = $this->db->query($query);

		$unread_messages = $this->student_model->get_unread_messages_count(1);
		$unread_messages = $unread_messages[0]['unread_count'];
		
		$messages_ = $this->student_model->get_message_details($msg_id);
		$data['unread_count'] = $unread_messages;
		$data['message_content'] = $messages_;
		$data['content'] = "student/student_inbox_detail";
		$this->load->view('student_template',$data);
	}

	public function student_compose_messsage($msg_id = NULL){
		$unread_messages = $this->student_model->get_unread_messages_count(1);
		$data['content'] = "student/student_compose";
		$students = $this->student_model ->get_students();
		$unread_messages = $unread_messages[0]['unread_count'];
		$data['unread_count'] = $unread_messages;
		if (isset($msg_id)) {
			$msg_details = $this->student_model->get_message_details($msg_id);
			$data['msg_id'] = $msg_details[0]['id'];
			$data['time_sent'] = $msg_details[0]['time_sent'];
			$data['subject'] = $msg_details[0]['subject'];
			$data['message'] = $msg_details[0]['message'];
			$data['sender_fname'] = $msg_details[0]['sender_fname'];
			$data['sender_lname'] = $msg_details[0]['sender_lname'];
			$data['sender_onames'] = $msg_details[0]['sender_onames'];
			$data['replying'] = 1;
		}
		else{
			$data['students'] = $students;
			// $data['replying'] = 0;

		}
		// echo "I WORK";exit;
		// echo "<pre>";print_r($data);echo "</pre>";exit;
		$this->load->view('student_template',$data);
	}

	public function reply_message($reply_id = NULL){
		// echo $reply_id;exit;
		// echo "SUCCESS";exit;
		$var = $this->input->post();
		// echo "<pre>";print_r($var);echo "</pre>";exit;
		$msg_body = $this->input->post('message_body');
		$msg_subject = $this->input->post('msg_subject');
		$reply_id = isset($reply_id)? $reply_id:NULL;

		$msg_array = array();
		$msg_arr = array(
			'message' => $msg_body, 
			'recepient_id' => $msg_body, 
			'message' => $msg_body, 
			'message' => $msg_body
			);
		// $msg_subject = $_POST['msg_subject'];

		echo $msg_body;
	}
}
