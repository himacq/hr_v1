<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class c_admin extends MY_Controller {
	
	
	
	public function __construct(){
		parent::__construct();
	} 
	
	public function ConstantDetails(){
		if($this->hasPermission(2)){
		$this->load->model('m_constant');
		$this->data['constantData']=$this->m_constant->get();
		$this->data['subpage']='adminCtrPnl/SystemConstant';
		$this->load->view('index',$this->data);
		}
		else
			redirect("/","refresh");
		
	}
	
	public function JobTitles(){
		if($this->hasPermission(18)){
		$this->load->model('m_jobs_cd');
		$this->data['jobsData']=$this->m_jobs_cd->get();
		$this->data['subpage']='adminCtrPnl/JobTitles';
		$this->load->view('index',$this->data);
		}
		else
			redirect("/","refresh");
		
	}
	
	public function AddJobTitle(){
		
		if($this->hasPermission(18)){
			$this->load->model('m_jobs_cd');
			$dataArr=array('s_name_ar'=>$this->input->post('s_name_ar'),'s_name_en'=>$this->input->post('s_name_en'));
			$res=$this->m_jobs_cd->add($dataArr);
			if($res>=1){
				$this->data['status']=$this->ResponseState(TRUE,'تمت عملية الإضافة بنجاح');
				$this->data['id']=$res;
			}
			else
				$this->data['status']=$this->ResponseState(FALSE,'حدث خطأ أثناء تنفيذ العملية');
		}
		else
			$this->data['status']=$this->ResponseState(FALSE,'انت لا تملك الصلاحية لتنفيذ هذه العملية');
		echo json_encode($this->data);
	}
	
	public function UpdateJobTitle(){
		
		if($this->hasPermission(18)){
			$this->load->model('m_jobs_cd');
			$dataArr=array(
				'pk_i_id'=>$this->input->post('pk_i_id'),
				's_name_ar'=>$this->input->post('s_name_ar'),
				's_name_en'=>$this->input->post('s_name_en'),
				);
			$res=$this->m_jobs_cd->update($dataArr);
			if($res>=1){
				$this->data['status']=$this->ResponseState(TRUE,'تمت عملية التعديل بنجاح');
			}
			else
				$this->data['status']=$this->ResponseState(FALSE,'حدث خطأ أثناء تنفيذ العملية');
		}
		else
			$this->data['status']=$this->ResponseState(FALSE,'انت لا تملك الصلاحية لتنفيذ هذه العملية');
		echo json_encode($this->data);
	}
	
	public function DeleteJobTitle(){		
		if($this->hasPermission(18)){
			$this->load->model('m_jobs_cd');
			$res=$this->m_jobs_cd->delete($this->input->post('pk_i_id'));
			if($res>=1){
				$this->data['status']=$this->ResponseState(TRUE,'تمت عملية الحذف بنجاح');
			}
			else
				$this->data['status']=$this->ResponseState(FALSE,'حدث خطأ أثناء تنفيذ العملية');
		}
		else
			$this->data['status']=$this->ResponseState(FALSE,'انت لا تملك الصلاحية لتنفيذ هذه العملية');
		echo json_encode($this->data);
	}
	
	public function GetJobTitle(){
		if($this->hasPermission(18)){
			$this->load->model('m_jobs_cd');
			$res=$this->m_jobs_cd->get($this->input->post('pk_i_id'));
			if(sizeof($res)){
				$this->data['status']=$this->ResponseState(TRUE,'تم جلب البيانات بشكل صحيح');
				$this->data['jobData']=$res;
			}
			else
				$this->data['status']=$this->ResponseState(FALSE,'لم يتم العثور على السجل المطلوب');
		}
		else
			$this->data['status']=$this->ResponseState(FALSE,'انت لا تملك الصلاحية لتنفيذ هذه العملية');
		echo json_encode($this->data);
	}
	
	public function CompProfile(){
		if($this->hasPermission(17)){
		$this->load->model('m_comp_data');
		$this->data['compdata']=$this->m_comp_data->get();
		$this->data['subpage']='adminCtrPnl/CompProfile';
		$this->load->view('index',$this->data);
		}
		else
			redirect("/","refresh");
		
	}
	
	public function NewEmp(){
		if($this->hasPermission(16)){
		$this->load->model('m_constant');
		$this->data['genderData']=$this->m_constant->getDetails(1);
		$this->data['mstatusData']=$this->m_constant->getDetails(2);
		$this->data['jstatusData']=$this->m_constant->getDetails(4);
		$this->data['cityData']=$this->m_constant->getDetails(3);
		$this->data['subpage']='adminCtrPnl/NewEmployee';
		$this->load->view('index',$this->data);
		}
		else
			redirect("/","refresh");
		
	}
	
	public function AddEmployee(){
		if($this->hasPermission(16)){
			$this->load->model('m_emp');

			$i_emp_number=$this->input->post('i_emp_number');
			$s_name_ar=$this->input->post('s_name_ar');
			$s_name_en=$this->input->post('s_name_en');
			$s_emp_ssn=$this->input->post('s_emp_ssn');
			$fk_i_gender_cd=$this->input->post('fk_i_gender_cd');
			$dt_dob_date=$this->input->post('dt_dob_date');
			$s_place_of_birth=$this->input->post('s_place_of_birth');
			$s_password=$this->input->post('s_password');
			$s_email=$this->input->post('s_email');
			$fk_i_mstatus_cd=$this->input->post('fk_i_mstatus_cd');
			$fk_i_emp_status=$this->input->post('fk_i_emp_status');
			$fk_i_city_cd=$this->input->post('fk_i_city_cd');
			$s_address=$this->input->post('s_address');
			$s_jawwal=$this->input->post('s_jawwal');
			$s_tel=$this->input->post('s_tel');
			$fk_i_nationality_cd=$this->input->post('fk_i_nationality_cd');
			$s_emp_image='';

			$res=$this->m_emp->existsVal('i_emp_number',$i_emp_number);
			if(sizeof($res)>0){
				$this->data['status']=$this->ResponseState(FALSE,'رقم الموظف موجود مسبقا');
				echo json_encode($this->data);
				return;
			}
			$res=$this->m_emp->existsVal('s_emp_ssn',$s_emp_ssn);
			if(sizeof($res)>0){
				$this->data['status']=$this->ResponseState(FALSE,'رقم الهوية / الجواز موجود مسبقا');
				echo json_encode($this->data);
				return;
			}
	
			$res=$this->m_emp->existsVal('s_email',$s_email);
			if(sizeof($res)>0){
				$this->data['status']=$this->ResponseState(FALSE,'هذا البريد الإلكتروني مسجل لدينا مسبقا');
				echo json_encode($this->data);
				return;
			}
				
			$res=$this->m_emp->existsVal('s_jawwal',$s_jawwal);
			if(sizeof($res)>0){
				$this->data['status']=$this->ResponseState(FALSE,'رقم الجوال موجود مسبقا');
				echo json_encode($this->data);
				return;
			}
				
			$res=$this->m_emp->existsVal('s_tel',$s_tel);
			if(sizeof($res)>0){
				$this->data['status']=$this->ResponseState(FALSE,'رقم الهاتف موجود مسبقا');
				echo json_encode($this->data);
				return;
			}
			
			if(strlen($_FILES['s_emp_image']['name'])>0){
				$config['upload_path'] = getcwd().'/uploads/';
				//echo $config['upload_path'];
				$s_emp_image=time().rand(1000,9999);
				$config['allowed_types'] = 'gif|jpg|png';
				$config['file_name'] = $s_emp_image;
		
				$this->load->library('upload', $config);
		
				if ( ! $this->upload->do_upload('s_emp_image'))
				{
					$error = array('error' => $this->upload->display_errors());
					var_dump($error);
					//$this->load->view('upload_form', $error);
					$this->data['status']=$this->ResponseState(FALSE,'الرجاء تحديد ملف صورة');
					echo json_encode($this->data);
					return;
				}
				else
				{
					$data = array('upload_data' => $this->upload->data());
					$s_emp_image=$data["upload_data"]["file_name"];
					//var_dump($data["upload_data"]["file_name"]);
					//$this->load->view('upload_success', $data);
				}
			}
			
			$dataArr=array(
				'i_emp_number'=>$i_emp_number,
				's_name_ar'=>$s_name_ar,
				's_name_en'=>$s_name_en,
				's_emp_ssn'=>$s_emp_ssn,
				'fk_i_gender_cd'=>$fk_i_gender_cd,
				'dt_dob_date'=>date('Y-m-d',strtotime($dt_dob_date)),
				's_place_of_birth'=>$s_place_of_birth,
				's_password'=>$s_password,
				's_email'=>$s_email,
				'fk_i_mstatus_cd'=>$fk_i_mstatus_cd,
				'fk_i_emp_status'=>$fk_i_emp_status,
				'fk_i_city_cd'=>$fk_i_city_cd,
				's_address'=>$s_address,
				's_jawwal'=>$s_jawwal,
				's_tel'=>$s_tel,
				's_emp_image'=>$s_emp_image,
				'fk_i_nationality_cd'=>$fk_i_nationality_cd,
				'b_enabled'=>'0',
				'dt_join_date'=>date('Y-m-d'),
				'i_create_by'=>$this->data['userdata']['pk_i_id'],
				'dt_create_at'=>date('Y-m-d h:i:s'),
			);
			$res=$this->m_emp->add($dataArr);
			if($res)
				$this->data['status']=$this->ResponseState(TRUE,'تمت عملية الإضافة بنجاح');
			else
				$this->data['status']=$this->ResponseState(FALSE,'حدث خطأ في عملية الإضافة');
		}
		else
			$this->data['status']=$this->ResponseState(FALSE,'انت لا تملك الصلاحية لتنفيذ هذه العملية');
		echo json_encode($this->data);
		
	}
	
	public function AddCompProfile(){
		if($this->hasPermission(17)){
			$this->load->model('m_comp_data');
			$s_name_ar=$this->input->post('s_name_ar');
			$s_name_en=$this->input->post('s_name_en');
			$s_system_ar=$this->input->post('s_system_ar');
			$s_system_en=$this->input->post('s_system_en');
			$s_address_ar=$this->input->post('s_address_ar');
			$s_address_en=$this->input->post('s_address_en');
			$s_email=$this->input->post('s_email');
			$s_url=$this->input->post('s_url');
			$s_logo='';

			if(strlen($_FILES['s_logo']['name'])>0){
				$config['upload_path'] = getcwd().'/uploads/';
				//echo $config['upload_path'];
				$s_emp_image=time().rand(1000,9999);
				$config['allowed_types'] = 'gif|jpg|png';
				$config['file_name'] = $s_emp_image;
		
				$this->load->library('upload', $config);
		
				if ( ! $this->upload->do_upload('s_logo'))
				{
					$error = array('error' => $this->upload->display_errors());
					var_dump($error);
					//$this->load->view('upload_form', $error);
					$this->data['status']=$this->ResponseState(FALSE,'الرجاء تحديد ملف صورة');
					echo json_encode($this->data);
					return;
				}
				else
				{
					$data = array('upload_data' => $this->upload->data());
					$s_logo=$data["upload_data"]["file_name"];
					//var_dump($data["upload_data"]["file_name"]);
					//$this->load->view('upload_success', $data);
				}
			}
			
			$dataArr=array(
				's_name_ar'=>$s_name_ar,
				's_name_en'=>$s_name_en,
				's_system_ar'=>$s_system_ar,
				's_system_en'=>$s_system_en,
				's_address_ar'=>$s_address_ar,
				's_address_en'=>$s_address_en,
				's_email'=>$s_email,
				's_url'=>$s_url,
				's_logo'=>$s_logo
			);
			$res=$this->m_comp_data->update($dataArr);
			if($res)
				$this->data['status']=$this->ResponseState(TRUE,'تمت عملية الإضافة بنجاح');
			else
				$this->data['status']=$this->ResponseState(FALSE,'حدث خطأ في عملية الإضافة');
		}
		else
			$this->data['status']=$this->ResponseState(FALSE,'انت لا تملك الصلاحية لتنفيذ هذه العملية');
		echo json_encode($this->data);
		
	}
	
	public function getConstDetails($id=0){
		if($this->hasPermission(2)){
		$this->load->model('m_constant');
		$this->data['constantData']=$this->m_constant->get($id);
		$this->data['constantDetData']=$this->m_constant->getDetails($id);
		$this->data['subpage']='adminCtrPnl/ConstDetail';
		$this->load->view('index',$this->data);
		}
		else
			redirect("/","refresh");
		
	}

	public function AddConstant(){
		if($this->hasPermission(2)){
			$this->load->model('m_constant');
			$dataArr=array('s_name_ar'=>$this->input->post('s_name_ar'),'s_name_en'=>$this->input->post('s_name_en'));
			$res=$this->m_constant->add($dataArr);
			if($res>=1){
				$this->data['status']=$this->ResponseState(TRUE,'تمت عملية الإضافة بنجاح');
				$this->data['id']=$res;
			}
			else
				$this->data['status']=$this->ResponseState(FALSE,'حدث خطأ أثناء تنفيذ العملية');
		}
		else
			$this->data['status']=$this->ResponseState(FALSE,'انت لا تملك الصلاحية لتنفيذ هذه العملية');
		echo json_encode($this->data);
	}
	
	public function AddConstantDet(){
		if($this->hasPermission(2)){
			$this->load->model('m_constant');
			$dataArr=array(
							'fk_i_const_id'=>$this->input->post('pk_i_id'),
							's_name_ar'=>$this->input->post('s_name_ar'),
							's_name_en'=>$this->input->post('s_name_en')
						   );
			$res=$this->m_constant->addDet($dataArr);
			if($res>=1){
				$this->data['status']=$this->ResponseState(TRUE,'تمت عملية الإضافة بنجاح');
				$this->data['id']=$res;
			}
			else
				$this->data['status']=$this->ResponseState(FALSE,'حدث خطأ أثناء تنفيذ العملية');
		}
		else
			$this->data['status']=$this->ResponseState(FALSE,'انت لا تملك الصلاحية لتنفيذ هذه العملية');
		echo json_encode($this->data);
	}
	
	public function getConstant(){
		if($this->hasPermission(2)){
			$this->load->model('m_constant');
			echo json_encode($this->m_constant->get());
		}
		else
			redirect("/","refresh");
	}
	
	/*************الهيكليات***********/
	
	public function getArch(){
		if($this->hasPermission(19)){
			$this->load->model('m_constant');
			$this->data['constantDetData']=$this->m_constant->getDetails(9);
			$this->data['archData']=$this->DispArch();
			$this->data['subpage']='adminCtrPnl/Arch';
			$this->load->view('index',$this->data);
		}
		else
			redirect("/","refresh");
	}
	
	public function DispArch()
	{
		$this->load->model('m_arch');
		$res=$this->m_arch->get_child(0);
		$arr=array();
		foreach($res as $row){
			$cat["pk_i_id"]=$row->pk_i_id;
			$cat["s_name_ar"]=$row->s_name_ar;
			array_push($arr,$cat);
		}
		
		return $arr;
	}
	
	public function GetArchChild($id=0){
		if($this->hasPermission(19)){
			$this->load->model('m_arch');
			$res=$this->m_arch->get_child($id);
			$arr=array();
			foreach($res as $row){
			$cat["pk_i_id"]=$row->pk_i_id;
			$cat["s_name_ar"]=$row->s_name_ar;
			array_push($arr,$cat);
			}
			$data['data']=$arr;
			echo json_encode($data);
		}
		else{
			$this->data['status']=$this->ResponseState(FALSE,'انت لا تملك الصلاحية لتنفيذ هذه العملية');
		echo json_encode($this->data);}
	}
	
	public function AddArch(){
		if($this->hasPermission(19)){
			$this->load->model('m_arch');
			$dataArr=array(
							's_name_ar'=>$this->input->post('s_name_ar'),
							's_name_en'=>$this->input->post('s_name_en'),
							'fk_i_parent_id'=>$this->input->post('fk_i_parent_id'),
							'fk_i_type_id'=>$this->input->post('fk_i_type_id')
						   );
			$res=$this->m_arch->add($dataArr);
			if($res>=1){
				$this->data['status']=$this->ResponseState(TRUE,'تمت عملية الإضافة بنجاح');
				$this->data['id']=$res;
			}
			else
				$this->data['status']=$this->ResponseState(FALSE,'حدث خطأ أثناء تنفيذ العملية');
		}
		else
			$this->data['status']=$this->ResponseState(FALSE,'انت لا تملك الصلاحية لتنفيذ هذه العملية');
		echo json_encode($this->data);
	}
	
	public function UpdateArch(){
		if($this->hasPermission(19)){
			$this->load->model('m_arch');
			$dataArr=array(
							'pk_i_id'=>$this->input->post('pk_i_id'),
							's_name_ar'=>$this->input->post('s_name_ar'),
							's_name_en'=>$this->input->post('s_name_en'),
							'fk_i_parent_id'=>$this->input->post('fk_i_parent_id')==0?NULL:$this->input->post('fk_i_parent_id'),
							'fk_i_type_id'=>$this->input->post('fk_i_type_id')
						   );
			$res=$this->m_arch->update($dataArr);
			if($res>=1){
				$this->data['status']=$this->ResponseState(TRUE,'تمت عملية التعديل بنجاح');
				$this->data['id']=$res;
			}
			else
				$this->data['status']=$this->ResponseState(FALSE,'حدث خطأ أثناء تنفيذ العملية');
		}
		else
			$this->data['status']=$this->ResponseState(FALSE,'انت لا تملك الصلاحية لتنفيذ هذه العملية');
		echo json_encode($this->data);
	}
	
	public function GetSingleArch()
	{
		if($this->hasPermission(19)){
			$this->load->model('m_arch');
			$res=$this->m_arch->get($this->input->post('id'));
			$arr=array();
			foreach($res as $row){
				$cat["pk_i_id"]=$row->pk_i_id;
				$cat["s_name_ar"]=$row->s_name_ar;
				$cat["s_name_en"]=$row->s_name_en;
				$cat["fk_i_parent_id"]=$row->fk_i_parent_id;
				$cat["fk_i_type_id"]=$row->fk_i_type_id;
				array_push($arr,$cat);
			}
			$data['data']=$arr;
			echo json_encode($data);
		}
		else{
			$this->data['status']=$this->ResponseState(FALSE,'انت لا تملك الصلاحية لتنفيذ هذه العملية');
		echo json_encode($this->data);}
	}

	/************************/
	
	/*********************الموظفين************************/
	
	public function NewJobForEmp(){
		if($this->hasPermission(19)){
			$this->load->model('m_constant');
			$this->load->model('m_jobs_cd');
			$this->data['constantData']=$this->m_constant->getDetails(9);
			$this->data['jobData']=$this->m_jobs_cd->get();
			$this->data['archData']=$this->DispArch();
			$this->data['subpage']='adminCtrPnl/NewJobForEmp';
			$this->load->view('index',$this->data);
		}
		else
			redirect("/","refresh");
	
	}

	public function EmployeeFilter(){
		if($this->hasPermission(22)){
			$this->load->model('m_emp');
			$this->data['empData']=$this->m_emp->getView();
			$this->data['subpage']='adminCtrPnl/EmployeeFilter';
			$this->load->view('index',$this->data);
		}
		else
			redirect("/","refresh");

	}

	public function DeleteEmp(){
		if($this->hasPermission(22)){
			$this->load->model('m_emp');
			$userinfo=$this->session->userdata('userinfo');
			$dataArr=array(
				'i_emp_number'=>$this->input->post('pk_i_id'),
				'b_enabled'=>0,
				'i_delete_by'=>$userinfo['pk_i_id'],
				'dt_detete_at'=>date('Y-m-d h:i:s'),
				//'fk_i_type_id'=>$this->input->post('fk_i_type_id')
			);
			//var_dump($dataArr);
			$res=$this->m_emp->update($dataArr);
			if($res>=1){
				$this->data['status']=$this->ResponseState(TRUE,'تمت عملية الحذف بنجاح');
				$this->data['id']=$res;
			}
			else
				$this->data['status']=$this->ResponseState(FALSE,'حدث خطأ أثناء تنفيذ العملية');
		}
		else
			$this->data['status']=$this->ResponseState(FALSE,'انت لا تملك الصلاحية لتنفيذ هذه العملية');
		echo json_encode($this->data);

	}

	public function EditEmp($i_emp_number){
		if($this->hasPermission(22)){
			$this->load->model('m_constant');
			$this->load->model('m_emp');
			$this->data['genderData']=$this->m_constant->getDetails(1);
			$this->data['mstatusData']=$this->m_constant->getDetails(2);
			$this->data['jstatusData']=$this->m_constant->getDetails(4);
			$this->data['cityData']=$this->m_constant->getDetails(3);
			$this->data['userData']=$this->m_emp->get($i_emp_number);
			if($this->data['userData']==0)
				redirect("EmployeeFilter","refresh");
			$this->data['subpage']='adminCtrPnl/EditEmployee';
			$this->load->view('index',$this->data);
		}
		else
			redirect("/","refresh");

	}

	public function UpdateEmployee(){
		if($this->hasPermission(22)){
			$this->load->model('m_emp');

			$i_emp_number=$this->input->post('i_emp_number');
			$s_name_ar=$this->input->post('s_name_ar');
			$s_name_en=$this->input->post('s_name_en');
			$s_emp_ssn=$this->input->post('s_emp_ssn');
			$fk_i_gender_cd=$this->input->post('fk_i_gender_cd');
			$dt_dob_date=$this->input->post('dt_dob_date');
			$s_place_of_birth=$this->input->post('s_place_of_birth');
			$s_password=$this->input->post('s_password');
			$s_email=$this->input->post('s_email');
			$fk_i_mstatus_cd=$this->input->post('fk_i_mstatus_cd');
			$fk_i_emp_status=$this->input->post('fk_i_emp_status');
			$fk_i_city_cd=$this->input->post('fk_i_city_cd');
			$s_address=$this->input->post('s_address');
			$s_jawwal=$this->input->post('s_jawwal');
			$s_tel=$this->input->post('s_tel');
			$fk_i_nationality_cd=$this->input->post('fk_i_nationality_cd');
			$s_emp_image=$this->input->post('s_emp_image1');

			/*$res=$this->m_emp->existsVal('s_emp_ssn',$s_emp_ssn);
			if(sizeof($res)>0){
				$this->data['status']=$this->ResponseState(FALSE,'رقم الهوية / الجواز موجود مسبقا');
				echo json_encode($this->data);
				return;
			}

			$res=$this->m_emp->existsVal('s_email',$s_email);
			if(sizeof($res)>0){
				$this->data['status']=$this->ResponseState(FALSE,'هذا البريد الإلكتروني مسجل لدينا مسبقا');
				echo json_encode($this->data);
				return;
			}

			$res=$this->m_emp->existsVal('s_jawwal',$s_jawwal);
			if(sizeof($res)>0){
				$this->data['status']=$this->ResponseState(FALSE,'رقم الجوال موجود مسبقا');
				echo json_encode($this->data);
				return;
			}

			$res=$this->m_emp->existsVal('s_tel',$s_tel);
			if(sizeof($res)>0){
				$this->data['status']=$this->ResponseState(FALSE,'رقم الهاتف موجود مسبقا');
				echo json_encode($this->data);
				return;
			}*/

			if(strlen($_FILES['s_emp_image']['name'])>0){
				$config['upload_path'] = getcwd().'/uploads/';
				//echo $config['upload_path'];
				$s_emp_image=time().rand(1000,9999);
				$config['allowed_types'] = 'gif|jpg|png';
				$config['file_name'] = $s_emp_image;

				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('s_emp_image'))
				{
					$error = array('error' => $this->upload->display_errors());
					var_dump($error);
					//$this->load->view('upload_form', $error);
					$this->data['status']=$this->ResponseState(FALSE,'الرجاء تحديد ملف صورة');
					echo json_encode($this->data);
					return;
				}
				else
				{
					$data = array('upload_data' => $this->upload->data());
					$s_emp_image=$data["upload_data"]["file_name"];
					//var_dump($data["upload_data"]["file_name"]);
					//$this->load->view('upload_success', $data);
				}
			}

			$dataArr=array(
				'i_emp_number'=>$i_emp_number,
				's_name_ar'=>$s_name_ar,
				's_name_en'=>$s_name_en,
				's_emp_ssn'=>$s_emp_ssn,
				'fk_i_gender_cd'=>$fk_i_gender_cd,
				'dt_dob_date'=>date('Y-m-d',strtotime($dt_dob_date)),
				's_place_of_birth'=>$s_place_of_birth,
				's_password'=>$s_password,
				's_email'=>$s_email,
				'fk_i_mstatus_cd'=>$fk_i_mstatus_cd,
				'fk_i_emp_status'=>$fk_i_emp_status,
				'fk_i_city_cd'=>$fk_i_city_cd,
				's_address'=>$s_address,
				's_jawwal'=>$s_jawwal,
				's_tel'=>$s_tel,
				's_emp_image'=>$s_emp_image,
				'fk_i_nationality_cd'=>$fk_i_nationality_cd,
				//'b_enabled'=>'0',
				'dt_join_date'=>date('Y-m-d'),
				'i_update_by'=>$this->data['userdata']['pk_i_id'],
				'dt_update_at'=>date('Y-m-d h:i:s'),
			);
			$res=$this->m_emp->update($dataArr);
			if($res)
				$this->data['status']=$this->ResponseState(TRUE,'تمت عملية التعديل بنجاح');
			else
				$this->data['status']=$this->ResponseState(FALSE,'حدث خطأ في عملية الإضافة');
		}
		else
			$this->data['status']=$this->ResponseState(FALSE,'انت لا تملك الصلاحية لتنفيذ هذه العملية');
		echo json_encode($this->data);

	}

	public function EmpAttendance()
	{
		if($this->hasPermission(22)) {

			$this->load->model('m_emp');
			$this->data['empData']=$this->m_emp->getView();
			$dates = array("Monday" => 'الإثنين', "Tuesday" => 'الثلاثاء', "Wednesday" => 'الأربعاء', "Thursday" => 'الخميس', "Friday" => 'الجمعة', "Saturday" => 'السبت', "Sunday" => 'الأحد');
			$end_of_month = date("t", strtotime(date('Y-m-d')));
			$pk_i_id=$this->uri->segment(2);
			$this->load->model("m_attendance");
			$this->data['selectedempData']=$this->m_emp->getView($pk_i_id);

			$EmpLog = array();
			for ($i = 1; $i <= $end_of_month; $i++) {
				$today = $this->m_attendance->get_attendance($pk_i_id, date('Y'), strlen(date('m')) == 1 ? '0' . date('m') : date('m'), strlen($i) == 1 ? '0' . $i : $i);
				if (sizeof($today) > 0) {
					$cat['dayname'] = $dates[$today[0]->dayname];
					$cat['dt_today'] = date('Y') . "/" . date('m') . "/" . $i;
					$cat['dt_entry_date'] = $today[0]->dt_entry_date;
					$cat['dt_leave_date'] = $today[0]->dt_leave_date;
					$cat['fk_i_extra_cd'] = $today[0]->fk_i_extra_cd;
					$cat['s_name_ar'] = $today[0]->s_name_ar;
					$cat['s_type'] = 1;
					$cat['fk_i_source_cd'] = $today[0]->fk_i_source_cd == 1 ? 'ويب' : 'بصمة';
					array_push($EmpLog, $cat);
				} else {
					$today = $this->m_attendance->get_vacation($pk_i_id, date('Y'), strlen(date('m')) == 1 ? '0' . date('m') : date('m'), strlen($i) == 1 ? '0' . $i : $i);
					if (sizeof($today) > 0) {
						$cat['dayname'] = $dates[$today[0]->dayname];
						$cat['dt_today'] = date('Y') . "/" . date('m') . "/" . $i;
						$cat['dt_entry_date'] = $today[0]->dt_entry_date;
						$cat['dt_leave_date'] = $today[0]->dt_leave_date;
						$cat['fk_i_extra_cd'] = $today[0]->fk_i_extra_cd;
						$cat['s_name_ar'] = $today[0]->s_name_ar;
						$cat['s_type'] = 2;
						$cat['fk_i_source_cd'] = $today[0]->fk_i_source_cd == 1 ? 'ويب' : 'بصمة';
						array_push($EmpLog, $cat);
					} else {
						$today = $this->m_attendance->get_annual_vacation(date('Y'), strlen(date('m')) == 1 ? '0' . date('m') : date('m'), strlen($i) == 1 ? '0' . $i : $i);
						if (sizeof($today) > 0) {
							$cat['dayname'] = $dates[$today[0]->dayname];
							$cat['dt_today'] = date('Y') . "/" . date('m') . "/" . $i;
							$cat['dt_entry_date'] = $today[0]->dt_entry_date;
							$cat['dt_leave_date'] = $today[0]->dt_leave_date;
							$cat['fk_i_extra_cd'] = $today[0]->fk_i_extra_cd;
							$cat['s_name_ar'] = $today[0]->s_name_ar;
							$cat['s_type'] = 3;
							$cat['fk_i_source_cd'] = $today[0]->fk_i_source_cd == 1 ? 'ويب' : 'بصمة';
							array_push($EmpLog, $cat);
						} else {
							$cat['dayname'] = $dates[date("l", mktime(0, 0, 0, date('m'), $i, date('Y')))];
							$cat['dt_today'] = date('Y') . "/" . date('m') . "/" . $i;
							$cat['dt_entry_date'] = '00:00:00';
							$cat['dt_leave_date'] = '00:00:00';
							$cat['fk_i_extra_cd'] = -1;
							$cat['s_name_ar'] = 'غير مدخل';
							$cat['s_type'] = 4;
							$cat['fk_i_source_cd'] = '';
							array_push($EmpLog, $cat);
						}
					}
				}
			}

			$this->data['attend'] = $EmpLog;
			$this->data['subpage'] = 'adminCtrPnl/MonthAttendReport';
			$this->load->view('index', $this->data);
		}
		else
			redirect("EmployeeFilter","refresh");
	}

	public function AjaxEmpAttendance()
	{
		if($this->hasPermission(22)) {

			$this->load->model('m_emp');
			//$this->data['empData']=$this->m_emp->getView();
			$dates = array("Monday" => 'الإثنين', "Tuesday" => 'الثلاثاء', "Wednesday" => 'الأربعاء', "Thursday" => 'الخميس', "Friday" => 'الجمعة', "Saturday" => 'السبت', "Sunday" => 'الأحد');

			$pk_i_id=$this->input->post('i_emp_number');
			$month=$this->input->post('selectedMonth');
			$year=$this->input->post('selectedYear');
			$this->load->model("m_attendance");
			$this->data['selectedempData']=$this->m_emp->getView($pk_i_id);
			$end_of_month = date("t", strtotime(date($year.'-'.$month.'-d')));
			$EmpLog = array();
			for ($i = 1; $i <= $end_of_month; $i++) {
				$today = $this->m_attendance->get_attendance($pk_i_id, $year, strlen($month) == 1 ? '0' . $month : $month, strlen($i) == 1 ? '0' . $i : $i);
				if (sizeof($today) > 0) {
					$cat['dayname'] = $dates[$today[0]->dayname];
					$cat['dt_today'] = $year . "/" . $month . "/" . $i;
					$cat['dt_entry_date'] = $today[0]->dt_entry_date;
					$cat['dt_leave_date'] = $today[0]->dt_leave_date;
					$cat['fk_i_extra_cd'] = $today[0]->fk_i_extra_cd;
					$cat['s_name_ar'] = $today[0]->s_name_ar;
					$cat['s_type'] = 1;
					$cat['fk_i_source_cd'] = $today[0]->fk_i_source_cd == 1 ? 'ويب' : 'بصمة';
					array_push($EmpLog, $cat);
				} else {
					$today = $this->m_attendance->get_vacation($pk_i_id, $year, strlen($month) == 1 ? '0' . $month :$month, strlen($i) == 1 ? '0' . $i : $i);
					if (sizeof($today) > 0) {
						$cat['dayname'] = $dates[$today[0]->dayname];
						$cat['dt_today'] = $year . "/" . $month . "/" . $i;
						$cat['dt_entry_date'] = $today[0]->dt_entry_date;
						$cat['dt_leave_date'] = $today[0]->dt_leave_date;
						$cat['fk_i_extra_cd'] = $today[0]->fk_i_extra_cd;
						$cat['s_name_ar'] = $today[0]->s_name_ar;
						$cat['s_type'] = 2;
						$cat['fk_i_source_cd'] = $today[0]->fk_i_source_cd == 1 ? 'ويب' : 'بصمة';
						array_push($EmpLog, $cat);
					} else {
						$today = $this->m_attendance->get_annual_vacation($year, strlen($month) == 1 ? '0' . $month : $month, strlen($i) == 1 ? '0' . $i : $i);
						if (sizeof($today) > 0) {
							$cat['dayname'] = $dates[$today[0]->dayname];
							$cat['dt_today'] = $year . "/" . $month . "/" . $i;
							$cat['dt_entry_date'] = $today[0]->dt_entry_date;
							$cat['dt_leave_date'] = $today[0]->dt_leave_date;
							$cat['fk_i_extra_cd'] = $today[0]->fk_i_extra_cd;
							$cat['s_name_ar'] = $today[0]->s_name_ar;
							$cat['s_type'] = 3;
							$cat['fk_i_source_cd'] = $today[0]->fk_i_source_cd == 1 ? 'ويب' : 'بصمة';
							array_push($EmpLog, $cat);
						} else {
							$cat['dayname'] = $dates[date("l", mktime(0, 0, 0, $month, $i, $year))];
							$cat['dt_today'] = $year . "/" . $month . "/" . $i;
							$cat['dt_entry_date'] = '00:00:00';
							$cat['dt_leave_date'] = '00:00:00';
							$cat['fk_i_extra_cd'] = -1;
							$cat['s_name_ar'] = 'غير مدخل';
							$cat['s_type'] = 4;
							$cat['fk_i_source_cd'] = '';
							array_push($EmpLog, $cat);
						}
					}
				}
			}

			$this->data['attend'] = $EmpLog;/*
			$this->data['subpage'] = 'adminCtrPnl/MonthAttendReport';
			$this->load->view('index', $this->data);*/
			echo json_encode($this->data);
		}
		else
			redirect("EmployeeFilter","refresh");
	}
	/*********************************************/

	/*********************مجموعات العمل************************/

	public function WorkGroup(){
		if($this->hasPermission(21)){
			$this->load->model('m_workgroup');
			$this->data['workgroupData']=$this->m_workgroup->get();
			$this->data['subpage']='adminCtrPnl/WorkGroup';
			$this->load->view('index',$this->data);
		}
		else
			redirect("/","refresh");

	}

	public function AddWorkGroup(){
		if($this->hasPermission(21)){
			$this->load->model('m_workgroup');
			$dataArr=array('s_name'=>$this->input->post('s_name'));
			$res=$this->m_workgroup->add($dataArr);
			if($res>=1){
				$this->data['status']=$this->ResponseState(TRUE,'تمت عملية الإضافة بنجاح');
				$this->data['id']=$res;
			}
			else
				$this->data['status']=$this->ResponseState(FALSE,'حدث خطأ أثناء تنفيذ العملية');
		}
		else
			$this->data['status']=$this->ResponseState(FALSE,'انت لا تملك الصلاحية لتنفيذ هذه العملية');
		echo json_encode($this->data);
	}

	public function getWorkGroupDetails($id=0){
		if($this->hasPermission(21)){
			$this->load->model('m_workgroup');
			$this->data['constantData']=$this->m_workgroup->get($id);
			$this->data['constantDetData']=$this->m_workgroup->getDetails($id);
			$this->data['subpage']='adminCtrPnl/WorkGroupDetail';
			$this->load->view('index',$this->data);
		}
		else
			redirect("/","refresh");

	}

	public function AddWorkGroupDet(){
		if($this->hasPermission(21)){
			$this->load->model('m_workgroup');
			$dataArr=array(
				'fk_i_group_work_id'=>$this->input->post('pk_i_id'),
				's_name'=>$this->input->post('s_name'),
			);
			$res=$this->m_workgroup->addDet($dataArr);
			if($res>=1){
				$this->data['status']=$this->ResponseState(TRUE,'تمت عملية الإضافة بنجاح');
				$this->data['id']=$res;
			}
			else
				$this->data['status']=$this->ResponseState(FALSE,'حدث خطأ أثناء تنفيذ العملية');
		}
		else
			$this->data['status']=$this->ResponseState(FALSE,'انت لا تملك الصلاحية لتنفيذ هذه العملية');
		echo json_encode($this->data);
	}
	/*********************************************/
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */