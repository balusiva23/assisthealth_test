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

</head>
<!-- END HEAD -->

<body
    class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white white-sidebar-color logo-indigo">
    <div class="page-wrapper">
    <!-- start header -->
        <?php $this->load->view('Backend/doctor/doctor-temp/header'); ?> 
        <div class="page-container">
            <!-- start sidebar menu -->
          <?php $this->load->view('Backend/doctor/doctor-temp/sidebar'); ?> 
            <!-- end sidebar menu -->
            <!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Book Appointment</div>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header>Book Appointment</header>


                                </div>
                                <div class="card-body" id="bar-parent">
                                    <form  id="member_form_add" method="post" class="form-horizontal"  enctype="multipart/form-data">
                                        <div class="form-body">
                                            <div class="form-group row">
                                                <label class="control-label col-md-3"> Full Name
                                                    <span class="required"> </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" name="name" data-required="1"
                                                       class="form-control input-height" value="<?= $user_data->name ?>" readonly/>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Email ID
                                                    <span class="required"> </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" name="email" data-required="1"
                                                         class="form-control input-height" value="<?= $user_data->email ?>" readonly/>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Gender
                                                    <span class="required"> </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <select class="form-control input-height" name="gender" readonly>
                                                        <option value="">Select...</option>
                                                        <option value="male" <?php if($user_data->gender == "male") echo 'selected'; ?> >Male</option>
                                                        <option value="female" <?php if($user_data->gender == "female") echo 'selected'; ?>>Female</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Mobile No.
                                                    <span class="required"> </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input name="number" type="text" 
                                                        class="form-control input-height" value="<?= $user_data->number ?>" readonly/>
                                                </div>
                                            </div>
                                         <!--    <div class="form-group row">
                                                <label class="control-label col-md-3">Profile Picture
                                                </label>
                                               <div class="col-md-5">
                                                    <input type="file" class="default" name="file_url">
                                                </div> 
                                                   <?php  if($user_data->profile){ ?>
                                             <div class="preview" style="  display: grid;place-items: center;">
                                               <img src="<?php echo base_url('assets/uploads/users_profile/').$user_data->profile ?>" id="pre-img" style="width:100px">

                                              </div>
                                          <?php } ?>

                                            </div> -->
                                       
                                           <!--  <div class="form-group row">
                                                <label class="control-label col-md-3">Emergency Contact:
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control"
                                                                placeholder="Full Name" value="<?= $user_data->emergency_contact_name ?>" autocomplete="off" name="emergency_contact_name" readonly> 
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control"
                                                                placeholder="Relationship to Patient"
                                                                autocomplete="off" name="emergency_contact_relationship" readonly>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control"
                                                                placeholder="Phone number" autocomplete="off" name="emergency_contact_phone" value="<?= $user_data->emergency_contact_phone ?>" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> -->
<!-- 
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Height and Weight:
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control"
                                                                placeholder="Weight (in pounds or kilograms)"
                                                                autocomplete="off" name="weight" value="<?= $user_data->weight ?>"  readonly>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control"
                                                                placeholder="Height (in feet/inches or CM)"
                                                                autocomplete="off" name="height" value="<?= $user_data->height ?>" readonly>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div> -->

                                                <div class="form-group row">
                                                <label class="control-label col-md-3">Services
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <select class="form-control mec" name="services" id="services"
                                                        onchange='CheckColors4(this.value);' required>
                                                        <option value="">Select</option>
                                                       <option value="doctor appointment">Doctor Appointment</option>
                                                        <option value="home care services">Home Care Services</option>
                                                        <option value="diagnostics">Diagnostics</option>
                                                        <option value="ambulance">Ambulance</option>
                                                        <option value="pharmacy">Pharmacy</option>
                                                        <option value="hospital care">Hospital Care</option>
                                                        <option value="post hospital care">Post Hospital Care</option>
                                                        <option value="physiotherapy">Physiotherapy</option>
                                                        <option value="health insurance">Health Insurance</option>
                                                        <option value="e commerce">E Commerce</option>
                                                        <option value="others">Others</option>

                                                    </select>
                                                                                             
                                                  <input type="text" name="services" class="mt-10 form-control" id="mec4"
                                                        style='display:none;'  />
                                                       
                                                </div>
                                            </div>
                                             <div class="form-group row">
                                                <label class="control-label col-md-3"> Date and Time:
                                                    <span class="required"> * </span>
                                                </label>
                                                   <div class="col-md-5">
                                             

                                                    <div class="row mt-10">
                                                        <div class="col-md-6">
                                                               <!-- <input class="form-control" type="text" name="date" id="date" required> -->
                                                               <input class="form-control" type="date" name="appointment_date" id="appointment_date" required>
                                                               <span class="error"></span>
 
                                                        </div>
                                                        <div class="col-md-6">
                                                             <!-- <input class="form-control" type="text" id="time" name="time"> -->
                                                             <input class="form-control" type="time" id="appointment_time" name="appointment_time" required>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div> 
                   
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Additional Information
                                                    <span class="required"> </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <textarea class="form-control" rows="3" name="additional_information" 
                                                        placeholder="Additional Information" off
                                                        spellcheck="false"></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Address
                                                    <span class="required"> </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <textarea class="form-control" rows="3" name="address" 
                                                        placeholder="Address " off readonly
                                                        spellcheck="false"><?= $user_data->address ?></textarea>
                                                </div>
                                            </div>



                                            <div class="form-actions">
                                                <div class="col-lg-12 p-t-20 text-center">
                                                    <input type="hidden" name="mid" value=" <?= $user_data->id; ?> ">
                                            <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-circle btn-primary" id="save_member">Submit</button>
                                            <a type="button" href="<?php echo base_url(); ?>Doctor/View_members" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-circle btn-info" >Back</a>

                                                </div>
                                            </div>
                                        </div>
                                    </form>
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
       
    </div>
    <!-- start js include path -->
   
     <!-- start js include path -->
    <?php $this->load->view('Backend/doctor/doctor-temp/footer'); ?> 
    <!-- end js include path -->

    <script src="<?php echo base_url(); ?>assets/backend_assets/bundles/material/material.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend_assets/bundles/flatpicker/js/flatpicker.min.js"></script>
    <!-- end js include path -->
</body>
<script type="text/javascript">
$(document).ready(function() {
  $('.mec').change(function() {
    if ($(this).val() == "others") {
      $(this).next('input[name="mec"]').show();
      $(this).prop('disabled', true);
      $(this).next().prop('disabled', false);
    } else {
      $(this).next('input[name="mec"]').hide();
      $(this).prop('disabled', false);
    }
  });
});

 $(document).on('click','#save_member',function(){
        event.preventDefault();

        $("#member_form_add").valid();
         if($('#appointment_date').val() != '' &&  $('#services').val() != '' && $('#appointment_time').val() != ''  ){
       
        //Medical Conditions: 
        if($('#medical_conditions').val() == 'others'){
            $($('#medical_conditions')).prop('disabled', true);
           
        }else{
             $($('#mec')).prop('disabled', true);
        } 
        //medications
        
        if($('#medications').val() == 'others'){
            $($('#medications')).prop('disabled', true);
           
        }else{
             $($('#mec1')).prop('disabled', true);
        } 
        //surgical_history
        
        if($('#surgical_history').val() == 'others'){
            $($('#surgical_history')).prop('disabled', true);
           
        }else{
             $($('#mec2')).prop('disabled', true);
        } 
        //new 
        //family_medical_history
        if($('#family_medical_history').val() == 'others'){
            $($('#family_medical_history')).prop('disabled', true);
           
        }else{
             $($('#mec3')).prop('disabled', true);
        } 
        //immunizations
        
        // if($('#immunizations').val() == 'others'){
        //     $($('#immunizations')).prop('disabled', true);
           
        // }else{
        //      $($('#mec4')).prop('disabled', true);
        // } 
        //lifestyle_and_habits
        
        if($('#lifestyle_and_habits').val() == 'others'){
            $($('#lifestyle_and_habits')).prop('disabled', true);
           
        }else{
             $($('#mec5')).prop('disabled', true);
        } 
        //mental_health
        
        if($('#mental_health').val() == 'others'){
            $($('#mental_health')).prop('disabled', true);
           
        }else{
             $($('#mec6')).prop('disabled', true);
        }
       //new
          if($('#services').val() == 'others'){
            $($('#services')).prop('disabled', true);
           
        }else{
             $($('#mec4')).prop('disabled', true);
        }

        $.ajax({
        type:'post',
        url: '<?php echo base_url("Doctor/Book_member_appoinment");?>',
        data: new FormData($("#member_form_add")[0]),
        contentType: false,
        processData: false, 
        success:function(resp){
        var data=$.parseJSON(resp);
        if(data.status == 'success'){
        $('#member_form_add')[0].reset();
 

        $.wnoty({
        type: 'success',
        message: data.message,
        autohideDelay: 1000,
        position: 'top-right'

        });
         setTimeout(function(){
        window.location.href = '<?php echo base_url()?>/Doctor/View_Appointments?id='+<?= $user_data->id; ?>;
        },1000);
       
       }else if(data.status == 'error'){
              $.wnoty({
                    type: 'error',
                    message: data.message,
                    autohideDelay: 2000,
                    position: 'top-right'

                    });
        //        setTimeout(function(){
        //  location.reload(true);
        // },2000);
        }
        },
        });
       
        }else{
            //$('#date').next().html('<span class="error">This field is required</span>');//text("This field is required").addClass('error');
          //  $('.error').text("This field is required");
        }
        return false;
        })
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
          
</script>


</html>