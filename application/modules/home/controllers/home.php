<?php
// if(!defined(BASEPATH)) exit('No direct script access allowed');
/**
*  Author:
*/
class Home extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		
	}

	function notes_upload()
	{
		$this->data['notes_dropdown'] = $this->notes->drop_notes_type();

		$this->load->view('notes/notes_upload', $this->data);
	}

	function upload_notes()
	{
		
	}
}
?>