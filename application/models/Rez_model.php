<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rez_model extends CI_Model
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
	 
	 
	 	 
	 	 	 function rez_getir($kul_id)
     {
	
$query =$this->db->query("select * from acente_rezervasyon Where kullanici_id=".$kul_id);
        if( $query->num_rows() > 0 )
        {
            return $query->result_array();
        }
        else
        {
            return FALSE;
        }
	
	 } 
	 
	  
	 	 	 function rez_detay($id)
     {
	
$query =$this->db->query("select * from acente_rezervasyon_detay Where rez_id=".$id." order by id asc limit 0 , 1");
        if( $query->num_rows() > 0 )
        {
            return $query->result_array();
        }
        else
        {
            return FALSE;
        }
	
	 } 
	 	 	 
	 	 	 function tur_bilgi($tur_id)
     {
	
$query =$this->db->query("select * from acente_tur Where id=".$tur_id);
        if( $query->num_rows() > 0 )
        {
            return $query->result_array();
        }
        else
        {
            return FALSE;
        }
	
	 }
	 	 
	 
	  	 	 function kat_bilgi($kat_id,$uz)
     {
	
$query =$this->db->query("select * from acente_category Where id=".$kat_id);
        if( $query->num_rows() > 0 )
        {
                       foreach ($query->result_array() as $row)
										{
											return $row['adi'.$uz];
		  
										}

        }
        else
        {
            return FALSE;
        }
	
	 }
	
	
		  	 	 function kat_bilgi_seo($kat_id)
     {
	
$query =$this->db->query("select * from acente_category Where id=".$kat_id);
        if( $query->num_rows() > 0 )
        {
                       foreach ($query->result_array() as $row)
										{
											return $row['seo_adi'];
		  
										}

        }
        else
        {
            return FALSE;
        }
	
	 }
	
	
	
	
	
	
	
		 	 function cart_detay_getir($id)
     {
	
		$query = $this->db->query("select * from acente_rezervasyon_detay Where sepet_id=".$id);
        if( $query->num_rows() > 0 )
        {
            return $query->result_array();
        }
        else
        {
            return FALSE;
        }
	
	 }
	
	
	
	
	
	 function tur_puan_guven($kod)
     {
	$total=0;
	$adet=0;
	$query =$this->db->query("select * from acente_puan_guv Where tur_kod='$kod'");
        if( $query->num_rows() > 0 )
        {
         
		        foreach ($query->result_array() as $row)
										{
											$total=$total+$row['puan'];
		                                    $adet=$adet+1;
										}
		 
		 return $total/$adet;
        }
        else
        {
            return FALSE;
        }
	
	 } 
	 
	 
		 	 function tur_puan_org($kod)
     {
	$total=0;
	$adet=0;
	$query =$this->db->query("select * from acente_puan_org Where tur_kod='$kod'");
        if( $query->num_rows() > 0 )
        {
         
		        foreach ($query->result_array() as $row)
										{
											$total=$total+$row['puan'];
		                                    $adet=$adet+1;
										}
		 
		 return $total/$adet;
        }
        else
        {
            return FALSE;
        }
	
	 }  
	 
		 	 function tur_puan_para($kod)
     {
	$total=0;
	$adet=0;
	$query =$this->db->query("select * from acente_puan_para Where tur_kod='$kod'");
        if( $query->num_rows() > 0 )
        {
         
		        foreach ($query->result_array() as $row)
										{
											$total=$total+$row['puan'];
		                                    $adet=$adet+1;
										}
		 
		 return $total/$adet;
        }
        else
        {
            return FALSE;
        }
	
	 }  
	 
	 
	 
	 	 function tur_puan_servis($kod)
     {
	$total=0;
	$adet=0;
	$query =$this->db->query("select * from acente_puan_servis Where tur_kod='$kod'");
        if( $query->num_rows() > 0 )
        {
         
		        foreach ($query->result_array() as $row)
										{
											$total=$total+$row['puan'];
		                                    $adet=$adet+1;
										}
		 
		 return $total/$adet;
        }
        else
        {
            return FALSE;
        }
	
	 }


	 	 function yorum_adet($kod)
     {
	$query_3 = $this->db->query("select * from acente_yorumlar Where durum=1  and tur_kod=".$kod." ");				
								return $say_tur_yorum=$query_3->num_rows($query_3); 	 
	
	
	 }




	 function tarih_degistir($array)
     {

     	$t1=explode("/",$array["start_date"]);
     	$t1=$t1[2]."-".$t1[0]."-".$t1[1];

     	$t2=explode("/",$array["end_data"]);
     	$t2=$t2[2]."-".$t2[0]."-".$t2[1];

	
	  	$insert=array(
	'bas_tar'=>$t1,
	'bit_tar'=>$t2,
	'varsa_tarih_degisim_nedeni'=>$array["changeNote"],
		'varsa_tarih_degisim_tarihi'=>date("Y-m-d H:i:s")	

		);

		  $this->db->where('kullanici_id',$array["user_id"]);		
		  $this->db->where('id',$array["rezervation_id"]);
		  $into=$this->db->update('acente_rezervasyon',$insert);
		  if($into){return 1;}else{return 0;} 
		   
		   
	
	
	 } 




	     function tarih_degisim_kontrol($array)
    {

        $sql = "SELECT * FROM acente_rezervasyon Where kullanici_id=".$array["user_id"]." and id = ".$array["rezervation_id"];

        $query = $this->db->query($sql);

        if( $query->num_rows() > 0 )
        {
            	
		foreach ($query->result_array() as $row)
					{	
        			return $row['varsa_tarih_degisim_tarihi'];
					}	 



        }
        else
        {
            return 0;
        }




    }
	





	 function iptal_et($array)
     {



	
	  	$insert=array(
	'iptal_durum'=>1,
	'varsa_iptal_nedeni'=>$array["cancelText"],	
		);

		  $this->db->where('kullanici_id',$array["user_id"]);		
		  $this->db->where('id',$array["rezervation_id"]);
		  $into=$this->db->update('acente_rezervasyon',$insert);
		  if($into){return 1;}else{return 0;} 
		   
		   
	
	
	 } 






	
	
	
	
}