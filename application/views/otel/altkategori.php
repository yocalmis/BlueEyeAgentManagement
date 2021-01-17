<!DOCTYPE html>
<html lang="tr">
<head>
			<title>
		<?php	if( $ayar ) :  foreach( $ayar  as $dizi ) :    ?>	
						<?php 
		/*		if($this->session->userdata('lng_turu')=="Eng"){ echo strip_tags($dizi["kisa_aciklama"]); } 
				if($this->session->userdata('lng_turu')=="Tr"){echo strip_tags($dizi["kisa_aciklama_tr"]);} 	
				if($this->session->userdata('lng_turu')=="Ru"){ echo strip_tags($dizi["kisa_aciklama_ru"]);} 	
		*/
echo strip_tags($dizi["kisa_aciklama".$uz]);					
				?>	
		<?php 	 endforeach;  endif;  ?>
	</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	
		<?php	if( $alt_kat_bilgi ) :  foreach( $alt_kat_bilgi  as $dizi ) :    ?>	

	<meta name="keyword" content="<?php echo strip_tags($dizi["anahtar"]); ?>">

						<?php 	 endforeach;  endif;  ?>	
	
	<?php $this->load->view('favicon'); ?>	
	
	<!-- Chrome, Firefox OS and Opera -->
	<meta name="theme-color" content="#1A2B49"> 
	<!-- Windows Phone --> 
	<meta name="msapplication-navbutton-color" content="#1A2B49">
	 <!-- iOS Safari -->
	 <meta name="apple-mobile-web-app-status-bar-style" content="#1A2B49"> 
	<!-- materialize.css -->
	<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets_user/css/materialize.min.css"  media="screen,projection"/>
	<!-- master.css -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets_user/css/master.css">
</head>
<body>
	<?php $this->load->view('header_ana'); ?>

	<main>
		<script>
			function navFix() {
				let getNav;
			
				const mq = window.matchMedia('(max-width: 768px)');
				if (mq.matches) {
					getNav = document.querySelector('nav > .nav-wrapper');
				
				}
				else {
					getNav = document.querySelector('nav > .nav-wrapper:not(.main-menu)')
				}

				if (getNav == null) {
					return false;
				}

				getHeight = getNav.offsetHeight;

				document.querySelector('main').style.marginTop = getHeight+'px';
			}
			navFix();
		</script>
		<section class="rezerv"><?php		if( $alt_kat_bilgi ) :  foreach( $alt_kat_bilgi as $dizi ) :  ?>
			<div class="parallax-container">
				<div class="parallax"><img src="<?php echo base_url(); ?>assets/resimler/sehirler/<?php echo $dizi["resim"];  ?>"></div>
				<div class="rezerv-inner">
					<div class="buy-ticket card-panel"> 
						<h1>
			<?php 
			/*	if($this->session->userdata('lng_turu')=="Eng"){ echo $adi=$dizi["adi"]; } 
				if($this->session->userdata('lng_turu')=="Tr"){ echo $adi=$dizi["adi_tr"]; } 	
				if($this->session->userdata('lng_turu')=="Ru"){  echo $adi=$dizi["adi_ru"]; } 
				*/
				echo $adi=$dizi["adi".$uz]; 										
				?>	
	 				
				<?php	 endforeach;  endif;  ?>
				 
				</h1>
						<h3><?php echo $this->session->userdata('lng')["ana_ktgr_slogan"]; ?></h3>
						<form action="<?php echo base_url(); ?>otels/Search/Word" method="Post" class="buy-form">
						  <div class="ticket-form-inner">
						    <div class="input-field takvim">
						   	  <input id="start_date" name="bas_t" type="text" class="datepicker">
							   		   <input id="end_dat" name="word" value="<?php echo $dizi["adi"];  ?>"  type="hidden" >	
									   <input id="end_dat" name="id" value="<?php echo $dizi["id"];  ?>"  type="hidden" >	
						  	    <label for="start_date">Check in</label>
						    </div>
						    <div class="input-field takvim">
						  	    <input id="end_date" name="bit_t"  type="text" class="datepicker">
						  	    <label for="end_date">Check out</label>
						    </div>
						    <div class="input-field">
						    	
								<button type="submit" href="#" class="btn waves-effect">
									<?php echo $this->session->userdata('lng')["ara"]; ?>
								</button>
						    </div>
						  </div>
						</form>
					</div>
				</div>
			</div>
		</section>
		<!--
		<section class="best-choose">
			<div class="container center-align">
				<h4>En popüler seçim</h4>
				<div class="best-choose-inner">
					<a href="#"></a>
					<div class="choose-image">
						<figure class="gradient-wrap">
							<img src="<?php echo base_url(); ?>assets_user/img/tour_img-875474-92.jpg" alt="Vatikan">
								<span class="other-bestseller b-e-o">
									<img src="<?php echo base_url(); ?>assets_user/img/blue_eye_1.png" alt="Best Tour">BlueEye Orijinal
								</span>
						</figure>
					</div>
					<div class="choose-text">
						<div class="inner">
							<h5>Skip-the-Line Vatikan, Sistine Şapeli, Aziz Petrus Turu</h5>
							<div class="choose-other">
								<div class="stars">
									<i class="material-icons">star</i>
									<i class="material-icons">star</i>
									<i class="material-icons">star</i>
									<i class="material-icons">star_half</i>
									<i class="material-icons">star_border</i>
								</div>
								<span>684 Yorum</span>
							</div>
							<p>Vatikan'ın hayranlık uyandıran sanatına kendinizi müzeye ve bazilikalara hiç vakit kaybetmeden ulaşmanız için daha fazla zaman ayırın. Uzman…</p>
						</div>
						<div class="timeprice">
							<span class="other-duration"><i class="material-icons">restore</i> <b>Süre: </b> 2 Gün</span>
							<span class="other-price">
								<p>Başlangıç Fiyatı</p>
								<p>₺ 125</p>
							</span>
						</div>
					</div>
				</div>
			</div>
		</section>
		-->	
				 
		<section class="place category-place">
			<div class="container center-align">
				<h4>   <?php 		/*		if($this->session->userdata('lng_turu')=="Eng"){ echo $adi=$dizi["adi"]; } 
				if($this->session->userdata('lng_turu')=="Tr"){ echo $adi=$dizi["adi_tr"]; } 	
				if($this->session->userdata('lng_turu')=="Ru"){  echo $adi=$dizi["adi_ru"]; } */
				echo $adi=$dizi["adi".$uz];  ?>: 
				<?php echo $this->session->userdata('lng')["tum_otel"]; ?>
					
				</h4>
				<div class="places-inner">
					<div class="places-other">
					
						<?php $n=0; if( $alt_kat_turlar ) :  foreach( $alt_kat_turlar as $dizi ) :  ?>
						
						<div class="other-main">
							<a href="<?php echo base_url(); ?>otels/otel/detail/<?php echo $dizi["seo_adi"]; ?>"></a>
							<div class="other-image">
								<img src="<?php echo base_url(); ?>assets/resimler/turlar/<?php echo $dizi["resim_2"]; ?>" alt="" />
								
								<?php if($dizi["tukenme"]==1){
							
echo'<span class="other-bestseller tuken">
									<img src="'.base_url().'assets_user/img/warning.svg" alt="Best Tour">'.$this->session->userdata('lng')["tknm_muhtml"].'
								</span>';							
								
							} 
							else{
								
							 if($dizi["sticker"]==1){
								 
								echo'<span class="other-bestseller b-e-o">
									<img src="'.base_url().'assets_user/img/blue_eye_1.png" alt="Best Tour">'.$this->session->userdata('lng')["blue_orjnl"].'
								</span>'; 
								 
							 }
							 
							 else if($dizi["cok_satan"]==1){
								 
								echo'<span class="other-bestseller bestseller">
									<img src="'.base_url().'assets_user/img/blue_eye_1.png" alt="Best Tour">'.$this->session->userdata('lng')["cok_stn"].'
								</span>'; 
								 
							 }
							 
							 else{}
							 
								
							}
							?>		
							
					
								
								
								
							</div>
							<div class="other-text-inner">
								<a href="#"><?php
		/*		if($this->session->userdata('lng_turu')=="Eng"){  echo $dizi["adi"]; } 
				if($this->session->userdata('lng_turu')=="Tr"){  echo $dizi["adi_tr"]; } 	
				if($this->session->userdata('lng_turu')=="Ru"){  echo $dizi["adi_ru"]; } 	
		*/			
					echo $dizi["adi".$uz]; 	
				?></a>
								<span class="other-duration"><i class="material-icons">restore</i> <b><?php echo $this->session->userdata('lng')["sure"]; ?>:  </b><?php  echo $dizi["sure"]; ?></span>
								<div class="bottom-inner">
									<div class="other-left">
										<div class="stars">
												<?php 											
											
	$puan=$puan[$dizi["kod"]]["tur_puan_genel"];  
	$star=floor($puan);
	$dongu=$star-1;
    for($i=0; $i<=$dongu; $i++){
		
	echo '<i  class="material-icons">star</i>';	
	}
	
	if($puan>$star){echo'<i  class="material-icons">star_half</i>';}
	
	$bos=4-$dongu;
	
	if($puan>$star){$bos=$bos-1;}
	$bodongu=$bos-1;
	
    for($i=0; $i<=$bodongu; $i++){
		
	echo '<i  class="material-icons">star_border</i>';	
	}	
											
					?>					
						
										</div>
										<span><?php echo $alt_kat_turlar_yorum_sayi[$n]; ?> <?php echo $this->session->userdata('lng')["onrln_ktgr_yrm"]; ?></span>
									</div>
									<div class="other-right">
										<p><?php echo $this->session->userdata('lng')["onrln_ktgr_fiyt"]; ?></p>
										<p>
											<?php 
												//echo $alt_kat_turlar_fiyat[$n] 
												echo round($alt_kat_turlar_fiyat[$n]*$this->session->userdata('currency'))." ".$this->session->userdata('currency_icon');
												
												?> 	
										
										
										</p>
									</div>
								</div>
							</div>
						</div>
						
					<?php $n=$n+1; endforeach;  endif;  ?>			
					
					

					</div>
				</div>
				<a href="<?php echo base_url(); ?>otels/search/word/<?php echo $ust_kat_bilgi_getir; ?>" class="btn blue darken-1 waves-effect rounded"><?php echo $ust_kat_bilgi_getir; ?>: 
					<?php echo $this->session->userdata('lng')["tum_otl_gor"]; ?>
				</a>
			</div>
		</section>
		

		
		
		
		<section class="top-places top-destination">
			<div class="container center-align">
				<h4>
					<?php echo $this->session->userdata('lng')["en_gzl_yer"]; ?>
					<?php echo $ust_kat_bilgi_getir; ?> 
				</h4>
				<div class="top-places-inner">
					<?php $t=0; $m=0;	if( $ana_kat_kategorileri) :  foreach( $ana_kat_kategorileri as $dizi2 ) :   ?>
				
				 
				
					<div class="top-countries-item">
						<a href="<?php echo base_url(); ?>otels/Category/detail/<?php echo $dizi2["seo_adi"]; ?>"></a>
							<figure><img src="<?php echo base_url(); ?>assets/resimler/turlar/<?php echo $dizi["resim"]; ?>" alt="burç"></figure>
							<figcaption class="top-destination-comment">
								<h5><?php
	/*			if($this->session->userdata('lng_turu')=="Eng"){  echo $dizi2["adi"]; } 
				if($this->session->userdata('lng_turu')=="Tr"){  echo $dizi2["adi_tr"]; } 	
				if($this->session->userdata('lng_turu')=="Ru"){  echo $dizi2["adi_ru"]; } 	
*/
				echo $dizi2["adi".$uz]; 	
				?></h5>
								<span><?php echo $ana_kat_kategorileri_tur_adet[$m]; $t=$t+$ana_kat_kategorileri_tur_adet[$m]; ?> <?php echo $this->session->userdata('lng')["otelleri"]; ?> </span>
							</figcaption>
						
					</div>
					
				<?php $m=$m+1;	endforeach;  endif; ?>
					
				</div>
				<div class="main-city-inner">
					<div class="parallax-container">
						<a href="#"></a>
						<div class="parallax"><img src="<?php echo base_url(); ?>assets/resimler/turlar/<?php echo $dizi["resim"]; ?>"></div>
						<figcaption class="top-destination-comment">
							<h2><?php echo $ust_kat_bilgi_getir; ?></h2>
							<span><?php echo $t; ?> <?php echo $this->session->userdata('lng')["adt_otl"]; ?></span>
						</figcaption>
					</div>
				</div>
			</div>
		</section>
		

		
		<?php $this->load->view('mail_kayit'); ?>




			<?php	if( $alt_kat_bilgi) :  foreach( $alt_kat_bilgi as $dizi ) :   ?>
		<section class="city-info">
			<div class="container c-i-m">
				<div class="contianer">
					<div class="city-header center-align">
						<h3><?php 
		/*		if($this->session->userdata('lng_turu')=="Eng"){ echo $dizi["aciklama_baslik"]; } 
				if($this->session->userdata('lng_turu')=="Tr"){ echo $dizi["aciklama_baslik_tr"]; } 	
				if($this->session->userdata('lng_turu')=="Ru"){  echo $dizi["aciklama_baslik_ru"]; } 	
*/
				 echo $dizi["aciklama_baslik".$uz]; 			
				?></h3>
						<p><?php 
			/*	if($this->session->userdata('lng_turu')=="Eng"){ echo $dizi["aciklama_manset"]; } 
				if($this->session->userdata('lng_turu')=="Tr"){ echo $dizi["aciklama_manset_tr"]; } 	
				if($this->session->userdata('lng_turu')=="Ru"){  echo $dizi["aciklama_manset_ru"]; } 	
*/
				echo $dizi["aciklama_manset".$uz]; 					
				?></p>
					</div>
				</div>
				<div class="city-inner">
					<div class="city-info-modul">
						<div class="city-image">
						<?php if($dizi["alt_resim_1"]){ ?>
							<img src="<?php echo base_url(); ?>assets/resimler/sehirler/<?php echo $dizi["alt_resim_1"]; ?>" alt="<?php echo $dizi["adi"]; ?>">
							<?php } ?>
						<!--	<span>Fotoğraf: Raja Patnaik @wikimedia (CC BY-SA 3.0)</span>-->
						</div>
						<div class="city-text">
		<?php 
			/*	if($this->session->userdata('lng_turu')=="Eng"){ echo $dizi["aciklama_1"]; } 
				if($this->session->userdata('lng_turu')=="Tr"){ echo $dizi["aciklama_1_tr"]; } 	
				if($this->session->userdata('lng_turu')=="Ru"){  echo $dizi["aciklama_1_ru"]; } 		
			*/
					echo $dizi["aciklama_1".$uz]; 	
				?>
						</div>
					</div>
					<div class="city-info-modul">
						<div class="city-image">
						<?php if($dizi["alt_resim_2"]){ ?>
							<img src="<?php echo base_url(); ?>assets/resimler/sehirler/<?php echo $dizi["alt_resim_2"]; ?>" alt="<?php echo $dizi["adi"]; ?>">
								<?php } ?>
						</div>
						<div class="city-text">
							<?php 
	/*			if($this->session->userdata('lng_turu')=="Eng"){ echo $dizi["aciklama_2"]; } 
				if($this->session->userdata('lng_turu')=="Tr"){ echo $dizi["aciklama_2_tr"]; } 	
				if($this->session->userdata('lng_turu')=="Ru"){  echo $dizi["aciklama_2_ru"]; } 
*/
					echo $dizi["aciklama_2".$uz]; 	
				?>	</div>
					</div>
					<div class="city-info-modul">
						<div class="city-image">
						<?php if($dizi["alt_resim_3"]){ ?>
							<img src="<?php echo base_url(); ?>assets/resimler/sehirler/<?php echo $dizi["alt_resim_3"]; ?>" alt="<?php echo $dizi["adi"]; ?>">
								<?php } ?>
						</div>
						<div class="city-text">
						<?php 
		/*		if($this->session->userdata('lng_turu')=="Eng"){ echo $dizi["aciklama_3"]; } 
				if($this->session->userdata('lng_turu')=="Tr"){ echo $dizi["aciklama_3_tr"]; } 	
				if($this->session->userdata('lng_turu')=="Ru"){  echo $dizi["aciklama_3_ru"]; } 	
*/
				echo $dizi["aciklama_3".$uz]; 					
				?></div>
					</div>
					<div class="city-info-modul">
						<div class="city-image">
						<?php if($dizi["alt_resim_4"]){ ?>
							<img src="<?php echo base_url(); ?>assets/resimler/sehirler/<?php echo $dizi["alt_resim_4"]; ?>" alt="<?php echo $dizi["adi"]; ?>">
								<?php } ?>
						</div>
						<div class="city-text">
								<?php 
		/*		if($this->session->userdata('lng_turu')=="Eng"){ echo $dizi["aciklama_4"]; } 
				if($this->session->userdata('lng_turu')=="Tr"){ echo $dizi["aciklama_4_tr"]; } 	
				if($this->session->userdata('lng_turu')=="Ru"){  echo $dizi["aciklama_4_ru"]; } 	
			*/		
					echo $dizi["aciklama_4".$uz]; 
				?></div>
					</div>
				</div>
			</div>
		</section>
		<section class="hints">
			<div class="container h-i-m">
				<h3><?php echo $this->session->userdata('lng')["icrdn_ipuc"]; ?></h3>
				<div class="hint-container">
				<?php 
			/*	if($this->session->userdata('lng_turu')=="Eng"){ echo $dizi["ipuclari"]; } 
				if($this->session->userdata('lng_turu')=="Tr"){ echo $dizi["ipuclari_tr"]; } 	
				if($this->session->userdata('lng_turu')=="Ru"){  echo $dizi["ipuclari_ru"]; } 		
*/
				echo $dizi["ipuclari".$uz];				
				?>
				</div>
			</div>
		</section>
		<section class="useful-info">
			<div class="container u-i-m">
				<h3><?php echo $this->session->userdata('lng')["yrrl_bilgi"]; ?></h3>
				<div class="useful-main">
					<div class="useful-inner">
						<div class="useful-icon"><i class="material-icons">access_time</i></div>
						<div class="useful-text">
							<h5><?php echo $this->session->userdata('lng')["ne_zmn"]; ?></h5>
							<p><?php 
			/*	if($this->session->userdata('lng_turu')=="Eng"){ echo $dizi["ek_zaman"]; } 
				if($this->session->userdata('lng_turu')=="Tr"){ echo $dizi["ek_zaman_tr"]; } 	
				if($this->session->userdata('lng_turu')=="Ru"){  echo $dizi["ek_zaman_ru"]; } 
			*/
				echo $dizi["ek_zaman".$uz];	
				
				?></p>
						</div>
					</div>
					<div class="useful-inner">
						<div class="useful-icon"><i class="material-icons">monetization_on</i></div>
							<div class="useful-text">
							<h5><?php echo $this->session->userdata('lng')["fiyat_ne"]; ?></h5>
							<p><?php echo $dizi["ek_ucret"]; ?> </p>
						</div>
					</div>
					<div class="useful-inner">
						<div class="useful-icon"><i class="material-icons">perm_phone_msg</i></div>
						<div class="useful-text">
							<h5><?php echo $this->session->userdata('lng')["rhbr_ihtyc"]; ?></h5>
							<p><?php 
			/*	if($this->session->userdata('lng_turu')=="Eng"){ echo $dizi["ek_rehber"]; } 
				if($this->session->userdata('lng_turu')=="Tr"){ echo $dizi["ek_rehber_tr"]; } 	
				if($this->session->userdata('lng_turu')=="Ru"){  echo $dizi["ek_rehber_ru"]; } 			
*/
					echo $dizi["ek_rehber".$uz];	
				?></p>
						</div>
					</div>
					<div class="useful-inner">
						<div class="useful-icon"><i class="material-icons">location_on</i></div>
						<div class="useful-text">
							<h5><?php echo $this->session->userdata('lng')["nsl_gdlr"]; ?></h5>
							<p><?php 
			/*	if($this->session->userdata('lng_turu')=="Eng"){ echo $dizi["ek_ulasim"]; } 
				if($this->session->userdata('lng_turu')=="Tr"){ echo $dizi["ek_ulasim_tr"]; } 	
				if($this->session->userdata('lng_turu')=="Ru"){  echo $dizi["ek_ulasim_ru"]; } 		
*/
				echo $dizi["ek_ulasim".$uz];					
				?></p>
						</div>
					</div>
					<div class="useful-inner">
						<div class="useful-icon"><i class="material-icons">check_circle</i></div>
						<div class="useful-text useful-ul">
							<h5><?php echo $this->session->userdata('lng')["extra"]; ?></h5>
					<?php 
			/*	if($this->session->userdata('lng_turu')=="Eng"){ echo $dizi["ek_ipucu"]; } 
				if($this->session->userdata('lng_turu')=="Tr"){ echo $dizi["ek_ipucu_tr"]; } 	
				if($this->session->userdata('lng_turu')=="Ru"){  echo $dizi["ek_ipucu_ru"]; } 
*/
				echo $dizi["ek_ipucu".$uz]; 
				
				?>	</div>
					</div>

					
				</div>
			</div>
		</section>
				<?php 	endforeach;  endif; ?>
		<section class="top-comments">
			<div class="container">
			<h4><?php echo $ust_kat_bilgi_getir; ?> <?php echo $this->session->userdata('lng')["nlr_sylnd"]; ?></h4>
			<?php		if( $kat_yorumlar ) :      ?>	
				<div class="show-more-container">
					<div class="best-comment show-more-item">
					
						<?php	$n=0;	if( $kat_yorumlar ) :  foreach( $kat_yorumlar as $dizi ) :    ?>	
			
					
						<div class="comment-header">
							<div class="comment-avatar">
								<i class="material-icons">person</i>
							</div>
							<div class="comment-header-other">
								<h6><?php echo $dizi["kullanici"]; ?></h6>
								<p><?php echo $dizi["tarih"]; ?></p>
								<div class="stars">
										<?php 											
											
	$puan=$yorum_puan_ortalama[$n];  
	$star=floor($puan);
	$dongu=$star-1;
    for($i=0; $i<=$dongu; $i++){
		
	echo '<i  class="material-icons">star</i>';	
	}
	
	if($puan>$star){echo'<i  class="material-icons">star_half</i>';}
	
	$bos=4-$dongu;
	
	if($puan>$star){$bos=$bos-1;}
	$bodongu=$bos-1;
	
    for($i=0; $i<=$bodongu; $i++){
		
	echo '<i  class="material-icons">star_border</i>';	
	}	
											
					?>					
						
								</div>
							</div>
						</div>
						<div class="comment-inner">
							<div class="comment-place">
								<a><?php echo $dizi["baslik"]; ?> </a>
							</div>
							<div class="comment-text">
								<a>
							<?php echo $dizi["yorum"]; ?>	</a>
							</div>
						</div>
					</div>
					
				<?php	$n=$n+1;	 endforeach;  endif;   ?>	
					
					
					
				</div>
				
				<?php		 endif;   ?>	
			</div>
		</section>
		<section class="bottom-categories">
			<div class="container">
				<div class="category-inner">
					<h6><?php echo $this->session->userdata('lng')["bluepoplr"]; ?></h6>
					<div>
					
						<?php $s=0;	if( $populer_tur ) :  foreach( $populer_tur  as $dizi ) :  if($s==10){break;}   ?>	
			
     
					
						<a href="<?php echo base_url(); ?>otels/otel/detail/<?php echo $dizi["seo_adi"];  ?>"><p><?php
			/*	if($this->session->userdata('lng_turu')=="Eng"){  echo $dizi["adi"]; } 
				if($this->session->userdata('lng_turu')=="Tr"){  echo $dizi["adi_tr"]; } 	
				if($this->session->userdata('lng_turu')=="Ru"){  echo $dizi["adi_ru"]; } 	
			*/
					echo $dizi["adi".$uz]; 
				?></p></a>
					
					<?php $s=$s+1;	 endforeach;  endif;  ?>
					
					
					</div>
				</div>
				<div class="category-inner">
					<h6>
						
						<?php echo $this->session->userdata('lng')["en_poplr_slgn"]; ?>
					</h6>
					<div>
							<?php  $s=0;	if( $populer_ana_kategori ) :  foreach( $populer_ana_kategori  as $dizi ) :  if($s==10){break;}    ?>	
						<a href="<?php echo base_url(); ?>otels/Categories/detail/<?php echo $dizi["seo_adi"];  ?>"><p><?php
		/*		if($this->session->userdata('lng_turu')=="Eng"){  echo $dizi["adi"]; } 
				if($this->session->userdata('lng_turu')=="Tr"){  echo $dizi["adi_tr"]; } 	
				if($this->session->userdata('lng_turu')=="Ru"){  echo $dizi["adi_ru"]; } 		
		*/
				echo $dizi["adi".$uz]; 
				
				?></p></a>
					
					<?php   $s=$s+1;	 endforeach;  endif;  ?>
					</div>
				</div>
				<div class="category-inner">
					<h6>
						<?php echo $this->session->userdata('lng')["en_gzl_yerler"]; ?>
					</h6>
					<div>
						<?php  $s=0;	if( $populer_kategori ) :  foreach( $populer_kategori  as $dizi ) :  if($s==10){break;}    ?>	
			

					
						<a href="<?php echo base_url(); ?>otels/Category/detail/<?php echo $dizi["seo_adi"];  ?>"><p>	<?php
		/*		if($this->session->userdata('lng_turu')=="Eng"){  echo $dizi["adi"]; } 
				if($this->session->userdata('lng_turu')=="Tr"){  echo $dizi["adi_tr"]; } 	
				if($this->session->userdata('lng_turu')=="Ru"){  echo $dizi["adi_ru"]; } 		
*/
					echo $dizi["adi".$uz]; 
				?></p></a>
					
					<?php  $s=$s+1;	 endforeach;  endif;  ?>
					</div>
				</div>
			</div>
		</section>
	</main>
	<?php $this->load->view('footer'); ?>


	<!-- jQuery.js -->
	<script src="<?php echo base_url(); ?>assets_user/js/jquery-3.3.1.min.js"></script>
	<!-- jQuey cookie.js -->
	<script src="<?php echo base_url(); ?>assets_user/js/jquery.cookie.js"></script>
	<!-- materalize.js -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets_user/js/materialize.min.js"></script>
	<!-- function.js -->
	<script src="<?php echo base_url(); ?>assets_user/js/function.js"></script>
	<!-- grade.js -->
	<script src="<?php echo base_url(); ?>assets_user/js/grade.js"></script>

</body>
</html>