<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tour_model extends CI_Model
{
	 function __construct()
     {
         parent::__construct();
         $this->load->database();

		 
     }
	 
	 	 	 function varmi_tur($tur)
     {
	
		$query =$this->db->query("select * from acente_tur Where seo_adi='$tur'  and tur_donemi!='otel'");
        if( $query->num_rows() > 0 )
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
	
	 } 
	 
	 	 	 function istek_varmi($t_id,$kul_id)
     {
	
		$query =$this->db->query("select * from acente_istek Where kullanici_id=".$kul_id." and tur_id=".$t_id);
        if( $query->num_rows() > 0 )
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
	
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
	 
	 
	 	 
	 	 	 function tur_bilgi($tur)
     {
	
$query =$this->db->query("select * from acente_tur Where seo_adi='$tur'  and tur_donemi!='otel'");
        if( $query->num_rows() > 0 )
        {
            return $query->result_array();
        }
        else
        {
            return FALSE;
        }
	
	 } 
	 
	  	 function tur_engel_tarih($t_id)
     {
	
$query =$this->db->query("select * from acente_tarih_engel Where tur_id='$t_id'");
        if( $query->num_rows() > 0 )
        {
            return $query->result_array();
        }
        else
        {
            return FALSE;
        }
	
	 } 
	 	 
	 	 	 function tur_foto($t_id)
     {
	
$query =$this->db->query("select * from acente_tur_fotolar Where tur_id='$t_id'");
        if( $query->num_rows() > 0 )
        {
            return $query->result_array();
        }
        else
        {
            return FALSE;
        }
	
	 } 
	 
	 	 
	 	 	 function tur_yorum($t_id)
     {
	
	$query =$this->db->query("select * from acente_yorumlar Where tur_id='$t_id' and durum=1");
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
	 
	 
	 
	 
	  function yorum_puan_ortalama($tur_id,$kullanici_id)
     {
		 
		 
		$total=0;
			$adet=0;
			$query =$this->db->query("select * from acente_tur Where id=".$tur_id."  and tur_donemi!='otel'");
			if( $query->num_rows() > 0 )
        {
         
		        foreach ($query->result_array() as $row)
										{
											$kod=$row['kod'];
		                             
										}
		 
		
        }	 
		 
		 
		 
			$total=0;
			$adet=0;
			$query =$this->db->query("select * from acente_puan_guv Where tur_kod=".$kod." and kullanici_id=".$kullanici_id);
			if( $query->num_rows() > 0 )
        {
         
		        foreach ($query->result_array() as $row)
										{
											$puan_guv=$row['puan'];
		                             
										}
		 
		
        }
     
	 
	 
			$total=0;
			$adet=0;
			$query =$this->db->query("select * from acente_puan_org Where tur_kod=".$kod." and kullanici_id=".$kullanici_id);
			if( $query->num_rows() > 0 )
        {
         
		        foreach ($query->result_array() as $row)
										{
											$puan_org=$row['puan'];
		                             
										}
		 
		
        }

		
		
			$total=0;
			$adet=0;
			$query =$this->db->query("select * from acente_puan_para Where tur_kod=".$kod." and kullanici_id=".$kullanici_id);
			if( $query->num_rows() > 0 )
        {
         
		        foreach ($query->result_array() as $row)
										{
											$puan_para=$row['puan'];
		                             
										}
		 
		
        }
		
	 
	 
			$total=0;
			$adet=0;
			$query =$this->db->query("select * from acente_puan_servis Where tur_kod=".$kod." and kullanici_id=".$kullanici_id);
			if( $query->num_rows() > 0 )
        {
         
		        foreach ($query->result_array() as $row)
										{
											$puan_servis=$row['puan'];
		                             
										}
		 
		
        }
		
					 $total=$puan_guv+$puan_org+$puan_para+$puan_servis;
	        return   round($total/4,1);
	 } 
	 
	 
	 	 
	 	 	 function tur_detay($t_kod)
     {
	
	$query =$this->db->query("select * from acente_tur_detay Where tur_kod='$t_kod' and durum=1");
        if( $query->num_rows() > 0 )
        {
            return $query->result_array();
        }
        else
        {
            return FALSE;
        }
	
	 } 
	 
	 
	 	 
	 	 	 function alt_kat_diger_turlar($kat_id)
     {
	
$query =$this->db->query("select * from acente_tur Where kat_id='$kat_id' and durum=1  and tur_donemi!='otel'  order by sorting asc");
        if( $query->num_rows() > 0 )
        {
            return $query->result_array();
        }
        else
        {
            return FALSE;
        }
	
	 } 
	 
	 

	 
	  	 	 function alt_kat_adi($kat_id,$lng,$uz)
     {
		 
				
				
	
$query =$this->db->query("select * from acente_category Where id=$kat_id and durum=1   and kategori_turu='tur'");
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
	 
	  	 	 function ust_kat_adi($kat_id,$lng,$uz)
     {
	
$query =$this->db->query("select * from acente_category Where id=$kat_id and durum=1   and kategori_turu='tur'");
        if( $query->num_rows() > 0 )
        {
           foreach ($query->result_array() as $row)
										{
											$query2 =$this->db->query("select * from acente_one_category Where id=".$row['ust_kategori_id']);
										 foreach ($query2->result_array() as $row2)
										{
										
											
				return $row2['adi'.$uz]; 	
											
		  
										}	
		  
										}
        }
        else
        {
            return FALSE;
        }
	
	 } 
	 
	 
	 
	 
	 
	 
	 
	 
	  	 	 function alt_kat_seo_adi($kat_id)
     {
	
$query =$this->db->query("select * from acente_category Where id=$kat_id and durum=1  and kategori_turu='tur'");
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
	 
	  	 	 function ust_kat_seo_adi($kat_id)
     {
	
$query =$this->db->query("select * from acente_category Where id=$kat_id and durum=1   and kategori_turu='tur'");
        if( $query->num_rows() > 0 )
        {
           foreach ($query->result_array() as $row)
										{
											$query2 =$this->db->query("select * from acente_one_category Where id=".$row['ust_kategori_id']);
										 foreach ($query2->result_array() as $row2)
										{
											return $row2['seo_adi'];
											
		  
										}	
		  
										}
        }
        else
        {
            return FALSE;
        }
	
	 } 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 	 	 	 function alt_kat_diger_turlar_fiyat($tur_kod)
     {
	
$query =$this->db->query("select * from acente_tur_detay Where tur_kod='$tur_kod' and durum=1  order by yetiskin_fiyat asc limit 0 , 1");
        if( $query->num_rows() > 0 )
        {
            		 					foreach ($query->result_array() as $row)
										{
											if($row['yetiskin_fiyat']==""){return $row['yetiskin_fiyat']=0;}
											return $row['yetiskin_fiyat']; 
		  
										}
        }
        else
        {
          return 0;
        }
	
	 } 
	 
	 
		 	 	 function alt_kat_diger_turlar_yorum_adet($tur_kod)
     {
	
	$query =$this->db->query("select * from acente_yorumlar Where tur_kod='$tur_kod' and durum=1");
     return $query->num_rows();
	 }  
	 
	 
	 
	 
	 
		 	 function populer_tur()
     {
	
		$query =$this->db->query("select * from acente_tur Where durum=1  and tur_donemi!='otel' and cok_satan=1  order by sorting desc limit 0 , 24");
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
	
		$query =$this->db->query("select * from acente_category Where durum=1 and kategori_turu='tur' and one_cikan=1 order by id desc limit 0 , 100");
        if( $query->num_rows() > 0 )
        {
            return $query->result_array();
        }
        else
        {
            return FALSE;
        }
	
	 } 
	 
	 
	 	 function tur_gecmis_kayit($t_id,$kul_id){
/*		 
	$into=$this->db->where('tur_id',$id);
	$into=$this->db->where('kullanici_id',$kul_id);
	$into=$this->db->delete('acente_istek',$insert);
	*/
	/*
	$query = $this->db->query("delete from acente_gecmis Where kullanici_id=".$kul_id);	
	$say=$query->num_rows();
	
	if($say<=10){}
	else{
		
		$adet = $say-10;
		$dongu=$adet-1;
		
	$query = $this->db->query("delete from acente_gecmis Where kullanici_id=".$kul_id);		
		
		
	}
	
		for($i=0; $i<=$dongu; $i++){
		
		if($i<=9){}
		else{
		
		$this->db->query("delete from acente_gecmis Where kullanici_id=".$kul_id);			
			
		}
		
	}
	
*/

	$this->db->query("delete from acente_gecmis Where kullanici_id=".$kul_id." and tur_id=".$t_id);
    $n=0;
	$query = $this->db->query("select * from acente_gecmis Where kullanici_id=".$kul_id." Order by id desc");	
	foreach ($query->result_array() as $row)
										{
										
										if($n<=9){}
										else{
	$this->db->query("delete from acente_gecmis Where id=".$row['id']);										
											
										}
										
										$n=$n+1;
										}	
	
	
	
	
		$insert=array(
	'kullanici_id'=>$kul_id,
	'tur_id'=>$t_id	
	);

	$into=$this->db->insert('acente_gecmis',$insert);
	if($into){return TRUE;}else{return FALSE;}	

		 
	 }
	 
	 
	  	 function yorum_kayit($baslik,$yorum,$kul_id,$tur_id,$tur_kod,$servis,$organ,$para,$guven,$seo_adi)
		 {
/*		 
	$into=$this->db->where('tur_id',$id);
	$into=$this->db->where('kullanici_id',$kul_id);
	$into=$this->db->delete('acente_istek',$insert);
		$query = $this->db->query("delete from acente_gecmis Where kullanici_id=".$kul_id);	
	*/

	$query = $this->db->query("select * from acente_yorumlar Where kullanici_id=".$kul_id." and tur_kod=".$tur_kod);	
	$say=$query->num_rows();
	
		$insert=array(
	'tur_id'=>$tur_id,
	'tur_kod'=>$tur_kod,
	'kullanici_id'=>$kul_id,
	'baslik'=>$baslik,
	'yorum'=>$yorum,
	'tarih'=>date("Y-m-d H:i:s"),
	'durum'=>0
	);

	
	if($say>0){
		  $this->db->where('tur_kod',$tur_kod);			
		  $this->db->where('kullanici_id',$kul_id);			
	$into=$this->db->update('acente_yorumlar',$insert);		
	}else{
		
	$into=$this->db->insert('acente_yorumlar',$insert);	
	}		
	

	if($into){return TRUE;}else{return FALSE;}	

		 
	 }
	 
	 
  	 function puan_kayit($kul_id,$tur_kod,$servis,$organ,$para,$guven)
		 {
/*		 
	$into=$this->db->where('tur_id',$id);
	$into=$this->db->where('kullanici_id',$kul_id);
	$into=$this->db->delete('acente_istek',$insert);
		$query = $this->db->query("delete from acente_gecmis Where kullanici_id=".$kul_id);	
	*/


	$query = $this->db->query("select * from acente_puan_servis Where kullanici_id=".$kul_id." and tur_kod=".$tur_kod);	
	$say=$query->num_rows();
		$insert=array(
	'tur_kod'=>$tur_kod,
	'kullanici_id'=>$kul_id,
	'puan'=>$servis
	);
    
	if($say>0){
		  $this->db->where('tur_kod',$tur_kod);			
		  $this->db->where('kullanici_id',$kul_id);			
	$into=$this->db->update('acente_puan_servis',$insert);		
	}else{
		
	$into=$this->db->insert('acente_puan_servis',$insert);		
	}	

	//if($into){return TRUE;}else{return FALSE;}	
	
	$query = $this->db->query("select * from acente_puan_org Where kullanici_id=".$kul_id." and tur_kod=".$tur_kod);	
	$say=$query->num_rows();	
	$insert=array(
	'tur_kod'=>$tur_kod,
	'kullanici_id'=>$kul_id,
	'puan'=>$organ
	);

	if($say>0){
		  $this->db->where('tur_kod',$tur_kod);			
		  $this->db->where('kullanici_id',$kul_id);			
	$into=$this->db->update('acente_puan_org',$insert);		
	}else{
		
	$into=$this->db->insert('acente_puan_org',$insert);		
	}	
	//if($into){return TRUE;}else{return FALSE;}		

	$query = $this->db->query("select * from acente_puan_para Where kullanici_id=".$kul_id." and tur_kod=".$tur_kod);	
	$say=$query->num_rows();		
	$insert=array(
	'tur_kod'=>$tur_kod,
	'kullanici_id'=>$kul_id,
	'puan'=>$para
	);

	if($say>0){
		  $this->db->where('tur_kod',$tur_kod);			
		  $this->db->where('kullanici_id',$kul_id);			
	$into=$this->db->update('acente_puan_para',$insert);		
	}else{
		
	$into=$this->db->insert('acente_puan_para',$insert);		
	}	

	//if($into){return TRUE;}else{return FALSE;}		
	
	$query = $this->db->query("select * from acente_puan_guv Where kullanici_id=".$kul_id." and tur_kod=".$tur_kod);	
	$say=$query->num_rows();			
	$insert=array(
	'tur_kod'=>$tur_kod,
	'kullanici_id'=>$kul_id,
	'puan'=>$guven
	);

		if($say>0){
		  $this->db->where('tur_kod',$tur_kod);			
		  $this->db->where('kullanici_id',$kul_id);			
	$into=$this->db->update('acente_puan_guv',$insert);		
	}else{
		
	$into=$this->db->insert('acente_puan_guv',$insert);		
	}	

	//if($into){return TRUE;}else{return FALSE;}		
	
	return TRUE;

		 
	 }	 
	 
	 
	 
	 
	  	 function yorum_kullanici($kul_id)
     {
	
$query =$this->db->query("select * from acente_uyeler Where id=$kul_id and status=1");
        if( $query->num_rows() > 0 )
        {
           foreach ($query->result_array() as $row)
										{
											return $row['name'];
		  
										}
        }
        else
        {
            return FALSE;
        }
	
	 } 
	 
	 
  	 function yorum_tur($tur_id)
     {
	
$query =$this->db->query("select * from acente_tur Where id=$tur_id and durum=1  and tur_donemi!='otel'");
        if( $query->num_rows() > 0 )
        {
           foreach ($query->result_array() as $row)
										{
											return $row['adi'];
		  
										}
        }
        else
        {
            return FALSE;
        }
	
	 } 
	 
	
	
	
		 	 	 function tur_kontrol($tur_id)
     {
	
		$query =$this->db->query("select * from acente_tur Where id=".$tur_id."  and tur_donemi!='otel'");
        if( $query->num_rows() > 0 )
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
	
	 } 
	
	
	

	
	
	
			 	 	 function tur_detay_kontrol($fiyat_aralik__yet_ID,$fiyat_aralik__cck_ID,$fiyat_aralik__bbk_ID,$yetiskin_tek_fiyat,$cocuk_tek_fiyat,$bebek_tek_fiyat,$yetiskin_adet,$cocuk_adet,$bebek_adet,$yetis_top_fiyat,$cocuk_top_fiyat,$bebek_top_fiyat)
     {
		
		 $yf=$yetiskin_tek_fiyat*$yetiskin_adet;
		 $cf=$cocuk_tek_fiyat*$cocuk_adet;		 
		 $bf=$bebek_tek_fiyat*$bebek_adet;		 
		 
		 if(($yetis_top_fiyat!=$yf)or($bebek_top_fiyat!=$bf)or($cocuk_top_fiyat!=$cf)){
			 
			 return FALSE;
		 }
		
	
	$query =$this->db->query("select * from acente_kisi_fiyat Where id=".$fiyat_aralik__yet_ID);
	if( $query->num_rows() > 0 )
        {
            	    foreach ($query->result_array() as $row)
										{
											$yetiskin_tek=$row['yetiskin_fiyat'];
		                                
										}
        }
 
  	$query =$this->db->query("select * from acente_kisi_fiyat Where id=".$fiyat_aralik__cck_ID);
	if( $query->num_rows() > 0 )
        {
            	    foreach ($query->result_array() as $row)
										{
											$cocuk_tek=$row['cocuk_fiyat'];
		                                
										}
        }
  

  
    	$query =$this->db->query("select * from acente_kisi_fiyat Where id=".$fiyat_aralik__bbk_ID);
	if( $query->num_rows() > 0 )
        {
            	    foreach ($query->result_array() as $row)
										{
											$bebek_tek=$row['bebek_fiyat'];
		                                
										}
        }
		
		  if($bebek_tek==""){$bebek_tek=0;}
		   if($cocuk_tek==""){$cocuk_tek=0;}
		    if($yetiskin_tek==""){$yetiskin_tek=0;}

		  
			 if(($bebek_tek!=$bebek_tek_fiyat)or($cocuk_tek!=$cocuk_tek_fiyat)or($yetiskin_tek!=$yetiskin_tek_fiyat)){
			 
			 return FALSE;
		 }	
		
		
  return TRUE;
  
  
  
	
	 } 
	
	
	
	
		function tur_detay_kontrol_2($fiyat_aralik__yet_ID,$fiyat_aralik__cck_ID,$fiyat_aralik__bbk_ID,$yetis_top_fiyat,$cocuk_top_fiyat,$bebek_top_fiyat)
     {
		
	
	$query =$this->db->query("select * from acente_kisi_fiyat Where id=".$fiyat_aralik__yet_ID);
	if( $query->num_rows() > 0 )
        {
            	    foreach ($query->result_array() as $row)
										{
											$yetiskin_tek=$row['yetiskin_fiyat'];
		                                
										}
        }
 
  	$query =$this->db->query("select * from acente_kisi_fiyat Where id=".$fiyat_aralik__cck_ID);
	if( $query->num_rows() > 0 )
        {
            	    foreach ($query->result_array() as $row)
										{
											$cocuk_tek=$row['cocuk_fiyat'];
		                                
										}
        }
  

  
    	$query =$this->db->query("select * from acente_kisi_fiyat Where id=".$fiyat_aralik__bbk_ID);
	if( $query->num_rows() > 0 )
        {
            	    foreach ($query->result_array() as $row)
										{
											$bebek_tek=$row['bebek_fiyat'];
		                                
										}
        }
		
		  if($bebek_tek==""){$bebek_tek=0;}
		   if($cocuk_tek==""){$cocuk_tek=0;}
		    if($yetiskin_tek==""){$yetiskin_tek=0;}

		  
			 if(($bebek_tek!=$bebek_top_fiyat)or($cocuk_tek!=$cocuk_top_fiyat)or($yetiskin_tek!=$yetis_top_fiyat)){
			 
			 return FALSE;
		 }	
		
		
  return TRUE;
  
  
  
	
	 } 
	
	
	
	
	
			 	 	 function tur_turu_kontrol($tur_kod,$tur_id,$tur_turu)
     {
	
		$query =$this->db->query("select * from acente_tur Where id=".$tur_id." and tur_donemi='$tur_turu'");
        if( $query->num_rows() > 0 )
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
	
	 } 
	 
	
			 	 	 function tur_odeme_kontrol($tur_id)
     {
	
		$query =$this->db->query("select * from acente_tur Where id=".$tur_id."");
        if( $query->num_rows() > 0 )
        {
           
		    foreach ($query->result_array() as $row)
										{
											return $row['odeme_turu'];
		                                
										}

		   
        }
        else
        {
            return FALSE;
        }
	
	 }  
	 
	 
	 	 	 	 function belirli_tarih_kontrol($tur_detay_id,$bas_t,$bit_t)
     {
		
	
		$query =$this->db->query("select * from acente_tur_detay Where id=".$tur_detay_id." and baslangic_tarihi='$bas_t' and bitis_tarihi='$bit_t'");

		
		if( $query->num_rows() > 0 )
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
	
	 } 
	 
	 
	 	 	 	 function surekli_tarih_kontrol($tur_detay_id,$bas_s,$bit_s)
     {

	$query =$this->db->query("select * from acente_tur_detay Where id=".$tur_detay_id." and baslangic_saati='$bas_s' and bitis_saati='$bit_s'");
        if( $query->num_rows() > 0 )
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
	
	 } 
	 
	 
	 
	 	  	 function sepet_ekle($kul_id,$tur_id,$tur_kod,$tur_detay_id,$yetiskin_adet,$cocuk_adet,$bebek_adet,$genel_total,$bas_t,$bit_t,$bas_s,$bit_s,$indirimsiz)
		 {
			
	
	    $query =$this->db->query("select * from acente_sepet Where kullanici_id='".$kul_id."' and tur_id=".$tur_id);
        if( $query->num_rows() > 0 )
        {
			
			
	       foreach ($query->result_array() as $row)
										{
											 $sepet_id=$row['id'];
		  
										}		
			
   
						$query2 =$this->db->query("delete from acente_sepet Where kullanici_id='".$kul_id."' and tur_id=".$tur_id);
						$query3 =$this->db->query("delete from acente_sepet_detay Where sepet_id=".$sepet_id);
		   
        }
     

	
		$insert=array(
	'tur_id'=>$tur_id,
	'tur_kod'=>$tur_kod,
	'kullanici_id'=>$kul_id,
	'tur_detay_id'=>$tur_detay_id,
	'yetiskin'=>$yetiskin_adet,
	'cocuk'=>$cocuk_adet,
	'bebek'=>$bebek_adet,	
	'tutar'=>$genel_total,
	'para_birimi'=>"EURO",	
	'bas_tar'=>$bas_t,	
	'bit_tar'=>$bit_t,		
	'baslangic_saati'=>$bas_s,	
	'bitis_saati'=>$bit_s,
	'indirimsiz'=>$indirimsiz,	
	);



		
	$into=$this->db->insert('acente_sepet',$insert);	


	if($into){
		
		$sepet=$this->db->insert_id();
	$adet=$yetiskin_adet+$cocuk_adet+$bebek_adet;
		$dongu=$adet-1;
		
		for($i=0; $i<=$dongu; $i++){
			
		$insert2=array(
		'sepet_id'=>$sepet	
		);
		$this->db->insert('acente_sepet_detay',$insert2);				
			
		}
		


		
	
		
		
		
		
		return TRUE;
		
	
	
	}else{return FALSE;}	

		 
	 }
	 
	 
	
	
	
	
	
	
	 	  	 function rez_ekle($kul_id,$tur_id,$tur_kod,$tur_detay_id,$bebek_adet,$yetiskin_adet,$cocuk_adet,$genel_total,$bas_t,$bit_t,$bas_s,$bit_s,$indirimsiz)
		 {
			
			 
	    $query =$this->db->query("select * from acente_on_rez Where kullanici_id='".$kul_id."' and tur_id=".$tur_id);
        if( $query->num_rows() > 0 )
        {
			
			
	       foreach ($query->result_array() as $row)
										{
											 $sepet_id=$row['id'];
		  
										}		
			
   
						$query2 =$this->db->query("delete from acente_on_rez Where kullanici_id='".$kul_id."' and tur_id=".$tur_id);
						$query3 =$this->db->query("delete from acente_on_rez_detay Where sepet_id=".$sepet_id);
		   
        }
     

	
		$insert=array(
	'tur_id'=>$tur_id,
	'tur_kod'=>$tur_kod,
	'kullanici_id'=>$kul_id,
	'tur_detay_id'=>$tur_detay_id,
	'yetiskin'=>$yetiskin_adet,
	'cocuk'=>$cocuk_adet,
	'bebek'=>$bebek_adet,	
	'tutar'=>$genel_total,
	'para_birimi'=>"EURO",	
	'bas_tar'=>$bas_t,	
	'bit_tar'=>$bit_t,		
	'baslangic_saati'=>$bas_s,	
	'bitis_saati'=>$bit_s,
	'indirimsiz'=>$indirimsiz	
	);


		
	$into=$this->db->insert('acente_on_rez',$insert);	


	if($into){
		
		$sepet=$this->db->insert_id();
	$adet=$yetiskin_adet+$cocuk_adet+$bebek_adet;
		$dongu=$adet-1;
		
		for($i=0; $i<=$dongu; $i++){
			
		$insert2=array(
		'sepet_id'=>$sepet	
		);
		$this->db->insert('acente_on_rez_detay',$insert2);				
			
		}
		


		
	
		
		
		
		
		return TRUE;
		
	
	
	}else{return FALSE;}	

		 
	 }
	 
	
	
	
	
		 	 	 	 function kisi_fiyat($tur_kod,$id)
     {
		 

	$query =$this->db->query("select * from acente_kisi_fiyat Where tur_detay_id=".$id." and tur_kod = ".$tur_kod."");
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