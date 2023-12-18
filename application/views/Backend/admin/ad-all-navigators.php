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
                <?php $this->load->view('Backend/admin/admin-temp/sidebar'); ?> 
            <!-- end sidebar menu -->
            <!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">All
                                    Navigators</div>
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
                                                            id="example4">
                                                            <thead>
                                                                <tr>
                                                                    <th class="center">S.No</th>
                                                                    <th class="center"> Name </th>
                                                                    <th class="center"> Email ID </th>
                                                                    <th class="center"> Mobile No. </th>
                                                                    <th class="center">Gender </th>

                                                                    <th class="center"> language spoken </th>

                                                                    <th class="center"> Intro about Navigator</th>
                                                                    <th class="center"> Members</th>
                                                                    <th class="center"> Update / Delete</th>
                                                                </tr>
                                                            </thead>
                                                  
                                             <tbody>
                                                <?php if (!empty($navigators)) {
                                                    $count = 1;
                                                    foreach ($navigators as $navigator) {
                                                        $intro = $navigator->intro;
                                                        $intro_words = explode(' ', $intro);
                                                        $intro_short = implode(' ', array_slice($intro_words, 0, 10));
                                                        $intro_remaining = implode(' ', array_slice($intro_words, 10));
                                                ?>
                                                        <tr class="odd gradeX" data-id="<?=$navigator->id;?>">
                                                            <td class="center"><?php echo $count; ?></td>
                                                            <td class="center"><?php echo $navigator->name; ?></td>
                                                            <td class="center"><?php echo $navigator->email; ?></td>
                                                            <td class="center"><?php echo $navigator->mobile_no; ?></td>
                                                            <td class="center"><?php echo $navigator->gender; ?></td>
                                                            <td class="center"><?php echo $navigator->language_spoken; ?></td>
                                                        

                                                            <td class="center">
                                                                <span class="intro-short"><?php echo $intro_short; ?></span>
                                                                <?php if (!empty($intro_remaining)) { ?>
                                                                    <span class="intro-more" style="display: none;"><?php echo $intro_remaining; ?></span>
                                                                    <a class="read-more-btn" onclick="toggleIntro(this)">Read More</a>
                                                                <?php } ?>
                                                            </td>
                                                                <td class="center"><?php echo $this->db->where(array('navigator'=>$navigator->id,'isActive'=>1))->count_all_results('members'); ?></td>
                                                            <td class="center">
                                                                <a href="#" class="tblEditBtn" data-id="<?php echo $navigator->id; ?>">
                                                                    <i class="fa fa-pencil"></i>
                                                                </a>
                                                                <a href="#" class="delete tblDelBtn" data-id="<?php echo $navigator->id; ?>">
                                                                    <i class="fa fa-trash-o"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                <?php
                                                        $count++;
                                                    }
                                                } ?>
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
            <!-- start chat sidebar -->

            <!-- end chat sidebar -->
        </div>
        <!-- end page container -->
        <!-- start footer -->
     <?php $this->load->view('Backend/admin/admin-temp/footer'); ?> 

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
             <form  id="form_sample_1" class="form-horizontal" method="post " enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Update Navigator Details</h5>
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
                                <label class="control-label col-md-3">Intro about Navigator
                                </label>
                                <div class="col-md-8">
                                    <textarea name="address" class="form-control-textarea"
                                        placeholder="Intro about Navigator" rows="5"></textarea>
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
        </div>
    </div>
    <!-- end js include path -->
<script>
    $(document).ready(function() {
          $('#example4').on('click', '.tblEditBtn', function() {
       // $('.tblEditBtn').click(function() {
            // Get the data attributes from the button
            var id = $(this).data('id');
            

            // Make an AJAX request to retrieve the data for the ID
            $.ajax({
                url: '<?php echo base_url("Admin/getNavigatorByID"); ?>?id=' + id,
                method: 'GET',
                data: { id: id },
                dataType: 'json',
                success: function(response) {
                    // Populate the modal with the data returned from the server
                    $('#staticBackdrop [name="id"]').val(response.id);
                    $('#staticBackdrop [name="firstname"]').val(response.name);
                    $('#staticBackdrop [name="email"]').val(response.email);
                    $('#staticBackdrop [name="gender"]').val(response.gender);
                    $('#staticBackdrop [name="number"]').val(response.mobile_no);
                    $('#staticBackdrop [name="address"]').val(response.intro);
                   // $('#staticBackdrop [name="password"]').val(response.password);
                    if(response.profile_picture){
                          $('#staticBackdrop #pre-img').attr('src',"<?php echo base_url('assets/uploads/manager_profile/'); ?>"+response.profile_picture);

                    }
                  
                      // Check the corresponding checkboxes based on the selected languages
                        var languages = response.language_spoken.split(','); //console.log(languages)
                        $('#staticBackdrop [name="language[]"]').prop('checked', false); // Uncheck all checkboxes
                        languages.forEach(function(lang) {
                            $('#staticBackdrop [name="language[]"][value="' + lang + '"]').prop('checked', true); // Check the matching checkboxes
                        });

                     // Open the modal
                    $('#staticBackdrop').modal('show');
                },
                error: function(xhr, status, error) {
                    console.log(error); // Handle the error if any
                }
            });
        });
    });

         $(document).on('click','#update',function(){
        event.preventDefault();
           $("#form_sample_1").valid();
         
         $.ajax({
        type:'post',
        url: '<?php echo base_url("Admin/Update_manager");?>',
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
        //  setTimeout(function(){
        //  location.reload(true);
        // },2000);
       // console.log(data.member);
        var memberId = data.member.id;
       // console.log(data.member)
        var rowToUpdate = $("#example4 tr[data-id='" + memberId + "']");
       
       rowToUpdate.find(".center:eq(1)").text(data.member.name);
        rowToUpdate.find(".center:eq(2)").text(data.member.email);
        rowToUpdate.find(".center:eq(3) a").text(data.member.mobile_no).attr("href", "tel:" + data.member.mobile_no);
          rowToUpdate.find(".center:eq(4)").text(data.member.gender);
        rowToUpdate.find(".center:eq(5)").text(data.member.language_spoken);
         rowToUpdate.find(".center:eq(6) .intro-short").text(data.member.intro);
       // rowToUpdate.find(".center:eq(2)").text(data.member.name);
       //  rowToUpdate.find(".center:eq(3)").text(data.member.email);
       //  rowToUpdate.find(".center:eq(4)").text(data.member.mobile_no);
       //  rowToUpdate.find(".center:eq(5)").text(data.member.gender);
       //  rowToUpdate.find(".center:eq(6)").text(data.member.language_spoken);
       //  rowToUpdate.find(".center:eq(7) .intro-short").text(data.member.intro);

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
    content: 'Are you sure, you want to delete this?',
    boxWidth: '25%',
    useBootstrap: false,
    buttons: {
    delete: {
    text: 'Delete',
    btnClass: 'btn-primary',
    action: function(){
    $.ajax({
    type: 'post',
    url: '<?php echo base_url('Admin/Managerdelete') ?>',
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