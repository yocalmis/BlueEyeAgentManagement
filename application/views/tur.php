<!DOCTYPE html>
<html lang="<?php echo $this->session->userdata('lng')["lang"]; ?>">
<head>
	<title>
		<?php	if( $ayar ) :  foreach( $ayar  as $dizi ) :    ?>	
			<?php echo strip_tags($dizi["kisa_aciklama".$uz]); ?>	
		<?php 	 endforeach;  endif;  ?>
	</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

	<?php	if( $tur_bilgi ) :  foreach( $tur_bilgi  as $dizi ) :    ?>	

		<meta name="keyword" content="<?php echo strip_tags($dizi["anahtar"]);  ?>">
		<meta name="description" content="<?php echo strip_tags($dizi["kisa_aciklama"]); ?>">
	<?php 	 endforeach;  endif;  ?>	


	<?php $this->load->view('favicon'); ?>
	<!-- viewer.js -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets_user/css/viewer.min.css">
	<!-- materialize.css -->
	<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets_user/css/materialize.min.css"  media="screen,projection"/>
	<!-- master.css -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets_user/css/master.css">
	<script>
		var php_curr = "<?php echo $this->session->userdata('currency'); ?>";
		var php_birim = "<?php echo $this->session->userdata('currency_icon'); ?>";

		<?php	$h=0; 	if( $tur_engel_tarih ) :  foreach( $tur_engel_tarih  as $dizi ) :    ?>


		iptalTarih  ['<?php echo $h; ?>'] = '<?php echo $dizi["tarih"]; ?>';		


		<?php $h=$h+1;	 endforeach;  endif; ?>

		<?php	$h=0; 	if( $tur_bilgi ) :  foreach( $tur_bilgi  as $dizi ) :    ?>


		var fiyat_hesaplama_cesidi = '<?php echo $dizi["baz_alinacak_fiyatlama_sekli"]; ?>';


		<?php $h=$h+1;	 endforeach;  endif; ?>		

	</script>

</head>
<body class="nonf">

	<?php $this->load->view('header_alt'); ?>

	<main>
		<?php	$v=0; 	if( $tur_bilgi ) :  foreach( $tur_bilgi  as $dizi ) :    ?>

		<script>var getNav=document.querySelector("nav > .nav-wrapper:not(.main-menu)");window.screen.width<=768&&(getNav=document.querySelector("nav > .nav-wrapper")),getHeight=getNav.offsetHeight,document.querySelector("main").style.marginTop=getHeight+"px";</script>




		<section class="tour-header">
			<div class="container">
				<div class="tour-breadcrumb">
					<div class="tour-breadcrumb">
						<ul>
							<li><a href="<?php echo base_url(); ?>Categories/detail/<?php echo $ust_kat_seo_adi; ?>"><?php echo $ust_kat_adi; ?></a></li>
							<li><a href="<?php echo base_url(); ?>Category/detail/<?php echo $alt_kat_seo_adi; ?>"><?php echo $alt_kat_adi; ?></a></li>
							<li><a><?php echo $dizi["adi".$uz]; $seo_adi=$dizi["seo_adi"];?></a></li>
						</ul>
					</div>
					<div class="tour-code">
						<p>
							<?php echo $this->session->userdata('lng')["urn_kod"]; ?>
							: 
							<?php echo $dizi["kod"];  ?>

						</p>
					</div>
				</div>
				<div class="tour-header-text">
					<h4>	<?php echo $dizi["adi".$uz]; ?>	</h4>
				</div>
				<div class="tour-header-other">
					<div class="stars">

						<?php 											
						$odeme_turu=$dizi["odeme_turu"];										
						$puan=$tur_puan_genel;  
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

						<span> <?php echo round($tur_puan_genel,1); ?> / 5</span>
					</div>
					<div class="span">
						<a href="#comments">
							<?php echo $yorum_adet; ?> 
							<?php echo $this->session->userdata('lng')["onrln_ktgr_yrm"]; ?>
						</a>
					</div>
				</div>
				<div class="tour-header-image">
					<div class="tour-big-image">
						<img src="<?php echo base_url(); ?>assets/resimler/turlar/<?php echo $dizi["resim"];  ?>" alt="roma">
						<span>
							<a id="more-images">
								<span class="more-images__icon">
									<?php echo "<span data-url='".icons_url."outline-image-24px.svg'></span>";?>

								</span>
								<?php echo $this->session->userdata('lng')["dh_fzl_rsm"]; ?>
							</a>
						</span>
						<div>
							<ul id="images">

								<?php		if( $tur_foto ) :  foreach( $tur_foto as $dizi2 ) :  ?>

									<li><img src="<?php echo base_url(); ?>assets/resimler/turlar/<?php echo $dizi2["foto"];  ?>" alt="Picture 1"></li>

								<?php	 endforeach;  endif; ?>



							</ul>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="tour-inner-details">
			<div class="container">
				<div class="tour-inner-main">
					<div class="tour-details-inner">
						<p class="tour-details-text"><?php echo $dizi["aciklama".$uz]; ?></p>
						<div class="tour-generic">
							<h4>
								<?php echo $this->session->userdata('lng')["gnl_blg"]; ?>
							</h4>
							<div class="tour-inners">
								<div class="info-icon">
									<?php echo "<span data-url='".icons_url."restore-24px.svg'></span>";?>
								</div>
								<div class="tour-text">
									<a>
										<?php echo $this->session->userdata('lng')["sure"]; ?> 
										<?php echo $dizi["sure".$uz]; ?>
									</a>
								</div>
							</div>
							<?php if($dizi["hizli_giris"]==1){ ?>
								<div class="tour-inners">

									<div class="info-icon">
										<?php echo "<span data-url='".icons_url."directions_run-24px.svg'></span>";?>
									</div>
									<div class="tour-text">
										<a> 
											<?php echo $this->session->userdata('lng')["hzl_grs"]; ?>
										</a>
									</div>
								</div>
							<?php }  if($dizi["kupon"]==1){ ?>
								<div class="tour-inners">
									<div class="info-icon">
										<?php echo "<span data-url='".icons_url."book-24px.svg'></span>";?>
									</div>
									<div class="tour-text">
										<a> 
											<?php echo $this->session->userdata('lng')["kupon"]; ?>
										</a>
									</div>
								</div>
							<?php }  if($dizi["hizli_onay"]==1){ ?>
								<div class="tour-inners">
									<div class="info-icon">
										<?php echo "<span data-url='".icons_url."check-24px.svg'></span>";?>
									</div>
									<div class="tour-text">
										<a>  
											<?php echo $this->session->userdata('lng')["hzl_ony"]; ?>
										</a>
									</div>
								</div>
							<?php }  if($dizi["engelli"]==1){ ?>
								<div class="tour-inners">
									<div class="info-icon">
										<?php echo "<span data-url='".icons_url."accessible-24px.svg'></span>";?>
									</div>
									<div class="tour-text">
										<a> 
											<?php echo $this->session->userdata('lng')["engll"]; ?>
										</a>
									</div>
								</div>
							<?php } ?>

							<div class="tour-inners">
								<div class="info-icon">
									<?php echo "<span data-url='".icons_url."outline-supervisor_account-24px.svg'></span>";?>
								</div>
								<div class="tour-text">
									<a> 
										<?php echo $this->session->userdata('lng')["cnli_rhbr"]; ?>
									</a> 
									<p>	<?php echo $dizi["rehber".$uz]; ?></p>
								</div>
							</div>
							<div class="tour-inners">
								<div class="info-icon">
									<?php echo "<span data-url='".icons_url."credit_card-24px.svg'></span>";?>
								</div>
								<div class="tour-text">
									<a> 
										<?php echo $this->session->userdata('lng')["iptl_etm"]; ?>
									</a>
									<p><?php echo $dizi["iptal".$uz]; ?></p>
								</div>
							</div>
							<div class="tour-inners">
								<div class="info-icon">
									<?php echo "<span data-url='".icons_url."my_location-24px.svg'></span>";?>
								</div>
								<div class="tour-text">
									<a> 
										<?php echo $this->session->userdata('lng')["blsm_nkt"]; ?>
									</a>
									<p>	<?php echo $dizi["bulusma_noktasi".$uz]; ?> </p>
								</div>
							</div>
						</div>
						<div id="b-y_f" class="buy-ticket">
							<h5>
								<?php echo $this->session->userdata('lng')["ktlmc_scn_bslk"]; ?>
							</h5>
							<form class="buy-form">
								<div class="ticket-form-inner tur-ticket">
									<div class="input-field kisi-sayisi">
										<input href="#select-count-personel" class="modal-trigger" readonly id="persons" type="text">
										<label for="persons" class="etki-sayisi">
											<?php 
											echo $this->session->userdata('lng')["ltfn_scn"]; 
											?>
										</label>
									</div>
									<div id="select-count-personel" class="modal">
										<div class="modal-header">
											<h4>
												<?php 
												echo $this->session->userdata('lng')["ktlmc_scn"]; 
												?>
											</h4>
										</div>

										<div class="modal-inner">
											<div class="how-much-users-main">
												<span class="how-much-users-main__icon">
													<?php echo "<span data-url='".icons_url."outline-person-24px.svg'></span>";?>
												</span>
												<div class="user-age-text">
													<p>
														<?php 
														echo 
														$this->session->userdata('lng')["ytskn"]; 
														?>
													</p>
													<span>
														<?php 
														echo 
														$this->session->userdata('lng')["yas"]; 
														?> 
														<?php 
														echo $dizi["yetiskin_fiyat_yazisi"];
														?>
													</span>
												</div>
												<div class="user-age-counter user-yetiskin">
													<a class="plus-user">
														<?php echo "<span data-url='".icons_url."expand_less-24px.svg'></span>";?>
													</a>
													<input id="yet_sayi" type="number" value="0">
													<a class="minus-user">
														<?php echo "<span data-url='".icons_url."expand_more-24px.svg'></span>";?>
													</a>
												</div>
											</div>


											<?php if($dizi["cocuk_fiyat_gorunsun"]==1){ ?>
												<p class="divider"></p>
												<div class="how-much-users-main">
													<span class="how-much-users-main__icon">
														<?php echo "<span data-url='".icons_url."child_care-24px.svg'></span>";?>
													</span>
													<div class="user-age-text">
														<p>
															<?php 
															echo 
															$this->session->userdata('lng')["cck"]; 
															?>
														</p>
														<span>
															<?php 
															echo 
															$this->session->userdata('lng')["yas"]; 
															?> 

															<?php 
															echo $dizi["cocuk_fiyat_yazisi"];
															?>  

														</span>
													</div>
													<div class="user-age-counter user-cocuk">
														<a class="plus-user">
															<?php echo "<span data-url='".icons_url."expand_less-24px.svg'></span>";?>
														</a>
														<input id="gen_sayi" type="number" value="0">
														<a class="minus-user">
															<?php echo "<span data-url='".icons_url."expand_more-24px.svg'></span>";?>
														</a>
													</div>
												</div>

											<?php } if($dizi["bebek_fiyat_gorunsun"]==1){ ?>
												<p class="divider"></p>

												<div class="how-much-users-main">
													<span class="how-much-users-main__icon">
														<?php echo "<span data-url='".icons_url."outline-child_friendly-24px.svg'></span>";?>
													</span>
													<div class="user-age-text">
														<p>
															<?php 
															echo 
															$this->session->userdata('lng')["bbk"]; 
															?>
														</p>
														<span>
															<?php 
															echo 
															$this->session->userdata('lng')["yas"]; 
															?> 

															<?php 
															echo $dizi["bebek_fiyat_yazisi"];
															?>
														</span>
													</div>
													<div class="user-age-counter user-bebek">
														<a class="plus-user">
															<?php echo "<span data-url='".icons_url."expand_less-24px.svg'></span>";?>
														</a>
														<input id="bebek_sayi" type="number" value="0">
														<a class="minus-user">
															<?php echo "<span data-url='".icons_url."expand_more-24px.svg'></span>";?>
														</a>
													</div>
												</div>

											<?php } ?>
										</div>

										<div class="modal-ops">
											<a class="btn modal-close close-btn">
												<?php 
												echo $this->session->userdata('lng')["kpt"]; 
												?> 
											</a>
											<a class="btn modal-close user-submit">
												<?php 
												echo $this->session->userdata('lng')["tmm"]; 
												?> 
											</a>
										</div>
									</div>

									<?php $s=0;	if( $tur_detay ) :  foreach( $tur_detay as $dizi2 ) :  ?>


									<?php if ($dizi2["zaman_aciklamasi"]!=""){ if ($s==0){ ?>

										<div class="input-field takvim">
											<input id="start_date" type="text" class="datepicker t-s-d">
											<label for="start_date">
												<?php echo $this->session->userdata('lng')["bas_t"]; ?>
											</label>
										</div>
									<?php } } ?>
									<?php $s=$s+1; endforeach;  endif;  ?>
									<!--
									<div class="input-field">
										<select multiple>
											<option value="" disabled selected>Tüm Diller</option>
											<option value="1">İngilizce</option>
											<option value="2">Türkçe</option>
											<option value="3">Rusça</option>
										</select>
									</div>
								-->
							</div>
							<!--<a class="btn waves-effect right aviailability">Yer Durumu</a>-->
						</form>
					</div>
					<?php $f=0;	if( $tur_detay ) :  foreach( $tur_detay as $dizi2 ) :  ?>


					<div class="cl-t-f">
						<span class="cl-p-d">
							<?php switch ($this->session->userdata('lng')["lang"]) {
								case 'tr':
								?>
								%20 <?php echo $this->session->userdata('lng')["indirim"] ?>
								<?php
								break;
								default: ?>
								<?php echo $this->session->userdata('lng')["indirim"] ?> %20
								<?php break;
							} ?>
						</span> 
						<div class="cl-t-h">
							<h5>
								<?php if($dizi2["zaman_aciklamasi"]!=""){
									echo $dizi["zaman_aciklamasi".$uz]; 				
								} 
								else { 
									echo $dizi2["baslangic_tarihi"];  
									echo " - "; 
									echo $dizi2["bitis_tarihi"]; 
								}

								?>
								<small>(
									<?php echo $this->session->userdata('lng')["bslngc_fiyat"]; ?>
									<span>
										<?php 
												//echo $dizi2["yetiskin_fiyat"] 
										echo round($dizi2["yetiskin_fiyat"]*$this->session->userdata('currency'))." ".$this->session->userdata('currency_icon');

										?> 	
									</span>)</small>
								</h5>
								<span class="cl-t-sp">
									<p>
										<?php echo $this->session->userdata('lng')["tplm_fyt"]; ?>
									</p>
									<p>
										<del><?php echo $this->session->userdata('currency_icon');?> <span class="in_f"><?php echo $dizi2["yetiskin_fiyat_ind_once"]; ?></span></del>
										<input type="hidden" id="yet_eski_fiyat" value="<?php echo $dizi2["yetiskin_fiyat_ind_once"]; ?>">
										<input type="hidden" id="cck_eski_fiyat" value="<?php echo $dizi2["cocuk_fiyat_ind_once"]; ?>">

										<input type="hidden" id="bbk_eski_fiyat" value="<?php echo $dizi2["bebek_fiyat_ind_once"]; ?>">

										<a><?php echo $this->session->userdata('currency_icon');?> <span  class="g_t_f"><?php echo $dizi2["yetiskin_fiyat"];  ?></span></a>
									</p>
								</span>
							</div>
							<p class="divider"></p>
							<div class="cl-m-c">
								<p><?php echo $dizi2["katilimci"];?></p>
							</div>
							<p class="divider"></p>
							<div class="cl-i-p">
								<div class="cl-s-t">
									<form action="#">
										<div class="input-field">
											<h5>
												<?php echo $this->session->userdata('lng')["from"]; ?>
											</h5>

											<?php if ($dizi2["zaman_aciklamasi"]!=""){ ?>
												<select>
													<option value="1" selected><?php  $s=explode(":",$dizi2["baslangic_saati"]); echo $s[0].":".$s[1];  ?> - <?php  $s=explode(":",$dizi2["bitis_saati"]); echo $s[0].":".$s[1];  ?>  </option>
												</select>
											<?php } if ($dizi2["zaman_aciklamasi"]==""){ ?>

												<select>
													<option value="1" selected><?php echo $dizi2["baslangic_tarihi"];  ?> -  <?php echo $dizi2["bitis_tarihi"];  ?> </option>
												</select> 

											<?php } ?>

										</div>
									</form>
								</div>
								<div class="cl-p-i">
									<h5>
										<?php echo $this->session->userdata('lng')["fyt_blg"]; ?>
									</h5>
									<p class="divider"></p>

									<p>
										<span>
											<?php echo $this->session->userdata('lng')["ytskn"];?> 
											<span class="yt_k_s"> 0</span> x <?php echo $this->session->userdata('currency_icon');?> 
											<span class="yt_k_f_w-c"><?php echo $dizi2["yetiskin_fiyat"]; ?></span>

											<input type="hidden" id="ayni_gun_engel" value="<?php echo $dizi["ayni_gun_engel"]; ?>">

											<input type="hidden" class="yt_k_f" value="<?php echo $dizi2["yetiskin_fiyat"]; ?>">

										</span>
										<span><?php echo $this->session->userdata('currency_icon');?> <span class="yt_t_f"></span></span>
									</p>
									<?php if($dizi["cocuk_fiyat_gorunsun"]==1){ ?> 
										<p class="divider"></p>

										<p>
											<span>
												<?php echo $this->session->userdata('lng')["cck"];?>  
												<span class="ck_k_s">0</span> x <?php echo $this->session->userdata('currency_icon');?> 
												<span class="ck_k_f_w-c c_fiyat_<?php echo $f; ?>"><?php echo $dizi2["cocuk_fiyat"]; ?></span>



												<input type="hidden" class="ck_k_f c_fiyat_<?php echo $f; ?>" value="<?php echo $dizi2["cocuk_fiyat"]; ?>">


											</span>
											<span>
												<?php echo $this->session->userdata('currency_icon');?> 
												<span class="ck_t_f"></span>
											</span>
										</p>
									<?php } ?>

									<?php if($dizi["bebek_fiyat_gorunsun"]==1){ ?>
										<script>
											is_babe = true;
										</script>
										<p class="divider"></p>
										<p>
											<span>
												<?php echo $this->session->userdata('lng')["bbk"]; ?>
												<span class="bk_k_s">0</span> x <?php echo $this->session->userdata('currency_icon');?> 
												<span class="bk_k_f_w-c b_fiyat_<?php echo $f; ?>"><?php echo $dizi2["bebek_fiyat"]; ?></span>



												<input type="hidden" class="bk_k_f c_fiyat_<?php echo $f; ?>" value="<?php echo $dizi2["bebek_fiyat"]; ?>">


											</span>
											<span>
												<?php echo $this->session->userdata('currency_icon');?> 
												<span class="bk_t_f"></span>
											</span>
										</p>
									<?php } ?>



								</div>
							</div>
							<div class="b-s-m-b">

								<?php if ($this->session->userdata('useronline')!=""){   ?>
			<!--	
				<a href="#isMusait" class="waves-effect btn yellow black-text modal-trigger musaitmi">
					<i class="left">help</i>Müsaitlik sor
				</a>
			-->
		<?php } else{ ?>



		<?php }  ?>	

		<?php if ($odeme_turu==0){   ?><form action="<?php echo base_url(); ?>Tour/tocartadd" method="POST"> <?php }  ?>	
		<?php if ($odeme_turu==1){   ?><form action="<?php echo base_url(); ?>Tour/topreres" method="POST"> <?php }  ?>	


		<input type ="hidden" name="yetiskin_adet" value="">
		<input type ="hidden" name="cocuk_adet" value="">
		<input type ="hidden" name="bebek_adet" value="">
		<input type ="hidden" name="yetiskin_tek_fiyat" value="">
		<input type ="hidden" name="cocuk_tek_fiyat" value="">
		<input type ="hidden" name="bebek_tek_fiyat" value="">
		<input type ="hidden" name="yetis_top_fiyat">
		<input type ="hidden" name="cocuk_top_fiyat">
		<input type ="hidden" name="bebek_top_fiyat">
		<input type ="hidden" name="indirimsiz">
		<input type ="hidden" name="fiyat_aralik__yet_ID" value="">
		<input type ="hidden" name="fiyat_aralik__cck_ID" value="">
		<input type ="hidden" name="fiyat_aralik__bbk_ID" value="">
		<input type ="hidden" name="baz_alinacak_fiyatlama_sekli" value="<?php echo $dizi["baz_alinacak_fiyatlama_sekli"]; ?>">

		<input type ="hidden" name="tur_id" value="<?php echo $dizi["id"]; ?>">
		<input type ="hidden" name="tur_kod" value="<?php echo $dizi["kod"]; ?>">
		<input type ="hidden" name="seo_adi" value="<?php echo $dizi["seo_adi"]; ?>">
		<input type ="hidden" name="tur_detay_id" value="<?php echo $dizi2["id"]; ?>">
		<input type ="hidden" name="para" value="TL">

		<?php 
		if( $dizi2["zaman_aciklamasi"] != "" ) {
			$tur_turu="surekli";  
		} 
		else { 
			$tur_turu="belirli";
		}
		?>

		<input type ="hidden" name="tur_turu" value="<?php echo $tur_turu; ?>">
		<input type ="hidden" name="bas_t" value="<?php echo $dizi2["baslangic_tarihi"]; ?>">
		<input type ="hidden" name="bit_t" value="<?php echo $dizi2["bitis_tarihi"]; ?>">

		<?php 
		if( $dizi2["zaman_aciklamasi"] != "" ) {

			?>	
			<input type ="hidden" name="bas_s" value="<?php echo $dizi2["baslangic_saati"]; ?>">
			<input type ="hidden" name="bit_s" value="<?php echo $dizi2["bitis_saati"]; ?>">	 
			<?php 
		} 
		else { 

			?>	

			<input type ="hidden" name="bas_s" value="00:00:00">
			<input type ="hidden" name="bit_s" value="00:00:00">	 

			<?php 

		}

		?>



		<?php 

		$say=count($kisi_fiyat[$f]);
		$don=$say-1;

		for($mm=0; $mm<=$don; $mm++){
			if($kisi_fiyat[$f][$mm]["bas_kisi"]==""){continue;}


			echo "<div class='icerik_".$f."' style='display:none;'>";
			echo "<div class='icerik_".$f."_".$mm."'>";
			echo "
			<span class='fiyat_aralik__Bas'>".$kisi_fiyat[$f][$mm]["bas_kisi"]."</span>
			<span class='fiyat_aralik__Bit'>".$kisi_fiyat[$f][$mm]["bit_kisi"]."</span>
			<span class='fiyat_aralik__yet_fiyat'>".$kisi_fiyat[$f][$mm]["yetiskin_fiyat"]."</span>
			<span class='fiyat_aralik__cck_fiyat'>".$kisi_fiyat[$f][$mm]["cocuk_fiyat"]."</span>
			<span class='fiyat_aralik__bbk_fiyat'>".$kisi_fiyat[$f][$mm]["bebek_fiyat"]."</span>
			<span class='fiyat_aralik__id'>".$kisi_fiyat[$f][$mm]["id"]."</span>

			<br>";

			echo"</div>";
			echo"</div>";	
		}
		?>

		<button type="submit" class="btn waves-effect disabled spt_ekl">
			<span class="btn__icon">
				<?php echo "<span data-url='".icons_url."outline-local_grocery_store-24px.svg'></span>";?>
			</span>


			<?php if ($odeme_turu==0){ 
				echo $this->session->userdata('lng')["spt_ekle"];
			}  ?>	
			<?php if ($odeme_turu==1){
				echo $this->session->userdata('lng')["rezr_et"]; 
			}  ?>				


		</button>
	</form>

</div>
<?php if ($odeme_turu==0){   ?> <?php }  ?>	
<?php if ($odeme_turu==1){   ?> 
	<div class="cl-t-f__error">

		<span class="cl-t-f__icon">
			<?php echo "<span data-url='".icons_url."warning-24px.svg'></span>";?>
		</span>
		<p>
			<?php 
			echo $this->session->userdata('lng')["not_1"].$this->session->userdata('lng')["on_rzrv"]." ".$this->session->userdata('lng')["not_2"];
			?>
		</p>
	</div>
<?php } ?>

</div>

<?php $f=$f+1; endforeach;  endif;  ?>


					<!--<div id="isMusait" class="modal">
						<div class="modal-header">
							<h4>Müsaitlik sor</h4>
							<p>Lütfen aşşağıdaki alanların hepsini doldurunuz..</p>
						</div>
						<div class="modal-inner">
							<form method="POST" action="<?php echo base_url(); ?>Tour/status">
								<div class="row m0">
									<div class="input-field col s6">
										<input placeholder="<?php echo $dizi["kod"];  ?>" id="urunKodu" value="<?php echo $dizi["kod"];  ?>" name="urunKodu" type="text" disabled>
										<label for="urunKodu">Ürün Kodu </label>
									</div>
									<div class="input-field col s6">
										
										<?php 	if($this->session->userdata('useronline')!=""){   ?>

											<input placeholder="<?php echo $this->session->userdata('useronline');  ?>" value="<?php echo $this->session->userdata('useronline');  ?>" name="kulAdi"  id="kulAdi" type="text" disabled>
											
										<?php } else{ ?>	

											<input placeholder="Ziyaretçi" value="Ziyaretçi"  name="kulAdi"  id="kulAdi" type="text" disabled>
											

										<?php }  ?>	


										<label for="kulAdi">Kullanıcı Adı</label>
									</div>
								</div>
								<div class="input-field">
									<input id="seo" name="seo" value="<?php echo $dizi["seo_adi"];  ?>" type="hidden">
									<input id="urunKodu" name="urunKodu" value="<?php echo $dizi["kod"];?>" type="hidden">
									<input id="kulAdi" name="kulAdi" value="<?php echo $this->session->userdata('useronline');?>" type="hidden">									
									<input id="kulIsmi" name="adi" type="text">
									<label for="kulIsmi">İsim ve Soyisim</label>
								</div>
								<div class="input-field">
									<input id="kulMail"  name="em" type="email">
									<label for="kulMail">E-Mail Adresiniz</label>
								</div>
								<div class="input-field">
									<input id="kulSoru"  name="soru" type="text">
									<label for="kulSoru">Sormak İstediğiniz Soru</label>
								</div>
								<div class="modal-ops">
									<a class="btn modal-close close-btn">Kapat</a>
									<button type="submit" class="btn">Gönder</button>
								</div>
							</form>

						</div>


					</div>-->
					<div class="experience">
						<h4>
							<?php echo $this->session->userdata('lng')["dnym"]; ?>
						</h4>
						<div class="experience-main">
							<div class="left-experience">
								<h6>
									<?php echo $this->session->userdata('lng')["one_ckn"]; ?>
								</h6>
							</div>
							<div class="right-experience">
								<?php 
		/*		if($this->session->userdata('lng_turu')=="Eng"){ echo $dizi["one_cikanlar"]; } 
				if($this->session->userdata('lng_turu')=="Tr"){ echo $dizi["one_cikanlar_tr"]; } 	
				if($this->session->userdata('lng_turu')=="Ru"){  echo $dizi["one_cikanlar_ru"]; } 	
*/
				echo $dizi["one_cikanlar".$uz]; 				
				?>
			</div>
		</div>
		<p class="divider"></p>

		<div class="experience-main">
			<div class="left-experience">
				<h6>
					<?php echo $this->session->userdata('lng')["tam_acklm"]; ?>
				</h6>
			</div>
			<div class="right-experience">
				<div>
					<?php 
			/*	if($this->session->userdata('lng_turu')=="Eng"){ echo $dizi["tam_aciklama"]; } 
				if($this->session->userdata('lng_turu')=="Tr"){ echo $dizi["tam_aciklama_tr"]; } 	
				if($this->session->userdata('lng_turu')=="Ru"){  echo $dizi["tam_aciklama_ru"]; } 	
*/
				echo $dizi["tam_aciklama".$uz]; 					
				?>
			</div>
		</div>
	</div>

	<div class="experience-main">
		<div class="left-experience">
			<h6>
				<?php echo $this->session->userdata('lng')["rhbr"]; ?>
			</h6>
		</div>
		<div class="right-experience">
			<div>

				<?php 
		/*		if($this->session->userdata('lng_turu')=="Eng"){ echo $dizi["gezi_rehberi"]; } 
				if($this->session->userdata('lng_turu')=="Tr"){ echo $dizi["gezi_rehberi_tr"]; } 	
				if($this->session->userdata('lng_turu')=="Ru"){  echo $dizi["gezi_rehberi_ru"]; } 	
*/
				echo $dizi["gezi_rehberi".$uz]; 					
				?>
			</div>
		</div>
	</div>					

	<p class="divider"></p>
	<div class="experience-main">
		<div class="left-experience">
			<h6>
				<?php echo $this->session->userdata('lng')["dahil"]; ?>
			</h6>
		</div>
		<div class="right-experience succes-or-not">
			<?php 
		/*		if($this->session->userdata('lng_turu')=="Eng"){ echo $dizi["dahil_olanlar"]; } 
				if($this->session->userdata('lng_turu')=="Tr"){ echo $dizi["dahil_olanlar_tr"]; } 	
				if($this->session->userdata('lng_turu')=="Ru"){  echo $dizi["dahil_olanlar_ru"]; } 			
*/
				echo $dizi["dahil_olanlar".$uz]; 				
				?>
			</div>
		</div>
	</div>
	<div class="experience">
		<h4>
			<?php echo $this->session->userdata('lng')["orya"]; ?>
		</h4>
		<div class="experience-main">
			<div class="left-experience">
				<h6>
					<?php echo $this->session->userdata('lng')["blsm_nkt"]; ?>
				</h6>
			</div>
			<div class="right-experience">
				<div>			
					<?php 
			/*	if($this->session->userdata('lng_turu')=="Eng"){ echo $dizi["bulusma_noktasi"]; } 
				if($this->session->userdata('lng_turu')=="Tr"){ echo $dizi["bulusma_noktasi_tr"]; } 	
				if($this->session->userdata('lng_turu')=="Ru"){  echo $dizi["bulusma_noktasi_ru"]; } 			
*/
				echo $dizi["bulusma_noktasi".$uz]; 
				?>

			</div>
		</div>
	</div>
	<p class="divider"></p>
	<div class="experience-main">
		<div class="left-experience">
			<h6>
				<?php echo $this->session->userdata('lng')["gtmdn_onc"]; ?>
			</h6>
		</div>
		<div class="right-experience">
			<div>
				<?php 
			/*	if($this->session->userdata('lng_turu')=="Eng"){ echo $dizi["gitmeden"]; } 
				if($this->session->userdata('lng_turu')=="Tr"){ echo $dizi["gitmeden_tr"]; } 	
				if($this->session->userdata('lng_turu')=="Ru"){  echo $dizi["gitmeden_ru"]; } 
*/
				echo $dizi["gitmeden".$uz]; 				
				?>
			</div>
		</div>
	</div>
</div>
</div>

<div class="tour-prices">
	<div class="tour-price-inner">
		<div class="price-text">
			<p><?php echo $this->session->userdata('lng')["bslngc_fiyat"]; ?></p>
			<h5>
				<?php 
				echo round($yf*$this->session->userdata('currency'))." ".$this->session->userdata('currency_icon');
				?>

			</h5>
		</div>
		<div class="prices-button">
			<a href="#b-y_f" class="btn rounded waves-effect blue darken-1">
				<?php echo $this->session->userdata('lng')["yer_ayr"]; ?>
			</a>
		</div>
	</div>
	<div class="tour-add-wishlist">




		<?php 


		if($this->session->userdata('useronline')!=""){
			if($istek_varmi==1){

				echo "
				<p>
				<a>
				<span data-url='".icons_url."done-24px.svg'></span>
				".$this->session->userdata('lng')["istk_lsts_tmm"]."
				</a>
				</p>";
			}	
			else{
				echo"
				<p>
				<a href='".base_url()."wishlist/add/".$dizi["id"]."/".$dizi["seo_adi"]."'>
				<span data-url='".icons_url."favorite-24px.svg'></span>
				".$this->session->userdata('lng')["istk_lsts_ekl"]."
				</a>
				</p>";}

			}	
			else{

				echo"
				<p>
				<a href='".base_url()."wishlist/add/".$dizi["id"]."/".$dizi["seo_adi"]."'>
				<span data-url='".icons_url."favorite-24px.svg'></span>
				".$this->session->userdata('lng')["istk_lsts_ekl"]."
				</a>
				</p>";}




				?>
			</div>
			<div class="howMuchCheck">
				

				<p>
					<span data-url="<?php echo icons_url ?>visibility-24px.svg"></span>
					<?php switch ($this->session->userdata('lng')["lang"]) {
						case 'tr':
						?>
						<?php echo $this->session->userdata('lng')["bu_tura_n_kisi_bakiyor1"] ?>
						<span class="howMuchCheck--number"></span>&nbsp;
						<?php echo $this->session->userdata('lng')["bu_tura_n_kisi_bakiyor2"] ?>
						<?php
						break;
						default: ?>
						<span class="howMuchCheck--number"></span> 
						<?php echo $this->session->userdata('lng')["bu_tura_n_kisi_bakiyor1"] ?>
						<?php echo $this->session->userdata('lng')["bu_tura_n_kisi_bakiyor2"] ?>
						<?php break;
					} ?>
					
				</p>
			</div>
		</div>
	</div>
</div>
</section>

<section class="place category-place">
	<div class="container center-align">
		<h4>
			<?php echo $alt_kat_adi; ?>
			: 
			<?php echo $this->session->userdata('lng')["tur_blt"]; ?>
		</h4>
	<?php  endforeach;  endif;  ?>
	<div class="places-inner">
		<div class="places-other">

			<?php		$n=0;		if( $alt_kat_diger_turlar ) :  foreach( $alt_kat_diger_turlar as $dizi ) : ?>




			<div class="other-main">
				<a href="<?php echo base_url(); ?>Tour/detail/<?php echo $dizi["seo_adi"];  ?>"></a>
				<div class="other-image"><img src="<?php echo base_url(); ?>assets/resimler/turlar/<?php echo $dizi["resim"];  ?>" alt=""></div>
				<div class="other-text-inner">
					<a href="#">
						<?php 
			/*	if($this->session->userdata('lng_turu')=="Eng"){ echo $dizi["adi"]; } 
				if($this->session->userdata('lng_turu')=="Tr"){ echo $dizi["adi_tr"]; } 	
				if($this->session->userdata('lng_turu')=="Ru"){  echo $dizi["adi_ru"]; } 	
*/
				echo $dizi["adi".$uz]; 	
				
				?>
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


<?php if($this->session->userdata('useronline')!=""){ ?>
	
	<section class="t_a_cmt">
		<div class="container">
			<h4 class="none-header">
				<?php echo $this->session->userdata('lng')["yrm_brk"]; ?>
			</h4>
			<form action="<?php echo base_url(); ?>tour/comment"  method="POST" >
				<div class="c_r_i">
					<div class="y_g_b">
						<input type="text" placeholder="<?php echo $this->session->userdata('lng')["bslk_gr"]; ?>" name="baslik" id="baslik">
						<textarea name="editor1" id="y_g" class="c_t_e" placeholder="<?php echo $this->session->userdata('lng')["msj_gir"]; ?>"></textarea>
					</div>
					<div class="c_r-g_r">
						<input type="hidden" value="<?php echo $this->session->userdata('kul_id'); ?>" name="kul_id" id="kul_id">

						<?php if( $tur_bilgi ) : foreach( $tur_bilgi  as $dizi ) : ?>
							<input type="hidden" value="<?php echo $dizi["id"];?>" name="tur_id" id="tur_id">
							<input type="hidden" value="<?php echo $dizi["kod"];?>" name="tur_kod" id="tur_kod">
							<input type="hidden" value="<?php echo $dizi["seo_adi"];?>" name="seo_adi" id="seo_adi">
						<?php endforeach; endif; ?>

						<input type="hidden" value="3" name="servis" id="servis" />
						<input type="hidden" value="3" name="organ" id="organ" />
						<input type="hidden" value="3" name="para" id="para" />
						<input type="hidden" value="3" name="guven" id="guven" />

						<div class="tour-stars">
							<p>
								<?php echo $this->session->userdata('lng')["srvs"]; ?> :
							</p>
							<div class="stars s_s-s">
								<span class="stars__star">
									<?php echo "<span data-url='".icons_url."star.svg'></span>";?>
								</span>
								<span class="stars__star">
									<?php echo "<span data-url='".icons_url."star.svg'></span>";?>
								</span>
								<span class="stars__star">
									<?php echo "<span data-url='".icons_url."star.svg'></span>";?>
								</span>
								<span class="stars__star">
									<?php echo "<span data-url='".icons_url."star.svg'></span>";?>
								</span>
								<span class="stars__star">
									<?php echo "<span data-url='".icons_url."star.svg'></span>";?>
								</span>
							</div>
						</div>
						<div class="tour-stars">
							<p>
								<?php echo $this->session->userdata('lng')["orgnzsn"]; ?> :
							</p>
							<div class="stars o_s-s">
								<span class="stars__star">
									<?php echo "<span data-url='".icons_url."star.svg'></span>";?>
								</span>
								<span class="stars__star">
									<?php echo "<span data-url='".icons_url."star.svg'></span>";?>
								</span>
								<span class="stars__star">
									<?php echo "<span data-url='".icons_url."star.svg'></span>";?>
								</span>
								<span class="stars__star">
									<?php echo "<span data-url='".icons_url."star.svg'></span>";?>
								</span>
								<span class="stars__star">
									<?php echo "<span data-url='".icons_url."star.svg'></span>";?>
								</span>
							</div>
						</div>
						<div class="tour-stars">
							<p>
								<?php echo $this->session->userdata('lng')["prnn_krsl"]; ?> :
							</p>
							<div class="stars p_s-s">
								<span class="stars__star">
									<?php echo "<span data-url='".icons_url."star.svg'></span>";?>
								</span>
								<span class="stars__star">
									<?php echo "<span data-url='".icons_url."star.svg'></span>";?>
								</span>
								<span class="stars__star">
									<?php echo "<span data-url='".icons_url."star.svg'></span>";?>
								</span>
								<span class="stars__star">
									<?php echo "<span data-url='".icons_url."star.svg'></span>";?>
								</span>
								<span class="stars__star">
									<?php echo "<span data-url='".icons_url."star.svg'></span>";?>
								</span>
							</div>
						</div>
						<div class="tour-stars">
							<p>
								<?php echo $this->session->userdata('lng')["gvnlk"]; ?> :
							</p>
							<div class="stars g_s-s">
								<span class="stars__star">
									<?php echo "<span data-url='".icons_url."star.svg'></span>";?>
								</span>
								<span class="stars__star">
									<?php echo "<span data-url='".icons_url."star.svg'></span>";?>
								</span>
								<span class="stars__star">
									<?php echo "<span data-url='".icons_url."star.svg'></span>";?>
								</span>
								<span class="stars__star">
									<?php echo "<span data-url='".icons_url."star.svg'></span>";?>
								</span>
								<span class="stars__star">
									<?php echo "<span data-url='".icons_url."star.svg'></span>";?>
								</span>
							</div>
						</div>
					</div>
				</div>				
				<button id="yorum_gonder" type="submit" class="btn right">
					<?php 
					echo $this->session->userdata('lng')["gndr_btn"];
					echo "<span data-url='".icons_url."outline-send-24px.svg'></span>";
					?>
				</button>
			</form> 
		</div>
	</section>
<?php } ?>	


<section id="comments" class="scrollSpy">
	<div class="container">
		<h4 class="none-header">
			<?php echo $this->session->userdata('lng')["mustr_dgrlndrm"]; ?>
		</h4>
		<div class="rating">
			<div class="rating-general">
				<h6>
					<?php echo $this->session->userdata('lng')["gnl_dgrlndrm"]; ?>
				</h6>
				<div class="stars">
					<?php
					$puan=round($tur_puan_genel,1);  
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
					<span> <?php  echo round($tur_puan_genel,1); ?> / 5</span>
				</div>
				<p>
					<?php echo $yorum_adet; ?> 
					<?php echo $this->session->userdata('lng')["n_dgrlndrm_gr"]; ?>
				</p>
			</div>
			<div class="rating-main rating-brief">
				<h6>
					<?php echo $this->session->userdata('lng')["nclm_ozt"]; ?>
				</h6>
				<table>
					<tr>
						<td><?php echo $this->session->userdata('lng')["srvs"]; ?></td>
						<td>
							<div class="brief-other">
								<div class="progress">
									<div class="determinate" style="width: <?php echo round($tur_puan_servis*20); ?>%"></div>
								</div>
							</div>
						</td>
						<td><?php echo round($tur_puan_servis,1); ?> / 5</td>
					</tr>
					<tr>
						<td><?php echo $this->session->userdata('lng')["orgnzsn"]; ?></td>
						<td>
							<div class="brief-other">
								<div class="progress">
									<div class="determinate" style="width: <?php echo round($tur_puan_org*20); ?>%"></div>
								</div>
							</div>
						</td>
						<td><?php echo round($tur_puan_org,1); ?> / 5</td>
					</tr>
					<tr>
						<td><?php echo $this->session->userdata('lng')["prnn_krsl"]; ?></td>
						<td>
							<div class="brief-other">
								<div class="progress">
									<div class="determinate" style="width: <?php echo round($tur_puan_para*20); ?>%"></div>
								</div>
							</div>
						</td>
						<td><?php echo round($tur_puan_para,1); ?> / 5</td>
					</tr>
					<tr>
						<td><?php echo $this->session->userdata('lng')["gvnlk"]; ?></td>
						<td>
							<div class="brief-other">
								<div class="progress">
									<div class="determinate" style="width: <?php echo round($tur_puan_guven*20); ?>%"></div>
								</div>
							</div>
						</td>
						<td><?php echo round($tur_puan_guven,1); ?> / 5</td>
					</tr>
				</table>

			</div>
		</div>
	</div>
</section>

<?php if( $tur_yorum ) : ?>
	<section class="filters">
		<div class="container">
			<p>
				<?php echo $this->session->userdata('lng')["sralama"]; ?>:
			</p>
			<a class="p_g_d">
				<span class="p_g_d__icon">
					<?php echo "<span data-url='".icons_url."arrow_drop_up-24px.svg'></span>";?>
				</span>
				<?php echo $this->session->userdata('lng')["dgrlndr"]; ?>
				<span class="p_g_d__icon">
					<?php echo "<span data-url='".icons_url."arrow_drop_down-24px.svg'></span>";?>
				</span>
			</a>
			<a class="t_g_d">
				<span class="p_g_d__icon">
					<?php echo "<span data-url='".icons_url."arrow_drop_up-24px.svg'></span>";?>
				</span>
				<?php echo $this->session->userdata('lng')["trh"]; ?>
				<span class="p_g_d__icon">
					<?php echo "<span data-url='".icons_url."arrow_drop_down-24px.svg'></span>";?>
				</span>
			</a>
		</div>
	</section>
<?php endif; ?>	

<section class="top-comments">
	<div class="show-more-container">
		<div class="container">



			<?php		$n=0;	if( $tur_yorum ) :  foreach( $tur_yorum as $dizi3 ) :  ?>


			<div class="best-comment show-more-item">
				<div class="comment-header">
					<div class="comment-avatar">
						<div class="comment-avatar__icon">
							<?php echo "<span data-url='".icons_url."outline-person-24px.svg'></span>";?>
						</div>
					</div>
					<div class="comment-header-other">
						<h6><?php echo $yorum_kullanici[$n];  ?>	</h6>
						<p><?php echo $dizi3["tarih"];  ?>	</p>
						<div class="stars">		
							<?php
							$puan = $yorum_puan_ortalama[$n];  
							$star = floor($puan);
							$dongu = $star-1;
							for( $i=0; $i<=$dongu; $i++ ) {

								echo "<span data-url='".icons_url."star.svg'></span>";
							}

							if( $puan > $star ){
								echo "<span data-url='".icons_url."star_half.svg'></span>";
							}

							$bos = 4 - $dongu;

							if( $puan > $star ) {
								$bos = $bos-1;
							}
							$bodongu = $bos - 1;

							for($i=0; $i<=$bodongu; $i++){
								echo "<span data-url='".icons_url."star_border.svg'></span>";
							}	
							?>
						</div>
					</div>
				</div>
				<div class="comment-inner">
					<div class="comment-place">
						<a href="#"><?php echo $yorum_tur[$n];  ?>	</a>
					</div>
					<div class="comment-text">
						<a>
							<b><?php echo $dizi3["baslik"]; ?></b>
							<p><?php echo $dizi3["yorum"]; ?></p>
						</a>
					</div>
				</div>
			</div>

			<?php $n = $n + 1; endforeach; endif; ?>
		</div>
	</div>
</section>
<section class="bottom-categories">
	<div class="container">
		<div class="category-inner">
			<h6>
				<?php echo $this->session->userdata('lng')["poplr_slgn"]; ?>
			</h6>
			<div>

				<?php $s=0;	if( $populer_tur ) : foreach( $populer_tur  as $dizi ) :  if($s==10){break;} ?>

				<a href="<?php echo base_url(); ?>Tour/detail/<?php echo $dizi["seo_adi"];  ?>">
					<p><?php echo $dizi["adi".$uz]; ?></p>
				</a>

				<?php $s=$s+1;	 endforeach;  endif;  ?>


			</div>
		</div>
		<div class="category-inner">
			<h6>
				<?php echo $this->session->userdata('lng')["bluepoplr"]; ?>
			</h6>
			<div>
				<?php  $s=0;	if( $populer_ana_kategori ) :  foreach( $populer_ana_kategori  as $dizi ) :  if($s==10){break;}    ?>	



				<a href="<?php echo base_url(); ?>Categories/detail/<?php echo $dizi["seo_adi"];  ?>">
					<p><?php echo $dizi["adi".$uz]; ?></p>
				</a>

				<?php   $s=$s+1;	 endforeach;  endif;  ?>
			</div>
		</div>
		<div class="category-inner">
			<h6>
				<?php echo $this->session->userdata('lng')["gzlck_en_pplr"]; ?>
			</h6>
			<div>
				<?php  $s=0;	if( $populer_kategori ) :  foreach( $populer_kategori  as $dizi ) :  if($s==10){break;}    ?>	

				<a href="<?php echo base_url(); ?>Category/detail/<?php echo $dizi["seo_adi"];?>">
					<p><?php echo $dizi["adi".$uz]; ?></p>
				</a>
				
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
<!-- viewer.js -->
<script src="<?php echo base_url(); ?>assets_user/js/viewer.min.js"></script>
<script>

	$(document).on('click', '#more-images', function(event) { 
		event.preventDefault(); 
		$('#images').find("img:first-child").click(); 
	});

	var $image = $('#image');

	$image.viewer();

		// Get the Viewer.js instance after initialized
		var viewer = $image.data('viewer');

		// View a list of images
		$('#images').viewer({
			inline		: false,
			button 		: true,
			navbar		: true,
			title 		: false,
			toolbar 	: true,
			tooltip		: false,
			movable		: false,
			zoomable	: false,
			rotatable	: false,
			scalable	: false,
			transition 	: false,
			fullscreen 	: false,
			keyboard 	: true,
			backdrop 	: true,
			loop 		: true,
			loading 	: true
		});
		function resizable(el, factor) {
			if (el) {
				var int = Number(factor) || 7.7;
				function resize() {el.style.width = ((el.value.length+1) * int) + 'px'}
				var e = 'keyup,keypress,focus,blur,change'.split(',');
				for (var i in e) el.addEventListener(e[i],resize,false);
					resize();
			}
		}
		resizable(document.getElementById('yet_sayi'),16);
		resizable(document.getElementById('gen_sayi'),16);
		resizable(document.getElementById('bebek_sayi'),16);

	</script>

	<script src="https://cdn.jsdelivr.net/npm/ismobilejs@1/dist/isMobile.min.js"></script>
	<script type="text/javascript">

		document.addEventListener("DOMContentLoaded", function(event) {
			if (isMobile.any) {
				document.querySelector('.c_r-g_r').setAttribute('ismobile', true)
			}
		});
	</script>
</body>
</html>