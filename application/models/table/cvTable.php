<?php

class CvTable extends CI_Model {
	
	public function add_cv($data = array())
	{
		$this->db->insert("cv",$data);	
		return true;
	}
	
	public function delete_cv($data = array())
	{
		$this->db->delete("cv", $data);
		return true;		
	}
	
	public function get_cv($data = array())
	{
		if(isset($data['select']))
		{
			$this->db->select($data['select']);	
		}
		if(isset($data['id']))
		{
			$this->db->where("id",$data['id']);	
		}
		if(isset($data['title']))
		{
			$this->db->where("cv_title",$data['title']);		
		}
		if(isset($data['orderby']))
		{
			$this->db->order_by($data['orderby'], 'desc');	
		}
		$query = $this->db->get('cv');
		$result = $query->result_array();
		return $result;		
	}
}