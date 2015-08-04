<?php
	class Lecturer extends MY_Controller
	{
		function __construct()
		{
			parent:: __construct();
		}

		function index()
		{
			$this->data['content_view'] = 'lecturer/dashboard';
			$this->data['title'] = 'UMS | Dashboard';
			$this->template->call_template($this->data);
		}
	}
?>