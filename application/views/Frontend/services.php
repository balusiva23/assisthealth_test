<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">


    <!-- responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- css -->
     <?php $this->load->view('Frontend/link-css'); ?> 




</head>

<body>

   

  <!-- header -->
   <?php $this->load->view('Frontend/header'); ?> 

   <!-- Navbar -->
   <?php $this->load->view('Frontend/navbar'); ?>


    <section class="inner-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12 sec-title colored text-center">
                    <h2>services</h2>
                    <ul class="breadcumb">
                        <li><a href="<?php echo base_url(); ?>">Home</a></li>
                        <li><i class="fa fa-angle-right"></i></li>
                        <li><span>services</span></li>
                    </ul>
                    <span class="decor"><span class="inner"></span></span>
                </div>
            </div>
        </div>
    </section>

    <section class="blog-home sec-padding">
        <div class="container">

            <div class="row">
                <div class="col-md-4">
                    <div class="single-blog-post">
                        <div class="img-box">
                            <img src="<?php echo base_url(); ?>assets/web_assets/img/doctor-appointments.jpg" alt="">
                            <div class="overlay">
                                <div class="box">
                                    <div class="content">
                                        <ul>
                                            <li><a href="<?php echo base_url(); ?>doctor-appointments"><i class="fa fa-link"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content-box">

                            <div class="content">
                                <a href="<?php echo base_url(); ?>doctor-appointments">
                                    <h3>Doctor Appointments</h3>
                                </a>
                                <p>When it comes to your healthcare needs, finding the right specialist is crucial</p>
                                <a href="<?php echo base_url(); ?>doctor-appointments" class="thm-btn">View More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-blog-post">
                        <div class="img-box">
                            <img src="<?php echo base_url(); ?>assets/web_assets/img/tvt.jpg" alt="">
                            <div class="overlay">
                                <div class="box">
                                    <div class="content">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-link"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content-box">

                            <div class="content">
                                <a href="<?php echo base_url(); ?>post-hospital-care">
                                    <h3>Post Hospital Care
                                    </h3>
                                </a>
                                <p>At AssistHealth, we understand that the journey to recovery doesn't</p>
                                <a href="<?php echo base_url(); ?>post-hospital-care" class="thm-btn">View More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-blog-post">
                        <div class="img-box">
                            <img src="<?php echo base_url(); ?>assets/web_assets/img/health-records.jpg" alt="">
                            <div class="overlay">
                                <div class="box">
                                    <div class="content">
                                        <ul>
                                            <li><a href="<?php echo base_url(); ?>organizing-health-records"><i class="fa fa-link"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content-box">

                            <div class="content">
                                <a href="<?php echo base_url(); ?>organizing-health-records">
                                    <h3>Organize Health Records

                                    </h3>
                                </a>
                                <p>At AssistHealth, we understand that the journey to recovery doesn't</p>
                                <a href="<?php echo base_url(); ?>organizing-health-records" class="thm-btn">View More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row pt-30">
                <div class="col-md-4">
                    <div class="single-blog-post">
                        <div class="img-box">
                            <img src="<?php echo base_url(); ?>assets/web_assets/img/health-navigator.jpg" alt="">
                            <div class="overlay">
                                <div class="box">
                                    <div class="content">
                                        <ul>
                                            <li><a href="<?php echo base_url(); ?>healthcare-navigation"><i class="fa fa-link"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content-box">

                            <div class="content">
                                <a href="<?php echo base_url(); ?>healthcare-navigation">
                                    <h3>Healthcare Navigation
                                    </h3>
                                </a>
                                <p>At AssistHealth, we understand that navigating the complex healthcare</p>
                                <a href="<?php echo base_url(); ?>healthcare-navigation" class="thm-btn">View More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-blog-post">
                        <div class="img-box">
                            <img src="<?php echo base_url(); ?>assets/web_assets/img/cccb.jpg" alt="">
                            <div class="overlay">
                                <div class="box">
                                    <div class="content">
                                        <ul>
                                            <li><a href="<?php echo base_url(); ?>health-education-and-support"><i
                                                        class="fa fa-link"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content-box">

                            <div class="content">
                                <a href="<?php echo base_url(); ?>health-education-and-support">
                                    <h3>Health Education and Support:

                                    </h3>
                                </a>
                                <p>At AssistHealth, we believe that knowledge is a powerful tool in achieving</p>
                                <a href="<?php echo base_url(); ?>health-education-and-support" class="thm-btn">View More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-blog-post">
                        <div class="img-box">
                            <img src="<?php echo base_url(); ?>assets/web_assets/img/kv5.jpg" alt="">
                            <div class="overlay">
                                <div class="box">
                                    <div class="content">
                                        <ul>
                                            <li><a href="<?php echo base_url(); ?>24-care-helpline"><i class="fa fa-link"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content-box">

                            <div class="content">
                                <a href="<?php echo base_url(); ?>24-care-helpline">
                                    <h3>24/7 Care Helpline
                                    </h3>
                                </a>
                                <p>At AssistHealth, we understand that health concerns can arise at any time</p>
                                <a href="<?php echo base_url(); ?>24-care-helpline" class="thm-btn">View More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



<!-- footer -->
   <?php $this->load->view('Frontend/footer'); ?>


</body>


</html>