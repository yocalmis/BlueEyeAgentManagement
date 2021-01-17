<header>
	<style>i{font-style: normal;}</style>
	<nav>
		<div class="nav-wrapper container"> 
			<a href="<?php echo base_url() ?>" class="brand-logo">
				<img src="<?php echo base_url() ?>assets_user/img/blue_eye_logo.svg" alt="Blue Eye Logo">
				<div class="l_t">
					<h3>Blue Eye</h3>
					<?php if( $ayar ) : foreach( $ayar  as $dizi ) : ?>	
						<p><?php echo $dizi["site_slogan"];?></p>
					<?php endforeach; endif; ?>
				</div>
			</a>
			<a href="#" data-target="mobile-demo" class="sidenav-trigger">
				<?php echo "<span data-url='".icons_url."outline-menu-24px.svg'></span>";?>
			</a>
			<ul id="nav-mobile" class="right hide-on-med-and-down">
				<li>
					<a href="<?php echo base_url(); ?>">
						<span class="nav__icon">
							<?php echo "<span data-url='".icons_url."outline-directions_bus-24px.svg'></span>";?>
						</span>
						<?php echo $this->session->userdata('lng')["tur"]; ?>
					</a>
				</li>
				<li>
					<a href="<?php echo base_url(); ?>help">
						<span class="nav__icon">
							<?php echo "<span data-url='".icons_url."outline-help-24px.svg'></span>";?>
						</span>
						<?php echo $this->session->userdata('lng')["yrdm"]; ?>
					</a>
				</li>
				<!-- Giriş Yapılmış -->
				
				<li>
					<a href="<?php echo base_url(); ?>cart">
						<span class="nav__icon">
							<?php echo "<span data-url='".icons_url."outline-local_grocery_store-24px.svg'></span>";?>
						</span>
						<?php echo $this->session->userdata('lng')["spt"]; ?>
					</a>
				</li>
				<?php if($this->session->userdata('useronline')!=""){ ?>	
					<li class="big">
						<a>
							<span class="nav__icon">
								<?php echo "<span data-url='".icons_url."outline-person-24px.svg'></span>";?>
							</span>
							<?php echo $this->session->userdata('user_person_name'); ?>
						</a>
						<div class="minDrop">
							<a href="<?php echo base_url(); ?>reservation">
								<?php echo $this->session->userdata('lng')["rzrvsyn"]; ?>
							</a>
							<a href="<?php echo base_url(); ?>config">
								<?php echo $this->session->userdata('lng')["ayr"]; ?>
							</a>							
							<a href="<?php echo base_url(); ?>wishlist">
								<?php echo $this->session->userdata('lng')["istek"]; ?>
							</a>
							<a href="<?php echo base_url(); ?>history">
								<?php echo $this->session->userdata('lng')["gcms"]; ?>
							</a>
							<p class="divider"></p>
							<a href="<?php echo base_url(); ?>giris/cikis">
								<?php echo $this->session->userdata('lng')["cks"]; ?>
							</a>
						</div>
					</li>
				<?php } ?>
				<?php if($this->session->userdata('useronline')==""){ ?>

					<!-- Giriş Yapılmamış -->
					<li class="big">
						<a>
							<span class="nav__icon">
								<?php echo "<span data-url='".icons_url."outline-person-24px.svg'></span>";?>
							</span>
							<?php echo $this->session->userdata('lng')["grs"]; ?>
						</a>
						<div class="minDrop">
							<a href="<?php echo base_url(); ?>giris/kayit">
								<?php echo $this->session->userdata('lng')["grs"]; ?>
							</a>
							<a href="<?php echo base_url(); ?>giris/kayit">
								<?php echo $this->session->userdata('lng')["kayt"]; ?>
							</a>
						</div>
					</li>
				<?php } ?>
			</ul>
		</div>
	</nav>
	<?php $this->load->view('sidenav'); ?>
</header>
