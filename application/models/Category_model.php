<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Category_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();

    }

    public function varmi_cat_name($cat_name)
    {

        $query = $this->db->query("select * from acente_category Where seo_adi='$cat_name'   and kategori_turu='tur'");
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }

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

    public function alt_kat_bilgi($cat_name)
    {

        $query = $this->db->query("select * from acente_category Where seo_adi='$cat_name'   and kategori_turu='tur'");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }

    }

    public function alt_katen_populer($cat_name)
    {

    }

    public function alt_kat_turlar($cat_name)
    {

        $query = $this->db->query("select * from acente_category Where seo_adi='$cat_name'   and kategori_turu='tur'");
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {

                $query2 = $this->db->query("select * from acente_tur Where kat_id=" . $row['id'] . "  and tur_donemi!='otel'");
                if ($query2->num_rows() > 0) {
                    return $query2->result_array();

                }

            }

        } else {
            return false;
        }

    }

    public function alt_kat_turlar_fiyat($tur_kod)
    {

        $query = $this->db->query("select * from acente_tur_detay Where tur_kod='$tur_kod' and durum=1  order by yetiskin_fiyat asc limit 0 , 1");
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                if ($row['yetiskin_fiyat'] == "") {return $row['yetiskin_fiyat'] = 0;}
                return $row['yetiskin_fiyat'];

            }
        } else {
            return 0;
        }

    }

    public function alt_kat_turlar_yorum_sayi($tur_kod)
    {

        $query = $this->db->query("select * from acente_yorumlar Where tur_kod='$tur_kod' and durum=1");
        return $query->num_rows();
    }

    public function ust_kat_bilgi_getir($ust_kategori_id, $uz)
    {

        $query = $this->db->query("select * from acente_one_category Where id='$ust_kategori_id'");
        foreach ($query->result_array() as $row) {

            return $row['adi' . $uz];

        }
    }

    public function ust_kat_adi($ust_kategori_id, $uz)
    {

        $query = $this->db->query("select * from acente_one_category Where id='$ust_kategori_id'");
        foreach ($query->result_array() as $row) {

            return $row['seo_adi'];

        }
    }

    public function ana_kat_kategorileri($id)
    {

        $query = $this->db->query("select * from acente_category Where ust_kategori_id=" . $id . "  and kategori_turu='tur'");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }

    }

    public function ana_kat_kategorileri_tur_adet($id)
    {

        $query = $this->db->query("select * from acente_tur Where kat_id=" . $id . "  and tur_donemi!='otel' and durum=1");
        return $query->num_rows();
    }

    public function kat_yorumlar($id)
    {
        $n = 0;
        $yorum = "";
        $query = $this->db->query("select * from acente_tur Where kat_id=" . $id . "  and tur_donemi!='otel'");
        foreach ($query->result_array() as $row) {

            $query2 = $this->db->query("select * from acente_yorumlar Where tur_kod=" . $row['kod']);
            foreach ($query2->result_array() as $row2) {

                $yorum[$n]["baslik"] = $row2['baslik'];
                $yorum[$n]["yorum"] = $row2['yorum'];
                $yorum[$n]["tarih"] = $row2['tarih'];
                $yorum[$n]["kod"] = $row2['tur_kod'];
                $yorum[$n]["kullanici_id"] = $row2['kullanici_id'];

                $query3 = $this->db->query("select * from acente_tur Where kod=" . $row2['tur_kod'] . "  and tur_donemi!='otel'");
                foreach ($query3->result_array() as $row3) {

                    $yorum[$n]["adi"] = $row3['adi'];

                }
                $query4 = $this->db->query("select * from acente_uyeler Where id=" . $row2['kullanici_id']);
                foreach ($query4->result_array() as $row4) {

                    $yorum[$n]["kullanici"] = $row4['name'];

                }

            }

        }
        return $yorum;
    }

    public function populer_tur()
    {

        $query = $this->db->query("select * from acente_tur Where durum=1 and tur_donemi!='otel' and cok_satan=1 order by sorting desc limit 0 , 24");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }

    }

    public function populer_ana_kategori()
    {

        $query = $this->db->query("select * from acente_one_category Where durum=1 and one_cikan=1  order by id desc limit 0 , 100");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }

    }

    public function populer_kategori()
    {

        $query = $this->db->query("select * from acente_category Where durum=1 and one_cikan=1  and kategori_turu='tur' order by id desc limit 0 , 100");
        if ($query->num_rows() > 0) {
            return $query->result_array();
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

    public function yorum_puan_ortalama($kod, $kullanici_id)
    {

        $total = 0;
        $adet = 0;
        $puan_guv = 0;
        $puan_org = 0;
        $puan_para = 0;
        $puan_servis = 0;

        $total = 0;
        $adet = 0;
        $query = $this->db->query("select * from acente_puan_guv Where tur_kod=" . $kod . " and kullanici_id=" . $kullanici_id);
        if ($query->num_rows() > 0) {

            foreach ($query->result_array() as $row) {
                $puan_guv = $row['puan'];

            }

        }

        $total = 0;
        $adet = 0;
        $query = $this->db->query("select * from acente_puan_org Where tur_kod=" . $kod . " and kullanici_id=" . $kullanici_id);
        if ($query->num_rows() > 0) {

            foreach ($query->result_array() as $row) {
                $puan_org = $row['puan'];

            }

        }

        $total = 0;
        $adet = 0;
        $query = $this->db->query("select * from acente_puan_para Where tur_kod=" . $kod . " and kullanici_id=" . $kullanici_id);
        if ($query->num_rows() > 0) {

            foreach ($query->result_array() as $row) {
                $puan_para = $row['puan'];

            }

        }

        $total = 0;
        $adet = 0;
        $query = $this->db->query("select * from acente_puan_servis Where tur_kod=" . $kod . " and kullanici_id=" . $kullanici_id);
        if ($query->num_rows() > 0) {

            foreach ($query->result_array() as $row) {
                $puan_servis = $row['puan'];

            }

        }

        $total = $puan_guv + $puan_org + $puan_para + $puan_servis;
        return round($total / 4, 1);
    }

}
