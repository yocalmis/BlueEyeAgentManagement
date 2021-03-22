<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

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
		$this->load->model('Cart_model');
	
		



		$ayar=$this->Cart_model->ayar();		
		$data["cart_getir"]=$this->Cart_model->cart_getir($kul_id);		
		

		
		
				$n=0;	if( $data["cart_getir"] ) :  foreach( $data["cart_getir"] as $dizi ) : 
				
			    		$data["tur_bilgi"][$n]=$this->Cart_model->tur_bilgi($dizi["tur_id"]);	
			    		$data["ziyaretci_bilgi"][$n]=$this->Cart_model->ziyaretci_bilgi($dizi["id"]);
						
				$n=$n+1; endforeach;  endif; 
				
				//print_r($data["ziyaretci_bilgi"][0][0]);
				//return FALSE;
		
						$n=0;	if( $data["tur_bilgi"] ) :  foreach( $data["tur_bilgi"] as $dizi2 ) : 
				

				
			    		$data["kat_bilgi"][$n]=$this->Cart_model->kat_bilgi($dizi2[0]["kat_id"]);	
			    		$data["kat_bilgi_seo"][$n]=$this->Cart_model->kat_bilgi_seo($dizi2[0]["kat_id"]);						
				$n=$n+1; endforeach;  endif; 

		     //print_r($data["kat_bilgi"][0]);
			//	return FALSE;

		$this->load->view('cart',$data);
		

		
		
	}
	
	
	
	
	
	
	
		public function delete($id=null,$kullanici_id=null,$tur_id=null)
	{
		
		
			error_reporting(0);
		$useronline=$this->session->userdata('useronline');
				$kul_id=$this->session->userdata('kul_id');	
		if($useronline==""){
					$this->load->library('Messages');
			        echo $this->messages->config('giris/kayit');	
					return FALSE;
			
		}
		
		
			if($kul_id!=$kullanici_id){
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
		
		if(!is_numeric($kullanici_id)){
			
			$this->load->library('messages');
            $this->messages->config('');
			
		}
		
				if($kullanici_id==""){
			
			$this->load->library('messages');
            $this->messages->config('');
			
		}

		if(!is_numeric($tur_id)){
			
			$this->load->library('messages');
            $this->messages->config('');
			
		}
		
				if($tur_id==""){
			
			$this->load->library('messages');
            $this->messages->config('');
			
		}		
		
		
 $id=trim($id); 		 $id=htmlentities($id);      $id=strip_tags($id); 
  $kullanici_id=trim($kullanici_id); 		 $kullanici_id=htmlentities($kullanici_id);      $kullanici_id=strip_tags($kullanici_id);
  $tur_id=trim($tur_id); 		 $tur_id=htmlentities($tur_id);      $tur_id=strip_tags($tur_id);
 
 
		

		$this->load->model('Cart_model');
		$ayar=$this->Cart_model->ayar();	
		$cart_remove=$this->Cart_model->cart_remove($kul_id,$id,$tur_id);
		 
		 
		if($cart_remove!=1){
			
			$this->load->library('messages');
            $this->messages->False_Delete('cart');
	        return FALSE;		
		}		 
		

			$this->load->library('messages');
            $this->messages->True_Delete('cart');
	        return FALSE;	

		

		
		
	}
	
	
	
	
	
	
		public function info()
	{
		
	echo $ad=$_POST["iism0_0"];
	echo $mail=$_POST["mail0_0"];
	echo $tel=$_POST["tel0_0"];
	echo $shr=$_POST["shr0_0"];	
	echo $slc=$_POST["slc0_0"];
	echo $id=$_POST["id0_0"];	
	echo $sepet_id=$_POST["sepet_id0_0"];
    
	
	/*
	$this->load->model('Cart_model');
	$info=$this->Cart_model->info($ad,$mail,$tel,$shr,$slc,$id,$sepet_id);
	

		if($info){echo 1; return FALSE;}
		
		
		echo 0;
	
*/
	
	
	}
	
	
	
	
	
	
}
