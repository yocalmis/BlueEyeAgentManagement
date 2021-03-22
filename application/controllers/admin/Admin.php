<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
	
	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');

		$this->load->library('grocery_CRUD');
		
		
	if($this->session->userdata('admin_dil')==""){
		$this->session->set_userdata('admin_dil',"en");
	}	
		
		
		

	}
	
  public function index()
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {

            $this->load->model('admin/admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){$this->load->view('admin/admin_login');}
            else{$this->load->view('admin/admin_register');}

        }

        else{
      
/*
            $this->load->library('messages');
            $this->messages->config('admin/ayar/edit/1');
*/



// Giriş Sayfası	$this->load->model('');

 //   echo "Anasayfa";

 //   $this->ayar('edit/1');
   

            $this->load->library('messages');
            $this->messages->config('admin/admin/ayar/edit/1');

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

        echo $this->messages->Pass_Error('admin/admin');

	}
	else{

/*
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

*/

echo $this->messages->False_Add('admin/admin');


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
	$this->load->model('admin/admin_model');
	$return=$this->admin_model->admin_return($data);

	


	if($return)
	{
		
	$admin_status_getir=$this->admin_model->admin_status_getir($username);			
		
		
	$this->session->set_userdata('adminonline',$username);
    $online=$this->session->userdata('adminonline');
	
	$this->session->set_userdata('admin_status',$admin_status_getir);
    $admin_status=$this->session->userdata('admin_status');	
	


        echo $this->messages->Welcome('admin/admin',$online);

	}

	else{

        echo $this->messages->Welcome_False('admin/admin');


	}


	}






    //Admin ��




 function cikis()
	{
    $this->load->library('messages');
	$this->session->unset_userdata('adminonline');

        echo $this->messages->Logout('admin/admin');



	}




    public function ayar($edit=null,$id=null)
    {


        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin/admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin/admin');
            }
            else{echo

            $this->messages->To_Register('admin/admin');}

        }

        else{




              $crud = new grocery_CRUD();         
   
   $state = $crud->getState();
$state_info = $crud->getStateInfo();
 
if($state == 'add')
{
//Do your cool stuff here . You don't need any State info you are in add


				$this->load->library('messages');
                echo $this->messages->config('admin/admin/ayar/edit/1');
return FALSE;

}
elseif($state == 'edit')
{
$primary_key = $state_info->primary_key;


          if($primary_key!=1)
        {
			
				$this->load->library('messages');
                echo $this->messages->config('admin/admin/ayar/edit/1');
			
 }

 }

elseif($state == 'delete')
{
                $primary_key = $state_info->primary_key;
			
				$this->load->library('messages');
                echo $this->messages->config('admin/admin/ayar/edit/1');
                return FALSE;



 }
elseif($state == 'read')
{
                $primary_key = $state_info->primary_key;
			
				$this->load->library('messages');
                echo $this->messages->config('admin/admin/ayar/edit/1');
                return FALSE;



 }
elseif($state == 'copy')
{
                $primary_key = $state_info->primary_key;
			
				$this->load->library('messages');
                echo $this->messages->config('admin/admin/ayar/edit/1');
                return FALSE;



 }
else
{

            
}

            $crud->set_theme('datatables');
            $crud->set_table('tkn_mat_options');
            $crud->set_subject('Ayarlar');
            $crud->columns('facebook','twitter','instagram','email','tel_1');
            $crud->display_as('web_url','Site adresi');	
            $crud->display_as('email','E-Mail');
            $crud->display_as('tel_1','Telefon');
            $crud->display_as('tel_2','Telefon 2');
            $crud->display_as('fax','Fax');
            $crud->display_as('company_name','Yetkili Kişi');
            $crud->display_as('adress','Adres');
            $crud->display_as('home_slogan','Anasayfa Üst Slogan');			
            $crud->display_as('seo_keywords','Anahtar Kelimeler');
            $crud->display_as('maps','Google Harita Linki');	
            $crud->display_as('home_photo','Anasayfa Üst Resim 1920*1080');	

            $crud->display_as('otel_photo','Otel Üst Resim 1920*1080');	
            $crud->display_as('otel_slogan','Otel Üst Slogan');				
			
            $crud->required_fields('web_url','email','tel_1','company_name','home_photo','otel_photo');
			$crud->set_field_upload('home_photo','assets/resimler/home');	
			$crud->set_field_upload('otel_photo','assets/resimler/home');			
            $crud->unset_add();
            $crud->unset_read();
            $crud->unset_delete();
            $crud->unset_export();
            $crud->unset_print();
            $crud->unset_back_to_list();

	if($this->session->userdata('admin_dil')=="en"){
	$crud->unset_fields("kisa_aciklama_tr","uzun_aciklama_tr","home_slogan_tr","otel_slogan_tr","site_slogan_tr"
	,"kisa_aciklama_ru","uzun_aciklama_ru","home_slogan_ru","otel_slogan_ru","site_slogan_ru"
	,"kisa_aciklama_esp","uzun_aciklama_esp","home_slogan_esp","otel_slogan_esp","site_slogan_esp");
	}
	else if($this->session->userdata('admin_dil')=="tr"){
            $crud->display_as('home_slogan_tr','Anasayfa Üst Slogan tr');		
		$crud->unset_fields("kisa_aciklama_ru","uzun_aciklama_ru","home_slogan_ru","otel_slogan_ru","site_slogan_ru"
		,"kisa_aciklama_esp","uzun_aciklama_esp","home_slogan_esp","otel_slogan_esp","site_slogan_esp");
	
	}	
	else if($this->session->userdata('admin_dil')=="ru"){
		   $crud->display_as('home_slogan_ru','Anasayfa Üst Slogan ru');	
	$crud->unset_fields("kisa_aciklama_tr","uzun_aciklama_tr","home_slogan_tr","otel_slogan_tr","site_slogan_tr"
	,"kisa_aciklama_esp","uzun_aciklama_esp","home_slogan_esp","otel_slogan_esp","site_slogan_esp");
	}

	else if($this->session->userdata('admin_dil')=="esp"){
		   $crud->display_as('home_slogan_esp','Anasayfa Üst Slogan İsp');	
	$crud->unset_fields("kisa_aciklama_tr","uzun_aciklama_tr","home_slogan_tr","otel_slogan_tr","site_slogan_tr"
	,"kisa_aciklama_ru","uzun_aciklama_ru","home_slogan_ru","otel_slogan_ru","site_slogan_ru");
	}
	
	else {  
	$crud->unset_fields("kisa_aciklama_tr","uzun_aciklama_tr","home_slogan_tr","otel_slogan_tr","site_slogan_tr"
	,"kisa_aciklama_ru","uzun_aciklama_ru","home_slogan_ru","otel_slogan_ru","site_slogan_ru"
	,"kisa_aciklama_esp","uzun_aciklama_esp","home_slogan_esp","otel_slogan_esp","site_slogan_esp");
	}
	
	
	

            $data['side_menu']="ayar";
            $data['kilavuz']="  <b>Sistem Ayarları</b>";
            $output = $crud->render();
            $output->data=$data;
          //  $this->_example_output($output);
		$this->load->view('admin/index',(array)$output);
       




}
             }


	
	
	
	
	
	
	
	
	
	

    //Admin Bilgileri


    public function bilgi($edit=null,$id=null)
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin/admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin/admin');
            }
            else{echo $this->messages->To_Register('admin/admin');}

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
        $crud->required_fields('name','pass','email','username');
		
        $crud->unset_add();
        $crud->unset_read();
        $crud->unset_delete();
        $crud->unset_export();
        $crud->unset_print();
        $crud->unset_back_to_list();
        $crud->unset_fields('status');
       $crud->change_field_type('pass','password');
       $crud->callback_before_update(array($this,'encrypt_password_callback'));

	   


         $data['side_menu']="ayar";
         $data['kilavuz']="  <b>Admin Bilgi Ayarları</b>";
         $output = $crud->render();
         $output->data=$data;
          //  $this->_example_output($output);
		$this->load->view('admin/index',(array)$output);


        }
        else{
                $this->load->library('messages');
                echo $this->messages->config('admin/admin/bilgi/edit/1');

        }

        }
    }



function encrypt_password_callback($post_array, $primary_key = null)
{
    $online=$this->session->userdata('adminonline');
    if(empty($online))
    {
        $this->load->library('messages');
        $this->load->model('admin/admin_model');
        $sonuc=$this->admin_model->admin_query();

        if($sonuc){
            echo $this->messages->To_Login('admin/admin');
        }
        else{echo $this->messages->To_Register('admin/admin');}

    }

    else{

        if($post_array['pass']==''){return false;}
        else{

            $post_array['pass'] = md5($post_array['pass']);
            return $post_array;

        }

}

}




	    //Admin Bilgileri


    public function uyeler()
    {

        $online=$this->session->userdata('adminonline');
		$admin_status=$this->session->userdata('admin_status');	
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin/admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin/admin');
            }
            else{echo $this->messages->To_Register('admin/admin');}

        }

        else{
			
			
			
	        $this->load->library('messages');
			if($admin_status==1){
			   echo $this->messages->config('admin/admin');	
			
			}

        $crud = new grocery_CRUD();
        $crud->set_theme('datatables');
        $crud->set_table('acente_uyeler');
        $crud->set_subject('Üyeler');
        $crud->columns('name','username','pass','email','status');
        $crud->display_as('name','Adı Soyadı');
        $crud->display_as('username','Kullanıcı Adı');
        $crud->display_as('pass','Şifre (Eski veya yeni şifre)');
        $crud->display_as('email','E-Mail');
        $crud->display_as('status','Üye Durumu');
        $crud->required_fields('name','pass','email','username');
		$crud->change_field_type('pass','password');
        $crud->field_type('status','dropdown',
                array('1' => 'Aktif', '0' => 'Pasif'));		
		
        $crud->callback_before_update(array($this,'encrypt_password_callback'));



         $data['side_menu']="Üyeler";
         $data['kilavuz']="  <b>Üye Bilgi Ayarları</b>";
         $output = $crud->render();
         $output->data=$data;
         //  $this->_example_output($output);
		$this->load->view('admin/index',(array)$output);


      

        }
    }
	
	
	  public function yorumlar_aktif_pasif()
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin/admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin/admin');
            }
            else{echo $this->messages->To_Register('admin/admin');}

        }

        else{

     

        $crud = new grocery_CRUD();
        $crud->set_theme('datatables');
        $crud->set_table('acente_yorumlar');
        $crud->set_subject('Yorumlar');
        $crud->columns('tur_id','kullanici_id','baslik','yorum','durum');
        $crud->display_as('tur_id','Tur');
        $crud->display_as('kullanici_id','Kullanıcı Adı');
		$crud->unset_add();
 		$crud->unset_edit_fields("tur_id","tur_kod","kullanici_id","baslik","yorum","tarih");
		$crud->set_relation('tur_id','acente_tur','adi');
		$crud->set_relation('kullanici_id','acente_uyeler','username');	
        $crud->field_type('durum','dropdown',
                array('1' => 'Aktif', '0' => 'Pasif'));		


         $data['side_menu']="Yorumlar";
         $data['kilavuz']="  <b>Yorum Ayarları</b>";
         $output = $crud->render();
         $output->data=$data;
         //  $this->_example_output($output);
		$this->load->view('admin/index',(array)$output);


      

        }
    }
	
	
	  //Admin Bilgileri
	  
	  
	    public function ana_kategori()
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin/admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin/admin');
            }
            else{echo $this->messages->To_Register('admin/admin');}

        }

        else{

     

        $crud = new grocery_CRUD();
        $crud->set_theme('datatables');
        $crud->set_table('acente_one_category');
        $crud->set_subject('Ana Kategoriler');
        $crud->columns('adi','durum');
        $crud->display_as('status','Üye Durumu');
        $crud->display_as('anahtar','Anahtar Kelimeler');
        $crud->display_as('resim','Resim 1920*1080');		
        $crud->display_as('resim_2','Resim 720*520');	
        $crud->display_as('one_cikan','One cıkan tur');		
        $crud->required_fields('adi','resim','resim_2','durum','durum','aciklama');
        $crud->field_type('durum','dropdown',
                array('1' => 'Aktif', '0' => 'Pasif'));	
		        $crud->field_type('one_cikan','dropdown',
                array('1' => 'Evet', '0' => 'Hayır'));
		        $crud->field_type('one_cikan_otel','dropdown',
                array('1' => 'Evet', '0' => 'Hayır'));
				
         $crud->set_field_upload('resim','assets/resimler/sehirler');	
         $crud->set_field_upload('resim_2','assets/resimler/sehirler');	
		 
	if($this->session->userdata('admin_dil')=="en"){
	$crud->unset_fields("adi_tr","aciklama_tr","adi_ru","aciklama_ru","adi_esp","aciklama_esp");
	}
	else if($this->session->userdata('admin_dil')=="tr"){
	$crud->unset_fields("adi_ru","aciklama_ru","adi_esp","aciklama_esp");
	}	
	else if($this->session->userdata('admin_dil')=="ru"){
	$crud->unset_fields("adi_tr","aciklama_tr","adi_esp","aciklama_esp");
	}	
	
	else if($this->session->userdata('admin_dil')=="esp"){
	$crud->unset_fields("adi_tr","aciklama_tr","adi_ru","aciklama_ru");
	}		
	
	else {
	$crud->unset_fields("adi_tr","aciklama_tr","adi_ru","aciklama_ru","adi_esp","aciklama_esp");		
	}

		 
		 
		$crud->field_type('seo_adi', 'hidden');
	
		$crud->callback_before_insert(array($this,'insert_seo'));
		$crud->callback_before_update(array($this,'insert_seo'));
		$crud->unset_clone();		


         $data['side_menu']="Ana Kategoriler";
         $data['kilavuz']="  <b>Ana Kategoriler Ayarları</b>";
         $output = $crud->render();
         $output->data=$data;
         //  $this->_example_output($output);
		$this->load->view('admin/index',(array)$output);


      

        }
    }  
	  
	  
	  
	  
	  


    public function kategori()
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin/admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin/admin');
            }
            else{echo $this->messages->To_Register('admin/admin');}

        }

        else{

     

        $crud = new grocery_CRUD();
        $crud->set_theme('datatables');
        $crud->set_table('acente_category');
        $crud->set_subject('Alt Kategoriler');
        $crud->columns('adi','ust_kategori_id','durum');
        $crud->display_as('status','Üye Durumu');
        $crud->display_as('anahtar','Anahtar Kelimeler');	
        $crud->display_as('ust_kategori_id','Üst Kategori');
        $crud->display_as('resim','Resim 1920*1080');	
        $crud->display_as('resim_2','Resim 720*520');	
		
        $crud->display_as('ek_zaman','Ne zaman ziyaret edilir ?');	
        $crud->display_as('ek_ucret','Ücret ne kadar ?');	
        $crud->display_as('ek_rehber','Rehbere gerek var mı ?');	
        $crud->display_as('ek_ulasim','Nasıl Gidilir ?');	
        $crud->display_as('ek_ipucu','Ekstra İpuçları');		

        $crud->display_as('ek_zaman_tr','Ne zaman ziyaret edilir ? tr');	
        $crud->display_as('ek_ucret_tr','Ücret ne kadar ? tr');	
        $crud->display_as('ek_rehber_tr','Rehbere gerek var mı ? tr');	
        $crud->display_as('ek_ulasim_tr','Nasıl Gidilir ? tr');	
        $crud->display_as('ek_ipucu_tr','Ekstra İpuçları tr');
		
        $crud->display_as('ek_zaman_ru','Ne zaman ziyaret edilir ? ru');	
        $crud->display_as('ek_ucret_ru','Ücret ne kadar ? ru');	
        $crud->display_as('ek_rehber_ru','Rehbere gerek var mı ? ru');	
        $crud->display_as('ek_ulasim_ru','Nasıl Gidilir ? ru');	
        $crud->display_as('ek_ipucu_ru','Ekstra İpuçları ru');
		
		
		
		        $crud->field_type('one_cikan','dropdown',
                array('1' => 'Evet', '0' => 'Hayır'));			
		$crud->set_relation('ust_kategori_id','acente_one_category','adi');	
        $crud->required_fields('adi','resim','resim_2','durum','ust_kategori_id','kategori_turu');
        $crud->field_type('durum','dropdown',
                array('1' => 'Aktif', '0' => 'Pasif'));	
        $crud->field_type('kategori_turu','dropdown',
                array('tur' => 'Tur', 'otel' => 'Otel'));					
				
				
         $crud->set_field_upload('resim','assets/resimler/sehirler');	
         $crud->set_field_upload('resim_2','assets/resimler/sehirler');
		 
         $crud->set_field_upload('alt_resim_1','assets/resimler/sehirler');	
	     $crud->set_field_upload('alt_resim_2','assets/resimler/sehirler');	
         $crud->set_field_upload('alt_resim_3','assets/resimler/sehirler');	
         $crud->set_field_upload('alt_resim_4','assets/resimler/sehirler');	
		 
		$crud->field_type('seo_adi', 'hidden');
	
		$crud->callback_before_insert(array($this,'insert_seo'));
		$crud->callback_before_update(array($this,'insert_seo'));
		$crud->callback_before_delete(array($this,'resim_sil_kategori'));		
		
		
	if($this->session->userdata('admin_dil')=="en"){
	$crud->unset_fields("adi_tr","aciklama_baslik_tr","aciklama_manset_tr","aciklama_baslik_tr","aciklama_1_tr","aciklama_2_tr","aciklama_3_tr","aciklama_4_tr","ipuclari_tr","ek_zaman_tr","ek_rehber_tr","ek_ulasim_tr","ek_ipucu_tr"
	,"adi_ru","aciklama_baslik_ru","aciklama_manset_ru","aciklama_baslik_ru","aciklama_1_ru","aciklama_2_ru","aciklama_3_ru","aciklama_4_ru","ipuclari_ru","ek_zaman_ru","ek_rehber_ru","ek_ulasim_ru","ek_ipucu_ru"
	,"adi_esp","aciklama_baslik_esp","aciklama_manset_esp","aciklama_baslik_esp","aciklama_1_esp","aciklama_2_esp","aciklama_3_esp","aciklama_4_esp","ipuclari_esp","ek_zaman_esp","ek_rehber_esp","ek_ulasim_esp","ek_ipucu_esp"
	);
	
	}
	else if($this->session->userdata('admin_dil')=="tr"){
	$crud->unset_fields("adi_ru","aciklama_baslik_ru","aciklama_manset_ru","aciklama_baslik_ru","aciklama_1_ru","aciklama_2_ru","aciklama_3_ru","aciklama_4_ru","ipuclari_ru","ek_zaman_ru","ek_rehber_ru","ek_ulasim_ru","ek_ipucu_ru"
	,"adi_esp","aciklama_baslik_esp","aciklama_manset_esp","aciklama_baslik_esp","aciklama_1_esp","aciklama_2_esp","aciklama_3_esp","aciklama_4_esp","ipuclari_esp","ek_zaman_esp","ek_rehber_esp","ek_ulasim_esp","ek_ipucu_esp");	
	}	
	else if($this->session->userdata('admin_dil')=="ru"){
	$crud->unset_fields("adi_tr","aciklama_baslik_tr","aciklama_manset_tr","aciklama_baslik_tr","aciklama_1_tr","aciklama_2_tr","aciklama_3_tr","aciklama_4_tr","ipuclari_tr","ek_zaman_tr","ek_rehber_tr","ek_ulasim_tr","ek_ipucu_tr"
	,"adi_esp","aciklama_baslik_esp","aciklama_manset_esp","aciklama_baslik_esp","aciklama_1_esp","aciklama_2_esp","aciklama_3_esp","aciklama_4_esp","ipuclari_esp","ek_zaman_esp","ek_rehber_esp","ek_ulasim_esp","ek_ipucu_esp");	
	}	

	else if($this->session->userdata('admin_dil')=="esp"){
	$crud->unset_fields("adi_tr","aciklama_baslik_tr","aciklama_manset_tr","aciklama_baslik_tr","aciklama_1_tr","aciklama_2_tr","aciklama_3_tr","aciklama_4_tr","ipuclari_tr","ek_zaman_tr","ek_rehber_tr","ek_ulasim_tr","ek_ipucu_tr"
	,"adi_ru","aciklama_baslik_ru","aciklama_manset_ru","aciklama_baslik_ru","aciklama_1_ru","aciklama_2_ru","aciklama_3_ru","aciklama_4_ru","ipuclari_ru","ek_zaman_ru","ek_rehber_ru","ek_ulasim_ru","ek_ipucu_ru");	
	}		
	
	else {
	$crud->unset_fields("adi_tr","aciklama_baslik_tr","aciklama_manset_tr","aciklama_baslik_tr","aciklama_1_tr","aciklama_2_tr","aciklama_3_tr","aciklama_4_tr","ipuclari_tr","ek_zaman_tr","ek_rehber_tr","ek_ulasim_tr","ek_ipucu_tr"
	,"adi_ru","aciklama_baslik_ru","aciklama_manset_ru","aciklama_baslik_ru","aciklama_1_ru","aciklama_2_ru","aciklama_3_ru","aciklama_4_ru","ipuclari_ru","ek_zaman_ru","ek_rehber_ru","ek_ulasim_ru","ek_ipucu_ru"
	,"adi_esp","aciklama_baslik_esp","aciklama_manset_esp","aciklama_baslik_esp","aciklama_1_esp","aciklama_2_esp","aciklama_3_esp","aciklama_4_esp","ipuclari_esp","ek_zaman_esp","ek_rehber_esp","ek_ulasim_esp","ek_ipucu_esp");
	}	
		
		//$crud->unset_clone();	

         $data['side_menu']="Alt Kategoriler";
         $data['kilavuz']="  <b>Alt Kategoriler</b>";
         $output = $crud->render();
         $output->data=$data;
         //  $this->_example_output($output);
		$this->load->view('admin/index',(array)$output);


      

        }
    }
	
	
	public function resim_sil_kategori($primary_key)
{
        $this->load->model('admin/admin_model');
        $kategori_resim_query=$this->admin_model->kategori_resim_query($primary_key);
		
        if( $kategori_resim_query ) :  foreach( $kategori_resim_query as $dizi ) : 
		
        unlink('assets/resimler/sehirler/'.$dizi["resim"]);
        unlink('assets/resimler/sehirler/'.$dizi["resim_2"]); 
        unlink('assets/resimler/sehirler/'.$dizi["alt_resim_1"]);		 
        unlink('assets/resimler/sehirler/'.$dizi["alt_resim_2"]);		 
        unlink('assets/resimler/sehirler/'.$dizi["alt_resim_3"]); 	 
        unlink('assets/resimler/sehirler/'.$dizi["alt_resim_4"]);
	 
		 endforeach;  endif; 	
		

return true;
}
	
	function insert_seo($post_array) {


   $online=$this->session->userdata('adminonline');
    if(empty($online))
    {
        $this->load->library('messages');
        $this->load->model('admin/admin_model');
        $sonuc=$this->admin_model->admin_query();

        if($sonuc){
            echo $this->messages->To_Login('admin/admin');
        }
        else{echo $this->messages->To_Register('admin/admin');}

    }

    else{



        $nm = $post_array['adi'];

		
		$turkce=array("ş", "Ş", "ı", "(", ")", "‘", "ü", "Ü", "ö", "Ö", "ç", "Ç", " ", "/", "*", "?", "ş", "Ş", "ı", "ğ", "Ğ", "İ", "ö", "Ö", "Ç", "ç", "ü", "Ü"); 
		$duzgun=array("s", "s", "i", "", "", "", "u", "u", "o", "o", "c", "c", "-", "-", "-", "", "s", "s", "i", "g", "g", "i", "o", "o", "c", "c", "u", "u"); 
		$deger=str_replace($turkce,$duzgun,$nm); 
		$url = preg_replace("@[^A-Za-z0-9-_]+@i","",$deger); 
		
        $post_array['seo_adi'] = $url;
        return $post_array;



    }



}   
	
	
	
	


		  //Admin Bilgileri


    public function surekli_tur()
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin/admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin/admin');
            }
            else{echo $this->messages->To_Register('admin/admin');}

        }

        else{

     

        $crud = new grocery_CRUD();
        $crud->set_theme('datatables');
        $crud->set_table('acente_tur');
        $crud->set_subject('Sürekli Turlar</b>');
        $crud->columns('adi','kod','kat_id','Engelli Tarihler','Saat ve Fiyat Ayarla','Yorumlar','İstek Listesi','Fotoğraflar');
		$crud->where('tur_donemi','surekli');
		$crud->set_relation('kat_id','acente_category','adi', [
    'kategori_turu = ' => 'tur'
]);
        $crud->display_as('status','Üye Durumu');
        $crud->display_as('anahtar','Anahtar Kelimeler');	
        $crud->display_as('iptal','İptal Koşulları');	
        $crud->display_as('iptal_tr','İptal Koşulları tr');	
        $crud->display_as('iptal_ru','İptal Koşulları ru');			
        $crud->display_as('anahtar','Anahtar Kelimeler');	
        $crud->display_as('kat_id','Kategori');		
	        $crud->display_as('cok_satan','Çok satan');	
        $crud->display_as('tukenme','Tükenmek Üzere');	
        $crud->display_as('resim','Resim 1920 * 1080');			
        $crud->display_as('resim_2','Resim 686 * 386');		
		$crud->display_as('ayni_gun_engel','Aynı gün rezerve engeli');				

        $crud->required_fields('adi','resim','resim_2','kod','kat_id','aciklama','tam_aciklama','durum');
        $crud->field_type('durum','dropdown',
                array('1' => 'Aktif', '0' => 'Pasif'));	
				
        $crud->field_type('baz_alinacak_fiyatlama_sekli','dropdown',
                array('1' => 'Toplam Fiyat', '0' => 'Kisi Başı Fiyat'));					
				
		//$crud->unset_clone();				
		
        $crud->field_type('sticker','dropdown',
                array('1' => 'Aktif', '0' => 'Pasif'));		
				
								
		$crud->field_type('ayni_gun_engel','dropdown',
        array('1' => 'Evet', '0' => 'Hayır'));					
				
            $crud->callback_column('Engelli Tarihler',array($this,'callback_engelli'));				
            $crud->callback_column('Saat ve Fiyat Ayarla',array($this,'callback_saatler'));				
            $crud->callback_column('Yorumlar',array($this,'callback_yorumlar'));	
            $crud->callback_column('İstek Listesi',array($this,'callback_istek'));	
            $crud->callback_column('Fotoğraflar',array($this,'callback_fotolar'));	
			$crud->callback_before_delete(array($this,'resim_sil_tur'));				
			
			
	
	if($this->session->userdata('admin_dil')=="en"){
	$crud->unset_fields("adi_tr","aciklama_tr","tam_aciklama_tr","gezi_rehberi_tr","dahil_olanlar_tr","bulusma_noktasi_tr","gitmeden_tr","sure_tr","rehber_tr","iptal_tr","one_cikanlar_tr",
	"adi_ru","aciklama_ru","tam_aciklama_ru","gezi_rehberi_ru","dahil_olanlar_ru","bulusma_noktasi_ru","gitmeden_ru","sure_ru","rehber_ru","iptal_ru","one_cikanlar_ru"
	,"adi_esp","aciklama_esp","tam_aciklama_esp","gezi_rehberi_esp","dahil_olanlar_esp","bulusma_noktasi_esp","gitmeden_esp","sure_esp","rehber_esp","iptal_esp","one_cikanlar_esp"
	);
	}
	else if($this->session->userdata('admin_dil')=="tr"){

	$crud->unset_fields("adi_ru","aciklama_ru","tam_aciklama_ru","gezi_rehberi_ru","dahil_olanlar_ru","bulusma_noktasi_ru","gitmeden_ru","sure_ru","rehber_ru","iptal_ru","one_cikanlar_ru"
	,"adi_esp","aciklama_esp","tam_aciklama_esp","gezi_rehberi_esp","dahil_olanlar_esp","bulusma_noktasi_esp","gitmeden_esp","sure_esp","rehber_esp","iptal_esp","one_cikanlar_esp"
	);

	}	
	else if($this->session->userdata('admin_dil')=="esp"){

	$crud->unset_fields("adi_tr","aciklama_tr","tam_aciklama_tr","gezi_rehberi_tr","dahil_olanlar_tr","bulusma_noktasi_tr","gitmeden_tr","sure_tr","rehber_tr","iptal_tr","one_cikanlar_tr"
	,"adi_ru","aciklama_ru","tam_aciklama_ru","gezi_rehberi_ru","dahil_olanlar_ru","bulusma_noktasi_ru","gitmeden_ru","sure_ru","rehber_ru","iptal_ru","one_cikanlar_ru");
	
	}	
	
	else if($this->session->userdata('admin_dil')=="ru"){

	$crud->unset_fields("adi_tr","aciklama_tr","tam_aciklama_tr","gezi_rehberi_tr","dahil_olanlar_tr","bulusma_noktasi_tr","gitmeden_tr","sure_tr","rehber_tr","iptal_tr","one_cikanlar_tr"
	,"adi_esp","aciklama_esp","tam_aciklama_esp","gezi_rehberi_esp","dahil_olanlar_esp","bulusma_noktasi_esp","gitmeden_esp","sure_esp","rehber_esp","iptal_esp","one_cikanlar_esp");
	
	}		
	
	else {

	$crud->unset_fields("adi_tr","aciklama_tr","tam_aciklama_tr","gezi_rehberi_tr","dahil_olanlar_tr","bulusma_noktasi_tr","gitmeden_tr","sure_tr","rehber_tr","iptal_tr","one_cikanlar_tr",
	"adi_ru","aciklama_ru","tam_aciklama_ru","gezi_rehberi_ru","dahil_olanlar_ru","bulusma_noktasi_ru","gitmeden_ru","sure_ru","rehber_ru","iptal_ru","one_cikanlar_ru"
	,"adi_esp","aciklama_esp","tam_aciklama_esp","gezi_rehberi_esp","dahil_olanlar_esp","bulusma_noktasi_esp","gitmeden_esp","sure_esp","rehber_esp","iptal_esp","one_cikanlar_esp"
	);
	
	}	



	
			
         $crud->set_field_upload('resim','assets/resimler/turlar');		
         $crud->set_field_upload('resim_2','assets/resimler/turlar');			 
			
        $crud->field_type('cok_satan','dropdown',
                array('1' => 'Çok Satan', '0' => 'Hayır'));					
				
	        $crud->field_type('tukenme','dropdown',
                array('1' => 'Tükenmek Üzere', '0' => 'Hayır'));	
				
        $crud->field_type('engelli','dropdown',
                array('1' => 'Engellilere Uygun', '0' => 'Uygun Değil'));				 
		 
        $crud->field_type('kupon','dropdown',
                array('1' => 'Kupon kabul edilebilir', '0' => 'Kupon Yok'));	


        $crud->field_type('hizli_giris','dropdown',
                array('1' => 'Evet', '0' => 'Hayır'));	

        $crud->field_type('hizli_onay','dropdown',
                array('1' => 'Evet', '0' => 'Hayır'));	

        $crud->field_type('odeme_turu','dropdown',
                array('1' => 'Ön Rezerve', '0' => 'Direkt ödeme'));		
				
						$crud->field_type('cocuk_fiyat_gorunsun','dropdown',
        array('1' => 'Evet', '0' => 'Hayır'));	


		$crud->field_type('bebek_fiyat_gorunsun','dropdown',
        array('1' => 'Evet', '0' => 'Hayır'));	
				
		 
		$crud->field_type('seo_adi', 'hidden');
		$crud->field_type('tur_donemi', 'hidden', 'surekli');	
		$crud->callback_before_insert(array($this,'insert_seo'));
		$crud->callback_before_update(array($this,'insert_seo'));


         $data['side_menu']="Sürekli Turlar";
         $data['kilavuz']="  <b>Sürekli Tur Ayarları</b>";
         $output = $crud->render();
         $output->data=$data;
         //  $this->_example_output($output);
		$this->load->view('admin/index',(array)$output);


      

        }
    }

	
  public function otel()
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin/admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin/admin');
            }
            else{echo $this->messages->To_Register('admin/admin');}

        }

        else{

     

        $crud = new grocery_CRUD();
        $crud->set_theme('datatables');
        $crud->set_table('acente_tur');
        $crud->set_subject('Oteller</b>');
        $crud->columns('adi','kod','kat_id','Engelli Tarihler','Saat ve Fiyat Ayarla','Yorumlar','İstek Listesi','Fotoğraflar');
		$crud->where('tur_donemi','otel');
		$crud->set_relation('kat_id','acente_category','adi', ['kategori_turu = ' => 'otel']);
        $crud->display_as('status','Üye Durumu');
        $crud->display_as('anahtar','Anahtar Kelimeler');	
        $crud->display_as('iptal','İptal Koşulları');		
        $crud->display_as('anahtar','Anahtar Kelimeler');	
        $crud->display_as('kat_id','Kategori');		
	        $crud->display_as('cok_satan','Çok satan');	
        $crud->display_as('tukenme','Tükenmek Üzere');	
        $crud->display_as('resim','Resim 1920 * 1080');			
        $crud->display_as('resim_2','Resim 686 * 386');		
		$crud->display_as('ayni_gun_engel','Aynı gün rezerve engeli');				

       $crud->required_fields('adi','resim','resim_2','kod','kat_id','aciklama','tam_aciklama','durum');
        $crud->field_type('durum','dropdown',
                array('1' => 'Aktif', '0' => 'Pasif'));	
		//$crud->unset_clone();				
		
		
	       $crud->field_type('baz_alinacak_fiyatlama_sekli', 'hidden');
		$crud->field_type('ayni_gun_engel','dropdown',
        array('1' => 'Evet', '0' => 'Hayır'));		
		
        $crud->field_type('sticker','dropdown',
                array('1' => 'Aktif', '0' => 'Pasif'));		
            $crud->callback_column('Engelli Tarihler',array($this,'callback_engelli'));			
            $crud->callback_column('Saat ve Fiyat Ayarla',array($this,'callback_saatler_otel'));				
            $crud->callback_column('Yorumlar',array($this,'callback_yorumlar'));	
            $crud->callback_column('İstek Listesi',array($this,'callback_istek'));	
            $crud->callback_column('Fotoğraflar',array($this,'callback_fotolar'));	
			$crud->callback_before_delete(array($this,'resim_sil_tur'));	
			
         $crud->set_field_upload('resim','assets/resimler/turlar');		
         $crud->set_field_upload('resim_2','assets/resimler/turlar');			 
			
        $crud->field_type('cok_satan','dropdown',
                array('1' => 'Çok Satan', '0' => 'Hayır'));					
				
	        $crud->field_type('tukenme','dropdown',
                array('1' => 'Tükenmek Üzere', '0' => 'Hayır'));	
				
        $crud->field_type('engelli','dropdown',
                array('1' => 'Engellilere Uygun', '0' => 'Uygun Değil'));				 
		 
        $crud->field_type('kupon','dropdown',
                array('1' => 'Kupon kabul edilebilir', '0' => 'Kupon Yok'));	

				
        $crud->field_type('odeme_turu','dropdown',
                array('1' => 'Ön Rezerve', '0' => 'Direkt ödeme'));					
				
				

        $crud->field_type('hizli_giris','dropdown',
                array('1' => 'Evet', '0' => 'Hayır'));	

        $crud->field_type('hizli_onay','dropdown',
                array('1' => 'Evet', '0' => 'Hayır'));	
				
				
						$crud->field_type('cocuk_fiyat_gorunsun','dropdown',
        array('1' => 'Evet', '0' => 'Hayır'));	


		$crud->field_type('bebek_fiyat_gorunsun','dropdown',
        array('1' => 'Evet', '0' => 'Hayır'));	
				
		 
		$crud->field_type('seo_adi', 'hidden');
		$crud->field_type('tur_donemi', 'hidden', 'otel');	
		$crud->callback_before_insert(array($this,'insert_seo'));
		$crud->callback_before_update(array($this,'insert_seo'));
		
		

		
		if($this->session->userdata('admin_dil')=="en"){
	$crud->unset_fields("adi_tr","aciklama_tr","tam_aciklama_tr",'gezi_rehberi',"gezi_rehberi_tr","dahil_olanlar_tr","bulusma_noktasi_tr","gitmeden_tr",'gitmeden',"sure_tr",'sure',"rehber_tr","iptal_tr",'rehber',"one_cikanlar_tr",
	"adi_ru","aciklama_ru","tam_aciklama_ru","gezi_rehberi_ru","dahil_olanlar_ru",'bulusma_noktasi','bulusma_noktasi_tr',"bulusma_noktasi_ru","gitmeden_ru","sure_ru","rehber_ru","iptal_ru","one_cikanlar_ru","cocuk_fiyat_gorunsun","bebek_fiyat_gorunsun","cocuk_fiyat_yazisi","bebek_fiyat_yazisi"
	,"adi_esp","aciklama_esp","tam_aciklama_esp","gezi_rehberi_esp","dahil_olanlar_esp","gitmeden_esp","sure_esp","rehber_esp","iptal_esp","one_cikanlar_esp");
	}
	else if($this->session->userdata('admin_dil')=="tr"){

	$crud->unset_fields("adi_ru","aciklama_ru","tam_aciklama_ru",'gezi_rehberi',"gezi_rehberi_tr","gezi_rehberi_ru","dahil_olanlar_ru","bulusma_noktasi_ru",'bulusma_noktasi','bulusma_noktasi_tr',"gitmeden_ru",'gitmeden','gitmeden_tr',"sure_ru",'sure','sure_tr',"rehber_ru",'rehber','rehber_tr',"iptal_ru","one_cikanlar_ru","cocuk_fiyat_gorunsun","bebek_fiyat_gorunsun","cocuk_fiyat_yazisi","bebek_fiyat_yazisi"
	,"adi_esp","aciklama_esp","tam_aciklama_esp","gezi_rehberi_esp","dahil_olanlar_esp","gitmeden_esp","sure_esp","rehber_esp","iptal_esp","one_cikanlar_esp");

	}	
	else if($this->session->userdata('admin_dil')=="ru"){

	$crud->unset_fields("adi_tr","aciklama_tr","tam_aciklama_tr",'gezi_rehberi',"gezi_rehberi_tr","gezi_rehberi_ru","dahil_olanlar_tr","bulusma_noktasi_tr",'bulusma_noktasi','bulusma_noktasi_ru',"gitmeden_tr",'gitmeden','gitmeden_ru',"sure_tr",'sure','sure_ru',"rehber_tr",'rehber','rehber_ru',"iptal_tr","one_cikanlar_tr","cocuk_fiyat_gorunsun","bebek_fiyat_gorunsun","cocuk_fiyat_yazisi","bebek_fiyat_yazisi"
	,"adi_esp","aciklama_esp","tam_aciklama_esp","gezi_rehberi_esp","dahil_olanlar_esp","gitmeden_esp","sure_esp","rehber_esp","iptal_esp","one_cikanlar_esp");
	
	}

	else if($this->session->userdata('admin_dil')=="esp"){

	$crud->unset_fields("adi_tr","aciklama_tr","tam_aciklama_tr",'gezi_rehberi',"gezi_rehberi_tr","gezi_rehberi_ru","dahil_olanlar_tr","bulusma_noktasi_tr",'bulusma_noktasi','bulusma_noktasi_ru',"gitmeden_tr",'gitmeden','gitmeden_ru',"sure_tr",'sure','sure_ru',"rehber_tr",'rehber','rehber_ru',"iptal_tr","one_cikanlar_tr","cocuk_fiyat_gorunsun","bebek_fiyat_gorunsun","cocuk_fiyat_yazisi","bebek_fiyat_yazisi"
	,"adi_ru","aciklama_ru","tam_aciklama_ru","gezi_rehberi_ru","dahil_olanlar_ru","gitmeden_ru","sure_ru","rehber_ru","iptal_ru","one_cikanlar_ru");
	
	}

	
	else {

	$crud->unset_fields("adi_tr","aciklama_tr","tam_aciklama_tr",'gezi_rehberi',"gezi_rehberi_tr","dahil_olanlar_tr","bulusma_noktasi_tr","gitmeden_tr",'gitmeden',"sure_tr",'sure',"rehber_tr","iptal_tr",'rehber',"one_cikanlar_tr",
	"adi_ru","aciklama_ru","tam_aciklama_ru","gezi_rehberi_ru","dahil_olanlar_ru",'bulusma_noktasi','bulusma_noktasi_tr',"bulusma_noktasi_ru","gitmeden_ru","sure_ru","rehber_ru","iptal_ru","one_cikanlar_ru","cocuk_fiyat_gorunsun","bebek_fiyat_gorunsun","cocuk_fiyat_yazisi","bebek_fiyat_yazisi"
	,"adi_esp","aciklama_esp","tam_aciklama_esp","gezi_rehberi_esp","dahil_olanlar_esp","gitmeden_esp","sure_esp","rehber_esp","iptal_esp","one_cikanlar_esp");
	}		
		
		
		


         $data['side_menu']="Oteller";
         $data['kilavuz']="  <b>Oteller Ayarları</b>";
         $output = $crud->render();
         $output->data=$data;
         //  $this->_example_output($output);
		$this->load->view('admin/index',(array)$output);


      

        }
    }

		    public function callback_saatler_otel($value, $row)
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin/admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin/admin');
            }
            else{echo $this->messages->To_Register('admin/admin');}

        }

        else{


            return "<a class='btn btn-default' href='".site_url('admin/admin/otel_detay/'.$row->kod.'/'.$row->seo_adi)."'>Saat ve Fiyat Ayarla</a>";
        }


    }
	
	
	    public function callback_engelli($value, $row)
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin/admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin/admin');
            }
            else{echo $this->messages->To_Register('admin/admin');}

        }

        else{


            return "<a class='btn btn-default' href='".site_url('admin/admin/engelli_tarihler/'.$row->kod.'/'.$row->id.'/'.$row->seo_adi)."'>Engelli Tarihler</a>";
        }


    }
	
	
		    public function callback_saatler($value, $row)
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin/admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin/admin');
            }
            else{echo $this->messages->To_Register('admin/admin');}

        }

        else{


            return "<a class='btn btn-default' href='".site_url('admin/admin/surekli_tur_detay/'.$row->kod.'/'.$row->seo_adi)."'>Saat ve Fiyat Ayarla</a>";
        }


    }
	
	
		    public function callback_fotolar($value, $row)
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin/admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin/admin');
            }
            else{echo $this->messages->To_Register('admin/admin');}

        }

        else{


            return "<a class='btn btn-default' href='".site_url('admin/admin/fotolar/'.$row->id.'/'.$row->kod.'/'.$row->seo_adi)."'>Fotoğraflar</a>";
        }


    }
	
	
		
	public function resim_sil_tur($primary_key)
{
        $this->load->model('admin/admin_model');
        $tur_resim_query=$this->admin_model->tur_resim_query($primary_key);
		
        if( $tur_resim_query ) :  foreach( $tur_resim_query as $dizi ) : 
		
        unlink('assets/resimler/turlar/'.$dizi["resim"]);
        unlink('assets/resimler/turlar/'.$dizi["resim_2"]); 
		$kod=$dizi["kod"];
		endforeach;  endif; 	

        $tur_yorum_sil=$this->admin_model->tur_yorum_sil($primary_key);	
        $tur_istek_sil=$this->admin_model->tur_istek_sil($primary_key);	
	    $tur_detay_sil=$this->admin_model->tur_detay_sil($kod);	
			
	        $tur_foto_getir=$this->admin_model->tur_foto_getir($primary_key);
		
        if( $tur_foto_getir ) :  foreach( $tur_foto_getir as $dizi ) : 
		
        unlink('assets/resimler/turlar/'.$dizi["foto"]);
		
		endforeach;  endif; 		
		
		
		
		

return true;
}
	
	
	
	
	
	
	  //Admin Bilgileri


    public function surekli_tur_detay($id,$adi)
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin/admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin/admin');
            }
            else{echo $this->messages->To_Register('admin/admin');}

        }

        else{

		 $id=trim($id); $id=strip_tags($id); $id=htmlentities($id);
		 $adi=trim($adi); $adi=strip_tags($adi); $adi=htmlentities($adi);		
	
		
		if(($id=="")or($adi=="")){
			
		  $this->load->library('messages');
          echo $this->messages->config('admin/admin/surekli_tur');
			
		}

		
        $this->load->model('admin/admin_model');
       $sonuc_id=$this->admin_model->tur_return_id($id);
       
        if($sonuc_id==0){
			
			  $this->load->library('messages');
              echo $this->messages->config('admin/admin/surekli_tur');
			
		}	
		
         $sonuc_adi=$this->admin_model->tur_return_adi($adi);
		

        if($sonuc_adi==0){
			
			  $this->load->library('messages');
              echo $this->messages->config('admin/admin/surekli_tur');
			
		} 



        $crud = new grocery_CRUD();
        $crud->set_theme('datatables');
        $crud->set_table('acente_tur_detay');
		$crud->where('tur_kod',$id);
        $crud->set_subject('Tur Saat ve Fiyat Bilgisi');
        $crud->columns('zaman_aciklamasi','baslangic_saati','bitis_saati','yetiskin_fiyat','Kişi ve Fiyat Ayarla');
        $crud->required_fields('zaman_aciklamasi','baslangic_saati','bitis_saati','yetiskin_fiyat');
        $crud->display_as('tur_kod','Bağlı olduğu tur');
        $crud->display_as('yetiskin_fiyat_ind_once','Yetişkin için üstü çizilecek fiyat (varsa)');
        $crud->display_as('cocuk_fiyat_ind_once','Çocuk için üstü çizilecek fiyat (varsa)');	
        $crud->display_as('bebek_fiyat_ind_once','Bebek için üstü çizilecek fiyat (varsa)');	
        $crud->field_type('durum','dropdown',
                array('1' => 'Aktif', '0' => 'Pasif'));	
				
				
				

		
			if($this->session->userdata('admin_dil')=="en"){
$crud->unset_fields('baslangic_tarihi', 'bitis_tarihi','zaman_aciklamasi_tr','zaman_aciklamasi_ru','zaman_aciklamasi_esp','cocuk_fiyat');	
	}
	else if($this->session->userdata('admin_dil')=="tr"){

$crud->unset_fields('baslangic_tarihi', 'bitis_tarihi','zaman_aciklamasi_ru','zaman_aciklamasi_esp','cocuk_fiyat');	
	}	
	else if($this->session->userdata('admin_dil')=="ru"){

$crud->unset_fields('baslangic_tarihi', 'bitis_tarihi','zaman_aciklamasi_tr','zaman_aciklamasi_esp','cocuk_fiyat');		
	}
	else if($this->session->userdata('admin_dil')=="esp"){

$crud->unset_fields('baslangic_tarihi', 'bitis_tarihi','zaman_aciklamasi_tr','zaman_aciklamasi_ru','cocuk_fiyat');		
	}
	
	else {

$crud->unset_fields('baslangic_tarihi', 'bitis_tarihi','zaman_aciklamasi_tr','zaman_aciklamasi_ru','zaman_aciklamasi_esp','cocuk_fiyat');	
	}		
		
		
	            $crud->callback_column('Kişi ve Fiyat Ayarla',array($this,'callback_fiyatlar'));		
		
		
		


		$crud->field_type('tur_kod', 'hidden',$id);
		
         $data['side_menu']="Sürekli Turlar Detayı";
         $data['kilavuz']="  <b>Sürekli Tur Detay Ayarları</b>";
         $output = $crud->render();
         $output->data=$data;
         //  $this->_example_output($output);
		$this->load->view('admin/index',(array)$output);


      

        }
    }
	
	
	
			    public function callback_fiyatlar($value, $row)
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin/admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin/admin');
            }
            else{echo $this->messages->To_Register('admin/admin');}

        }

        else{


            return "<a class='btn btn-default' href='".site_url('admin/admin/kisi_fiyat/'.$row->tur_kod."/".$row->id)."'>Kişi ve Fiyat Ayarla</a>";
        }


    }
	
	
	
	
	
	
	  //Admin Bilgileri


    public function otel_detay($id,$adi)
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin/admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin/admin');
            }
            else{echo $this->messages->To_Register('admin/admin');}

        }

        else{

		 $id=trim($id); $id=strip_tags($id); $id=htmlentities($id);
		 $adi=trim($adi); $adi=strip_tags($adi); $adi=htmlentities($adi);		
	
		
		if(($id=="")or($adi=="")){
			
		  $this->load->library('messages');
          echo $this->messages->config('admin/admin/otel');
			
		}

		
        $this->load->model('admin/admin_model');
       $sonuc_id=$this->admin_model->tur_return_id($id);
       
        if($sonuc_id==0){
			
			  $this->load->library('messages');
              echo $this->messages->config('admin/admin/otel');
			
		}	
		
         $sonuc_adi=$this->admin_model->tur_return_adi($adi);
		

        if($sonuc_adi==0){
			
			  $this->load->library('messages');
              echo $this->messages->config('admin/admin/otel');
			
		} 

	        $crud = new grocery_CRUD();	
		
      $tur_turu_kod=$this->admin_model->tur_turu_kod($id);
	  if($tur_turu_kod=="otel"){
		  
       $otel_fiyat_say=$this->admin_model->otel_fiyat_say($id);		
	   if($otel_fiyat_say!=0){
		 
	//	$crud->unset_add();	
		   
	   }
	   
	
	  }
	
   


        $crud->set_theme('datatables');
        $crud->set_table('acente_tur_detay');
		$crud->where('tur_kod',$id);
        $crud->set_subject('Otel Fiyat Bilgisi');
        $crud->columns('zaman_aciklamasi','yetiskin_fiyat','cocuk_fiyat'); //,'Kişi ve Fiyat Ayarla'
        $crud->required_fields('baslangic_tarihi','bitis_tarihi','yetiskin_fiyat');
        $crud->display_as('tur_kod','Bağlı olduğu tur');
        $crud->display_as('zaman_aciklamasi','Oda Adı');	
        $crud->display_as('zaman_aciklamasi_tr','Oda Adı tr');
        $crud->display_as('zaman_aciklamasi_ru','Oda Adı ru');	
		
        $crud->display_as('yetiskin_fiyat_ind_once','Yetişkin için üstü çizilecek fiyat (varsa)');
        $crud->display_as('cocuk_fiyat_ind_once','Çocuk için üstü çizilecek fiyat (varsa)');
        $crud->display_as('bebek_fiyat_ind_once','Bebek için üstü çizilecek fiyat (varsa)');		
        $crud->field_type('durum','dropdown',
                array('1' => 'Aktif', '0' => 'Pasif'));	

	$crud->callback_column('Kişi ve Fiyat Ayarla',array($this,'callback_fiyatlar'));			
				
				
			if($this->session->userdata('admin_dil')=="en"){
$crud->unset_fields('baslangic_tarihi', 'bitis_tarihi','baslangic_saati', 'bitis_saati', 'katilimci','zaman_aciklamasi_tr','zaman_aciklamasi_ru','zaman_aciklamasi_esp','bebek_fiyat_ind_once');	
	}
	else if($this->session->userdata('admin_dil')=="tr"){

$crud->unset_fields('baslangic_tarihi', 'bitis_tarihi','baslangic_saati', 'bitis_saati', 'katilimci','zaman_aciklamasi_ru','zaman_aciklamasi_esp','bebek_fiyat_ind_once');	
	}	
	else if($this->session->userdata('admin_dil')=="ru"){

$crud->unset_fields('baslangic_tarihi', 'bitis_tarihi','baslangic_saati', 'bitis_saati', 'katilimci','zaman_aciklamasi_tr','zaman_aciklamasi_esp','bebek_fiyat_ind_once');		
	}	
	
	else if($this->session->userdata('admin_dil')=="esp"){

$crud->unset_fields('baslangic_tarihi', 'bitis_tarihi','baslangic_saati', 'bitis_saati', 'katilimci','zaman_aciklamasi_tr','zaman_aciklamasi_ru','bebek_fiyat_ind_once');		
	}	
	
	
	
	else {

$crud->unset_fields('baslangic_tarihi', 'bitis_tarihi','baslangic_saati', 'bitis_saati', 'katilimci','zaman_aciklamasi_tr','zaman_aciklamasi_ru','zaman_aciklamasi_esp','bebek_fiyat_ind_once');	
	}				
			
			



		$crud->field_type('tur_kod', 'hidden',$id);
		
         $data['side_menu']="Otel Detayı";
         $data['kilavuz']="  <b>Otel Detay Ayarları</b>";
         $output = $crud->render();
         $output->data=$data;
         //  $this->_example_output($output);
		$this->load->view('admin/index',(array)$output);


      

        }
    }
	
	
	
	
	
	
	
			  //Admin Bilgileri


    public function belirli_tarih_tur()
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin/admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin/admin');
            }
            else{echo $this->messages->To_Register('admin/admin');}

        }

        else{

     

        $crud = new grocery_CRUD();
        $crud->set_theme('datatables');
        $crud->set_table('acente_tur');
        $crud->set_subject('Belirli Tarihli Turlar');
        $crud->columns('adi','kod','kat_id','Engelli Tarihler','Tarih ve Fiyat Ayarla','Yorumlar','İstek Listesi','Fotoğraflar');
		$crud->where('tur_donemi','belirli');
		
		
		$crud->set_relation('kat_id','acente_category','adi', [
    'kategori_turu = ' => 'tur'
]);
        $crud->display_as('status','Üye Durumu');
        $crud->display_as('anahtar','Anahtar Kelimeler');	
        $crud->display_as('iptal','İptal Koşulları');		
        $crud->display_as('anahtar','Anahtar Kelimeler');	
        $crud->display_as('kat_id','Kategori');	
        $crud->display_as('cok_satan','Çok satan');	
        $crud->display_as('tukenme','Tükenmek Üzere');	
        $crud->display_as('resim','Resim 1920 * 1080');	
        $crud->display_as('resim_2','Resim 686 * 386');	
        $crud->display_as('ayni_gun_engel','Aynı gün rezerve engeli');		
        $crud->required_fields('adi','resim','resim_2','kod','kat_id','aciklama','tam_aciklama','durum');
        $crud->field_type('durum','dropdown',
                array('1' => 'Aktif', '0' => 'Pasif'));	
        $crud->field_type('sticker','dropdown',
                array('1' => 'Aktif', '0' => 'Pasif'));		


		$crud->field_type('ayni_gun_engel','dropdown',
        array('1' => 'Evet', '0' => 'Hayır'));	
	
        $crud->field_type('cok_satan','dropdown',
                array('1' => 'Çok Satan', '0' => 'Hayır'));					
				
	        $crud->field_type('tukenme','dropdown',
                array('1' => 'Tükenmek Üzere', '0' => 'Hayır'));	
				
        $crud->field_type('engelli','dropdown',
                array('1' => 'Engellilere Uygun', '0' => 'Uygun Değil'));				 
		 
        $crud->field_type('kupon','dropdown',
                array('1' => 'Kupon kabul edilebilir', '0' => 'Kupon Yok'));	


        $crud->field_type('hizli_giris','dropdown',
                array('1' => 'Evet', '0' => 'Hayır'));	

        $crud->field_type('hizli_onay','dropdown',
                array('1' => 'Evet', '0' => 'Hayır'));	
							
        $crud->field_type('odeme_turu','dropdown',
                array('1' => 'Ön Rezerve', '0' => 'Direkt ödeme'));		

        $crud->field_type('baz_alinacak_fiyatlama_sekli','dropdown',
                array('1' => 'Toplam Fiyat', '0' => 'Kisi Başı Fiyat'));

		$crud->field_type('cocuk_fiyat_gorunsun','dropdown',
        array('1' => 'Evet', '0' => 'Hayır'));	


		$crud->field_type('bebek_fiyat_gorunsun','dropdown',
        array('1' => 'Evet', '0' => 'Hayır'));			
				
				
			$crud->unset_clone();			
            $crud->callback_column('Engelli Tarihler',array($this,'callback_engelli'));			
            $crud->callback_column('Tarih ve Fiyat Ayarla',array($this,'callback_tarihler'));				
            $crud->callback_column('Yorumlar',array($this,'callback_yorumlar'));	
            $crud->callback_column('İstek Listesi',array($this,'callback_istek'));	
            $crud->callback_column('Fotoğraflar',array($this,'callback_fotolar'));	
			$crud->callback_before_delete(array($this,'resim_sil_tur'));	
			
         $crud->set_field_upload('resim','assets/resimler/turlar');	
		 
         $crud->set_field_upload('resim_2','assets/resimler/turlar');				 
		$crud->field_type('seo_adi', 'hidden');
		$crud->field_type('tur_donemi', 'hidden', 'belirli');	
		$crud->callback_before_insert(array($this,'insert_seo'));
		$crud->callback_before_update(array($this,'insert_seo'));
		
		
		if($this->session->userdata('admin_dil')=="en"){
	$crud->unset_fields("adi_tr","aciklama_tr","tam_aciklama_tr","gezi_rehberi_tr","dahil_olanlar_tr","bulusma_noktasi_tr","gitmeden_tr","sure_tr","rehber_tr","iptal_tr","one_cikanlar_tr",
	"adi_ru","aciklama_ru","tam_aciklama_ru","gezi_rehberi_ru","dahil_olanlar_ru","bulusma_noktasi_ru","gitmeden_ru","sure_ru","rehber_ru","iptal_ru","one_cikanlar_ru",
	"adi_esp","aciklama_esp","tam_aciklama_esp","gezi_rehberi_esp","dahil_olanlar_esp","bulusma_noktasi_esp","gitmeden_esp","sure_esp","rehber_esp","iptal_esp","one_cikanlar_esp");
	}
	else if($this->session->userdata('admin_dil')=="tr"){

	$crud->unset_fields("adi_ru","aciklama_ru","tam_aciklama_ru","gezi_rehberi_ru","dahil_olanlar_ru","bulusma_noktasi_ru","gitmeden_ru","sure_ru","rehber_ru","iptal_ru","one_cikanlar_ru",
	"adi_esp","aciklama_esp","tam_aciklama_esp","gezi_rehberi_esp","dahil_olanlar_esp","bulusma_noktasi_esp","gitmeden_esp","sure_esp","rehber_esp","iptal_esp","one_cikanlar_esp");

	}	
	else if($this->session->userdata('admin_dil')=="ru"){

	$crud->unset_fields("adi_tr","aciklama_tr","tam_aciklama_tr","gezi_rehberi_tr","dahil_olanlar_tr","bulusma_noktasi_tr","gitmeden_tr","sure_tr","rehber_tr","iptal_tr","one_cikanlar_tr",
	"adi_esp","aciklama_esp","tam_aciklama_esp","gezi_rehberi_esp","dahil_olanlar_esp","bulusma_noktasi_esp","gitmeden_esp","sure_esp","rehber_esp","iptal_esp","one_cikanlar_esp");
	
	}	
	
	else if($this->session->userdata('admin_dil')=="esp"){

	$crud->unset_fields("adi_ru","aciklama_ru","tam_aciklama_ru","gezi_rehberi_ru","dahil_olanlar_ru","bulusma_noktasi_ru","gitmeden_ru","sure_ru","rehber_ru","iptal_ru","one_cikanlar_ru",
	"adi_ru","aciklama_ru","tam_aciklama_ru","gezi_rehberi_ru","dahil_olanlar_ru","bulusma_noktasi_ru","gitmeden_ru","sure_ru","rehber_ru","iptal_ru","one_cikanlar_ru");
	
	}		
	
	
	
	else {

	$crud->unset_fields("adi_tr","aciklama_tr","tam_aciklama_tr","gezi_rehberi_tr","dahil_olanlar_tr","bulusma_noktasi_tr","gitmeden_tr","sure_tr","rehber_tr","iptal_tr","one_cikanlar_tr",
	"adi_ru","aciklama_ru","tam_aciklama_ru","gezi_rehberi_ru","dahil_olanlar_ru","bulusma_noktasi_ru","gitmeden_ru","sure_ru","rehber_ru","iptal_ru","one_cikanlar_ru",
	"adi_esp","aciklama_esp","tam_aciklama_esp","gezi_rehberi_esp","dahil_olanlar_esp","bulusma_noktasi_esp","gitmeden_esp","sure_esp","rehber_esp","iptal_esp","one_cikanlar_esp");
	}		
		
		
		


         $data['side_menu']="Belirli Tarihli Turlar";
         $data['kilavuz']="  <b>Belirli Tarihli Tur Ayarları</b>";
         $output = $crud->render();
         $output->data=$data;
         //  $this->_example_output($output);
		$this->load->view('admin/index',(array)$output);


      

        }
    }

	
	
	
	
	
	
	 public function kisi_fiyat($tur_kod=null,$id=null)
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin/admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin/admin');
            }
            else{echo $this->messages->To_Register('admin/admin');}

        }

        else{
		$this->load->model('admin/admin_model');
			
				if($tur_kod==""){
			
		  $this->load->library('messages');
          echo $this->messages->config('admin/admin');
			
		}

	if($id==""){
			
		  $this->load->library('messages');
          echo $this->messages->config('admin/admin');
			
		}	
		
		if(!is_numeric($id)){
			
			  $this->load->library('messages');
          echo $this->messages->config('admin/admin');
			

		}	

		
        $this->load->model('admin/admin_model');
        $sonuc_id=$this->admin_model->tur_detay_return($tur_kod,$id);

        if($sonuc_id==0){
			
			  $this->load->library('messages');
              echo $this->messages->config('admin/admin');
			
		}	


        $crud = new grocery_CRUD();
        $crud->set_theme('datatables');
        $crud->set_table('acente_kisi_fiyat');
        $crud->set_subject('Kişi ve Fiyat');
        $crud->columns('tur_kod','bas_kisi','bit_kisi','yetiskin_fiyat','cocuk_fiyat','bebek_fiyat');
		$crud->where('tur_detay_id',$id);
		

				
			$crud->unset_clone();			
			 
		$crud->field_type('tur_detay_id', 'hidden' , $id);
		$crud->field_type('tur_kod', 'hidden' , $tur_kod);

	
		
		


         $data['side_menu']="Kişi ve Fiyat Ayarla";
         $data['kilavuz']="  <bKişi ve Fiyat Ayarla</b>";
         $output = $crud->render();
         $output->data=$data;
         //  $this->_example_output($output);
		$this->load->view('admin/index',(array)$output);


      

        }
    }

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
		    public function callback_tarihler($value, $row)
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

        return "<a class='btn btn-default' href='".site_url('admin/admin/belirli_tarih_tur_detay/'.$row->kod.'/'.$row->seo_adi)."'>Tarih ve Fiyat Ayarla</a>";
    
        }


    }
	
	
	
	
    public function belirli_tarih_tur_detay($id,$adi)
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin/admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin/admin');
            }
            else{echo $this->messages->To_Register('admin/admin');}

        }

        else{

		 $id=trim($id); $id=strip_tags($id); $id=htmlentities($id);
		 $adi=trim($adi); $adi=strip_tags($adi); $adi=htmlentities($adi);		
	
		
		if(($id=="")or($adi=="")){
			
		  $this->load->library('messages');
          echo $this->messages->config('admin/admin/belirli_tarih_tur');
			
		}

		
        $this->load->model('admin/admin_model');
        $sonuc_id=$this->admin_model->tur_return_id($id);

        if($sonuc_id==0){
			
			  $this->load->library('messages');
              echo $this->messages->config('admin/admin/belirli_tarih_tur');
			
		}	
		
        $sonuc_adi=$this->admin_model->tur_return_adi($adi);
		

        if($sonuc_adi==0){
			
			  $this->load->library('messages');
              echo $this->messages->config('admin/admin/belirli_tarih_tur');
			
		} 



        $crud = new grocery_CRUD();
        $crud->set_theme('datatables');
        $crud->set_table('acente_tur_detay');
		$crud->where('tur_kod',$id);
        $crud->set_subject('Tur Saat ve Fiyat Bilgisi');
        $crud->columns('baslangic_tarihi','bitis_tarihi','yetiskin_fiyat','Kişi ve Fiyat Ayarla');
        $crud->required_fields('baslangic_tarihi','bitis_tarihi','yetiskin_fiyat');
        $crud->display_as('tur_kod','Bağlı olduğu tur');
        $crud->display_as('yetiskin_fiyat_ind_once','Yetişkin için üstü çizilecek fiyat (varsa)');
        $crud->display_as('cocuk_fiyat_ind_once','Çocuk için üstü çizilecek fiyat (varsa)');	
        $crud->display_as('bebek_fiyat_ind_once','Bebek için üstü çizilecek fiyat (varsa)');			
        $crud->field_type('durum','dropdown',
                array('1' => 'Aktif', '0' => 'Pasif'));	

		$crud->unset_fields('baslangic_saati', 'bitis_saati', 'zaman_aciklamasi', 'zaman_aciklamasi_ru', 'zaman_aciklamasi_tr','cocuk_fiyat');	
		
		
		$crud->callback_column('Kişi ve Fiyat Ayarla',array($this,'callback_fiyatlar'));	

		$crud->field_type('tur_kod', 'hidden',$id);
		
         $data['side_menu']="Belirli Tarihli Tur Detayı";
         $data['kilavuz']="  <b>Belirli Tarihli Tur Detay Ayarları</b>";
         $output = $crud->render();
         $output->data=$data;
         //  $this->_example_output($output);
		$this->load->view('admin/index',(array)$output);


      

        }
    }
	
	
	
			    public function callback_yorumlar($value, $row)
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin/admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin/admin');
            }
            else{echo $this->messages->To_Register('admin/admin');}

        }

        else{


            return "<a class='btn btn-default' href='".site_url('admin/admin/yorumlar/'.$row->id.'/'.$row->kod.'/'.$row->adi.'/'.$row->seo_adi)."'>Yorumlar</a>";
        }


    }
	
	    public function callback_istek($value, $row)
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin/admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin/admin');
            }
            else{echo $this->messages->To_Register('admin/admin');}

        }

        else{
			
			
		    $this->load->model('admin/admin_model');
            $istek_adet=$this->admin_model->istek_say($row->id);
			
			


            return $istek_adet." adet <a class='btn btn-default' href='".site_url('admin/admin/istek_listesi/'.$row->id)."'>Görüntüle</a>";
        }


    }
	
	
	
	
	 public function yorumlar($id,$kod,$adi,$seo_adi)
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin/admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin/admin');
            }
            else{echo $this->messages->To_Register('admin/admin');}

        }

        else{

			 $id=trim($id); $id=strip_tags($id); $id=htmlentities($id);
			 $kod=trim($kod); $kod=strip_tags($kod); $kod=htmlentities($kod);			 
			 $adi=trim($adi); $adi=strip_tags($adi); $adi=htmlentities($adi);
			 $seo_adi=trim($seo_adi); $seo_adi=strip_tags($seo_adi); $seo_adi=htmlentities($seo_adi);
			 
			if(($id=="")or($kod=="")or($adi=="")or($seo_adi=="")){
			
		  $this->load->library('messages');
          echo $this->messages->config('admin/admin');
			
		}


            $this->load->model('admin/admin_model');
            $tur_kontrol=$this->admin_model->tur_kontrol($id,$kod,$seo_adi);


	if($tur_kontrol==0){
			
		  $this->load->library('messages');
          echo $this->messages->config('admin/admin');
			
		}

        $crud = new grocery_CRUD();
        $crud->set_theme('datatables');
        $crud->set_table('acente_yorumlar');
		$crud->where('tur_id',$id);
        $crud->set_subject(' Yorumlar');
        $crud->columns('tur_id','kullanici_id','baslik','tarih');
        $crud->required_fields('tur_id','kullanici_id','baslik','tarih');
		$crud->set_relation('tur_id','acente_tur','adi');
		$crud->set_relation('tur_kod','acente_tur','kod');
		$crud->set_relation('kullanici_id','acente_uyeler','username');		
        $crud->display_as('kullanici_id','Kullanıcı');	
        $crud->display_as('tur_kod','Tur Kodu');	
        $crud->display_as('tur_id','Tur Adı');		
        $crud->field_type('durum','dropdown',
                array('1' => 'Aktif', '0' => 'Pasif'));	
				
  
		
		
		$crud->unset_add();	
		$crud->unset_delete();	
		$crud->unset_clone();	
		$crud->unset_edit_fields("tur_id",'tur_kod','kullanici_id','baslik','yorum','tarih');
		
         $data['side_menu']="Rezervasyon Detayı";
         $data['kilavuz']="  <b>Rezervasyon Detay Ayarları</b>";
         $output = $crud->render();
         $output->data=$data;
         //  $this->_example_output($output);
		$this->load->view('admin/index',(array)$output);


      

        }
    }
	
		  //Admin Bilgileri


    public function fotolar($id,$kod,$seo_adi)
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin/admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin/admin');
            }
            else{echo $this->messages->To_Register('admin/admin');}

        }

        else{

		

				 $id=trim($id); $id=strip_tags($id); $id=htmlentities($id);
				 $kod=trim($kod); $kod=strip_tags($kod); $kod=htmlentities($kod);

				 $seo_adi=trim($seo_adi); $seo_adi=strip_tags($seo_adi); $seo_adi=htmlentities($seo_adi);				 
			if(($id=="")or($kod=="")){
			
		  $this->load->library('messages');
          echo $this->messages->config('admin/admin');
		  return FALSE;
			
		}


            $this->load->model('admin/admin_model');
            $tur_kontrol=$this->admin_model->tur_kontrol($id,$kod,$seo_adi);		
		
		if($tur_kontrol==0){
			
				  $this->load->library('messages');
          echo $this->messages->config('admin/admin');
		  return FALSE;
		  
		}


	
	      $this->load->Model('admin/admin_model', 'Model');
		  $data['foto'] = $this->Model->resim_getir($id);		  


	  
		  $data['sayfa'] = 'Fotolar';
		  $data['id'] = $id;
		  $data['kod'] = $kod;	  
		  $data['s_adi'] = $seo_adi;		   
		  $this->load->view('admin/fotolar.php',$data);
	


      

        }
    }


	
	
	
	
	
	
	
	
	  public function fotolar_upload()
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin/admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin/admin');
            }
            else{echo $this->messages->To_Register('admin/admin');}

        }

        else{
			
		 /*   $this->load->model('admin/admin_model');
		
	
			$tur_kontrol=$this->admin_model->tur_kontrol($id,$kod,$adi);
			if($tur_kontrol==0){
				
			echo '{"status":"error"}';
			exit;			
				
			}	
		*/
		
		
				//db kayıt	
			echo $id=$_POST["id"];
			 $id=trim($id); $id=strip_tags($id); $id=htmlentities($id);
			
			$adi=$_POST["adi"];
			 $adi=trim($adi); $adi=strip_tags($adi); $adi=htmlentities($adi);

			$kod=$_POST["kod"];
			 $kod=trim($kod); $kod=strip_tags($kod); $kod=htmlentities($kod);	
		
		
			       $this->load->model('admin/admin_model');
            $tur_kontrol=$this->admin_model->tur_kontrol($id,$kod,$adi);

	if($tur_kontrol==0){
			
echo '{"status":"error"}';
				exit;
		  
		  
			
		}
			

		$allowed = array('png', 'jpg', 'jpeg');

		if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0){

		$extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);
		
		$random=rand(111111111,999999999);
		$dt=date("d-m-Y H:i:s");
		$name=md5($random."".$dt);
		$name=$name.".".$extension;

			if(!in_array(strtolower($extension), $allowed)){
				echo '{"status":"error"}';
				exit;
			}

			if(move_uploaded_file($_FILES['upl']['tmp_name'], 'assets/resimler/turlar/'.$name)){
				
				

			 
			$resim_kaydet=$this->admin_model->resim_kaydet($id,$name,$kod);
			if($resim_kaydet==1){
				
			echo '{"status":"success"}';
			exit;			
				
			}	
				
				exit;
			}
		}

echo '{"status":"error"}';
exit;
	


      

        }
    }
	
	
	
	
	
	
	
	
	
	
	  public function foto_sil($id,$kod,$seo_adi,$foto_id,$tur_id,$foto_adi)
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin/admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin/admin');
            }
            else{echo $this->messages->To_Register('admin/admin');}

        }

        else{
			
	
			
		    $this->load->model('admin/admin_model');	

			$resim_sil=$this->admin_model->resim_sil($foto_id,$tur_id,$foto_adi);
			if($resim_sil==1){
				
				
			$this->load->library('messages');
			echo $this->messages->True_Delete('admin/admin/fotolar/'.$id.'/'.$kod.'/'.$seo_adi);	


			
				
			}	
			else{
				
				  $this->load->library('messages');
			echo $this->messages->False_Delete('admin/admin/fotolar/'.$id.'/'.$kod.'/'.$seo_adi);	
				
			}
			
			
		
			}
		


   
    }
	
	
	
	
	
	
	
	 public function rezervasyon()
    {

        $online=$this->session->userdata('adminonline');
		$admin_status=$this->session->userdata('admin_status');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin/admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin/admin');
            }
            else{echo $this->messages->To_Register('admin/admin');}

        }

        else{

	/*		$this->load->model('Cart_model');			
			$rez_getir=$this->Cart_model->rez_getir(18);
		
		
			$n=0;	if( $rez_getir ) :  foreach( $rez_getir as $dizi ) : 
				
            $sip[$n]["category"]=$this->Cart_model->kat_getir($dizi["tur_id"]);
            $sip[$n]["tur_adi"]=$this->Cart_model->tur_adi_getir($dizi["tur_id"]);
            $sip[$n]["duration"]=$this->Cart_model->duration_getir($dizi["tur_id"]);				
            $sip[$n]["bas_tar"]=$dizi["bas_tar"];			
            $sip[$n]["bit_tar"]=$dizi["bit_tar"];	
            $sip[$n]["bas_saat"]=$dizi["baslangic_saati"];			
            $sip[$n]["bit_saat"]=$dizi["bitis_saati"];	
            $sip[$n]["yetiskin"]=$dizi["yetiskin"];	
            $sip[$n]["cocuk"]=$dizi["cocuk"];	
            $sip[$n]["bebek"]=$dizi["bebek"];		
			$sip[$n]["rez_no"]=$dizi["id"];
			$sip[$n]["price"]=$dizi["tutar"];		
					
				$n=$n+1; endforeach;  endif; 
				
				print_r($sip);
				return FALSE;
*/


        $crud = new grocery_CRUD();
        $crud->set_theme('datatables');
        $crud->set_table('acente_rezervasyon');
        $crud->set_subject('Rezervasyon');
        $crud->columns('tur_id','rez_no','islem_tarihi','tutar','para_birimi','bas_tar','bit_tar','baslangic_saati','bitis_saati','İlgili Tur Detayları','Rezervasyon Detayları','durum','kart','iptal_kontrol');
        $crud->required_fields('tur_id','tur_kod','yetiskin','cocuk','tutar','para_birimi','bas_tar','bit_tar','baslangic_saati','bitis_saati');
		$crud->set_relation('tur_id','acente_tur','adi');
        $crud->display_as('tur_id','Bağlı olduğu tur Adı');	
        $crud->display_as('tur_kod','Bağlı olduğu tur Kodu');			
		$crud->field_type('tur_detay_id', 'hidden');
        $crud->field_type('durum','dropdown',
                array('1' => 'Tamamlandı', '0' => 'Tamamlanmadı'));	

/*
        $crud->field_type('iptal_durum','dropdown',
                array('2' => 'İptal Edildi','1' => 'İptal Onayı Bekliyor', '0' => 'İptal Edilmedi')); 
*/
        $crud->callback_column('İlgili Tur Detayları',array($this,'callback_turdetay'));		
        $crud->callback_column('Rezervasyon Detayları',array($this,'callback_rezervasyondetay'));			
        $crud->callback_column('kart',array($this,'callback_kart'));      
        $crud->callback_column('iptal_kontrol',array($this,'callback_iptal_kontrol'));         

        $crud->unset_edit_fields("kullanici_id","tur_id","tur_kod","yetiskin","cocuk","bebek","indirimsiz","tutar","para_birimi","bas_tar","bit_tar","baslangic_saati","bitis_saati"
		,"aciklama","kart","skt","cvv","adsoyad","varsa_tarih_degisim_nedeni","iptal_durum","varsa_iptal_nedeni","varsa_tarih_degisim_tarihi");	
	



       $crud->callback_before_update(array($this,'rez_onay'));
	   
	   
	   
			$state = $crud->getState();
			$state_info = $crud->getStateInfo();
 
			if($state == 'read')
			{	   

			$this->load->library('messages');
			if($admin_status==1){
			   echo $this->messages->config('admin/admin');	
			
			}	   
	   
			}
	

	
		
		$crud->unset_add();	
		$crud->unset_delete();	
		$crud->unset_clone();	
		//$crud->unset_edit();
		
         $data['side_menu']="Rezervasyon Detayı";
         $data['kilavuz']="  <b>Rezervasyon Detay Ayarları</b>";
         $output = $crud->render();
         $output->data=$data;
         //  $this->_example_output($output);
		$this->load->view('admin/index',(array)$output);


      

        }
    }
	
	
	
	
	

	
	function rez_onay($post_array, $primary_key = null)
{
    $online=$this->session->userdata('adminonline');
    if(empty($online))
    {
        $this->load->library('messages');
        $this->load->model('admin/admin_model');
        $sonuc=$this->admin_model->admin_query();

        if($sonuc){
            echo $this->messages->To_Login('admin/admin');
        }
        else{echo $this->messages->To_Register('admin/admin');}

    }

    else{

        if($post_array['durum']==0){
			
            return $post_array;				
			
		}
        if($post_array['durum']==1){
			
	/*		
			if($primary_key=="18"){ return FALSE;		}
			if($primary_key!="18"){  return $post_array; 	        }
	*/		
	
	
		
	
	
			$this->load->model('Cart_model');			
			$rez_getir=$this->Cart_model->rez_getir($primary_key);
            $ep_getir=$this->Cart_model->ep_getir($primary_key);
			
			
			$cart_getir=$this->Cart_model->cart_getir($kul_id);
			
		  	$this->load->library('Funcs');	
			for($i=0; $i<=100; $i++){
			$rez_no=$this->funcs->getName();	
			$kontrol=$this->Cart_model->rez_no_kontrol($rez_no);	
			if($kontrol==1){	break;	}	
			}
			
	
			$n=0;	if( $rez_getir ) :  foreach( $rez_getir as $dizi ) : 
				
            $sip[$n]["category"]=$this->Cart_model->kat_getir($dizi["tur_id"]);
            $sip[$n]["tur_adi"]=$this->Cart_model->tur_adi_getir($dizi["tur_id"]);
            $sip[$n]["duration"]=$this->Cart_model->duration_getir($dizi["tur_id"]);	
            $sip[$n]["resim"]=$this->Cart_model->rs_getir($dizi["tur_id"]);		
             $sip[$n]["meeting"]=$this->Cart_model->meeting_getir($dizi["tur_id"]);               	
            $sip[$n]["bas_tar"]=$dizi["bas_tar"];			
            $sip[$n]["bit_tar"]=$dizi["bit_tar"];	
            $sip[$n]["bas_saat"]=$dizi["baslangic_saati"];			
            $sip[$n]["bit_saat"]=$dizi["bitis_saati"];	
            $sip[$n]["yetiskin"]=$dizi["yetiskin"];	
            $sip[$n]["cocuk"]=$dizi["cocuk"];	
            $sip[$n]["bebek"]=$dizi["bebek"];		
			//$sip[$n]["rez_no"]=$dizi["id"];
			$sip[$n]["rez_no"]=$dizi["rez_no"];
			$sip[$n]["price"]=$dizi["tutar"];		
					
				$n=$n+1; endforeach;  endif; 	


			$this->load->library('mail/Eposta');
            $this->eposta->siparis_gonder($sip,$ep_getir);
			

            return $post_array;		
			
			
			}	

		
   

}

}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
		
	 public function on_rezervasyon()
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin/admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin/admin');
            }
            else{echo $this->messages->To_Register('admin/admin');}

        }

        else{

	



        $crud = new grocery_CRUD();
        $crud->set_theme('datatables');
        $crud->set_table('acente_on_rez');
        $crud->set_subject('Ön Rezervasyon');
        $crud->columns('tur_id','tur_kod','yetiskin','cocuk','tutar','para_birimi','bas_tar','bit_tar','baslangic_saati','bitis_saati','İlgili Tur Detayları','tarih','durum','Onayla');
        $crud->required_fields('tur_id','tur_kod','yetiskin','cocuk','tutar','para_birimi','bas_tar','bit_tar','baslangic_saati','bitis_saati');
		$crud->set_relation('tur_id','acente_tur','adi');
        $crud->display_as('tur_id','Bağlı olduğu tur Adı');	
        $crud->display_as('tur_kod','Bağlı olduğu tur Kodu');			
		$crud->field_type('tur_detay_id', 'hidden');
        $crud->field_type('durum','dropdown',
                array('1' => 'Onay Bekliyor', '0' => 'İptal Edildi'));	
				
        $crud->callback_column('İlgili Tur Detayları',array($this,'callback_turdetay'));		
        $crud->callback_column('Onayla',array($this,'callback_onay'));	
		
		
		$crud->unset_add();	
		$crud->unset_delete();	
		$crud->unset_clone();	
	//	$crud->unset_edit();
		$crud->unset_edit_fields("kullanici_id","tur_id","tur_kod","tur_detay_id","yetiskin","cocuk","bebek",
		"indirimsiz","tutar","para_birimi","bas_tar","bit_tar","baslangic_saati","bitis_saati");
		
         $data['side_menu']="Ön Rezervasyon Detayı";
         $data['kilavuz']="  <b>Ön Rezervasyon Detay Ayarları</b>";
         $output = $crud->render();
         $output->data=$data;
         //  $this->_example_output($output);
		$this->load->view('admin/index',(array)$output);


      

        }
    }
	
	
	   public function callback_onay($value, $row)
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



         return "<a class='btn btn-default' href='".site_url('admin/admin/on_rez_onay/'.$row->id)."'>Onayla</a>";
   

 
			
			
			
			
			
        }


    }
	
	
	
	
	
	
		   public function on_rez_onay($value)
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

 
        if(!is_numeric($value)){
			
			return FALSE;
			
		}

	    $this->load->library('messages');
        $this->load->model('admin/Admin_model');   


		$rezerve=$this->Admin_model->sepet($value);	

		
		$this->messages->True_Pay("admin/admin/rezervasyon");	   
		return FALSE;	
			
			
			
        }


    }
	
	
	
	
	
	
	
	
	
	
	
			    public function callback_turdetay($value, $row)
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



         return "<a class='btn btn-default' href='".site_url('admin/admin/turdetay/'.$row->tur_id)."'>Tur Detayları</a>";
   

 
			
			
			
			
			
        }


    }
	
	
			    public function turdetay($id)
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

				 $id=trim($id); $id=strip_tags($id); $id=htmlentities($id);

			if($id==""){
			
		  $this->load->library('messages');
          echo $this->messages->config('admin/admin/rezervasyon');
			
		}


            $this->load->model('admin/admin_model');
            $tur_turu=$this->admin_model->tur_turu($id);
			



        if($tur_turu=="surekli"){
			
			  $this->load->library('messages');
              echo $this->messages->config('admin/admin/surekli_tur/read/'.$id);
			
		}	
			
		     if($tur_turu=="belirli"){
			
			  $this->load->library('messages');
              echo $this->messages->config('admin/admin/belirli_tarih_tur/'.$id);
			
		}		
			
		 if($tur_turu=="otel"){
			
			  $this->load->library('messages');
              echo $this->messages->config('admin/admin/otel/'.$id);
			
		}		
			
			
			
        }


    }
	
	
	
	
	
	
	
	
	
			    public function callback_rezervasyondetay($value, $row)
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



         return "<a class='btn btn-default' href='".site_url('admin/admin/rezervasyon_detay/'.$row->id)."'>Rezervasyon Detayları</a>";
   

 
			
			
			
			
			
        }


    }
	
	
    
                public function callback_kart($value, $row)
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



         return "<a class='btn btn-default' href='".site_url('admin/admin/kart_detay/'.$row->kullanici_id)."'>Kullanıcı Kartları</a>";
   

 
            
            
            
            
            
        }


    }
    
    
	
                public function callback_iptal_kontrol($value, $row)
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



    if($row->iptal_durum==0){
        return "İptal edilmedi";
        return FALSE;
    }

        if($row->iptal_durum==1){
     return "<a class='btn btn-default' href='".site_url('admin/admin/iptal_guncelle/'.$row->kullanici_id.'/'.$row->id.'/2')."'>İptal Onayla</a><br>
     <a class='btn btn-default' href='".site_url('admin/admin/iptal_guncelle/'.$row->kullanici_id.'/'.$row->id.'/0')."'>İptal Reddet</a>";             
             return FALSE;      
    }

        if($row->iptal_durum==2){
        return "İptal edildi";
              return FALSE;     
    }

   

 
            
            
            
            
            
        }


    }
    
    
	
	
	
	 public function rezervasyon_detay($id)
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin/admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin/admin');
            }
            else{echo $this->messages->To_Register('admin/admin');}

        }

        else{

					 $id=trim($id); $id=strip_tags($id); $id=htmlentities($id);

			if($id==""){
			
					$this->load->library('messages');
					echo $this->messages->config('admin/admin/rezervasyon');
			
					}


            $this->load->model('admin/admin_model');
            $rez_varmi=$this->admin_model->rez_varmi($id);


			if($rez_varmi==0){
			
			$this->load->library('messages');
			$this->messages->config('admin/admin/rezervasyon');
			return FALSE;
			
			}
			
	     	
			

        $crud = new grocery_CRUD();
        $crud->set_theme('datatables');
        $crud->set_table('acente_rezervasyon_detay');
        $crud->set_subject('Rezervasyon Detay');
        $crud->columns('eriskin','adi','soyadi','email','tel','sehir','otel_adi');
        $crud->required_fields('eriskin','adi','soyadi');
		$crud->where('rez_id',$id);
        $crud->display_as('eriskin','Erişkinlik Durumu');	

							

		$crud->unset_add();	
		$crud->unset_delete();
		$crud->unset_edit();			
		$crud->unset_clone();	
		$crud->unset_read();
		
         $data['side_menu']="Rezervasyon Detay Detayı";
         $data['kilavuz']="  <b>Rezervasyon Detay Ayarları</b>";
         $output = $crud->render();
         $output->data=$data;
         //  $this->_example_output($output);
		$this->load->view('admin/index',(array)$output);


      

        }
    }
	
	






     public function kart_detay($id)
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin/admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin/admin');
            }
            else{echo $this->messages->To_Register('admin/admin');}

        }

        else{

                     $id=trim($id); $id=strip_tags($id); $id=htmlentities($id);

            if($id==""){
            
                    $this->load->library('messages');
                    echo $this->messages->config('admin/admin/rezervasyon');
            
                    }


            
            

        $crud = new grocery_CRUD();
        $crud->set_theme('datatables');
        $crud->set_table('acente_kart');
        $crud->set_subject('Kart Detay');
        $crud->columns('adi_soyadi','tarih','durum');
        $crud->required_fields('eriskin','adi','soyadi');
        $crud->where('kullanici_id',$id);

                            
        $crud->unset_edit_fields("kullanici_id","kart_no","adi_soyadi","tarih","kod"); 
        $crud->unset_add(); 
        $crud->unset_delete();            
        $crud->unset_clone();  

        $crud->field_type('durum','dropdown',
                array('1' => 'Geçerli Kart', '0' => 'Geçersiz Kart'));  

        $crud->callback_after_update(array($this, 'kart_durum_guncelle'));
        
         $data['side_menu']="Kart Detayı";
         $data['kilavuz']="  <b>Kart Detay Ayarları</b>";
         $output = $crud->render();
         $output->data=$data;
         //  $this->_example_output($output);
        $this->load->view('admin/index',(array)$output);


      

        }
    }
    





function kart_durum_guncelle($post_array,$primary_key)
{

    $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin/admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                    return false;
            }
            else{ return false; }

        }

        else{


if($post_array["durum"]==0){

            $this->load->model('admin/admin_model');
          $kul = $this->admin_model->kart_kullanici_getir($primary_key);  

          $mail = $this->admin_model->kullanici_mail_getir($kul);        

            $this->load->library('mail/Eposta');
            $this->eposta->kart_guncelle($mail);



 
    return true;

}
else{

    return true;

}




}
 
}









function iptal_guncelle($kul_id,$tur_id,$durum)
{

    $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin/admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                    return false;
            }
            else{ return false; }

        }

        else{

    $kul_id=trim($kul_id); $kul_id=strip_tags($kul_id); $kul_id=htmlentities($kul_id);
    $tur_id=trim($tur_id); $tur_id=strip_tags($tur_id); $tur_id=htmlentities($tur_id);
    $durum=trim($durum); $durum=strip_tags($durum); $durum=htmlentities($durum);

    if((!is_numeric($kul_id))or(!is_numeric($tur_id))or(!is_numeric($durum)))
        {

                  $this->load->library('messages');
                  echo $this->messages->config('admin/admin');
                  return FALSE;


        }



            $this->load->model('admin/admin_model');
            $iptal_guncelle=$this->admin_model->iptal_guncelle($kul_id,$tur_id,$durum);     


       

if($iptal_guncelle=1){

            $kul_mail=$this->admin_model->kullanici_mail_getir($kul_id); 
            $this->load->library('mail/Eposta');
            $this->eposta->rez_iptal_bildirim($kul_mail);
    




        $this->load->library('messages');
        echo $this->messages->True_Add('admin/admin/rezervasyon');
        return FALSE;
}

if($iptal_guncelle=0){
        $this->load->library('messages');
        echo $this->messages->False_Add('admin/admin/rezervasyon');
        return FALSE;
    
}




}
 
}








	
	 public function istek_listesi($id)
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin/admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin/admin');
            }
            else{echo $this->messages->To_Register('admin/admin');}

        }

        else{

					 $id=trim($id); $id=strip_tags($id); $id=htmlentities($id);

			if($id==""){
			
					$this->load->library('messages');
					echo $this->messages->config('admin/admin');
			return FALSE;
					}


            $this->load->model('admin/admin_model');
            $rez_varmi=$this->admin_model->rez_varmi($id);

			if($rez_varmi==0){
			
			$this->load->library('messages');
			echo $this->messages->config('admin/admin/rezervasyon');
	           return FALSE;		
			}

        $crud = new grocery_CRUD();
        $crud->set_theme('datatables');
        $crud->set_table('acente_istek');
        $crud->set_subject('İstek Listesi');
        $crud->columns('tur_id','kullanici_id','Tur Kodu');
        $crud->required_fields('tur_id','kullanici_id');
		$crud->where('tur_id',$id);
		$crud->set_relation('tur_id','acente_tur','adi');
		$crud->set_relation('kullanici_id','acente_uyeler','username');	
        $crud->display_as('tur_id','İstek Yapılan Tur');
        $crud->display_as('kullanici_id','İstek Yapan Kullanıcı');		

        $crud->callback_column('Tur Kodu',array($this,'callback_turkod'));			
		
		$crud->unset_add();	
		$crud->unset_delete();
		$crud->unset_edit();	
		$crud->unset_read();		
		$crud->unset_clone();	

		
         $data['side_menu']="İstek Listesi Detayı";
         $data['kilavuz']="  <b>İstek ListesiDetay Ayarları</b>";
         $output = $crud->render();
         $output->data=$data;
         //  $this->_example_output($output);
		$this->load->view('admin/index',(array)$output);


      

        }
    }
	
	
	
	
				    public function callback_turkod($value, $row)
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

            $this->load->model('admin/admin_model');
            $tur_turu=$this->admin_model->tur_turu($row->tur_id);
			
			if($tur_turu=="surekli"){
				
		         return "<a class='btn btn-default' href='".site_url('admin/admin/surekli_tur/read/'.$row->tur_id)."'>Tur Detayı</a>";
   		
			}
			if($tur_turu=="belirli"){
				
			     return "<a class='btn btn-default' href='".site_url('admin/admin/belirli_tarih_tur/read/'.$row->tur_id)."'>Tur Detayı</a>";
   	
				
			}
			if($tur_turu=="otel"){
			
			return "<a class='btn btn-default' href='".site_url('admin/admin/otel/read/'.$row->tur_id)."'>Tur Detayı</a>";
   	
			
			}	


 
			
			
			
			
			
        }


    }
	
	
	
	
	
		 public function sayfalar()
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin/admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin/admin');
            }
            else{echo $this->messages->To_Register('admin/admin');}

        }

        else{

		

        $crud = new grocery_CRUD();
        $crud->set_theme('datatables');
        $crud->set_table('acente_sayfalar');
       $crud->set_subject('İçerik Sayfaları');
        $crud->columns('adi');
        $crud->required_fields('baslik','icerik');
	
		$crud->field_type('seo_adi', 'hidden');
		$crud->callback_before_insert(array($this,'insert_seo'));
            $crud->display_as('anahtar','Anahtar Kelimeler');	
		$crud->unset_edit_fields('adi');			
	        $crud->unset_add();		
	        $crud->unset_clone();				
	        $crud->unset_delete();
	 		
	if($this->session->userdata('admin_dil')=="en"){
	$crud->unset_fields("adi_tr","baslik_tr","icerik_tr","adi_ru","baslik_ru","icerik_ru","adi_esp","baslik_esp","icerik_esp");
	}
	else if($this->session->userdata('admin_dil')=="tr"){
	$crud->unset_fields("adi_ru","baslik_ru","icerik_ru","adi_esp","baslik_esp","icerik_esp");
	}	
	else if($this->session->userdata('admin_dil')=="ru"){
	$crud->unset_fields("adi_tr","baslik_tr","icerik_tr","adi_esp","baslik_esp","icerik_esp");
	}

	else if($this->session->userdata('admin_dil')=="esp"){
	$crud->unset_fields("adi_tr","baslik_tr","icerik_tr","adi_ru","baslik_ru","icerik_ru");
	}		
	else {
	$crud->unset_fields("adi_tr","baslik_tr","icerik_tr","adi_ru","baslik_ru","icerik_ru","adi_esp","baslik_esp","icerik_esp");		
	}
	
	/*	*/
           $data['side_menu']="Yardım Sayfaları";
           $data['kilavuz']="  <b>Yardım Sayfaları Ayarları</b>";
		 
         $output = $crud->render();
		 
          $output->data=$data;
         //  $this->_example_output($output);
		$this->load->view('admin/index',(array)$output);


      

        }
    }
	
	
	
	
	
	
	
	
	
		 public function engelli_tarihler($kod=null,$id=null,$adi=null)
    {

            $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin/admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin/admin');
            }
            else{echo $this->messages->To_Register('admin/admin');}

        }

        else{

		
		  $this->load->library('messages');	
			if(($kod=="")or($id=="")){
			echo $this->messages->config('');	
			return FALSE;	
				}
				
			if(!is_numeric($id)){
			echo $this->messages->config('');	
			return FALSE;	
				}	 			
				

		    $this->load->model('admin/admin_model');
            $sonuc=$this->admin_model->tur_kontrol($id,$kod,$adi);

				if($sonuc!=1){
			   echo $this->messages->config('');	
			  return FALSE;	
				}		
		
		
		
		
		

        $crud = new grocery_CRUD();
        $crud->set_theme('datatables');
        $crud->set_table('acente_tarih_engel');
		$crud->set_subject($adi.'Engelli Tarihleri');
        $crud->columns('tarih');
		$crud->where('tur_id',$id);
        $crud->required_fields('tarih');
	
		$crud->field_type('tur_id', 'hidden', $id);
		$crud->field_type('tur_kod', 'hidden', $kod);		

	        $crud->unset_clone();				
	
		
         $data['side_menu']=$adi."'Engelli Tarihler'";
         $output = $crud->render();
         $output->data=$data;
         //  $this->_example_output($output);
		$this->load->view('admin/index',(array)$output);


      

        }
    }
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
		 public function yardim()
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin/admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin/admin');
            }
            else{echo $this->messages->To_Register('admin/admin');}

        }

        else{

		

        $crud = new grocery_CRUD();
        $crud->set_theme('datatables');
        $crud->set_table('acente_yardim');
        $crud->set_subject('Yardım Sayfaları');
        $crud->columns('soru');
        $crud->required_fields('soru','cevap');
	
	if($this->session->userdata('admin_dil')=="en"){
	$crud->unset_fields("soru_tr","cevap_tr","soru_ru","cevap_ru","soru_esp","cevap_esp");
	}
	else if($this->session->userdata('admin_dil')=="tr"){
	$crud->unset_fields("soru","cevap","soru_esp","cevap_esp");
	}	
	else if($this->session->userdata('admin_dil')=="ru"){
	$crud->unset_fields("soru_tr","cevap_tr","soru_esp","cevap_esp");
	}	
	
	else if($this->session->userdata('admin_dil')=="esp"){
	$crud->unset_fields("soru_tr","cevap_tr","soru_ru","cevap_ru");
	}		
	
	else {  	$crud->unset_fields("soru_tr","cevap_tr","soru_ru","cevap_ru","soru_esp","cevap_esp");  	}
	

		
         $data['side_menu']="Yardım Sayfaları";
         $data['kilavuz']="  <b>Yardım Sayfaları Ayarları</b>";
         $output = $crud->render();
         $output->data=$data;
         //  $this->_example_output($output);
		$this->load->view('admin/index',(array)$output);


      

        }
    }
	
	
	

	
	
		public function reklam()
	{

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin/admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin/admin');
            }
            else{echo $this->messages->To_Register('admin/admin');}

        }

        else{
			

			
			$this->load->library('messages');
		echo $this->messages->config('admin/admin/mail');
			return FALSE;		
	
	
	  

	}

	}
	
	
	
	
	public function mail()
	{
  $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin/admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin/admin');
            }
            else{echo $this->messages->To_Register('admin/admin');}

        }

        else{
	
			//Bayi ekleme sayfası
	
	
	
	
	
	      $this->load->Model('admin/admin_model', 'Model');
		  $data['mail'] = $this->Model->mail_getir();
		  
		  
	  
		  $data['sayfa'] = 'E-Posta Gönder';
	   
		  $this->load->view('admin/eposta.php',$data);
	
	
	
	
		  }
  

	}
	
	
		
	public function mail_gonder()
	{
  $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin/admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin/admin');
            }
            else{echo $this->messages->To_Register('admin/admin');}

        }

        else{
	
			//Bayi ekleme sayfası
	
	
	
	
	
	
			$epostalar=$this->input->post('epostalar',TRUE);
			$say=count($epostalar);
			$bas=$this->input->post('bas',TRUE);
			$ice=$this->input->post('ice',TRUE);
			
	
			
		$this->load->library('mail/reklam_mail');
		$mail_sinifi = new reklam_mail();
		
			
		if($say==0){
			
	echo "<br><br><center><b>Lütfen en az 1 adet e-posta adresi seçiniz.</b></center>";
	echo '<meta http-equiv="refresh" content="2;URL=mail">';
	return FALSE;		
		}
		
			
			$mail_adresleri=$epostalar;
			$ice.=" <br><br>Mail Listesinden ayrılmak için <a href='".base_url()."admin/admin/mail_cikis/";
			$gonder = $mail_sinifi->gonder_icerik($mail_adresleri,$bas,$ice);
            
		if($gonder!=TRUE)
		{
	echo "<br><br><center><b>Gönderim başarısız</b></center>";
	echo '<meta http-equiv="refresh" content="2;URL=mail">';
	return FALSE;
		}	
			
	echo "<br><br><center><b>Gönderim başarılı</b></center>";
	echo '<meta http-equiv="refresh" content="2;URL=mail">';
	return FALSE;	
		
		
			

	
		  }
  

	}
	
	

	
	
	
	
	public function mail_cikis($id,$ep1,$ep2)
	{
	if(($id=="")or($ep1=="")or($ep2=="")){
		
		$this->load->library('messages');
        $this->messages->config('');
		
	}
	
		 $id=trim($id); $id=strip_tags($id); $id=htmlentities($id);
		 $ep1=trim($ep1); $ep1=strip_tags($ep1); $ep1=htmlentities($ep1);
		 $ep2=trim($ep2); $ep2=strip_tags($ep2); $ep2=htmlentities($ep2);
		 
            $this->load->model('admin/admin_model');
            $mail_cikis=$this->admin_model->mail_cikis($id,$ep1,$ep2);
	if($mail_cikis!=1)
		{
	echo "<br><br><center><b>Mail Listesinden çıkış işleminiz başarısız başarısız , Lütfen iletişime geçiniz.</b></center>";
	echo '<meta http-equiv="refresh" content="2;URL='.base_url().'/admin/admin/mail">';
	return FALSE;
		}	
			
	echo "<br><br><center><b>Mail Listesinden çıkış işleminiz başarılı</b></center>";
	echo '<meta http-equiv="refresh" content="2;URL='.base_url().'/admin/admin/mail">';
	return FALSE;	
	
	
	}
	
	
	
	    public function currency($edit=null,$id=null)

    {


        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin/admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin/admin');
            }
            else{echo

            $this->messages->To_Register('admin/admin');}

        }

        else{



            if($id==1)
        {


            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('acente_currency');
            $crud->set_subject('Döviz Kurları 1 Euro karşılıkları Örnek:1.56');
            $crud->columns('euro','dollar','pound','tl');
	        $crud->required_fields();	
            $crud->unset_add();
            $crud->unset_read();
            $crud->unset_delete();
            $crud->unset_export();
            $crud->unset_print();
            $crud->unset_back_to_list();
            $crud->unset_edit_fields("euro");


            $data['side_menu']="Döviz Kurları";
            $data['kilavuz']="  <b>Döviz Kurları</b>";
            $output = $crud->render();
            $output->data=$data;
          //  $this->_example_output($output);
		$this->load->view('admin/index',(array)$output);
        }
        else{
                $this->load->library('messages');
                echo $this->messages->config('admin/admin/currency/edit/1');

            }




}
             }
	
	
	
	 public function lang($dil)
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin/admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin/admin');
            }
            else{echo $this->messages->To_Register('admin/admin');}

        }

        else{
			
			
			
			if($dil=="tr"){
				
					$this->session->set_userdata('admin_dil',$dil);
					$dil=$this->session->userdata('admin_dil');			
				
			}
			else if($dil=="ru"){
				
					$this->session->set_userdata('admin_dil',$dil);
					$dil=$this->session->userdata('admin_dil');						
				
			}	
			
			else if($dil=="esp"){
				
					$this->session->set_userdata('admin_dil',$dil);
					$dil=$this->session->userdata('admin_dil');						
				
			}			
			
			
			else{
			
					$this->session->set_userdata('admin_dil',"en");
					$dil=$this->session->userdata('admin_dil');				
				
			}

			
			$this->session->userdata('admin_dil');
			//return FALSE;
			
			
				$url=$_SERVER['HTTP_REFERER'];
				$parcala=explode(base_url(),$url);
				//print_r($parcala);
				//return FALSE;

				$this->load->library('messages');
				$this->messages->config($parcala[1]);
				return FALSE;	
			
			
			
			
			
	}}
	
	
	 public function sirala($adi=null)
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin/admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin/admin');
            }
            else{echo $this->messages->To_Register('admin/admin');}

        }

        else{
			
			
			
			if(($adi!="surekli")and($adi!="belirli")and($adi!="otel")){
				$this->load->library('messages');
				$this->messages->config("");
				return FALSE;
				
			}
		
	
            $this->load->model('admin/admin_model');
            $data["turlar"]=$this->admin_model->turlar_getir($adi);			

		$this->load->view('admin/sirala',$data);	
			
			
			
	}}
	
	
	
	 public function sira_al()
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin/admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin/admin');
            }
            else{echo $this->messages->To_Register('admin/admin');}

        }

        else{
			
			$data=$this->input->post('data',TRUE);	
			
			$data=explode(",",$data);
			$say = count($data);
			
			 $dongu = $say-1;
            $this->load->model('admin/admin_model');	
			
			for ($i=0; $i<=$dongu; $i++){
			 $sira = $i;					
			 $id = $data[$i];	
     
            $this->admin_model->turlar_sira_update($sira,$id);					
				
			}
			
			
	       //echo 1;

			
			
			
	}}
	










    
    
    
        
     public function kupon()
    {

        $online=$this->session->userdata('adminonline');
        if(empty($online))
        {
            $this->load->library('messages');
            $this->load->model('admin/admin_model');
            $sonuc=$this->admin_model->admin_query();

            if($sonuc){
                echo $this->messages->To_Login('admin/admin');
            }
            else{echo $this->messages->To_Register('admin/admin');}

        }

        else{

        $crud = new grocery_CRUD();    
 $state = $crud->getState();
$state_info = $crud->getStateInfo();
 
if($state == 'add')
{
        $crud->field_type('kod', 'hidden');
}
if($state == 'edit')
{
        $crud->field_type('kod', 'hidden');
}




        $crud->set_theme('datatables');
        $crud->set_table('acente_kampanya');
        $crud->set_subject('Kampanya');
        $crud->columns('adi_aciklama','kod','bas_tar','bit_tar','kullanim_siniri','kullanim','indirim_oran');
        $crud->required_fields('adi_aciklama','bas_tar','bit_tar','kullanim_siniri','kullanim','indirim_oran');         

        $crud->field_type('durum','dropdown',
                array('1' => 'Aktif', '0' => 'Pasif'));  



        $crud->callback_before_insert(array($this,'kod_olustur_kampanya'));

      
     
        $crud->unset_add_fields("kullanim"); 
        $crud->unset_edit_fields("kod","kullanim"); 
        $crud->unset_clone();  
        
         $data['side_menu']="Kupon Kodu";
         $data['kilavuz']="  <b>Kupon Kodu Ayarları</b>";
         $output = $crud->render();
         $output->data=$data;
         //  $this->_example_output($output);
        $this->load->view('admin/index',(array)$output);


      

        }
    }
    



function kod_olustur_kampanya($post_array) {

      $this->load->library('funcs');
      $post_array['kod'] = $this->funcs->kod(6);
 
      return $post_array;
} 









	
}
