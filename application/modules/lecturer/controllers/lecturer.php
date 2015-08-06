<?php
	class Lecturer extends MY_Controller
	{
		var $units, $topics_dropdown;
		function __construct()
		{
			parent:: __construct();
			$this->login_reroute();
			$this->load->model('lecturer_m');
			$this->load->module('notes');
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

		public function lecturer_units_lists($user_id)
		{
			$lec_units = $this->lecturer_m->get_lecturer_units_details($user_id);
			// echo "<pre>";print_r($lec_units);die();
			foreach ($lec_units as $key => $value) {
				$this->units .= '<div class="col-md-3">
			                    <div class="ibox">
			                        <div class="ibox-content product-box">
			                            <div class="product-imitation">
			                                <a href="'.base_url("lecturer/unit_details/".$value["unit_id"]).'">'.$value["unit_name"].'</a>
			                            </div>
			                            <div class="product-desc">
			                                <span class="product-price">
			                                    Students: #
			                                </span>
			                                <small class="text-muted">Course: </small>
			                                <a href="#" class="product-name"> '.$value["course_name"].'</a>
			                            </div>
			                        </div>
			                    </div>
			                </div>';
			}
			// echo $this->units;
			return $this->units;
		}

		function unit_details($unit_id)
		{
			$user_id = $this->session->userdata('userid');
			$this->data['unit_details'] = $this->unit_det($user_id,$unit_id);
			$this->data['notes_dropdown'] = $this->notes->drop_notes_type();
			$this->data['topics_dropdown'] = $this->topics();
			
			$this->data['content_view'] = 'lecturer/unit_details';
			$this->data['title'] = 'UMS | Units';
			// echo "<pre>";print_r($this->data);die();
			$this->template->call_template($this->data);
		}

		function unit_det($user_id,$unit_id)
		{
			$unit_details = $this->lecturer_m->get_unit_details($user_id,$unit_id);

			return $unit_details[0];
		}

		function topics()
		{
			$topics = $this->lecturer_m->get_topics();

			$this->topics_dropdown .= '<select class="chosen-select form-control" style="width:320px;" tabindex="2"  name="topic" id="topic">';
			$this->topics_dropdown .= '<option value="" selected="true" disabled="true">**Select the Topic**</option>';
				foreach ($topics as $key => $value) {
					$this->topics_dropdown .= '<option value="'.$value["id"].'">'.$value["topic_name"].'</option>';
					
				}
			$this->topics_dropdown .= '</select>';
			
			return $this->topics_dropdown;
		}

		function notes_upload()
		{
			$upload = $this->notes->upload_notes();
			$user_id = $this->session->userdata('userid');
			// echo $user_id;
			if ($upload) {
				redirect(base_url()."lecturer/lecturer_units");
			} 
			
			
		}
	}
?>