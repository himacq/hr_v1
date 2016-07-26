<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_sms extends CI_Model {

        public function __construct(){
            
            parent::__construct();
            
        }
        
       public function add_group($data)
         {
           
            $this->db->insert('t_sms_groups', $data); 
            $insert_id = $this->db->insert_id();
            $this->db->trans_complete();
            return  $insert_id;
          
         } 
       public function add_member($data)
         {
           
           $this->db->insert('group_member', $data); 
  
         } 
        
       public function add_sender2Acc($data)
         {
           
           $this->db->insert('account_sender', $data); 
  
         }        
       
        
        public function get_getways()
        {
          
             $this->db->select('*'); 
             $this->db->order_by("id", "desc"); 
             $query = $this->db->get('sms_getways');
             $e=$query->result_array();
            return $e;
        }
        public function get_senders()
        {
          
             $this->db->select('*'); 
             $this->db->order_by("sender_id", "desc"); 
             $query = $this->db->get('sms_getway_sender');
             $e=$query->result_array();
            return $e;
        } 
        
        public function get_account()
        {
          
             $this->db->select('*'); 
             $this->db->order_by("account_id", "desc"); 
             $query = $this->db->get('sms_account');
             $e=$query->result_array();
            return $e;
        }
        public function get_group($account_id)
        {
          
             $this->db->select('*'); 
             $this->db->where("account_id",$account_id);
             $query = $this->db->get('t_sms_groups');
             $e=$query->result();
             return $e;
        }
        
        public function get_balance()
        {
             $this->db->select('balance_log.*,account.account_id,account.account_name,constants.const_id,constants.name,caused.account_id,caused.account_name as caused_name');
             $this->db->from('balance_log');
             $this->db->join('sms_account as account', 'balance_log.account_id  =  account.account_id');
             $this->db->join('constants', 'constants.const_id  =  balance_log.action');
             $this->db->join('sms_account as caused', 'balance_log.caused_by =  caused.account_id');
             $query = $this->db->get();
             $e=$query->result_array();
             return $e;
        }
        public function get_sms()
        {
            $this->db->select('*');
             $this->db->from('sms_log');
             $this->db->join('sms_account', 'sms_log.account_id  =  sms_account.account_id');
             $this->db->join('constants', 'constants.const_id  =  sms_log.receiver_type');
             $query = $this->db->get();
             $e=$query->result_array();
             return $e;
        }
        public function get_sms_withID($id)
        {
            $this->db->select('*');
             $this->db->from('sms_log');
             $this->db->join('sms_account', 'sms_log.account_id  =  sms_account.account_id');
             $this->db->where('sms_log.account_id', $id);
             $query = $this->db->get();
             $e=$query->result_array();
             return $e;
        }
        public function get_sms_withID2($id)
        {
            $this->db->select('*');
             $this->db->from('sms_log');
             $this->db->join('sms_account', 'sms_log.account_id  =  sms_account.account_id');
             $this->db->where('sms_log.account_id', $id);
             $query = $this->db->get();
             $e=$query->result_array();
             return $e;
        }
        public function group_member($group_id)
        {
            $this->db->select('*');
             $this->db->from('group_member');
             $this->db->where('group_member.group_id', $group_id);
             $query = $this->db->get();
             $e=$query->result_array();
             return $e;
        }
        public function get_account_sender($id)
        {
          
//             $this->db->select('*'); 
//             $this->db->order_by("account_id", "desc"); 
//             $query = $this->db->get('account_sender');
//             $e=$query->result_array();
//            return $e;
            
            $this->db->select('sms_getway_sender.sender');
             $this->db->from('account_sender');
             $this->db->join('sms_getway_sender', 'sms_getway_sender.sender_id = account_sender.sender_id');
             $this->db->where('account_sender.account_id', $id);
             $query = $this->db->get();
             $e=$query->result_array();
            return $e;
        }
        
        public function group_byID($id)
        {
             $query = $this->db->get_where('sms_group', array('group_id' => $id));
             $e=$query->result_array();
                return $e;
        }
        public function update_group($data,$id)
         {
            $this->db->where('group_id', $id);
            $this->db->update('sms_group', $data); 
            return  $id;
  
         }
         public function delete_group($id)
         {
           $this->db->where('group_id', $id);
           $this->db->delete('sms_group');  
  
         }
         
       public function get_sender_by_getwayName($get_id)
        {    
             $this->db->select('*'); 
             $this->db->order_by("sender_id", "desc"); 
             $query = $this->db->get_where('sms_getway_sender', array('getway' => $get_id));
             $e=$query->result_array();
                return $e;
                
                
                
        }
        
        
        public function get_membersJson($account_id){
            
             $this->db->select('*'); 
             $this->db->from('group_member');
             $this->db->join('sms_group', 'sms_group.group_id = group_member.group_id');
             $this->db->where('sms_group.account_id', $account_id);
             $query = $this->db->get();
             $e=$query->result_array();
            return $e;
        }
        
        public function getMember_byID($member_id)
        {
             $query = $this->db->get_where('group_member', array('member_id' => $member_id));
             $e=$query->result_array();
                return $e;
        }
        
         public function update_member($data,$member_id)
         {
           $this->db->where('member_id', $member_id);
           $this->db->update('group_member ', $data);  
  
         }
         
         public function delete_member($member_id)
         {
           $this->db->where('member_id', $member_id);
           $this->db->delete('group_member');  
  
         }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */