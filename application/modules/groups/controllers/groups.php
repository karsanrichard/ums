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
		$g_belong = $this->group_model->group_belong($this->session->userdata('userid'));
		if ($g_belong) {
			foreach ($g_belong as $key => $value) {
			if ($value['managed_by'] == $value['user_id']) {
				$groups .= '<div class="image gallery-group-1">
		                    <div class="image-info">
			                        <a href="'.base_url().'groups/viewNotes/'.$this->_hashID($value['group_id']).'/'.$this->_hashID(1).'"><h5 class="title"> '.$value['group_name'].'</h5></a>
			                        <div class="desc">
			                            <small>by</small> <a href="javascript:;">'.$value['group_name'].'</a>
			                        </div>
			                </div>
		                </div>';
			} else {
				$groups .= '<div class="image gallery-group-2">
		                    <div class="image-info">
			                        <a href="'.base_url().'groups/viewNotes/'.$this->_hashID($value['group_id']).'/'.$this->_hashID(0).'"><h5 class="title"> '.$value['group_name'].'</h5></a>
			                        <div class="desc">
			                            <small>by</small> <a href="javascript:;">'.$value['group_name'].'</a>
			                        </div>
			                </div>
		                </div>';
				}
			} 
		}else {
				$groups = '<center><h5 class="title">You are not yet registered in any group</h5><h6>Please Contact the group Module leader</h6></center>';
		}
		
		

		return $groups;
	}

	function viewNotes($courseID,$rights)
	{
		/*$rights:
			Right 0 -> Read Only
			Right 1 -> Read and Write
		*/
		$courseID = $this->hash_reverse($courseID);
		$rights = $this->hash_reverse($rights);
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
		// echo "<pre>";print_r($notes);die();
		// echo $this->session->userdata('userid');die();
		if ($notes) {
			foreach ($topics as $k => $v) {
				$list_notes .= '<li>
                                <div class="result-info">
                                    <h4 class="title"><a href="javascript:;">'.$v['topic'].'</a></h4>
                                    <p class="location">United State, BY 10089</p>
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