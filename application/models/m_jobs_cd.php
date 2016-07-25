<?php
class m_jobs_cd extends CI_Model {

	public function __construct()
	{
		$this->load->database();//load the db
	}
	
	public function add($data)
	{    
		$res=$this->db->insert('t_jobs_cd', $data); 
		if($res)
		return $this->db->insert_id();
		else
		return 0;
	} 
	
	public function update($data)
	{    
		$this->db->where('pk_i_id',$data['pk_i_id']);
		$res=$this->db->update('t_jobs_cd', $data); 
		if($res)
		return 1;
		else
		return 0;
	} 
	
		
	public function delete($id)
	{    
		$this->db->where('pk_i_id',$id);
		$res=$this->db->delete('t_jobs_cd'); 
		if($res)
		return 1;
		else
		return 0;
	} 
	
	function get($id=0)
    {
		$this->db->select('*');
		$this->db->from('t_jobs_cd');
		if($id>0)
			$this->db->where('pk_i_id',$id);
		$res=$this->db->get();
		return $res->result();
	}
	
	
}
?>