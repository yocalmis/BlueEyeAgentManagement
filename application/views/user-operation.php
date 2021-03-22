<!DOCTYPE html>
<html lang="tr">
<head>
	<title>
		<?php if( $ayar ) : foreach( $ayar  as $dizi ) : ?>	
			<?php echo strip_tags($dizi["kisa_aciklama".$uz]); ?>	
		<?php endforeach; endif; ?>
	</title>
	<meta charset="UTF-8">
	<?php if( $ayar ) : foreach( $ayar  as $dizi ) : ?>	
		<meta name="description" content="<?php echo strip_tags($dizi["kisa_aciklama"]); ?>">
		<meta name="keyword" content="<?php echo strip_tags($dizi["seo_keywords"]);  ?>">
	<?php endforeach; endif; ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta name="google-signin-client_id" content="1097393470680-mdv8usp86rcvcqj0df6185g2rqu8hiti.apps.googleusercontent.com">
	<?php $this->load->view('favicon'); ?>
	<!-- materialize.css -->
	<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets_user/css/materialize.min.css" media="screen,projection"/>
	<!-- master.css -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets_user/css/master.css">

</head>
<body>

	<?php $this->load->view('header_alt'); ?>
	
	<main class="">
		<script>var getNav=document.querySelector("nav > .nav-wrapper:not(.main-menu)");window.screen.width<=768&&(getNav=document.querySelector("nav > .nav-wrapper")),getHeight=getNav.offsetHeight,document.querySelector("main").style.marginTop=getHeight+"px";
		window.flags = {
			locateToBaseUrl: true,
			signin: {
				status: <?php 
				if ($this->session->userdata('useronline') == "") {echo "false";}
				else {echo "true";}?>,
				name_surname: '',
				email: '',
				login_type: '',
				id: ''

			}
		}
	</script>
	<div class="container">
		<section class="user-operation">
			<div class="user-operation__inner user-operation__continue-with">
				<h5>
					<?php echo $this->session->userdata('lng')["login_with"]; ?>
				</h5>
				<div class="uo_continue-with">
					<button class="continue-with continue-with--uo waves-effect" data-logintype="google">
						<?php echo "<span class='continue-with__icon' data-url='".icons_url."google.svg'></span>";?>
						Google
					</button>
					<button class="continue-with continue-with--uo waves-effect" data-logintype="facebook">
						<?php echo "<span class='continue-with__icon' data-url='".icons_url."facebook.svg'></span>";?>
						Facebook
					</button>
				</div>
			</div>
			<div class="user-operation__inner log-in">
				<h5>
					<?php echo $this->session->userdata('lng')["grs"]; ?>
				</h5>
				<form action="<?php echo base_url(); ?>giris/login" method="POST" class="col s12">
					<div class="input-field">
						<input id="kl" type="text" name="kl">
						<label for="kl">
							<?php echo $this->session->userdata('lng')["kllnc_adi"]; ?>
						</label>
					</div>
					<div class="input-field">
						<input id="ps"  name="ps" type="password">
						<label for="ps">
							<?php echo $this->session->userdata('lng')["sfre"]; ?>
						</label>
					</div>
					<a href="<?php echo base_url(); ?>giris/pass_remember">
						<?php echo $this->session->userdata('lng')["sfrmi_untm"]; ?>
					</a> <br>
					<p class="submit-paragraph">
						<button type="submit" class="btn waves-effect submit-button">
							<?php echo $this->session->userdata('lng')["grs"]; ?>
						</button>
					</p>
				</form>
			</div>
			<div class="user-operation__inner sign-up">
				<h5>
					<?php echo $this->session->userdata('lng')["kayt"]; ?>
				</h5>
				<form action="<?php echo base_url(); ?>giris/kayit_al" method="post" id="uye-ol" class="col s12">
					<div class="input-field">
						<input id="isim" name="isim" type="text" class="validate"> 
						<label for="isim">
							<?php echo $this->session->userdata('lng')["ism_sysm"]; ?>
						</label>
						<!--<span class="helper-text">6 ve 24 Karakter</span>-->
					</div>
					<div class="input-field">
						<input id="user-name"  name="kl" type="text" class="validate" style="text-transform: lowercase;">
						<label for="user-name">
							<?php echo $this->session->userdata('lng')["kllnc_adi"]; ?>
						</label>
						<!--<span class="helper-text">En Az 6 Karakter</span>-->
					</div>
					<div class="input-field">
						<input id="password"  name="ps" type="password" class="validate">
						<label for="password">
							<?php echo $this->session->userdata('lng')["sfre"]; ?>
						</label>
						<!--<span class="helper-text">6 ve 18 Karakter</span>-->
					</div>
					<div class="input-field">
						<input id="cfmPassword"  name="ps2" type="password" class="validate">
						<label for="cfmPassword">
							<?php echo $this->session->userdata('lng')["sfre_tkrr_gir"]; ?>
						</label>
					</div>
					<div class="input-field">
						<input id="mail" type="text"  name="em" class="validate">
						<label for="mail">
							<?php echo $this->session->userdata('lng')["email_slgn_label"]; ?>
						</label>
					</div>
					<p>
						<label>
							<input class="sozlesme" type="checkbox" />
							<span>
								<?php echo $this->session->userdata('lng')["szlsme_kbl"]; ?>
							</span>
						</label>
					</p>
					<p class="submit-paragraph">
						<button type="submit" id="submit-sign" class="btn disabled submit-button">
							<?php echo $this->session->userdata('lng')["kayt_ol_bslk"]; ?>
						</button>
					</p>
				</form>
			</div>

		</section>
	</div>
</main>
<?php $this->load->view('footer'); ?>



<!-- jQuery.js -->
<script src="<?php echo base_url(); ?>assets_user/js/jquery-3.4.1.min.js"></script>
<!-- materalize.js -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets_user/js/materialize.min.js"></script>
<script src="https://apis.google.com/js/platform.js?onload=onLoadGoogleCallback" async defer></script>
<script>
	function onLoadGoogleCallback(){
		gapi.load('auth2', function() {
			auth2 = gapi.auth2.init({
				client_id: '1097393470680-mdv8usp86rcvcqj0df6185g2rqu8hiti.apps.googleusercontent.com',
				cookiepolicy: 'single_host_origin',
				scope: 'profile'
			});

			auth2.attachClickHandler(document.querySelector('[data-logintype="google"]'), {},
				function(googleUser) {
					var profile = googleUser.getBasicProfile();

					window.flags.initSignIn({
						status: true,
						name_surname: profile.getName(),
						email: profile.getEmail(),
						login_type: 'google',
						id: profile.getId()
					});

				},
				function(error) {
					M.toast({html: error.error});
				});
		});

	}

</script>
<script>
	window.fbAsyncInit = function() {
		FB.init({
			appId	: '540581196709253',
			cookie	: true,
			xfbml	: true,
			version	: 'v4.0'
		});
		FB.AppEvents.logPageView();
	};
	(function(d, s, id){
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) {return;}
		js = d.createElement(s); js.id = id;
		js.src = "https://connect.facebook.net/en_US/sdk.js";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
</script>
<!-- function.js -->
<script src="<?php echo base_url(); ?>assets_user/js/function.js"></script>
</body>
</html>