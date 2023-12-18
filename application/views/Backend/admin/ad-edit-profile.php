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
       <!-- start header -->
    <?php $this->load->view('Backend/admin/admin-temp/header'); ?> 

        <div class="page-container">
            <!-- start sidebar menu -->
             <!-- start sidebar menu -->
          <?php $this->load->view('Backend/admin/admin-temp/sidebar'); ?> 
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
                                    <header>Edit My Profile</header>


                                </div>
                                <div class="card-body" id="bar-parent">
                               
                                      <form  id="update_profile" method="post" class="form-horizontal"  enctype="multipart/form-data">
                                        <div class="form-body">
                                            <div class="form-group row">
                                                <label class="control-label col-md-3"> Full Name
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-8">
                                                    <input type="text" name="name" id="name" data-required="1"
                                                        value="<?= $admin_data->name ?>" class="form-control input-height" required/>
                                                </div>
                                            </div> 
                                         
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Email ID
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-8">
                                                    <input type="text" name="email" id="email" data-required="1"
                                                        value="<?= $admin_data->email ?>" class="form-control input-height" required/>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Mobile No.
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-8">
                                                    <input name="number" id="number" type="text"  value="<?= $admin_data->number ?>"
                                                        class="form-control input-height" required/>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Profile Picture
                                                </label>
                                                <div class="col-md-8">
                                                    <input type="file" class="default" name="file_url">
                                                </div>
                                                  <?php  if($admin_data->profile){ ?>
                                             <div class="preview" style="  display: grid;place-items: center;width: 80%;">
                                               <img src="<?php echo base_url('assets/uploads/admin_profile/').$admin_data->profile ?>" id="pre-img" style="width:100px">

                                              </div>
                                          <?php } ?>
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


                                            <div class="form-actions">
                                                <div class="col-lg-12 p-t-20 text-center">
                                                    <input type="hidden" name="id" value=" <?= $admin_data->id; ?> ">
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
 
       <?php $this->load->view('Backend/admin/admin-temp/footer'); ?> 
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
          $("#update_profile").valid();
 
           var name = $("#name").val();
           var email = $("#email").val();
           
            var number=$("#number").val();
          
       if(email != '' && name != '' && number != '' ){

     
        $.ajax({
        type:'post',
        url: '<?php echo base_url("Admin/update_admin");?>',
        data: new FormData($("#update_profile")[0]),
        contentType: false,
        processData: false, 
        success:function(resp){
        var data=$.parseJSON(resp);
        if(data.status == 'success'){
        $('#update_profile')[0].reset();
 

        $.wnoty({
        type: 'success',
        message:data.message,
        autohideDelay: 1000,
        position: 'top-right'

        });
         setTimeout(function(){
         location.reload(true);
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