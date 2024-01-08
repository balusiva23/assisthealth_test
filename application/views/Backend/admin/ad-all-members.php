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
    <!-- Date Time item CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend_assets/bundles/flatpicker/css/flatpickr.min.css" />
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
                                <div class="page-title">All
                                    Members</div>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="tabbable-line">

                                <div class="tab-content">
                                    <div class="tab-pane active fontawesome-demo" id="tab1">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-head">
                                                        <header></header>
                                                        <div class="tools">
                                                            <a class="fa fa-repeat btn-color box-refresh"
                                                                href="javascript:;"></a>
                                                            <a class="t-collapse btn-color fa fa-chevron-down"
                                                                href="javascript:;"></a>
                                                            <a class="t-close btn-color fa fa-times"
                                                                href="javascript:;"></a>
                                                        </div>
                                                    </div>
                                                    <div class="card-body ">

                                                        <table
                                                            class="table table-striped table-bordered table-hover table-checkable order-column full-width"
                                                            id="example5">
                                                            <thead>
                                                                <tr>
                                                                    <th class="center">S.No</th>
                                                                    <th class="center">M-ID</th>
                                                                    <th class="center"> Name </th>
                                                                    <th class="center"> Email </th>
                                                                    <th class="center" width="30%"> Address </th>
                                                                    <th class="center">Mobile</th>
                                                                    <th class="center">Membership</th>
                                                                    <th class="center"> Update / Delete </th>
                                                                    <th class="center"> Sub Profile </th>
                                                                    <th class="center">Member ID </th>
                                                                    <!-- <th class="center">Status </th> -->
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                               <?php 
                                                               $i = 1;
                                                                foreach ($members as $member) {

                                                                 if($member->isSubprofile){
                                                                   $p_id = $member->parent_member;
                                                                   $parent_member = $this->Manager_model->getMemberByID($p_id); 
                                                                    $email = $parent_member->email;
                                                                    $number = $parent_member->number;
                                                                
                                                                    }else{
                                                                       $email = $member->email;
                                                                       $number = $member->number;
                                                                    }
                                                                    ?>


                                                                 <tr class="odd gradeX" data-id="<?=$member->id;?>">
                                                                    <td class="center"> <?=$i; ?></td>
                                                                    <td class="center">
                                                                        <?=$member->member_id; ?>
                                                                    </td>
                                                                    <td class="center">   <?=$member->name; ?></td>
                                                                    <td class="center">   <?=$email; ?></td>
                                                                    <td class="center">   <?=$member->address; ?></td>
                                                                    <td class="center"><a href="tel:<?=$number; ?>">
                                                                               <?=($member->code)?$member->code.' '.$number:$number; ?> </a></td>
                                                                               <!-- member->number member->number -->
                                                                      <td class="center">   <?=$member->membership; ?></td>
                                                            
                                                                    <td class="center">
                                                                        <a href="#" class="tblEditBtn"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#staticBackdrop" data-id="<?php echo $member->id; ?>">
                                                                            <i class="fa fa-pencil"></i>
                                                                        </a>
                                                                        <a class="tblDelBtn"  data-id="<?php echo $member->id; ?>"><!-- data-bs-toggle="modal"
                                                                            data-bs-target="#smallModel" -->
                                                                            <i class="fa fa-trash-o"></i>
                                                                        </a>
                                                                    </td>
                                                                    <td class="center">
                                                                        <?php 
                                                                         //echo $member->id;
                                                                       
                                                                        if($this->db->where(array('parent_member'=>$member->id,'isActive'=>1))->count_all_results('members')) { ?>
                                                                        <a class="btn blue-bgcolor btn-outline btn-circle m-b-10" data-id="<?php echo $member->id; ?>" href="<?php echo base_url(); ?>Admin/Sub_Profile?id=<?= 
                                                                        $member->id?>">
                                                                             <!-- <i class="fa fa-eye"></i> -->
                                                                            view
                                                                        </a>
                                                                           <?php } ?>
                                                                    </td>
                                                                    <td class="center">
                                                                

                                                                        <a href="<?php echo base_url(); ?>Admin/generate_IdCard1?id=<?php echo base64_encode($member->id); ?>&m_name=<?php echo base64_encode($member->name); ?>&m_id=<?php echo base64_encode($member->member_id); ?>" class="" data-id="<?php echo $member->id; ?>" target="_blank">
                                                                                <i class="fa fa-file"></i>
                                                                        </a>




                                                                    </td>  
                                                                  <!--   <td class="center">
                                                                
                                                                       <?php 
                                                                       if($member->approve_status == '0'){ ?>
                                                                        <a class="btn deepPink btn-outline btn-circle m-b-10"  data-id="<?php echo $member->id; ?>" href="#" id="approve">
                                                                            Accept
                                                                        </a> 

                                                                        <?php } ?>

         
                               

                                                                    </td> -->
                                                                </tr>


                                                                <?php $i++; } ?>
                                                            

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
                    </div>



                    <!-- end admited patient list -->
                </div>
            </div>
            <!-- end page content -->

        </div>
        <!-- end page container -->
        <!-- start footer -->
 
        <!-- end footer -->

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

        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Update Member Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="#" id="member_form_add" class="form-horizontal" method="post" enctype="multipart/form-data">
                            <div class="form-body">
                                <div class="form-group row">
                                    <label class="control-label col-md-4"> Full Name
                                        <span class="required">  </span>
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" name="name" data-required="1" value="Full Name"
                                            class="form-control input-height" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-4">Email ID
                                        <span class="required">  </span>
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" name="email" data-required="1" value="Email ID"
                                            class="form-control input-height" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="control-label col-md-4">Gender
                                        <span class="required">  </span>
                                    </label>
                                    <div class="col-md-8">
                                        <select class="form-control input-height" name="gender">
                                            <option value="">Select...</option>
                                            <option value="male" selected>Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="control-label col-md-4">Mobile No.
                                        <span class="required">  </span>
                                    </label>
                                    <div class="col-md-8">
                                        <input name="number" type="text" value="9874563210"
                                            class="form-control input-height" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-4">Profile Picture
                                    </label>
                                    <div class="col-md-8">
                                        <input type="file" class="default" name="file_url">
                                    </div>
                                </div>
                                  <div class="preview" style="  display: grid;place-items: center;">
                                <img src="" id="pre-img" style="width:100px;margin-bottom: 2%;">

                            </div>


                                <div class="form-group row">
                                    <label class="control-label col-md-4">Emergency Contact:
                                        <span class="required">  </span>
                                    </label>
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="emergency_contact_name"  placeholder="Full Name"
                                                    autocomplete="off">
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control"
                                                    placeholder="Relationship to Member" name="emergency_contact_relationship" autocomplete="off">
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="emergency_contact_phone" placeholder="Phone number"
                                                    autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               <!-- new -->
                                        <div class="form-group row">
                                            <label class="control-label col-md-4">Dob and Bloodgroop:
                                                <span class="required"> </span>
                                            </label>
                                            <div class="col-md-8">
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
                                    <label class="control-label col-md-4">Height and Weight:
                                        <span class="required">  </span>
                                    </label>
                                    <div class="col-md-8">
                                        <div class="row">
                                           
                                            <div class="col-md-6">
                                                <input type="text" class="form-control"
                                                    placeholder="Height (in feet/inches or CM)" name="height" autocomplete="off">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control"
                                                    placeholder="Weight (in pounds or kilograms)" name="weight" autocomplete="off">
                                            </div>

                                        </div>
                                    </div>
                                </div>

                             
                                <div class="form-group row">
                                    <label class="control-label col-md-4">Personal and Social History:
                                        <span class="required">  </span>
                                    </label>
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="employment_status" placeholder="Employment status"
                                                    autocomplete="off">
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="education_level"  placeholder="Education level"
                                                    autocomplete="off">
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="marital_status"  placeholder="Marital status"
                                                    autocomplete="off">
                                            </div>
                                        </div>

                                       <!--  <div class="row mt-10">
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="exercise_habits"  placeholder="Exercise habits"
                                                    autocomplete="off">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control"
                                                    placeholder="Diet preferences or restrictions" name="diet_preferences"  autocomplete="off">
                                            </div>

                                        </div> -->
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="control-label col-md-4">Additional Information
                                        <span class="required">  </span>
                                    </label>
                                    <div class="col-md-8">
                                        <textarea class="form-control" rows="3" name="additional_information" placeholder="Additional Information"
                                            off spellcheck="false"></textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="control-label col-md-4">Address
                                        <span class="required">  </span>
                                    </label>
                                    <div class="col-md-8">
                                        <textarea class="form-control" rows="3" name="address" placeholder="Additional Information"
                                            off spellcheck="false"></textarea>
                                    </div>
                                </div>
                                    <div class="form-group row">
                                <label class="control-label col-md-4"> Enter Password
                                    <span class="required"> </span>
                                </label>
                                <div class="col-md-8">
                                    <input type="password" name="password" data-required="1" placeholder="Enter Password"
                                        class="form-control input-height" />
                                </div>
                            </div>
                           <!--  -->
                         <div class="form-group row">
                            <label class="control-label col-md-4">Membership
                                <span class="required"> </span>
                            </label>
                            <div class="col-md-8">
                                <select class="form-control input-height" name="membership">
                                    <option value="">Select...</option>
                                    <option value="Basic" >Basic</option>
                                    <option value="Premium">Premium</option>
                                </select>
                            </div>
                        </div>
                        <!--  -->


                                <div class="form-actions">
                                    <div class="col-lg-12 p-t-20 text-center">
                                        <input type="hidden" name="id">
                                         <input type="hidden" name="subprofile">

                                        <button type="button"
                                            class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-circle btn-primary" id="update_member">Update</button>

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
   <?php $this->load->view('Backend/admin/admin-temp/footer'); ?> 
    <script src="<?php echo base_url(); ?>assets/backend_assets/bundles/material/material.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend_assets/bundles/flatpicker/js/flatpicker.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend_assets/data/date-time.init.js"></script>
</body>

<script type="text/javascript">
        $(document).ready(function() {
       // $('.tblEditBtn').click(function() {
             $('#example5').on('click', '.tblEditBtn', function() {
            // Get the data attributes from the button
            var id = $(this).data('id');
       


            // Make an AJAX request to retrieve the data for the ID
            $.ajax({
                url: '<?php echo base_url("Admin/getMemberByID"); ?>?id=' + id,
                method: 'GET',
                data: { id: id },
                dataType: 'json',
                success: function(response) {

                    // Populate the modal with the data returned from the server
                $('#staticBackdrop [name="id"]').val(response.id);
                    $('#staticBackdrop [name="member_id"]').val(response.member_id);
                    $('#staticBackdrop [name="name"]').val(response.name);
                    $('#staticBackdrop [name="email"]').val(response.email);
                    $('#staticBackdrop [name="gender"]').val(response.gender);
                    $('#staticBackdrop [name="number"]').val(response.number);
                    $('#staticBackdrop [name="emergency_contact_name"]').val(response.emergency_contact_name);
                    $('#staticBackdrop [name="emergency_contact_relationship"]').val(response.emergency_contact_relationship);
                    $('#staticBackdrop [name="emergency_contact_phone"]').val(response.emergency_contact_phone);
                    $('#staticBackdrop [name="weight"]').val(response.weight);
                    $('#staticBackdrop [name="height"]').val(response.height);

                     $('#staticBackdrop [name="employment_status"]').val(response.employment_status);
                    $('#staticBackdrop [name="education_level"]').val(response.education_level);
                    $('#staticBackdrop [name="marital_status"]').val(response.marital_status);
                    $('#staticBackdrop [name="exercise_habits"]').val(response.exercise_habits);
                    $('#staticBackdrop [name="diet_preferences"]').val(response.diet_preferences);
                    $('#staticBackdrop [name="additional_information"]').val(response.additional_information);
                    $('#staticBackdrop [name="address"]').val(response.address);
                    $('#staticBackdrop [name="dob"]').val(response.dob);
                    $('#staticBackdrop [name="blood-group"]').val(response.bloodgroup);
                    $('#staticBackdrop [name="membership"]').val(response.membership);
                    // new sub profile

                    if(response.isSubprofile == 'Yes'){
                       $('#staticBackdrop [name="email"]').prop('disabled', true);
                       $('#staticBackdrop [name="number"]').prop('disabled', true);
                       $('#staticBackdrop [name="password"]').prop('disabled', true);
                        console.log(response.isSubprofile)
                         //subprofile
                              $('[name="subprofile"]').val('1');
                    }else{
                           $('#staticBackdrop [name="email"]').prop('disabled', false);
                       $('#staticBackdrop [name="number"]').prop('disabled', false);
                        $('#staticBackdrop [name="password"]').prop('disabled', false);
                     
                         //subprofile
                              $('[name="subprofile"]').val('');
                    }

                    // new sub profile
                     // emailField.prop('disabled', true);

                    $('#staticBackdrop #pre-img').attr('src',"");

                      if(response.profile){
                          $('#staticBackdrop #pre-img').attr('src',"<?php echo base_url('assets/uploads/users_profile/'); ?>"+response.profile);
                         
                        }

                     // Open the modal
                    $('#staticBackdrop').modal('show');
                

                }
               

                // error: function(xhr, status, error) {
                //     console.log(error); // Handle the error if any
                // }

            });
        });
    });



 $(document).on('click','#update_member',function(){
        event.preventDefault();
        
        $("#member_form_add").valid();
   

        $.ajax({
        type:'post',
        url: '<?php echo base_url("Admin/update_member_data");?>',
        data: new FormData($("#member_form_add")[0]),
        contentType: false,
        processData: false, 
        success:function(resp){
        var data=$.parseJSON(resp);
        if(data.status == 'success'){
        $('#member_form_add')[0].reset();
         $('#staticBackdrop').modal('hide');
         $(".modal-backdrop").remove();


        $.wnoty({
        type: 'success',
        message: "Member Updated successfully",
        autohideDelay: 1000,
        position: 'top-right'

        });
         // Update the table row with the new data
        var memberId = data.member.id;
       // console.log(data.member)
        var rowToUpdate = $("tr[data-id='" + memberId + "']");
        rowToUpdate.find(".center:eq(2)").text(data.member.name);
        rowToUpdate.find(".center:eq(3)").text(data.member.email);
        rowToUpdate.find(".center:eq(4)").text(data.member.address);
        rowToUpdate.find(".center:eq(5) a").text(data.member.number).attr("href", "tel:" + data.member.number);
        rowToUpdate.find(".center:eq(6) ").text(data.member.membership);
         setTimeout(function(){
         location.reload(true);
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
       
     
        return false;
        })

           //delete
    $(document).on('click','.tblDelBtn', function (e) {
    //var id = $(this).parents('tr').find('#id').val();
    var id = $(this).attr('data-id');
   $.confirm({
    title: 'Delete Warning!',
    content: 'Are you sure, you want to delete this member and appointment details ?',
    boxWidth: '25%',
    useBootstrap: false,
    buttons: {
    delete: {
    text: 'Delete',
    btnClass: 'btn-primary',
    action: function(){
    $.ajax({
    type: 'post',
    url: '<?php echo base_url('Admin/AllMemberdelete') ?>',
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



//New Dec------------------------------------------------------------Approve December------------------------------------------------------
 $(document).on('click','#approve',function(){
        event.preventDefault();
        
    
        var id = $(this).data('id');
      

        $.ajax({
        type:'post',
        url: '<?php echo base_url("Admin/approve_member_data");?>',
        data: {id:id},
      
        dataType: 'json',
        success:function(resp){
        //var data=$.parseJSON(resp);
       // console.log(resp)
       // console.log(data)
        if(resp.status == 'success'){
    
        $.wnoty({
        type: 'success',
        message: "Member Updated successfully",
        autohideDelay: 1000,
        position: 'top-right'

        });

         setTimeout(function(){
         location.reload(true);
        },2000);
       
       }else if(resp.status == 'error'){
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
       
     
        return false;
        })



////New-------------------
$(document).ready(function () {
    // Check if there is a stored page number in sessionStorage
    var savedPage = sessionStorage.getItem('tablePage');

    // Initialize DataTable with the saved page number if available
    var table = $('#example5').DataTable({
        "pageLength": 10, // Set the desired number of rows per page
        "displayStart": savedPage ? (parseInt(savedPage) * 10) : 0 // Set the saved page number or default to 0
    });

    // Event listener for page change
    table.on('page.dt', function () {
        // Store the current page number in sessionStorage
        sessionStorage.setItem('tablePage', table.page.info().page);
    });
});


</script>

</html>