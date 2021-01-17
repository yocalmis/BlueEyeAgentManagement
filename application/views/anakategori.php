<!DOCTYPE html>
<html lang="<?php echo $this->session->userdata('lng')["lang"]; ?>">
<head>
	<title>
		<?php	if( $ayar ) :  foreach( $ayar  as $dizi ) :    ?>	
			<?php echo strip_tags($dizi["kisa_aciklama".$uz]); ?>	
		<?php endforeach;  endif; ?>
	</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

	<?php	if( $ana_kat_bilgi ) :  foreach( $ana_kat_bilgi  as $dizi ) :    ?>	

		<meta name="keyword" content="<?php echo strip_tags($dizi["anahtar"]);  ?>">
		<meta name="description" content="<?php echo strip_tags($dizi["kisa_aciklama"]); ?>">
	<?php 	 endforeach;  endif;  ?>

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

				getHeight = getNav.offsetHeight;
				document.querySelector('main').style.marginTop = getHeight + 'px';
			})();
		</script>
		<?php	if( $ana_kat_bilgi ) :  foreach( $ana_kat_bilgi  as $dizi ) :    ?>	

			<section class="rezerv">
				<div class="parallax-container">
					<div class="parallax">
						<img src="<?php echo base_url(); ?>assets/resimler/sehirler/<?php echo $dizi["resim"]; ?>" />
					</div>
					<div class="rezerv-inner">
						<div class="buy-ticket card-panel">
							<h1><?php echo $dizi["adi".$uz]; ?>	</h1>
							<h3>
								<?php echo $this->session->userdata('lng')["ana_ktgr_slogan"]; ?>
							</h3>
							<form action="<?php echo base_url(); ?>Search/Word" method="Post" class="buy-form">
								<div class="ticket-form-inner">
									<div class="input-field takvim">
										<input id="start_date" name="bas_t" type="text" class="datepicker">
										<input id="end_dat" name="word" value="<?php echo $dizi["adi"];  ?>"  type="hidden" >	
										<input id="end_dat" name="id" value="<?php echo $dizi["id"];  ?>"  type="hidden" >
										<label for="start_date">
											<?php 
											echo $this->session->userdata('lng')["bas_t"]; 
											?>
										</label>
									</div>
									<div class="input-field takvim">
										<input id="end_date" name="bit_t"  type="text" class="datepicker">
										<label for="start_date">
											<?php
											echo $this->session->userdata('lng')["bit_t"]; 
											?>
										</label>
									</div>
									<div class="input-field">
										<button type="submit" class="btn waves-effect">
											<?php 
											echo $this->session->userdata('lng')["ara"]; 
											?>
										</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</section>
			<section class="place category-place category-place--showAll">
				<div class="container center-align">
					<h4>
						<?php echo $dizi["adi".$uz]; ?>: 
						<?php echo $this->session->userdata('lng')["tum_tur"]; ?>
					</h4>

				<?php endforeach; endif; ?>	
				<div class="places-inner">
					<div class="places-other">


						<?php	
						if( $ana_kat_turlar ) :  foreach( $ana_kat_turlar  as $dizi ) :
							?>	

							<?php 	 
							$tursay=count($dizi["tur"]);
							$turdongu = $tursay-1;

							for($m=0; $m<=$turdongu; $m++){
								?>


								<div class="other-main">
									<a href="<?php echo base_url(); ?>Tour/detail/<?php echo $dizi["tur"][$m]["seo_adi"];?>"></a>

									<div class="other-image">
										<img src="<?php echo base_url(); ?>assets/resimler/turlar/<?php echo $dizi["tur"][$m]["resim_2"];  ?>" alt="">

										<?php if($dizi["tur"][$m]["tukenme"]==1){

											echo'
											<span class="other-bestseller tuken">
											<img src="'.base_url().'assets_user/img/warning.svg" alt="Best Tour">
											'.$this->session->userdata('lng')["tknm_muhtml"].'

											</span>';

										}
										else{

											if($dizi["tur"][$m]["sticker"]==1){

												echo'<span class="other-bestseller b-e-o">
												<img src="'.base_url().'assets_user/img/blue_eye_1.png" alt="Best Tour">'.$this->session->userdata('lng')["blue_orjnl"].'
												</span>'; 

											}

										}
										?>
									</div>
									<div class="other-text-inner">
										<a href="#">
											<?php echo $dizi["tur"][$m]["adi"]; ?>
										</a>
										<div class="bottom-inner">
											<div class="other-left">
												<div class="stars">

													<?php 											

													$puan=$puan[$dizi["tur"][$m]["kod"]]["tur_puan_genel"];  
													$star=floor($puan);
													$dongu=$star-1;
													for($i=0; $i<=$dongu; $i++){

														echo "<span data-url='".icons_url."star.svg'></span>";
													}

													if($puan>$star){
														echo "<span data-url='".icons_url."star_half.svg'></span>";
													}

													$bos=4-$dongu;

													if($puan>$star){$bos=$bos-1;}
													$bodongu=$bos-1;

													for($i=0; $i<=$bodongu; $i++){
														echo "<span data-url='".icons_url."star_border.svg'></span>";
													}	

													?>
												</div>
												<span>
													<?php echo $dizi["tur"][$m]["yorum_adet"]; ?> 
													<?php echo $this->session->userdata('lng')["onrln_ktgr_yrm"]; ?>
												</span>
											</div>
											<div class="other-right">
												<p>
													<?php echo $this->session->userdata('lng')["onrln_ktgr_fiyt"]; ?>
												</p>
												<p>
													<?php 
													echo round($dizi["tur"][$m]["baslangic_fiyat"]*$this->session->userdata('currency'))." ".$this->session->userdata('currency_icon');
													?>
												</p>
											</div>
										</div>
									</div>
								</div>


							<?php }	 endforeach;  endif;  ?>
						</div>
					</div>
					<?php	if( $ana_kat_bilgi ) :  foreach( $ana_kat_bilgi  as $dizi ) :    ?>	

						<a 
						href="<?php echo base_url(); ?>search/word/<?php echo $dizi["seo_adi"];?>" 
						class="btn blue darken-1 waves-effect rounded">
						<?php echo $dizi["adi".$uz]; ?> 
						: 
						<?php echo $this->session->userdata('lng')["tum_tur_gor"]; ?>
					</a>


				</div>
			</section>
			<section class="top-comments">
				<div class="container">
					<h4>
						<?php echo $this->session->userdata('lng')["nlr_sylnd"]; ?>
						<?php echo $dizi["adi".$uz]; ?>	
					</h4>
				<?php  endforeach;  endif;  ?>
				<div class="show-more-container">

					<?php 
				
					$n=0;	if( $yy ) :  foreach( $yy as $dizi ) :

if($yy[$n][0]["baslik"]==""){$n=$n+1; continue;}

 		 ?>
		
			<div class="best-comment show-more-item">
									<div class="comment-header">
										<div class="comment-avatar">
											<span class="comment-avatar__icon">
												<?php echo "<span data-url='".icons_url."outline-person-24px.svg'></span>";?>
											</span>
										</div>
										<div class="comment-header-other">
											<h6><?php echo $yy[$n][0]["kullanici"]; ?></h6>
											<p><?php echo $yy[$n][0]["tarih"]; ?></p>
											<div class="stars">




												<?php

												$puan=$yorum_puan_ortalama[$m];  
												$star=floor($puan);
												$dongu=$star-1;
												for($i=0; $i<=$dongu; $i++){

													echo "<span data-url='".icons_url."star.svg'></span>";
												}

												if($puan>$star){
													echo "<span data-url='".icons_url."star_half.svg'></span>";
												}

												$bos=4-$dongu;

												if($puan>$star){$bos=$bos-1;}
												$bodongu=$bos-1;

												for($i=0; $i<=$bodongu; $i++){
													echo "<span data-url='".icons_url."star_border.svg'></span>";
												}	

												?>

											</div>
										</div>
									</div>
									<div class="comment-inner">
										<div class="comment-place">
											<a href="#"><?php echo $yy[$n][0]["adi"]; ?></a>
										</div>
										<div class="comment-text">
											<a>
												<b><?php echo $yy[$n][0]["baslik"]; ?></b>
												<p><?php echo $yy[$n][0]["yorum"]; ?></p>
											</a>
										</div>
									</div>
								</div>
		

	<?php
		$n=$n+1;	endforeach;  endif;
					 ?>

				





						<!--<a class="show-more btn rounded blue darken-1">Daha fazla Göster</a>-->
					</div>
				</div>
			</section>
			<?php $this->load->view('mail_kayit'); ?>
			<div id="topCountry" class="t-c-m container center-align">
				<h5>

					<?php echo $this->session->userdata('lng')["en_gzl_yer"]; ?>
					<?php if( $ana_kat_bilgi ) : foreach( $ana_kat_bilgi  as $dizi ) : ?>	
						<?php 
		/*		if($this->session->userdata('lng_turu')=="Eng"){ echo $dizi["adi"]; } 
				if($this->session->userdata('lng_turu')=="Tr"){ echo $dizi["adi_tr"]; } 	
				if($this->session->userdata('lng_turu')=="Ru"){  echo $dizi["adi_ru"]; } 	
*/

				echo $dizi["adi".$uz]; 						
				?>	
			<?php endforeach;  endif; ?> 
		</h5>	
		<section class="top-places">
			<div class="top-places-inner">
				<?php $n=0; if( $ana_kat_populer_kategori ) : foreach( $ana_kat_populer_kategori  as $dizi ) : ?>

				<?php if( $n <= 3 ){ ?>

					<div>
						<a href="<?php echo base_url(); ?>Category/detail/<?php echo $dizi["seo_adi"];  ?>">
							<figure>
								<span><?php $ana_kat_populer_kategori_sayi[$n] ?></span>
								<img src="<?php echo base_url(); ?>assets/resimler/sehirler/<?php echo $dizi["resim_2"];  ?>" alt="burç">
							</figure>
							<h5><?php 
				/*					
				if($this->session->userdata('lng_turu')=="Eng"){ echo $dizi["adi"]; } 
				if($this->session->userdata('lng_turu')=="Tr"){ echo $dizi["adi_tr"]; } 	
				if($this->session->userdata('lng_turu')=="Ru"){  echo $dizi["adi_ru"]; } 		
				*/
				
				echo $dizi["adi".$uz]; 	
				?></h5>
			</a>
		</div>


	<?php } ?>

	<?php $n=$n+1; endforeach;  endif; ?>
</div>
</section>
<div class="t-e-inner jcc">

	<?php	$n=0; 	if( $ana_kat_populer_kategori ) :  foreach( $ana_kat_populer_kategori  as $dizi ) :    ?>




	<?php if($n>3){ ?>
		<a href="<?php echo base_url(); ?>Category/detail/<?php echo $dizi["seo_adi"];  ?>">
			<span><?php echo $ana_kat_populer_kategori_sayi[$n]; ?></span>
			<span><?php echo $dizi["adi".$uz]; ?></span>
		</a>
	<?php } ?>
	<?php $n=$n+1; endforeach; endif; ?>

</div>
</div>
<section class="top-tabs">
	<div class="container">
		<div class="main-t-e">
			<div class="col s12">
				<ul class="tabs">
					<li class="tab col s3">
						<a class="active" href="#topEvents">
							<?php echo $this->session->userdata('lng')["en_gzl_yerler"]; ?>
						</a>
					</li>
				</ul>
			</div>
			<div id="topEvents" class="col s12">
				<div class="topEvents center-align">
					<h5>
						<?php if( $ana_kat_bilgi ) : foreach( $ana_kat_bilgi  as $dizi ) : ?>	
							<?php 
				/*								
				if($this->session->userdata('lng_turu')=="Eng"){ echo $dizi["adi"]; } 
				if($this->session->userdata('lng_turu')=="Tr"){ echo $dizi["adi_tr"]; } 	
				if($this->session->userdata('lng_turu')=="Ru"){  echo $dizi["adi_ru"]; } 
*/

				echo $dizi["adi".$uz]; 	
				
				?>	
			<?php endforeach; endif; ?> 
			<?php echo $this->session->userdata('lng')["pplr_vrs_nkts"]; ?>
		</h5>	
		<div class="t-e-inner jcc">

			<?php $n=0; if( $ana_kat_populer_kategori ) :  foreach( $ana_kat_populer_kategori  as $dizi ) : ?>


			<a href="<?php echo base_url(); ?>Category/detail/<?php echo $dizi["seo_adi"];  ?>">
				<span>
					<?php echo $ana_kat_populer_kategori_sayi[$n]; ?>
				</span>
				<span>
										<?php /*
				if($this->session->userdata('lng_turu')=="Eng"){ echo $dizi["adi"]; } 
				if($this->session->userdata('lng_turu')=="Tr"){ echo $dizi["adi_tr"]; } 	
				if($this->session->userdata('lng_turu')=="Ru"){  echo $dizi["adi_ru"]; } 		
*/

				echo $dizi["adi".$uz]; 					
				?>
			</span>
		</a>





		<?php $n=$n+1;	 endforeach;  endif;  ?>	









	</div>
</div>
<div class="topEvents center-align">
	<h5>
		<?php if( $ana_kat_bilgi ) : foreach( $ana_kat_bilgi  as $dizi ) : ?>	
			<?php 
		/*		if($this->session->userdata('lng_turu')=="Eng"){ echo $dizi["adi"]; } 
				if($this->session->userdata('lng_turu')=="Tr"){ echo $dizi["adi_tr"]; } 	
				if($this->session->userdata('lng_turu')=="Ru"){  echo $dizi["adi_ru"]; } 	*/
				
				echo $dizi["adi".$uz]; 	
				
				?>	
			<?php endforeach; endif; ?> 
			<?php echo $this->session->userdata('lng')["x_turlari"]; ?>
		</h5>	
		<div class="t-e-inner jcc">


			<?php	if( $ana_kat_turlar ) :  foreach( $ana_kat_turlar  as $dizi ) :    ?>	

				<?php 	 
				$tursay=count($dizi["tur"]);
				$turdongu = $tursay-1;

				for($m=0; $m<=$turdongu; $m++){
					?>

					<a href="<?php echo base_url(); ?>Tour/detail/<?php			echo $dizi["tur"][$m]["seo_adi"]; 		?>"><span></span><span><?php			echo $dizi["tur"][$m]["adi"]; 		?> </span></a>


				<?php }	 endforeach;  endif;  ?>						


			</div>
		</div>
		<div class="topEvents center-align">
			<?php if( $ana_kat_bilgi ) : foreach( $ana_kat_bilgi  as $dizi ) : ?>	
				<p>
					<?php echo $this->session->userdata('lng')["grmk_istr"]; ?> 
					<?php 
			/*	if($this->session->userdata('lng_turu')=="Eng"){ echo $dizi["adi"]; } 
				if($this->session->userdata('lng_turu')=="Tr"){ echo $dizi["adi_tr"]; } 	
				if($this->session->userdata('lng_turu')=="Ru"){  echo $dizi["adi_ru"]; } */

				echo $dizi["adi".$uz]; 					
				?>	?
				<a href="<?php echo base_url(); ?>search/word/<?php echo $dizi["seo_adi"];  ?>">
					<?php echo $this->session->userdata('lng')["full_lste"]; ?> 
				</a>
			</p>
		</div>
	</div>
<?php endforeach; endif; ?>
</div>
</div>
</section>

<section class="bottom-categories">
	<div class="container">
		<div class="category-inner">
			<h6>
				<?php echo $this->session->userdata('lng')["en_pplr"]; ?> 
			</h6>
			<div>

				<?php $s=0;	if( $populer_tur ) :  foreach( $populer_tur  as $dizi ) :  if($s==10){break;}   ?>	



				<a href="<?php echo base_url(); ?>Tour/detail/<?php echo $dizi["seo_adi"];  ?>"><p>		<?php 
			/*	if($this->session->userdata('lng_turu')=="Eng"){ echo $dizi["adi"]; } 
				if($this->session->userdata('lng_turu')=="Tr"){ echo $dizi["adi_tr"]; } 	
				if($this->session->userdata('lng_turu')=="Ru"){  echo $dizi["adi_ru"]; } 	*/
				echo $dizi["adi".$uz]; 					
				?>	</p></a>

				<?php $s=$s+1;	 endforeach;  endif;  ?>


			</div>
		</div>
		<div class="category-inner">
			<h6>
				<?php echo $this->session->userdata('lng')["bluepoplr"]; ?> 
			</h6>
			<div>
				<?php  $s=0;	if( $populer_ana_kategori ) :  foreach( $populer_ana_kategori  as $dizi ) :  if($s==10){break;}    ?>	



				<a href="<?php echo base_url(); ?>Categories/detail/<?php echo $dizi["seo_adi"];  ?>"><p>
					<?php 
		/*		if($this->session->userdata('lng_turu')=="Eng"){ echo $dizi["adi"]; } 
				if($this->session->userdata('lng_turu')=="Tr"){ echo $dizi["adi_tr"]; } 	
				if($this->session->userdata('lng_turu')=="Ru"){  echo $dizi["adi_ru"]; } 	*/
				
				echo $dizi["adi".$uz]; 	
				
				?>	

			</p></a>

			<?php   $s=$s+1;	 endforeach;  endif;  ?>
		</div>
	</div>
	<div class="category-inner">
		<h6>
			<?php echo $this->session->userdata('lng')["pplr_vrs_nkts"]; ?> 
		</h6>
		<div>
			<?php  $s=0;	if( $populer_kategori ) :  foreach( $populer_kategori  as $dizi ) :  if($s==10){break;}    ?>	


			<a href="<?php echo base_url(); ?>Category/detail/<?php echo $dizi["seo_adi"];  ?>"><p>
				<?php 
			/*	if($this->session->userdata('lng_turu')=="Eng"){ echo $dizi["adi"]; } 
				if($this->session->userdata('lng_turu')=="Tr"){ echo $dizi["adi_tr"]; } 	
				if($this->session->userdata('lng_turu')=="Ru"){  echo $dizi["adi_ru"]; } 	*/
				echo $dizi["adi".$uz]; 	
				
				?>	

			</p></a>

			<?php  $s=$s+1;	 endforeach;  endif;  ?>
		</div>
	</div>
</div>
</section>
</main>
<?php $this->load->view('footer'); ?>



<!-- jQuery.js -->
<script src="<?php echo base_url(); ?>assets_user/js/jquery-3.4.1.min.js"></script>
<!-- materalize.js -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets_user/js/materialize.min.js"></script>
<!-- function.js -->
<script src="<?php echo base_url(); ?>assets_user/js/function.js"></script>
</body>
</html>