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
                                <div class="page-title">Add
                                    Doctors</div>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header>Add Doctors</header>


                                </div>
                                <div class="card-body" id="bar-parent">
                                    <form  id="add_nav" class="form-horizontal" method="post"  enctype="multipart/form-data">
                                        <div class="form-body">
                                            <div class="form-group row">
                                                <label class="control-label col-md-3"> Name
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" name="firstname" data-required="1"
                                                        placeholder="Enter Name" class="form-control input-height" required />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Email ID
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="email" name="email" data-required="1"
                                                        placeholder="Enter Email ID"
                                                        class="form-control input-height" required/>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Gender
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <select class="form-control input-height" name="gender" required>
                                                        <option value="">Select...</option>
                                                        <option value="male">Male</option>
                                                        <option value="female">Female</option>
                                                    </select>
                                                </div>
                                            </div>

                                        <!--     <div class="form-group row">
                                                <label class="control-label col-md-3">Mobile No.
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input name="number" type="text" placeholder="Mobile Number"
                                                        class="form-control input-height" required/>
                                                </div>
                                            </div> -->
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
                                                        class="form-control input-height" placeholder="Mobile Number" required maxlength="10" />
                                                  
                                                </div>
                                                 <label id="number-error" class="error" for="number" style="display: none;"></label>
                                            </div>

                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Profile Picture
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="file" name="file_url" class="default" >
                                                </div>
                                             <!-- new -->
                                                 <div class="form-group row">
                                                <label class="control-label col-md-3"> Education Qualification
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" name="qualification" id="qualification" data-required="1"
                                                        placeholder="Enter Education Qualification" class="form-control input-height" required />
                                                </div>
                                            </div>
                                                 <div class="form-group row">
                                                <label class="control-label col-md-3"> Medical Council Number
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" name="medical_council_no" id="medical_council_no" data-required="1"
                                                        placeholder="Enter  Medical Council Number" class="form-control input-height" required />
                                                </div>
                                            </div>
                                                  <!-- new -->


                                            <div class="form-group row">
                                                <label class="control-label col-md-3">language spoken
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="checkbox checkbox-icon-black p-0">
                                                            <input name="language[]" value="tamil" type="checkbox" required>
                                                            <label for="checkbox1">
                                                                Tamil
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="checkbox checkbox-icon-black p-0">
                                                            <input name="language[]" value="english" type="checkbox" required>
                                                            <label for="checkbox1">
                                                                English
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="checkbox checkbox-icon-black p-0">
                                                            <input name="language[]" value="hindi" type="checkbox" required>
                                                            <label for="checkbox1">
                                                                Hindi
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="checkbox checkbox-icon-black p-0">
                                                            <input name="language[]" value="malayalam" type="checkbox" required>
                                                            <label for="checkbox1">
                                                                Malayalam
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="checkbox checkbox-icon-black p-0">
                                                            <input name="language[]" value="telugu" type="checkbox" required>
                                                            <label for="checkbox1">
                                                                Telugu
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="checkbox checkbox-icon-black p-0">
                                                            <input name="language[]" value="kannada" type="checkbox" required>
                                                            <label for="checkbox1">
                                                                Kannada
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <label id="language[]-error" class="error" for="language[]" style="display: none;">This field is required.</label>
                                            </div>

                                            </div>

                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Intro about Doctor
                                                </label>
                                                <div class="col-md-5">
                                                    <textarea name="address" class="form-control-textarea"
                                                        placeholder="Intro about Doctor" rows="5"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-md-3"> Enter Password
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="password" name="password" data-required="1"
                                                        placeholder="Enter Password"
                                                        class="form-control input-height" required />
                                                </div>
                                            </div> 
                                            <div class="form-group row">
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
                                            <div class="form-group row">
                                               
                                                <div class="offset-md-3 col-md-5">
                                                    <div class="form-check mt-2">
                                                        <input type="checkbox" class="form-check-input  toggle-password" id="exampleCheck1">
                                                        <label class="form-check-label" for="exampleCheck1">Show Password</label>
                                                      </div>
                                                </div>
                                            </div>
                                            

                                            <div class="form-actions">
                                                <div class="col-lg-12 p-t-20 text-center">
                                                    <button type="button"
                                                        class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-circle btn-primary" id="save_nav" type="submit">Submit</button>
                                                    <button type="button"
                                                        class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-circle btn-danger">Cancel</button>
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
         <!-- end footer -->
    <!-- end js include path -->
</body>



</html>

<script>
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
        $(document).on('click','#save_nav',function(){
        event.preventDefault();
        $("#add_nav").valid();
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

        var name = $("input[name='firstname']").val();
        var email = $("input[name='lastname']").val();
        var gender = $("select[name='gender']").val();
        var mobile = $("input[name='number']").val();
        var profilePicture = $("input[type='file']").val();
        var languagesSpoken = [];
        $("input[type='checkbox']:checked").each(function () {
            languagesSpoken.push($(this).parent().text().trim());
        });
        //var intro = $("textarea[name='address']").val();
        var password = $("input[name='password']").val();

         if (mobile.length > 10) {
          return;
         }
        if (name != '' && email != '' && gender != '' && mobile != '' && password != '' && confirmPassword != '' && $("#qualification").val() && $("#medical_council_no").val()) {
            // Your logic or action when all required fields are not empty


        $.ajax({
        type:'post',
        url: '<?php echo base_url("Navigator/Save_doctor");?>',
        data: new FormData($("#add_nav")[0]),
        contentType: false,
        processData: false, 
        success:function(resp){
        var data=$.parseJSON(resp);
        if(data.status == 'success'){
        $('#add_nav')[0].reset();
        $.wnoty({
        type: 'success',
        message: data.message,
        autohideDelay: 1000,
        position: 'top-right'

        });
        setTimeout(function(){
        window.location.href = '<?php echo base_url()?>Navigator/All_Doctors';
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
        } else {

        }

        return false;
        })



</script>