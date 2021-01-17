 <!DOCTYPE html>
<html lang="tr:TR">
<head>
	<meta charset="UTF-8">
	<title>ögfkldsjnbm</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Roboto:,400,500,600" type='text/css' rel="stylesheet">
	<style>
		body{
			padding: 0;
			margin: 0;
			font-family: 'Roboto', sans-serif;
		}
		#siralama{
			margin: 0;
			list-style-type: none !important;
			-webkit-touch-callout: none;
			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
			padding: 0;
			background-color: #e5e5e5;
			border-radius: 4px;
		}
		.siralamaHandle{
			cursor: move;

		}
		.siralamaItem {
			padding: .5rem 1rem;
			padding-left: 0;
			background-color: #fff;
			display: -webkit-flex;
			display: -moz-flex;
			display: -ms-flex;
			display: -o-flex;
			display: flex;
			-ms-align-items: center;
			align-items: center;
			border-top: 1px solid rgba(0,0,0,.13);
		}
		.siralamaItem:first-child{
			border-top: none;
		}
		.siralamaHandle:before{
			content: "";
			float: left;
			width: 20px;
			height: 20px;
			margin: 0 8px;
			background: url(<?php echo base_url(); ?>assets/sorting/drag.svg) no-repeat 0 0;
			opacity: .56;
		}
		.ui-sortable-helper{
			border-radius: 4px;
			-webkit-box-shadow: 0 10px 20px rgba(0,0,0,0.09), 0 6px 6px rgba(0,0,0,0.13);
			box-shadow:0 10px 20px rgba(0,0,0,0.09), 0 6px 6px rgba(0,0,0,0.13);
		}
		.bcg_darkness {
			background-color: white;
			display: -webkit-flex;
			display: -moz-flex;
			display: -ms-flex;
			display: -o-flex;
			display: flex;
			-ms-align-items: center;
			align-items: center;
			justify-content: center;
			position: fixed;
			z-index: -1;
			top: 0;
			right: 0;
			bottom: 0;
			left: 0;
			opacity: 0;
			visibility: hidden;
			transition-property: opacity, visibility;
			-webkit-transition: opacity, visibility 150ms ease-in-out;
			-o-transition: opacity, visibility 150ms ease-in-out;
			transition: opacity, visibility 150ms ease-in-out;
		}
		.bcg_darkness.active {
			opacity: 1;
			visibility: visible;
			z-index: 25;
		}
		.tooltip{
			position: fixed;
			top: 15px;
			right: 2rem;
			transform: translateX(200%);
			-webkit-transition: transform 250ms cubic-bezier(0.53, 0.01, 0.36, 1.63) !important;
			-o-transition: transform 250ms cubic-bezier(0.53, 0.01, 0.36, 1.63) !important;
			transition: transform 250ms cubic-bezier(0.53, 0.01, 0.36, 1.63) !important;
			display: -webkit-flex;
			display: -moz-flex;
			display: -ms-flex;
			display: -o-flex;
			display: flex;
			-ms-align-items: center;
			align-items: center;
			padding: .5rem;
			padding-right: 1rem;
			border-radius: 4px;
			-webkit-box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
			box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
			font-weight: 500;
			color: white;

		}
		.tooltip img{
			max-width: 30px;
			width: 100%;
			margin-right: .35rem;
		}
		.tooltip.done{
			background-color: #4CAF50;
		}
		.tooltip.error{
			background-color: #CF3426;
		}
		.tooltip.active{
			transform: translateX(0);
		}

	</style>
</head>
<body>
		<ul id="siralama">
		
			<?php if( $turlar ) : foreach( $turlar as $dizi ) : ?>

				<li class="siralamaItem" id="<?php echo $dizi["id"]; ?>">
					<span class="siralamaHandle"></span><?php echo $dizi["adi"]; ?>
				</li>

			<?php endforeach; endif; ?>

		</ul>



	<div class="bcg_darkness">
		<div class="loaderGif">
			<img src="<?php echo base_url(); ?>assets/sorting/loading.gif">
		</div>
	</div>
	<div class="tooltip done">
		<img src="<?php echo base_url(); ?>assets/sorting/done.png">
		Tamamlandı
	</div>
	<div class="tooltip error">
		<img src="<?php echo base_url(); ?>assets/sorting/done.png">
		Hata
	</div>


	<script src="<?php echo base_url(); ?>assets/sorting/jquery.js"></script>
	<script src="<?php echo base_url(); ?>assets/sorting/jquery-ui.js"></script>
	<script>
		$(document).ready(function () {
			$('#siralama').sortable({
				handle	: '.siralamaHandle',
				axis	: 'y',
				stop	: function(event, ui) {

					var 
					order		= $(this).sortable('toArray'),
					veriler		= "&data="+order;

					$('.bcg_darkness').addClass('active');

					$.ajax({
						type	: "POST", 
						url		: "<?php echo base_url(); ?>admin/admin/sira_al",
						data	: veriler, 
						success	: function(cevap){ 
							$('.bcg_darkness').removeClass('active');
							$('.tooltip.done').addClass('active');
							setTimeout(function() {
								$('.tooltip.done').removeClass('active');
							}, 2000);
						},
						error	: function(cevap){ 
							$('.bcg_darkness').removeClass('active');
							$('.tooltip.error').addClass('active');
							setTimeout(function() {
								$('.tooltip.error').removeClass('active');
							}, 2000);
						}
					});
		

				},
			});
		});
	</script>
</body>
</html>