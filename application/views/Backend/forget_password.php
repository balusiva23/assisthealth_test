<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<meta name="description" content="Responsive Admin Template" />
	<meta name="author" content="RedstarHospital" />
	 <title>Assist Health</title>
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>assets/backend_assets/fonts/font-awesome/v6/css/all.css" rel="stylesheet" type="text/css" />
	<!-- bootstrap -->
	<link href="<?php echo base_url(); ?>assets/backend_assets/bundles/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<!-- style -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend_assets/css/login.css">

	<!-- favicon -->
	<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/backend_assets/img/favicon.ico" />

   <link href="<?php echo base_url(); ?>assets/wnoty/wnoty.css" rel="stylesheet" type="text/css" />  
   <link href="<?php echo base_url(); ?>assets/wnoty/jquery-confirm.min.css" rel="stylesheet" type="text/css" /> 
   <style type="text/css">
   	.error{
   		color: red;
   	}
   </style> 
</head>
<!-- <?php echo base_url(); ?>assets/backend_assets/ -->
<body>
	<div class="main">
		<!-- Sing in  Form -->
		<section class="sign-in">
			<div class="container">
				<div class="signin-content">
					<div class="signin-image">
						<figure><img src="<?php echo base_url(); ?>assets/backend_assets/img/pages/forgot.jpg" alt="sing up image"></figure>
						<a href="<?php echo base_url(); ?>login" class="signup-image-link">Login here</a>
					</div>
					<div class="signin-form">
						<h3 class="form-title">Forgot Password?</h3>
						<p>Enter your email bellow to receive link for reset password</p><br>
						<form class="register-form" id="forgetform">
							<div class="form-group">
								<div class="">
									<input name="email" type="email" id="email" placeholder="Email Address"
										class="form-control input-height" required /> </div>
							</div>
							<div class="form-group form-button">
								<button class="btn btn-round btn-primary" name="send" id="send">Send</button>
							</div>
						</form>
						<div class="social-login">
							
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
    <script src="<?php echo base_url(); ?>assets/wnoty/jquery-confirm.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script> 
	<!-- end js include path -->
</body>

</html>
<script>
   	$(document).ready(function () {
 
    $(document).on('click', '#send', function(e) {
    //$('#bussinessunitform').submit(function(event) {
    e.preventDefault();
     $("#forgetform").valid();
    var email=$("#email").val();
   
   if(email != ''){
    
   $.ajax({
    type:'post',
    url: '<?php echo base_url("Login/Verify");?>',
    data: new FormData($("#forgetform")[0]),
    contentType: false,
    processData: false, 
    success:function(resp){
    var data=$.parseJSON(resp);
    if(data.status == 'success'){
    //var dep = $('#department').val();
    $('#forgetform')[0].reset();
  
    $.wnoty({
    type: 'success',
    message: data.message,
    autohideDelay: 3000,
    position: 'top-right'

    });
    //  setTimeout(function(){
    // window.location.href = '<?php echo base_url('Login/Verify');?>';
    // },2000);
  
   }else if(data.status = 'error'){
  
          $.wnoty({
                type: 'error',
                message: data.message,
                autohideDelay: 3000,
                position: 'top-right'

                });
    }else if(data.valid){
         $.wnoty({
                type: 'error',
                message: data.valid,
                autohideDelay: 3000,
                position: 'top-right'

                });
    }
    },
    });
    }
 
    return false;
    })
    })

</script>

