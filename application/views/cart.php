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
	
	<meta name="google-signin-client_id" content="1097393470680-mdv8usp86rcvcqj0df6185g2rqu8hiti.apps.googleusercontent.com">
	<?php $this->load->view('favicon'); ?>
	<!-- materialize.css -->
	<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets_user/css/materialize.min.css"  media="screen,projection"/>
	<!-- master.css -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets_user/css/master.css">

	<script src="<?php echo base_url(); ?>assets_user/js/jquery-3.4.1.min.js"></script>
</head>
<body class="nonf">
	<?php $this->load->view('header_alt'); ?>

	<main>
		<script>
			var getNav=document.querySelector("nav > .nav-wrapper:not(.main-menu)");window.screen.width<=768&&(getNav=document.querySelector("nav > .nav-wrapper")),getHeight=getNav.offsetHeight,document.querySelector("main").style.marginTop=getHeight+"px"
			window.flags = {
				signin: {
					status: <?php 
					if ($this->session->userdata('useronline') == "") {echo "false";}
					else {echo "true";}?>,
					name_surname: '',
					email: '',
					login_type: '',
					id: ''

				}
			}
			window.visitorInfoStatus = [];
			
			
		</script>
		<div class="container">
			<section class="c-brdcrmb">
				<h4>
					<span class="c-brdcrmb__icon">
						<?php echo "<span data-url='".icons_url."outline-local_grocery_store-24px.svg'></span>";?>
					</span>
					<?php echo $this->session->userdata('lng')["spt_ust_bslk"]; ?>
				</h4>
				<?php if($onrezadet!=0){ ?>
				<span style="float:right;">
					<b><?php echo $this->session->userdata('lng')["e_git"].$this->session->userdata('lng')["on_rzrv"] ?></b>
				</span>
				<?php } ?>
			</section>
			<section class="card-inner">
				<div class="prdcs-i">
					<div class="prdct-i p-header">
						<div class="prdct">
							<span>
								<?php echo $this->session->userdata('lng')["urun"]; ?>
							</span>
						</div>
						<div class="price">
							<span>
								<?php echo $this->session->userdata('lng')["fiyat"]; ?>
							</span>
						</div>
					</div>
					
					<?php	$n=0;	$total=0;	if( $cart_getir ) :  foreach( $cart_getir as $dizi ) :  ?>
					<?php $adi=$tur_bilgi[$n][0]["adi".$uz];
					
					

					$resim=$tur_bilgi[$n][0]["resim"];   
					$sure=$tur_bilgi[$n][0]["sure"];
					$seo_adi=$tur_bilgi[$n][0]["seo_adi"];
					$odeme_turu=$tur_bilgi[$n][0]["odeme_turu"];
					
					
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
					$id=$dizi["id"];	
					$kullanici_id=$dizi["kullanici_id"];	
					$tur_id=$dizi["tur_id"];								
					$total=$total+$tutar;

					?>

					<script>
						window.visitorInfoStatus[<?php echo $n; ?>] = false;
					</script>
					
					<div class="prdct-i">
						<div class="prdct">
							<div class="prd-i">
								<img src="<?php echo base_url(); ?>assets/resimler/turlar/<?php echo $resim; ?>" alt="Tur">
							</div>
							<div class="prd-t">

								<h6><?php echo $adi; ?></h6>
								<p>
									<?php echo $this->session->userdata('lng')["spt_ktgr"]; ?>
									: 
									<a href="<?php echo base_url(); ?>Category/detail/<?php echo $kat_bilgi_seo; ?>"><?php echo $kategori; ?></a>
								</p>

								<a href="#spt_t_ayr<?php echo $n; ?>" class="modal-trigger">
									<?php echo $this->session->userdata('lng')["ayrntlr"]; ?>
								</a>
								<div class="prdct_o_btn">
									<a href="#confirm-modal<?php echo $n; ?>" class="d-i modal-trigger">
										<?php echo $this->session->userdata('lng')["sil"]; ?>
									</a>
									<a href="<?php echo base_url(); ?>Tour/detail/<?php echo $seo_adi; ?>" class="e-i">
										<?php echo $this->session->userdata('lng')["dznl"]; ?>
									</a>
								</div>
								<?php if($odeme_turu==1){ ?>
									<script type="text/javascript">

										$(function(){

											var 
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
									<div class="sayac_<?php echo $n; ?>">
										<span>00:00</span> 
										<?php echo $this->session->userdata('lng')["sure_icnd_odeme"]; ?>:
									</div>
								<?php } ?>
								<div id="confirm-modal<?php echo $n; ?>" class="modal">
									<div class="modal-header">
										<h4>
											<?php echo $this->session->userdata('lng')["uruun_sil_emin"]; ?>
										</h4>
									</div>
									<p class="divider"></p>
									<div class="modal-ops">
										<a class="btn modal-close">
											<?php echo $this->session->userdata('lng')["hayir"]; ?>
										</a>
										<a href="<?php echo base_url(); ?>cart/delete/<?php echo $id; ?>/<?php echo $kullanici_id; ?>/<?php echo $tur_id; ?>" class="btn modal-close">
											<?php echo $this->session->userdata('lng')["evet"]; ?>
										</a>
									</div>
								</div>


								<div id="spt_t_ayr<?php echo $n; ?>" class="modal">
									<div class="modal-header">
										<h4><?php echo $adi; ?></h4>
									</div>
									<div class="modal-inner m_i_p spt_ayr_m">
										<p>
											<span class="prd-t__icon">
												<?php echo "<span data-url='".icons_url."restore-24px.svg'></span>";?>
											</span>
											<?php echo $this->session->userdata('lng')["sure"]; ?>
											: 
											<span class="normal"><?php echo $sure; ?></span>
										</p>
										<p class="divider"></p>
										<p>
											<span class="prd-t__icon">
												<?php echo "<span data-url='".icons_url."outline-date_range-24px.svg'></span>";?>
											</span>
											<?php echo $this->session->userdata('lng')["trh"]; ?>
											: 
											<span class="normal">
												<?php
												if($baslangic_saati=="00:00:00"){ echo $baslangic_tarihi." - ".$bitis_tarihi;  }
												else{  echo $baslangic_tarihi." Saat: ".$baslangic_saati." - ".$bitis_saati;  }
												?>
											</span>
										</p>
										<p class="divider"></p>
										<p>
											<span class="prd-t__icon">
												<?php echo "<span data-url='".icons_url."outline-more-24px.svg'></span>";?>
											</span>
											<?php echo $this->session->userdata('lng')["dety"]; ?>
											: 
											<span class="normal">
												<?php echo $yetiskin_adet." ".$this->session->userdata('lng')["n_ytskn"]; ?>
											<?php if($cocuk_adet!=0){ echo $cocuk_adet." ".$this->session->userdata('lng')["n_cck"]; }?>
												<?php if($bebek_adet!=0){ echo $bebek_adet." ".$this->session->userdata('lng')["bbk"]; }?>
												
											
											</span>
										</p>								

									</div>

									<div class="modal-ops">
										<a style="display: none"></a>
										<a class="btn modal-close">
											<?php echo $this->session->userdata('lng')["tmm"]; ?>
										</a>
									</div>

								</div>



								<div id="spt_item<?php echo $n; ?>" class="modal modal-fixed-footer" 
									data-is-first = "<?php echo ($n == 0) ? 'true' : 'false'; ?>"
									>


									<form action="<?php echo base_url(); ?>checkout" method="POST">
										<div class="modal-header sticky-modal-header">
											<h4>
												<?php  echo $this->session->userdata('lng')["ktlmc_ism_gir"]; ?>
											</h4>
										</div>
										<div class="modal-content">
											<div class="spt_k_s_f-i">
												<?php $sayi=count($ziyaretci_bilgi[$n]);	
												$dongu=$sayi-1;
												for($i=0; $i<=$dongu; $i++){ ?>

													<?php if ($i == 0): ?>
														
													<?php endif ?>


													<div class="spt_k_s_f--k" 
													<?php echo ($i == 0) ? 'isLider': '' ?>>
													<span class="spt_k_s_f--k_s">
														<?php 
														echo ($i == 0) ? $this->session->userdata('lng')["lider"] : $i.'.'.$this->session->userdata('lng')["n_kisi"];
														?>
													</span>
													<div class="spt_k_s_f--ust">
														<div class="input-field">
															<input value="<?php echo $ziyaretci_bilgi[$n][$i]["adi"]; ?>" 
															id="iism<?php echo $n."_".$i; ?>" 
															type="text" 
															name="kisi<?php $m=$i+1; echo $n."_".$m; ?>"
															
															<?php echo ($i == 0) ? 'lider="name"' : '' ?>>
															<label for="iism<?php echo $n."_".$i; ?>">
																<?php echo $this->session->userdata('lng')["ism_sysm"]; ?>
															</label>
														</div>
														<?php if ($i == 0): ?>
															<div class="input-field">
																<input name="otelName"
																type="text" 
																id="oteladi<?php echo $n."_".$i; ?>" 
																lider="otel"
																value="<?php echo $ziyaretci_bilgi[$n][$i]["otel_adi"]; ?>"
																/>
																<label for="oteladi<?php echo $n."_".$i; ?>">
																	<?php echo $this->session->userdata('lng')["otel_adi"]; ?>
																</label>
																
															</div>
															<div class="input-field">
																<select class="er<?php $m=$i+1;  echo $n."_".$m; ?>"
																	name="er<?php $m=$i+1;  echo $n."_".$m; ?>"
																	<?php echo ($i == 0) ? 'lider="age"' : '' ?>
																	default-text="<?php echo $this->session->userdata('lng')["ersknl_drm"] ?>"
																	>


																	<?php 
																	switch ($ziyaretci_bilgi[$n][$i]["eriskin"]) {
																		case "":
																		echo '<option value="" disabled selected>'.$this->session->userdata('lng')["ersknl_drm"].'</option>';
																		break;
																		case 1:
																		echo '<option value="1">'.$this->session->userdata('lng')["erskn"].'</option>';
																		break;
																		case 2:
																		echo '<option value="2">'.$this->session->userdata('lng')["cck"].'</option>';
																		break;
																	};
																	?>
																	<option value="1"><?php echo $this->session->userdata('lng')["erskn"]; ?></option>
																	<option value="2"><?php echo $this->session->userdata('lng')["cck"]; ?></option>
																</select>
															</div>

														<?php endif ?>
													</div>
													<?php if ($i == 0): ?>
														<div class="spt_k_s_f--ust">
															<div class="input-field">
																<input 
																value="<?php echo $ziyaretci_bilgi[$n][$i]["email"]; ?>" 
																id="mail<?php echo $n."_".$i; ?>" 
																type="email" 
																name="mail<?php echo $n."_".$i+1; ?>"
																<?php echo ($i == 0) ? 'lider="mail"' : '' ?>

																>
																<label for="mail<?php echo $n."_".$i; ?>">
																	<?php echo $this->session->userdata('lng')["email"]; ?> 
																	<?php $ziyaretci_bilgi[$n][0]["sepet_id"]; ?>
																</label>
															</div>
															<div class="input-field">
																<input value="<?php echo $ziyaretci_bilgi[$n][$i]["tel"]; ?>" 
																id="tel<?php echo $n."_".$i; ?>" 
																type="tel" 
																name="num<?php echo $n."_".$i+1; ?>"
																<?php echo ($i == 0) ? 'lider="phone"' : '' ?>
																>
																<label for="tel<?php echo $n."_".$i; ?>">
																	<?php echo $this->session->userdata('lng')["tlfn_no"]; ?>
																</label>
															</div>
															<div class="input-field">
																<input value="<?php echo $ziyaretci_bilgi[$n][$i]["sehir"]; ?>" 
																id="shr<?php echo $n."_".$i; ?>" 
																type="text" 
																name="sehir<?php echo $n."_".$i+1; ?>"
																<?php echo ($i == 0) ? 'lider="city"' : '' ?>
																>
																<label for="shr<?php echo $n."_".$i; ?>">
																	<?php echo $this->session->userdata('lng')["geldgnz_shr"]; ?> 
																</label>
																<input type="hidden" value="<?php echo $ziyaretci_bilgi[$n][$i]["sepet_id"]; ?>" id="sepet_id<?php echo $n."_".$i; ?>" type="text" name="sepet_id<?php echo $n."_".$i+1; ?>">
																<input  type="hidden" value="<?php echo $ziyaretci_bilgi[$n][$i]["id"]; ?>" id="id<?php echo $n."_".$i; ?>" type="text" name="id<?php echo $n."_".$i+1; ?>">
															</div>

														</div>
														
													<?php endif ?>

												</div>	

											<?php } ?>

										</div>
									</div>

									<div class="modal-ops modal-footer">
										<a class="btn modal-close spt_k_s_f--kpt">
											<?php echo $this->session->userdata('lng')["iptal"]; ?> 
										</a>
										<button class="ajax_trigger" 
										onclick="uygula(<?php echo $n; ?>,<?php echo $i-1; ?>,$(this).parents('.modal.open').attr('id'));return false;"
										style="display: none;"
										>
									</button>
									<a class="btn modal-close spt_k_s_f--dvm">
										<?php echo $this->session->userdata('lng')["kaydt"]; ?> 
									</a>
								</div>

							</form>
						</div>
					</div>
				</div>

				<div class="price">
					<del>

						<?php 
												//echo $indirimsiz 
						echo round($indirimsiz*$this->session->userdata('currency'))." ".$this->session->userdata('currency_icon');

						?> 

					</del>
					<h6>
						<?php 
												//echo $tutar 
						echo round($tutar*$this->session->userdata('currency'))." ".$this->session->userdata('currency_icon');

						?> 

					</h6>
					<p>
						<?php echo $this->session->userdata('lng')["ek_ucrt_yk"]; ?> 
					</p>
				</div>


			</div>		






			<a href="#spt_item<?php echo $n; ?>" class="btn modal-trigger spt_b_btn">
				<?php echo $this->session->userdata('lng')["zyrtc_bilg_dldr"]; ?> 
			</a>

			<?php	$n=$n+1;	endforeach;	endif;	?>





		</div>
		<div class="smmr-i">
			<h6>
				<?php echo $this->session->userdata('lng')["sprs_ozt"]; ?> 
			</h6>
			<p>
				<span><?php echo $n; ?></span> 
				<?php echo $this->session->userdata('lng')["urun"]; ?> 
			</p>
			<small>
				<?php echo $this->session->userdata('lng')["odnck_ttr"]; ?> 
			</small>
			<del class="oldTotalAmount"></del>
			<strong class="cartTotalAmount" data-totalAmount="<?php echo round($total*$this->session->userdata('currency')); ?>" data-currency="<?php echo $this->session->userdata('currency_icon'); ?>">
				<?php 
				echo round($total*$this->session->userdata('currency'))." ".$this->session->userdata('currency_icon');
				?> 
			</strong>
			<button class="linked bold modal-trigger" data-target="promo-modal">
				<?php echo $this->session->userdata('lng')["kupon_kodu_var_mi"]; ?>
			</button>
			<div class="modal" id="promo-modal">
				<div class="modal-header">
					<h4><?php echo $this->session->userdata('lng')["kupon_kodu_gir"]; ?></h4>
				</div>
				<div class="modal-inner modal-content">
					<div class="check_promo__inner">
						<div class="input-field">
							<input type="text" id="promotion-code" name="promotion-code" onkeyup="this.value = this.value.toUpperCase();">
							<label for="promotion-code">
								<?php echo $this->session->userdata('lng')["kupon_kodu"]; ?>
							</label>
						</div>
					</div>
				</div>
				<div class="modal-ops modal-footer">
					<a class="btn modal-close spt_k_s_f--kpt waves-effect">
						<?php echo $this->session->userdata('lng')["iptal"]; ?>
					</a>
					<a data-ajaxurl="<?php echo base_url(); ?>cart/promo_control" class="btn modal-close check_promo__btn waves-effect">
						<?php echo $this->session->userdata('lng')["kupon_kodu_kontrol"]; ?>
					</a>
				</div>
			</div>
			<p>
				<form action="<?php echo base_url(); ?>checkout" method="POST" class="spt_tm">
					<span class="couponStatus">
						<input type="hidden" name="kuponDurumu" value="0">
					</span>
					<input class="btn" type="submit" value="<?php echo $this->session->userdata('lng')["sprs_tm_btn"]; ?>">
				</form>
			</p>
			<a href="<?php echo base_url(); ?>" class="n-t-sh">
				<?php echo $this->session->userdata('lng')["alsvrs_dvm"]; ?>
				<?php echo "<span data-url='".icons_url."chevron_right-24px.svg'></span>";?>
			</a>
		</div>


	</section>


	<section class="place category-place">
		<div class="center-align">
			<h4>
				<?php echo $this->session->userdata('lng')["onerilen_turlar"]; ?>
			</h4>

			<div class="places-inner">
				<div class="places-other">

					<?php		$n=0;		if( $alt_kat_diger_turlar ) :  foreach( $alt_kat_diger_turlar as $dizi ) : ?>




					<div class="other-main">
						<a href="<?php echo base_url(); ?>Tour/detail/<?php echo $dizi["seo_adi"];  ?>"></a>
						<div class="other-image"><img src="<?php echo base_url(); ?>assets/resimler/turlar/<?php echo $dizi["resim"];  ?>" alt=""></div>
						<div class="other-text-inner">
							<a href="<?php echo base_url(); ?>Tour/detail/<?php echo $dizi["seo_adi"];  ?>">
								<?php echo $dizi["adi".$uz]; ?>
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
										<?php echo $alt_kat_diger_turlar_yorum_adet[$n]; ?> <?php echo $this->session->userdata('lng')["onrln_ktgr_yrm"]; ?>
									</span>
								</div>
								<div class="other-right">
									<p>
										<?php echo $this->session->userdata('lng')["onrln_ktgr_fiyt"]; ?>
									</p>
									<p>
										<?php 
												//echo $alt_kat_diger_turlar_fiyat[$n] 
										echo round($alt_kat_diger_turlar_fiyat[$n]*$this->session->userdata('currency'))." ".$this->session->userdata('currency_icon');

										?>

									</p>
								</div>
							</div>
						</div>
					</div>

					<?php	$n=$n+1;	 endforeach;  endif; 	 ?>

				</div>
			</div>
		</div>
	</section>



	<div id="sign-in" class="modal">
		<div class="modal-content signin-content">
			<button class="continue-with waves-effect" data-logintype="google">
				<?php echo "<span class='continue-with__icon' data-url='".icons_url."google.svg'></span>";?>
				<?php echo $this->session->userdata('lng')["login_with_google"]; ?>
			</button>
			<button class="continue-with waves-effect" data-logintype="facebook">
				<?php echo "<span class='continue-with__icon' data-url='".icons_url."facebook.svg'></span>";?>
				<?php echo $this->session->userdata('lng')["login_with_facebook"]; ?>
			</button>
			<p class="signin-content-with__or">
				<?php echo $this->session->userdata('lng')["login_with_or"]; ?>
			</p>
			<button class="continue-with waves-effect" data-logintype="email">
				<?php echo "<span class='continue-with__icon' data-url='".icons_url."email-24px.svg'></span>";?>
				<?php echo $this->session->userdata('lng')["login_with_email"]; ?>
			</button>
			<small class="signin-content__description">
				
				<?php echo $this->session->userdata('lng')["sos_giris_ilk"]; ?> 
				<a href="<?php echo base_url(); ?>pages/detail/kullanim-kosullari">
					<?php echo $this->session->userdata('lng')["kul_ksl"]; ?>
				</a> 
				<?php echo $this->session->userdata('lng')["sos_giris_son"]; ?> 
				<a href="<?php echo base_url(); ?>pages/detail/gizlilik-politikasi">
					<?php echo $this->session->userdata('lng')["gizllk"]; ?>
				</a>
			</small>
		</div>
	</div>

	<div id="sign-in-email" class="modal modal-fixed-footer" tabindex="0">

		<div class="modal-header sticky-modal-header">
			<h4>
				<?php echo $this->session->userdata('lng')["l_mail_title"]; ?>
			</h4>
		</div>
		<div class="modal-content sign-in-email">
			<div class="input-field">
				<input type="text" name="signin_name_surname" id="signin_name_surname">
				<label for="signin_name_surname">
					<?php echo $this->session->userdata('lng')["ism_sysm"]; ?>
				</label>
			</div>
			<div class="input-field">
				<input type="email" name="signin_email" id="signin_email">
				<label for="signin_email">
					<?php echo $this->session->userdata('lng')["email_slgn_label"]; ?>
				</label>
			</div>
			<div class="input-field">
				<input type="password" name="signin_password" id="signin_password">
				<label for="signin_password">
					<?php echo $this->session->userdata('lng')["sfre"]; ?>
				</label>
			</div>
			<div class="sign-in-email__warnings">
				<small>
					<?php echo $this->session->userdata('lng')["l_mail_pass_desc"]; ?>
				</small>
			</div>
		</div>

		<div class="modal-ops modal-footer">
			<a class="btn modal-close sign-in-email__close waves-effect">
				<?php echo $this->session->userdata('lng')["iptal"]; ?>
			</a>
			<a class="btn waves-effect sign-in-email__signin">
				<?php echo $this->session->userdata('lng')["kayt_ol_bslk"]; ?>
			</a>
		</div>
	</div>


</div>
<?php $this->load->view('mail_kayit'); ?>
</main>
<?php $this->load->view('footer'); ?>







<!-- materalize.js -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets_user/js/materialize.min.js"></script>
<script src="https://apis.google.com/js/platform.js?onload=onLoadGoogleCallback" async defer></script>
<!-- Event snippet for cart-web conversion page -->
<script>
	gtag('event', 'conversion', {
		'send_to': 'AW-1015959028/pJwVCMn00roBEPSbueQD',
		'transaction_id': ''
	});
</script>
<script>
	function onLoadGoogleCallback(){
		gapi.load('auth2', function() {
			auth2 = gapi.auth2.init({
				client_id: '1097393470680-mdv8usp86rcvcqj0df6185g2rqu8hiti.apps.googleusercontent.com',
				cookiepolicy: 'single_host_origin',
				scope: 'profile'
			});

			auth2.attachClickHandler(document.querySelector('[data-logintype="google"]'), {},
				function(googleUser) {
					var profile = googleUser.getBasicProfile();

					window.flags.initSignIn({
						status: true,
						name_surname: profile.getName(),
						email: profile.getEmail(),
						login_type: 'google',
						id: profile.getId()
					});

				},
				function(error) {
					M.toast({html: error.error});
				});
		});

	}

</script>
<script>
	window.fbAsyncInit = function() {
		FB.init({
			appId	: '540581196709253',
			cookie	: true,
			xfbml	: true,
			version	: 'v4.0'
		});
		FB.AppEvents.logPageView();
	};
	(function(d, s, id){
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) {return;}
		js = d.createElement(s); js.id = id;
		js.src = "https://connect.facebook.net/en_US/sdk.js";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
</script>
<!-- function.js -->
<script src="<?php echo base_url(); ?>assets_user/js/function.js"></script>

<script>
	function uygula(n,i,modul){

		for (let m = 0; m <= i; m++){


			let s = m + 1;


			let 
			iism0_0 		= $("#iism"+n+"_"+m).val(),
			mail0_0 		= $("#mail"+n+"_"+m).val(),
			tel0_0 			= $("#tel"+n+"_"+m).val(),
			shr0_0 			= $("#shr"+n+"_"+m).val(),
			slc0_0			= $(".er"+n+"_"+s).val(),
			id0_0 			= $("#id"+n+"_"+m).val(),
			sepet_id0_0		= $("#sepet_id"+n+"_"+m).val();
			oteladi0_0		= $("#oteladi"+n+"_"+m).val();
			console.log(oteladi0_0)

			values="iism0_0="+iism0_0+"&mail0_0="+mail0_0+"&tel0_0="+tel0_0+"&shr0_0="+shr0_0+"&slc0_0="+slc0_0+"&id0_0="+id0_0+"&sepet_id0_0="+sepet_id0_0+"&oteladi0_0="+oteladi0_0;


			$.ajax({

				url: "cart/info",
				type: "post",
				data: values,
				success: function (response) {

					var error = '<?php echo file_get_contents(icons_url."close-24px".".svg"); ?>';
					if(response != 1){
						$('a[href$="#'+modul+'"]').html(eksik + ' ' + error).removeClass('succsess').addClass('error');
						window.visitorInfoStatus[n] = false;
					}
					else {
						var succsess = '<?php echo file_get_contents(icons_url."done-24px".".svg"); ?>';
						$('a[href$="#'+modul+'"]').html(tmm + ' ' + succsess).removeClass('error').addClass('succsess');
						window.visitorInfoStatus[n] = true;
					}

				},
				error: function(jqXHR, textStatus, errorThrown) {
					console.log(textStatus, errorThrown);
				}

			});
		}


		return false;





	}






</script>




</body>
</html>