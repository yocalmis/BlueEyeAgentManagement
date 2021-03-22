<!DOCTYPE html>
<html lang="tr">
<head>
	<title>
		<?php if( $ayar ) :  foreach( $ayar  as $dizi ) :    ?>	
			<?php echo strip_tags($dizi["kisa_aciklama".$uz]); ?>	
		<?php endforeach; endif; ?>
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
		<section class="h-brdcb">
			<h4>
				<?php echo $this->session->userdata('lng')["ytdms_bslk"];?>
			</h4>
		</section>
		<div class="container">
			<section>
				<ul class="collapsible coll-true">
					<?php if( $help_bilgi ) : foreach( $help_bilgi  as $dizi ) : ?>	


						<li>
							<div class="collapsible-header">
								<?php 
								if($this->session->userdata('lng_turu')=="Eng"){ 
									echo $dizi["soru"]; 
								}
								if($this->session->userdata('lng_turu')=="Tr"){ 
									echo $dizi["soru_tr"]; 
								}
								if($this->session->userdata('lng_turu')=="Ru"){ 
									echo $dizi["soru_ru"]; 
								}
								?>
								<?php echo "<span data-url='".icons_url."arrow_drop_down-24px.svg'></span>";?>
							</div>
								<div class="collapsible-body">
									<h5><?php 
									if($this->session->userdata('lng_turu')=="Eng"){ echo $dizi["soru"]; } 
									if($this->session->userdata('lng_turu')=="Tr"){ echo $dizi["soru_tr"]; } 	
									if($this->session->userdata('lng_turu')=="Ru"){ echo $dizi["soru_ru"]; } 					
									?></h5>
									<p><?php 
									if($this->session->userdata('lng_turu')=="Eng"){ echo $dizi["cevap"]; } 
									if($this->session->userdata('lng_turu')=="Tr"){ echo $dizi["cevap_tr"]; } 	
									if($this->session->userdata('lng_turu')=="Ru"){ echo $dizi["cevap_ru"]; } 					
									?> </p>
								</div>
							</li>
						<?php endforeach; endif; ?>
					</ul>
				</section>
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