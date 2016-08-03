<?php
class m_vacation extends CI_Model {

	public function __construct()
	{
		$this->load->database();//load the db
	}
	

	
	public function add($data)
	{

		$res=$this->db->insert('t_vacation', $data);
		if($res)
		return 1;
		else
		return 0;
	
	} 

	
	public function del($id)
	{    
		$this->db->where('`pk_i_id`',$id);
		$res=$this->db->delete('t_vacation');
		if($res)
		return 1;
		else
		return 0;
	
	} 
	public function update($data)
	{    $this->db->where('i_emp_number',$data['i_emp_number']);
		$res=$this->db->update('t_vacation', $data);
		if($res)
		return 1;
		else
		return 0;
	
	} 
	
	function get($id=0)
    {
		$this->db->select('*');
		$this->db->from('t_vacation');
		if($id>0)
			$this->db->where('i_emp_number',$id);
		$q= $this->db->get();
		return $q->result();
	}


	function getButMe($id=0)
	{
		$this->db->select('*');
		$this->db->from('t_vacation');
		if($id>0)
			$this->db->where("i_emp_number <> $id");
		$q= $this->db->get();
		return $q->result();
	}

	function getView($id=0)
	{
		$this->db->select('*');
		$this->db->from('t_vacation');
		if($id>0)
			$this->db->where('pk_i_id',$id);
		$q= $this->db->get();
		return $q->result();
	}

	function Exist($fk_i_emp_id,$start,$end)
    {
		$this->db->select('*');
		$this->db->from('t_vacation');
		$this->db->where("fk_i_emp_id",$fk_i_emp_id);
		$this->db->where("(dt_vacation_from <= '$start' and dt_vacation_to >='$start')");
		$this->db->or_where("(dt_vacation_from <= '$start' and dt_vacation_to >='$end')");
		$this->db->or_where("(dt_vacation_from >= '$start' and dt_vacation_to >='$end' and dt_vacation_from > '$end' )");
		$this->db->or_where("(dt_vacation_to >= '$start' and dt_vacation_to <='$end')");
		$q= $this->db->get();
		return $q->result();	

	}
}
?>