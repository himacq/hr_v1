<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class c_general extends CI_Controller {
	
	var $data=array();
	public function ResponseState($sucess,$msg){
		$error['success']=$sucess;
		$error['msg']=$msg;
		return $error;
	}
	
	public function __construct(){
		parent::__construct();
	} 

	/*public function index()
	{	
		$this->load->view('index',$this->data);
	}*/
	
	public function login(){
		$this->load->view('login',$this->data);
		
	}
	public function logout(){
		$this->session->unset_userdata('userinfo');
		redirect("login","refresh");
		
	}
	public function AjaxLogin(){
		$email=$this->input->post('email');
		$password=$this->input->post('password');
		//var_dump($_POST);
		$this->load->model('m_emp');
		$loginResult=$this->m_emp->login($email,$password);
		if(sizeof($loginResult)==0){
			$this->data['status']=$this->ResponseState(FALSE,'الرجاء التأكد من بيانات الدخول');
		}
		else
		{
			$userinfo['pk_i_id']=$loginResult[0]->pk_i_id;
			$this->session->set_userdata('userinfo',$userinfo);
			$this->data['status']=$this->ResponseState(TRUE,'أهلا و سهلا بك في نظام شؤون الموظفين');
		}
		
		echo json_encode($this->data);
		
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */