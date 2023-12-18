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
      <!-- Date Time item CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend_assets/bundles/flatpicker/css/flatpickr.min.css" />
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
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Booking
                                    Appointments</div>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="tabbable-line">
                            	<div class="d-flex justify-content-end">
                                  <a type="button" href="<?php  echo base_url('Member/Book_Appointment') ?>" 
                                        class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-circle btn-primary text-right"  style="text-transform: capitalize;">Add Appointment</a>
                                    </div>
                                <div class="tab-content">
                                    <div class="tab-pane active fontawesome-demo" id="tab1">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-head">
                                                        <header></header>
                                                        <div class="tools">
                                                            <a class="fa fa-repeat btn-color box-refresh"
                                                                href="javascript:;"></a>
                                                            <a class="t-collapse btn-color fa fa-chevron-down"
                                                                href="javascript:;"></a>
                                                            <a class="t-close btn-color fa fa-times"
                                                                href="javascript:;"></a>
                                                        </div>
                                                    </div>
                                                    <div class="card-body ">
                                                    
                                                       <div class="table-container">
                                                          <table
                                                            class="table table-striped table-bordered table-hover table-checkable order-column full-width"
                                                            id="example4">
                                                            <thead>
                                                                <tr>
                                                                    <th class="center">S.No</th>
                                                                    <th class="center">M-ID</th>
                                                                    <th class="center"> Name </th>
                                                                   <!--  <th class="center"> Address </th>
                                                                    <th class="center">Mobile</th>
                                                                    <th class="center">Prefered Date</th> -->
                                                                    <th class="center"> For Appointment </th>
                                                                    <th class="center"> Appointment Date </th>
                                                                    <th class="center"> Appointment Time </th>

                                                                    <th class="center"> Comments </th>
                                                                    <th class="center"> Payment Status </th>
                                                                    <th class="center"> Appointment Status </th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                            $i = 1;
                                                            foreach ($members as $member) {
                                                            ?>
                                                              <tr class="odd gradeX">
                                                                <td class="center"><?= $i; ?></td>
                                                                <td class="center"><?= $member->member_id; ?></td>
                                                                <td class="center"><?= $member->name; ?></td>
                                                               <!--  <td class="center"><?= $member->address; ?></td>
                                                                <td class="center"><a href="tel:<?= $member->number; ?>"><?= $member->number; ?></a></td>
                                                                 <td class="center"><?= $member->date; ?></td> -->
                                                                <td class="center"><?php if ($member->services) {
                                                                                    echo $member->services;
                                                                                  } else {
                                                                                    echo 'TBD';
                                                                                  } ?></td>
                                                                <td class="center"><?php if ($member->appointment_date) {
                                                                                    echo $member->appointment_date;
                                                                                  } else {
                                                                                    echo 'TBD';
                                                                                  } ?></td>
                                                                <td class="center"><?php if ($member->appointment_time) {
                                                                                    echo $member->appointment_time;
                                                                                  } else {
                                                                                    echo 'TBD';
                                                                                  } ?></td>
                                                                <td class="center"><?php if ($member->comments) {
                                                                                    echo $member->comments;
                                                                                  } else {
                                                                                    echo 'TBD';
                                                                                  } ?></td>
                                                                <td class="center"><?php if ($member->payment_status) {
                                                                                    echo $member->payment_status;
                                                                                  } else {
                                                                                    echo 'TBD';
                                                                                  } ?></td>
                                                                <td class="center"><?= $member->appointment_status ?? ''; ?></td>
                                                             
                                                              </tr>
                                                            <?php
                                                              $i++;
                                                            }
                                                            ?>
                                                      

                                                            </tbody>
                                                        </table> 
                                                       </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>



                    <!-- end admited patient list -->
                </div>
            </div>
            <!-- end page content -->

        </div>
        <!-- end page container -->
        <!-- start footer -->
  
     <?php $this->load->view('Backend/members/member-temp/footer'); ?> 
    <script src="<?php echo base_url(); ?>assets/backend_assets/bundles/material/material.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend_assets/bundles/flatpicker/js/flatpicker.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend_assets/data/date-time.init.js"></script>
</body>



</html>