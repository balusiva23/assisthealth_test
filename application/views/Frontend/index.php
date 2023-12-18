<!DOCTYPE html>
<html lang="en">


<head>
	<meta charset="UTF-8">
	

	<!-- responsive meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

     <!-- css -->
  <?php $this->load->view('Frontend/link-css'); ?> 

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>


  <!-- header -->
   <?php $this->load->view('Frontend/header'); ?> 

   <!-- Navbar -->
   <?php $this->load->view('Frontend/navbar'); ?>


 <!-- /.mainmenu-area -->


	<section class="rev_slider_wrapper">
		<div id="slider1" class="rev_slider" data-version="5.0">
			<ul>
				<li data-transition="parallaxvertical">
					<img src="<?php echo base_url(); ?>assets/web_assets/img/sv1.jpg" alt="" width="1920" height="705" data-bgposition="top center"
						data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="1">
					<div class="tp-caption sfl tp-resizeme thm-banner-h1" data-x="left" data-hoffset="0" data-y="top"
						data-voffset="225" data-whitespace="nowrap" data-transform_idle="o:1;" data-transform_in="o:0"
						data-transform_out="o:0" data-start="500">
						<span class=" thm-banner-h1 blue-bg">Assist </span><span class="thm-banner-h1 black-bg">Health</span>
					</div>

					<div class="tp-caption sfb tp-resizeme thm-banner-h3" data-x="left" data-hoffset="0" data-y="top"
						data-voffset="353" data-whitespace="nowrap" data-transform_idle="o:1;" data-transform_in="o:0"
						data-transform_out="o:0" data-start="1500">
						<b>Personalized Healthcare Support<br> & Preventive Care</b>
					</div>

					<div class="tp-caption sfl tp-resizeme" data-x="left" data-hoffset="0" data-y="top"
						data-voffset="474" data-whitespace="nowrap" data-transform_idle="o:1;" data-transform_in="o:0"
						data-transform_out="o:0" data-start="2300">
						<a href="tel:+919611232519" class="thm-btn">Call us Today</a>
					</div>
					 
				</li>
				<li data-transition="parallaxvertical">
					<img src="<?php echo base_url(); ?>assets/web_assets/img/sv2.jpg" alt="" width="1920" height="705" data-bgposition="top center"
						data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="2">
					<div class="tp-caption sfl tp-resizeme thm-banner-h1 blue-bg" data-x="left" data-hoffset="0"
						data-y="top" data-voffset="209" data-whitespace="nowrap" data-transform_idle="o:1;"
						data-transform_in="o:0" data-transform_out="o:0" data-start="500">
						Personalized 
					</div>
					<div class="tp-caption sfr tp-resizeme thm-banner-h1 heavy black-bg" data-x="left" data-hoffset="0"
						data-y="top" data-voffset="263" data-whitespace="nowrap" data-transform_idle="o:1;"
						data-transform_in="o:0" data-transform_out="o:0" data-start="1000">
					Healthcare 
					</div>
					<div class="tp-caption sfb tp-resizeme thm-banner-h3" data-x="left" data-hoffset="0" data-y="top"
						data-voffset="341" data-whitespace="nowrap" data-transform_idle="o:1;" data-transform_in="o:0"
						data-transform_out="o:0" data-start="1500">
					Support & Preventive Care
					</div>
				 
					<div class="tp-caption sfl tp-resizeme" data-x="left" data-hoffset="0" data-y="top"
						data-voffset="465" data-whitespace="nowrap" data-transform_idle="o:1;" data-transform_in="o:0"
						data-transform_out="o:0" data-start="2300">
						<a href="tel:+919611232519" class="thm-btn">Call us Today</a>
					</div>
				 
				</li>
			</ul>
		</div>
	</section>


	<section class="sec-padding about-content full-sec">
		<div class="container">
			<div class="row">

				<div class="col-lg-5 col-md-12">
					<div class="full-sec-content">
						<div class="sec-title style-two">
							<h2>More about us</h2>
							<span class="decor">
								<span class="inner"></span>
							</span>
						</div>
						<h4 style="color:#000">Invest in yourself </h4> <h3>Start your Health journey with us</h3>
						<br>
						<p> At AssistHealth, we are proud to have a team of experienced professionals dedicated to
							providing personalized health
							assistance to our members. Our team consists of Primary Care Doctors, Health Navigators, and
							support staff who work
							together to ensure that our members receive the highest level of care and support.
						</p>
						<br>

						<br>
						<a href="<?php echo base_url(); ?>About" class="thm-btn">Read More</a>
					</div>
				</div>
				<div class="col-md-7 hidden-md text-right">
					<img src="<?php echo base_url(); ?>assets/web_assets/img/vb.png" alt="Awesome Image" />
				</div>
			</div>
		</div>
	</section>


	<br><br><br><br>

	<section class="fact-counter-wrapper sec-padding">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-4">
					<h3>"AssistHealth: Your All-in-One Healthcare Solution. We are dedicated to ensuring you receive the finest medical care and support available."</h3><br><br>
					<a href="<?php echo base_url(); ?>login" class="thm-btn inverse">Join AssistHealth</a>
				</div>
				<div class="col-lg-6 col-md-8">
					<div class="single-fact">
						<div class="icon-box">
						      <i class="fa fa-handshake-o" aria-hidden="true"></i>
						</div>
						<span class="timer" data-from="10" data-to="5" data-speed="5000"
							data-refresh-interval="50">5</span>
						<p>Our Team</p>
					</div>
					<div class="single-fact">
						<div class="icon-box">
							<i class="flaticon-people-3"></i>
						</div>
						<span class="timer" data-from="10" data-to="1000" data-speed="5000"
							data-refresh-interval="50">1000</span>
						<p>Members</p>
					</div>
					<div class="single-fact">
						<div class="icon-box">
						 <i class="fa fa-map-marker" aria-hidden="true"></i>
						</div>
						<span class="timer" data-from="10" data-to="3" data-speed="5000"
							data-refresh-interval="50">3</span>
						<p>Cities</p>
					</div>
				</div>
			</div>
		</div>
	</section>


	<section class="sec-padding meet-doctors">
		<div class="container">
			<div class="sec-title text-left">
				<h2> Our Services </h2>
				<p> Start Your Health Journey With Us </p>
				<span class="decor"><span class="inner"></span></span>
			</div>
			<div class="clearfix">
				<div class="team-carousel owl-carousel owl-theme">
					<div class="item">
						<div class="single-team-member">
							<div class="img-box">
								<img src="<?php echo base_url(); ?>assets/web_assets/img/doctor-appointments.jpg" alt="">

							</div>
							<h3>Doctor Appointments</h3>
							<p>When it comes to your healthcare needs, finding the right specialist is crucial</p>

							<a href="<?php echo base_url(); ?>doctor-appointments" class="thm-btn">View More</a>
						</div>
					</div>
					<div class="item">
						<div class="single-team-member">
							<div class="img-box">
								<img src="<?php echo base_url(); ?>assets/web_assets/img/tvt.jpg" alt="">

							</div>
							<h3>Post Hospital Care</h3>
							<p>At AssistHealth, we understand that the journey to recovery doesn't</p>

							<a href="<?php echo base_url(); ?>post-hospital-care" class="thm-btn">View More</a>
						</div>
					</div>
					<div class="item">
						<div class="single-team-member">
							<div class="img-box">
								<img src="<?php echo base_url(); ?>assets/web_assets/img/health-records.jpg" alt="">

							</div>
							<h3>Organize Health Records</h3>
							<p>At AssistHealth, we understand the importance of well-organized health</p>

							<a href="<?php echo base_url(); ?>organizing-health-records" class="thm-btn">View More</a>
						</div>
					</div>
					<div class="item">
						<div class="single-team-member">
							<div class="img-box">
								<img src="<?php echo base_url(); ?>assets/web_assets/img/health-navigator.jpg" alt="">

							</div>
							<h3>Healthcare Navigation</h3>
							<p>At AssistHealth, we understand that navigating the complex healthcare</p>

							<a href="<?php echo base_url(); ?>healthcare-navigation" class="thm-btn">View More</a>
						</div>
					</div>
					<div class="item">
						<div class="single-team-member">
							<div class="img-box">
								<img src="<?php echo base_url(); ?>assets/web_assets/img/cccb.jpg" alt="">

							</div>
							<h3>Health Education and Support:</h3>
							<p>At AssistHealth, we believe that knowledge is a powerful tool in achieving</p>

							<a href="<?php echo base_url(); ?>health-education-and-support" class="thm-btn">View More</a>
						</div>
					</div>
					<div class="item">
						<div class="single-team-member">
							<div class="img-box">
								<img src="<?php echo base_url(); ?>assets/web_assets/img/kv5.jpg" alt="">

							</div>
							<h3>24/7 Care Helpline</h3>
							<p>At AssistHealth, we understand that health concerns can arise at any time</p>

							<a href="<?php echo base_url(); ?>24-care-helpline" class="thm-btn">View More</a>
						</div>
					</div>


				</div>
			</div>
		</div>
	</section>


	<section class="sec-padding testimonials-wrapper">
		<div class="container">
			<div class="sec-title colored text-center">
				<h2>Testimonials</h2>
				<span class="decor">
					<span class="inner"></span>
				</span>
			</div>
			<div class="testimonaials-carousel owl-carousel owl-theme">
				<div class="item">
					<div class="single-testimonaials">
						<div class="qoute-box">
							<i class="qoute">“</i>
						</div>
						<p>The AssistHealth Team excels in coordinating efficient and top-tier healthcare services. They ensure patients receive the most suitable appointments with exceptional doctors in their respective fields. Moreover, they diligently follow up on consultations, diagnostics, procedures, and overall patient care, from initial appointment scheduling to post-operative support. This remarkable dedication deserves commendation. Excellent work!
</p>
						<h3>Dr Vinay Babu,
</h3>
						<span> Bioneeds</span>
					</div>
				</div>
				<div class="item">
					<div class="single-testimonaials">
						<div class="qoute-box">
							<i class="qoute">“</i>
						</div>
						<p>During my recent diagnostic appointment, Assist Health proved to be instrumental in guaranteeing a seamless procedure. Their crucial role involved coordinating with the Diagnostic Centre to ensure timely arrangements, enabling a smooth experience. Moreover, they efficiently managed all the necessary documents required for the procedure and went above and beyond by taking care of travel logistics to and from the hospital. Their invaluable assistance contributed to a hassle-free and positive experience.
</p>
						<h3>Vikram Sai Lekkala
</h3>
						 
					</div>
				</div>
				<div class="item">
					<div class="single-testimonaials">
						<div class="qoute-box">
							<i class="qoute">“</i>
						</div>
						<p>I am so grateful for the care and support that the Assist Health team provided to my father. They made a difficult time in our lives a little bit easier. I would highly recommend them to anyone who is facing a cancer diagnosis.
</p>
						<h3>Mr Sai Arun Kumar, 
						<span>Texas, USA
</h3></span>
					</div>
				</div>
				
					<div class="item">
					<div class="single-testimonaials">
						<div class="qoute-box">
							<i class="qoute">“</i>
						</div>
						<p>AssistHealth helped me manage my health records and made my hospital journey very easy. The Navigators helped me throughout the procedures. I 100% recommend it!
</p>
						<h3>Ruthwika Lekkala 
						 
</h3> 
					</div>
				</div>
				
					<div class="item">
					<div class="single-testimonaials">
						<div class="qoute-box">
							<i class="qoute">“</i>
						</div>
						<p> As an NRI, I was confused about getting medical help, when I visited India, AssistHealth helped me in getting specialist appointments and the navigators helped me in every step of my hospital visit. cc
</p>
						<h3>Laxman Boyapati
						 
</h3> 
					</div>
				</div>
				 
			 
				 
			 
				 
			 
			 
			 
				 
			</div>
		</div>
	</section>




<!-- footer -->
   <?php $this->load->view('Frontend/footer'); ?>

</body>


</html>