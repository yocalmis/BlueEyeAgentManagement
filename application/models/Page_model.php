<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Page_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();

    }

    public function ayar()
    {

        $query = $this->db->query("select * from tkn_mat_options Where id=1");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }

    }

    public function page_bilgi($pg)
    {

        $query = $this->db->query("select * from acente_sayfalar Where seo_adi='$pg'");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }

    }

}
