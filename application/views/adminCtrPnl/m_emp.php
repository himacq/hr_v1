<?php
class m_emp extends CI_Model {

	public function __construct()
	{
		$this->load->database();//load the db
	}
	

	
	public function add($data)
	{    
		$res=$this->db->insert('t_main_emp_data', $data); 
		if($res)
		return 1;
		else
		return 0;
	
	} 
	
	public function existsVal($column,$value)
	{
		$this->db->select('*');
		$this->db->from('t_main_emp_data');
		$this->db->where("".$column."",$value);
		$q= $this->db->get();
		return $q->result();	
	}
	
	public function del($id)
	{    
		$this->db->where('`pk_i_id`',$id);
		$res=$this->db->delete('t_main_emp_data'); 
		if($res)
		return 1;
		else
		return 0;
	
	} 
	public function update($data)
	{    $this->db->where('i_emp_number',$data['i_emp_number']);
		$res=$this->db->update('t_main_emp_data', $data); 
		if($res)
		return 1;
		else
		return 0;
	
	} 
	
	function get($id=0)
    {
		$this->db->select('*');
		$this->db->from('t_main_emp_data');
		if($id>0)
			$this->db->where('i_emp_number',$id);
		$q= $this->db->get();
		return $q->result();
	}

	function getView($id=0)
	{
		$this->db->select('*');
		$this->db->from('main_emp_vw');
		if($id>0)
			$this->db->where('pk_i_id',$id);
		$q= $this->db->get();
		return $q->result();
	}

	function login($email,$password)
    {
		$this->db->select('*');
		$this->db->from('t_main_emp_data');
		$this->db->where("s_email",$email);
		$this->db->where('s_password',$password);
		$this->db->where('b_enabled','1');
		$q= $this->db->get();
		return $q->result();	

	}
}
?>