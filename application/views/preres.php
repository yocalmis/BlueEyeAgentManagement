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

		<script src="<?php echo base_url(); ?>assets_user/js/jquery-3.3.1.min.js"></script>


	</head>
	<body class="nonf">
		<?php $this->load->view('header_alt'); ?>

		<main>
			<script>
				var getNav=document.querySelector("nav > .nav-wrapper:not(.main-menu)");window.screen.width<=768&&(getNav=document.querySelector("nav > .nav-wrapper")),getHeight=getNav.offsetHeight,document.querySelector("main").style.marginTop=getHeight+"px";
			</script>
			<div class="container">

				<section class="c-brdcrmb">
					<h4>
						<span class="c-brdcrmb__icon">
							<?php echo "<span data-url='".icons_url."outline-local_grocery_store-24px.svg'></span>";?>
						</span>
						<?php echo $this->session->userdata('lng')["on_rzrv_ism"]; ?>
					</h4>
					<span style="float:right;">
						<a href='<?php echo base_url(); ?>cart'>
							<b><?php echo $this->session->userdata('lng')["e_git"].$this->session->userdata('lng')["spt_ust_bslk"] ?></b>
						</a>
					</span>
				</section>
				<section class="card-inner">
					<div class="prdcs-i" style="flex-basis: 100%;">
						<div class="prdct-i p-header">
							<div class="prdct">
								<span>	<?php echo $this->session->userdata('lng')["urun"]; ?></span>
							</div>
							<div class="price">
								<span><?php echo $this->session->userdata('lng')["fiyat"]; ?></span>
							</div>
						</div>

						<?php	$n=0;	$total=0;	if( $cart_getir ) :  foreach( $cart_getir as $dizi ) :  ?>



						<?php	  			

			/*		if($this->session->userdata('lng_turu')=="Eng"){ $adi=$tur_bilgi[$n][0]["adi"]; } 
					if($this->session->userdata('lng_turu')=="Tr"){ $adi=$tur_bilgi[$n][0]["adi_tr"]; } 	
					if($this->session->userdata('lng_turu')=="Ru"){  $adi=$tur_bilgi[$n][0]["adi_ru"]; } 					
				*/			


					$adi=$tur_bilgi[$n][0]["adi".$uz];
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
					$ack=$dizi["aciklama"];						
					$total=$total+$tutar;

					?>
					
					<div class="prdct-i">
						<div class="prdct">
							<div class="prd-i">
								<img src="<?php echo base_url(); ?>assets/resimler/turlar/<?php echo $resim; ?>" alt="Tur">
							</div>
							<div class="prd-t">

								<h6><?php echo $adi; ?></h6>
								<p><?php echo $this->session->userdata('lng')["spt_ktgr"]; ?>: 
									<a href="<?php echo base_url(); ?>Category/detail/<?php echo $kat_bilgi_seo; ?>"><?php echo $kategori; ?></a>
								</p>
								<p>AÇIKLAMA : <?php echo $ack; ?>
							</p>
							<a href="#spt_t_ayr<?php echo $n; ?>" class="modal-trigger"><?php echo $this->session->userdata('lng')["ayrntlr"]; ?></a>







							<div id="spt_t_ayr<?php echo $n; ?>" class="modal">
								<div class="modal-header">
									<h4><?php echo $adi; ?></h4>
								</div>
								<div class="modal-inner m_i_p spt_ayr_m">
									<p>
										<span class="prd-t__icon">
											<?php echo "<span data-url='".icons_url."restore-24px.svg'></span>";?>
										</span>
										<?php echo $this->session->userdata('lng')["sure"]; ?>: <span class="normal"><?php echo $sure; ?></span>
									</p>
									<p class="divider"></p>
									<p>
										<span class="prd-t__icon">
											<?php echo "<span data-url='".icons_url."outline-date_range-24px.svg'></span>";?>
										</span>
										<?php echo $this->session->userdata('lng')["trh"]; ?>: 
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
										<?php echo $this->session->userdata('lng')["dety"]; ?>: 
										<span class="normal">
											<?php echo $yetiskin_adet." ".$this->session->userdata('lng')["n_ytskn"]." ".$cocuk_adet." ".$this->session->userdata('lng')["n_cck"]." ".$bebek_adet." ".$this->session->userdata('lng')["bbk"]; ?>
										</span>
									</p>								

								</div>

								<div class="modal-ops">
									<a style="display: none"></a>
									<a class="btn modal-close"><?php echo $this->session->userdata('lng')["tmm"]; ?></a>
								</div>

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
						<p><?php echo $this->session->userdata('lng')["ek_ucrt_yk"]; ?> </p>
					</div>


				</div>		






				<?php	$n=$n+1;	endforeach;	endif;	?>





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
			</div>



		</section>



	</div>
	<?php $this->load->view('mail_kayit'); ?>
</main>
<?php $this->load->view('footer'); ?>







<!-- materalize.js -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets_user/js/materialize.min.js"></script>
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

			values="iism0_0="+iism0_0+"&mail0_0="+mail0_0+"&tel0_0="+tel0_0+"&shr0_0="+shr0_0+"&slc0_0="+slc0_0+"&id0_0="+id0_0+"&sepet_id0_0="+sepet_id0_0;


			$.ajax({

				url: "cart/info",
				type: "post",
				data: values,
				success: function (response) {

					var error = '<?php echo "<span data-url='".icons_url."close-24px.svg'></span>";?>';
					if(response != 1){
						$('a[href$="#'+modul+'"]').html(eksik + ' ' + error).removeClass('succsess').addClass('error');
				}
				else{
						var succsess = '<?php echo "<span data-url='".icons_url."done-24px.svg'></span>";?>';
						$('a[href$="#'+modul+'"]').html(tmm + ' ' + succsess).removeClass('error').addClass('succsess');
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