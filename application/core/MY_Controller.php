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
		$this->load->module("home");
        
		$data = array();
		$this->data['initial'] = $this->config->item('initials');
		$this->data['full'] = $this->config->item('full');
		$path = base_url().'articles';
	}
	

	function random_name_gen($author)
	{
		$date_sec = date('Ymd');
		$random_val = rand(0,9999999999);
		$file_ext = '.txt';
		$file_name = $author.$date_sec.$random_val.$file_ext;
		
		return $file_name;
	}

	public function encrypt($data){
		$key = $this -> encrypt -> get_key();
		$encrypted_data = $key . $data;
		$data = md5($encrypted_data);
//        echo $data;
		return $data;
	}

	public function login_reroute()
	{
		$sess_log = $this->session->userdata('logged_in');
		$sess_user = $this->session->userdata('user_type');
		$redirect_var = "";

		if (!$sess_log) {
			$redirect_var = 'auth';
		}
		// else {
		// 	$redirect_var = $sess_user;
		// }
		
		// echo base_url().$redirect_var;die();
		redirect(base_url().$redirect_var);
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
    
    function read_txt($file)
    {
        $handle = fopen($file, "r") or die("Unable to open file!");
        //$contents = fread($handle, filesize($file));
        while ($contents = fread($handle, filesize($file)) !== FALSE) { //gets the data, separated with comma
						$new_array[] = $contents;
						//$new_data = array();
											
				    }
        fclose($handle);
        echo "<pre>";print_r($new_array);die;
    }

}

?>