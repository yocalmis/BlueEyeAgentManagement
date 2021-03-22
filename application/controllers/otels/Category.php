<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {
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
	 
	public function detail($cat_name=null)
	{
		
				if($cat_name==""){
			
			$this->load->library('messages');
            $this->messages->config('');
			
		}
	
		
		$cat_name=trim($cat_name); $cat_name=htmlentities($cat_name); $cat_name=strip_tags($cat_name); 	
		$this->load->model('otel/Category_model');
		$varmi=$this->Category_model->varmi_cat_name($cat_name);			
	
		if($varmi==false){
		      $this->load->library('messages');
            $this->messages->config('');		
			
		}
		
		
	if($this->session->userdata('lng_turu')=="Eng"){ $uz=""; $data["uz"]="";} 
	if($this->session->userdata('lng_turu')=="Tr"){ $uz="_tr"; $data["uz"]="_tr"; } 	
	if($this->session->userdata('lng_turu')=="Ru"){  $uz="_ru"; $data["uz"]="_ru"; } 			
		
		$data["ayar"]=$this->Category_model->ayar();			
	
	
		$data["alt_kat_bilgi"]=$this->Category_model->alt_kat_bilgi($cat_name);	
		$data["alt_katen_populer"]=$this->Category_model->alt_katen_populer($cat_name);		
		$data["alt_kat_turlar"]=$this->Category_model->alt_kat_turlar($cat_name);
		
		$n=0; if( $data["alt_kat_turlar"] ) :  foreach( $data["alt_kat_turlar"] as $dizi ) : 
		$data["alt_kat_turlar_fiyat"][$n]=$this->Category_model->alt_kat_turlar_fiyat($dizi["kod"]);	//Ana kategoriye ait	
		$data["alt_kat_turlar_yorum_sayi"][$n]=$this->Category_model->alt_kat_turlar_yorum_sayi($dizi["kod"]);	//Ana kategoriye ait	
	
	
		
					$t_kod=$dizi["kod"];  
					
		$data["puan"][$t_kod]["tur_puan_guven"]=$this->Category_model->tur_puan_guven($t_kod);
		$data["puan"][$t_kod]["tur_puan_org"]=$this->Category_model->tur_puan_org($t_kod);
		$data["puan"][$t_kod]["tur_puan_para"]=$this->Category_model->tur_puan_para($t_kod);
		$data["puan"][$t_kod]["tur_puan_servis"]=$this->Category_model->tur_puan_servis($t_kod);	
		$data["puan"][$t_kod]["tur_puan_genel"]=$data["puan"][$t_kod]["tur_puan_guven"]+$data["puan"][$t_kod]["tur_puan_org"]+$data["puan"][$t_kod]["tur_puan_para"]+$data["puan"][$t_kod]["tur_puan_servis"];
        $data["puan"][$t_kod]["tur_puan_genel"]=round($data["puan"][$t_kod]["tur_puan_genel"]/4);	
	
			$n=$n+1;	 endforeach;  endif; 


			
		if( $data["alt_kat_bilgi"] ) :  foreach( $data["alt_kat_bilgi"] as $dizi ) : 
		$data["ust_kat_bilgi_getir"]=$this->Category_model->ust_kat_bilgi_getir($dizi["ust_kategori_id"],$uz);	//Ana kategoriye ait	
		$ust_kategori_id=$dizi["ust_kategori_id"];
		$id=$dizi["id"];		
		endforeach;  endif; 		
	
		$data["ana_kat_kategorileri"]=$this->Category_model->ana_kat_kategorileri($ust_kategori_id);
		
			$n=0;	if( $data["ana_kat_kategorileri"] ) :  foreach( $data["ana_kat_kategorileri"] as $dizi ) : 
		$data["ana_kat_kategorileri_tur_adet"][$n]=$this->Category_model->ana_kat_kategorileri_tur_adet($dizi["id"]);	//Ana kategoriye ait

			$n=$n+1; endforeach;  endif; 
		// print_r($data["ana_kat_kategorileri_tur_adet"]);
		//return FALSE;
		$data["kat_yorumlar"]=$this->Category_model->kat_yorumlar($id);			 //Alt kategorinin ana kategorisine ait yorumlar	
		
		
		
				$n=0;	if( $data["kat_yorumlar"] ) :  foreach( $data["kat_yorumlar"] as $dizi ) :

	   $adet=count($dizi["baslik"]);
	   $dongu=$adet-1;
	   	for ($i=0; $i<=$dongu; $i++){
		$data["yorum_puan_ortalama"][$i]=$this->Category_model->yorum_puan_ortalama($dizi["kod"],$dizi["kullanici_id"]); 	
		  
		}
	
		$n=$n+1;	endforeach;  endif;
		
			
	// print_r($data["yorum_puan_ortalama"]);
	 //	return FALSE;
	 //Alt kategorinin ana kategorisine ait turlar		
		
		$data["populer_kategori"]=$this->Category_model->populer_kategori();	
		$data["populer_ana_kategori"]=$this->Category_model->populer_ana_kategori();	
		$data["populer_tur"]=$this->Category_model->populer_tur();	
				
	

     	$this->load->view('otel/altkategori',$data);
		
		
	}
}
