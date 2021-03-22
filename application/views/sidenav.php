<div class="sidenav" id="mobile-demo" data-tab="false">
	<?php if($this->session->userdata('useronline')==""){ ?>	
		<!-- Giriş Yapılmamış -->
		<ul>
			<li>
				<a href="<?php echo base_url(); ?>">
					<span class="sidenav__icon">
						<?php echo "<span data-url='".icons_url."outline-directions_bus-24px.svg'></span>";?>
					</span>
					<?php echo $this->session->userdata('lng')["tur"]; ?>
				</a>
			</li>
			<li>
				<a href="#" role="button" data-target="lng_crs" class="sidenav-trigger">
					<span class="sidenav__icon">
						<?php echo "<span data-url='".icons_url."outline-language-24px.svg'></span>";?>
					</span>
					<?php echo $this->session->userdata('lng_turu'); ?> 
					/ 
					<?php echo $this->session->userdata('currency_birim'); ?> 
					(<?php echo $this->session->userdata('currency_icon'); ?>)
				</a>
			</li>
			<li>
				<a href="<?php echo base_url(); ?>cart">
					<span class="sidenav__icon">
						<?php echo "<span data-url='".icons_url."outline-local_grocery_store-24px.svg'></span>";?>
					</span>
					<?php echo $this->session->userdata('lng')["spt"]; ?>
				</a>
			</li>
			<li>
				<a href="<?php echo base_url(); ?>giris/kayit">
					<span class="sidenav__icon">
						<?php echo "<span data-url='".icons_url."outline-person-24px.svg'></span>";?>
					</span>
					<?php echo $this->session->userdata('lng')["grs"]; ?>
					/ 
					<?php echo $this->session->userdata('lng')["kayt"]; ?>
				</a>
			</li>
			<li class="divider" tabindex="-1"></li>
			<li>
				<a href="<?php echo base_url(); ?>help">
					<span class="sidenav__icon">
						<?php echo "<span data-url='".icons_url."help-24px.svg'></span>";?>
					</span>
					<?php echo $this->session->userdata('lng')["yrdm"]; ?>
				</a>
			</li>
		</ul>
	<?php } ?>

	<?php if($this->session->userdata('useronline')!=""){ ?>
		<!-- Giriş Yapılmış -->
		<ul>
			<li>
				<div class="user-view">
					<span class="user-view__name">
						<span class="user-view__icon">
							<?php echo "<span data-url='".icons_url."outline-person-24px.svg'></span>";?>
						</span>
						<?php echo $this->session->userdata('user_person_name'); ?>
					</span>
					<a href="<?php echo base_url(); ?>giris/cikis" class="user-view__exit" 
						title="<?php echo $this->session->userdata('lng')["cks"]; ?>">
						<?php echo "<span data-url='".icons_url."outline-exit_to_app-24px.svg'></span>";?>
					</a>
				</div>
			</li>
			<li>
				<a href="<?php echo base_url(); ?>">
					<span class="sidenav__icon">
						<?php echo "<span data-url='".icons_url."outline-directions_bus-24px.svg'></span>";?>
					</span>
					<?php echo $this->session->userdata('lng')["tur"]; ?>
				</a>
			</li>
			<!--<li>
				<a href="<?php echo base_url(); ?>otels">
					<span class="sidenav__icon">
						<?php echo "<span data-url='".icons_url."outline-hotel-24px.svg'></span>";?>
					</span>
					<?php echo $this->session->userdata('lng')["otel"]; ?>
				</a>
			</li>-->
			<li>
				<a href="#" data-target="lng_crs" class="sidenav-trigger">
					<span class="sidenav__icon">
						<?php echo "<span data-url='".icons_url."outline-language-24px.svg'></span>";?>
					</span>
					<?php echo $this->session->userdata('lng_turu');?>
					/ 
					<?php echo $this->session->userdata('currency_birim'); ?> 
					(<?php echo $this->session->userdata('currency_icon'); ?>)
				</a>
			</li>
			<li>
				<a href="<?php echo base_url(); ?>config">
					<span class="sidenav__icon">
						<?php echo "<span data-url='".icons_url."outline-settings-24px.svg'></span>";?>
					</span>
					<?php echo $this->session->userdata('lng')["ayr"]; ?>
				</a>
			</li>
			<li>
				<a href="<?php echo base_url(); ?>cart">
					<span class="sidenav__icon">
						<?php echo "<span data-url='".icons_url."outline-local_grocery_store-24px.svg'></span>";?>
					</span>
					<?php echo $this->session->userdata('lng')["spt"]; ?>
				</a>
			</li>
			<li>
				<a href="<?php echo base_url(); ?>reservation">
					<span class="sidenav__icon">
						<?php echo "<span data-url='".icons_url."outline-event_available-24px.svg'></span>";?>
					</span>
					<?php echo $this->session->userdata('lng')["rzrvsyn"]; ?>
				</a>
			</li>
			<li>
				<a href="<?php echo base_url(); ?>wishlist">
					<span class="sidenav__icon">
						<?php echo "<span data-url='".icons_url."outline-favorite-24px.svg'></span>";?>
					</span>
					<?php echo $this->session->userdata('lng')["istek"]; ?>
				</a>
			</li>
			<li>
				<a href="<?php echo base_url(); ?>history">
					<span class="sidenav__icon">
						<?php echo "<span data-url='".icons_url."outline-history-24px.svg'></span>";?>
					</span>
					<?php echo $this->session->userdata('lng')["gcms"]; ?>
				</a>
			</li>
			<li>
				<a href="<?php echo base_url(); ?>help">
					<span class="sidenav__icon">
						<?php echo "<span data-url='".icons_url."help-24px.svg'></span>";?>
					</span>
					<?php echo $this->session->userdata('lng')["yrdm"]; ?>
				</a>
			</li>
			<li class="divider" tabindex="-1"></li>
			<li>
				<a href="<?php echo base_url(); ?>giris/cikis">
					<span class="sidenav__icon sidenav__icon--exit">
						<?php echo "<span data-url='".icons_url."outline-exit_to_app-24px.svg'></span>";?>
					</span>
					<?php echo $this->session->userdata('lng')["cks"]; ?>
				</a>
			</li>
		</ul>
	<?php } ?>
</div>
<a href="#" data-target="lng_crs" class="l-g_c-s sidenav-trigger">
	<?php echo $this->session->userdata('lng_turu');?>
	/ 
	<?php echo $this->session->userdata('currency_birim'); ?> 
	(<?php echo $this->session->userdata('currency_icon'); ?>)
</a>
<div id="lng_crs" class="sidenav" tabindex="-1">
	<h5>Language</h5>
	<p class="divider" tabindex="-1"></p>
	<div class="lng_crs--l">
		<a href="<?php echo base_url(); ?>lang/index/Tr" class="waves-effect">
			<img src="<?php echo base_url(); ?>assets_user/img/flags/turkey.svg" 
			alt="<?php echo $this->session->userdata('lng')["tr"]; ?> Flag">
			<?php echo $this->session->userdata('lng')["tr"]; ?>
		</a>
		<a href="<?php echo base_url(); ?>lang/index/Eng" class="waves-effect">
			<img src="<?php echo base_url(); ?>assets_user/img/flags/united-kingdom.svg" 
			alt="<?php echo $this->session->userdata('lng')["eng"]; ?> Flag">
			<?php echo $this->session->userdata('lng')["eng"]; ?>
		</a>
		<a href="<?php echo base_url(); ?>lang/index/Ru" class="waves-effect">
			<img src="<?php echo base_url(); ?>assets_user/img/flags/russia.svg" 
			alt="<?php echo $this->session->userdata('lng')["ru"]; ?> Flag">
			<?php echo $this->session->userdata('lng')["ru"]; ?>
		</a>
		<!--
		<a href="<?php echo base_url(); ?>" class="waves-effect">
			<img src="<?php echo base_url(); ?>assets_user/img/flags/china.svg" alt="<?php echo $this->session->userdata('lng')["cin"]; ?> Flag">
			<?php echo $this->session->userdata('lng')["cin"]; ?>
		</a>
		<a href="<?php echo base_url(); ?>" class="waves-effect">
			<img src="<?php echo base_url(); ?>assets_user/img/flags/india.svg" alt="<?php echo $this->session->userdata('lng')["hnt"]; ?> Flag">
			<?php echo $this->session->userdata('lng')["hnt"]; ?>
		</a>
		<a href="<?php echo base_url(); ?>" class="waves-effect">
			<img src="<?php echo base_url(); ?>assets_user/img/flags/spain.svg" alt="<?php echo $this->session->userdata('lng')["esp"]; ?> Flag">
			<?php echo $this->session->userdata('lng')["esp"]; ?>
		</a>
	-->
</div>
<h5>Currency</h5>
<p class="divider" tabindex="-1"></p>
<div class="lng_crs--c">
	<a href="<?php echo base_url(); ?>currency/index/dollar" class="waves-effect">
		<span>$</span> 
		USD Dollars
	</a>
	<a href="<?php echo base_url(); ?>currency/index/ruble" class="waves-effect">
		<span>₽</span> 
		Pубль
	</a>
	<a href="<?php echo base_url(); ?>currency/index/euro" class="waves-effect">
		<span>€</span> 
		Euro
	</a>
	<a href="<?php echo base_url(); ?>currency/index/tl" class="waves-effect">
		<span>₺</span> 
		Türk Lirası
	</a>
	<a href="<?php echo base_url(); ?>currency/index/pound" class="waves-effect">
		<span>£</span> 
		Pound
	</a>
	<a href="<?php echo base_url(); ?>currency/index/dinar" class="waves-effect">
		<span>د.ك</span> 
		Dinnar
	</a>
</div>
</div>