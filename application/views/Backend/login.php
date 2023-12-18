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
	<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/favicon.ico" />

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
						<figure><img src="<?php echo base_url(); ?>assets/backend_assets/img/pages/signin.jpg" alt="sing up image"></figure>
						<!-- <a href="<?php echo base_url(); ?>signup" class="signup-image-link">Create an account</a>
						<div class="float-left">
							<a href="<?php echo base_url(); ?>" class="signup-image-link "><i class="fa-solid fa-arrow-left"></i> Back To Home</a>
						</div> -->
						<!-- <div class="row">
						    <div class="col text-left">
						        <a href="<?php echo base_url(); ?>" class="signup-image-link"><i class="fa-solid fa-arrow-left"></i> Back To Home</a>
						    </div>
						    <div class="col text-right">
						        <a href="<?php echo base_url(); ?>signup" class="signup-image-link">Create an account</a>
						    </div>
						</div> -->

						
					</div>
					<div class="signin-form">
						<h2 class="form-title">Login</h2>
						<form class="register-form" id="loginform" name="loginform" method="post">
							<div class="form-group">
								<div class="">
									<input name="email" id="email" type="text" placeholder="Email or Mobile number"
										class="form-control input-height" value="<?php echo $this->input->cookie('username'); ?>" required/>
								</div>
							</div>
							<!--<div class="form-group">-->
							<!--	<div class="">-->
							<!--		<input name="pswd" id="pswd" type="password" placeholder="Password"  value="<?php echo base64_decode($this->input->cookie('password')); ?>"-->
							<!--			class="form-control input-height" required/>-->
							<!--	</div>-->
							<!--</div>-->
							<div class="form-group">
                <div class="input-group">
                  <input name="pswd" id="pswd" type="password" placeholder="Password" value="<?php echo base64_decode($this->input->cookie('password')); ?>" class="form-control input-height" required/>
                  <div class="input-group-append">
                    <span class="input-group-text" style="padding: 10px;">
                      <i class="fas fa-eye" id="togglePassword"></i>
                    </span>
                  </div>
                </div>
                <label id="pswd-error" class="error" for="pswd" style="display:none">This field is required.</label>
              </div>

						  <div class="row">
							<div class=" col form-group">
								<input type="checkbox" name="remember" id="remember" class="agree-term" <?php if($this->input->cookie('username')) echo 'Checked'; ?>/>
								<label for="remember-me" class="label-agree-term"><span><span></span></span>Remember
									me</label>
							</div>
							 <div class="col">
							 	 <a href="<?php echo base_url('forgetpassword'); ?>" class="signup-image-link" style=" font-size: 14px; color: #222; display: block; text-align: right; text-decoration: none; ">Forget Password?</a>
							 </div>
							</div>
							<div class="form-group form-button">
								<button class="btn btn-round btn-primary" type="submit" name="signin" id="signin">Login</button>
							</div>
						</form>
						<!-- <div class="signup-image">
						
						<a href="<?php echo base_url(); ?>" class="signup-image-link"><i class="fa-solid fa-arrow-left"></i> Back To Home</a>
					</div>

 -->
               <div class="row">
						    <div class="col text-left mt-5">
						        <a href="<?php echo base_url(); ?>" class="signup-image-link"><i class="fa-solid fa-arrow-left"></i> Back To Home</a>
						    </div>
						    <div class="col text-right mt-5">
						        <a href="<?php echo base_url(); ?>signup" class="signup-image-link">Create an account</a>
						    </div>
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
     $(document).on('click','#signin',function(){
        event.preventDefault();
           $("#loginform").valid();
           var email = $("#email").val();
            var password=$("#pswd").val();
            
           

        if(email != '' && password != ''  ){ // 
          
         $.ajax({
        type:'post',
        url: '<?php echo base_url("login/authenticate");?>',
        data: new FormData($("#loginform")[0]),
        contentType: false,
        processData: false, 
        success:function(resp){
        var data=$.parseJSON(resp);
        if(data.status == 'success'){
        $('#loginform')[0].reset();
        $.wnoty({
        type: 'success',
        message: 'Login Successfully',
        autohideDelay: 500,
        position: 'top-right'

        });
        setTimeout(function(){
        window.location.href = '<?php echo base_url()?>'+data.url;
        },1000);
       }else if(data.status == 'error'){
      
              $.wnoty({
                    type: 'error',
                    message: data.message,
                    autohideDelay: 1000,
                    position: 'top-right'

                    });
               setTimeout(function(){
		        window.location.href = '<?php echo base_url()?>'+data.url;
		        },2000);
        }
        },
        });
        }
     
        return false;
        })

     

</script>
<script>
$(document).ready(function() {
  $('#togglePassword').click(function() {
    const passwordInput = $('#pswd');
    const passwordFieldType = passwordInput.attr('type');

    // Toggle the password field between password and text type
    if (passwordFieldType === 'password') {
      passwordInput.attr('type', 'text');
      $('#togglePassword').removeClass('fa-eye').addClass('fa-eye-slash');
    } else {
      passwordInput.attr('type', 'password');
      $('#togglePassword').removeClass('fa-eye-slash').addClass('fa-eye');
    }
  });
});
</script>
