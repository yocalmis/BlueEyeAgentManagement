<meta name="author" content="Back end: Yusuf Öcalmış, Front end: Muhammed Teuvajukov">

<?php if( $ayar ) : foreach( $ayar  as $dizi ) :?>
	<meta name="description" content="
	<?php 
	if($this->session->userdata('lng_turu')=="Eng"){ echo strip_tags($dizi["kisa_aciklama"]); }
	if($this->session->userdata('lng_turu')=="Tr"){echo strip_tags($dizi["kisa_aciklama_tr"]);}
	if($this->session->userdata('lng_turu')=="Ru"){ echo strip_tags($dizi["kisa_aciklama_ru"]);}	
	?>">
	<meta name="google-site-verification" content="Ntznq4vtKJfxUHqObo7B3dARMAPU7fo2FQG8BQ_bCA4" />
	<meta name="yandex-verification" content="691771445a0b9baf" />
	<meta name="keyword" content="<?php  echo strip_tags($dizi["seo_keywords"]);   ?>">
<?php endforeach;  endif; ?>

<meta name="msapplication-TileColor" content="#1A2B49"> 
<meta name="theme-color" content="#1A2B49">
<meta name="msapplication-navbutton-color" content="#1A2B49">
<meta name="apple-mobile-web-app-status-bar-style" content="#1A2B49"> 
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url(); ?>assets_user/img/favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url(); ?>assets_user/img/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>assets_user/img/favicon/favicon-16x16.png">
<link rel="manifest" href="<?php echo base_url(); ?>assets_user/img/favicon/site.webmanifest">
<script>

	var
	oncki_gun_secmzns 	= '<?php echo $this->session->userdata('lng')["oncki_gun_secmzns"]; ?>',
	onc_bas_t_sec 		= '<?php echo $this->session->userdata('lng')["onc_bas_t_sec"]; ?>',
	ltfn_yolcu_scnz 	= '<?php echo $this->session->userdata('lng')["ltfn_yolcu_scnz"]; ?>',
	a_18yaskck 			= '<?php echo $this->session->userdata('lng')["a_18yaskck"]; ?>',
	ltfn_kisi_dgru 		= '<?php echo $this->session->userdata('lng')["ltfn_kisi_dgru"]; ?>',
	ism_bos_olmz 		= '<?php echo $this->session->userdata('lng')["ism_bos_olmz"]; ?>',
	ism_kisa 			= '<?php echo $this->session->userdata('lng')["ism_kisa"]; ?>',
	ism_uzun			= '<?php echo $this->session->userdata('lng')["ism_uzun"]; ?>',
	kllnc_bos_olmz		= '<?php echo $this->session->userdata('lng')["kllnc_bos_olmz"]; ?>',
	kllnc_ad_kisa		= '<?php echo $this->session->userdata('lng')["kllnc_ad_kisa"]; ?>',
	kllnc_ad_uzun		= '<?php echo $this->session->userdata('lng')["kllnc_ad_uzun"]; ?>',
	sfre_bs_olmz		= '<?php echo $this->session->userdata('lng')["sfre_bs_olmz"]; ?>',
	sfre_ck_kisa		= '<?php echo $this->session->userdata('lng')["sfre_ck_kisa"]; ?>',
	sfre_ck_uzun		= '<?php echo $this->session->userdata('lng')["sfre_ck_uzun"]; ?>',
	sfre_ayni_dagel		= '<?php echo $this->session->userdata('lng')["sfre_ayni_dagel"]; ?>',
	ltfn_emal_adrs_dgru	= '<?php echo $this->session->userdata('lng')["ltfn_emal_adrs_dgru"]; ?>',
	bslk_gir			= '<?php echo $this->session->userdata('lng')["bslk_gir"]; ?>',
	brya_yazn			= '<?php echo $this->session->userdata('lng')["brya_yazn"]; ?>',
	yrm_ck_kisa			= '<?php echo $this->session->userdata('lng')["yrm_ck_kisa"]; ?>',
	ltfn_zyrtc_dldr		= '<?php echo $this->session->userdata('lng')["ltfn_zyrtc_dldr"]; ?>',
	ltfn_eksk_dldr		= '<?php echo $this->session->userdata('lng')["ltfn_eksk_dldr"]; ?>',
	tmm					= '<?php echo $this->session->userdata('lng')["tmm"]; ?>',
	eksik				= '<?php echo $this->session->userdata('lng')["eksk"]; ?>',
	yetiskin			= '<?php echo $this->session->userdata('lng')["ytskn"]; ?>',
	cocuk				= '<?php echo $this->session->userdata('lng')["cck"]; ?>',
	bebek				= '<?php echo $this->session->userdata('lng')["bbk"]; ?>';

	var is_babe;
	var iptalTarih = [];


	var datepicker_i18 = {
		cancel			: '<?php echo $this->session->userdata('lng')["kpt"]; ?>',
		clear			: '<?php echo $this->session->userdata('lng')["tmzl"]; ?>',
		done			: '<?php echo $this->session->userdata('lng')["tmm"]; ?>',
		months			: [
		'<?php echo $this->session->userdata('lng')["ocak"]; ?>', 
		'<?php echo $this->session->userdata('lng')["subat"]; ?>', 
		'<?php echo $this->session->userdata('lng')["mart"]; ?>', 
		'<?php echo $this->session->userdata('lng')["nisan"]; ?>', 
		'<?php echo $this->session->userdata('lng')["mayis"]; ?>', 
		'<?php echo $this->session->userdata('lng')["hzrn"]; ?>',
		'<?php echo $this->session->userdata('lng')["temmuz"]; ?>', 
		'<?php echo $this->session->userdata('lng')["agustos"]; ?>',
		'<?php echo $this->session->userdata('lng')["eylul"]; ?>',
		'<?php echo $this->session->userdata('lng')["ekim"]; ?>',
		'<?php echo $this->session->userdata('lng')["kasim"]; ?>',
		'<?php echo $this->session->userdata('lng')["arlk"]; ?>'
		],

		monthsShort		: [
		'<?php echo $this->session->userdata('lng')["ocak"]; ?>', 
		'<?php echo $this->session->userdata('lng')["subat"]; ?>', 
		'<?php echo $this->session->userdata('lng')["mart"]; ?>', 
		'<?php echo $this->session->userdata('lng')["nisan"]; ?>', 
		'<?php echo $this->session->userdata('lng')["mayis"]; ?>', 
		'<?php echo $this->session->userdata('lng')["hzrn"]; ?>',
		'<?php echo $this->session->userdata('lng')["temmuz"]; ?>', 
		'<?php echo $this->session->userdata('lng')["agustos"]; ?>',
		'<?php echo $this->session->userdata('lng')["eylul"]; ?>',
		'<?php echo $this->session->userdata('lng')["ekim"]; ?>',
		'<?php echo $this->session->userdata('lng')["kasim"]; ?>',
		'<?php echo $this->session->userdata('lng')["arlk"]; ?>'
		],

		weekdays		: [
		'<?php echo $this->session->userdata('lng')["pazar"]; ?>',
		'<?php echo $this->session->userdata('lng')["pazrts"]; ?>',
		'<?php echo $this->session->userdata('lng')["sali"]; ?>',
		'<?php echo $this->session->userdata('lng')["crsmb"]; ?>',
		'<?php echo $this->session->userdata('lng')["prsmb"]; ?>',
		'<?php echo $this->session->userdata('lng')["cuma"]; ?>',
		'<?php echo $this->session->userdata('lng')["cmrts"]; ?>'
		],
		
		weekdaysShort 	: [
		'<?php echo $this->session->userdata('lng')["pazar_kisa"]; ?>',
		'<?php echo $this->session->userdata('lng')["pazrts_kisa"]; ?>',
		'<?php echo $this->session->userdata('lng')["sali_kisa"]; ?>',
		'<?php echo $this->session->userdata('lng')["crsmb_kisa"]; ?>',
		'<?php echo $this->session->userdata('lng')["prsmb_kisa"]; ?>',
		'<?php echo $this->session->userdata('lng')["cuma_kisa"]; ?>',
		'<?php echo $this->session->userdata('lng')["cmrts_kisa"]; ?>'
		],
		
		weekdaysAbbrev	: <?php echo $this->session->userdata('lng')["gun_kisal"]; ?>
	};
	window.base_url = '<?php echo base_url(); ?>';
	window.i18n = {
		error: '<?php echo $this->session->userdata('lng')["window_error"]; ?>',
		cart: {
			code_not_correct: '<?php echo $this->session->userdata('lng')["card_code_not_correct"]; ?>',
			enter_correct_code: '<?php echo $this->session->userdata('lng')["card_code_enter_correct"]; ?>',
			same_lider_person: '<?php echo $this->session->userdata('lng')["lider_kisi_ayni"]; ?>'
		},
		rezerv: {
			enter_correct_card: '<?php echo $this->session->userdata('lng')["rez_enter_correct_card"]; ?>',
			cart_update_ok: '<?php echo $this->session->userdata('lng')["rez_cart_update_ok"]; ?>',
			cancellation_ok: '<?php echo $this->session->userdata('lng')["rez_cancellation_ok"]; ?>',
			change_date_ok: '<?php echo $this->session->userdata('lng')["rez_change_date_ok"]; ?>',
			post_comment_ok: '<?php echo $this->session->userdata('lng')["rez_post_comment_ok"]; ?>'
		}
	}
	window.userInfo = {
	    mail: "<?php echo $this->session->userdata('useronline'); ?>"
	}


</script>