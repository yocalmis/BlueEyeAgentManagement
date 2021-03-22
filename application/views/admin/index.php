
<?php $this->load->view('admin/header.php'); ?>


<?php if($data['side_menu']=="Sürekli Turlar"){ ?>
	<!--<a href="<?php echo base_url(); ?>admin/admin/sirala/surekli">
		<?php echo $data['side_menu'];  ?> Sırala
	</a>-->
	<a href="#surekli" class="iframeTrigger">
		<i class="material-icons">sort</i><?php echo $data['side_menu'];  ?> Sırala
	</a>
<?php } ?>

<?php if($data['side_menu']=="Belirli Tarihli Turlar"){ ?>
	<!--<a href="<?php echo base_url(); ?>admin/admin/sirala/belirli" class="iframeTrigger">
		<?php echo $data['side_menu'];  ?> Sırala
	</a>-->
	<a href="#belirli" class="iframeTrigger">
		<i class="material-icons">sort</i><?php echo $data['side_menu'];  ?> Sırala
	</a>
<?php } ?>

<?php if($data['side_menu']=="Oteller"){ ?>
	<!--<a href="<?php echo base_url(); ?>admin/admin/sirala/otel" class="iframeTrigger">
		<?php echo $data['side_menu'];  ?> Sırala
	</a>-->
	<a href="#otel" class="iframeTrigger">
		<i class="material-icons">sort</i><?php echo $data['side_menu'];  ?> Sırala
	</a>
<?php } ?>

<?php echo $output; ?>
<?php  $this->load->view('admin/footer.php'); ?>