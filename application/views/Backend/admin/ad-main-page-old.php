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
     <?php $this->load->view('Backend/admin/admin-temp/link-css'); ?> 
           <!-- full calendar  css-->

</head>
<!-- END HEAD -->

<body
    class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white white-sidebar-color logo-indigo">
    <div class="page-wrapper">
        <!-- start header -->
        <!-- start header -->
         <?php $this->load->view('Backend/admin/admin-temp/header'); ?> 
        <div class="page-container">
            <!-- start sidebar menu -->
            <?php $this->load->view('Backend/admin/admin-temp/sidebar'); ?> 
            <!-- end sidebar menu -->
            <!-- start page content -->
            <div class="page-content-wrapper mt-10">
                <div class="page-content mt-10">
                        <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Dashboard</div>
                            </div>
                           <!--  <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                        href="#">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Dashboard</li>
                            </ol> -->
                        </div>
                    </div>
                        <div class="state-overview">
                        <div class="row">
                              <div class="col-xl-3 col-md-6 col-12">
                                <div class="info-box bg-orange">
                                    <span class="info-box-icon push-bottom"><i class="material-icons">person</i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Navigators</span>
                                        <span class="info-box-number"><?php echo $this->db->where('isActive', 1)->count_all_results('manager'); ?></span>
                                       <!--  <div class="progress">
                                            <div class="progress-bar" style="width: 40%"></div>
                                        </div>
                                        <span class="progress-description">
                                            40% Increase in 28 Days
                                        </span> -->
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                                <div class="col-xl-3 col-md-6 col-12">
                                <div class="info-box bg-purple">
                                    <span class="info-box-icon push-bottom"><i
                                            class="material-icons">group</i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Members</span>
                                        <span class="info-box-number"><?php echo $this->db->where('isActive', 1)->count_all_results('members'); ?></span>
                                      <!--   <div class="progress">
                                            <div class="progress-bar" style="width: 85%"></div>
                                        </div>
                                        <span class="progress-description">
                                            85% Increase in 28 Days
                                        </span> -->
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            <div class="col-xl-3 col-md-6 col-12">
                                <div class="info-box bg-blue">
                                    <span class="info-box-icon push-bottom"><i class="material-icons">domaingroup</i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Appointments</span>
                                        <span class="info-box-number"><?php echo $this->db->where(array('isActive'=> 1,'appointment_status != '=>''))->count_all_results('appointment'); ?></span>
                                    <!--     <div class="progress">
                                            <div class="progress-bar" style="width: 45%"></div>
                                        </div>
                                        <span class="progress-description">
                                            45% Increase in 28 Days
                                        </span> -->
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            <!-- /.col -->
                              <!-- /.col -->  
                             <div class="col-xl-3 col-md-6 col-12">
                                <div class="info-box bg-warning ">
                                    <span class="info-box-icon push-bottom"><i
                                            class="material-icons">refresh</i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Pending Appointments</span>
                                        <span class="info-box-number"><?php echo $this->db->where(array('appointment_status'=>'Pending','isActive'=>1))->count_all_results('appointment'); ?></span>
                                    
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>  
                             <div class="col-xl-3 col-md-6 col-12">
                                <div class="info-box bg-info ">
                                    <span class="info-box-icon push-bottom"><i
                                            class="material-icons">done</i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Ongoing Appointments</span>
                                        <span class="info-box-number"><?php echo $this->db->where(array('appointment_status'=>'Ongoing','isActive'=>1))->count_all_results('appointment'); ?></span>
                                    
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            <div class="col-xl-3 col-md-6 col-12">
                                <div class="info-box bg-success">
                                    <span class="info-box-icon push-bottom"><i
                                            class="material-icons">done_all</i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Completed Appointments</span>
                                        <span class="info-box-number"><?php echo $this->db->where(array('appointment_status'=>'Completed','isActive'=>1))->count_all_results('appointment'); ?></span>
                                    
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>  
                              <div class="col-xl-3 col-md-6 col-12">
                                <div class="info-box deepPink-bgcolor">
                                    <span class="info-box-icon push-bottom"><i
                                            class="material-icons">person</i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">New Members</span>
                                        <span class="info-box-number"><?php echo $this->db->where(array('navigator'=>'','member_status'=>'1','isActive'=>1))->count_all_results('members'); ?></span>
                                    
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>    
                              <div class="col-xl-3 col-md-6 col-12">
                                <div class="info-box yellow-bgcolor" style="background-color: #c49f47;">
                                    <span class="info-box-icon push-bottom"><i
                                            class="icons fa fa-user-md " style="font-size: 18px;"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Doctors</span>
                                        <span class="info-box-number"><?php echo $this->db->where(array('isActive'=>1))->count_all_results('doctors'); ?></span>
                                    
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            
                              <div class="col-xl-3 col-md-6 col-12">
                                <div class="info-box yellow-bgcolor" style="background-color: #20c997;">
                                    <span class="info-box-icon push-bottom"><i
                                            class="material-icons">group</i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Sub Profiles</span>
                                        <span class="info-box-number"><?php echo $this->db->where(array('isActive'=>1,'isSubprofile ='=>'Yes'))->count_all_results('members'); ?></span>
                                    
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                        
                            <!-- /.col -->
                        </div>
                    </div>
                    <div class="row  mt-10">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box  mt-10">
                                <div class="card-head center">
                                    <h2>Welcome  <?php echo $this->session->userdata('name'); ?>  </h2>
                                 
                                </div>
                                <div class="card-body" id="bar-parent">
                                    <div class="doctor-profile">
                                
                                           <?php if($admin_data->profile ) { ?>
                                            <img src="<?php  echo base_url('assets/uploads/admin_profile/').$admin_data->profile; ?> " class="doctor-pic" alt="">
                                        <?php }else{ ?> 
                                            <img src=" <?php echo base_url('assets/default.png'); ?>  "class="doctor-pic" alt="">
                                        <?php } ?> 

                                        <div class="profile-usertitle">
                                            <div class="doctor-name"> <?php echo $this->session->userdata('name'); ?> </div>
                                        </div>
                                        <p> <?php echo $this->session->userdata('email'); ?></p>
                                        <div>
                                            <p><i class="fa fa-phone"></i><a href="<?php echo "+91 ".$admin_data->number; ?> "><?php echo "+91 ".$admin_data->number; ?> </a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
          <!--           <div class="row">
               
                        <div class="col-md-12 col-sm-12">
                            <div class="card">
                                <div class="card-head">
                                    <header>Calendar</header>
                                </div>
                                <div class="card-body">
                                    <div class="panel-body">
                                        <div id="calendar" class="has-toolbar"> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->

                    <!-- end admited patient list -->
                </div>
            </div>
            <!-- end page content -->
            <!-- start chat sidebar -->

            <!-- end chat sidebar -->
        </div>
        <!-- end page container -->
       <!-- start footer -->
          <?php $this->load->view('Backend/admin/admin-temp/footer'); ?> 
    <!-- end js include path -->
</body>



</html>

