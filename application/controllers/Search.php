<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {
	
	
	
	
	
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

	}	
	 
	public function word($word=null)
	{
		
	if($this->session->userdata('lng_turu')=="Eng"){ $uz=""; $data["uz"]="";} 
	if($this->session->userdata('lng_turu')=="Tr"){ $uz="_tr"; $data["uz"]="_tr"; } 	
	if($this->session->userdata('lng_turu')=="Ru"){  $uz="_ru"; $data["uz"]="_ru"; } 		
		if($this->session->userdata('lng_turu')=="Esp"){  $uz="_esp"; $data["uz"]="_esp"; } 		
		
		error_reporting(0);
		
        if($word!=""){
		$bas_t="2000-01-01 00:00:00";			
		
        $yil=date("Y");
		$yil=$yil+2;
		$bit_t=date($yil."-m-d H:i:s");  //"2019-01-01 00:00:00";			

		$f1=0; 		
		$f2=10000; 
		
		$word=trim($word); $word=strip_tags($word); 	

		}
		
		else{
		
		$word=$_POST["word"];
		$bas_t=$_POST["bas_t"];		
		$bit_t=$_POST["bit_t"];		
		$id=$_POST["id"];		

		$h_giris=$_POST["h_giris"];
		$cok_satan=$_POST["cok_satan"];		
		$kupon=$_POST["kupon"];
		$h_onay=$_POST["h_onay"];
		$tuken=$_POST["tuken"];
		$engelli=$_POST["engelli"];
		
		$f1=$_POST["f1"];
		$f2=$_POST["f2"];		
		

		$word=trim($word); $word=strip_tags($word); 	
		$bas_t=trim($bas_t); $bas_t=strip_tags($bas_t); 			
		$bit_t=trim($bit_t);  $bit_t=strip_tags($bit_t); 			
		$id=trim($id);  $id=strip_tags($id); 

		$h_giris=trim($h_giris); $h_giris=strip_tags($h_giris); 	
		$cok_satan=trim($cok_satan); $cok_satan=strip_tags($cok_satan); 			
		 $kupon=trim($kupon);  $kupon=strip_tags($kupon); 			
		$h_onay=trim($h_onay);  $h_onay=strip_tags($h_onay); 
		$tuken=trim($tuken); $tuken=strip_tags($tuken); 	
		$engelli=trim($engelli); $engelli=strip_tags($engelli); 			

		$f1=trim($f1); $f1=strip_tags($f1); 	
		$f2=trim($f2); $f2=strip_tags($f2); 		

		if($bas_t!=""){
		$parca=explode("/",$bas_t);
		$bas_t=$parca[2]."-".$parca[0]."-".$parca[1]." 00:00:00";	
			
		}
		if($bit_t!=""){
		$parca=explode("/",$bit_t);
		$bit_t=$parca[2]."-".$parca[0]."-".$parca[1]." 23:59:59";	
			
		}

		if($word==""){
		$word="";
		}		
		
		if($bas_t==""){
		$bas_t="2000-01-01 00:00:00";
		}
		
		if($bit_t==""){
        $yil=date("Y");
		$yil=$yil+2;
		$bit_t=date($yil."-m-d H:i:s");  //"2019-01-01 00:00:00";	
		
		}
		
			if($f1==""){
		$f1=0;
		}	
			if($f2==""){
		$f2=10000;
		}			
		
		
		$sorgu="";
		$data["h_giris"]="";
		$data["cok_satan"]="";
		$data["kupon"]="";
		$data["h_onay"]="";
		$data["tuken"]="";		
		$data["engelli"]="";

	
		if($h_giris==1){ $sorgu.=" and hizli_giris=1"; $data["h_giris"]="checked"; }
		if($cok_satan==1){ $sorgu.=" and cok_satan=1"; $data["cok_satan"]="checked";}
		if($kupon==1){ $sorgu.=" and kupon=1"; $data["kupon"]="checked";}
		if($h_onay==1){ $sorgu.=" and hizli_onay=1"; $data["h_onay"]="checked";}
		if($tuken==1){ $sorgu.=" and tukenme=1"; $data["tuken"]="checked";}
		if($engelli==1){ $sorgu.=" and engelli=1"; $data["engelli"]="checked";}
		


		
	
		}

	
		$this->load->model('Search_model');		
		$data["ayar"]=$this->Search_model->ayar();		



		$ara_anakat_varmi=$this->Search_model->ara_anakat($word,$sorgu,$bas_t,$bit_t);	
		
		

		
		if($ara_anakat_varmi>0){

		$ara_anakat_kat_getir=$this->Search_model->ara_anakat_kat_getir($word,$sorgu,$bas_t,$bit_t);
		
			
		
		
		 $data["ara"]=$this->Search_model->ara_anakat_kat_tur_getir($ara_anakat_kat_getir,$sorgu,$bas_t,$bit_t);

		}
 else{

		 $ara_kat_varmi=$this->Search_model->ara_kat($word,$sorgu,$bas_t,$bit_t);	
		
		if($ara_kat_varmi>0){

		 $data["ara"]=$this->Search_model->ara_kat_tur_getir($word,$sorgu,$bas_t,$bit_t);
	
		}
		else{
			
		$data["ara"]=$this->Search_model->ara($word,$sorgu,$bas_t,$bit_t);	 	
		
		}
		
		

/*
			echo $sorgu;
			$data["ara"]=$this->Search_model->ara($word,$sorgu,$bas_t,$bit_t);	 
	*/		 
		 }



	
		$data["word"]=$word;
		$data["t1"]=$bas_t;
		$data["t2"]=$bit_t;
		$data["f1"]=$f1;
		$data["f2"]=$f2;		

		$data["arama_sayi"]=0;
		$n=0;	if( $data["ara"] ) :  foreach( $data["ara"] as $dizi ) : 
		

	    $data["kat_getir"][$n]=$this->Search_model->kat_getir($dizi["kat_id"],$uz);
	    $data["fyt_getir"][$n]=$this->Search_model->fyt($dizi["kod"]);	
	    $data["fyt_ind_onc"][$n]=$this->Search_model->fyt_ind_onc($dizi["kod"]);		    
	    
	    
		$data["tur_yorum"][$dizi["id"]]=$this->Search_model->tur_yorum($dizi["id"]);	

		
		$data["tur_puan_guven"][$n]=$this->Search_model->tur_puan_guven($dizi["kod"]);
		$data["tur_puan_org"][$n]=$this->Search_model->tur_puan_org($dizi["kod"]);
		$data["tur_puan_para"][$n]=$this->Search_model->tur_puan_para($dizi["kod"]);
		$data["tur_puan_servis"][$n]=$this->Search_model->tur_puan_servis($dizi["kod"]);	
		$data["tur_puan_genel"][$n]=$data["tur_puan_guven"][$n]+$data["tur_puan_org"][$n]+$data["tur_puan_para"][$n]+$data["tur_puan_servis"][$n];
		$data["tur_puan_genel"][$n]=$data["tur_puan_genel"][$n]/4;		
	
		

		 if($dizi["tur_donemi"]=="belirli"){ 
		 
		$data["tur_tarih_uygun"][$n]=$this->Search_model->tur_tarih_uygun($dizi["kod"],$bas_t,$bit_t);
		 
		 } 
		 else{$data["tur_tarih_uygun"][$n]=1;}


	//	 echo $data["tur_tarih_uygun"][$n];
		 $data["tur_fyt_uygun"][$n]=$this->Search_model->tur_fyt_uygun($dizi["kod"],$f1,$f2); 

		 if(($dizi["tur_donemi"]!="otel")and($data["tur_tarih_uygun"][$n]==1)and($data["tur_fyt_uygun"][$n]==1)){ $data["arama_sayi"]=$data["arama_sayi"]+1;} 
  
  /*/*

        if($dizi["tur_donemi"]!="otel"){

		echo $data["tur_tarih_uygun"][$n];
		echo $data["tur_fyt_uygun"][$n]."<br>"; 
		}
		*/
	
	
							
			$n=$n+1;	 endforeach;  endif; 	
		
     //	 	print_r($data["arama_sayi"]);
	//	return FALSE;
	
		$this->load->view('search',$data);
		

		
		
	}
}
