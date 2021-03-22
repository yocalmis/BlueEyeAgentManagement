<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model
{
	 function __construct()
     {
         parent::__construct();
         $this->load->database();
     }
	 
	 //Admin Varm� Yokmu Kontrol Et , Varsa Login'e Yoksa Kay�t sayfas�na y�nlendir
	 
	 
     
      function admin_query()
     {
   
        $sql = "SELECT * FROM tkn_mat_admin";
        $query = $this->db->query($sql);
        
        if( $query->num_rows() > 0 )
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }

   
   
   
     }

    function admin_register_before($username)
    {

        $sql = "SELECT * FROM tkn_mat_users Where username='$username'";
        $query = $this->db->query($sql);

        if( $query->num_rows() > 0 )
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }




    }

		 
		 
		   function admin_info()
    {
        $sql = "SELECT * FROM tkn_mat_options";
        $query = $this->db->query($sql);
        
        if( $query->num_rows() > 0 )
        {
            return $query->result_array();
        }
        else
        {
            return FALSE;
        }
    }
		 
		 
		 
		 	 //Admin kaydet
		 
		 
         
              function admin_register($data)
     {
    $name=$this->db->escape_str($data[0]);
	$email=$this->db->escape_str($data[1]);
	$username=$this->db->escape_str($data[2]);
	$pass=$this->db->escape_str($data[3]);


	
	$insert=array(
	'name'=>$name,
	'username'=>$username,
	'pass'=>$pass,
	'email'=>$email
	
	);
	
	$into=$this->db->insert('tkn_mat_admin',$insert);
	if($into){return 1;}else{return 0;}



     }
     

	 
	 //Admin login kontrol
	 
     
     function admin_return($data)
     {
 

    $username=$this->db->escape_str($data[0]);
	$pass=$this->db->escape_str($data[1]);

	$query =$this->db->query("select * from tkn_mat_admin Where username='$username' and pass='$pass'");
    if ($query->num_rows() > 0)
    {return 1;}    else{return 0;}
    

   
     }



/*
    function order_info($dt1,$dt2)
    {
        $sql = "SELECT tkn_mat_users.username,tkn_mat_products.product_name,tkn_mat_orders.total,tkn_mat_orders.date,
tkn_mat_orders.top_value,tkn_mat_orders.payment_status
FROM tkn_mat_orders
INNER JOIN tkn_mat_users ON tkn_mat_orders.user_id=tkn_mat_users.id
INNER JOIN tkn_mat_products ON tkn_mat_orders.product_id=tkn_mat_products.id
 Where date>='$dt1' and date<='$dt2'
Order by date desc
";
        $query = $this->db->query($sql);

        if( $query->num_rows() > 0 )
        {
            return $query->result_array();
        }
        else
        {
            return FALSE;
        }
    }
*/


    function order_info($dt1,$dt2)
    {
        $sql = "SELECT * from tkn_mat_process
 Where date>='$dt1' and date<='$dt2'
Order by date desc
";
        $query = $this->db->query($sql);

        if( $query->num_rows() > 0 )
        {
            return $query->result_array();
        }
        else
        {
            return FALSE;
        }
    }







//Bayi Detay


    function users_info_get($id)
    {
        $sql = "SELECT * FROM tkn_mat_users Where id=$id";
        $query = $this->db->query($sql);

        if( $query->num_rows() > 0 )
        {
            return $query->result_array();
        }
        else
        {
            return FALSE;
        }
    }


    function users_order_total($id)
    {

        $islem = "SELECT SUM(top_value) FROM tkn_mat_orders Where user_id=$id";
        $sonuc = mysql_query($islem) or die(mysql_error());
        while($row = mysql_fetch_array($sonuc)){

            $toplamsayimiktar = $row['SUM(top_value)'] ;

        }

        return $toplamsayimiktar;


    }




    function users_payment_total($id)
    {
        $islem = "SELECT SUM(amount) FROM tkn_mat_payments Where user_id=$id";
        $sonuc = mysql_query($islem) or die(mysql_error());
        while($row = mysql_fetch_array($sonuc)){

            $toplamsayimiktar = $row['SUM(amount)'] ;

        }

        return $toplamsayimiktar;
    }



//Mesajlar alınıyor

    function message_get($id,$search)
    {

if($search==""){ $sql = "SELECT * from tkn_mat_ticket Where from_id=$id or to_id=$id order by date DESC";}
  else{  $sql = "SELECT *  FROM tkn_mat_ticket WHERE (header LIKE '%" .
      $search . "%'  OR message LIKE '%" . $search ."%'
             )  and (from_id=$id or to_id=$id)";}


        $query = $this->db->query($sql);

        if( $query->num_rows() > 0 )
        {
            return $query->result_array();
        }
        else
        {
            return FALSE;
        }

    }




    function user_get($id)
    {


        $sql = "SELECT * from tkn_mat_users Where id=$id";
        $query = $this->db->query($sql);

        if( $query->num_rows() > 0 )
        {
            return $query->result_array();
        }
        else
        {
            return FALSE;
        }




    }








//İd'li Üyenin mesajları okundu olarak kaydediliyor.

    function message_update($id)
    {

        $update=array(
            'status'=>1,
        );

        $this->db->where('to_id',$id);
        $this->db->or_where('from_id',$id);
        $return=$this->db->update('tkn_mat_ticket',$update);
        if($return){return 1;}else{return 0;}



    }


//Mesaj Kaydediliyor

    function message_insert($data)
    {


        $header=$this->db->escape_str($data[0]);
        $msg=$this->db->escape_str($data[1]);
        $to_id=$this->db->escape_str($data[2]);
        $from_id=$this->db->escape_str($data[3]);
        $date=date("Y-m-d-H-i-s");

        if($from_id==0){$status=1;}else{$status=0;}



        $insert=array(
            'header'=>$header,
            'message'=>$msg,
            'date'=>$date,
            'from_id'=>$from_id,
            'to_id'=>$to_id,
            'status'=>$status
        );

        $return=$this->db->insert('tkn_mat_ticket',$insert);
        if($return){return 1;}else{return 0;}



    }


//Anket Detay

    function survey_detail_view($id)
    {
        $sql = "SELECT * FROM tkn_mat_survey Where id=$id";
        $query = $this->db->query($sql);

        if( $query->num_rows() > 0 )
        {
            return $query->result_array();
        }
        else
        {
            return FALSE;
        }
    }


    function survey_detail_return_opt_1($id)
    {
        $sql = "SELECT * FROM tkn_mat_survey_answer Where survey_id=$id and survey_selected_option='survey_option_1'";
        $query = $this->db->query($sql);
        $count=$query->num_rows();

            return $count;
  }



    function survey_detail_return_opt_2($id)
    {
        $sql = "SELECT * FROM tkn_mat_survey_answer Where survey_id=$id and survey_selected_option='survey_option_2'";
        $query = $this->db->query($sql);
        $count=$query->num_rows();

        return $count;
    }


    function survey_detail_return_opt_3($id)
    {
        $sql = "SELECT * FROM tkn_mat_survey_answer Where survey_id=$id and survey_selected_option='survey_option_3'";
        $query = $this->db->query($sql);
        $count=$query->num_rows();

        return $count;
    }



    function survey_detail_return_opt_4($id)
    {
        $sql = "SELECT * FROM tkn_mat_survey_answer Where survey_id=$id and survey_selected_option='survey_option_4'";
        $query = $this->db->query($sql);
        $count=$query->num_rows();

        return $count;
    }


    function survey_detail_return_opt_5($id)
    {
        $sql = "SELECT * FROM tkn_mat_survey_answer Where survey_id=$id and survey_selected_option='survey_option_5'";
        $query = $this->db->query($sql);
        $count=$query->num_rows();

        return $count;
    }


    function survey_detail_return_opt_6($id)
    {
        $sql = "SELECT * FROM tkn_mat_survey_answer Where survey_id=$id and survey_selected_option='survey_option_6'";
        $query = $this->db->query($sql);
        $count=$query->num_rows();

        return $count;
    }




    function user_payment($id)
    {
        $islem = "SELECT SUM(amount) FROM tkn_mat_payments Where user_id=$id";
        $sonuc = mysql_query($islem) or die(mysql_error());
        while($row = mysql_fetch_array($sonuc)){

            $toplamsayimiktar = $row['SUM(amount)'] ;

        }

        return $toplamsayimiktar;
    }





//Teklif Kabul




    function offer_true($id)
    {


        $update=array('status'=>1);

                $this->db->where('id',$id);
        $return=$this->db->update('tkn_mat_offer',$update);
        if($return){return 1;}else{return 0;}


    }

    function offer_false($id)
    {


        $update=array('status'=>2);

        $this->db->where('id',$id);
        $return=$this->db->update('tkn_mat_offer',$update);
        if($return){return 1;}else{return 0;}


    }



    function orderwait_true($id)
    {
        $sor=mysql_query("SELECT * from tkn_mat_orders where sid='$id'");
        While($yaz=mysql_fetch_array($sor)){ $order_no=$yaz['order_no']; }


        $update=array('order_status'=>1);
        $this->db->where('sid',$id);
        $return=$this->db->update('tkn_mat_orders',$update);

        $update2=array('order_status'=>1);
        $this->db->where('order_no',$order_no);
        $return2=$this->db->update('tkn_mat_process',$update2);

        if($return){return 1;}else{return 0;}


    }

    function orderwait_false($id)
    {
        $sor=mysql_query("SELECT * from tkn_mat_orders where sid='$id'");
        While($yaz=mysql_fetch_array($sor)){ $order_no=$yaz['order_no']; $tv=$yaz['top_value']; $ui=$yaz['user_id'];}

        $update=array('order_status'=>3);
        $this->db->where('sid',$id);
        $return=$this->db->update('tkn_mat_orders',$update);

     /*   $update2=array('order_status'=>3);
        $this->db->where('order_no',$order_no);
        $return2=$this->db->update('tkn_mat_process',$update2);*/


        $insert=array(
            'tur'=>'payment',
            'payment_no'=>$order_no,
            'amount'=>$tv,
            'cancellation'=>1,
            'date'=>date('Y.m.d'),
            'user_id'=>$ui


        );

        $into=$this->db->insert('tkn_mat_process',$insert);
        if($into){return 1;}else{return 0;}




        if($return){return 1;}else{return 0;}


    }





    function ordermake_true($id)
    {
        $sor=mysql_query("SELECT * from tkn_mat_orders where sid='$id'");
        While($yaz=mysql_fetch_array($sor)){ $order_no=$yaz['order_no']; }

        $update=array('order_status'=>2);

        $this->db->where('sid',$id);
        $return=$this->db->update('tkn_mat_orders',$update);

        $update2=array('order_status'=>2);
        $this->db->where('order_no',$order_no);
        $return2=$this->db->update('tkn_mat_process',$update2);


        if($return){return 1;}else{return 0;}


    }




    //Get Stats



    function order_stats()
    {


        $dt=date('Y.01.01');
        $i=0;
        $sor=mysql_query("SELECT top_value,p_code, SUM(top_value) FROM tkn_mat_orders Where date>='$dt'
        Group By product_id order by top_value desc limit 0 , 10");

        While($yaz=mysql_fetch_array($sor)){
            $pcd=$yaz['p_code'];

     /*       $sor=mysql_query("SELECT * from tkn_mat_products_digital where p_code='$pcd'");
            $sor2=mysql_query("SELECT * from tkn_mat_products where p_code='$pcd'");

            if($sor){While($yaz=mysql_fetch_array($sor)){ $name=$yaz['product_name']; }}
            else if($sor2){While($yaz2=mysql_fetch_array($sor2)){ $name=$yaz2['product_name']; }}

            $name=substr($name,0,15);*/

            $veri[$i]="['".$pcd."',".$yaz['top_value']."],";

            $i=$i+1;
        }

        return   $veri;

    }






    function order_stats_total()
    {


        $dt=date('Y.01.01');
        $i=0;
        $sor=mysql_query("SELECT total,product_id, SUM(total) FROM tkn_mat_orders Where date>='$dt' Group By product_id order by total desc limit 0 , 10");

        While($yaz=mysql_fetch_array($sor)){
            $pid=$yaz['product_id'];
            $sor2=mysql_query("SELECT * from tkn_mat_products where id=$pid");
            While($yaz2=mysql_fetch_array($sor2)){ $name=$yaz2['product_name']; }

           $name=substr($name,0,15);

            $veri[$i]="['".$name."',".$yaz['total']."],";

            $i=$i+1;
        }

        return   $veri;



    }






    function order_stats_user()
    {

        $dt=date('Y.01.01');
        $i=1;

        $sor=mysql_query("SELECT user_id,COUNT(*) AS tot
FROM tkn_mat_orders
Where date>='$dt'
GROUP BY user_id Order by tot desc limit 0 , 20");
        $say=mysql_num_rows($sor);
        While($yaz=mysql_fetch_array($sor)){

            $uid=$yaz['user_id'];

            $sor2=mysql_query("SELECT  * from tkn_mat_users Where id=$uid");
            While($yaz2=mysql_fetch_array($sor2)){ $uname=$yaz2["username"];  }

            if($i<$say){$veri[0]="['".$uname."',".$yaz['tot']."],"; }
            else{$veri[1]="['".$uname."',".$yaz['tot']."]";}

            $i=$i+1;
        }

        return   $veri;


        //   if($i<$say){$veri[0]="['2',3],"; }
        //    else{$veri[1]="['1',2]";}

        // if($i<$say){$veri[0]="['".$yaz['product_id']."',".$yaz['total']."],"; }
        //   else{$veri[1]="['".$yaz['product_id']."',".$yaz['total']."]";}

    }



    function order_stats_user_total_value()
    {
        $dt=date('Y.01.01');
        $i=1;
        $sor=mysql_query("SELECT top_value,user_id,COUNT(*) AS tot
        FROM tkn_mat_orders
        Where date>='$dt'
        GROUP BY user_id Order by top_value desc limit 0 , 20");
        $say=mysql_num_rows($sor);
        While($yaz=mysql_fetch_array($sor)){

            $uid=$yaz['user_id'];

            $sor2=mysql_query("SELECT  * from tkn_mat_users Where id=$uid");
            While($yaz2=mysql_fetch_array($sor2)){ $name=$yaz2["username"];  }

            $sor3=mysql_query("SELECT SUM(top_value) as adet FROM tkn_mat_orders Where user_id=$uid");
            While($yaz3=mysql_fetch_array($sor3)){ $top_value=$yaz3["adet"];  }

            if($i<$say){$veri[0]="['".$name."',".$top_value."],"; }
            else{$veri[1]="['".$name."',".$top_value."]";}

            $i=$i+1;


        }

        return   $veri;



    }






    function order_stats_user_total()
    {
        $dt=date('Y.01.01');
        $i=1;
        $sor=mysql_query("SELECT top_value,user_id,COUNT(*) AS tot
        FROM tkn_mat_orders
        Where date>='$dt'
        GROUP BY user_id Order by total desc limit 0 , 20");
        $say=mysql_num_rows($sor);
        While($yaz=mysql_fetch_array($sor)){

            $uid=$yaz['user_id'];

            $sor2=mysql_query("SELECT  * from tkn_mat_users Where id=$uid");
            While($yaz2=mysql_fetch_array($sor2)){ $name=$yaz2["username"];  }

            $sor3=mysql_query("SELECT SUM(total) as adet FROM tkn_mat_orders Where user_id=$uid");
            While($yaz3=mysql_fetch_array($sor3)){ $total=$yaz3["adet"];  }

            if($i<$say){$veri[0]="['".$name."',".$total."],"; }
            else{$veri[1]="['".$name."',".$total."]";}

            $i=$i+1;


        }

        return   $veri;



    }





    function order_stats_top()
    {
        $dt=date('Y.01.01');

        //toplam değer

        $sor=mysql_query("SELECT SUM(top_value) AS top_val
        FROM tkn_mat_orders
        Where date>='$dt'");
        While($yaz=mysql_fetch_array($sor)){
              $top_val=$yaz["top_val"];
         }

        //kaç adet ürün

        $sor2=mysql_query("SELECT SUM(total) AS top_tot
        FROM tkn_mat_orders
        Where date>='$dt'");
        While($yaz2=mysql_fetch_array($sor2)){
            $top_tot=$yaz2["top_tot"];
        }

        //toplam sipariş adedi

        $sor3=mysql_query("SELECT COUNT(DISTINCT sid) AS top_ord
        FROM tkn_mat_orders
        Where date>='$dt'");
        While($yaz3=mysql_fetch_array($sor3)){
            $top_ord=$yaz3["top_ord"];
        }

        //kaç çeşit ürün

        $sor4=mysql_query("SELECT date , product_id,COUNT(*) AS tot
FROM tkn_mat_orders
Where date>='$dt'
GROUP BY product_id");
        $top_var=mysql_num_rows($sor4);


        $dt=date('Y.m.01');
        $dt2=date('Y.m.31');

        //toplam değer aylık

        $sor=mysql_query("SELECT SUM(top_value) AS top_val
        FROM tkn_mat_orders
        Where date>='$dt' and date<='$dt2'");
        While($yaz=mysql_fetch_array($sor)){
            $top_val_month=$yaz["top_val"];
        }

        //kaç adet ürün aylık

        $sor2=mysql_query("SELECT SUM(total) AS top_tot
        FROM tkn_mat_orders
        Where date>='$dt' and date<='$dt2'");
        While($yaz2=mysql_fetch_array($sor2)){
            $top_tot_month=$yaz2["top_tot"];
        }

        //toplam sipariş adedi aylık

        $sor3=mysql_query("SELECT COUNT(DISTINCT sid) AS top_ord
        FROM tkn_mat_orders
        Where date>='$dt' and date<='$dt2'");
        While($yaz3=mysql_fetch_array($sor3)){
            $top_ord_month=$yaz3["top_ord"];
        }

        //kaç çeşit ürün aylık

        $sor4=mysql_query("SELECT date , product_id,COUNT(*) AS tot
FROM tkn_mat_orders
Where date>='$dt' and date<='$dt2'
GROUP BY product_id");
        $top_var_month=mysql_num_rows($sor4);






        $dt=date('Y.m.d');


        //toplam değer aylık

        $sor=mysql_query("SELECT SUM(top_value) AS top_val
        FROM tkn_mat_orders
        Where date='$dt'");
        While($yaz=mysql_fetch_array($sor)){
            $top_val_day=$yaz["top_val"];
        }

        //kaç adet ürün aylık

        $sor2=mysql_query("SELECT SUM(total) AS top_tot
        FROM tkn_mat_orders
        Where date='$dt'");
        While($yaz2=mysql_fetch_array($sor2)){
            $top_tot_day=$yaz2["top_tot"];
        }

        //toplam sipariş adedi aylık

        $sor3=mysql_query("SELECT COUNT(DISTINCT sid) AS top_ord
        FROM tkn_mat_orders
        Where date='$dt'");
        While($yaz3=mysql_fetch_array($sor3)){
            $top_ord_day=$yaz3["top_ord"];
        }

        //kaç çeşit ürün aylık

        $sor4=mysql_query("SELECT date , product_id,COUNT(*) AS tot
FROM tkn_mat_orders
Where date='$dt'
GROUP BY product_id");
        $top_var_day=mysql_num_rows($sor4);









        $months = array(
            1=>"Ocak",
            2=>"Şubat",
            3=>"Mart",
            4=>"Nisan",
            5=>"Mayıs",
            6=>"Haziran",
            7=>"Temmuz",
            8=>"Ağustos",
            9=>"Eylül",
            10=>"Ekim",
            11=>"Kasım",
            12=>"Aralık"
        );

        $month=$months[date('n')];

        return $dizi = array($top_val,$top_tot,$top_ord,$top_var,$top_val_month,$top_tot_month,$top_ord_month,$top_var_month
        ,$month,$top_val_day,$top_tot_day,$top_ord_day,$top_var_day);

    }




    function order_stats_year()
    {
        $dt=date('Y.01.01');
        $dt2=date('Y.01.31');

        $sor=mysql_query("SELECT SUM(total) AS total
        FROM tkn_mat_orders
        Where date>='$dt' and date<='$dt2' ");
        While($yaz=mysql_fetch_array($sor)){
            if($yaz["total"]==""){$oc=0;}
            else{$oc=$yaz["total"];}
        }



        $dt=date('Y.02.01');
        $dt2=date('Y.02.29');

        $sor=mysql_query("SELECT SUM(total) AS total
        FROM tkn_mat_orders
        Where date>='$dt' and date<='$dt2' ");
        While($yaz=mysql_fetch_array($sor)){

            if($yaz["total"]==""){$sb=0;}
            else{$sb=$yaz["total"];}
        }


        $dt=date('Y.03.01');
        $dt2=date('Y.03.31');

        $sor=mysql_query("SELECT SUM(total) AS total
        FROM tkn_mat_orders
        Where date>='$dt' and date<='$dt2' ");
        While($yaz=mysql_fetch_array($sor)){

            if($yaz["total"]==""){$ma=0;}
            else{$ma=$yaz["total"];}
        }

        $dt=date('Y.04.01');
        $dt2=date('Y.04.30');

        $sor=mysql_query("SELECT SUM(total) AS total
        FROM tkn_mat_orders
        Where date>='$dt' and date<='$dt2' ");
        While($yaz=mysql_fetch_array($sor)){

            if($yaz["total"]==""){$ns=0;}
            else{$ns=$yaz["total"];}
        }



        $dt=date('Y.05.01');
        $dt2=date('Y.05.31');

        $sor=mysql_query("SELECT SUM(total) AS total
        FROM tkn_mat_orders
        Where date>='$dt' and date<='$dt2' ");
        While($yaz=mysql_fetch_array($sor)){

            if($yaz["total"]==""){$my=0;}
            else{$my=$yaz["total"];}
        }



        $dt=date('Y.06.01');
        $dt2=date('Y.06.30');

        $sor=mysql_query("SELECT SUM(total) AS total
        FROM tkn_mat_orders
        Where date>='$dt' and date<='$dt2' ");
        While($yaz=mysql_fetch_array($sor)){

            if($yaz["total"]==""){$hz=0;}
            else{$hz=$yaz["total"];}
        }


        $dt=date('Y.07.01');
        $dt2=date('Y.07.31');

        $sor=mysql_query("SELECT SUM(total) AS total
        FROM tkn_mat_orders
        Where date>='$dt' and date<='$dt2' ");
        While($yaz=mysql_fetch_array($sor)){

            if($yaz["total"]==""){$tm=0;}
            else{$tm=$yaz["total"];}
        }



        $dt=date('Y.08.01');
        $dt2=date('Y.08.31');

        $sor=mysql_query("SELECT SUM(total) AS total
        FROM tkn_mat_orders
        Where date>='$dt' and date<='$dt2' ");
        While($yaz=mysql_fetch_array($sor)){

            if($yaz["total"]==""){$ag=0;}
            else{$ag=$yaz["total"];}
        }



        $dt=date('Y.09.01');
        $dt2=date('Y.09.30');

        $sor=mysql_query("SELECT SUM(total) AS total
        FROM tkn_mat_orders
        Where date>='$dt' and date<='$dt2' ");
        While($yaz=mysql_fetch_array($sor)){

            if($yaz["total"]==""){$ey=0;}
            else{$ey=$yaz["total"];}
        }




        $dt=date('Y.10.01');
        $dt2=date('Y.10.31');

        $sor=mysql_query("SELECT SUM(total) AS total
        FROM tkn_mat_orders
        Where date>='$dt' and date<='$dt2' ");
        While($yaz=mysql_fetch_array($sor)){

            if($yaz["total"]==""){$ek=0;}
            else{$ek=$yaz["total"];}
        }


        $dt=date('Y.11.01');
        $dt2=date('Y.11.30');

        $sor=mysql_query("SELECT SUM(total) AS total
        FROM tkn_mat_orders
        Where date>='$dt' and date<='$dt2' ");
        While($yaz=mysql_fetch_array($sor)){

            if($yaz["total"]==""){$ks=0;}
            else{$ks=$yaz["total"];}
        }



        $dt=date('Y.12.01');
        $dt2=date('Y.12.31');

        $sor=mysql_query("SELECT SUM(total) AS total
        FROM tkn_mat_orders
        Where date>='$dt' and date<='$dt2' ");
        While($yaz=mysql_fetch_array($sor)){

            if($yaz["total"]==""){$ar=0;}
            else{$ar=$yaz["total"];}
        }





        return $dizi = array($oc,$sb,$ma,$ns,$my,$hz,$tm,$ag,$ey,$ek,$ks,$ar);




    }





    function order_stats_year_topval()
    {
        $dt=date('Y.01.01');
        $dt2=date('Y.01.31');

        $sor=mysql_query("SELECT SUM(top_value) AS total
        FROM tkn_mat_orders
        Where date>='$dt' and date<='$dt2' ");
        While($yaz=mysql_fetch_array($sor)){
            if($yaz["total"]==""){$oc=0;}
            else{$oc=$yaz["total"];}
        }



        $dt=date('Y.02.01');
        $dt2=date('Y.02.29');

        $sor=mysql_query("SELECT SUM(top_value) AS total
        FROM tkn_mat_orders
        Where date>='$dt' and date<='$dt2' ");
        While($yaz=mysql_fetch_array($sor)){

            if($yaz["total"]==""){$sb=0;}
            else{$sb=$yaz["total"];}
        }


        $dt=date('Y.03.01');
        $dt2=date('Y.03.31');

        $sor=mysql_query("SELECT SUM(top_value) AS total
        FROM tkn_mat_orders
        Where date>='$dt' and date<='$dt2' ");
        While($yaz=mysql_fetch_array($sor)){

            if($yaz["total"]==""){$ma=0;}
            else{$ma=$yaz["total"];}
        }

        $dt=date('Y.04.01');
        $dt2=date('Y.04.30');

        $sor=mysql_query("SELECT SUM(top_value) AS total
        FROM tkn_mat_orders
        Where date>='$dt' and date<='$dt2' ");
        While($yaz=mysql_fetch_array($sor)){

            if($yaz["total"]==""){$ns=0;}
            else{$ns=$yaz["total"];}
        }



        $dt=date('Y.05.01');
        $dt2=date('Y.05.31');

        $sor=mysql_query("SELECT SUM(top_value) AS total
        FROM tkn_mat_orders
        Where date>='$dt' and date<='$dt2' ");
        While($yaz=mysql_fetch_array($sor)){

            if($yaz["total"]==""){$my=0;}
            else{$my=$yaz["total"];}
        }



        $dt=date('Y.06.01');
        $dt2=date('Y.06.30');

        $sor=mysql_query("SELECT SUM(top_value) AS total
        FROM tkn_mat_orders
        Where date>='$dt' and date<='$dt2' ");
        While($yaz=mysql_fetch_array($sor)){

            if($yaz["total"]==""){$hz=0;}
            else{$hz=$yaz["total"];}
        }


        $dt=date('Y.07.01');
        $dt2=date('Y.07.31');

        $sor=mysql_query("SELECT SUM(top_value) AS total
        FROM tkn_mat_orders
        Where date>='$dt' and date<='$dt2' ");
        While($yaz=mysql_fetch_array($sor)){

            if($yaz["total"]==""){$tm=0;}
            else{$tm=$yaz["total"];}
        }



        $dt=date('Y.08.01');
        $dt2=date('Y.08.31');

        $sor=mysql_query("SELECT SUM(top_value) AS total
        FROM tkn_mat_orders
        Where date>='$dt' and date<='$dt2' ");
        While($yaz=mysql_fetch_array($sor)){

            if($yaz["total"]==""){$ag=0;}
            else{$ag=$yaz["total"];}
        }



        $dt=date('Y.09.01');
        $dt2=date('Y.09.30');

        $sor=mysql_query("SELECT SUM(top_value) AS total
        FROM tkn_mat_orders
        Where date>='$dt' and date<='$dt2' ");
        While($yaz=mysql_fetch_array($sor)){

            if($yaz["total"]==""){$ey=0;}
            else{$ey=$yaz["total"];}
        }




        $dt=date('Y.10.01');
        $dt2=date('Y.10.31');

        $sor=mysql_query("SELECT SUM(top_value) AS total
        FROM tkn_mat_orders
        Where date>='$dt' and date<='$dt2' ");
        While($yaz=mysql_fetch_array($sor)){

            if($yaz["total"]==""){$ek=0;}
            else{$ek=$yaz["total"];}
        }


        $dt=date('Y.11.01');
        $dt2=date('Y.11.30');

        $sor=mysql_query("SELECT SUM(top_value) AS total
        FROM tkn_mat_orders
        Where date>='$dt' and date<='$dt2' ");
        While($yaz=mysql_fetch_array($sor)){

            if($yaz["total"]==""){$ks=0;}
            else{$ks=$yaz["total"];}
        }



        $dt=date('Y.12.01');
        $dt2=date('Y.12.31');

        $sor=mysql_query("SELECT SUM(top_value) AS total
        FROM tkn_mat_orders
        Where date>='$dt' and date<='$dt2' ");
        While($yaz=mysql_fetch_array($sor)){

            if($yaz["total"]==""){$ar=0;}
            else{$ar=$yaz["total"];}
        }





        return $dizi = array($oc,$sb,$ma,$ns,$my,$hz,$tm,$ag,$ey,$ek,$ks,$ar);




    }







    function order_stats_year_new_users()
    {

        $dt=date('Y.01.01');
        $dt2=date('Y.01.31');

        $sor=mysql_query("SELECT *
        FROM tkn_mat_users
        Where register_date>='$dt' and register_date<='$dt2'");

        $oc=mysql_num_rows($sor);



        $dt=date('Y.02.01');
        $dt2=date('Y.02.29');

        $sor=mysql_query("SELECT id
        FROM tkn_mat_users
        Where register_date>='$dt' and register_date<='$dt2'");

        $sb=mysql_num_rows($sor);


        $dt=date('Y.03.01');
        $dt2=date('Y.03.31');

        $sor=mysql_query("SELECT id
        FROM tkn_mat_users
        Where register_date>='$dt' and register_date<='$dt2'");

        $ma=mysql_num_rows($sor);

        $dt=date('Y.04.01');
        $dt2=date('Y.04.30');

        $sor=mysql_query("SELECT id
        FROM tkn_mat_users
        Where register_date>='$dt' and register_date<='$dt2'");

        $ns=mysql_num_rows($sor);



        $dt=date('Y.05.01');
        $dt2=date('Y.05.31');

        $sor=mysql_query("SELECT id
        FROM tkn_mat_users
        Where register_date>='$dt' and register_date<='$dt2'");

        $my=mysql_num_rows($sor);



        $dt=date('Y.06.01');
        $dt2=date('Y.06.30');

        $sor=mysql_query("SELECT id
        FROM tkn_mat_users
        Where register_date>='$dt' and register_date<='$dt2'");

        $hz=mysql_num_rows($sor);


        $dt=date('Y.07.01');
        $dt2=date('Y.07.31');

        $sor=mysql_query("SELECT id
        FROM tkn_mat_users
        Where register_date>='$dt' and register_date<='$dt2'");

        $tm=mysql_num_rows($sor);


        $dt=date('Y.08.01');
        $dt2=date('Y.08.31');

        $sor=mysql_query("SELECT id
        FROM tkn_mat_users
        Where register_date>='$dt' and register_date<='$dt2'");

        $ag=mysql_num_rows($sor);



        $dt=date('Y.09.01');
        $dt2=date('Y.09.30');

        $sor=mysql_query("SELECT id
        FROM tkn_mat_users
        Where register_date>='$dt' and register_date<='$dt2'");

        $ey=mysql_num_rows($sor);




        $dt=date('Y.10.01');
        $dt2=date('Y.10.31');

        $sor=mysql_query("SELECT id
        FROM tkn_mat_users
        Where register_date>='$dt' and register_date<='$dt2'");

        $ek=mysql_num_rows($sor);


        $dt=date('Y.11.01');
        $dt2=date('Y.11.30');

        $sor=mysql_query("SELECT id
        FROM tkn_mat_users
        Where register_date>='$dt' and register_date<='$dt2'");

        $ks=mysql_num_rows($sor);


        $dt=date('Y.12.01');
        $dt2=date('Y.12.31');

        $sor=mysql_query("SELECT id
        FROM tkn_mat_users
        Where register_date>='$dt' and register_date<='$dt2'");

        $ar=mysql_num_rows($sor);




        return $dizi = array($oc,$sb,$ma,$ns,$my,$hz,$tm,$ag,$ey,$ek,$ks,$ar);

    }






    function order_stats_year_visitors()
    {

        $dt=date('Y.01.01');
        $dt2=date('Y.01.31');

        $sor=mysql_query("SELECT id
        FROM tkn_mat_visitors
        Where date>='$dt' and date<='$dt2'");

             $oc=mysql_num_rows($sor);





        $dt=date('Y.02.01');
        $dt2=date('Y.02.29');

        $sor=mysql_query("SELECT id
        FROM tkn_mat_visitors
        Where date>='$dt' and date<='$dt2'");

            $sb=mysql_num_rows($sor);




        $dt=date('Y.03.01');
        $dt2=date('Y.03.31');

        $sor=mysql_query("SELECT id
        FROM tkn_mat_visitors
        Where date>='$dt' and date<='$dt2'");

            $ma=mysql_num_rows($sor);



        $dt=date('Y.04.01');
        $dt2=date('Y.04.30');

        $sor=mysql_query("SELECT id
        FROM tkn_mat_visitors
        Where date>='$dt' and date<='$dt2'");

            $ns=mysql_num_rows($sor);





        $dt=date('Y.05.01');
        $dt2=date('Y.05.31');

        $sor=mysql_query("SELECT id
        FROM tkn_mat_visitors
        Where date>='$dt' and date<='$dt2'");

            $my=mysql_num_rows($sor);





        $dt=date('Y.06.01');
        $dt2=date('Y.06.30');

        $sor=mysql_query("SELECT id
        FROM tkn_mat_visitors
        Where date>='$dt' and date<='$dt2'");

            $hz=mysql_num_rows($sor);




        $dt=date('Y.07.01');
        $dt2=date('Y.07.31');

        $sor=mysql_query("SELECT id
        FROM tkn_mat_visitors
        Where date>='$dt' and date<='$dt2'");

            $tm=mysql_num_rows($sor);





        $dt=date('Y.08.01');
        $dt2=date('Y.08.31');

        $sor=mysql_query("SELECT id
        FROM tkn_mat_visitors
        Where date>='$dt' and date<='$dt2'");

            $ag=mysql_num_rows($sor);





        $dt=date('Y.09.01');
        $dt2=date('Y.09.30');

        $sor=mysql_query("SELECT id
        FROM tkn_mat_visitors
        Where date>='$dt' and date<='$dt2'");

            $ey=mysql_num_rows($sor);






        $dt=date('Y.10.01');
        $dt2=date('Y.10.31');

        $sor=mysql_query("SELECT id
        FROM tkn_mat_visitors
        Where date>='$dt' and date<='$dt2'");

            $ek=mysql_num_rows($sor);




        $dt=date('Y.11.01');
        $dt2=date('Y.11.30');

        $sor=mysql_query("SELECT id
        FROM tkn_mat_visitors
        Where date>='$dt' and date<='$dt2'");

            $ks=mysql_num_rows($sor);





        $dt=date('Y.12.01');
        $dt2=date('Y.12.31');

        $sor=mysql_query("SELECT id
        FROM tkn_mat_visitors
        Where date>='$dt' and date<='$dt2'");

            $ar=mysql_num_rows($sor);







        return $dizi = array($oc,$sb,$ma,$ns,$my,$hz,$tm,$ag,$ey,$ek,$ks,$ar);

    }





    function order_stats_year_order_total()
    {

        $dt=date('Y.01.01');
        $dt2=date('Y.01.31');

        $sor=mysql_query("SELECT SUM(total) AS total
        FROM tkn_mat_orders
        Where date>='$dt' and date<='$dt2'");
        While($yaz=mysql_fetch_array($sor)){
            if($yaz["total"]==""){$oc=0;}
            else{$oc=$yaz["total"];}
        }



        $dt=date('Y.02.01');
        $dt2=date('Y.02.29');

        $sor=mysql_query("SELECT SUM(total) AS total
        FROM tkn_mat_orders
        Where date>='$dt' and date<='$dt2'");
        While($yaz=mysql_fetch_array($sor)){

            if($yaz["total"]==""){$sb=0;}
            else{$sb=$yaz["total"];}
        }


        $dt=date('Y.03.01');
        $dt2=date('Y.03.31');

        $sor=mysql_query("SELECT SUM(total) AS total
        FROM tkn_mat_orders
        Where date>='$dt' and date<='$dt2'");
        While($yaz=mysql_fetch_array($sor)){

            if($yaz["total"]==""){$ma=0;}
            else{$ma=$yaz["total"];}
        }

        $dt=date('Y.04.01');
        $dt2=date('Y.04.30');

        $sor=mysql_query("SELECT SUM(total) AS total
        FROM tkn_mat_orders
        Where date>='$dt' and date<='$dt2'");
        While($yaz=mysql_fetch_array($sor)){

            if($yaz["total"]==""){$ns=0;}
            else{$ns=$yaz["total"];}
        }



        $dt=date('Y.05.01');
        $dt2=date('Y.05.31');

        $sor=mysql_query("SELECT SUM(total) AS total
        FROM tkn_mat_orders
        Where date>='$dt' and date<='$dt2'");
        While($yaz=mysql_fetch_array($sor)){

            if($yaz["total"]==""){$my=0;}
            else{$my=$yaz["total"];}
        }



        $dt=date('Y.06.01');
        $dt2=date('Y.06.30');

        $sor=mysql_query("SELECT SUM(total) AS total
        FROM tkn_mat_orders
        Where date>='$dt' and date<='$dt2'");
        While($yaz=mysql_fetch_array($sor)){

            if($yaz["total"]==""){$hz=0;}
            else{$hz=$yaz["total"];}
        }


        $dt=date('Y.07.01');
        $dt2=date('Y.07.31');

        $sor=mysql_query("SELECT SUM(total) AS total
        FROM tkn_mat_orders
        Where date>='$dt' and date<='$dt2'");
        While($yaz=mysql_fetch_array($sor)){

            if($yaz["total"]==""){$tm=0;}
            else{$tm=$yaz["total"];}
        }



        $dt=date('Y.08.01');
        $dt2=date('Y.08.31');

        $sor=mysql_query("SELECT SUM(total) AS total
        FROM tkn_mat_orders
        Where date>='$dt' and date<='$dt2'");
        While($yaz=mysql_fetch_array($sor)){

            if($yaz["total"]==""){$ag=0;}
            else{$ag=$yaz["total"];}
        }



        $dt=date('Y.09.01');
        $dt2=date('Y.09.30');

        $sor=mysql_query("SELECT SUM(total) AS total
        FROM tkn_mat_orders
        Where date>='$dt' and date<='$dt2'");
        While($yaz=mysql_fetch_array($sor)){

            if($yaz["total"]==""){$ey=0;}
            else{$ey=$yaz["total"];}
        }




        $dt=date('Y.10.01');
        $dt2=date('Y.10.31');

        $sor=mysql_query("SELECT SUM(total) AS total
        FROM tkn_mat_orders
        Where date>='$dt' and date<='$dt2'");
        While($yaz=mysql_fetch_array($sor)){

            if($yaz["total"]==""){$ek=0;}
            else{$ek=$yaz["total"];}
        }


        $dt=date('Y.11.01');
        $dt2=date('Y.11.30');

        $sor=mysql_query("SELECT SUM(total) AS total
        FROM tkn_mat_orders
        Where date>='$dt' and date<='$dt2'");
        While($yaz=mysql_fetch_array($sor)){

            if($yaz["total"]==""){$ks=0;}
            else{$ks=$yaz["total"];}
        }



        $dt=date('Y.12.01');
        $dt2=date('Y.12.31');

        $sor=mysql_query("SELECT SUM(total) AS total
        FROM tkn_mat_orders
        Where date>='$dt' and date<='$dt2'");
        While($yaz=mysql_fetch_array($sor)){

            if($yaz["total"]==""){$ar=0;}
            else{$ar=$yaz["total"];}
        }





        return $dizi = array($oc,$sb,$ma,$ns,$my,$hz,$tm,$ag,$ey,$ek,$ks,$ar);

    }



    function waiting_order()
{

    $sql = "SELECT * from tkn_mat_orders Where order_status=0";

    $query = $this->db->query($sql);

    return $query->num_rows();


}


    function making_order()
    {

        $sql = "SELECT * from tkn_mat_orders Where order_status=1";

        $query = $this->db->query($sql);

        return $query->num_rows();


    }


    function finishing_order()
    {

        $sql = "SELECT * from tkn_mat_orders Where order_status=2";

        $query = $this->db->query($sql);

        return $query->num_rows();


    }


    function rejected_order()
    {

        $sql = "SELECT * from tkn_mat_orders Where order_status=3";

        $query = $this->db->query($sql);

        return $query->num_rows();


    }




    function last_orders()
    {
       // $sql = "SELECT * FROM tkn_mat_orders ";

        $sql = " SELECT tkn_mat_orders.sid,tkn_mat_orders.user_id,tkn_mat_orders.product_id,tkn_mat_orders.date,tkn_mat_orders.total,
        tkn_mat_users.username,tkn_mat_products.product_name,tkn_mat_users.company_name,tkn_mat_orders.order_status

FROM tkn_mat_orders
INNER JOIN tkn_mat_users ON tkn_mat_orders.user_id = tkn_mat_users.id
INNER JOIN tkn_mat_products ON tkn_mat_orders.product_id = tkn_mat_products.id
order by date desc limit 0 , 8
";



        $query = $this->db->query($sql);

        if( $query->num_rows() > 0 )
        {
            return $query->result_array();
        }
        else
        {
            return FALSE;
        }
    }










//Arama Modülleri


    function search_announce($search)
    {


        $sql = "SELECT *  FROM tkn_mat_announcement WHERE (content LIKE '%" .
            $search . "%' OR header LIKE '%" . $search ."%')";


        $query = $this->db->query($sql);

        if( $query->num_rows() > 0 )
        {
            return $query->result_array();
        }
        else
        {
            return FALSE;
        }


    }


    function search_bank($search)
    {


        $sql = "SELECT *  FROM tkn_mat_bank WHERE (name LIKE '%" .
            $search . "%' OR info LIKE '%" . $search ."%')";


        $query = $this->db->query($sql);

        if( $query->num_rows() > 0 )
        {
            return $query->result_array();
        }
        else
        {
            return FALSE;
        }


    }





    function search_categories($search)
    {


        $sql = "SELECT *  FROM tkn_mat_categories WHERE (cat_name LIKE '%" .
            $search . "%' )";


        $query = $this->db->query($sql);

        if( $query->num_rows() > 0 )
        {
            return $query->result_array();
        }
        else
        {
            return FALSE;
        }


    }







    function search_contact($search)
    {


        $sql = "SELECT *  FROM tkn_mat_contact WHERE (name LIKE '%" .
            $search . "%'  OR email LIKE '%" . $search ."%'
             OR subject LIKE '%" . $search ."%'
              OR message LIKE '%" . $search ."%')";


        $query = $this->db->query($sql);

        if( $query->num_rows() > 0 )
        {
            return $query->result_array();
        }
        else
        {
            return FALSE;
        }


    }





    function search_products($search)
    {


        $sql = "SELECT *  FROM tkn_mat_products WHERE (product_name LIKE '%" .
            $search . "%'  OR attribute LIKE '%" . $search ."%'
             )";


        $query = $this->db->query($sql);

        if( $query->num_rows() > 0 )
        {
            return $query->result_array();
        }
        else
        {
            return FALSE;
        }


    }







    function search_survey($search)
    {


        $sql = "SELECT *  FROM tkn_mat_survey WHERE (question LIKE '%" .
            $search . "%'  OR survey_option_1 LIKE '%" . $search ."%'
             OR survey_option_2 LIKE '%" . $search ."%'
             OR survey_option_3 LIKE '%" . $search ."%'
             OR survey_option_4 LIKE '%" . $search ."%'
             OR survey_option_5 LIKE '%" . $search ."%'
              OR survey_option_6 LIKE '%" . $search ."%'
             )";


        $query = $this->db->query($sql);

        if( $query->num_rows() > 0 )
        {
            return $query->result_array();
        }
        else
        {
            return FALSE;
        }


    }





    function search_ticket($search)
    {


        $sql = "SELECT *  FROM tkn_mat_ticket WHERE (header LIKE '%" .
            $search . "%'  OR message LIKE '%" . $search ."%'

             )";


        $query = $this->db->query($sql);

        if( $query->num_rows() > 0 )
        {
            return $query->result_array();
        }
        else
        {
            return FALSE;
        }


    }



    function search_users($search)
    {


        $sql = "SELECT *  FROM tkn_mat_users WHERE (company_name LIKE '%" .
            $search . "%'  OR author LIKE '%" . $search ."%'
             OR invoice_adress LIKE '%" . $search ."%'
              OR installment_adress LIKE '%" . $search ."%'
             )";


        $query = $this->db->query($sql);

        if( $query->num_rows() > 0 )
        {
            return $query->result_array();
        }
        else
        {
            return FALSE;
        }


    }



    function search_msg($search,$id)
    {


        $sql = "SELECT *  FROM tkn_mat_ticket WHERE (header LIKE '%" .
            $search . "%'  OR message LIKE '%" . $search ."%'
             )";


        $query = $this->db->query($sql);

        if( $query->num_rows() > 0 )
        {
            return $query->result_array();
        }
        else
        {
            return FALSE;
        }


    }
















}
?>