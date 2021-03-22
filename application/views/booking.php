<!DOCTYPE html>
<html lang="tr">
<head>
	<title>
		<?php	if( $ayar ) :  foreach( $ayar  as $dizi ) : ?>
			<?php  echo strip_tags($dizi["kisa_aciklama".$uz]); ?>
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
	<main>		<script>var getNav=document.querySelector("nav > .nav-wrapper:not(.main-menu)");window.screen.width<=768&&(getNav=document.querySelector("nav > .nav-wrapper")),getHeight=getNav.offsetHeight,document.querySelector("main").style.marginTop=getHeight+"px";</script>
		<div class="container">
			<section class="c-brdcrmb">
				<h4>
					<span class="c-brdcrmb__icon">
						<?php echo "<span data-url='".icons_url."bookmarks-24px.svg'></span>";?>
					</span>
					<?php echo $this->session->userdata('lng')["rzrv_ust_bslk"]; ?>
				</h4>
			</section>
			<script>
				window.flags = {
					currency: <?php echo $this->session->userdata("currency"); ?>,
					reservations: [],
					<?php if( $rez_getir ) : foreach( $rez_getir as $dizi ) :	
						echo 'kullanici_id:'.$dizi["kullanici_id"].',';
					endforeach; endif; ?>
				};
			</script>

			<section class="result-main none-shadow">
				<?php 				
				 $n=0; $total=0; if( $rez_getir ) : foreach( $rez_getir as $dizi ) : ?>

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
			//	$bulusma_noktasi = $dizi["bulusma_noktasi"];
			//	$dahili_olanlar = $dizi["dahil_olanlar"];
				$bulusma_noktasi = $tur_bilgi[$n][0]["bulusma_noktasi"];	
				$dahili_olanlar = $tur_bilgi[$n][0]["dahil_olanlar"];	
				$iptal_durum=$dizi["iptal_durum"];					

				$total=$total+$tutar;
				
		

       $mm=0;  if( $rez_detay [$n]  ) : foreach( $rez_detay [$n]  as $dizi_ss ) :
	           
				$otel_adi=$dizi_ss["otel_adi"];					
				$names=$dizi_ss["adi"];
                break;
		$mm=$mm+1;	endforeach;  endif; 

				?>




				<div class="s-b-c-i" data-id="<?php echo $id; ?>">

					<?php 
					if($tur_donemi!="otel"){ ?>
						<a href="<?php echo base_url(); ?>Tour/detail/<?php echo $seo_adi;  ?>"></a>
					<?php  }
					else { ?>
						<a href="<?php echo base_url(); ?>otels/otel/detail/<?php echo $seo_adi;  ?>"></a>
					<?php } ?>

					<div class="b-c-t-i">
						<img src="<?php echo base_url(); ?>assets/resimler/turlar/<?php echo $resim; ?>" alt="<?php echo $adi; ?>">
						<h5>
							<?php echo $adi; ?> - 
							<span style="color:red;">
								<?php 
								if($iptal_durum==0){
									if($durum==0){
										echo $this->session->userdata('lng')["is_onay_false"];
									} 
									if($durum==1){
										echo $this->session->userdata('lng')["is_onay_true"];
									}
								}
								if($iptal_durum==1){
									echo $this->session->userdata('lng')["rez_iptal_durum_beklemede"];
								}
								if($iptal_durum==2){
									echo $this->session->userdata('lng')["rez_iptal_durum_onaylandi"];
								}
								?>
							</span>
						</h5>
						<h5>
							<?php echo $this->session->userdata('lng')["admin_aciklama"].": ".$admin_aciklama; ?>
						</h5>


						<div class="b-c-d-i">
							<?php if($sticker==1){ ?>
								<span class="b-c-d-s tuken">
									<img src="<?php echo base_url(); ?>assets_user/img/blue_eye_1.png" alt="Best Tour">
									<?php echo $this->session->userdata('lng')["blue_orjnl"]; ?>
								</span>
							<?php } ?>
						</div>
						<button class="settings modal-trigger blue darken-1" data-target="settings_<?php echo $id; ?>">
							<?php echo $this->session->userdata('lng')["rez_guncelle_btn"]; ?>
						</button>
						<div class="choose-other">
							<div class="stars">
								<?php $puan1=$puan[$kod]["tur_puan_genel"];  ?>
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
							<span><?php echo $puan[$kod]["yorum_adet"];  ?>  
							<?php echo $this->session->userdata('lng')["onrln_ktgr_yrm"]; ?>
						</span>

						<p class="other-modification">
							<?php echo $this->session->userdata('lng')["trh"]; ?>: 
							<?php
							if( $baslangic_saati == "00:00:00" ) {
								echo $baslangic_tarihi." - ".$bitis_tarihi;  
							}
							else {
								echo $baslangic_tarihi." ".$this->session->userdata('lng')["saat"];": ".$baslangic_saati." - ".$bitis_saati; 
							}
							?>
						</p>
						<p>

						</p>
					</div>
				</div>
			</a>
			<p><?php echo $aciklama; ?></p>
			<div class="b-c-b-i">
				<div class="timeprice">
					<span class="other-duration">
						<?php echo "<span data-url='".icons_url."restore-24px.svg'></span>";?>
						<b><?php echo $this->session->userdata('lng')["sure"]; ?>: </b>
						<?php echo $sure; ?>
					</span>
					<span class="other-peoples">
						<?php echo "<span data-url='".icons_url."outline-supervisor_account-24px.svg'></span>";?>
						<b>
							<?php echo $this->session->userdata('lng')["dety"]; ?>
							:
						</b> 
						<?php 
						echo $yetiskin_adet." ".$this->session->userdata('lng')["n_ytskn"]; ?>
						<?php 
						if($cocuk_adet>0){echo $cocuk_adet." ".$this->session->userdata('lng')["n_cck"]; } ?>
						<?php 
						if($bebek_adet>0){echo $bebek_adet." ".$this->session->userdata('lng')["bbk"]; } ?>
					
					</span>
					<span class="other-price">
						<p>
							<?php echo $this->session->userdata('lng')["tutar"]; ?>
						</p>
						<p>
							<?php
							echo round($tutar*$this->session->userdata('currency'))." ".$this->session->userdata('currency_icon');
							?> 
						</p>
					</span>
				</div>
			</div>
		</div>
		<div id="settings_<?php echo $id; ?>" data-id="<?php echo $id; ?>" class="modal modal--centered">
			<div class="modal-content">
				<h4 class="rez-settings__header">
					<?php echo $this->session->userdata('lng')["rez_guncelle_baslik"]; ?>
				</h4>
				<ul class="rez-settings">
					<li class="rez-settings__item">
						<button class="rez-settings__btn waves-effect modal-trigger update_credit_card" data-target="update_credit_card<?php echo $id; ?>">
							<?php echo $this->session->userdata('lng')["rez_update_credit_card_btn"]; ?>
						</button>
					</li>
					<?php 
					$today = strtotime(date('Y/m/d'));
					$tur_start_date = strtotime($baslangic_tarihi);
					?>
					<?php if (($tur_start_date - $today) >= 86400): ?>
						<li class="rez-settings__item">
							<button class="rez-settings__btn waves-effect cancel_rez effect modal-trigger" data-target="cancel_rezervation<?php echo $id; ?>" >
								<?php echo $this->session->userdata('lng')["rez_cansel_rezerv_btn"]; ?>
							</button>
						</li>
						<?php if ($tur_donemi == 'surekli'): ?>
							<li class="rez-settings__item">
								<button class="rez-settings__btn waves-effect modal-trigger" data-target="change-date-first<?php echo $id; ?>">
									<?php echo $this->session->userdata('lng')["rez_change_date_btn"]; ?>
								</button>
							</li>
						<?php endif ?>
					<?php endif ?>


					<li class="rez-settings__item">
						<button class="rez-settings__btn waves-effect modal-trigger comment-rezerv-trigger" data-target="comment-rezerv<?php echo $id; ?>">
							<?php echo $this->session->userdata('lng')["rez_comment_btn"]; ?>
						</button>
					</li>
					<li class="rez-settings__item">
						<button class="rez-settings__btn waves-effect print_reservation">
							<?php echo $this->session->userdata('lng')["rez_print_btn"]; ?>
						</button>
					</li>
				</ul>
			</div>
		</div>

		<div id="comment-rezerv<?php echo $id; ?>" class="modal modal-fixed-footer full-on-mobile" data-id="<?php echo $id; ?>">
			<div class="modal-header sticky-modal-header">
				<h4><?php echo $this->session->userdata('lng')["yrm_brk"]; ?></h4>
			</div>
			<div class="modal-content">
				<div class="comment-rezerv__fields">
					<div class="input-field">
						<input type="text" name="tour_comment_title<?php echo $id; ?>" placeholder="<?php echo $this->session->userdata('lng')["bslk_gr"]; ?>">
					</div>
					<div class="input-field">
						<textarea class="materialize-textarea" name="tour_comment_message<?php echo $id; ?>" placeholder="<?php echo $this->session->userdata('lng')["msj_gir"]; ?>"></textarea>
					</div>
				</div>
				<div class="c_r-g_r">
					<input type="hidden" value="3" name="servis<?php echo $id; ?>" id="servis<?php echo $id; ?>" />
					<input type="hidden" value="3" name="organ<?php echo $id; ?>" id="organ<?php echo $id; ?>" />
					<input type="hidden" value="3" name="para<?php echo $id; ?>" id="para<?php echo $id; ?>" />
					<input type="hidden" value="3" name="guven<?php echo $id; ?>" id="guven<?php echo $id; ?>" />

					<div>
						<p>
							<?php echo $this->session->userdata('lng')["srvs"]; ?> :
						</p>
						<div class="stars tour_comment_star__service">
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
								<?php echo "<span data-url='".icons_url."star_border.svg'></span>";?>
							</span>
							<span class="stars__star">
								<?php echo "<span data-url='".icons_url."star_border.svg'></span>";?>
							</span>
						</div>
					</div>
					<div>
						<p>
							<?php echo $this->session->userdata('lng')["orgnzsn"]; ?> :
						</p>
						<div class="stars tour_comment_star__organization">
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
								<?php echo "<span data-url='".icons_url."star_border.svg'></span>";?>
							</span>
							<span class="stars__star">
								<?php echo "<span data-url='".icons_url."star_border.svg'></span>";?>
							</span>
						</div>
					</div>
					<div>
						<p>
							<?php echo $this->session->userdata('lng')["prnn_krsl"]; ?> :
						</p>
						<div class="stars tour_comment_star__price">
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
								<?php echo "<span data-url='".icons_url."star_border.svg'></span>";?>
							</span>
							<span class="stars__star">
								<?php echo "<span data-url='".icons_url."star_border.svg'></span>";?>
							</span>
						</div>
					</div>
					<div>
						<p>
							<?php echo $this->session->userdata('lng')["gvnlk"]; ?> :
						</p>
						<div class="stars tour_comment_star__security">
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
								<?php echo "<span data-url='".icons_url."star_border.svg'></span>";?>
							</span>
							<span class="stars__star">
								<?php echo "<span data-url='".icons_url."star_border.svg'></span>";?>
							</span>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-ops modal-footer">
				<a class="btn modal-close">
					<?php echo $this->session->userdata('lng')["iptal"]; ?>
				</a>
				<input type="hidden" class="datepicker datepicker<?php echo $id; ?>">
				<button class="btn rez-make-comment">
					<?php echo $this->session->userdata('lng')['gndr_btn'] ?>
				</button>

			</div>
		</div>

		<div id="change-date-first<?php echo $id; ?>" data-id="<?php echo $id; ?>" class="modal modal-fixed-footer full-on-mobile">
			<div class="modal-header sticky-modal-header">
				<h4>
					<?php echo $this->session->userdata('lng')["rez_change_date_title"]; ?>
				</h4>
			</div>
			<div class="modal-content">
				<h6 class="cancel_rezervation__title">
					<?php echo $this->session->userdata('lng')["rez_change_date_reason_title"]; ?>
				</h6>
				<div class="input-field change-date-note__field">
					<textarea class="change-date-note__textarea materialize-textarea" placeholder="<?php echo $this->session->userdata('lng')["rez_change_date_placeholder"]; ?>"></textarea>
				</div>
				<div class="cl-t-f__error warning update_credit_card__warning">
					<span class="cl-t-f__icon">
						<?php echo "<span data-url='".icons_url."warning-24px.svg'></span>";?>
					</span>
					<p>
						<?php echo $this->session->userdata('lng')["rez_change_date_warning"]; ?>
					</p>
				</div>
			</div>
			<div class="modal-ops modal-footer">
				<a class="btn modal-close">
					<?php echo $this->session->userdata('lng')["iptal"]; ?>
				</a>
				<input type="hidden" class="datepicker datepicker<?php echo $id; ?>">
				<button class="btn change-rez-data--next">
					<?php echo $this->session->userdata('lng')["rez_change_date_next"]; ?>
				</button>

			</div>

		</div>

		<div id="update_credit_card<?php echo $id; ?>" data-id="<?php echo $id; ?>" class="modal modal-fixed-footer full-on-mobile">
			<div class="modal-header sticky-modal-header">
				<h4>
					<?php echo $this->session->userdata('lng')["rez_update_card_title"]; ?>
				</h4>
			</div>
			<div class="modal-content">
				<div class="update_credit_card__content">
					<div class="card-wrapper update_credit_card__card-wrapper"></div>
					<form class="update_credit_card__form" action="<?php echo base_url(); ?>checkout/payment" method="POST">
						<input type="text" 
						name="number" 
						placeholder="<?php echo $this->session->userdata('lng')["krt_no"]; ?>"
						class="update_credit_card__input" /> 
						<input type="text" 
						name="name" 
						placeholder="<?php echo $this->session->userdata('lng')["ism_sysm"]; ?>"
						class="update_credit_card__input" />
						<div class="update_credit_card__div">
							<input type="text" 
							name="expiry" 
							placeholder="<?php echo $this->session->userdata('lng')["krt_trh"]; ?>"
							class="update_credit_card__input"/>
							<input type="text" 
							name="cvc" 
							placeholder="<?php echo $this->session->userdata('lng')["krt_cvc"]; ?>"
							class="update_credit_card__input"/>
						</div>
					</form>
				</div>
				<div class="cl-t-f__error warning update_credit_card__warning">
					<span class="cl-t-f__icon">
						<?php echo "<span data-url='".icons_url."warning-24px.svg'></span>";?>
					</span>
					<p>
						<?php echo $this->session->userdata('lng')["rez_update_card_warning"]; ?>
					</p>
				</div>
			</div>
			<div class="modal-ops modal-footer">
				<a class="btn modal-close">
					<?php echo $this->session->userdata('lng')["iptal"]; ?>
				</a>
				<button class="btn sub_update_btn">
					<?php echo $this->session->userdata('lng')["kaydt"]; ?>
				</button>
			</div>
		</div>
		<div id="cancel_rezervation<?php echo $id; ?>" data-id="<?php echo $id; ?>" class="modal modal-fixed-footer full-on-mobile">
			<div class="modal-header sticky-modal-header">
				<h4>
					<?php echo $this->session->userdata('lng')["rez_cansel_rezerv_btn"]; ?>
				</h4>
			</div>
			<div class="modal-content">
				<h5 class="cancel_rezervation__title">
					<?php echo $this->session->userdata('lng')["rez_cancel_reason"]; ?>
				</h5>
				<div class="input-field cancel_rezervation__why">
					<textarea class="cancel_rezervation__why__textarea materialize-textarea" placeholder="<?php echo $this->session->userdata('lng')["rez_change_date_placeholder"]; ?>"></textarea>
				</div>
				<div class="cl-t-f__error warning update_credit_card__warning">
					<span class="cl-t-f__icon">
						<?php echo "<span data-url='".icons_url."warning-24px.svg'></span>";?>
					</span>
					<p>
						<?php echo $this->session->userdata('lng')["rez_cancel_warning"]; ?>
					</p>
				</div>
			</div>
			<div class="modal-ops modal-footer">
				<a class="btn modal-close">
					<?php echo $this->session->userdata('lng')["iptal"]; ?>
				</a>
				<button class="btn sub_cansel_rezerv_btn">
					<?php echo $this->session->userdata('lng')["kaydt"]; ?>
				</button>
			</div>
		</div>
		<script>
			window.flags.reservations[<?php echo $n; ?>] = {
				id: <?php echo $id; ?>,
				tur_id: <?php echo $tur_id; ?>,
				tur_kod: <?php echo $kod; ?>,
				tur_turu: '<?php echo $tur_donemi; ?>',
				seo_adi: '<?php echo $adi; ?>',
				tek_fiyati: <?php echo $tutar; ?>,
				baslangic_tarihi: '<?php echo $baslangic_tarihi ?>',
				bitis_tarihi: '<?php echo $bitis_tarihi; ?>',
				printData: {
					name: '<?php echo $adi; ?>',
					date: '<?php echo $baslangic_tarihi.', '.$bitis_tarihi ?>',
					duration: '<?php echo $sure; ?>',
					details: '<?php echo $yetiskin_adet." ".$this->session->userdata('lng')["n_ytskn"]." , ".$cocuk_adet." ".$this->session->userdata('lng')["n_cck"]." , ".$bebek_adet." ".$this->session->userdata('lng')["bbk"]; ?>',
					price: '<?php echo round($tutar*$this->session->userdata('currency'))." ".$this->session->userdata('currency_icon');
					?> '
				}
			};
		</script>
		<div class="rez-print rez-print--<?php echo $id; ?>" hidden>
			<div class="rez-print__check">
				<div class="rez-print__left-side rez-ticket">
					<h4 class="rez-ticket__company rez-company">
						Blue Eye Tour 
						<img class="rez-company__logo" src="<?php echo base_url() ?>assets_user/img/blue_eye_logo.svg" alt="Blue Eye Logo">
					</h4>
					<h5 class="rez-ticket__name">Name: <?php echo $names; ?></h5>
					
					<p class="rez-ticket__tour-name">Hotel: <?php echo $otel_adi; ?></p>					
					<p class="rez-ticket__tour-name">Tour: <?php echo $adi; ?></p>
					<p class="rez-ticket__date">Date: <?php echo $baslangic_tarihi ?></p>
					<p class="rez-ticket__participant">Person: 
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


	</section>
</div>
<?php $this->load->view('mail_kayit'); ?>
</main>

<?php $this->load->view('footer'); ?>

<!-- jQuery.js -->
<script src="<?php echo base_url(); ?>assets_user/js/jquery-3.4.1.min.js"></script>

<script src="<?php echo base_url(); ?>assets_user/js/jquery.card.js"></script>
<script src="<?php echo base_url(); ?>assets_user/js/jquery.inlinestyler.js"></script>
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
<script type="text/javascript" src="<?php echo base_url(); ?>assets_user/js/materialize.min.js"></script>

<!-- function.js -->
<script src="<?php echo base_url(); ?>assets_user/js/function.js"></script>
</body>
</html>