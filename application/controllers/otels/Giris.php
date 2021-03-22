<?php
defined('BASEPATH') OR exit('No direct script access allowed');




class Giris extends CI_Controller {

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
		error_reporting(0);
		
	if($this->session->userdata('lng_turu')=="Eng"){ $uz=""; $data["uz"]="";} 
	if($this->session->userdata('lng_turu')=="Tr"){ $uz="_tr"; $data["uz"]="_tr"; } 	
	if($this->session->userdata('lng_turu')=="Ru"){  $uz="_ru"; $data["uz"]="_ru"; } 		
		

		$this->load->model('otel/Giris_model');
		$data["ayar"]=$this->Giris_model->ayar();
		$data["turlar_home"]=$this->Giris_model->turlar_home($uz);
		$data["populer_tur"]=$this->Giris_model->populer_tur();
		$data["populer_ana_kategori"]=$this->Giris_model->populer_ana_kategori();	
		

				$n=0;	if( $data["turlar_home"] ) :  foreach( $data["turlar_home"] as $dizi ) : 
				
				for ($i=0; $i<=3; $i++){
					
					if($dizi["tur"][$i]["kod"]){ 
					
					
		$t_kod=$dizi["tur"][$i]["kod"];  
					
		$data["puan"][$t_kod]["tur_puan_guven"]=$this->Giris_model->tur_puan_guven($t_kod);
		$data["puan"][$t_kod]["tur_puan_org"]=$this->Giris_model->tur_puan_org($t_kod);
		$data["puan"][$t_kod]["tur_puan_para"]=$this->Giris_model->tur_puan_para($t_kod);
		$data["puan"][$t_kod]["tur_puan_servis"]=$this->Giris_model->tur_puan_servis($t_kod);	
		$data["puan"][$t_kod]["tur_puan_genel"]=$data["puan"][$t_kod]["tur_puan_guven"]+$data["puan"][$t_kod]["tur_puan_org"]+$data["puan"][$t_kod]["tur_puan_para"]+$data["puan"][$t_kod]["tur_puan_servis"];
        $data["puan"][$t_kod]["tur_puan_genel"]=round($data["puan"][$t_kod]["tur_puan_genel"]/4);		
					
					
					}
							
					
				}
	
		$n=$n+1;		 endforeach;  endif; 
		
	//	print_r($data["puan"]);


		
		
		
		$n=0;	if( $data["populer_ana_kategori"] ) :  foreach( $data["populer_ana_kategori"] as $dizi ) : 
			$data["populer_ana_kategori_sayi"][$n]=$this->Giris_model->populer_ana_kategori_sayi($dizi["id"]);				
		$n=$n+1;		 endforeach;  endif; 
		
		
		$data["populer_kategori"]=$this->Giris_model->populer_kategori();			

		
	
		
		$this->load->view('otel/index',$data);
				
	}
		
	

	
	
	
	
	
		

	
	
	
	
	
	
	
	
	
}
