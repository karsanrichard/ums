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
		echo $data;
		return $data;
	}

	function get_user($id){
		$user_details = $this->template->User_details($id);

		return $user_details;
	}

	function login_reroute()
	{
				
	}
	
	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}

	public static function truncateStringWords($str, $maxlen=32)
	{
	    if (strlen($str) <= $maxlen) return $str;

	    $newstr = substr($str, 0, $maxlen);
	    if (substr($newstr, -1, 1) != ' ') $newstr = substr($newstr, 0, strrpos($newstr, " "));

	    return $newstr;
	}

	public function hashed_values()
	{
		$hashed_values = array(
							1 =>'TkOSfsKFSs',
							2 =>'pKFoFNSnSF',
							3 =>'NWovOURISF',
							4 =>'PdSOFVLoIS',
							5 =>'WMnEPwNsAd',
							6 =>'OPwIRiSDoN',
							7 =>'AvwiJSFsjF',
							8 =>'WlONFoSiSq',
							9 =>'QzLcKdDjDW',
							0 =>'ZXaJKlqQnc'
							);

		return $hashed_values;
	}

	
	public function _hashID($data)
	{
		// echo($data);die();
		$hashed = '';
		$new_data = str_split($data);
		$length = strlen($data);
		foreach ($new_data as $key => $value) {
			$hashed .= $this->_hashed_equivalent($value);
			
		}
		// echo $hashed; die();
		return $hashed;
	}

	function _hashed_equivalent($values)
	{
		foreach ($this->hashed_values() as $key => $value) {
			if ($values == $key) {
				$res = $value."&";
			}
		}
		return $res;
	}

	public function hash_reverse($data)
	{
		// echo($data);die();
		$parameter = '';
		$hashed_array = explode('&', $data);
		foreach ($hashed_array as $key => $value) {
			if ($value != NULL) {
				$_newhashed[] = $value;
			}
		}
		foreach ($_newhashed as $key => $value) {
			if (in_array($value, $this->hashed_values())) {
				foreach ($this->hashed_values() as $k => $v) {
					if ($v == $value) {
						$parameter .= $k;
					}
				}
			}
		}
		return $parameter;
	}

	function get_user_module()
	{
		return $this->session->userdata('user_table');

	}

	function check_login($current = NULL)
    {
        if(!$this->session->userdata('logged_in'))
        {
            redirect(base_url() . 'auth');
        }

        else
        {
            $usertype = $this->session->userdata('usertype');

            if($usertype != $current)
            {
                redirect(base_url() . 'auth');
            }
        }
    }
    
}

?>