<!DOCTYPE html>
<html lang="tr">
<head>
	<title>
		<?php	if( $ayar ) :  foreach( $ayar  as $dizi ) :    ?>	

			<?php echo strip_tags($dizi["kisa_aciklama".$uz]); ?>	

		<?php 	 endforeach;  endif;  ?>
	</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<?php if( $ayar ) : foreach( $ayar  as $dizi ) : ?>	
		<meta name="description" content="<?php echo strip_tags($dizi["kisa_aciklama"]); ?>">
		<meta name="keyword" content="<?php echo strip_tags($dizi["seo_keywords"]);  ?>">
	<?php endforeach; endif; ?>
	<?php $this->load->view('favicon'); ?>
	<!-- materialize.css -->
	<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets_user/css/materialize.min.css" media="screen,projection"/>
	<!-- master.css -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets_user/css/master.css">
	<script src="<?php echo base_url(); ?>assets_user/js/jquery-3.4.1.min.js"></script>
</head>
<body class="nonf">
	<?php $this->load->view('header_alt'); ?>
	<main>		
		<script>var getNav=document.querySelector("nav > .nav-wrapper:not(.main-menu)");window.screen.width<=768&&(getNav=document.querySelector("nav > .nav-wrapper")),getHeight=getNav.offsetHeight,document.querySelector("main").style.marginTop=getHeight+"px";</script>
		<div class="container full-container">
			<section class="ch-o_m">
				<div class="ch-f py_i">
					<h5>
						<?php echo $this->session->userdata('lng')["odme_bilgi"]; ?>
					</h5>
					<div class="card-wrapper"></div>
					<form action="<?php echo base_url(); ?>checkout/payment" method="POST">


						<div class="input-field">
							<?php echo $this->session->userdata('lng')["check_ack"]; ?>
							
						</div>



						<div class="input-field">
<div class="input-field">
	<input type="text" 
		name="content" 
		placeholder="<?php echo $this->session->userdata('lng')["checkout_odeme_ek_bilgi"]; ?>"/>
</div>
							
						</div>



						<div class="ch_f_t">
							<input id="c_n" type="text" name="number" placeholder="<?php echo $this->session->userdata('lng')["krt_no"]; ?>"/>
							<input id="c_n_s" type="text" name="name" placeholder="<?php echo $this->session->userdata('lng')["ism_sysm"]; ?>"/>
						</div>
						<div class="ch_f_b_l">
							<input id="c_skt" type="text" name="expiry" placeholder="<?php echo $this->session->userdata('lng')["krt_trh"]; ?>"/>
							<input id="c_cvc" type="text" name="cvc" placeholder="<?php echo $this->session->userdata('lng')["krt_cvc"]; ?>"/>


							<input type="hidden" name="kuponDurumu" value="<?php echo $kuponDurumu; ?>"/>
							<input type="hidden" name="kuponsuzFiyat" value="<?php echo $kuponsuzFiyat; ?>"/>
							<input type="hidden" name="kuponluFiyat" value="<?php echo $kuponluFiyat; ?>"/>
							<input type="hidden" name="kuponKodu" value="<?php echo $kuponKodu; ?>"/>
							<input type="hidden" name="oran" value="<?php echo $oran; ?>"/>						

						</div>
						<div class="ch_f_b_r">
							<!--<button type="submit" id="c_sbt" class="btn waves-effect submit-button right">Gönder</button>-->
						</div>
						<ul class="collapsible sprs_ozt--i bxshn">
							<li>
								<div class="collapsible-header">
									<span class="collapsible-header__icon">
										<?php echo "<span data-url='".icons_url."arrow_downward-24px.svg'></span>";?>
										
									</span>
									<h5>
										<?php echo $this->session->userdata('lng')["sprs_ozt"]; ?>
									</h5>
									<span class="collapsible-header__icon">
										<?php echo "<span data-url='".icons_url."arrow_downward-24px.svg'></span>";?>
									</span>
								</div>
								<div class="collapsible-body sprs_ozt">
									<div class="prdcs-i ch_rt">
										<?php $n=0; $total=0; if( $cart_getir ) : foreach( $cart_getir as $dizi ) : ?>

										<?php
										$adi=$tur_bilgi[$n][0]["adi".$uz];



										$resim=$tur_bilgi[$n][0]["resim"];   
										$sure=$tur_bilgi[$n][0]["sure"];
										$seo_adi=$tur_bilgi[$n][0]["seo_adi"];
										$odeme_turu=$tur_bilgi[$n][0]["odeme_turu"];  
										$kategori=$kat_bilgi[$n];

										$baslangic_tarihi=$dizi["bas_tar"];
										$bitis_tarihi=$dizi["bit_tar"];
										$baslangic_saati=$dizi["baslangic_saati"];
										$bitis_saati=$dizi["bitis_saati"];
										$indirimsiz=$dizi["indirimsiz"];
										$tutar=$dizi["tutar"];
										$yetiskin_adet=$dizi["yetiskin"];
										$cocuk_adet=$dizi["cocuk"];
										$id=$dizi["id"];
										$kullanici_id=$dizi["kullanici_id"];
										$tur_id=$dizi["tur_id"];
										$total=$total+$tutar;

										?>

										<div class="prdct-i">
											<div class="prdct">
												<div class="prd-i sprs_ozt--image">
													<img src="<?php echo base_url(); ?>assets/resimler/turlar/<?php echo $resim; ?>" alt="Tur">
												</div>
												<div class="prd-t">
													<h6><?php echo $adi; ?></h6>
													<p><?php echo $this->session->userdata('lng')["spt_ktgr"]; ?>: <a href="#"><?php echo $kategori; ?></a></p>


													<?php if($odeme_turu==1){ ?> 									

														<script type="text/javascript">

															$(function(){

																let 
																n 		= "<?php echo $n; ?>",
																dakika 	= 0,
																saniye 	= "<?php echo $dakika[$n]; ?>",
																sayacYeri;

																saniye		= saniye * 60;
																sayacYeri	= $("div.sayac_"+n+" span");


																setInterval(
																	$.sayimiBaslat = function(){

																		if(saniye > 1){
																			saniye--;
																			let secondsToHms = d => {
																				d = Number(d);
																				let 
																				h 			= Math.floor(d / 3600),
																				m 			= Math.floor(d % 3600 / 60),
																				s 			= Math.floor(d % 3600 % 60),
																				hDisplay 	= h > 0 ? h + (h == 1 ? ":" : ":") : "",
																				mDisplay 	= m > 0 ? m + (m == 1 ? ":" : ":") : "",
																		
																				sDisplay 	= s > 0 ? s + (s == 1 ? "" : " ") : "";

																				return hDisplay + mDisplay + sDisplay; 
																				
																				
																			}
																			let sonuc = secondsToHms(saniye);
																			sayacYeri.text(sonuc+" min.");
																		}
																		else {

																			location.reload();

																		}
																	}, 1000);
															});
														</script>
														<div class="sayac_<?php echo $n; ?>"><span></span> <?php echo $this->session->userdata('lng')["sure_icnd_odeme"]; ?></div>







													<?php } ?>									







												</div>
											</div>
											<div class="price">
												<h6>
													<?php 
												//echo $tutar
													echo round($tutar*$this->session->userdata('currency'))." ".$this->session->userdata('currency_icon');

													?> 
												</h6>
												<p><?php echo $this->session->userdata('lng')["ek_ucrt_yk"]; ?> </p>
											</div>
										</div>
										<?php $n=$n+1; endforeach; endif; ?>

									</div>
								</div>
							</li>
						</ul>
						<p>
							<label>
								<input class="sozlesme" type="checkbox" />
								<span>
									<?php echo $this->session->userdata('lng')["onay_ilk"]; ?> 
									<a href="<?php echo base_url(); ?>pages/detail/gizlilik-politikasi">
										<?php echo $this->session->userdata('lng')["gizllk"]; ?>
									</a>,
									<a href="<?php echo base_url(); ?>pages/detail/kullanim-kosullari">
										<?php echo $this->session->userdata('lng')["kul_ksl"]; ?>
									</a>,
									<a href="<?php echo base_url(); ?>pages/detail/mesafeli-satis-sozlesmesi">
										<?php echo $this->session->userdata('lng')["sts_szlsm"]; ?>
									</a>
								</span>
							</label>
						</p>
						<div class="ch_lst_if">

	

							<a><?php echo $this->session->userdata('lng')["tplm_fyt"]; ?>: </a>

			
							
							<a href="#">
								<?php 
								//echo $total

							if($kuponDurumu==0){
								echo round($total*$this->session->userdata('currency'))." ".$this->session->userdata('currency_icon');
										 	}
							else{

										 		echo $kuponluFiyat." ".$this->session->userdata('currency_icon');

										 	echo"<br><del class='oldTotalAmount'>";	echo $kuponsuzFiyat." ".$this->session->userdata('currency_icon');  echo"</del>";
							}

								?> 
								<span class="succes"><?php echo $this->session->userdata('lng')["ek_ucrt_yk"]; ?> </span></a>
							</div>


							<?php if (($ayar[0]["adress"]!="")or($ayar[0]["fatura_adresi"]!="") ){ ?>
								<button type="submit" id="ch_ps" class="btn submit-button right disabled"><?php echo $this->session->userdata('lng')["odme_tmm_btn"]; ?> </button>
							<?php } ?>	

							<?php if (($ayar[0]["adress"]=="")and($ayar[0]["fatura_adresi"]=="") ){ ?>
								<a href="<?php echo base_url(); ?>/Config">
									<?php echo $this->session->userdata('lng')["adres_bilgi"]; ?>
								</a>
							<?php } ?>

						</form>
					</div>
					<div class="ch-i">
						<div class="ch-i_i">
							<h6>
								<?php echo $this->session->userdata('lng')["odme_scnk"]; ?>
							:</h6>
							<p>
								<a class="succes">
									<?php echo "<span data-url='".icons_url."security-24px.svg'></span>";?>
									<?php echo $this->session->userdata('lng')["gvnl_odme"]; ?>
								</a>
								<div class="py_m">
									<img src="<?php echo base_url(); ?>assets_user/img/visa.svg" alt="visa">
									<img src="<?php echo base_url(); ?>assets_user/img/maestro.svg" alt="maestro">
									<img src="<?php echo base_url(); ?>assets_user/img/mastercard.svg" alt="mastercard">
									<?php echo $this->session->userdata('lng')["krdi_vya_bank_krt"]; ?>
								</div>
							</p>
							<h6>
								<?php echo $this->session->userdata('lng')["veri_gvnlk"]; ?>
							</h6>
							<div>
								<?php echo "<span data-url='".icons_url."lock-24px.svg'></span>";?>
								
								<p><?php echo $this->session->userdata('lng')["bilgi_ssl"]; ?>
								<br><?php echo $this->session->userdata('lng')["blue_gzllk_beyan"]; ?></a>
							</p>

						</div>
						<h6><?php echo $this->session->userdata('lng')["rezervsyn_gvnli"]; ?></h6>
						<div>
							<span class="green-text text-darken-4 done-icon">
								<?php echo "<span data-url='".icons_url."done-24px.svg'></span>";?>
								
							</span>
							<a><b><?php echo $this->session->userdata('lng')["en_iyi_fyt"]; ?></b></a>
						</div>
						<div>
							<span class="green-text text-darken-4 done-icon">
								<?php echo "<span data-url='".icons_url."done-24px.svg'></span>";?>
								
							</span>
							<a><?php echo $this->session->userdata('lng')["gonul_rhtl"]; ?></a>
						</div>

					</div>
				</div>
			</section>


		</div>
	</main>
	<?php $this->load->view('footer'); ?>




	<!-- jQuery.js -->
	<script src="<?php echo base_url(); ?>assets_user/js/jquery.card.js"></script>
	<script>
		$('form').card({
			form: 'form',
			container: '.card-wrapper',
			placeholders: {
				name: '<?php echo $this->session->userdata('lng')["ism_sysm"]; ?>',
			}
		});
	</script>
	<!-- materalize.js -->
	<script src="<?php echo base_url(); ?>assets_user/js/materialize.min.js"></script>
	<!-- function.js -->
	<script src="<?php echo base_url(); ?>assets_user/js/function.js"></script>
</body>
</html>