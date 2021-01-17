<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Categories_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();

    }

    public function varmi_ana_cat_name($ana_cat_name)
    {

        $query = $this->db->query("select * from acente_one_category Where seo_adi='$ana_cat_name'");
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

    public function ana_kat_bilgi($ana_cat_name)
    {

        $query = $this->db->query("select * from acente_one_category Where seo_adi='$ana_cat_name'");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }

    }

    public function ana_kat_turlar($ana_cat_name, $uz)
    {
        // return $ana_cat_name;

        $i = 0;
        $query = $this->db->query('select * from acente_one_category Where seo_adi="' . $ana_cat_name . '"');
        $say_cat = $query->num_rows($query);
        if ($say_cat == 0) {return false;}

        foreach ($query->result_array() as $row) {

            $ana_kat[$i]["adi"] = $row['adi' . $uz];
            $ana_kat[$i]["resim_2"] = $row['resim_2'];
            $ana_kat[$i]["seo_adi"] = $row['seo_adi'];
            $ana_kat[$i]["id"] = $row['id'];
            $ana_kat[$i]["aciklama"] = $row['aciklama' . $uz];

            $n = 0;
            $query_2 = $this->db->query("select * from acente_category Where durum=1  and kategori_turu='tur' and ust_kategori_id=" . $row['id'] . "");
            $say_alt_cat = $query_2->num_rows($query_2);

            if ($say_alt_cat != 0) {
                $dongu = $say_alt_cat - 1;
                $s = 0;
                foreach ($query_2->result_array() as $row_2) {

                    if ($n <= $dongu) {

                        $ana_kat[$i]["alt_kat"][$n] = $row_2['id'];

                        $query_3 = $this->db->query("select * from acente_tur Where durum=1  and tur_donemi!='otel' and kat_id=" . $row_2['id'] . "  order by sorting asc");
                        $say_tur = $query_3->num_rows($query_3);
                        if ($say_tur != 0) {

                            foreach ($query_3->result_array() as $row_3) {
                                $ana_kat[$i]["tur"][$s]["adi"] = $row_3['adi' . $uz];
                                $ana_kat[$i]["tur"][$s]["seo_adi"] = $row_3['seo_adi'];
                                $ana_kat[$i]["tur"][$s]["resim"] = $row_3['resim'];
                                $ana_kat[$i]["tur"][$s]["resim_2"] = $row_3['resim_2'];
                                $ana_kat[$i]["tur"][$s]["tukenme"] = $row_3['tukenme'];
                                $ana_kat[$i]["tur"][$s]["sticker"] = $row_3['sticker'];
                                $ana_kat[$i]["tur"][$s]["kod"] = $row_3['kod'];

                                $query_5 = $this->db->query("select * from acente_yorumlar Where durum=1  and tur_kod=" . $row_3['kod'] . " ");
                                $say_tur_yorum = $query_5->num_rows($query_5);
                                $ana_kat[$i]["tur"][$s]["yorum_adet"] = $say_tur_yorum;

                                $query_4 = $this->db->query("select * from acente_tur_detay Where durum=1  and tur_kod=" . $row_3['kod'] . " order by yetiskin_fiyat asc limit 0 , 1");
                                $say_tur_fiyat = $query_4->num_rows($query_4);
                                if ($say_tur_fiyat == 0) {$ana_kat[$i]["tur"][$s]["baslangic_fiyat"] = 0;} else {

                                    foreach ($query_4->result_array() as $row_4) {
                                        $ana_kat[$i]["tur"][$s]["baslangic_fiyat"] = $row_4['yetiskin_fiyat'];

                                    }

                                }

                                $s = $s + 1;
                            }

                        }

                    }
                    $n = $n + 1;
                }
            } else {

                //return $ana_kat;

            }

            $i = $i + 1;
        }

        return $ana_kat;

    }

    public function abone($email)
    {

        $query = $this->db->query("select * from acente_abone_eposta Where eposta='$email'");
        if ($query->num_rows() > 0) {
            return 0;
        } else {

            $insert = array(
                'eposta' => $email,
                'durum' => 1,
            );

            $into = $this->db->insert('acente_abone_eposta', $insert);
            if ($into) {return 1;} else {return 0;}

        }

    }

    public function ana_kat_yorumlar($ana_cat_name)
    {
        // return $ana_cat_name;

        $i = 0;
        $query = $this->db->query('select * from acente_one_category Where seo_adi="' . $ana_cat_name . '"');
        $say_cat = $query->num_rows($query);
        if ($say_cat == 0) {return false;}

        foreach ($query->result_array() as $row) {

            $ana_kat[$i]["adi"] = $row['adi'];
            $ana_kat[$i]["resim_2"] = $row['resim_2'];
            $ana_kat[$i]["seo_adi"] = $row['seo_adi'];
            $ana_kat[$i]["id"] = $row['id'];
            $ana_kat[$i]["aciklama"] = $row['aciklama'];

            $n = 0;
            $query_2 = $this->db->query("select * from acente_category Where durum=1  and kategori_turu='tur' and ust_kategori_id=" . $row['id'] . "");
            $say_alt_cat = $query_2->num_rows($query_2);

            if ($say_alt_cat != 0) {
                $dongu = $say_alt_cat - 1;
                $s = 0;
                $nn = 0;
                foreach ($query_2->result_array() as $row_2) {

                    if ($n <= $dongu) {

                        $ana_kat[$i]["alt_kat"][$n] = $row_2['id'];

                        $query_3 = $this->db->query("select * from acente_tur Where durum=1  and tur_donemi!='otel' and kat_id=" . $row_2['id'] . "  order by sorting asc");
                        $say_tur = $query_3->num_rows($query_3);
                        if ($say_tur != 0) {

                            foreach ($query_3->result_array() as $row_3) {
                                $ana_kat[$i]["tur"][$s]["adi"] = $row_3['adi'];
                                $ana_kat[$i]["tur"][$s]["seo_adi"] = $row_3['seo_adi'];
                                $ana_kat[$i]["tur"][$s]["id"] = $row_3['id'];
                                $ana_kat[$i]["tur"][$s]["kod"] = $row_3['kod'];

                                $query_4 = $this->db->query("select * from acente_yorumlar Where durum=1  and tur_kod=" . $row_3['kod']);

                                foreach ($query_4->result_array() as $row_4) {
                                    $ana_kat[$i]["yorum"][$nn]["baslik"] = $row_4['baslik'];
                                    $ana_kat[$i]["yorum"][$nn]["yorum"] = $row_4['yorum'];
                                    $ana_kat[$i]["yorum"][$nn]["tarih"] = $row_4['tarih'];
                                    $ana_kat[$i]["yorum"][$nn]["kullanici_id"] = $row_4['kullanici_id'];
                                    $ana_kat[$i]["yorum"][$nn]["tur_kod"] = $row_4['tur_kod'];

                                    $query_5 = $this->db->query("select * from acente_uyeler Where id=" . $row_4['kullanici_id']);

                                    foreach ($query_5->result_array() as $row_5) {

                                        $ana_kat[$i]["yorum"][$nn]["kullanici_adi"] = $row_5['username'];

                                    }

                                    $query_6 = $this->db->query("select * from acente_tur Where kod=" . $row_4['tur_kod'] . "   and tur_donemi!='otel'");

                                    foreach ($query_6->result_array() as $row_6) {

                                        $ana_kat[$i]["yorum"][$nn]["tur_adi"] = $row_6['adi'];
                                        $ana_kat[$i]["yorum"][$nn]["id"] = $row_4['id'];
                                    }

                                    $nn = $n + 1;
                                }

                                $s = $s + 1;
                            }

                        }

                    }
                    $n = $n + 1;
                }
            } else {

                //return $ana_kat;

            }

            $i = $i + 1;
        }

        return $ana_kat;

    }

    public function ana_kat_populer_kategori($ana_cat_name)
    {

        $query = $this->db->query("select * from acente_one_category  Where seo_adi='$ana_cat_name'");
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $ids = $row['id'];

                $query2 = $this->db->query("select * from acente_category Where durum=1   and kategori_turu='tur' and ust_kategori_id='$ids'");
                if ($query2->num_rows() > 0) {
                    return $query2->result_array();

                } else {
                    return false;
                }

            }

        } else {
            return false;
        }

    }

    public function ana_kat_populer_kategori_sayi($id)
    {

        $query = $this->db->query("select * from acente_tur Where durum=1  and tur_donemi!='otel' and kat_id=$id  order by sorting asc");
        return $query->num_rows();

    }

    public function populer_tur()
    {

        $query = $this->db->query("select * from acente_tur Where durum=1  and tur_donemi!='otel' and cok_satan=1  order by sorting desc limit 0 , 24");
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

        $query = $this->db->query("select * from acente_category Where durum=1 and kategori_turu='tur' and one_cikan=1 order by id desc limit 0 , 100");
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
