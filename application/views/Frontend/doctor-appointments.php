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
                    <h2>Doctor Appointments</h2>
                    <ul class="breadcumb">
                        <li><a href="<?php echo base_url(); ?>">Home</a></li>
                        <li><i class="fa fa-angle-right"></i></li>
                        <li><span>Doctor Appointments</span></li>
                    </ul>
                    <span class="decor"><span class="inner"></span></span>
                </div>
            </div>
        </div>
    </section>

    <section class="sec-padding doctor-profile">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <img src="<?php echo base_url(); ?>assets/web_assets/img/doctor-appointments.jpg" alt="">
                </div>
                <div class="col-md-7 single-team-member">
                    <h3>Find the Perfect Specialist with AssistHealth
                    </h3>
                    <p>When it comes to your healthcare needs, finding the right specialist is crucial. That's why
                        AssistHealth offers an
                        exclusive service for our registered members – we help you discover the best specialists.
                    </p>

                    <p>As a registered member of AssistHealth, you'll gain access to a network of highly skilled and
                        reputable specialists in
                        your area. Our dedicated team, composed of doctors and navigators, will closely collaborate with
                        you to understand your
                        specific medical requirements. This ensures that you receive the personalized care you truly
                        deserve.
                    </p>

                    <p>With our extensive knowledge, expertise, and constant tracking of your health records, we excel
                        at finding the ideal
                        specialist for you. We carefully evaluate your needs and match you with the most suitable expert
                        who specializes in your
                        specific condition. Whether you need a renowned cardiologist, an experienced orthopedic surgeon,
                        or any other
                        specialist, we have you covered.
                    </p>
                    <p>At AssistHealth, we are committed to excellence. We only recommend specialists who have a proven
                        track record of
                        delivering exceptional care and positive patient outcomes. Your well-being is our top priority,
                        and we strive to connect
                        you with doctors who possess the skills and expertise necessary to address your unique medical
                        concerns.
                    </p>
                    <p>Bid farewell to the hassle of researching and contacting friends, social groups, and specialists
                        on your own.
                        AssistHealth simplifies the process, saving you valuable time and effort. We handle all the
                        coordination and appointment
                        booking, ensuring a seamless experience from start to finish.
                    </p>
                    <p>Your health and peace of mind matter to us. With AssistHealth, you can confidently embark on your
                        journey to better
                        health, knowing that you have a dedicated team supporting you every step of the way.
                    </p>
                    <p>Join AssistHealth today and allow us to connect you with the best specialists who will provide
                        the exceptional care you
                        truly deserve. Your health is worth it.
                    </p>

                </div>
            </div>
        </div>
    </section>




<!-- footer -->
   <?php $this->load->view('Frontend/footer'); ?>




</body>


</html>