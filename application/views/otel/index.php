<!DOCTYPE html>
<html lang="tr">
<head>
	<title>
		<?php	if( $ayar ) :  foreach( $ayar  as $dizi ) :    ?>	
						<?php 
			/*	if($this->session->userdata('lng_turu')=="Eng"){ echo strip_tags($dizi["kisa_aciklama"]); } 
				if($this->session->userdata('lng_turu')=="Tr"){echo strip_tags($dizi["kisa_aciklama_tr"]);} 	
				if($this->session->userdata('lng_turu')=="Ru"){ echo strip_tags($dizi["kisa_aciklama_ru"]);} 	
*/
                echo strip_tags($dizi["kisa_aciklama".$uz]);					
				?>	
		<?php 	 endforeach;  endif;  ?>
	</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	
		<?php $this->load->view('favicon'); ?>

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
		<section class="rezerv">
			<div class="parallax-container"> 
				<div class="parallax">
				<?php	if( $ayar ) :  foreach( $ayar  as $dizi ) :    ?>	
				<img src="<?php echo base_url(); ?>assets/resimler/home/<?php echo $dizi["otel_photo"];  ?>">
				
				</div>
				
					<div class="rezerv-inner">
					<div class="buy-ticket card-panel">
								<?php 
		/*		if($this->session->userdata('lng_turu')=="Eng"){ echo $dizi["otel_slogan"]; } 
				if($this->session->userdata('lng_turu')=="Tr"){ echo $dizi["otel_slogan_tr"]; } 	
				if($this->session->userdata('lng_turu')=="Ru"){ echo $dizi["otel_slogan_ru"]; } 
*/

				echo $dizi["otel_slogan".$uz]; 				
				?>
						
						<!--<h2>Gittiğiniz Yere Aşık Olun</h2>
						<h3>Dünyanın dört bir yanından etkinlikler için yerinizi ayırtın.</h3-->
						
						<?php endforeach; endif; ?>

							<ul class="i_t-o_t tabs">
								<li class="tab">
									<a href="#tur_tab">
										<?php echo $this->session->userdata('lng')["tur"]; ?>
									</a>
								</li>
								<li class="tab">
									<a class="active" href="#otel_tab">
										<?php echo $this->session->userdata('lng')["otel"]; ?>
									</a>
								</li>
							</ul>
							<div id="tur_tab" style="display: none;">
								<form action="<?php echo base_url(); ?>Search/Word" method="Post" class="buy-form">
									<div class="ticket-form-inner">
										<div class="input-field">
											<input id="where" name="word" type="text" class="autocomplete">
											<label for="where">
												<?php echo $this->session->userdata('lng')["nerye_tur"]; ?>
											</label>
										</div>
										<div class="input-field takvim">
											<input id="start_date"  name="bas_t" type="text" class="datepicker">
											<label for="start_date">
												<?php 
												echo $this->session->userdata('lng')["bas_t"]; 
												?>
											</label>
										</div>
										<div class="input-field takvim">
											<input id="end_date"  name="bit_t" type="text" class="datepicker">
											<label for="end_date">
												<?php 
												echo $this->session->userdata('lng')["bit_t"]; 
												?>
											</label>
										</div>
										<div class="input-field">
											<button type="submit" value="" class="btn waves-effect">
												<?php 
												echo $this->session->userdata('lng')["ara"]; 
												?>
											</button>
										</div>
									</div>
								</form>
							</div>
							<div id="otel_tab">
								<form action="<?php echo base_url(); ?>otels/Search/Word" method="Post" class="buy-form">
									<div class="ticket-form-inner">
										<div class="input-field">
											<input id="where" name="word" type="text" class="autocomplete">
											<label for="where">
												<?php 
												echo $this->session->userdata('lng')["nerye_otel"];
												?>
											</label>
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
											<button type="submit" value="" class="btn waves-effect">	<?php 
												echo $this->session->userdata('lng')["ara"]; 
												?>
											</button>
										</div>
									</div>
								</form>
							</div>
						

					</div>
				</div>
				
				
			</div>
		</section>
		<section class="place">
			<div class="container center-align">
				<h4>
					<?php echo $this->session->userdata('lng')["onrln_otl_slgn"]; ?>
				</h4>
				
				
			<?php	$n=0; 	if( $turlar_home ) :  foreach( $turlar_home  as $dizi ) :    ?>
			
	
			<?php if($n==1){echo'<div class="places-inner reverse">';} 
			      else{ echo'<div class="places-inner">'; } ?>				
					
					<div class="places-main">
						<div class="places-main__image">
							<img src="<?php echo base_url(); ?>assets/resimler/sehirler/<?php echo $dizi["resim_2"];  ?>" alt="<?php echo $dizi["adi"];  ?>">
						</div>
							<?php if($n==2){echo'<div class="places-main-text smoth">';} 
								  else{ echo'<div class="places-main-text">'; } ?>			
						
						
							<h4><?php echo $dizi["adi"];  ?></h4>
							<p><?php echo substr($dizi["aciklama"],0,120);  ?></p>
							<a class="btn waves-effect" href="<?php echo base_url(); ?>otels/Categories/detail/<?php echo $dizi["seo_adi"];  ?>"><?php echo $this->session->userdata('lng')["onrln_ktgr_btn"]; ?></a>
						</div>
					</div>
					<div class="places-other">
						<div class="places-row">
					<?php 	
					//echo $dizi["tur"][$m]["adi"]; 
					?>	
						<?php 
				//print_r($dizi); 
				 
				$tursay=count($dizi["tur"]);
			    if($tursay>4){$turdongu = 3;} else{ $turdongu = $tursay-1; }
			    
			for($m=0; $m<=$turdongu; $m++){
				
				
				
					?>
							<div class="other-main">
								<a href="<?php echo base_url(); ?>otels/otel/detail/<?php echo $dizi["tur"][$m]["seo_adi"];  ?>"></a>
								<div class="other-image"><img src="<?php echo base_url(); ?>assets/resimler/turlar/<?php echo $dizi["tur"][$m]["resim"];  ?>" alt=""></div>
								<div class="other-text-inner">
									<a>
										<?php echo $dizi["tur"][$m]["adi"]; ?>
									</a>
									<div class="bottom-inner">
										<div class="other-left">
											<?php 
								
											//echo $puan[$dizi["tur"][$m]["kod"]]["tur_puan_genel"]; 
											//echo $dizi["tur"][$m]["kod"];
											?>
											<div class="stars">
											
											<?php 											
											
	$puan=$puan[$dizi["tur"][$m]["kod"]]["tur_puan_genel"];  
	$star=floor($puan);
	$dongu=$star-1;
    for($i=0; $i<=$dongu; $i++){
		
	echo '<i >star</i>';	
	}
	
	if($puan>$star){echo'<i >star_half</i>';}
	
	$bos=4-$dongu;
	
	if($puan>$star){$bos=$bos-1;}
	$bodongu=$bos-1;
	
    for($i=0; $i<=$bodongu; $i++){
		
	echo '<i >star_border</i>';	
	}	
											
					?>
			
												
												
												
											</div>
											<span>
												<?php echo $dizi["tur"][$m]["yorum_adet"]; ?> <?php echo $this->session->userdata('lng')["onrln_ktgr_yrm"]; ?>
											</span>
										</div>
										<div class="other-right">
											<p><?php echo $this->session->userdata('lng')["onrln_ktgr_fiyt"]; ?></p>
											<p>
												
												<?php 
												//echo $dizi["tur"][$m]["baslangic_fiyat"]; 
												echo round($dizi["tur"][$m]["baslangic_fiyat"]*$this->session->userdata('currency'))." ".$this->session->userdata('currency_icon');
												
												?> 
												
												
												
											</p>
										</div>
									</div>
								</div>
							</div>
					<?php 
			

			if($m-1 % 2 == 0){echo'</div>
						<div class="places-row">';}

			
			}
				?>			
							
							
							
						
							
							
						</div>

					</div>
				</div>
					
						<?php	$n=$n+1; endforeach;  endif;  ?>	
				
				
				
			<!--	
				<div class="places-inner reverse">
					<div class="places-main">
						<div>
							<img src="<?php echo base_url(); ?>assets_user/img/city-getaway-paris.jpg" alt="Paris">
						</div>
						<div class="places-main-text">
							<h4>Roma</h4>
							<p>İtalyan başkentinin antik kalıntılarına, taptaze makarnasına ve canlı sokak hayatına aşık olun.</p>
							<a class="btn waves-effect" href="#">Daha Fazlasını Keşfedin</a>
						</div>
					</div>
					<div class="places-other">
						<div class="places-row">
							<div class="other-main">
								<a href="#"></a>
								<div class="other-image"><img src="<?php echo base_url(); ?>assets_user/img/tour_img-406379-92.jpg" alt=""></div>
								<div class="other-text-inner">
									<a href="#">Kolezyum, Roma Forumu ve Palatino Tepesi Paketi</a>
									<div class="bottom-inner">
										<div class="other-left">
											<div class="stars">
												<i class=" ">star</i>
												<i class=" ">star</i>
												<i class=" ">star</i>
												<i class=" ">star_half</i>
												<i class=" ">star_border</i>
											</div>
											<span>684 Yorum</span>
										</div>
										<div class="other-right">
											<p>Başlangıç Fiyatı</p>
											<p>125 ₺</p>
										</div>
									</div>
								</div>
							</div>
							<div class="other-main">
								<a href="#"></a>
								<div class="other-image"><img src="<?php echo base_url(); ?>assets_user/img/tour_img-406379-92.jpg" alt=""></div>
								<div class="other-text-inner">
									<a href="#"></a>
									<div class="bottom-inner">
										<div class="other-left">
											<div class="stars">
												<i class=" ">star</i>
												<i class=" ">star</i>
												<i class=" ">star</i>
												<i class=" ">star</i>
												<i class=" ">star</i>
											</div>
											<span>684 Yorum</span>
										</div>
										<div class="other-right">
											<p>Başlangıç Fiyatı</p>
											<p>125 ₺</p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="places-row">
							<div class="other-main">
								<a href="#"></a>
								<div class="other-image"><img src="<?php echo base_url(); ?>assets_user/img/tour_img-406379-92.jpg" alt=""></div>
								<div class="other-text-inner">
									<a href="#">Kolezyum, Roma Forumu ve Palatino Tepesi Paketi</a>
									<div class="bottom-inner">
										<div class="other-left">
											<div class="stars">
												<i class=" ">star</i>
												<i class=" ">star</i>
												<i class=" ">star</i>
												<i class=" ">star</i>
												<i class=" ">star</i>
											</div>
											<span>684 Yorum</span>
										</div>
										<div class="other-right">
											<p>Başlangıç Fiyatı</p>
											<p>125 ₺</p>
										</div>
									</div>
								</div>
							</div>
							<div class="other-main">
								<a href="#"></a>
								<div class="other-image"><img src="<?php echo base_url(); ?>assets_user/img/tour_img-406379-92.jpg" alt=""></div>
								<div class="other-text-inner">
									<a href="#">Kolezyum, Roma Forumu ve Palatino Tepesi Paketi</a>
									<div class="bottom-inner">
										<div class="other-left">
											<div class="stars">
												<i class=" ">star</i>
												<i class=" ">star</i>
												<i class=" ">star</i>
												<i class=" ">star</i>
												<i class=" ">star</i>
											</div>
											<span>684 Yorum</span>
										</div>
										<div class="other-right">
											<p>Başlangıç Fiyatı</p>
											<p>125 ₺</p>
										</div>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
				<div class="places-inner">
					<div class="places-main">
						<div>
							<img src="<?php echo base_url(); ?>assets_user/img/city-getaway-amsterdam.jpg" alt="Roma">
						</div>
						<div class="places-main-text smoth">
							<h4>Amsterdam</h4>
							<p>Köprülerde bisiklet sürün, kanallarda tekneyle dolaşın ve bu renkli şehrin sanatına hayran kalın.</p>
							<a class="btn waves-effect" href="#">Daha Fazlasını Keşfedin</a>
						</div>
					</div>
					<div class="places-other">
						<div class="places-row">
							<div class="other-main">
								<a href="#"></a>
								<div class="other-image"><img src="<?php echo base_url(); ?>assets_user/img/tour_img-875474-92.jpg" alt=""></div>
								<div class="other-text-inner">
									<a href="#">Kolezyum, Roma Forumu ve Palatino Tepesi Paketi</a>
									<div class="bottom-inner">
										<div class="other-left">
											<div class="stars">
												<i class=" ">star</i>
												<i class=" ">star</i>
												<i class=" ">star</i>
												<i class=" ">star_half</i>
												<i class=" ">star_border</i>
											</div>
											<span>684 Yorum</span>
										</div>
										<div class="other-right">
											<p>Başlangıç Fiyatı</p>
											<p>125 ₺</p>
										</div>
									</div>
								</div>
							</div>
							<div class="other-main">
								<a href="#"></a>
								<div class="other-image"><img src="<?php echo base_url(); ?>assets_user/img/tour_img-875474-92.jpg" alt=""></div>
								<div class="other-text-inner">
									<a href="#"></a>
									<div class="bottom-inner">
										<div class="other-left">
											<div class="stars">
												<i class=" ">star</i>
												<i class=" ">star</i>
												<i class=" ">star</i>
												<i class=" ">star</i>
												<i class=" ">star</i>
											</div>
											<span>684 Yorum</span>
										</div>
										<div class="other-right">
											<p>Başlangıç Fiyatı</p>
											<p>125 ₺</p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="places-row">
							<div class="other-main">
								<a href="#"></a>
								<div class="other-image"><img src="<?php echo base_url(); ?>assets_user/img/tour_img-875474-92.jpg" alt=""></div>
								<div class="other-text-inner">
									<a href="#">Kolezyum, Roma Forumu ve Palatino Tepesi Paketi</a>
									<div class="bottom-inner">
										<div class="other-left">
											<div class="stars">
												<i class=" ">star</i>
												<i class=" ">star</i>
												<i class=" ">star</i>
												<i class=" ">star</i>
												<i class=" ">star</i>
											</div>
											<span>684 Yorum</span>
										</div>
										<div class="other-right">
											<p>Başlangıç Fiyatı</p>
											<p>125 ₺</p>
										</div>
									</div>
								</div>
							</div>
							<div class="other-main">
								<a href="#"></a>
								<div class="other-image"><img src="<?php echo base_url(); ?>assets_user/img/tour_img-875474-92.jpg" alt=""></div>
								<div class="other-text-inner">
									<a href="#">Kolezyum, Roma Forumu ve Palatino Tepesi Paketi</a>
									<div class="bottom-inner">
										<div class="other-left">
											<div class="stars">
												<i class=" ">star</i>
												<i class=" ">star</i>
												<i class=" ">star</i>
												<i class=" ">star</i>
												<i class=" ">star</i>
											</div>
											<span>684 Yorum</span>
										</div>
										<div class="other-right">
											<p>Başlangıç Fiyatı</p>
											<p>125 ₺</p>
										</div>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
				
				-->
			</div>
		</section>
		<!--<section class="page-banner">
			<div class="container">
				<h3>Esnekliğin konforunu yaşayın</h3>
				<p>Planların değişmesi halinde, çoğu rezervasyonu başlangıçtan önceki 24 saate kadar ücretsiz olarak iptal edebilirsiniz. Bize ihtiyacınız olursa, müşteri hizmetleri haftanın 7 günü ve günün 24 saati, birden çok dilde hizmetinizdedir.</p>
			</div>
		</section>-->
		<?php $this->load->view('mail_kayit'); ?> 

		<section class="top-places">
			<div class="container center-align">
				<h4><?php echo $this->session->userdata('lng')["poplr_slgn"]; ?></h4>
				<div class="top-places-inner">
				
					<?php	 	if( $populer_kategori ) :  foreach( $populer_kategori  as $dizi ) :    ?>
						
				
				
					<div class="top-places-item">
						<a href="<?php echo base_url(); ?>otels/Category/detail/<?php echo $dizi["seo_adi"];  ?>">
							<figure><img src="<?php echo base_url(); ?>assets/resimler/sehirler/<?php echo $dizi["resim_2"];  ?>" alt="burç"></figure>
							<h5><?php 
		/*		if($this->session->userdata('lng_turu')=="Eng"){ echo $dizi["adi"]; } 
				if($this->session->userdata('lng_turu')=="Tr"){echo $dizi["adi_tr"];} 	
				if($this->session->userdata('lng_turu')=="Ru"){ $dizi["adi_ru"];} 	
		*/		
				echo $dizi["adi".$uz]; 				
							?></h5>
						</a>
					</div>
					
						<?php	 endforeach;  endif;  ?>		
				</div>
				<a class="btn blue darken-1 waves-effect show-more"><?php echo $this->session->userdata('lng')["poplr_slgn_btn"]; ?></a>
			</div>
		</section>
		<section class="top-places top-destination">
			<div class="container center-align">
				<h4><?php echo $this->session->userdata('lng')["en_poplr_slgn"]; ?></h4> 
				<div class="top-places-inner">
				
							<?php	$n=0; 	if( $populer_ana_kategori ) :  foreach( $populer_ana_kategori  as $dizi ) :    ?>
					<div class="top-countries-item">
					<a href="<?php echo base_url();  ?>otels/Categories/detail/<?php echo $dizi["seo_adi"];  ?>">
							<figure><img src="<?php echo base_url(); ?>assets/resimler/sehirler/<?php echo $dizi["resim_2"];  ?>" alt="burç"></figure>
							<figcaption class="top-destination-comment">
								<h5><?php 
			/*	if($this->session->userdata('lng_turu')=="Eng"){ echo $dizi["adi"]; } 
				if($this->session->userdata('lng_turu')=="Tr"){echo $dizi["adi_tr"];} 	
				if($this->session->userdata('lng_turu')=="Ru"){ $dizi["adi_ru"];} 	
			*/	
				echo $dizi["adi".$uz]; 	
							
							?></h5>
								<span><?php echo $populer_ana_kategori_sayi[$n]; ?> <?php echo $this->session->userdata('lng')["x_otel"]; ?></span>
							</figcaption>
						</a>
					</div>
							<?php	$n=$n+1; endforeach;  endif;  ?>	
					
				</div>
				<a class="btn blue darken-1 waves-effect show-more-countries"><?php echo $this->session->userdata('lng')["poplr_slgn_btn"]; ?></a>
			</div>
		</section>
		<section class="top-tabs">
			<div class="container">
				<div class="main-t-e">
					<div class="col s12">
						<ul class="tabs">
							<li class="tab col s3">
								<a class="active" href="#topEvents">
									<?php echo $this->session->userdata('lng')["en_poplr_slgn"]; ?>
								</a>
							</li>
							<li class="tab col s3">
								<a href="#topCountry">
									<?php echo $this->session->userdata('lng')["en_10"]; ?>
								</a>
							</li>
						</ul>
					</div>
					<div id="topEvents" class="col s12">
						<div class="topEvents">
							<h5>
								<?php echo $this->session->userdata('lng')["bluepoplr"]; ?>
							</h5>	
							<div class="t-e-inner">
								<div class="t-e-r">
								<?php	 $s=0;	if( $populer_tur ) :  foreach( $populer_tur  as $dizi ) :    ?>
									<a href="<?php echo base_url();  ?>otels/otel/detail/<?php echo $dizi["seo_adi"];  ?>"><span><i></i></span><span><?php 
			/*	if($this->session->userdata('lng_turu')=="Eng"){ echo $dizi["adi"]; } 
				if($this->session->userdata('lng_turu')=="Tr"){echo $dizi["adi_tr"];} 	
				if($this->session->userdata('lng_turu')=="Ru"){ $dizi["adi_ru"];} 	
				*/
							echo $dizi["adi".$uz]; 		
							?> </span></a>
									<?php if($s==12){echo'</div>
								<div class="t-l">
									<img src="'.base_url().'assets_user/img/blue_eye_1.png">
								</div>
								<div class="t-e-l">';}  ?>	
										<?php $s=$s+1;	 endforeach;  endif;  ?>	

								
								
								</div>

							</div>
							<p>
								<?php echo $this->session->userdata('lng')["assagi_yazi"]; ?>
								<a href="<?php echo base_url(); ?>otels/All_categories">
									<?php echo $this->session->userdata('lng')["assg_lnk_otel"]; ?>
								</a>
							</p>
						</div>
					</div>
					<div id="topCountry" class="col s12">
						<div class="topCountry">
							<h5><?php echo $this->session->userdata('lng')["en_10"]; ?></h5>
							
							<section class="top-places">
								<div class="top-places-inner">
								
								<?php $s = 0; if ( $populer_ana_kategori ) : foreach ( $populer_ana_kategori as $dizi ) : ?>	

									<div class="top-places-inner__div">
										<a href="<?php echo base_url();?>otels/Categories/detail/<?php echo $dizi["seo_adi"];  ?>"></a>
										<figure>
											<img src="<?php echo base_url(); ?>assets/resimler/sehirler/<?php echo $dizi["resim_2"];  ?>" alt="burç">
										</figure>
										<h5><?php 
		/*		if($this->session->userdata('lng_turu')=="Eng"){ echo $dizi["adi"]; } 
				if($this->session->userdata('lng_turu')=="Tr"){echo $dizi["adi_tr"];} 	
				if($this->session->userdata('lng_turu')=="Ru"){ $dizi["adi_ru"];} 	
		*/		
					echo $dizi["adi".$uz]; 			
							?></h5>
									</div>

								<?php if ( $s == 2 ) { break; } $s = $s + 1; endforeach; endif; ?>	
									
								</div>
							</section>
							
							<div class="t-e-inner justify-center">
							<?php $s = 0; if ( $populer_ana_kategori ) : foreach( $populer_ana_kategori  as $dizi ) : ?>

							      	<?php if ( $s > 2 ) { ?>	

									<a href="<?php echo base_url();  ?>otels/Categories/detail/<?php echo $dizi["seo_adi"];  ?>"><span><?php echo $populer_ana_kategori_sayi[$s]; ?></span><span><?php 
			/*		
				if($this->session->userdata('lng_turu')=="Eng"){ echo $dizi["adi"]; } 
				if($this->session->userdata('lng_turu')=="Tr"){echo $dizi["adi_tr"];} 	
				if($this->session->userdata('lng_turu')=="Ru"){ $dizi["adi_ru"];} 	
			*/
			
				echo $dizi["adi".$uz]; 						
							?></span></a>	
									<?php }  ?>	
								

							
								<?php $s = $s + 1; endforeach; endif; ?>
							</div>
							
						</div>
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
	<script src="<?php echo base_url(); ?>assets_user/js/materialize.min.js"></script>
	<!-- function.js -->
	<script src="<?php echo base_url(); ?>assets_user/js/function.js"></script>
	<!-- grade.js -->
	<script src="<?php echo base_url(); ?>assets_user/js/grade.js"></script>
	<script>
		$(document).ready(function() {
			$(document).ready(function(){
				$('input#where').autocomplete({
					data: {
						/*"Antalya"	: null,
						"Antakya"	: null,
						"Mersin"	: null*/
					},
				});
			});
		});
	</script>
</body>
</html>