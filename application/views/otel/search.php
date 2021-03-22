<!DOCTYPE html>
<html lang="tr">
<head>
	<title>
		<?php if( $ayar ) : foreach( $ayar  as $dizi ) : ?>	
						<?php 
		/*		if($this->session->userdata('lng_turu')=="Eng"){ echo strip_tags($dizi["kisa_aciklama"]); } 
				if($this->session->userdata('lng_turu')=="Tr"){echo strip_tags($dizi["kisa_aciklama_tr"]);} 	
				if($this->session->userdata('lng_turu')=="Ru"){ echo strip_tags($dizi["kisa_aciklama_ru"]);} 	
		*/
echo strip_tags($dizi["kisa_aciklama".$uz]);						
				?>	
		<?php endforeach; endif; ?>
	</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<?php $this->load->view('favicon'); ?>
	<!-- materialize.css -->
	<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets_user/css/materialize.min.css"  media="screen,projection"/>
	<!-- nouislider.css -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets_user/css/nouislider.min.css">
	<!-- master.css -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets_user/css/master.css">
	<script>
		var php_curr = "<?php echo $this->session->userdata('currency'); ?>";
		var php_birim = "<?php echo $this->session->userdata('currency_icon'); ?>";
	</script>
</head>
<body class="nonf">
<?php $this->load->view('header_alt'); ?>
	<main>
				<script>var getNav=document.querySelector("nav > .nav-wrapper:not(.main-menu)");window.screen.width<=768&&(getNav=document.querySelector("nav > .nav-wrapper")),getHeight=getNav.offsetHeight,document.querySelector("main").style.marginTop=getHeight+"px";</script>
		<div class="container">
			<div class="search-breadcrumb">
				<p><span class="c-n"><?php echo $word; ?></span>
					<span class="r-s-c"> 
				<br><?php echo $this->session->userdata('lng')["trh"]; ?>:  
				<?php $parca=explode(" ",$t1); echo $parca[0]; ?> - <?php $parca=explode(" ",$t2); echo $parca[0]; ?> 

				<br><?php echo $this->session->userdata('lng')["fiyat"]; ?>: 
				<?php echo round($f1*$this->session->userdata('currency')); ?> - <?php echo round($f2*$this->session->userdata('currency')); ?> <?php echo $this->session->userdata('currency_icon'); ?>
				<span style="float:right;"><?php echo $arama_sayi; ?> <?php echo $this->session->userdata('lng')["aktvte_blnd"]; ?>
					
				</span>
			</span>
		</p>
				<p class="divider"></p>
			</div>
			<div class="search-main-inner">
				<div class="categories">
					<section class="search-main">
						<div class="dates">
						<form action="<?php echo base_url(); ?>otels/Search/Word" method="Post" class="buy-form">
								<div class="ticket-form-inner">
									<p><?php echo $this->session->userdata('lng')["arma_acklma"]; ?>:</p>
									<div class="input-field">
										<input id="search_word" name="word" type="text">
										<label for="search_word"><?php echo $this->session->userdata('lng')["arma_btn"]; ?></label>
									</div>
									<div class="input-field takvim">
										<input id="start_date"  name="bas_t" type="text" class="datepicker">
										<label for="start_date">check-in</label>
									</div>
									<div class="input-field takvim">
										<input id="end_date"  name="bit_t" type="text" class="datepicker">
										<label for="end_date">check-in</label>
									</div>
								</div>
							
						</div>
						<ul class="collapsible">
						<!--	<li>
								<div class="collapsible-header">Kategoriler <i>arrow_drop_down</i></div>
								<div class="collapsible-body">
										<p>
											<label>
												<input type="checkbox" class="filled-in" />
												<span>Gezi Turları</span>
											</label>
										</p>
										
								</div>
							</li>
							<li>
								<div class="collapsible-header">Yer<i>arrow_drop_down</i></div>
								<div class="collapsible-body">

									<p>
										<label>
											<input type="checkbox" class="filled-in" />
											<span>Nevşehir</span>
										</label>
									</p>
								</div>
							</li>-->
						<li class="active" >
								<div class="collapsible-header">
									<?php echo $this->session->userdata('lng')["arma_fltr"]; ?> 
									<i>arrow_drop_down</i>
								</div>
								<div class="collapsible-body">
									<p>
										<label>
											<input type="checkbox" <?php echo $h_giris; ?> name="h_giris" value="1" class="filled-in" />
											<span><?php echo $this->session->userdata('lng')["hzl_grs"]; ?></span>
										</label>
									</p>
									<p>
										<label>
											<input type="checkbox" <?php echo $cok_satan; ?> name="cok_satan" value="1"  class="filled-in" />
											<span><?php echo $this->session->userdata('lng')["cok_stn"]; ?></span>
										</label>
									</p>
									<p>
										<label>
											<input type="checkbox" <?php echo $kupon; ?> name="kupon" value="1"  class="filled-in" />
											<span><?php echo $this->session->userdata('lng')["kupon"]; ?></span>
										</label>
									</p>
									<p>
										<label>
											<input type="checkbox" <?php echo $h_onay; ?> name="h_onay" value="1" class="filled-in" />
											<span><?php echo $this->session->userdata('lng')["hzl_ony"]; ?></span>
										</label>
									</p>
									<p>
										<label>
											<input type="checkbox" <?php echo $tuken; ?> name="tuken" value="1"  class="filled-in" />
											<span><?php echo $this->session->userdata('lng')["tknm_muhtml"]; ?></span>
										</label>
									</p>
									<p>
										<label>
											<input type="checkbox" <?php echo $engelli; ?> name="engelli" value="1"  class="filled-in" />
											<span><?php echo $this->session->userdata('lng')["engll"]; ?></span>
										</label>
									</p>
								</div>
							</li>
						
						
						</ul>
						<div class="ranges">
							<p>
								<?php echo $this->session->userdata('lng')["fyt_arlk"]; ?>: <br>
								<b><span id="r_min_v"></span></b>
								 - 
								<b><span id="r_max_v"></span></b>
							</p>
							<div id="test-slider"></div>
							<input type="hidden"  name="f1" id="min_v">
							<input type="hidden"  name="f2" id="max_v">
						</div>
						<button type="submit" value="" class="btn waves-effect buy-form_btn waves-light">
							<?php echo $this->session->userdata('lng')["yer_drumu"]; ?>
						</button>
					</section>
				</form>
				</div>
				<div class="results">
					<section class="result-main">
					
					
				<?php			$n=0;	if( $ara ) :  foreach( $ara as $dizi ) :
				
				if(($dizi["tur_donemi"]!="otel")or($tur_fyt_uygun[$n]!=1)){ $n=$n+1; continue;}  
				
				?>
	

							
			
					
					
					
						<div class="s-b-c-i">
							<a href="<?php echo base_url(); ?>otels/otel/detail/<?php echo $dizi["seo_adi"];  ?>"></a>
							<div class="b-c-t-i">
								<img src="<?php echo base_url(); ?>assets/resimler/turlar/<?php echo $dizi["resim"];  ?>" alt="<?php echo $dizi["adi"];  ?>">
								
									<h5><?php echo $dizi["adi"]; ?></h5>
									<div class="b-c-d-i">
								
										
										
										
								<?php if($dizi["tukenme"]==1){
							
echo'<span class="b-c-d-s tuken">
									<img src="'.base_url().'assets_user/img/warning.svg" alt="Best Tour">'.$this->session->userdata('lng')["tknm_muhtml"].'
								</span>';							
								
							} 
							else{
								
							 if($dizi["sticker"]==1){
								 
								echo'<span class="b-c-d-s tuken">
									<img src="'.base_url().'assets_user/img/blue_eye_1.png" alt="Best Tour">'.$this->session->userdata('lng')["blue_orjnl"].'
								</span>'; 
								 
							 }
								
							}
							?>								
										
										
										
										
										<!--
												<span class="b-c-d-s tuken">
											<img src="<?php echo base_url(); ?>assets_user/img/blue_eye_1.png" alt="Best Tour">BlueEye Orijinal
										</span>
										<span class="b-c-d-s bestseller">
											<img src="<?php echo base_url(); ?>assets_user/img/crown.svg" alt="Best Tour">En çok Satanlar
										</span>
										<span class="b-c-d-s tuken">
											<img src="<?php echo base_url(); ?>assets_user/img/warning.svg" alt="Best Tour">Çabuk Tükenmesi Muhtemel
										</span>-->
										
									</div>
									<div class="choose-other">
										<div class="stars">
									
											
											
							<?php 											
											
	$puan=$tur_puan_genel[$n];  
	$star=floor($puan);
	$dongu=$star-1;
    for($i=0; $i<=$dongu; $i++){
		
	echo '<i class="material-icons">star</i>';	
	}
	
	if($puan>$star){echo'<i class="material-icons">star_half</i>';}
	
	$bos=4-$dongu;
	
	if($puan>$star){$bos=$bos-1;}
	$bodongu=$bos-1;
	
    for($i=0; $i<=$bodongu; $i++){
		
	echo '<i class="material-icons">star_border</i>';	
	}	
											
					?>						
											
											
											
										</div>
										<span><?php echo $tur_yorum[$dizi["id"]]; ?> <?php echo $this->session->userdata('lng')["onrln_ktgr_yrm"]; ?></span>
									</div>
								</p>
							</div>
							</a>
							<p><?php echo $dizi["aciklama"]; ?></p>
							<div class="b-c-b-i">
								<div class="timeprice">
									<span class="other-duration"><i class="material-icons">restore</i> <b><?php echo $this->session->userdata('lng')["sure"]; ?>: </b> <?php echo $dizi["sure"];  ?></span>
									<span class="other-price">
										<p><?php echo $this->session->userdata('lng')["onrln_ktgr_fiyt"]; ?></p>
										<p>	<?php 
												//echo $dizi["tur"][$m]["baslangic_fiyat"]; 
												echo round($fyt_getir[$n]*$this->session->userdata('currency'))." ".$this->session->userdata('currency_icon');
											
												?> </p>
									</span>
								</div>
							</div>
						</div>
						
						
								<?php		$n=$n+1;	 endforeach;  endif; 	  ?>		
						
						
						
						
					</section>
				</div>
			</div>
		</div>
	</main>
	<?php $this->load->view('footer'); ?>


	<!-- jQuery.js -->
	<script src="<?php echo base_url(); ?>assets_user/js/jquery-3.3.1.min.js"></script>
	<!-- materalize.js -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets_user/js/materialize.min.js"></script>
	<!-- nouislider.js -->
	<script src="<?php echo base_url(); ?>assets_user/js/nouislider.min.js"></script>
	<!-- function.js -->
	<script src="<?php echo base_url(); ?>assets_user/js/function.js"></script>
	<script>
		let nonLinearSlider = document.getElementById('test-slider');
		noUiSlider.create(nonLinearSlider, {
			start 		: [5 * php_curr, 100 * php_curr],
			connect		: true,
			behaviour 	: 'tap',
			step 		: 1,
			range 		: {

				'min': 0,
				'max': 10000 * php_curr
			}
		});
		let nodes = [
			document.getElementById('r_min_v'),
			document.getElementById('r_max_v')
		];
		let 
		input0 = document.getElementById('min_v');
		input1 = document.getElementById('max_v');
		inputs = [input0, input1];

		nonLinearSlider.noUiSlider.on('update', function (values, handle, unencoded, isTap, positions) {
			nodes[handle].innerHTML = Math.round(values[handle]) + ' ' + php_birim;
			inputs[handle].value = Math.round(values[handle] / 5.5);
		});
	</script>
</body>
</html>