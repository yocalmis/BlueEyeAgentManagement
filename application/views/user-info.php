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

</head>
<body class="nonf">
		<?php $this->load->view('header_alt'); ?>
	
	<main class="">
				<script>var getNav=document.querySelector("nav > .nav-wrapper:not(.main-menu)");window.screen.width<=768&&(getNav=document.querySelector("nav > .nav-wrapper")),getHeight=getNav.offsetHeight,document.querySelector("main").style.marginTop=getHeight+"px";</script>
		<div class="container">
		
			<?php	if( $k_bilgi ) :  foreach( $k_bilgi  as $dizi ) :    ?>	
				
			<section class="user-info">
				<div class="sign-up">
					<h5>
						<?php echo $this->session->userdata('lng')["ayrlr_bslk"]; ?>
					</h5>

					<form action="<?php echo base_url(); ?>config/guncelle" id="deistir" method="POST" class="col s12">
						<div class="row m0">
							<div class="input-field col m6 s12">
								<input placeholder="<?php echo $dizi["username"];?>" value="<?php echo $dizi["username"];  ?>" id="kulAdi" type="text" disabled>
								<label for="kulAdi">
									<?php echo $this->session->userdata('lng')["kllnc_adi"]; ?>
								</label>
								<input name="k_id" value="<?php echo $dizi["id"];  ?>" id="kulIDGizli" type="hidden">
								<input name="ad" value="<?php echo $dizi["name"];  ?>" id="kulAdiGizli" type="hidden">	
								<input name="kul" value="<?php echo $dizi["username"];  ?>" id="kulLoginGizli" type="hidden">								
							</div>
							<div class="input-field col m6 s12">
								<input placeholder="<?php echo $dizi["name"]; ?>" value="<?php echo $dizi["name"]; ?>" id="urunKodu" type="text" disabled>
								<label for="urunKodu">
									<?php echo $this->session->userdata('lng')["ism_sysm"]; ?>
								</label>
							</div>
						</div>
						<div class="input-field">
							<input id="password" type="password" name="ps">
							<label for="password">
								<?php echo $this->session->userdata('lng')["yni_sfr"]; ?>
							</label>
						</div>
						<div class="input-field">
							<input id="cfmPassword" type="password"  name="ps2">
							<label for="cfmPassword">
								<?php echo $this->session->userdata('lng')["yni_sfre_tkrr"]; ?>
							</label>
						</div>
						<div class="input-field">
							<input id="mail" type="text"  name="em" value="<?php echo $dizi["email"];  ?>" >
							<label for="mail">
								<?php echo $this->session->userdata('lng')["email_slgn_label"]; ?>
							</label>
						</div>
						<div class="input-field">
							<input id="kulAdres"   name="adr" value="<?php echo $dizi["adres"];  ?>"  type="text"></input>
							<label for="kulAdres">
								<?php echo $this->session->userdata('lng')["adresiniz"]; ?>
							</label>
						</div>
						
						<div class="input-field">
							<input id="kulFatura"   name="fadr" value="<?php echo $dizi["fatura_adresi"];  ?>"  type="text"></input>
							<label for="kulFatura">
								<?php echo $this->session->userdata('lng')["ftura_adresi"]; ?>
							</label>
						</div>
						
							<div class="input-field">
							<input id="KulTelefon" name="tl" value="<?php echo $dizi["telefon"];  ?>"  type="number"></input>
							<label for="KulTelefon">
								<?php echo $this->session->userdata('lng')["tlfn_no"]; ?>
							</label>
						</div>
						<p class="submit-paragraph">
							<button type="submit" id="submit-sign" class="btn waves-effect submit-button">
								<?php echo $this->session->userdata('lng')["ayrlr_tm_btn"]; ?>
							</button>
						</p>
					</form>
				</div>

		<div class="sign-up">
					<h5>
						<?php echo $this->session->userdata('lng')["uyligimi_dndr_blsk"]; ?>
					</h5>
					<form action="<?php echo base_url(); ?>config/dondur" id="kulIsim" method="POST">
						<div class="input-field">
							<input name="id" value="<?php echo $dizi["id"]; ?>" type="hidden">
							<input name="kl" value="<?php echo $dizi["username"]; ?>" type="hidden">					
							<label><?php echo $dizi["username"]; ?> - <?php echo $dizi["name"]; ?></label>
						</div>
						<p class="submit-paragraph">
							<button type="submit" class="btn waves-effect submit-button">
								<?php echo $this->session->userdata('lng')["uyligimi_dndr_tm_btn"]; ?>
							</button>
						</p>
					</form>
				</div>			
				
				
				
				
			</section>
			<?php 	 endforeach;  endif;  ?>
		</div>
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