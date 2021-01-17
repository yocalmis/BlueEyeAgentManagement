<div class="fixed-action-btn">
	<a class="btn-floating btn-large whatsapp-green tooltipped" data-tooltip="<?php echo $this->session->userdata('lng')["whatsapp_desc"]; ?>" href="https://wa.me/905435052677">
		<svg version="1.1" fill="white" id="whatsapp-green__icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="30px" height="30px" viewBox="0 0 90 90" xml:space="preserve">
			<g>
				<path id="WhatsApp" d="M90,43.841c0,24.213-19.779,43.841-44.182,43.841c-7.747,0-15.025-1.98-21.357-5.455L0,90l7.975-23.522
				c-4.023-6.606-6.34-14.354-6.34-22.637C1.635,19.628,21.416,0,45.818,0C70.223,0,90,19.628,90,43.841z M45.818,6.982
				c-20.484,0-37.146,16.535-37.146,36.859c0,8.065,2.629,15.534,7.076,21.61L11.107,79.14l14.275-4.537
				c5.865,3.851,12.891,6.097,20.437,6.097c20.481,0,37.146-16.533,37.146-36.857S66.301,6.982,45.818,6.982z M68.129,53.938
				c-0.273-0.447-0.994-0.717-2.076-1.254c-1.084-0.537-6.41-3.138-7.4-3.495c-0.993-0.358-1.717-0.538-2.438,0.537
				c-0.721,1.076-2.797,3.495-3.43,4.212c-0.632,0.719-1.263,0.809-2.347,0.271c-1.082-0.537-4.571-1.673-8.708-5.333
				c-3.219-2.848-5.393-6.364-6.025-7.441c-0.631-1.075-0.066-1.656,0.475-2.191c0.488-0.482,1.084-1.255,1.625-1.882
				c0.543-0.628,0.723-1.075,1.082-1.793c0.363-0.717,0.182-1.344-0.09-1.883c-0.27-0.537-2.438-5.825-3.34-7.977
				c-0.902-2.15-1.803-1.792-2.436-1.792c-0.631,0-1.354-0.09-2.076-0.09c-0.722,0-1.896,0.269-2.889,1.344
				c-0.992,1.076-3.789,3.676-3.789,8.963c0,5.288,3.879,10.397,4.422,11.113c0.541,0.716,7.49,11.92,18.5,16.223
				C58.2,65.771,58.2,64.336,60.186,64.156c1.984-0.179,6.406-2.599,7.312-5.107C68.398,56.537,68.398,54.386,68.129,53.938z"/>
			</g>
		</svg>
	</a>
</div>


<div class="carousel">
	<a class="carousel-item" href="#tripadvisor!">
		<img src="<?php echo base_url(); ?>assets_user/img/placeholder.svg"
		data-src="<?php echo base_url(); ?>assets_user/img/tripadvisor.jpg"
		class="lazy"
		alt="tripadvisor logo"
		/>
	</a>
	<a class="carousel-item" href="#tursap!">
		<img src="<?php echo base_url(); ?>assets_user/img/placeholder.svg"
		data-src="<?php echo base_url(); ?>assets_user/img/tursap.jpg"
		class="lazy"
		alt="tursab logo"
		/>
	</a>
	<a class="carousel-item" href="#viator!">
		<img src="<?php echo base_url(); ?>assets_user/img/placeholder.svg"
		data-src="<?php echo base_url(); ?>assets_user/img/viator.jpg"
		class="lazy"
		alt="viator logo"
		/>
	</a>
	<a class="carousel-item" href="#ctrip!">
		<img src="<?php echo base_url(); ?>assets_user/img/placeholder.svg"
		data-src="<?php echo base_url(); ?>assets_user/img/ctrip.jpg"
		class="lazy"
		alt="ctrip logo"
		/>
	</a>
	<a class="carousel-item" href="#expedia!">
		<img src="<?php echo base_url(); ?>assets_user/img/placeholder.svg"
		data-src="<?php echo base_url(); ?>assets_user/img/expedia.jpeg"
		class="lazy"
		alt="expedia logo"
		/>
	</a>
	<a class="carousel-item" href="#trip!">
		<img src="<?php echo base_url(); ?>assets_user/img/placeholder.svg"
		data-src="<?php echo base_url(); ?>assets_user/img/trip.jpg"
		class="lazy"
		alt="trip logo"
		/>
	</a>
</div>

<footer class="page-footer">
	<div class="container">
		<div class="row">
			
			<div class="col l3 s12">
				<h5 class="white-text">
					<?php echo $this->session->userdata('lng')["dstk"]; ?>
				</h5>
				<ul>
					<li>
						<a class="grey-text text-lighten-3" href="<?php echo base_url(); ?>contact">
							<?php echo $this->session->userdata('lng')["iltsm"]; ?>
						</a>
					</li>
					<li>
						<a class="grey-text text-lighten-3" href="<?php echo base_url(); ?>pages/detail/yasal">
							<?php echo $this->session->userdata('lng')["yasl"]; ?>
						</a>
					</li>
					<li>
						<a class="grey-text text-lighten-3" href="<?php echo base_url(); ?>pages/detail/gizlilik-politikasi">
							<?php echo $this->session->userdata('lng')["gizllk"]; ?>
						</a>
					</li>
					<li>
						<a class="grey-text text-lighten-3" href="<?php echo base_url(); ?>pages/detail/kullanim-kosullari">
							<?php echo $this->session->userdata('lng')["kul_ksl"]; ?>
						</a>
					</li>
				</ul>
			</div>
			<div class="col l3 s12">
				<h5 class="white-text">
					<?php echo $this->session->userdata('lng')["srkt"]; ?>
				</h5>

				<ul>
					<li>
						<a class="grey-text text-lighten-3" href="<?php echo base_url(); ?>pages/detail/hakkimizda">
							<?php echo $this->session->userdata('lng')["srkt"]; ?>
						</a>
					</li>
					<li>
						<a class="grey-text text-lighten-3" href="<?php echo base_url(); ?>pages/detail/kariyer">
							<?php echo $this->session->userdata('lng')["kryr"]; ?>
						</a>
					</li>
					<li>
						<a class="grey-text text-lighten-3" href="<?php echo base_url(); ?>pages/detail/mesafeli-satis-sozlesmesi">
							<?php echo $this->session->userdata('lng')["sts_szlsm"]; ?>
						</a>
					</li>
					<li>
						
					</li>
				</ul>
			</div>
			
			<div class="col l3 s12">
				<h5 class="white-text">
					<?php echo $this->session->userdata('lng')["bizimle_cls"]; ?>
				</h5>
				<ul>
					<li>
						<a class="grey-text text-lighten-3" href="<?php echo base_url(); ?>pages/detail/ortaklik-yonetimi">
							<?php echo $this->session->userdata('lng')["tdrk_yntm"]; ?>
						</a>
					</li>
				</ul>
				<h5 class="white-text">
					<?php echo $this->session->userdata('lng')["odeme"]; ?>
				</h5>
				<div class="payments">
					<img src="<?php echo base_url(); ?>assets_user/img/visa.svg" alt="visa">
					<img src="<?php echo base_url(); ?>assets_user/img/maestro.svg" alt="maestro">
					<img src="<?php echo base_url(); ?>assets_user/img/mastercard.svg" alt="mastercard">
				</div>
			</div>
			<div class="col l3 s12">
				<a href="https://www.tursab.org.tr/tr/ddsv" rel="noreferrer" target="_blank">
					<img style="margin: 1.0933333333rem 0 .656rem 0;" src="<?php echo site_url('assets_user/img/').$this->session->userdata('lng')["tursab_img"]; ?>.png" alt="TURSAB logo" />
				</a>
				
			</div>
		</div>
	</div>
	<div class="footer-copyright">
		<div class="container">
			<a href="?php echo base_url(); ?>pages/detail/hakkimizda">© <?php echo Date('Y'); ?> Blue Eye.
				<?php echo $this->session->userdata('lng')["cpryght"]; ?>
			</a>
			<div class="social">
				<?php	if( $ayar ) : foreach( $ayar  as $dizi ) :    ?>	
					<?php if($dizi["facebook"]!=""){ ?>
						<a href="<?php echo $dizi["facebook"];  ?>">
							<img src="<?php echo base_url(); ?>assets_user/img/001-facebook.svg" alt="facebook">
						</a>
					<?php  } ?>

					<?php if($dizi["instagram"]!=""){ ?>
						<a href="<?php echo $dizi["instagram"];  ?>">
							<img src="<?php echo base_url(); ?>assets_user/img/002-instagram.svg" alt="instagram">
						</a>
					<?php  } ?>

					<?php if($dizi["twitter"]!=""){ ?>	
						<a href="<?php echo $dizi["twitter"];  ?>">
							<img src="<?php echo base_url(); ?>assets_user/img/003-twitter.svg" alt="twitter">
						</a>
					<?php  } ?>

					<?php if($dizi["youtube"]!=""){ ?>
						<a href="<?php echo $dizi["youtube"];  ?>">
							<img src="<?php echo base_url(); ?>assets_user/img/004-youtube.svg" alt="youtube">
						</a>
					<?php  } ?>

					<?php if($dizi["pinterest"]!=""){ ?>
						<a href="<?php echo $dizi["pinterest"];  ?>">
							<img src="<?php echo base_url(); ?>assets_user/img/pinterest.svg" alt="pinterest">
						</a>
					<?php  } ?>

					<?php if($dizi["google"]!=""){ ?>
						<a href="<?php echo $dizi["google"];  ?>">
							<img src="<?php echo base_url(); ?>assets_user/img/006-google-plus.svg" alt="google">
						</a>
					<?php  } ?>

					<?php if($dizi["linkedin"]!=""){ ?>
						<a href="<?php echo $dizi["linkedin"];  ?>">
							<img src="<?php echo base_url(); ?>assets_user/img/linkedin.svg" alt="linkedin">
						</a>
					<?php  } ?>
				</a>

			<?php endforeach; endif; ?>
		</div>
	</div>
</div>
</footer>

<script src="<?php echo base_url(); ?>assets_user/js/lazy-load.js"></script>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-144549165-1"></script>
<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());
	
	gtag('config', 'UA-144549165-1');
</script>