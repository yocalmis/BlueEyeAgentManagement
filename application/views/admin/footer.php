<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
?>


</div> 
</main>
<div class="s-n_o"></div>
<div class="iframeModal">
	<div class="iframeModal__header">
		<h3 class="iframeModal__heading">Turları Sırala</h3>
		<p class="divider"></p>
	</div>
	<div class="iframeModal__content">
		<iframe class="iframeModal__iframe" src="" frameborder="0"></iframe>
	</div>
	<div class="iframeModal__footer">
		<a class="iframeModal__close">Kapat</a>
	</div>
</div>
<script> 
	document.body.onload = () => {
		setTimeout(() => {
			let preloader = document.getElementById('preloader');
			if ( !preloader.classList.contains('done') ) {
				preloader.classList.add('done');
				setTimeout(()=> {
					preloader.parentNode.removeChild(preloader);

				}, 350);
			} 
		}, 150);
	} 
</script> 
<?php foreach($js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>

<script src="<?php echo base_url(); ?>assets/jquery.sumoselect.min.js"></script>

    <!--<script>
    
  tinymce.init({
    selector: '.texteditor',
    width: '100%',
    height: 300,
    toolbar: 'fontselect | fontsizeselect | styleselect | bold italic | link | alignleft aligncenter alignright alignjustify | numlist bullist outdent indent | removeformat',
    style_formats_merge: true,
    style_formats: [
      {
        title: 'Font Weight',
        items: [
          { title: 'Thin', inline: 'span', styles: { 'font-weight': '100' } },
          { title: 'Extra Light', inline: 'span', styles: { 'font-weight': '200' } },
          { title: 'Light', inline: 'span', styles: { 'font-weight': '300' } },
          { title: 'Regular', inline: 'span', styles: { 'font-weight': '400' } },
          { title: 'Medium', inline: 'span', styles: { 'font-weight': '500' } },
          { title: 'Semi Bold', inline: 'span', styles: { 'font-weight': '600' } },
          { title: 'Bold', inline: 'span', styles: { 'font-weight': '700' } },
          { title: 'Extra Bold', inline: 'span', styles: { 'font-weight': '800' } },
          { title: 'Black', inline: 'span', styles: { 'font-weight': '900' } },
        ]
      }
    ],
    content_css: [
    '//fonts.googleapis.com/css?family=Roboto:100,200,300,400,500,500i,600,600i,700,800,900',
    '//fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,500i,600,600i,700,800,900',
    ],
    font_formats: 'Roboto=roboto,sans-serif; Raleway=raleway,sans-serif;'
  });
</script>-->
<script type="text/javascript">
	let editor = document.querySelector('.texteditor');

  /*if (editor){





     $(function() {
      $('textarea.texteditor').froalaEditor({
        toolbarSticky: false,
        fontSizeSelection: true,
        toolbarButtons: [
          'bold',
          'italic',
          'underline',
          '|',
          'fontFamily',
          'fontSize',
          'inlineStyle',
          '|',
          'formatOL',
          'formatUL',
          '|',
          'undo',
          'redo'
        ],

        fontSizeUnit: 'pt',
        fontSize: ['11', '13', '16', '18', '20', '22', '24', '28', '30', '32'],
        inlineStyles: {
          'Thin'        : 'font-weight: 100;',
          'Extra Light' : 'font-weight: 200;',
          'Light'       : 'font-weight: 300;',
          'Regular'     : 'font-weight: 400;',
          'Medium'      : 'font-weight: 500;',
          'Semi Bold'   : 'font-weight: 600;',
          'Bold'        : 'font-weight: 700;',
          'Extra Bold'  : 'font-weight: 800;',
          'Black'       : 'font-weight: 900;'
        },
        fontFamily: {
          "Roboto, sans-serif": 'Roboto',
          "Raleway, sans-serif": 'Raleway',
        },
        fontFamilySelection: true,
      });
    });
}*/




$.fn.stickynav = function ( options ){


	var 
	nav       = $(this),
	navHeight = nav.height(),
	windowN   = $(window);

	function scrollEvent() {

		var scrollTop = windowN.scrollTop();

		if (scrollTop == 0) {
			nav.removeClass('sticky');
		}

		if (scrollTop > navHeight) {

			setTimeout( function(){
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


$( document ).ready(function() {



	$('.iframeTrigger').on('click', function() {
		var 
		iframeId	= $(this).attr('href'),
		updateLink	= iframeId.replace("#", ""),
		fullLink	= '<?php echo base_url(); ?>admin/admin/sirala/' + updateLink;

		$('.s-n_o').addClass('s-n_o_o');
		$('.iframeModal').addClass('iframModalActive');
		$('.iframeModal__iframe').attr('src', fullLink);
	});


  /*$('.texteditor').each( function () {

    CKEDITOR.replace( this.id , {
      stylesSet: [

      { name: 'Thin', element: 'strong', styles: { 'font-weight': '100' } },
      { name: 'Extra Light', element: 'strong', styles: { 'font-weight': '200' } },
      { name: 'Light', element: 'strong', styles: { 'font-weight': '300' } },
      { name: 'Regular', element: 'sstrongpan', styles: { 'font-weight': '400' } },
      { name: 'Medium', element: 'strong', styles: { 'font-weight': '500' } },
      { name: 'Semi Bold', element: 'strong', styles: { 'font-weight': '600' } },
      { name: 'Bold', element: 'strong', styles: { 'font-weight': '700' } },
      { name: 'Extra Bold', element: 'strong', styles: { 'font-weight': '800' } },
      { name: 'Black', element: 'strong', styles: { 'font-weight': '900' } }

    ]
    });


});*/

var winW = $(window).width();
$('.s-n_h').height($('.side-header').height());
$('.side-nav, .side-header, .y-n_r_i').addClass('noselect');
$('.side-nav, .side-header, .y-n_r_i').find('i').addClass('material-icons');
$('.side-header > h3').html($('.form-title-left > a').text());
$('.form-title-left').hide()
$('.form-title').hide();
$('.o_s-n').click(function(){
	$('.side-nav').addClass('side-nav-open');
	$('.s-n_o').addClass('s-n_o_o');
}); 
$('.s-n_o').click(function(){
	$('.side-nav').removeClass('side-nav-open');
	$('.s-n_o').removeClass('s-n_o_o');
	$('.iframeModal').removeClass('iframModalActive');
});
$('.iframeModal__close').click(function() {
	$('.s-n_o').removeClass('s-n_o_o');
	$('.iframeModal').removeClass('iframModalActive');
});
$('.side-header').stickynav();
$('.m_s_msg').SumoSelect({
	selectAll: true,
	locale: ['Ok', 'Kapat', 'Hepsini Seç']
});
$('.mine-trigger').click(function(){

	var control_click  = $(this).hasClass('mine-trigger-open');


	if (control_click == false){
		$('.mine-trigger').removeClass('mine-trigger-open');
		$('.mine-trigger').children('.mine-content').css('visibility', 'hidden');
		$(this).addClass('mine-trigger-open');
		$(this).children('.mine-content').css('visibility', 'visible');
	}
	if (control_click == true) {
		$(this).removeClass('mine-trigger-open');
		$(this).children('.mine-content').css('visibility', 'hidden');
	} 
});
$('.y_r_y_b').click(function() {
	setTimeout(function(){
		window.location.reload();
	});
});

if ( (winW < 768) && ($('.side-header > h3').width() > 300) ) {
	$('.s-h_r').hide();
}

$('.y_r_m').on('mouseover', function(){

	$(this).addClass('clickable');

	$(this).not('.y_r_m > a').click(function() {

		$(this).children('a').hide();
		$(this).children('img').addClass('fullWH');
		$('.s-n_o').addClass('s-n_o_o').css({
			'cursor': 'zoom-out',
			'cursor': '-webkit-zoom-out',
			'background': 'rgba(0,0,0,.85)'
		});
		$('body').css('overflow', 'hidden');

		$('.s-n_o_o').click(function() {

			$('.y_r_m').children('a').show();
			$('.fullWH').removeClass('fullWH');
			$('.s-n_o').css({
				'cursor': '',
				'background': '',
			}).removeClass('s-n_o_o');
			$('body').css('overflow', 'auto');

		});

	});
}).on('mouseout', function() {
	$(this).removeClass('clickable');
});



















var a = document.getElementById("field-baslangic_saati");
var b = document.getElementById("field-bitis_saati");

if ( (a) || (b) ){
	a.type="time";
	b.type="time";

}


});
$(document).mouseup(function(e) {
	var my_inner = $('.mine-trigger');

	if (!my_inner.is(e.target) && my_inner.has(e.target).length === 0) {
		$('.mine-trigger').removeClass('mine-trigger-open').children('.mine-content').css('visibility', 'hidden');
	}
});
</script>
<script>
	let trigger = document.querySelector('a.dil');
	window.onclick = function (ev) {
		if (ev.target.className == 'dil') {
			let dropMenu = document.querySelector('.dil__main');
			if (dropMenu.classList.contains('active')) {
				dropMenu.classList.remove("active");
			}
			else {
				dropMenu.classList.add("active");

			}

		}
		if (ev.target.className !== 'dil') {
			let dropMenu = document.querySelector('.dil__main');
			if (dropMenu.classList.contains('active')) {
				dropMenu.classList.remove("active");
			}

		}
	};

</script>

</body>
</html>
