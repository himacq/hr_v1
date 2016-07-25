<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class c_user extends MY_Controller {
	
	
	
	public function __construct(){
		parent::__construct();
	} 

	/*public function index()
	{	
		$this->load->view('index',$this->data);
	}*/
	
	
	public function ApplyAttend(){
		$userinfo=$this->session->userdata('userinfo');
		//var_dump($userinfo);exit;
		$this->load->model('m_attendance');
		$o_sucess=-1;
		$o_msg='';
		$dataArr=array('userid'=>$userinfo['pk_i_id'],'o_success'=>&$o_sucess,'o_msg'=>&$o_msg);
		$attendtry=$this->m_attendance->add($dataArr);
		//var_dump($attendtry);
		if($attendtry[0]->o_success==1)
			$this->data['status']=$this->ResponseState(TRUE,$attendtry[0]->o_msg);
		else if($attendtry[0]->o_success==0)
			$this->data['status']=$this->ResponseState(FALSE,$attendtry[0]->o_msg);
		
		echo json_encode($this->data);
		
	}
	
	
	public function ApplyLeave(){
		$userinfo=$this->session->userdata('userinfo');
		//var_dump($userinfo);exit;
		$this->load->model('m_attendance');
		$o_sucess=-1;
		$o_msg='';
		$dataArr=array('userid'=>$userinfo['pk_i_id'],'o_success'=>&$o_sucess,'o_msg'=>&$o_msg);
		$attendtry=$this->m_attendance->update($dataArr);
		//var_dump($attendtry);
		if($attendtry[0]->o_success==1)
			$this->data['status']=$this->ResponseState(TRUE,$attendtry[0]->o_msg);
		else if($attendtry[0]->o_success==0)
			$this->data['status']=$this->ResponseState(FALSE,$attendtry[0]->o_msg);
		
		echo json_encode($this->data);
		
	}
	
	
	public function EmpMonthMoves()
	{	
		$dates = array("Monday"=>'الإثنين', "Tuesday"=>'الثلاثاء', "Wednesday"=>'الأربعاء', "Thursday"=>'الخميس', "Friday"=>'الجمعة', "Saturday"=>'السبت', "Sunday"=>'الأحد');
		$end_of_month= date("t", strtotime(date('Y-m-d')));
		$pk_i_id=$this->data['userdata']['pk_i_id'];
		$this->load->model("m_attendance");
		
		$EmpLog=array();
		for($i=1;$i<=$end_of_month;$i++){
			$today=$this->m_attendance->get_attendance($pk_i_id,date('Y'),strlen(date('m'))==1?'0'.date('m'):date('m'),strlen($i)==1?'0'.$i:$i);
			if(sizeof($today)>0)
			{
				$cat['dayname']=$dates[$today[0]->dayname];
				$cat['dt_today']=date('Y')."/".date('m')."/".$i;
				$cat['dt_entry_date']=$today[0]->dt_entry_date;
				$cat['dt_leave_date']=$today[0]->dt_leave_date;
				$cat['fk_i_extra_cd']=$today[0]->fk_i_extra_cd;
				$cat['s_name_ar']=$today[0]->s_name_ar;
				$cat['s_type']=1;
				$cat['fk_i_source_cd']=$today[0]->fk_i_source_cd==1?'ويب':'بصمة';
				array_push($EmpLog,$cat);
			}
			else{
				$today=$this->m_attendance->get_vacation($pk_i_id,date('Y'),strlen(date('m'))==1?'0'.date('m'):date('m'),strlen($i)==1?'0'.$i:$i);
				if(sizeof($today)>0)
				{
					$cat['dayname']=$dates[$today[0]->dayname];
					$cat['dt_today']=date('Y')."/".date('m')."/".$i;
					$cat['dt_entry_date']=$today[0]->dt_entry_date;
					$cat['dt_leave_date']=$today[0]->dt_leave_date;
					$cat['fk_i_extra_cd']=$today[0]->fk_i_extra_cd;
					$cat['s_name_ar']=$today[0]->s_name_ar;
					$cat['s_type']=2;
					$cat['fk_i_source_cd']=$today[0]->fk_i_source_cd==1?'ويب':'بصمة';
					array_push($EmpLog,$cat);
				}
				else{
				$today=$this->m_attendance->get_annual_vacation(date('Y'),strlen(date('m'))==1?'0'.date('m'):date('m'),strlen($i)==1?'0'.$i:$i);
				if(sizeof($today)>0)
				{
					$cat['dayname']=$dates[$today[0]->dayname];
					$cat['dt_today']=date('Y')."/".date('m')."/".$i;
					$cat['dt_entry_date']=$today[0]->dt_entry_date;
					$cat['dt_leave_date']=$today[0]->dt_leave_date;
					$cat['fk_i_extra_cd']=$today[0]->fk_i_extra_cd;
					$cat['s_name_ar']=$today[0]->s_name_ar;
					$cat['s_type']=3;
					$cat['fk_i_source_cd']=$today[0]->fk_i_source_cd==1?'ويب':'بصمة';
					array_push($EmpLog,$cat);
				}
				else
				{
					$cat['dayname']=$dates[date("l", mktime(0,0,0,date('m'),$i,date('Y')))];
					$cat['dt_today']=date('Y')."/".date('m')."/".$i;
					$cat['dt_entry_date']='00:00:00';
					$cat['dt_leave_date']='00:00:00';
					$cat['fk_i_extra_cd']=-1;
					$cat['s_name_ar']='غير مدخل';
					$cat['s_type']=4;
					$cat['fk_i_source_cd']='';
					array_push($EmpLog,$cat);
				}
			}
			}
		}
		
		$this->data['attend']=$EmpLog;
		$this->data['subpage']='MonthAttend';
		$this->load->view('index',$this->data);
	}
	
	public function EmpExtraHours()
	{	
		$dates = array("Monday"=>'الإثنين', "Tuesday"=>'الثلاثاء', "Wednesday"=>'الأربعاء', "Thursday"=>'الخميس', "Friday"=>'الجمعة', "Saturday"=>'السبت', "Sunday"=>'الأحد');
		$end_of_month= date("t", strtotime(date('Y-m-d')));
		$pk_i_id=$this->data['userdata']['pk_i_id'];
		$this->load->model("m_attendance");
		$res=$this->m_attendance->get_OverTime($pk_i_id,date('Y'),date('m'));
		$EmpLog=array();
		foreach($res as $row){
			$cat['dayname']=$dates[$row->dayname];
				$cat['dt_today']=$row->dt_today;
				$cat['dt_entry_date']=$row->dt_entry_date;
				$cat['dt_leave_date']=$row->dt_leave_date;
				$cat['come_diff']=$row->come_diff;
				$cat['go_diff']=$row->go_diff;
				array_push($EmpLog,$cat);
		}
		$this->data['attend']=$EmpLog;
		$this->data['subpage']='MonthOver';
		$this->load->view('index',$this->data);
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */