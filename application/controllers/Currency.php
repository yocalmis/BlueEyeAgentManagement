<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Currency extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->library('Sec');
        echo $this->sec->process();

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
    public function index($curr = null)
    {
        error_reporting(0);

        if ($curr == "") {

            $curr = "euro";

        }

        if (($curr != "euro") and ($curr != "dollar") and ($curr != "pound") and ($curr != "tl") and ($curr != "dinar") and ($curr != "ruble")) {
            $curr = "euro";
        }

        $curr = trim($curr);
        $curr = htmlentities($curr);
        $curr = strip_tags($curr);

        $this->load->model('Curr_model');
        $kontrol = $this->Curr_model->kontrol($curr);

        if ($kontrol == false) {

            $curr = "euro";

        }

        $curr_miktar = $kontrol[0][$curr];
        $this->session->set_userdata('currency', $curr_miktar);
        $currency = $this->session->userdata('currency');

        if ($curr == "euro") {$icon = "€";}
        if ($curr == "dollar") {$icon = "$";}
        if ($curr == "pound") {$icon = "£";}
        if ($curr == "tl") {$icon = "₺";}
        if ($curr == "dinar") {$icon = "D";}
        if ($curr == "ruble") {$icon = "₽";}

        $this->session->set_userdata('currency_icon', $icon);
        $currency_icon = $this->session->userdata('currency_icon');

        if ($curr == "euro") {$birim = "Euro";}
        if ($curr == "dollar") {$birim = "Usd";}
        if ($curr == "pound") {$birim = "Pound";}
        if ($curr == "tl") {$birim = "Try";}
        if ($curr == "dinar") {$birim = "Dinar";}
        if ($curr == "ruble") {$birim = "Ruble";}

        $this->session->set_userdata('currency_birim', $birim);
        $currency_birim = $this->session->userdata('currency_birim');

        //     echo $currency." ".$currency_icon;

        $url = $_SERVER['HTTP_REFERER'];
        $parcala = explode(base_url(), $url);
        //print_r($parcala);
        //return FALSE;

        $this->load->library('messages');
        $this->messages->config($parcala[1]);
        return false;

    }

}
