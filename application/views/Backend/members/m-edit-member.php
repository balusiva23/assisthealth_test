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
       <!-- start header -->
    <?php $this->load->view('Backend/members/member-temp/header'); ?> 

        <div class="page-container">
            <!-- start sidebar menu -->
             <!-- start sidebar menu -->
          <?php $this->load->view('Backend/members/member-temp/sidebar'); ?> 
            <!-- end sidebar menu -->
            <!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Edit My Profile</div>
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
                                                <div class="col-md-8">
                                                    <input type="text" name="name" id="name" data-required="1"
                                                        value="<?= $user_data->name ?>" class="form-control input-height" required/>
                                                </div>
                                            </div> 
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Member ID
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-8">
                                                    <input type="text" name="member_id" id="member_id" data-required="1"
                                                        value="<?= $user_data->member_id ?>" class="form-control input-height" disabled/>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Email ID
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-8">
                                                    <input type="text" name="email" id="email" data-required="1"
                                                        value="<?= $user_data->email ?>" class="form-control input-height" required/>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Gender
                                                    <span class="required">  </span>
                                                </label>
                                                <div class="col-md-8">
                                                    <select class="form-control input-height" name="gender">
                                                        <option value="">Select...</option>
                                                        <option value="male" <?php echo  ($user_data->gender == 'male') ? 'selected' : '' ?> >Male</option>
                                                        <option value="female" <?php echo  ($user_data->gender == 'female') ? 'selected' : '' ?> >Female</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Mobile No.
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-8">
                                                    <input name="number" id="number" type="text"  value="<?= $user_data->number ?>"
                                                        class="form-control input-height" required />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Profile Picture
                                                </label>
                                                <div class="col-md-8">
                                                    <input type="file" class="default" name="file_url">
                                                </div>
                                                  <?php  if($user_data->profile){ ?>
                                             <div class="preview" style="  display: grid;place-items: center;width: 80%;">
                                               <img src="<?php echo base_url('assets/uploads/users_profile/').$user_data->profile ?>" id="pre-img" style="width:100px">

                                              </div>
                                          <?php } ?>
                                            </div>

                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Emergency Contact:
                                                    <span class="required">  </span>
                                                </label>
                                                <div class="col-md-8">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control"
                                                                placeholder="Full Name" value="<?= $user_data->emergency_contact_name ?>" autocomplete="off" name="emergency_contact_name">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control"
                                                                placeholder="Relationship to Member"
                                                                autocomplete="off" name="emergency_contact_relationship">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control"
                                                                placeholder="Phone number" autocomplete="off" name="emergency_contact_phone" value="<?= $user_data->emergency_contact_phone ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                                <!-- new -->
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Dob and Bloodgroop:
                                                    <span class="required"> </span>
                                                </label>
                                                <div class="col-md-8">
                                                    <div class="row">
                                                       
                                                      
                                                        <div class="col-md-6">
                                                            <input type="date" class="form-control mydatetimepickerFull"
                                                                placeholder="Date of birth"
                                                                autocomplete="off" name="dob" value="<?= $user_data->dob ?>" max="<?php echo date("Y-m-d"); ?>">
                                                        </div>
                                                          <div class="col-md-6">
                                                            <select id="blood-group" name="blood-group" class="form-control">
                                                                <option value="">Select Blood Group</option>
                                                                <option value="A+" <?php echo ($user_data->bloodgroup  == 'A+') ? 'selected' : '' ?>>A+</option>
                                                                <option value="A-" <?php echo ($user_data->bloodgroup  == 'A-') ? 'selected' : '' ?>>A-</option>
                                                                <option value="B+" <?php echo($user_data->bloodgroup  == 'B+') ? 'selected' : '' ?>>B+</option>
                                                                <option value="B-" <?php echo ($user_data->bloodgroup  == 'B-') ? 'selected' : '' ?>>B-</option>
                                                                <option value="AB+" <?php echo ($user_data->bloodgroup  == 'AB+') ? 'selected' : '' ?>>AB+</option>
                                                                <option value="AB-" <?php echo ($user_data->bloodgroup  == 'AB-') ? 'selected' : '' ?>>AB-</option>
                                                                <option value="O+" <?php echo ($user_data->bloodgroup  == 'O+') ? 'selected' : '' ?>>O+</option>
                                                                <option value="O-" <?php echo ($user_data->bloodgroup  == 'O-') ? 'selected' : '' ?>>O-</option>
                                                            </select>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- new -->

                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Height and Weight:
                                                    <span class="required">  </span>
                                                </label>
                                                <div class="col-md-8">
                                                    <div class="row">
                                                      
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control"
                                                                placeholder="Height (in feet/inches or CM)"
                                                                autocomplete="off" name="height" value="<?= $user_data->height ?>">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control"
                                                                placeholder="Weight (in pounds or kilograms)"
                                                                autocomplete="off" name="weight" value="<?= $user_data->weight ?>">
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>    
                                             <div class="form-group row">
                                                <label class="control-label col-md-3">Password:
                                                    <span class="required">  </span>
                                                </label>
                                                <div class="col-md-8">
                                                    <div class="row">
                                                        <div class="">
                                                            <input type="password" class="form-control"
                                                                placeholder="Password"
                                                                autocomplete="off" name="password" >
                                                        </div>
                                                   

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Personal and Social History:
                                                    <span class="required">  </span>
                                                </label>
                                                <div class="col-md-8">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control"
                                                                placeholder="Employment status" name="employment_status" autocomplete="off" value="<?= $user_data->employment_status ?>">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control"
                                                                placeholder="Education level" name="education_level"  autocomplete="off" value="<?= $user_data->education_level ?>">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control"
                                                                placeholder="Marital status" name="marital_status" autocomplete="off" value="<?= $user_data->marital_status ?>">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Additional Information
                                                    <span class="required">  </span>
                                                </label>
                                                <div class="col-md-8">
                                                    <textarea class="form-control" rows="3" name="additional_information" 
                                                        placeholder="Additional Information" off
                                                        spellcheck="false"><?= $user_data->additional_information ?></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Address
                                                    <span class="required">  </span>
                                                </label>
                                                <div class="col-md-8">
                                                    <textarea class="form-control" rows="3" name="address" 
                                                        placeholder="Address" off
                                                        spellcheck="false"><?= $user_data->address ?></textarea>
                                                </div>
                                            </div>



                                            <div class="form-actions">
                                                <div class="col-lg-12 p-t-20 text-center">
                                                    <input type="hidden" name="id" value=" <?= $user_data->id; ?> ">
                                                    <button type="button"
                                                        class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-circle btn-primary" id="update_member">Save</button>

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
 
       <?php $this->load->view('Backend/members/member-temp/footer'); ?> 
      <script src="<?php echo base_url(); ?>assets/backend_assets/bundles/material/material.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend_assets/bundles/flatpicker/js/flatpicker.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend_assets/data/date-time.init.js"></script>

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

 $(document).on('click','#update_member',function(){
        event.preventDefault();
        
        $("#member_form_add").valid();
         var name = $("#name").val();
           var email = $("#email").val();
           
            var number=$("#number").val();
          
          if(email != '' && name != '' && number != ''){

     
        $.ajax({
        type:'post',
        url: '<?php echo base_url("Member/save_member_data");?>',
        data: new FormData($("#member_form_add")[0]),
        contentType: false,
        processData: false, 
        success:function(resp){
        var data=$.parseJSON(resp);
        if(data.status == 'success'){
        $('#member_form_add')[0].reset();
 

        $.wnoty({
        type: 'success',
        message: "Data Updated successfully",
        autohideDelay: 1000,
        position: 'top-right'

        });
            setTimeout(function(){
        window.location.href = '<?php echo base_url()?>/Member';
        },2000);
       
       }else if(data.status == 'error'){
              $.wnoty({
                    type: 'error',
                    message: "Data Updated Failed",
                    autohideDelay: 2000,
                    position: 'top-right'

                    });
        //        setTimeout(function(){
        //  location.reload(true);
        // },2000);
        }
        },
        });
        }
     
        return false;
        })
</script>

</body>



</html>