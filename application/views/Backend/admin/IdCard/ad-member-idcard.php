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
      <link href="<?php echo base_url(); ?>assets/css/idcard.css" rel="stylesheet" type="text/css" />
      <style type="text/css">
      	p{
      		margin: 0px;

          font-size: 12px;
      	}
      	.card-text2{
         margin-top: 3px;
      	}
      	.card-text2 ul, ol {
         font-size: 10px;
        line-height: 14px; 
        }
        .card-text3 p {
        font-size: 12px;
        line-height: 18px; 
        }


      </style>
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
                                <div class="page-title">Generate  Member ID</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header>Generate  Member ID</header>
                                </div>
                                <div class="card-body" id="bar-parent">
                                 
                                     <form  id="member_form_add" method="post" class="form-horizontal"  enctype="multipart/form-data">
                                        <div class="form-body">
                                          
                                           

                                            <div class="form-group row" >
                                                <label class="control-label col-md-2">
                                                    Members
                                                   <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <select class="form-control input-height" name="parent_member"  id="parent_member">
                                                        <option value="">Select...</option>
                                                     
                                                        <?php 
                                                            foreach ($allmembers as  $value) { ?>
                                                                <option value="<?= $value->id ?>"><?= $value->name.' ('.$value->member_id.')'; ?></option>
                                                        <?php  }
                                                        ?>
                                                    </select>
                                                </div>
                                            
                                                <div class="col-md-4 ">
                                                    <input type="hidden" name="id" value="  ">
                                                    <button type="button"
                                                        class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-circle btn-primary" id="save_member">Submit</button>

                                                </div>
                                          
                                            </div>
                                            <!-- ID -->
                                             <div class="row" style=" margin-left: 20%; ">
                                             <div class="center-container" id="center-container" style="display: none;">
										      <div class="inner-card-container">
										        <div class="bizzy-card-container">

										          <div class="biz-card-a">
										            <p style="padding-left: 15px;font-weight: bold;"><span style="color:#38B6FF ;">ASSISTHEALTH</span><br><span style="color: white ;">MEMBERSHIP CARD</span></p>

										             <div class="card-text" style="background: white; border-radius: 10px;  margin-left: 10px;">
										                  <p style="padding-left: 15px;font-weight: bold;"><span style="color:#38B6FF ;text-transform: uppercase;">Sivakumar</span><br><span style="color: black ;text-transform: capitalize;">ASSISTHEALTH ID : <span style="color: #aa893f ;"> AAB123</span></span></p>
										             </div>
										             <!-- COMPLETE HEALTHCARE SUPPORT, JUST A CALL AWAY -->
										              <p style="padding-left: 15px;font-weight: bold;"><span style="color:#38B6FF ;">COMPLETE HEALTHCARE SUPPORT,<br> JUST A CALL AWAY</span><br></p>

										               <div class="card-text1" style="background: #38B6FF; ">
										                  <p style="padding-left: 15px;font-weight: bold;"><span style="color:black ;text-transform: uppercase;">9611232593 / 9611232519</span></p>
										             </div> 
										             <div class="card-text2" style="color: #ffff;font-size: 10px;font-weight: lighter; ">
										                  <ul>
										                    <li>Valid for registered members only.</li>
										                    <li>Use this membership card to schedule any AssistHealth services.</li>
										                    <li>Keep these contact numbers handy for quick access to your Navigators.</li>
										                  </ul>
										             </div>
										          </div>

										          <div class="biz-card-b">
										            <div class="biz-headshot biz-pic-drew">
										              <div class="biz-words-container">
										               
										              </div>
										            </div>
										             <div class="card-text3" style="color: #ffff; font-size: 12px; font-weight: lighter; float: right; margin-top: 15px;">
										                  <p>CONTACT DETAILS</p>
										                  <p> <a href="tel:919611232569">+91 9611232569</a></p>
										                  <p> <a href="mailto:infoassisthealth@gmail.com">
										                  infoassisthealth@gmail.com
										                 </a></p>
										                 <p> <a href="www.assisthealth.in">www.assisthealth.in</a></p>
										             </div>

										           
										          </div>

										        </div>
										        <!--bizzy-card-container-->
										      </div>
										      <!--inner-card-container-->
										  </div>
										    <!-- <button id="downloadButton">Download as PNG</button> -->
										  </div>
                                            <!-- ID -->

                                       

                                           
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

      <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <!-- end js include path -->
</body>

<script type="text/javascript">
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
        
        if ($('#subprofile_checkbox').prop('checked')) {
        // Subprofile checkbox is checked, no validation needed
        $("select[name='gender']").attr('required', 'required');
        $("#parent_member").attr('required', 'required');
        $("#member_form_add").valid();
        var name = $("#name").val();

      

           if( name != '' && $("select[name='gender']").val() != ''  &&   $("#parent_member").val() != ''){

            $.ajax({
            type:'post',
            url: '<?php echo base_url("Admin/Add_member_data");?>',
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
            window.location.href = '<?php echo base_url()?>Admin/All_Members';
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
                
        
            
            if(email != '' && name != '' && number != ''  && password != '' && confirmPassword != ''){

            $.ajax({
            type:'post',
            url: '<?php echo base_url("Admin/Add_member_data");?>',
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
            //  setTimeout(function(){
            //  location.reload(true);
            // },2000);
            setTimeout(function(){
            window.location.href = '<?php echo base_url()?>Admin/All_Members';
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
        })

    

        $(document).ready(function() {
       // $('.tblEditBtn').click(function() {
             $(document).on('change', '#parent_member', function() {
            // Get the data attributes from the button
            var id = $(this).val();
              
   
             

            // Make an AJAX request to retrieve the data for the ID
            $.ajax({
                url: '<?php echo base_url("Admin/getMemberByID"); ?>?id=' + id,
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



// document.addEventListener('DOMContentLoaded', function() {
//   document.getElementById('downloadButton').addEventListener('click', function() {
//     // Set the desired width and height for the canvas
//     var canvasWidth = 530; // Specify the width you want
//     var canvasHeight = 270; // Specify the height you want

//     // Use html2canvas to capture the content and render it on the canvas
//     html2canvas(document.querySelector('.center-container'), { width: canvasWidth, height: canvasHeight }).then(function(canvas) {
//       var link = document.createElement('a');
//       link.href = canvas.toDataURL();
//       link.download = 'card.png';
//       link.click();
//     });
//   });
// });

        document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('download').addEventListener('click', function() {
        // Create a container element
        var container = document.createElement('div');
        container.className = 'center-container';
     document.getElementById('center-container').style.display = 'block';

        // Clone the form and append it to the container
        var formClone = document.getElementById('center-container').cloneNode(true);
        container.appendChild(formClone);

        // Append the container to the body (it won't be visible on the screen)
        document.body.appendChild(container);

        // Use html2canvas to generate the canvas
        html2canvas(container).then(function(canvas) {
            // Create a link element for download
            var link = document.createElement('a');
            link.href = canvas.toDataURL();
            link.download = 'id_card.png';

            // Trigger a click on the link to start the download
            link.click();

            // Remove the container from the body
            document.body.removeChild(container);
        });
    });
});


</script>

</html>

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel"> Member </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
              
                        <div class="center-container">
      <div class="inner-card-container">
        <div class="bizzy-card-container">

          <div class="biz-card-a">
            <p style="padding-left: 15px;font-weight: bold;"><span style="color:#38B6FF ;">ASSISTHEALTH</span><br><span style="color: white ;">MEMBERSHIP CARD</span></p>

             <div class="card-text" style="background: white; border-radius: 10px;  margin-left: 10px;">
                  <p style="padding-left: 15px;font-weight: bold;"><span style="color:#38B6FF ;text-transform: uppercase;">Sivakumar</span><br><span style="color: black ;text-transform: capitalize;">ASSISTHEALTH ID : <span style="color: #aa893f ;"> AAB123</span></span></p>
             </div>
             <!-- COMPLETE HEALTHCARE SUPPORT, JUST A CALL AWAY -->
              <p style="padding-left: 15px;font-weight: bold;"><span style="color:#38B6FF ;">COMPLETE HEALTHCARE SUPPORT,<br> JUST A CALL AWAY</span><br></p>

               <div class="card-text1" style="background: #38B6FF; ">
                  <p style="padding-left: 15px;font-weight: bold;"><span style="color:black ;text-transform: uppercase;">9611232593 / 9611232519</span></p>
             </div> 
             <div class="card-text2" style="color: #ffff;font-size: 10px;font-weight: lighter; ">
                  <ul>
                    <li>Valid for registered members only.</li>
                    <li>Use this membership card to schedule any AssistHealth services.</li>
                    <li>Keep these contact numbers handy for quick access to your Navigators.</li>
                  </ul>
             </div>
          </div>

          <div class="biz-card-b">
            <div class="biz-headshot biz-pic-drew">
              <div class="biz-words-container">
               
              </div>
            </div>
             <div class="card-text3" style="color: #ffff; font-size: 12px; font-weight: lighter; float: right; margin-top: 15px;">
                  <p>CONTACT DETAILS</p>
                  <p> <a href="tel:919611232569">+91 9611232569</a></p>
                  <p> <a href="mailto:infoassisthealth@gmail.com">
                  infoassisthealth@gmail.com
                 </a></p>
                 <p> <a href="www.assisthealth.in">www.assisthealth.in</a></p>
             </div>

           
          </div>

        </div>
        <!--bizzy-card-container-->
      </div>
      <!--inner-card-container-->
  </div>



                      </div>
                       <div class="modal-footer">
					        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					        <button type="button" class="btn btn-primary" id="download">Save changes</button>
					      </div>
                        
                    </div>

                </div>
            </div>

            <script type="text/javascript">
            	  $(document).ready(function() {
            	 $('#staticBackdrop').modal('show');
            	 });
            </script>
      