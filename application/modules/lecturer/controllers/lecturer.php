<?php
	class Lecturer extends MY_Controller
	{
		var $units;
		function __construct()
		{
			parent:: __construct();
			$this->login_reroute();
			$this->load->model('lecturer_m');
		}

		function index()
		{
			$this->data['content_view'] = 'lecturer/dashboard';
			$this->data['title'] = 'UMS | Dashboard';
			$this->template->call_template($this->data);
		}

		function lecturer_units()
		{
			$user_id = $this->session->userdata('userid');
			$this->data['units'] = $this->lecturer_units_lists($user_id);
			$this->data['content_view'] = 'lecturer/units_v';
			$this->data['title'] = 'UMS | Units';
			$this->template->call_template($this->data);
			// echo "<pre>"; print_r($units);
		}

		function lecturer_units_lists($user_id)
		{
			$lec_units = $this->lecturer_m->get_lecturer_units($user_id);
			// echo "<pre>";print_r($lec_units);die();
			foreach ($lec_units as $key => $value) {
				$this->units .= '<li><a href="#"> <i class="fa fa-book"></i>'.$value["unit_name"].'</a></li>';
			}
			// echo $this->units;
			return $this->units;
		}
	}
?>