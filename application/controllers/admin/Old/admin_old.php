<?php

 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MX_Controller {


    function __construct()
    {

        parent::__construct();
        $this->load->database();
        $this->load->helper('url');

        $this->load->library('grocery_CRUD');

    }



    public function _example_output($output=null)
    {


         $this->load->view('admin_box',$output);

    }







    /*
    public function index()
    {
        $this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
    }
*/


//Admin Kontrol ediliyor ve 1 adet kay�t varsa logine gidiyor , kay�t yoksa admin kaydete gidiyor


    public function index()
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {

            $this->load->model('admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){$this->load->view('admin_login');}
            else{$this->load->view('admin_register');}

        }

        else{
        /*       $data['kilavuz']="  <b>Anasayfa</b>";
            // $this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
               $this->load->Model('admin_model');
            // $data['order_stats']=$this->load->admin_model->order_stats() ;
            // $data['order_stats2']=$this->load->admin_model->order_stats_total() ;
            // $data['order_stats3']=$this->load->admin_model->order_stats_user() ;
            // $data['order_stats4']=$this->load->admin_model->order_stats_user_total_value() ;
            // $data['order_stats5']=$this->load->admin_model->order_stats_user_total() ;
            // $data['order_stats11']=$this->load->admin_model->order_stats_year_order_total() ;
               $data['order_stats6']=$this->load->admin_model->order_stats_top() ;
               $data['order_stats7']=$this->load->admin_model->order_stats_year() ;
               $data['order_stats8']=$this->load->admin_model->order_stats_year_topval() ;
               $data['order_stats9']=$this->load->admin_model->order_stats_year_new_users() ;
               $data['order_stats10']=$this->load->admin_model->order_stats_year_visitors() ;
               $data['homepage_info1']=$this->load->admin_model->waiting_order() ;
               $data['homepage_info2']=$this->load->admin_model->making_order() ;
               $data['homepage_info3']=$this->load->admin_model->finishing_order() ;
               $data['homepage_info4']=$this->load->admin_model->rejected_order() ;
               $data['last_orders']=$this->load->admin_model->last_orders() ;

               $this->load->view('admin_home',$data);

         //    $this->load->library('../controllers/ayar/ayar');
         //    $this->ayar->aa();*/

            $this->load->library('messages');
            $this->messages->config('admin/ayar/edit/1');








        }


    }





    //Admin Kaydet


	 function adminkaydet()
	{

	$name=$this->input->post('adi',TRUE);
	$email=$this->input->post('email',TRUE);
	$username=$this->input->post('kullanici',TRUE);
	$pass1=$this->input->post('sifre1',TRUE);
	$pass2=$this->input->post('sifre2',TRUE);
    $this->load->library('messages');

	if($pass1!=$pass2){

        echo $this->messages->Pass_Error('admin');

	}
	else{


        $pass=md5($pass1);



	$data=array($name,$email,$username,$pass);
	$this->load->model('admin_model');
	$return=$this->admin_model->admin_register($data);
	if($return){

        echo $this->messages->True_Add('admin');
	}
	else{

        echo $this->messages->False_Add('admin');
	}

    }





	}




	//Admin Giri�i Kontrol ediliyor , kay�t varsa session olu�turulup login i�lemi ger�ekle�tiriliyor ve y�nlendirme yap�l�yor


	 function kontrol()
	{

	$username=$this->input->post('kullanici',TRUE);
	$pass=$this->input->post('sifre',TRUE);

    $pass=md5($pass);






        $data=array($username,$pass);
    $this->load->library('messages');
	$this->load->model('admin_model');
	$return=$this->admin_model->admin_return($data);


	if($return)
	{
	$this->session->set_userdata('adminonline',$username);
    $online=$this->session->userdata('adminonline');


        echo $this->messages->Welcome('admin',$online);

	}

	else{

        echo $this->messages->Welcome_False('admin');


	}


	}






    //Admin ��




 function cikis()
	{
    $this->load->library('messages');
	$this->session->unset_userdata('adminonline');

        echo $this->messages->Logout('admin');



	}








//Site Ayarları


    public function ayar($edit=null,$id=null)

    {


        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin');
            }
            else{echo

            $this->messages->To_Register('admin');}

        }

        else{



            if($id==1)
        {


            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('tkn_mat_options');
            $crud->set_subject('ayarlar');
            $crud->columns('web_url','facebook','twitter','linkedin','email','tel_1','tel_2','fax','company_name','adress');
            $crud->display_as('web_url','Site adresi');
            $crud->display_as('facebook','Facebook Adresi');
            $crud->display_as('twitter','Twitter Adresi');
            $crud->display_as('linkedin','LinkedIn Adresi');		
            $crud->display_as('email','E-Mail');
            $crud->display_as('tel_1','Telefon');
            $crud->display_as('tel_2','Telefon 2');
            $crud->display_as('fax','Fax');
            $crud->display_as('company_name','Yetkili Kişi');
            $crud->display_as('adress','Adres');
            $crud->display_as('membership_agreement','Üyelik Sözleşmesi');
            $crud->display_as('sales_agreement','Satış Sözleşmesi');
            $crud->display_as('seo_keywords','Anahtar Kelimeler');
            $crud->display_as('seo_content','Alt Kısım Açıklaması'); 
			$crud->display_as('seo_content_2','Description');
            $crud->required_fields('web_url','email','tel_1','company_name');

            $crud->unset_add();
            $crud->unset_read();
            $crud->unset_delete();
            $crud->unset_export();
            $crud->unset_print();
            $crud->unset_back_to_list();



            $data['side_menu']="ayar";
            $data['kilavuz']="  <b>Sistem Ayarları</b>";
            $output = $crud->render();
            $output->data=$data;
            $this->_example_output($output);

        }
        else{
                $this->load->library('messages');
                echo $this->messages->config('admin/ayar/edit/1');

            }




}
             }







    //Admin Bilgileri


    public function bilgi($edit=null,$id=null)
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin');
            }
            else{echo $this->messages->To_Register('admin');}

        }

        else{

        if($id==1)
        {


        $crud = new grocery_CRUD();
        $crud->set_theme('datatables');
        $crud->set_table('tkn_mat_admin');
            $crud->set_subject('bilgi');
        $crud->columns('name','username','pass','email');
        $crud->display_as('name','Adı Soyadı');
        $crud->display_as('username','Kullanıcı Adı');
        $crud->display_as('pass','Şifre (Eski veya yeni şifre)');
        $crud->display_as('email','E-Mail');
        $crud->display_as('status','Admin Türü');

        $crud->unset_add();
        $crud->unset_read();
        $crud->unset_delete();
        $crud->unset_export();
        $crud->unset_print();
        $crud->unset_back_to_list();
            $crud->unset_edit_fields('status');
            $crud->required_fields('username','pass');
       $crud->change_field_type('pass','password');
       $crud->callback_before_update(array($this,'encrypt_password_callback'));


            $data['side_menu']="ayar";
            $data['kilavuz']="  <b>Admin Bilgi Ayarları</b>";
            $output = $crud->render();
            $output->data=$data;
            $this->_example_output($output);


        }
        else{
            $this->load->library('messages');
            echo $this->messages->config('admin/bilgi/edit/1');

        }

        }
    }



function encrypt_password_callback($post_array, $primary_key = null)
{
    $online=$this->session->userdata('adminonline');
    if(empty($online))
    {
        $this->load->library('messages');
        $this->load->model('admin_model');
        $sonuc=$this->admin_model->admin_query();

        if($sonuc){
            echo $this->messages->To_Login('admin');
        }
        else{echo $this->messages->To_Register('admin');}

    }

    else{

        if($post_array['pass']==''){return false;}
        else{

            $post_array['pass'] = md5($post_array['pass']);
            return $post_array;

        }

}

}









    //Pos Bilgileri


    public function pos()
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin');
            }
            else{echo $this->messages->To_Register('admin');}

        }

        else{

            $crud = new grocery_CRUD();
            $crud->set_theme('datatables');
            $crud->set_table('tkn_mat_pos_info');
            $crud->columns('bankcard','company_no','username');
            $crud->display_as('bankcard','Banka');
            $crud->display_as('company_no','Üye İşyeri Numarası');
            $crud->unset_edit_fields('pos_id','bankcard');
            $crud->required_fields('pos_id','bankcard');

            $crud->unset_add();
            $crud->unset_read();
            $crud->unset_delete();
            $crud->unset_export();
            $crud->unset_print();
            $data['side_menu']="banka";
            $data['kilavuz']="  <b>Pos Ayarları</b>";
            $output = $crud->render();
            $output->data=$data;
            $state = $crud->getState();
            $state_info = $crud->getStateInfo();

                if($state == 'edit')
           {
               $primary_key = $state_info->primary_key;
               if($primary_key>11)
               {
                   $this->load->library("messages");

                   echo $this->messages->config('admin/pos');


               }
               else{ $this->_example_output($output); }
           }
            else{ $this->_example_output($output);}


    }
    }








    public function banka()
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin');
            }
            else{echo $this->messages->To_Register('admin');}

        }

        else{


            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('tkn_mat_bank');
            $crud->columns('name');
            $crud->display_as('name','Banka Adı');
            $crud->display_as('info','Banka Bilgi');
            $data['side_menu']="banka";
            $data['kilavuz']="  <b>Banka Bilgileri</b>";
            $crud->required_fields('name','info');
            $output = $crud->render();
            $output->data=$data;

            $this->_example_output($output);
        }


    }






    //Reklam Kontrolleri


    public function kontrol_reklam()
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin');
            }
            else{echo $this->messages->To_Register('admin');}

        }

        else{



            $crud = new grocery_CRUD();


            $crud->set_theme('datatables');
            $crud->set_table('tkn_mat_advertisement');
            $crud->columns('advertise_name','resolution');
            $crud->display_as('img_name','Resim');
            $crud->display_as('advertise_name','Reklam Alanı');
            $crud->display_as('resolution','Çözünürlük');
            $crud->set_field_upload('img_name','assets/uploads/files');
            $crud->required_fields('advertise_name','resolution');
            $crud->unset_add();
            $crud->unset_read();
            $crud->unset_delete();
            $crud->unset_export();
            $crud->unset_print();

            $crud->unset_edit_fields('advertise_name','resolution');
            $data['side_menu']="media";
            $data['kilavuz']="  <b>Reklam Ayarları</b>";
            $output = $crud->render();
            $output->data=$data;

            $state = $crud->getState();
            $state_info = $crud->getStateInfo();

            if($state == 'edit')
            {
                $primary_key = $state_info->primary_key;
                if($primary_key>7)
                {
                    $this->load->library("messages");

                    echo $this->messages->config('admin/kontrol_reklam');


                }
                else{ $this->_example_output($output); }
            }
            else{ $this->_example_output($output);}



        }
    }












    //Slide Kontrolleri



    public function slide()
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin');
            }
            else{echo $this->messages->To_Register('admin');}

        }

        else{


            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('tkn_mat_slides');
            $crud->columns('img_name');
            $crud->display_as('slide_id','Slide adı');
            $crud->display_as('img_name','Resim');
            $crud->display_as('img_name_2','Resim 2');			
            $crud->display_as('content','Slogan');
            $crud->display_as('price','Fiyat');
            $crud->display_as('resolution','Çözünürlük');
			
            $crud->display_as('oz_1','Özellik 1');
            $crud->display_as('oz_2','Özellik 2');
            $crud->display_as('oz_3','Özellik 3');
            $crud->display_as('oz_4','Özellik 4');
            $crud->display_as('oz_5','Özellik 5');
            $crud->display_as('oz_6','Özellik 6');			
			
			
			
            $crud->set_field_upload('img_name','assets/uploads/files');
            $crud->set_field_upload('img_name_2','assets/uploads/files');			
            $crud->required_fields('content','img_name','img_name_2');
			 $crud->unset_fields('resolution','price','link','slide_id');

            $crud->unset_read();
            $crud->unset_export();
            $crud->unset_print();
            
            $data['side_menu']="media";
            $data['kilavuz']="  <b>Slide Ayarları 600 * 543</b>";
            $output = $crud->render();
            $output->data=$data;
           

            $state = $crud->getState();
            $state_info = $crud->getStateInfo();

            if(($state == 'edit')or($state == 'delete'))
            {
               $this->_example_output($output);
            }
            else{ $this->_example_output($output);}
            }


    }

/*
    public function musteriler()
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin');
            }
            else{echo $this->messages->To_Register('admin');}

        }

        else{


            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('tkn_mat_gallery');
            $crud->columns('img_name');
            $crud->display_as('img_name','Resim');
            $crud->display_as('content',' Açıklama');
            $crud->display_as('price','Fiyat');
            $crud->display_as('resolution','Çözünürlük');
			
			
			
			
			
			
			
			
            $crud->set_field_upload('img_name','assets/uploads/files');
            $crud->required_fields('content','img_name');
            $crud->unset_read();
            $crud->unset_export();
            $crud->unset_print();
            $crud->unset_fields('resolution','link');
            $data['side_menu']="media";
            $data['kilavuz']="  <b>Müşteriler</b>";
            $output = $crud->render();
            $output->data=$data;
         

            $state = $crud->getState();
            $state_info = $crud->getStateInfo();

            if(($state == 'edit')or($state == 'delete'))
            {
                $primary_key = $state_info->primary_key;
                if($primary_key>11)
                {
                    $this->load->library("messages");

                    echo $this->messages->config('admin/galeri');


                }
                else{ $this->_example_output($output); }
            }
            else{ $this->_example_output($output);}
        }


    }
	
	
	*/
	
	
	 public function musteri()
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin');
            }
            else{echo $this->messages->To_Register('admin');}

        }

        else{


            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('tkn_mat_gallery2');
            $crud->columns('proje_adi');
            $crud->display_as('content',' Açıklama');
			$crud->display_as('home','Aktiflik Durumu');
            $crud->set_field_upload('resim_1','assets/uploads/files');
            $crud->set_field_upload('resim_2','assets/uploads/files');			
            $crud->set_field_upload('resim_3','assets/uploads/files');			
            $crud->set_field_upload('resim_4','assets/uploads/files');			
            $crud->set_field_upload('resim_5','assets/uploads/files');			
            $crud->set_field_upload('resim_6','assets/uploads/files');			
            $crud->set_field_upload('resim_7','assets/uploads/files');			
            $crud->set_field_upload('resim_8','assets/uploads/files');
            $crud->set_field_upload('resim_9','assets/uploads/files');
            $crud->set_field_upload('resim_10','assets/uploads/files');

            $crud->field_type('home','dropdown',
                array('1' => 'Aktif', '0' => 'Pasif'));

            $crud->required_fields('proje_adi','resim_1');
		  
			
		
	   $state = $crud->getState();
            $state_info = $crud->getStateInfo();
            if($state == "add")
            {
               $crud->unset_fields('seo_name','resim_2','resim_3','resim_4','resim_5','resim_6','resim_7','resim_8'
			   ,'resim_9','resim_10','content');
            }
            if($state == "edit")
            {
                $crud->unset_edit_fields('seo_name','resim_2','resim_3','resim_4','resim_5','resim_6','resim_7','resim_8'
			   ,'resim_9','resim_10','content');
            }






            $crud->callback_before_insert(array($this,'insert_seo5'));
            $crud->callback_before_update(array($this,'insert_seo5'));
			
			
			
			
			
			
			
			
			
            $crud->unset_read();
            $crud->unset_export();
            $crud->unset_print();

            $data['side_menu']="media";
            $data['kilavuz']="  <b>Projeler Resimler 650x418</b>";
            $output = $crud->render();
            $output->data=$data;
         $this->_example_output($output);

          
          
        }


    }
	
	
	
	 public function proje_resim()
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin');
            }
            else{echo $this->messages->To_Register('admin');}

        }

        else{


            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('tkn_mat_proje_resim');
			$crud->set_relation('proje_id','tkn_mat_gallery2','proje_adi');
            $crud->columns('proje_id','resim');
			$crud->display_as('proje_id',' Proje Adı');
			$crud->set_field_upload('resim','assets/uploads/files');
            $crud->required_fields('proje_id','resim');
			
			


		  
			
            $crud->unset_read();
            $crud->unset_export();
            $crud->unset_print();

            $data['side_menu']="media";
            $data['kilavuz']="  <b>Projeler Resimler 1170x640</b>";
            $output = $crud->render();
            $output->data=$data;
         $this->_example_output($output);

          
          
        }


    }
	
	
	
	
	
	
	
	
		 public function urun_resim()
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin');
            }
            else{echo $this->messages->To_Register('admin');}

        }

        else{


            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('tkn_mat_urun_resim');
			$crud->set_relation('proje_id','tkn_mat_categories','cat_name');
            $crud->columns('proje_id','resim');
			$crud->display_as('proje_id',' Ürün Adı');
			$crud->set_field_upload('resim','assets/uploads/files');
            $crud->required_fields('proje_id','resim');
			
			


		  
			
            $crud->unset_read();
            $crud->unset_export();
            $crud->unset_print();

            $data['side_menu']="media";
            $data['kilavuz']="  <b>Ürünler Resimler 1140x670</b>";
            $output = $crud->render();
            $output->data=$data;
         $this->_example_output($output);

          
          
        }


    }
	
	
	
	
	
	
	
	
	
	
	
	
	
	

function insert_seo5($post_array, $primary_key = null)
{
    $online=$this->session->userdata('adminonline');
    if(empty($online))
    {
        $this->load->library('messages');
        $this->load->model('admin_model');
        $sonuc=$this->admin_model->admin_query();

        if($sonuc){
            echo $this->messages->To_Login('admin');
        }
        else{echo $this->messages->To_Register('admin');}

    }

    else{



        $nm = $post_array['proje_adi'];

    /*    $url = trim($nm);
        $url = strtolower($url);
        $find = array('<b>', '</b>');
        $url = str_replace ($find, '', $url);
        $url = preg_replace('/<(\/{0,1})img(.*?)(\/{0,1})\>/', 'image', $url);
        $find = array(' ', '"', '&', '&', '\r\n', '\n', '/', '\\', '+', '<', '>');
        $url = str_replace ($find, '-', $url);
        $find = array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ë', 'Ê');
        $url = str_replace ($find, 'e', $url);
        $find = array('í','ì', 'î', 'ï', 'I', 'ı', 'İ', 'Í', 'Ì', 'Î', 'Ï');
        $url = str_replace ($find, 'i', $url);
        $find = array('ó', 'ö', 'Ö', 'ò', 'ô', 'Ó', 'Ò', 'Ô');
        $url = str_replace ($find, 'o', $url);
        $find = array('á', 'ä', 'â', 'à', 'â', 'Ä', 'Â', 'Á', 'À', 'Â');
        $url = str_replace ($find, 'a', $url);
        $find = array('ú', 'ü', 'Ü', 'ù', 'û', 'Ú', 'Ù', 'Û');
        $url = str_replace ($find, 'u', $url);
        $find = array('ç', 'Ç');
        $url = str_replace ($find, 'c', $url);
        $find = array('ş', 'Ş');
        $url = str_replace ($find, 's', $url);
        $find = array('ğ', 'Ğ');
        $url = str_replace ($find, 'g', $url);
        $find = array('Y');
        $url = str_replace ($find, 'y', $url);
        $find = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<[^>]*>/');
        $repl = array('', '-', '');
        $url = preg_replace ($find, $repl, $url);
        $url = str_replace ('--', '-', $url);*/
		
		
		$turkce=array("ş", "Ş", "ı", "(", ")", "‘", "ü", "Ü", "ö", "Ö", "ç", "Ç", " ", "/", "*", "?", "ş", "Ş", "ı", "ğ", "Ğ", "İ", "ö", "Ö", "Ç", "ç", "ü", "Ü"); 
$duzgun=array("s", "s", "i", "", "", "", "u", "u", "o", "o", "c", "c", "-", "-", "-", "", "s", "s", "i", "g", "g", "i", "o", "o", "c", "c", "u", "u"); 
$deger=str_replace($turkce,$duzgun,$nm); 
$url = preg_replace("@[^A-Za-z0-9-_]+@i","",$deger); 
		
		
		
		

        $post_array['seo_name'] = $url;


        return $post_array;



    }

}


	
	
	
	
	
	
	
	
	  public function bina()
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin');
            }
            else{echo $this->messages->To_Register('admin');}

        }

        else{


            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('tkn_mat_bina');
            $crud->columns('img_name','content');
            $crud->display_as('img_name','Bina Adı');
            $crud->display_as('content',' Link');
            $crud->display_as('price','Fiyat');
            $crud->display_as('resolution','Çözünürlük');
            $crud->required_fields('content','img_name');
            $crud->unset_read();
            $crud->unset_export();
            $crud->unset_print();
            $crud->unset_fields('resolution','link');
            $data['side_menu']="media";
            $data['kilavuz']="  <b>Bina Ayarları</b>";
            $output = $crud->render();
            $output->data=$data;
            $crud->unset_edit_fields('resolution');


            $state = $crud->getState();
            $state_info = $crud->getStateInfo();

           $this->_example_output($output);
        }


    }

	
	
	
	
	
	
	
	
	
	
	
	
	

	
	
	
	
 public function referanslar2()
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin');
            }
            else{echo $this->messages->To_Register('admin');}

        }

        else{


            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('tkn_mat_ref2');
            $crud->columns('img_name','hizmet');
			 $crud->set_relation('hizmet','tkn_mat_categories','cat_name');
            $crud->display_as('img_name','Resim');
			$crud->display_as('hizmet','Hizmet Adı');
            $crud->display_as('content',' Açıklama');
            $crud->display_as('price','Fiyat');
            $crud->display_as('resolution','Çözünürlük');
            $crud->set_field_upload('img_name','assets/uploads/files');
            $crud->required_fields('content','img_name','hizmet');
            $crud->unset_read();
            $crud->unset_export();
            $crud->unset_print();
            $crud->unset_fields('resolution');
            $data['side_menu']="media";
            $data['kilavuz']="  <b>Referans Ayarları</b>";
            $output = $crud->render();
            $output->data=$data;
            $crud->unset_edit_fields('resolution');


            $state = $crud->getState();
            $state_info = $crud->getStateInfo();

            $this->_example_output($output);
        }


    }

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
 public function cozum()
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin');
            }
            else{echo $this->messages->To_Register('admin');}

        }

        else{


            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('tkn_mat_coz');
            $crud->columns('img_name');
            $crud->display_as('img_name','Resim');
            $crud->display_as('content',' Açıklama');
            $crud->display_as('price','Fiyat');
            $crud->display_as('resolution','Çözünürlük');
            $crud->set_field_upload('img_name','assets/uploads/files');
            $crud->required_fields('resolution','content','img_name');
            $crud->unset_read();
            $crud->unset_export();
            $crud->unset_print();
            $crud->unset_fields('resolution','link');
            $data['side_menu']="media";
            $data['kilavuz']="  <b>Çözüm Ortaklarımız Ayarları</b>";
            $output = $crud->render();
            $output->data=$data;
            $crud->unset_edit_fields('resolution');


            $state = $crud->getState();
            $state_info = $crud->getStateInfo();

        $this->_example_output($output);
        }


    }


	
	
	
	public function galeri()
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin');
            }
            else{echo $this->messages->To_Register('admin');}

        }

        else{


            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('tkn_mat_catalog');
            $crud->columns('img_name');
            $crud->display_as('img_name','Resim');
            $crud->display_as('content',' Açıklama');
            $crud->display_as('price','Fiyat');
            $crud->display_as('resolution','Çözünürlük');
            $crud->set_field_upload('img_name','assets/uploads/files');
            $crud->required_fields('resolution','content','img_name');
            $crud->unset_read();
            $crud->unset_export();
            $crud->unset_print();
            $crud->unset_fields('resolution','link');
            $data['side_menu']="media";
            $data['kilavuz']="  <b>Galeri Ayarları</b>";
            $output = $crud->render();
            $output->data=$data;
            $crud->unset_edit_fields('resolution');


            $state = $crud->getState();
            $state_info = $crud->getStateInfo();

            if(($state == 'edit')or($state == 'delete'))
            {
                $primary_key = $state_info->primary_key;
                if($primary_key>11)
                {
                    $this->load->library("messages");

                    echo $this->messages->config('admin/galeri');


                }
                else{ $this->_example_output($output); }
            }
            else{ $this->_example_output($output);}
        }


    }

	
	
	public function magaza()
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin');
            }
            else{echo $this->messages->To_Register('admin');}

        }

        else{


            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('tkn_mat_magaza');
            $crud->columns('img_name');
            $crud->display_as('magaza_adi');
          
            $crud->required_fields('magaza_adi','adres','maps');
            $crud->unset_read();
            $crud->unset_export();
            $crud->unset_print();
            $data['side_menu']="media";
            $data['kilavuz']="  <b>Mağazalar</b>";
            $output = $crud->render();
            $output->data=$data;
           $this->_example_output($output);
        }


    }
	
	
	
	

    //Anket Kontrolleri


    public function anket()
    {


        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin');
            }
            else{echo $this->messages->To_Register('admin');}

        }

        else{

            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('tkn_mat_survey');
            $crud->columns('question','date','Sonuç Görüntüle');
            $crud->display_as('question','Anket Soru');
            $crud->callback_column('Sonuç Görüntüle',array($this,'callback_anketsonuc'));
            $crud->display_as('survey_option_1','Seçenek 1');
            $crud->display_as('survey_option_2','Seçenek 2');
            $crud->display_as('survey_option_3','Seçenek 3');
            $crud->display_as('survey_option_4','Seçenek 4');
            $crud->display_as('survey_option_5','Seçenek 5');
            $crud->display_as('survey_option_6','Seçenek 6');
            $crud->display_as('date','Tarih');
            $crud->display_as('status','Durum');
            $crud->field_type('status','dropdown',
                array('0' => 'pasif', '1' => 'aktif'));
            $crud->required_fields('question','survey_option_1','survey_option_2');
            $crud->unset_delete();
            $crud->unset_export();
            $crud->unset_print();
            $crud->unset_read();

            $data['kilavuz']="  <b>Anket Ayarları</b>";
            $output = $crud->render();
            $output->data=$data;

            $this->_example_output($output);
        }
    }






    public function callback_anketsonuc($value, $row)
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin');
            }
            else{echo $this->messages->To_Register('admin');}

        }

        else{


            return "<a class='btn btn-default' href='".site_url('admin/anketsonuc/'.$row->id)."'>$value - Sonuç Görüntüle</a>";
        }


    }



    public function anketsonuc($id=null)
    {


        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin');
            }
            else{echo $this->messages->To_Register('admin');}

        }

        else{

            $this->load->Model('admin_model', 'Model');
            $data['survey_detail'] = $this->Model->survey_detail_view($id);
            $data['survey_opt_1'] = $this->Model->survey_detail_return_opt_1($id);
            $data['survey_opt_2'] = $this->Model->survey_detail_return_opt_2($id);
            $data['survey_opt_3'] = $this->Model->survey_detail_return_opt_3($id);
            $data['survey_opt_4'] = $this->Model->survey_detail_return_opt_4($id);
            $data['survey_opt_5'] = $this->Model->survey_detail_return_opt_5($id);
            $data['survey_opt_6'] = $this->Model->survey_detail_return_opt_6($id);

           $data['toplam'] =$data['survey_opt_1']+$data['survey_opt_2']+$data['survey_opt_3']+$data['survey_opt_4']+
                            $data['survey_opt_5']+$data['survey_opt_6'];

            if($data['toplam']==0){

                $data['percent_1']=0;
                $data['percent_2']=0;
                $data['percent_3']=0;
                $data['percent_4']=0;
                $data['percent_5']=0;
                $data['percent_6']=0;
            }
            else{
            $data['percent_1'] =($data['survey_opt_1']/$data['toplam'])*100;
            $data['percent_1'] = round($data['percent_1'],2);
            $data['percent_2'] =($data['survey_opt_2']/$data['toplam'])*100;
            $data['percent_2'] = round($data['percent_2'],2);
            $data['percent_3'] =($data['survey_opt_3']/$data['toplam'])*100;
            $data['percent_3'] = round($data['percent_3'],2);
            $data['percent_4'] =($data['survey_opt_4']/$data['toplam'])*100;
            $data['percent_4'] = round($data['percent_4'],2);
            $data['percent_5'] =($data['survey_opt_5']/$data['toplam'])*100;
            $data['percent_5'] = round($data['percent_5'],2);
            $data['percent_6'] =($data['survey_opt_6']/$data['toplam'])*100;
            $data['percent_6'] = round($data['percent_6'],2);

            }


            $data['kilavuz']="  <b>Anket Sonuçları</b>";


            $this->load->view('survey_detail',$data);


        }
    }






    //Duyuru Kontrolleri



    public function haber()
    {


        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin');
            }
            else{echo $this->messages->To_Register('admin');}

        }

        else{

            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('tkn_mat_announcement');
            $crud->columns('date','header');
            $crud->display_as('date','Tarih');
            $crud->display_as('header','Başlık');
            $crud->display_as('img','Resim 370 * 200');
			$crud->display_as('img_2','Resim 2 370 * 200');
			$crud->display_as('img_3','Resim 3 370 * 200');
            $crud->display_as('content','içerik');
            $crud->required_fields('header','content','img','manset');
          $crud->set_field_upload('img','assets/uploads/files');
          $crud->set_field_upload('img_2','assets/uploads/files');
		  $crud->set_field_upload('img_3','assets/uploads/files');

            $state = $crud->getState();
            if($state == "add")
            {
                $crud->unset_fields('seo_name');
            }
            if($state == "edit")
            {
                $crud->unset_edit_fields('seo_name');
            }







            $crud->callback_before_insert(array($this,'insert_seo3'));
            $crud->callback_before_update(array($this,'insert_seo3'));






            $crud->unset_export();
            $crud->unset_print();








            $data['kilavuz']="  <b>Duyuru Ayarları 370 * 200</b>";
            $output = $crud->render();
            $output->data=$data;

            $this->_example_output($output);

        }
    }



 

function insert_seo3($post_array, $primary_key = null)
{
    $online=$this->session->userdata('adminonline');
    if(empty($online))
    {
        $this->load->library('messages');
        $this->load->model('admin_model');
        $sonuc=$this->admin_model->admin_query();

        if($sonuc){
            echo $this->messages->To_Login('admin');
        }
        else{echo $this->messages->To_Register('admin');}

    }

    else{



        $nm = $post_array['header'];

   /*     $url = trim($nm);
        $url = strtolower($url);
        $find = array('<b>', '</b>');
        $url = str_replace ($find, '', $url);
        $url = preg_replace('/<(\/{0,1})img(.*?)(\/{0,1})\>/', 'image', $url);
        $find = array(' ', '"', '&', '&', '\r\n', '\n', '/', '\\', '+', '<', '>');
        $url = str_replace ($find, '-', $url);
        $find = array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ë', 'Ê');
        $url = str_replace ($find, 'e', $url);
        $find = array('í','ì', 'î', 'ï', 'I', 'ı', 'İ', 'Í', 'Ì', 'Î', 'Ï');
        $url = str_replace ($find, 'i', $url);
        $find = array('ó', 'ö', 'Ö', 'ò', 'ô', 'Ó', 'Ò', 'Ô');
        $url = str_replace ($find, 'o', $url);
        $find = array('á', 'ä', 'â', 'à', 'â', 'Ä', 'Â', 'Á', 'À', 'Â');
        $url = str_replace ($find, 'a', $url);
        $find = array('ú', 'ü', 'Ü', 'ù', 'û', 'Ú', 'Ù', 'Û');
        $url = str_replace ($find, 'u', $url);
        $find = array('ç', 'Ç');
        $url = str_replace ($find, 'c', $url);
        $find = array('ş', 'Ş');
        $url = str_replace ($find, 's', $url);
        $find = array('ğ', 'Ğ');
        $url = str_replace ($find, 'g', $url);
        $find = array('Y');
        $url = str_replace ($find, 'y', $url);
        $find = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<[^>]*>/');
        $repl = array('', '-', '');
        $url = preg_replace ($find, $repl, $url);
        $url = str_replace ('--', '-', $url);*/
		
				$turkce=array("ş", "Ş", "ı", "(", ")", "‘", "ü", "Ü", "ö", "Ö", "ç", "Ç", " ", "/", "*", "?", "ş", "Ş", "ı", "ğ", "Ğ", "İ", "ö", "Ö", "Ç", "ç", "ü", "Ü"); 
$duzgun=array("s", "s", "i", "", "", "", "u", "u", "o", "o", "c", "c", "-", "-", "-", "", "s", "s", "i", "g", "g", "i", "o", "o", "c", "c", "u", "u"); 
$deger=str_replace($turkce,$duzgun,$nm); 
$url = preg_replace("@[^A-Za-z0-9-_]+@i","",$deger); 
		
	
		
		

        $post_array['seo_name'] = $url;


        return $post_array;



    }

}



















//Mesajlar



    public function okunmamis_mesaj()
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin');
            }
            else{echo $this->messages->To_Register('admin');}

        }

        else{


        $crud = new grocery_CRUD();

        $crud->set_theme('datatables');
        $crud->set_table('tkn_mat_ticket'); //Change to your table name
        //   $crud->set_relation('from_id','tkn_mat_users','username');
        $crud->columns('header','message','date','username','İşlem');
        $crud->display_as('date','Tarih');
        $crud->display_as('header','Başlık');
        $crud->display_as('message','Mesaj');
        $crud->display_as('username','Kimden');
        $crud->callback_column('İşlem',array($this,'callback_mesaj_oku'));
        $crud->set_model('custom_model');
        $crud->basic_model->set_query_str('SELECT tkn_mat_ticket.tid,tkn_mat_ticket.header,tkn_mat_ticket.message,tkn_mat_ticket.date,
tkn_mat_users.username,tkn_mat_ticket.from_id
FROM tkn_mat_ticket
INNER JOIN tkn_mat_users ON tkn_mat_users.id = tkn_mat_ticket.from_id
Where from_id!=0 and status=0'); //Query text here

        $crud->unset_read();
        $crud->unset_edit();
        $crud->unset_add();
        $crud->unset_delete();
        $crud->unset_export();
        $crud->unset_print();
        $crud->unset_edit_fields('header','message','date','from_id','header','to_id','status');
            $data['side_menu']="mesaj";
            $data['kilavuz']="  <b>Okunmamış Mesajlar</b>";
            $output = $crud->render();
            $output->data=$data;
        $this->_example_output($output);
    }

}









    function tum_mesaj()
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin');
            }
            else{echo $this->messages->To_Register('admin');}

        }

        else{

            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('tkn_mat_ticket'); //Change to your table name
            $crud->columns('date','company_name','header','message','İşlem');
            $crud->display_as('date','Tarih');
            $crud->display_as('header','Başlık');
            $crud->display_as('message','Mesaj');
            $crud->display_as('company_name','Kimden');
            $crud->callback_column('İşlem',array($this,'callback_mesaj_oku'));
            $crud->set_model('custom_model');
            $crud->basic_model->set_query_str('SELECT tkn_mat_ticket.tid,tkn_mat_ticket.header,tkn_mat_ticket.message,tkn_mat_ticket.date,
tkn_mat_ticket.from_id,
tkn_mat_users.company_name
FROM tkn_mat_ticket
INNER JOIN tkn_mat_users ON tkn_mat_users.id = tkn_mat_ticket.from_id
Where from_id!=0'); //Query text here
            $state = $crud->getState();
            if($state == "list")
            {
                $crud->callback_column('date',array($this,'callback_date'));
            }
            $crud->unset_read();
            $crud->unset_edit();
            $crud->unset_add();
            $crud->unset_delete();
            $crud->unset_export();
            $crud->unset_print();
            $crud->unset_edit_fields('header','message','date','from_id','header','to_id','status');
            $data['side_menu']="mesaj";
            $data['kilavuz']="  <b>Gelen Tüm Mesajlar</b>";
            $output = $crud->render();
            $output->data=$data;
            $this->_example_output($output);

        }


    }






    public  function callback_mesaj_oku($value, $row)
    {


        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin');
            }
            else{echo $this->messages->To_Register('admin');}

        }

        else{

            return "<a   class='btn btn-default' href='".site_url('admin/mesajoku/'.$row->from_id)."'> Mesajı Oku</a>";
        }
    }




    public  function callback_date($value, $row)
    {


        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin');
            }
            else{echo $this->messages->To_Register('admin');}

        }

        else{
            $dt=$row->date;
            $dt = explode("-",$dt);

            return $dt[2]."-".$dt[1]."-".$dt[0]."  ".$dt[3].":".$dt[4].":".$dt[5];

        }
    }





    public function mesajoku($id=null)
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin');
            }
            else{echo $this->messages->To_Register('admin');}

        }

        else{


            $search=$this->input->post('msgsrc', TRUE);


            $data['kilavuz']="  <b>Üye Mesaj Detayları</b>";
            $this->load->Model('admin_model', 'Model');
            $data['message'] = $this->Model->message_get($id,$search);
            $data['user'] = $this->Model->user_get($id);
            $data['id'] = $id;
            $this->load->model('admin_model');
            $return=$this->admin_model->message_update($id);

            if($return){


                $this->load->view('message_detail',$data);


            }
            else{

                $this->load->library('messages');
                echo $this->messages->config('admin/okunmamis_mesaj');

            }




    }


}


    public function mesajkaydet()
    {

        $online=$this->session->userdata('adminonline');
        $yetki=$this->session->userdata('tur');
        if(empty($online))
        {
            $this->load->view('admingiris');
        }

        else{

            $header=$this->input->post('header',TRUE);
            $msg=$this->input->post('msg',TRUE);
            $to_id=$this->input->post('to_id',TRUE);
            $from_id=$this->input->post('from_id',TRUE);

            if(($header=="")or($msg=="")){
                $this->load->library('messages');
                echo $this->messages->Empty_Add_Message_Admin('admin/mesajoku/',$to_id);
                  }


else{


            $data=array($header,$msg,$to_id,$from_id);


            $this->load->library('messages');
            $this->load->model('admin_model');


            $return=$this->admin_model->message_insert($data);

            if($return){

                echo $this->messages->True_Add_Message('admin/mesajoku/',$to_id);


            }
            else{

                echo $this->messages->False_Add_Message('admin/mesajoku/',$to_id);

            }

}
        }
    }




    public function form()
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin');
            }
            else{echo $this->messages->To_Register('admin');}

        }

        else{


            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('tkn_mat_contact');
            $crud->columns('name','email');
            $crud->display_as('name',' Adı Soyadı');
            $crud->display_as('email','E-Mail');
            $crud->display_as('tel','Telefon');
            $crud->display_as('subject','Konu');
            $crud->display_as('message','Mesaj');
            $crud->display_as('date','Tarih');
            $crud->unset_add();

            $crud->unset_edit();
            $crud->unset_export();
            $crud->unset_print();
            $crud->order_by('date','desc');



            $data['side_menu']="mesaj";
            $data['kilavuz']="  <b>İletişim Formu Gelen Mesajlar</b>";
            $output = $crud->render();
            $output->data=$data;

            $this->_example_output($output);
        }


    }

	
	
	
	
	 public function kampanya()
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin');
            }
            else{echo $this->messages->To_Register('admin');}

        }

        else{


            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('tkn_mat_company');
            $crud->columns('header','date');

            $crud->display_as('date','Tarih');
            $crud->unset_add_fields("seo","seo_name","img");
            $crud->unset_edit_fields("seo","seo_name","img");
            $crud->required_fields("tarih","header","content");
			
            $crud->display_as("header","Başlık");			
            $crud->display_as("content","Açıklama");			

            $data['kilavuz']="Kampanya";
            $output = $crud->render();
            $output->data=$data;

            $this->_example_output($output);
        }


    }

		 public function referans()
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin');
            }
            else{echo $this->messages->To_Register('admin');}

        }

        else{


            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('tkn_mat_ref');
            $crud->columns('resim');
          $crud->set_field_upload('resim','assets/uploads/files');
            $crud->required_fields("resim");
			

            $data['kilavuz']="Referans";
            $output = $crud->render();
            $output->data=$data;

            $this->_example_output($output);
        }


    }
	
	
 public function dis_link()
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin');
            }
            else{echo $this->messages->To_Register('admin');}

        }

        else{


            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('tkn_mat_dis_link');
            $crud->columns('adi');
          $crud->required_fields("adi","link");
		
            $data['kilavuz']="Referans";
            $output = $crud->render();
            $output->data=$data;

            $this->_example_output($output);
        }


    }
	
		
 public function temsilcilik()
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin');
            }
            else{echo $this->messages->To_Register('admin');}

        }

        else{


            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('tkn_mat_temsilcilik');
            $crud->columns('adi');
          $crud->required_fields("adi","adres");
		
            $data['kilavuz']="Temsilcilik";
            $output = $crud->render();
            $output->data=$data;

            $this->_example_output($output);
        }


    }
	
	
	
	

	 public function ana_1()
    {

      $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin');
            }
            else{echo $this->messages->To_Register('admin');}

        }

        else{


            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('tkn_mat_ana_1');
            $crud->columns('baslik');

            $crud->required_fields("baslik","yazi");
            $crud->unset_add();	
            $crud->unset_delete();				

            $data['kilavuz']="Anasayfa 1. Modül";
            $output = $crud->render();
            $output->data=$data;

            $this->_example_output($output);
        }


    }

	 public function ana_2()
    {

      $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin');
            }
            else{echo $this->messages->To_Register('admin');}

        }

        else{


            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('tkn_mat_ana_2');
            $crud->columns('baslik');

            $crud->required_fields("baslik","yazi","resim");
            $crud->unset_add();	
            $crud->unset_delete();				
          $crud->set_field_upload('resim','assets/uploads/files');
		  
		  
		  
            $state = $crud->getState();
            $state_info = $crud->getStateInfo();

            if(($state == 'edit')or($state == 'delete'))
            {
                $primary_key = $state_info->primary_key;
                if($primary_key!=1)
                {
                    redirect("admin");


                }
          
            }
		  
		  
		  
		  
		  
		  
		  
            $data['kilavuz']="Anasayfa 2. Modül";
            $output = $crud->render();
            $output->data=$data;

            $this->_example_output($output);
        }


    }
	
	
	
	
	
	
	 public function ana_3()
    {

      $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin');
            }
            else{echo $this->messages->To_Register('admin');}

        }

        else{


            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('tkn_mat_ana_3');
            $crud->columns('baslik_1','yazi_1');

            $crud->required_fields("baslik_1","yazi_1","baslik_2","yazi_2","baslik_3","yazi_3","baslik_4","yazi_4","baslik_5","yazi_5","baslik_6","yazi_6","resim");
            $crud->unset_add();	
            $crud->unset_delete();				
          $crud->set_field_upload('resim','assets/uploads/files');
		  
		  
		  
            $state = $crud->getState();
            $state_info = $crud->getStateInfo();

            if(($state == 'edit')or($state == 'delete'))
            {
                $primary_key = $state_info->primary_key;
                if($primary_key!=1)
                {
                    redirect("admin");


                }
          
            }
		  
		  
		  
		  
		  
		  
		  
            $data['kilavuz']="Anasayfa 2. Modül";
            $output = $crud->render();
            $output->data=$data;

            $this->_example_output($output);
        }


    }
	
	
	
	
	
	
	 public function ana_4()
    {

      $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin');
            }
            else{echo $this->messages->To_Register('admin');}

        }

        else{


            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('tkn_mat_ana_4');
            $crud->columns('baslik');

            $crud->required_fields("baslik","yazi","resim");
            $crud->unset_add();	
            $crud->unset_delete();				
          $crud->set_field_upload('resim','assets/uploads/files');
		  
		  
		  
            $state = $crud->getState();
            $state_info = $crud->getStateInfo();

            if(($state == 'edit')or($state == 'delete'))
            {
                $primary_key = $state_info->primary_key;
                if($primary_key!=1)
                {
                    redirect("admin");


                }
          
            }
		  
		  
		  
		  
		  
		  
		  
            $data['kilavuz']="Anasayfa 4. Modül";
            $output = $crud->render();
            $output->data=$data;

            $this->_example_output($output);
        }


    }
	
	
	 public function ana_5()
    {

      $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin');
            }
            else{echo $this->messages->To_Register('admin');}

        }

        else{


            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('tkn_mat_ana_5');
            $crud->columns('baslik');

            $crud->required_fields("baslik","yazi","resim");
            $crud->unset_add();	
            $crud->unset_delete();				
          $crud->set_field_upload('resim','assets/uploads/files');
		  
		  
		  
            $state = $crud->getState();
            $state_info = $crud->getStateInfo();

            if(($state == 'edit')or($state == 'delete'))
            {
                $primary_key = $state_info->primary_key;
                if($primary_key!=1)
                {
                    redirect("admin");


                }
          
            }
		  
		  
		  
		  
		  
		  
		  
            $data['kilavuz']="Anasayfa 5. Modül";
            $output = $crud->render();
            $output->data=$data;

            $this->_example_output($output);
        }


    }
	
	
	
		 public function alt_foot()
    {

      $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin');
            }
            else{echo $this->messages->To_Register('admin');}

        }

        else{


            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('tkn_mat_alt_foot');
            $crud->columns('baslik_1','yazi_1');

            $crud->required_fields("baslik_1","yazi_1","baslik_2","yazi_2","baslik_3","yazi_3","baslik_4","yazi_4","baslik_5","yazi_5","baslik_6","yazi_6"
			,"resim_1","resim_2","resim_3","resim_4","resim_5","resim_6");
            $crud->unset_add();	
            $crud->unset_delete();				
          $crud->set_field_upload('resim_1','assets/uploads/files');
          $crud->set_field_upload('resim_2','assets/uploads/files');
          $crud->set_field_upload('resim_3','assets/uploads/files');
          $crud->set_field_upload('resim_4','assets/uploads/files');
          $crud->set_field_upload('resim_5','assets/uploads/files');
          $crud->set_field_upload('resim_6','assets/uploads/files');
		   
		  
		  
            $state = $crud->getState();
            $state_info = $crud->getStateInfo();

            if(($state == 'edit')or($state == 'delete'))
            {
                $primary_key = $state_info->primary_key;
                if($primary_key!=1)
                {
                    redirect("admin");


                }
          
            }
		  
		  
		  
		  
		  
		  
		  
            $data['kilavuz']="Alt Sayfa İç Bölümleri";
            $output = $crud->render();
            $output->data=$data;

            $this->_example_output($output);
        }


    }
	
	
	
	
		 public function indirmeler()
    {

      $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin');
            }
            else{echo $this->messages->To_Register('admin');}

        }

        else{


            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('tkn_mat_catalog');
            $crud->columns('baslik_1','yazi_1');

            $crud->required_fields("baslik","kategori","dosya");
			
          $crud->set_field_upload('dosya','assets/uploads/files');

            $crud->field_type('kategori','dropdown',
                array('Ürün Broşürü' => 'Ürün Broşürü', 'Msds' => 'Msds', 'Pds' => 'Pds', 'Kullanım Kılavuzu' => 'Kullanım Kılavuzu'));


         $crud->field_type('urun_brosur_durum','dropdown',
                array('Pasif' => 'Pasif', 'Aktif' => 'Aktif'));		
			
	            $crud->field_type('msds_durum','dropdown',
                array('Pasif' => 'Pasif', 'Aktif' => 'Aktif'));		

            $crud->field_type('pds_durum','dropdown',
                array('Pasif' => 'Pasif', 'Aktif' => 'Aktif'));		

            $crud->field_type('kullanim_kilavuz_durum','dropdown',
                array('Pasif' => 'Pasif', 'Aktif' => 'Aktif'));	



				
		  
            $state = $crud->getState();
            $state_info = $crud->getStateInfo();

            if(($state == 'edit')or($state == 'delete'))
            {
                $primary_key = $state_info->primary_key;
                if($primary_key!=1)
                {
                    redirect("admin");


                }
          
            }
		  
		  
		  
		  
		  
		  
		  
            $data['kilavuz']="Alt Sayfa İç Bölümleri";
            $output = $crud->render();
            $output->data=$data;

            $this->_example_output($output);
        }


    }
	
	
	
	
	
	
		 public function malzeme()
    {

      $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin');
            }
            else{echo $this->messages->To_Register('admin');}

        }

        else{


            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('tkn_mat_method_malzeme');
            $crud->columns('adi');

            $crud->required_fields("adi");




				
		  
            $state = $crud->getState();
            $state_info = $crud->getStateInfo();

       
		  
		  
		  
		  
		  
		  
		  
            $data['kilavuz']="Method Malzeme";
            $output = $crud->render();
            $output->data=$data;

            $this->_example_output($output);
        }


    }
	
	
	
	
	
	
	
		
		 public function method()
    {

      $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin');
            }
            else{echo $this->messages->To_Register('admin');}

        }

        else{


            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('tkn_mat_method');
            $crud->columns('malzeme','method','islem');

            $crud->required_fields('malzeme','method','islem');
            $crud->set_relation('malzeme','tkn_mat_method_malzeme','adi');

            $crud->field_type('method','dropdown',
                array('1' => 'Hızlı Method', '2' => 'Standart Method', '3' => 'Otomatik Method', '4' => 'Manuel Method'));	


            $crud->field_type('islem','dropdown',
                array('Kesme' => 'Kesme', 'Zımparalama' => 'Zımparalama', 'Parlatma' => 'Parlatma'));	
				
            $state = $crud->getState();
            $state_info = $crud->getStateInfo();


		  
            $data['kilavuz']="Method";
            $output = $crud->render();
            $output->data=$data;

            $this->_example_output($output);
        }


    }
	
	
	
	
	
	
	
	
	
	
	
 public function hak()
    {

      $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin');
            }
            else{echo $this->messages->To_Register('admin');}

        }

        else{


            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('tkn_mat_hak');
            $crud->columns('baslik');

            $crud->required_fields("baslik","yazi","resim");
            $crud->unset_add();	
            $crud->unset_delete();

          $crud->set_field_upload('resim','assets/uploads/files');
		  
            $state = $crud->getState();
            $state_info = $crud->getStateInfo();

            if(($state == 'edit')or($state == 'delete'))
            {
                $primary_key = $state_info->primary_key;
                if($primary_key!=1)
                {
                    redirect("admin");


                }
          
            }

			

            $data['kilavuz']="Hakkımızda";
            $output = $crud->render();
            $output->data=$data;

            $this->_example_output($output);
        }


    }
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
		 public function kariyer()
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin');
            }
            else{echo $this->messages->To_Register('admin');}

        }

        else{


            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('tkn_mat_kariyer');
            $crud->columns('name','email');
            $crud->display_as('name',' Adı Soyadı');
            $crud->display_as('email','E-Mail');
            $crud->display_as('tel','Telefon');
			$crud->display_as('subject','Konu');
            $crud->display_as('message','Mesaj');
            $crud->display_as('date','Tarih');
			
			$crud->display_as('uni','Üniversite Bölüm Eğitim');
			$crud->display_as('dt','Doğum Tarihi');
			$crud->display_as('uzm','Uzmanlık');
			$crud->display_as('tec','Tecrübe');
			
			
			
			
			
			
            $crud->unset_add();

            $crud->unset_edit();
            $crud->unset_export();
            $crud->unset_print();
            $crud->order_by('date','desc');

            $crud->set_field_upload('dosya','assets/uploads/files');

            $data['side_menu']="mesaj";
            $data['kilavuz']="  <b>Kariyer Formu Gelen Mesajlar</b>";
            $output = $crud->render();
            $output->data=$data;

            $this->_example_output($output);
        }


    }
	
	
	
	
	
		 public function bulten()
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin');
            }
            else{echo $this->messages->To_Register('admin');}

        }

        else{


            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('tkn_mat_bulten');
            $crud->columns('name','tel');
            $crud->display_as('name',' Adı Soyadı');
            $crud->display_as('email','E-Mail');
			 $crud->display_as('date','Tarih');
            $crud->unset_add();

            $crud->unset_edit();
            $crud->order_by('date','desc');



            $data['side_menu']="mesaj";
            $data['kilavuz']="  <b>E-Bülten Mail Kayıtları</b>";
            $output = $crud->render();
            $output->data=$data;

            $this->_example_output($output);
        }


    }
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
    public function tkl()
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin');
            }
            else{echo $this->messages->To_Register('admin');}

        }

        else{


            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('tkn_mat_tkl');
            $crud->columns('name','email');
            $crud->display_as('name',' Adı Soyadı');
            $crud->display_as('email','E-Mail');
            $crud->display_as('tel','Telefon');
            $crud->display_as('subject','Konu');
            $crud->display_as('message','Mesaj');
            $crud->display_as('date','Tarih
   <br><br>
                   <input type=button onclick="window.print()" value=" Bu sayfayı yazdır">


            ');
            $crud->unset_add();

            $crud->unset_edit();
            $crud->unset_export();
            $crud->unset_print();
            $crud->order_by('date','desc');



            $data['side_menu']="mesaj";
            $data['kilavuz']="  <b>İletişim Formu Gelen Mesajlar</b>";
            $output = $crud->render();
            $output->data=$data;

            $this->_example_output($output);
        }


    }

	
    public function paket()
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin');
            }
            else{echo $this->messages->To_Register('admin');}

        }

        else{


            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('tkn_mat_sip');
            $crud->columns('name','email','tel','paket');
            $crud->display_as('name',' Adı Soyadı');
			 $crud->display_as('paket','Paket Adı');
            $crud->display_as('email','E-Mail');
            $crud->display_as('tel','Telefon');
            $crud->display_as('subject','Konu');
            $crud->display_as('message','Mesaj');
            $crud->display_as('date','Tarih
   <br><br>
                   <input type=button onclick="window.print()" value=" Bu sayfayı yazdır">


            ');
            $crud->unset_add();

            $crud->unset_edit();
            $crud->unset_export();
            $crud->unset_print();
            $crud->order_by('date','desc');



            $data['side_menu']="mesaj";
            $data['kilavuz']="  <b>İletişim Formu Gelen Mesajlar</b>";
            $output = $crud->render();
            $output->data=$data;

            $this->_example_output($output);
        }


    }

	
	
	
	
	
	
	
	
	
	public function teklif()
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin');
            }
            else{echo $this->messages->To_Register('admin');}

        }

        else{


            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('tkn_mat_tklf');
            $crud->columns('name','email','tel','subject');
            $crud->display_as('name',' Adı Soyadı');
            $crud->display_as('email','E-Mail');
            $crud->display_as('tel','Telefon');
            $crud->display_as('subject','Konu');
            $crud->display_as('message','Mesaj');
            $crud->display_as('date','Tarih
   <br><br>
                   <input type=button onclick="window.print()" value=" Bu sayfayı yazdır">


            ');
            $crud->unset_add();

            $crud->unset_edit();
            $crud->unset_export();
            $crud->unset_print();
            $crud->order_by('date','desc');



            $data['side_menu']="mesaj";
            $data['kilavuz']="  <b>İletişim Formu Gelen Mesajlar</b>";
            $output = $crud->render();
            $output->data=$data;

            $this->_example_output($output);
        }


    }
	
	
	
	
	

    public function ik()
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin');
            }
            else{echo $this->messages->To_Register('admin');}

        }

        else{


            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('tkn_mat_ik');
            $crud->columns('adi','soyadi');
            


            $crud->display_as('date','Tarih
   <br><br>
                   <input type=button onclick="window.print()" value=" Bu sayfayı yazdır">


            ');
            $crud->unset_add();

            $crud->unset_edit();
            $crud->unset_export();
            $crud->unset_print();
        


            $data['side_menu']="mesaj";
            $data['kilavuz']="  <b>Randevu Mesajları</b>";
            $output = $crud->render();
            $output->data=$data;

            $this->_example_output($output);
        }


    }





    function yardim()
    {



        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin');
            }
            else{echo $this->messages->To_Register('admin');}

        }

        else{

            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('tkn_mat_help_pages'); //Change to your table name
            $crud->columns('adi');





            $crud->unset_add();
            $crud->unset_delete();


            $data['side_menu']="Yardım";
            $data['kilavuz']="  <b>Yardım Sayfaları</b>";
            $output = $crud->render();
            $output->data=$data;
            $this->_example_output($output);

        }






    }



    function icerik()
    {



        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin');
            }
            else{echo $this->messages->To_Register('admin');}

        }

        else{

            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('tkn_mat_pages'); //Change to your table name
            $crud->columns('p_name');
            $crud->display_as('p_name',' Adı');
            $crud->display_as('content','İçerik');
			$crud->display_as('ebeveyn','Ebeveyn Sayfa');
            $crud->display_as('img','Resim');
            $crud->display_as('seo','Anahtar Kelimeler');
            $crud->display_as('seo_name','Seo url');
            $crud->required_fields('p_name');
            $crud->set_field_upload('img','assets/uploads/files');
			
		
			
			
			$crud->unset_read();
			$crud->unset_add();
			$crud->unset_delete();
           $crud->unset_edit_fields('img','ebeveyn','p_name','seo_name');

      
            $crud->callback_before_insert(array($this,'insert_seo2'));
            $crud->callback_before_update(array($this,'insert_seo2'));




            $data['side_menu']="İcerik";
            $data['kilavuz']="  <b>İçerik Sayfaları</b>";
            $output = $crud->render();
            $output->data=$data;
            $this->_example_output($output);

        }






    }

function yorum()
    {



        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin');
            }
            else{echo $this->messages->To_Register('admin');}

        }

        else{

            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('tkn_mat_help_pages'); //Change to your table name
            $crud->columns('firma');
            
            $crud->required_fields('firma','yorum','kisi');




            $data['side_menu']="İcerik";
            $data['kilavuz']="  <b>Yorumlar</b>";
            $output = $crud->render();
            $output->data=$data;
            $this->_example_output($output);

        }






    }
	
	function personel()
    {



        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin');
            }
            else{echo $this->messages->To_Register('admin');}

        }

        else{

            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('tkn_mat_personel'); //Change to your table name
            $crud->columns('adi','pozisyon');
            
            $crud->required_fields('adi','pozisyon','telefon','email');

            $crud->display_as('img_name','Resim 270*250');
			$crud->set_field_upload('img_name','assets/uploads/files');

            $data['side_menu']="İcerik";
            $data['kilavuz']="  <b>Personel</b>";
            $output = $crud->render();
            $output->data=$data;
            $this->_example_output($output);

        }






    }
	
	 function soz()
    {



        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin');
            }
            else{echo $this->messages->To_Register('admin');}

        }

        else{

            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('tkn_mat_soz'); //Change to your table name
            $crud->columns('kim');
           
            $crud->required_fields('kim','soz');
          
			

         
      



            $data['side_menu']="Sözler";
            $data['kilavuz']="  <b>Sözler</b>";
            $output = $crud->render();
            $output->data=$data;
            $this->_example_output($output);

        }






    }

	
	
	
	
    function etkinlik()
    {



        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin');
            }
            else{echo $this->messages->To_Register('admin');}

        }

        else{

            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('tkn_mat_pages_ex'); //Change to your table name
            $crud->columns('p_name','tarih');
            $crud->display_as('p_name',' Adı');
			
            $crud->display_as('content','Açıklama');
			$crud->display_as('ebeveyn','Ebeveyn Sayfa');
            $crud->display_as('img','Resim');
            $crud->display_as('seo','Anahtar Kelimeler');
            $crud->display_as('seo_name','Seo adı');
            $crud->required_fields('p_name','tarih','yer');
            $crud->set_field_upload('img','assets/uploads/files');
			
		
			
			
			$state = $crud->getState();
            if($state == "add")
            {
                    $crud->unset_fields('img','seo_name','ebeveyn');
            }
            if($state == "edit")
            {
                $crud->unset_edit_fields('img','seo_name','ebeveyn');
            }
			
		  $crud->callback_before_insert(array($this,'insert_seo2'));
            $crud->callback_before_update(array($this,'insert_seo2'));
			
			



            $data['side_menu']="İcerik";
            $data['kilavuz']="  <b>Etkinlikler </b>";
            $output = $crud->render();
            $output->data=$data;
            $this->_example_output($output);

        }






    }
	
	
	
	
	
	
	
	
	
	


  function video()
    {



        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin');
            }
            else{echo $this->messages->To_Register('admin');}

        }

        else{

            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('tkn_mat_video'); //Change to your table name
            $crud->columns('url');
          
			
			$crud->required_fields('url');


            $data['side_menu']="Video";
            $data['kilavuz']="  <b>Video (url formatı: https://www.youtube.com/embed/KdXaDz5u1mA)</b>";
            $output = $crud->render();
            $output->data=$data;
            $this->_example_output($output);

        }






    }








function bayiler()
    {



        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin');
            }
            else{echo $this->messages->To_Register('admin');}

        }

        else{

            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('tkn_mat_sube'); //Change to your table name
            $crud->columns('sube_adi');
            $crud->required_fields('sube_adi');
           


            $data['side_menu']="Bayilerimiz";
            $data['kilavuz']="  <b>Bayi Adları</b>";
            $output = $crud->render();
            $output->data=$data;
            $this->_example_output($output);

        }






    }






function insert_seo2($post_array, $primary_key = null)
{
    $online=$this->session->userdata('adminonline');
    if(empty($online))
    {
        $this->load->library('messages');
        $this->load->model('admin_model');
        $sonuc=$this->admin_model->admin_query();

        if($sonuc){
            echo $this->messages->To_Login('admin');
        }
        else{echo $this->messages->To_Register('admin');}

    }

    else{



        $nm = $post_array['p_name'];

    /*    $url = trim($nm);
        $url = strtolower($url);
        $find = array('<b>', '</b>');
        $url = str_replace ($find, '', $url);
        $url = preg_replace('/<(\/{0,1})img(.*?)(\/{0,1})\>/', 'image', $url);
        $find = array(' ', '"', '&', '&', '\r\n', '\n', '/', '\\', '+', '<', '>');
        $url = str_replace ($find, '-', $url);
        $find = array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ë', 'Ê');
        $url = str_replace ($find, 'e', $url);
        $find = array('í','ì', 'î', 'ï', 'I', 'ı', 'İ', 'Í', 'Ì', 'Î', 'Ï');
        $url = str_replace ($find, 'i', $url);
        $find = array('ó', 'ö', 'Ö', 'ò', 'ô', 'Ó', 'Ò', 'Ô');
        $url = str_replace ($find, 'o', $url);
        $find = array('á', 'ä', 'â', 'à', 'â', 'Ä', 'Â', 'Á', 'À', 'Â');
        $url = str_replace ($find, 'a', $url);
        $find = array('ú', 'ü', 'Ü', 'ù', 'û', 'Ú', 'Ù', 'Û');
        $url = str_replace ($find, 'u', $url);
        $find = array('ç', 'Ç');
        $url = str_replace ($find, 'c', $url);
        $find = array('ş', 'Ş');
        $url = str_replace ($find, 's', $url);
        $find = array('ğ', 'Ğ');
        $url = str_replace ($find, 'g', $url);
        $find = array('Y');
        $url = str_replace ($find, 'y', $url);
        $find = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<[^>]*>/');
        $repl = array('', '-', '');
        $url = preg_replace ($find, $repl, $url);
        $url = str_replace ('--', '-', $url);*/
		
		
		$turkce=array("ş", "Ş", "ı", "(", ")", "‘", "ü", "Ü", "ö", "Ö", "ç", "Ç", " ", "/", "*", "?", "ş", "Ş", "ı", "ğ", "Ğ", "İ", "ö", "Ö", "Ç", "ç", "ü", "Ü"); 
$duzgun=array("s", "s", "i", "", "", "", "u", "u", "o", "o", "c", "c", "-", "-", "-", "", "s", "s", "i", "g", "g", "i", "o", "o", "c", "c", "u", "u"); 
$deger=str_replace($turkce,$duzgun,$nm); 
$url = preg_replace("@[^A-Za-z0-9-_]+@i","",$deger); 
		
		
		
		

        $post_array['seo_name'] = $url;


        return $post_array;



    }

}































//Ürün Kontrolleri



    function urunler()
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin');
            }
            else{echo $this->messages->To_Register('admin');}

        }

        else{

            $crud = new grocery_CRUD();
       //     $crud->where('status','1');
            $crud->set_theme('datatables');
            $crud->set_table('tkn_mat_products');
            $crud->set_relation('cat_id','tkn_mat_categories_2','cat_name');
       //   $crud->set_relation('product_type','tkn_mat_product_type','type');
            $crud->columns('product_name','cat_id');
            $crud->display_as('product_name','Ürün Adı');
            $crud->display_as('cat_id','Kategori');
            $crud->display_as('anahtar','Anahtar Kelimeler');
			$crud->set_field_upload('resim_1','assets/uploads/files');
            $crud->set_field_upload('resim_2','assets/uploads/files');			
            $crud->set_field_upload('resim_3','assets/uploads/files');			
            $crud->set_field_upload('resim_4','assets/uploads/files');			
            $crud->set_field_upload('resim_5','assets/uploads/files');			
            $crud->set_field_upload('pdf','assets/uploads/files');		

            $crud->required_fields('product_name','cat_id','kisa_aciklama','resim_1');
            

		  $state = $crud->getState();
            $state_info = $crud->getStateInfo();
            if($state == "add")
            {
               $crud->unset_fields('seo_name','resim_6'
			   ,'resim_7','resim_8','resim_9','resim_10');
            }
            if($state == "edit")
            {
                $crud->unset_edit_fields('seo_name','resim_6'
			   ,'resim_7','resim_8','resim_9','resim_10');
            }
			
			
            $crud->field_type('genel_bilgi_durum','dropdown',
                array('Pasif' => 'Pasif', 'Aktif' => 'Aktif'));		
			
	            $crud->field_type('teknik_veri_durum','dropdown',
                array('Pasif' => 'Pasif', 'Aktif' => 'Aktif'));		

            $crud->field_type('yedek_parca_durum','dropdown',
                array('Pasif' => 'Pasif', 'Aktif' => 'Aktif'));		

            $crud->field_type('yazilim_durum','dropdown',
                array('Pasif' => 'Pasif', 'Aktif' => 'Aktif'));						
			

            $crud->callback_before_insert(array($this,'insert_seo6'));
            $crud->callback_before_update(array($this,'insert_seo6'));

            $data['side_menu']="urun";
            $data['kilavuz']="  <b>Ürünler - Resim ölçüleri 1140x632</b>";
            $output = $crud->render();
            $output->data=$data;

            $this->_example_output($output);
        }

    }




function insert_seo6($post_array, $primary_key = null)
{
    $online=$this->session->userdata('adminonline');
    if(empty($online))
    {
        $this->load->library('messages');
        $this->load->model('admin_model');
        $sonuc=$this->admin_model->admin_query();

        if($sonuc){
            echo $this->messages->To_Login('admin');
        }
        else{echo $this->messages->To_Register('admin');}

    }

    else{



        $nm = $post_array['product_name'];

    /*    $url = trim($nm);
        $url = strtolower($url);
        $find = array('<b>', '</b>');
        $url = str_replace ($find, '', $url);
        $url = preg_replace('/<(\/{0,1})img(.*?)(\/{0,1})\>/', 'image', $url);
        $find = array(' ', '"', '&', '&', '\r\n', '\n', '/', '\\', '+', '<', '>');
        $url = str_replace ($find, '-', $url);
        $find = array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ë', 'Ê');
        $url = str_replace ($find, 'e', $url);
        $find = array('í','ì', 'î', 'ï', 'I', 'ı', 'İ', 'Í', 'Ì', 'Î', 'Ï');
        $url = str_replace ($find, 'i', $url);
        $find = array('ó', 'ö', 'Ö', 'ò', 'ô', 'Ó', 'Ò', 'Ô');
        $url = str_replace ($find, 'o', $url);
        $find = array('á', 'ä', 'â', 'à', 'â', 'Ä', 'Â', 'Á', 'À', 'Â');
        $url = str_replace ($find, 'a', $url);
        $find = array('ú', 'ü', 'Ü', 'ù', 'û', 'Ú', 'Ù', 'Û');
        $url = str_replace ($find, 'u', $url);
        $find = array('ç', 'Ç');
        $url = str_replace ($find, 'c', $url);
        $find = array('ş', 'Ş');
        $url = str_replace ($find, 's', $url);
        $find = array('ğ', 'Ğ');
        $url = str_replace ($find, 'g', $url);
        $find = array('Y');
        $url = str_replace ($find, 'y', $url);
        $find = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<[^>]*>/');
        $repl = array('', '-', '');
        $url = preg_replace ($find, $repl, $url);
        $url = str_replace ('--', '-', $url);*/
		
		
		$turkce=array("ş", "Ş", "ı", "(", ")", "‘", "ü", "Ü", "ö", "Ö", "ç", "Ç", " ", "/", "*", "?", "ş", "Ş", "ı", "ğ", "Ğ", "İ", "ö", "Ö", "Ç", "ç", "ü", "Ü"); 
$duzgun=array("s", "s", "i", "", "", "", "u", "u", "o", "o", "c", "c", "-", "-", "-", "", "s", "s", "i", "g", "g", "i", "o", "o", "c", "c", "u", "u"); 
$deger=str_replace($turkce,$duzgun,$nm); 
$url = preg_replace("@[^A-Za-z0-9-_]+@i","",$deger); 
		
		
		
		

        $post_array['seo_name'] = $url;


        return $post_array;



    }

}






function insert_seo4($post_array, $primary_key = null)
{
    $online=$this->session->userdata('adminonline');
    if(empty($online))
    {
        $this->load->library('messages');
        $this->load->model('admin_model');
        $sonuc=$this->admin_model->admin_query();

        if($sonuc){
            echo $this->messages->To_Login('admin');
        }
        else{echo $this->messages->To_Register('admin');}

    }

    else{



        $nm = $post_array['product_name'];

   /*     $url = trim($nm);
        $url = strtolower($url);
        $find = array('<b>', '</b>');
        $url = str_replace ($find, '', $url);
        $url = preg_replace('/<(\/{0,1})img(.*?)(\/{0,1})\>/', 'image', $url);
        $find = array(' ', '"', '&', '&', '\r\n', '\n', '/', '\\', '+', '<', '>');
        $url = str_replace ($find, '-', $url);
        $find = array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ë', 'Ê');
        $url = str_replace ($find, 'e', $url);
        $find = array('í','ì', 'î', 'ï', 'I', 'ı', 'İ', 'Í', 'Ì', 'Î', 'Ï');
        $url = str_replace ($find, 'i', $url);
        $find = array('ó', 'ö', 'Ö', 'ò', 'ô', 'Ó', 'Ò', 'Ô');
        $url = str_replace ($find, 'o', $url);
        $find = array('á', 'ä', 'â', 'à', 'â', 'Ä', 'Â', 'Á', 'À', 'Â');
        $url = str_replace ($find, 'a', $url);
        $find = array('ú', 'ü', 'Ü', 'ù', 'û', 'Ú', 'Ù', 'Û');
        $url = str_replace ($find, 'u', $url);
        $find = array('ç', 'Ç');
        $url = str_replace ($find, 'c', $url);
        $find = array('ş', 'Ş');
        $url = str_replace ($find, 's', $url);
        $find = array('ğ', 'Ğ');
        $url = str_replace ($find, 'g', $url);
        $find = array('Y');
        $url = str_replace ($find, 'y', $url);
        $find = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<[^>]*>/');
        $repl = array('', '-', '');
        $url = preg_replace ($find, $repl, $url);
        $url = str_replace ('--', '-', $url);*/
		
				$turkce=array("ş", "Ş", "ı", "(", ")", "‘", "ü", "Ü", "ö", "Ö", "ç", "Ç", " ", "/", "*", "?", "ş", "Ş", "ı", "ğ", "Ğ", "İ", "ö", "Ö", "Ç", "ç", "ü", "Ü"); 
$duzgun=array("s", "s", "i", "", "", "", "u", "u", "o", "o", "c", "c", "-", "-", "-", "", "s", "s", "i", "g", "g", "i", "o", "o", "c", "c", "u", "u");  
$deger=str_replace($turkce,$duzgun,$nm); 
$url = preg_replace("@[^A-Za-z0-9-_]+@i","",$deger); 
		
	

        $post_array['seo_name'] = $url;


        return $post_array;



    }

}












function urun_arsiv()
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin');
            }
            else{echo $this->messages->To_Register('admin');}

        }

        else{

            $crud = new grocery_CRUD();
            $crud->where('status','0');
            $crud->set_theme('datatables');
            $crud->set_table('tkn_mat_products');
            $crud->set_relation('cat_id','tkn_mat_categories','cat_name');
            //   $crud->set_relation('product_type','tkn_mat_product_type','type');
            $crud->columns('product_name','cat_id','code');
            $crud->display_as('packet','Ürün Adedi');
            $crud->display_as('product_name','Ürün Adı');
            $crud->display_as('cat_id','Kategori');
            $crud->display_as('code','Ürün Kodu');
            $crud->display_as('home','Anasayfa Görünümü');
            $crud->display_as('discount','İndirim Görünümü');
            $crud->display_as('advice','Önerilen Ürünler Görünümü');
            $crud->display_as('discount_rate','İndirim Oranı');
            $crud->display_as('price_false','İndirim Öncesi Fiyatı');
            $crud->display_as('stock','Stok');
            $crud->display_as('img_1','Resim 1');
            $crud->display_as('img_2','Resim 2');
            $crud->display_as('img_3','Resim 3');
            $crud->display_as('img_4','Resim 4');
            $crud->display_as('img_5','Resim 5');
            $crud->display_as('price','Ürün Kdv Dahil Fiyatı (Format:50 yada 65.50)');
            $crud->display_as('price_out','Ürün Kdv  Dahil  Fiyatı (Bayilere özel) (Format:50 yada 65.50)');
            $crud->display_as('prc_tx','Ürün kdv hariç fiyatı (Format:50 yada 65.50)');
            $crud->display_as('prc_out_tx','Ürün kdv hariç fiyatı( Bayilere özel Format:50 yada 65.50)');
            $crud->display_as('attribute','Ürün Özellikleri');




            $crud->display_as('product_file','Ürün Müşteri Dosyası');
            $crud->display_as('seo_keywords','Anahtar Kelimeler');
            $crud->display_as('seo_content','Açıklama');
            $crud->display_as('guarantee','Garanti Durumu');
            $crud->display_as('p_code','Ürün Özel Kodu');
            $crud->display_as('status','Durum');
            $crud->field_type('status','dropdown',
                array('0' => 'pasif', '1' => 'aktif'));
            $crud->field_type('home','dropdown',
                array('0' => 'pasif', '1' => 'aktif'));
            $crud->field_type('discount','dropdown',
                array('0' => 'pasif', '1' => 'aktif'));
            $crud->field_type('advice','dropdown',
                array('0' => 'pasif', '1' => 'aktif'));

            $crud->required_fields('name','code','attribute','img_1','img_2');
            $crud->set_field_upload('img_1','assets/uploads/files');
            $crud->set_field_upload('img_2','assets/uploads/files');
            $crud->set_field_upload('img_3','assets/uploads/files');
            $crud->set_field_upload('img_4','assets/uploads/files');
            $crud->set_field_upload('img_5','assets/uploads/files');

            $crud->unset_delete();





            $state = $crud->getState();
            if($state == "insert")
            {

                $crud->callback_before_insert(array($this,'insert_code'));

                $crud->unset_edit_fields('seo_name');
            }
            if($state == "update")
            {
                $crud->callback_before_update(array($this,'insert_code'));

            }
            if($state == "add")
            {
                $crud->callback_before_update(array($this,'insert_code'));


                $crud->unset_fields('product_file','p_code','seo_name','prc_out_tx','price_out');


            }
            if($state == "edit")
            {
                $crud->unset_edit_fields('product_file','p_code','seo_name','prc_out_tx','price_out');

            }
            if($state == "read")
            {
                $crud->unset_fields('product_file','p_code','prc_out_tx','price_out');

            }


            $crud->callback_before_insert(array($this,'insert_seo4'));
            $crud->callback_before_update(array($this,'insert_seo4'));


            $data['side_menu']="urun";
            $data['kilavuz']="  <b>Ürünler</b>";
            $output = $crud->render();
            $output->data=$data;

            $this->_example_output($output);
        }


    }






function insert_code($post_array, $primary_key = null)
{
    $online=$this->session->userdata('adminonline');
    if(empty($online))
    {
        $this->load->library('messages');
        $this->load->model('admin_model');
        $sonuc=$this->admin_model->admin_query();

        if($sonuc){
            echo $this->messages->To_Login('admin');
        }
        else{echo $this->messages->To_Register('admin');}

    }

    else{


            $this->load->library('code');
            $post_array['p_code'] =$$data['code']=$this->code->code(8,0,0);



        $tax=$post_array['prc_tx']/100;
        $tax=$tax*18;
        $post_array['price']=$post_array['prc_tx']+$tax;
        $post_array['price']=round($post_array['price'],2);



        $tax=$post_array['prc_out_tx']/100;
        $tax=$tax*18;
        $post_array['price_out']=$post_array['prc_out_tx']+$tax;
        $post_array['price_out']=round($post_array['price_out'],2);

            return $post_array;



    }

}











    function makine()
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin');
            }
            else{echo $this->messages->To_Register('admin');}

        }

        else{

            $crud = new grocery_CRUD();
           
            $crud->set_theme('datatables');
            $crud->set_table('tkn_mat_makine');
            $crud->set_relation('cat_id','tkn_mat_categories','cat_name');
            //   $crud->set_relation('product_type','tkn_mat_product_type','type');
            $crud->columns('product_name','cat_id','code');
            $crud->display_as('packet','Ürün Adedi');
            $crud->display_as('product_name','Ürün Adı');
            $crud->display_as('cat_id','Kategori');
            $crud->display_as('code','Ürün Kodu');
            $crud->display_as('home','Anasayfa Görünümü');
            $crud->display_as('discount','İndirim Görünümü');
            $crud->display_as('advice','Önerilen Ürünler Görünümü');
            $crud->display_as('discount_rate','İndirim Oranı');
            $crud->display_as('price_false','İndirim Öncesi Fiyatı');
            $crud->display_as('stock','Stok');
            $crud->display_as('img_1','Resim 1');
            $crud->display_as('img_2','Resim 2');
            $crud->display_as('img_3','Resim 3');
            $crud->display_as('img_4','Resim 4');
            $crud->display_as('img_5','Resim 5');
            $crud->display_as('price','Ürün Kdv Dahil Fiyatı (Format:50 yada 65.50)');
            $crud->display_as('price_out','Ürün Kdv  Dahil  Fiyatı (Bayilere özel) (Format:50 yada 65.50)');
            $crud->display_as('prc_tx','Ürün kdv hariç fiyatı (Format:50 yada 65.50)');
            $crud->display_as('prc_out_tx','Ürün kdv hariç fiyatı( Bayilere özel Format:50 yada 65.50)');
            $crud->display_as('attribute','Makine Özellikleri');




            $crud->display_as('product_file','Ürün Müşteri Dosyası');
            $crud->display_as('seo_keywords','Anahtar Kelimeler');
            $crud->display_as('seo_content','Açıklama');
            $crud->display_as('guarantee','Garanti Durumu');
            $crud->display_as('p_code','Ürün Özel Kodu');
            $crud->display_as('status','Durum');
            $crud->field_type('status','dropdown',
                array('0' => 'pasif', '1' => 'aktif'));
            $crud->field_type('home','dropdown',
                array('0' => 'pasif', '1' => 'aktif'));
            $crud->field_type('discount','dropdown',
                array('0' => 'pasif', '1' => 'aktif'));
            $crud->field_type('advice','dropdown',
                array('0' => 'pasif', '1' => 'aktif'));

            $crud->required_fields('name','img_1');
            $crud->set_field_upload('img_1','assets/uploads/files');
            $crud->set_field_upload('img_2','assets/uploads/files');
            $crud->set_field_upload('img_3','assets/uploads/files');
            $crud->set_field_upload('img_4','assets/uploads/files');
            $crud->set_field_upload('img_5','assets/uploads/files');







            $state = $crud->getState();
            if($state == "insert")
            {

                $crud->callback_before_insert(array($this,'insert_code'));

                $crud->unset_edit_fields('seo_name');
            }
            if($state == "update")
            {
                $crud->callback_before_update(array($this,'insert_code'));

            }
            if($state == "add")
            {
                $crud->callback_before_update(array($this,'insert_code'));


                $crud->unset_fields('product_file','p_code','seo_name','marka','stock','prc_tx','prc_out_tx','price','price_out','price_false','discount_rate'
                    ,'guarantee','home','discount','advice','status','olcu','renk','code','img_2','img_3','img_4','img_5','cat_id');


            }
            if($state == "edit")
            {
                $crud->unset_edit_fields('product_file','p_code','seo_name','marka','stock','prc_tx','prc_out_tx','price','price_out','price_false','discount_rate'
                    ,'guarantee','home','discount','advice','status','olcu','renk','code','img_2','img_3','img_4','img_5','cat_id');

            }
            if($state == "read")
            {
                $crud->unset_fields('product_file','p_code','marka','stock','prc_tx','prc_out_tx','price','price_out','price_false','discount_rate'
                    ,'guarantee','home','discount','advice','status','olcu','renk','code','img_2','img_3','img_4','img_5','cat_id');

            }


            $crud->callback_before_insert(array($this,'insert_seo4'));
            $crud->callback_before_update(array($this,'insert_seo4'));


            $data['side_menu']="urun";
            $data['kilavuz']="  <b>Makine</b>";
            $output = $crud->render();
            $output->data=$data;

            $this->_example_output($output);
        }

    }














//Kategori Kontrolleri





    function kategori()
    {


        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin');
            }
            else{echo $this->messages->To_Register('admin');}

        }

        else{




            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('tkn_mat_categories');
            $crud->columns('cat_name');
            $crud->display_as('cat_name','Kategori Adı');
            $crud->display_as('keywords','Anahtar Kelime');
            $crud->display_as('img','Resim 1140*642');
            $crud->set_field_upload('img','assets/uploads/files');
            $crud->required_fields('cat_name');
	
            $crud->field_type('ust_kategori','dropdown',
                array('Zımparalama ve Parlatma Cihazları' => 'Zımparalama ve Parlatma Cihazları', 
'Zımparalama ve Parlatma Sarfları' => 'Zımparalama ve Parlatma Sarfları', 
'Metalografik Numune Kesme Cihazları' => 'Metalografik Numune Kesme Cihazları', 
'Bakalite Alma Cihazları' => 'Bakalite Alma Cihazları', 
'Metalografik Numune Kesme Sarfları' => 'Metalografik Numune Kesme Sarfları', 				
'Bakalite Alma Sarf Malzemeleri' => 'Bakalite Alma Sarf Malzemeleri', 				
'NDT' => 'NDT', 
'Üniversal Sertlik Ölçüm Cihazları' => 'Üniversal Sertlik Ölçüm Cihazları', 
'Mikro Sertlik Ölçüm Cihazları' => 'Mikro Sertlik Ölçüm Cihazları', 
'Vickers Sertlik Ölçüm Cihazları' => 'Vickers Sertlik Ölçüm Cihazları', 
'Rockwell Sertlik Ölçüm Cihazları' => 'Rockwell Sertlik Ölçüm Cihazları', 
'Mikro-Makro Sertlik Ölçüm Cihazları' => 'Mikro-Makro Sertlik Ölçüm Cihazları', 
'Taşınabilir Sertlik Ölçüm Cihazları' => 'Taşınabilir Sertlik Ölçüm Cihazları', 				
'Test Blokları' => 'Test Blokları'						
				));

	
			
			$state = $crud->getState();
            if($state == "add")
            {
                $crud->unset_fields('cat_name_seo');
            }
            if($state == "edit")
            {
                $crud->unset_edit_fields('cat_name_seo');
            }
			
			
			
            $crud->callback_before_insert(array($this,'insert_seo'));
            $crud->callback_before_update(array($this,'insert_seo'));




            $data['kilavuz']="  <b>Kategoriler</b>";
            $output = $crud->render();
            $output->data=$data;

            $this->_example_output($output);


        }

    }











 function kategori_2()
    {


        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin');
            }
            else{echo $this->messages->To_Register('admin');}

        }

        else{




            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('tkn_mat_categories_2');
            $crud->columns('cat_name');
            $crud->display_as('cat_name','Kategori Adı');
            $crud->display_as('keywords','Anahtar Kelime');
            $crud->display_as('img','Resim 1140*642');
            $crud->set_field_upload('img','assets/uploads/files');
            $crud->required_fields('cat_name');
	            $crud->set_relation('ust_kategori','tkn_mat_categories','cat_name');		
			
			$state = $crud->getState();
            if($state == "add")
            {
                $crud->unset_fields('cat_name_seo');
            }
            if($state == "edit")
            {
                $crud->unset_edit_fields('cat_name_seo');
            }
			
			
			
            $crud->callback_before_insert(array($this,'insert_seo'));
            $crud->callback_before_update(array($this,'insert_seo'));




            $data['kilavuz']="  <b>Kategoriler</b>";
            $output = $crud->render();
            $output->data=$data;

            $this->_example_output($output);


        }

    }
















function insert_seo($post_array, $primary_key = null)
{
    $online=$this->session->userdata('adminonline');
    if(empty($online))
    {
        $this->load->library('messages');
        $this->load->model('admin_model');
        $sonuc=$this->admin_model->admin_query();

        if($sonuc){
            echo $this->messages->To_Login('admin');
        }
        else{echo $this->messages->To_Register('admin');}

    }

    else{



            $nm = $post_array['cat_name'];

     /*       $url = trim($nm);
            $url = strtolower($url);
            $find = array('<b>', '</b>');
            $url = str_replace ($find, '', $url);
            $url = preg_replace('/<(\/{0,1})img(.*?)(\/{0,1})\>/', 'image', $url);
            $find = array(' ', '"', '&', '&', '\r\n', '\n', '/', '\\', '+', '<', '>');
            $url = str_replace ($find, '-', $url);
            $find = array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ë', 'Ê');
            $url = str_replace ($find, 'e', $url);
            $find = array('í','ì', 'î', 'ï', 'I', 'ı', 'İ', 'Í', 'Ì', 'Î', 'Ï');
            $url = str_replace ($find, 'i', $url);
            $find = array('ó', 'ö', 'Ö', 'ò', 'ô', 'Ó', 'Ò', 'Ô');
            $url = str_replace ($find, 'o', $url);
            $find = array('á', 'ä', 'â', 'à', 'â', 'Ä', 'Â', 'Á', 'À', 'Â');
            $url = str_replace ($find, 'a', $url);
            $find = array('ú', 'ü', 'Ü', 'ù', 'û', 'Ú', 'Ù', 'Û');
            $url = str_replace ($find, 'u', $url);
            $find = array('ç', 'Ç');
            $url = str_replace ($find, 'c', $url);
            $find = array('ş', 'Ş');
            $url = str_replace ($find, 's', $url);
            $find = array('ğ', 'Ğ');
            $url = str_replace ($find, 'g', $url);
            $find = array('Y');
            $url = str_replace ($find, 'y', $url);
            $find = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<[^>]*>/');
            $repl = array('', '-', '');
            $url = preg_replace ($find, $repl, $url);
            $url = str_replace ('--', '-', $url);*/
			
					$turkce=array("ş", "Ş", "ı", "(", ")", "‘", "ü", "Ü", "ö", "Ö", "ç", "Ç", " ", "/", "*", "?", "ş", "Ş", "ı", "ğ", "Ğ", "İ", "ö", "Ö", "Ç", "ç", "ü", "Ü"); 
$duzgun=array("s", "s", "i", "", "", "", "u", "u", "o", "o", "c", "c", "-", "-", "-", "", "s", "s", "i", "g", "g", "i", "o", "o", "c", "c", "u", "u"); 
$deger=str_replace($turkce,$duzgun,$nm); 
$url = preg_replace("@[^A-Za-z0-9-_]+@i","",$deger); 
		
	
			
            $post_array['cat_name_seo'] = $url;

            return $post_array;



    }

}






//Üyelik Kontrolleri

    function tasarim()
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin');
            }
            else{echo $this->messages->To_Register('admin');}

        }

        else{

            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('tkn_mat_users');
            $crud->columns('adi');
			$crud->display_as('img_1','Resim 1');
			$crud->display_as('img_2','Resim 2');
			$crud->display_as('img_3','Resim 3');
			$crud->display_as('img_4','Resim 4');
			$crud->display_as('img_5','Resim 5');
        
			
			$crud->set_field_upload('img_1','assets/uploads/files');
			$crud->set_field_upload('img_2','assets/uploads/files');
			$crud->set_field_upload('img_3','assets/uploads/files');
			$crud->set_field_upload('img_4','assets/uploads/files');
			$crud->set_field_upload('img_5','assets/uploads/files');
			
            $crud->required_fields('adi','aciklama','img_1');


            $data['kilavuz']="  <b>Tasarımcılar</b>";
            $output = $crud->render();
            $output->data=$data;

            $this->_example_output($output);


        
            


        }

    }









    public function uyelik_basvuru()
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin');
            }
            else{echo $this->messages->To_Register('admin');}

        }

        else{


            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('tkn_mat_register_app');
            $crud->columns('comp_name','name','tel');
            $crud->display_as('comp_name','Firma Adı');
            $crud->display_as('name','İlgili Kişi Adı Soyadı');
            $crud->display_as('tax_unit','Vergi Dairesi');
            $crud->display_as('tax_no','Vergi No');
            $crud->display_as('email','E-Mail');
            $crud->display_as('tel','Telefon');
            $crud->display_as('adress','Adres');
            $crud->display_as('msg','Mesaj');
            $crud->display_as('date','Tarih');


            $crud->unset_add();
            $crud->unset_edit();
            $crud->unset_export();
            $crud->unset_print();
            $crud->unset_fields('id');
            $data['side_menu']="Uyelik";
            $data['kilavuz']="  <b>Üyelik Başvuruları</b>";
            $output = $crud->render();
            $output->data=$data;

            $this->_example_output($output);

        }


    }











    function user_control($post_array) {

          $username=$post_array['username'];
        //    $come=1;
          $this->load->model('admin_model');
          $come=$this->admin_model->admin_register_before($username);
        //  if($username==$user2)
        //  $come=$this->admin_model->admin_register_before($username);


    /*    $sor=mysql_query("SELECT * FROM tkn_mat_users Where username=$username");
        While($yaz=mysql_fetch_array($ssor))
        {
            $u_name=$yaz["username"];

        }
*/


        if($come==1)
        {
            return FALSE;
        }
        else
        {
            return TRUE;
        }


    }




    //Bayi Detayları


    function uye_detay()
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin');
            }
            else{echo $this->messages->To_Register('admin');}

        }

        else{

            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('tkn_mat_users');
            $crud->columns('company_name','Özet','Ödeme','Sipariş');
            $crud->display_as('company_name','Firma Adı');
            $crud->callback_column('Özet',array($this,'callback_bayi_ozet'));
            $crud->callback_column('Ödeme',array($this,'callback_bayi_odeme'));
            $crud->callback_column('Sipariş',array($this,'callback_bayi_siparis'));
            $crud->unset_read();
            $crud->unset_edit();
            $crud->unset_add();
            $crud->unset_delete();


            $data['kilavuz']="  <b>Üye Detayları</b>";
            $output = $crud->render();
            $output->data=$data;

            $this->_example_output($output);


        }
    }



    function callback_bayi_ozet($value, $row)
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin');
            }
            else{echo $this->messages->To_Register('admin');}

        }

        else{

            return "<a  class='btn btn-primary'  href='".site_url('admin/uyeozet/'.$row->id)."'> Üye Özeti</a>";
        }

    }




    function callback_bayi_odeme($value, $row)
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin');
            }
            else{echo $this->messages->To_Register('admin');}

        }

        else{

            return "<a class='btn btn-warning' href='".site_url('admin/uyeodeme/'.$row->id)."'> Üye Ödemeleri</a>";
        }

    }







    function callback_bayi_siparis($value, $row)
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin');
            }
            else{echo $this->messages->To_Register('admin');}

        }

        else{

            return "<a class='btn btn-success' href='".site_url('admin/uyesiparis/'.$row->id)."'> Üye Siparişleri</a>";
        }

    }







    function uyeozet($id=null)
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin');
            }
            else{echo $this->messages->To_Register('admin');}

        }

        else{
            $data['kilavuz']="  <b>Üye Özetleri</b>";


            $id1=$id;
            $data['id'] = $id;
            $this->load->Model('admin_model', 'Model');
            $data['info'] = $this->Model->users_info_get($id1);
            $data['order_total'] = $this->Model->users_order_total($id1);
            $data['payment_total'] = $this->Model->users_payment_total($id1);

            $this->load->view('user_summary',$data);




        }

    }







    function uyeodeme($id=null)
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin');
            }
            else{echo $this->messages->To_Register('admin');}

        }

        else{


            $crud = new grocery_CRUD();
            $crud->where('user_id',$id);
            $crud->set_theme('datatables');
            $crud->set_table('tkn_mat_payments');
            $crud->columns('user_id','date','amount');
            $crud->display_as('user_id','Üye Adı');
            $crud->display_as('date','Tarih');
            $crud->display_as('amount','Miktar');
            $crud->set_relation('user_id','tkn_mat_users','company_name');


            $crud->unset_read();
            $crud->unset_edit();
            $crud->unset_add();
            $crud->unset_delete();

            $this->load->Model('admin_model', 'Model');
            $data['payment_total'] = $this->Model->user_payment($id);
            $data['kilavuz']="<b>Üye Ödemeleri</b>";
            $output = $crud->render();
            $output->data=$data;

             $this->_example_output($output);


        }

    }




    function uyesiparis($id=null)
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin');
            }
            else{echo $this->messages->To_Register('admin');}

        }

        else{

            $crud = new grocery_CRUD();

            $crud->where('user_id',$id);
            $crud->order_by('date','desc');
            $crud->set_theme('datatables');
            $crud->set_table('tkn_mat_orders');
      //    $crud->set_subject('Bayinin Tüm Siparişleri');
            $crud->columns('date','user_id','product_id','total','top_value');
            $crud->set_relation('user_id','tkn_mat_users','company_name');
            $crud->set_relation('product_id','tkn_mat_products','product_code');
            $crud->display_as('user_id','Üye Adı');
            $crud->display_as('product_id','Ürün Adı');
            $crud->display_as('total','Adet');
            $crud->display_as('top_value','Değer');
            $crud->display_as('date','Tarih');
            $crud->display_as('info','Sipariş Bilgisi');
            $crud->display_as('cargo_name','Kargo Adı');
            $crud->display_as('cargo_date','Kargo Tarihi');
            $crud->display_as('cargo_no','Kargo Numarası');
            $crud->display_as('order_no','Sipariş Numarası');
            $crud->display_as('payment_status','Ödeme Durumu');
            $crud->display_as('product_type','Ürün Türü');
            $crud->unset_edit_fields('order_status','finishing_status');

            $crud->unset_add();
            $crud->unset_delete();
            $crud->unset_edit();

            $data['kilavuz']="  <b>Üye Siparişleri</b>";
            $output = $crud->render();
            $output->data=$data;

            $this->_example_output($output);

        }

    }









    //Siparişler


















    public function callback_sipuretimdurum($value, $row)
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin');
            }
            else{echo $this->messages->To_Register('admin');}

        }

        else{
            return "<a  class='tn btn-success'  href='".site_url('admin/siptamam/'.$row->sid)."'>$value Tamamla</a>";

        }


    }




    function siptamam($id=null)
    {
        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin');
            }
            else{echo $this->messages->To_Register('admin');}

        }

        else{


            $this->load->library('messages');
            $this->load->model('admin_model');
            $return=$this->admin_model->ordermake_true($id);

            if($return){
                echo $this->messages->order_true('admin/siparis_1');
            }
            else{echo $this->messages->order_unsucces('admin/siparis_1');}





        }}
















    function siparis_0()
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin');
            }
            else{echo $this->messages->To_Register('admin');}

        }

        else{

            $crud = new grocery_CRUD();

            $crud->where('order_status','0');
            $crud->order_by('date','desc');
            $crud->set_theme('datatables');
            $crud->set_table('tkn_mat_orders');
            $crud->columns('date','user_id','product_id','total','top_value','İşlem');
            $crud->set_relation('user_id','tkn_mat_users','company_name');
            $crud->set_relation('product_id','tkn_mat_products','code');

            $crud->display_as('user_id','Üye Adı');
            $crud->display_as('product_id','Ürün Kodu');
            $crud->display_as('total','Adet');
            $crud->display_as('attribute','Sipariş Özellikleri');
            $crud->display_as('top_value','Toplam Değer');
            $crud->display_as('date','Tarih');
            $crud->display_as('order_no','Sipariş Numarası');
            $crud->display_as('order_status','Sipariş Durumu');
            $crud->display_as('payment_status','Ödeme Durumu');
            $crud->display_as('product_type','Ürün Türü');
            $crud->display_as('client_file','Kullanıcı Dosyası (Kullanıcıdan gelen çalışma dosyası)');







            $crud->display_as('p_code','Ürün kodu');
            $crud->display_as('info','Sipariş Bilgisi');
            $crud->display_as('offer_name','Teklif Adı

               <br><br>
                  <input type=button onclick="window.print()" value=" Bu sayfayı yazdır">


            ');

            $crud->unset_fields('order_status','p_code','finishing_status','cargo_name','cargo_no','cargo_date');



            $crud->callback_column('İşlem',array($this,'callback_sipbekledurum'));
            $crud->unset_add();
            $crud->unset_delete();
            $crud->unset_edit();
            $data['side_menu']="siparis";
            $data['kilavuz']="  <b>Onay Bekleyen Siparişler</b>";
            $output = $crud->render();
             $output->data=$data;

                 $this->_example_output($output);


        }

    }



    function siparis_1()
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin');
            }
            else{echo $this->messages->To_Register('admin');}

        }

        else{

            $crud = new grocery_CRUD();

            $crud->where('order_status','1');
            $crud->order_by('date','desc');
            $crud->set_theme('datatables');
            $crud->set_table('tkn_mat_orders');
            $crud->columns('date','user_id','product_id','total','top_value','İşlem');
            $crud->set_relation('product_id','tkn_mat_products','code');
            $crud->set_relation('user_id','tkn_mat_users','company_name');
            $crud->display_as('user_id','Firma Adı');
            $crud->display_as('product_id','Ürün Adı');
            $crud->display_as('total','Adet');
            $crud->display_as('top_value','Toplam Değer');
            $crud->display_as('attribute','Sipariş Özellikleri');
            $crud->display_as('date','Tarih');
            $crud->display_as('order_no','Sipariş Numarası');
            $crud->display_as('payment_status','Ödeme Durumu');
            $crud->display_as('order_status','Sipariş Durumu');
            $crud->display_as('cargo_name','Kargo Adı');
            $crud->display_as('cargo_date','Kargo Adı');
            $crud->display_as('cargo_no','Kargo Numarası');
            $crud->display_as('client_file','Kullanıcı Dosyası (Ürün türü özel ise Kullanıcıdan gelen çalışma dosyası)');
            $crud->unset_fields('order_status');
            $crud->callback_column('İşlem',array($this,'callback_sipuretimdurum'));



            $crud->display_as('p_code','Ürün kodu');
            $crud->display_as('info','Sipariş Bilgisi');
            $crud->unset_fields('order_status','p_code','finishing_status');

            $crud->unset_add();
            $crud->unset_delete();
            $crud->unset_edit();
            $data['side_menu']="siparis";
            $data['kilavuz']="  <b>Üretimdeki Siparişler</b>";
            $output = $crud->render();
            $output->data=$data;

            $this->_example_output($output);


        }

    }



    public function callback_sipbekledurum($value, $row)
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin');
            }
            else{echo $this->messages->To_Register('admin');}

        }

        else{
            $status=$row->order_status;
            if($status==0){return "<a class='tn btn-primary' href='".site_url('admin/sipbekleonay/'.$row->sid)."'>$value Onayla</a>
            <a  class='tn btn-success' href='".site_url('admin/sipbeklered/'.$row->sid)."'>$value Reddet</a>";}
            else if($status==1){return "Onaylandı";}
            else if($status==2){return "Reddedildi";}
        }


    }




    function sipbekleonay($id=null)
    {
        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin');
            }
            else{echo $this->messages->To_Register('admin');}

        }

        else{


            $this->load->library('messages');
            $this->load->model('admin_model');
            $return=$this->admin_model->orderwait_true($id);

            if($return){
                echo $this->messages->order_true('admin/siparis_0');
            }
            else{echo $this->messages->order_false('admin/siparis_0');}





        }}






    function sipbeklered($id=null)
    {
        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin');
            }
            else{echo $this->messages->To_Register('admin');}

        }

        else{
            $this->load->library('messages');
            $this->load->model('admin_model');
            $return=$this->admin_model->orderwait_false($id);

            if($return){
                echo $this->messages->order_false('admin/siparis_0');
            }
            else{echo $this->messages->order_false('admin/siparis_0');}

        }}





    function siparis_bit()
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin');
            }
            else{echo $this->messages->To_Register('admin');}

        }

        else{

            $crud = new grocery_CRUD();

            $crud->where('order_status','2');
            $crud->order_by('date','desc');
            $crud->set_theme('datatables');
            $crud->set_table('tkn_mat_orders');
            $crud->columns('date','user_id','product_id','total','top_value');
            $crud->set_relation('user_id','tkn_mat_users','company_name');
            $crud->set_relation('product_id','tkn_mat_products','code');
            $crud->display_as('user_id','Firma Adı');
            $crud->display_as('product_id','Ürün Adı');
            $crud->display_as('total','Adet');
            $crud->display_as('top_value','Toplam Değer');
            $crud->display_as('attribute','Sipariş Özellikleri');
            $crud->display_as('date','Tarih');
            $crud->display_as('order_no','Sipariş Numarası');
            $crud->display_as('payment_status','Ödeme Durumu');
            $crud->display_as('product_type','Ürün Türü');
            $crud->display_as('c_name','Kargo Adı');
            $crud->display_as('c_no','Kargo Numarası');
            $crud->display_as('client_file','Kullanıcı Dosyası (Ürün türü özel ise Kullanıcıdan gelen çalışma dosyası)');



            $crud->display_as('p_code','Ürün kodu');
            $crud->display_as('info','Sipariş Bilgisi');
            $crud->display_as('offer_name','Teklif Adı');
            $crud->display_as('cargo_name','Kargo Adı');
            $crud->display_as('cargo_date','Kargo Adı');
            $crud->display_as('cargo_no','Kargo Numarası

               <br><br>
                  <input type=button onclick="window.print()" value=" Bu sayfayı yazdır">


            ');

            $crud->unset_fields('order_status','p_code','finishing_status');

            $state = $crud->getState();
            if($state == "edit")
            {
                $crud->unset_edit_fields('user_id','product_id','total','top_value','date','order_no','client_file','order_status','payment_status','info','p_code','offer_name');

            }


            $crud->unset_add();
            $crud->unset_delete();

            $data['side_menu']="siparis";
            $data['kilavuz']="  <b>Tamamlanan Siparişler</b>";
            $output = $crud->render();
            $output->data=$data;

                $this->_example_output($output);


        }

    }




    function siparis_red()
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin');
            }
            else{echo $this->messages->To_Register('admin');}

        }

        else{

            $crud = new grocery_CRUD();
            $crud->where('order_status','3');
            $crud->order_by('date','desc');
            $crud->set_theme('datatables');
            $crud->set_table('tkn_mat_orders');
            $crud->columns('date','user_id','product_id','total','top_value');
            $crud->set_relation('user_id','tkn_mat_users','company_name');
            $crud->set_relation('product_id','tkn_mat_products','code');
            $crud->display_as('user_id','Firma Adı');
            $crud->display_as('product_id','Ürün Adı');
            $crud->display_as('total','Adet');
            $crud->display_as('top_value','Toplam Değer');
            $crud->display_as('date','Tarih');
            $crud->display_as('order_no','Sipariş Numarası');
            $crud->display_as('attribute','Sipariş Özellikleri');
            $crud->display_as('payment_status','Ödeme Durumu');
            $crud->display_as('product_type','Ürün Türü');
            $crud->display_as('client_file','Kullanıcı Dosyası (Ürün türü özel ise Kullanıcıdan gelen çalışma dosyası)');


            $crud->display_as('p_code','Ürün kodu');
            $crud->display_as('info','Sipariş Bilgisi');
            $crud->display_as('offer_name','Teklif Adı');
            $crud->display_as('cargo_name','Kargo Adı');
            $crud->display_as('cargo_date','Kargo Adı');
            $crud->display_as('cargo_no','Kargo Numarası

               <br><br>
                  <input type=button onclick="window.print()" value=" Bu sayfayı yazdır">



            ');

            $crud->unset_fields('order_status','p_code','finishing_status','cargo_name','cargo_no','cargo_date');



            $crud->unset_add();

            $crud->unset_edit();
            $data['side_menu']="siparis";
            $data['kilavuz']="  <b>Reddedilen Siparişler</b>";
            $output = $crud->render();
            $output->data=$data;

          $this->_example_output($output);


        }

    }







//Hesap Kontrolleri



    function hesap()
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin');
            }
            else{echo $this->messages->To_Register('admin');}

        }

        else{
            $dt1=$this->input->post('min',TRUE);
            $dt2=$this->input->post('max',TRUE);

            if(($dt1=="")or($dt2=="")){$dt1="1950.01.01"; $dt2="2050.12.29";

                $data['val']=0;
            }
            else{
                $veriler1 = explode(".",$dt1);
                $dt1=$veriler1[2]."-".$veriler1[1]."-".$veriler1[0];

                $veriler2 = explode(".",$dt2);
                $dt2=$veriler2[2]."-".$veriler2[1]."-".$veriler2[0];

                $data['val']=1;
            }

            $this->load->Model('admin_model', 'Model');
           $data['options'] = $this->Model->admin_info();
            $data['orders'] = $this->Model->order_info($dt1,$dt2);



            $data['kilavuz']="  <b>Hesaplar</b>";


          $this->load->view('admin_calculate',$data);





        }

    }

    function istatistik()
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin');
            }
            else{echo $this->messages->To_Register('admin');}

        }

        else{

            $data['kilavuz']="  <b>İstatistikler</b>";
            $this->load->Model('admin_model');
            $data['order_stats']=$this->load->admin_model->order_stats() ;
                $data['order_stats2']=$this->load->admin_model->order_stats_total() ;
            $data['order_stats3']=$this->load->admin_model->order_stats_user() ;
            $data['order_stats4']=$this->load->admin_model->order_stats_user_total_value() ;
            $data['order_stats5']=$this->load->admin_model->order_stats_user_total() ;
            $data['order_stats6']=$this->load->admin_model->order_stats_top() ;
            $data['order_stats7']=$this->load->admin_model->order_stats_year() ;
            $data['order_stats8']=$this->load->admin_model->order_stats_year_topval() ;
            $data['order_stats9']=$this->load->admin_model->order_stats_year_new_users() ;
            $data['order_stats10']=$this->load->admin_model->order_stats_year_visitors() ;
            $data['order_stats11']=$this->load->admin_model->order_stats_year_order_total() ;
            $data['homepage_info1']=$this->load->admin_model->waiting_order() ;
            $data['homepage_info2']=$this->load->admin_model->making_order() ;
            $data['homepage_info3']=$this->load->admin_model->finishing_order() ;
            $data['homepage_info4']=$this->load->admin_model->rejected_order() ;
            $data['last_orders']=$this->load->admin_model->last_orders() ;
            $data['last_offers']=$this->load->admin_model->last_offers() ;

            $this->load->view('stats',$data);



    }

    }










    function arama()
    {


        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin');
            }
            else{echo $this->messages->To_Register('admin');}

        }

        else{

            $search=$this->input->post('search', TRUE);

              if(strlen($search)<=3){
                  $this->load->library('messages');
                  echo $this->messages->search_error('admin');
              }
         else{
            $this->load->model('admin_model','Model');
            $data["announce"]=$this->Model->search_announce($search);

            $data["bank"]=$this->Model->search_bank($search);
            $data["categories"]=$this->Model->search_categories($search);

            $data["contact"]=$this->Model->search_contact($search);
            $data["products"]=$this->Model->search_products($search);
            $data["survey"]=$this->Model->search_survey($search);
            $data["ticket"]=$this->Model->search_ticket($search);
            $data["users"]=$this->Model->search_users($search);
            $data["search_key"]=$search;
            $this->load->view('search',$data);
             }
        }

    }















}
?>