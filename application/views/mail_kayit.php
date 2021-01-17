		<section class="abone-inner">
			<div class="container">
				<h4>
					<?php echo $this->session->userdata('lng')["email_slgn1"]; ?>
				</h4>
				<p class="under-header">
					<?php echo $this->session->userdata('lng')["email_slgn2"]; ?>
				</p>
				<div class="container">
					<div class="row abone-row">
						<div class="col">
							<form id="abone" method="post" action="<?php echo base_url(); ?>giris/abone">
								<div class="input-field">
									<input id="email" type="email" name="email" required="required">
									<label for="email">
										<?php 
										echo $this->session->userdata('lng')["email_slgn_label"]; 
										?>
									</label>
								</div>
								<div class="input-field">
									<button class="btn waves-effect blue darken-1" type="submit">
										<?php 
										echo $this->session->userdata('lng')["email_slgn_btn"]; 
										?>
									</button>	
								</div>
							</form>
						</div>
					
					</div>
					<div class="container">
						<p class="abone-aciklama">
							<?php echo $this->session->userdata('lng')["email_slgn_acklma"]; ?>
						</p>
					</div>
				</div>
			</div>
		</section>