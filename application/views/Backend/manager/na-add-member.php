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
     <?php $this->load->view('Backend/manager/manager-temp/link-css'); ?> 

      <link href="<?php echo base_url(); ?>assets/select2/select2.min.css" rel="stylesheet" type="text/css" />   
    <link href="<?php echo base_url(); ?>assets/select2/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />  
</head>
<!-- END HEAD -->

<body
    class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white white-sidebar-color logo-indigo">
    <div class="page-wrapper">
        <!-- start header -->
          <?php $this->load->view('Backend/manager/manager-temp/header'); ?> 

        <div class="page-container">
            <!-- start sidebar menu -->
             <?php $this->load->view('Backend/manager/manager-temp/sidebar'); ?> 
            <!-- end sidebar menu -->
            <!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Add  Member</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header>Add Information</header>
                                </div>
                                <div class="card-body" id="bar-parent">
                                 
                                     <form  id="member_form_add" method="post" class="form-horizontal"  enctype="multipart/form-data">
                                        <div class="form-body">
                                            <div class="form-group row">
                                                <label class="control-label col-md-3"> Full Name
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" name="name" id="name" data-required="1"
                                                         class="form-control input-height" required />
                                                </div>
                                            </div>
                                              <!-- new -->
                                              <div class="form-group row">
                                                <label class="control-label col-md-3">
                                                    Is this sub profile ?
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="checkbox" id="subprofile_checkbox" name="subprofile_checkbox">
                                                </div>
                                            </div>

                                            <div class="form-group row" id="members_select">
                                                <label class="control-label col-md-3">
                                                   Parent Member
                                                   <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <select class="form-control input-height search" name="parent_member"  id="parent_member">
                                                        <option value="">Select...</option>
                                                        <!-- <option value="Member1">Member 1</option>
                                                        <option value="Member2">Member 2</option> -->
                                                        <?php 
                                                            foreach ($allmembers as  $value) { ?>
                                                                <option value="<?= $value->id ?>"><?= $value->name.' ('.$value->member_id.')'; ?></option>
                                                        <?php  }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- new -->
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Email ID
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" name="email" id="email" data-required="1"
                                                        class="form-control input-height" required />
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Gender
                                                    <span class="required"> </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <select class="form-control input-height" name="gender">
                                                        <option value="">Select...</option>
                                                        <option value="male" selected>Male</option>
                                                        <option value="female">Female</option>
                                                    </select>
                                                </div>
                                            </div>
<!-- 
                                 
                                                  <div class="form-group row">
                                                <label class="control-label col-md-3">Mobile No.
                                                    <span class="required"> * </span>
                                                </label>
                                                  <div class=" col-md-5">
                                                  <div class="input-group ">
                                                  <div class="input-group-append">
                                                    <span class="input-group-text" style="padding:11px ;">
                                                     +91</i>
                                                    </span>
                                                  </div>
                                                   <input name="number" id="number" type="number"  
                                                        class="form-control input-height" required maxlength="10" />
                                                  
                                                </div>
                                                 <label id="number-error" class="error" for="number" style="display: none;"></label>
                                            </div>

                                            </div> -->
                                                      <div class="form-group row">
                                                <label class="control-label col-md-3">Mobile No.
                                                    <span class="required"> * </span>
                                                </label>
                                                     <div class=" col-md-5">
                                                    <div class="input-group">
                                                   

                                                      <div class="select-box" style="width: 100%;">
                                                      <div class="selected-option">
                                                          <div>
                                                            <iconify-icon icon="flag:in-4x3"></iconify-icon>
                                                             <!--  <span class="iconify" data-icon="flag:gb-4x3"></span>
                                                              <strong>+44</strong> -->
                                                                <span class="iconify" data-icon="flag:in-4x3"></span>
                                                                <span class="phone-code">+91</span>
                                                                <!-- <i class="fas fa-caret-down"></i> -->
                                                          </div>
                                                          <!-- <input type="tel" name="tel" placeholder="Phone Number"> -->
                                                          
                                                      <input name="number" id="number" type="tel" placeholder="Enter Mobile Number"
                                                        class="form-control input-height"  required/>
                                                        <input type="hidden" name="code" id="code" value="+91">
                                                      
                                                      </div>
                                                      <div class="options">
                                                          <input type="text" class="search-box form-control" placeholder="Search Country Name">
                                                          <ol class="ol">

                                                          </ol>
                                                      </div>
                                                  </div>
                                                  </div>
                                                    <label id="number-error" class="error" for="number" style=" display:none;">This field is required.</label>
                                                  </div>

                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Profile Picture
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="file" class="default" name="file_url">
                                                </div>
                                                  
                                            <!--  <div class="preview" style="  display: grid;place-items: center;">
                                               <img src="<?php echo base_url('assets/uploads/users_profile/').$user_data->profile ?>" id="pre-img" style="width:100px">

                                              </div> -->
                                         

                                            </div>
                                       
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Emergency Contact:
                                                    <span class="required"> </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control"
                                                                placeholder="Full Name"  autocomplete="off" name="emergency_contact_name">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control"
                                                                placeholder="Relationship to Member"
                                                                autocomplete="off" name="emergency_contact_relationship">
                                                        </div>
                                                       <!--  <div class="col-md-4">
                                                            <input type="text" class="form-control"
                                                                placeholder="Phone number" autocomplete="off" name="emergency_contact_phone" >
                                                        </div> -->
                                                              <div class=" col-md-4">
                                                              <div class="input-group ">
                                                              <div class="input-group-append">
                                                                <span class="input-group-text" style="padding:8px ;">
                                                                 +91</i>
                                                                </span>
                                                              </div>
                                                             <input type="text" class="form-control"
                                                                            placeholder="Phone number" autocomplete="off" name="emergency_contact_phone" id="emergency_contact_phone" >
                                                              
                                                            </div>
                                                             <label id="emergency_contact_phone-error" class="error" for="emergency_contact_phone" style="display: none;"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                                <!-- new -->
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Dob and Bloodgroop:
                                                    <span class="required"> </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <div class="row">
                                                       
                                                      
                                                        <div class="col-md-6">
                                                            <input type="date" class="form-control mydatetimepickerFull"
                                                                placeholder="Date of birth"
                                                                autocomplete="off" name="dob"  max="<?php echo date("Y-m-d"); ?>">
                                                        </div>
                                                          <div class="col-md-6">
                                                            <select id="blood-group" name="blood-group" class="form-control">
                                                                <option value="">Select Blood Group</option>
                                                                <option value="A+">A+</option>
                                                                <option value="A-">A-</option>
                                                                <option value="B+">B+</option>
                                                                <option value="B-">B-</option>
                                                                <option value="AB+">AB+</option>
                                                                <option value="AB-">AB-</option>
                                                                <option value="O+">O+</option>
                                                                <option value="O-">O-</option>
                                                            </select>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- new -->

                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Height and Weight:
                                                    <span class="required"> </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <div class="row">
                                                       
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control"
                                                                placeholder="Height (in feet/inches or CM)"
                                                                autocomplete="off" name="height" >
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control"
                                                                placeholder="Weight (in pounds or kilograms)"
                                                                autocomplete="off" name="weight" >
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                   

                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Personal and Social History:
                                                    <span class="required"> </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control"
                                                                placeholder="Employment status" name="employment_status" autocomplete="off" >
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control"
                                                                placeholder="Education level" name="education_level"  autocomplete="off" >
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control"
                                                                placeholder="Marital status" name="marital_status" autocomplete="off" >
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
                                                        placeholder="Address" off
                                                        spellcheck="false"></textarea>
                                                </div>
                                            </div>

                                                            <div class="form-group row phide">
                                                <label class="control-label col-md-3"> Enter Password
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="password" name="password" data-required="1"
                                                        placeholder="Enter Password"
                                                        class="form-control input-height" required />
                                                </div>
                                            </div> 
                                            <div class="form-group row cphide">
                                                <label class="control-label col-md-3"> Enter Confirm Password
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="password" name="cpassword" data-required="1"
                                                        placeholder="Enter Confirm Password"
                                                        class="form-control input-height" required />

                                                    <div class="confirm-password-error error"></div> <!-- Error container -->
                                                </div>
                                            </div>  
                                            <div class="form-group row sphide">
                                               
                                                <div class="offset-md-3 col-md-5">
                                                    <div class="form-check mt-2">
                                                        <input type="checkbox" class="form-check-input  toggle-password" id="exampleCheck1">
                                                        <label class="form-check-label" for="exampleCheck1">Show Password</label>
                                                      </div>
                                                </div>
                                            </div>
                                                         <!--  -->
                                             <div class="form-group row">
                                                <label class="control-label col-md-3">Membership
                                                    <span class="required"> </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <select class="form-control input-height" name="membership">
                                                        <option value="">Select...</option>
                                                        <option value="Basic" selected>Basic</option>
                                                        <option value="Premium">Premium</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!--  -->



                                            <div class="form-actions">
                                                <div class="col-lg-12 p-t-20 text-center">
                                                    <input type="hidden" name="id" value="  ">
                                                    <button type="button"
                                                        class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-circle btn-primary" id="save_member">Submit</button>

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
        <!-- end page container -->
        <!-- start footer -->
       <?php $this->load->view('Backend/manager/manager-temp/footer'); ?> 
        <script src="<?php echo base_url(); ?>assets/backend_assets/bundles/material/material.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend_assets/bundles/flatpicker/js/flatpicker.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend_assets/data/date-time.init.js"></script>
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

   $(document).ready(function() {
      // Show/hide password
      $('.toggle-password').change(function() {
        var passwordInput = $('input[name="password"]');
        var confirmPasswordInput = $('input[name="cpassword"]');
        var passwordFieldType = passwordInput.attr('type');
        var confirmPasswordFieldType = confirmPasswordInput.attr('type');
        
        // Toggle password visibility for password field
        if (passwordFieldType === 'password') {
          passwordInput.attr('type', 'text');
        } else {
          passwordInput.attr('type', 'password');
        }
        
        // Toggle password visibility for confirm password field
        if (confirmPasswordFieldType === 'password') {
          confirmPasswordInput.attr('type', 'text');
        } else {
          confirmPasswordInput.attr('type', 'password');
        }
      });
      });

 $(document).on('click','#save_member',function(){
        event.preventDefault();
        if ($('#subprofile_checkbox').prop('checked')) {
        // Subprofile checkbox is checked, no validation needed
        $("select[name='gender']").attr('required', 'required');
        $("#parent_member").attr('required', 'required');
        $("#member_form_add").valid();
        var name = $("#name").val();

      

           if( name != '' && $("select[name='gender']").val() != ''  &&   $("#parent_member").val() != ''){

            $.ajax({
            type:'post',
            url: '<?php echo base_url("Navigator/Add_member_data");?>',
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
            window.location.href = '<?php echo base_url()?>Navigator/My_Members';
            },2000);

        
        }else if(data.status == 'error'){
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
           }
        
            return false;
        } else {
            $("select[name='gender']").removeAttr('required');
            //end new
        $("#member_form_add").valid();
 

        // Validate password and confirm password
        var password = $("input[name='password']").val();
        var confirmPassword = $("input[name='cpassword']").val();

            var errorContainer = $('.confirm-password-error');
    
            if (password !== confirmPassword) {
              // Passwords do not match
              // Show error message
              errorContainer.text('Passwords do not match');
              return;
            } else {
              // Clear error message
              errorContainer.empty();
            }

       var name = $("#name").val();
           var email = $("#email").val();
           
            var number=$("#number").val();
    

             if (number.length > 10) {
          return;
         }  

        var emergency_contact_phone =$(" [name='emergency_contact_phone']").val();
         if (emergency_contact_phone.length > 10) {
       
          return;
         }
          
          if(email != '' && name != '' && number != ''  && password != '' && confirmPassword != ''){

        $.ajax({
        type:'post',
        url: '<?php echo base_url("Navigator/Add_member_data");?>',
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
        window.location.href = '<?php echo base_url()?>Navigator/My_Members';
        },2000);
       
       }else if(data.status == 'error'){
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
        }
     
        return false;
       }
        });
    
        
        
        //New 
        $(document).ready(function() {
    // Get references to the checkbox and form fields
    var subprofileCheckbox = $('#subprofile_checkbox');
    var membersSelect = $('#members_select');
    var emailField = $('#email');
    var mobileField = $('#number');
    var passwordField = $("input[name='password']");
    var confirmPasswordField = $("input[name='cpassword']");
    var showpass = $("#exampleCheck1");

    // Set initial state
    membersSelect.hide();
    emailField.prop('disabled', false);
    mobileField.prop('disabled', false);
    passwordField.prop('disabled', false);
    confirmPasswordField.prop('disabled', false);
    showpass.prop('disabled', false);

    // Handle checkbox change event
    subprofileCheckbox.change(function() {
        if (subprofileCheckbox.prop('checked')) {
            membersSelect.show();
            emailField.prop('disabled', true);
            mobileField.prop('disabled', true);
            passwordField.prop('disabled', true);
            confirmPasswordField.prop('disabled', true);
            showpass.prop('disabled', true);
            emailField.removeAttr('required');
            mobileField.removeAttr('required');
            passwordField.removeAttr('required');
            confirmPasswordField.removeAttr('required');

             //new
            $(".phide, .cphide, .sphide").hide();

        } else {
            membersSelect.hide();
            emailField.prop('disabled', false);
            mobileField.prop('disabled', false);
            passwordField.prop('disabled', false);
            confirmPasswordField.prop('disabled', false);
            showpass.prop('disabled', false);
            emailField.attr('required', 'required');
            mobileField.attr('required', 'required');
            passwordField.attr('required', 'required');
            confirmPasswordField.attr('required', 'required');

             //new
            $(".phide, .cphide, .sphide").show();
        }
    });
});

            $(document).ready(function() {
       // $('.tblEditBtn').click(function() {
             $(document).on('change', '#parent_member', function() {
            // Get the data attributes from the button
            var id = $(this).val();
              
        
             

            // Make an AJAX request to retrieve the data for the ID
            $.ajax({
                url: '<?php echo base_url("Navigator/getMemberByID"); ?>?id=' + id,
                method: 'GET',
                data: { id: id },
                dataType: 'json',
                success: function(response) {

                    // Populate the modal with the data returned from the server
                   $('#email').val(response.email);
                   $('#number').val(response.number);
                   
                  //console.log(response)
                
       
                }

            });
        });
    });
</script>
 <!--select2-->

    <script src="<?php echo base_url(); ?>assets/select2/select2.min.js"type="text/javascript"></script>
    <script>
        //New 28-12-23

      $(".search").select2({
          theme:"bootstrap"
      });

</script>
</html>