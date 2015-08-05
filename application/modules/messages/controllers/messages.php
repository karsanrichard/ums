<?php
/**
* 
*/
class Messages extends MY_Controller
{
	
	function __construct()
	{
		parent:: __construct();
	}

	function read($uid=null)
	{
		$this->data['content_view'] = 'messages/messages_v';
		$this->data['title'] = 'UMS | Messages';
		// $this->data['uid'] = $this->session->userdata('userid');
		// echo "<pre>";print_r($this->data);die();
		$this->template->call_template($this->data);
	}
}

?>