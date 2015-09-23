<?php
/**
* 
*/
class Messages extends MY_Controller
{
	
	function __construct()
	{
		parent:: __construct();
		$this->load->model('messages_model');
	}

	function index(){
		$user_id = $this->session->userdata('userid');
		if ($this->get_user_module() == 'lecturer') {
			$this->data['unread_messages'] = $this->messages_model->get_unread_messages_count($user_id);
			$this->data['content_view'] = 'messages/messages_v';
			$this->data['title'] = 'UMS | Messages';
			// echo "<pre>";print_r($this->data);die();
			$this->template->call_template($this->data);
		} else if ($this->get_user_module() == 'student') {
			
		}
	}

	function inbox()
	{
		$user_id = $this->session->userdata('userid');
		
		$messages = $this->messages_model->get_messages(1);
		echo "<pre>";print_r($messages);
	}
}

?>