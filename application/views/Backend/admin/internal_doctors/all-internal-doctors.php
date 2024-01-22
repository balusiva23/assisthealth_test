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
     <!--   <link href="<?php echo base_url(); ?>/assets/backend_assets/bundles/select2/css/select2.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>/assets/backend_assets/bundles/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" /> -->
       <link href="<?php echo base_url(); ?>assets/select2/select2.min.css" rel="stylesheet" type="text/css" />   
    <link href="<?php echo base_url(); ?>assets/select2/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />  

     <style>
#loading
{
    text-align:center; 
    background: url('<?php echo base_url(); ?>assets/loader2.gif') no-repeat center; 
    height: 150px;
 
}
</style>
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
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">All
                                    Doctors</div>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                         <div class=" row">
                                           
                  <!--      <div class="col-md-2">
                          <label class="control-label">Doctors <span class="required"> </span></label>
                             <select class="form-control input-height search name" name="name" id="name" required>
                                 <option value="">Select...</option>
                                  <?php if (!empty($navigators)) {
                                   $count = 1;
                                     foreach ($navigators as $navigator) { ?>
                                    <option value="<?= $navigator->name ?>"><?= $navigator->name ?></option>
                                    <?php
                                   $count++;
                                    }
                                      } ?>
                               </select>
                                  </div>

                             <div class="col-md-2">
                                <label class="control-label">Speciality <span class="required"> </span></label>
                                            <select class="form-control input-height search speciality" name="speciality" id="speciality" required>
                                 <option value="">Select...</option>
                                  <?php if (!empty($navigators)) {
                                   $count = 1;
                                     foreach ($navigators as $navigator) { ?>
                                    <option value="<?= $navigator->speciality ?>"><?= $navigator->speciality ?></option>
                                    <?php
                                   $count++;
                                    }
                                      } ?>
                               </select>
                             </div>  

                             --- <div class="col-md-2">
                                <label class="control-label">Hospital <span class="required"> </span></label>
                                            <select class="form-control input-height search hospital" name="hospital" id="hospital" required>
                                 <option value="">Select...</option>
                                  <?php if (!empty($navigators)) {
                                   $count = 1;
                                     foreach ($navigators as $navigator) { ?>
                                    <option value="<?= $navigator->hospital ?>"><?= $navigator->hospital ?></option>
                                    <?php
                                   $count++;
                                    }
                                      } ?>
                               </select>
                             </div> ---
                              <div class="col-md-2">
                                <label class="control-label">Timings <span class="required"> </span></label>
                                            <select class="form-control input-height search timing" name="timing" id="timing" required>
                                 <option value="">Select...</option>
                                  <?php if (!empty($navigators)) {
                                   $count = 1;
                                     foreach ($navigators as $navigator) { ?>
                                    <option value="<?= $navigator->timing ?>"><?= $navigator->timing ?></option>
                                    <?php
                                   $count++;
                                    }
                                      } ?>
                               </select>
                             </div> 
                             <div class="col-md-2">
                                <label class="control-label">Fees <span class="required"> </span></label>
                                            <select class="form-control input-height search fees" name="fees" id="fees" required>
                                 <option value="">Select...</option>
                                  <?php if (!empty($navigators)) {
                                   $count = 1;
                                     foreach ($navigators as $navigator) { ?>
                                    <option value="<?= $navigator->fees ?>"><?= $navigator->fees ?></option>
                                    <?php
                                   $count++;
                                    }
                                      } ?>
                               </select>
                             </div>-->


                             <div class="form-group col-md-2">
                            <label class="control-label">Doctors <span class="required"> </span></label>
                            <select class="form-control input-height search name" name="name" id="name" required>
                                <option value="">Select...</option>
                                <?php
                                $uniqueNames = array_unique(array_column($navigators, 'name'));
                                foreach ($uniqueNames as $name) { ?>
                                    <option value="<?= $name ?>"><?= $name ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class=" form-group col-md-2">
                            <label class="control-label">Speciality <span class="required"> </span></label>
                            <select class="form-control input-height search speciality" name="speciality" id="speciality" required>
                                <option value="">Select...</option>
                                <?php
                                $uniqueSpecialities = array_unique(array_column($navigators, 'speciality'));
                                foreach ($uniqueSpecialities as $speciality) { ?>
                                    <option value="<?= $speciality ?>"><?= $speciality ?></option>
                                <?php } ?>
                            </select>
                        </div>  
                        <div class="form-group col-md-2">
                            <label class="control-label">Hospital <span class="required"> </span></label>
                            <select class="form-control input-height search hospital" name="hospital" id="hospital" required>
                                <option value="">Select...</option>
                                <?php
                                $uniquehospital = array_unique(array_column($navigators, 'hospital'));
                                foreach ($uniquehospital as $hospital) { ?>
                                    <option value="<?= $hospital ?>"><?= $hospital ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group col-md-2">
                            <label class="control-label">Timings <span class="required"> </span></label>
                           <!--  <select class="form-control input-height search timing" name="timing" id="timing" required>
                                <option value="">Select...</option>
                                <?php
                                $uniqueTimings = array_unique(array_column($navigators, 'timing'));
                                foreach ($uniqueTimings as $timing) { 

                                       // Assuming $timing is in HH:MM:SS format
                                  $formattedTime = date("h:i A", strtotime($timing));

                                   ?>
                                    <option value="<?= $timing ?>"><?= $formattedTime ?></option>
                                <?php } ?>
                            </select>-->  
                
                    
           <select class="form-control input-height search timing" name="timing" id="timing" required>
    <option value="">Select...</option>
    <?php
    $uniqueTimings = array_unique(array_column($navigators, 'timing'));
    foreach ($uniqueTimings as $timing) { 

        // Assuming $timing is in HH:MM:SS format
        $formattedTime = date("h:i A", strtotime($timing));

        // Find the corresponding hospital_to_timing value
        $hospitalToTiming = ''; // Initialize to an empty string, update this based on your actual data structure

        // Loop through the navigators object to find the corresponding hospital_to_timing
        foreach ($navigators as $navigator) {
            if ($navigator->timing == $timing) {
                $hospitalToTiming = $navigator->hospital_to_timing;
                break;
            }
        }
        ?>
        <option value="<?= $timing ?>"><?= $formattedTime ?> - <?= ($hospitalToTiming)  ? date("h:i A", strtotime($hospitalToTiming)) : $hospitalToTiming ?></option>
    <?php } ?>
</select>


                      </div>

                        <div class="form-group col-md-2">
                            <label class="control-label">Fees <span class="required"> </span></label>
                            <select class="form-control input-height search fees" name="fees" id="fees" required>
                                <option value="">Select...</option>
                                <?php
                                $uniqueFees = array_unique(array_column($navigators, 'fees'));
                                foreach ($uniqueFees as $fees) { ?>
                                    <option value="<?= $fees ?>"><?= $fees ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <!-- New -->
                        <div class="form-group col-md-2">
                            <label class="control-label">City <span class="required"> </span></label>
                            <select class="form-control input-height search hospital_city" name="hospital_city" id="hospital_city" required>
                                <option value="">Select...</option>
                                <?php
                                $uniqueFees = array_unique(array_column($navigators, 'hospital_city'));
                                foreach ($uniqueFees as $hospital_city) { 
                                    if(!empty($hospital_city)){ ?>
                                    <option value="<?= $hospital_city ?>"><?= $hospital_city ?></option>
                                <?php } } ?>
                            </select>
                        </div>
                         <div class="form-group col-md-2">
                            <label class="control-label">Clinic Area <span class="required"> </span></label>
                            <select class="form-control input-height search clinic_area" name="clinic_area" id="clinic_area" required>
                                <option value="">Select...</option>
                                <?php
                                $uniqueFees = array_unique(array_column($navigators, 'clinic_area'));
                                foreach ($uniqueFees as $clinic_area) { 
                                    if(!empty($clinic_area)){ ?>
                                    <option value="<?= $clinic_area ?>"><?= $clinic_area ?></option>
                                <?php } } ?>
                            </select>
                        </div> 
                        <div class="form-group col-md-2">
                            <label class="control-label">Hospital Area <span class="required"> </span></label>
                            <select class="form-control input-height search hospital_area" name="hospital_area" id="hospital_area" required>
                                <option value="">Select...</option>
                                <?php
                                $uniqueFees = array_unique(array_column($navigators, 'hospital_area'));
                                foreach ($uniqueFees as $hospital_area) { 
                                    if(!empty($hospital_area)){ ?>
                                    <option value="<?= $hospital_area ?>"><?= $hospital_area ?></option>
                                <?php } } ?>
                            </select>
                        </div>

                       <div class="form-group col-md-2">
                         <label class="control-label"><span class="required"> </span></label>
                        <button id="resetFilters" class="btn btn-primary mt-4">Reset</button>
                    </div>
                            </div>

                            <div class="tabbable-line">

                                <div class="tab-content">
                                    <div class="tab-pane active fontawesome-demo" id="tab1">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class=""> 
                                                    <!-- card -->
                                                   <!--  <div class="card-head">
                                                        <header></header>
                                                        <div class="tools">
                                                           
                                                        </div>
                                                    </div> -->
                                                    <div class=" ">
                                                        <!-- card-body -->

                                                  <div class="row filter_data">
                                   
                                                  </div>
                                                  <!--  -->
                                                    <div class="pagination-box hidden-mb-45 text-center" style="display: flex;justify-content: center;">
                                                        <nav aria-label="Page navigation example" id="pagination_link">
                                                          
                                                        </nav>
                                                    </div>
                                                  <!--  -->
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
            <!-- start chat sidebar -->

            <!-- end chat sidebar -->
        </div>
        <!-- end page container -->
        <!-- start footer -->
     <?php $this->load->view('Backend/admin/admin-temp/footer'); ?> 
     <!--select2-->

    <script src="<?php echo base_url(); ?>assets/select2/select2.min.js"type="text/javascript"></script>


    <div class="modal fade" id="smallModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">{Name}
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you going to delete the from record
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        aria-label="Close">No</button>
                    <button type="button" class="btn btn-primary">Yes</button>
                </div>
            </div>
        </div>
    </div>



        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="form_sample_1" class="form-horizontal" method="post" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Update Doctor Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-body">
                        <div class="form-group row">
                            <label class="control-label col-md-3">Name
                                <span class="required"></span>
                            </label>
                            <div class="col-md-8">
                                <input type="text" name="firstname" data-required="1" placeholder="Enter Name" class="form-control input-height" required />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-3">Gender
                                <span class="required"></span>
                            </label>
                            <div class="col-md-8">
                                <select class="form-control input-height" name="gender">
                                    <option value="">Select...</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-3">Education Qualification
                                <span class="required"></span>
                            </label>
                            <div class="col-md-8">
                                <input type="text" name="qualification" id="qualification" data-required="1" placeholder="Enter Education Qualification" class="form-control input-height" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-3">Speciality
                                <span class="required"></span>
                            </label>
                            <div class="col-md-8">
                                <input type="text" name="speciality" id="speciality" data-required="1" placeholder="Enter Speciality " class="form-control input-height" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-3">Specialised In 
                                <span class="required"></span>
                            </label>
                            <div class="col-md-8">
                                <input type="text" name="specializedIn" id="specializedIn" data-required="1" placeholder="Enter Specialised In " class="form-control input-height" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-3">Experience
                                <span class="required"></span>
                            </label>
                            <div class="col-md-8">
                                <input type="text" name="experience" id="experience" data-required="1" placeholder="Enter Experience " class="form-control input-height" />
                            </div>
                        </div>

                            <div class="form-group row">
                                <label class="control-label col-md-3 " style="font-weight: bold;">  </label>
                                <div class="col-md-8" style="text-align: center;">
                                          <span  style="font-weight: bold;"> Work place 1 
                                    
                                </span>
                             
                                </div>
                             </div> 

                        <div class="form-group row">
                            <label class="control-label col-md-3">Name
                                <span class="required"></span>
                            </label>
                            <div class="col-md-8">
                                <input type="text" name="hospital" id="hospital" data-required="1" placeholder="Enter Name " class="form-control input-height" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-3"> Address
                            </label>
                            <div class="col-md-8">
                                <textarea name="address" class="form-control-textarea" placeholder=" Address" rows="2"></textarea>
                            </div>
                        </div>

                          <div class="form-group row">
                                                <label class="control-label col-md-3"> Area Name 
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-8">
                                                    <input type="text" name="hospital_area" id="hospital_area" data-required="1"
                                                        placeholder="Enter  Area Name " class="form-control input-height" required />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-md-3"> City
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-8">
                                                    <input type="text" name="hospital_city" id="hospital_city" data-required="1"
                                                        placeholder="Enter  City Name " class="form-control input-height" required />
                                                </div>
                                            </div>  

                        <div class="form-group row">
                            <label class="control-label col-md-3"> Consultation Timings
                                <span class="required"></span>
                            </label>
                            <div class="col-md-3">
                                <input type="time" name="timing" id="timing" data-required="1" placeholder="Enter Consultation Timings " class="form-control input-height" />
                            </div>
                            <div class="col-md-2 text-center">
                                <span class="">to </span>
                            </div>
                            <div class="col-md-3">
                                <input type="time" name="hospital_to_timing" id="hospital_to_timing" data-required="1" placeholder="Enter Consultation Timings " class="form-control input-height" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-3">Consultation Fees
                                <span class="required"></span>
                            </label>
                            <div class="col-md-8">
                                <input type="text" name="fees" id="fees" data-required="1" placeholder="Enter Consultation Fees " class="form-control input-height" />
                            </div>
                        </div>

                         <div class="form-group row">
                                <label class="control-label col-md-3 " style="font-weight: bold;">  </label>
                                <div class="col-md-8" style="text-align: center;">
                                          <span  style="font-weight: bold;"> Work place 2 
                                    
                                </span>
                             
                                </div>
                             </div> 

                              <div class="form-group row">
                                                <label class="control-label col-md-3"> Name 
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-8">
                                                    <input type="text" name="clinic_name" id="clinic_name" data-required="1"
                                                        placeholder="Enter  Name " class="form-control input-height" required />
                                                </div>
                                            </div>  

                                
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">  Address 
                                                </label>
                                                <div class="col-md-8">
                                                    <textarea name="clinic_address" class="form-control-textarea"
                                                        placeholder=" Address" rows="2"></textarea>
                                                </div>
                                            </div>

                                               <div class="form-group row">
                                                <label class="control-label col-md-3"> Area Name 
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-8">
                                                    <input type="text" name="clinic_area" id="clinic_area" data-required="1"
                                                        placeholder="Enter  Area Name " class="form-control input-height" required />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-md-3"> City
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-8">
                                                    <input type="text" name="clinic_city" id="clinic_city" data-required="1"
                                                        placeholder="Enter  City Name " class="form-control input-height" required />
                                                </div>
                                            </div>  
                                            
                                          
                                         
                                         <!--   <div class="form-group row">
                                                <label class="control-label col-md-3">  Consultation Timings 
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-8">
                                                    <input type="time" name="clinic_timing" id="clinic_timing" data-required="1"
                                                        placeholder="Enter  Consultation Timings " class="form-control input-height" required />
                                                </div>
                                            </div> -->
                                              <div class="form-group row">
                                    <label class="control-label col-md-3"> Consultation Timings
                                        <span class="required"></span>
                                    </label>
                                    <div class="col-md-3">
                                        <input type="time" name="clinic_timing" id="clinic_timing" data-required="1" placeholder="Enter Consultation Timings " class="form-control input-height" />
                                    </div>
                                    <div class="col-md-2 text-center">
                                        <span class="">to </span>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="time" name="clinic_to_timing" id="clinic_to_timing" data-required="1" placeholder="Enter Consultation Timings " class="form-control input-height" />
                                    </div>
                                </div>
                                             <div class="form-group row">
                                                <label class="control-label col-md-3"> Consultation Fees 
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-8">
                                                    <input type="text" name="clinic_fees" id="clinic_fees" data-required="1"
                                                        placeholder="Enter  Consultation Fees " class="form-control input-height" required />
                                                </div>
                                            </div>
                                                

                        <div class="form-group row">
                            <label class="control-label col-md-3">Contact Number
                                <span class="required"></span>
                            </label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text" style="padding:11px ;">+91</span>
                                    </div>
                                    <input name="number" id="number" type="number" class="form-control input-height" placeholder="Contact Number" />
                                    <label id="number-error" class="error" for="number" style="display: none;"></label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-3">Doctor photo
                                <span class="required"></span>
                            </label>
                            <div class="col-md-8">
                                <input type="file" name="file_url" class="default">
                                <label id="file_url-error" class="error" for="file_url" style="display:none">This field is required.</label>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="update">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- ----------------------------Doctor view -------------------------- -->
   <div class="modal fade" id="staticBackdrop_doc" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="form_sample_1" class="form-horizontal" method="post" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Doctor Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  
                                    <div class="card-body no-padding height-9">
                                        <div class="row">
                                            <div class="profile-userpic">
                                                <img src="" class="img-responsive image" id="pre-img" alt=""> </div>
                                        </div>
                                        <div class="profile-usertitle">
                                            <div> <span  class="profile-usertitle-name firstname"></span>  <span class="qualification"></span></div>
                                            <div class="profile-usertitle-job speciality">  </div>
                                            <div class="profile-usertitle-job gender">  </div>
                                        </div>
                                        <ul class="list-group list-group-unbordered">
                                            <li class="list-group-item">
                                                <b>Specialised In</b> <a class="pull-right specializedIn"></a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Experience</b> <a class="pull-right experience"></a>
                                            </li> 
                                            <li class="list-group-item">
                                                <b>Contact No</b> <a class="pull-right number"></a>
                                            </li> 
                                            <h4 class="text-center"><b>Work place 1</b></h4>
                                            <li class="list-group-item">
                                                <b>Address</b> <a class="pull-right " style="    text-align: justify;width: 350px;"><span class="hospital"></span><br><span class="address"></span><br><span class=""></span></a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Area</b> <a class="pull-right hospital_area"></a>
                                            </li>
                                             <li class="list-group-item">
                                                <b>City</b> <a class="pull-right hospital_city"></a>
                                            </li> 

                                            <li class="list-group-item">
                                                <b>Consultation Timings</b> <a class="pull-right "> <span class="timing"></span> <span class="hospital_to_timing"></span> </a>
                                            </li>
                                             <li class="list-group-item">
                                                <b>Consultation Fees</b> <a class="pull-right fees"></a>
                                            </li> 
                                            <!-- Work place 2 -->

                                            <h4 class="text-center"><b>Work place 2</b></h4>
                                            <li class="list-group-item">
                                                <b>Address</b> <a class="pull-right " style="    text-align: justify;width: 350px;"><span class="clinic_name"></span><br><span class="clinic_address"></span><br><span class=""></span></a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Area</b> <a class="pull-right clinic_area"></a>
                                            </li>
                                             <li class="list-group-item">
                                                <b>City</b> <a class="pull-right clinic_city"></a>
                                            </li> 

                                            <li class="list-group-item">
                                                <b>Consultation Timings</b> <a class="pull-right "> <span class="clinic_timing"></span> <span class="clinic_to_timing"></span> </a>
                                            </li>
                                             <li class="list-group-item">
                                                <b>Consultation Fees</b> <a class="pull-right clinic_fees"></a>
                                            </li> 

                                        </ul>
                                      
                                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <!-- <button type="submit" class="btn btn-primary" id="update">Update</button> -->
                </div>
            </div>
        </form>
    </div>
</div>
    </div>
   <!-- end js include path -->
<script>

      $(".search").select2({
          theme:"bootstrap"
      });

  



// New-----------------------------------------------------------

// $(document).ready(function(){
//   // Assuming your select elements have IDs: 'name', 'speciality', 'timing', 'fees'
//     $('#name, #speciality, #timing, #fees').change(function () {
//         filter_data(1);
//     });

     

//     filter_data(1);

//     function filter_data(page)
//     {
           
     

//         $('.filter_data').html('<div id="loading" style="" ></div>');
//         $('#pagination_link').hide();
//         var action = 'fetch_data';
//         //var page = 1;
    
//         // var sale = get_filter('sale');
//         // var rent = get_filter('rent');
//         // var lease = get_filter('lease');
//         // var city = get_filter('city');

//          var name = get_filter('name');
//         var speciality = get_filter('speciality');
//         var timing = get_filter('timing');
//         var fees = get_filter('fees');
//         console.log(name)
//         $.ajax({
//             url:"<?php echo base_url(); ?>Admin/fetch_data/"+page,
//             method:"POST",
//             dataType:"JSON",
         
//            // data:{action:action, sale:sale, rent:rent,lease:lease,city:city},
//              data: {
//                 action: action,
//                 name: name,
//                 speciality: speciality,
//                 timing: timing,
//                 fees: fees
//             },
//             success:function(data)
//             {
//                  $('.filter_data').html(data.product_list);
//                  $('#pagination_link').show();
//                        // $('#pagination_link').html(data.pagination_link);
//                         $('.pagination-box #pagination_link').html(data.pagination_link);
                       
//                        // console.log(data.pagination_link)
                  
               
//             }
//         })
//     }
//     //new
//      return filter;
//     // }
//     function get_filter(class_name) {
//     var filter = [];
//     $('#' + class_name + ' option:selected').each(function () {
//         filter.push($(this).val());
//     });
//     console.log(filter)
//     return filter;
// }
//      //old
//     // function get_filter(class_name)
//     // {
//     //     var filter = [];
//     //     $('.'+class_name+':checked').each(function(){
//     //         filter.push($(this).val());
//     //     });
//     //     return filter;
//     // }

//     $(document).on("click", ".pagination li a", function(event){
//         event.preventDefault();
//         var page = $(this).data("ci-pagination-page");
//         filter_data(page);
//     });

//     $('.common_selector').click(function(){
//         filter_data(1);
//     });



// });
// New--------------------------Filter---------------------------------
$(document).ready(function () {
    // Assuming your select elements have IDs: 'name', 'speciality', 'timings', 'fees'
    $('#name, #speciality,#hospital, #timing, #fees ,#hospital_area,#clinic_area,#hospital_city').change(function () {
      // Remove selected options in other dropdowns
     //   $('#name, #speciality, #hospital, #timing, #fees').not(this).val('');

        // Step 6: Clear Filters Array Before Applying the Next Filter
        var filtersArray = [];

        filter_data(1);
    });


      // Add a click event for the reset button
    $('#resetFilters').click(function () {
        // Clear all dropdown selections
        $('#name, #speciality, #hospital, #timing, #fees, #hospital_area, #clinic_area, #hospital_city').val('');

        // Clear the filters array
        var filtersArray = [];
        
        // Trigger the filter_data function with the cleared filters
        filter_data(1);
    });
    

    filter_data(1);

    function filter_data(page) {
         // Step 6 (continued): Clear Filters Array Before Applying the Next Filter
        var filtersArray = get_filters();

        $('.filter_data').html('<div id="loading"></div>');

        $('#pagination_link').hide();
        var action = 'fetch_data';
        var filters = get_filters();
        //console.log(filters)

        $.ajax({
            url: "<?php echo base_url(); ?>Admin/fetch_data/" + page,
            method: "POST",
            dataType: "JSON",
            data: {
                action: action,
               // filters: filters
                filters: filtersArray
            },
            success: function (data) {
                $('.filter_data').html(data.product_list);
                $('#pagination_link').show();
                $('.pagination-box #pagination_link').html(data.pagination_link);
            }
        });
    }

    //new ----------------------
      function get_filters() {
        var filtersArray = [];

        // Assuming your select elements have IDs: 'name', 'speciality', 'timing', 'fees'
        $('#name, #speciality, #hospital, #timing, #fees, #hospital_area, #clinic_area, #hospital_city').each(function () {
            var dropdown_id = $(this).attr('id');
            var dropdown_value = $(this).val();

            // Push an object with dropdown_id and dropdown_value into the filters array
            filtersArray.push({ id: dropdown_id, value: dropdown_value });
        });

        return filtersArray;
    }
    //new-----------------
    
//     function get_filters() {
//     var filters = [];

//     // Assuming your select elements have IDs: 'name', 'speciality', 'timing', 'fees'
//     $('#name, #speciality, #hospital, #timing, #fees,#hospital_area,#clinic_area,#hospital_city').each(function () {
//         var dropdown_id = $(this).attr('id');
//         var dropdown_value = $(this).val();

//         // Push an object with dropdown_id and dropdown_value into the filters array
//         filters.push({ id: dropdown_id, value: dropdown_value });
//     });

    

//     return filters;
// }



    $(document).on("click", ".pagination li a", function (event) {
        event.preventDefault();
        var page = $(this).data("ci-pagination-page");
        filter_data(page);
    });

    $('.common_selector').click(function () {
        filter_data(1);
    });
});
// New--------------------------Filter---------------------------------


 // $(document).ready(function() {
         // $('#example4').on('click', '.tblEditBtn', function() {
       $(document).on('click','.tblEditBtn',function(){
            var id = $(this).data('id');
                // $('#staticBackdrop').modal('show');

            // Make an AJAX request to retrieve the data for the ID
            $.ajax({
                url: '<?php echo base_url("Admin/getInternal_DoctorByID"); ?>?id=' + id,
                method: 'GET',
                data: { id: id },
                dataType: 'json',
                success: function(response) {
                    // Populate the modal with the data returned from the server
                // Populate the modal with the data returned from the server
                    $('#staticBackdrop [name="id"]').val(response.id);
                    $('#staticBackdrop [name="firstname"]').val(response.name);
                    $('#staticBackdrop [name="gender"]').val(response.gender);
                    $('#staticBackdrop [name="qualification"]').val(response.qualification);
                    $('#staticBackdrop [name="speciality"]').val(response.speciality);
                    $('#staticBackdrop [name="specializedIn"]').val(response.specialized_in);
                    $('#staticBackdrop [name="experience"]').val(response.experience);
                    $('#staticBackdrop [name="address"]').val(response.address);
                    $('#staticBackdrop [name="timing"]').val(response.timing);
                    $('#staticBackdrop [name="fees"]').val(response.fees);
                    $('#staticBackdrop [name="number"]').val(response.contact_number);
                    $('#staticBackdrop [name="hospital"]').val(response.hospital);


                    $('#staticBackdrop [name="clinic_name"]').val(response.clinic_name);
                    $('#staticBackdrop [name="clinic_address"]').val(response.clinic_address);
                    $('#staticBackdrop [name="clinic_timing"]').val(response.clinic_timing);
                    $('#staticBackdrop [name="clinic_fees"]').val(response.clinic_fees);
                    $('#staticBackdrop [name="hospital_city"]').val(response.hospital_city);
                    $('#staticBackdrop [name="clinic_area"]').val(response.clinic_area);
                    $('#staticBackdrop [name="clinic_city"]').val(response.clinic_city);
                    $('#staticBackdrop [name="hospital_area"]').val(response.hospital_area);
                    $('#staticBackdrop [name="clinic_to_timing"]').val(response.clinic_to_timing);
                    $('#staticBackdrop [name="hospital_to_timing"]').val(response.hospital_to_timing);



                

                     // Open the modal
                    $('#staticBackdrop').modal('show');
                },
                error: function(xhr, status, error) {
                    console.log(error); // Handle the error if any
                }
            });
        });
    //});     


    //});

         $(document).on('click','#update',function(){
        event.preventDefault();
           $("#form_sample_1").valid();
         
         $.ajax({
        type:'post',
        url: '<?php echo base_url("Admin/Update_internal_doctor");?>',
        data: new FormData($("#form_sample_1")[0]),
        contentType: false,
        processData: false, 
        success:function(resp){
        var data=$.parseJSON(resp);
        if(data.status == 'success'){
        $('#form_sample_1')[0].reset();
          $('#staticBackdrop').modal('hide');
         $(".modal-backdrop").remove();

        $.wnoty({
        type: 'success',
        message: data.message,
        autohideDelay: 1000,
        position: 'top-right'

        });
         setTimeout(function(){
         location.reload(true);
        },2000);
       // console.log(data.member);
        


       }else if(data.status == 'error'){
       
        $('#staticBackdrop').modal('hide');
         $(".modal-backdrop").remove();
              $.wnoty({
                    type: 'error',
                    message: data.message,
                    autohideDelay: 2000,
                    position: 'top-right'

                    });
               setTimeout(function(){
         location.reload(true);
        },2000);
        }
        },
        });
       
     
        return false;
        })

         //delete
    $(document).on('click','.delete', function (e) {
    //var id = $(this).parents('tr').find('#id').val();
    var id = $(this).attr('data-id');
   $.confirm({
    title: 'Delete Warning!',
    content: 'Are you sure, you want to delete this doctor?',
    boxWidth: '25%',
    useBootstrap: false,
    buttons: {
    delete: {
    text: 'Delete',
    btnClass: 'btn-primary',
    action: function(){
    $.ajax({
    type: 'post',
    url: '<?php echo base_url('Admin/delete_internal_doctor') ?>',
    data: {id:id},
    success: function (response) {
     var data=$.parseJSON(response);
     if(data.status == 'success'){

    $.wnoty({
    type: 'success',
    message: data.message,
    autohideDelay: 1000,
    position: 'top-right'

    });
    setTimeout(function(){
         location.reload(true);
        },2000);
     }
    } 
   });
    }
    },
    close: function () {
    }
    }
    });

    });    

function toggleIntro(button) {
    var row = button.closest('tr');
    var introShort = row.querySelector('.intro-short');
    var introMore = row.querySelector('.intro-more');
    
    if (introMore.style.display === 'none') {
        introShort.style.display = 'none';
        introMore.style.display = 'inline';
        button.textContent = 'Read Less';
    } else {
        introShort.style.display = 'inline';
        introMore.style.display = 'none';
        button.textContent = 'Read More';
    }
}




   $(document).on('click','.tblViewBtn',function(){
            var id = $(this).data('id');
                // $('#staticBackdrop').modal('show');

            // Make an AJAX request to retrieve the data for the ID
            $.ajax({
                url: '<?php echo base_url("Admin/getInternal_DoctorByID"); ?>?id=' + id,
                method: 'GET',
                data: { id: id },
                dataType: 'json',
                success: function(response) {
                    // Populate the modal with the data returned from the server
                // Populate the modal with the data returned from the server
                    $('#staticBackdrop_doc .id').val(response.id);
                    $('#staticBackdrop_doc .firstname').text(response.name);
                    $('#staticBackdrop_doc .gender').text(response.gender);
                    $('#staticBackdrop_doc  .qualification').text(' '+response.qualification);
                    $('#staticBackdrop_doc .speciality').text(response.speciality);
                    $('#staticBackdrop_doc .specializedIn').text(response.specialized_in);
                    $('#staticBackdrop_doc .experience').text(response.experience);
                    $('#staticBackdrop_doc .address').text(response.address);
                    $('#staticBackdrop_doc .timing').text(formatTime(response.timing));
                    $('#staticBackdrop_doc .fees').text(parseFloat(response.fees));

                    $('#staticBackdrop_doc .number').text(response.contact_number);
                    $('#staticBackdrop_doc .hospital').text(response.hospital);


                    $('#staticBackdrop_doc .clinic_name').text(response.clinic_name);
                    $('#staticBackdrop_doc .clinic_address').text(response.clinic_address);
                    $('#staticBackdrop_doc .clinic_timing').text(formatTime(response.clinic_timing));
                    $('#staticBackdrop_doc .clinic_fees').text(parseFloat(response.clinic_fees));
                    $('#staticBackdrop_doc .hospital_city').text(response.hospital_city);
                    $('#staticBackdrop_doc .clinic_area').text(response.clinic_area);
                    $('#staticBackdrop_doc .clinic_city').text(response.clinic_city);
                    $('#staticBackdrop_doc .hospital_area').text(response.hospital_area);
                   $('#staticBackdrop_doc .clinic_to_timing').text(' to ' +formatTime(response.clinic_to_timing));
                $('#staticBackdrop_doc .hospital_to_timing').text(' to ' + formatTime(response.hospital_to_timing));


                      if(response.profile_picture){
                          $('#staticBackdrop_doc #pre-img').attr('src',"<?php echo base_url('assets/uploads/internal_doctors/'); ?>"+response.profile_picture);

                    }

                

                     // Open the modal
                    $('#staticBackdrop_doc').modal('show');
                },
                error: function(xhr, status, error) {
                    console.log(error); // Handle the error if any
                }
            });
        });


   function formatTime(time) {
    // Parse the time string into a Date object
    var parsedTime = new Date("2000-01-01T" + time);

    // Format the time in 12-hour format
    var formattedTime = parsedTime.toLocaleTimeString('en-US', { hour: 'numeric', minute: 'numeric', hour12: true });

    return formattedTime;
}

</script>

</body>

 

</html>