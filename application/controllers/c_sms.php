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
             if(!$this->input->post('group_id')){
                 $this->data['status']=$this->ResponseState(FALSE,'حدث خطأ أثناء تنفيذ العملية');
             }
          else if($this->hasPermission(25)){
			$dataArr=array('member_name'=>$this->input->post('name'),
                            'member_mobile'=>$this->input->post('mobile'),
                            'group_id'=>$this->input->post('group_id'));
                        $this->load->model('m_sms');
			$res=$this->m_sms->add_member($dataArr); 
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
         
         public function upload_contact()
         {   
             
              if(!$this->input->post('excel_group_id')){
                 $this->data['status']=$this->ResponseState(FALSE,'حدث خطأ أثناء تنفيذ العملية');
             }
          else if($this->hasPermission(25)){
              
              if ( isset($_POST))
             { 
                /*-------------------------- 1) setup config array -----------------------------------*/ 
                $config['upload_path'] = FCPATH.'/uploads/contacts';
		$config['allowed_types'] = '*';
		$config['max_size']	= '1000';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);
                $this->upload->initialize($config);
     
                if(!($_FILES['userfile']['type']=="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" 
                        || $_FILES['userfile']['type']=="application/vnd.ms-excel" )){
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
                        $group_id =  $this->input->post('excel_group_id');
			//$data = array('upload_data' => $this->upload->data());
                        $file_data = $this->upload->data();       
                        $file_name = ($file_data['file_name']);
                        
                        $this->load->library('excel');                          
                        $objPHPExcel = PHPExcel_IOFactory::load($config['upload_path']."/".$file_name);
 
                        $cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();
                        
                        foreach ($cell_collection as $cell) {
    $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
    $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
    $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();
 
    //header will/should be in row 1 only. of course this can be modified to suit your need.
    if ($row == 1) {
        $header[$row][$column] = $data_value;
    } else {
        $arr_data[$row][$column] = $data_value;
    }
}
 
//send the data in an array format
$data['header'] = $header;
$data['values'] = $arr_data;


                       
                       /*-------------------------- 4) insert to database -----------------------------------*/
                        foreach($arr_data as $value){
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
                            'member_name' =>  $value['B']  ,
                            );
                            
                            $this->load->model('m_sms');
			$res=$this->m_sms->add_member($data); 
			if($res>=1){
				$this->data['status']=$this->ResponseState(TRUE,'تمت عملية الإضافة بنجاح');
				$this->data['id']=$res;
			}
			else
				$this->data['status']=$this->ResponseState(FALSE,'حدث خطأ أثناء تنفيذ العملية');
                            }
                           
                        }
                        
       
                }
                
                 /*----------------------- 5) delete file after inserting to database ------------------------*/
                        if(unlink($config['upload_path']."/".$file_name))
                        {
                            //echo "File ".$_SERVER['DOCUMENT_ROOT'].'rasel/uploads/'.$file_name." Deleted.";
                        }
             }
             
            
		}
		else
			$this->data['status']=$this->ResponseState(FALSE,'انت لا تملك الصلاحية لتنفيذ هذه العملية');
		
               
                
                $this->load->model('m_sms');
		$this->data['myGroups']=$this->m_sms->get_group($this->_user_id);
                $this->data['groupMembers']=$this->m_sms->get_members($this->_user_id);
            $this->data['subpage']='sms/contacts';
            
           $this->load->view('index',$this->data);
           
             
             
          
         }

         
       public function group_byID($id)
	{   
            if($this->hasPermission(24)){
			$this->load->model('m_sms');
			$res=$this->m_sms->group_byID($id);
			if(sizeof($res)){
				$this->data['status']=$this->ResponseState(TRUE,'تم جلب البيانات بشكل صحيح');
				$this->data['groupData']=$res;
			}
			else
				$this->data['status']=$this->ResponseState(FALSE,'لم يتم العثور على السجل المطلوب');
		}
		else
			$this->data['status']=$this->ResponseState(FALSE,'انت لا تملك الصلاحية لتنفيذ هذه العملية');
		echo json_encode($this->data);
            
	}
        
        
        public function contact_byID($id)
	{   
            if($this->hasPermission(25)){
			$this->load->model('m_sms');
			$res=$this->m_sms->getMember_byID($id);
			if(sizeof($res)){
				$this->data['status']=$this->ResponseState(TRUE,'تم جلب البيانات بشكل صحيح');
				$this->data['contactData']=$res;
			}
			else
				$this->data['status']=$this->ResponseState(FALSE,'لم يتم العثور على السجل المطلوب');
		}
		else
			$this->data['status']=$this->ResponseState(FALSE,'انت لا تملك الصلاحية لتنفيذ هذه العملية');
		echo json_encode($this->data);
            
	}
        
              public function update_group()
         {   
                  $id = $this->input->post('group_id');
             if($this->hasPermission(24)){
			$this->load->model('m_sms');
			$dataArr=array(
				'group_name'=>$this->input->post('name'),
				'published'=>$this->input->post('published'),
				);
			$res=$this->m_sms->update_group($dataArr,$id);
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
         
         public function delete_group($id)
         {    
             $this->load->model('m_sms');
            $result = $this->m_sms->group_byID($id);

            if($this->hasPermission(24) && $result['0']['account_id']==$this->_user_id){
             $this->load->model('m_sms');
             $res = $this->m_sms->delete_group($id);
             if($res){
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
        

  
      
    
        
         public function update_contact()
         {   
                  $id = $this->input->post('member_id');
             if($this->hasPermission(25)){
			$this->load->model('m_sms');
			$dataArr=array(
				'member_name'=>$this->input->post('name'),
				'member_mobile'=>$this->input->post('mobile'),
                                'group_id'=>$this->input->post('group_id'),
				);
			$res=$this->m_sms->update_member($dataArr,$id);
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
         
         
         public function delete_contact($member_id)
         {    


            if($this->hasPermission(25)){
             $this->load->model('m_sms');
             $res = $this->m_sms->delete_member($member_id);
             if($res){
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
         
        
        public function groups()
	{   
             if($this->hasPermission(24)){
             $this->load->model('m_sms');
		$this->data['groups']=$this->m_sms->get_group($this->_user_id);
            $this->data['subpage']='sms/groups';
            
           $this->load->view('index',$this->data);
             }
         
	}
        
         public function contacts()
	{   
             if($this->hasPermission(25)){
             $this->load->model('m_sms');
		$this->data['myGroups']=$this->m_sms->get_group($this->_user_id);
                $this->data['groupMembers']=$this->m_sms->get_members($this->_user_id);
            $this->data['subpage']='sms/contacts';
            
           $this->load->view('index',$this->data);
             }
         
	}
        
         public function get_group_numbers($id)
	{   
             if($this->hasPermission(27)){
             $this->load->model('m_sms');
		$numbers=$this->m_sms->get_group_members($id);
            
		echo json_encode($numbers);
                exit;
             }
	}
        
         public function get_logs()
	{   
             if($this->hasPermission(26)){
             $this->load->model('m_sms');
		$this->data['smsLogs']=$this->m_sms->get_sms_log($this->_user_id);
            $this->data['subpage']='sms/logs';
            
           $this->load->view('index',$this->data);
             }
          else
			$this->data['status']=$this->ResponseState(FALSE,'انت لا تملك الصلاحية لتنفيذ هذه العملية');
		
	}
        
        public function send_sms()
	{   
             if($this->hasPermission(27)){
             $this->load->model('m_sms');
            $this->data['subpage']='sms/send';
            $this->data['myGroups']=$this->m_sms->get_group($this->_user_id,true);
            $this->data['senders']=$this->m_sms->get_senders();
            $this->data['groupMembers']=$this->m_sms->get_members($this->_user_id,true);
           $this->load->view('index',$this->data);
             }
          else
			$this->data['status']=$this->ResponseState(FALSE,'انت لا تملك الصلاحية لتنفيذ هذه العملية');
		
	}
        
          public function do_send()
         {   
 
                  
             if(!$this->input->post('Text') || !$this->input->post('rec_numbers')){
                 $this->data['status']=$this->ResponseState(FALSE,'يرجى التأكد من ادخال رقم الجوال ونص الرسالة');
             }
          else if($this->hasPermission(27)){
              
			$res = $this->send($this->input->post('sender_name'),
                                $this->input->post('rec_numbers'),$this->input->post('Text'),$this->_user_id); 
			if($res){
				$this->data['status']=$this->ResponseState(TRUE,'تمت عملية الارسال بنجاح'.', الرصيد المستهلك '.$res);
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
         
             public function send($sender_name, $recipient,$message,$acc_id)
         {
        
                 
        $response = false;
        $message = urldecode($message);
                      
           $unicode =(preg_match('/[أ-ي]/ui', $message)?"2":"0");
                   
        
            $msgCount= mb_strlen($message);
            
           
            
             if($unicode==2){
            if ($msgCount <= 70) {
                $msgCount = 1;
            }
            else if ($msgCount >= 268) {
                
                $message = substr($message, 0, 481);
                $msgCount = 4;
               
            }
            else {

                $msgCount += (67 - 1);
                $msgCount -= ($msgCount % 67);
                $msgCount /= 67;
            }
             
             }

                     
             
             else {
             if ($msgCount <= 160) {
                $msgCount = 1;
            }
            else if ($msgCount >= 459) {
                $message = substr($message, 0, 459);
                $msgCount = 3;
            }
            else {

                $msgCount += (153 - 1);
                $msgCount -= ($msgCount % 153);
                $msgCount /= 153;
            }
            

             }
               

            
        

        
        /***********************************************************************************************/
        // calculate required credits
        
        
        $recipient_array = array();
        
        if (preg_match("/,/", $recipient)) {
            $numbers = explode(",", $recipient);

            
            
            foreach ($numbers as $element) {
                
                        if (substr( $element, 0, 5 ) === "97259" && strlen($element)==12) {
                            $recipient_array[] = $element;
                        }
                        else if (substr( $element, 0, 3 ) === "059" && strlen($element)==10) {
                            $element = substr($element,1);
                            $recipient_array[] = "972".$element;
                        }
                
            

               
            }
       

                }
                
                else {
                   
if (substr( $recipient, 0, 5 ) === "97259" && strlen($recipient)==12) {
                            $recipient_array[] = $recipient;
                        }
                        else if (substr( $recipient, 0, 3 ) === "059" && strlen($recipient)==10) {
                            $recipient = substr($recipient,1);
                            $recipient_array[] = "972".$recipient;
                        }
                
            

             
         
                         
        }

        $recipient_array = array_unique($recipient_array);
        
        
        $required_credits = ($msgCount) * count($recipient_array);
        
       


        /***********************************************************************************************/
        // check available credits of the account
        $account_credits = 0;
        /*$this->load->model('m_sms');
        $this->m_sms->get_group($this->_user_id,true);*/
        /*$url = "http://www.hotsms.ps/getbalance.php?"
                . "user_name=gccmnt2&user_pass=5159134";
                 
            $ch = curl_init($url);
        //initialize curl handle

            curl_setopt($ch, CURLOPT_URL, $url); //set the url

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

            curl_setopt($ch, CURLOPT_POST, 0); //set POST method

            $response4 = curl_exec($ch);


            curl_close($ch);  */          
          //echo $send_url."<br/>";
          $account_credits = 100;//$response4;
        //***********************************************/
        
         if($required_credits>$account_credits){
            return false;
        }
        
        /***********************************************************************************************/
        // send noti for remain credits
        
        
        /***********************************************************************************/
        // send or insert into send sms table - queue
        if(count($recipient_array)==0){
            return false;
        }
        
        //// queu large messages
        /********************************************/
        
            $bulk_messages = true;
            $api_response=101;
            if($bulk_messages){
            $recipient_true = implode(",", $recipient_array);
                   

            $credits = count($recipient_array)*$msgCount;
            $text = urlencode($message);
                $url = "http://www.hotsms.ps/sendbulksms.php?"
                . "user_name=gccmnt2&user_pass=5159134&sender=GccMnt2&mobile=".$recipient_true.""
                . "&type=".$unicode."&text=".$text;
                 
           /* $ch = curl_init($url);
        //initialize curl handle

            curl_setopt($ch, CURLOPT_URL, $url); //set the url

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

            curl_setopt($ch, CURLOPT_POST, 0); //set POST method

            $api_response = curl_exec($ch);


            curl_close($ch);     */       
          //echo "res".$url."<br/>"; exit;
                
            }
            /// send singles messages
            
        
        
        if (strpos($api_response, '101') !== FALSE ){
        
        
       /***********************************************************************************/
        // log sms
        
       $data = array(
            "account_id"=> $this->_user_id, 
           "rec"=>$recipient_true,
           "amount"=>$credits,
           "sms_text"=> $message,
           "date_sent"=>date("Y-m-d H:i:s"),
           "sender"=>$sender_name,
           "status"=>$api_response
               );
       $this->load->model('m_sms');
       if(!$this->m_sms->add_sms_log($data)){
return false;
       }
       

        
/***************************************************************/        
            return $credits;
       
        }
        
        else {
         $this->data['status']=$this->ResponseState(TRUE,'خطأ في عملية الارسال');

        }
        
        
       echo json_encode($this->data);
    }

        
        
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */