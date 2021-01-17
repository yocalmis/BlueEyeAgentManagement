<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Config extends CI_Controller
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

        if ($this->session->userdata('lng_turu') == "Eng") {$uz = "";
            $data["uz"] = "";}
        if ($this->session->userdata('lng_turu') == "Tr") {$uz = "_tr";
            $data["uz"] = "_tr";}
        if ($this->session->userdata('lng_turu') == "Ru") {$uz = "_ru";
            $data["uz"] = "_ru";}
        if ($this->session->userdata('lng_turu') == "Esp") {$uz = "_esp";
            $data["uz"] = "_esp";}
        $this->load->model('Config_model');

        $data["ayar"] = $this->Config_model->ayar();
        $data["k_bilgi"] = $this->Config_model->kullanici_bilgi($kul_id);
//print_r($data["k_bilgi"]);

        $this->load->view('user-info', $data);

    }

    public function guncelle()
    {

        error_reporting(0);
        $useronline = $this->session->userdata('useronline');
        $kul_id = $this->session->userdata('kul_id');
        if ($useronline == "") {
            $this->load->library('Messages');
            echo $this->messages->config('giris/kayit');
            return false;

        }

        $id = $this->input->post('k_id', true);
        $isim = $this->input->post('ad', true);
        $kl = $this->input->post('kul', true);
        $ps = $this->input->post('ps', true);
        $ps2 = $this->input->post('ps2', true);
        $em = $this->input->post('em', true);
        $adr = $this->input->post('adr', true);
        $tl = $this->input->post('tl', true);
        $fadr = $this->input->post('fadr', true);

        $id = trim($id);
        $id = htmlentities($id);
        $id = strip_tags($id);
        $isim = trim($isim);
        $isim = htmlentities($isim);
        $isim = strip_tags($isim);
        $kl = trim($kl);
        $kl = htmlentities($kl);
        $kl = strip_tags($kl);
        $ps = trim($ps);
        $ps = htmlentities($ps);
        $ps = strip_tags($ps);
        $ps2 = trim($ps2);
        $ps2 = htmlentities($ps2);
        $ps2 = strip_tags($ps2);
        $em = trim($em);
        $em = htmlentities($em);
        $em = strip_tags($em);
        $adr = trim($adr);
        $adr = htmlentities($adr);
        $adr = strip_tags($adr);
        $tl = trim($tl);
        $tl = htmlentities($tl);
        $tl = strip_tags($tl);
        $fadr = trim($fadr);
        $fadr = htmlentities($fadr);
        $fadr = strip_tags($fadr);

        if ($ps != $ps2) {

            $this->load->library('Messages');
            echo $this->messages->Pass_Error('config');
            return false;
        }

        $ps_uzun = strlen($ps);

        if ($ps_uzun <= 5) {

            $this->load->library('Messages');
            echo $this->messages->Pass_Error_2('config');
            return false;
        }

        $sf = md5($ps);
        $this->load->model('Config_model');
        $uye_guncelle = $this->Config_model->uye_guncelle($id, $isim, $kl, $sf, $em, $fadr, $adr, $tl);

        if ($uye_guncelle != 1) {
            $this->load->library('Messages');
            echo $this->messages->False_Add_Message('config');
            return false;

        }

        $this->load->library('Messages');
        echo $this->messages->True_Add_Message('config');
        return false;

    }

    public function dondur()
    {
        error_reporting(0);

        $useronline = $this->session->userdata('useronline');
        $kul_id = $this->session->userdata('kul_id');
        if ($useronline == "") {

            $this->load->library('Messages');
            echo $this->messages->config('giris/kayit');
            return false;

        }

        $id = $this->input->post('id', true);
        $kl = $this->input->post('kl', true);

        $id = trim($id);
        $id = htmlentities($id);
        $id = strip_tags($id);
        $kl = trim($kl);
        $kl = htmlentities($kl);
        $kl = strip_tags($kl);

        $this->load->model('Config_model');
        $uye_dondur = $this->Config_model->uye_dondur($id, $kl);

        if ($uye_dondur != 1) {
            $this->load->library('Messages');
            echo $this->messages->Dondur_False('config');
            return false;

        }

        $this->load->library('Messages');
        echo $this->messages->Dondur_True('giris/cikis');
        return false;

    }

}
