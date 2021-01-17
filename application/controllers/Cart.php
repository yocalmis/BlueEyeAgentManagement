<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cart extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->library('Sec');
        echo $this->sec->process();

        $this->load->library('Funcs');
        echo $this->funcs->index($this->session->userdata('currency'), $this->session->userdata('lng_turu'));

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

        error_reporting(0);
        $useronline = $this->session->userdata('useronline');
        $kul_id = $this->session->userdata('kul_id');
        if ($useronline == "") {
            //    $this->load->library('Messages');
            //     echo $this->messages->config('giris/kayit');
            //    return FALSE;

            $this->load->library('Funcs');
            $kul_id = $this->funcs->GetIP();

        }
        $this->load->model('Cart_model');

        if ($this->session->userdata('lng_turu') == "Eng") {$uz = "";
            $data["uz"] = "";}
        if ($this->session->userdata('lng_turu') == "Tr") {$uz = "_tr";
            $data["uz"] = "_tr";}
        if ($this->session->userdata('lng_turu') == "Ru") {$uz = "_ru";
            $data["uz"] = "_ru";}
        if ($this->session->userdata('lng_turu') == "Esp") {$uz = "_esp";
            $data["uz"] = "_esp";}

        $data["ayar"] = $this->Cart_model->ayar();
        $data["cart_getir"] = $this->Cart_model->cart_getir($kul_id);

        $tur_id = "";
        $n = 0;if ($data["cart_getir"]): foreach ($data["cart_getir"] as $dizi):
                $tur_id = $dizi["tur_id"];
                $data["tur_bilgi"][$n] = $this->Cart_model->tur_bilgi($dizi["tur_id"]);
                $odeme = $this->Cart_model->odeme_turu($dizi["tur_id"]);
                $data["ziyaretci_bilgi"][$n] = $this->Cart_model->ziyaretci_bilgi($dizi["id"]);

                if ($odeme == 1) {

                    date_default_timezone_set('Etc/GMT-3');
                    $tarih = explode(" ", $dizi["ekleme_tarihi"]);
                    $tarih_ilk = explode("-", $tarih[0]);
                    $tarih = $tarih_ilk[2] . "." . $tarih_ilk[1] . "." . $tarih_ilk[0] . " " . $tarih[1];
                    $simdi = date("d.m.Y H:i:s");
                    $fark_gun = intval(abs(strtotime($simdi) - strtotime($tarih)) / 60);
                    $data["dakika"][$n] = 60 - $fark_gun;

                    if ($data["dakika"][$n] <= 0) {

                        $cart_sil = $this->Cart_model->cart_remove($dizi["kullanici_id"], $dizi["id"], $dizi["tur_id"]);

                    }

                }

                $n = $n + 1;endforeach;endif;

        //print_r($data["ziyaretci_bilgi"][0][0]);
        //return FALSE;

        $n = 0;if ($data["tur_bilgi"]): foreach ($data["tur_bilgi"] as $dizi2):

                $data["kat_bilgi"][$n] = $this->Cart_model->kat_bilgi($dizi2[0]["kat_id"], $uz);
                $data["kat_bilgi_seo"][$n] = $this->Cart_model->kat_bilgi_seo($dizi2[0]["kat_id"]);
                $n = $n + 1;endforeach;endif;

        //print_r($data["kat_bilgi"][0]);
        //    return FALSE;

/****Önerilen Turlar*******/
        $this->load->model('Tour_model');

        // $kat_id=$this->Cart_model->kat_id_getir($tur_id);
        // $data["alt_kat_diger_turlar"]=$this->Tour_model->alt_kat_diger_turlar($kat_id);    //Turun bağlı olduğu

        $data["alt_kat_diger_turlar"] = $this->Cart_model->onerilen_turlar(); //Turun bağlı olduğu

        $n = 0;if ($data["alt_kat_diger_turlar"]): foreach ($data["alt_kat_diger_turlar"] as $dizi):
                $data["alt_kat_diger_turlar_fiyat"][$n] = $this->Tour_model->alt_kat_diger_turlar_fiyat($dizi["kod"]);
                $data["alt_kat_diger_turlar_yorum_adet"][$n] = $this->Tour_model->alt_kat_diger_turlar_yorum_adet($dizi["kod"]);
                $t_kod = $dizi["kod"];
                $data["puan"][$t_kod]["tur_puan_guven"] = $this->Tour_model->tur_puan_guven($t_kod);
                $data["puan"][$t_kod]["tur_puan_org"] = $this->Tour_model->tur_puan_org($t_kod);
                $data["puan"][$t_kod]["tur_puan_para"] = $this->Tour_model->tur_puan_para($t_kod);
                $data["puan"][$t_kod]["tur_puan_servis"] = $this->Tour_model->tur_puan_servis($t_kod);
                $data["puan"][$t_kod]["tur_puan_genel"] = $data["puan"][$t_kod]["tur_puan_guven"] + $data["puan"][$t_kod]["tur_puan_org"] + $data["puan"][$t_kod]["tur_puan_para"] + $data["puan"][$t_kod]["tur_puan_servis"];
                $data["puan"][$t_kod]["tur_puan_genel"] = round($data["puan"][$t_kod]["tur_puan_genel"] / 4);

                $n = $n + 1;endforeach;endif;

/****Önerilen Turlar*******/

        $this->load->view('cart', $data);

    }

    public function delete($id = null, $kullanici_id = null, $tur_id = null)
    {

        error_reporting(0);
        $useronline = $this->session->userdata('useronline');
        $kul_id = $this->session->userdata('kul_id');
        if ($useronline == "") {
            $this->load->library('Messages');
            echo $this->messages->config('giris/kayit');
            return false;

        }

        if ($kul_id != $kullanici_id) {
            $this->load->library('Messages');
            echo $this->messages->config('giris/kayit');
            return false;

        }

        if (!is_numeric($id)) {

            $this->load->library('messages');
            $this->messages->config('');

        }

        if ($id == "") {

            $this->load->library('messages');
            $this->messages->config('');

        }

        if (!is_numeric($kullanici_id)) {

            $this->load->library('messages');
            $this->messages->config('');

        }

        if ($kullanici_id == "") {

            $this->load->library('messages');
            $this->messages->config('');

        }

        if (!is_numeric($tur_id)) {

            $this->load->library('messages');
            $this->messages->config('');

        }

        if ($tur_id == "") {

            $this->load->library('messages');
            $this->messages->config('');

        }

        $id = trim($id);
        $id = htmlentities($id);
        $id = strip_tags($id);
        $kullanici_id = trim($kullanici_id);
        $kullanici_id = htmlentities($kullanici_id);
        $kullanici_id = strip_tags($kullanici_id);
        $tur_id = trim($tur_id);
        $tur_id = htmlentities($tur_id);
        $tur_id = strip_tags($tur_id);

        $this->load->model('Cart_model');
        $data["ayar"] = $this->Cart_model->ayar();
        $cart_remove = $this->Cart_model->cart_remove($kul_id, $id, $tur_id);

        if ($cart_remove != 1) {

            $this->load->library('messages');
            $this->messages->False_Delete('cart');
            return false;
        }

        $this->load->library('messages');
        $this->messages->True_Delete('cart');
        return false;

    }

    public function info()
    {

        $ad = $_POST["iism0_0"];
        $mail = $_POST["mail0_0"];
        $tel = $_POST["tel0_0"];
        $shr = $_POST["shr0_0"];
        $slc = $_POST["slc0_0"];
        $id = $_POST["id0_0"];
        $sepet_id = $_POST["sepet_id0_0"];
        $otel_adi = $_POST["oteladi0_0"];

        $this->load->model('Cart_model');
        $info = $this->Cart_model->info($ad, $mail, $tel, $shr, $slc, $id, $sepet_id, $otel_adi);

        if ($info) {echo 1;return false;}

        echo 0;
        return false;

    }

    public function promo_control()
    {

/*
$useronline=$this->session->userdata('useronline');
if($useronline!=""){
$this->load->library('Messages');
echo $this->messages->config('');
return FALSE;

}
 */

        $code = $this->input->post('name', true);

        $this->load->model('Cart_model');
        $kod_sorgu = $this->Cart_model->kod_sorgu($code);

        if ($kod_sorgu != false) {

            $arr["status"] = 1;
            $arr["kod"] = $code;

            if ($kod_sorgu): foreach ($kod_sorgu as $dizi):

                    $indirim_oran = $dizi["indirim_oran"];
                endforeach;endif;
            $arr["oran"] = 10;
        } else {
            $arr["status"] = 0;
            $arr["kod"] = $code;
            $arr["oran"] = 0;
        }

        echo json_encode($arr);

    }

}
