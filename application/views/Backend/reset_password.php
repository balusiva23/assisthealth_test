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
	<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/backend_assets/img/favicon.ico" />


   <link href="<?php echo base_url(); ?>assets/wnoty/wnoty.css" rel="stylesheet" type="text/css" />  
   <link href="<?php echo base_url(); ?>assets/wnoty/jquery-confirm.min.css" rel="stylesheet" type="text/css" />  
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
			<div class="container">
				<div class="signup-content">

					<div class="signup-form">
						<h2 class="form-title">Reset Password</h2>
						<form method="POST" class="register-form" id="register-form">
					     <div class="form-group">
								<div class="">
									<input name="password" type="password" placeholder="Password" id="pswd"
										class="form-control input-height" required />
								</div>
								<span id="popover-password-top" class="hide pull-right block-help text-danger error"> Enter a strong password</span>
							</div>
								<!-- password validation -->
							 <div id="pswd_info" style="display: none;">
	                        <h4>Password must contain:</h4>
	                        <ul>
	                        <li id="letter" class="valid">At least <strong>one letter</strong></li>
	                        <li id="capital" class="invalid">At least <strong>one capital letter</strong></li>
	                        <li id="num" class="invalid">At least <strong>one number</strong></li>
	                        <li id="special" class="invalid">At least <strong>one special character</strong></li>
	                        <li id="length" class="invalid">At least <strong>8 characters</strong></li>
	                        </ul>
	                      </div>
							<div class="form-group">
								<div class="">
									<input name="cpassword" type="password" id="cpassword"  placeholder="Confirm Password"
										class="form-control input-height" required />
								</div>
								   <label><span id="popover-cpassword" class=" hide pull-right block-help text-danger error">Password don't match</span></label>

								
							</div>
						

							<div class="form-group form-button">
								  <input type="hidden" name="role" value="<?= $role ?>">
                                  <input type="hidden" name="token" id="token" value="<?= $token ?>">
								<button class="btn btn-round btn-primary" type="submit" name="signup" id="savepass">Save</button>
							</div>
						</form>
            <!-- <div class="signup-image">
      
            <a href="<?php echo base_url(); ?>login" class="signup-image-link">I am already member</a>
          </div> -->
          <div class="row">
           <div class="col text-left mt-5">
                    <a href="<?php echo base_url(); ?>" class="" style="font-size: 14px; color: #222; display: block; text-decoration: none"><i class="fa-solid fa-arrow-left"></i> Back To Home</a>
                </div>
               <!--  <div class="col text-right mt-5">
                <a href="<?php echo base_url(); ?>login" class="signup-image-link">I am already member</a>
                </div> -->
            </div>

					</div>
	 	   <div class="signup-image" style="margin: 0 42px; margin-top:45px">
						<figure><img src="<?php echo base_url(); ?>assets/backend_assets/img/pages/signup.jpg" alt="sing up image"></figure>
						<!-- <a href="<?php echo base_url(); ?>" class="signup-image-link"><i class="fa-solid fa-arrow-left"></i> Back To Home</a> -->
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
    <script src="<?php echo base_url(); ?>assets/wnoty/jquery-confirm.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend_assets/js/jquery.validate.min.js"></script> 

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
           
      

        if( password != ''  ){
       
         $.ajax({
        type:'post',
        url: '<?php echo base_url("Login/updatePassword");?>',
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
    // Call the resetTokenCleanup every 1 hour (3600000 milliseconds)
 setTimeout(function() {
            $.ajax({
        type:'post',
        url: '<?php echo base_url("Login/cleartoken");?>',
        data: new FormData($("#register-form")[0]),
        contentType: false,
        processData: false, 
        success:function(resp){
        var data=$.parseJSON(resp);
        //console.log(data)
        if(data.status == 'success'){
        $('#register-form')[0].reset();
        // $.wnoty({
        // type: 'success',
        // message: data.message,
        // autohideDelay: 1000,
        // position: 'top-right'

        // });
        alert("Your Token Expired...")
        setTimeout(function(){
        window.location.href = '<?php echo base_url()?>login';
        },1000);
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
    }, 3600000); // 1 hour in milliseconds
});

// $(document).ready(function() {
//     // After 1 hour, clear the token field
//     setTimeout(function() {
//         $('#token').val('');
//     }, 1000); // 1 hour in milliseconds  3600000
// });
</script>
</body>
</html>