<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reservation extends CI_Controller
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
    public function index($tur = null)
    {

        error_reporting(0);
        $useronline = $this->session->userdata('useronline');
        $kul_id = $this->session->userdata('kul_id');
        if ($useronline == "") {
            $this->load->library('Messages');
            echo $this->messages->config('giris/kayit');
            return false;

        }
        $this->load->model('Rez_model');

        if ($this->session->userdata('lng_turu') == "Eng") {$uz = "";
            $data["uz"] = "";}
        if ($this->session->userdata('lng_turu') == "Tr") {$uz = "_tr";
            $data["uz"] = "_tr";}
        if ($this->session->userdata('lng_turu') == "Ru") {$uz = "_ru";
            $data["uz"] = "_ru";}
        if ($this->session->userdata('lng_turu') == "Esp") {$uz = "_esp";
            $data["uz"] = "_esp";}

        $data["ayar"] = $this->Rez_model->ayar();
        $data["rez_getir"] = $this->Rez_model->rez_getir($kul_id);

        $n = 0;if ($data["rez_getir"]): foreach ($data["rez_getir"] as $dizi):

                $data["tur_bilgi"][$n] = $this->Rez_model->tur_bilgi($dizi["tur_id"]);
                $data["rez_detay"][$n] = $this->Rez_model->rez_detay($dizi["id"]);
                $n = $n + 1;endforeach;endif;

        $n = 0;if ($data["tur_bilgi"]): foreach ($data["tur_bilgi"] as $dizi2):

                $data["kat_bilgi"][$n] = $this->Rez_model->kat_bilgi($dizi2[0]["kat_id"], $uz);
                $data["kat_bilgi_seo"][$n] = $this->Rez_model->kat_bilgi_seo($dizi2[0]["kat_id"]);

                $t_kod = $dizi2[0]["kod"];

                $data["puan"][$t_kod]["tur_puan_guven"] = $this->Rez_model->tur_puan_guven($t_kod);
                $data["puan"][$t_kod]["tur_puan_org"] = $this->Rez_model->tur_puan_org($t_kod);
                $data["puan"][$t_kod]["tur_puan_para"] = $this->Rez_model->tur_puan_para($t_kod);
                $data["puan"][$t_kod]["tur_puan_servis"] = $this->Rez_model->tur_puan_servis($t_kod);
                $data["puan"][$t_kod]["tur_puan_genel"] = $data["puan"][$t_kod]["tur_puan_guven"] + $data["puan"][$t_kod]["tur_puan_org"] + $data["puan"][$t_kod]["tur_puan_para"] + $data["puan"][$t_kod]["tur_puan_servis"];
                $data["puan"][$t_kod]["tur_puan_genel"] = round($data["puan"][$t_kod]["tur_puan_genel"] / 4);
                $data["puan"][$t_kod]["yorum_adet"] = $this->Rez_model->yorum_adet($t_kod);

                $n = $n + 1;endforeach;endif;

        //RETURN false;

        $this->load->view('booking', $data);

    }
}
