<?php
/**
* 
*/
class Groups extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('group_model');
		$this->load->model('student/student_model');
	}

	function index()
	{
		$user_id = $this->session->userdata('userid');
		$data['student_data'] = $this->student_model->get_student_data($user_id);
		$data['groups'] = $this->view_group_notes();
		$data['content'] = 'groups_v';
		$this->load->view('student/student_template',$data);
	}

	function view_group_notes()
	{
		$groups = '';
		$g_managed = $this->group_model->group_managed($this->session->userdata('userid'));
		if ($g_managed) {
			foreach ($g_managed as $key => $value) {
			$groups .= '<div class="image gallery-group-1">
		                    <div class="image-info">
			                        <a href="'.base_url().'groups/addNotes/'.$this->_hashID($value['group_id']).'"><h5 class="title"> '.$value['group_name'].'</h5></a>
			                        <div class="desc">
			                            <small>by</small> <a href="javascript:;">'.$value['group_name'].'</a>
			                        </div>
			                </div>
		                </div>';
		}
		} else {
			$groups = '<center><h5 class="title">You are not yet registered in any group</h5><h6>Please Contact the group Module leader</h6></center>';
		}
		
		

		return $groups;
	}

	function addNotes($courseID)
	{
		$courseID = $this->hash_reverse($courseID);
		$data['student_data'] = $this->student_model->get_student_data($this->session->userdata('userid'));
		$data['content'] = 'add_notes';
		$this->load->view('student/student_template', $data);
	}

}
?>