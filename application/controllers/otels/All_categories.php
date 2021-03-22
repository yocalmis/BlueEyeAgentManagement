<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class All_categories extends CI_Controller {

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
	
		$this->load->model('otel/All_categories_model');

	if($this->session->userdata('lng_turu')=="Eng"){ $uz=""; $data["uz"]="";} 
	if($this->session->userdata('lng_turu')=="Tr"){ $uz="_tr"; $data["uz"]="_tr"; } 	
	if($this->session->userdata('lng_turu')=="Ru"){  $uz="_ru"; $data["uz"]="_ru"; } 	

		$data["ayar"]=$this->All_categories_model->ayar();
		$data["kat"]=$this->All_categories_model->ana_kat();
	
		
		$this->load->view('otel/all_anakategori',$data);
	
	
	
	
	
	
	
	}
	
	
	 

}
