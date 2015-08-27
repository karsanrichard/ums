<?php
// if(!defined(BASEPATH)) exit('No direct access to scripts allowed');
/**
*  Author: Bakasa Joshua
*/
class Notes extends MY_Controller
{
	var $notes_dropdown, $topics_dropdown, $notes;
	function __construct()
	{
		parent::__construct();
		$this->load->model('notes_model');
	}

	function drop_notes_type()
	{
		$note_types = $this->notes_model->get_notes_types();

		$this->notes_dropdown .= '<select class="chosen-select form-control" style="width:320px;" tabindex="2"  name="notes_type" id="notes_type">';
		$this->notes_dropdown .= '<option value="" selected="true" disabled="true">**Select the type of upload**</option>';
			foreach ($note_types as $key => $value) {
				$this->notes_dropdown .= '<option value="'.$value["id"].'">'.$value["note_type"].'</option>';
				// $this->notes_dropdown .= "<option value='".$value['id']."''>".$value['note_type']."<option>";
			}
		$this->notes_dropdown .= '</select>';
		// echo $this->notes_dropdown;
		return $this->notes_dropdown;
	}

	function upload_notes()
	{
		$unit_details_id = $this->input->post('unit_details_id');
		$topic = $this->input->post('topic');
		$notes_type = $this->input->post('notes_type');
		$files = $_FILES['filesToUpload'];

		$allowed = array('docx','doc','pdf','xlsx','jpg','jpeg');
		$insert_array = array();
		$count = 0;
		$move_to = '././notes/';
		$new_path = '';

		if($files['size'][0]>0) {
			// echo "<pre>";print_r($_FILES);
			foreach ($files['name'] as $key => $value) {
				$file_ext = explode(".", $value);
            	$file_ext = end($file_ext);

            	if(in_array($file_ext, $allowed)){
            		$accepted = $key;
            		$accepted_path = $files['name'][$accepted];
            		$temp_path = $files['tmp_name'][$accepted];
            		move_uploaded_file($temp_path, $move_to.$accepted_path);
            		$path = $files['name'][$accepted];
            		$path = base_url().'notes/'.$path;
            		$insert_array[$count] = array(
            								'path' => $path,
            								'note_type_id' => $notes_type,
            								'topic_id' => $topic,
            								'unit_details_id' => $unit_details_id
            								);
            	}else{
            		$denied = $key;
            	}
            	$count++;
			}
		} else {
			$new_path = $this->input->post('url');
			$insert_array[$count] = array(
            								'path' => $new_path,
            								'note_type_id' => $notes_type,
            								'topic_id' => $topic,
            								'unit_details_id' => $unit_details_id
            								);

		}
		$insert = $this->notes_model->upload_notes($insert_array);
		
		
		return $insert;
			
	}

	function lec_view_notes($unit_id=NULL,$lec_id=NULL)
	{
		$notes_details = $this->notes_model->get_notes($unit_id,$lec_id);
		$all_topics = $this->notes_model->get_topics();
		// echo "<pre>";print_r($notes_details);
		// echo "<pre>";print_r($all_topics);
		foreach ($all_topics as $key => $value) {
			$this->notes .= '<h3>'.$value['topic_name'].'</h3>';
			$this->notes .= '<div class="col-lg-12">';
			foreach ($notes_details as $k => $v) {
				if ($v['note_type'] == 'document') {
						$ext = end(explode('.',$v['path']));
						// echo $ext;
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
				
				if ($value['topic_name'] == $v['topic_name']) {
					$this->notes .= '<div class="file-box">
						                <div class="file">
						                    <a href="'.$v["path"].'">
						                        <span class="corner"></span>

						                        <div class="image">
						                            <img alt="image" style="width:198px;height:130px;" class="img-responsive" src="'.$image_holder.'">
						                        </div>
						                        <div class="file-name">
						                            '.$this->truncateStringWords(end(explode("/",$v["path"]))).'
						                            <br/>
						                            <small>Added: '.$v["date_uploaded"].'</small>
						                        </div>
						                    </a>
						                </div>
						            </div>';
				}
				
			}
			$this->notes .= '</div>';
		}
		// echo $this->notes;
		return $this->notes;
	}

	function get_topics()
	{
		$topics = $this->notes_model->get_topics();
		
		$this->topics_dropdown .= '<select class="chosen-select form-control" style="width:320px;" tabindex="2"  name="topic" id="topic">';
		$this->topics_dropdown .= '<option value="" selected="true" disabled="true">**Select the Topic**</option>';
			foreach ($topics as $key => $value) {
				$this->topics_dropdown .= '<option value="'.$value["id"].'">'.$value["topic_name"].'</option>';
				
			}
		$this->topics_dropdown .= '</select>';
		
		return $this->topics_dropdown;
	}
}
?>