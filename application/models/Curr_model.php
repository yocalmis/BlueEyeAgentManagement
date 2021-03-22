<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Curr_model extends CI_Model
{
	 function __construct()
     {
         parent::__construct();
         $this->load->database();

		 
     }
	 
	 
	 
	 
	 	 	 	 	 function kontrol($curr)
     {
	
	$query =$this->db->query("select ".$curr." from acente_currency where id=1");
        if( $query->num_rows() > 0 )
        {
            return $query->result_array();
        }
        else
        {
            return FALSE;
        }
	
	 } 
	 	 
	 
	
}