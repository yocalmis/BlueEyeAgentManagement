<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_process extends CI_Controller {

	 function __construct()
     {
         parent::__construct();
		 


	
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
	
	
	
	
	
		public function comment_ajax()
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
		
		$this->load->model('Tour_model');


			$kul_id=$this->input->post('user_id',TRUE);		
	        $baslik=$this->input->post('title',TRUE);				
			$yorum=$this->input->post('message',TRUE);	
			$tur_id=$this->input->post('tur_id',TRUE);
			$tur_kod=$this->input->post('tur_kod',TRUE);	
			$seo_adi=$this->input->post('seo_adi',TRUE);				
			$servis=$this->input->post('servis',TRUE);	
			$organ=$this->input->post('organ',TRUE);	
			$para=$this->input->post('para',TRUE);	
			$guven=$this->input->post('guven',TRUE);	
		
		
				 $baslik=trim($baslik); 		 $baslik=htmlentities($baslik);      	$baslik=strip_tags($baslik); 
				 $yorum=trim($yorum); 		 $yorum=htmlentities($yorum);     			$yorum=strip_tags($yorum);
				 $kul_id=trim($kul_id); 		 $kul_id=htmlentities($kul_id);     	$kul_id=strip_tags($kul_id);				 
				 $tur_id=trim($tur_id); 		 $tur_id=htmlentities($tur_id);      	$tur_id=strip_tags($tur_id);
				 $tur_kod=trim($tur_kod); 		 $tur_kod=htmlentities($tur_kod);      	$tur_kod=strip_tags($tur_kod); 
				 $servis=trim($servis); 		 $servis=htmlentities($servis);     	$servis=strip_tags($servis);
				 $organ=trim($organ); 		 $organ=htmlentities($organ);      			$organ=strip_tags($organ);
				 $para=trim($para); 		 $para=htmlentities($para);      			$para=strip_tags($para); 
				 $guven=trim($guven); 		 $guven=htmlentities($guven);     			$guven=strip_tags($guven);
				 $seo_adi=trim($seo_adi); 		 $seo_adi=htmlentities($seo_adi);     	$seo_adi=strip_tags($seo_adi);			

			
	       if(($baslik=="")or($yorum=="")){
		   
					$this->load->library('Messages');
			        echo $this->messages->True_Add("Tour/detail/".$seo_adi);	   
		            return FALSE;
	   }	

	  $yorum_kayit=$this->Tour_model->yorum_kayit($baslik,$yorum,$kul_id,$tur_id,$tur_kod,$servis,$organ,$para,$guven,$seo_adi);	
	   
	
	  $puan_kayit=$this->Tour_model->puan_kayit($kul_id,$tur_kod,$servis,$organ,$para,$guven);	
		

		if($yorum_kayit==TRUE){
	   
		 echo 1;
		return FALSE;	
		}			
			

		 echo 0;
		
		
		
	}
	


	
		public function reservation_tarih_degistir()
	{
		

	error_reporting(0);
		$useronline=$this->session->userdata('useronline');
		$kul_id=$this->session->userdata('kul_id');	
		if($useronline==""){
					$this->load->library('Messages');
			        echo $this->messages->config('giris/kayit');	
					return FALSE;
			
		}
		

		
		$this->load->model('Rez_model');


			$data=$this->input->post('data',TRUE);		
             $array = (array) json_decode($data);


 

	 $tarih_degisim_kontrol=$this->Rez_model->tarih_degisim_kontrol($array);	

	  if($tarih_degisim_kontrol!="0000-00-00 00:00:00"){	 


// Tarihleri kıyasla

	  	$bugun=date("Y-m-d H:i:s",strtotime('-12 hours'));


     if($bugun<$tarih_degisim_kontrol){
     	echo 0;
     	return FALSE;
     }
/**/



	  }

          $tarih_degistir=$this->Rez_model->tarih_degistir($array);	
	if($tarih_degistir){echo 1;
		return FALSE;}else{echo 0; return FALSE;} 
	
	
}





		public function yeni_kart()
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


			$data=$this->input->post('data',TRUE);		
             $array = (array) json_decode($data);
 



			 $array["user_id"]=trim($array["user_id"]); $array["user_id"]=strip_tags($array["user_id"]); $array["user_id"]=htmlentities($array["user_id"]);

			 $array["cardNumber"]=trim($array["cardNumber"]); $array["cardNumber"]=strip_tags($array["cardNumber"]); $array["cardNumber"]=htmlentities($array["cardNumber"]);

			 $array["cardName"]=trim($array["cardName"]); $array["cardName"]=strip_tags($array["cardName"]); $array["cardName"]=htmlentities($array["cardName"]);	
			 
			 $array["cardExpDate"]=trim($array["cardExpDate"]); $array["cardExpDate"]=strip_tags($array["cardExpDate"]); $array["cardExpDate"]=htmlentities($array["cardExpDate"]);

			 $array["cardCvc"]=trim($array["cardCvc"]); $array["cardCvc"]=strip_tags($array["cardCvc"]); $array["cardCvc"]=htmlentities($array["cardCvc"]);




	 $kart_durum_kontrol=$this->Cart_model->kart_durum_kontrol($array);	


	  if($kart_durum_kontrol==0){	 
        echo 0;
        return FALSE;

	  }

	 $kart_kayit=$this->Cart_model->kart_kayit($array);
 
	  if($kart_kayit==1){
           
          $adi = $this->Cart_model->kullanici_adi_getir($array["user_id"]);	  	

            $this->load->library('mail/Eposta');
            $this->eposta->kart_guncellendi($array["user_id"],$adi);
            
        echo 1;
        return FALSE;
	  }
	else{

        echo 0;
        return FALSE;
	}


}









		public function reservation_iptal()
	{
		

	error_reporting(0);
		$useronline=$this->session->userdata('useronline');
		$kul_id=$this->session->userdata('kul_id');	
		if($useronline==""){
					$this->load->library('Messages');
			        echo $this->messages->config('giris/kayit');	
					return FALSE;
			
		}
		
	
		
		$this->load->model('Rez_model');


			$data=$this->input->post('data',TRUE);		
             $array = (array) json_decode($data);


//print_r($array);



          $iptal_et=$this->Rez_model->iptal_et($array);	
	if($iptal_et){echo 1;}else{echo 0;} 

	//		$this->load->library('mail/Eposta');
    //        $this->eposta->rez_iptal($array);
	


}








}