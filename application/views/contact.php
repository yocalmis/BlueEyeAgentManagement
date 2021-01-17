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
	<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets_user/css/materialize.min.css"  media="screen,projection"/>
	<!-- master.css -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets_user/css/master.css">
</head>
<body class="nonf">
	<?php $this->load->view('header_alt'); ?>
	
	<main>		<script>var getNav=document.querySelector("nav > .nav-wrapper:not(.main-menu)");window.screen.width<=768&&(getNav=document.querySelector("nav > .nav-wrapper")),getHeight=getNav.offsetHeight,document.querySelector("main").style.marginTop=getHeight+"px";</script>
		<?php	if( $ayar ) :  foreach( $ayar  as $dizi ) :    ?>	



			<div class="container">
				<section class="c-brdcrmb">
					<h4>
						<span class="c-brdcrmb__icon">
							<?php echo "<span data-url='".icons_url."outline-account_circle-24px.svg'></span>";?>
							
						</span>
						<?php echo $this->session->userdata('lng')["iltsm_ust_bslk"]; ?>
					</h4>
				</section>
				<p></p>
				<section class="c_p-i">
					<div class="c_f-c_i">
						<h5>Blue Eye ©</h5>
						<p class="thin"><?php echo $dizi["kisa_aciklama"];  ?></p>
						<p>
							<b>
								<?php echo "<span data-url='".icons_url."my_location-24px.svg'></span>";?>
								<?php echo $this->session->userdata('lng')["adres"]; ?>: 
							</b> 
							<?php echo $dizi["adress"];  ?>
						</p>
						<p>
							<b>
								<?php echo "<span data-url='".icons_url."outline-perm_phone_msg-24px.svg'></span>";?>
								
								<?php echo $this->session->userdata('lng')["tlfn_no"]; ?>: 
							</b>
							<?php echo $dizi["tel_1"]; ?>
						</p>
						<p>
							<b>
								<?php echo "<span data-url='".icons_url."outline-mail_outline-24px.svg'></span>";?>
								<?php echo $this->session->userdata('lng')["email_slgn_label"];?>: 
							</b>
							<?php echo $dizi["email"];?>
						</p>
						<div class="social">
							<a href="<?php echo $dizi["facebook"];  ?>"><img src="<?php echo base_url(); ?>assets_user/img/001-facebook.svg" alt="facebook"></a>
							<a href="<?php echo $dizi["instagram"];  ?>"><img src="<?php echo base_url(); ?>assets_user/img/002-instagram.svg" alt="instagram"></a>
							<a href="<?php echo $dizi["twitter"];  ?>"><img src="<?php echo base_url(); ?>assets_user/img/003-twitter.svg" alt="twitter"></a>
							<a href="<?php echo $dizi["youtube"];  ?>"><img src="<?php echo base_url(); ?>assets_user/img/004-youtube.svg" alt="youtube"></a>
							<!--<a href="#"><img src="<?php echo base_url(); ?>assets_user/img/005-whatsapp.svg" alt="whatsapp"></a>-->
						</div>
					</div>
					<div class="c_c-f">
						<h5><?php echo $this->session->userdata('lng')["bzml_iltsm"];?></h5>

						<form action="<?php echo base_url(); ?>contact/get"  method="POST" >
							<div class="input-field">
								<input type="text" name="nm" id="name">
								<label for="name">
									<?php echo $this->session->userdata('lng')["ism_sysm"];?>
								</label>
							</div>
							<div class="input-field">
								<input type="email"  name="em" id="email">
								<label for="email">
									<?php echo $this->session->userdata('lng')["email_slgn_label"];?>
								</label>
							</div>
							<div class="input-field">
								<input type="text"  name="ms" id="message">
								<label for="message">
									<?php echo $this->session->userdata('lng')["msjnz"];?>
								</label>
							</div>
							<div class="input-field">
								<button type="submit" class="btn waves-effect submit-button right btn_contact">
									<?php echo $this->session->userdata('lng')["gndr_btn"];?>

								</button>
							</div>
						</form>
						<script>
							let 
							btn_contact = document.querySelector('.btn_contact'),
							isim 		= document.getElementById('name'),
							email 		= document.getElementById('email'),
							message 	= document.getElementById('message');

							let nameFun = elem => {
								let reg = /^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/g;
								return reg.test(elem.value);
							}
							let emailFun = elem => {
								let reg = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
								return reg.test(elem.value);
							}

							btn_contact.onclick = () => {
								let
								nameKontrol = nameFun(isim),
								mailKontrol = emailFun(email);

								if ((nameKontrol == false) || (mailKontrol == false) || (message.value == '')) {
									return false;
								}
								return true;
							}
						</script>
					</div>
				</section>
				<div class="map">
					<iframe src="<?php echo $dizi["maps"]; ?>" frameborder="0" style="border:0" allowfullscreen></iframe>
				</div>
			</div>
		<?php endforeach; endif; ?>
	</main>
	<?php $this->load->view('footer'); ?>



	<!-- jQuery.js -->
	<script src="<?php echo base_url(); ?>assets_user/js/jquery-3.4.1.min.js"></script>
	<!-- materalize.js -->
	<script src="<?php echo base_url(); ?>assets_user/js/materialize.min.js"></script>
	<!-- function.js -->
	<script src="<?php echo base_url(); ?>assets_user/js/function.js"></script>
</body>
</html>