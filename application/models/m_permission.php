<?php
class m_permission extends CI_Model {

	public function __construct()
	{
		$this->load->database();//load the db
	}
	
	
	function hasPermission($userid=0,$fk_i_link_id=0)
    {
		$this->db->select('count(pk_i_id) cnt');
		$this->db->from('t_group_link');
		$this->db->where('fk_i_group_id in(SELECT `fk_i_group_id` FROM `t_group_user` where fk_i_emp_id='.$userid.')');
		$this->db->where('fk_i_link_id',$fk_i_link_id);
		$res=$this->db->get();
		return $res->result();
	}
	
}
?>