<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<meta name="description" content="Responsive Admin Template" />
	<meta name="author" content="SmartUniversity" />
 <title>Assist Health</title>
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />
	<!-- icons -->
	<link href="<?php echo base_url(); ?>assets/backend_assets/fonts/font-awesome/v6/css/all.css" rel="stylesheet" type="text/css" />
	<!-- bootstrap -->
	<link href="<?php echo base_url(); ?>assets/backend_assets/bundles/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<!-- style -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend_assets/css/login.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend_assets/password.css">
	 <!-- favicon -->
  <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/favicon.ico" />


   <link href="<?php echo base_url(); ?>assets/wnoty/wnoty.css" rel="stylesheet" type="text/css" />  
   <link href="<?php echo base_url(); ?>assets/wnoty/jquery-confirm.min.css" rel="stylesheet" type="text/css" />  
   <link href="<?php echo base_url(); ?>assets/css/countries.css" rel="stylesheet" type="text/css" />  
      <style type="text/css">
    .error{
      color: red;
    }
        @media screen and (max-width: 768px){
  .signup-image, .signin-image {
    display: none !important;
  }
}
   </style> 
</head>

<body>
	<div class="main">
		<!-- Sign up form -->
		<section class="signup">
			<div class="container" style="width: 1200px;">
				<div class="signup-content">

					<div class="" style="width: 100%;">
            <!-- signup-form -->
						<h2 class="form-title">Sign up</h2>
						<form method="POST" class="register-form" id="register-form">
              <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                <div class="">
                  <input name="uname"  id="uname" type="text" placeholder="Enter Your Name"
                    class="form-control input-height" required />
                </div>
              </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                <div class="">
                  <input name="email" type="email" id="email" placeholder="Enter Your Email "
                    class="form-control input-height" />
                </div>
              </div>
                </div> 
                <div class="col-md-4">
                       <div class="form-group">
                <div class="input-group">
               

                  <div class="select-box">
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
                
              </div>
               <!-- Additional Fields -->
            <div class="row">
                <div class="col-md-4 mt-4">
                    <div class="form-group">
                        <div class="">
                            <input name="dob" id="dob" type="date" placeholder="Enter Your Date of Birth"
                                   class="form-control input-height" required />
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-4">
                    <div class="form-group">
                        <div class="">
                            <select name="gender" id="gender" class="form-control input-height" required>
                                <option value="" disabled selected>Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-4">
                    <div class="form-group">
                        <div class="">
                            <input name="address" id="address" type="text" placeholder="Enter Your Address"
                                   class="form-control input-height" required />
                        </div>
                    </div>
                </div>
            </div>

              <h4 class="form-title mt-2">Add Members</h4>
            <div id="form-container">
              <div class="member-container row">
                <div class="col-md-3 mt-2">
                  <div class="form-group">
                    <input type="text" name="mname[]" class="form-control input-height" required placeholder="Enter Name">
                  </div>
                </div>
                <div class="col-md-3 mt-2">
                  <div class="form-group">
                    <input type="date" name="mdob[]" class="form-control input-height" required>
                  </div>
                </div>
                <div class="col-md-2 mt-2">
                  <div class="form-group">
                    <select name="mgender[]" required class="form-control input-height" placeholder="Select Gender">
                      <option value="male">Male</option>
                      <option value="female">Female</option>
                      <option value="other">Other</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-3 mt-2">
                  <div class="form-group">
                    <input type="text" name="relationship[]" class="form-control input-height" required placeholder="Relationship with Primary Member">
                  </div>
                </div>
              <!--   <div class="col-md-1 mt-2">
                  <div class="form-group">
                    <button type="button" class="remove-member btn btn-danger">X</button>
                  </div>
                </div> -->
                <div class="col mt-2">
                  <div class="form-group">
                    <button type="button" class="btn btn-round btn-success" id="add-member">Add</button>
                  </div>
                </div>
              </div>
            </div>



						 	<div class="form-group form-button mt-4 text-right" style="float: ;">
								<button class="btn btn-round btn-primary" type="submit" name="signup" id="savepass">Register</button>
							</div>
						</form>
            <!-- <div class="signup-image">
      
            <a href="<?php echo base_url(); ?>login" class="signup-image-link">I am already member</a>
          </div> -->
          <div class="row">
           <div class="col text-left mt-5">
                    <a href="<?php echo base_url(); ?>" class="" style="font-size: 14px; color: #222; display: block; text-decoration: none"><i class="fa-solid fa-arrow-left"></i> Back To Home</a>
                </div>
                <div class="col text-right mt-5">
                <a href="<?php echo base_url(); ?>login" class="signup-image-link">I am already member</a>
                </div>
            </div>

					</div>
	 	   
			</div>
		</section>
	</div>
	<!-- start js include path -->
	<script src="<?php echo base_url(); ?>assets/backend_assets/bundles/jquery/jquery.min.js"></script>



	<!-- bootstrap -->
	<script src="<?php echo base_url(); ?>assets/backend_assets/bundles/bootstrap/js/bootstrap.min.js"></script>

	<script src="<?php echo base_url(); ?>assets/wnoty/wnoty.js"></script>
    
    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/countries.js"></script> 
    <script src="<?php echo base_url(); ?>assets/wnoty/jquery-confirm.min.js"></script>
     <script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script> 

	<!-- end js include path -->
	<script>
     $(document).ready(function() {
        $('#popover-password-top').hide();
           $('#popover-cpassword').hide();
            //$('#savepass').prop('disabled', true);

          $('#pswd').keyup(function() {
            var pswd = $('#pswd').val();
            if (checkStrength(pswd) == false) {
                $('#savepass').attr('disabled', true);
               
            }else
            {
                $('#savepass').attr('disabled', false);
            }
        }).focus(function() {
            $('#pswd_info').show();
          }).blur(function() {
            $('#pswd_info').hide();
          });
             
        //check strong
      /*  if(!checkStrength(pswd)){
            $('#savepass').prop('disabled', true);  
        }*/
      
        $('#cpassword').blur(function() {
            if ($('#pswd').val() !== $('#cpassword').val()) {
                $('#popover-cpassword').removeClass('hide');
                $('#popover-cpassword').show();
                $('#savepass').attr('disabled', true);
            } else {
                $('#popover-cpassword').addClass('hide');
                $('#popover-cpassword').hide();
            }

        });
            $('#cpassword').on("change",function() {
            if ($('#pswd').val() === $('#cpassword').val()) {
               $('#popover-cpassword').addClass('hide');
                 $('#popover-cpassword').show();
                $('#savepass').attr('disabled', false);
            } else {
                $('#popover-cpassword').addClass('hide');
                  $('#popover-cpassword').hide();
            }
            
        });
 

  //you have to use keyup, because keydown will not catch the currently entered value
  //$('#pswd').keyup(function() {

    // set password variable
   // var pswd = $(this).val();

    //validate the length
     function checkStrength(pswd) {

    if (pswd.length < 8) {
      $('#length').removeClass('valid').addClass('invalid');
      $('#popover-password-top').show();
        $('#savepass').attr('disabled', true);
      
    } else {
      $('#length').removeClass('invalid').addClass('valid');
      $('#popover-password-top').hide();

    }

    //validate letter
    if (pswd.match(/[A-z]/)) {
      $('#letter').removeClass('invalid').addClass('valid');
    } else {
      $('#letter').removeClass('valid').addClass('invalid');
       $('#popover-password-top').show();
         $('#savepass').attr('disabled', true);
    }

    //validate uppercase letter
    if (pswd.match(/[A-Z]/)) {
      $('#capital').removeClass('invalid').addClass('valid');
    } else {
      $('#capital').removeClass('valid').addClass('invalid');
       $('#popover-password-top').show();
         $('#savepass').attr('disabled', true);
    }

    //validate number
    if (pswd.match(/\d/)) {
      $('#num').removeClass('invalid').addClass('valid');
    } else {
      $('#num').removeClass('valid').addClass('invalid');
       $('#popover-password-top').show();
         $('#savepass').attr('disabled', true);
    }
    //validate special char
    if (pswd.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) {
     $('#special').removeClass('invalid').addClass('valid');
    } else {
      $('#special').removeClass('valid').addClass('invalid');
       $('#popover-password-top').show();
         $('#savepass').attr('disabled', true);
    }

    }
  });

     $(document).on('click','#savepass',function(){
        event.preventDefault();
           $("#register-form").valid();
           var name = $("#uname").val();
           var email = $("#email").val();
            var password=$("#pswd").val();
            var password=$("#pswd").val();
            var number=$("#number").val();
           
         // if (number.length > 10) {
         //  return;
         // }
     

        if(name != ''  && email != '' && number != '' ){ //email != '' &&  && password != ''
       
         $.ajax({
        type:'post',
        url: '<?php echo base_url("Login/SaveNewMember");?>', //Savemember
        data: new FormData($("#register-form")[0]),
        contentType: false,
        processData: false, 
        success:function(resp){
        var data=$.parseJSON(resp);
        //console.log(data)
        if(data.status == 'success'){
        $('#register-form')[0].reset();
        $.wnoty({
        type: 'success',
        message: data.message,
        autohideDelay: 1000,
        position: 'top-right'

        });
        setTimeout(function(){
        window.location.href = '<?php echo base_url()?>login';
        },2000);
       }else if(data.status == 'error'){
      
              $.wnoty({
                    type: 'error',
                    message: data.message,
                    autohideDelay: 1000,
                    position: 'top-right'

                    });
        }
        },
        });
        }
     
        return false;
        })


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


// -----------------------------------------------------------------------

  // $(document).ready(function () {
  //   // Add member
  //   $("#add-member").click(function () {
  //     var newMember = $(".member-container:first").clone();
  //     newMember.find("input, select").val("");
  //     newMember.find(".remove-member").show(); // Show remove button for added members
  //     newMember.appendTo("#form-container");
  //   });

  //   // Remove member
  //   $("#form-container").on("click", ".remove-member", function () {
  //     $(this).closest(".member-container").remove();
  //   });
  // });
 $(document).ready(function () {
  var memberCount = 1;
    $('#add-member').click(function() {
  memberCount++;
  $('#form-container').append('<div id="member-row-' + memberCount + '" class="member-container row">' +
    '<div class="col-md-3 mt-2">' +
    '<div class="form-group">' +
    '<input type="text" name="mname[]" class="form-control input-height" required placeholder="Enter Name">' +
    '</div>' +
    '</div>' +
    '<div class="col-md-3 mt-2">' +
    '<div class="form-group">' +
    '<input type="date" name="mdob[]" class="form-control input-height" required>' +
    '</div>' +
    '</div>' +
    '<div class="col-md-2 mt-2">' +
    '<div class="form-group">' +
    '<select name="mgender[]" required class="form-control input-height" placeholder="Select Gender">' +
    '<option value="male">Male</option>' +
    '<option value="female">Female</option>' +
    '<option value="other">Other</option>' +
    '</select>' +
    '</div>' +
    '</div>' +
    '<div class="col-md-3 mt-2">' +
    '<div class="form-group">' +
    '<input type="text" name="relationship[]" class="form-control input-height" required placeholder="Relationship with Primary Member">' +
    '</div>' +
    '</div>' +
    '<div class="col-md-1 mt-2">' +
    '<div class="form-group">' +
    '<button type="button" name="remove" id="member-' + memberCount + '" class="remove-member btn btn-danger">X</button>' +
    '</div>' +
    '</div>' +
    // '<div class="col-md-2 mt-2">' +
    // '<div class="form-group">' +
    // '<button type="button" class="btn btn-round btn-success add-member">Add</button>' +
    // '</div>' +
    '</div>' +
    '</div>');
});
 // Remove member
    $("#form-container").on("click", ".remove-member", function () {
      $(this).closest(".member-container").remove();
    });
  });
     
</script>
</body>
</html>