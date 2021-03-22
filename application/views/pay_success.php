<!DOCTYPE html>
<html lang="<?php echo $this->session->userdata('lng')["lang"]; ?>">
<head>
	<?php $this->load->view('favicon'); ?>
	<meta charset="UTF-8">
	<title>
		<?php	if( $ayar ) :  foreach( $ayar  as $dizi ) :    ?>	

			<?php echo strip_tags($dizi["kisa_aciklama".$uz]); ?>	

		<?php 	 endforeach;  endif;  ?>
	</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets_user/pay_success/reset.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700|Roboto:300,400,500&display=swap&subset=cyrillic,cyrillic-ext,latin-ext,vietnamese" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets_user/pay_success/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
	<section class="payment">
		<header class="payment-header">
			<object type="image/svg+xml" data="<?php echo base_url(); ?>assets_user/pay_success/success.svg" width="48" height="48" class="payment-header__icon">
				Your browser does not support SVG
			</object>
			<h1 class="payment-header__name"><?php echo $this->session->userdata('user_person_name'); ?></h1>
			<p class="payment-header__desc">
				<?php echo $this->session->userdata('lng')['pay_ok_title']; ?>
			</p>
		</header>
		<main class="payment-inner">
			<ul class="payment-inner-list">
				<li class="tour-info payment-inner-list__item">
					<span class="tour-info__left">
						<?php echo $this->session->userdata('lng')['pay_ok_rez_no']; ?>
					</span>
					<span class="tour-info__right">
						<?php 
						$adet=count($sip);
						$n=0;
						if( $sip ) : foreach( $sip as $dizi ) : 	
							if($n!=0) {
								echo",";
							}
							echo $dizi["rez_no"]; 


							$n=$n+1; endforeach;  endif; 	?>	

						</span>
					</li>
					<li class="tour-info payment-inner-list__item">
						<span class="tour-info__left">
							<?php echo $this->session->userdata('lng')['pay_ok_lead']; ?>
						</span>
						<span class="tour-info__right">
							<?php echo $this->session->userdata('user_person_name'); ?>
						</span>
					</li>
				</ul>
				<article class="payment-inner-desc">
					<?php echo $this->session->userdata('lng')['pay_ok_desc_1']; ?>	
					<br>
					<?php echo $this->session->userdata('lng')['pay_ok_desc_2']; ?>
					<br>
					<?php echo $this->session->userdata('lng')['pay_ok_desc_3']; ?>
					<br>

				</article>
			</main>
			<footer class="payment-footer">
				<span><a class="payment-footer__link secondary-link" href="https://wa.me/905435052677">WhatsApp</a></span>
				<span class="payment-footer__link secondary-link" onclick="window.printDiv('.print_div');"><?php echo $this->session->userdata('lng')['pay_ok_print']; ?></span>
			</footer>
		</section>
		<nav class="payment-nav">
			<ul class="payment-nav-list nav-list">
				<li class="nav-list__item">
					<a class="nav-list__item__link" href="<?php echo base_url(); ?>">
						<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 5.69l5 4.5V18h-2v-6H9v6H7v-7.81l5-4.5M12 3L2 12h3v8h6v-6h2v6h6v-8h3L12 3z"/></svg>

						<?php echo $this->session->userdata('lng')['index']; ?>
					</a>
				</li>
				<li class="nav-list__item">
					<a class="nav-list__item__link" href="<?php echo base_url(); ?>/reservation">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="none" d="M0 0h24v24H0V0z"/><path d="M19 3h-1V1h-2v2H8V1H6v2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V9h14v10zM5 7V5h14v2H5zm5.56 10.46l5.93-5.93-1.06-1.06-4.87 4.87-2.11-2.11-1.06 1.06z"/></svg>
						<?php echo $this->session->userdata('lng')['rzrvsyn']; ?>
					</a>
				</li>
			</ul>
		</nav>
		<div class="print_div" hidden>
			<?php $n=0; $total=0; if( $rez_getir ) : foreach( $rez_getir as $dizi ) : ?>

			<?php
			$adi=$tur_bilgi[$n][0]["adi".$uz];
			$resim=$tur_bilgi[$n][0]["resim"];
			$sure=$tur_bilgi[$n][0]["sure"];
			$seo_adi=$tur_bilgi[$n][0]["seo_adi"];
			$sticker=$tur_bilgi[$n][0]["sticker"];
			$aciklama=$tur_bilgi[$n][0]["aciklama".$uz];



			$kod=$tur_bilgi[$n][0]["kod"];
			$tur_donemi=$tur_bilgi[$n][0]["tur_donemi"];				

			$kategori=$kat_bilgi[$n];
			$kat_bilgi_seo=$kat_bilgi_seo[$n];

			$baslangic_tarihi=$dizi["bas_tar"];
			$bitis_tarihi=$dizi["bit_tar"];
			$baslangic_saati=$dizi["baslangic_saati"];
			$bitis_saati=$dizi["bitis_saati"];
			$indirimsiz=$dizi["indirimsiz"];
			$tutar=$dizi["tutar"];
			$yetiskin_adet=$dizi["yetiskin"];
			$cocuk_adet=$dizi["cocuk"];
			$bebek_adet=$dizi["bebek"];
			$admin_aciklama=$dizi["admin_aciklama"];	
			$durum=$dizi["durum"];					
			$id=$dizi["id"];
			$rez_no=$dizi["rez_no"];				
			$kullanici_id=$dizi["kullanici_id"];
			$tur_id=$dizi["tur_id"];
			$bulusma_noktasi = $tur_bilgi[$n][0]["bulusma_noktasi"];	
			$dahili_olanlar = $tur_bilgi[$n][0]["dahil_olanlar"];	
			$iptal_durum=$dizi["iptal_durum"];					

			$total=$total+$tutar;



			?>
			<div class="rez-print rez-print--<?php echo $id; ?>">
				<div class="rez-print__check">
					<div class="rez-print__left-side rez-ticket">
						<h4 class="rez-ticket__company rez-company">
							Blue Eye Tour 
							<img class="rez-company__logo" src="<?php echo base_url() ?>assets_user/img/blue_eye_logo.svg" alt="Blue Eye Logo">
						</h4>
						<h5 class="rez-ticket__name"><?php echo $this->session->userdata('user_person_name'); ?></h5>
						<p class="rez-ticket__tour-name"><?php echo $adi; ?></p>
						<p class="rez-ticket__date"><?php echo $baslangic_tarihi ?></p>
						<p class="rez-ticket__participant">
							<?php if ($yetiskin_adet >= 1): ?>
								<?php echo $yetiskin_adet." ".$this->session->userdata('lng')["n_ytskn"]; ?>
							<?php endif ?>
							<?php if ($cocuk_adet >= 1): ?>
								<?php echo ", ".$cocuk_adet." ".$this->session->userdata('lng')["n_cck"]; ?>
							<?php endif ?>
							<?php if ($bebek_adet >= 1): ?>
								<?php echo ", ".$bebek_adet." ".$this->session->userdata('lng')["bbk"]; ?>
							<?php endif ?>

						</p>
					</div>
					<div class="rez-print__right-side rez-print-no">
						<h5 class="rez-print-no__title">
							<?php echo $this->session->userdata('lng')["rez_print_no"]; ?>
						</h5>
						<h3 class="rez-print-no__id"><?php echo $rez_no; ?></h3>
					</div>
				</div>
				<div class="rez-print__other rez-other">
					<div class="rez-other--row">
						<div class="rez-other--row__block rez-other-cancel">
							<h5 class="rez-other__title"><?php echo $this->session->userdata('lng')["rez_print_need_make_change"]; ?></h5>
							<p class="rez-other-cancel__text"><?php echo $this->session->userdata('lng')["rez_print_visit_booking"]; ?></p>
						</div>
						<div class="rez-other--row__block rez-other-contact">
							<h5 class="rez-other__title"><?php echo $this->session->userdata('lng')["rez_print_tour_specific"]; ?></h5>
							<p class="rez-other-cancel__text">
								<span>Blue Eye Tour</span>
								<br>
								<span>+90 (543) 505 26-77</span>
							</p>
						</div>
					</div>
					<div class="rez-other--row">
						<div class="rez-other--row__block">
							<h5 class="rez-other__title">
								<?php echo $this->session->userdata('lng')["rez_print_departure_title"]; ?>
							</h5>
							<span class="rez-other__subtitle">
								<?php echo $this->session->userdata('lng')["rez_print_departure_start_time"]; ?>
							</span>
							<p class="rez-other__desc"><?php echo $baslangic_saati; ?></p>
							<span class="rez-other__subtitle">
								<?php echo $this->session->userdata('lng')["rez_print_departure_end_time"]; ?>
							</span>
							<p class="rez-other__desc"><?php echo $bitis_saati; ?></p>
							<span class="rez-other__subtitle">
								<?php echo $this->session->userdata('lng')["rez_print_departure_end_time"]; ?>
							</span>
							<p class="rez-other__desc"><?php echo $bulusma_noktasi; ?></p>
						</div>
						<div class="rez-other--row__block">
							<h5 class="rez-other__title">
								<?php echo $this->session->userdata('lng')["rez_print_inc_and_exc_title"]; ?>
							</h5>
							<p class="rez-other__desc"><?php echo $dahili_olanlar; ?></p>
						</div>

					</div>
					<div class="rez-other--row">
						<div>
							<h5 class="rez-other__title">
								<?php echo $this->session->userdata('lng')["rez_print_cancel_policy_title"]; ?>
							</h5>
							<p class="rez-other__desc">
								<?php echo $this->session->userdata('lng')["rez_print_cancel_policy_desc"]; ?>
							</p>
						</div>
					</div>
				</div>
			</div>
			<?php $n = $n + 1; endforeach; endif; ?>
		</div>
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-144549165-1"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());

			gtag('config', 'UA-144549165-1');
		</script>
		<script>
			gtag('event', 'conversion', {
				'send_to': 'AW-1015959028/wHpkCJGv7cgBEPSbueQD',
				'value': 5.0,
				'currency': 'EUR',
				'transaction_id': ''
			});
		</script>
		<script type="text/javascript">
			window.base_url = '<?php echo base_url() ?>'
			window.printDiv = el => {
				let element = document.querySelector(el);
				let printWindow = window.open('','Print-Window');
				let link = '<link rel="stylesheet" type="text/css" href="' + window.base_url + 'assets_user/css/print.css">'
				printWindow.document.open();
				printWindow.document.write('<html>' + link + '<body onload="window.print()">'+element.innerHTML+'</body></html>');
				printWindow.document.close();
				window.onafterprint = function(){
					printWindow.close();
				}
				setTimeout(() => printWindow.close(),10);
			}
		</script>
	</body>
	</html>