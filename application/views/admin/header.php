<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<!DOCTYPE html>
<html>
<head>
	<title>Blue Eye Admin Paneli</title>
	<meta charset="utf-8" />
	<meta name="author" content="Back end: Yusuf Öcalmış, Front end: Muhammed Teuvajukov">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Chrome, Firefox OS and Opera -->
	<meta name="theme-color" content="#1A2B49"> 
	<!-- Windows Phone --> 
	<meta name="msapplication-navbutton-color" content="#1A2B49">
	<!-- iOS Safari -->
	<meta name="apple-mobile-web-app-status-bar-style" content="#1A2B49">  
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo site_url('assets') ?>/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo site_url('assets') ?>/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo site_url('assets') ?>/favicon/favicon-16x16.png">
	<link rel="manifest" href="<?php echo site_url('assets') ?>/favicon/webmanifest.json">
	<meta name="msapplication-TileColor" content="#1A2B49">
	<?php foreach($css_files as $file): ?>
		<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
	<?php endforeach; ?>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,200,300,400,500,500i,600,600i,700,800,900" type='text/css' rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,500i,600,600i,700,800,900" type='text/css' rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700&amp;subset=latin-ext" type='text/css' rel="stylesheet">
	<link rel="stylesheet" href="<?php echo site_url('assets') ?>/sumoselect.css">
	<link rel="stylesheet" href="<?php echo site_url('assets') ?>/admin.css ">

	<div id="preloader" class="lds-css ng-scope">
		<div class="ortala">
			<div style="width:100%;height:100%" class="lds-eclipse">
				<div></div>
			</div>
			
		</div>
		<style type="text/css">
		#preloader{
			position: fixed;
			top: 0;
			bottom: 0;
			left: 0;
			right: 0;
			width: 100vw;
			height: 100vh;
			opacity: 1;
			visibility: visible;
			display: -webkit-flex;
			display: -moz-flex;
			display: -ms-flex;
			display: -o-flex;
			display: flex;
			-webkit-flex-direction: column;
			-moz-flex-direction: column;
			-ms-flex-direction: column;
			-o-flex-direction: column;
			flex-direction: column;
			-ms-align-items: center;
			align-items: center;
			z-index: 9999;
			background-color: #fff;
		}
		.done{
			opacity: 0;
			visibility: hidden;
		}
			@keyframes lds-eclipse {
  0% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  50% {
    -webkit-transform: rotate(180deg);
    transform: rotate(180deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@-webkit-keyframes lds-eclipse {
  0% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  50% {
    -webkit-transform: rotate(180deg);
    transform: rotate(180deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
.lds-eclipse {
    position: fixed;
    top: 50%;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    -o-transform: translate(-50%, -50%);
    transform:  translate(-50%, -50%);
}
.lds-eclipse div {
  position: absolute;
  -webkit-animation: lds-eclipse 1s linear infinite;
  animation: lds-eclipse 1s linear infinite;
  width: 160px;
  height: 160px;
  top: 20px;
  left: 20px;
  border-radius: 50%;
  box-shadow: 0 4px 0 0 #030303;
  -webkit-transform-origin: 80px 82px;
  transform-origin: 80px 82px;
}
.lds-eclipse {
  width: 200px !important;
  height: 200px !important;

}

		</style>
	</div>
</head>
<body>
<!--	<div>
		<a href='<?php echo site_url('examples/customers_management')?>'>Customers</a> |
		<a href='<?php echo site_url('examples/orders_management')?>'>Orders</a> |
		<a href='<?php echo site_url('examples/products_management')?>'>Products</a> |
		<a href='<?php echo site_url('examples/offices_management')?>'>Offices</a> | 
		<a href='<?php echo site_url('examples/employees_management')?>'>Employees</a> |		 
		<a href='<?php echo site_url('examples/film_management')?>'>Films</a> |
		<a href='<?php echo site_url('examples/multigrids')?>'>Multigrid [BETA]</a>
		
	</div>-->

	<div class="side-nav">
		<div class="s-n_h">
			<img src="<?php echo site_url('assets') ?>/blue_eye_1.png" alt="">
			<div class="s-n_h_t">
				<h3>Blue Eye Company</h3>
				<!--<p>Lorem ipsum dolor sit amet.</p>-->
			</div>
		</div>
		<ul>
			<li><a href='<?php echo site_url('admin/admin')?>'><i>home</i>Anasayfa</a></li>
			<li class="mine-trigger">
	 			<a><i>settings</i>Ayarlar</a>
	 			<div class="mine-content">
	 				<a href='<?php echo site_url('admin/admin/ayar')?>'>Site Ayarları</a>
					<a href='<?php echo site_url('admin/admin/bilgi')?>'>Şifre Değiştir</a>
					<a href='<?php echo site_url('admin/admin/currency')?>'>Döviz Kurları</a>
	 			</div>
	 		</li>
			<li class="mine-trigger">
	 			<a><i>developer_board</i>Kategoriler</a>
	 			<div class="mine-content">
	 				<a href='<?php echo site_url('admin/admin/ana_kategori')?>'>Ana Kategori</a>
	 				<a href='<?php echo site_url('admin/admin/kategori')?>'>Alt Kategori</a>
	 			</div>
	 		</li>
	 		<li class="mine-trigger">
	 			<a><i>streetview</i>Turlar - Oteller</a>
	 			<div class="mine-content">
	 				<a href='<?php echo site_url('admin/admin/surekli_tur')?>'>Turlar (Sürekli)</a>
	 				<a href='<?php echo site_url('admin/admin/belirli_tarih_tur')?>'>Turlar (Belirli tarih)</a>
	 				<a href='<?php echo site_url('admin/admin/otel')?>'>Oteller</a>					
	 			</div>
	 		</li>
	 		<li class="mine-trigger">
	 			<a><i>description</i>Sayfalar</a>
	 			<div class="mine-content">
	 				<a href='<?php echo site_url('admin/admin/yardim')?>'>Yardım Sayfaları</a> 
	 				<a href='<?php echo site_url('admin/admin/sayfalar')?>'>İçerik Sayfaları</a>
	 			</div>
	 		</li>
			<li><a href='<?php echo site_url('admin/admin/uyeler')?>'><i>supervisor_account</i>Üyeler</a></li>
			<li><a href='<?php echo site_url('admin/admin/on_rezervasyon')?>'><i>event_available</i>Ön Rezervasyonlar</a></li>			
			<li><a href='<?php echo site_url('admin/admin/rezervasyon')?>'><i>event_available</i>Rezervasyonlar</a></li>
			<li><a href='<?php echo site_url('admin/admin/mail')?>'><i>mail_outline</i>E-Posta Gönder</a></li>
			<li><a href='<?php echo site_url('admin/admin/yorumlar_aktif_pasif')?>'><i>message</i>Yorumlar</a></li>			
			<li><a href='<?php echo site_url('admin/admin/kupon')?>'><i>message</i>Kupon</a></li>	

			<li><a href='<?php echo site_url('admin/admin/cikis')?>'><i>close</i>Çıkış</a></li>

		<!--	<li><a href='<?php echo site_url('admin/admin/lang/tr')?>'><i>close</i>Türkçe</a></li>			
			<li><a href='<?php echo site_url('admin/admin/lang/ru')?>'><i>close</i>Rusça</a></li>			
			Şu an <?php echo $this->session->userdata('admin_dil'); ?>-->
		</ul>
		<p class="s-n_f">© 2018 Blue Eye. Tüm Haklar Saklıdır</p>	
	</div>
	<div class="side-header">
		<a class="o_s-n"><i>menu</i></a>
		<h3></h3>
		<div class="s-h_r">
			<a class="dil">
				<i>language</i><i>arrow_drop_down</i>
			</a>
			<div class="dil__main">
				<a href="<?php echo site_url('admin/admin/lang/en')?>"><img src="<?php echo site_url('assets_user/img/flags/')?>england.svg"> İngilizce</a>
				<span class="divider"></span>
				<a href="<?php echo site_url('admin/admin/lang/ru')?>"><img src="<?php echo site_url('assets_user/img/flags/')?>russia.svg"> Rusça</a>
			<span class="divider"></span>
				<a href="<?php echo site_url('admin/admin/lang/tr')?>"><img src="<?php echo site_url('assets_user/img/flags/')?>turkey.svg"> Türkçe</a>
		<span class="divider"></span>
				<a href="<?php echo site_url('admin/admin/lang/esp')?>"><img src="<?php echo site_url('assets_user/img/flags/')?>spain.svg"> İspanyolca</a>
		
		</div>
			<a>
				<i>person</i><?php echo $online=$this->session->userdata('adminonline'); ?>
			</a>
		</div>
	</div>

	
	
	<main>
    	<div style="padding: 10px">