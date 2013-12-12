<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{             
		parent::__construct();
		if($this->session->userdata('is_loged_in'))
		{
			redirect('admin');
		} 
		$this->load->model('table/userTable');                      
	}
	
	public function index()
	{
		$this->load->view('login_page');
	}
	
	public function login()
	{
		echo $username = $this->input->post('username');
		echo $password = $this->input->post('password');
		if($this->userTable->check_user_login($username, $password))
		{
			$session = array(
				'username' => $username,
				'is_loged_in' => '1'
			);
			$this->session->set_userdata($session);
			redirect('admin');
		}	
		else 
		{
			$data['message'] = "We are sorry, the username or password is incorrect.";
			$this->load->view('login_page', $data);
		}
	}
}
