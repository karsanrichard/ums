<?php
/**
* 
*/
class Groups extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$user_id = $this->session->userdata('userid');
		echo $user_id;
	}

	function view_group_notes()
	{

	}

}
?>