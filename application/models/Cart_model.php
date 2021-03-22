<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart_model extends CI_Model
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
	 
	 	 	 function kat_getir($tur_id)
     {
	
$query =$this->db->query("select * from acente_tur Where id=".$tur_id."");
        if( $query->num_rows() > 0 )
        {
                  foreach ($query->result_array() as $row)
										{
											$kat_id=$row['kat_id'];
		  
										}
										
		$query =$this->db->query("select * from acente_category Where id=".$kat_id."");										
										
		 if( $query->num_rows() > 0 )
        {
                  foreach ($query->result_array() as $row)
										{
											return $kat_adi=$row['adi'];
		  
										}								
		 }								
										
										
        }
        else
        {
            return FALSE;
        }
	
	 } 
	 
	 
	  	 function kat_id_getir($tur_id)
     {
	
$query =$this->db->query("select * from acente_tur Where id=".$tur_id."");
        if( $query->num_rows() > 0 )
        {
                  foreach ($query->result_array() as $row)
										{
			return $row['kat_id'];
		  
		}			
										
        }
        else
        {
            return FALSE;
        }
	
	 } 


	  	 	 function onerilen_turlar()
     {
	
$query =$this->db->query("select * from acente_tur Where durum=1  and tur_donemi!='otel'  order by sorting asc limit 0,8");
        if( $query->num_rows() > 0 )
        {
            return $query->result_array();
        }
        else
        {
            return FALSE;
        }
	
	 } 
	 
	 
	 	 	 function tur_adi_getir($tur_id)
     {
	
$query =$this->db->query("select * from acente_tur Where id=".$tur_id."");
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
	 
	 
	 	 	 function rs_getir($tur_id)
     {
	
$query =$this->db->query("select * from acente_tur Where id=".$tur_id."");
        if( $query->num_rows() > 0 )
        {
                  foreach ($query->result_array() as $row)
										{
											return $row['resim'];
		  
										}
										
								
		 }								
										
										
     
        else
        {
            return FALSE;
        }
	
	 } 
	 
	 	 	 	 function duration_getir($tur_id)
     {
	
$query =$this->db->query("select * from acente_tur Where id=".$tur_id."");
        if( $query->num_rows() > 0 )
        {
                  foreach ($query->result_array() as $row)
										{
											return $row['sure'];
		  
										}
										
								
		 }								
										
										
     
        else
        {
            return FALSE;
        }
	
	 } 
	 
	 
	  	 function meeting_getir($tur_id)
     {
	
$query =$this->db->query("select * from acente_tur Where id=".$tur_id."");
        if( $query->num_rows() > 0 )
        {
                  foreach ($query->result_array() as $row)
										{
											return $row['bulusma_noktasi'];
		  
										}
										
								
		 }								
										
										
     
        else
        {
            return FALSE;
        }
	
	 } 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 	 
	 	 	 function cart_getir($kul_id)
     {
	
$query =$this->db->query("select * from acente_sepet Where kullanici_id='".$kul_id."'");
        if( $query->num_rows() > 0 )
        {
            return $query->result_array();
        }
        else
        {
            return FALSE;
        }
	
	 } 
	 
	 

	 
	 
	 	 	 	 
	 	 	 function rez_getir($id)
     {
	
		$query =$this->db->query("select * from acente_rezervasyon Where id='".$id."'");
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
	 	 
	 	 	 	 function ziyaretci_bilgi($sepet_id)
     {
	
		$query =$this->db->query("select * from acente_sepet_detay Where sepet_id=".$sepet_id);
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



    function ep_getir($r_id)
    {
		
	 $query =$this->db->query("select * from acente_rezervasyon Where id=".$r_id);
        if( $query->num_rows() > 0 )
        {
            foreach ($query->result_array() as $row)
            {
                $k_id=$row['kullanici_id'];

            }

        }	
		
		
		

        $query =$this->db->query("select * from acente_uyeler Where id=".$k_id);
        if( $query->num_rows() > 0 )
        {
            foreach ($query->result_array() as $row)
            {
                return $row['email'];

            }

        }
        else
        {
            return FALSE;
        }

    }



    function ep_getir2($kul_id)
    {
		

		
		

        $query =$this->db->query("select * from acente_uyeler Where id=".$kul_id);
        if( $query->num_rows() > 0 )
        {
            foreach ($query->result_array() as $row)
            {
                return $row['email'];

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
	
	
	
	 function cart_remove($kul_id,$id,$tur_id){

	
	$query = $this->db->query("delete from acente_sepet Where id=".$id."  and kullanici_id='".$kul_id."'  and tur_id=".$tur_id);				
	if($query){
		
		
	//	return TRUE;
	$query2 = $this->db->query("delete from acente_sepet_detay Where sepet_id=".$id);			
	return TRUE;
		
		}else{return FALSE;} 
		 
	 }
	 

	 

	
		 	 function rezerve($kul_id,$content,$number,$expiry,$cvc,$name,$rez_no,$kuponDurumu,$kuponsuzFiyat,$kuponluFiyat,$kuponKodu,$oran)
     {
		 
				$rezerve=$this->cart_getir($kul_id);
				
				$n=0;if( $rezerve ) :  foreach( $rezerve as $dizi ) : 
				$cart_detay_getir[$n]=$this->Cart_model->cart_detay_getir($dizi["id"]);	
				$sil_detay = $this->db->query("delete from acente_sepet_detay Where sepet_id=".$dizi["id"]);				 
				$n=$n+1; endforeach;  endif; 
				
				$sil_sepet = $this->db->query("delete from acente_sepet Where kullanici_id='".$kul_id."'");		 




		
				$n=0;if( $rezerve ) :  foreach( $rezerve as $dizi ) : 


if($kuponDurumu==0){
	$fiyat=$dizi["tutar"];
	$kod="";
	$esk_fiyat="";

}

if($kuponDurumu==1){
	$hesap=$dizi["tutar"]/100;
	$indirim_miktar=$hesap*$oran;
	$fiyat=$dizi["tutar"]-$indirim_miktar;
	$kod=$kuponKodu;
	$esk_fiyat=$dizi["tutar"];

}




	$insert=array(
	
	'tur_id'=>$dizi["tur_id"], 
	'tur_kod'=>$dizi["tur_kod"],
	'kullanici_id'=>$dizi["kullanici_id"],
	'tur_detay_id'=>$dizi["tur_detay_id"],
	'yetiskin'=>$dizi["yetiskin"],
	'cocuk'=>$dizi["cocuk"],
	'bebek'=>$dizi["bebek"],	
	'tutar'=>$fiyat,
	'kupon_kodu'=>$kod,
	'onceki_fiyat'=>$esk_fiyat,	
	'para_birimi'=>$dizi["para_birimi"],	
	'bas_tar'=>$dizi["bas_tar"],	
	'bit_tar'=>$dizi["bit_tar"],		
	'baslangic_saati'=>$dizi["baslangic_saati"],	
	'bitis_saati'=>$dizi["bitis_saati"],
	'indirimsiz'=>$dizi["indirimsiz"],	
	'durum'=>0,
	'rez_no'=>$rez_no,	
	'aciklama'=>$content,	
	'kart'=>$number,	
	'skt'=>$expiry,
	'cvv'=>$cvc,
	'adsoyad'=>$name
	
	
	);
	$into=$this->db->insert('acente_rezervasyon',$insert);	

		$son_id = $this->db->insert_id();



		
					$m=0;if( $cart_detay_getir[$n] ) :  foreach( $cart_detay_getir[$n] as $dizi2 ) : 
				
		
	$insert2=array(
	
	'rez_id'=>$son_id, 
	'eriskin'=>$dizi2["eriskin"],
	'adi'=>$dizi2["adi"],
	'soyadi'=>$dizi2["soyadi"],
	'email'=>$dizi2["email"],
	'tel'=>$dizi2["tel"],
	'sehir'=>$dizi2["sehir"],
	'otel_adi'=>$dizi2["otel_adi"]
	);
	$into2=$this->db->insert('acente_rezervasyon_detay',$insert2);	
	
		
						$m=$m+1; endforeach;  endif; 

		
		
		
			$insert=array(
	'kullanici_id'=>$dizi["kullanici_id"],
	'kart_no'=>$number,
	'adi_soyadi'=>$name,
	'tarih'=>$expiry,
	'kod'=>$cvc,
	'durum'=>1	
	);
	$into=$this->db->insert('acente_kart',$insert);	
		
		
		
		
		

				
				$n=$n+1; endforeach;  endif; 
		
		
		
		return TRUE;
	
	 }





	     function kart_durum_kontrol($array)
    {

        $sql = "SELECT * FROM acente_kart Where kullanici_id=".$array["user_id"]." and durum = 1";
        $query = $this->db->query($sql);

        if( $query->num_rows() > 0 )
        {
            	return 0; 

        }
        else
        {
            return 1;
        }




    }
	


	
		 	 function kart_kayit($array)
     {
	
				$insert=array(
	'kullanici_id'=>$array["user_id"],
	'kart_no'=>$array["cardNumber"],
	'adi_soyadi'=>$array["cardName"],
	'tarih'=>$array["cardExpDate"],
	'kod'=>$array["cardCvc"],
	'durum'=>1	
	);
	$into=$this->db->insert('acente_kart',$insert);	

	if($into){return 1;}
	return 0;
	
	 }



	     function kullanici_adi_getir($id)
    {

        $sql = "SELECT * FROM acente_uyeler Where id=".$id;
        $query = $this->db->query($sql);

        if( $query->num_rows() > 0 )
        {
            		foreach ($query->result_array() as $row)
					{	
        			return $row['username'];
					}	 

        }
        else
        {
            return FALSE;
        }




    }
	
		 	 function cart_detay_getir($id)
     {
	
		$query = $this->db->query("select * from acente_sepet_detay Where sepet_id=".$id);
        if( $query->num_rows() > 0 )
        {
            return $query->result_array();
        }
        else
        {
            return FALSE;
        }
	
	 }
	
	
	
		 function kod_artir($kuponKodu)
     {
		 

$query =$this->db->query("select * from acente_kampanya Where kod='".$kuponKodu."'");
        if( $query->num_rows() > 0 )
        {
            
			
		 foreach ($query->result_array() as $row)
										{
											$kullanim=$row['kullanim'];
		  
										}	
			
			
        }

$kullanim=$kullanim+1;




	$insert=array(	
	'kullanim'=>$kullanim, 
	);


		  $this->db->where('kod',$kuponKodu);		
	$into=$this->db->update('acente_kampanya',$insert);	

	if($into){return TRUE;}
		
		return FALSE;
		
	
	 }
	
	
	
	
	
		 function info($ad,$mail,$tel,$shr,$slc,$id,$sepet_id,$otel_adi)
     {
		 


	$insert=array(
	
	'eriskin'=>$slc, 
	'adi'=>$ad,
	'email'=>$mail,
	'tel'=>$tel,
	'sehir'=>$shr,
	'otel_adi'=>$otel_adi

	);

	$into=$this->db->where('sepet_id',$sepet_id);	
	$into=$this->db->where('id',$id);		
	$into=$this->db->update('acente_sepet_detay',$insert);	

	if($into){return TRUE;}
		
		return FALSE;
		
	
	 }
	
	
	
	
	
	
	
	
	
		 	 function odeme_turu($tur_id)
     {
	
$query =$this->db->query("select * from acente_tur Where id=".$tur_id);
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
	
	
	
	
		 	 	 function rez_no_kontrol($rez_no)
     {
	
        $query =$this->db->query("select * from acente_rezervasyon Where rez_no='$rez_no'");
        if( $query->num_rows() == 0 )
        {
                return 1;
										
								
		 }								
 
        else
        {
            return 0;
        }
	
	 } 
	
	
	
	 	 	 function kod_sorgu($code)
     {
	

$bugun=date("Y-m-d");

$query =$this->db->query("select * from acente_kampanya Where kod='".$code."' and durum=1");
        if( $query->num_rows() > 0 )
        {	
// and bas_tar>=".$bugun." and bit_tar<=".$bugun.""
        /*	foreach ($query->result_array() as $row)
										{
											$kullanim=$row['kullanim'];
											$kullanim_siniri=$row['kullanim_siniri'];		  
										}	

         if( $kullanim_siniri > $kullanim )
         	{  return $query->result_array();  }
         else{
         	 return FALSE;
         }
*/

return $query->result_array();

            
        }
        else
        {
            return FALSE;
        }
	
	 } 
 
	
	
}