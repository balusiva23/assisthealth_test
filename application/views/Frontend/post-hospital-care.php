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
                    <h2>POST HOSPITAL CARE</h2>
                    <ul class="breadcumb">
                        <li><a href="<?php echo base_url(); ?>">Home</a></li>
                        <li><i class="fa fa-angle-right"></i></li>
                        <li><span>POST HOSPITAL CARE</span></li>
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
                    <img src="<?php echo base_url(); ?>assets/web_assets/img/post-hospital-care.jpg" alt="">
                </div>
                <div class="col-md-7 single-team-member">
                    <h3>A Smooth Transition from Hospital to Home with AssistHealth</h3>
                    <p> At AssistHealth, we understand that the journey to recovery doesn't end when you leave the
                        hospital. That's why we
                        provide a valuable service exclusively for our registered members – post-hospital care. Our
                        mission is to assist our
                        members in achieving a seamless transition from the hospital to the comfort of their own home
                        after their hospital stay.

                    </p>

                    <p> We recognize that once you're home, there can be confusion and uncertainty regarding treatment
                        plans and protocols. The
                        stress on both the patient and their family members can be overwhelming. That's where our
                        dedicated team steps in. We
                        act as a bridge between you and your treatment doctor, ensuring effective communication and
                        maximizing the quality of
                        care you receive.

                    </p>

                    <p> Our team works closely with your treatment doctor, coordinating your post-hospital care to
                        ensure it aligns with the
                        prescribed treatment plan. We understand that each individual's recovery process is unique, so
                        we tailor our assistance
                        to meet your specific needs. From helping you understand and follow the treatment protocols to
                        coordinating with
                        healthcare professionals, our goal is to provide the support and guidance you require for a
                        successful recovery.

                    </p>
                    <p> We assist in finding the necessary healthcare professionals to meet your specific care needs.
                        Whether it's arranging for
                        skilled nurses, physiotherapists, or any other healthcare professionals, we strive to connect
                        you with the right experts
                        who can provide the highest level of care during your recovery journey.

                    </p>
                    <p> Your well-being and peace of mind are our top priorities. With AssistHealth, you can rest
                        assured that you have a
                        dedicated team by your side, helping you navigate the road to recovery with confidence. Join
                        AssistHealth today and
                        experience a smooth transition from the hospital to the comfort of your own home. Your health
                        and recovery matter to us.

                    </p>

                </div>
            </div>
        </div>
    </section>



<!-- footer -->
   <?php $this->load->view('Frontend/footer'); ?>



</body>


</html>