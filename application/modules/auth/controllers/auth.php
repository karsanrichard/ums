<?php
/**
* 
*/
class Auth extends MY_Controller
{
	
	function __construct()
	{
		parent:: __construct();
		$this->load->model('auth_m');
	}

	function index()
	{
		$data['error'] = '';
		$this->load->view('auth_v');
	}

	function login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$hashed = $this->encrypt($password);

		$authentication = $this->auth_m->getUser($email, $hashed);

		if($authentication['auth'] == TRUE)
		{
			$user_id = $authentication['user_id'];
			$user_type = $authentication['usertype'];
			$user_details = $this->get_user($user_id);
			echo "<pre>";print_r($user_details);
			$data = array(
				'logged_in' => TRUE,
				'userid' => $user_id,
				'usertype' => $user_type
			);

			$this->session->set_userdata($data);

			// $redirect_url = $this->getRedirect($user_type, $user_id);
			// // echo $redirect_url;die();
			
			// // echo "<pre>";print_r($this->session->all_userdata());die;
			// // echo base_url() . $redirect_url;die();
			// redirect(base_url() . $redirect_url);
		}
		else
		{
			$data['error'] = 'Login Error! Please Try Again';
			$this->load->view('auth_v', $data);
		}
	}
}
?>