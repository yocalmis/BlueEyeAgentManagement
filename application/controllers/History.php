<?php
defined('BASEPATH') or exit('No direct script access allowed');

class History extends CI_Controller
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
        $this->load->model('History_model');
        $data["ayar"] = $this->History_model->ayar();
        $data["history"] = $this->History_model->history_get($kul_id);

        $n = 0;if ($data["history"]): foreach ($data["history"] as $dizi):
                $t_kod = $dizi["kod"];

                $data["puan"][$t_kod]["tur_puan_guven"] = $this->History_model->tur_puan_guven($t_kod);
                $data["puan"][$t_kod]["tur_puan_org"] = $this->History_model->tur_puan_org($t_kod);
                $data["puan"][$t_kod]["tur_puan_para"] = $this->History_model->tur_puan_para($t_kod);
                $data["puan"][$t_kod]["tur_puan_servis"] = $this->History_model->tur_puan_servis($t_kod);
                $data["puan"][$t_kod]["tur_puan_genel"] = $data["puan"][$t_kod]["tur_puan_guven"] + $data["puan"][$t_kod]["tur_puan_org"] + $data["puan"][$t_kod]["tur_puan_para"] + $data["puan"][$t_kod]["tur_puan_servis"];
                $data["puan"][$t_kod]["tur_puan_genel"] = round($data["puan"][$t_kod]["tur_puan_genel"] / 4);

                $n = $n + 1;endforeach;endif;
        //print_r($data["puan"]);
        //return FALSE;

        $this->load->view('history', $data);

    }

}
