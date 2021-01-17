<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Giris extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->library('Sec');
        echo $this->sec->process();

        $this->load->library('Funcs');
        echo $this->funcs->index($this->session->userdata('currency'), $this->session->userdata('lng_turu'));

        //    print_r($this->session->userdata('lng')["menu"]);

    }

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *         http://example.com/index.php/welcome
     *    - or -
     *         http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

    public function index()
    {

        if ($this->session->userdata('lng_turu') == "Eng") {$uz = "";
            $data["uz"] = "";}
        if ($this->session->userdata('lng_turu') == "Tr") {$uz = "_tr";
            $data["uz"] = "_tr";}
        if ($this->session->userdata('lng_turu') == "Ru") {$uz = "_ru";
            $data["uz"] = "_ru";}
        if ($this->session->userdata('lng_turu') == "Esp") {$uz = "_esp";
            $data["uz"] = "_esp";}

        /*********Cache Open***********/
        if ($this->session->userdata('useronline') == "") {$cachedosyasi = "cache/ip_" . md5($_SERVER['REMOTE_ADDR']) . "_tur_anasayfa.php";} else { $cachedosyasi = "cache/kull_" . $this->session->userdata('kul_id') . "_tur_anasayfa.php";}
        $cachetime = 1;if (file_exists($cachedosyasi) && (time() - $cachetime < filemtime($cachedosyasi))) {include $cachedosyasi;exit;}ob_start();
        /*********Cache Open***********/

        error_reporting(0);

        $this->load->model('Giris_model');
        $data["ayar"] = $this->Giris_model->ayar();
        $data["turlar_home"] = $this->Giris_model->turlar_home($uz);
        $data["populer_tur"] = $this->Giris_model->populer_tur();
        $data["populer_ana_kategori"] = $this->Giris_model->populer_ana_kategori();

        $n = 0;if ($data["turlar_home"]): foreach ($data["turlar_home"] as $dizi):

                for ($i = 0; $i <= 3; $i++) {

                    if ($dizi["tur"][$i]["kod"]) {

                        $t_kod = $dizi["tur"][$i]["kod"];

                        $data["puan"][$t_kod]["tur_puan_guven"] = $this->Giris_model->tur_puan_guven($t_kod);
                        $data["puan"][$t_kod]["tur_puan_org"] = $this->Giris_model->tur_puan_org($t_kod);
                        $data["puan"][$t_kod]["tur_puan_para"] = $this->Giris_model->tur_puan_para($t_kod);
                        $data["puan"][$t_kod]["tur_puan_servis"] = $this->Giris_model->tur_puan_servis($t_kod);
                        $data["puan"][$t_kod]["tur_puan_genel"] = $data["puan"][$t_kod]["tur_puan_guven"] + $data["puan"][$t_kod]["tur_puan_org"] + $data["puan"][$t_kod]["tur_puan_para"] + $data["puan"][$t_kod]["tur_puan_servis"];
                        $data["puan"][$t_kod]["tur_puan_genel"] = round($data["puan"][$t_kod]["tur_puan_genel"] / 4);

                    }

                }

                $n = $n + 1;endforeach;endif;

        $n = 0;if ($data["populer_ana_kategori"]): foreach ($data["populer_ana_kategori"] as $dizi):
                $data["populer_ana_kategori_sayi"][$n] = $this->Giris_model->populer_ana_kategori_sayi($dizi["id"]);
                $n = $n + 1;endforeach;endif;

        $data["populer_kategori"] = $this->Giris_model->populer_kategori();

        $this->load->view('index', $data);

        /*********Cache close***********/
        $ch = fopen($cachedosyasi, 'w');
        fwrite($ch, ob_get_contents());
        fclose($ch);
        ob_end_flush();
        /*********Cache close***********/

    }
    public function kayit()
    {

        $useronline = $this->session->userdata('useronline');
        if ($useronline != "") {
            $this->load->library('Messages');
            echo $this->messages->config('');
            return false;

        }

        if ($this->session->userdata('lng_turu') == "Eng") {$uz = "";
            $data["uz"] = "";}
        if ($this->session->userdata('lng_turu') == "Tr") {$uz = "_tr";
            $data["uz"] = "_tr";}
        if ($this->session->userdata('lng_turu') == "Ru") {$uz = "_ru";
            $data["uz"] = "_ru";}
        if ($this->session->userdata('lng_turu') == "Esp") {$uz = "_esp";
            $data["uz"] = "_esp";}

        $this->load->model('Giris_model');
        $data["ayar"] = $this->Giris_model->ayar();
        $this->load->view('user-operation', $data);

    }

    public function kayit_al()
    {
        error_reporting(0);
        $useronline = $this->session->userdata('useronline');
        if ($useronline != "") {
            $this->load->library('Messages');
            echo $this->messages->config('');
            return false;

        }

        if ($this->session->userdata('lng_turu') == "Eng") {$uz = "";
            $data["uz"] = "";}
        if ($this->session->userdata('lng_turu') == "Tr") {$uz = "_tr";
            $data["uz"] = "_tr";}
        if ($this->session->userdata('lng_turu') == "Ru") {$uz = "_ru";
            $data["uz"] = "_ru";}
        if ($this->session->userdata('lng_turu') == "Esp") {$uz = "_esp";
            $data["uz"] = "_esp";}

        $isim = $this->input->post('isim', true);
        $kl = $this->input->post('kl', true);
        $ps = $this->input->post('ps', true);
        $ps2 = $this->input->post('ps2', true);
        $em = $this->input->post('em', true);

        $isim = trim($isim);
        $kl = trim($kl);
        $ps = trim($ps);
        $ps2 = trim($ps2);
        $em = trim($em);

        $isim = htmlentities($isim);
        $kl = htmlentities($kl);
        $ps = htmlentities($ps);
        $ps2 = htmlentities($ps2);
        $em = htmlentities($em);

        $isim = strip_tags($isim);
        $kl = strip_tags($kl);
        $ps = strip_tags($ps);
        $ps2 = strip_tags($ps2);
        $em = strip_tags($em);

        if ($ps != $ps2) {

            $this->load->library('Messages');
            echo $this->messages->Pass_Error('giris/kayit');
            return false;
        }

        $sf = md5($ps);
        $this->load->model('Giris_model');
        $uye_kaydet = $this->Giris_model->uye_kaydet($isim, $kl, $sf, $em);
        if ($uye_kaydet != 1) {
            $this->load->library('Messages');
            echo $this->messages->False_Register_Message('giris/kayit');
            return false;

        }

        $this->load->library('mail/eposta');
        $mail = $this->eposta->kayit(base_url(), $isim, $kl, $sf, $em);

        if ($mail == true) {

            $this->load->library('Messages');
            echo $this->messages->True_Add_user_Message('giris/kayit');

        }

        //$this->load->view('user-operation',$data);

    }

    public function kayit_al_sosyal()
    {

        $data = $this->input->post('veriler', true);
        $data = json_decode($data);
        $data = (array) $data;
        $status = $data["status"];
        $name_surname = $data["name_surname"];
        $email = $data["email"];
        $login_type = $data["login_type"];

        $id = $data["id"];

        $sf = md5($id);
        $this->load->model('Giris_model');
        $return = $this->Giris_model->user_return_sosyal($email);
        if ($return == false) {
            $uye_kaydet = $this->Giris_model->uye_kaydet($name_surname, $email, $sf, $email, $login_type);

        }

        //print_r($return);
        $return = $this->Giris_model->user_return_sosyal($email);

        if ($return != false) {

            if ($return): foreach ($return as $dizi):
                    $email = $dizi["email"];
                    $name = $dizi["name"];
                    $kul_id = $dizi["id"];

                endforeach;endif;
            /**/
            $this->session->set_userdata('useronline', $email);
            $useronline = $this->session->userdata('useronline');
            $this->session->set_userdata('useremail', $email);
            $useremail = $this->session->userdata('useremail');
            $this->session->set_userdata('user_person_name', $name);
            $user_person_name = $this->session->userdata('user_person_name');

            $this->session->set_userdata('kul_id', $kul_id);

            $kul_id = $this->session->userdata('kul_id');

            // Sepetteki ve ön rezervasyondaki işlemler

            $this->load->library('Funcs');
            $ip = $this->funcs->GetIP();

            $sepet_update = $this->Giris_model->sepet_update($ip, $kul_id);
            $rez_update = $this->Giris_model->rez_update($ip, $kul_id);

            echo 1;

        } else {

            echo 0;

        }

        /**/

    }

    public function success($pass)
    {
        error_reporting(0);
        $this->load->library('Messages');
        $this->load->model('Giris_model');

        $useronline = $this->session->userdata('useronline');
        if ($useronline != "") {

            echo $this->messages->config('');
            return false;

        }

        if ($this->session->userdata('lng_turu') == "Eng") {$uz = "";
            $data["uz"] = "";}
        if ($this->session->userdata('lng_turu') == "Tr") {$uz = "_tr";
            $data["uz"] = "_tr";}
        if ($this->session->userdata('lng_turu') == "Ru") {$uz = "_ru";
            $data["uz"] = "_ru";}
        if ($this->session->userdata('lng_turu') == "Esp") {$uz = "_esp";
            $data["uz"] = "_esp";}

        $uye_onay = $this->Giris_model->uye_onay($pass);

        if ($uye_onay != 1) {

            echo $this->messages->False_Onay_Message('giris/kayit');
            return false;

        }

        echo $this->messages->True_Onay_Message('giris/kayit');
        return false;

    }

    public function login()
    {
        $useronline = $this->session->userdata('useronline');
        if ($useronline != "") {
            $this->load->library('Messages');
            echo $this->messages->config('');
            return false;

        }

        if ($this->session->userdata('lng_turu') == "Eng") {$uz = "";
            $data["uz"] = "";}
        if ($this->session->userdata('lng_turu') == "Tr") {$uz = "_tr";
            $data["uz"] = "_tr";}
        if ($this->session->userdata('lng_turu') == "Ru") {$uz = "_ru";
            $data["uz"] = "_ru";}
        if ($this->session->userdata('lng_turu') == "Esp") {$uz = "_esp";
            $data["uz"] = "_esp";}

        $this->load->model('Giris_model');
        $kul = $this->input->post('kl', true);

        $sf = $this->input->post('ps', true);
        $kul = trim($kul);
        $kul = htmlentities($kul);
        $kul = strip_tags($kul); //  $kul=strtolower($kul);
        $sf = trim($sf);
        $sf = htmlentities($sf);
        $sf = strip_tags($sf);
        $sf = md5($sf);

        $return = $this->Giris_model->user_return($kul, $sf);

        if ($return != false) {

            if ($return): foreach ($return as $dizi):
                    $email = $dizi["email"];
                    $name = $dizi["name"];
                    $kul_id = $dizi["id"];

                endforeach;endif;

            $this->session->set_userdata('useronline', $kul);
            $useronline = $this->session->userdata('useronline');
            $this->session->set_userdata('useremail', $email);
            $useremail = $this->session->userdata('useremail');
            $this->session->set_userdata('user_person_name', $name);
            $user_person_name = $this->session->userdata('user_person_name');
            $this->session->set_userdata('kul_id', $kul_id);
            $kul_id = $this->session->userdata('kul_id');

            // Sepetteki ve ön rezervasyondaki işlemler

            $this->load->library('Funcs');
            $ip = $this->funcs->GetIP();

            $sepet_update = $this->Giris_model->sepet_update($ip, $kul_id);
            $rez_update = $this->Giris_model->rez_update($ip, $kul_id);

            $this->load->library('Messages');
            echo $this->messages->config('');
            //  $this->load->view('index');

        } else {
            //Giriş başarısız

            $this->load->library('Messages');
            echo $this->messages->Welcome_False('giris/kayit');
            //        $this->load->view('index');

        }

    }

    public function abone()
    {

        if ($this->session->userdata('lng_turu') == "Eng") {$uz = "";
            $data["uz"] = "";}
        if ($this->session->userdata('lng_turu') == "Tr") {$uz = "_tr";
            $data["uz"] = "_tr";}
        if ($this->session->userdata('lng_turu') == "Ru") {$uz = "_ru";
            $data["uz"] = "_ru";}
        if ($this->session->userdata('lng_turu') == "Esp") {$uz = "_esp";
            $data["uz"] = "_esp";}

        $this->load->library('Messages');
        $this->load->model('Giris_model');
        $email = $this->input->post('email', true);
        $email = trim($email);
        $email = htmlentities($email);
        $email = strip_tags($email);
        $email = strtolower($email);

        if ($email == "") {
            echo $this->messages->config('');
            return false;
        }

        $return = $this->Giris_model->abone($email);

        if ($return == 0) {
            echo $this->messages->False_Add('');

        }

        if ($return == 1) {
            echo $this->messages->True_Add('');
        }

    }

    public function cikis()
    {
        $useronline = $this->session->userdata('useronline');
        if (empty($useronline)) {
            $this->load->library('Messages');
            echo $this->messages->config('');
        } else {
            $this->load->library('Messages');
            $this->session->unset_userdata('useronline');
            echo $this->messages->Logout('');
        }
    }

    public function pass_remember()
    {
        error_reporting(0);
        $useronline = $this->session->userdata('useronline');
        if ($useronline != "") {
            $this->load->library('Messages');
            echo $this->messages->config('');
            return false;

        }

        if ($this->session->userdata('lng_turu') == "Eng") {$uz = "";
            $data["uz"] = "";}
        if ($this->session->userdata('lng_turu') == "Tr") {$uz = "_tr";
            $data["uz"] = "_tr";}
        if ($this->session->userdata('lng_turu') == "Ru") {$uz = "_ru";
            $data["uz"] = "_ru";}
        if ($this->session->userdata('lng_turu') == "Esp") {$uz = "_esp";
            $data["uz"] = "_esp";}
        $this->load->model('Giris_model');
        $data["ayar"] = $this->Giris_model->ayar();
        $this->load->view('forgot-pass.php', $data);

    }

    public function new_pass()
    {

        error_reporting(0);
        $useronline = $this->session->userdata('useronline');
        if ($useronline != "") {
            $this->load->library('Messages');
            echo $this->messages->config('');
            return false;

        }

        if ($this->session->userdata('lng_turu') == "Eng") {$uz = "";
            $data["uz"] = "";}
        if ($this->session->userdata('lng_turu') == "Tr") {$uz = "_tr";
            $data["uz"] = "_tr";}
        if ($this->session->userdata('lng_turu') == "Ru") {$uz = "_ru";
            $data["uz"] = "_ru";}
        if ($this->session->userdata('lng_turu') == "Esp") {$uz = "_esp";
            $data["uz"] = "_esp";}

        $this->load->library('Messages');
        $this->load->model('Giris_model');
        $email = $this->input->post('my-mail', true);
        $email = trim($email);
        $email = htmlentities($email);
        $email = strip_tags($email);
        $email = strtolower($email);

        if ($email == "") {
            echo $this->messages->config('');
            return false;
        }

        $return = $this->Giris_model->kontrol($email);

        if ($return != 1) {

            echo $this->messages->False_Bulunamadi('giris/pass_remember');

        }

        if ($return == 1) {

            $pass = $this->Giris_model->pass_getir($email);

            $this->load->library('mail/eposta');
            $mail = $this->eposta->new_pass(base_url(), $pass, $email);

            if ($mail == true) {
                $this->load->library('Messages');
                echo $this->messages->New_Pass('');

            }

        }

    }

    public function new_pass_success($pass)
    {
        error_reporting(0);
        $useronline = $this->session->userdata('useronline');
        if ($useronline != "") {
            $this->load->library('Messages');
            echo $this->messages->config('');
            return false;

        }

        if ($this->session->userdata('lng_turu') == "Eng") {$uz = "";
            $data["uz"] = "";}
        if ($this->session->userdata('lng_turu') == "Tr") {$uz = "_tr";
            $data["uz"] = "_tr";}
        if ($this->session->userdata('lng_turu') == "Ru") {$uz = "_ru";
            $data["uz"] = "_ru";}
        if ($this->session->userdata('lng_turu') == "Esp") {$uz = "_esp";
            $data["uz"] = "_esp";}

        $this->load->library('Messages');
        $this->load->model('Giris_model');

        $data["ayar"] = $this->Giris_model->ayar();
        $data["pass"] = $pass;
        $this->load->view('new-pass.php', $data);

    }

    public function new_pass_success_ok()
    {
        error_reporting(0);
        $useronline = $this->session->userdata('useronline');
        if ($useronline != "") {
            $this->load->library('Messages');
            echo $this->messages->config('');
            return false;

        }
        $pass = $this->input->post('pass', true);
        $ps = $this->input->post('ps', true);
        $ps2 = $this->input->post('ps2', true);

        $pass = trim($pass);
        $ps = trim($ps);
        $ps2 = trim($ps2);

        $pass = trim($pass);
        $ps = htmlentities($ps);
        $ps2 = htmlentities($ps2);

        $pass = trim($pass);
        $ps = strip_tags($ps);
        $ps2 = strip_tags($ps2);

        if ($ps != $ps2) {

            $this->load->library('Messages');
            echo $this->messages->Pass_Error('giris/kayit');
            return false;
        }

        $sf = md5($ps);
        $this->load->model('Giris_model');

        $sifre_guncelle = $this->Giris_model->sifre_guncelle($sf, $pass);

        if ($sifre_guncelle != 1) {
            $this->load->library('Messages');
            echo $this->messages->New_Pass_False('giris/kayit');
            return false;

        }

        $this->load->library('Messages');
        echo $this->messages->New_Pass_True('giris/kayit');

        return false;

    }

}
