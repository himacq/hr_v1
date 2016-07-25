<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class CI_Callproc {

	public function __construct()
	{

     
       }
       
       
	public function addproc($pkgname, $procname, $data, $db)
	{
   // $addconn = oci_pconnect('tmanagment_portal','portal!2012#', "//10.12.0.31:1521/ministry", 'AL32UTF8');
	$stmt="begin ".$pkgname.".".$procname."(";
    for($i=1;$i<=sizeof($data);$i++){
    $parmeter=$data[$i];   
    $stmt=$stmt.":".$parmeter;
    if($i!=sizeof($data))
     $stmt=$stmt.",";
    }
    $stmt=$stmt."); end;";
    echo $db;
    $add = OCIParse($db, $stmt);
    //OCIBindByName($add, ":I_CONST_NAME", $namecon,200);
   // OCIBindByName($add, ":O_MSG_TXT", $O_MSG_TXT,200);
   // OCIExecute($add);
       
       
    }     

    
} 
    
    
    
    
    
    