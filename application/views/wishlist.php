<!DOCTYPE html>
<html lang="tr">
<head>
	<title>
		<?php	if( $ayar ) :  foreach( $ayar  as $dizi ) :    ?>	
			<?php echo strip_tags($dizi["kisa_aciklama".$uz]); ?>	
			<?php 	 endforeach;  endif;  ?>
		</title>
		<meta charset="UTF-8">
		<?php if( $ayar ) : foreach( $ayar  as $dizi ) : ?>	
			<meta name="description" content="<?php echo strip_tags($dizi["kisa_aciklama"]); ?>">
			<meta name="keyword" content="<?php echo strip_tags($dizi["seo_keywords"]);  ?>">
		<?php endforeach; endif; ?>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<?php $this->load->view('favicon'); ?>
		<!-- materialize.css -->
		<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets_user/css/materialize.min.css"  media="screen,projection"/>
		<!-- master.css -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets_user/css/master.css">
	</head>
	<body class="nonf">
		<?php $this->load->view('header_alt'); ?>

		<main>
			<script>var getNav=document.querySelector("nav > .nav-wrapper:not(.main-menu)");window.screen.width<=768&&(getNav=document.querySelector("nav > .nav-wrapper")),getHeight=getNav.offsetHeight,document.querySelector("main").style.marginTop=getHeight+"px";</script>
			<div class="container">

				<section class="c-brdcrmb">
					<h4>
						<span class="c-brdcrmb__icon">
							<?php echo "<span data-url='".icons_url."favorite-24px.svg'></span>";?>
						</span>
						<?php echo $this->session->userdata('lng')["istek"]; ?>
					</h4>
				</section>
				<section class="result-main none-shadow">				
					<?php $n=0;	if( $wishlist ) :  foreach( $wishlist as $dizi ) :   ?>
					<div class="s-b-c-i">

						<?php 
						if($dizi["tur_donemi"]!="otel"){ ?>
							<a href="<?php echo base_url(); ?>Tour/detail/<?php echo $dizi["seo_adi"];  ?>"></a>
						<?php  }
						else{ ?>
							<a href="<?php echo base_url(); ?>otels/otel/detail/<?php echo $dizi["seo_adi"];  ?>"></a>
							<?php 	
						} 
						?>


						<div class="b-c-t-i">
							<img src="<?php echo base_url(); ?>assets/resimler/turlar/<?php echo $dizi["resim_2"];  ?>" alt="Vatikan">
							<p>
								<h5><?php echo $dizi["adi".$uz]; ?></h5>
								<div class="b-c-d-i">
									<?php if($dizi["sticker"]==1){ ?>
										<span class="b-c-d-s tuken">
											<img width="24px" height="24px" src="<?php echo base_url(); ?>assets_user/img/blue_eye_logo.svg" alt="Best Tour" /><?php echo $this->session->userdata('lng')["blue_orjnl"]; ?>
										</span>
									<?php } ?>
								</div>
								<div class="choose-other">
									<span class="remove">
										<a href="<?php echo base_url(); ?>wishlist/remove/<?php echo $dizi["id"];?>/<?php echo $dizi["seo_adi"];?>">
											<?php echo $this->session->userdata('lng')["kldrs"]; ?>
										</a>
									</span>
									<div class="stars">
										<?php $puan1=$puan[$dizi["kod"]]["tur_puan_genel"];  ?>

										<?php 											


										$star=floor($puan1);
										$dongu=$star-1;
										for($i=0; $i<=$dongu; $i++){

											echo "<span data-url='".icons_url."star.svg'></span>";
										}

										if($puan1>$star){
											echo "<span data-url='".icons_url."star_half.svg'></span>";
										}

										$bos=4-$dongu;

										if($puan1>$star){$bos=$bos-1;}
										$bodongu=$bos-1;

										for($i=0; $i<=$bodongu; $i++){

											echo "<span data-url='".icons_url."star_border.svg'></span>";
										}	

										?>
									</div>
									<span><?php echo $dizi["yorum_adet"];?> 
									<?php echo $this->session->userdata('lng')["onrln_ktgr_yrm"]; ?> 
								</span>

							</div>
						</p>

					</div>
				</a>
				<p>
					<?php echo substr($dizi["aciklama".$uz], 0, 200); ?>	

				</p>
				<div class="b-c-b-i">
					<div class="timeprice">
						<span class="other-duration">
							<?php echo "<span data-url='".icons_url."restore-24px.svg'></span>";?>
							<b>
								<?php echo $this->session->userdata('lng')["sure"]; ?> : 
							</b> 
							<?php echo $dizi["sure"];  ?>
						</span>
						<span class="other-price">
							<p>
								<?php echo $this->session->userdata('lng')["onrln_ktgr_fiyt"]; ?> 
							</p>
							<p>
								<?php 
								echo round($dizi["baslangic_fiyat"]*$this->session->userdata('currency'))." ".$this->session->userdata('currency_icon');

								?> 	

							</p>

						</span>

					</div>
				</div>

			</div>


			<?php $n=$n+1; endforeach;  endif;  ?>



		</section>
	</div>
	<?php $this->load->view('mail_kayit'); ?>
</main>
<?php $this->load->view('footer'); ?>


<!-- jQuery.js -->
<script src="<?php echo base_url(); ?>assets_user/js/jquery-3.4.1.min.js"></script>
<!-- jQuey cookie.js -->
<script src="<?php echo base_url(); ?>assets_user/js/jquery.cookie.js"></script>
<!-- materalize.js -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets_user/js/materialize.min.js"></script>
<!-- function.js -->
<script src="<?php echo base_url(); ?>assets_user/js/function.js"></script>
<!-- viewer.js -->
<script src="<?php echo base_url(); ?>assets_user/js/viewer.min.js"></script>
</body>
</html>