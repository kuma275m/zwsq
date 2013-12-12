<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pa extends CI_Controller {

	public function __construct()
	{             
		parent::__construct();
		if(!$this->session->userdata('is_loged_in'))
		{
			redirect('welcome');
		} 
		$this->load->model('table/paTable');
		$this->load->model('table/cvTable'); 
		$this->load->model('table/cover_letterTable');
		$this->load->model('email');                      
	}
	
	public function index()
	{
		
	}
	
	public function send_application()
	{
		if($this->input->post('source'))
		{
			$source = $this->input->post('source');
			$company = $this->input->post('company');
			$mailto = $this->input->post('email');
			$topic = $this->input->post('title');
			$cv_id = $this->input->post('cv');
			$cl_id = $this->input->post('cl');
			$content = $this->input->post('body');
			$date = date("Y-m-d");
			//$content = "haha";
			$term = array(
				'select' > 'cv_address',
				'id' => $cv_id
			);
			$cv = $this->cvTable->get_cv($term);
			$attachment = $cv[0]['cv_address'];
			/*if($this->email->send_email($mailto, $topic, $content, $attachment))
			{
				echo "<h2>send successful</h2>";	
			}
			$this->load->library('email');
			$this->email->from('kuma275m@gmail.com', 'kuma275m');  
			$this->email->to($mailto);  
			$this->email->subject($topic);  
			$this->email->message($content);
			$this->email->attach($attachment);    
			$this->email->send(); 
			echo $this->email->print_debugger(); */
			$data = array(
				'position_source' => $source,
				'position_company' => $company,
				'position_cv' => $cv_id,
				'position_cl' => $cl_id,
				'position_date' => $date,
				'poisition_status' => 'open'
			);
			if($this->paTable->add_pa($data))
			{
				$msg = array(
					'msg' => 'Your application has been sent, good luck!'
				);
				$this->load->view('admin_page',$msg);	
			}
		}
		else
		{
			$data['function'] = "send_application";
			$term = array(
				'select' => 'id, cl_title'
			);
			$term1 = array(
				'select' => 'id, cv_title'
			);
			$data['cl_list'] = $this->cover_letterTable->get_cl($term);
			$data['cv_list'] = $this->cvTable->get_cv($term1);
			$this->load->view('admin_page', $data);
		}
	}
	
	public function count_sent_application()
	{
		$type = $this->uri->segment(3);
		$now = date('Y-m-d');
		//$now = "2013-12-01";
		$str_now = strtotime($now);
		if($type=="month")
		{
			$str_week_before = $str_now - 2678400;
			$data['title'] = "Monthly Sent Application Statistics";
		}
		if($type=="week")
		{
			$str_week_before = $str_now - 604800;
			$data['title'] = "Weekly Sent Application Statistics";
		}
		$before = date('Y-m-d', $str_week_before);
		$data['x'] = "Date";
		$data['y'] = "Number of Sent applications";
		$term = array(
			'now' => $now,
			'before' => $before
		);
		$data['pa_count'] = $this->paTable->count_pa($term);
		$this->load->view('chart/column_chart', $data);
		//echo json_encode($result);
		//print_r($result);
		
	}
	
	public function change_status()
	{
		$id = $this->uri->segment(3);
		$term = array(
			'id' => $id,
			'select' => 'position_status'
		);
		$status = $this->paTable->get_pa($term);
		if($status[0]['position_status'] == "open")
		{
			$data['position_status'] = "close";	
		}
		if($status[0]['position_status'] == "close")
		{
			$data['position_status'] = "open";		
		}
		$data['id'] = $id;
		if($this->paTable->update_pa($data))
		{
			echo "1";	
		}
		//print_r($status);	
	}
	
	public function count_application_status()
	{
		$type = $this->uri->segment(3);
		if($type=="status")
		{
			$data['title'] = "Application Status Report";
		}
		$data['pa_count'] = $this->paTable->rate_pa();
		$this->load->view('chart/pie_chart', $data);
		
	}
}
