<!DOCTYPE html>
<html lang="<?php echo $this->session->userdata('lng')["lang"]; ?>">
<head><meta http-equiv="Content-Type" content="text/html; charset=big5">
	<title>
		<?php if( $ayar ) : foreach( $ayar  as $dizi ) : ?>	
			<?php echo strip_tags($dizi["kisa_aciklama".$uz]); ?>
		<?php endforeach; endif; ?>
	</title>
	
	
	<?php if( $ayar ) : foreach( $ayar  as $dizi ) : ?>	
		<meta name="description" content="<?php echo strip_tags($dizi["kisa_aciklama"]); ?>">
		<meta name="keyword" content="<?php echo strip_tags($dizi["seo_keywords"]);  ?>">
	<?php endforeach; endif; ?>
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<?php $this->load->view('favicon'); ?>
	<!-- materialize.css -->
	<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets_user/css/materialize.min.css" 
	media="screen,projection" defer/>
	<!-- master.css -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets_user/css/master.css" />
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

				var getHeight = getNav.offsetHeight;
				document.querySelector('main').style.marginTop = getHeight + 'px';
			})();
		</script>
		<section class="rezerv">
			<div class="parallax-container">
				<div class="parallax">
					<?php	if( $ayar ) :  foreach( $ayar  as $dizi ) :    ?>	
						<img src="<?php echo base_url(); ?>assets/resimler/home/<?php echo $dizi["home_photo"];  ?>">
					</div>
					<style>
						.buy-ticket .btn.waves-effect:not(.modal-close){display:-webkit-flex;display:-moz-flex;display:-ms-flex;display:-o-flex;display:flex;-ms-align-items:center;align-items:center;justify-content:space-around;text-align:center;font-weight:500;background-color:var(--light-blue);border-radius:32px;margin-top:0;width:100%}
					</style>
					<div class="rezerv-inner">
						<div class="buy-ticket card-panel">
							<?php echo $dizi["home_slogan".$uz]; ?>
						<?php endforeach; endif; ?>

						<!--<ul class="i_t-o_t tabs">
							<li class="tab">
								<a class="active" href="#tur_tab">
									<?php echo $this->session->userdata('lng')["tur"]; ?>
								</a>
							</li>
						</ul>-->
						<div id="tur_tab">
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
										<input id="end_date" name="bit_t" type="text" class="datepicker">
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
						<div id="otel_tab" style="display: none;">
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
	<section class="specs">
		<div class="container center-align">
			<div class="specs-inner">
				<div class="specs-inner__spec spec">
					<h6 class="spec__title">
						<span data-url="<?php echo icons_url; ?>explore-24px.svg"></span>
						<?php echo $this->session->userdata('lng')["en_iyi_secim"]; ?>
					</h6>
					<p class="spec__text">
						<?php echo $this->session->userdata('lng')["en_iyi_secim_aciklama"]; ?>
					</p>
				</div>
				<div class="specs-inner__spec spec">
					<h6 class="spec__title">
						<span data-url="<?php echo icons_url; ?>thumb_up-24px.svg"></span>
						<?php echo $this->session->userdata('lng')["en_iyi_fiyat"]; ?>
					</h6>
					<p class="spec__text">
						<?php echo $this->session->userdata('lng')["en_iyi_fiyat_aciklama"]; ?>
					</p>
				</div>
				<div class="specs-inner__spec spec">
					<h6 class="spec__title">
						<span data-url="<?php echo icons_url; ?>security-24px.svg"></span>
						<?php echo $this->session->userdata('lng')["guvenli_odeme"]; ?>
					</h6>
					<p class="spec__text">
						<?php echo $this->session->userdata('lng')["guvenli_odeme_aciklama"]; ?>
					</p>
				</div>
				<div class="specs-inner__spec spec">
					<h6 class="spec__title">
						<span data-url="<?php echo icons_url; ?>contact_support-24px.svg"></span>
						<?php echo $this->session->userdata('lng')["7_24_yardim"]; ?>
					</h6>
					<p class="spec__text">
						<?php echo $this->session->userdata('lng')["7_24_yardim_aciklama"]; ?>
					</p>
				</div>
			</div>
		</div>
	</section>
	<section class="place">
		<div class="container center-align">
			<h4>
				<?php echo $this->session->userdata('lng')["onrln_ktgr_slgn"]; ?>
			</h4>

			<?php $n=0; if( $turlar_home ) : foreach( $turlar_home as $dizi ) : ?>


			<?php if($n==1){echo'<div class="places-inner reverse">';}
			else{ echo'<div class="places-inner">'; } ?>

			<div class="places-main">
				<div class="places-main__image">
					<img
					src="<?php echo base_url(); ?>assets_user/img/placeholder.svg"
					data-src="<?php echo base_url(); ?>assets/resimler/sehirler/<?php echo $dizi["resim_2"];?>"
					class="lazy" alt="<?php echo $dizi["adi"]; ?>" />
				</div>
				<?php if( $n == 2 ){
					echo'<div class="places-main-text smoth">';
				}
				else{ 
					echo'<div class="places-main-text">';
				} ?>
				<h4><?php echo $dizi["adi"]; ?></h4>

				<p><?php echo substr($dizi["aciklama"],0,120); ?></p>
				<a class="btn" href="
				<?php echo base_url(); ?>Categories/detail/<?php echo $dizi["seo_adi"];  ?>">
				<?php echo $this->session->userdata('lng')["onrln_ktgr_btn"]; ?>
			</a>
		</div>
	</div>
	<div class="places-other">
		<div class="places-row">
			<!-- İndirim varsa -->
			<?php 
			$tursay=count($dizi["tur"]);
			$dizi["tur"][0]["withDiscount"] = false;
			$dizi["tur"][0]["discountPercentage"] = 50;
			$dizi["tur"][0]["discountFiyat"] = 90;
			if($tursay>4){$turdongu = 3;} else{ $turdongu = $tursay-1; }

			for($m=0; $m<=$turdongu; $m++){
				?>
				<div class="other-main
				<?php echo $dizi["tur"][$m]["withDiscount"] ? 'withDiscount' : ''; ?>
				">
				<?php if ($dizi["tur"][$m]["withDiscount"]): ?>
					<span class="other-main__percentage">
						<?php echo $dizi["tur"][$m]["discountPercentage"]; ?> %
					</span>
				<?php endif ?>

				<a href="<?php echo base_url(); ?>Tour/detail/<?php echo $dizi["tur"][$m]["seo_adi"];  ?>"></a>
				<div class="other-image">
					<img 
					src="<?php echo base_url(); ?>assets_user/img/placeholder.svg"
					data-src="<?php echo base_url(); ?>assets/resimler/turlar/<?php echo $dizi["tur"][$m]["resim"]; ?>"
					class="lazy" alt="<?php echo $dizi["tur"][$m]["adi"]; ?>" />
				</div>
				<div class="other-text-inner">
					<a>
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
							<p class="<?php echo $dizi["tur"][$m]["withDiscount"] ? 'other-main-fiyat--withDiscount' : '' ?>">
								<?php if ($dizi["tur"][$m]["withDiscount"]): ?>
									<small><del><?php echo $dizi["tur"][$m]["discountFiyat"].$this->session->userdata('currency_icon'); ?></del></small>
								<?php endif ?>
								<?php 
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
</div>
</section>
<?php $this->load->view('mail_kayit'); ?>

<section class="top-places">
	<div class="container center-align">
		<h4><?php echo $this->session->userdata('lng')["poplr_slgn"]; ?></h4>
		<div class="top-places-inner">

			<?php	 	if( $populer_kategori ) :  foreach( $populer_kategori  as $dizi ) :    ?>

				
				
				<div class="top-places-item">
					<a href="<?php echo base_url(); ?>Category/detail/<?php echo $dizi["seo_adi"];  ?>">
						<figure>
							<img 
							src="<?php echo base_url(); ?>assets_user/img/placeholder.svg"
							data-src="<?php echo base_url(); ?>assets/resimler/sehirler/<?php echo $dizi["resim_2"];  ?>" 
							class="lazy"
							alt="<?php echo $dizi["adi".$uz]; ?>">
						</figure>
						<h5><?php echo $dizi["adi".$uz]; ?></h5>
					</a>
				</div>

			<?php endforeach; endif; ?>
		</div>
		<a class="btn blue darken-1 waves-effect show-more">
			<?php echo $this->session->userdata('lng')["poplr_slgn_btn"]; ?>
		</a>
	</div>
</section>
<section class="top-places top-destination">
	<div class="container center-align">
		<h4>
			<?php echo $this->session->userdata('lng')["en_poplr_slgn"]; ?>
		</h4>
		<div class="top-places-inner">
			<?php $n=0; if( $populer_ana_kategori ) : foreach( $populer_ana_kategori as $dizi ) : ?>
			<div class="top-countries-item">
				<a href="<?php echo base_url();  ?>Categories/detail/<?php echo $dizi["seo_adi"];  ?>"></a>
				<figure>
					<img 
					src="<?php echo base_url(); ?>assets_user/img/placeholder.svg"
					data-src="<?php echo base_url(); ?>assets/resimler/sehirler/<?php echo $dizi["resim_2"];  ?>"
					class="lazy"
					alt="<?php echo $dizi["adi".$uz]; ?>">
				</figure>
				<figcaption class="top-destination-comment">
					<h5><?php echo $dizi["adi".$uz]; ?></h5>

					<span><?php echo $populer_ana_kategori_sayi[$n]; ?>
					<?php echo $this->session->userdata('lng')["tur_otel"]; ?>
				</span>
			</figcaption>

		</div>
		<?php	$n=$n+1; endforeach;  endif;  ?>	

	</div>
	<a class="btn blue darken-1 waves-effect show-more-countries">
		<?php echo $this->session->userdata('lng')["poplr_slgn_btn"]; ?>
	</a>
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
							<?php $s=0;	if( $populer_tur ) : foreach( $populer_tur as $dizi ) :   ?>
							<a href="<?php echo base_url();  ?>Tour/detail/<?php echo $dizi["seo_adi"]; ?>">
								<!-- icon implementation in function.js/425 -->
								<span class="t-e__icon"></span>
								<span><?php echo $dizi["adi".$uz]; ?></span>
							</a>
							<?php if($s==12){
								echo'</div><div class="t-e-l">';
							} ?>
							<?php $s=$s+1; endforeach; endif; ?>	

						</div>

					</div>
					<p>
						<?php echo $this->session->userdata('lng')["assagi_yazi"]; ?>
						<a href="<?php echo base_url(); ?>All_categories">
							<?php echo $this->session->userdata('lng')["assagi_lnk"]; ?>
						</a>
					</p>
				</div>
			</div>
			<div id="topCountry" class="col s12">
				<div class="topCountry">
					<h5>
						<?php echo $this->session->userdata('lng')["en_10"]; ?>
					</h5>

					<section class="top-places">
						<div class="top-places-inner">

							<?php $s = 0; if ( $populer_ana_kategori ) : foreach ( $populer_ana_kategori as $dizi ) : ?>	

							<div class="top-places-inner__div">
								<a href="<?php echo base_url();  ?>Categories/detail/<?php echo $dizi["seo_adi"];  ?>"></a>
								<figure>
									<img 
									src="<?php echo base_url(); ?>assets_user/img/placeholder.svg"
									data-src="<?php echo base_url(); ?>assets/resimler/sehirler/<?php echo $dizi["resim_2"];  ?>"
									class="lazy"
									alt="<?php echo $dizi["adi".$uz]; ?>" />
								</figure>
								<h5><?php echo $dizi["adi".$uz]; ?></h5>
							</div>

							<?php if ( $s == 2 ) { break; } $s = $s + 1; endforeach; endif; ?>	

						</div>
					</section>

					<div class="t-e-inner justify-center">
						<?php $s = 0; if ( $populer_ana_kategori ) : foreach( $populer_ana_kategori  as $dizi ) : ?>

						<?php if ( $s > 2 ) { ?>	

							<a href="<?php echo base_url();  ?>Categories/detail/<?php echo $dizi["seo_adi"];  ?>"><span><?php echo $populer_ana_kategori_sayi[$s]; ?></span><span>
								<?php echo $dizi["adi".$uz]; ?>
							</span></a>	
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
<script src="<?php echo base_url(); ?>assets_user/js/jquery-3.4.1.min.js"></script>
<!-- materalize.js -->
<script src="<?php echo base_url(); ?>assets_user/js/materialize.min.js"></script>
<script>
	var elem = document.querySelector('.tabs');
	var instance = M.Tabs.init(elem);
	document.addEventListener('DOMContentLoaded', function() {
		var elems = document.querySelectorAll('.parallax');
		var instances = M.Parallax.init(elems);
	});
</script>
<!-- function.js -->
<script src="<?php echo base_url(); ?>assets_user/js/function.js"></script>
</body>
</html>