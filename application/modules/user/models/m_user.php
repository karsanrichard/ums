<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_user extends MY_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function add_user($insert_array = [])
	{
		$query = $this->db->insert('users', $insert_array);

		return $query;
	}

	function add_student($insert_array = [])
	{
		$query = $this->db->insert('students', $insert_array);

		return $query;
	}

	function get_courses(){
		$query = $this ->db->query("SELECT * FROM courses");
		return $query->result_array();
	}
}