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
                    <h2>CART</h2>
                    <ul class="breadcumb">
                        <li><a href="<?php echo base_url(); ?>">Home</a></li>
                        <li><i class="fa fa-angle-right"></i></li>
                        <li><span>CART</span></li>
                    </ul>
                    <span class="decor"><span class="inner"></span></span>
                </div>
            </div>
        </div>
    </section>


    <section class="sec-padding about-content full-sec">
        <div class="container">
            <div class="row">

                <div class="col-lg-5 col-md-12">
                    <div class="full-sec-content">

                        <h3>Coming Soon........</h3>
                        <br>

                    </div>
                </div>
                <div class="col-md-7 hidden-md text-right">
                    <img src="<?php echo base_url(); ?>assets/web_assets/img/cart.jpg" alt="Awesome Image" />
                </div>
            </div>
        </div>
    </section>



<!-- footer -->
   <?php $this->load->view('Frontend/footer'); ?>



</body>


</html>