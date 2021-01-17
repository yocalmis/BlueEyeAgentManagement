<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contact extends CI_Controller
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

        if ($this->session->userdata('lng_turu') == "Eng") {$uz = "";
            $data["uz"] = "";}
        if ($this->session->userdata('lng_turu') == "Tr") {$uz = "_tr";
            $data["uz"] = "_tr";}
        if ($this->session->userdata('lng_turu') == "Ru") {$uz = "_ru";
            $data["uz"] = "_ru";}
        if ($this->session->userdata('lng_turu') == "Esp") {$uz = "_esp";
            $data["uz"] = "_esp";}

        $this->load->model('Iletisim_model');

        $data["ayar"] = $this->Iletisim_model->ayar();
        $this->load->view('contact', $data);

    }

    public function get()
    {

        error_reporting(0);

        $nm = $this->input->post('nm', true);
        $em = $this->input->post('em', true);
        $ms = $this->input->post('ms', true);

        $nm = trim($nm);
        $nm = htmlentities($nm);
        $nm = strip_tags($nm);
        $em = trim($em);
        $em = htmlentities($em);
        $em = strip_tags($em);
        $ms = trim($ms);
        $ms = htmlentities($ms);
        $ms = strip_tags($ms);

        if (($nm == "") or ($em == "") or ($ms == "")) {

            $this->load->library('Messages');
            echo $this->messages->Empty_Add_Message_Admin('contact');
            return false;
        }

        $this->load->library('mail/eposta');
        $mail = $this->eposta->iletisim_gonder($nm, $em, $ms);

        if ($mail == true) {
            $this->load->library('Messages');
            echo $this->messages->Message_Ok('contact');
            return false;

        }

        $this->load->library('Messages');
        echo $this->messages->Message_False('contact');
        return false;

    }

}
