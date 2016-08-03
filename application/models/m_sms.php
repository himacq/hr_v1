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
         
         public function add_sms_log($data)
         {
           
            $this->db->insert('t_sms_log', $data); 
            $insert_id = $this->db->insert_id();
            $this->db->trans_complete();
            return  $insert_id;
          
         } 
       public function add_member($data)
         {
           
            $this->db->insert('t_sms_group_member', $data); 
           $insert_id = $this->db->insert_id();
            $this->db->trans_complete();
            return  $insert_id;
         } 
        
       
        public function get_group($account_id,$onSend=false)
        {
          
             $this->db->select('*'); 
             $this->db->where("account_id",$account_id);
             if($onSend)
                 $this->db->or_where("published",1);
             $query = $this->db->get('t_sms_groups');
             $e=$query->result();
             return $e;
        }
        
        public function get_sms_log($acc_id)
        {
            $this->db->select('*');
             $this->db->from('t_sms_log');
             $this->db->where('t_sms_log.account_id', $acc_id);
             $this->db->order_by("id", "desc");
             $query = $this->db->get();
             $e=$query->result();
             return $e;
        }
        public function get_sms_withID($id)
        {
            $this->db->select('*');
             $this->db->from('t_sms_log');
             $this->db->join('sms_account', 'sms_log.account_id  =  sms_account.account_id');
             $this->db->where('sms_log.account_id', $id);
             $query = $this->db->get();
             $e=$query->result_array();
             return $e;
        }
        public function get_sms_withID2($id)
        {
            $this->db->select('*');
             $this->db->from('t_sms_log');
             $this->db->join('sms_account', 'sms_log.account_id  =  sms_account.account_id');
             $this->db->where('sms_log.account_id', $id);
             $query = $this->db->get();
             $e=$query->result_array();
             return $e;
        }
        public function group_member($group_id)
        {
            $this->db->select('*');
             $this->db->from('t_sms_group_member');
             $this->db->where('t_sms_group_member.group_id', $group_id);
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
             $query = $this->db->get_where('t_sms_groups', array('group_id' => $id));
             $e=$query->result_array();
                return $e;
        }
        public function update_group($data,$id)
         {
            $this->db->where('group_id', $id);
            $this->db->update('t_sms_groups', $data); 
            return  $id;
  
         }
         public function delete_group($id)
         {
           $this->db->where('group_id', $id);
           return $this->db->delete('t_sms_groups');  
  
         }
         
       public function get_senders()
        {    
             $this->db->select('*'); 
             $this->db->order_by("id", "desc"); 
             $query = $this->db->get('t_sms_sender');
             $e=$query->result();
                return $e;
                
                
                
        }
        
        
        public function get_members($account_id,$send_sms = false){
            
             $this->db->select('*'); 
             $this->db->from('t_sms_group_member');
             $this->db->join('t_sms_groups', 't_sms_groups.group_id = t_sms_group_member.group_id');
             $this->db->where('t_sms_groups.account_id', $account_id);
             if($send_sms)
                 $this->db->or_where('t_sms_groups.published', 1);
             $query = $this->db->get();
             $e=$query->result();
             
             
            return $e;
        }
        
                public function get_group_members($id){
            
             $this->db->select('*'); 
             $this->db->from('t_sms_group_member');
             $this->db->join('t_sms_groups', 't_sms_groups.group_id = t_sms_group_member.group_id');
             $this->db->where('t_sms_groups.group_id', $id);
             $query = $this->db->get();
             $e=$query->result();
            return $e;
        }
        
        public function getMember_byID($member_id)
        {
             $query = $this->db->get_where('t_sms_group_member', array('member_id' => $member_id));
             $e=$query->result_array();
                return $e;
        }
        
         public function update_member($data,$member_id)
         {
           $this->db->where('member_id', $member_id);
           $this->db->update('t_sms_group_member ', $data);  
           return  $member_id;
         }
         
         public function delete_member($member_id)
         {
           $this->db->where('member_id', $member_id);
          return $this->db->delete('t_sms_group_member');  
  
         }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */