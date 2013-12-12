<?php

class Cover_letterTable extends CI_Model {
	
	public function add_cl($data = array())
	{
		$this->db->insert("cover_letter",$data);	
		return true;
	}
	
	public function delete_cl($data = array())
	{
		$this->db->delete("cover_letter", $data);
		return true;		
	}
	
	public function update_cl($data = array())
	{
		$this->db->where("id",$data['id']);
		$result = array(
			'cl_title' => $data['cl_title'],
			'cl_body' => $data['cl_body'],
		);
		$this->db->update("cover_letter",$result);
		return true;
	}
	
	public function get_cl($data = array())
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
			$this->db->where("cl_title",$data['title']);		
		}
		if(isset($data['orderby']))
		{
			$this->db->order_by($data['orderby'], 'desc');	
		}
		$query = $this->db->get('cover_letter');
		$result = $query->result_array();
		return $result;		
	}
}