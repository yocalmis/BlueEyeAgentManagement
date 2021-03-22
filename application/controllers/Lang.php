<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lang extends CI_Controller {
	
		 function __construct()
     {
         parent::__construct();
		 
		$this->load->library('Sec');
		echo $this->sec->process();	
    
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
	public function index($lng=null)
	{
				error_reporting(0);
				
				if($lng==""){
			
				$lng="Eng";
			
				}	

				if(($lng!="Tr")and($lng!="Ru")and($lng!="Esp"))
				{
					$lng="Eng";				
				}


			
		
		
				 $lng=trim($lng); 		 $lng=htmlentities($lng);      $lng=strip_tags($lng); 
				
				

				$this->load->library("Language/".$lng);
				if($lng=="Eng"){ $data["lang"]=$this->eng->index(); }
				if($lng=="Tr"){ $data["lang"]=$this->tr->index(); }				
				if($lng=="Ru"){ $data["lang"]=$this->ru->index(); }				
				if($lng=="Esp"){ $data["lang"]=$this->esp->index(); }			

				$this->session->set_userdata('lng',$data["lang"]);
				$this->session->set_userdata('lng_turu',$lng);				
				//$data["xx"]=$this->session->userdata('lng');		



				$url=$_SERVER['HTTP_REFERER'];
				$parcala=explode(base_url(),$url);
				//print_r($parcala);
				//return FALSE;

				$this->load->library('messages');
				$this->messages->config($parcala[1]);
				return FALSE;

			

		
		
	}
	
	
	
	
	
	
	
	
	
}
