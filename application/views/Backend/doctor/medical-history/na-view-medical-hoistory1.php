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
     <?php $this->load->view('Backend/doctor/doctor-temp/link-css'); ?> 
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
    
    <!-- <div class="page-wrapper">
       
        <?php $this->load->view('Backend/doctor/doctor-temp/header'); ?> 
        <div class="page-container">
        
          <?php $this->load->view('Backend/doctor/doctor-temp/sidebar'); ?> 
          
            <div class="page-content-wrapper">
                <div class="page-content">
                    <form id="medical_history_form" method="post" class="">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">View Medical History </div>
                            </div>
                          
                        </div>
                    </div>
                    <div class="row">
            <div class="col-md-12">
               
                <div class="profile-sidebar">
                    <div class="card" style="min-height: 220px;height: 250px;">
                        <div class="card-body no-padding height-9">
                            <div class="row">
                                <div class="profile-userpic">
                                    <img src="<?php if($user_data->profile  ) { echo base_url('assets/uploads/users_profile/').$user_data->profile; }else{echo base_url('assets/default.png'); }?>" class="img-responsive" alt=""> </div>
                            </div>
                            <div class="profile-usertitle">

                                <div class="profile-usertitle-name"> <?= $user_data->name ?> </div>
                                <div class="profile-usertitle-job"> Member </div>
                            </div>
                           
                        </div>
                    </div>
               
        
                    
                </div>
               
                <div class="profile-content">
                    <div class="row">
                        <div class="card" style="min-height: 220px;height: ;border-radius: 10px 10px;">
                            <div class="card-topline-aqua">
                                <header></header>
                            </div>
                             <div class="card-body no-padding height-9">
                            <div class="white-box">
                               
                                <div class="p-rl-20">
                                
                                </div>
        
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
                                              
                                                   <div class="col-md-3 col-xs-6 b-r"> <strong>DOB
                                                        </strong>
                                                    <br>
                                                    <p class="text-muted"><?=  ($user_data->dob) ? date('d-m-Y', strtotime($user_data->dob)) : ''  ?> </p>
                                                </div>
                                                <?php 
                                                 // Calculate the age based on the DOB
                                                    $birthDate = new DateTime($user_data->dob);
                                                    $currentDate = new DateTime();
                                                    $ageInterval = $currentDate->diff($birthDate);
                                                    $age = $ageInterval->y;
                                                 ?>
                                                   <div class="col-md-3 col-xs-6 b-r"> <strong>Age
                                                        </strong>
                                                    <br>
                                                    <p class="text-muted"><?= ($user_data->dob) ?  $age : ''?> </p>
                                                </div>   
                                                   <div class="col-md-3 col-xs-6 b-r"> <strong>Blood Group
                                                        </strong>
                                                    <br>
                                                    <p class="text-muted"><?= $user_data->bloodgroup ?> </p>
                                                </div>
                                                   <div class="col-md-3 col-xs-3 b-r"> <strong>Emergency Contact
                                                        </strong>
                                                    <br>
                                                    <p class="text-muted"><?= $user_data->emergency_contact_name ?> </p>
                                                </div>
                                               
                                            </div>
                                            <div class="row">
                                                
                                                 
                                                 <div class="col-md-3 col-xs-3 b-r"> <strong>Relationship
                                                        </strong>
                                                    <br>
                                                    <p class="text-muted"><?= $user_data->emergency_contact_relationship ?> </p>
                                                </div>
                                                <div class="col-md-3 col-xs-3 b-r"> <strong>Emergency Contact No
                                                        </strong>
                                                    <br>
                                                    <p class="text-muted"><?= $user_data->emergency_contact_phone ?> </p>
                                                </div>
                                                <div class="col-md-3 col-xs-3 b-r"> <strong>Address
                                                        </strong> 
                                                         <br>
                                                    <p class="text-muted" maxlength="50"><?php echo substr($user_data->address,0,150) ?></p>
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
               
            </div>
        </div>
                               <div class="row">
                        <div class="col-md-12">
                      
                            <div class="profile-content">
                                <div class="row">
                                    <div class="card" style="min-height: 220px;height: ;border-radius: 10px 10px;">
                                   
                                         <div class="card-body no-padding height-9">
                                        <div class="white-box">
                                           
                                            <div class="p-rl-20">
                                            
                                            </div>
                                        
                                         <div class="tab-content">
                                                    <div class="tab-pane active fontawesome-demo" id="tab1">
                                                    <div id="biography">
                                                                           
                                                        <?php 
                                                        $d_id = $user_data->doctor;
                                                        $doctor = $this->Doctor_model->getDoctorByID($d_id ); ?>
                                                        <div class="row">
                                                           
                                                          
                                                            <div class="col-md-3 col-xs-6 b-r"> Doctor Name
                                                              
                                                                <br>
                                                                <p class="text-muted"><?= ($doctor->name)? $doctor->name : 'Null'  ?> </p>
                                                            </div>
                                                            <div class="col-md-3 col-xs-6 b-r"> Doctor Number
                                                                <br>
                                                                <p class="text-muted"><?= ($doctor->mobile_no)? $doctor->mobile_no : 'Null' ?> </p>
                                                            </div>
                                                       
                                                          
                                                        </div>   
                                                    
                                                        <div class="row">
                                                            <strong>Primary Care Physician (AssistHealth Doctor) :</strong>
                                                           
                                                          
                                                            <div class="col-md-3 col-xs-6 b-r"> Physician Name
                                                                    
                                                                <br>
                                                                <p class="text-muted"><?= $medical_history->physician_name ?> </p>
                                                            </div>
                                                            <div class="col-md-3 col-xs-6 b-r"> Physician Number
                                                                <br>
                                                                <p class="text-muted"><?= $medical_history->physician_no ?> </p>
                                                            </div>
                                                       
                                                          
                                                        </div>  
                                                        <div class="row">
                                                           <strong>Lifestyle Habits :</strong>
                                                           <div class="col-md-3 col-xs-6 b-r"> Smoking
                                                                <br>
                                                                <p class="text-muted"><?= $medical_history->smoking ?> </p>
                                                            </div>
                                                            <div class="col-md-3 col-xs-6 b-r"> Alcohol Consumption
                                                                <br>
                                                                <p class="text-muted"><?= $medical_history->alcohol ?> </p>
                                                            </div>  
                                                            <div class="col-md-3 col-xs-6 b-r"> Exercise
                                                                <br>
                                                                <p class="text-muted"><?= $medical_history->exercise_habits ?> </p>
                                                            </div>
                                                           
                                                        </div>   
                                                         <div class="row">
                                                              <strong>Health Insurance Information:</strong>
                                                              <div class="col-md-3 col-xs-6 b-r"> Insurance Provider
                                                                <br>
                                                                <p class="text-muted"><?= $medical_history->insurance_provider ?> </p>
                                                            </div>
                                                            <div class="col-md-3 col-xs-6 b-r"> Policy Number
                                                                <br>
                                                                <p class="text-muted"><?= $medical_history->policy_number ?> </p>
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
                           
                        </div>
                    </div>



                   
               
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header>Previous Medical Conditions (If applicable) :</header>
                                  
                                </div>
                                <div class="card-body " id="bar-parent1">
                                  
                                 

                                        <div class="">
                                                <table class="table table-striped table-hover dt-bootstrap5">
                                                    <thead>
                                                        <tr>
                                                            <th>S.no </th>
                                                            <th> Condition</th>
                                                            <th> Diagnosis  Date  </th>
                                                            <th> Treatment Received </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                     <?php if($previous_medical_conditions) { 
                                                            $previousCount = 1;
                                                            foreach ($previous_medical_conditions as  $previous_medical) {
                                                               
                                                            
                                                            ?>
                                                                            <tr>
                                                                                <td> <?=$previousCount?> </td>
                                                                                <td> <?= $previous_medical->condition_name ?> </td>
                                                                                <td> <?= date('Y-m-d', strtotime($previous_medical->diagnosis_date)) ?> </td>
                                                                                <td> <?= $previous_medical->treatment_received ?> </td>
                                                                            </tr>
                                                                            <?php 
                                                             $previousCount ++;
                                                           }
                                                            }

                                                         ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                  
                                 
                                        
                                    
                                </div>
                            </div>
                        </div>
                         <div class="col-md-6 col-sm-6">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header>Surgeries or Procedures (if applicable) :</header>
                                
                                </div>
                                <div class="card-body " id="bar-parent2">
                            
                                    
                                   

                                           <div class="">
                                                <table class="table table-striped table-hover dt-bootstrap5">
                                                    <thead>
                                                        <tr>
                                                            <th>S.no </th>
                                                            <th> Procedure</th>
                                                            <th>  Date  </th>
                                                            <th>Surgeon/Doctor</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                                         <?php if($surgeries_procedures) { 
                                                     $surgeries_procedures_count =1 ;
                                                        foreach ($surgeries_procedures as  $surgeries) {
                                                           
                                                        
                                                        ?>
                                                                        <tr>
                                                                            <td> <?=$surgeries_procedures_count?> </td>
                                                                            <td> <?= $surgeries->procedure_name ?> </td>
                                                                            <td> <?= date('Y-m-d', strtotime($surgeries->procedure_date)) ?></td>
                                                                            <td> <?= $surgeries->surgeon ?></td>
                                                                        </tr>
                                                                             <?php 
                                                        $surgeries_procedures_count++;
                                                       }
                                                        }

                                     ?>
                                    
                                                    
                                                    </tbody>
                                                </table>
                                            </div>


                                     
                                </div>
                            </div>
                        </div>
                        
                
                    
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header>Allergies</header>
                                  
                                </div>
                                <div class="card-body " id="bar-parent3">
                            
                                     
                                            <div class="">
                                                <table class="table table-striped table-hover dt-bootstrap5">
                                                    <thead>
                                                        <tr>
                                                            <th>S.no </th>
                                                            <th> Medications</th>
                                                            <th>Food </th>
                                                            <th> Other </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if($allergies) { 

                                                                   $allergies_count = 1;
                                                        foreach ($allergies as  $allergie) {
                                                         ?>
                                                                        <tr>
                                                            <td> <?=$allergies_count?> </td>
                                                            <td> <?= $allergie->medications ?> </td>
                                                            <td> <?= $allergie->food ?></td>
                                                            <td> <?= $allergie->other ?> </td>
                                                        </tr>
                                                          <?php  $allergies_count++; }
                                        }

                                     ?>
                                                    
                                                    </tbody>
                                                </table>
                                            </div>
                                           



                                  
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                                    <div class="card card-box">
                                <div class="card-head">
                                    <header>Current Medications</header>
                              
                                </div>
                                <div class="card-body " id="bar-parent4">

                                    
                                      
                                            <div class="">
                                                <table class="table table-striped table-hover dt-bootstrap5">
                                                    <thead>
                                                        <tr>
                                                            <th>S.no </th>
                                                            <th> Medication Name</th>
                                                            <th>Dosage  </th>
                                                            <th> Frequency </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                   <?php if($current_medications) { 
                                       $current_medication_count = 1;
                                        foreach ($current_medications as  $current_medication) {
                                         ?> 
                                                        <tr>
                                                            <td> <?=$current_medication_count?> </td>
                                                            <td> <?= $current_medication->medication_name ?> </td>
                                                            <td> <?= $current_medication->dosage ?></td>
                                                            <td> <?= $current_medication->frequency ?> </td>
                                                        </tr>
                                                    <?php  $current_medication_count++; }
                                        } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                            
                                    

                                </div>
                            </div>
                        </div>
                
                    
                    </div>
                        <div class="row">
                   
                        <div class="col-md-6 col-sm-6">
                                    <div class="card card-box">
                                <div class="card-head">
                                    <header>Family Medical History</header>
                                  
                                </div>
                                <div class="card-body " id="bar-parent5">

                                   
                                     
                                            <div class="">
                                                <table class="table table-striped table-hover dt-bootstrap5">
                                                    <thead>
                                                        <tr>
                                                            <th>S.no </th>
                                                            <th> Conditions</th>
                                                            <th> Relationship to Patient </th>
                                                        
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                      
                                                              <?php if($family_medical_history) { 
                                                      $family_medical_count = 1;
                                                        foreach ($family_medical_history as  $family_medical) {
                                                         ?> <tr>
                                                                            <td> <?=$family_medical_count?> </td>
                                                                            <td> <?= $family_medical->condition_name ?> </td>
                                                                            <td> <?= $family_medical->relationship_to_patient ?></td>
                                                                            
                                                                        </tr>
                                                                       <?php  $family_medical_count++;
                                                                        }
                                                        }

                                                     ?>
                                                    </tbody>
                                                </table>
                                            </div>

                           
                                        
                                        
                                    
                                </div>
                            </div>
                        </div>
                          <div class="col-md-6 col-sm-6">
                                    <div class="card card-box" >
                                <div class="card-head">
                                    <header>Immunization History</header>
                                  
                                </div>
                                <div class="card-body " id="bar-parent6">
                                
                                    

                                            <div class="">
                                                <table class="table table-striped table-hover dt-bootstrap5">
                                                    <thead>
                                                        <tr>
                                                            <th>S.no </th>
                                                            <th> Vaccination</th>
                                                            <th> Date Received </th>
                                                          
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                         <?php if($immunization_history) { 
                                      $immunization_count = 1;
                                        foreach ($immunization_history as  $immunization_historys) {
                                         ?> 
                                                        <tr>
                                                            <td> <?=$immunization_count?> </td>
                                                            <td> <?= $immunization_historys->vaccination ?> </td>
                                                            <td> <?= date('Y-m-d', strtotime($immunization_historys->vaccination_date)) ?> </td>
                                                         
                                                        </tr>
                                                         <?php $immunization_count++; }
                                        }

                                     ?>
                                                    
                                                    </tbody>
                                                </table>
                                            </div>

                             
                                          
                                    
                                        
                                    
                                </div>
                            </div>
                        </div>
                  </div> 
                       <div class="row">
                      
                        <div class="col-md-6 col-sm-6">
                                    <div class="card card-box" >
                                <div class="card-head">
                                    <header>Previous Medical Test Results</header>
                                      
                                </div>
                                <div class="card-body " id="bar-parent7">
                                  
                                  
                                    

                                                <div class="">
                                                <table class="table table-striped table-hover dt-bootstrap5">
                                                    <thead>
                                                        <tr>
                                                            <th>S.no </th>
                                                            <th> Previous Medical Test</th>
                                                          
                                                          
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                          <?php if($previous_medical_test_results) { 
                                        $previousmedicalCount = 1;
                                        foreach ($previous_medical_test_results as  $previous_medical_test) {
                                         ?> 
                                                        <tr>
                                                            <td> <?=$previousmedicalCount?> </td>
                                                            <td> <?= $previous_medical_test->test_name ?> </td>
                                                         
                                                         
                                                        </tr>
                                                        <?php  $previousmedicalCount++; }
                                        }

                                     ?>
                                                    
                                                    </tbody>
                                                </table>
                                            </div>

                                 
                                           
                                    
                                        
                                    
                                </div>
                            </div>
                        </div>
                      
                <div class="col-md-6 col-sm-6">
                                    <div class="card card-box" style="height:">
                                <div class="card-head">
                                    <header>Current Symptoms or Concerns</header>
                                    
                                </div>
                                <div class="card-body " id="bar-parent8">
                                  
                            
                                     
                                                <div class="">
                                                <table class="table table-striped table-hover dt-bootstrap5">
                                                    <thead>
                                                        <tr>
                                                            <th>S.no </th>
                                                            <th> Symptom</th>
                                                            <th> Concerns </th>
                                                          
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                          <?php if($current_symptoms_concerns) { 
                                      $concerns_count = 1;
                                        foreach ($current_symptoms_concerns as  $current_symptoms) {
                                         ?> 

                                                        <tr>
                                                            <td> <?=$concerns_count?> </td>
                                                            <td> <?= $current_symptoms->symptom ?> </td>
                                                            <td> <?= $current_symptoms->concerns ?> </td>
                                                         
                                                        </tr>
                                                          <?php $concerns_count++; }
                                        }?>
                                    
                                                    
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


        
    </div> -->
   <?php $this->load->view('Backend/doctor/doctor-temp/footer'); ?> 
   
    <script src="<?php echo base_url(); ?>assets/backend_assets/bundles/material/material.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend_assets/bundles/flatpicker/js/flatpicker.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend_assets/data/date-time.init.js"></script>
    <?php $this->load->view('Backend/doctor/doctor-temp/add-more-fields'); ?> 
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
        url: '<?php echo base_url("Doctor/save_medical_history");?>',
        data: new FormData($("#medical_history_form")[0]),
        contentType: false,
        processData: false, 
        success:function(resp){
        var data=$.parseJSON(resp);
        if(data.status == 'success'){
        //$('#medical_history_form')[0].reset();
        $.wnoty({
        type: 'success',
        message: data.message,
        autohideDelay: 1000,
        position: 'top-right'

        });
        setTimeout(function(){
        window.location.href = '<?php echo base_url()?>Doctor/Member_Medical_history';
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
        url: '<?php echo base_url('Doctor/delete_items') ?>',
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


     $(document).ready(function() {
    $('.table').DataTable({

        searching: false, // Disable search
        ordering: false, // Disable sorting
        lengthChange: false, // Disable "Show X entries" dropdown
        paging: true, // Enable pagination
        language: {
            info: "" // Disable the "Showing X to X of X entries" message
        },
        pageLength: 5, // Set default page length to 5
       
    });
    });
</script>
</html>