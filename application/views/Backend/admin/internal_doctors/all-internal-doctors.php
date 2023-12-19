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
                         <div class="form-group row">
                                           
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


                             <div class="col-md-2">
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

                        <div class="col-md-2">
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
                        <div class="col-md-2">
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

                        <div class="col-md-2">
                            <label class="control-label">Timings <span class="required"> </span></label>
                            <select class="form-control input-height search timing" name="timing" id="timing" required>
                                <option value="">Select...</option>
                                <?php
                                $uniqueTimings = array_unique(array_column($navigators, 'timing'));
                                foreach ($uniqueTimings as $timing) { 

                                       // Assuming $timing is in HH:MM:SS format
                                  $formattedTime = date("h:i A", strtotime($timing)); ?>
                                    <option value="<?= $timing ?>"><?= $formattedTime ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-md-2">
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


   <!--  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
             <form  id="form_sample_1" class="form-horizontal" method="post " enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Update Doctor Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                   
                        <div class="form-body">
                            <div class="form-group row">
                                <label class="control-label col-md-3"> Name
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-8">
                                    <input type="text" name="firstname" data-required="1" placeholder="Enter Name"
                                        class="form-control input-height" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3">Email ID
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-8">
                                    <input type="text" name="email" data-required="1" placeholder="Enter Email ID"
                                        class="form-control input-height" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-md-3">Gender
                                    <span class="required"> * </span>
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
                                <label class="control-label col-md-3">Mobile No.
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-8">
                                    <input name="number" type="text" placeholder="Mobile Number"
                                        class="form-control input-height" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3">Profile Picture
                                </label>
                                <div class="col-md-8">
                                    <input type="file" class="default" name="file_url">
                                </div>

                               
                            </div>
                                   
                                 <div class="form-group row">
                                <label class="control-label col-md-3"> Education Qualification
                                    <span class="required"> </span>
                                </label>
                                <div class="col-md-8">
                                    <input type="text" name="qualification" data-required="1"
                                        placeholder="Enter Education Qualification" class="form-control input-height"  />
                                </div>
                            </div>
                                 <div class="form-group row">
                                <label class="control-label col-md-3"> Medical Council Number
                                    <span class="required"> </span>
                                </label>
                                <div class="col-md-8">
                                    <input type="text" name="medical_council_no" data-required="1"
                                        placeholder="Enter  Medical Council Number" class="form-control input-height"  />
                                </div>
                            </div>
                                               

                            <div class="preview" style="  display: grid;place-items: center;">
                                <img src="" id="pre-img" style="width:100px">

                            </div>
                             
                            <div class="form-group row">
                                <label class="control-label col-md-3">language spoken
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-4">
                                            <div class="checkbox checkbox-icon-black p-0">
                                                <input id="checkbox1" name="language[]" type="checkbox" value="tamil">
                                                <label for="checkbox1">
                                                    Tamil
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-4">
                                            <div class="checkbox checkbox-icon-black p-0">
                                                <input id="checkbox2" name="language[]" type="checkbox" value="english">
                                                <label for="checkbox2">
                                                    English
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-4">
                                            <div class="checkbox checkbox-icon-black p-0">
                                                <input id="checkbox3" name="language[]" type="checkbox" value="hindi">
                                                <label for="checkbox3">
                                                    Hindi
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 col-sm-4">
                                            <div class="checkbox checkbox-icon-black p-0">
                                                <input id="checkbox4" name="language[]" type="checkbox" value="malayalam">
                                                <label for="checkbox4">
                                                    Malayalam
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-4">
                                            <div class="checkbox checkbox-icon-black p-0">
                                                <input id="checkbox5" name="language[]" type="checkbox" value="telugu">
                                                <label for="checkbox5">
                                                    Telugu
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-sm-4">
                                            <div class="checkbox checkbox-icon-black p-0">
                                                <input id="checkbox6" name="language[]" type="checkbox" value="kannada">
                                                <label for="checkbox6">
                                                    Kannada
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="control-label col-md-3">Intro about Doctor
                                </label>
                                <div class="col-md-8">
                                    <textarea name="address" class="form-control-textarea"
                                        placeholder="Intro about Doctor" rows="5"></textarea>
                                </div>
                            </div>
                       <div class="form-group row">
                                <label class="control-label col-md-3"> Enter Password
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-5">
                                    <input type="password" name="password" data-required="1" placeholder="Enter Password"
                                        class="form-control input-height" />
                                </div>
                            </div>

                        </div>
                  
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-primary"  id="update">update</button>
                </div>
                  </form>
            </div>
        </div> -->
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
                            <label class="control-label col-md-3">Specialized In
                                <span class="required"></span>
                            </label>
                            <div class="col-md-8">
                                <input type="text" name="specializedIn" id="specializedIn" data-required="1" placeholder="Enter Specialized In " class="form-control input-height" />
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
                            <label class="control-label col-md-3">Hospital
                                <span class="required"></span>
                            </label>
                            <div class="col-md-8">
                                <input type="text" name="hospital" id="hospital" data-required="1" placeholder="Enter Hospital " class="form-control input-height" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-3">Clinic Address
                            </label>
                            <div class="col-md-8">
                                <textarea name="address" class="form-control-textarea" placeholder="Clinic Address" rows="5"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-3">Hospital Consultation Timings
                                <span class="required"></span>
                            </label>
                            <div class="col-md-8">
                                <input type="time" name="timing" id="timing" data-required="1" placeholder="Enter Consultation Timings " class="form-control input-height" />
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
    $('#name, #speciality,#hospital, #timing, #fees').change(function () {
      // Remove selected options in other dropdowns
     //   $('#name, #speciality, #hospital, #timing, #fees').not(this).val('');
        filter_data(1);
    });

    filter_data(1);

    function filter_data(page) {
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
                filters: filters
            },
            success: function (data) {
                $('.filter_data').html(data.product_list);
                $('#pagination_link').show();
                $('.pagination-box #pagination_link').html(data.pagination_link);
            }
        });
    }
    
    function get_filters() {
    var filters = [];

    // Assuming your select elements have IDs: 'name', 'speciality', 'timing', 'fees'
    $('#name, #speciality, #hospital, #timing, #fees').each(function () {
        var dropdown_id = $(this).attr('id');
        var dropdown_value = $(this).val();

        // Push an object with dropdown_id and dropdown_value into the filters array
        filters.push({ id: dropdown_id, value: dropdown_value });
    });

    

    return filters;
}


    // function get_filters() {
    //     var filters = {};

    //     // Assuming your select elements have IDs: 'name', 'speciality', 'timing', 'fees'
    //     $('#name, #speciality,#hospital, #timing, #fees').each(function () {
    //         var dropdown_id = $(this).attr('id');
    //          var dropdown_value = $(this).val();

    //        // filters[dropdown_id] = $(this).val();
    //      filters[dropdown_id] = dropdown_value;
    //     });

    //        console.log('Filters:', filters); 

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
                

                     // Open the modal
                    $('#staticBackdrop').modal('show');
                },
                error: function(xhr, status, error) {
                    console.log(error); // Handle the error if any
                }
            });
        });
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
</script>

</body>

 

</html>