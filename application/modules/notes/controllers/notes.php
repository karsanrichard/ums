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

		$this->notes_dropdown .= "<select name='notes_type' id='notes_type'>";
		$this->notes_dropdown .= "<option value='' selected='true' disabled='true'>**Select the type of upload**</option>";
			foreach ($note_types as $key => $value) {
				$this->notes_dropdown .= '<option value="'.$value["id"].'">'.$value["note_type"].'</option>';
				// $this->notes_dropdown .= "<option value='".$value['id']."''>".$value['note_type']."<option>";
			}
		$this->notes_dropdown .= "</select>";
		
		return $this->notes_dropdown;
	}

	function upload_notes()
	{
		$topic = $this->m_lecturers->getTopicByID($this->input->post('topic'));
		$unit_name = $this->m_lecturers->get_unit($this->input->post('unit'))[0]['unit_name'];
		$path = '';
		$config['upload_path'] = './upload/notes/';
		$config['allowed_types'] = 'pdf|docx|ppt';
		$this->load->library('upload', $config);
		// print_r($this->upload->do_upload('photos'));die;
		if ( ! $this->upload->do_upload('upload_file'))
		{
			$error = array('error' => $this->upload->display_errors());
			print_r($error);die;
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			foreach ($data as $key => $value) {
				$path = base_url().'upload/notes/'.$value['file_name'];
			}

			$request = $this->m_lecturers->add_notes($path);

			if ($request) {
				$notification_message = $this->session->userdata('secondname') . ' ' .$this->session->userdata('firstname') . ' posted notes to ' .$unit_name.' ' . $topic;
				$this->m_lecturers->createNotification($notification_message, $_POST['unit']);
				redirect(base_url() .'lecturer/page_to_load/upload_notes');
			}
			// echo "Success!";die;
		}
	}
}
?>