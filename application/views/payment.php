<!DOCTYPE html>
<html lang="tr">
<head>
	<title>Blue Eye</title>
	<meta charset="UTF-8">
				<?php if( $ayar ) : foreach( $ayar  as $dizi ) : ?>	
	<meta name="description" content="<?php echo strip_tags($dizi["kisa_aciklama"]); ?>">
	<meta name="keyword" content="<?php echo strip_tags($dizi["seo_keywords"]);  ?>">
			<?php endforeach; endif; ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<?php $this->load->view('favicon'); ?>
	<!-- materialize.css -->
	<link type="text/css" rel="stylesheet" href="assets/css/materialize.min.css"  media="screen,projection"/>
	<!-- master.css -->
	<link rel="stylesheet" type="text/css" href="assets/css/master.css">
</head>
<body class="nonf">
		<?php $this->load->view('header_alt'); ?>
		<nav>
			<div class="nav-wrapper container">
				<a href="#" class="brand-logo"></a>
				<a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
				<ul id="nav-mobile" class="right hide-on-med-and-down">
					<li><a>Türkçe<i class="material-icons right">expand_more</i></a>
						<div class="minDrop">
							<a href="#"><img src="assets/img/flags/ceuta.svg" alt="">Türkçe</a>
							<a href="#"><img src="assets/img/flags/seychelles.svg" alt="">English</a>
							<a href="#"><img src="assets/img/flags/mongolia.svg" alt="">Spain</a>
							<a href="#"><img src="assets/img/flags/colombia.svg" alt="">İspanyolca</a>
							<a href="#"><img src="assets/img/flags/sardinia.svg" alt="">Dil5</a>
							<a href="#"><img src="assets/img/flags/bolivia.svg" alt="">Dil6</a>
						</div>
					</li>
					<li><a>TRY (₺) <i class="material-icons right">expand_more</i></a>
						<div class="hoverdrop">
							<h4>Tüm Para Birimleri</h4>
							<ul>
								<li><a href="#">ABD Doları <span>USD$</span></a></li>
								<li><a href="#">Euro <span>€</span></a></li>
								<li><a href="#">Rus Rublesi <span>₽</span></a></li>
								<li><a href="#">Türk Lirası <span>₺</span></a></li>
								<li><a href="#">Türk Lirası <span>₺</span></a></li>
								<li><a href="#">Türk Lirası <span>₺</span></a></li>
								<li><a href="#">Türk Lirası <span>₺</span></a></li>
								<li><a href="#">Türk Lirası <span>₺</span></a></li>
								<li><a href="#">Türk Lirası <span>₺</span></a></li>
								<li><a href="#">Türk Lirası <span>₺</span></a></li>
							</ul>
						</div>
					</li>
					<li><a href="#!">Sepet<i class="left">local_grocery_store</i></a></li>
					<li><a href="#!">Yardım<i class="left">help</i></a></li>
					<li><a href="#!">Muhammed<i class="material-icons left">person</i></a>
						<div class="minDrop">
							<a href="#">Rezervasyonlar</a>
							<a href="#">Ayarlar</a>
							<a href="#">İstek Listesi</a>
							<a href="#">Geçmiş</a>
							<p class="divider"></p>
							<a href="#">Çıkış</a>
						</div>
					</li>
				</ul>
			</div>
		</nav>
		<div class="sidenav" id="mobile-demo">
			<ul>
				<li>
					<div class="user-view">
				      	<div class="background">
				        	<img src="assets/img/kapadokya.jpg">
				      	</div>
				      	<a id="menu-user"><img class="circle" src="assets/img/boy.svg"></a>
				      	<!-- Kadın İse -->
				      	<!--<a href="#user"><img class="circle" src="assets/images/girl.svg"></a>-->
				      	<a href="#name"><span class="white-text name">İsim Soyisim</span></a>
				      	<a href="#email"><span class="white-text email">ornek@info.com</span></a>
			    	</div>
				</li>
				<li><a href="#language" class="modal-trigger"><i class="material-icons">language</i>Türkçe</a></li>
				<li><a href="#currencies" class="modal-trigger"><i class="material-icons">attach_money</i>TRY (₺)</a></li>
				<li><a href="#"><i class="material-icons">settings</i>Ayarlar</a></li>
				<li><a href="#"><i class="material-icons left">local_grocery_store</i>Sepet</a></li>
				<li><a href="#"><i class="material-icons">favorite</i>İstek Listesi</a></li>
				<li><a href="#"><i class="material-icons">history</i>Geçmiş</a></li>
				<li><a href="#"><i class="material-icons left">help</i>Yardım</a></li>
				<li class="divider" tabindex="-1"></li>
				<li><a href="#"><i class="material-icons">close</i>Çıkış</a></li>
			</ul>
		</div>
		<div id="language" class="modal">
			<div class="row">
				<div class="container">
					<h5>Tüm Diller</h5>
					<div class="col s6 border-right">
						<a href="#" class="waves-effect"><img src="assets/img/flags/ceuta.svg" alt="">Türkçe</a>
						<a href="#" class="waves-effect"><img src="assets/img/flags/seychelles.svg" alt="">English</a>
						<a href="#" class="waves-effect"><img src="assets/img/flags/mongolia.svg" alt="">Spain</a>
					</div>
					<div class="col s6">
						<a href="#" class="waves-effect"><img src="assets/img/flags/colombia.svg" alt="">İspanyolca</a>
						<a href="#" class="waves-effect"><img src="assets/img/flags/sardinia.svg" alt="">Dil5</a>
						<a href="#" class="waves-effect"><img src="assets/img/flags/bolivia.svg" alt="">Dil6</a>
					</div>
					<a href="#!" class="modal-close waves-effect btn right">Kapat</a>
				</div>
				<a class="divider"></a>
			</div>	
		</div>
		<div id="currencies" class="modal">
			<div class="container">
				<div class="row">
					<h5>Tüm Para Birimleri</h5>
					<div class="col s6 border-right">
						<a href="#" class="waves-effect">ABD Doları <span>USD$</span></a>
						<a href="#" class="waves-effect">Euro <span>€</span></a>
						<a href="#" class="waves-effect">Rus Rublesi <span>₽</span></a>
						<a href="#" class="waves-effect">Türk Lirası <span>₺</span></a>
						<a href="#" class="waves-effect">Türk Lirası <span>₺</span></a>
					</div>
					<div class="col s6">
						<a href="#" class="waves-effect">Türk Lirası <span>₺</span></a>
						<a href="#" class="waves-effect">Türk Lirası <span>₺</span></a>
						<a href="#" class="waves-effect">Türk Lirası <span>₺</span></a>
						<a href="#" class="waves-effect">Türk Lirası <span>₺</span></a>
						<a href="#" class="waves-effect">Türk Lirası <span>₺</span></a>
					</div>
				</div>
				<a href="#!" class="modal-close waves-effect btn right">Kapat</a>
				<a class="divider"></a>
			</div>	
		</div>
	</header>
	<main>		
		<script>var getNav=document.querySelector("nav > .nav-wrapper:not(.main-menu)");window.screen.width<=768&&(getNav=document.querySelector("nav > .nav-wrapper")),getHeight=getNav.offsetHeight,document.querySelector("main").style.marginTop=getHeight+"px";</script>
		<div class="container">
			<div class="py_i">
				<h4>Ödeme Bilgileri</h4>
				<div class="card-wrapper"></div>
				<form action="#">
					<div class="ch_f_t">
						<input id="c_n" type="text" name="number" placeholder="Kart Numarası">
						<input id="c_n_s" type="text" name="name" placeholder="İsim Soyisim"/>
					</div>
					<div class="ch_f_b_l">
						<input id="c_skt" type="text" name="expiry" placeholder="Tarih" />
						<input id="c_cvc" type="text" name="cvc" placeholder="CVC"/>
					</div>
					<div class="ch_f_b_r">
						<button type="submit" id="c_sbt" class="btn waves-effect submit-button right">Gönder</button>
					</div>
				</form>
			</div>
		</div>
	</main>
	<footer class="page-footer">
		<div class="container">
			<div class="row">
				<div class="col l4 s12">
					<h5 class="white-text">Destek</h5>
					<ul>
						<li><a class="grey-text text-lighten-3" href="#!">İletişim</a></li>
						<li><a class="grey-text text-lighten-3" href="#!">Yasal</a></li>
						<li><a class="grey-text text-lighten-3" href="#!">Gizlilik Politikası</a></li>
						<li><a class="grey-text text-lighten-3" href="#!">Kullanım Koşulları</a></li>
					</ul>
				</div>
				<div class="col l4 s12">
					<h5 class="white-text">Şirket</h5>
					<ul>
						<li><a class="grey-text text-lighten-3" href="#!">Hakkımızda</a></li>
						<li><a class="grey-text text-lighten-3" href="#!">Kariyer</a></li>
						<li><a class="grey-text text-lighten-3" href="#!">Blog</a></li>
						<li><a class="grey-text text-lighten-3" href="#!">Basın</a></li>
					</ul>
				</div>
				<div class="col l4  s12">
					<h5 class="white-text">Bizimle Çalışın</h5>
					<ul>
						<li><a class="grey-text text-lighten-3" href="#!">Tedarikçi Yönetimi</a></li>
						<li><a class="grey-text text-lighten-3" href="#!">Ortaklık Yönetimi</a></li>
					</ul>
					<h5 class="white-text">Ödeme Seçenekleri</h5>
					<div class="payments">
						<img src="assets/img/visa.svg" alt="visa">
						<img src="assets/img/maestro.svg" alt="maestro">
						<img src="assets/img/mastercard.svg" alt="mastercard">
					</div>
				</div>
			</div>
		</div>
		<div class="footer-copyright">
			<div class="container">
				<a href="#">© 2018 Blue Eye. Tüm Haklar Saklıdır</a>
				<div class="social">
					<a href="#"><img src="assets/img/001-facebook.svg" alt="facebook"></a>
					<a href="#"><img src="assets/img/002-instagram.svg" alt="instagram"></a>
					<a href="#"><img src="assets/img/003-twitter.svg" alt="twitter"></a>
					<a href="#"><img src="assets/img/004-youtube.svg" alt="youtube"></a>
					<a href="#"><img src="assets/img/005-whatsapp.svg" alt="whatsapp"></a>
				</div>
			</div>
		</div>
	</footer>





	<!-- jQuery.js -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/jquery.card.js"></script>
	<script>
		$('form').card({
			form: 'form',
			container: '.card-wrapper',
			placeholders: {
					name: 'Ad Soyad',
			}
			
		});
	</script>
	<!-- materalize.js -->
	<script src="assets/js/materialize.min.js"></script>
	<!-- function.js -->
	<script src="assets/js/function.js"></script>
</body>
</html>