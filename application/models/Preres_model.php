<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Preres_model extends CI_Model
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

    public function cart_getir($kul_id)
    {

        $query = $this->db->query("select * from acente_on_rez Where kullanici_id='" . $kul_id . "'");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }

    }

    public function tur_bilgi($tur_id)
    {

        $query = $this->db->query("select * from acente_tur Where id=" . $tur_id);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }

    }

    public function ziyaretci_bilgi($sepet_id)
    {

        $query = $this->db->query("select * from acente_on_rez_detay Where sepet_id=" . $sepet_id);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }

    }
    public function kat_bilgi($kat_id, $uz)
    {

        $query = $this->db->query("select * from acente_category Where id=" . $kat_id);
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                return $row['adi' . $uz];

            }

        } else {
            return false;
        }

    }

    public function kat_bilgi_seo($kat_id)
    {

        $query = $this->db->query("select * from acente_category Where id=" . $kat_id);
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                return $row['seo_adi'];

            }

        } else {
            return false;
        }

    }

    public function cart_remove($kul_id, $id, $tur_id)
    {

        $query = $this->db->query("delete from acente_on_rez Where id=" . $id . "  and kullanici_id='" . $kul_id . "'  and tur_id=" . $tur_id);
        if ($query) {

            //    return TRUE;
            $query2 = $this->db->query("delete from acente_on_rez_detay Where sepet_id=" . $id);
            return true;

        } else {return false;}

    }

    public function rezerve($kul_id)
    {

        $rezerve = $this->cart_getir($kul_id);

        $n = 0;if ($rezerve): foreach ($rezerve as $dizi):
                $cart_detay_getir[$n] = $this->Cart_model->cart_detay_getir($dizi["id"]);
                $sil_detay = $this->db->query("delete from acente_on_rez_detay Where sepet_id=" . $dizi["id"]);
                $n = $n + 1;endforeach;endif;

        $sil_sepet = $this->db->query("delete from acente_on_rez Where kullanici_id='" . $kul_id . "'");

        $n = 0;if ($rezerve): foreach ($rezerve as $dizi):

                $insert = array(

                    'tur_id' => $dizi["tur_id"],
                    'tur_kod' => $dizi["tur_kod"],
                    'kullanici_id' => $dizi["kullanici_id"],
                    'tur_detay_id' => $dizi["tur_detay_id"],
                    'yetiskin' => $dizi["yetiskin"],
                    'cocuk' => $dizi["cocuk"],
                    'tutar' => $dizi["tutar"],
                    'para_birimi' => $dizi["para_birimi"],
                    'bas_tar' => $dizi["bas_tar"],
                    'bit_tar' => $dizi["bit_tar"],
                    'baslangic_saati' => $dizi["baslangic_saati"],
                    'bitis_saati' => $dizi["bitis_saati"],
                    'indirimsiz' => $dizi["indirimsiz"],
                    'durum' => 1,
                );
                $into = $this->db->insert('acente_rezervasyon', $insert);

                $son_id = $this->db->insert_id();

                $m = 0;if ($cart_detay_getir[$n]): foreach ($cart_detay_getir[$n] as $dizi2):

                        $insert2 = array(

                            'rez_id' => $son_id,
                            'eriskin' => $dizi2["eriskin"],
                            'adi' => $dizi2["adi"],
                            'soyadi' => $dizi2["soyadi"],
                            'email' => $dizi2["email"],
                            'tel' => $dizi2["tel"],
                            'sehir' => $dizi2["sehir"],

                        );
                        $into2 = $this->db->insert('acente_rezervasyon_detay', $insert2);

                        $m = $m + 1;endforeach;endif;

                $n = $n + 1;endforeach;endif;

        return true;

    }

    public function cart_detay_getir($id)
    {

        $query = $this->db->query("select * from acente_on_rez_detay Where sepet_id=" . $id);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }

    }

    public function info($ad, $mail, $tel, $shr, $slc, $id, $sepet_id)
    {

        $insert = array(

            'eriskin' => $slc,
            'adi' => $ad,
            'email' => $mail,
            'tel' => $tel,
            'sehir' => $shr,
        );

        $into = $this->db->where('sepet_id', $sepet_id);
        $into = $this->db->where('id', $id);
        $into = $this->db->update('acente_on_rez_detay', $insert);

        if ($into) {return true;}

        return false;

    }

    public function odeme_turu($tur_id)
    {

        $query = $this->db->query("select * from acente_tur Where id=" . $tur_id);
        if ($query->num_rows() > 0) {

            foreach ($query->result_array() as $row) {
                return $row['odeme_turu'];

            }

        } else {
            return false;
        }

    }

}
