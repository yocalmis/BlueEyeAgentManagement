<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Wish_model extends CI_Model
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
	 
	 
	 	 
	  	 	 function wishlist_add($kul_id,$id)
     {
	
$query =$this->db->query("select * from acente_tur Where id=".$id);
        if( $query->num_rows() > 0 )
        {
			
			
$query =$this->db->query("select * from acente_istek Where tur_id=".$id." and kullanici_id=".$kul_id);
        if( $query->num_rows() > 0 )
        {			
			return FALSE;
		}
            
		$insert=array(
	'kullanici_id'=>$kul_id,
	'tur_id'=>$id	
	);

	$into=$this->db->insert('acente_istek',$insert);
	if($into){return TRUE;}else{return FALSE;}	
			
			
			
        }
        else
        {
            return FALSE;
        }


	
	 } 
	 
	  	 function populer_tur()
     {
	
		$query =$this->db->query("select * from acente_tur Where durum=1  and cok_satan=1 order by id desc limit 0 , 24");
        if( $query->num_rows() > 0 )
        {
            return $query->result_array();
        }
        else
        {
            return FALSE;
        }
		
	 } 
	 
	 	 	 	 	 function populer_ana_kategori()
     {
	
		$query =$this->db->query("select * from acente_one_category Where durum=1 and one_cikan=1  order by id desc limit 0 , 100");
        if( $query->num_rows() > 0 )
        {
            return $query->result_array();
        }
        else
        {
            return FALSE;
        }
	
	 } 
	 
	 	 	 function populer_kategori()
     {
	
		$query =$this->db->query("select * from acente_category Where durum=1 and one_cikan=1 order by id desc limit 0 , 100");
        if( $query->num_rows() > 0 )
        {
            return $query->result_array();
        }
        else
        {
            return FALSE;
        }
	
	 } 
	 
	 
	 	 	 	 function wishlist_get($kul_id)
     {
		$wish="";
		$query =$this->db->query("select * from acente_istek Where kullanici_id=".$kul_id);
        if( $query->num_rows() > 0 )
			
        {
			 $i=0;
			foreach ($query->result_array() as $row)
				{
				

				$query2 =$this->db->query("select * from acente_tur Where durum=1 and id=".$row['tur_id']);
foreach ($query2->result_array() as $row2)
				{
										$wish[$i]["id"]=$row2['id'];				
										$wish[$i]["adi"]=$row2['adi'];
										$wish[$i]["seo_adi"]=$row2['seo_adi'];
										$wish[$i]["resim"]=$row2['resim'];	
										$wish[$i]["resim_2"]=$row2['resim_2'];	
										$wish[$i]["tukenme"]=$row2['tukenme'];											
										$wish[$i]["sticker"]=$row2['sticker'];	
										$wish[$i]["sure"]=$row2['sure'];	
										$wish[$i]["aciklama"]=$row2['aciklama'];
										$wish[$i]["kod"]=$row2['kod'];		
										$wish[$i]["tur_donemi"]=$row2['tur_donemi'];										

								$query_3 = $this->db->query("select * from acente_yorumlar Where durum=1  and tur_kod=".$row2['kod']." ");				
								$say_tur_yorum=$query_3->num_rows($query_3);				
								$wish[$i]["yorum_adet"]=$say_tur_yorum;	


						$query_4 = $this->db->query("select * from acente_tur_detay Where durum=1  and tur_kod=".$row2['kod']." order by yetiskin_fiyat desc limit 0 , 1");				
						$say_tur_fiyat=$query_4->num_rows($query_4);				
						if($say_tur_fiyat==0){ $wish[$i]["baslangic_fiyat"]=0;	}
						else{
							
						foreach ($query_4->result_array() as $row_4)
										{
										$wish[$i]["baslangic_fiyat"]=$row_4['yetiskin_fiyat'];	
							
										}
										
							
							
						}								
										
				
				}	
			
				
					$i=$i+1;
				}
				
				return $wish;
        }
        else
        {
            return FALSE;
        }
	
	 } 
	 
	 function wishlist_remove($kul_id,$id){
/*		 
	$into=$this->db->where('tur_id',$id);
	$into=$this->db->where('kullanici_id',$kul_id);
	$into=$this->db->delete('acente_istek',$insert);
	*/
	
	$query = $this->db->query("delete from acente_istek Where tur_id=".$id."  and kullanici_id=".$kul_id);				
	if($query){return TRUE;}else{return FALSE;} 
		 
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
	 
	 
	
}