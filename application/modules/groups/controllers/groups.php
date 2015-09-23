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
		$this->load->module('notes');
		$this->check_login();
	}

	function index()
	{
		$user_id = $this->session->userdata('userid');
		$data['student_data'] = $this->student_model->get_student_data($user_id);
		$data['groups'] = $this->view_groups();
		$data['content'] = 'groups_v';
		$this->load->view('student/student_template',$data);
	}

	function view_groups()
	{
		$groups = '';
		$user_id = $this->session->userdata('userid');
		$g_belong = $this->group_model->group_belong($this->session->userdata('userid'));
		$all_groups = $this->group_model->get_all_groups();

		// echo "<pre>";print_r($all_groups);die();
		$student_data = $this->student_model->get_student_data($user_id);
		// echo "<pre>";print_r($all_groups);die();
		if ($all_groups) {
			foreach ($all_groups as $key => $values) {
				if ($values['managed_by'] == $user_id) {
					$groups .= '<div class="image gallery-group-1">
		                    <div class="image-info">
			                        <a href="'.base_url().'groups/group_auth/'.$this->_hashID($values['group_id']).'/'.$this->_hashID(1).'"><h5 class="title"> '.$values['group_name'].'</h5></a>
			                        <div class="desc">
			                            <small>by</small> <a href="javascript:;">'.$values['first_name'].' '.$values['last_name'].' '.$values['other_name'].'</a>
			                        </div>
			                </div>
		                </div>';
				}else{
					$groups .= '<div class="image gallery-group-2">
		                    <div class="image-info">
			                        <a href="'.base_url().'groups/group_auth/'.$this->_hashID($values['group_id']).'/'.$this->_hashID(1).'"><h5 class="title"> '.$values['group_name'].'</h5></a>
			                        <div class="desc">
			                            <small>by</small> <a href="javascript:;">'.$values['first_name'].' '.$values['last_name'].' '.$values['other_name'].'</a>
			                        </div>
			                </div>
		                </div>';
				}
			}
		}//if for all groups
		else{
				// $groups = '<center><h5 class="title">You are not yet registered in any group</h5><h6>Please Contact the group Module leader</h6></center>';
				$groups .='<div class="image gallery-group-1">
		                    <div class="image-info">
			                        <center><h5 class="title">You are not yet registered in any group</h5><h6>Please Contact the group Module leader</h6></center>
			                </div>
		                  </div>';
			}

		/*if ($g_belong) {
			foreach ($g_belong as $key => $value) {
			if ($value['managed_by'] == $value['user_id']) {
				$groups .= '<div class="image gallery-group-2">
		                    <div class="image-info">
			                        <a href="'.base_url().'groups/group_auth/'.$this->_hashID($value['group_id']).'/'.$this->_hashID(1).'"><h5 class="title"> '.$value['group_name'].'</h5></a>
			                        <div class="desc">
			                            <small>by</small> <a href="javascript:;">'.$student_data[0]['first_name'].' '.$student_data[0]['last_name'].' '.$student_data[0]['other_name'].'</a>
			                        </div>
			                </div>
		                </div>';
			} else {
				$groups .= '<div class="image gallery-group-3">
		                    <div class="image-info">
			                        <a href="'.base_url().'groups/group_auth/'.$this->_hashID($value['group_id']).'/'.$this->_hashID(0).'"><h5 class="title"> '.$value['group_name'].'</h5></a>
			                        <div class="desc">
			                            <small>by</small> <a href="javascript:;">'.$value['group_name'].'</a>
			                        </div>
			                </div>
		                </div>';
				}
			} 
		}else {
				// $groups = '<center><h5 class="title">You are not yet registered in any group</h5><h6>Please Contact the group Module leader</h6></center>';
		}
		*/
		
		

		return $groups;
	}

	function add_group()
	{
		$session_data = $this->session->all_userdata();
		$user_id = $this->session->userdata('userid');
		// echo "<pre>";print_r($user_id);echo "</pre>";
		$group_name = $this->input->post("group_name");
		$grp_select = $this->input->post("grp_select");
		$group_password = $this->input->post("group_password");
		$group_password = ($group_password != '')? $this->input->post("group_password") :NULL;
		
		$auth_or_nah = (isset($group_password))? 1 : 0;

		$grp_info = array();
		$grp_data = array(
			'group_name' => $group_name, 
			'managed_by' => $user_id, 
			'authentication' => $auth_or_nah, 
			'password' => $group_password 
			);

		array_push($grp_info, $grp_data);

		$this->db->insert_batch('groups',$grp_info);

		$grp_id = mysql_insert_id();
		$std_grp_data = array();
		$std_grp = array(
			'group_id' => $grp_id,
			'user_id' => $user_id 
			);
		array_push($std_grp_data, $std_grp);

		$this->db->insert_batch('student_groups',$std_grp_data);

		redirect(base_url().'groups');
	}

	function group_auth($group_id,$rights,$status = NULL){
		$group_id_clean = $this->hash_reverse($group_id);
		$rights_clean = $this->hash_reverse($rights);
		$data['student_data'] = $this->student_model->get_student_data($this->session->userdata('userid'));
		$check_auth = $this->group_model->get_auth_status($group_id_clean);
		$group_data = $this->group_model->get_group($group_id_clean);
		$user_id = $this->session->userdata('userid');
		// echo "<pre>";print_r($group_data);exit;
		if ($check_auth[0]['authentication'] != 0) {
			if ($group_data[0]['managed_by'] == $user_id) {
				$this->viewNotes($group_id,$rights);
			}else{
				$data['content'] = 'pass_page';
				$data['group_id'] = $group_data[0]['group_id']; 
				$data['rights'] = $rights;
				$this->load->view('student/student_template', $data);
			}
			
		}else{
				$this->viewNotes($group_id,$rights);
		}
		
	}

	function group_authenicate(){
		$enrollment_key = $this->input->post("enrollment_key");
		$group_id = $this->input->post("something");
		$rights = $this->input->post("rght");

		$result = $this->group_model->group_auth($enrollment_key,$group_id);

		$group_id_hashed = $this->_hashID($group_id);
		$rights_hashed = $this->_hashID($rights);
		// echo "<pre>"; print_r($group_id);exit;
		
		if ($result['truth'] == "TRUE") {
			// echo "Hello";
			redirect(base_url().'groups/viewNotes/'.$group_id_hashed.'/'.$rights_hashed);
		}else{

		}
	}

	function viewNotes($courseID,$rights)
	{
		/*$rights:
			Right 0 -> Read Only
			Right 1 -> Read and Write
		*/
		$courseID = $this->hash_reverse($courseID);
		$rights = $this->hash_reverse($rights);
		// echo $courseID;exit;
		$data['student_data'] = $this->student_model->get_student_data($this->session->userdata('userid'));
		$data['group_data'] = $this->group_notes($courseID,$rights);
		$data['rights'] = $rights;
		$data['content'] = 'view_notes';
		// echo "<pre>";print_r($data);die();
		$this->load->view('student/student_template', $data);
	}

	function group_notes($courseID,$rights)
	{
		$list_notes = '';
		$notes = $this->group_model->get_group_data($courseID);
		$group = $this->group_model->get_group($courseID);
		$topics = $this->group_model->get_group_topics($courseID);
		// echo "<pre>";print_r($courseID);die();
		// echo $this->session->userdata('userid');die();
		if ($notes) {
			foreach ($topics as $k => $v) {
				$list_notes .= '<li>
                                <div class="result-info">
                                    <h4 class="title"><a href="javascript:;">'.$v['topic'].'</a></h4>
                                    <p class="location">UMS</p>
                                    <p class="desc" style="max-height: none;">';
				foreach ($notes as $key => $value) {
					if ($v['topic'] == $value['topic']) {
						$notes_holder = $this->notes_holder($value['path']);
				    	$list_notes .= '<div class="note note-success"><label>'.$this->note_name($value['path']).'</label><a href="'.$value['path'].'" target="blank"><img class="notes_holder" src="'.$notes_holder.'" /></a></div>';
					}
				}
			$list_notes .= '</p>
                            <div class="btn-row">
                                <a href="javascript:;" data-toggle="tooltip" data-container="body" data-title="Analytics"><i class="fa fa-fw fa-bar-chart-o"></i></a>
                                <a href="javascript:;" data-toggle="tooltip" data-container="body" data-title="Tasks"><i class="fa fa-fw fa-tasks"></i></a>
                                <a href="javascript:;" data-toggle="tooltip" data-container="body" data-title="Configuration"><i class="fa fa-fw fa-cog"></i></a>
                                <a href="javascript:;" data-toggle="tooltip" data-container="body" data-title="Performance"><i class="fa fa-fw fa-tachometer"></i></a>
                                <a href="javascript:;" data-toggle="tooltip" data-container="body" data-title="Users"><i class="fa fa-fw fa-user"></i></a>
                            </div>
                        </div>';
			}
			

		}else {
			$list_notes .= '<li>
                                <div class="result-info col-md-6">
                                    <h4 class="title"><a href="javascript:;">No Data Found</a></h4>
                                    <!-- <p class="location">United State, BY 10089</p> -->
                                    <p class="desc">
                                       There are no notes posted in this Course Yet.
                                    </p>
                                </div>
                            </li>';
		}
		if ($group[0]['managed_by'] == $this->session->userdata('userid')) {
				$list_notes .= '<li>
                                <div class="result-price" style="width:800px;">
	                                <form method="post" action="'.base_url().'groups/group_notes_upload/'.$this->_hashID($courseID).'/'.$this->_hashID($rights).'"  enctype="multipart/form-data">
	                                    <div class="row">
	                                    	<div class="col-md-6">
		                                        <label>Topic Name:</label>
		                                        <input class="form-control" type="text" name="topic" id="topic" required />
		                                    </div>
		                                    <div class="col-md-6">
		                                    	<label>Select Notes Type:</label>
		                                    	<select class="form-control" name="doc_type" id="doc_type">
			                                    	<option value="" disabled="true" selected="true">Select the Type of notes:</option>
			                                    	<option value="1">Document</option>
			                                    	<option value="2">Web Link</option>
		                                    	</select>
		                                    	<div id="doc">
			                                    	<label>Select Notes Document:</label>
			                                        <input class="form-control" type="file" name="upload[]" id="upload" multiple="" />
		                                    	</div>
		                                        <div id="link">
		                                        	<label>Enter Url:</label>
			                                        <input class="form-control" type="text" name="url" id="url" multiple="" />
		                                        </div>
		                                    </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary pull-right">Add Notes</button>
	                                </form>
                                </div>
                            </li>';
			}
		
		return $list_notes;
	}

	function group_notes_upload($courseID,$rights)
		{
			$courseID = $this->hash_reverse($courseID);
			$notes_upload = $this->notes->upload_group_notes($courseID);

			if ($notes_upload) {
				$url = base_url().'groups/viewNotes/'.$this->_hashID($courseID).'/'.$rights;
				redirect($url);
			}
		}

	function notes_holder($path)
	{
		$ext = end(explode('.',$path));
		// echo "<pre>";print_r($this->notes->allowed_notes_type());die();
		if(in_array($ext, $this->notes->allowed_notes_type()))
		{

			if ($ext == 'docx' || $ext == 'doc') {
				$image_holder = base_url().'assets/placeholders/images-ms-word.png';
			} else if ($ext == 'xlsx') {
				$image_holder = base_url().'assets/placeholders/images-ms-excel.png';
			}else if ($ext == 'pdf') {
				$image_holder = base_url().'assets/placeholders/logo-adobe-pdf.jpg';
			}else if ($ext == 'jpg' || $ext == 'jpeg') {
				$image_holder = base_url().'assets/placeholders/imge-holder.png';
			}
		} else {
			$image_holder = base_url().'assets/placeholders/images-web.png';
		}

		return $image_holder;
	}

	function note_name($path)
	{
		$file_name = end(explode('/', $path));
		$name = explode('.', $file_name);
		return $name[0];
	}

}
?>