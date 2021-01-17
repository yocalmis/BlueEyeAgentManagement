<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Giris_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();

    }

    public function user_return($kul, $sf)
    {

/*    $query =$this->db->query("select * from acente_uyeler Where status=1 and username='$email' or email='$email' ");
return $query->num_rows();
if(  $query->num_rows() > 0 )
{
return FALSE;
}

 */

        $query = $this->db->query("select * from acente_uyeler Where status=1 and username='$kul' or email='$kul' ");
        $query->num_rows();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }

    }

    public function user_return_sosyal($email)
    {

        $query = $this->db->query("select * from acente_uyeler Where status=1 and username='$email' or email='$email' ");
        $query->num_rows();
        if ($query->num_rows() > 0) {
            return $query->result_array();
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

    public function turlar_home($uz)
    {
        $i = 0;
        $query = $this->db->query('select * from acente_one_category Where one_cikan=1 and durum=1 order by id asc limit 0 , 3');
        $say_cat = $query->num_rows($query);
        if ($say_cat == 0) {return false;}

        foreach ($query->result_array() as $row) {

            $ana_kat[$i]["adi"] = $row['adi' . $uz];
            $ana_kat[$i]["resim_2"] = $row['resim_2'];
            $ana_kat[$i]["seo_adi"] = $row['seo_adi'];
            $ana_kat[$i]["id"] = $row['id'];
            $ana_kat[$i]["aciklama"] = $row['aciklama' . $uz];

            $n = 0;
            $query_2 = $this->db->query("select * from acente_category Where durum=1  and ust_kategori_id=" . $row['id'] . " order by id asc limit 0 , 4");
            $say_alt_cat = $query_2->num_rows($query_2);

            if ($say_alt_cat != 0) {
                $dongu = $say_alt_cat - 1;
                $s = 0;
                foreach ($query_2->result_array() as $row_2) {

                    if ($n <= $dongu) {

                        $ana_kat[$i]["alt_kat"][$n] = $row_2['id'];

                        $query_3 = $this->db->query("select * from acente_tur Where durum=1  and tur_donemi!='otel' and tur_donemi!='otel' and kat_id=" . $row_2['id'] . " order by sorting asc");
                        $say_tur = $query_3->num_rows($query_3);
                        if ($say_tur != 0) {

                            foreach ($query_3->result_array() as $row_3) {
                                $ana_kat[$i]["tur"][$s]["adi"] = $row_3['adi' . $uz];
                                $ana_kat[$i]["tur"][$s]["seo_adi"] = $row_3['seo_adi'];
                                $ana_kat[$i]["tur"][$s]["resim"] = $row_3['resim'];
                                $ana_kat[$i]["tur"][$s]["kod"] = $row_3['kod'];

                                $query_4 = $this->db->query("select * from acente_tur_detay Where durum=1  and tur_kod=" . $row_3['kod'] . " order by yetiskin_fiyat asc limit 0 , 1");
                                $say_tur_fiyat = $query_4->num_rows($query_4);
                                if ($say_tur_fiyat == 0) {$ana_kat[$i]["tur"][$s]["baslangic_fiyat"] = 0;} else {

                                    foreach ($query_4->result_array() as $row_4) {
                                        $ana_kat[$i]["tur"][$s]["baslangic_fiyat"] = $row_4['yetiskin_fiyat'];

                                    }

                                }

                                $query_5 = $this->db->query("select * from acente_yorumlar Where durum=1  and tur_kod=" . $row_3['kod'] . " ");
                                $say_tur_yorum = $query_5->num_rows($query_5);
                                $ana_kat[$i]["tur"][$s]["yorum_adet"] = $say_tur_yorum;

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

    public function populer_tur()
    {

        $query = $this->db->query("select * from acente_tur Where durum=1  and tur_donemi!='otel'  and cok_satan=1  order by sorting desc limit 0 , 24");
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

    public function populer_ana_kategori_sayi($id)
    {

        $query = $this->db->query("select * from acente_category Where durum=1 and ust_kategori_id=" . $id . " and one_cikan=1 and kategori_turu !='otel' order by id desc limit 0 , 100");
        if ($query->num_rows() > 0) {
            $total = 0;
            foreach ($query->result_array() as $row) {

                $query2 = $this->db->query("select * from acente_tur  Where durum=1 and tur_donemi!='otel'  and kat_id=" . $row['id'] . " order by sorting asc");
                $total = $total + $query2->num_rows();

            }

            return $total;
        } else {
            return false;
        }

    }

    public function populer_kategori()
    {

        $query = $this->db->query("select * from acente_category Where durum=1 and kategori_turu !='otel'  and one_cikan=1 order by id desc limit 0 , 100");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }

    }

    public function uye_kaydet($isim, $kl, $sf, $em, $login_type = null)
    {

        $query = $this->db->query("select * from acente_uyeler Where username='$kl' or email='$em' ");
        if ($query->num_rows() > 0) {return 0;}

        $sta = 0;if (($login_type == "google") or ($login_type == "facebook") or ($login_type == "email")) {$sta = 1;} else { $sta = 0;}

        $insert = array(
            'name' => $isim,
            'username' => $kl,
            'pass' => $sf,
            'email' => $em,
            'status' => $sta,

        );

        $into = $this->db->insert('acente_uyeler', $insert);
        if ($into) {return 1;} else {return 0;}

    }

    public function uye_onay($pass)
    {

        $insert = array(
            'status' => 1,

        );
        $this->db->where('pass', $pass);
        $into = $this->db->update('acente_uyeler', $insert);
        if ($into) {return 1;} else {return 0;}

    }

    public function kontrol($email)
    {

        $query = $this->db->query("select * from acente_uyeler Where email='$email'");
        if ($query->num_rows() > 0) {
            return 1;
        } else {
            return 0;
        }

    }

    public function pass_getir($email)
    {

        $query = $this->db->query("select * from acente_uyeler Where email='$email'");
        if ($query->num_rows() > 0) {

            foreach ($query->result_array() as $row) {
                return $row['pass'];

            }

        } else {
            return false;
        }

    }

    public function sifre_guncelle($sf, $pass)
    {

        $insert = array(
            'pass' => $sf,

        );
        $this->db->where('pass', $pass);
        $into = $this->db->update('acente_uyeler', $insert);
        if ($into) {return 1;} else {return 0;}

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

    public function sepet_update($ip, $kul_id)
    {

        $insert = array(
            'kullanici_id' => $kul_id,

        );

        $this->db->where('kullanici_id', $ip);
        $into = $this->db->update('acente_sepet', $insert);

        if ($into) {return 1;} else {return 0;}

    }

    public function rez_update($ip, $kul_id)
    {

        $insert = array(
            'kullanici_id' => $kul_id,

        );

        $this->db->where('kullanici_id', $ip);
        $into = $this->db->update('acente_on_rez', $insert);

        if ($into) {return 1;} else {return 0;}

    }

}
