<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends MY_Controller
{
	public function __construct()
	{
		$this->load->model('user/m_user');
		$this->load->module('auth');
		parent::__construct();
		if($this->session->userdata('is_logged_in'))
		{
			redirect('home');
		}
	}

	public function registration()
	{
		// $data['content_view'] = 'user/registration_page';
		$data['courses'] = $this->m_user->get_courses();
		// echo "<pre>";print_r($courses);echo "</pre>";exit;
		$this -> load ->view('user/registration',$data);
		// $this->template->call_frontend_template($data);
	}

	public function complete_registration()
	{
		// $identifier = $this->RandomLib->generateString(128);
		// echo "<pre>";print_r($this->input->post());echo "</pre>";exit;
		$password = md5($this->input->post('password'));

		$inserted = $this->m_user->add_user([
			'email' => $this->input->post('email'),
			'password' => $password,
			'user_type_id' => 2,
			'status' => 1
		]);

		$inserted_student = $this->m_user->add_student([
			'first_name' => $this->input->post('fname'),
			'last_name' => $this->input->post('lname'),
			'other_name' => $this->input->post('onames'),
			'course_id' => $this->input->post('course_selection'),
			'email' => $this->input->post('email_address'),
			'user_id' => mysql_insert_id()
		]);
		redirect('auth/login_message/1/registration');
	}

	function activate($email, $identifier)
	{
		$hashedIdentifier = $this->hash->hash($identifier);
		$user = $this->m_user->get_inactive_user($email);

		if(!$user || $this->hash->hashCheck($user->active_hash, $hashedIdentifier))
		{
			$data['content_view'] = 'user/after_registration';
			$data['error'] = array(
				'Could not activate this account. Please try again later'
			);
			$this->template->call_frontend_template($data);
		}
		else
		{
			$this->m_user->activateUser($email);
			$this->session->set_flashdata('success', 'Successfully Registered. You can now login');
			redirect(base_url() . 'user/login');
		}
	}

	function test_activate()
	{
		$data['content_view'] = 'user/after_registration';
		$this->template->call_frontend_template($data);
	}

	function authenticate()
	{
		$user = $this->m_user->get_active_user($this->input->post('email_address'));

		if($user && $this->hash->passwordCheck($this->input->post('password'), $user->password))
		{
			$this->session->set_userdata([
				'customer_id' => $user->id,
				'is_logged_in' => TRUE
			]);
			if($user->user_type_id == 1)
			{

			}
			else if($user->user_type_id == 2){
				redirect(base_url() . 'home');
			}
		}
		else
		{
			$this->session->set_flashdata('error', 'Username or password is wrong');
			redirect(base_url() . 'user/login');
		}
	}

	function create_user_table()
	{
		$user_table = '';
		$user_details = $this->m_user->get_user_details();
		$status_column = '';
		if ($user_details) {
			$number = 1;
			foreach ($user_details as $user) {
				if ($user->active == 1) {
					$status_column = '<td><span class = "label label-primary">Active</span><a href = "#" style = "color: red;"><i class = "fa fa-times"></i></a></td>';
				}
				else
				{
					$status_column = '<td><span class = "label label-danger">Not Active</span><a href = "#" style = "color: green;"><i class = "fa fa-check"></i></a></td>';
				}
				$user_table .= "<tr>
					<td>{$number}</td>
					<td>{$user->first_name}</td>
					<td>{$user->last_name}</td>
					<td>{$user->other_names}</td>
					<td>{$user->email_address}</td>
					{$status_column}
				</tr>";
				$number++;
			}
		}

		return $user_table;
	}
}