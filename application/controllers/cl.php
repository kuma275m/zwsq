<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cl extends CI_Controller {

	public function __construct()
	{             
		parent::__construct();
		if(!$this->session->userdata('is_loged_in'))
		{
			redirect('welcome');
		} 
		$this->load->model('table/cover_letterTable');                      
	}
	
	public function index()
	{
		
	}
	
	public function create_cl()
	{

			$cl_title = $this->input->post('title');
			$cl_body = $this->input->post('body');
			$data = array(
				'cl_title' => $cl_title,
				'cl_body' => $cl_body
			);
			if($this->cover_letterTable->add_cl($data))
			{
				$msg = array(
					'msg' => 'Your Cover Letter has been stored successfully!'
				);
				$this->load->view('admin_page',$msg);
			}
	}
	
	public function delete_cl()
	{
		$id = $this->uri->segment(3);
		$data = array('id' => $id);
		if($this->cover_letterTable->delete_cl($data));
		echo "1";

	}
	
	public function edit_cl()
	{
		$id = $this->uri->segment(3);
		if($this->input->post('title'))
		{
			$cl_title = $this->input->post('title');
			$cl_body = $this->input->post('body');
			$data = array(
				'id' => $id,
				'cl_title' => $cl_title,
				'cl_body' => $cl_body
			);
			//print_r($data);
			if($this->cover_letterTable->update_cl($data))
			{
				$msg = array(
					'msg' => 'Your Cover Letter has been updated successfully!'
				);
				$this->load->view('admin_page',$msg);
			}
		}	
		else
		{
			$term = array(
				'id' => $id
			);	
			$data['cl'] = $this->cover_letterTable->get_cl($term);
			$data['function'] = "edit_cl";	
			$data['cl']['route'] = "edit_cl";
			$this->load->view('admin_page', $data);
		}
	}
	
	public function new_cover_letter()
	{
		$data['function'] = "new_cl";	
		$this->load->view('admin_page', $data);
	}
	
	public function get_cl_body()
	{
		$id = $this->uri->segment(3);
		$term = array(
			'select' => 'cl_body',
			'id' => $id
		);
		$data = $this->cover_letterTable->get_cl($term);
		$cl_body = $data[0]['cl_body'];
		echo $cl_body;	
	}
}
