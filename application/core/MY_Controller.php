<?php  if (! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Sparks
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		CodeIgniter Reactor Dev Team
 * @author      Kenny Katzgrau <katzgrau@gmail.com>
 * @since		CodeIgniter Version 1.0
 * @filesource
 */

/**
 * Loader Class
 *
 * Loads views and files
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @author		CodeIgniter Reactor Dev Team
 * @author      Kenny Katzgrau <katzgrau@gmail.com>
 * @category	Loader
 * @link		http://codeigniter.com/user_guide/libraries/loader.html
 */

// test commite
class MY_Controller extends CI_Controller
{
	var $data=array();
	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jerusalem');
		$userinfo=$this->session->userdata('userinfo');
		if($userinfo){
			$this->SetUserData($userinfo['pk_i_id']);
			$this->getMenu();
			//var_dump($this->data['userdata']);
		}
		else
		{
			redirect("login","refresh");
		}
	}
	
	public function ResponseState($sucess,$msg){
		$error['success']=$sucess;
		$error['msg']=$msg;
		return $error;
	}
	
	public function SetUserData($userid){
		$this->load->model('m_emp');
		$userdata=$this->m_emp->get($userid);
		if(sizeof($userdata)>0){
			/*`pk_i_id`, `s_name_ar`, `s_name_en`, `fk_i_gender_cd`, `dt_dob_date`, `s_emp_image`, `s_place_of_birth`, `fk_i_mstatus_cd`, `s_emp_ssn`, `s_address`, `fk_i_city_cd`, `fk_i_emp_status`, `fk_i_nationality_cd`, `s_jawwal`, `s_tel`, `s_email`, `s_password`, `b_enabled`, `dt_join_date`, `i_create_by`, `dt_create_at`, `i_update_by`, `dt_update_at`, `i_delete_by`, `dt_detete_at*/
			$userinfo['pk_i_id']=$userdata[0]->pk_i_id;
			$userinfo['i_emp_number']=$userdata[0]->i_emp_number;
			$userinfo['s_name_ar']=$userdata[0]->s_name_ar;
			$userinfo['s_name_en']=$userdata[0]->s_name_en;
			$userinfo['fk_i_gender_cd']=$userdata[0]->fk_i_gender_cd;
			$userinfo['dt_dob_date']=$userdata[0]->dt_dob_date;
			$userinfo['s_emp_image']=strlen($userdata[0]->s_emp_image)==0?'assets/faces/m1.png':'uploads/'.$userdata[0]->s_emp_image;
			$userinfo['s_place_of_birth']=$userdata[0]->s_place_of_birth;
			$userinfo['fk_i_mstatus_cd']=$userdata[0]->fk_i_mstatus_cd;
			$userinfo['s_emp_ssn']=$userdata[0]->s_emp_ssn;
			$userinfo['s_address']=$userdata[0]->s_address;
			$userinfo['fk_i_city_cd']=$userdata[0]->fk_i_city_cd;
			$userinfo['fk_i_emp_status']=$userdata[0]->fk_i_emp_status;
			$userinfo['fk_i_nationality_cd']=$userdata[0]->fk_i_nationality_cd;
			$userinfo['s_jawwal']=$userdata[0]->s_jawwal;
			$userinfo['s_tel']=$userdata[0]->s_tel;
			$userinfo['s_email']=$userdata[0]->s_email;
			$userinfo['dt_join_date']=$userdata[0]->dt_join_date;
			$userinfo['IP_address']=$this->clientIp();
			$this->data['userdata']=$userinfo;
			$this->session->set_userdata('userinfo',$userinfo);
		}
		else
		{
			redirect("login","refresh");
		}
		
	}
	
	public function clientIp(){
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];

        if(filter_var($client, FILTER_VALIDATE_IP)) {
            $ip = $client;
        }
        elseif(filter_var($forward, FILTER_VALIDATE_IP)) {
            $ip = $forward;
        }
        else {
            $ip = $remote;
        }
        return $ip;
    }
	
	
	public function hasPermission($screenId){
        $pk_i_id=$this->data['userdata']['pk_i_id'];
		$this->load->model('m_permission');
		$queryres=$this->m_permission->hasPermission($pk_i_id,$screenId);
		if($queryres[0]->cnt>0)
	        return true;
		return false;
    }
	
	public function getMenu()
	{
		$pk_i_id=$this->data['userdata']['pk_i_id'];
		$this->load->model('m_menu');
		$menuList=array();
		$subMenuList=array();
		$main=$this->m_menu->getMain($pk_i_id);
		foreach($main as $row)
		{
			array_push($menuList,$row);
			$sub=$this->m_menu->getSub($pk_i_id,$row->pk_i_id);
			foreach($sub as $row)
			{
				array_push($subMenuList,$row);
			}
		}
		$this->data['userMenu']=$menuList;
		$this->data['userSubMenu']=$subMenuList;
	}
	
}