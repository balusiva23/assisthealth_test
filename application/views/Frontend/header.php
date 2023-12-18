
	<header class="header">
		<div class="container">
			<div class="logo pull-left">
				<a href="<?php echo base_url(); ?>">
					<img src="<?php echo base_url(); ?>assets/web_assets/img/logo.png" alt="Awesome Image" />
				</a>
			</div>
			<div class="header-right-info pull-right clearfix">

				<div class="single-header-info">
					<div class="icon-box">
						<div class="inner-box">
							<i class="flaticon-telephone"></i>
						</div>
					</div>
					<div class="content">
						<h3>Call Now</h3>
						<p><b><a href="tel:+91 9611232519">+91 96112 32519</a></b></p>
					</div>
				</div>
				<?php if($this->session->userdata('user_login_id')) { ?>
                 <div class="single-header-info">
                  <label class="dropdown">

				  <div class="dd-button">
				    <?php echo $this->session->userdata('name') ?>
				  </div>

				  <input type="checkbox" class="dd-input" id="test">

				  <ul class="dd-menu">
				    <li><a href="<?php echo base_url().$this->session->userdata('url') ?>">Profile</a></li>
				    <li class="divider"></li>
				    <li><a href="<?php echo base_url(); ?>Login/Logout"> Logout</a></li>
				   
				  </ul>
				  
				</label>
			   </div>

		     	<?php }else{ ?>

					<div class="single-header-info">
					<a href="<?php echo base_url(); ?>login" 
						class="thm-btn">Login/Register</a>
				</div>

			<?php } ?>
			</div>
		</div>
	</header> <!-- /.header -->