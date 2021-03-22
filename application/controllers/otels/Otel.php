<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Otel extends CI_Controller {

	 function __construct()
     {
         parent::__construct();

		$this->load->library('Sec');
		echo $this->sec->process();	
    
	
		$this->load->library('Funcs');
		echo $this->funcs->index($this->session->userdata('currency'),$this->session->userdata('lng_turu'));	    

	
     }


	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 
	 	 	public function index()
	{ 
	 		$this->load->library('messages');
            $this->messages->config('');
	}
	 
	public function detail($tur=null)
	{

			error_reporting(0);
		$useronline=$this->session->userdata('useronline');
		$kul_id=$this->session->userdata('kul_id');	



	
				if($tur==""){
			
			$this->load->library('messages');
            $this->messages->config('');
			
		}
		
	
		
		$tur=trim($tur); $tur=htmlentities($tur); $tur=strip_tags($tur); 	
		$this->load->model('otel/Tour_model');
		$varmi=$this->Tour_model->varmi_tur($tur);			
		
	
		if($varmi==false){
		      $this->load->library('messages');
            $this->messages->config('');		
			
		}

	if($this->session->userdata('lng_turu')=="Eng"){ $uz=""; $data["uz"]="";} 
	if($this->session->userdata('lng_turu')=="Tr"){ $uz="_tr"; $data["uz"]="_tr"; } 	
	if($this->session->userdata('lng_turu')=="Ru"){  $uz="_ru"; $data["uz"]="_ru"; } 

		$data["ayar"]=$this->Tour_model->ayar();		
		$data["tur_bilgi"]=$this->Tour_model->tur_bilgi($tur);		

			if( $data["tur_bilgi"] ) :  foreach( $data["tur_bilgi"] as $dizi ) : 
			    $t_id= $dizi["id"]; 
				$t_kod= $dizi["kod"]; 
				$kat_id= $dizi["kat_id"]; 				
				 endforeach;  endif; 
        $data["tur_foto"]=$this->Tour_model->tur_foto($t_id);	
		$data["tur_yorum"]=$this->Tour_model->tur_yorum($t_id);	
		$data["tur_engel_tarih"]=$this->Tour_model->tur_engel_tarih($t_id);
		
	
		
		
		
		
		$data["tur_puan_guven"]=$this->Tour_model->tur_puan_guven($t_kod);
		$data["tur_puan_org"]=$this->Tour_model->tur_puan_org($t_kod);
		$data["tur_puan_para"]=$this->Tour_model->tur_puan_para($t_kod);
		$data["tur_puan_servis"]=$this->Tour_model->tur_puan_servis($t_kod);	
		$data["tur_puan_genel"]=$data["tur_puan_guven"]+$data["tur_puan_org"]+$data["tur_puan_para"]+$data["tur_puan_servis"];
		$data["tur_puan_genel"]=$data["tur_puan_genel"]/4;		
	  
		$data["tur_detay"]=$this->Tour_model->tur_detay($t_kod);
		
		if($useronline!=""){
		$data["tur_gecmis_kayit"]=$this->Tour_model->tur_gecmis_kayit($t_id,$kul_id);		
		$data["istek_varmi"]=$this->Tour_model->istek_varmi($t_id,$kul_id);	
			
		}		

	

		
			$yf=0;
			$n=0;
			if( $data["tur_detay"] ) :  foreach( $data["tur_detay"] as $dizi ) : 
			

			$data["kisi_fiyat"][$n] = $this->Tour_model->kisi_fiyat($dizi["tur_kod"],$dizi["id"]);             
			
			
			
				if($n==0){$yf = $dizi["yetiskin_fiyat"]; }
				if($dizi["yetiskin_fiyat"]<=$yf){$yf=$dizi["yetiskin_fiyat"];}
				
			$n=$n+1;
				 endforeach;  endif;
				 
			 
	
				 
				 
			
		$data["yf"] =  $yf;

		$data["alt_kat_diger_turlar"]=$this->Tour_model->alt_kat_diger_turlar($kat_id);	//Turun bağlı olduğu kategorinin diğer turları
		$data["alt_kat_adi"]=$this->Tour_model->alt_kat_adi($kat_id,$this->session->userdata('lng_turu'),$uz);	//Turun bağlı olduğu kategorinin diğer turları		
		$data["ust_kat_adi"]=$this->Tour_model->ust_kat_adi($kat_id,$this->session->userdata('lng_turu'),$uz);
		$data["ust_kat_seo_adi"]=$this->Tour_model->ust_kat_seo_adi($kat_id);		
	    $data["alt_kat_seo_adi"]=$this->Tour_model->alt_kat_seo_adi($kat_id);
		
		
        if($data["tur_yorum"]==""){$data["yorum_adet"]=0;}		
	    else { $data["yorum_adet"]=count($data["tur_yorum"]); }
		
		$n=0;	if( $data["alt_kat_diger_turlar"] ) :  foreach( $data["alt_kat_diger_turlar"] as $dizi ) : 
		$data["alt_kat_diger_turlar_fiyat"][$n]=$this->Tour_model->alt_kat_diger_turlar_fiyat($dizi["kod"]);  
		$data["alt_kat_diger_turlar_yorum_adet"][$n]=$this->Tour_model->alt_kat_diger_turlar_yorum_adet($dizi["kod"]);  
		
		$t_kod=$dizi["kod"]; 
		$data["puan"][$t_kod]["tur_puan_guven"]=$this->Tour_model->tur_puan_guven($t_kod);
		$data["puan"][$t_kod]["tur_puan_org"]=$this->Tour_model->tur_puan_org($t_kod);
		$data["puan"][$t_kod]["tur_puan_para"]=$this->Tour_model->tur_puan_para($t_kod);
		$data["puan"][$t_kod]["tur_puan_servis"]=$this->Tour_model->tur_puan_servis($t_kod);	
		$data["puan"][$t_kod]["tur_puan_genel"]=$data["puan"][$t_kod]["tur_puan_guven"]+$data["puan"][$t_kod]["tur_puan_org"]+$data["puan"][$t_kod]["tur_puan_para"]+$data["puan"][$t_kod]["tur_puan_servis"];
        $data["puan"][$t_kod]["tur_puan_genel"]=round($data["puan"][$t_kod]["tur_puan_genel"]/4);		
			
		
	
		
		$n=$n+1;	endforeach;  endif;	
		//print_r($data["puan"]);
		//return FALSE;
		
		$n=0;	if( $data["tur_yorum"] ) :  foreach( $data["tur_yorum"] as $dizi ) :

		$data["yorum_kullanici"][$n]=$this->Tour_model->yorum_kullanici($dizi["kullanici_id"]);  
		$data["yorum_tur"][$n]=$this->Tour_model->yorum_tur($dizi["tur_id"]);
 		$data["yorum_puan_ortalama"][$n]=$this->Tour_model->yorum_puan_ortalama($dizi["tur_id"],$dizi["kullanici_id"]); 		
		$n=$n+1;	endforeach;  endif;	


	
	
		$data["populer_kategori"]=$this->Tour_model->populer_kategori();	
		$data["populer_ana_kategori"]=$this->Tour_model->populer_ana_kategori();	
		$data["populer_tur"]=$this->Tour_model->populer_tur();	
	
		$this->load->view('otel/tur',$data);
		

	
		
	}
	
	

		public function tocartadd()
	{
		

	error_reporting(0);
		$useronline=$this->session->userdata('useronline');
		$kul_id=$this->session->userdata('kul_id');	
		if($useronline==""){
				//	  $this->load->library('Messages');
			     //   echo $this->messages->config('giris/kayit');	
				//	  return FALSE;
			
				$this->load->library('Funcs');
				$kul_id = $this->funcs->GetIP();	
			
			
		}
		
		
			if($this->session->userdata('lng_turu')=="Eng"){ $uz=""; $data["uz"]="";} 
	if($this->session->userdata('lng_turu')=="Tr"){ $uz="_tr"; $data["uz"]="_tr"; } 	
	if($this->session->userdata('lng_turu')=="Ru"){  $uz="_ru"; $data["uz"]="_ru"; } 	
		
		
		$this->load->model('otel/Tour_model');


	        $yetiskin_adet=$this->input->post('yetiskin_adet',TRUE);				
			$cocuk_adet=$this->input->post('cocuk_adet',TRUE);	
			$yetiskin_tek_fiyat=$this->input->post('yetiskin_tek_fiyat',TRUE);		
			$cocuk_tek_fiyat=$this->input->post('cocuk_tek_fiyat',TRUE);
			$yetis_top_fiyat=$this->input->post('yetis_top_fiyat',TRUE);	
			$cocuk_top_fiyat=$this->input->post('cocuk_top_fiyat',TRUE);				
			$tur_id=$this->input->post('tur_id',TRUE);	
			$tur_kod=$this->input->post('tur_kod',TRUE);	
			$tur_detay_id=$this->input->post('tur_detay_id',TRUE);	
			$para=$this->input->post('para',TRUE);				
			$tur_turu=$this->input->post('tur_turu',TRUE);	
			$bas_t=$this->input->post('bas_t',TRUE);	
			$bit_t=$this->input->post('bit_t',TRUE);				
			$bas_s=$this->input->post('bas_s',TRUE);	
			$bit_s=$this->input->post('bit_s',TRUE);			
			$seo_adi=$this->input->post('seo_adi',TRUE);			
			$indirimsiz=$this->input->post('indirimsiz',TRUE);	

			$tarih_fark=$this->input->post('tarih_fark',TRUE);					


			
		
				 $yetiskin_adet=trim($yetiskin_adet); 		 $yetiskin_adet=htmlentities($yetiskin_adet);      	$yetiskin_adet=strip_tags($yetiskin_adet); 
				 $cocuk_adet=trim($cocuk_adet); 		 $cocuk_adet=htmlentities($cocuk_adet);     			$cocuk_adet=strip_tags($cocuk_adet);
				 $yetiskin_tek_fiyat=trim($yetiskin_tek_fiyat); 		 $yetiskin_tek_fiyat=htmlentities($yetiskin_tek_fiyat);     	$yetiskin_tek_fiyat=strip_tags($yetiskin_tek_fiyat);				 
				 $cocuk_tek_fiyat=trim($cocuk_tek_fiyat); 		 $cocuk_tek_fiyat=htmlentities($cocuk_tek_fiyat);      	$cocuk_tek_fiyat=strip_tags($cocuk_tek_fiyat);
				 $yetis_top_fiyat=trim($yetis_top_fiyat); 		 $yetis_top_fiyat=htmlentities($yetis_top_fiyat);      	$yetis_top_fiyat=strip_tags($yetis_top_fiyat); 
				 $cocuk_top_fiyat=trim($cocuk_top_fiyat); 		 $cocuk_top_fiyat=htmlentities($cocuk_top_fiyat);     	$cocuk_top_fiyat=strip_tags($cocuk_top_fiyat);
				 $tur_id=trim($tur_id); 		 $tur_id=htmlentities($tur_id);      			$tur_id=strip_tags($tur_id);
				 $tur_kod=trim($tur_kod); 		 $tur_kod=htmlentities($tur_kod);      			$tur_kod=strip_tags($tur_kod); 
				 $tur_detay_id=trim($tur_detay_id); 		 $tur_detay_id=htmlentities($tur_detay_id);     			$tur_detay_id=strip_tags($tur_detay_id);
				 $para=trim($para); 		 $para=htmlentities($para);     	$para=strip_tags($para);	
				 $tur_turu=trim($tur_turu); 		 $tur_turu=htmlentities($tur_turu);     	$tur_turu=strip_tags($tur_turu);
				 $bas_t=trim($bas_t); 		 $bas_t=htmlentities($bas_t);      			$bas_t=strip_tags($bas_t);
				 $bit_t=trim($bit_t); 		 $bit_t=htmlentities($bit_t);      			$bit_t=strip_tags($bit_t); 
				 $bas_s=trim($bas_s); 		 $bas_s=htmlentities($bas_s);     			$bas_s=strip_tags($bas_s);
				 $bit_s=trim($bit_s); 		 $bit_s=htmlentities($bit_s);     	$bit_s=strip_tags($bit_s);	
				 $seo_adi=trim($seo_adi); 		 $seo_adi=htmlentities($seo_adi);     	$seo_adi=strip_tags($seo_adi);	
				 $indirimsiz=trim($indirimsiz); 		 $indirimsiz=htmlentities($indirimsiz);     	$indirimsiz=strip_tags($indirimsiz);	
				 $tarih_fark=trim($tarih_fark); 		 $tarih_fark=htmlentities($tarih_fark);     	$tarih_fark=strip_tags($tarih_fark);


				 
		   $tur_kontrol=$this->Tour_model->tur_kontrol($tur_id);				  
		   $tur_detay_kontrol=$this->Tour_model->tur_detay_kontrol($tur_kod,$tur_detay_id,$yetiskin_tek_fiyat,$cocuk_tek_fiyat);				 
		   $tur_turu_kontrol=$this->Tour_model->tur_turu_kontrol($tur_kod,$tur_id,$tur_turu);					 
		 
			
	       if(($tur_kontrol!=TRUE)or($tur_detay_kontrol!=TRUE)or($tur_turu_kontrol!=TRUE)){
		   
					$this->load->library('Messages');
			        echo $this->messages->False_Add("");	   
		            return FALSE;
	   }	
	   
	 /*
	       if($tur_turu=="belirli"){
		   $tarih_kontrol=$this->Tour_model->belirli_tarih_kontrol($tur_detay_id,$bas_t,$bit_t);   				
	   }	
	       if($tur_turu=="surekli"){
		   $tarih_kontrol=$this->Tour_model->surekli_tarih_kontrol($tur_detay_id,$bas_s,$bit_s);  
		   
           	$bas_t=explode("-",$bas_t);	  
			$bas_t=$bas_t[2]."".$bas_t[1]."".$bas_t[0];		
           	$bit_t=explode("-",$bit_t);	  
			$bit_t=$bit_t[2]."".$bit_t[1]."".$bit_t[0];				
	   }		   
		
   
	      if ($tarih_kontrol!=TRUE){ 

	    	        $this->load->library('Messages');
			        echo $this->messages->False_Add("");	   
		            return FALSE;
	   }
	   */ 
	   
           	$bas_t=explode("/",$bas_t);	  
			$bas_t=$bas_t[2]."-".$bas_t[0]."-".$bas_t[1];		
           	$bit_t=explode("/",$bit_t);	  
			$bit_t=$bit_t[2]."-".$bit_t[0]."-".$bit_t[1];	
			


	   
	   $yets_top_kontrol=$yetiskin_adet*$yetiskin_tek_fiyat*$tarih_fark;
	   $coc_top_kontrol=$cocuk_adet*$cocuk_tek_fiyat*$tarih_fark;	
	   $genel_total=$yetis_top_fiyat+$cocuk_top_fiyat;
	   


	   if ($yets_top_kontrol!=$yetis_top_fiyat){ 

	    	        $this->load->library('Messages');
			        echo $this->messages->False_Add("");	   
		            return FALSE;

	   }

 
	   
	   if ($coc_top_kontrol!=$cocuk_top_fiyat){ 
 
        	        $this->load->library('Messages');
			        echo $this->messages->False_Add("");	   
		            return FALSE;

	   } 	

	
			//	 $indirimsiz=$tarih_fark*$indirimsiz;
			//	 $genel_total=$tarih_fark*$genel_total;		   

	$sepet_ekle=$this->Tour_model->sepet_ekle($kul_id,$tur_id,$tur_kod,$tur_detay_id,$yetiskin_adet,$cocuk_adet,$genel_total,$bas_t,$bit_t,$bas_s,$bit_s,$indirimsiz);	

		if($sepet_ekle!=TRUE){
			$this->load->library('Messages');
		    echo $this->messages->False_Add("otels/otel/detail/".$seo_adi);	   
		 return FALSE;
			
		}  
	  
				$this->load->library('Messages');
		    echo $this->messages->True_Add("otels/otel/detail/".$seo_adi);	   
		 return FALSE;  

	   
	   


		
		
		
	}
	
	
	
	
	
	
	
	
	
		public function topreres()
	{
		

	error_reporting(0);
		$useronline=$this->session->userdata('useronline');
		$kul_id=$this->session->userdata('kul_id');	
		if($useronline==""){
				//	$this->load->library('Messages');
			    //    echo $this->messages->config('giris/kayit');	
				//	return FALSE;
					
				$this->load->library('Funcs');
				$kul_id = $this->funcs->GetIP();
					
			
		}
		
		
			if($this->session->userdata('lng_turu')=="Eng"){ $uz=""; $data["uz"]="";} 
	if($this->session->userdata('lng_turu')=="Tr"){ $uz="_tr"; $data["uz"]="_tr"; } 	
	if($this->session->userdata('lng_turu')=="Ru"){  $uz="_ru"; $data["uz"]="_ru"; } 	
		
		
		$this->load->model('otel/Tour_model');


	        $yetiskin_adet=$this->input->post('yetiskin_adet',TRUE);				
			$cocuk_adet=$this->input->post('cocuk_adet',TRUE);	
			$yetiskin_tek_fiyat=$this->input->post('yetiskin_tek_fiyat',TRUE);		
			$cocuk_tek_fiyat=$this->input->post('cocuk_tek_fiyat',TRUE);
			$yetis_top_fiyat=$this->input->post('yetis_top_fiyat',TRUE);	
			$cocuk_top_fiyat=$this->input->post('cocuk_top_fiyat',TRUE);				
			$tur_id=$this->input->post('tur_id',TRUE);	
			$tur_kod=$this->input->post('tur_kod',TRUE);	
			$tur_detay_id=$this->input->post('tur_detay_id',TRUE);	
			$para=$this->input->post('para',TRUE);				
			$tur_turu=$this->input->post('tur_turu',TRUE);	
			$bas_t=$this->input->post('bas_t',TRUE);	
			$bit_t=$this->input->post('bit_t',TRUE);				
			$bas_s=$this->input->post('bas_s',TRUE);	
			$bit_s=$this->input->post('bit_s',TRUE);			
			$seo_adi=$this->input->post('seo_adi',TRUE);			
			$indirimsiz=$this->input->post('indirimsiz',TRUE);	

			$tarih_fark=$this->input->post('tarih_fark',TRUE);					


			
		
				 $yetiskin_adet=trim($yetiskin_adet); 		 $yetiskin_adet=htmlentities($yetiskin_adet);      	$yetiskin_adet=strip_tags($yetiskin_adet); 
				 $cocuk_adet=trim($cocuk_adet); 		 $cocuk_adet=htmlentities($cocuk_adet);     			$cocuk_adet=strip_tags($cocuk_adet);
				 $yetiskin_tek_fiyat=trim($yetiskin_tek_fiyat); 		 $yetiskin_tek_fiyat=htmlentities($yetiskin_tek_fiyat);     	$yetiskin_tek_fiyat=strip_tags($yetiskin_tek_fiyat);				 
				 $cocuk_tek_fiyat=trim($cocuk_tek_fiyat); 		 $cocuk_tek_fiyat=htmlentities($cocuk_tek_fiyat);      	$cocuk_tek_fiyat=strip_tags($cocuk_tek_fiyat);
				 $yetis_top_fiyat=trim($yetis_top_fiyat); 		 $yetis_top_fiyat=htmlentities($yetis_top_fiyat);      	$yetis_top_fiyat=strip_tags($yetis_top_fiyat); 
				 $cocuk_top_fiyat=trim($cocuk_top_fiyat); 		 $cocuk_top_fiyat=htmlentities($cocuk_top_fiyat);     	$cocuk_top_fiyat=strip_tags($cocuk_top_fiyat);
				 $tur_id=trim($tur_id); 		 $tur_id=htmlentities($tur_id);      			$tur_id=strip_tags($tur_id);
				 $tur_kod=trim($tur_kod); 		 $tur_kod=htmlentities($tur_kod);      			$tur_kod=strip_tags($tur_kod); 
				 $tur_detay_id=trim($tur_detay_id); 		 $tur_detay_id=htmlentities($tur_detay_id);     			$tur_detay_id=strip_tags($tur_detay_id);
				 $para=trim($para); 		 $para=htmlentities($para);     	$para=strip_tags($para);	
				 $tur_turu=trim($tur_turu); 		 $tur_turu=htmlentities($tur_turu);     	$tur_turu=strip_tags($tur_turu);
				 $bas_t=trim($bas_t); 		 $bas_t=htmlentities($bas_t);      			$bas_t=strip_tags($bas_t);
				 $bit_t=trim($bit_t); 		 $bit_t=htmlentities($bit_t);      			$bit_t=strip_tags($bit_t); 
				 $bas_s=trim($bas_s); 		 $bas_s=htmlentities($bas_s);     			$bas_s=strip_tags($bas_s);
				 $bit_s=trim($bit_s); 		 $bit_s=htmlentities($bit_s);     	$bit_s=strip_tags($bit_s);	
				 $seo_adi=trim($seo_adi); 		 $seo_adi=htmlentities($seo_adi);     	$seo_adi=strip_tags($seo_adi);	
				 $indirimsiz=trim($indirimsiz); 		 $indirimsiz=htmlentities($indirimsiz);     	$indirimsiz=strip_tags($indirimsiz);	
				 $tarih_fark=trim($tarih_fark); 		 $tarih_fark=htmlentities($tarih_fark);     	$tarih_fark=strip_tags($tarih_fark);


		  $tur_odeme_kontrol=$this->Tour_model->tur_odeme_kontrol($tur_id);	
	      if($tur_odeme_kontrol!=1){
			  
					$this->load->library('Messages');
			        echo $this->messages->False_Add("");	   
		            return FALSE;			  
			  
		  }			 
				 
 
				 
		   $tur_kontrol=$this->Tour_model->tur_kontrol($tur_id);				  
		   $tur_detay_kontrol=$this->Tour_model->tur_detay_kontrol($tur_kod,$tur_detay_id,$yetiskin_tek_fiyat,$cocuk_tek_fiyat);				 
		   $tur_turu_kontrol=$this->Tour_model->tur_turu_kontrol($tur_kod,$tur_id,$tur_turu);					 
		 
			
	       if(($tur_kontrol!=TRUE)or($tur_detay_kontrol!=TRUE)or($tur_turu_kontrol!=TRUE)){
		   
					$this->load->library('Messages');
			        echo $this->messages->False_Add("");	   
		            return FALSE;
	   }	
	   
	 /*
	       if($tur_turu=="belirli"){
		   $tarih_kontrol=$this->Tour_model->belirli_tarih_kontrol($tur_detay_id,$bas_t,$bit_t);   				
	   }	
	       if($tur_turu=="surekli"){
		   $tarih_kontrol=$this->Tour_model->surekli_tarih_kontrol($tur_detay_id,$bas_s,$bit_s);  
		   
           	$bas_t=explode("-",$bas_t);	  
			$bas_t=$bas_t[2]."".$bas_t[1]."".$bas_t[0];		
           	$bit_t=explode("-",$bit_t);	  
			$bit_t=$bit_t[2]."".$bit_t[1]."".$bit_t[0];				
	   }		   
		
   
	      if ($tarih_kontrol!=TRUE){ 

	    	        $this->load->library('Messages');
			        echo $this->messages->False_Add("");	   
		            return FALSE;
	   }
	   */ 
	   
           	$bas_t=explode("/",$bas_t);	  
			$bas_t=$bas_t[2]."-".$bas_t[0]."-".$bas_t[1];		
           	$bit_t=explode("/",$bit_t);	  
			$bit_t=$bit_t[2]."-".$bit_t[0]."-".$bit_t[1];	
			


	   
	   $yets_top_kontrol=$yetiskin_adet*$yetiskin_tek_fiyat*$tarih_fark;
	   $coc_top_kontrol=$cocuk_adet*$cocuk_tek_fiyat*$tarih_fark;	
	   $genel_total=$yetis_top_fiyat+$cocuk_top_fiyat;
	   


	   if ($yets_top_kontrol!=$yetis_top_fiyat){ 

	    	        $this->load->library('Messages');
			        echo $this->messages->False_Add("");	   
		            return FALSE;

	   }

 
	   
	   if ($coc_top_kontrol!=$cocuk_top_fiyat){ 
 
        	        $this->load->library('Messages');
			        echo $this->messages->False_Add("");	   
		            return FALSE;

	   } 	

	
			//	 $indirimsiz=$tarih_fark*$indirimsiz;
			//	 $genel_total=$tarih_fark*$genel_total;		   

	$sepet_ekle=$this->Tour_model->rez_ekle($kul_id,$tur_id,$tur_kod,$tur_detay_id,$yetiskin_adet,$cocuk_adet,$genel_total,$bas_t,$bit_t,$bas_s,$bit_s,$indirimsiz);	

		if($sepet_ekle!=TRUE){
			$this->load->library('Messages');
		    echo $this->messages->False_Add("otels/otel/detail/".$seo_adi);	   
		 return FALSE;
			
		}  
		
			$this->load->library('mail/Eposta');
		    $this->eposta->rez_gonder();
		
	  
				$this->load->library('Messages');
		    echo $this->messages->True_Add("otels/otel/detail/".$seo_adi);	   
		 return FALSE;  

	   
	   


		
		
		
	}
	
	
	
	
	
	
	
	
	
	
	
	
		public function status()
	{
		

	error_reporting(0);
		$useronline=$this->session->userdata('useronline');
		$kul_id=$this->session->userdata('kul_id');	
		if($useronline==""){
					$this->load->library('Messages');
			        echo $this->messages->config('giris/kayit');	
					return FALSE;
			
		}
		
		
			if($this->session->userdata('lng_turu')=="Eng"){ $uz=""; $data["uz"]="";} 
	if($this->session->userdata('lng_turu')=="Tr"){ $uz="_tr"; $data["uz"]="_tr"; } 	
	if($this->session->userdata('lng_turu')=="Ru"){  $uz="_ru"; $data["uz"]="_ru"; } 	
		
		
		$this->load->model('Tour_model');


	        $urun=$this->input->post('urunKodu',TRUE);				
			$kul=$this->input->post('kulAdi',TRUE);	
			$adi=$this->input->post('adi',TRUE);		
			$em=$this->input->post('em',TRUE);
			$soru=$this->input->post('soru',TRUE);	
			$seo=$this->input->post('seo',TRUE);							
		
				 $urun=trim($urun); 		 $urun=htmlentities($urun);      	$urun=strip_tags($urun); 
				 $kul=trim($kul); 		 $kul=htmlentities($kul);     			$kul=strip_tags($kul);
				 $adi=trim($adi); 		 $adi=htmlentities($adi);     	$adi=strip_tags($adi);				 
				 $em=trim($em); 		 $em=htmlentities($em);      	$em=strip_tags($em);
				 $soru=trim($soru); 		 $soru=htmlentities($soru);      	$soru=strip_tags($soru); 
				 $seo=trim($seo); 		 $seo=htmlentities($seo);      	$seo=strip_tags($seo); 					 
				 
	
	       if(($urun=="")or($kul=="")or($adi=="")or($em=="")or($soru=="")){
		   
					$this->load->library('Messages');
			        echo $this->messages->Config('otels/otel/detail/'.$seo);	   
		            return FALSE;
	   }			 
		
	

		$this->load->library('mail/eposta');
		    $mail=$this->eposta->musaitlik($urun,$kul,$adi,$em,$soru,$seo);	
					
			

		if($mail==TRUE){
			$this->load->library('Messages');
		    echo $this->messages->Message_Ok('otels/otel/detail/'.$seo);	   
		 return FALSE;
			
		}			
			
				$this->load->library('Messages');
		    echo $this->messages->Message_False('otels/otel/detail/'.$seo);	   
		 return FALSE;
	   
	   


		
		
		
	}
	
}
