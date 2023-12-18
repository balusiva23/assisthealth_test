<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="description" content="Responsive Admin Template" />
    <meta name="author" content="RedstarHospital" />
    <title>Admin Panel</title>
          <!-- css -->
     <?php $this->load->view('Backend/members/member-temp/link-css'); ?>
</head>
<!-- END HEAD -->

<body
    class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white white-sidebar-color logo-indigo">
    <div class="page-wrapper">
        <!-- start header -->
        <?php $this->load->view('Backend/members/member-temp/header'); ?> 

        <div class="page-container">
            <!-- start sidebar menu -->
           <?php $this->load->view('Backend/members/member-temp/sidebar'); ?> 
            <!-- end sidebar menu -->
            <!-- start page content -->
            <div class="page-content-wrapper mt-10">
                <div class="page-content mt-10">

                    <div class="row  mt-10">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box  mt-10">
                                <div class="card-head center">

                                    <h2>Your Doctor</h2>

                                </div>
                                <div class="card-body" id="bar-parent">
                                    <?php if(isset($navigator_data->profile_picture) || isset($navigator_data->name) || isset($navigator_data->mobile_no)) { ?>
                                    <div class="doctor-profile">
                                        <img src="<?php if(isset($navigator_data->profile_picture)) { echo base_url('assets/uploads/doctor_profile/').$navigator_data->profile_picture; }else{echo base_url('/assets/default.png'); }?>" class="doctor-pic" alt="">
                                        <div class="profile-usertitle">
                                            <div class="doctor-name"><?php if(isset($navigator_data->name)) { echo $navigator_data->name; }?> </div>
                                        </div>
                                        <!-- <p>A-103, shyam gokul flats, Mahatma Road <br>Mumbai</p> -->
                                        <div>
                                            <p><i class="fa fa-phone"></i> <a href="tel:<?php if(isset($navigator_data->mobile_no)) { echo $navigator_data->mobile_no; }?>"><?php if(isset($navigator_data->mobile_no)) { echo $navigator_data->mobile_no; } ?></a>
                                            </p>
                                        </div>

                                        <p><span  style="font-weight:bold" > Language Spoken :</span>
                                        <?php 
                                        $values = explode(",", $navigator_data->language_spoken);

                                            foreach ($values as $value) {
                                               // echo ucfirst($value) . " , ";
                                                  $value = ucfirst(trim($value));
                                            }
                                            echo implode(", ", $values);
                                         ?>
                                         </p>
                                         <br>
                                         <div style="    width: 50%; margin: 0 auto;"> 
                                             <?php if(isset($navigator_data->name)) {?>
                                             <p><span  style="font-weight:bold" > Intro about Doctor :</span> <?php echo $navigator_data->intro; ?></p>
                                         <?php } ?>
                                         </div>
                                         

                                    </div>
                                <?php }else{ ?>
                                    <div class="doctor-profile">
                                     
                                     <h5>Not Assigned...</h5>
                                    </div>

                              <?php  } ?>
                                </div>
                                <!-- <h3>Not Assigned</h3> -->
                            </div>
                        </div>
                    </div>
                    <!-- end admited patient list -->
                </div>
            </div>
            <!-- end page content -->
            <!-- start chat sidebar -->

            <!-- end chat sidebar -->
        </div>
        <!-- end page container -->
        <!-- start footer -->

       <?php $this->load->view('Backend/members/member-temp/footer'); ?> 
    <!-- end js include path -->
</body>



</html>