<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class History_model extends CI_Model
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

    public function history_get($kul_id)
    {
        $wish = "";
        $query = $this->db->query("select * from acente_gecmis Where kullanici_id=" . $kul_id . " order by id desc");
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result_array() as $row) {

                $query2 = $this->db->query("select * from acente_tur Where durum=1 and id=" . $row['tur_id']);
                foreach ($query2->result_array() as $row2) {
                    $wish[$i]["id"] = $row2['id'];
                    $wish[$i]["adi"] = $row2['adi'];
                    $wish[$i]["seo_adi"] = $row2['seo_adi'];
                    $wish[$i]["resim"] = $row2['resim'];
                    $wish[$i]["resim_2"] = $row2['resim_2'];
                    $wish[$i]["tukenme"] = $row2['tukenme'];
                    $wish[$i]["sticker"] = $row2['sticker'];
                    $wish[$i]["sure"] = $row2['sure'];
                    $wish[$i]["aciklama"] = $row2['aciklama'];
                    $wish[$i]["kod"] = $row2['kod'];
                    $wish[$i]["tur_donemi"] = $row2['tur_donemi'];

                    $query_3 = $this->db->query("select * from acente_yorumlar Where durum=1  and tur_kod=" . $row2['kod'] . " ");
                    $say_tur_yorum = $query_3->num_rows($query_3);
                    $wish[$i]["yorum_adet"] = $say_tur_yorum;

                    $query_4 = $this->db->query("select * from acente_tur_detay Where durum=1  and tur_kod=" . $row2['kod'] . " order by yetiskin_fiyat desc limit 0 , 1");
                    $say_tur_fiyat = $query_4->num_rows($query_4);
                    if ($say_tur_fiyat == 0) {$wish[$i]["baslangic_fiyat"] = 0;} else {

                        foreach ($query_4->result_array() as $row_4) {
                            $wish[$i]["baslangic_fiyat"] = $row_4['yetiskin_fiyat'];

                        }

                    }

                }

                $i = $i + 1;
            }

            return $wish;
        } else {
            return false;
        }

    }

    public function tur_puan_guven($kod)
    {
        $total = 0;
        $adet = 0;
        $query = $this->db->query("select * from acente_puan_guv Where tur_kod='$kod'");
        if ($query->num_rows() > 0) {

            foreach ($query->result_array() as $row) {
                $total = $total + $row['puan'];
                $adet = $adet + 1;
            }

            return $total / $adet;
        } else {
            return false;
        }

    }

    public function tur_puan_org($kod)
    {
        $total = 0;
        $adet = 0;
        $query = $this->db->query("select * from acente_puan_org Where tur_kod='$kod'");
        if ($query->num_rows() > 0) {

            foreach ($query->result_array() as $row) {
                $total = $total + $row['puan'];
                $adet = $adet + 1;
            }

            return $total / $adet;
        } else {
            return false;
        }

    }

    public function tur_puan_para($kod)
    {
        $total = 0;
        $adet = 0;
        $query = $this->db->query("select * from acente_puan_para Where tur_kod='$kod'");
        if ($query->num_rows() > 0) {

            foreach ($query->result_array() as $row) {
                $total = $total + $row['puan'];
                $adet = $adet + 1;
            }

            return $total / $adet;
        } else {
            return false;
        }

    }

    public function tur_puan_servis($kod)
    {
        $total = 0;
        $adet = 0;
        $query = $this->db->query("select * from acente_puan_servis Where tur_kod='$kod'");
        if ($query->num_rows() > 0) {

            foreach ($query->result_array() as $row) {
                $total = $total + $row['puan'];
                $adet = $adet + 1;
            }

            return $total / $adet;
        } else {
            return false;
        }

    }

}
