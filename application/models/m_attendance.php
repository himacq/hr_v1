<?php
class m_attendance extends CI_Model {

	public function __construct()
	{
		$this->load->database();//load the db
	}
	

	
	public function add($data)
	{    
		/*$res=$this->db->insert('t_attendance', $data); 
		if($res)
		return 1;
		else
		return 0;*/
		$this->db->query('call  LogAttendProc(?,@o_success,@o_msg); ',$data['userid']);
		$res= $this->db->query('select @o_success o_success,@o_msg o_msg');
		return $res->result();
	
	} 
	
	public function del($id)
	{    
		$this->db->where('`pk_i_id`',$id);
		$res=$this->db->delete('t_attendance'); 
		if($res)
		return 1;
		else
		return 0;
	
	} 
	public function update($data)
	{    
		$this->db->query('call  LogLeaveProc(?,@o_success,@o_msg); ',$data['userid']);
		$res= $this->db->query('select @o_success o_success,@o_msg o_msg');
		return $res->result();
	} 
	
	function get($userid=0)
    {
		$this->db->select('*');
		$this->db->from('t_attendance');
		if($userid>0)
			$this->db->where('fk_i_emp_id',$userid);
		$this->db->where("date(`dt_entry_date`)=CURRENT_DATE");
		$q= $this->db->get();
		return $q->result();
	}
	
	function getComeAttend($userid){
		$this->db->select('*');
		$this->db->from('t_attendance');
		$this->db->where('pk_i_id',$userid);
		$this->db->where('`dt_entry_date`=CURRENT_DATE',$userid);
		$q= $this->db->get();
		return sizeof($q->result());
		
	}
	
	function login($email,$password)
    {
		$this->db->select('*');
		$this->db->from('t_attendance');
		$this->db->where("s_email",$email);
		$this->db->where('s_password',$password);
		$this->db->where('b_enabled','1');
		$q= $this->db->get();
		return $q->result();	

	}
	
	function get_attendance($userid,$year,$month,$day){
		$q=$this->db->query("SELECT 
								DAYNAME(`dt_entry_date`) dayname, 
								DATE_FORMAT(`dt_entry_date`,'%H:%i:%s') dt_entry_date, 
								DATE_FORMAT(`dt_leave_date`,'%H:%i:%s') dt_leave_date , 
								`fk_i_extra_cd`, 
								t_const_details.s_name_ar ,
								`fk_i_source_cd`
							FROM `t_attendance` inner join t_const_details 
							on t_attendance.fk_i_extra_cd=t_const_details.pk_i_id 
							WHERE date(`dt_entry_date`) ='".$year."-".$month."-".$day."' and `fk_i_emp_id`=".$userid." ");
							
		return $q->result();
	}
	
	
	function get_OverTime($userid,$year,$month){
		$q=$this->db->query("SELECT 
								DAYNAME(`dt_entry_date`) dayname, 
								DATE_FORMAT(`dt_entry_date`,'%Y/%m/%d') dt_today,
								DATE_FORMAT(`dt_entry_date`,'%H:%i:%s') dt_entry_date, 
								DATE_FORMAT(`dt_leave_date`,'%H:%i:%s') dt_leave_date , 
								`fk_i_extra_cd`, 
								t_const_details.s_name_ar ,
								`fk_i_source_cd`,
								SUBTIME(`s_start_time`,DATE_FORMAT(`dt_entry_date`,'%H:%i:%s')) come_diff, SUBTIME(DATE_FORMAT(`dt_leave_date`,'%H:%i:%s'),`s_end_time`) go_diff
							FROM `t_attendance` inner join t_const_details 
							on t_attendance.fk_i_extra_cd=t_const_details.pk_i_id 
							WHERE date(`dt_entry_date`)  like '".$year."-".$month."%' and `fk_i_emp_id`=".$userid." ");
		return $q->result();
	}
	
	function get_vacation($userid,$year,$month,$day){
		$q=$this->db->query("SELECT 
								DAYNAME('".$year."-".$month."-".$day."') dayname,
								'00:00:00'dt_entry_date, 
								'00:00:00'dt_leave_date,
								t_const_details.pk_i_id  fk_i_extra_cd,
								t_const_details.s_name_ar,
								1 fk_i_source_cd  FROM `t_vacation`  INNER join t_const_details on t_vacation.fk_i_vacation_cd=t_const_details.pk_i_id WHERE 
date('".$year."-".$month."-".$day."') between `dt_vacation_from` and `dt_vacation_to` and `fk_i_emp_id`=".$userid." ");
		return $q->result();
	}
	
	function get_annual_vacation($year,$month,$day){
		$q=$this->db->query("SELECT 
								DAYNAME('".$year."-".$month."-".$day."')  dayname, '00:00:00'dt_entry_date, '00:00:00'dt_leave_date, t_const_details.pk_i_id fk_i_extra_cd, t_const_details.s_name_ar, 1 fk_i_source_cd FROM `t_annual_vacation` INNER join t_const_details on t_annual_vacation.fk_i_vacation_cd=t_const_details.pk_i_id WHERE
date('".$year."-".$month."-".$day."') between t_annual_vacation.dt_start_date and t_annual_vacation.dt_end_date");
		return $q->result();
	}
	
	
}
?>