<?php

class Loginmodel extends CI_Model
{
  public function login_valid($username,$password)
  {       
	 	  $q = $this->db->where(['username'=>$username,'password'=>$password])
		                ->get('users');
			  if($q->num_rows())
  {               //echo "<pre>";
                 // print_r($q->result()); exit;
                  //print_r($q->row()); exit;		  
                  return $q->row()->id;
				 // return TRUE;
  }
         else
  {
	             return FALSE;
  }
  }
  }
?>