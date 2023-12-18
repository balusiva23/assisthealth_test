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
           
                            <?php
                            //ALl
                             $id = $this->session->userdata('user_login_id');
                            $allsql = "SELECT * FROM members JOIN appointment ON members.id = appointment.mid WHERE members.id = ?  AND appointment.isActive = 1 AND members.isActive = 1  AND appointment.appointment_status != ''";
                            $allquery = $this->db->query($allsql, array($id));
                            $allresult = $allquery->num_rows();   
                           //ongoing
                            $ongoingsql = "SELECT * FROM members JOIN appointment ON members.id = appointment.mid WHERE members.id = ?   AND appointment.appointment_status = 'Ongoing' AND appointment.isActive = 1 AND members.isActive = 1";
                            $ongoingquery = $this->db->query($ongoingsql, array($id));
                            $ongoingresult = $ongoingquery->num_rows();   
                            //completed
                            $completedsql = "SELECT * FROM members JOIN appointment ON members.id = appointment.mid WHERE members.id = ?   AND appointment.appointment_status = 'Completed' AND appointment.isActive = 1 AND members.isActive = 1";
                            $completedquery = $this->db->query($completedsql, array($id));
                            $completedresult = $completedquery->num_rows(); 
                             //Pending
                            $pendingsql = "SELECT * FROM members JOIN appointment ON members.id = appointment.mid WHERE members.id = ?   AND appointment.appointment_status = 'Pending' AND appointment.isActive = 1 AND members.isActive = 1";
                            $pendingquery = $this->db->query($pendingsql, array($id));
                            $pendingresult = $pendingquery->num_rows();
                           //New Member count
                         
                           

                             ?>
                            <div class="col-xl-3 col-md-6 col-12">
                                  <a href="<?php echo base_url(); ?>Member/View_Appointments" style="color: white;">
                                <div class="info-box bg-blue">
                                    <span class="info-box-icon push-bottom"><i class="material-icons">domaingroup</i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Appointments</span>
                                        <span class="info-box-number"><?php echo $allresult; ?></span>
                                   
                                    </div>
                                    
                                </div>
                            </a>
                                
                            </div>
                            
                                   <div class="col-xl-3 col-md-6 col-12">
                                       <a href="<?php echo base_url(); ?>Member/Pending_Appointment" style="color: white;">
                                <div class="info-box bg-warning ">
                                    <span class="info-box-icon push-bottom"><i
                                            class="material-icons">refresh</i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Pending Appointments</span>
                                        <span class="info-box-number"><?php echo $pendingresult; ?></span>
                                    
                                    </div>
                                    
                                </div>
                                </a>
                            </div> 
                                
                             <div class="col-xl-3 col-md-6 col-12">
                                   <a href="<?php echo base_url(); ?>Member/Ongoing_Appointment" style="color: white;">
                                <div class="info-box bg-purple ">
                                    <span class="info-box-icon push-bottom"><i
                                            class="material-icons">done</i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Ongoing Appointments</span>
                                        <span class="info-box-number"><?php echo $ongoingresult;  ?></span>
                            
                                    </div>
                                    
                                </div>
                            </a>
                              </div>
                            <div class="col-xl-3 col-md-6 col-12">
                                   <a href="<?php echo base_url(); ?>Member/Completed_Appointment" style="color: white;">
                                <div class="info-box bg-success">
                                    <span class="info-box-icon push-bottom"><i
                                            class="material-icons">done_all</i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Completed Appointments</span>
                                        <span class="info-box-number"><?php echo  $completedresult;  ?></span>
                                  
                                    </div>
                                  
                                </div>
                            </a>
                              
                            </div>
                          
                             
                                <div class="col-xl-3 col-md-6 col-12">
                                       <a href="<?php echo base_url(); ?>Member/Sub_Profile" style="color: white;">
                                <div class="info-box yellow-bgcolor" style="background-color: #20c997;">
                                    <span class="info-box-icon push-bottom"><i
                                            class="material-icons">group</i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">My Sub Profiles</span>
                                        <span class="info-box-number"><?php echo $this->db->where(array('parent_member'=>$id,'isActive'=>1,'isSubprofile ='=>'Yes'))->count_all_results('members'); ?></span>
                                    
                                    </div>
                                 
                                </div>
                            </a>
                               
                            </div>
                      
                        
                        </div>
                    </div>
                    <div class="row  mt-10">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box  mt-10">
                                <div class="card-head center">

                                    <h2>Welcome  <?= $user_data->name ?> </h2>

                                </div>
                                <div class="card-body" id="bar-parent">
                                    <div class="doctor-profile">
                                   


                                         <?php if($user_data->profile ) { ?>
                                            <img src="<?php  echo base_url('assets/uploads/users_profile/').$user_data->profile; ?> " class="doctor-pic" alt="">
                                        <?php }else{ ?> 
                                            <img src=" <?php echo base_url('assets/default.png'); ?>  " class="doctor-pic" alt="">
                                        <?php } ?> 


                                        <div class="profile-usertitle">
                                            <div class="doctor-name"><?= $user_data->name ?> </div>
                                        </div>
                                        <p style="font-weight: bold;"><?= $user_data->member_id ?></p>
                                        <p><?= $user_data->address ?></p>
                                        <div>
                                           
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
            <!-- start chat sidebar -->

            <!-- end chat sidebar -->
        </div>
        <!-- end page container -->
        <!-- start footer -->
     
      <?php $this->load->view('Backend/members/member-temp/footer'); ?> 
    <!-- end js include path -->
</body>



</html>