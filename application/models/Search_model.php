<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Search_model extends CI_Model
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

    public function ara($word, $sorgu, $bas_t, $bit_t)
    {

// "select * from acente_tur Where adi LIKE '%".$word."%' or aciklama LIKE '%".$word."%' or tam_aciklama LIKE '%".$word."%' or gezi_rehberi LIKE '%".$word."%' or dahil_olanlar LIKE '%".$word."%' or one_cikanlar LIKE '%".$word."%' or rehber LIKE '%".$word."%'".$sorgu;

        $query = $this->db->query("select * from acente_tur Where (adi LIKE '%" . $word . "%' or adi_ru LIKE '%" . $word . "%' or adi_tr LIKE '%" . $word . "%' or aciklama LIKE '%" . $word . "%' or aciklama_tr LIKE '%" . $word . "%' or aciklama_ru LIKE '%" . $word . "%' or tam_aciklama LIKE '%" . $word . "%' or tam_aciklama_tr LIKE '%" . $word . "%' or tam_aciklama_ru LIKE '%" . $word . "%' or gezi_rehberi LIKE '%" . $word . "%' or gezi_rehberi_ru LIKE '%" . $word . "%' or gezi_rehberi_tr LIKE '%" . $word . "%' or dahil_olanlar LIKE '%" . $word . "%' or dahil_olanlar_ru LIKE '%" . $word . "%' or dahil_olanlar_tr LIKE '%" . $word . "%' or one_cikanlar LIKE '%" . $word . "%' or one_cikanlar_tr LIKE '%" . $word . "%' or one_cikanlar_ru LIKE '%" . $word . "%' or rehber LIKE '%" . $word . "%' or rehber_tr LIKE '%" . $word . "%' or rehber_ru LIKE '%" . $word . "%')" . $sorgu);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }

    }

    public function kat_getir($kat_id, $uz)
    {

        $query = $this->db->query("select * from acente_category Where id=" . $kat_id . "");
        if ($query->num_rows() > 0) {

            foreach ($query->result_array() as $row) {
                return $row['adi' . $uz];

            }

        } else {
            return false;
        }

    }

    public function fyt($kod)
    {

        $query = $this->db->query("select * from acente_tur_detay Where tur_kod=" . $kod . " order by yetiskin_fiyat asc limit 0 , 1");
        if ($query->num_rows() > 0) {

            foreach ($query->result_array() as $row) {
                return $row['yetiskin_fiyat'];

            }

        } else {
            return false;
        }

    }

    public function tur_yorum($t_id)
    {

        $query = $this->db->query("select * from acente_yorumlar Where tur_id=" . $t_id . " and durum=1");
        return $query->num_rows();

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

    public function tur_tarih_uygun($kod, $bas_t, $bit_t)
    {

        $query = $this->db->query("select * from acente_tur_detay Where tur_kod=" . $kod . " and durum=1 and baslangic_tarihi>='" . $bas_t . "' and baslangic_tarihi<='" . $bit_t . "'");
        if ($query->num_rows() > 0) {

            return 1;

        } else {
            return 0;
        }

    }

    public function ara_anakat($word, $sorgu, $bas_t, $bit_t)
    {

        $query = $this->db->query("select * from acente_one_category Where adi='$word' or adi_tr='$word' or adi_ru='$word'");
        return $query->num_rows();

    }

    public function ara_anakat_kat_getir($word, $sorgu, $bas_t, $bit_t)
    {

        $query = $this->db->query("select * from acente_one_category Where adi='$word' or adi_tr='$word' or adi_ru='$word'");
        if ($query->num_rows() > 0) {

            foreach ($query->result_array() as $row) {
                $id = $row['id'];
                break;
            }

            $query2 = $this->db->query("select * from acente_category Where ust_kategori_id=" . $id . "");
            if ($query2->num_rows() > 0) {
                $n = 0;
                foreach ($query2->result_array() as $row2) {
                    $kat_id[$n] = $row2['id'];
                    $n = $n + 1;
                }
                return $kat_id;
            } else {
                return false;
            }

        } else {
            return false;
        }

    }

    public function ara_anakat_kat_tur_getir($ara_anakat_kat_getir, $sorgu, $bas_t, $bit_t)
    {

        $say = count($ara_anakat_kat_getir);
        $don = $say - 1;
        $sql = "";
        for ($n = 0; $n <= $don; $n++) {
            if ($n == 0) {$sql .= " kat_id=" . $ara_anakat_kat_getir[$n];} else { $sql .= " or kat_id=" . $ara_anakat_kat_getir[$n];}

        }

        $sql = "select * from acente_tur Where (" . $sql . ") " . $sorgu;
        //    $sql="select * from acente_tur Where ( kat_id=4 or kat_id=5 or kat_id=6 or kat_id=7 or kat_id=8 or kat_id=22) and hizli_giris=1";

        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }

    }

    public function ara_kat($word, $sorgu, $bas_t, $bit_t)
    {

        $query = $this->db->query("select * from acente_category Where adi='$word' or adi_tr='$word' or adi_ru='$word'");
        return $query->num_rows();

    }

    public function ara_kat_tur_getir($word, $sorgu, $bas_t, $bit_t)
    {

        $query = $this->db->query("select * from acente_category Where adi='$word' or adi_tr='$word' or adi_ru='$word'");
        foreach ($query->result_array() as $row) {
            $id = $row['id'];

        }

        $sql = "select * from acente_tur Where kat_id=" . $id . " " . $sorgu;

        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }

    }

    public function tur_fyt_uygun($kod, $f1, $f2)
    {

        $query = $this->db->query("select * from acente_tur_detay Where tur_kod=" . $kod . " and durum=1");
        if ($query->num_rows() == 0) {

            $yetiskin_fiyat = 0;

            if (($yetiskin_fiyat >= $f1) and ($yetiskin_fiyat <= $f2)) {
                return 1;
            }

        }

        $query = $this->db->query("select * from acente_tur_detay Where tur_kod=" . $kod . " and durum=1 and yetiskin_fiyat>='" . $f1 . "' and yetiskin_fiyat<='" . $f2 . "'");
        if ($query->num_rows() > 0) {

            return 1;

        } else {
            return 0;
        }

    }

}
