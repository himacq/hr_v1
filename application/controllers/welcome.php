<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class welcome extends MY_Controller {
	var $data=array();
	public function __construct(){
		parent::__construct();
	} 

	public function index()
	{	
		$this->load->model('m_attendance');
		$this->data['attend']=$this->m_attendance->get();
		$this->data['subpage']='main';
		$this->load->view('index',$this->data);
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */