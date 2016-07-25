<?php
class m_admin extends CI_Model {

	public function __construct()
	{
		$this->load->database();//load the db
	}
	

	
	public function add($data)
	{    
		$res=$this->db->insert('t_admin', $data); 
		if($res)
		return 1;
		else
		return 0;
	
	} 
	
	public function del($id)
	{    
		$this->db->where('`pk_i_id`',$id);
		$res=$this->db->delete('t_admin'); 
		if($res)
		return 1;
		else
		return 0;
	
	} 
	public function update($data)
	{    $this->db->where('pk_i_id',$data['pk_i_id']);
		$res=$this->db->update('t_admin', $data); 
		if($res)
		return 1;
		else
		return 0;
	
	} 
	
	function get($id=0)
    {
		$this->db->select('*');
		$this->db->from('t_admin');
		if($id>0)
			$this->db->where('pk_i_id',$id);
		$q= $this->db->get();
		return $q->result();
	}
	
	function login($data)
    {
		$this->db->select('*');
		$this->db->from('t_admin');
		$this->db->where("s_username",$data['username']);
		$this->db->where('s_password',$data['password']);
		$this->db->where('b_enabled','1');
		$q= $this->db->get();
		return $q->result();	

	}
	
	function get_Nexmo_Msg($id)
    {
		$data=array();
		$this->db->select('*');
		$this->db->from('t_nexmo_status_msg');
		$this->db->where('nexmo_id',$id);
		$q= $this->db->get();
		
		
		return $q->result();;	

	}
}
?>