<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {
	
	
	
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
	 
	public function detail($pg=null)
	{
		
		$pg=trim($pg); 		 $pg=htmlentities($pg);       $pg=strip_tags($pg);
		
			if($pg==""){
				
			$this->load->library('Messages');
			echo $this->messages->config('');	
			return FALSE;
			
			}
			

			
			
				if($this->session->userdata('lng_turu')=="Eng"){ $uz=""; $data["uz"]="";} 
	if($this->session->userdata('lng_turu')=="Tr"){ $uz="_tr"; $data["uz"]="_tr"; } 	
	if($this->session->userdata('lng_turu')=="Ru"){  $uz="_ru"; $data["uz"]="_ru"; } 
	if($this->session->userdata('lng_turu')=="Esp"){  $uz="_esp"; $data["uz"]="_esp"; } 
	$this->load->model('Page_model');

		$data["ayar"]=$this->Page_model->ayar();		
		$data["page_bilgi"]=$this->Page_model->page_bilgi($pg);		
		
	//		print_r($data["page_bilgi"]);
	//		return FALSE;		
		
		
		
		$data["page_name"]=$pg;		

	
		$this->load->view('empty',$data);

	}
	
	
	
	
	
	
	
		 public function formal ()
    {
		

error_reporting(0);



        $this->load->library('messages');

         $sirket_name=$this->input->post('sirket_name',TRUE);
		 $acenta_unvan=$this->input->post('acenta_unvan',TRUE);
		 $tursab_no=$this->input->post('tursab_no',TRUE);		 
         $yetkili_isim=$this->input->post('yetkili_isim',TRUE);
          $email=$this->input->post('email',TRUE);        
		 $sirket_adres=$this->input->post('sirket_adres',TRUE);
		 $sirket_sehir=$this->input->post('sirket_sehir',TRUE);
         $sirket_posta_no=$this->input->post('sirket_posta_no',TRUE);
		 $tel_no=$this->input->post('tel_no',TRUE);
		 $cep_no=$this->input->post('cep_no',TRUE);
		 $sirket_website=$this->input->post('sirket_website',TRUE);


		$sirket_name=strip_tags($sirket_name); 
		$acenta_unvan=strip_tags($acenta_unvan);
		$tursab_no=strip_tags($tursab_no);	
		$yetkili_isim=strip_tags($yetkili_isim); 
		$email=strip_tags($email); 		
		$sirket_adres=strip_tags($sirket_adres);
		$sirket_sehir=strip_tags($sirket_sehir);		 
	    $sirket_posta_no=strip_tags($sirket_posta_no); 
		$tel_no=strip_tags($tel_no);
		$cep_no=strip_tags($cep_no);	
		$sirket_website=strip_tags($sirket_website); 
		
		


			$this->load->library('mail/Eposta');
			
		  $return = $this->eposta->supplier_gonder($sirket_name,$acenta_unvan,$tursab_no,$yetkili_isim,$email,$sirket_adres,
		  $sirket_sehir,$sirket_posta_no,$tel_no,$cep_no,$sirket_website);	  

		

       if($return){
            $this->load->library('messages');
           echo $this->messages->True_Add('');


			       }
        else{
            $this->load->library('messages');
            echo $this->messages->False_Add('');


        }
		
		
	}	
	
	
	
	
	
	
	
	
		
	
		 public function kariyeral ()
    {
		

error_reporting(0);



        $this->load->library('messages');

         $name_surname=$this->input->post('name_surname',TRUE);
		 $email=$this->input->post('email',TRUE);
		 $address=$this->input->post('address',TRUE);		 
         $phone=$this->input->post('phone',TRUE);
		 $linkdln=$this->input->post('linkdln',TRUE);
		 $facebook=$this->input->post('facebook',TRUE);
		 $web=$this->input->post('web',TRUE);
		 $twitter=$this->input->post('twitter',TRUE);
		 $message=$this->input->post('message',TRUE);
		 $hiddenExpLength=$this->input->post('hiddenExpLength',TRUE);
		 $hiddenEduLength=$this->input->post('hiddenEduLength',TRUE);

		$ex_hidden_title_var_mi = $this->input->post('hiddenTitle_0',TRUE);
		$edu_hidden_title_var_mi = $this->input->post('hiddenInstitute_0',TRUE);	


		$name_surname=strip_tags($name_surname); 
		$email=strip_tags($email);
		$address=strip_tags($address);	
		$phone=strip_tags($phone); 
		$linkdln=strip_tags($linkdln);
		$facebook=strip_tags($facebook);		 
		$web=strip_tags($web);
		$twitter=strip_tags($twitter);	
		$message=strip_tags($message);	





if($ex_hidden_title_var_mi){

for($ex=0; $ex<=$hiddenExpLength; $ex++){

$ex_hidden_title[$ex] = $this->input->post('hiddenTitle_'.$ex,TRUE);
$ex_hidden_desc[$ex] = $this->input->post('hiddenExpDescription_'.$ex,TRUE);
$ex_hidden_company[$ex] = $this->input->post('hiddenExpCompany_'.$ex,TRUE);
$ex_hidden_loc[$ex] = $this->input->post('hiddenLocation_'.$ex,TRUE);
$ex_hidden_bas[$ex] = $this->input->post('hiddenExpStartDate_'.$ex,TRUE);
$ex_hidden_bit[$ex] = $this->input->post('hiddenExpEndDate_'.$ex,TRUE);

		$ex_hidden_title[$ex]=strip_tags($ex_hidden_title[$ex]); 
		$ex_hidden_desc[$ex]=strip_tags($ex_hidden_desc[$ex]);
		$ex_hidden_company[$ex]=strip_tags($ex_hidden_company[$ex]);	
		$ex_hidden_loc[$ex]=strip_tags($ex_hidden_loc[$ex]); 
		$ex_hidden_bas[$ex]=strip_tags($ex_hidden_bas[$ex]);
		$ex_hidden_bit[$ex]=strip_tags($ex_hidden_bit[$ex]);	

}

}


if($edu_hidden_title_var_mi){

for($edu=0; $edu<=$hiddenEduLength; $edu++){

$edu_hidden_ins[$edu] = $this->input->post('hiddenInstitute_'.$edu,TRUE);
$edu_hidden_ins_adr[$edu] = $this->input->post('hiddenInstituteAddress_'.$edu,TRUE);
$edu_hidden_major[$edu] = $this->input->post('hiddenMajor_'.$edu,TRUE);
$edu_hidden_degree[$edu] = $this->input->post('hiddenDegree_'.$edu,TRUE);
$edu_hidden_desc[$edu] = $this->input->post('hiddenEduDescription_'.$edu,TRUE);
$edu_hidden_bas[$edu] = $this->input->post('hiddenEduStartDate_'.$edu,TRUE);
$edu_hidden_bit[$edu] = $this->input->post('hiddenEduEndDate_'.$edu,TRUE);

		$edu_hidden_ins[$edu]=strip_tags($edu_hidden_ins[$edu]); 
		$edu_hidden_ins_adr[$edu]=strip_tags($edu_hidden_ins_adr[$edu]);
		$edu_hidden_major[$edu]=strip_tags($edu_hidden_major[$edu]);	
		$edu_hidden_degree[$edu]=strip_tags($edu_hidden_degree[$edu]); 
		$edu_hidden_desc[$edu]=strip_tags($edu_hidden_desc[$edu]);
		$edu_hidden_bas[$edu]=strip_tags($edu_hidden_bas[$edu]);
		$edu_hidden_bit[$edu]=strip_tags($edu_hidden_bit[$edu]);		
}

}




// get details of the uploaded file
$fileTmpPath = $_FILES['ft']['tmp_name'];
$fileName = $_FILES['ft']['name'];
$fileSize = $_FILES['ft']['size'];
$fileType = $_FILES['ft']['type'];
$fileNameCmps = explode(".", $fileName);
$fileExtension = strtolower(end($fileNameCmps));
$resimyol="";
$newFileName = md5(time() . $fileName) . '.' . $fileExtension;
// directory in which the uploaded file will be moved
$uploadFileDir = 'assets/uploads/files/';
$dest_path = $uploadFileDir . $newFileName;
$imageFileType = strtolower(pathinfo($dest_path,PATHINFO_EXTENSION));

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
return FALSE;
}

if ($_FILES["ft"]["size"] > 500000) {
     return FALSE; 
}

if(!move_uploaded_file($fileTmpPath, $dest_path))
{
     return FALSE; 
}
else{
$resimyol=base_url()."/".$dest_path;
}

// get details of the uploaded file
$fileTmpPath = $_FILES['rs']['tmp_name'];
$fileName = $_FILES['rs']['name'];
$fileSize = $_FILES['rs']['size'];
$fileType = $_FILES['rs']['type'];
$fileNameCmps = explode(".", $fileName);
$fileExtension = strtolower(end($fileNameCmps));
$dosyayol="";

$newFileName = md5(time() . $fileName) . '.' . $fileExtension;
// directory in which the uploaded file will be moved
$uploadFileDir = 'assets/uploads/files/';
$dest_path = $uploadFileDir . $newFileName;
$imageFileType = strtolower(pathinfo($dest_path,PATHINFO_EXTENSION));

if($imageFileType != "txt" && $imageFileType != "doc" && $imageFileType != "docx" ) {
return FALSE;
}

if ($_FILES["rs"]["size"] > 500000) {
     return FALSE; 
}

if(!move_uploaded_file($fileTmpPath, $dest_path))
{
     return FALSE; 
}
else{
$dosyayol=base_url()."/".$dest_path;
}
	



			$this->load->library('mail/Eposta');
			
		  $return = $this->eposta->kariyer_gonder($name_surname,$email,$address,$phone,$linkdln,
		  $facebook,$web,$twitter,$message,$hiddenExpLength,$hiddenEduLength,$ex_hidden_title,$ex_hidden_desc,$ex_hidden_company,$ex_hidden_loc,$ex_hidden_bas,$ex_hidden_bit,$edu_hidden_ins,$edu_hidden_ins_adr,$edu_hidden_major,$edu_hidden_degree,$edu_hidden_desc,$edu_hidden_bas,$edu_hidden_bit,$ex_hidden_title_var_mi,$edu_hidden_title_var_mi,$resimyol,$dosyayol);	  
	



       if($return){
            $this->load->library('messages');
           echo $this->messages->True_Add('');


			       }
        else{
            $this->load->library('messages');
            echo $this->messages->False_Add('');


        }
		
		
	}	
	
	
	
	
	
	
	
	
	
	
	
	
}
