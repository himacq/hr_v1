<?php
class m_menu extends CI_Model {

	public function __construct()
	{
		$this->load->database();//load the db
	}
	
	function getMain($userid=0)
    {
			$q= $this->db->query("select 
									t_system_function.`pk_i_id`,
									t_system_function.`s_function_title`,
									t_system_function.fk_i_type ,
									t_system_function.fk_i_parent_id 
								  from t_system_function
								  where pk_i_id in (
								  	SELECT 
										t_system_function.`fk_i_parent_id` 
									FROM `t_system_function`
									where t_system_function.`b_public`=1
								)
								union 
								select
							 		t_system_function.`pk_i_id`,
							 		t_system_function.`s_function_title`,
									t_system_function.`fk_i_type` ,
									t_system_function.`fk_i_parent_id` 
								from t_system_function
								where pk_i_id in (
									SELECT 
										t_system_function.`fk_i_parent_id` 
									FROM `t_system_function`
									where t_system_function.`pk_i_id` in (
											SELECT `fk_i_link_id` FROM `t_group_link` 
											where fk_i_group_id in(
												SELECT `fk_i_group_id` FROM `t_group_user`
												where fk_i_emp_id=".$userid."
											)
										)
					)");
		return $q->result();
	}
	
	
	function getSub($userid=0,$parentid=0)
    {
		$q= $this->db->query("select 
			t_system_function.`pk_i_id`,
			t_system_function.`s_function_title`,
			t_system_function.`s_function_url`,
			t_system_function.`fk_i_type`,
			t_system_function.`fk_i_parent_id` 
		from t_system_function where t_system_function.`b_public`=1 and 
			t_system_function.`fk_i_type` =1
			and t_system_function.`fk_i_parent_id` =".$parentid."
		union 
		select 
			t_system_function.`pk_i_id`,
			t_system_function.`s_function_title`,
			t_system_function.`s_function_url`,
			t_system_function.`fk_i_type` ,
			t_system_function.`fk_i_parent_id`
		from t_system_function 
		where pk_i_id in ( 
							SELECT 
									`fk_i_link_id` 
							FROM `t_group_link` 
							where fk_i_group_id in( 
													SELECT 
															`fk_i_group_id` 
													FROM `t_group_user` 
													where 
													fk_i_emp_id=".$userid." 
													) 
						) 
		and t_system_function.`fk_i_parent_id` =".$parentid."
		");
		return $q->result();
	}
	
}
?>