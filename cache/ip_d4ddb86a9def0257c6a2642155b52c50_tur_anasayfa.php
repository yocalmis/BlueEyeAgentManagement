<!DOCTYPE html>
<html lang="tr">
<head><meta http-equiv="Content-Type" content="text/html; charset=big5">
	<title>
			
			Blue Eye Travel Türkiye			</title>
	
	
		
		<meta name="description" content="BlueEyeTour: Tours & Attractions, Tickets, Things to Do, Tours around Turkey">
		<meta name="keyword" content="
	Blue,Eye,Travel,Tour,Cappadocia,İstanbul,Tours,Blue Eye Tour,Blue Eye Travel,Fethiye,Ephesus,Nemrut,daily tours, night activity,pamukkale,blue eye travel
">
		
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="author" content="Back end: Yusuf Öcalmış, Front end: Muhammed Teuvajukov">

	<meta name="description" content="
	Blue Eye Travel Türkiye">
	<meta name="google-site-verification" content="Ntznq4vtKJfxUHqObo7B3dARMAPU7fo2FQG8BQ_bCA4" />
	<meta name="yandex-verification" content="691771445a0b9baf" />
	<meta name="keyword" content="
	Blue,Eye,Travel,Tour,Cappadocia,İstanbul,Tours,Blue Eye Tour,Blue Eye Travel,Fethiye,Ephesus,Nemrut,daily tours, night activity,pamukkale,blue eye travel
">

<meta name="msapplication-TileColor" content="#1A2B49"> 
<meta name="theme-color" content="#1A2B49">
<meta name="msapplication-navbutton-color" content="#1A2B49">
<meta name="apple-mobile-web-app-status-bar-style" content="#1A2B49"> 
<link rel="apple-touch-icon" sizes="180x180" href="https://www.blueeyetour.com/assets_user/img/favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="https://www.blueeyetour.com/assets_user/img/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="https://www.blueeyetour.com/assets_user/img/favicon/favicon-16x16.png">
<link rel="manifest" href="https://www.blueeyetour.com/assets_user/img/favicon/site.webmanifest">
<script>

	var
	oncki_gun_secmzns 	= 'Önceki günü seçemezsiniz.',
	onc_bas_t_sec 		= 'Önce başlangıç tarihini seçmelisiniz.',
	ltfn_yolcu_scnz 	= 'Lütfen Yolcu Sayısını Seçiniz.',
	a_18yaskck 			= '18 Yaşından küçükseniz, Tek Başınıza Yolculuğa Çıkmanız Kesinlikle Yasaktır.',
	ltfn_kisi_dgru 		= 'Lütfen doğru kişi sayısı seçiniz.',
	ism_bos_olmz 		= 'İsminizi Boş Bırakamazsınız.',
	ism_kisa 			= 'İsminiz Çok Kısa.',
	ism_uzun			= 'İsminiz Çok Uzun.',
	kllnc_bos_olmz		= 'Kullanıcı Adını Boş Bırakamazsınız.',
	kllnc_ad_kisa		= 'Kullanıcı Adınız Çok Kısa.',
	kllnc_ad_uzun		= 'Kullanıcı Adınız Çok Uzun.',
	sfre_bs_olmz		= 'Şifreyi Boş Bırakamazsınız.',
	sfre_ck_kisa		= 'Şifreniz Çok Kısa.',
	sfre_ck_uzun		= 'Şifreniz Çok Uzun.',
	sfre_ayni_dagel		= 'Şifreler Eşleşmiyor.',
	ltfn_emal_adrs_dgru	= 'Lütfen Mail Adresini Doğru Yazınız.',
	bslk_gir			= 'Başlık Giriniz',
	brya_yazn			= 'Buraya Yazın..',
	yrm_ck_kisa			= 'Yorum Çok Kısa..',
	ltfn_zyrtc_dldr		= 'Lütfen ziyaretçi alanlarını doldurunuz.',
	ltfn_eksk_dldr		= 'Lütfen tüm alanları doldurunuz',
	tmm					= 'Tamam',
	eksik				= 'Eksik Alanlar',
	yetiskin			= 'Yetişkin',
	cocuk				= 'Çocuk',
	bebek				= 'Bebek';

	var is_babe;
	var iptalTarih = [];


	var datepicker_i18 = {
		cancel			: 'Kapat',
		clear			: 'Temizle',
		done			: 'Tamam',
		months			: [
		'Ocak', 
		'Şubat', 
		'Mart', 
		'Nisan', 
		'Mayıs', 
		'Haziran',
		'Temmuz', 
		'Ağustos',
		'Eylül',
		'Ekim',
		'Kasım',
		'Aralık'
		],

		monthsShort		: [
		'Ocak', 
		'Şubat', 
		'Mart', 
		'Nisan', 
		'Mayıs', 
		'Haziran',
		'Temmuz', 
		'Ağustos',
		'Eylül',
		'Ekim',
		'Kasım',
		'Aralık'
		],

		weekdays		: [
		'Pazar',
		'Pazartesi',
		'Salı',
		'Çarşamba',
		'Perşembe',
		'Cuma',
		'Cumartesi'
		],
		
		weekdaysShort 	: [
		'Pzr',
		'Pzrts',
		'Salı',
		'Çrşmb',
		'Prşmb',
		'Cume',
		'Cmrts'
		],
		
		weekdaysAbbrev	: ['P', 'Pt', 'S', 'Ç', 'P', 'C', 'Ct']	};
	window.base_url = 'https://www.blueeyetour.com/';
	window.i18n = {
		error: 'Bir şeyler yanlış gitti.',
		cart: {
			code_not_correct: 'Kupon kodu yanlış',
			enter_correct_code: 'Lütfen doğru kupon kodu giriniz.',
			same_lider_person: ''
		},
		rezerv: {
			enter_correct_card: 'Lütfen doğru kart bilgisi giriniz..',
			cart_update_ok: 'Kartınız başarılı şekilde güncellendi..',
			cancellation_ok: 'Başarılı, 24 saat içinde iptal maili alacaksınız',
			change_date_ok: 'Başarılı, bilgi maili alacaksınız.',
			post_comment_ok: 'Başarılı, tur sayfasını ziyaret edebilirsiniz.'
		}
	}


</script>	<!-- materialize.css -->
	<link type="text/css" rel="stylesheet" href="https://www.blueeyetour.com/assets_user/css/materialize.min.css" 
	media="screen,projection" defer/>
	<!-- master.css -->
	<link rel="stylesheet" type="text/css" href="https://www.blueeyetour.com/assets_user/css/master.css" />
</head>

<body>
	<header>
	<style>i{font-style: normal;}</style>
	<nav>
		<div class="nav-wrapper container main-menu">
			<a href="https://www.blueeyetour.com/" class="brand-logo">
				<img src="https://www.blueeyetour.com/assets_user/img/blue_eye_logo.svg" alt="Blue Eye Logo">
				<div class="l_t">
					<h3>Blue Eye</h3>
						
						<p>
							Hayalinizdeki tatili ertelemeyin						</p>
									</div>
			</a>
			<a href="#" data-target="mobile-demo" class="sidenav-trigger">
				<span data-url='https://www.blueeyetour.com/assets_user/img/icons/outline-menu-24px.svg'></span>			</a>
			<ul id="nav-mobile" class="right hide-on-med-and-down">
				<li>
					<a href="https://www.blueeyetour.com/">
						<span class="nav__icon">
							<span data-url='https://www.blueeyetour.com/assets_user/img/icons/outline-directions_bus-24px.svg'></span>						</span>
						Tur					</a>
				</li> 
				<!--		<li>
					<a href="https://www.blueeyetour.com/otels">
						<i class="material-icons left">hotel</i>
						Otel					</a>
				</li-->
				<li>
					<a href="https://www.blueeyetour.com/help">
						<span class="nav__icon">
							<span data-url='https://www.blueeyetour.com/assets_user/img/icons/outline-help-24px.svg'></span>						</span>

						Yardım					</a>
				</li>
				<!-- Giriş Yapılmış -->

				<li>
					<a href="https://www.blueeyetour.com/cart">
						<span class="nav__icon">
							<span data-url='https://www.blueeyetour.com/assets_user/img/icons/outline-local_grocery_store-24px.svg'></span>						</span>
						Sepet					</a>
				</li>
							
				<!-- Giriş Yapılmamış -->
				<li class="big">
					<a>
						<span class="nav__icon">
							<span data-url='https://www.blueeyetour.com/assets_user/img/icons/outline-person-24px.svg'></span>						</span>
						Giriş					</a>
					<div class="minDrop">
						<a href="https://www.blueeyetour.com/giris/kayit">
							Giriş						</a>
						<a href="https://www.blueeyetour.com/giris/kayit">
							Kayıt Ol						</a>
					</div>
				</li>
					</ul>
	</div>
</nav>
<div class="sidenav" id="mobile-demo" data-tab="false">
		
		<!-- Giriş Yapılmamış -->
		<ul>
			<li>
				<a href="https://www.blueeyetour.com/">
					<span class="sidenav__icon">
						<span data-url='https://www.blueeyetour.com/assets_user/img/icons/outline-directions_bus-24px.svg'></span>					</span>
					Tur				</a>
			</li>
			<li>
				<a href="#" role="button" data-target="lng_crs" class="sidenav-trigger">
					<span class="sidenav__icon">
						<span data-url='https://www.blueeyetour.com/assets_user/img/icons/outline-language-24px.svg'></span>					</span>
					Tr 
					/ 
					Euro 
					(€)
				</a>
			</li>
			<li>
				<a href="https://www.blueeyetour.com/cart">
					<span class="sidenav__icon">
						<span data-url='https://www.blueeyetour.com/assets_user/img/icons/outline-local_grocery_store-24px.svg'></span>					</span>
					Sepet				</a>
			</li>
			<li>
				<a href="https://www.blueeyetour.com/giris/kayit">
					<span class="sidenav__icon">
						<span data-url='https://www.blueeyetour.com/assets_user/img/icons/outline-person-24px.svg'></span>					</span>
					Giriş					/ 
					Kayıt Ol				</a>
			</li>
			<li class="divider" tabindex="-1"></li>
			<li>
				<a href="https://www.blueeyetour.com/help">
					<span class="sidenav__icon">
						<span data-url='https://www.blueeyetour.com/assets_user/img/icons/help-24px.svg'></span>					</span>
					Yardım				</a>
			</li>
		</ul>
	
	</div>
<a href="#" data-target="lng_crs" class="l-g_c-s sidenav-trigger">
	Tr	/ 
	Euro 
	(€)
</a>
<div id="lng_crs" class="sidenav" tabindex="-1">
	<h5>Language</h5>
	<p class="divider" tabindex="-1"></p>
	<div class="lng_crs--l">
		<a href="https://www.blueeyetour.com/lang/index/Tr" class="waves-effect">
			<img src="https://www.blueeyetour.com/assets_user/img/flags/turkey.svg" 
			alt="Türkçe Flag">
			Türkçe		</a>
		<a href="https://www.blueeyetour.com/lang/index/Eng" class="waves-effect">
			<img src="https://www.blueeyetour.com/assets_user/img/flags/united-kingdom.svg" 
			alt="English Flag">
			English		</a>
		<a href="https://www.blueeyetour.com/lang/index/Ru" class="waves-effect">
			<img src="https://www.blueeyetour.com/assets_user/img/flags/russia.svg" 
			alt="Pусский Flag">
			Pусский		</a>
		<!--
		<a href="https://www.blueeyetour.com/" class="waves-effect">
			<img src="https://www.blueeyetour.com/assets_user/img/flags/china.svg" alt="中文 Flag">
			中文		</a>
		<a href="https://www.blueeyetour.com/" class="waves-effect">
			<img src="https://www.blueeyetour.com/assets_user/img/flags/india.svg" alt="भारतीय Flag">
			भारतीय		</a>
		<a href="https://www.blueeyetour.com/" class="waves-effect">
			<img src="https://www.blueeyetour.com/assets_user/img/flags/spain.svg" alt="Español Flag">
			Español		</a>
	-->
</div>
<h5>Currency</h5>
<p class="divider" tabindex="-1"></p>
<div class="lng_crs--c">
	<a href="https://www.blueeyetour.com/currency/index/dollar" class="waves-effect">
		<span>$</span> 
		USD Dollars
	</a>
	<a href="https://www.blueeyetour.com/currency/index/ruble" class="waves-effect">
		<span>₽</span> 
		Pубль
	</a>
	<a href="https://www.blueeyetour.com/currency/index/euro" class="waves-effect">
		<span>€</span> 
		Euro
	</a>
	<a href="https://www.blueeyetour.com/currency/index/tl" class="waves-effect">
		<span>₺</span> 
		Türk Lirası
	</a>
	<a href="https://www.blueeyetour.com/currency/index/pound" class="waves-effect">
		<span>£</span> 
		Pound
	</a>
	<a href="https://www.blueeyetour.com/currency/index/dinar" class="waves-effect">
		<span>د.ك</span> 
		Dinnar
	</a>
</div>
</div></header>
<!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '461011591258150');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=461011591258150&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
	<main>
		<script>
			(function navFix() {
				var getNav;
				var mq = window.matchMedia('(max-width: 768px)');

				if (mq.matches) {
					getNav = document.querySelector('nav > .nav-wrapper');
				} else {
					getNav = document.querySelector('nav > .nav-wrapper:not(.main-menu)');
				}

				if (getNav == null) {
					return false;
				}

				var getHeight = getNav.offsetHeight;
				document.querySelector('main').style.marginTop = getHeight + 'px';
			})();
		</script>
		<section class="rezerv">
			<div class="parallax-container">
				<div class="parallax">
						
						<img src="https://www.blueeyetour.com/assets/resimler/home/1559f-cappadocia-turkey.jpg">
					</div>
					<style>
						.buy-ticket .btn.waves-effect:not(.modal-close){display:-webkit-flex;display:-moz-flex;display:-ms-flex;display:-o-flex;display:flex;-ms-align-items:center;align-items:center;justify-content:space-around;text-align:center;font-weight:500;background-color:var(--light-blue);border-radius:32px;margin-top:0;width:100%}
					</style>
					<div class="rezerv-inner">
						<div class="buy-ticket card-panel">
							<p>
	<span style="font-family:raleway,sans-serif;"><strong style="font-weight:800;"><span style="font-size:48px;">T&uuml;rkiye&#39;yi Keşfedin</span></strong></span></p>
<p>
	<sstrongpan style="font-weight:400;"><span style="font-family:roboto,sans-serif;"><span style="font-size:26px;">T&uuml;rkiye&#39;nin her yerindeki tur ve aktivitelere bir tıkla ulaşın.</span></span></sstrongpan></p>
						
						<!--<ul class="i_t-o_t tabs">
							<li class="tab">
								<a class="active" href="#tur_tab">
									Tur								</a>
							</li>
						</ul>-->
						<div id="tur_tab">
							<form action="https://www.blueeyetour.com/Search/Word" method="Post" class="buy-form">
								<div class="ticket-form-inner">
									<div class="input-field">
										<input id="where" name="word" type="text" class="autocomplete">
										<label for="where">
											Nereye										</label>
									</div>
									<div class="input-field takvim">
										<input id="start_date"  name="bas_t" type="text" class="datepicker">
										<label for="start_date">
											Başlangıç tarihi										</label>
									</div>
									<div class="input-field takvim">
										<input id="end_date" name="bit_t" type="text" class="datepicker">
										<label for="end_date">
											Bitiş tarihi										</label>
									</div>
									<div class="input-field">
										<button type="submit" value="" class="btn waves-effect">
											Ara										</button>
									</div>
								</div>
							</form>
						</div>
						<div id="otel_tab" style="display: none;">
							<form action="https://www.blueeyetour.com/otels/Search/Word" method="Post" class="buy-form">
								<div class="ticket-form-inner">
									<div class="input-field">
										<input id="where" name="word" type="text" class="autocomplete">
										<label for="where">
											Nereye										</label>
									</div>
									<div class="input-field takvim">
										<input id="start_date"  name="bas_t" type="text" class="datepicker">
										<label for="start_date">
											check-in
										</label>
									</div>
									<div class="input-field takvim">
										<input id="end_date" name="bit_t" type="text" class="datepicker">
										<label for="end_date">
											check-out
										</label>
									</div>
									<div class="input-field">
										<button type="submit" value="" class="btn waves-effect">	Ara									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="specs">
		<div class="container center-align">
			<div class="specs-inner">
				<div class="specs-inner__spec spec">
					<h6 class="spec__title">
						<span data-url="https://www.blueeyetour.com/assets_user/img/icons/explore-24px.svg"></span>
						Bize güvenin					</h6>
					<p class="spec__text">
						Sizin için en güzel tur ve etkinliklerini özenle seçiyoruz.					</p>
				</div>
				<div class="specs-inner__spec spec">
					<h6 class="spec__title">
						<span data-url="https://www.blueeyetour.com/assets_user/img/icons/thumb_up-24px.svg"></span>
						En iyi fiyat garantisi					</h6>
					<p class="spec__text">
						Fiyatlarımızı size uygun hale getirmek icin sürekli pazar araştırması yapıyoruz.					</p>
				</div>
				<div class="specs-inner__spec spec">
					<h6 class="spec__title">
						<span data-url="https://www.blueeyetour.com/assets_user/img/icons/security-24px.svg"></span>
						Güvenli ödemeler					</h6>
					<p class="spec__text">
						Ödemelerinizi güvenli hale getirmek için stripe kullanıyoruz.					</p>
				</div>
				<div class="specs-inner__spec spec">
					<h6 class="spec__title">
						<span data-url="https://www.blueeyetour.com/assets_user/img/icons/contact_support-24px.svg"></span>
						7/24 Destek					</h6>
					<p class="spec__text">
						Merak ettiğiniz her şeyi telefon veya e-posta yolu ile sorabilirsiniz. 					</p>
				</div>
			</div>
		</div>
	</section>
	<section class="place">
		<div class="container center-align">
			<h4>
				Kaçırılmayacak Tatil Durakları			</h4>

			

			<div class="places-inner">
			<div class="places-main">
				<div class="places-main__image">
					<img
					src="https://www.blueeyetour.com/assets_user/img/placeholder.svg"
					data-src="https://www.blueeyetour.com/assets/resimler/sehirler/04837-stocksnap_f90e2e0647.jpg"
					class="lazy" alt="Kapadokya" />
				</div>
				<div class="places-main-text">				<h4>Kapadokya</h4>

				<p></p>
				<a class="btn" href="
				https://www.blueeyetour.com/Categories/detail/Cappadocia">
				Daha fazla			</a>
		</div>
	</div>
	<div class="places-other">
		<div class="places-row">
			<!-- İndirim varsa -->
							<div class="other-main
								">
				
				<a href="https://www.blueeyetour.com/Tour/detail/Hot-Air-Balloon-Flight-standard-flight"></a>
				<div class="other-image">
					<img 
					src="https://www.blueeyetour.com/assets_user/img/placeholder.svg"
					data-src="https://www.blueeyetour.com/assets/resimler/turlar/a35df-hot-air-balloons.jpg"
					class="lazy" alt="Sıcak Hava Balonu Uçuşu (standart uçuş)" />
				</div>
				<div class="other-text-inner">
					<a>
						Sıcak Hava Balonu Uçuşu (standart uçuş)					</a>
					<div class="bottom-inner">
						<div class="other-left">
							<div class="stars">



								<span data-url='https://www.blueeyetour.com/assets_user/img/icons/star.svg'></span><span data-url='https://www.blueeyetour.com/assets_user/img/icons/star.svg'></span><span data-url='https://www.blueeyetour.com/assets_user/img/icons/star.svg'></span><span data-url='https://www.blueeyetour.com/assets_user/img/icons/star.svg'></span><span data-url='https://www.blueeyetour.com/assets_user/img/icons/star_border.svg'></span>



							</div>
							<span>
								7								Yorum							</span>
						</div>
						<div class="other-right">
							<p>
								Fiyat							</p>
							<p class="">
																120 € 
							</p>
						</div>
					</div>
				</div>
			</div>
							<div class="other-main
								">
				
				<a href="https://www.blueeyetour.com/Tour/detail/Hot-Air-Balloon-Flight-comfort-flight"></a>
				<div class="other-image">
					<img 
					src="https://www.blueeyetour.com/assets_user/img/placeholder.svg"
					data-src="https://www.blueeyetour.com/assets/resimler/turlar/2e1ad-hot-air-balloons-1920x1080.jpg"
					class="lazy" alt="Sıcak Hava Balonu Uçuşu (Konforlu Uçuş)" />
				</div>
				<div class="other-text-inner">
					<a>
						Sıcak Hava Balonu Uçuşu (Konforlu Uçuş)					</a>
					<div class="bottom-inner">
						<div class="other-left">
							<div class="stars">



								<span data-url='https://www.blueeyetour.com/assets_user/img/icons/star_border.svg'></span><span data-url='https://www.blueeyetour.com/assets_user/img/icons/star_border.svg'></span><span data-url='https://www.blueeyetour.com/assets_user/img/icons/star_border.svg'></span><span data-url='https://www.blueeyetour.com/assets_user/img/icons/star_border.svg'></span><span data-url='https://www.blueeyetour.com/assets_user/img/icons/star_border.svg'></span>



							</div>
							<span>
								0								Yorum							</span>
						</div>
						<div class="other-right">
							<p>
								Fiyat							</p>
							<p class="">
																180 € 
							</p>
						</div>
					</div>
				</div>
			</div>
			</div>
			<div class="places-row">				<div class="other-main
								">
				
				<a href="https://www.blueeyetour.com/Tour/detail/Hot-Air-Balloon-Flight-deluxe-flight"></a>
				<div class="other-image">
					<img 
					src="https://www.blueeyetour.com/assets_user/img/placeholder.svg"
					data-src="https://www.blueeyetour.com/assets/resimler/turlar/c75d9-hot-air-balloon-21.jpg"
					class="lazy" alt="Sıcak Hava Balonu Uçuşu (lüks uçuş)" />
				</div>
				<div class="other-text-inner">
					<a>
						Sıcak Hava Balonu Uçuşu (lüks uçuş)					</a>
					<div class="bottom-inner">
						<div class="other-left">
							<div class="stars">



								<span data-url='https://www.blueeyetour.com/assets_user/img/icons/star_border.svg'></span><span data-url='https://www.blueeyetour.com/assets_user/img/icons/star_border.svg'></span><span data-url='https://www.blueeyetour.com/assets_user/img/icons/star_border.svg'></span><span data-url='https://www.blueeyetour.com/assets_user/img/icons/star_border.svg'></span><span data-url='https://www.blueeyetour.com/assets_user/img/icons/star_border.svg'></span>



							</div>
							<span>
								0								Yorum							</span>
						</div>
						<div class="other-right">
							<p>
								Fiyat							</p>
							<p class="">
																290 € 
							</p>
						</div>
					</div>
				</div>
			</div>
							<div class="other-main
								">
				
				<a href="https://www.blueeyetour.com/Tour/detail/Cappadocia-Camel-Tour1-hour"></a>
				<div class="other-image">
					<img 
					src="https://www.blueeyetour.com/assets_user/img/placeholder.svg"
					data-src="https://www.blueeyetour.com/assets/resimler/turlar/4a42e-deve-turu-11.jpg"
					class="lazy" alt="Kapadokya Deve Turu (1 saat)" />
				</div>
				<div class="other-text-inner">
					<a>
						Kapadokya Deve Turu (1 saat)					</a>
					<div class="bottom-inner">
						<div class="other-left">
							<div class="stars">



								<span data-url='https://www.blueeyetour.com/assets_user/img/icons/star_border.svg'></span><span data-url='https://www.blueeyetour.com/assets_user/img/icons/star_border.svg'></span><span data-url='https://www.blueeyetour.com/assets_user/img/icons/star_border.svg'></span><span data-url='https://www.blueeyetour.com/assets_user/img/icons/star_border.svg'></span><span data-url='https://www.blueeyetour.com/assets_user/img/icons/star_border.svg'></span>



							</div>
							<span>
								0								Yorum							</span>
						</div>
						<div class="other-right">
							<p>
								Fiyat							</p>
							<p class="">
																30 € 
							</p>
						</div>
					</div>
				</div>
			</div>
						






	</div>

</div>
</div>



			<div class="places-inner reverse">
			<div class="places-main">
				<div class="places-main__image">
					<img
					src="https://www.blueeyetour.com/assets_user/img/placeholder.svg"
					data-src="https://www.blueeyetour.com/assets/resimler/sehirler/cfeae-antalya-1_720x520.jpg"
					class="lazy" alt="Antalya" />
				</div>
				<div class="places-main-text">				<h4>Antalya</h4>

				<p></p>
				<a class="btn" href="
				https://www.blueeyetour.com/Categories/detail/Antalya">
				Daha fazla			</a>
		</div>
	</div>
	<div class="places-other">
		<div class="places-row">
			<!-- İndirim varsa -->
							<div class="other-main
								">
				
				<a href="https://www.blueeyetour.com/Tour/detail/Perge-Aspendos-Side-Tour"></a>
				<div class="other-image">
					<img 
					src="https://www.blueeyetour.com/assets_user/img/placeholder.svg"
					data-src="https://www.blueeyetour.com/assets/resimler/turlar/4989b-aspendos.jpg"
					class="lazy" alt=" Perge, Aspendos, Side Turu" />
				</div>
				<div class="other-text-inner">
					<a>
						 Perge, Aspendos, Side Turu					</a>
					<div class="bottom-inner">
						<div class="other-left">
							<div class="stars">



								<span data-url='https://www.blueeyetour.com/assets_user/img/icons/star_border.svg'></span><span data-url='https://www.blueeyetour.com/assets_user/img/icons/star_border.svg'></span><span data-url='https://www.blueeyetour.com/assets_user/img/icons/star_border.svg'></span><span data-url='https://www.blueeyetour.com/assets_user/img/icons/star_border.svg'></span><span data-url='https://www.blueeyetour.com/assets_user/img/icons/star_border.svg'></span>



							</div>
							<span>
								0								Yorum							</span>
						</div>
						<div class="other-right">
							<p>
								Fiyat							</p>
							<p class="">
																49 € 
							</p>
						</div>
					</div>
				</div>
			</div>
							<div class="other-main
								">
				
				<a href="https://www.blueeyetour.com/Tour/detail/Termessos--Duden-Waterfalls-Tour"></a>
				<div class="other-image">
					<img 
					src="https://www.blueeyetour.com/assets_user/img/placeholder.svg"
					data-src="https://www.blueeyetour.com/assets/resimler/turlar/630c4-duden-waterfall-1920x1080.jpg"
					class="lazy" alt="Termessos & Düden Şelalesi Turu" />
				</div>
				<div class="other-text-inner">
					<a>
						Termessos & Düden Şelalesi Turu					</a>
					<div class="bottom-inner">
						<div class="other-left">
							<div class="stars">



								<span data-url='https://www.blueeyetour.com/assets_user/img/icons/star_border.svg'></span><span data-url='https://www.blueeyetour.com/assets_user/img/icons/star_border.svg'></span><span data-url='https://www.blueeyetour.com/assets_user/img/icons/star_border.svg'></span><span data-url='https://www.blueeyetour.com/assets_user/img/icons/star_border.svg'></span><span data-url='https://www.blueeyetour.com/assets_user/img/icons/star_border.svg'></span>



							</div>
							<span>
								0								Yorum							</span>
						</div>
						<div class="other-right">
							<p>
								Fiyat							</p>
							<p class="">
																44 € 
							</p>
						</div>
					</div>
				</div>
			</div>
			</div>
			<div class="places-row">				<div class="other-main
								">
				
				<a href="https://www.blueeyetour.com/Tour/detail/Demre-Myra--Kekova-Sunken-City-Tour"></a>
				<div class="other-image">
					<img 
					src="https://www.blueeyetour.com/assets_user/img/placeholder.svg"
					data-src="https://www.blueeyetour.com/assets/resimler/turlar/51c92-kekova.jpg"
					class="lazy" alt="Demre, Myra & Kekova Sunken Şehri Turu" />
				</div>
				<div class="other-text-inner">
					<a>
						Demre, Myra & Kekova Sunken Şehri Turu					</a>
					<div class="bottom-inner">
						<div class="other-left">
							<div class="stars">



								<span data-url='https://www.blueeyetour.com/assets_user/img/icons/star_border.svg'></span><span data-url='https://www.blueeyetour.com/assets_user/img/icons/star_border.svg'></span><span data-url='https://www.blueeyetour.com/assets_user/img/icons/star_border.svg'></span><span data-url='https://www.blueeyetour.com/assets_user/img/icons/star_border.svg'></span><span data-url='https://www.blueeyetour.com/assets_user/img/icons/star_border.svg'></span>



							</div>
							<span>
								0								Yorum							</span>
						</div>
						<div class="other-right">
							<p>
								Fiyat							</p>
							<p class="">
																60 € 
							</p>
						</div>
					</div>
				</div>
			</div>
							<div class="other-main
								">
				
				<a href="https://www.blueeyetour.com/Tour/detail/Olympos--Chimera-Tour"></a>
				<div class="other-image">
					<img 
					src="https://www.blueeyetour.com/assets_user/img/placeholder.svg"
					data-src="https://www.blueeyetour.com/assets/resimler/turlar/6fa6b-olympos-antalya.jpg"
					class="lazy" alt="Olympos & Chimera Turu" />
				</div>
				<div class="other-text-inner">
					<a>
						Olympos & Chimera Turu					</a>
					<div class="bottom-inner">
						<div class="other-left">
							<div class="stars">



								<span data-url='https://www.blueeyetour.com/assets_user/img/icons/star_border.svg'></span><span data-url='https://www.blueeyetour.com/assets_user/img/icons/star_border.svg'></span><span data-url='https://www.blueeyetour.com/assets_user/img/icons/star_border.svg'></span><span data-url='https://www.blueeyetour.com/assets_user/img/icons/star_border.svg'></span><span data-url='https://www.blueeyetour.com/assets_user/img/icons/star_border.svg'></span>



							</div>
							<span>
								0								Yorum							</span>
						</div>
						<div class="other-right">
							<p>
								Fiyat							</p>
							<p class="">
																45 € 
							</p>
						</div>
					</div>
				</div>
			</div>
						






	</div>

</div>
</div>



			<div class="places-inner">
			<div class="places-main">
				<div class="places-main__image">
					<img
					src="https://www.blueeyetour.com/assets_user/img/placeholder.svg"
					data-src="https://www.blueeyetour.com/assets/resimler/sehirler/42cd0-traverten.jpg"
					class="lazy" alt="Pamukkale" />
				</div>
				<div class="places-main-text smoth">				<h4>Pamukkale</h4>

				<p></p>
				<a class="btn" href="
				https://www.blueeyetour.com/Categories/detail/Pamukkale">
				Daha fazla			</a>
		</div>
	</div>
	<div class="places-other">
		<div class="places-row">
			<!-- İndirim varsa -->
							<div class="other-main
								">
				
				<a href="https://www.blueeyetour.com/Tour/detail/Pamukkale-Tour-Full-Day"></a>
				<div class="other-image">
					<img 
					src="https://www.blueeyetour.com/assets_user/img/placeholder.svg"
					data-src="https://www.blueeyetour.com/assets/resimler/turlar/6ce62-traverten2.jpg"
					class="lazy" alt="Pamukkale Turu (Tam Gün)" />
				</div>
				<div class="other-text-inner">
					<a>
						Pamukkale Turu (Tam Gün)					</a>
					<div class="bottom-inner">
						<div class="other-left">
							<div class="stars">



								<span data-url='https://www.blueeyetour.com/assets_user/img/icons/star_border.svg'></span><span data-url='https://www.blueeyetour.com/assets_user/img/icons/star_border.svg'></span><span data-url='https://www.blueeyetour.com/assets_user/img/icons/star_border.svg'></span><span data-url='https://www.blueeyetour.com/assets_user/img/icons/star_border.svg'></span><span data-url='https://www.blueeyetour.com/assets_user/img/icons/star_border.svg'></span>



							</div>
							<span>
								0								Yorum							</span>
						</div>
						<div class="other-right">
							<p>
								Fiyat							</p>
							<p class="">
																50 € 
							</p>
						</div>
					</div>
				</div>
			</div>
							<div class="other-main
								">
				
				<a href="https://www.blueeyetour.com/Tour/detail/Pamukkale-Tour-Full-Day-from-Kusadasi"></a>
				<div class="other-image">
					<img 
					src="https://www.blueeyetour.com/assets_user/img/placeholder.svg"
					data-src="https://www.blueeyetour.com/assets/resimler/turlar/5a313-traverten2.jpg"
					class="lazy" alt="Pamukkale Turu Tam Gün (Kuşadası'ndan)" />
				</div>
				<div class="other-text-inner">
					<a>
						Pamukkale Turu Tam Gün (Kuşadası'ndan)					</a>
					<div class="bottom-inner">
						<div class="other-left">
							<div class="stars">



								<span data-url='https://www.blueeyetour.com/assets_user/img/icons/star_border.svg'></span><span data-url='https://www.blueeyetour.com/assets_user/img/icons/star_border.svg'></span><span data-url='https://www.blueeyetour.com/assets_user/img/icons/star_border.svg'></span><span data-url='https://www.blueeyetour.com/assets_user/img/icons/star_border.svg'></span><span data-url='https://www.blueeyetour.com/assets_user/img/icons/star_border.svg'></span>



							</div>
							<span>
								0								Yorum							</span>
						</div>
						<div class="other-right">
							<p>
								Fiyat							</p>
							<p class="">
																70 € 
							</p>
						</div>
					</div>
				</div>
			</div>
			</div>
			<div class="places-row">				<div class="other-main
								">
				
				<a href="https://www.blueeyetour.com/Tour/detail/Aphrodisias-Tour-Full-Day"></a>
				<div class="other-image">
					<img 
					src="https://www.blueeyetour.com/assets_user/img/placeholder.svg"
					data-src="https://www.blueeyetour.com/assets/resimler/turlar/5be43-aphrodisias-05.jpg"
					class="lazy" alt="Afrodisias Turu Tam Gün" />
				</div>
				<div class="other-text-inner">
					<a>
						Afrodisias Turu Tam Gün					</a>
					<div class="bottom-inner">
						<div class="other-left">
							<div class="stars">



								<span data-url='https://www.blueeyetour.com/assets_user/img/icons/star_border.svg'></span><span data-url='https://www.blueeyetour.com/assets_user/img/icons/star_border.svg'></span><span data-url='https://www.blueeyetour.com/assets_user/img/icons/star_border.svg'></span><span data-url='https://www.blueeyetour.com/assets_user/img/icons/star_border.svg'></span><span data-url='https://www.blueeyetour.com/assets_user/img/icons/star_border.svg'></span>



							</div>
							<span>
								0								Yorum							</span>
						</div>
						<div class="other-right">
							<p>
								Fiyat							</p>
							<p class="">
																75 € 
							</p>
						</div>
					</div>
				</div>
			</div>
							<div class="other-main
								">
				
				<a href="https://www.blueeyetour.com/Tour/detail/Laodicea-Kaklik-Cave-Honaz-Waterfall-Full-Day-Tour"></a>
				<div class="other-image">
					<img 
					src="https://www.blueeyetour.com/assets_user/img/placeholder.svg"
					data-src="https://www.blueeyetour.com/assets/resimler/turlar/08c46-laodicea_temple-01.jpg"
					class="lazy" alt="Laodikya, Kaklık Mağarası, Honaz Şelalesi Tam Gün Turu" />
				</div>
				<div class="other-text-inner">
					<a>
						Laodikya, Kaklık Mağarası, Honaz Şelalesi Tam Gün Turu					</a>
					<div class="bottom-inner">
						<div class="other-left">
							<div class="stars">



								<span data-url='https://www.blueeyetour.com/assets_user/img/icons/star_border.svg'></span><span data-url='https://www.blueeyetour.com/assets_user/img/icons/star_border.svg'></span><span data-url='https://www.blueeyetour.com/assets_user/img/icons/star_border.svg'></span><span data-url='https://www.blueeyetour.com/assets_user/img/icons/star_border.svg'></span><span data-url='https://www.blueeyetour.com/assets_user/img/icons/star_border.svg'></span>



							</div>
							<span>
								0								Yorum							</span>
						</div>
						<div class="other-right">
							<p>
								Fiyat							</p>
							<p class="">
																75 € 
							</p>
						</div>
					</div>
				</div>
			</div>
						






	</div>

</div>
</div>

	
</div>
</section>
		<section class="abone-inner">
			<div class="container">
				<h4>
					Sadece sizin için harika seyahat ipuçlarımız var 				</h4>
				<p class="under-header">
					Haftalık bir doz seyahat ilhamı için kaydolun.				</p>
				<div class="container">
					<div class="row abone-row">
						<div class="col">
							<form id="abone" method="post" action="https://www.blueeyetour.com/giris/abone">
								<div class="input-field">
									<input id="email" type="email" name="email" required="required">
									<label for="email">
										E-posta adresiniz									</label>
								</div>
								<div class="input-field">
									<button class="btn waves-effect blue darken-1" type="submit">
										Kaydol									</button>	
								</div>
							</form>
						</div>
					
					</div>
					<div class="container">
						<p class="abone-aciklama">
							Kaydolarak, promosyon amaçlı e-posta almayı kabul etmiş olacaksınız. Aboneliğinizi dilediğiniz zaman iptal edebilirsiniz. Daha fazla bilgi almak için, gizlilik bildirimimizi okuyun.						</p>
					</div>
				</div>
			</div>
		</section>
<section class="top-places">
	<div class="container center-align">
		<h4>En popüler Yerler</h4>
		<div class="top-places-inner">

			
				
				
				<div class="top-places-item">
					<a href="https://www.blueeyetour.com/Category/detail/Ankara-Tours">
						<figure>
							<img 
							src="https://www.blueeyetour.com/assets_user/img/placeholder.svg"
							data-src="https://www.blueeyetour.com/assets/resimler/sehirler/d9ab9-anitkabir-05.jpg" 
							class="lazy"
							alt="Ankara Turları">
						</figure>
						<h5>Ankara Turları</h5>
					</a>
				</div>

			
				
				
				<div class="top-places-item">
					<a href="https://www.blueeyetour.com/Category/detail/Konya-Tours">
						<figure>
							<img 
							src="https://www.blueeyetour.com/assets_user/img/placeholder.svg"
							data-src="https://www.blueeyetour.com/assets/resimler/sehirler/58caf-konya-1-720x520.jpg" 
							class="lazy"
							alt="Konya Turları">
						</figure>
						<h5>Konya Turları</h5>
					</a>
				</div>

			
				
				
				<div class="top-places-item">
					<a href="https://www.blueeyetour.com/Category/detail/Nemrut-Tours">
						<figure>
							<img 
							src="https://www.blueeyetour.com/assets_user/img/placeholder.svg"
							data-src="https://www.blueeyetour.com/assets/resimler/sehirler/df452-adiyaman.jpg" 
							class="lazy"
							alt="Nemrut Turları">
						</figure>
						<h5>Nemrut Turları</h5>
					</a>
				</div>

			
				
				
				<div class="top-places-item">
					<a href="https://www.blueeyetour.com/Category/detail/Sanliurfa-Tours">
						<figure>
							<img 
							src="https://www.blueeyetour.com/assets_user/img/placeholder.svg"
							data-src="https://www.blueeyetour.com/assets/resimler/sehirler/add45-goebeklitepe.jpg" 
							class="lazy"
							alt="Şanlıurfa Turları">
						</figure>
						<h5>Şanlıurfa Turları</h5>
					</a>
				</div>

			
				
				
				<div class="top-places-item">
					<a href="https://www.blueeyetour.com/Category/detail/Fethiye-Tours-and-Activities">
						<figure>
							<img 
							src="https://www.blueeyetour.com/assets_user/img/placeholder.svg"
							data-src="https://www.blueeyetour.com/assets/resimler/sehirler/41d90-fethiye-paragliding-3.jpg" 
							class="lazy"
							alt="Fethiye Turları ">
						</figure>
						<h5>Fethiye Turları </h5>
					</a>
				</div>

			
				
				
				<div class="top-places-item">
					<a href="https://www.blueeyetour.com/Category/detail/Canakkale-Daily-Tours">
						<figure>
							<img 
							src="https://www.blueeyetour.com/assets_user/img/placeholder.svg"
							data-src="https://www.blueeyetour.com/assets/resimler/sehirler/56026-gallipoli-3.jpg" 
							class="lazy"
							alt="Çanakkale Günlük Turları">
						</figure>
						<h5>Çanakkale Günlük Turları</h5>
					</a>
				</div>

			
				
				
				<div class="top-places-item">
					<a href="https://www.blueeyetour.com/Category/detail/Pamukkale-Daily-Tours">
						<figure>
							<img 
							src="https://www.blueeyetour.com/assets_user/img/placeholder.svg"
							data-src="https://www.blueeyetour.com/assets/resimler/sehirler/c7828-traverten.jpg" 
							class="lazy"
							alt="Pamukkale Günlük Turları">
						</figure>
						<h5>Pamukkale Günlük Turları</h5>
					</a>
				</div>

			
				
				
				<div class="top-places-item">
					<a href="https://www.blueeyetour.com/Category/detail/istanbul-Tours">
						<figure>
							<img 
							src="https://www.blueeyetour.com/assets_user/img/placeholder.svg"
							data-src="https://www.blueeyetour.com/assets/resimler/sehirler/af641-istanbul-tour-back.jpg" 
							class="lazy"
							alt="İstanbul Turları">
						</figure>
						<h5>İstanbul Turları</h5>
					</a>
				</div>

			
				
				
				<div class="top-places-item">
					<a href="https://www.blueeyetour.com/Category/detail/Antalya-Daily-Tours">
						<figure>
							<img 
							src="https://www.blueeyetour.com/assets_user/img/placeholder.svg"
							data-src="https://www.blueeyetour.com/assets/resimler/sehirler/2ea22-antalya-1_720x520.jpg" 
							class="lazy"
							alt="Antalya Günlük Turları">
						</figure>
						<h5>Antalya Günlük Turları</h5>
					</a>
				</div>

			
				
				
				<div class="top-places-item">
					<a href="https://www.blueeyetour.com/Category/detail/Cappadocia-Tours-and-Activities">
						<figure>
							<img 
							src="https://www.blueeyetour.com/assets_user/img/placeholder.svg"
							data-src="https://www.blueeyetour.com/assets/resimler/sehirler/3ee88-devrent-vadisi-3-kopya_720x520.jpg" 
							class="lazy"
							alt="Kapadokya Günlük Turları">
						</figure>
						<h5>Kapadokya Günlük Turları</h5>
					</a>
				</div>

			
				
				
				<div class="top-places-item">
					<a href="https://www.blueeyetour.com/Category/detail/Hot-Air-Balloon-Flights">
						<figure>
							<img 
							src="https://www.blueeyetour.com/assets_user/img/placeholder.svg"
							data-src="https://www.blueeyetour.com/assets/resimler/sehirler/c5ff1-hot-air-balloons_720x520.jpg" 
							class="lazy"
							alt="Kapadokya Sıcak Hava Balon Turları">
						</figure>
						<h5>Kapadokya Sıcak Hava Balon Turları</h5>
					</a>
				</div>

					</div>
		<a class="btn blue darken-1 waves-effect show-more">
			Daha fazla göster		</a>
	</div>
</section>
<section class="top-places top-destination">
	<div class="container center-align">
		<h4>
			En popüler Şehirler		</h4>
		<div class="top-places-inner">
						<div class="top-countries-item">
				<a href="https://www.blueeyetour.com/Categories/detail/Adiyaman"></a>
				<figure>
					<img 
					src="https://www.blueeyetour.com/assets_user/img/placeholder.svg"
					data-src="https://www.blueeyetour.com/assets/resimler/sehirler/b09da-adiyaman.jpg"
					class="lazy"
					alt="Adıyaman">
				</figure>
				<figcaption class="top-destination-comment">
					<h5>Adıyaman</h5>

					<span>2					Tur ve Otel				</span>
			</figcaption>

		</div>
					<div class="top-countries-item">
				<a href="https://www.blueeyetour.com/Categories/detail/Sanliurfa"></a>
				<figure>
					<img 
					src="https://www.blueeyetour.com/assets_user/img/placeholder.svg"
					data-src="https://www.blueeyetour.com/assets/resimler/sehirler/6d708-goebeklitepe.jpg"
					class="lazy"
					alt="Şanlıurfa">
				</figure>
				<figcaption class="top-destination-comment">
					<h5>Şanlıurfa</h5>

					<span>2					Tur ve Otel				</span>
			</figcaption>

		</div>
					<div class="top-countries-item">
				<a href="https://www.blueeyetour.com/Categories/detail/Trabzon"></a>
				<figure>
					<img 
					src="https://www.blueeyetour.com/assets_user/img/placeholder.svg"
					data-src="https://www.blueeyetour.com/assets/resimler/sehirler/cc62c-uzungol_2.jpg"
					class="lazy"
					alt="Trabzon">
				</figure>
				<figcaption class="top-destination-comment">
					<h5>Trabzon</h5>

					<span>					Tur ve Otel				</span>
			</figcaption>

		</div>
					<div class="top-countries-item">
				<a href="https://www.blueeyetour.com/Categories/detail/Konya"></a>
				<figure>
					<img 
					src="https://www.blueeyetour.com/assets_user/img/placeholder.svg"
					data-src="https://www.blueeyetour.com/assets/resimler/sehirler/ca334-konya-1.jpg"
					class="lazy"
					alt="Konya">
				</figure>
				<figcaption class="top-destination-comment">
					<h5>Konya</h5>

					<span>2					Tur ve Otel				</span>
			</figcaption>

		</div>
					<div class="top-countries-item">
				<a href="https://www.blueeyetour.com/Categories/detail/Safranbolu"></a>
				<figure>
					<img 
					src="https://www.blueeyetour.com/assets_user/img/placeholder.svg"
					data-src="https://www.blueeyetour.com/assets/resimler/sehirler/8154a-safranbolu-evleri-720x520.jpg"
					class="lazy"
					alt="Safrabolu">
				</figure>
				<figcaption class="top-destination-comment">
					<h5>Safrabolu</h5>

					<span>					Tur ve Otel				</span>
			</figcaption>

		</div>
					<div class="top-countries-item">
				<a href="https://www.blueeyetour.com/Categories/detail/Ankara"></a>
				<figure>
					<img 
					src="https://www.blueeyetour.com/assets_user/img/placeholder.svg"
					data-src="https://www.blueeyetour.com/assets/resimler/sehirler/02909-anitkabir-05.jpg"
					class="lazy"
					alt="Ankara">
				</figure>
				<figcaption class="top-destination-comment">
					<h5>Ankara</h5>

					<span>2					Tur ve Otel				</span>
			</figcaption>

		</div>
					<div class="top-countries-item">
				<a href="https://www.blueeyetour.com/Categories/detail/Canakkale"></a>
				<figure>
					<img 
					src="https://www.blueeyetour.com/assets_user/img/placeholder.svg"
					data-src="https://www.blueeyetour.com/assets/resimler/sehirler/1f6f9-truva-ati.jpg"
					class="lazy"
					alt="Çanakkale">
				</figure>
				<figcaption class="top-destination-comment">
					<h5>Çanakkale</h5>

					<span>4					Tur ve Otel				</span>
			</figcaption>

		</div>
					<div class="top-countries-item">
				<a href="https://www.blueeyetour.com/Categories/detail/Turkey-Package-Tours-"></a>
				<figure>
					<img 
					src="https://www.blueeyetour.com/assets_user/img/placeholder.svg"
					data-src="https://www.blueeyetour.com/assets/resimler/sehirler/e9acb-ege-3019017_1920.jpg"
					class="lazy"
					alt="Türkiye Paket Turları">
				</figure>
				<figcaption class="top-destination-comment">
					<h5>Türkiye Paket Turları</h5>

					<span>					Tur ve Otel				</span>
			</figcaption>

		</div>
					<div class="top-countries-item">
				<a href="https://www.blueeyetour.com/Categories/detail/istanbul"></a>
				<figure>
					<img 
					src="https://www.blueeyetour.com/assets_user/img/placeholder.svg"
					data-src="https://www.blueeyetour.com/assets/resimler/sehirler/6b2e0-river-4873198_1920.jpg"
					class="lazy"
					alt="İstanbul">
				</figure>
				<figcaption class="top-destination-comment">
					<h5>İstanbul</h5>

					<span>6					Tur ve Otel				</span>
			</figcaption>

		</div>
					<div class="top-countries-item">
				<a href="https://www.blueeyetour.com/Categories/detail/Pamukkale"></a>
				<figure>
					<img 
					src="https://www.blueeyetour.com/assets_user/img/placeholder.svg"
					data-src="https://www.blueeyetour.com/assets/resimler/sehirler/42cd0-traverten.jpg"
					class="lazy"
					alt="Pamukkale">
				</figure>
				<figcaption class="top-destination-comment">
					<h5>Pamukkale</h5>

					<span>6					Tur ve Otel				</span>
			</figcaption>

		</div>
					<div class="top-countries-item">
				<a href="https://www.blueeyetour.com/Categories/detail/Antalya"></a>
				<figure>
					<img 
					src="https://www.blueeyetour.com/assets_user/img/placeholder.svg"
					data-src="https://www.blueeyetour.com/assets/resimler/sehirler/cfeae-antalya-1_720x520.jpg"
					class="lazy"
					alt="Antalya">
				</figure>
				<figcaption class="top-destination-comment">
					<h5>Antalya</h5>

					<span>4					Tur ve Otel				</span>
			</figcaption>

		</div>
					<div class="top-countries-item">
				<a href="https://www.blueeyetour.com/Categories/detail/Cappadocia"></a>
				<figure>
					<img 
					src="https://www.blueeyetour.com/assets_user/img/placeholder.svg"
					data-src="https://www.blueeyetour.com/assets/resimler/sehirler/04837-stocksnap_f90e2e0647.jpg"
					class="lazy"
					alt="Kapadokya">
				</figure>
				<figcaption class="top-destination-comment">
					<h5>Kapadokya</h5>

					<span>17					Tur ve Otel				</span>
			</figcaption>

		</div>
			

	</div>
	<a class="btn blue darken-1 waves-effect show-more-countries">
		Daha fazla göster	</a>
</div>
</section>
<section class="top-tabs">
	<div class="container">
		<div class="main-t-e">
			<div class="col s12">
				<ul class="tabs">
					<li class="tab col s3">
						<a class="active" href="#topEvents">
							En popüler Şehirler						</a>
					</li>
					<li class="tab col s3">
						<a href="#topCountry">
							En popüler 10 Kategori						</a>
					</li>
				</ul>
			</div>
			<div id="topEvents" class="col s12">
				<div class="topEvents">
					<h5>
						BlueEye'da popüler					</h5>	
					<div class="t-e-inner">
						<div class="t-e-r">
														<a href="https://www.blueeyetour.com/Tour/detail/Fethiye-Cabaret-Night">
								<!-- icon implementation in function.js/425 -->
								<span class="t-e__icon"></span>
								<span>Kabare Şov Gecesi</span>
							</a>
																					<a href="https://www.blueeyetour.com/Tour/detail/Fethiye-Turkish-Bath-">
								<!-- icon implementation in function.js/425 -->
								<span class="t-e__icon"></span>
								<span>Hamam</span>
							</a>
																					<a href="https://www.blueeyetour.com/Tour/detail/White-Water-Rafting-Fethiye">
								<!-- icon implementation in function.js/425 -->
								<span class="t-e__icon"></span>
								<span>Beyaz Su Raftingi </span>
							</a>
																					<a href="https://www.blueeyetour.com/Tour/detail/Fethiye-Sunset-Moonlight-Cruise">
								<!-- icon implementation in function.js/425 -->
								<span class="t-e__icon"></span>
								<span>Günbatımı Mehtap Gezintisi</span>
							</a>
																					<a href="https://www.blueeyetour.com/Tour/detail/Fethiye-Camel-Riding">
								<!-- icon implementation in function.js/425 -->
								<span class="t-e__icon"></span>
								<span>Deve Turu (Fethiye)</span>
							</a>
																					<a href="https://www.blueeyetour.com/Tour/detail/Fethiye-Olympos-Cabin-Cruise-4-Days">
								<!-- icon implementation in function.js/425 -->
								<span class="t-e__icon"></span>
								<span>Fethiye Olimpos Mavi Yolculuk 4 Gün</span>
							</a>
																					<a href="https://www.blueeyetour.com/Tour/detail/Marmaris-icmeler-Tour">
								<!-- icon implementation in function.js/425 -->
								<span class="t-e__icon"></span>
								<span>Marmaris İcmeler Turu</span>
							</a>
																					<a href="https://www.blueeyetour.com/Tour/detail/Scuba-Diving-Fethiye">
								<!-- icon implementation in function.js/425 -->
								<span class="t-e__icon"></span>
								<span>Tüplü Dalış Fethiye</span>
							</a>
																					<a href="https://www.blueeyetour.com/Tour/detail/Fethiye-Horse-Riding-Tours">
								<!-- icon implementation in function.js/425 -->
								<span class="t-e__icon"></span>
								<span>At Turu (Fethiye)</span>
							</a>
																					<a href="https://www.blueeyetour.com/Tour/detail/Fethiye-Jeep-Safari">
								<!-- icon implementation in function.js/425 -->
								<span class="t-e__icon"></span>
								<span>Jeep Safari</span>
							</a>
																					<a href="https://www.blueeyetour.com/Tour/detail/12-Islands-Daily-Boat-Tour">
								<!-- icon implementation in function.js/425 -->
								<span class="t-e__icon"></span>
								<span>12 Adalar Günlük Tekne Turu</span>
							</a>
																					<a href="https://www.blueeyetour.com/Tour/detail/Fethiye-Saklikent-Tlos-Yakapark-Tour">
								<!-- icon implementation in function.js/425 -->
								<span class="t-e__icon"></span>
								<span>Saklıkent Tlos Yakapark Turu</span>
							</a>
																					<a href="https://www.blueeyetour.com/Tour/detail/Fethiye-Dalyan-Mud-Bath-">
								<!-- icon implementation in function.js/425 -->
								<span class="t-e__icon"></span>
								<span>Dalyan Çamur Banyosu</span>
							</a>
							</div><div class="t-e-l">														<a href="https://www.blueeyetour.com/Tour/detail/3-Days-Safranbolu-Amasra-Tour-From-istanbul">
								<!-- icon implementation in function.js/425 -->
								<span class="t-e__icon"></span>
								<span>İstanbul'dan 3 Gün Safranbolu & Amasra Turu</span>
							</a>
																					<a href="https://www.blueeyetour.com/Tour/detail/2-Days-Safranbolu-Amasra-Tour-From-istanbul">
								<!-- icon implementation in function.js/425 -->
								<span class="t-e__icon"></span>
								<span>İstanbul'dan 2 Gün Safranbolu Amasra Turu</span>
							</a>
																					<a href="https://www.blueeyetour.com/Tour/detail/Daily-Uzungol-Tour">
								<!-- icon implementation in function.js/425 -->
								<span class="t-e__icon"></span>
								<span>Uzungöl Turu</span>
							</a>
																					<a href="https://www.blueeyetour.com/Tour/detail/Daily-Ayder-Tour">
								<!-- icon implementation in function.js/425 -->
								<span class="t-e__icon"></span>
								<span>Ayder Turu</span>
							</a>
																					<a href="https://www.blueeyetour.com/Tour/detail/Giresun-Ordu-Cable-Car-Tour">
								<!-- icon implementation in function.js/425 -->
								<span class="t-e__icon"></span>
								<span>Giresun Ordu Turu</span>
							</a>
																					<a href="https://www.blueeyetour.com/Tour/detail/Sumela-Karaca-Zigana-Hamsikoy-Tour">
								<!-- icon implementation in function.js/425 -->
								<span class="t-e__icon"></span>
								<span>Sümela Karaca Torul Zigana Hamsiköy</span>
							</a>
																					<a href="https://www.blueeyetour.com/Tour/detail/Daily-Hidirnebi--Cal-Cave-Tour">
								<!-- icon implementation in function.js/425 -->
								<span class="t-e__icon"></span>
								<span>Hıdırnebi Çal Sera Gölü</span>
							</a>
																					<a href="https://www.blueeyetour.com/Tour/detail/Daily-Trabzon-City-Tour">
								<!-- icon implementation in function.js/425 -->
								<span class="t-e__icon"></span>
								<span>Günlük Trabzon Şehir Turu</span>
							</a>
																					<a href="https://www.blueeyetour.com/Tour/detail/Green-Bursa-Tour-From-Istanbul">
								<!-- icon implementation in function.js/425 -->
								<span class="t-e__icon"></span>
								<span>Yeşil Bursa Turu (İstanbul'dan)</span>
							</a>
																					<a href="https://www.blueeyetour.com/Tour/detail/Ankara-Day-Tour-Private-From-Cappadocia">
								<!-- icon implementation in function.js/425 -->
								<span class="t-e__icon"></span>
								<span>Kapadokya'dan Ankara Günlük Turu (Özel) </span>
							</a>
																					<a href="https://www.blueeyetour.com/Tour/detail/Ankara-Daily-Tour-Private">
								<!-- icon implementation in function.js/425 -->
								<span class="t-e__icon"></span>
								<span>Ankara Günlük Tur (Özel)</span>
							</a>
															

						</div>

					</div>
					<p>
						Diğer hangi şehirlerde etkinliklerimizin olduğunu merak ediyor musunuz?						<a href="https://www.blueeyetour.com/All_categories">
							Tur ve etkinlikleri şehirleri göre seç.						</a>
					</p>
				</div>
			</div>
			<div id="topCountry" class="col s12">
				<div class="topCountry">
					<h5>
						En popüler 10 Kategori					</h5>

					<section class="top-places">
						<div class="top-places-inner">

								

							<div class="top-places-inner__div">
								<a href="https://www.blueeyetour.com/Categories/detail/Adiyaman"></a>
								<figure>
									<img 
									src="https://www.blueeyetour.com/assets_user/img/placeholder.svg"
									data-src="https://www.blueeyetour.com/assets/resimler/sehirler/b09da-adiyaman.jpg"
									class="lazy"
									alt="Adıyaman" />
								</figure>
								<h5>Adıyaman</h5>
							</div>

								

							<div class="top-places-inner__div">
								<a href="https://www.blueeyetour.com/Categories/detail/Sanliurfa"></a>
								<figure>
									<img 
									src="https://www.blueeyetour.com/assets_user/img/placeholder.svg"
									data-src="https://www.blueeyetour.com/assets/resimler/sehirler/6d708-goebeklitepe.jpg"
									class="lazy"
									alt="Şanlıurfa" />
								</figure>
								<h5>Şanlıurfa</h5>
							</div>

								

							<div class="top-places-inner__div">
								<a href="https://www.blueeyetour.com/Categories/detail/Trabzon"></a>
								<figure>
									<img 
									src="https://www.blueeyetour.com/assets_user/img/placeholder.svg"
									data-src="https://www.blueeyetour.com/assets/resimler/sehirler/cc62c-uzungol_2.jpg"
									class="lazy"
									alt="Trabzon" />
								</figure>
								<h5>Trabzon</h5>
							</div>

								

						</div>
					</section>

					<div class="t-e-inner justify-center">
						
							



						
							



						
							



						
							

							<a href="https://www.blueeyetour.com/Categories/detail/Konya"><span>2</span><span>
								Konya							</span></a>	
							



						
							

							<a href="https://www.blueeyetour.com/Categories/detail/Safranbolu"><span></span><span>
								Safrabolu							</span></a>	
							



						
							

							<a href="https://www.blueeyetour.com/Categories/detail/Ankara"><span>2</span><span>
								Ankara							</span></a>	
							



						
							

							<a href="https://www.blueeyetour.com/Categories/detail/Canakkale"><span>4</span><span>
								Çanakkale							</span></a>	
							



						
							

							<a href="https://www.blueeyetour.com/Categories/detail/Turkey-Package-Tours-"><span></span><span>
								Türkiye Paket Turları							</span></a>	
							



						
							

							<a href="https://www.blueeyetour.com/Categories/detail/istanbul"><span>6</span><span>
								İstanbul							</span></a>	
							



						
							

							<a href="https://www.blueeyetour.com/Categories/detail/Pamukkale"><span>6</span><span>
								Pamukkale							</span></a>	
							



						
							

							<a href="https://www.blueeyetour.com/Categories/detail/Antalya"><span>4</span><span>
								Antalya							</span></a>	
							



						
							

							<a href="https://www.blueeyetour.com/Categories/detail/Cappadocia"><span>17</span><span>
								Kapadokya							</span></a>	
							



											</div>

				</div>
			</div>
		</div>
	</div>
</section>
</main>

<div class="fixed-action-btn">
	<a class="btn-floating btn-large whatsapp-green tooltipped" data-tooltip="Size nasıl yardımcı olabiliriz?" href="https://wa.me/905435052677">
		<svg version="1.1" fill="white" id="whatsapp-green__icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="30px" height="30px" viewBox="0 0 90 90" xml:space="preserve">
			<g>
				<path id="WhatsApp" d="M90,43.841c0,24.213-19.779,43.841-44.182,43.841c-7.747,0-15.025-1.98-21.357-5.455L0,90l7.975-23.522
				c-4.023-6.606-6.34-14.354-6.34-22.637C1.635,19.628,21.416,0,45.818,0C70.223,0,90,19.628,90,43.841z M45.818,6.982
				c-20.484,0-37.146,16.535-37.146,36.859c0,8.065,2.629,15.534,7.076,21.61L11.107,79.14l14.275-4.537
				c5.865,3.851,12.891,6.097,20.437,6.097c20.481,0,37.146-16.533,37.146-36.857S66.301,6.982,45.818,6.982z M68.129,53.938
				c-0.273-0.447-0.994-0.717-2.076-1.254c-1.084-0.537-6.41-3.138-7.4-3.495c-0.993-0.358-1.717-0.538-2.438,0.537
				c-0.721,1.076-2.797,3.495-3.43,4.212c-0.632,0.719-1.263,0.809-2.347,0.271c-1.082-0.537-4.571-1.673-8.708-5.333
				c-3.219-2.848-5.393-6.364-6.025-7.441c-0.631-1.075-0.066-1.656,0.475-2.191c0.488-0.482,1.084-1.255,1.625-1.882
				c0.543-0.628,0.723-1.075,1.082-1.793c0.363-0.717,0.182-1.344-0.09-1.883c-0.27-0.537-2.438-5.825-3.34-7.977
				c-0.902-2.15-1.803-1.792-2.436-1.792c-0.631,0-1.354-0.09-2.076-0.09c-0.722,0-1.896,0.269-2.889,1.344
				c-0.992,1.076-3.789,3.676-3.789,8.963c0,5.288,3.879,10.397,4.422,11.113c0.541,0.716,7.49,11.92,18.5,16.223
				C58.2,65.771,58.2,64.336,60.186,64.156c1.984-0.179,6.406-2.599,7.312-5.107C68.398,56.537,68.398,54.386,68.129,53.938z"/>
			</g>
		</svg>
	</a>
</div>


<div class="carousel">
	<a class="carousel-item" href="#tripadvisor!">
		<img src="https://www.blueeyetour.com/assets_user/img/placeholder.svg"
		data-src="https://www.blueeyetour.com/assets_user/img/tripadvisor.jpg"
		class="lazy"
		alt="tripadvisor logo"
		/>
	</a>
	<a class="carousel-item" href="#tursap!">
		<img src="https://www.blueeyetour.com/assets_user/img/placeholder.svg"
		data-src="https://www.blueeyetour.com/assets_user/img/tursap.jpg"
		class="lazy"
		alt="tursab logo"
		/>
	</a>
	<a class="carousel-item" href="#viator!">
		<img src="https://www.blueeyetour.com/assets_user/img/placeholder.svg"
		data-src="https://www.blueeyetour.com/assets_user/img/viator.jpg"
		class="lazy"
		alt="viator logo"
		/>
	</a>
	<a class="carousel-item" href="#ctrip!">
		<img src="https://www.blueeyetour.com/assets_user/img/placeholder.svg"
		data-src="https://www.blueeyetour.com/assets_user/img/ctrip.jpg"
		class="lazy"
		alt="ctrip logo"
		/>
	</a>
	<a class="carousel-item" href="#expedia!">
		<img src="https://www.blueeyetour.com/assets_user/img/placeholder.svg"
		data-src="https://www.blueeyetour.com/assets_user/img/expedia.jpeg"
		class="lazy"
		alt="expedia logo"
		/>
	</a>
	<a class="carousel-item" href="#trip!">
		<img src="https://www.blueeyetour.com/assets_user/img/placeholder.svg"
		data-src="https://www.blueeyetour.com/assets_user/img/trip.jpg"
		class="lazy"
		alt="trip logo"
		/>
	</a>
</div>

<footer class="page-footer">
	<div class="container">
		<div class="row">
			
			<div class="col l3 s12">
				<h5 class="white-text">
					Destek				</h5>
				<ul>
					<li>
						<a class="grey-text text-lighten-3" href="https://www.blueeyetour.com/contact">
							İletişim						</a>
					</li>
					<li>
						<a class="grey-text text-lighten-3" href="https://www.blueeyetour.com/pages/detail/yasal">
							Yasal						</a>
					</li>
					<li>
						<a class="grey-text text-lighten-3" href="https://www.blueeyetour.com/pages/detail/gizlilik-politikasi">
							Gizlilik Politikası						</a>
					</li>
					<li>
						<a class="grey-text text-lighten-3" href="https://www.blueeyetour.com/pages/detail/kullanim-kosullari">
							Kullanım koşulları						</a>
					</li>
				</ul>
			</div>
			<div class="col l3 s12">
				<h5 class="white-text">
					Şirket				</h5>

				<ul>
					<li>
						<a class="grey-text text-lighten-3" href="https://www.blueeyetour.com/pages/detail/hakkimizda">
							Şirket						</a>
					</li>
					<li>
						<a class="grey-text text-lighten-3" href="https://www.blueeyetour.com/pages/detail/kariyer">
							Kariyer						</a>
					</li>
					<li>
						<a class="grey-text text-lighten-3" href="https://www.blueeyetour.com/pages/detail/mesafeli-satis-sozlesmesi">
							Mesafeli Satış Sözleşmesi						</a>
					</li>
					<li>
						
					</li>
				</ul>
			</div>
			
			<div class="col l3 s12">
				<h5 class="white-text">
					Bizimle Çalışın				</h5>
				<ul>
					<li>
						<a class="grey-text text-lighten-3" href="https://www.blueeyetour.com/pages/detail/ortaklik-yonetimi">
							Tedarikçi Yönetimi						</a>
					</li>
				</ul>
				<h5 class="white-text">
					Ödeme seçenekleri				</h5>
				<div class="payments">
					<img src="https://www.blueeyetour.com/assets_user/img/visa.svg" alt="visa">
					<img src="https://www.blueeyetour.com/assets_user/img/maestro.svg" alt="maestro">
					<img src="https://www.blueeyetour.com/assets_user/img/mastercard.svg" alt="mastercard">
				</div>
			</div>
			<div class="col l3 s12">
				<a href="https://www.tursab.org.tr/tr/ddsv" rel="noreferrer" target="_blank">
					<img style="margin: 1.0933333333rem 0 .656rem 0;" src="https://www.blueeyetour.com/assets_user/img/tursab-tr.png" alt="TURSAB logo" />
				</a>
				
			</div>
		</div>
	</div>
	<div class="footer-copyright">
		<div class="container">
			<a href="?php echo base_url(); ?>pages/detail/hakkimizda">© 2020 Blue Eye.
				Tüm haklar saklıdır			</a>
			<div class="social">
					
											<a href="https://www.facebook.com/blueeyetour">
							<img src="https://www.blueeyetour.com/assets_user/img/001-facebook.svg" alt="facebook">
						</a>
					
											<a href="https://www.instagram.com/blueeyetour">
							<img src="https://www.blueeyetour.com/assets_user/img/002-instagram.svg" alt="instagram">
						</a>
					
					
					
					
					
									</a>

					</div>
	</div>
</div>
</footer>

<script src="https://www.blueeyetour.com/assets_user/js/lazy-load.js"></script>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-144549165-1"></script>
<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());
	
	gtag('config', 'UA-144549165-1');
</script>


<!-- jQuery.js -->
<script src="https://www.blueeyetour.com/assets_user/js/jquery-3.4.1.min.js"></script>
<!-- materalize.js -->
<script src="https://www.blueeyetour.com/assets_user/js/materialize.min.js"></script>
<script>
	var elem = document.querySelector('.tabs');
	var instance = M.Tabs.init(elem);
	document.addEventListener('DOMContentLoaded', function() {
		var elems = document.querySelectorAll('.parallax');
		var instances = M.Parallax.init(elems);
	});
</script>
<!-- function.js -->
<script src="https://www.blueeyetour.com/assets_user/js/function.js"></script>
</body>
</html>