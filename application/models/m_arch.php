<?php
class m_arch extends CI_Model {

	public function __construct()
	{
		$this->load->database();//load the db
	}
	
	public function add($data)
	{    
		$res=$this->db->insert('t_company_arch', $data); 
		if($res)
		return $this->db->insert_id();
		else
		return 0;
	} 
	
	public function update($data)
	{    
		$this->db->where('pk_i_id',$data['pk_i_id']);
		$res=$this->db->update('t_company_arch', $data); 
		if($res)
		return 1;
		else
		return 0;
	} 
	
		
	public function delete($id)
	{    
		$this->db->where('pk_i_id',$id);
		$res=$this->db->delete('t_company_arch'); 
		if($res)
		return 1;
		else
		return 0;
	} 
	
	function get($id=0)
    {
		$this->db->select('*');
		$this->db->from('t_company_arch');
		if($id>0)
			$this->db->where('pk_i_id',$id);
		$res=$this->db->get();
		return $res->result();
	}
	
	function get_child($id=0)
    {
		$this->db->select('*');
		$this->db->from('t_company_arch');
		if($id==0)
			$this->db->where('fk_i_parent_id is NULL');
		else
			$this->db->where('fk_i_parent_id',$id);
		$res=$this->db->get();
		//var_dump($res->result()); exit;
		return $res->result();
	}
	
	
}
?>