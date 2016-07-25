<?php
class m_workgroup extends CI_Model {

	public function __construct()
	{
		$this->load->database();//load the db
	}
	
	public function add($data)
	{    
		$res=$this->db->insert('t_work_group', $data);
		if($res)
		return $this->db->insert_id();
		else
		return 0;
	
	} 
	
	public function addDet($data)
	{    
		$res=$this->db->insert('t_work_group_details', $data);
		if($res)
		return $this->db->insert_id();
		else
		return 0;
	
	} 
	
	function get($id=0)
    {
		$this->db->select('*');
		$this->db->from('t_work_group');
		if($id>0)
			$this->db->where('pk_i_id',$id);
		$res=$this->db->get();
		return $res->result();
	}
	
	function getDetails($id)
    {
		$this->db->select('*');
		$this->db->from('t_work_group_details');
		if($id>0)
			$this->db->where('fk_i_group_work_id',$id);
		$res=$this->db->get();
		return $res->result();
	}
	
}
?>