window.validateEmail = function (email) {
	var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	return re.test(String(email).toLowerCase());
}
window.validateNameSurname = function (string) {
	var re = /^[a-zA-ZİıŞşĞğÜüÇçÖö ,.'-]+$/u;
	return re.test(String(string).toLowerCase());
}
window.validatePassword = function (string) {
	var re = /^.{6,18}$/;
	return re.test(String(string).toLowerCase());
}
Date.prototype.addDays = function(days) {
	var date = new Date(this.valueOf());
	date.setDate(date.getDate() + days);
	return date;
}
window.printDiv = el => {
	let element = document.querySelector(el);
	let printWindow = window.open('','Print-Window');
	let link = '<link rel="stylesheet" type="text/css" href="' + window.base_url + 'assets_user/css/print.css">'
	printWindow.document.open();
	printWindow.document.write('<html>' + link + '<body onload="window.print()">'+element.innerHTML+'</body></html>');
	printWindow.document.close();
	window.onafterprint = function(){
		printWindow.close();
	}
	setTimeout(() => printWindow.close(),10);
}
$.fn.showmore = function() {
		// Show More Event
		var elemName	= $(this).find('.show-more-item'),
		btnName		= $(this).find('.show-more'),
		windowW		= $(window).width(),
		howItems 	= $(this).find('.show-more-item').length;


		if (windowW > 0 && windowW <= 768) {
			n = 4;
		}
		if (windowW > 768 && windowW <= 991) {
			n = 5;
		}
		if (windowW > 991 ) {
			n = 11;
		}


		$(elemName).slice(n++).hide();

		$(btnName).on('click', function() {

			console.log(n);
			//var checkLast = $(this).last().css('display') == 'none';
			var checkLast = $(elemName).last().css('display') == 'none';

			//$( ".show-more:contains('Daha Az Göster')" ).text( "Daha Fazla Göster" );
			//$(this).is(':contains("Daha Az Göster")').text( 'Daha Fazla Göster' );

			if($(btnName).is(':contains("Daha Az Göster")')) {
				$(btnName).text( 'Daha Fazla Göster' );
			} else{
				$(btnName).text( 'Daha Fazla Göster' );
			}
			
			if ( checkLast == true ) {

				$(elemName).hide();


				if (windowW > 0 && windowW <= 768) {
					n = n + 3;
				}

				if (windowW > 768 && windowW <= 991) {
					n = n + 6;
				}

				if (windowW > 991 ) {
					n = n + 12;
				}

				if ( n > howItems ){
					$(btnName).text('Daha Az Göster');
				}

				$(elemName).show();

				$(elemName).slice(n++).hide();

			}

			else {

				if (windowW > 0 && windowW <= 768) {
					var n = 3;
				}
				if (windowW > 768 && windowW <= 991) {
					var n = 5;
				}
				if (windowW > 991 ) {
					var n = 11;
				}

				$(elemName).slice(n++).hide();

			}
		});
	};

	$.fn.stickynav = function ( options ){

		var	
		nav			= $(this),
		navHeight	= nav.height(),
		windowN		= $(window);

		function scrollEvent() {

			var scrollTop = windowN.scrollTop();

			if (scrollTop == 0) {
				nav.removeClass('sticky');
			}

			if (scrollTop > navHeight / 2) {

				setTimeout(function (){
					nav.addClass('sticky');
				});

			}
			else {
				nav.removeClass('sticky');

			}
		};
		scrollEvent();
		windowN.scroll(function() {
			scrollEvent();
		});
	}

	$.fn.equalheight = function (){
		var maxHeight 	= 0,
		element 	= $(this),
		resizeTimer;


		var equal = function () {
			$(element).each(function() {
				if (element.height() > maxHeight) { maxHeight = element.height(); }
			});
			element.height(maxHeight);
		}
		equal();
    // == > For Responsive
    $(window).on('resize', function(e) {
    	clearTimeout(resizeTimer);
    	resizeTimer = setTimeout(function() {
    		maxHeight = 0;
    		element.height(null);
    		element.css('height', 'auto');
    		equal();
    	}, 250);
    });
}


$(document).ready(function(){
	$('.howMuchCheck--number').text(Math.floor(Math.random() * 10) + 2  )
	$('p:not(".divider")').each(function() {
		if ($(this).text() == ''){
			$(this).remove();
		}
	});
	$('.sidenav').sidenav({
		draggable: false,
	});
	$('.dropdown-trigger').dropdown();
	$('.carousel').carousel({
		dist: 0,
		shift: 15,
		numVisible: 6,
	});
	setInterval(function() {
		$('.carousel').carousel('next')
	}, 1500)
	function stringToNumber(str) {
		return (Array.isArray(str)) ? str.map(a => parseFloat(a)) :
		parseFloat(str)
	} 
	$('.modal').modal({
		onOpenEnd: function(el){
			if (($(window).width() < 602) && ($(el).hasClass('modal--centered'))) {
				$(el).css({
					'transform': 'scaleX(1) scaleY(1) translateY(-50%)'
				});			
			}
			let $modalId = $(`#${$(this).attr('id')}`),
			$stickyHeader = $modalId.find('.sticky-modal-header'),
			stickyHeaderPaddings = stringToNumber([$stickyHeader.css('padding-top'), $stickyHeader.css('padding-bottom')]),
			stickyHeaderHeight = stickyHeaderPaddings.reduce((acc, item) => {
				return acc + item;
			}, $stickyHeader.height());

			$modalId.find('.modal-content').css({
				'top': `${stickyHeaderHeight}px`,
				'bottom': $modalId.find('.modal-ops.modal-footer').height() + 8 + 'px',
			});
		}
	});
	$('.tooltipped').tooltip({
		position: 'left'
	});
	$('.parallax').parallax();
	$('.tabs').tabs();
	$('select').formSelect();
	$('.rezerv, header, .top-places, i, .cl-t-f, .filters, .prdcs-i, .smmr-i, .collapsible-header, label, img').addClass('noselect');
	$('i').addClass('material-icons');
	//$('.show-more-container').showmore();
	$('nav').stickynav();
	$('.btn, .modal-trigger').addClass('waves-effect');
	$('#mobile-language').find('.nav-close').on('click', function() {
		$('.sidenav-overlay').eq(1).click();
		$('body').css('overflow', 'hidden');
	});
	$('#mobile-currencies').find('.nav-close').on('click', function() {
		$('.sidenav-overlay').eq(2).click();
		$('body').css('overflow', 'hidden');
	});
	$('.collapsible').collapsible();
	/*setTimeout(function() {
		$('.other-main').equalheight();

	}, 500);**/
	$('.cl-t-f').css('padding-top', $('.cl-p-d').height() + 10);
	var 
	today 		= new Date(),
	dd 			= today.getDate(),
	yesterday 	= dd - 2,
	mm 			= today.getMonth() + 1,
	yyyy 		= today.getFullYear(),
	yesterdayDate;

	var farkli_tur = $('#ayni_gun_engel').val();

	if (farkli_tur == 1) {
		var yarn = new Date();
		yarn.setDate(today.getDate()+1);
	}


	if (dd < 10) {
		dd = '0' + dd;
	} 
	
	if (mm < 10) {
		mm = '0' + mm;
	} 
	today = mm + '/' + dd + '/' + yyyy;
	yesterdayDate = mm + '/' + yesterday + '/' + yyyy;

	if (farkli_tur == 1) {
		var minDate = new Date(yarn);
	}
	else {
		var minDate = new Date(mm + '/' + dd + '/' + yyyy);
		
	}

	
	function disableDates(iptalTarih) {
		for (var i = 0; i < iptalTarih.length; i++) {
			var 
			fullDisabledDate	= new Date(iptalTarih[i]),
			getDisabledMonth	= fullDisabledDate.getMonth(),
			getDisabledDay		= fullDisabledDate.getDate(),
			getDisabledYear		= fullDisabledDate.getFullYear();

			$('.datepicker-modal.open').find('button.datepicker-day-button[data-year="'+getDisabledYear+'"][data-month="'+getDisabledMonth+'"][data-day="'+getDisabledDay+'"]').parent('td').addClass('is-disabled');

		}
	}


	function onOpenTime() {


		setTimeout(function() {

			disableDates(iptalTarih);

			var dMap = new Map();
			var 
			dropLength 	= $('.modal.open').find('.dropdown-trigger').length,
			tur_turu 	= $('input[name*="tur_turu"]').val(),
			bas_t 		= $('input[name*="bas_t"]'),
			bit_t 		= $('input[name*="bit_t"]');

			for (var i = 0; i < dropLength; i++) {

				var dateNumber	= $('.modal.open').find('.dropdown-trigger').eq(i).data('target');

				dMap.set(i, dateNumber);

			}

			var getVal = [...dMap.values()];

			for (var i = 0; i < dropLength; i++) {
				$('#' + getVal[i]).css('position', 'fixed');
			}
			if (tur_turu == 'surekli') {
				$('.datepicker-done').on('click', function() {
					var 
					dateVal			= $('.datepicker').val(),
					check_tarih		= $('td').attr('aria-selected') == 'true',
					labelText 		= $('label[for=persons]').hasClass('active');

					bas_t.val(dateVal);
					bit_t.val(dateVal);

					if ( (labelText == true) && (dateVal != '') ){
						$('.spt_ekl').removeClass('disabled');
					} 
					else {
						$('.spt_ekl').addClass('disabled');
					}

				});
			}



		}, 300);
	}



	var standartDatepickersSettings = {
		showClearBtn	: false,
		format			: 'mm/dd/yyyy',
		defaultDate 	: today,
		setDefaultDate	: true,
		firstDay		: 1,
		yearRange		: [yyyy, yyyy + 5],
		container		: 'main',
		minDate			: minDate,
		i18n			: datepicker_i18,
		onOpen			: function() {onOpenTime()},
		onDraw			: function() {disableDates(iptalTarih);}
	}

	$('.datepicker').datepicker(standartDatepickersSettings);
	var withOutMinDate = $.extend(standartDatepickersSettings, {
		defaultDate: null,
		minDate: null,
		yearRange: [yyyy - 20, yyyy],
		setDefaultDate: false
	}); 
	$('#exp_start_date, #exp_end_date, #education_start_date, #education_end_date').datepicker(withOutMinDate);

	var getStartDate = (start_date) => {
		var getMinTime 	= new Date(start_date),
		dd 			= getMinTime.getDate(),
		yesterday 	= dd + 1,
		mm 			= getMinTime.getMonth() + 1,
		yyyy 		= getMinTime.getFullYear(),
		yesterdayDate;

		if (dd < 10) {
			dd = '0' + dd;
		} 
		if (mm < 10) {
			mm = '0' + mm;
		}
		yesterdayDate = new Date(mm + '/' + yesterday + '/' + yyyy);
		return yesterdayDate;

	}


	if ($(window).width() <= 768) {
		var wHeight 		= $(window).height();
		mHeight 		= 274,
		getPercentage 	= (wHeight - mHeight),
		allowPercentage	= getPercentage/2 + 'px';
	}
	else{
		var allowPercentage = '10%';
	}
	$('#select-count-personel').modal({
		endingTop: allowPercentage,
	});

	

	$('.drag-target').remove();



	$('.other-main, .best-choose-inner, .main-city-inner, .s-b-c-i, .top-places-inner__div, .top-countries-item').find("a:first").css({
		'position'	:	'absolute',
		'top'		:	'0',
		'right'		:	'0',
		'bottom'	:	'0',
		'left'		:	'0',
		'z-index'	:	'1',
		'width'		:	'100%',
		'height'	:	'100%'
	});


	$( "i:contains('close')" ).addClass('red-text').addClass('text-darken-4');
	$( "i:contains('done')" ).addClass('green-text').addClass('text-darken-4');
	$( "i:contains('exit_to_app')" ).not('.user-view__exit--icon').addClass('green-text').addClass('text-darken-4').css('transform', 'rotate(-180deg)');

	



	$('.user-age-counter').each(function() {
		var 
		isYetiskin = $(this).hasClass('user-yetiskin'),
		isCocuk = $(this).hasClass('user-cocuk'),
		isBebek = $(this).hasClass('user-bebek');

		$(this).children('.plus-user').on('click', function() {
			var getNumber = Number($(this).siblings('input').val());
			getNumber = getNumber + 1;

			if (getNumber >= 99) {
				getNumber = 99;
			}

			$(this).siblings('input').val(getNumber);


		});
		$(this).children('.minus-user').on('click', function() {
			var getNumber = Number($(this).siblings('input').val());
			getNumber = getNumber - 1;
			if ( (getNumber <= 0) ) {
				getNumber = 0;
			}
			$(this).siblings('input').val(getNumber);

			
		});
	});


	var 
	arrow_forward = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="none" d="M0 0h24v24H0V0z"/><path d="M5 13h11.17l-4.88 4.88c-.39.39-.39 1.03 0 1.42.39.39 1.02.39 1.41 0l6.59-6.59c.39-.39.39-1.02 0-1.41l-6.58-6.6c-.39-.39-1.02-.39-1.41 0-.39.39-.39 1.02 0 1.41L16.17 11H5c-.55 0-1 .45-1 1s.45 1 1 1z"/></svg>',
	arrow_back = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="none" d="M0 0h24v24H0V0z"/><path d="M19 11H7.83l4.88-4.88c.39-.39.39-1.03 0-1.42-.39-.39-1.02-.39-1.41 0l-6.59 6.59c-.39.39-.39 1.02 0 1.41l6.59 6.59c.39.39 1.02.39 1.41 0 .39-.39.39-1.02 0-1.41L7.83 13H19c.55 0 1-.45 1-1s-.45-1-1-1z"/></svg>';


	$('.t-e-r').find('.t-e__icon').html(arrow_forward);
	$('.t-e-l').find('.t-e__icon').html(arrow_forward);



	$('.dropdown-trigger').on('click', function () {
		var zxDrop = $(this).siblings('.dropdown-content').css('z-index');
		$(this).parent().append('<div class="dr_c_d"></div>');
		$('.dr_c_d').css('z-index', zxDrop - 1);
		$('.dropdown-content > li, .dr_c_d').on('click', function () {
			$('.dr_c_d').remove();
		});
	});

	var ab_i_h = $('.cl-t-h').height();
	$('.cl-t-f:not(:first)').css({
		'display' 	: 'block',
		'height'	: ab_i_h + 27,
		'overflow'	: 'hidden',
	});



	$('.cl-t-f').on('click', function() {
		$('.cl-t-f').css({
			'display' 	: 'block',
			'height'	: ab_i_h + 27,
			'overflow'	: 'hidden',
		});
		$(this).css({
			'display'	: 'flex',
			'height'	: 'auto',
			'overflow'	: 'auto',
		});

	});

	$('.l-g_c-s').css('margin-left', $('.l-g_c-s').height() + 6*2);

	$(".sozlesme").on('click', function() {
		$('#submit-sign').toggleClass('disabled');
		$('#ch_ps').toggleClass('disabled');
	});

	
	function total_fiyat() {

		const 
		yetKisiAdeti 	= new Map(),
		yetTekFiyat 	= new Map(),
		cckKisiAdeti 	= new Map(),
		cckTekFiyat 	= new Map(),
		bbkKisiAdeti	= new Map(),
		bbkTekFiyat		= new Map(),
		yetEskiFiyat 	= new Map(),
		cckEskiFiyat 	= new Map(),
		bbkEskiFiyat 	= new Map();

		var 
		modulName 	= $('.cl-t-f '),
		dropLength 	= modulName.length;


		for (var i = 0; i < dropLength; i++) {



			var 
			dropLength__modul		= $('.icerik_'+i).length,
			yetiskin_fiyat_adet 	= modulName.eq(i).find('.yt_k_s').text(),
			cocuk_adet 				= modulName.eq(i).find('.ck_k_s').text(),
			bebek_adet 				= modulName.eq(i).find('.bk_k_s').text(),
			yetiskin_tek_fiyat 		= modulName.eq(i).find('.yt_k_f').val(),
			cocuk_tek_fiyat 		= modulName.eq(i).find('.ck_k_f').val(),
			bebek_tek_fiyat			= modulName.eq(i).find('.bk_k_f').val(),
			yetiskin_eski_fiyat 	= modulName.eq(i).find('#yet_eski_fiyat').val(),
			cocuk_eski_fiyat 		= modulName.eq(i).find('#cck_eski_fiyat').val(),
			bebek_eski_fiyat 		= modulName.eq(i).find('#bbk_eski_fiyat').val();



			for (var a = 0; a <= dropLength__modul; a++) {

				var
				bas_fyt						= Number($('.icerik_'+i+"_"+a).children('.fiyat_aralik__Bas').text()),
				bit_fyt						= Number($('.icerik_'+i+"_"+a).children('.fiyat_aralik__Bit').text()),
				fiyat_aralik__yet_fiyat		= Number($('.icerik_'+i+"_"+a).children('.fiyat_aralik__yet_fiyat').text()),
				fiyat_aralik__cck_fiyat		= Number($('.icerik_'+i+"_"+a).children('.fiyat_aralik__cck_fiyat').text()),
				fiyat_aralik__bbk_fiyat		= Number($('.icerik_'+i+"_"+a).children('.fiyat_aralik__bbk_fiyat').text()),
				fiyat_aralik__ID			= Number($('.icerik_'+i+"_"+a).children('.fiyat_aralik__id').text());



				if ( yetiskin_fiyat_adet >= bas_fyt && yetiskin_fiyat_adet <= bit_fyt) {
					if (fiyat_hesaplama_cesidi==1) {
						yetiskin_tek_fiyat = fiyat_aralik__yet_fiyat / yetiskin_fiyat_adet;
					}
					else {
						yetiskin_tek_fiyat = fiyat_aralik__yet_fiyat;

					}
					$('input[name*="fiyat_aralik__yet_ID"]').val(fiyat_aralik__ID);
				}

				if (cocuk_adet >= bas_fyt && cocuk_adet <= bit_fyt) {
					if (fiyat_hesaplama_cesidi==1) {
						cocuk_tek_fiyat = fiyat_aralik__cck_fiyat / cocuk_adet;
					}
					else {
						cocuk_tek_fiyat = fiyat_aralik__cck_fiyat;
					}
					$('input[name*="fiyat_aralik__cck_ID"]').val(fiyat_aralik__ID);

				}

				if (bebek_adet >= bas_fyt && bebek_adet <= bit_fyt) {

					if (fiyat_hesaplama_cesidi==1) {
						bebek_tek_fiyat = fiyat_aralik__bbk_fiyat / bebek_adet;
					}
					else {
						bebek_tek_fiyat = fiyat_aralik__bbk_fiyat;
					}

					$('input[name*="fiyat_aralik__bbk_ID"]').val(fiyat_aralik__ID);

				}


			}

			if (yetiskin_fiyat_adet=='') {yetiskin_fiyat_adet=0;}
			if (isNaN(yetiskin_tek_fiyat)) {yetiskin_tek_fiyat = 0}
				if (yetiskin_eski_fiyat=='') {yetiskin_eski_fiyat=0;}

			if (bebek_adet=='') {bebek_adet=0;}
			if (isNaN(bebek_tek_fiyat)) {bebek_tek_fiyat = 0}
				if (bebek_eski_fiyat=='') {bebek_eski_fiyat=0;}

			if (cocuk_adet=='') {cocuk_adet=0;}
			if (isNaN(cocuk_tek_fiyat)) {cocuk_tek_fiyat = 0}
				if (cocuk_eski_fiyat=='') {cocuk_eski_fiyat=0;}







			yetKisiAdeti.set(i, yetiskin_fiyat_adet);
			cckKisiAdeti.set(i, cocuk_adet);
			bbkKisiAdeti.set(i, bebek_adet);
			yetTekFiyat.set(i, yetiskin_tek_fiyat);
			cckTekFiyat.set(i, cocuk_tek_fiyat);
			bbkTekFiyat.set(i, bebek_tek_fiyat);
			yetEskiFiyat.set(i, yetiskin_eski_fiyat);
			cckEskiFiyat.set(i, cocuk_eski_fiyat);
			bbkEskiFiyat.set(i, bebek_eski_fiyat);



		}



		var
		getYetVal 		= [...yetKisiAdeti.values()],
		get_CckVal 		= [...cckKisiAdeti.values()],
		get_BbkVal 		= [...bbkKisiAdeti.values()],
		getYetFiyat 	= [...yetTekFiyat.values()],
		getCckFiyat 	= [...cckTekFiyat.values()],
		getBbkFiyat 	= [...bbkTekFiyat.values()],
		getYtEsFiyat 	= [...yetEskiFiyat.values()],
		getCkEsFiyat 	= [...cckEskiFiyat.values()],
		getBkEsFiyat 	= [...bbkEskiFiyat.values()];

		

		for (var i = 0; i < dropLength; i++) {

			modulName.eq(i).find( "input[name*='yetiskin_adet']" ).val(getYetVal[i]);
			modulName.eq(i).find( "input[name*='cocuk_adet']" ).val(get_CckVal[i]);
			modulName.eq(i).find( "input[name*='bebek_adet']" ).val(get_BbkVal[i]);
			modulName.eq(i).find( "input[name*='yetiskin_tek_fiyat']" ).val(getYetFiyat[i]);
			modulName.eq(i).find( "input[name*='cocuk_tek_fiyat']" ).val(getCckFiyat[i]);
			modulName.eq(i).find( "input[name*='bebek_tek_fiyat']" ).val(getBbkFiyat[i]);

		}

		
		for (var i = 0; i < dropLength; i++) {

			var 
			yetiskin_adet		= getYetVal[i],
			yetiskin_tek_fiyat	= getYetFiyat[i],
			cocuk_adet			= get_CckVal[i],
			yetiskin_tek		= getCckFiyat[i],
			bebek_adet			= get_BbkVal[i],
			bebek_tek_fiyat		= getBbkFiyat[i],
			eskiYet				= getYtEsFiyat[i],
			eskiCck				= getCkEsFiyat[i],
			eskiBbk				= getBkEsFiyat[i];

			var 
			yetTopFiyatD 				= Math.round(yetiskin_adet * yetiskin_tek_fiyat * php_curr),
			yetTopFiyat 				= Math.round(yetTopFiyatD / php_curr),

			cckTopFiyatD 				= Math.round(cocuk_adet * yetiskin_tek * php_curr),
			cckTopFiyat 				= Math.round(cckTopFiyatD / php_curr),

			bbkTopFiyatD 				= Math.round(bebek_adet * bebek_tek_fiyat * php_curr),
			bbkTopFiyat 				= Math.round(bbkTopFiyatD / php_curr),

			yetTekFiyatD 				= Math.round(yetiskin_tek_fiyat * php_curr),
			cckTekFiyatD 				= Math.round(yetiskin_tek * php_curr),
			bbkTekFiyatD				= Math.round(bebek_tek_fiyat * php_curr),

			tumFiyatD 					= Math.round(yetTopFiyatD + cckTopFiyatD + bbkTopFiyatD),

			yetiskin_eski_toplam_fiyat	= Math.round(eskiYet * yetiskin_adet),
			cocuk_eski_toplam_fiyat 	= Math.round(cocuk_adet * eskiCck),
			bebek_eski_toplam_fiyat		= Math.round(bebek_adet * eskiBbk),
			tumInFiyatD					= Math.round((yetiskin_eski_toplam_fiyat + cocuk_eski_toplam_fiyat + bebek_eski_toplam_fiyat) * php_curr),
			tumInFiyat 					= Math.round(yetiskin_eski_toplam_fiyat + cocuk_eski_toplam_fiyat + bebek_eski_toplam_fiyat);



			modulName.eq(i).find('.yt_t_f').text(yetTopFiyatD);
			modulName.eq(i).find('.ck_t_f').text(cckTopFiyatD);
			modulName.eq(i).find('.bk_t_f').text(bbkTopFiyatD);

			var tur_turu = $('input[name*="tur_turu"]').val();
			
			

			modulName.eq(i).find( "input[name*='yetis_top_fiyat']" ).val(yetTopFiyat);
			modulName.eq(i).find( "input[name*='cocuk_top_fiyat']" ).val(cckTopFiyat);
			modulName.eq(i).find( "input[name*='bebek_top_fiyat']" ).val(bbkTopFiyat);

			modulName.eq(i).find( '.yt_k_f_w-c' ).text(yetTekFiyatD);
			modulName.eq(i).find( '.ck_k_f_w-c' ).text(cckTekFiyatD);
			modulName.eq(i).find( '.bk_k_f_w-c' ).text(bbkTekFiyatD);


			modulName.eq(i).find( '.g_t_f' ).text(tumFiyatD);
			modulName.eq(i).find( '.in_f' ).text(tumInFiyatD);

			modulName.eq(i).find( "input[name*='indirimsiz']" ).val(tumInFiyat);




			if (tur_turu == 'otel') {
				var 
				start_date	= $('#start_date').val(),
				end_date	= $('#end_date').val(),
				date1 		= new Date(start_date),
				date2 		= new Date(end_date),
				timeDiff 	= Math.abs(date2.getTime() - date1.getTime()),
				diffDays 	= Math.ceil(timeDiff / (1000 * 3600 * 24));

				

				var 
				tumFiyatD_T 	= Math.round(tumFiyatD * diffDays),
				tumInFiyatD_T 	= Math.round(tumInFiyatD * diffDays),
				yetTopFiyat_T 	= Math.round(yetTopFiyat * diffDays),
				cckTopFiyat_T 	= Math.round(cckTopFiyat * diffDays),
				tumInFiyat_T 	= Math.round(tumInFiyat * diffDays);




				if (isNaN(diffDays)) {diffDays = 0}
					console.log(diffDays);
				modulName.eq(i).find( "input[name*='tarih_fark']" ).val(diffDays);
				modulName.eq(i).find( ".tplm_g_f" ).text(diffDays);


				modulName.eq(i).find( '.g_t_f' ).text(tumFiyatD_T);
				modulName.eq(i).find( '.in_f' ).text(tumInFiyatD_T);

				modulName.eq(i).find( "input[name*='yetis_top_fiyat']").val(yetTopFiyat_T);
				modulName.eq(i).find( "input[name*='cocuk_top_fiyat']").val(cckTopFiyat_T);

				modulName.eq(i).find( "input[name*='bas_t']").val(start_date);
				modulName.eq(i).find( "input[name*='bit_t']").val(end_date);

				modulName.eq(i).find("input[name*='indirimsiz']").val(tumInFiyat_T);

				var g_t_f = modulName.eq(i).find( '.g_t_f' ).text();

				if (g_t_f == 'NaN') {
					modulName.eq(i).find( '.g_t_f' ).text(0);
					modulName.eq(i).find( '.in_f' ).text(0);

				}
			}



		}


	}

	
	total_fiyat();
	



	$('#start_date').on('click', function() {

		$('#end_date').val('');
		$('label[for=end_date]').removeClass('active');

		setTimeout(() => {
			$('.datepicker-done').removeClass('disabled').on('click', function() {
				var 
				start_date	= $('#start_date').val(),
				end_date	= $('#end_date').val(),
				labelText 	= $('label[for=persons]').hasClass('active'),
				bas_t 		= $('input[name*="bas_t"]');

				if ( (labelText == true) && (start_date != '') && (end_date != '')){
					$('.spt_ekl').removeClass('disabled');
					total_fiyat();
				} 
				else {
					$('.spt_ekl').addClass('disabled');
				}
				$('#end_date').datepicker('destroy');
				var firstDate = getStartDate(start_date);
				standartDatepickersSettings.minDate = firstDate;
				$('#end_date').datepicker(standartDatepickersSettings);
			});
		}, 300);
	});
	$('#end_date').on('click', function() {
		setTimeout(function() {

			var start_date	= $('#start_date').val();
			if (start_date == '') {
				$('.datepicker-cancel').click();
				$('.datepicker-done').addClass('disabled');
				M.toast({html: onc_bas_t_sec});
			}
			else{

				$('.datepicker-done').removeClass('disabled').on('click', function() {
					var
					end_date	= $('#end_date').val(),
					labelText 	= $('label[for=persons]').hasClass('active'),
					bit_t 		= $('input[name*="bit_t"]');

					var
					bas_t 			= new Date(start_date);
					bas_t 			= bas_t.getTime(),
					bitis_tarihi 	= new Date(end_date);

					bitis_tarihi = bitis_tarihi.getTime();

					if (bitis_tarihi <= bas_t) {
						M.toast({html: oncki_gun_secmzns});
						$('label[for=end_date]').removeClass('active');
						$('#end_date').datepicker('destroy');
						$('#end_date').datepicker();
						$('#end_date').val('');
						return false;
					}

					bit_t.val(end_date);

					if ( (labelText == true) && (start_date != '') && (end_date != '')){
						$('.spt_ekl').removeClass('disabled');
						total_fiyat();
					} 
					else {
						$('.spt_ekl').addClass('disabled');
					}

				});
			}
		}, 300);
	});


	$('.spt_ekl').on('click', function() {
		var 
		kontrolDurum 	= $('input[name*="tur_turu"]').val(),
		start_date		= $('#start_date').val(),
		end_date		= $('#end_date').val(),
		kisiSayi		= $('#persons').val();


		if ((kontrolDurum == 'otel') && (start_date == '') || (end_date == '') || (kisiSayi == '')) {
			return false;
		}
		if ((kontrolDurum == 'surekli') && (start_date == '') || (kisiSayi == '')) {
			return false;
		}
		if ((kontrolDurum == 'belirli') && (kisiSayi == '')) {
			return false;
		}


	});	




	$('.user-submit').click(function (){

		var checkbig 	= $('#yet_sayi').val(),
		checkchild 	= $('#gen_sayi').val(),
		checkbabe 	= $('#bebek_sayi').val(),
		oldText 	= $('label[for=persons]').hasClass('active'),
		toast1		= ltfn_yolcu_scnz,
		toast2		= a_18yaskck,
		tur_turu	= $('input[name*="tur_turu"]').val(),
		dateVal		= $('.datepicker').val(),
		start_date	= $('#start_date').val(),
		end_date	= $('#end_date').val();



		if (oldText == true && checkbig == 0) {
			$('label[for=persons]').removeClass('active');
			$('#persons').val('');
			$('.spt_ekl').addClass('disabled');
		}

		if ((checkbig == 0) && (checkchild == 0) ) {
			M.toast({
				html			: toast1, 
				displayLength 	: 2000,
			});

			return false;
		}


		if ((checkbig == 0) && (checkchild > 0))  {

			M.toast({
				html			: toast2,
				displayLength 	: 3000,
			});

			return false;
		}

		if ((checkbig < 0) || (checkbig > 15) || (checkchild < 0) || (checkchild > 15))  {

			M.toast({ html: ltfn_kisi_dgru});
			return false;

		}

		if (is_babe) {
			if ((checkbig == 0) && (checkbabe == 0) ) {
				M.toast({
					html			: toast1,
					displayLength	: 2000,
				});

				return false;
			}
			if ((checkbig == 0) && (checkbabe > 0))  {

				M.toast({
					html			: toast2,
					displayLength 	: 3000,
				});

				return false;
			}

			if ((checkbig < 0) || (checkbig > 15) || (checkbabe < 0) || (checkbabe > 15))  {

				M.toast({ html: ltfn_kisi_dgru});
				return false;

			}
		}
		
		$('.yt_k_s').text(checkbig);
		$('.ck_k_s').text(checkchild);
		if (is_babe) {
			$('.bk_k_s').text(checkbabe);
		}
		total_fiyat();

		if ((tur_turu == 'surekli') && (dateVal != '')) {
			$('.spt_ekl').removeClass('disabled');
		}
		if ((tur_turu == 'surekli') && (dateVal == '')) {
			$('.spt_ekl').addClass('disabled');
		}
		if ((tur_turu == 'otel') && (start_date != '') && (end_date != '')) {
			$('.spt_ekl').removeClass('disabled');
		}
		if ((tur_turu == 'otel') && (start_date == '') || (end_date == '')) {
			$('.spt_ekl').addClass('disabled');
		}
		if (tur_turu == 'belirli') {
			$('.spt_ekl').removeClass('disabled');
		}

		if (is_babe) {



			if ((checkbig > 0) && (checkchild == 0)) {
				var sonuc = yetiskin + " x " + checkbig;
			}

			if ((checkbig > 0) && (checkbabe == 0)) {

				var sonuc = yetiskin + " x " + checkbig;

			}
			if ((checkbig > 0) && (checkbabe > 0)) {

				var sonuc = yetiskin + " x " + checkbig + ", " + bebek + " x " + checkbabe;

			}
			if ((checkbig > 0)  && (checkbabe > 0) && (checkchild == 0)) {

				var sonuc = yetiskin + " x " + checkbig + ", " + bebek + " x " + checkbabe;

			}
			if ((checkbig > 0) && (checkchild > 0)) {

				var sonuc = yetiskin + " x " + checkbig + ", " + cocuk + " x " + checkchild;

			}


			if ((checkbig > 0) && (checkbabe > 0) && (checkchild > 0)) {

				var sonuc = yetiskin + " x " + checkbig + ", " + cocuk + " x " + checkchild + ", " + bebek + " x " + checkbabe;

			}


		}
		else {
			if (checkbig > 0) {
				var sonuc = yetiskin + " x " + checkbig;
			}
			if ((checkbig > 0) && (checkchild == 0)) {

				var sonuc = yetiskin + " x " + checkbig;

			}
			if ((checkbig > 0) && (checkchild > 0)) {

				var sonuc = yetiskin + " x " + checkbig + ", " + cocuk + " x " + checkchild;

			}

		}


		$('label[for=persons]').addClass('active');

		$('#persons').val(sonuc);

	});






	function equalBestTur(){
		var textModul = $('.choose-text').height(),
		modulImageH = $('.choose-image').find('img').height(),
		modulImageW = $('.choose-image').find('img').width(),
		gradientWrap = $('.gradient-wrap').width(),
		resizeTimer;
		if (textModul > modulImageH) {
			$('.best-choose-inner').addClass('mobile-best-choise');
		} 
		if (textModul == modulImageH) {
			$('.best-choose-inner').removeClass('mobile-best-choise');
		}
	    // == > For Responsive
	    $(window).on('resize', function(e) {
	    	clearTimeout(resizeTimer);
	    	resizeTimer = setTimeout(function() {
	    		var textModul = $('.choose-text').height(),
	    		modulImageH = $('.choose-image').find('img').height();

	    		if (textModul > modulImageH) {
	    			$('.best-choose-inner').addClass('mobile-best-choise');
	    		} 
	    		if (textModul == modulImageH) {
	    			$('.best-choose-inner').removeClass('mobile-best-choise');
	    		}
	    	}, 250);
	    });
	}

	equalBestTur();


	$("a[href$='#comments']").click(function() {
		$("section#comments").css('padding-top', $('nav').height());
		$('html,body').animate({
			scrollTop: $("section#comments").offset().top
		}, 700);
	});
	$("a[href$='#b-y_f']").click(function() {
		$('html,body').animate({
			scrollTop: $("div#b-y_f").offset().top - 75
		}, 700);
	});















	$('#submit-sign').click(function() {
		var 
		name 			= $('#isim'),
		userName 		= $('#user-name'),
		password 		= $('#password'),
		cfmPassword 	= $('#cfmPassword'),
		mail			= $('#mail'),
		nameLength 		= name.val().length,
		userNameLength 	= userName.val().length,
		passwordLength 	= password.val().length, 
		mailVal 		= mail.val();


		if (nameLength == 0){
			M.toast({html: ism_bos_olmz});
			name.removeClass('valid').addClass('invalid');
			return false;
		}
		if (nameLength < 6){
			M.toast({html: ism_kisa});
			name.removeClass('valid').addClass('invalid');
			return false;

		}
		if (nameLength > 24) {
			M.toast({html: ism_uzun,});
			name.removeClass('valid').addClass('invalid');
			return false;
		}


		if (userNameLength == 0){
			M.toast({html: kllnc_bos_olmz});
			userName.removeClass('valid').addClass('invalid');
			return false;
		}

		if (userNameLength < 6){
			M.toast({html: kllnc_ad_kisa});
			userName.removeClass('valid').addClass('invalid');
			return false;

		}
		if (userNameLength > 24) {
			M.toast({html: kllnc_ad_uzun});
			userName.removeClass('valid').addClass('invalid');
			return false;
		}




		if (passwordLength == 0){
			M.toast({html: sfre_bs_olmz});
			password.removeClass('valid').addClass('invalid');
			return false;
		}

		if (passwordLength < 6){
			M.toast({html: sfre_ck_kisa});
			password.removeClass('valid').addClass('invalid');
			return false;

		}
		if (passwordLength > 18) {
			M.toast({html: sfre_ck_uzun});
			password.removeClass('valid').addClass('invalid');
			return false;
		}



		var 
		passval 	= password.val(),
		thisval 	= cfmPassword.val();

		if (!((thisval == passval) && (thisval.length > 0))) {
			M.toast({html: sfre_ayni_dagel});
			cfmPassword.removeClass('valid').addClass('invalid');
			return false;

		}

		function EmailValidate() {
			var numericExpression = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			if (mailVal.match(numericExpression)){
				mail.removeClass('invalid').addClass('valid');
				return true;
			}
			else{
				return false;
			}
		}
		if (!(EmailValidate())) {
			M.toast({html: ltfn_emal_adrs_dgru});
			mail.removeClass('valid').addClass('invalid');
			return false;
		}

		if (
			(nameLength >= 6) 		&& 
			(nameLength <= 24) 		&& 
			(userNameLength >= 6) 	&& 
			(userNameLength <= 24) 	&& 
			(passwordLength >= 6) 	&& 
			(passwordLength <= 18) 	&&
			(thisval == passval) 	&& 
			(thisval.length > 0) 	&&
			EmailValidate()
			) {
			return true;
	}



});

	$('#send-mail').click(function() {
		var 
		mail			= $('#my_mail'),
		mailVal 		= mail.val();

		function EmailValidate() {
			var numericExpression = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			if (mailVal.match(numericExpression)){
				mail.removeClass('invalid').addClass('valid');
				return true;
			}
			else{
				return false;
			}
		}
		if (!(EmailValidate())) {
			M.toast({html: ltfn_emal_adrs_dgru});
			mail.removeClass('valid').addClass('invalid');
			return false;
		}
	});



	$('#send-pass').click(function() {
		var 
		password 		= $('#newPassword'),
		cfmPassword 	= $('#cfmNewPassword'),
		passwordLength 	= password.val().length;

		if (passwordLength == 0){
			M.toast({html: sfre_bs_olmz});
			password.removeClass('valid').addClass('invalid');
			return false;
		}

		if (passwordLength < 6){
			M.toast({html: sfre_ck_kisa});
			password.removeClass('valid').addClass('invalid');
			return false;

		}
		if (passwordLength > 18) {
			M.toast({html: sfre_ck_uzun});
			password.removeClass('valid').addClass('invalid');
			return false;
		}



		var 
		passval 	= password.val(),
		thisval 	= cfmPassword.val();

		if (!((thisval == passval) && (thisval.length > 0))) {
			M.toast({html: sfre_ayni_dagel});
			cfmPassword.removeClass('valid').addClass('invalid');
			return false;

		}

		if (
			(passwordLength >= 6) 	&& 
			(passwordLength <= 18) 	&&
			(thisval == passval) 	&& 
			(thisval.length > 0)
			) {
			return true;
	}

});


	function stars(element, input) {
		var 
		star = '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="24px" height="24px" viewBox="0 0 24 24" enable-background="new 0 0 24 24" xml:space="preserve"><g id="Bounding_Boxes"><path fill="none" d="M0,0h24v24H0V0z"/><path fill="none" d="M0,0h24v24H0V0z"/></g><g id="Outline_1_"><path d="M12,17.27L18.18,21l-1.64-7.03L22,9.24l-7.19-0.61L12,2L9.19,8.63L2,9.24l5.46,4.73L5.82,21L12,17.27z"/></g></svg>',
		star_border = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="none" d="M0 0h24v24H0V0z"/><path d="M22 9.24l-7.19-.62L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21 12 17.27 18.18 21l-1.63-7.03L22 9.24zM12 15.4l-3.76 2.27 1-4.28-3.32-2.88 4.38-.38L12 6.1l1.71 4.04 4.38.38-3.32 2.88 1 4.28L12 15.4z"/></svg>';

		element.on('mouseover', function(){
			var 
			this_i = $(this).index(),
			parent = $(this).parent('.stars');

			parent.children('.stars__star:gt('-this_i-')').html(star);
			parent.children('.stars__star:gt('+this_i+')').html(star_border);

			$(this).click(function(){
				input.val(this_i + 1);
			});

		}).on('mouseout', function() {
			var 
			howItems = input.val() - 1,
			parent = $(this).parent('.stars');

			parent.children('.stars__star:gt('-howItems-')').html(star);
			parent.children('.stars__star:gt('+howItems+')').html(star_border);

		});
	}
	stars($('.s_s-s .stars__star'), $('#servis'));
	stars($('.o_s-s .stars__star'), $('#organ'));
	stars($('.p_s-s .stars__star'), $('#para'));
	stars($('.g_s-s .stars__star'), $('#guven'));
	

	$('.y_g_b > input').on('click', function(){
		if ($(this).val(bslk_gir)) {
			$(this).val('');
		}
	});
	$('#y_g').on('click', function(){
		if ($(this).html(brya_yazn)) {
			$(this).text('');
		}
	});
	$('#yorum_gonder').click(function() {
		var name = $('#y_g').val();

		if (name.length < 16){
			M.toast({html: yrm_ck_kisa});
			name.removeClass('valid').addClass('invalid');
			return false;
		}
		if (name.length > 16) {
			return true;
		}
	});



	// Sıralama

	$('.p_g_d').on('click', function() {

		const map = new Map();

		var controlIcon = $(this).children('.p_g_d__icon:first-child').hasClass('active');

		if (controlIcon == true ) {
			$(this).children('.p_g_d__icon:first-child').removeClass('active');
			$(this).children('.p_g_d__icon:last-child').addClass('active');
		} 
		else {
			$(this).children('.p_g_d__icon:first-child').addClass('active');
			$(this).children('.p_g_d__icon:last-child').removeClass('active');
		}
		
		var cmnNmbr = $('.best-comment').length;

		for (var i = 0; i < cmnNmbr; i++) {
			var 
			cmntDiv 		= $('.best-comment').eq(i),
			stars 			= cmntDiv.find('.stars'),
			getAllElPoint 	= stars.children('i:contains(star)').length,
			getOther 		= stars.children('i:contains(star_border)').length,
			specificPoint 	= getAllElPoint - getOther;
			
			map.set(i, specificPoint);
		}


		var getVal = [...map.values()];



		for (var i = 0; i < map.size; i++) {
			
			var cmntDiv = $('.best-comment').eq(i);

			cmntDiv.addClass('item'+getVal[i]+'');

		}
		


		getVal.sort(function(a, b){
			if (controlIcon == true) {
				return b - a;
			}
			else {
				return a - b;
			}
		});

		for (var i = 0; i < cmnNmbr; i++) {

			map.set(i, getVal[i]);
		}


		for (var i = 0; i < map.size; i++) {

			$('.item'+getVal[i]+'').insertBefore($('.best-comment').eq(i));

		}



	});


	$('.t_g_d').on('click', function() {

		const tMap = new Map();

		var controlIcon = $(this).children('i:first-child').hasClass('active');

		if (controlIcon == true ) {
			$(this).children('i:first-child').removeClass('active');
			$(this).children('i:last-child').addClass('active');
		} 
		else {
			$(this).children('i:first-child').addClass('active');
			$(this).children('i:last-child').removeClass('active');
		}
		
		var cmnNmbr = $('.best-comment').length;

		for (var i = 0; i < cmnNmbr; i++) {
			var 
			cmntDiv 		= $('.best-comment').eq(i),
			stars			= cmntDiv.find('.comment-header-other > p'),
			dateNumber 		= Date.parse(cmntDiv.find('.comment-header-other > p').text());
			
			tMap.set(i, dateNumber);

		}
		

		var getVal = [...tMap.values()];



		for (var i = 0; i < tMap.size; i++) {
			
			var cmntDiv = $('.best-comment').eq(i);

			cmntDiv.addClass('item'+getVal[i]+'');

		}
		


		getVal.sort(function(a, b){

			if (controlIcon == true) {

				return b - a;

			}

			else {

				return a - b;

			}

		});

		for (var i = 0; i < cmnNmbr; i++) {

			tMap.set(i, getVal[i]);

		}

		for (var i = 0; i < tMap.size; i++) {

			$('.item'+getVal[i]+'').insertBefore($('.best-comment').eq(i));

		}


	});



















	$('.autocompvare').on('click', function() {
		var sibling = $(this).siblings('.autocompvare-content');


		sibling.css('background-color', 'transparent');

		
		if (($(this).val() != '') || (sibling.height() <= 2)) {
			sibling.css('background-color', '');
		} 
		$(this).on('keyup', function() {
			sibling.css('background-color', '');
			if ($(this).val() == '') {
				sibling.css('background-color', 'transparent');
			}
			if (sibling.height() <= 2) {
				sibling.css('background-color', 'transparent');
			}
		});
	});


	$('.spt_b_btn').click(function(event) {
		if (window.flags.signin.status === false) {
			event.stopPropagation();
			$('#sign-in').modal('open');
		}
		
		let leadInfo = JSON.parse(localStorage.getItem('leadInfo')) || {}
		if (leadInfo && !window.flags.isLead && leadInfo?.currentUser === window.userInfo.mail) {
			window.flags.isLead = true

			let howMuchItems = [...$('.spt_b_btn')];
			howMuchItems.forEach((item, i) => {
				let parent = $(item.getAttribute('href'))
				let createCheckbox = `
				<div class="spt-lider">
				<label class="spt-lider__label waves-effect">
				<input type="checkbox" class="filled-in" id="spt-lider__${i}" />
				<span>${window.i18n.cart.same_lider_person}</span>
				</label>
				</div>`;
				parent.find('.spt_k_s_f-i').prepend(createCheckbox);
				let checkbox = document.querySelector(`#spt-lider__${i}`)
				checkbox.onchange = () => {
					let checkStatus = checkbox.checked;
					if (checkStatus) {
						Object.entries(leadInfo).forEach(([key, value]) => {
							let parentModal = parent[0]
							elem = parentModal.querySelector(`[lider="${key}"]`);
							parentModal.querySelector(`[lider="${key}"]`).value = value
							let elemTagName = elem.tagName;
							switch (elemTagName) {
								case "INPUT":
								let label = parentModal.querySelector(`[for="${elem.id}"]`);
								label.classList.add('active');
								break;
							}
						});

						$('select').formSelect('destroy');
						$('select').formSelect();
					}
					else {
						Object.entries(leadInfo).forEach(([key, value]) => {
							let parentModal = parent[0]
							elem = parentModal.querySelector(`[lider="${key}"]`);

							let elemTagName = elem.tagName;
							switch (elemTagName) {
								case "INPUT":
								let label = parentModal.querySelector(`[for="${elem.id}"]`);
								label.classList.remove('active');
								break;
								case "SELECT": 
								let firstOption = elem.querySelector('option')
								firstOption.textContent = elem.getAttribute('default-text')
								firstOption.setAttribute('selected', "selected")
								firstOption.setAttribute('disabled', true)
								firstOption.value = '';
							}

							elem.value = '';


						});
						$('select').formSelect('destroy');
						$('select').formSelect();
					}
				}
			});
		}
	})


	$('.continue-with').click(function(event) {
		if (window.flags.signin.status === false) {
			window.flags.submitFunc = function(data) {
				$.ajax({
					url: window.base_url + 'giris/kayit_al_sosyal',
					type: 'POST',
					data: data,
					success: function (response) {
						if (window.flags.locateToBaseUrl) {
							document.location.replace(window.base_url);
						}
						else {
							location.reload();
						}
					},
					error: function(jqXHR, textStatus, errorThrown) {
						M.toast({html: 'Error: ' + errorThrown});
					}
				});
			}
		}
		var login_type = $(this).attr('data-logintype');
		switch (login_type) {
			case 'google':
			window.flags.initSignIn = function (obj) {
				window.flags.signin = obj;
				window.flags.submitFunc('veriler='+JSON.stringify(window.flags.signin));
			}
			break;
			case 'facebook':
			FB.login(function(response) {
				if (response.authResponse) {
					FB.api('/me?fields=id,name,email', function(data) {
						if ((typeof data.email === 'undefined') ||(data.email == '') || (data.email == null)) {
							M.toast({html: "You dont't give an email access, we are can't register you without email. Sorry :("});
							return false;
						}
						window.flags.signin = {
							status: true,
							name_surname: data.name,
							email: data.email,
							login_type: 'facebook',
							id: data.id
						}
						window.flags.submitFunc('veriler='+JSON.stringify(window.flags.signin));
					});
				}
				else {
					M.toast({html: 'User cancelled login or did not fully authorize.'});
				}
			}, {scope: 'email'});
			break;

			case 'email':
			$('#sign-in-email').modal({
				opacity: 0,
				dismissible: false
			});
			$('#sign-in-email').modal('open');
			$('.sign-in-email__signin').click(function(event) {
				var 
				signin_name_surname = $('#signin_name_surname'),
				signin_email = $('#signin_email'),
				signin_password = $('#signin_password');

				var 
				check_signin_email = window.validateEmail(signin_email.val()),
				check_signin_name = window.validateNameSurname(signin_name_surname.val()),
				check_signin_password = window.validatePassword(signin_password.val());

				if (check_signin_email && check_signin_name && check_signin_password) {
					window.flags.signin ={
						status: true,
						name_surname: signin_name_surname.val(),
						email: signin_email.val(),
						login_type: 'email',
						id: signin_password.val()
					}
					window.flags.submitFunc('veriler='+JSON.stringify(window.flags.signin));
				}
				else {
					M.toast({html: 'Please enter correct things'});
				}
			});
			break;

		}
	});
	$('.spt_tm').on('submit', function(e) {
		if (window.visitorInfoStatus.includes(false)) {
			e.preventDefault();
			M.toast({html: ltfn_zyrtc_dldr});
		}

		else if (window.flags.signin.status === false) {
			$('#sign-in').modal('open');
			e.preventDefault();
		}

	});



	$('.spt_k_s_f--dvm').on('click', function() {
		var moduleLength = $(this).parents('.modal').find('.spt_k_s_f--k').length;
		for (var i = 0; i < moduleLength; i++) {
			var 
			modul 				= $(this).parents('.modal').find('.spt_k_s_f--k').eq(i),
			modulTop 			= modul.find('.spt_k_s_f--ust').eq(0),
			modulBototm 		= modul.find('.spt_k_s_f--ust').eq(1),
			elemsTop 			= modulTop.find(':input'),
			elemsBottom			= modulBototm.find(':input:not([type="email"])'),
			firstPersonElems	= modulBototm.find(':input'),
			slct 				= modul.find('select').val(),
			modalID 			= $(this).parents('.modal').attr('id');

			if ( (i == 0) && ((elemsTop.val() == '') || 
				(firstPersonElems.val() == '') ||
				(slct == null)) ) {
				M.toast({html: ltfn_eksk_dldr});
			return false;
		}
		else if (modulTop.find('input[id*="iism"]').val() == ''){
			M.toast({html: ltfn_eksk_dldr});
			return false;
		}
		if (($(this).parents('.modal').data('isFirst')) &&
			(i == 0)) {

			let leadInfo = {};
				/*
				with reduce
				[...modul.find('[lider]')].reduce((obj, input) => {
					obj[input.getAttribute('lider')] = input.value;
					return obj;
				}, {});*/

				[...modul.find('[lider]')].forEach(input => {
					leadInfo[input.getAttribute('lider')] = input.value;
				});
				leadInfo.currentUser = window.userInfo === "" ? null : window.userInfo.mail
				localStorage.setItem('leadInfo', JSON.stringify(leadInfo));




			}
		}
		var modalID = $(this).parents('.modal.open').attr('id');
		$(this).parents('.modal.open').find('.ajax_trigger').click();
	});
	



	$('#ch_ps').on('click', function() {
		var 
		cartNumber 		= $('#c_n').val(),
		cartName 		= $('#c_n').val(),
		cartLastDate 	= $('#c_skt').val(),
		cartCVC 		= $('#c_cvc').val();

		if ((cartNumber == '') || (cartLastDate == '') || (cartCVC == '')) {
			return false;
		}
		if (cartNumber.length < 16) {
			return false;
		}
		if (cartCVC.length < 3) {
			return false;
		}

	});
	$('.musaitmi').on('click', function() {
		setTimeout(function() {
			var 
			modal 		= $('.modal.open'),
			modalOps 	= modal.find('.modal-ops'),
			submitBtn 	= modalOps.children('button');

			$(submitBtn).on('click', function() {
				var 
				inputs 		=  modal.find('form').find('.input-field'),
				userName 	= inputs.find('#kulIsmi'),
				userMail 	= inputs.find('#kulMail'),
				userMssg 	= inputs.find('#kulSoru');

				if ((userName.val().length <= 4) || (userName.val().length >= 36)) {
					M.toast({html: 'İsminiz 4 ve 36 karakter arasında olmalı!!'})
					return false;
				}
				if ((userMssg.val().length <= 8) || (userMssg.val().length >= 110)) {
					M.toast({html: 'Göndermek istediğniz mesaj 8 ve 110 karakter arasında olmalı!!'})
					return false
				}
				function EmailValidate() {
					var numericExpression = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
					if (userMail.val().match(numericExpression)){
						return true;
					}
					else{
						return false;
					}
				}
				if (!(EmailValidate())) {
					M.toast({html: 'Lütfen e-posta adresini doğru yazınız!!'});
					return false;
				}

			});
		}, 250);
	});


	$('.supplier_gonder').click(function() {
		$('#submit-supplier').toggleClass('disabled');
	});

	$('[data-url]').each(function() {
		var El = $(this);
		$.ajax({
			url: $(this).data("url"),
			type: 'GET',
			success: function(data){
				El.html($(data).children('svg'));
			}
		});
	});

	$('.add-education__currently').click(function() {
		var isChecked = $(this).prop('checked')
		console.log(isChecked)
		if (isChecked == true) {
			$(this).parents('.add-expirence').find('#education_end_date').attr('disabled', true);
		}
		else if (isChecked == false){
			$(this).parents('.add-expirence').find('#education_end_date').attr('disabled', false);
		}
	});
	$('.add-expirence__exp_currently').click(function() {
		var isChecked = $(this).prop('checked')
		if (isChecked == true) {
			$(this).parents('.add-expirence').find('#exp_end_date').attr('disabled', true);
		}
		else if (isChecked == false){
			$(this).parents('.add-expirence').find('#exp_end_date').attr('disabled', false);
		}
	});
	$('.addExperience__btn').on('click', function(e) {
		var 
		expParent = $(this).parents('.modal.modal-fixed-footer').children('.modal-content'),
		titleText = expParent.find('.add-expirence__title').val(),
		companyText = expParent.find('.add-expirence__company').val(),
		addressText = expParent.find('.add-expirence__location').val(),
		descriptionText = expParent.find('.add-expirence__description').val(),
		expStartDateText = expParent.find('.add-expirence__exp_start_date').val(),
		expEndDateText = expParent.find('.add-expirence__exp_end_date').val();

		if ((titleText.length <= 3) || (companyText.length <= 3) || (addressText.length <= 3) || (descriptionText.length <= 3) || (expStartDateText.length <= 3)) {
			M.toast({html: 'Please fill in all fields (min: 3 character)'})
			return false;
		}
		else {
			var deleteSvg = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="none" d="M0 0h24v24H0V0z"/><path d="M16 9v10H8V9h8m-1.5-6h-5l-1 1H5v2h14V4h-3.5l-1-1zM18 7H6v12c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7z"/></svg>';

			if ((expParent.find('.add-expirence__exp_currently').prop('checked')) ||
				(expEndDateText.length == 0)) {
				expEndDateText = 'Currently work'
		}


		var ExpNumber = $('.expirence .expirence-inner').length;

		$('.expirence').append('<div class="expirence-inner">' + 
			'<h5 class="expirence-inner__title_name exp-title">' +
			titleText +
			'<span class="exp-title__work-years">' + 
			expStartDateText +
			' - ' +
			expEndDateText +
			'</span>' +
			'</h5>' +
			'<p class="expirence-inner__company_name">' + companyText + '</p>' +
			'<p class="expirence-inner__desc">' + descriptionText + '</p>' +
			'<button class="deleteExp"> ' + deleteSvg + ' </button>' +
			'<input type="hidden" name="hiddenTitle_'+ ExpNumber +'" value="' + titleText + '">' + 
			'<input type="hidden" name="hiddenLocation_'+ ExpNumber +'" value="' + addressText + '">' + 
			'<input type="hidden" name="hiddenExpStartDate_'+ ExpNumber +'" value="'+expStartDateText+'">' + 
			'<input type="hidden" name="hiddenExpEndDate_'+ ExpNumber +'" value="'+expEndDateText+'">' + 
			'<input type="hidden" name="hiddenCompany_'+ ExpNumber +'" value="'+companyText+'">' + 
			'<input type="hidden" name="hiddenExpDescription_'+ ExpNumber +'" value="'+descriptionText+'">' + 
			'</div>')
	}
	$('input[name="hiddenExpLength"]').val(ExpNumber)


	expParent.find('.add-expirence__title').val('');
	expParent.find('label[for="title"]').removeClass('active');

	expParent.find('.add-expirence__company').val('');
	expParent.find('label[for="company"]').removeClass('active');
	expParent.find('.add-expirence__location').val('');
	expParent.find('label[for="location"]').removeClass('active');

	expParent.find('.add-expirence__description').val('');
	expParent.find('label[for="description"]').removeClass('active');


	expParent.find("label[for='exp_start_date']").removeClass('active');
	expParent.find("label[for='exp_end_date']").removeClass('active');

	expParent.find('.add-expirence__exp_start_date').val('');
	expParent.find('.add-expirence__exp_end_date').val('');
	expParent.find('.add-expirence__exp_end_date').attr('disabled', false);

	$('.add-expirence__exp_currently').prop('checked', false);

	$(this).parents('.modal.modal-fixed-footer').modal('close');
	$('.deleteExp').click(function() {
		$(this).parent('.expirence-inner').remove();
		var oldVal = $('input[name="hiddenExpLength"]').val()
		if (oldVal >= 0) {
			$('input[name="hiddenExpLength"]').val(oldVal - 1);

		}
	});
});

	$('.addEducation__btn').on('click', function(e) {
		var 
		eduParent = $(this).parents('.modal.modal-fixed-footer').children('.modal-content'),
		institute = eduParent.find('.add-education__institute').val(),
		major = eduParent.find('.add-education__major').val(),
		degree = eduParent.find('.add-education__degree').val(),
		eduaddress = eduParent.find('.add-education__location').val(),
		descriptionText = eduParent.find('.add-education__description').val(),
		eduStartDateText = eduParent.find('.add-education__start_date').val(),
		eduEndDateText = eduParent.find('.add-education__end_date').val();

		if ((institute.length <= 3) || (major.length <= 3) || (degree.length <= 3) || (eduaddress.length <= 3) || (descriptionText.length <= 3) || (eduStartDateText.length <= 3)) {
			M.toast({html: 'Please fill in all fields (min: 3 character)'})
			return false;
		}
		else {
			var deleteSvg = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="none" d="M0 0h24v24H0V0z"/><path d="M16 9v10H8V9h8m-1.5-6h-5l-1 1H5v2h14V4h-3.5l-1-1zM18 7H6v12c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7z"/></svg>';



			if ((eduParent.find('.add-education__currently').prop('checked')) ||
				(eduEndDateText.length == 0)) {
				eduEndDateText = 'Currently at school'
		}


		var eduExpNumber = $('.education .expirence-inner').length;

		$('.education').append('<div class="expirence-inner">' + 
			'<h5 class="expirence-inner__title_name exp-title">' +
			institute +
			'<span class="exp-title__work-years">' + 
			eduStartDateText +
			' - ' +
			eduEndDateText +
			'</span>' +
			'</h5>' +
			'<p class="expirence-inner__company_name">' + major + '</p>' +
			'<p class="expirence-inner__company_name">' + degree + '</p>' +
			'<p class="expirence-inner__desc">' + descriptionText + '</p>' +
			'<button class="deleteExp"> ' + deleteSvg + ' </button>' +
			'<input type="hidden" name="hiddenInstitute_'+ eduExpNumber +'" value="' + institute + '">' + 
			'<input type="hidden" name="hiddenInstituteAddress_'+ eduExpNumber +'" value="' + eduaddress + '">' + 
			'<input type="hidden" name="hiddenEduStartDate_'+ eduExpNumber +'" value="'+eduStartDateText+'">' + 
			'<input type="hidden" name="hiddenEduEndDate_'+ eduExpNumber +'" value="'+eduEndDateText+'">' + 
			'<input type="hidden" name="hiddenMajor_'+ eduExpNumber +'" value="'+major+'">' + 
			'<input type="hidden" name="hiddenDegree_'+ eduExpNumber +'" value="'+degree+'">' + 
			'<input type="hidden" name="hiddenEduDescription_'+ eduExpNumber +'" value="'+descriptionText+'">' + 
			'</div>')
	}
	$('input[name="hiddenEduLength"]').val(eduExpNumber)


	eduParent.find('.add-education__institute').val('');
	eduParent.find('label[for="institute"]').removeClass('active');

	eduParent.find('.add-education__major').val('');
	eduParent.find('label[for="major"]').removeClass('active');

	eduParent.find('.add-education__degree').val('');
	eduParent.find('label[for="degree"]').removeClass('active');

	eduParent.find('.add-education__location').val('');
	eduParent.find('label[for="edu_address"]').removeClass('active');

	eduParent.find('.add-education__description').val('');
	eduParent.find('label[for="edu_description"]').removeClass('active');

	eduParent.find('.add-education__start_date').val('');
	eduParent.find('label[for="education_start_date"]').removeClass('active');


	eduParent.find('.add-education__end_date').val('');
	eduParent.find('.add-education__end_date').attr('disabled', false);
	eduParent.find('label[for="education_end_date"]').removeClass('active');

	$('.add-education__currently').prop('checked', false);

	$(this).parents('.modal.modal-fixed-footer').modal('close');
	$('.deleteExp').click(function() {
		$(this).parent('.expirence-inner').remove();
		var oldVal = $('input[name="hiddenEduLength"]').val()
		if (oldVal >= 0) {
			$('input[name="hiddenEduLength"]').val(oldVal - 1);

		}
	});
});

	$(".goto_findJobs").click(function() {
		$([document.documentElement, document.body]).animate({
			scrollTop: $("#find-jobs").offset().top - (64 + 15)
		}, 2000);
	});


	var couponRegEx = /^[A-Z0-9]{6}$/;
	$('.check_promo__btn').click(function(e) {
		e.preventDefault();
		e.stopPropagation();
		if (couponRegEx.test($('#promotion-code').val())) {
			$.ajax({ 
				type: "POST", 
				url: $(this).attr('data-ajaxurl'), 
				data: {
					name: $('#promotion-code').val()
				}, 
				success: function(res){
					var res = JSON.parse(res);
					if (res.status == 1) {
						var 
						totalAmount = $('[data-totalamount]'),
						oldTotalAmount = $('.oldTotalAmount'),
						couponCode = res.kod,
						couponOran = res.oran,
						eskiFiyat = totalAmount.attr('data-totalamount'),
						yeniFiyat = eskiFiyat - (eskiFiyat * couponOran / 100);
						totalAmount.html(yeniFiyat + totalAmount.attr('data-currency'));
						oldTotalAmount.html(eskiFiyat + totalAmount.attr('data-currency'));

						$('.couponStatus').html(
							'<input type="hidden" name="kuponsuzFiyat" value="'+ eskiFiyat +'" />' +
							'<input type="hidden" name="kuponluFiyat" value="'+ yeniFiyat +'" />' +
							'<input type="hidden" name="kuponKodu" value="'+ couponCode +'" />' + 
							'<input type="hidden" name="oran" value="'+ couponOran +'" />' + 
							'<input type="hidden" name="kuponDurumu" value="'+ 1 +'" />');
						$('#promo-modal').modal('close');
						$('#promotion-code').val('')
						$('[for="promotion-code"]').removeClass('active')
					}
					else {
						var 
						totalAmount = $('[data-totalamount]'),
						couponCode = res.kod,
						couponOran = res.oran,
						eskiFiyat = totalAmount.attr('data-totalamount');
						//totalAmount.html(yeniFiyat + totalAmount.attr('data-currency'))
						$('.couponStatus').html(
							'<input type="hidden" name="kuponsuzFiyat" value="'+ eskiFiyat +'" />' +
							'<input type="hidden" name="kuponluFiyat" value="'+ eskiFiyat +'" />' +
							'<input type="hidden" name="kuponKodu" value="'+ couponCode +'" />' +
							'<input type="hidden" name="oran" value="'+ couponOran +'" />' + 
							'<input type="hidden" name="kuponDurumu" value="'+ 0 +'" />');
						M.toast({html: window.i18n.cart.code_not_correct});
						$('#promo-modal').modal('close');
					}
				}
			});

		}
		else {
			M.toast({html: window.i18n.cart.code_not_correct});
		}


	});


	$('.sub_update_btn').click(function(event) {
		let parent = $(this).parents('.modal'),
		cardForm = parent.find('.update_credit_card__form'),
		newCardNumber = cardForm.find('[name="number"]'),
		newCardName = cardForm.find('[name="name"]'),
		newExpiry = cardForm.find('[name="expiry"]'),
		newCvc = cardForm.find('[name="cvc"]');
		if ((newCardNumber.val() < 19) || (newExpiry.val() < 7) || (newCvc.val() < 3)) {
			M.toast({html: window.i18n.rezerv.enter_correct_card});
			return false;
		}
		let changeCartData = {
			user_id: window.flags.kullanici_id,
			rezervation_id: $(this).parents('.modal').data('id'),
			cardNumber: newCardNumber.val(),
			cardName: newCardName.val(),
			cardExpDate: newExpiry.val(),
			cardCvc: newCvc.val()
		}
		$.ajax({ 
			type: "POST", 
			url: window.base_url + 'Ajax_process/yeni_kart',
			data: 'data=' + JSON.stringify(changeCartData), 
			success: function(res){
				let response = JSON.parse(res);

				switch (response) {
					case 0:
					M.toast({html: window.i18n.error});
					break;
					case 1:
					M.toast({html: window.i18n.rezerv.cart_update_ok});
					parent.modal('close');
					break;
					default:
					M.toast({html: window.i18n.error});
					;
				}
			}
		});
	});
	$('.sub_cansel_rezerv_btn').click(function(event) {
		let parent = $(this).parents('.modal'),
		tur_id = parent.data('id')
		cancelRezervationData = parent.find('.cancel_rezervation__why__textarea'),
		cancelRezervData = {
			user_id: window.flags.kullanici_id,
			rezervation_id: parent.data('id'),
			cancelText: cancelRezervationData.val()
		},
		getRezerv = window.flags.reservations.find(obj => {
			return obj.id === tur_id;
		});

		console.log(getRezerv.baslangic_tarihi)


		$.ajax({ 
			type: "POST", 
			url: window.base_url + 'Ajax_process/reservation_iptal',
			data: 'data=' + JSON.stringify(cancelRezervData), 
			success: function(res){
				console.log(res)
				let response = JSON.parse(res);

				switch (response) {
					case 0:
					M.toast({html: window.i18n.error});
					break;
					case 1:
					M.toast({html: window.i18n.rezerv.cancellation_ok});
					parent.modal('close');
					break;
					default:
					M.toast({html: window.i18n.error});
					;
				}
			}
		});
	});
	let hasDatepickerFunc = false;
	$('.change-rez-data--next').click(function(event) {
		parent = $(this).parents('.modal'),
		tur_id = parent.data('id'),
		getRezerv = window.flags.reservations.find(obj => {
			return obj.id === tur_id;
		});

		let tur_turu = getRezerv.tur_turu,
		datepickerInput = $(this).siblings('.datepicker' + tur_id);
		datepickerInput.click(function(event) {
			setTimeout(() => {
				if (hasDatepickerFunc == false) {
					$('.datepicker-done').removeClass('disabled').click(function(event) {
						let changedStartDate = datepickerInput.val(),
						changedEndDate = null;
						switch (tur_turu) {
							case 'surekli':
							changedEndDate = changedStartDate
							break;
							case 'belirli': 
							let oldEndDate = new Date(getRezerv.bitis_tarihi),
							oldStartDate = new Date(getRezerv.baslangic_tarihi),
							differenceInDays = Math.floor((oldEndDate - oldStartDate) / (1000*60*60*24))

							getChangedStartDate = new Date(changedStartDate);
							changedEndDate = getChangedStartDate.addDays(differenceInDays);
							break;
						}
						let chaneNote = parent.find('.change-date-note__textarea').val();
						let changeDateData = {
							user_id: window.flags.kullanici_id,
							rezervation_id: parent.data('id'),
							tur_turu: tur_turu,
							start_date: changedStartDate,
							end_data: changedEndDate,
							changeNote: chaneNote
						}
						//console.log(changeDateData);

						$.ajax({ 
							type: "POST", 
							url: window.base_url + 'Ajax_process/reservation_tarih_degistir',
							data: 'data=' + JSON.stringify(changeDateData), 
							success: function(res){
								let response = JSON.parse(res);

								switch (response) {
									case 0:
									M.toast({html: window.i18n.error});
									break;
									case 1:
									M.toast({html: window.i18n.rezerv.change_date_ok});
									parent.modal('close');
									break;
									default:
									M.toast({html: window.i18n.error});
									;
								}
								console.log(response)
							}
						});
					});
					hasDatepickerFunc = true;
				}
			}, 300);
		});
		datepickerInput.click();
		$('.modal.datepicker-modal.open').css('z-index', 9992).siblings('.modal-overlay').css('z-index', 9991);

	});
	$('.comment-rezerv-trigger').click(function(event) {
		let modal = $('#' + $(this).data('target')),
		modal_id = modal.data('id');
		stars(modal.find('.tour_comment_star__service .stars__star'), $('#servis' + modal_id));
		stars(modal.find('.tour_comment_star__organization .stars__star'), $('#organ' + modal_id));
		stars(modal.find('.tour_comment_star__price .stars__star'), $('#para' + modal_id));
		stars(modal.find('.tour_comment_star__security .stars__star'), $('#guven' + modal_id));
	});
	$('.rez-make-comment').click(function(event) {
		let 
		parent = $(this).parents('.modal.open');
		tur_id = parent.data('id'),
		commentTitle = parent.find('input[name="tour_comment_title'+ tur_id +'"]'),
		commentMessage = parent.find('textarea[name="tour_comment_message'+ tur_id +'"]'),
		starService = parent.find('input[name="servis'+ tur_id +'"]'),
		starOrganization = parent.find('input[name="organ'+ tur_id +'"]'),
		starPrice = parent.find('input[name="para'+ tur_id +'"]'),
		starSecority = parent.find('input[name="guven'+ tur_id +'"]');

		if (commentMessage.val() <= 16) {
			M.toast({html: yrm_ck_kisa});
			return false;
		}
		let getRezerv = window.flags.reservations.find(obj => {
			return obj.id === tur_id;
		});
		let commentData = {
			user_id: window.flags.kullanici_id,
			title: commentTitle.val(),
			message: commentMessage.val(),
			tur_id: getRezerv.tur_id,
			tur_kod: getRezerv.tur_kod,
			seo_adi: getRezerv.seo_adi,
			servis: starService.val(),
			organ: starOrganization.val(),
			para: starPrice.val(),
			guven: starSecority.val()
		}
		$.ajax({ 
			type: "POST", 
			url: window.base_url + 'Ajax_process/comment_ajax',
			data: commentData, 
			success: function(res){
				let response = JSON.parse(res);

				switch (response) {
					case 0:
					M.toast({html: window.i18n.error});
					break;
					case 1:
					M.toast({html: window.i18n.rezerv.post_comment_ok});
					parent.modal('close');
					break;
					default:
					M.toast({html: window.i18n.error});
					;
				}
				console.log(res)
			}
		});
	});

	$('.print_reservation').click(function(event) {
		let parentId = $(this).parents('.modal.open').data('id');
		window.printDiv('.rez-print--' + parentId);
		
	});

	if ($(window).width() > 0 && $(window).width() <= 768) {


		$('.category-place:not(.category-place--showAll)').find('.other-main:gt(5)').hide();


		// Show More Event
		var	howItems = $('.top-places-item').length;

		var n = 3;

		$('.top-places-item:gt('+n+')').hide();

		$('.show-more').show();

		$('.show-more').on('click', function() {

			var checkLast = $('.top-places-item').last().css('display') == 'none';


			$( ".show-more:contains('Daha Az Göster')" ).text( "Daha Fazla Göster" );

			if ( checkLast == true ) {

				$('.top-places-item').hide();

				n = n + 4;

				$(this).text('Daha Fazla Göster');

				if ( n > howItems ){
					$(this).text('Daha Az Göster');
				}

				$('.top-places-item').show();

				$('.top-places-item:gt('+n+')').hide();

			}

			else{

				n = 3;

				$('.top-places-item:gt('+n+')').hide();

			}
		});

	}
	if ($(window).width() > 768 && $(window).width() <= 991){


		$('.category-place').find('.other-main:gt(5)').hide();


		// Show More Event
		var	howItems = $('.top-places-item').length;

		var n = 5;

		$('.top-places-item:gt('+n+')').hide();

		$('.show-more').show();

		$('.show-more').on('click', function() {

			var checkLast = $('.top-places-item').last().css('display') == 'none';


			$( ".show-more:contains('Daha Az Göster')" ).text( "Daha Fazla Göster" );

			if ( checkLast == true ) {

				$('.top-places-item').hide();

				n = n + 6;

				$(this).text('Daha Fazla Göster');

				if ( n >= howItems ){
					$(this).text('Daha Az Göster');
				}

				$('.top-places-item').show();

				$('.top-places-item:gt('+n+')').hide();

			}

			else{

				n = 5;

				$('.top-places-item:gt('+n+')').hide();

			}
		});

	}
	if ($(window).width() > 991 ) {
		// Show More Event
		var	howItems = $('.top-places-item').length;

		var n = 11;

		$('.top-places-item:gt('+n+')').hide();

		$('.show-more').show();

		$('.show-more').on('click', function() {

			var checkLast = $('.top-places-item').last().css('display') == 'none';


			$( ".show-more:contains('Daha Az Göster')" ).text( "Daha Fazla Göster" );

			if ( checkLast == true ) {

				$('.top-places-item').hide();

				n = n + 12;

				$(this).text('Daha Fazla Göster');

				if ( n > howItems ){
					$(this).text('Daha Az Göster');
				}

				$('.top-places-item').show();

				$('.top-places-item:gt('+n+')').hide();

			}

			else{

				n = 11;

				$('.top-places-item:gt('+n+')').hide();

			}
		});

	}


});
