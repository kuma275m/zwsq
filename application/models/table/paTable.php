<?php

class PaTable extends CI_Model {
	
	public function add_pa($data = array())
	{
		$this->db->insert("position_application",$data);	
		return true;
	}
	
	public function update_pa($data = array())
	{
		$this->db->where("id",$data['id']);
		if(isset($data['position_status']))
		{
			$result['position_status'] = $data['position_status'];	
		}
		$this->db->update("position_application",$result);
		return true;
	}
	
	public function get_pa($data = array())
	{
		if(isset($data['select']))
		{
			$this->db->select($data['select']);	
		}
		if(isset($data['id']))
		{
			$this->db->where("id",$data['id']);	
		}
		if(isset($data['position_company']))
		{
			$this->db->where("position_company",$data['position_company']);		
		}
		if(isset($data['position_source']))
		{
			$this->db->where("position_source",$data['position_source']);		
		}
		if(isset($data['position_status']))
		{
			$this->db->where("position_status",$data['position_status']);		
		}
		if(isset($data['orderby']))
		{
			$this->db->order_by($data['orderby'], 'desc');	
		}
		$query = $this->db->get('position_application');
		$result = $query->result_array();
		return $result;		
	}
	
	public function count_pa($term = array())
	{
		$this->db->select('count(id) as sum,position_date');
		$between = "position_date between '".$term['before']."' and '".$term['now']."' ";
		$this->db->where($between);
		$this->db->group_by('position_date');
		$query = $this->db->get('position_application');
		$result = $query->result_array();
		return $result;	
 
	}
	public function rate_pa()
	{
		$this->db->select('count(id) as rate, position_status');
		$this->db->group_by('position_status');	
		$query = $this->db->get('position_application');
		$result = $query->result_array();
		return $result;
	}
}