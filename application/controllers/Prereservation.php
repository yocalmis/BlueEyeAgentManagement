<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prereservation extends CI_Controller
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
            //    echo $this->messages->config('giris/kayit');
            //    return FALSE;

            $this->load->library('Funcs');
            $kul_id = $this->funcs->GetIP();

        }
        $this->load->model('Preres_model');

        if ($this->session->userdata('lng_turu') == "Eng") {$uz = "";
            $data["uz"] = "";}
        if ($this->session->userdata('lng_turu') == "Tr") {$uz = "_tr";
            $data["uz"] = "_tr";}
        if ($this->session->userdata('lng_turu') == "Ru") {$uz = "_ru";
            $data["uz"] = "_ru";}
        if ($this->session->userdata('lng_turu') == "Esp") {$uz = "_esp";
            $data["uz"] = "_esp";}

        $data["ayar"] = $this->Preres_model->ayar();
        $data["cart_getir"] = $this->Preres_model->cart_getir($kul_id);

        $n = 0;if ($data["cart_getir"]): foreach ($data["cart_getir"] as $dizi):

                $data["tur_bilgi"][$n] = $this->Preres_model->tur_bilgi($dizi["tur_id"]);

                $odeme = $this->Preres_model->odeme_turu($dizi["tur_id"]);
                $data["ziyaretci_bilgi"][$n] = $this->Preres_model->ziyaretci_bilgi($dizi["id"]);

                if ($odeme == 1) {

                    date_default_timezone_set('Etc/GMT-3');
                    $tarih = explode(" ", $dizi["ekleme_tarihi"]);
                    $tarih_ilk = explode("-", $tarih[0]);
                    $tarih = $tarih_ilk[2] . "." . $tarih_ilk[1] . "." . $tarih_ilk[0] . " " . $tarih[1];
                    $simdi = date("d.m.Y H:i:s");
                    $fark_gun = intval(abs(strtotime($simdi) - strtotime($tarih)) / 60);
                    $data["dakika"][$n] = 60 - $fark_gun;

                    if ($data["dakika"][$n] <= 0) {

                        $cart_sil = $this->Preres_model->cart_remove($dizi["kullanici_id"], $dizi["id"], $dizi["tur_id"]);

                    }

                }

                $n = $n + 1;endforeach;endif;

        //print_r($data["ziyaretci_bilgi"][0][0]);
        //return FALSE;

        $n = 0;if ($data["tur_bilgi"]): foreach ($data["tur_bilgi"] as $dizi2):

                $data["kat_bilgi"][$n] = $this->Preres_model->kat_bilgi($dizi2[0]["kat_id"], $uz);
                $data["kat_bilgi_seo"][$n] = $this->Preres_model->kat_bilgi_seo($dizi2[0]["kat_id"]);
                $n = $n + 1;endforeach;endif;

        //print_r($data["kat_bilgi"][0]);
        //    return FALSE;

        $this->load->view('preres', $data);

    }

}
