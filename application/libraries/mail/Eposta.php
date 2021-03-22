<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Eposta {



	function header(){


$icerik='<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>BlueEye - Email</title>


<style>
body{

margin: 0;
padding: 0;
font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif;
color: #212325;

}
a {
color: #1A73E8;
text-decoration: none;
}
p.divider {
margin: .25rem 0;
border-top: 1px solid rgba(0,0,0,.13);

}
.container{
width: 100%;
height: 724px;
margin: 0 auto;
position: relative;

}
@media (min-width: 640px) {
.container{
width: 600px;

}
}
.top-header{
background-color: #1a2b49;
color: white;
min-height: 23px;
border-top-right-radius: 6px;
border-top-left-radius: 6px;
padding: 1rem;
}
.top-header a{
color: #8ab4f8;
font-weight: 500;
}
.top-header p{
float: right;
line-height:1.7;
}
.bottom-footer {
background-color: #1a2b49;
color: white;
border-bottom-right-radius: 6px;
border-bottom-left-radius: 6px;
padding: 1rem;
padding-bottom: .5rem;
font-weight: 500;
}
.bottom-footer a{
color: #8ab4f8;
}
.bottom-footer .divider{
border-color: #5f6368;
}
.bottom-footer p{
margin: 0;
margin-bottom: 1rem;
}
.text-center {
text-align: center;
margin-bottom: 0 !important;
}
.top-header h3,
.top-header p,
.main-inner h4,
.prdctMain__text h3{
margin: 0;
padding: 0;
}
.main-inner {
padding: 5rem 0;
}
.main-inner h4 {
padding-bottom: .5rem;
border-bottom: 1px solid rgba(0,0,0,.13);
}
.prdctMain {

margin-top: 1rem;
}
.prdctMain__left {
float: left;
}
.prdctMain__text {
text-align: left;
}
.prdctMain__image{
width: 150px;
height: 100px;
display: block;
border-radius: 4px;
margin-right: 1rem;
}
.prdctMain__text p{

font-weight: 500;
margin: .5rem 0;
}
.prdctMain__text p span {
color: #5f6368;
}
@media (max-width: 600px) {
table {
width: 100%;
text-align: center;
}
td {
display: table-caption;
width: 100%;

}
.prdctMain__image {
width: 350px;
height: 200px;
margin: 0 auto;
}
.main-inner {
padding: 2rem 1rem;
}
.prdctMain__text {
margin-top: 1rem;
}
}
@media (max-width: 400px) {
.prdctMain__image {
width: 300px;
height: 200px;
margin: 0 auto;
}
}
</style>
</head>
<body>
	<main>
		<div class="container">
			<div class="top-header">
				<h3 style="text-align: center;">
					<span style="
					background-image: url('.base_url().'assets/email_assets/logo.png); 
					width: 30px; 
					height: 30px;
					display: inline-block;
					background-position: center;
					background-size: contain;
					background-repeat: no-repeat;
					vertical-align: bottom;
					"></span> 
					BlueEye Company
				</h3>
			</div>
			<div class="main-inner" style="text-align: center;">';
				
	return $icerik;

	}

	function footer(){

			
			$icerik='</div>
			<div class="bottom-footer">
				<p>
					<span>Address: </span>
					<a href="https://goo.gl/maps/SB76ZH7YsDv">
						Kağnı Yolu Sk., 50180 Göreme Belediyesi/Nevşehir Merkez/Nevşehir
					</a>
				</p>
				<p>
					<span>Mail: </span>
					<a href="mailto:info@blueeyetour.com">info@blueeyetour.com</a>
				</p>
				<p>
					<span>Phone: </span>
					<a href="tel:+905435052677">+90 (543)505 26-77</a>
				</p>
			</div>
		</div>
	</main>
</body>
</html>';
	return $icerik;		
	}

function kayit($url,$isim,$kl,$sf,$em)
{

include("class.phpmailer.php");

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug = 1; // hata ayiklama: 1 = hata ve mesaj, 2 = sadece mesaj
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
$mail->Host = 'smtp.yandex.ru';
$mail->Port = 465;
$mail->IsHTML(true);
$mail->SetLanguage("tr", "phpmailer/language");
$mail->CharSet  ="utf-8";
$mail->Username = "info@blueeyetour.com"; // Mail adresimizin kullanicı adi
$mail->Password = "123456be"; // Mail adresimizin sifresi
//$mail->SetFrom("Saray Mefruşat İletişim Formu", "aaaa"); // Mail attigimizda gorulecek ismimiz

$mail->SetFrom("info@blueeyetour.com");
$mail->addReplyTo("info@blueeyetour.com");

//$mail->AddAddress("yocalmis@gmail.com"); // Maili gonderecegimiz kisi yani alici
//$mail->AddAddress("kayhan@saraymefrusat.com"); // Maili gonderecegimiz kisi yani alici
//$mail->AddAddress("yocalmis@gmail.com"); // Maili gonderecegimiz kisi yani alici
$mail->AddAddress($em); // Maili gonderecegimiz kisi yani alici
$mail->AddAddress("info@blueeyetour.com");
$mail->AddAddress("omarcappadocia@icloud.com");

$mail->Subject = "Please active your Blue Eye membership."; // Konu basligi

	$icerik = $this->header();		

	$icerik.= '<p style="margin: 0 0 16px 0; display: block;">
				<span style="font-size: 24px"><b>Dear Sir/Madam</b></span>
				<br>
				<br>
				<span>Thank you for subscribing to the Blue Eye Tour.</span>
				<br>
				<span>You must <b>activate</b> your <a href="https://www.blueeyetour.com">Blue Eye</a> membership.</span>
				<br>
				<span>Please press the button below to activate.</span>
				<br>
				<br>

				<b><a href="'.$url.'giris/success/'.$sf.'" style="
				background-color: #1a2b49;
				color: white;
				padding: 10px 20px;
				border-radius: 4px;
				font-size: 16px;
				display: inline-block;
				margin: 0 auto;
				">Confirm email adress</a></b>
			</p>'; // Mailin icerigi
				
	$icerik .= $this->footer();		
	


$mail->Body = $icerik; // Mailin icerigi

if(!$mail->Send()){
	return FALSE;
} else {
	return TRUE;
}




}









function new_pass($url,$pass,$email)
{


include("class.phpmailer.php");

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug = 1; // hata ayiklama: 1 = hata ve mesaj, 2 = sadece mesaj
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
$mail->Host = 'smtp.yandex.ru';
$mail->Port = 465;
$mail->IsHTML(true);
$mail->SetLanguage("tr", "phpmailer/language");
$mail->CharSet  ="utf-8";
$mail->Username = "info@blueeyetour.com"; // Mail adresimizin kullanicı adi
$mail->Password = "123456be"; // Mail adresimizin sifresi
//$mail->SetFrom("Saray Mefruşat İletişim Formu", "aaaa"); // Mail attigimizda gorulecek ismimiz

$mail->SetFrom("info@blueeyetour.com");
$mail->addReplyTo("info@blueeyetour.com");

//$mail->AddAddress("yocalmis@gmail.com"); // Maili gonderecegimiz kisi yani alici
//$mail->AddAddress("kayhan@saraymefrusat.com"); // Maili gonderecegimiz kisi yani alici
//$mail->AddAddress("yocalmis@gmail.com"); // Maili gonderecegimiz kisi yani alici
$mail->AddAddress($email); // Maili gonderecegimiz kisi yani alici
$mail->Subject = "Blue Eye Şifre Yenileme"; // Konu basligi


	$icerik = $this->header();		

	$icerik.= "<b><br><br>Blue Eye şifrenizi yenilemek için <br>
<a href='".$url."giris/new_pass_success/".$pass."'>tıklayınız</a>.</b>" ; // Mailin icerigi
				
	$icerik .= $this->footer();	


$mail->Body = $icerik; // Mailin icerigi
if(!$mail->Send()){
	return FALSE;
} else {
	return TRUE;
}




}







function iletisim_gonder($nm,$em,$ms)
{


include("class.phpmailer.php");

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug = 1; // hata ayiklama: 1 = hata ve mesaj, 2 = sadece mesaj
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
$mail->Host = 'smtp.yandex.ru';
$mail->Port = 465;
$mail->IsHTML(true);
$mail->SetLanguage("tr", "phpmailer/language");
$mail->CharSet  ="utf-8";
$mail->Username = "info@blueeyetour.com"; // Mail adresimizin kullanicı adi
$mail->Password = "123456be"; // Mail adresimizin sifresi
//$mail->SetFrom("Saray Mefruşat İletişim Formu", "aaaa"); // Mail attigimizda gorulecek ismimiz

$mail->SetFrom("info@blueeyetour.com");
$mail->addReplyTo("info@blueeyetour.com");

//$mail->AddAddress("yocalmis@gmail.com"); // Maili gonderecegimiz kisi yani alici
//$mail->AddAddress("kayhan@saraymefrusat.com"); // Maili gonderecegimiz kisi yani alici
//$mail->AddAddress("yocalmis@gmail.com"); // Maili gonderecegimiz kisi yani alici
//$mail->AddAddress("yocalmis@gmail.com"); // Maili gonderecegimiz kisi yani alici
$mail->AddAddress("info@blueeyetour.com"); // Maili gonderecegimiz kisi yani alici

$mail->Subject = "Yeni İletişim Mesajı"; // Konu basligi


	$icerik = $this->header();		

	$icerik.= "<b><br><br>Kimden: ".$nm."
<br><br>E-Posta: ".$em."
<br><br>Mesaj: ".$ms."</b>" ; // Mailin icerigi
				
	$icerik .= $this->footer();	




$mail->Body = $icerik; // Mailin icerigi
if(!$mail->Send()){
	return FALSE;
} else {
	return TRUE;
}




}




function musaitlik($urun,$kul,$adi,$em,$soru,$seo)
{


include("class.phpmailer.php");

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug = 1; // hata ayiklama: 1 = hata ve mesaj, 2 = sadece mesaj
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
$mail->Host = 'smtp.yandex.ru';
$mail->Port = 465;
$mail->IsHTML(true);
$mail->SetLanguage("tr", "phpmailer/language");
$mail->CharSet  ="utf-8";
$mail->Username = "info@blueeyetour.com"; // Mail adresimizin kullanicı adi
$mail->Password = "123456be"; // Mail adresimizin sifresi
//$mail->SetFrom("Saray Mefruşat İletişim Formu", "aaaa"); // Mail attigimizda gorulecek ismimiz

$mail->SetFrom("info@blueeyetour.com");
$mail->addReplyTo("info@blueeyetour.com");

//$mail->AddAddress("yocalmis@gmail.com"); // Maili gonderecegimiz kisi yani alici
//$mail->AddAddress("kayhan@saraymefrusat.com"); // Maili gonderecegimiz kisi yani alici
//$mail->AddAddress("yocalmis@gmail.com"); // Maili gonderecegimiz kisi yani alici
//$mail->AddAddress("yocalmis@gmail.com"); // Maili gonderecegimiz kisi yani alici
$mail->AddAddress("info@blueeyetour.com"); // Maili gonderecegimiz kisi yani alici
$mail->Subject = "İletişim Mesajı:Bilgi İsteniyor"; // Konu basligi


	$icerik = $this->header();		

	$icerik.= "<b><br><br>Kimden: ".$em."
<br><br>Ürün: ".$urun."
<br><br>Kullanıcı Adı: ".$kul."
<br><br>Adı: ".$adi."
<br><br>Mesaj: ".$soru."</b>" ; // Mailin icerigi
				
	$icerik .= $this->footer();	




$mail->Body = $icerik; // Mailin icerigi
if(!$mail->Send()){
	return FALSE;
} else {
	return TRUE;
}




}











function rez_gonder()
{


include("class.phpmailer.php");

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug = 1; // hata ayiklama: 1 = hata ve mesaj, 2 = sadece mesaj
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
$mail->Host = 'smtp.yandex.ru';
$mail->Port = 465;
$mail->IsHTML(true);
$mail->SetLanguage("tr", "phpmailer/language");
$mail->CharSet  ="utf-8";
$mail->Username = "info@blueeyetour.com"; // Mail adresimizin kullanicı adi
$mail->Password = "123456be"; // Mail adresimizin sifresi
//$mail->SetFrom("Saray Mefruşat İletişim Formu", "aaaa"); // Mail attigimizda gorulecek ismimiz

$mail->SetFrom("info@blueeyetour.com");
$mail->addReplyTo("info@blueeyetour.com");

//$mail->AddAddress("yocalmis@gmail.com"); // Maili gonderecegimiz kisi yani alici
//$mail->AddAddress("kayhan@saraymefrusat.com"); // Maili gonderecegimiz kisi yani alici
//$mail->AddAddress("yocalmis@gmail.com"); // Maili gonderecegimiz kisi yani alici
$mail->AddAddress("info@blueeyetour.com"); // Maili gonderecegimiz kisi yani alici
$mail->Subject = "Ön Rezervasyon Yapıldı Kontrol ediniz"; // Konu basligi


	$icerik = $this->header();		

	$icerik.= "Yeni Ön rezervasyon kaydını incelemek ve onaylamak için<a href='".base_url()."admin/admin'>Tıklayın</a>" ; // Mailin icerigi
				
	$icerik .= $this->footer();	



$mail->Body =  $icerik; // Mailin icerigi
if(!$mail->Send()){
	return FALSE;
} else {
	return TRUE;
}




}







function supplier_gonder($sirket_name,$acenta_unvan,$tursab_no,$yetkili_isim,$email,$sirket_adres,
		  $sirket_sehir,$sirket_posta_no,$tel_no,$cep_no,$sirket_website)
{


include("class.phpmailer.php");

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug = 1; // hata ayiklama: 1 = hata ve mesaj, 2 = sadece mesaj
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
$mail->Host = 'smtp.yandex.ru';
$mail->Port = 465;
$mail->IsHTML(true);
$mail->SetLanguage("tr", "phpmailer/language");
$mail->CharSet  ="utf-8";
$mail->Username = "info@blueeyetour.com"; // Mail adresimizin kullanicı adi
$mail->Password = "123456be"; // Mail adresimizin sifresi
//$mail->SetFrom("Saray Mefruşat İletişim Formu", "aaaa"); // Mail attigimizda gorulecek ismimiz

$mail->SetFrom("info@blueeyetour.com");
$mail->addReplyTo("info@blueeyetour.com");

//$mail->AddAddress("yocalmis@gmail.com"); // Maili gonderecegimiz kisi yani alici
//$mail->AddAddress("kayhan@saraymefrusat.com"); // Maili gonderecegimiz kisi yani alici
//$mail->AddAddress("yocalmis@gmail.com"); // Maili gonderecegimiz kisi yani alici
$mail->AddAddress("info@blueeyetour.com"); // Maili gonderecegimiz kisi yani alici
$mail->Subject = "Blueeye Acenta Bilgi Formu"; // Konu basligi

	$icerik = $this->header();		

	$icerik.= "Şirket Adı: ".$sirket_name."<br>Acenta Ünvanı: ".$acenta_unvan."<br>Türsab No: ".$tursab_no
."<br>Yetkili İsim: ".$yetkili_isim."<br>E-Mail Adres: ".$email."<br>Şirket Adresi: 
".$sirket_adres."<br>Şirket Şehir: ".$sirket_sehir."<br>Şirket Posta Kodu: 
".$sirket_posta_no."<br>Telefon: ".$tel_no."<br>Cep Telefonu: ".$cep_no."<br>Web Sitesi: ".$sirket_website; // Mailin icerigi
				
	$icerik .= $this->footer();	



$mail->Body = $icerik; // Mailin icerigi
if(!$mail->Send()){
	return FALSE;
} else {
	return TRUE;
}




}







function kariyer_gonder($name_surname,$email,$address,$phone,$linkdln,
		  $facebook,$web,$twitter,$message,$hiddenExpLength,$hiddenEduLength,$ex_hidden_title,$ex_hidden_desc,$ex_hidden_company,$ex_hidden_loc,$ex_hidden_bas,$ex_hidden_bit,$edu_hidden_ins,$edu_hidden_ins_adr,$edu_hidden_major,$edu_hidden_degree,$edu_hidden_desc,$edu_hidden_bas,$edu_hidden_bit,$ex_hidden_title_var_mi,$edu_hidden_title_var_mi,$resimyol,$dosyayol)
{


	$body="<br><br>";
	$body.="Adı: ".$name_surname." <br><br>";
	$body.="E-Mail: ".$email." <br><br>";
	$body.="Adres: ".$address." <br><br>";
	$body.="Telefon: ".$phone." <br><br>";
	$body.="Linkedin: ".$linkdln." <br><br>";
	$body.="Facebook: ".$facebook." <br><br>";
	$body.="Twitter: ".$twitter." <br><br>";
	$body.="Web: ".$web." <br><br>";
	$body.="Mesaj: ".$message." <br><br><br><br>";
	if($resimyol){
	$body.="Resim: <a href='".$resimyol."'>Resmi Görüntüle</a> <br><br><br><br>";
}	if($dosyayol){
	$body.="Resim: <a href='".$dosyayol."'>Ek Dosya İndir</a> <br><br><br><br>";
}

	$body.="Tecrübeler: <br><br>";





if($ex_hidden_title_var_mi){

for($ex=0; $ex<=$hiddenExpLength; $ex++){
	$sira=$ex+1;
    $body.=$sira.". İş Tecrübesi<br>";
	$body.="Title: ".$ex_hidden_title[$ex]." <br>";
	$body.="Desc: ".$ex_hidden_desc[$ex]." <br>";
	$body.="Company: ".$ex_hidden_company[$ex]." <br>";
	$body.="Location: ".$ex_hidden_loc[$ex]." <br>";
	$body.="Başlangıç Tarihi: ".$ex_hidden_bas[$ex]." <br>";
	$body.="Bitiş Tarihi: ".$ex_hidden_bit[$ex]." <br><br>";

}}

else{
    $body.=" İş Tecrübesi bulunmuyor<br>";

}

	$body.="<br><br><br>Eğitim Bilgileri: <br><br>";

if($edu_hidden_title_var_mi){
for($edu=0; $edu<=$hiddenEduLength; $edu++){
	$sira=$edu+1;
    $body.=$sira.". Eğitim Bilgisi<br>";
	$body.="Enstitu: ".$edu_hidden_ins[$edu]." <br>";
	$body.="Location : ".$edu_hidden_ins_adr[$edu]." <br>";
	$body.="Major: ".$edu_hidden_major[$edu]." <br>";
	$body.="Degree: ".$edu_hidden_degree[$edu]." <br>";
	$body.="Desc: ".$edu_hidden_desc[$edu]." <br>";
	$body.="Başlangıç Tarihi: ".$edu_hidden_bas[$edu]." <br>";
	$body.="Bitiş Tarihi: ".$edu_hidden_bit[$edu]." <br><br>";

}
}

else{
    $body.="Eğtim bilgisi bulunmuyor<br>";

}


include("class.phpmailer.php");

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug = 1; // hata ayiklama: 1 = hata ve mesaj, 2 = sadece mesaj
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
$mail->Host = 'smtp.yandex.ru';
$mail->Port = 465;
$mail->IsHTML(true);
$mail->SetLanguage("tr", "phpmailer/language");
$mail->CharSet  ="utf-8";
$mail->Username = "info@blueeyetour.com"; // Mail adresimizin kullanicı adi
$mail->Password = "123456be"; // Mail adresimizin sifresi
//$mail->SetFrom("Saray Mefruşat İletişim Formu", "aaaa"); // Mail attigimizda gorulecek ismimiz

$mail->SetFrom("info@blueeyetour.com");
$mail->addReplyTo("info@blueeyetour.com");

//$mail->AddAddress("yocalmis@gmail.com"); // Maili gonderecegimiz kisi yani alici
//$mail->AddAddress("kayhan@saraymefrusat.com"); // Maili gonderecegimiz kisi yani alici
//$mail->AddAddress("yocalmis@gmail.com"); // Maili gonderecegimiz kisi yani alici
$mail->AddAddress("info@blueeyetour.com"); // Maili gonderecegimiz kisi yani alici
$mail->AddAddress("omarcappadocia@icloud.com");
$mail->Subject = "Blueeye Kariyer Formu"; // Konu basligi

	$icerik = $this->header();		

	$icerik.= $body; // Mailin icerigi
				
	$icerik .= $this->footer();	

$mail->Body = $icerik; // Mailin icerigi










if(!$mail->Send()){
	return FALSE;
} else {
	return TRUE;
}




}






function siparis_gonder($sip,$ep_getir)
{

$icerik='<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>BlueEye - Email</title>

<style>
body{

margin: 0;
padding: 0;
font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif;
color: #212325;

}
a {
color: #1A73E8;
text-decoration: none;
}
p.divider {
margin: .25rem 0;
border-top: 1px solid rgba(0,0,0,.13);

}
.container{
width: 100%;
height: 724px;
margin: 0 auto;
position: relative;

}
@media (min-width: 640px) {
.container{
width: 600px;

}
}
.top-header{
background-color: #1a2b49;
color: white;
min-height: 23px;
border-top-right-radius: 6px;
border-top-left-radius: 6px;
padding: 1rem;
}
.top-header a{
color: #8ab4f8;
font-weight: 500;
}
.top-header p{
float: right;
line-height:1.7;
}
.bottom-footer {
background-color: #1a2b49;
color: white;
border-bottom-right-radius: 6px;
border-bottom-left-radius: 6px;
padding: 1rem;
padding-bottom: .5rem;
font-weight: 500;
}
.bottom-footer a{
color: #8ab4f8;
}
.bottom-footer .divider{
border-color: #5f6368;
}
.bottom-footer p{
margin: 0;
margin-bottom: 1rem;
}
.text-center {
text-align: center;
margin-bottom: 0 !important;
}
.top-header h3,
.top-header p,
.main-inner h4,
.prdctMain__text h3{
margin: 0;
padding: 0;
}
.main-inner {
padding: 5rem 0;
}
.main-inner h4 {
padding-bottom: .5rem;
border-bottom: 1px solid rgba(0,0,0,.13);
}
.prdctMain {

margin-top: 1rem;
}
.prdctMain__left {
float: left;
}
.prdctMain__text {
text-align: left;
}
.prdctMain__image{
width: 150px;
height: 100px;
display: block;
border-radius: 4px;
margin-right: 1rem;
}
.prdctMain__text p{

font-weight: 500;
margin: .5rem 0;
}
.prdctMain__text p span {
color: #5f6368;
}
@media (max-width: 600px) {
table {
width: 100%;
text-align: center;
}
td {
display: table-caption;
width: 100%;

}
.prdctMain__image {
width: 350px;
height: 200px;
margin: 0 auto;
}
.main-inner {
padding: 2rem 1rem;
}
.prdctMain__text {
margin-top: 1rem;
}
}
@media (max-width: 400px) {
.prdctMain__image {
width: 300px;
height: 200px;
margin: 0 auto;
}
}
</style>
</head>
<body>
	<main>
		<div class="container">
			<div class="top-header">
				<h3 style="text-align: center;">
					<span style="
					background-image: url('.base_url().'assets/email_assets/logo.png); 
					width: 30px;
					height: 30px;
					display: inline-block;
					background-position: center;
					background-size: contain;
					background-repeat: no-repeat;
					vertical-align: bottom;
					"></span> 
					BlueEye Company
				</h3>
			</div>
			<div class="main-inner" style="text-align: center;">
				<h4 style="text-align: left;">Order Summary:</h4>';
				
				
			$n=0;	if( $sip ) :  foreach( $sip as $dizi ) : 
				
        
		
		$icerik.='


		<div class="prdctMain">
					<table>
						<tr>
							<td style="vertical-align: top;">
								<div class="prdctMain__left">
									<span class="prdctMain__image" 

									style="
									background-image: 
									url('.base_url().'assets/resimler/turlar/'.$dizi["resim"].');
									background-repeat: no-repeat;
									background-size: contain;
									background-position: center;

									"></span>
									<div class="prdctMain__text">

									</div>
								</div>
							</td>
							<td>
								<div class="prdctMain__text">
									<h3> '.$dizi["tur_adi"].'</h3>
									<p>
										<span>Category:</span> 
										<a href="#"> '.$dizi["category"].'</a>
									</p>
									<p>
										<span>Meeting point:</span> '.$dizi["meeting"].'
									</p>
									<p>
										<span>Start Date:</span> '.$dizi["bas_tar"].'
									</p>
									<p>
										<span>Start Time:</span> '.$dizi["bas_saat"].'
									</p>
									<p>
										<span>Duration:</span> '.$dizi["duration"].'
									</p>
									<p>
										<span>Details:</span> 
										'.$dizi["yetiskin"].' Adult 
										'.$dizi["cocuk"].' Child 
										'.$dizi["bebek"].' Baby
									</p>
									<p>
										<span>Rezervation Number:</span> 
										'.$dizi["rez_no"].'
									</p>
									<p>
										<span>Price:</span> 
										'.$dizi["price"].' €
									</p>
									<p>Payment: Paid</p>
								</div>
							</td>
						</tr>
					</table>
				</div>
				<p class="divider"></p>';
					
				$n=$n+1; endforeach;  endif; 		
				

				
			$icerik.='</div>
			<div class="bottom-footer">
				<p>
					<span>Address: </span>
					<a href="https://goo.gl/maps/SB76ZH7YsDv">
						Kağnı Yolu Sk., 50180 Göreme Belediyesi/Nevşehir Merkez/Nevşehir
					</a>
				</p>
				<p>
					<span>Mail: </span>
					<a href="mailto:info@blueeyetour.com">info@blueeyetour.com</a>
				</p>
				<p>
					<span>Phone: </span>
					<a href="tel:+905435052677">+90 (543)505 26-77</a>
				</p>
				<p class="divider"></p>
				<p class="text-center">
					Modification or cancellation please contact to Blue Eye Tour via email.
				</p>
			</div>
		</div>
	</main>
</body>
</html>';








include("class.phpmailer.php");

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug = 1; // hata ayiklama: 1 = hata ve mesaj, 2 = sadece mesaj
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
$mail->Host = 'smtp.yandex.ru';
$mail->Port = 465;
$mail->IsHTML(true);
$mail->SetLanguage("tr", "phpmailer/language");
$mail->CharSet  ="utf-8";
$mail->Username = "info@blueeyetour.com"; // Mail adresimizin kullanicı adi
$mail->Password = "123456be"; // Mail adresimizin sifresi
//$mail->SetFrom("Saray Mefruşat İletişim Formu", "aaaa"); // Mail attigimizda gorulecek ismimiz

$mail->SetFrom("info@blueeyetour.com");
$mail->addReplyTo("info@blueeyetour.com");

//$mail->AddAddress("yocalmis@gmail.com"); // Maili gonderecegimiz kisi yani alici
//$mail->AddAddress("kayhan@saraymefrusat.com"); // Maili gonderecegimiz kisi yani alici
//$mail->AddAddress("yocalmis@gmail.com"); // Maili gonderecegimiz kisi yani 
$mail->AddAddress($ep_getir);
$mail->AddAddress("info@blueeyetour.com");
$mail->AddAddress("omarcappadocia@icloud.com");

$mail->Subject = "Your reservation has been confirmed."; // Konu basligi
$mail->Body = $icerik; // Mailin icerigi
if(!$mail->Send()){
	return FALSE;
} else {
	return TRUE;
}




}












function on_rez_bilgi($bebek_adet,$yetiskin_adet,$cocuk_adet,$genel_total,$bas_t,$bit_t)
{


include("class.phpmailer.php");

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug = 1; // hata ayiklama: 1 = hata ve mesaj, 2 = sadece mesaj
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
$mail->Host = 'smtp.yandex.ru';
$mail->Port = 465;
$mail->IsHTML(true);
$mail->SetLanguage("tr", "phpmailer/language");
$mail->CharSet  ="utf-8";
$mail->Username = "info@blueeyetour.com"; // Mail adresimizin kullanicı adi
$mail->Password = "123456be"; // Mail adresimizin sifresi
//$mail->SetFrom("Saray Mefruşat İletişim Formu", "aaaa"); // Mail attigimizda gorulecek ismimiz

$mail->SetFrom("info@blueeyetour.com");
$mail->addReplyTo("info@blueeyetour.com");

//$mail->AddAddress("yocalmis@gmail.com"); // Maili gonderecegimiz kisi yani alici
//$mail->AddAddress("kayhan@saraymefrusat.com"); // Maili gonderecegimiz kisi yani alici
//$mail->AddAddress("yocalmis@gmail.com"); // Maili gonderecegimiz kisi yani alici
//$mail->AddAddress("yocalmis@gmail.com"); // Maili gonderecegimiz kisi yani alici
$mail->AddAddress("info@blueeyetour.com"); // Maili gonderecegimiz kisi yani alici
$mail->AddAddress("omarcappadocia@icloud.com");

$mail->Subject = "Yeni Ön Rezervasyhon Mesajı"; // Konu basligi

	$icerik = $this->header();		

	$icerik.= "Yeni Ön Rezervasyon kaydınız mevcut:
<br><br>Kişi adedi: Yetişkin".$yetiskin_adet." Çocuk".$cocuk_adet." Bebek".$bebek_adet."<br>
<br>Toplam: ".$genel_total."<br><br>Tarih Aralığı: ".$bas_t." - ".$bit_t; // Mailin icerigi
				
	$icerik .= $this->footer();	



$mail->Body = $icerik ; // Mailin icerigi


if(!$mail->Send()){
	return FALSE;
} else {
	return TRUE;
}




}





function kart_guncelle($eemail)
{


include("class.phpmailer.php");

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug = 1; // hata ayiklama: 1 = hata ve mesaj, 2 = sadece mesaj
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
$mail->Host = 'smtp.yandex.ru';
$mail->Port = 465;
$mail->IsHTML(true);
$mail->SetLanguage("tr", "phpmailer/language");
$mail->CharSet  ="utf-8";
$mail->Username = "info@blueeyetour.com"; // Mail adresimizin kullanicı adi
$mail->Password = "123456be"; // Mail adresimizin sifresi
//$mail->SetFrom("Saray Mefruşat İletişim Formu", "aaaa"); // Mail attigimizda gorulecek ismimiz

$mail->SetFrom("info@blueeyetour.com");
$mail->addReplyTo("info@blueeyetour.com");

//$mail->AddAddress("yocalmis@gmail.com"); // Maili gonderecegimiz kisi yani alici
//$mail->AddAddress("kayhan@saraymefrusat.com"); // Maili gonderecegimiz kisi yani alici
//$mail->AddAddress("yocalmis@gmail.com"); // Maili gonderecegimiz kisi yani alici
$mail->AddAddress($eemail); // Maili gonderecegimiz kisi yani alici
//$mail->AddAddress("info@blueeyetour.com"); // Maili gonderecegimiz kisi yani alici
//$mail->AddAddress("omarcappadocia@icloud.com");

$mail->Subject = "Please renew your credit card"; // Konu basligi

	$icerik = $this->header();		

	$icerik.= "<br><br>
Your credit card for the Blue Eye Tour payment failed.
Please renew your card.<br><br>
<a href='".base_url()."reservation'>Click </a> to refresh the card."; // Mailin icerigi
				
	$icerik .= $this->footer();	




$mail->Body = $icerik;


if(!$mail->Send()){
	return FALSE;
} else {
	return TRUE;
}




}






function kart_guncellendi($uid,$adi)
{


include("class.phpmailer.php");

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug = 1; // hata ayiklama: 1 = hata ve mesaj, 2 = sadece mesaj
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
$mail->Host = 'smtp.yandex.ru';
$mail->Port = 465;
$mail->IsHTML(true);
$mail->SetLanguage("tr", "phpmailer/language");
$mail->CharSet  ="utf-8";
$mail->Username = "info@blueeyetour.com"; // Mail adresimizin kullanicı adi
$mail->Password = "123456be"; // Mail adresimizin sifresi
//$mail->SetFrom("Saray Mefruşat İletişim Formu", "aaaa"); // Mail attigimizda gorulecek ismimiz

$mail->SetFrom("info@blueeyetour.com");
$mail->addReplyTo("info@blueeyetour.com");

//$mail->AddAddress("yocalmis@gmail.com"); // Maili gonderecegimiz kisi yani alici
//$mail->AddAddress("kayhan@saraymefrusat.com"); // Maili gonderecegimiz kisi yani alici
//$mail->AddAddress("yocalmis@gmail.com"); // Maili gonderecegimiz kisi yani alici
//$mail->AddAddress("yocalmis@gmail.com"); // Maili gonderecegimiz kisi yani alici
$mail->AddAddress("info@blueeyetour.com"); // Maili gonderecegimiz kisi yani alici
$mail->AddAddress("omarcappadocia@icloud.com");

$mail->Subject = "Blue Eye Tour Renewed credit card"; // Konu basligi

	$icerik = $this->header();		

	$icerik.= "<br><br>".$adi." has refreshed the card.
Please <a href='".base_url()."admin/admin/kart_detay/".$uid."''>check</a> the update."; // Mailin icerigi
				
	$icerik .= $this->footer();	



$mail->Body = $icerik;


if(!$mail->Send()){
	return FALSE;
} else {
	return TRUE;
}




}










function rez_iptal($array)
{


include("class.phpmailer.php");

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug = 1; // hata ayiklama: 1 = hata ve mesaj, 2 = sadece mesaj
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
$mail->Host = 'smtp.yandex.ru';
$mail->Port = 465;
$mail->IsHTML(true);
$mail->SetLanguage("tr", "phpmailer/language");
$mail->CharSet  ="utf-8";
$mail->Username = "info@blueeyetour.com"; // Mail adresimizin kullanicı adi
$mail->Password = "123456be"; // Mail adresimizin sifresi
//$mail->SetFrom("Saray Mefruşat İletişim Formu", "aaaa"); // Mail attigimizda gorulecek ismimiz

$mail->SetFrom("info@blueeyetour.com");
$mail->addReplyTo("info@blueeyetour.com");

//$mail->AddAddress("yocalmis@gmail.com"); // Maili gonderecegimiz kisi yani alici
//$mail->AddAddress("kayhan@saraymefrusat.com"); // Maili gonderecegimiz kisi yani alici
//$mail->AddAddress("yocalmis@gmail.com"); // Maili gonderecegimiz kisi yani alici
//$mail->AddAddress("yocalmis@gmail.com"); // Maili gonderecegimiz kisi yani alici
$mail->AddAddress("info@blueeyetour.com"); // Maili gonderecegimiz kisi yani alici
$mail->AddAddress("omarcappadocia@icloud.com");

$mail->Subject = "Blue Eye Tour Reservation cancelled"; // Konu basligi

	$icerik = $this->header();		

	$icerik.= "<br><br>
Please <a href='".base_url()."admin/admin/rezervasyon'>check</a> the reservation cancelled."; // Mailin icerigi
				
	$icerik .= $this->footer();	


$mail->Body = $icerik;


if(!$mail->Send()){
	return FALSE;
} else {
	return TRUE;
}




}





function rez_iptal_bildirim($mail)
{


include("class.phpmailer.php");

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug = 1; // hata ayiklama: 1 = hata ve mesaj, 2 = sadece mesaj
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
$mail->Host = 'smtp.yandex.ru';
$mail->Port = 465;
$mail->IsHTML(true);
$mail->SetLanguage("tr", "phpmailer/language");
$mail->CharSet  ="utf-8";
$mail->Username = "info@blueeyetour.com"; // Mail adresimizin kullanicı adi
$mail->Password = "123456be"; // Mail adresimizin sifresi
//$mail->SetFrom("Saray Mefruşat İletişim Formu", "aaaa"); // Mail attigimizda gorulecek ismimiz

$mail->SetFrom("info@blueeyetour.com");
$mail->addReplyTo("info@blueeyetour.com");

//$mail->AddAddress("yocalmis@gmail.com"); // Maili gonderecegimiz kisi yani alici
//$mail->AddAddress("kayhan@saraymefrusat.com"); // Maili gonderecegimiz kisi yani alici
//$mail->AddAddress("yocalmis@gmail.com"); // Maili gonderecegimiz kisi yani alici
//$mail->AddAddress("yocalmis@gmail.com"); // Maili gonderecegimiz kisi yani alici
$mail->AddAddress("info@blueeyetour.com"); // Maili gonderecegimiz kisi yani alici
$mail->AddAddress("omarcappadocia@icloud.com");

$mail->Subject = "Blue Eye Tour Reservation cancelled request confirmation"; // Konu basligi

	$icerik = $this->header();		

	$icerik.= "<br><br>Blue Eye Tour Reservation cancelled request confirmation<br>
Please <a href='".base_url()."reservation'>check</a> the reservation cancelled."; // Mailin icerigi
				
	$icerik .= $this->footer();	



$mail->Body = $icerik;


if(!$mail->Send()){
	return FALSE;
} else {
	return TRUE;
}




}









}


?>