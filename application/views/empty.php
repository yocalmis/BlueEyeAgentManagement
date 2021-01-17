<!DOCTYPE html>
<html lang="tr">
<head>
	<title>
		<?php if( $ayar ) : foreach( $ayar as $dizi ) : ?>	

			<?php echo strip_tags($dizi["kisa_aciklama".$uz]); ?>	

		<?php endforeach; endif; ?>
	</title>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<?php	if( $page_bilgi ) :  foreach( $page_bilgi  as $dizi ) :    ?>	
		<meta name="keywords" content="<?php echo strip_tags($dizi["anahtar"]);  ?>">
		<meta name="description" content="<?php echo strip_tags($dizi["kisa_aciklama"]); ?>">
	<?php 	 endforeach;  endif;  ?>	
	<?php if( $ayar ) : foreach( $ayar  as $dizi ) : ?>	
		<meta name="description" content="<?php echo strip_tags($dizi["kisa_aciklama"]); ?>">
		<meta name="keyword" content="<?php echo strip_tags($dizi["seo_keywords"]);  ?>">
	<?php endforeach; endif; ?>
	<?php $this->load->view('favicon'); ?>
	<!-- materialize.css -->
	<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets_user/css/materialize.min.css"  media="screen,projection"/>
	<!-- master.css -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets_user/css/master.css">

	<script src="https://api-maps.yandex.ru/2.1/?apikey=c940fe4d-b302-40d6-8684-4905c7261c4f&lang=tr_TR" type="text/javascript">
	</script>
</head>
<body class="nonf">
	<?php $this->load->view('header_alt'); ?>

	<main>
		<script>var getNav=document.querySelector("nav > .nav-wrapper:not(.main-menu)");window.screen.width<=768&&(getNav=document.querySelector("nav > .nav-wrapper")),getHeight=getNav.offsetHeight,document.querySelector("main").style.marginTop=getHeight+"px";</script>
		<div class="container">
			<?php if( $page_bilgi ) : foreach( $page_bilgi  as $dizi ) : ?>	

				<?php if(($page_name!="ortaklik-yonetimi") and ($page_name!="kariyer") and ($page_name!="hakkimizda")){ ?>
					<section class="same-page">
						<h4>
							<?php 
							if($this->session->userdata('lng_turu')=="Eng"){
								echo $dizi["baslik"]; 
							}
							if($this->session->userdata('lng_turu')=="Tr"){
								echo $dizi["baslik_tr"];
							}
							if($this->session->userdata('lng_turu')=="Ru"){
								echo $dizi["baslik_ru"];
							}
							?>
						</h4>
						<p>
							<?php 
							if($this->session->userdata('lng_turu')=="Eng"){
								echo $dizi["icerik"];
							}
							if($this->session->userdata('lng_turu')=="Tr"){
								echo $dizi["icerik_tr"];
							}
							if($this->session->userdata('lng_turu')=="Ru"){
								echo $dizi["icerik_ru"];
							}
							?>
						</p>
					</section>
				<?php } ?>


				<?php if($page_name=="kariyer"){ ?>

					<section class="welcome">
						<img src="<?php echo base_url() ?>/assets_user/img/career_res.jpg"alt="Let's Work together" class="welcome_image" />
						<div class="welcome-headline">
							<h3 class="welcome-headline__title">Welcome to a place where your ideas lead to something big. Welcome to Blue Eye.</h3>
							<p class="welcome-headline__description">Welcome to our global career website.</p>
							<button class="btn waves-effect blue darken-1 goto_findJobs">Find Jobs</button>

						</div>
					</section>

					<section class="where-we-are">
						<h4 class="where-we-are__title">We are everywhere in Turkey</h4>
						<p class="where-we-are__description">Our suppliers and workers all around Turkey are making customers feel safe and better about travelling in Turkey.</p>
						<div class="where-we-are__map google-map">
							<div id="map"></div>
						</div>
						<script type="text/javascript">
							ymaps.ready(init);
							function init(){ 
								var myMap = new ymaps.Map("map", {
									center: [39.056249, 35.302075],
									zoom: 6,
									controls: []
								});
								var istanbul = new ymaps.GeoObject({
									geometry: {
										type: "Point",
										coordinates: [41.011170, 28.978151]
									},
								},{
									preset: 'islands#redDotIcon',
									hintContent: 'İstanbul'
								}),
								nevsehir = new ymaps.GeoObject({
									geometry: {
										type: "Point",
										coordinates: [38.619774, 34.864173]
									},
									properties: {
										iconContent: 'Head Office',
									}
								}, {
									preset: 'islands#redStretchyIcon',
									hintContent: 'Kapadokya / Nevşehir'
								}),
								trabzon = new ymaps.GeoObject({
									geometry: {
										type: "Point",
										coordinates: [41.003522, 39.724158]
									},
								},{
									preset: 'islands#redDotIcon',
									hintContent: 'Trabzon'
								}),
								bursa = new ymaps.GeoObject({
									geometry: {
										type: "Point",
										coordinates: [40.184815, 29.063105]
									},
								},{
									preset: 'islands#redDotIcon',
									hintContent: 'Bursa'
								}),
								izmir = new ymaps.GeoObject({
									geometry: {
										type: "Point",
										coordinates: [38.428822, 27.134556]
									},
								},{
									preset: 'islands#redDotIcon',
									hintContent: 'İzmir'
								}),
								canakkale = new ymaps.GeoObject({
									geometry: {
										type: "Point",
										coordinates: [40.146221, 26.409023]
									}
								},{
									preset: 'islands#redDotIcon',
									hintContent: 'Çanakkale'
								}),
								sanliurfa = new ymaps.GeoObject({
									geometry: {
										type: "Point",
										coordinates: [37.160058, 38.792874]
									}
								},{
									preset: 'islands#redDotIcon',
									hintContent: 'Şanlıurfa'
								}),
								adiyaman = new ymaps.GeoObject({
									geometry: {
										type: "Point",
										coordinates: [37.763230, 38.277942]
									}
								},{
									preset: 'islands#redDotIcon',
									hintContent: 'Adıyaman'
								}),
								konya = new ymaps.GeoObject({
									geometry: {
										type: "Point",
										coordinates: [37.872888, 32.492252]
									}
								},{
									preset: 'islands#redDotIcon',
									hintContent: 'Konya'
								}),
								fethiye = new ymaps.GeoObject({
									geometry: {
										type: "Point",
										coordinates: [36.624869, 29.112952]
									}
								},{
									preset: 'islands#redDotIcon',
									hintContent: 'Fethiye'
								}),
								ankara = new ymaps.GeoObject({
									geometry: {
										type: "Point",
										coordinates: [39.920756, 32.854049]
									}
								},{
									preset: 'islands#redDotIcon',
									hintContent: 'Ankara'
								}),
								antalya = new ymaps.GeoObject({
									geometry: {
										type: "Point",
										coordinates: [36.887084, 30.703267]
									}
								},{
									preset: 'islands#redDotIcon',
									hintContent: 'Antalya'
								});
								myMap.geoObjects.add(nevsehir)
								.add(istanbul)
								.add(trabzon)
								.add(bursa)
								.add(izmir)
								.add(canakkale)
								.add(sanliurfa)
								.add(adiyaman)
								.add(konya)
								.add(fethiye)
								.add(ankara)
								.add(antalya)
							}
						</script>
					</section>

					<section class="ovunme">
						<img src="https://assets.bosch.com/media/global/career/bosch-career-for-students_res_1600x900.jpg" alt="Eğv Eğv" class="ovunme__image" />
						<div class="ovunme-text right">
							<h4 class="ovunme__title">Let’s be remarkable.</h4>
							<p class="ovunme__desc">Now travel is easier and convenient on all over the world.  At Blue Eye Tour, we turn these visions into reality to improve the quality of travel for people who wants to visit Turkey. Start something big and become a part of forward thinkers where you can make something remarkable: make it for travel life.</p>
						</div>
					</section>
					<section class="ovunme">
						<div class="ovunme-text left">
							<h4 class="ovunme__title">Our workplace is the entire Turkey.</h4>
							<p class="ovunme__desc">Blue Eye Tour is a big tour company in Turkey. Our tours and events are in use everywhere in Turkey. We are thus able to adapt to customer needs — without losing sight of the big picture. Be a part of our international network and profit from the diverse opportunities of a global employer.</p>
						</div>
						<img src="https://assets.bosch.com/media/global/career/bosch-career-for-students_res_1600x900.jpg" alt="Eğv Eğv" class="ovunme__image" />
					</section>

					<section class="specification">
						<h4 class="specification__title center-align">Tailor-made programs, diverse perspectives</h4>
						<div class="for-who">
							<div class="for-who_inner people_type">
								<span class="people_type__icon" data-url="<?php echo icons_url; ?>student.svg"></span>
								<h6 class="people_type__title">For pupils</h6>
								<p class="people_type__description"><b>On the way to a remarkable future.</b> You are about to create your first concrete plans concerning your professional future? At Blue Eye Tour, we offer you many different working fields and career paths — and we provide individual possibilities to enable you to turn your passion into real innovations. Why don’t you try it out during an internship or begin an apprenticeship with us after you have finished school?</p>
							</div>
							<div class="for-who_inner people_type">
								<span class="people_type__icon" data-url="<?php echo icons_url; ?>graduated.svg"></span>
								<h6 class="people_type__title">For graduates</h6>
								<p class="people_type__description"><b>Lay the foundation of tomorrow.</b> You might not know how, but one thing is for sure: You want to shape the future with your ideas. At Blue Eye Tour, you have the chance to gain deep insights into different working fields already during your studies. Join us for an internship, as a working student and realize great innovations with us.</p>
							</div>
							<div class="for-who_inner people_type">
								<span class="people_type__icon" data-url="<?php echo icons_url; ?>manager.svg"></span>
								<h6 class="people_type__title">For professionals</h6>
								<p class="people_type__description"><b>Start your career with us.</b> You’ve successfully completed your degree and are now looking for a challenging entry position that offers good prospects worldwide? With our Junior Managers Program, you learn to lead projects or teams to success. </p>
							</div>
						</div>
					</section>
					<section class="apply-job" id="find-jobs">
						<h4 class="apply-job__title">Apply now</h4>
						<p class="apply-job__desc">Choose a country to find all current job offers, along with a personal contact for your recruitment support.</p>
						<form action="<?php echo base_url(); ?>pages/kariyeral" method="post" enctype="multipart/form-data" class="apply-job__form">
							<div class="person-info__image person-row">
								<p class="person-row__desc">Photo: </p>

								<div class="file-field input-field">
									<div class="btn file-field__btn">
										<span>File</span>
										<input type="file" name="ft">
									</div>
									<div class="file-path-wrapper">
										<input class="file-path" type="text" disabled="true">
									</div>
								</div>

							</div>
							<div class="person-info__name person-row">
								<p class="person-row__desc">Name and Surname*: </p>

								<div class="input-field">
									<input type="text" name="name_surname" required="true">
								</div>

							</div>
							<div class="person-info__email person-row">
								<p class="person-row__desc">Email*: </p>

								<div class="input-field">
									<input type="email" name="email" required="true">
								</div>

							</div>
							<div class="person-info__address person-row">
								<p class="person-row__desc">Location*: </p>

								<div class="input-field">
									<input type="text" name="address" required="true">
								</div>

							</div>
							<div class="person-info__phone person-row">
								<p class="person-row__desc">Phone*: </p>

								<div class="input-field">
									<input type="tel" name="phone" required="true">
								</div>

							</div>
							<p class="divider"></p>
							<h5 class="person-info__expirence">Expirence <a href="#addExpirence" role="button" class="addExpirence right small-text modal-trigger">Add</a></h5>
							<div class="expirence">
								<input type="hidden" name="hiddenExpLength">
							</div>
							<p class="divider"></p>
							<h5 class="person-info__expirence">Education <a href="#addEducation" role="button" class="addEducation right small-text modal-trigger">Add</a></h5>
							<div class="education">
								<input type="hidden" name="hiddenEduLength">
							</div>
							<p class="divider"></p>
							<div class="on-the-web">
								<div class="person-info__linkdln person-row">
									<p class="person-row__desc">LinkedIn: </p>

									<div class="input-field">
										<input type="text" name="linkdln">
									</div>

								</div>
								<div class="person-info__Facebook	 person-row">
									<p class="person-row__desc">Facebook: </p>

									<div class="input-field">
										<input type="text" name="facebook">
									</div>

								</div>
								<div class="person-info__twitter person-row">
									<p class="person-row__desc">Twitter: </p>

									<div class="input-field">
										<input type="text" name="twitter">
									</div>

								</div>
								<div class="person-info__web person-row">
									<p class="person-row__desc">Website: </p>

									<div class="input-field">
										<input type="text" name="web">
									</div>

								</div>
								<p class="divider"></p>
								<h5 class="person-info__expirence">Resume</h5>
								<div class="file-field  input-field">
									<div class="btn file-field__btn">
										<span>Resume</span>
										<input type="file"  name="rs">
									</div>
									<div class="file-path-wrapper">
										<input class="file-path validate" type="text">
									</div>
								</div>
								<p class="divider"></p>
								<h5 class="person-info__expirence">Message to Hiring Manager</h5>
								<div class="person-info__message">
									<p>Let the company know about your interest working there: </p>

									<div class="input-field">
										<textarea id="mesage" name="message" class="materialize-textarea"></textarea>
									</div>

								</div>
								<div class="person-info__message">
									<input type="submit" value="Send" class="btn blue darken-1 right">

								</div>


							</div>
						</form>
					</section>

					<div id="addExpirence" class="modal modal-fixed-footer">
						<div class="modal-header sticky-modal-header">
							<h4>Add Expirence</h4>
						</div>
						<div class="modal-inner modal-content">
							<div class="add-expirence">

								<div class="input-field">
									<input id="title" type="text" name="title" class="add-expirence__title">
									<label for="title">Title</label>
								</div>
								<div class="input-field">
									<input id="company" type="text" name="company" class="add-expirence__company">
									<label for="company">Company</label>
								</div>
								<div class="input-field">
									<input id="location" type="text" name="location" class="add-expirence__location">
									<label for="location">Location</label>
								</div>
								<div class="input-field">
									<textarea id="description" class="materialize-textarea add-expirence__description"></textarea>
									<label for="description">Description</label>
								</div>
								<div class="row">
									<div class="input-field col s6">
										<input id="exp_start_date" type="text" name="exp_start_date" class="add-expirence__exp_start_date datepicker">
										<label for="exp_start_date">Start Date</label>
									</div>
									<div class="input-field col s6">
										<input id="exp_end_date" type="text" name="exp_end_date" class="add-expirence__exp_end_date datepicker">
										<label for="exp_end_date">End Date</label>
									</div>

								</div>
								<label>
									<input type="checkbox" class="filled-in add-expirence__exp_currently" />
									<span class="right">I currently attend</span>
								</label>
							</div>
						</div>
						<div class="modal-ops modal-footer">
							<a class="btn modal-close close-btn">
								<?php 
								echo $this->session->userdata('lng')["kpt"]; 
								?> 
							</a>
							<a class="btn addExperience__btn">
								<?php 
								echo $this->session->userdata('lng')["tmm"]; 
								?> 
							</a>
						</div>
					</div>
					<div id="addEducation" class="modal modal-fixed-footer">
						<div class="modal-header sticky-modal-header">
							<h4>Add Education</h4>
						</div>
						<div class="modal-inner modal-content">
							<div class="add-expirence">

								<div class="input-field">
									<input id="institute" type="text" name="institute" class="add-education__institute">
									<label for="institute">Institution</label>
								</div>
								<div class="input-field">
									<input id="major" type="text" name="major" class="add-education__major">
									<label for="major">Major</label>
								</div>
								<div class="input-field">
									<input id="degree" type="text" name="degree" class="add-education__degree">
									<label for="degree">Degree</label>
								</div>
								<div class="input-field">
									<input id="edu_address" type="text" name="edu_address" class="add-education__location">
									<label for="edu_address">Location</label>
								</div>
								<div class="input-field">
									<textarea id="edu_description" class="materialize-textarea add-education__description"></textarea>
									<label for="edu_description">Description</label>
								</div>
								<div class="row">
									<div class="input-field col s6">
										<input id="education_start_date" type="text" name="education_start_date" class="add-education__start_date datepicker">
										<label for="education_start_date">From</label>
									</div>
									<div class="input-field col s6">
										<input id="education_end_date" type="text" name="education_end_date" class="add-education__end_date datepicker">
										<label for="education_end_date">To</label>
									</div>

								</div>
								<label>
									<input type="checkbox" class="filled-in add-education__currently" />
									<span class="right">I currently attend</span>
								</label>
							</div>
						</div>
						<div class="modal-ops modal-footer">
							<a class="btn modal-close close-btn">
								<?php 
								echo $this->session->userdata('lng')["kpt"]; 
								?> 
							</a>
							<a class="btn addEducation__btn">
								<?php 
								echo $this->session->userdata('lng')["tmm"]; 
								?> 
							</a>
						</div>
					</div>

				<?php } ?>	
				<?php if($page_name=="hakkimizda"){ ?>
					<div class="about">
						<img src="<?php echo base_url(); ?>/assets_user/img/turist.jpg" alt="Women and girl turists" class="about__image">
						<h3 class="about__title">We help you to explore Turkey</h3>
					</div>
					<div class="about-ours">
						<div class="about-misson about-ours__inner">
							<img src="<?php echo base_url() ?>assets_user/img/mission.jpg" alt="Missons image" class="about-ours__image">
							<div class="about-ours-text">
								<h4 class="about-ours__title">Our Mission</h4>
								<p class="about-ours__description">Our mission is to show Turkey's natural beauty and histories to the whole world with the best tours and events.</p>
							</div>
						</div>
						<div class="about-story about-ours__inner">
							<div class="about-ours-text">
								<h4 class="about-ours__title">Our Story</h4>
								<p class="about-ours__description">Our company was established in the 2015 Blue Eye Tour. And after doing research in Turkey, he began to deal with tour agents. He expanded the tour and events inventory on his site and reached his current position. Blue Eye Tour also made agreements with international tours and events sites.</p>
							</div>
							<img src="<?php echo base_url() ?>assets_user/img/story.gif" alt="Missons image" class="about-ours__image">
						</div>
					</div>
					<div class="abot-map">
						<div id="map"></div>
					</div>
					<script type="text/javascript">
						ymaps.ready(init);
						function init(){ 
							var myMap = new ymaps.Map("map", {
								center: [39.056249, 35.302075],
								zoom: 6,
								controls: []
							});
							var istanbul = new ymaps.GeoObject({
								geometry: {
									type: "Point",
									coordinates: [41.011170, 28.978151]
								},
							},{
								preset: 'islands#redDotIcon',
								hintContent: 'İstanbul'
							}),
							nevsehir = new ymaps.GeoObject({
								geometry: {
									type: "Point",
									coordinates: [38.619774, 34.864173]
								},
								properties: {
									iconContent: 'Head Office',
								}
							}, {
								preset: 'islands#redStretchyIcon',
								hintContent: 'Kapadokya / Nevşehir'
							}),
							trabzon = new ymaps.GeoObject({
								geometry: {
									type: "Point",
									coordinates: [41.003522, 39.724158]
								},
							},{
								preset: 'islands#redDotIcon',
								hintContent: 'Trabzon'
							}),
							bursa = new ymaps.GeoObject({
								geometry: {
									type: "Point",
									coordinates: [40.184815, 29.063105]
								},
							},{
								preset: 'islands#redDotIcon',
								hintContent: 'Bursa'
							}),
							izmir = new ymaps.GeoObject({
								geometry: {
									type: "Point",
									coordinates: [38.428822, 27.134556]
								},
							},{
								preset: 'islands#redDotIcon',
								hintContent: 'İzmir'
							}),
							canakkale = new ymaps.GeoObject({
								geometry: {
									type: "Point",
									coordinates: [40.146221, 26.409023]
								}
							},{
								preset: 'islands#redDotIcon',
								hintContent: 'Çanakkale'
							}),
							sanliurfa = new ymaps.GeoObject({
								geometry: {
									type: "Point",
									coordinates: [37.160058, 38.792874]
								}
							},{
								preset: 'islands#redDotIcon',
								hintContent: 'Şanlıurfa'
							}),
							adiyaman = new ymaps.GeoObject({
								geometry: {
									type: "Point",
									coordinates: [37.763230, 38.277942]
								}
							},{
								preset: 'islands#redDotIcon',
								hintContent: 'Adıyaman'
							}),
							konya = new ymaps.GeoObject({
								geometry: {
									type: "Point",
									coordinates: [37.872888, 32.492252]
								}
							},{
								preset: 'islands#redDotIcon',
								hintContent: 'Konya'
							}),
							fethiye = new ymaps.GeoObject({
								geometry: {
									type: "Point",
									coordinates: [36.624869, 29.112952]
								}
							},{
								preset: 'islands#redDotIcon',
								hintContent: 'Fethiye'
							}),
							ankara = new ymaps.GeoObject({
								geometry: {
									type: "Point",
									coordinates: [39.920756, 32.854049]
								}
							},{
								preset: 'islands#redDotIcon',
								hintContent: 'Ankara'
							}),
							antalya = new ymaps.GeoObject({
								geometry: {
									type: "Point",
									coordinates: [36.887084, 30.703267]
								}
							},{
								preset: 'islands#redDotIcon',
								hintContent: 'Antalya'
							});
							myMap.geoObjects.add(nevsehir)
							.add(istanbul)
							.add(trabzon)
							.add(bursa)
							.add(izmir)
							.add(canakkale)
							.add(sanliurfa)
							.add(adiyaman)
							.add(konya)
							.add(fethiye)
							.add(ankara)
							.add(antalya)
						}
					</script>
				<?php } ?>
				<?php if($page_name=="ortaklik-yonetimi"){ ?>
					<section class="supplier">
						<div class="supplier__Container">
							<h4>
								<?php 
								echo $this->session->userdata('lng')["tdrk_yntm"];
								?>

							</h4>
							<form action="<?php echo base_url(); ?>pages/formal" method="POST" class="supplier__Form">
								<div class="input-field">
									<input type="text" id="sirket_name" name="sirket_name" required>
									<label for="sirket_name"><?php echo $this->session->userdata('lng')["sirkt_isim"]; ?></label>
								</div>
								<div class="input-field">
									<input type="text" id="acenta_unvan" name="acenta_unvan" required>
									<label for="acenta_unvan"><?php echo $this->session->userdata('lng')["acente_unvan"]; ?></label>
								</div>
								<div class="input-field">
									<input type="text" id="tursab_no" name="tursab_no" required>
									<label for="tursab_no"><?php echo $this->session->userdata('lng')["tursab_no"]; ?></label>
								</div>
								<div class="input-field">
									<input type="text" id="yetkili_isim" name="yetkili_isim" required>
									<label for="yetkili_isim"><?php echo $this->session->userdata('lng')["yetksili_isim"]; ?></label>
								</div>

								<div class="input-field">
									<input type="text" id="email" name="email" required>
									<label for="email"><?php echo $this->session->userdata('lng')["email"]; ?></label>
								</div>
								<div class="input-field">
									<input type="text" id="sirket_adres" name="sirket_adres" required>
									<label for="sirket_adres"><?php echo $this->session->userdata('lng')["sirket_adres"]; ?></label>
								</div>
								<div class="input-field">
									<input type="text" id="sirket_adres" name="sirket_sehir" required>
									<label for="sirket_adres"><?php echo $this->session->userdata('lng')["sirket_sehir"]; ?></label>
								</div>
								<div class="input-field">
									<input type="number" id="sirket_posta_no" name="sirket_posta_no" required>
									<label for="sirket_posta_no"><?php echo $this->session->userdata('lng')["sirket_posta"]; ?></label>
								</div>

								<div class="input-field">
									<input type="number" id="tel_no" name="tel_no" required>
									<label for="tel_no"><?php echo $this->session->userdata('lng')["sirket_tlfn"]; ?></label>
								</div>
								<div class="input-field">
									<input type="number" id="cep_no" name="cep_no" required>
									<label for="cep_no"><?php echo $this->session->userdata('lng')["sirket_cep_tlfn"]; ?></label>
								</div>
								<div class="input-field">
									<input type="text" id="sirket_website" name="sirket_website" required>
									<label for="sirket_website"><?php echo $this->session->userdata('lng')["sirket_web_site"]; ?></label>
								</div>
								<p>
									<label>
										<input class="supplier_gonder" type="checkbox" />
										<span>
											<?php echo $this->session->userdata('lng')["szlsme_kbl"]; ?>
										</span>
									</label>
								</p>
								<p class="submit-paragraph">
									<button type="submit" id="submit-supplier" class="btn-large disabled submit-button waves-effect">
										<?php echo $this->session->userdata('lng')["gndr_btn"]; ?>
									</button>
								</p>
							</form>

						</div>
					</section>


				<?php  } ?>		





			<?php endforeach; endif; ?>
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