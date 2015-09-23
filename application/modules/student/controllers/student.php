	<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Student extends MY_Controller {
		public function __construct(){
		$this -> load ->model('student_model');
		$this->check_login();
	}

	public function index()
	{
		// echo "<pre>";print_r($this->session->all_userdata());echo "</pre>";exit;
		$user_id = $this->session->userdata('userid');
		$student_data = $this->student_model->get_student_data($user_id);
		$data['student_data'] = $student_data;
		$data['unread_messages_count'] = $this->get_unread_count();
		// echo "<pre>";print_r($data['student_data']);echo "</pre>";exit;
		$this ->load ->view('student_template',$data);
	}

	public function student_inbox(){
		// echo "<pre>";print_r($this->session->all_userdata());exit;
		$user_id = $this->session->userdata('userid');
		$student_data = $this->student_model->get_student_data($user_id);
		// echo "<pre>";print_r($student_data);echo "</pre>";exit;
		$data['student_data'] = $student_data;
		$unread_messages = $this->student_model->get_unread_messages_count($user_id);
		$messages = $this->student_model->get_messages($user_id);
		$unread_messages = $unread_messages[0]['unread_count'];
		// echo "<pre>";print_r($messages);echo "</pre>";exit;
		$data['messages'] = $messages;
		$data['message_count'] = count($messages);
		$data['unread_count'] = $unread_messages;
		$data['unread_messages_count'] = $this->get_unread_count();
		$data['content'] = "student/student_inbox";
		$this->load->view('student_template',$data);
	}

	public function student_msg_details($msg_id){
		$user_id = $this->session->userdata('userid');
		$data['unread_messages_count'] = $this->get_unread_count();
		$student_data = $this->student_model->get_student_data($user_id);
		// echo "<pre>";print_r($student_data);echo "</pre>";exit;
		$data['student_data'] = $student_data;
		$query = "UPDATE messages SET status=2 WHERE id=$msg_id";
		$set_as_read = $this->db->query($query);

		$unread_messages = $this->student_model->get_unread_messages_count($user_id);
		$unread_messages = $unread_messages[0]['unread_count'];
		
		$messages_ = $this->student_model->get_message_details($msg_id);
		$data['unread_count'] = $unread_messages;
		$data['message_content'] = $messages_;
		$data['content'] = "student/student_inbox_detail";
		$this->load->view('student_template',$data);
	}

	public function student_compose_messsage($msg_id = NULL){
		$user_id = $this->session->userdata('userid');
		$data['unread_messages_count'] = $this->get_unread_count();
		$student_data = $this->student_model->get_student_data($user_id);
		// echo "<pre>";print_r($student_data);echo "</pre>";exit;
		$data['student_data'] = $student_data;
		$unread_messages = $this->student_model->get_unread_messages_count($user_id);
		$data['content'] = "student/student_compose";
		$students = $this->student_model ->get_students_for_msg($user_id);
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
			$data['sender_id'] = $msg_details[0]['sender_id'];
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
		$user_id = $this->session->userdata('userid');
		$data['unread_messages_count'] = $this->get_unread_count();
		$student_data = $this->student_model->get_student_data($user_id);
		// echo "<pre>";print_r($student_data);echo "</pre>";exit;
		$data['student_data'] = $student_data;
		// echo $reply_id;exit;
		// echo "SUCCESS";exit;
		$var = $this->input->post();
		// echo "<pre>";print_r($var);echo "</pre>";

		$msg_body = $this->input->post('message_body');
		$msg_subject = $this->input->post('msg_subject');
		$recepient_id = $this->input->post('recepient');
		$reply_id = isset($reply_id)? $reply_id:NULL;

		$msg_array = array();
		$msg_arr = array(
			'message' => $msg_body, 
			'recepient_id' => $recepient_id, 
			'sender_id' => $user_id, 
			'subject' => $msg_subject, 
			'reply_to' => $reply_id
			);
		array_push($msg_array, $msg_arr);
		$result = $this->db->insert_batch('messages',$msg_array);

		// $msg_subject = $_POST['msg_subject'];

		echo $result;
	}

	public function student_groups(){
		$user_id = $this->session->userdata('userid');
		$data['unread_messages_count'] = $this->get_unread_count();
		$data['content_view'] = 'student/student_groups';

		// echo $user_id;exit;
		$this->load->view('student_template',$data);
	}
}
