<?php
/**
* 
*/
class Auth_m extends MY_Model
{
	
	function __construct()
	{
		# code...
	}

	public function getUser($email, $password)
    {
    	$user = array();
    	$query = $this->db->get_where('users', array('email' => $email, 'password' => $password, 'status' => 1), 1);
        
    	$details = $query->result_array();

    	if($details)
    	{
            $user_type = $this -> get_user_type($details[0]['user_type_id']);
    		$user['auth'] = TRUE;
    		$user['user_id'] = $details[0]['id'];
    		$user['usertype'] = $user_type[0]['user_type'];
    	}
    	else
    	{
    		$user['auth'] = FALSE;
    	}
        return $user;
    }

    public function get_user_type($user_type_id){
        $user = array();
        $query = $this->db->get_where('user_types', array('id' => $user_type_id), 1);
        
        $details = $query->result_array();
        return $details;
    }
}
?>