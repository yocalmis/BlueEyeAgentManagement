<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wishlist extends CI_Controller {
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
		if($this->session->userdata('lng_turu')=="Esp"){  $uz="_esp"; $data["uz"]="_esp"; } 	

		$this->load->model('Wish_model');
		$ayar=$this->Wish_model->ayar();	
		$data["wishlist"]=$this->Wish_model->wishlist_get($kul_id);
        // print_r($data["wishlist"]);

		$n=0;	if( $data["wishlist"] ) :  foreach( $data["wishlist"] as $dizi ) : 
			    $t_kod= $dizi["kod"]; 
				
		$data["puan"][$t_kod]["tur_puan_guven"]=$this->Wish_model->tur_puan_guven($t_kod);
		$data["puan"][$t_kod]["tur_puan_org"]=$this->Wish_model->tur_puan_org($t_kod);
		$data["puan"][$t_kod]["tur_puan_para"]=$this->Wish_model->tur_puan_para($t_kod);
		$data["puan"][$t_kod]["tur_puan_servis"]=$this->Wish_model->tur_puan_servis($t_kod);	
		$data["puan"][$t_kod]["tur_puan_genel"]=$data["puan"][$t_kod]["tur_puan_guven"]+$data["puan"][$t_kod]["tur_puan_org"]+$data["puan"][$t_kod]["tur_puan_para"]+$data["puan"][$t_kod]["tur_puan_servis"];
        $data["puan"][$t_kod]["tur_puan_genel"]=round($data["puan"][$t_kod]["tur_puan_genel"]/4);						
				
							
			$n=$n+1;	 endforeach;  endif; 
			

		
		$this->load->view('wishlist',$data);
			
	}
	
	
		public function add($id=null,$seo_adi=null)
	{
		
		
			error_reporting(0);
		$useronline=$this->session->userdata('useronline');
				$kul_id=$this->session->userdata('kul_id');	
		if($useronline==""){
					$this->load->library('Messages');
			        echo $this->messages->config('giris/kayit');	
					return FALSE;
			
		}
		
		
		if(!is_numeric($id)){
			
			$this->load->library('messages');
            $this->messages->config('');
			
		}
		
				if($id==""){
			
			$this->load->library('messages');
            $this->messages->config('');
			
		}
		
				if($seo_adi==""){
			
			$this->load->library('messages');
            $this->messages->config('');
			
		}
		
		
				 $id=trim($id); 		 $id=htmlentities($id);      $id=strip_tags($id); 
				 $seo_adi=trim($seo_adi); 		 $seo_adi=htmlentities($seo_adi);      $seo_adi=strip_tags($seo_adi); 
		

		$this->load->model('Wish_model');
		$data["ayar"]=$this->Wish_model->ayar();	
		$wishlist_add=$this->Wish_model->wishlist_add($kul_id,$id);
		 
		 
		if($wishlist_add!=1){
			
			$this->load->library('messages');
            $this->messages->Wishlist_false('wishlist');
	        return FALSE;		
		}		 
		

			$this->load->library('messages');
            $this->messages->Wishlist_true('wishlist');
	        return FALSE;	

		

		
		
	}
	
	
	
	public function remove($id=null,$seo_adi=null)
	{
		
		
			error_reporting(0);
		$useronline=$this->session->userdata('useronline');
				$kul_id=$this->session->userdata('kul_id');	
		if($useronline==""){
					$this->load->library('Messages');
			        echo $this->messages->config('giris/kayit');	
					return FALSE;
			
		}
		
		
		if(!is_numeric($id)){
			
			$this->load->library('messages');
            $this->messages->config('');
			
		}
		
				if($id==""){
			
			$this->load->library('messages');
            $this->messages->config('');
			
		}
		
	


				if($seo_adi==""){
			
			$this->load->library('messages');
            $this->messages->config('');
			
		}		
		
		
 $id=trim($id); 		 $id=htmlentities($id);      $id=strip_tags($id); 
 $seo_adi=trim($seo_adi); 		 $seo_adi=htmlentities($seo_adi);      $seo_adi=strip_tags($seo_adi);  
 
 
 
 
		

		$this->load->model('Wish_model');
		$data["ayar"]=$this->Wish_model->ayar();	
		$wishlist_remove=$this->Wish_model->wishlist_remove($kul_id,$id);
		 
		 
		if($wishlist_remove!=1){
			
			$this->load->library('messages');
            $this->messages->Wishlist_remove_false('wishlist');
	        return FALSE;		
		}		 
		
		

			$this->load->library('messages');
            $this->messages->Wishlist_remove_true('wishlist');
	        return FALSE;	

		

		
		
	}
	
	
	
	
}
