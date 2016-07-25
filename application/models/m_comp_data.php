<?php
class m_comp_data extends CI_Model {

	public function __construct()
	{
		$this->load->database();//load the db
	}
	
	function get()
    {
			$this->db->select("`pk_i_id`, `s_name_ar`, `s_name_en`, `s_system_ar`, `s_system_en`, `s_address_ar`, `s_address_en`, `s_email`, `s_url`, `s_logo` ");
			$this->db->from('t_comp_data');
			$this->db->where('pk_i_id','1');
			$q=$this->db->get();
		return $q->result();
	}
	
	
	function update($data)
    {
		$this->db->where('pk_i_id','1');
		return $this->db->update('t_comp_data',$data);
	}
	
}
?>