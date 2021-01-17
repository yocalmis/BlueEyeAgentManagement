<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Checkout extends CI_Controller
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
            $this->load->library('Messages');
            echo $this->messages->config('giris/kayit');
            return false;

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

        $n = 0;if ($data["cart_getir"]): foreach ($data["cart_getir"] as $dizi):

                $data["tur_bilgi"][$n] = $this->Cart_model->tur_bilgi($dizi["tur_id"]);
                $odeme = $this->Cart_model->odeme_turu($dizi["tur_id"]);

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

        $n = 0;if ($data["tur_bilgi"]): foreach ($data["tur_bilgi"] as $dizi2):

                $data["kat_bilgi"][$n] = $this->Cart_model->kat_bilgi($dizi2[0]["kat_id"], $uz);
                //    print_r($data["kat_bilgi"][$n]);
                $n = $n + 1;endforeach;endif;

        // print_r($data["kat_bilgi"][0]);
        //    return FALSE;

        $data["kuponDurumu"] = $this->input->post('kuponDurumu', true);

        if ($data["kuponDurumu"] == 0) {} else {

            $data["kuponsuzFiyat"] = $this->input->post('kuponsuzFiyat', true);
            $data["kuponluFiyat"] = $this->input->post('kuponluFiyat', true);
            $data["kuponKodu"] = $this->input->post('kuponKodu', true);
            $data["oran"] = $this->input->post('oran', true);

        }

        $this->load->view('checkout', $data);

    }

    public function payment()
    {

        error_reporting(0);
        $useronline = $this->session->userdata('useronline');
        $kul_id = $this->session->userdata('kul_id');
        if ($useronline == "") {
            $this->load->library('Messages');
            echo $this->messages->config('giris/kayit');
            return false;

        }
        $this->load->model('Cart_model');

/*
$baslik=$this->input->post('baslik',TRUE);
$yorum=$this->input->post('editor1',TRUE);
$kul_id=$this->input->post('kul_id',TRUE);
$tur_id=$this->input->post('tur_id',TRUE);

$baslik=trim($baslik);          $baslik=htmlentities($baslik);          $baslik=strip_tags($baslik);
$yorum=trim($yorum);          $yorum=htmlentities($yorum);                 $yorum=strip_tags($yorum);
$kul_id=trim($kul_id);          $kul_id=htmlentities($kul_id);         $kul_id=strip_tags($kul_id);
$tur_id=trim($tur_id);          $tur_id=htmlentities($tur_id);          $tur_id=strip_tags($tur_id);

 */

        $content = $this->input->post('content', true);
        $number = $this->input->post('number', true);
        $expiry = $this->input->post('expiry', true);
        $cvc = $this->input->post('cvc', true);
        $name = $this->input->post('name', true);

        $kuponDurumu = $this->input->post('kuponDurumu', true);
        $kuponsuzFiyat = $this->input->post('kuponsuzFiyat', true);
        $kuponluFiyat = $this->input->post('kuponluFiyat', true);
        $kuponKodu = $this->input->post('kuponKodu', true);
        $oran = $this->input->post('oran', true);

        $content = strip_tags($content);
        $number = strip_tags($number);
        $expiry = strip_tags($expiry);
        $cvc = strip_tags($cvc);
        $name = strip_tags($name);

        $kuponDurumu = strip_tags($kuponDurumu);
        $kuponsuzFiyat = strip_tags($kuponsuzFiyat);
        $kuponluFiyat = strip_tags($kuponluFiyat);
        $kuponKodu = strip_tags($kuponKodu);
        $oran = strip_tags($oran);

        $data["ayar"] = $this->Cart_model->ayar();
        $data["cart_getir"] = $this->Cart_model->cart_getir($kul_id);

        $total = 0;
        $n = 0;if ($data["cart_getir"]): foreach ($data["cart_getir"] as $dizi):

                $total = $total + $dizi["tutar"];

                $n = $n + 1;endforeach;endif;

        //kupon kodu varsa euro bazında    indirim yaparak son fiyatı yaz

        $odeme = 1;

        if ($odeme == 1) {

            $cart_getir = $this->Cart_model->cart_getir($kul_id);

            $this->load->library('Funcs');

            $n = 0;if ($cart_getir): foreach ($cart_getir as $dizi):

                    for ($i = 0; $i <= 100; $i++) {
                        $rez_no = $this->funcs->getName();
                        $kontrol = $this->Cart_model->rez_no_kontrol($rez_no);
                        if ($kontrol == 1) {break;}
                    }

                    $sip[$n]["category"] = $this->Cart_model->kat_getir($dizi["tur_id"]);
                    $sip[$n]["tur_adi"] = $this->Cart_model->tur_adi_getir($dizi["tur_id"]);
                    $sip[$n]["duration"] = $this->Cart_model->duration_getir($dizi["tur_id"]);
                    $sip[$n]["resim"] = $this->Cart_model->rs_getir($dizi["tur_id"]);
                    $sip[$n]["meeting"] = $this->Cart_model->meeting_getir($dizi["tur_id"]);
                    $sip[$n]["bas_tar"] = $dizi["bas_tar"];
                    $sip[$n]["bit_tar"] = $dizi["bit_tar"];
                    $sip[$n]["bas_saat"] = $dizi["baslangic_saati"];
                    $sip[$n]["bit_saat"] = $dizi["bitis_saati"];
                    $sip[$n]["yetiskin"] = $dizi["yetiskin"];
                    $sip[$n]["cocuk"] = $dizi["cocuk"];
                    $sip[$n]["bebek"] = $dizi["bebek"];
                    //$sip[$n]["rez_no"]=$dizi["id"];
                    $sip[$n]["rez_no"] = $rez_no;
                    $sip[$n]["price"] = $dizi["tutar"];

                    $n = $n + 1;endforeach;endif;

            $rezerve = $this->Cart_model->rezerve($kul_id, $content, $number, $expiry, $cvc, $name, $rez_no, $kuponDurumu, $kuponsuzFiyat, $kuponluFiyat, $kuponKodu, $oran);
            if ($kuponDurumu == 1) {
                $kod_artir = $this->Cart_model->kod_artir($kuponKodu);

            }

            $ep_getir = $this->Cart_model->ep_getir2($kul_id);

            if ($rezerve) {

                //    $this->load->library('mail/Eposta');
                //    $this->eposta->siparis_gonder($sip);

                $this->load->library('mail/Eposta');
                $this->eposta->siparis_gonder($sip, $ep_getir);

                //    $this->load->library('Messages');
                //    echo $this->messages->True_Pay("reservation");
                $data["sip"] = $sip;
                $this->load->model('Rez_model');
                $kul_id = $this->session->userdata('kul_id');
                $data["rez_getir"] = $this->Rez_model->rez_getir($kul_id);

                $this->load->view('pay_success', $data);
                return false;

            } else {
                $this->load->library('Messages');
                echo $this->messages->False_Pay("reservation");
                return false;
            }

        } else {
            $this->load->library('Messages');
            echo $this->messages->False_Pay("reservation");
            return false;

        }

    }

}
