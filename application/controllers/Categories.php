<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Categories extends CI_Controller
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
        $this->load->library('messages');
        $this->messages->config('');
    }

    public function detail($ana_cat_name = null)
    {
        error_reporting(0);
        if ($ana_cat_name == "") {

            $this->load->library('messages');
            $this->messages->config('');

        }

        $ana_cat_name = trim($ana_cat_name);
        $ana_cat_name = htmlentities($ana_cat_name);
        $ana_cat_name = strip_tags($ana_cat_name);
        $this->load->model('Categories_model');
        $varmi = $this->Categories_model->varmi_ana_cat_name($ana_cat_name);

        if ($varmi == false) {
            $this->load->library('messages');
            $this->messages->config('');

        }

        if ($this->session->userdata('lng_turu') == "Eng") {$uz = "";
            $data["uz"] = "";}
        if ($this->session->userdata('lng_turu') == "Tr") {$uz = "_tr";
            $data["uz"] = "_tr";}
        if ($this->session->userdata('lng_turu') == "Ru") {$uz = "_ru";
            $data["uz"] = "_ru";}
        if ($this->session->userdata('lng_turu') == "Esp") {$uz = "_esp";
            $data["uz"] = "_esp";}
        $data["ayar"] = $this->Categories_model->ayar();

        $data["ana_kat_bilgi"] = $this->Categories_model->ana_kat_bilgi($ana_cat_name);
        $data["ana_kat_turlar"] = $this->Categories_model->ana_kat_turlar($ana_cat_name, $uz);
        $data["ana_kat_yorumlar"] = $this->Categories_model->ana_kat_yorumlar($ana_cat_name);
        $data["ana_kat_populer_kategori"] = $this->Categories_model->ana_kat_populer_kategori($ana_cat_name); //Ana kategoriye ait

        $n = 0;if ($data["ana_kat_populer_kategori"]): foreach ($data["ana_kat_populer_kategori"] as $dizi):
                $data["ana_kat_populer_kategori_sayi"][$n] = $this->Categories_model->ana_kat_populer_kategori_sayi($dizi["id"]); //Ana kategoriye ait
                $n = $n + 1;endforeach;endif;

        $data["populer_kategori"] = $this->Categories_model->populer_kategori();
        $data["populer_ana_kategori"] = $this->Categories_model->populer_ana_kategori();
        $data["populer_tur"] = $this->Categories_model->populer_tur();

        $n = 0;if ($data["ana_kat_turlar"]): foreach ($data["ana_kat_turlar"] as $dizi):
                $adet = count($dizi["tur"]);
                $dongu = $adet - 1;
                for ($i = 0; $i <= $dongu; $i++) {

                    if ($dizi["tur"][$i]["kod"]) {

                        $t_kod = $dizi["tur"][$i]["kod"];

                        $data["puan"][$t_kod]["tur_puan_guven"] = $this->Categories_model->tur_puan_guven($t_kod);
                        $data["puan"][$t_kod]["tur_puan_org"] = $this->Categories_model->tur_puan_org($t_kod);
                        $data["puan"][$t_kod]["tur_puan_para"] = $this->Categories_model->tur_puan_para($t_kod);
                        $data["puan"][$t_kod]["tur_puan_servis"] = $this->Categories_model->tur_puan_servis($t_kod);
                        $data["puan"][$t_kod]["tur_puan_genel"] = $data["puan"][$t_kod]["tur_puan_guven"] + $data["puan"][$t_kod]["tur_puan_org"] + $data["puan"][$t_kod]["tur_puan_para"] + $data["puan"][$t_kod]["tur_puan_servis"];
                        $data["puan"][$t_kod]["tur_puan_genel"] = round($data["puan"][$t_kod]["tur_puan_genel"] / 4);

                    }

                }

                $n = $n + 1;endforeach;endif;

        //

        $this->load->model('Category_model');
        $n = 0;if ($data["ana_kat_turlar"][0]["alt_kat"]): foreach ($data["ana_kat_turlar"][0]["alt_kat"] as $dizi):

                $data["yy"][$n] = $this->Category_model->kat_yorumlar($data["ana_kat_turlar"][0]["alt_kat"][$n]);

                $n = $n + 1;endforeach;endif;

/*
$n=0;    if( $data["yy"] ) :  foreach( $data["yy"] as $dizi ) :

print_r($data["yy"][$n][0]["baslik"]);

$n=$n+1;    endforeach;  endif;

return FALSE;

 */

        $n = 0;if ($data["ana_kat_yorumlar"]): foreach ($data["ana_kat_yorumlar"] as $dizi):

                //print_r($dizi["yorum"][0]["kullanici_id"]);

                $adet = count($dizi["yorum"]);
                $dongu = $adet - 1;
                for ($i = 0; $i <= $dongu; $i++) {
                    $data["yorum_puan_ortalama"][$i] = $this->Categories_model->yorum_puan_ortalama($dizi["yorum"][$i]["tur_kod"], $dizi["yorum"][$i]["kullanici_id"]);

                }

                $n = $n + 1;endforeach;endif;

        $this->load->view('anakategori', $data);

    }
}
