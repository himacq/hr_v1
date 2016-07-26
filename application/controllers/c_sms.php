<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_sms extends MY_Controller {
    
    
    private $_model= NULL;
        private $_user_id = NULL;

        
        function __construct(){
            
            parent::__construct();
            $this->load->model('M_sms');
           $this->_model = new M_sms();
            
        $this->_user_id=$this->data['userdata']['pk_i_id'];

        }
        
     
         public function add_group()
         {   
             if($this->hasPermission(24)){
			$dataArr=array('group_name'=>$this->input->post('name'),
                            'published'=>$this->input->post('published'),
                            'account_id'=>$this->_user_id);
                        $this->load->model('m_sms');
			$res=$this->m_sms->add_group($dataArr); 
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
                exit;
             
          
         }
         public function add_member()
         {   
             
             if ( isset($_POST))
             { 
             $this->form_validation->set_rules('mobile', 'رقم الجوال', 'required');
             $this->form_validation->set_rules('member_nam', 'اسم الفرد', 'required');
                 
             $group_selected = $this->input->post('group_selected');
             $mobile = $this->input->post('mobile');
             $email = $this->input->post('email');
             $member_nam = $this->input->post('member_nam');
             $note = $this->input->post('note');
             
             $data = array(
             'group_id' => $group_selected,
             'member_mobile' =>  $mobile ,
             'member_email' =>  $email ,
             'member_name' =>  $member_nam ,
             'notes' => $note,
             );
             
             
            if ( $this->form_validation->run() == FALSE)
		 {
                    $msg = form_error('mobile');
                    $msg2 = form_error('member_nam');
                    $data = array(
                        'Mobile_Erorr' => $msg, 
                        'Name_Erorr' => $msg2, 
                     );
                    print json_encode($data);
                                    }
             else {
                    echo $this->load->model('contact/m_contact');
                    $this->m_contact->add_member($data);
                     
                    
             } 
                 
             
            
             }
             
          
         }
       public function add_sender2Acc($selr2)
         {             
             $account_id = $selr2;
             $sender_id = $this->input->post('sender_sele');
             
             $data = array(
             'account_id' =>  $account_id ,
             'sender_id' =>   $sender_id,
             );
             
            echo $this->load->model('account/m_account');
            $this->m_account->add_sender2Acc($data);
         }
         
        
       
        public function group_json($account_id)
         {
                 $data = $this->_model->get_group($account_id); 
                 //echo json_encode($data);
                 return $data;
                 //var_dump($data);
                // exit();
                
         } 
        public function group1_json()
         {
                 $data = $this->_model->get_group(); 
                 echo json_encode($data);
                 return $data;
                 //var_dump($data);
                // exit();
                
         } 
        public function balance_json()
         {
                 $data = $this->_model->get_balance(); 
                 echo json_encode($data);
                 //var_dump($data);
                
         } 
        public function sms_json()
         {
                 $data = $this->_model->get_sms(); 
                 //echo json_encode($data);
                 return $data;
                
         } 
        public function sms_json_withID($id)
         {
            
                 $data ['hani'] = $this->_model->get_sms_withID($id); 
                 //echo json_encode($data);
                 $this->load->view('mtit_template/x.php',$data);
                 //return $data;
                
         } 
        public function sms_json_withID2($id)
         {
            
                 $data ['hani'] = $this->_model->get_sms_withID2($id); 
                 //echo json_encode($data);
                 $this->load->view('mtit_template/xy.php',$data);
                 //return $data;
                
         } 
        public function group_member($group_id)
         {
                  
                $data = array( 
                  'array_group' => $this->group_json($this->_user_id),
                  'members' => $this->_model->group_member($group_id),
                     );  

                 //$data ['members'] = $this->_model->group_member($group_id); 
                 //echo json_encode($data);
                 $this->load->view('mtit_template/member_view.php',$data);
                 //return $data;
                
         } 
        public function get_account_sender($id)
         {
                 $data = $this->_model->get_account_sender($id); 
                 echo json_encode($data);
                 //var_dump($data);
                
         } 
         
       public function group_byID($id)
	{   
            $this->load->model('contact/m_contact');
            $result = $this->m_contact->group_byID($id);
           //var_dump($result);
            print json_encode($result);
          //  echo 'mmm';
          //return json_encode($result);
            
	}
              public function update_group($id)
         {   
             
             
             if ( isset($_POST))
             {
                 
             //$this->form_validation->set_rules('account_id', 'رقم هوية الحساب', 'required');
             $this->form_validation->set_rules('group_name', 'اسم المجموعة', 'required');
             
             
                 
             $account_id = $this->_user_id;
             $group_name = $this->input->post('group_name');
             $group_status = $this->input->post('group_stat');
             
             $data = array(
             'account_id' =>  $account_id ,
             'group_name' =>  $group_name ,
             'published' => $group_status,
            
             );
             
           if ( $this->form_validation->run() == FALSE)
		 {
                    //$msg = form_error('account_id');
                    $msg1 = form_error('group_name');
                    $data = array(
                       'Account_id_Erorr' => $msg,
                        'Group_name_Erorr' => $msg1, 
                     );
                    $outputArray=array('status'=>"error","errordata"=>json_encode($data));
                    print json_encode($outputArray);
                                    }
                     else{
                    echo $this->load->model('contact/m_contact');
                    $ids = $this->m_contact->update_group($data,$id);
                    $data["group_id"]=$ids;
                    $outputArray=array("status"=>"success","idata"=>$data);
                    print json_encode($outputArray);
                    }
             }
             
         }
         public function delete_group($id)
         {    
             $this->load->model('contact/m_contact');
             $this->m_contact->delete_group($id);
         }         
        
        public function get_getways()
         {
                 $data = $this->_model->get_getways(); 
                 return $data;
                 //var_dump($data);
                
         } 
        public function get_senders()
         {
                 $data = $this->_model->get_senders(); 
                 return $data;
                 //var_dump($data);
                
         } 
         
         
        public function get_sender_by_getwayName($get_id)
	{   
            
            $this->load->model('account/m_account');
            $result = $this->m_account->get_sender_by_getwayName($get_id);
            echo json_encode($result);
            
	}  
        
    public function get_membersJson(){
    
             
            $this->load->model('contact/m_contact');
            $data = $this->_model->get_membersJson($this->_user_id);
            echo json_encode($data);
    }
    
    public function getMember_byID($member_id){
        
            $this->load->model('contact/m_contact');
            $data = $this->_model->getMember_byID($member_id);
            echo json_encode($data);
        
    }
    
        
         public function update_member($member_id)
         {   
             if ( isset($_POST))
             { 
             $this->form_validation->set_rules('mobile', 'رقم الجوال', 'required');
             $this->form_validation->set_rules('member_nam', 'اسم الفرد', 'required');
                 
             $group_selected = $this->input->post('group_selected');
             $mobile = $this->input->post('mobile');
             $email = $this->input->post('email');
             $member_nam = $this->input->post('member_nam');
             $note = $this->input->post('note');
             
             $data = array(
             'group_id' => $group_selected,
             'member_mobile' =>  $mobile ,
             'member_email' =>  $email ,
             'member_name' =>  $member_nam ,
             'notes' => $note,
             );
             
             
            if ( $this->form_validation->run() == FALSE)
		 {
                    $msg = form_error('mobile');
                    $msg2 = form_error('member_nam');
                    $data = array(
                        'Mobile_Erorr' => $msg, 
                        'Name_Erorr' => $msg2, 
                     );
                    print json_encode($data);
                                    }
                     else{
                      $this->load->model('contact/m_contact');
                      $this->_model->update_member($data,$member_id);
                    }
             }
             
         }    
         
         
         public function delete_member($member_id)
         {    
             $this->load->model('contact/m_contact');
             $this->_model->delete_member($member_id);
         }
         
         public function export_group($group_id)
         {    
             $this->load->model('contact/m_contact');
             $group = $this->_model->group_byID($group_id);
             if($group['0']['account_id']!=$this->_user_id)
             { 
             echo "error group ID";
             exit;
             }
             $members = $this->_model->group_member($group_id);
             
             echo "<table border='1'><tr><td>name</td><td>mobile</td><td>email</td><td>notes</td></tr> ";
             foreach($members as $member){
                echo "<tr><td>".iconv("utf-8", "windows-1256", $member['member_name'])."</td><td>".$member['member_mobile']."</td>"
                        . "<td>".$member['member_email']."</td><td>".iconv("utf-8", "windows-1256", $member['notes'])."</td></tr> ";

             }
             echo "</table>";
            header("Content-type: application/vnd.ms-excel;  name='excel'");
            header("Content-Disposition: attachment; filename=exportfile.xls");

             
         }
         
        public  function import_members(){
                
            if ( isset($_POST))
            { 
                $this->do_upload();
                $group_id =  $this->input->post('group_selected');  
                $group_id2 =  $this->input->post('file2upload');  
               // var_dump($group_id2);                exit();
              //echo $_SERVER['DOCUMENT_ROOT']; exit;
                
                $objReader = PHPExcel_IOFactory::createReader('Excel5');
                $objPHPExcel = $objReader->load("application/third_party/uploads/1.xls");
                $sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
                
                //var_dump($sheetData); exit;
                foreach ($sheetData as $value) {
                    
                    $data = array(
                    'group_id' => $group_id,
                    'member_mobile' =>  $value['A']  ,
                    'member_email' =>  $value['B']  ,
                    'member_name' =>  $value['C']  ,
                    );
                    echo $this->load->model('contact/m_contact');
                    $this->m_contact->add_member($data);
                    //echo $value['A'] . '<br />';
                }
                 }
            }

      public function do_upload()
	
	{
		
             if ( isset($_POST))
             { 
                /*-------------------------- 1) setup config array -----------------------------------*/ 
                $config['upload_path'] = $_SERVER['DOCUMENT_ROOT'].'/rasel/uploads/';
		$config['allowed_types'] = '*';
		$config['max_size']	= '1000';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);
                $this->upload->initialize($config);
                
                if($_FILES['userfile']['type']!=="application/vnd.ms-excel"){
                    echo "خطأ في صيغة الملف يرجى حفظ الملف بصيغة xls ";
                    exit;
                }
                /*-------------------------- 2) upload the file -----------------------------------*/ 
                        if ( ! $this->upload->do_upload('userfile'))
                        {
                                $error = array('error' => $this->upload->display_errors());
                                echo $error['error'];
                                echo "<br/>";
                                // var_dump($this->upload->data());

                        }
                        else
                        {
                    
                /*-------------------------- 3) reading file after success upload -----------------------------------*/ 
                        $group_id =  $this->input->post('group_selected');
			//$data = array('upload_data' => $this->upload->data());
                        $file_data = $this->upload->data();       
                        $file_name = ($file_data['file_name']);
                        

                        $objReader = PHPExcel_IOFactory::createReader('Excel5');
                        $objPHPExcel = $objReader->load("./uploads/".$file_name);
                        $sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
                            
                        
                       
                       /*-------------------------- 4) insert to database -----------------------------------*/
                        foreach($sheetData as $value){
                           $element =null;
                           $value['A'] = trim($value['A']);
                           
                        
                          if (strpos($value['A'], "'") !== FALSE){
                             $element = substr($value['A'],1);
                            $mobile= $element;
                        }
                        
                           if (substr( $value['A'], 0, 5 ) === "97259" && strlen($value['A'])==12) {
                             $element = substr($value['A'],5);
                            $mobile= "059".$element;
                        }
                        
                          else  if (substr(  $value['A'] , 0, 2 ) == "59" && strlen($value['A'])==9) {        
                             $element = substr($value['A'],2);
                            $mobile= "059".$element;
                            }
                            else
                                $mobile= $value['A'] ;
                            
                            if(is_numeric($mobile)){
                               // echo $mobile."<br/>";
                            $data = array(
                            'group_id' => $group_id,
                            'member_mobile' =>  $mobile  ,
                            'member_email' =>  $value['B']  ,
                            'member_name' =>  $value['C']  ,
                            );
                            
                            echo $this->load->model('contact/m_contact');
                            $this->m_contact->add_member($data);
                            }
                           
                        }
                        
                      
                        
                       /*----------------------- 6) redirect to member page ------------------------*/
                        $this->members();

                }
                
                 /*----------------------- 5) delete file after inserting to database ------------------------*/
                        if(unlink($_SERVER['DOCUMENT_ROOT'].'rasel/uploads/'.$file_name))
                        {
                            //echo "File ".$_SERVER['DOCUMENT_ROOT'].'rasel/uploads/'.$file_name." Deleted.";
                        }
             }
        }

         public function index()
	{   
            
//          $data = array( 
//              'array_get' => $this->get_getways(),
//              'array_sen' => $this->get_senders(),
//          );
//          $this->template->write_view('sidebar', 'mtit_template/sidebar', TRUE);
//          $this->template->write_view('pagecontent', 'mtit_template/groups',$data, TRUE);
//          $this->template->render();
         
	}
        
        public function groups()
	{   
             if($this->hasPermission(24)){
             $this->load->model('m_sms');
		$this->data['groups']=$this->m_sms->get_group($this->_user_id);
            $this->data['subpage']='sms/groups';
            
           $this->load->view('index',$this->data);
             }
         
	}

        public function members()
	{  
            
           $credit = new C_credit();
           $user_credit = $credit->get_user_credit(); 
           
            $data = array( 
              'array_group' => $this->group_json($this->_user_id),
               "user_credit"=>$user_credit
                 );  
          $this->template->write_view('pagecontent', 'mtit_template/members', $data , TRUE);
          $this->template->render();
         
	}
        
        
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */