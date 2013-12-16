<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{             
		parent::__construct();
		if(!$this->session->userdata('is_loged_in'))
		{
			redirect('welcome');
		} 
		$this->load->model('table/userTable'); 
		$this->load->model('table/cvTable'); 
		$this->load->model('table/cover_letterTable');
		$this->load->model('table/paTable');                      
	}
	
	public function index()
	{
		$this->load->view('admin_page');
	}
	
	public function cv()
	{
		$term = array();
		$data['cv_list']=  $this->cvTable->get_cv($term);         
		$this->load->view('my_cv', $data);	
	}

	public function cl()
	{
		$term = array();
		$data['cl_list']=  $this->cover_letterTable->get_cl($term);         
		$this->load->view('my_cl', $data);	
	}
	
	public function application()
	{
		$term = array();
		$data['pa_list']=  $this->paTable->get_pa($term);  
		$this->load->view('my_application', $data);	
	}
	
	public function profile()
	{
		$term = array(
			'select' => 'count(id) as num'
		);
		$pa_num =  $this->paTable->get_pa($term);
		$term1 = array(
			'select' => 'count(id) as num',
			'position_status' => 'open'
		);
		$pa_open_num =  $this->paTable->get_pa($term1); 
		$cv_num =  $this->cvTable->get_cv($term);
		$cl_num =  $this->cover_letterTable->get_cl($term); 
		$data['pa_num'] = $pa_num[0]['num'];
		$data['pa_open_num'] = $pa_open_num[0]['num'];
		$data['pa_close_num'] = $data['pa_num'] - $data['pa_open_num'];
		$data['cv_num'] = $cv_num[0]['num'];
		$data['cl_num'] = $cl_num[0]['num'];
		$this->load->view('my_profile', $data);	
	}
	
	public function change_password()
	{
		$password = md5($this->input->post('password'));
		$term = array(
			'username' => $this->session->userdata('username'),
			'password' => $password
		);
		if($this->userTable->update_user($term))
		{
			$msg = array(
					'msg' => 'Your new password has been stored successfully!'
				);
				$this->load->view('admin_page',$msg);	
		}
	}
	
	public function logout() 
	{
		$this->session->sess_destroy();
		redirect('/', 'refresh');
	}
}
