<?php
// if(!defined(BASEPATH)) exit('No direct access to scripts allowed');
/**
*  Author: Bakasa Joshua
*/
class Notes extends MY_Controller
{
	var $notes_dropdown;
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
}
?>