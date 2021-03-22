<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reklam_mail {




function gonder($ep,$mail,$bas,$ice)
{


//include("class.phpmailer.php");
//$mail = new PHPMailer();

$parca=explode("-",$ep);
$mail_parca=explode("@",$parca[1]);

$ice.=$parca[0]."/".$mail_parca[0]."/".$mail_parca[1]."'>tıklayın</a>";

$mail->IsSMTP();
$mail->SMTPDebug = 1; // hata ayiklama: 1 = hata ve mesaj, 2 = sadece mesaj
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
$mail->Host = 'smtp.yandex.ru';
$mail->Port = 465;
$mail->IsHTML(true);
$mail->SetLanguage("tr", "phpmailer/language");
$mail->CharSet  ="utf-8";
$mail->Username = "noreply@blueeyetour.com"; // Mail adresimizin kullanicı adi
$mail->Password = "123456be"; // Mail adresimizin sifresi
//$mail->SetFrom("Saray Mefruşat İletişim Formu", "aaaa"); // Mail attigimizda gorulecek ismimiz

$mail->SetFrom("noreply@blueeyetour.com","Blue Eye Bilgilendirme");
$mail->addReplyTo("noreply@blueeyetour.com");

//$mail->AddAddress("yocalmis@gmail.com"); // Maili gonderecegimiz kisi yani alici
//$mail->AddAddress("kayhan@saraymefrusat.com"); // Maili gonderecegimiz kisi yani alici
//$mail->AddAddress("yocalmis@gmail.com"); // Maili gonderecegimiz kisi yani alici
$mail->AddAddress($parca[1]); // Maili gonderecegimiz kisi yani alici
$mail->Subject = $bas; // Konu basligi
$mail->Body = $ice; // Mailin icerigi
if(!$mail->Send()){
	return FALSE;
} else {
	return TRUE;
}




}







function gonder_icerik($mail_adresleri,$bas,$ice)
{

include("class.phpmailer.php");


$adet=count($mail_adresleri);
$dongu=$adet-1;

for($i=0; $i<=$dongu; $i++){
	$mail = "";
	$durum=0;
	$mail = new PHPMailer();
    $durum=$this->gonder($mail_adresleri[$i],$mail,$bas,$ice);
	
}

if($durum){return TRUE;}
return FALSE;

}



}


?>