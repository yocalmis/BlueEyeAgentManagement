<!DOCTYPE html>
<html lang="tr">
<head>
	<title>
		<?php if( $ayar ) :  foreach( $ayar  as $dizi ) :    ?>	
			<?php echo strip_tags($dizi["kisa_aciklama".$uz]); ?>
		<?php endforeach;  endif;  ?>
	</title> 
	<meta charset="utf-8">
				<?php if( $ayar ) : foreach( $ayar  as $dizi ) : ?>	
	<meta name="description" content="<?php echo strip_tags($dizi["kisa_aciklama"]); ?>">
	<meta name="keyword" content="<?php echo strip_tags($dizi["seo_keywords"]);  ?>">
			<?php endforeach; endif; ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	
	<?php if( $alt_kat_bilgi ) :  foreach( $alt_kat_bilgi  as $dizi ) :    ?>	

	<meta name="keyword" content="<?php echo strip_tags($dizi["anahtar"]);  ?>">

	<?php endforeach;  endif;  ?>
	
	<?php $this->load->view('favicon'); ?>
	<!-- materialize.css -->
	<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets_user/css/materialize.min.css"  media="screen,projection"/>
	<!-- master.css -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets_user/css/master.css">
</head>
<body>
	<?php $this->load->view('header_alt'); ?>

	<main>
		<script>
			function navFix() {
				let getNav;
			
				const mq = window.matchMedia('(max-width: 768px)');
				if (mq.matches) {
					getNav = document.querySelector('nav > .nav-wrapper');
				
				}
				else {
					getNav = document.querySelector('nav > .nav-wrapper:not(.main-menu)')
				}

				if (getNav == null) {
					return false;
				}

				getHeight = getNav.offsetHeight;

				document.querySelector('main').style.marginTop = getHeight+'px';
			}
			navFix();
		</script>

		<section class="top-places">
			<div class="container center-align">
				<h4><?php echo $this->session->userdata('lng')["poplr_slgn"]; ?></h4>
				<div class="top-places-inner">
				
					
							<?php	if( $kat ) :  foreach( $kat  as $dizi ) :    ?>	
	


					<div class="top-places-item">
						<a href="<?php echo base_url(); ?>categories/detail/<?php echo $dizi["seo_adi"]; ?>">
						<figure>
							<img src="<?php echo base_url(); ?>assets/resimler/sehirler/<?php echo $dizi["resim"]; ?>" alt="burç">
						</figure>
						
						<h5><?php echo $dizi["adi".$uz]; ?></h5>
						</a>
					</div>
					
				<?php 	 endforeach;  endif;  ?>			
					
					
					
					
				</div>
			</div>
		</section>
		<?php $this->load->view('mail_kayit'); ?>
	</main>
	<?php $this->load->view('footer'); ?>


	<!-- jQuery.js -->
	<script src="<?php echo base_url(); ?>assets_user/js/jquery-3.3.1.min.js"></script>
	<!-- materalize.js -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets_user/js/materialize.min.js"></script>
	<!-- function.js -->
	<script src="<?php echo base_url(); ?>assets_user/js/function.js"></script>

</body>
</html>