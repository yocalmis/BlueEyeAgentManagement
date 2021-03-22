<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Config_model extends CI_Model
{
	 function __construct()
     {
         parent::__construct();
         $this->load->database();

		 
     }
	 
	 	 
	 	 
	 
	 
	 	 
	 	 	 	 function ayar()
     {
	
	$query =$this->db->query("select * from tkn_mat_options Where id=1");
        if( $query->num_rows() > 0 )
        {
            return $query->result_array();
        }
        else
        {
            return FALSE;
        }
	
	 } 
	 
	 
	 	 
	 	 	 function kullanici_bilgi($k_id)
     {
	
$query =$this->db->query("select * from acente_uyeler Where id=".$k_id);
        if( $query->num_rows() > 0 )
        {
            return $query->result_array();
        }
        else
        {
            return FALSE;
        }
	
	 } 
	 
	 
	 	 
	 	 	 	 function uye_guncelle($id,$isim,$kl,$sf,$em,$fadr,$adr,$tl)
     {
		 
		
	

	$insert=array(
	'telefon'=>$tl,
	'pass'=>$sf,
	'email'=>$em,	
	'adres'=>$adr,
	'fatura_adresi'=>$fadr
	);
	
		  $this->db->where('id',$id);	
		  $this->db->where('username',$kl);	
	$into=$this->db->update('acente_uyeler',$insert);
	if($into){return 1;}else{return 0;} 
	
	

	
	 }	
	 
	  
	 	 	 	 function uye_dondur($id,$kl)
     {
		 
		
	

	$insert=array(
	'status'=>0
	);
	
		  $this->db->where('id',$id);	
		  $this->db->where('username',$kl);	
	$into=$this->db->update('acente_uyeler',$insert);
	if($into){return 1;}else{return 0;} 
	
	

	
	 }	
	 
	
}