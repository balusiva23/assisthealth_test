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
</head>
<!-- END HEAD -->

<body
    class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white white-sidebar-color logo-indigo">
    <div class="page-wrapper">
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
                                <div class="page-title">Add
                                    Empanelled Doctors</div>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header>Add Empanelled Doctors</header>


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

                               
                                            
                                               <div class="form-group row">
                                                <label class="control-label col-md-3"> Education Qualification
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" name="qualification" id="qualification" data-required="1"
                                                        placeholder="Enter Education Qualification" class="form-control input-height" required />
                                                </div>
                                            </div>
                                            <!-- new -->
                                                 <div class="form-group row">
                                                <label class="control-label col-md-3"> Speciality 
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" name="speciality" id="speciality" data-required="1"
                                                        placeholder="Enter Speciality " class="form-control input-height" required />
                                                </div>
                                            </div>
                                                 <div class="form-group row">
                                                <label class="control-label col-md-3"> Specialised In 
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" name="specializedIn" id="specializedIn" data-required="1"
                                                        placeholder="Enter  Specialised In " class="form-control input-height" required />
                                                </div>
                                            </div>  
                                            <div class="form-group row">
                                                <label class="control-label col-md-3"> Experience 
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" name="experience" id="experience" data-required="1"
                                                        placeholder="Enter  Experience " class="form-control input-height" required />
                                                </div>
                                            </div>  
                                             <div class="form-group row">
                                                <label class="control-label col-md-3 " style="font-weight: bold;">  </label>
                                                <div class="col-md-5" style="text-align: center;">
                                                          <span  style="font-weight: bold;"> Work place 1   
                                                    
                                                </span>
                                             <!-- Hospital -->
                                                </div>
                                            </div>  
                                            <div class="form-group row">
                                                <label class="control-label col-md-3"> Name 
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" name="hospital" id="hospital" data-required="1"
                                                        placeholder="Enter  Name " class="form-control input-height" required />
                                                </div>
                                            </div>  

                                
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">  Address 
                                                </label>
                                                <div class="col-md-5">
                                                    <textarea name="address" class="form-control-textarea"
                                                        placeholder=" Address" rows="2"></textarea>
                                                </div>
                                            </div>
                                             <div class="form-group row">
                                                <label class="control-label col-md-3"> Area Name 
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" name="hospital_area" id="hospital_area" data-required="1"
                                                        placeholder="Enter  Area Name " class="form-control input-height" required />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-md-3"> City
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" name="hospital_city" id="hospital_city" data-required="1"
                                                        placeholder="Enter  City Name " class="form-control input-height" required />
                                                </div>
                                            </div>  
                                            
                                          
                                         
                                           <div class="form-group row">
                                                <label class="control-label col-md-3">  Consultation Timings 
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-2">
                                                    <input type="time" name="timing" id="timing" data-required="1"
                                                        placeholder="Enter  Consultation Timings " class="form-control input-height" required />
                                                </div>
                                                 <div class="col-md-1 text-center">
                                                    <span> to </span>
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="time" name="hospital_to_timing" id="hospital_to_timing" data-required="1"
                                                        placeholder="Enter  Consultation Timings " class="form-control input-height" required />
                                                </div>
                                            </div>
                                             <div class="form-group row">
                                                <label class="control-label col-md-3"> Consultation Fees 
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" name="fees" id="fees" data-required="1"
                                                        placeholder="Enter  Consultation Fees " class="form-control input-height" required />
                                                </div>
                                            </div>
                                           <!-- clinic -->
                                            <div class="form-group row">
                                                <label class="control-label col-md-3 " style="font-weight: bold;">  </label>
                                                <div class="col-md-5" style="text-align: center;">
                                                          <span  style="font-weight: bold;">  Work place 2  
                                                    
                                                </span>
                                                <!-- Clinic -->
                                             
                                                </div>
                                            </div>  
                                            <div class="form-group row">
                                                <label class="control-label col-md-3"> Name 
                                                    <span class="required">  </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" name="clinic_name" id="clinic_name" data-required="1"
                                                        placeholder="Enter  Name " class="form-control input-height"  />
                                                </div>
                                            </div>  

                                
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">  Address 
                                                </label>
                                                <div class="col-md-5">
                                                    <textarea name="clinic_address" class="form-control-textarea"
                                                        placeholder=" Address" rows="2"></textarea>
                                                </div>
                                            </div>

                                               <div class="form-group row">
                                                <label class="control-label col-md-3"> Area Name 
                                                    <span class="required">  </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" name="clinic_area" id="clinic_area" data-required="1"
                                                        placeholder="Enter  Area Name " class="form-control input-height"  />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-md-3"> City
                                                    <span class="required"> </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" name="clinic_city" id="clinic_city" data-required="1"
                                                        placeholder="Enter  City Name " class="form-control input-height"  />
                                                </div>
                                            </div>  
                                            
                                          
                                         <!-- 
                                           <div class="form-group row">
                                                <label class="control-label col-md-3">  Consultation Timings 
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="time" name="clinic_timing" id="clinic_timing" data-required="1"
                                                        placeholder="Enter  Consultation Timings " class="form-control input-height" required />
                                                </div>
                                            </div> -->
                                             <div class="form-group row">
                                                <label class="control-label col-md-3">  Consultation Timings 
                                                    <span class="required"> </span>
                                                </label>
                                                <div class="col-md-2">
                                                    <input type="time" name="clinic_timing" id="clinic_timing" data-required="1"
                                                        placeholder="Enter  Consultation Timings " class="form-control input-height"  />
                                                </div>
                                                 <div class="col-md-1 text-center">
                                                    <span> to </span>
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="time" name="clinic_to_timing" id="clinic_to_timing" data-required="1"
                                                        placeholder="Enter  Consultation Timings " class="form-control input-height"  />
                                                </div>
                                            </div>
                                             <div class="form-group row">
                                                <label class="control-label col-md-3"> Consultation Fees 
                                                    <span class="required">  </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" name="clinic_fees" id="clinic_fees" data-required="1"
                                                        placeholder="Enter  Consultation Fees " class="form-control input-height"  />
                                                </div>
                                            </div>
                                                
                                                      <div class="form-group row">
                                                <label class="control-label col-md-3">Contact Number
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
                                                        class="form-control input-height" placeholder="Contact Number" required  />
                                                  
                                                </div>
                                                 <label id="number-error" class="error" for="number" style="display: none;"></label>
                                            </div>

                                            </div>
                                        
                                             <div class="form-group row">
                                                <label class="control-label col-md-3">Doctor photo
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="file" name="file_url" class="default" required>
                                                     <label id="file_url-error" class="error" for="file_url" style="display:none">This field is required.</label>
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
          <?php $this->load->view('Backend/admin/admin-temp/footer'); ?> 
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
       
         var name = $("input[name='firstname']").val();
        //var email = $("input[name='lastname']").val(); // Note: There is no 'lastname' field, it seems like a mistake
        var gender = $("select[name='gender']").val();
        var mobile = $("input[name='number']").val();
        var qualification = $("#qualification").val();
        var speciality = $("#speciality").val();
        var specializedIn = $("#specializedIn").val();
        var experience = $("#experience").val();
        var hospital = $("#hospital").val();
        //var address = $("textarea[name='address']").val();
        var timing = $("#timing").val();
        var fees = $("#fees").val();
        var contactNumber = $("#number").val();
        var profilePicture = $("input[type='file']").val();

    // Check if all required fields are filled out
    if (name !== '' &&  gender !== '' && mobile !== '' && hospital !== '' && qualification !== '' && speciality !== '' && specializedIn !== '' && experience !== '' && timing !== '' && fees !== '' && contactNumber !== '' && profilePicture !== '') {
            // Your logic or action when all required fields are not empty


        $.ajax({
        type:'post',
        url: '<?php echo base_url("Admin/Save_internal_doctor");?>',
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
        window.location.href = '<?php echo base_url()?>Admin/All_InternalDoctors';
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