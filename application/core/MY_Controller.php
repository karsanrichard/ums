<?php
if (!defined('BASEPATH')) exit('No direct access to script allowed');

/**
* 
*/
class MY_Controller extends MX_Controller
{
	
	var $data;
	function __construct()
	{
		parent::__construct();
		$this->load->module("template");
		$this->load->module("notes");
       
	}
	

	public function encrypt($data){
		$key = $this -> encrypt -> get_key();
		$encrypted_data = $key . $data;
		$data = md5($encrypted_data);

		return $data;
	}

	
	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
    
}

?>