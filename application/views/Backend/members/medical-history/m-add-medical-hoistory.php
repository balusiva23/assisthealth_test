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
    <style type="text/css">
        .add-btn{
            float: right;
            margin: 2px;
            padding: 6px 10px 6px 10px;
            font-size: 15px;
            font-weight: bold;
        }
    </style>
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
                    <form id="medical_history_form" method="post" class="">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Add/Update Medical History </div>
                            </div>
                            
                        </div>
                    </div>
                        <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN PROFILE SIDEBAR -->
                            <div class="profile-sidebar">
                                <div class="card" style="min-height: 220px;height: 220px;">
                                    <div class="card-body no-padding height-9">
                                        <div class="row">
                                            <div class="profile-userpic">
                                                <img src="<?php if($user_data->profile ) { echo base_url('assets/uploads/users_profile/').$user_data->profile; }else{echo base_url('assets/default.png'); }?>" class="img-responsive" alt=""> </div>
                                        </div>
                                        <div class="profile-usertitle">

                                            <div class="profile-usertitle-name"> <?= $user_data->name ?> </div>
                                            <div class="profile-usertitle-job"> Member </div>
                                        </div>
                                       
                                    </div>
                                </div>
                           
                    
                                
                            </div>
                            <!-- END BEGIN PROFILE SIDEBAR -->
                            <!-- BEGIN PROFILE CONTENT -->
                            <div class="profile-content">
                                <div class="row">
                                    <div class="card" style="min-height: 220px;height: ;border-radius: 10px 10px;">
                                        <div class="card-topline-aqua">
                                            <header></header>
                                        </div>
                                         <div class="card-body no-padding height-9">
                                        <div class="white-box">
                                            <!-- Nav tabs -->
                                            <div class="p-rl-20">
                                               <!--  <ul class="nav customtab nav-tabs" role="tablist">
                                                    <li class="nav-item"><a href="#tab1" class="nav-link active"
                                                            data-bs-toggle="tab">About Me</a></li>
                                                  
                                                </ul> -->
                                            </div>
                                            <!-- Tab panes -->
                                         <div class="tab-content">
                                                <div class="tab-pane active fontawesome-demo" id="tab1">
                                                    <div id="biography">
                                                        <div class="row">
                                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Member
                                                                    ID</strong>
                                                                <br>
                                                                <p class="text-muted"><?= $user_data->member_id ?> </p>
                                                            </div>
                                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Full
                                                                    Name</strong>
                                                                <br>
                                                                <p class="text-muted"><?= $user_data->name ?> </p>
                                                            </div>
                                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Mobile</strong>
                                                                <br>
                                                                <p class="text-muted"><?= $user_data->number ?> </p>
                                                            </div>
                                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Email</strong>
                                                                <br>
                                                                <p class="text-muted"><?= $user_data->email ?> </p>
                                                            </div>
                                                          
                                                        </div>  
                                                        <div class="row">
                                                            <div class="col-md-6 col-xs-6 b-r"> <strong>Address
                                                                    </strong>
                                                                <br>
                                                                <p class="text-muted"><?= $user_data->address ?> </p>
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
                            <!-- END PROFILE CONTENT -->
                        </div>
                    </div>
                    
             
                
                    <div class="row">
                
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header>Primary Care Physician (AssistHealth Doctor) :</header>
                                    
                                </div>
                                <div class="card-body " id="bar-parent">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-3">
                                        <div class="form-group">
                                            <label for="simpleFormEmail">Physician  Name</label><span class="error"> *</span>
                                            <input type="text" class="form-control" id="physician_name" name="physician_name" 
                                                placeholder="Enter Physician  Name" value="<?= isset($medical_history->physician_name) ? $medical_history->physician_name : ''  ?> " required>
                                        </div>
                                    </div>
                                        
                                        <div class="col-md-6 col-sm-3">
                                        <div class="form-group">
                                            <label for="simpleFormPassword">Contact Number </label><span class="error"> *</span>
                                            <input type="text" class="form-control" id="physician_no" name="physician_no" 
                                                placeholder="Number" value="<?= isset($medical_history->physician_no) ? $medical_history->physician_no : ''  ?>  " required>
                                        </div>
                                    </div>
                                    </div>
                                    
                                        
                                    
                                </div>
                            </div>
                        </div>
                
                    
                    </div>  
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header>Previous Medical Conditions (If applicable) :</header>
                                    <button type="button" name="add" id="add_previous" class="btn btn-success add-btn">+</button>
                                </div>
                                <div class="card-body " id="bar-parent1">
                                
                                    <?php if($previous_medical_conditions) { 
                                        $previousCount = 1;
                                        foreach ($previous_medical_conditions as  $previous_medical) {
                                           
                                        
                                        ?>
                                      <div class="row">
                                        <div class="col-md-4 col-sm-3">
                                        <div class="form-group">
                                            <label for="simpleFormEmail">Condition </label>
                                            <input type="text" class="form-control" name="medical_conditions[]"
                                                placeholder="Enter Condition" value="<?= $previous_medical->condition_name ?> ">
                                        </div>
                                    </div>
                                        <div class="col-md-4 col-sm-3">
                                        <div class="form-group">
                                            <label for="simpleFormEmail">Diagnosis  Date </label>
                                            <input type="date"  id="" class="form-control" name="medical_condition_date[]"
                                                placeholder="Enter Date" value="<?= date('Y-m-d', strtotime($previous_medical->diagnosis_date)) ?>"> 
                                                <!--  <?=  date('Y-m-d',strtotime($previous_medical->diagnosis_date));   ?>  -->
                                        </div>
                                    </div>
                                        <div class="col-md-3 col-sm-3">
                                        <div class="form-group">
                                            <label for="simpleFormPassword">Treatment Received</label>
                                            <input type="text" class="form-control" name="treatment_received[]"
                                                placeholder="" value="<?= $previous_medical->treatment_received ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-1 col-sm-1 mt-4">
                                     <button type="button" name="remove" id="previous-<?= $previousCount?>" data-id="<?= $previous_medical->id ?>" data-table = "<?php echo base64_encode('previous_medical_conditions') ?>" class="btn btn-danger  DelBtn">X</button>
                                     </div>
                                    
                                    </div>
                                     <?php 
                                         $previousCount ++;
                                       }
                                        }else{ ?>
                                                <div class="row">
                                        <div class="col-md-4 col-sm-3">
                                        <div class="form-group">
                                            <label for="simpleFormEmail">Condition </label>
                                            <input type="text" class="form-control" name="medical_conditions[]"
                                                placeholder="Enter Condition">
                                        </div>
                                    </div>
                                        <div class="col-md-4 col-sm-3">
                                        <div class="form-group">
                                            <label for="simpleFormEmail">Diagnosis  Date</label>
                                            <input type="date"  id="" class="form-control" name="medical_condition_date[]"
                                                placeholder="Enter Date">
                                        </div>
                                    </div>
                                        <div class="col-md-3 col-sm-3">
                                        <div class="form-group">
                                            <label for="simpleFormPassword">Treatment Received</label>
                                            <input type="text" class="form-control" name="treatment_received[]"
                                                placeholder="">
                                        </div>
                                    </div>
                                    
                                    </div>
                                      <?php  }

                                     ?>
                                        
                                    
                                </div>
                            </div>
                        </div>
                         <div class="col-md-6 col-sm-6">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header>Surgeries or Procedures (if applicable) :</header>
                                        <button type="button" name="add" id="add_surgeries" class="btn btn-success add-btn">+</button>  
                                </div>
                                <div class="card-body " id="bar-parent2">
                           
                                    
                                    <?php if($surgeries_procedures) { 
                                     
                                        foreach ($surgeries_procedures as  $surgeries) {
                                           
                                        
                                        ?>

                                    <div class="row">
                                        <div class="col-md-4 col-sm-3">
                                        <div class="form-group">
                                            <label for="simpleFormEmail">Procedure  </label>
                                            <input type="text" class="form-control" name="surgeries[]"
                                                placeholder="Enter Procedure "  value="<?= $surgeries->procedure_name ?> ">
                                        </div>
                                    </div>
                                        <div class="col-md-4 col-sm-3">
                                        <div class="form-group">
                                            <label for="simpleFormEmail">  Date</label>
                                            <input type="date"  id="" class="form-control" name="surgeries_date[]"
                                                placeholder="Enter Date" value="<?= date('Y-m-d', strtotime($surgeries->procedure_date)) ?>">
                                        </div>
                                    </div>
                                        <div class="col-md-3 col-sm-3">
                                        <div class="form-group">
                                            <label for="simpleFormPassword">Surgeon/Doctor</label>
                                            <input type="text" class="form-control" name="Surgeon[]"
                                                placeholder="" value="<?= $surgeries->surgeon ?>">
                                        </div>
                                        </div>
                                          <div class="col-md-1 col-sm-1 mt-4">
                                     <button type="button" name="remove"  data-id="<?= $surgeries->id ?>" data-table = "<?php echo base64_encode('surgeries_procedures') ?>" class="btn btn-danger  DelBtn">X</button>
                                     </div>
                                    </div>

                                          <?php 
                                        
                                       }
                                        }else{ ?>

                                                     <div class="row">
                                        <div class="col-md-4 col-sm-3">
                                        <div class="form-group">
                                            <label for="simpleFormEmail">Procedure  </label>
                                            <input type="text" class="form-control" name="surgeries[]"
                                                placeholder="Enter Procedure ">
                                        </div>
                                    </div>
                                        <div class="col-md-4 col-sm-3">
                                        <div class="form-group">
                                            <label for="simpleFormEmail">  Date</label>
                                            <input type="date"  id="" class="form-control" name="surgeries_date[]"
                                                placeholder="Enter Date">
                                        </div>
                                    </div>
                                        <div class="col-md-3 col-sm-3">
                                        <div class="form-group">
                                            <label for="simpleFormPassword">Surgeon/Doctor</label>
                                            <input type="text" class="form-control" name="Surgeon[]"
                                                placeholder="">
                                        </div>
                                    </div>
                                    </div>


                                      <?php   }

                                     ?>
                                    
                                </div>
                            </div>
                        </div>
                        
                
                    
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header>Allergies</header>
                                     <button type="button" name="add" id="add_allergies" class="btn btn-success add-btn">+</button>
                                </div>
                                <div class="card-body " id="bar-parent3">
                             
                                     <?php if($allergies) { 
                                     
                                        foreach ($allergies as  $allergies) {
                                         ?>
                                                     <div class="row">
                                        <div class="col-md-4 col-sm-3">
                                        <div class="form-group">
                                            <label for="simpleFormEmail">Medications</label>
                                            <input type="text" class="form-control" name="medications[]"
                                                placeholder="Enter  Medications" value="<?= $allergies->medications ?>">
                                        </div>
                                    </div>
                                        <div class="col-md-4 col-sm-3">
                                        <div class="form-group">
                                            <label for="simpleFormEmail">  Food</label>
                                            <input type="text"   class="form-control" name="food[]"
                                                placeholder="Enter Food" value="<?= $allergies->food ?>">
                                        </div>
                                    </div>
                                        <div class="col-md-3 col-sm-3">
                                        <div class="form-group">
                                            <label for="simpleFormPassword">Other</label>
                                            <input type="text" class="form-control" name="other[]" 
                                                placeholder="" value="<?= $allergies->other ?>">
                                        </div>
                                    </div>

                                      <div class="col-md-1 col-sm-1 mt-4">
                                     <button type="button" name="remove"  data-id="<?= $allergies->id ?>" data-table = "<?php echo base64_encode('allergies') ?>" class="btn btn-danger  DelBtn">X</button>
                                     </div>
                                    </div>



                                    <?php  }
                                        }else{ ?>

                                                   <div class="row">
                                        <div class="col-md-4 col-sm-3">
                                        <div class="form-group">
                                            <label for="simpleFormEmail">Medications</label>
                                            <input type="text" class="form-control" name="medications[]"
                                                placeholder="Enter  Medications">
                                        </div>
                                    </div>
                                        <div class="col-md-4 col-sm-3">
                                        <div class="form-group">
                                            <label for="simpleFormEmail">  Food</label>
                                            <input type="text"   class="form-control" name="food[]"
                                                placeholder="Enter Food">
                                        </div>
                                    </div>
                                        <div class="col-md-3 col-sm-3">
                                        <div class="form-group">
                                            <label for="simpleFormPassword">Other</label>
                                            <input type="text" class="form-control" name="other[]" 
                                                placeholder="">
                                        </div>
                                    </div>
                                    </div>


                                      <?php   }

                                     ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                                    <div class="card card-box">
                                <div class="card-head">
                                    <header>Current Medications</header>
                                 <button type="button" name="add" id="add_current" class="btn btn-success add-btn">+</button>
                                </div>
                                <div class="card-body " id="bar-parent4">

                            
                                    
                                        <?php if($current_medications) { 
                                     
                                        foreach ($current_medications as  $current_medication) {
                                         ?> 
                                                       <div class="row">
                                        <div class="col-md-4 col-sm-3">
                                        <div class="form-group">
                                            <label for="simpleFormEmail"> Medication Name</label>
                                            <input type="text" class="form-control" name="medication_name[]"
                                                placeholder="Enter Medication Name" value="<?= $current_medication->medication_name ?>">
                                        </div>
                                    </div>
                                        <div class="col-md-4 col-sm-3">
                                        <div class="form-group">
                                            <label for="simpleFormEmail">  Dosage</label>
                                            <input type="text"   class="form-control" name="medication_dosage[]"
                                                placeholder="Enter Dosage" value="<?= $current_medication->dosage ?>">
                                        </div>
                                    </div>
                                        <div class="col-md-3 col-sm-3">
                                        <div class="form-group">
                                            <label for="simpleFormPassword">Frequency</label>
                                            <input type="text" class="form-control" name="medication_frequency[]" 
                                                placeholder="Enter Frequency" value="<?= $current_medication->frequency ?>">
                                        </div>
                                        </div>
                                        <div class="col-md-1 col-sm-1 mt-4">
                                         <button type="button" name="remove"  data-id="<?= $current_medication->id ?>" data-table = "<?php echo base64_encode('current_medications') ?>" class="btn btn-danger  DelBtn">X</button>
                                         </div>
                                    </div>
                                    <?php  }
                                        }else{ ?>

                                                    <div class="row">
                                        <div class="col-md-4 col-sm-3">
                                        <div class="form-group">
                                            <label for="simpleFormEmail"> Medication Name</label>
                                            <input type="text" class="form-control" name="medication_name[]"
                                                placeholder="Enter Medication Name">
                                        </div>
                                    </div>
                                        <div class="col-md-4 col-sm-3">
                                        <div class="form-group">
                                            <label for="simpleFormEmail">  Dosage</label>
                                            <input type="text"   class="form-control" name="medication_dosage[]"
                                                placeholder="Enter Dosage">
                                        </div>
                                    </div>
                                        <div class="col-md-3 col-sm-3">
                                        <div class="form-group">
                                            <label for="simpleFormPassword">Frequency</label>
                                            <input type="text" class="form-control" name="medication_frequency[]" 
                                                placeholder="Enter Frequency">
                                        </div>
                                    </div>
                                    </div>


                                      <?php   }

                                     ?>
                                </div>
                            </div>
                        </div>
                
                    
                    </div>
                        <div class="row">
                   
                        <div class="col-md-6 col-sm-6">
                                    <div class="card card-box">
                                <div class="card-head">
                                    <header>Family Medical History</header>
                                     <button type="button" name="add" id="add_family" class="btn btn-success add-btn">+</button>
                                </div>
                                <div class="card-body " id="bar-parent5">

                                       <?php if($family_medical_history) { 
                                     
                                        foreach ($family_medical_history as  $family_medical) {
                                         ?> 

                                    <div class="row">
                                        <div class="col-md-6 col-sm-3">
                                        <div class="form-group">
                                            <label for="simpleFormEmail">Conditions (e.g., heart disease, diabetes, cancer)</label>
                                            <input type="text" class="form-control" name="family_medical_history[]"
                                                placeholder="" value="<?= $family_medical->condition_name ?>">
                                        </div>
                                    </div>
                                        <div class="col-md-5 col-sm-3">
                                        <div class="form-group">
                                            <label for="simpleFormEmail">  Relationship to Patient</label>
                                            <input type="text"   class="form-control" name="relationship_to_patient[]"
                                                placeholder=" " value="<?= $family_medical->relationship_to_patient ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-1 col-sm-1 mt-4">
                                         <button type="button" name="remove"  data-id="<?= $family_medical->id ?>" data-table = "<?php echo base64_encode('family_medical_history') ?>" class="btn btn-danger  DelBtn">X</button>
                                         </div>
                                    
                                    </div>
                                           <?php  }
                                        }else{ ?>


                                    <div class="row">
                                        <div class="col-md-6 col-sm-3">
                                        <div class="form-group">
                                            <label for="simpleFormEmail">Conditions (e.g., heart disease, diabetes, cancer)</label>
                                            <input type="text" class="form-control" name="family_medical_history[]"
                                                placeholder="">
                                        </div>
                                    </div>
                                        <div class="col-md-5 col-sm-3">
                                        <div class="form-group">
                                            <label for="simpleFormEmail">  Relationship to Patient</label>
                                            <input type="text"   class="form-control" name="relationship_to_patient[]"
                                                placeholder=" ">
                                        </div>
                                    </div>
                                    
                                    </div>


                                      <?php   }

                                     ?>
                                        
                                    
                                </div>
                            </div>
                        </div>
                          <div class="col-md-6 col-sm-6">
                                    <div class="card card-box" >
                                <div class="card-head">
                                    <header>Immunization History</header>
                                     <button type="button" name="add" id="add_immunization" class="btn btn-success add-btn">+</button>
                                </div>
                                <div class="card-body " id="bar-parent6">
                                 
                                           <?php if($immunization_history) { 
                                     
                                        foreach ($immunization_history as  $immunization_historys) {
                                         ?> 

                                    <div class="row">
                                         <div class="col-md-6 col-sm-3">
                                        <div class="form-group">
                                            <label for="simpleFormEmail">Vaccination</label>
                                            <input type="text" class="form-control" name="vaccination[]"
                                                placeholder=" " value="<?= $immunization_historys->vaccination ?>">
                                        </div>
                                    </div>
                                        <div class="col-md-5 col-sm-3">
                                        <div class="form-group">
                                            <label for="simpleFormEmail">  Date Received</label>
                                            <input type="date"  id=""  class="form-control" name="vaccination_date[]"
                                                placeholder="Enter Date" value="<?= date('Y-m-d', strtotime($immunization_historys->vaccination_date)) ?>">
                                        </div>
                                        </div>
                                    <div class="col-md-1 col-sm-1 mt-4">
                                         <button type="button" name="remove"  data-id="<?= $immunization_historys->id ?>" data-table = "<?php echo base64_encode('immunization_history') ?>" class="btn btn-danger  DelBtn">X</button>
                                         </div>
                                    
                                    </div>
                                           <?php  }

                                        }else{ ?>

                                               <div class="row">
                                        <div class="col-md-6 col-sm-3">
                                        <div class="form-group">
                                            <label for="simpleFormEmail">Vaccination</label>
                                            <input type="text" class="form-control" name="vaccination[]"
                                                placeholder="">
                                        </div>
                                    </div>
                                        <div class="col-md-5 col-sm-3">
                                        <div class="form-group">
                                            <label for="simpleFormEmail">  Date Received</label>
                                            <input type="date"  id=""  class="form-control" name="vaccination_date[]"
                                                placeholder="Enter Date">
                                        </div>
                                    </div>
                                    
                                    </div>


                                      <?php   }

                                     ?>
                                    
                                        
                                    
                                </div>
                            </div>
                        </div>
                  </div>    
                  <div class="row">
                      
                        <div class="col-md-6 col-sm-6">
                                    <div class="card card-box" >
                                <div class="card-head">
                                    <header>Previous Medical Test Results</header>
                                        <button type="button" name="add" id="add_medical_test" class="btn btn-success add-btn">+</button>
                                </div>
                                <div class="card-body " id="bar-parent7">
                                    <h5>List any relevant medical test results and their dates (e.g., blood tests, imaging reports)</h5>
                                  
                                      <?php if($previous_medical_test_results) { 
                                     
                                        foreach ($previous_medical_test_results as  $previous_medical_test) {
                                         ?> 

                                    <div class="row">
                                     <div class="col-md-10 col-sm-3">
                                        <div class="form-group">
                                            <label for="simpleFormEmail"></label>
                                            <input type="text" class="form-control" name="medical_test[]"
                                                placeholder="" value="<?= $previous_medical_test->test_name ?>">
                                        </div>
                                    </div>  
                                    <div class="col-md-1 col-sm-1 mt-4">
                                         <button type="button" name="remove"  data-id="<?= $previous_medical_test->id ?>" data-table = "<?php echo base64_encode('previous_medical_test_results') ?>" class="btn btn-danger  DelBtn">X</button>
                                         </div>
                                    
                                    </div>
                                           <?php  }

                                        }else{ ?>

                                              <div class="row">
                                        <div class="col-md-10 col-sm-3">
                                        <div class="form-group">
                                            <label for="simpleFormEmail"></label>
                                            <input type="text" class="form-control" name="medical_test[]"
                                                placeholder="">
                                        </div>
                                    </div>  
                                     </div>


                                      <?php   }

                                     ?>
                                    
                                        
                                    
                                </div>
                            </div>
                        </div>
                      
                <div class="col-md-6 col-sm-6">
                                    <div class="card card-box" style="height:">
                                <div class="card-head">
                                    <header>Current Symptoms or Concerns</header>
                                      <button type="button" name="add" id="add_current_symptoms" class="btn btn-success add-btn">+</button>
                                </div>
                                <div class="card-body " id="bar-parent8">
                                    <h5>List any symptoms or concerns you would like to discuss with the doctor:</h5>
                                
                                       <?php if($current_symptoms_concerns) { 
                                     
                                        foreach ($current_symptoms_concerns as  $current_symptoms) {
                                         ?> 

                                    <div class="row">
                                    <div class="col-md-6 col-sm-3">
                                        <div class="form-group">
                                            <label for="simpleFormEmail">Symptom </label>
                                            <input type="text" class="form-control" name="symptom[]"
                                                placeholder="" value="<?= $current_symptoms->symptom ?>">
                                        </div>
                                    </div>  
                                    <div class="col-md-5 col-sm-3">
                                        <div class="form-group">
                                            <label for="simpleFormEmail">Concerns</label>
                                            <input type="text" class="form-control" name="concerns[]"
                                                placeholder="" value="<?= $current_symptoms->concerns ?>">
                                        </div>
                                    </div> 
                                    <div class="col-md-1 col-sm-1 mt-4">
                                         <button type="button" name="remove"  data-id="<?= $current_symptoms->id ?>" data-table = "<?php echo base64_encode('current_symptoms_concerns') ?>" class="btn btn-danger  DelBtn">X</button>
                                         </div>
                                    
                                    </div>
                                     <?php }  }else{ ?>

                                                <div class="row">
                                        <div class="col-md-6 col-sm-3">
                                        <div class="form-group">
                                            <label for="simpleFormEmail">Symptom </label>
                                            <input type="text" class="form-control" name="symptom[]"
                                                placeholder="" >
                                        </div>
                                    </div>  
                                    <div class="col-md-5 col-sm-3">
                                        <div class="form-group">
                                            <label for="simpleFormEmail">Concerns</label>
                                            <input type="text" class="form-control" name="concerns[]"
                                                placeholder="">
                                        </div>
                                    </div>
                                    
                                    
                                    </div>


                                      <?php   }

                                     ?>
                                        
                                    
                                </div>
                            </div>
                        </div>
                  </div>  
             
                  <div class="row">
                     <div class="col-md-6 col-sm-6">
                                    <div class="card card-box">
                                <div class="card-head">
                                    <header>Lifestyle Habits</header>
                                    
                                </div>
                                <div class="card-body " id="bar-parent">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-3">
                                        <div class="form-group">
                                                    <label for="simpleFormPassword">Smoking</label><br>

                                                <input type="radio" name="smoking" id="optionsRadios1" value="Yes" <?php if(isset($medical_history->smoking)) { if($medical_history->smoking === "Yes") { echo "Checked"; } } ?>>
                                                    <label for="optionsRadios1">Yes</label> 
                                                    <input type="radio" name="smoking" id="optionsRadios2" value="No" <?php if(isset($medical_history->smoking)) {  if($medical_history->smoking === "No") { echo "Checked"; } } ?>>
                                                    <label for="optionsRadios2">No</label>
                                                    <input type="radio" name="smoking" id="optionsRadios2" value="Occasional"<?php if(isset($medical_history->smoking)) {  if($medical_history->smoking === "Occasional") { echo "Checked"; } } ?> >
                                                    <label for="optionsRadios3">Occasional</label>
                                                    
                                                
                                            </div>
                                    </div>
                                        <div class="col-md-6 col-sm-3">
                                            <div class="form-group">
                                                    <label for="simpleFormPassword">Alcohol Consumption</label><br>

                                                    <input type="radio" name="alcohol" id="optionsRadios1" value="Yes" <?php if(isset($medical_history->alcohol)) {  if($medical_history->alcohol === "Yes") { echo "Checked"; }   } ?> >
                                                    <label for="optionsRadios1">Yes</label> 
                                                    <input type="radio" name="alcohol" id="optionsRadios2" value="No" <?php if(isset($medical_history->alcohol)) {  if($medical_history->alcohol === "No") { echo "Checked"; }   } ?> >
                                                    <label for="optionsRadios2">No</label>
                                                    <input type="radio" name="alcohol" id="optionsRadios2" value="Occasional" <?php if(isset($medical_history->alcohol)) {  if($medical_history->alcohol === "Occasional") { echo "Checked"; }   } ?> >
                                                    <label for="optionsRadios3">Occasional</label>
                                                
                                            </div>
                                    </div>
                                        <div class="col-md-6 col-sm-3">
                                        <div class="form-group">
                                                    <label for="simpleFormPassword">Exercise</label><br>

                                                    <input type="radio" name="exercise_habits" id="optionsRadios1" value="Yes" <?php if(isset($medical_history->exercise_habits)) {  if($medical_history->exercise_habits === "Yes") { echo "Checked"; }   } ?> >
                                                    <label for="optionsRadios1">Yes</label> 
                                                    <input type="radio" name="exercise_habits" id="optionsRadios2" value="No" <?php if(isset($medical_history->exercise_habits)) { if($medical_history->exercise_habits === "No") { echo "Checked"; }  } ?> >
                                                    <label for="optionsRadios2">No</label>
                                                    <input type="radio" name="exercise_habits" id="optionsRadios2" value="Occasional" <?php if(isset($medical_history->exercise_habits)) { if($medical_history->exercise_habits === "Occasional") { echo "Checked"; }   } ?> >
                                                    <label for="optionsRadios3">Occasional</label>
                                                
                                            </div>
                                    </div>
                                    
                                    </div>
                                    
                                        
                                    
                                </div>
                            </div>
                        </div>

                  
                            <div class="col-md-6 col-sm-6">
                                    <div class="card card-box" style="height:203px">
                                <div class="card-head">
                                    <header>Health Insurance Information:</header>
                                    
                                </div>
                                <div class="card-body " id="bar-parent">
                                
                                    <div class="row">
                                        <div class="col-md-6 col-sm-3">
                                        <div class="form-group">
                                            <label for="simpleFormEmail">Insurance Provider </label>
                                            <input type="text" class="form-control" name="insurance_provider"
                                                placeholder="" value="<?= isset($medical_history->insurance_provider) ? $medical_history->insurance_provider : ''  ?>">
                                        </div>
                                    </div>  
                                    <div class="col-md-6 col-sm-3">
                                        <div class="form-group">
                                            <label for="simpleFormEmail">Policy Number</label>
                                            <input type="text" class="form-control" name="policy_no"
                                                placeholder="" value="<?= isset($medical_history->policy_number) ? $medical_history->policy_number : ''  ?>">
                                        </div>
                                    </div>
                                    
                                    
                                    </div>
                                    
                                        
                                    
                                </div>
                            </div>
                        </div>
                  </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                                <div class="card-head">
                                    <!-- <header>Health Insurance Information:</header> -->
                                    
                                </div>
                                <div class="card-body " id="bar-parent5">
                              <!--       <div class="row">
                                        <div class="col-md-6 col-sm-3">
                                        <div class="form-group">
                                            <label for="simpleFormEmail">Insurance Provider 2</label>
                                            <input type="text" class="form-control" name=""
                                                placeholder="">
                                        </div>
                                    </div>  
                                    <div class="col-md-6 col-sm-3">
                                        <div class="form-group">
                                            <label for="simpleFormEmail">Policy Number</label>
                                            <input type="text" class="form-control" name=""
                                                placeholder="">
                                        </div>
                                    </div>
                                    
                                    
                                    </div> -->
                                    <input type="hidden" name="member_id" value="<?=$this->input->get('id');?>">
                                        <button type="submit" class="btn btn-primary" id="add_medical">Submit</button>
                                        <a type="button" href="<?php echo base_url()?>Member/Member_Medical_history" class="btn btn-default">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
            
            </div>
            <!-- end page content -->
            <!-- start chat sidebar -->
            
            <!-- end chat sidebar -->
        </div>
            <!-- end page content -->

        </div>


        
    </div>
   <?php $this->load->view('Backend/members/member-temp/footer'); ?> 
   
    <script src="<?php echo base_url(); ?>assets/backend_assets/bundles/material/material.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend_assets/bundles/flatpicker/js/flatpicker.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend_assets/data/date-time.init.js"></script>
    <?php $this->load->view('Backend/members/member-temp/add-more-fields'); ?> 
</body>


<script type="text/javascript">
     //date
          $(document).ready(function () {
          flatpickr("#date", {
            dateFormat: "d-m-Y",
            allowInput: true,
            onOpen: function (selectedDates, dateStr, instance) {
              // Get the current date
              var currentDate = new Date();

              // Set the calendar's date to the current year and month
              instance.currentYear = currentDate.getFullYear();
              instance.currentMonth = currentDate.getMonth();
              instance.redraw();

              // Set the selected date if it exists
              if (instance.input.value) {
                instance.setDate(instance.input.value, false);
              }
            },
          });
        });
      

   $(document).on('click','#add_medical',function(){
        event.preventDefault();
        $("#medical_history_form").valid();
        var physician_name = $("#physician_name").val();
        var physician_no = $("#physician_no").val();
  

        
        if(physician_name != '' && physician_no != '')
       {
        $.ajax({
        type:'post',
        url: '<?php echo base_url("Member/save_medical_history");?>',
        data: new FormData($("#medical_history_form")[0]),
        contentType: false,
        processData: false, 
        success:function(resp){
        var data=$.parseJSON(resp);
        if(data.status == 'success'){
        $('#medical_history_form')[0].reset();
        $.wnoty({
        type: 'success',
        message: data.message,
        autohideDelay: 1000,
        position: 'top-right'

        });
        setTimeout(function(){
        window.location.href = '<?php echo base_url()?>Member/Member_Medical_history';
        },2000);

        }else if(data.status == 'error'){

          $.wnoty({
                type: 'error',
                message: data.message,
                autohideDelay: 2000,
                position: 'top-right'

                });
        }
        },
        });
        }

        return false;
        })
        //delete
        $(document).on('click','.DelBtn', function (e) {
        //var id = $(this).parents('tr').find('#id').val();
        var id = $(this).attr('data-id');
        var table = $(this).attr('data-table');

       $.confirm({
        title: 'Delete Warning!',
        content: 'Are you sure, you want to delete  ?',
        boxWidth: '25%',
        useBootstrap: false,
        buttons: {
        delete: {
        text: 'Delete',
        btnClass: 'btn-primary',
        action: function(){
        $.ajax({
        type: 'post',
        url: '<?php echo base_url('Member/delete_items') ?>',
        data: {id:id,table:table},
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
           
</script>
</html>