<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cv extends CI_Controller {

	public function __construct()
	{             
		parent::__construct();
		if(!$this->session->userdata('is_loged_in'))
		{
			redirect('welcome');
		} 
		$this->load->model('table/cvTable');                      
	}
	
	public function index()
	{
		
	}
	
	public function upload_cv()
	{
		$config['upload_path'] = './static/cv/';
		$config['allowed_types'] = 'pdf|doc';
		$config['max_size'] = '4096';
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload())
		{
			$msg = array('msg' => $this->upload->display_errors());
			$this->load->view('admin_page',$msg);
		} 
		else
		{
			$data = array('upload_data' => $this->upload->data());
			$cv_title = $this->input->post('title');
			$cv_address = "static/cv/".$data['upload_data']['file_name'];
			$data = array(
				'cv_title' => $cv_title,
				'cv_address' => $cv_address
			);
			if($this->cvTable->add_cv($data))
			{
				$msg = array(
					'msg' => 'Your CV has been uploaded and stored successfully!'
				);
				$this->load->view('admin_page',$msg);
			}
		}
	}
	
	public function delete_cv()
	{
		$id = $this->uri->segment(3);
		$term = array(
			'select' => 'cv_address',
			'id' => $id
		);
		$cv = $this->cvTable->get_cv($term);
		$cv_address = "D:\Application\wamp\www\zwsq\\".$cv[0]['cv_address'];
		if(unlink($cv_address))
		{
			$data = array('id' => $id);
			if($this->cvTable->delete_cv($data))
			{
				echo "1";	
			}
			else
			{
				echo "false del";	
			}	
		}
		else
		{
			echo "false file";	
		} 
	}
}
