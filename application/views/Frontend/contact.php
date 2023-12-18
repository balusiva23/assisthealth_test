<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">


	<!-- responsive meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	  <!-- css -->
     <?php $this->load->view('Frontend/link-css'); ?> 




</head>

<body>



  <!-- header -->
   <?php $this->load->view('Frontend/header'); ?> 

   <!-- Navbar -->
   <?php $this->load->view('Frontend/navbar'); ?>

	<section class="inner-header">
		<div class="container">
			<div class="row">
				<div class="col-md-12 sec-title colored text-center">
					<h2>Contact Us</h2>
					<ul class="breadcumb">
						<li><a href="<?php echo base_url(); ?>">Home</a></li>
						<li><i class="fa fa-angle-right"></i></li>
						<li><span>Contact Us</span></li>
					</ul>
					<span class="decor"><span class="inner"></span></span>
				</div>
			</div>
		</div>
	</section>
	
		<section class="contact-content sec-padding">
		<div class="container">


			<br><br>
			<div class="row">
			 
				<div class="col-md-8 my-bg">
				    <form  class="contact-form row" id="contact-page-contact-form" novalidate="novalidate">
						<div class="col-md-6">
							<input type="text" name="name" id ="name" placeholder="Name" autocomplete="off">
							<input type="text" name="email" id="email" placeholder="Email">
							<input type="text" name="phone" placeholder="Phone">
							
						</div>
						<div class="col-md-6">
							<textarea name="message" placeholder="Message" cols="30" rows="10"></textarea>
						</div>
						<div class="col-md-12"><button type="button" id="send_contact">Send</button></div>
					</form>
				</div>
				
				
				
				<div class="col-md-4">
					<h2>Address</h2>
					<ul class="contact-info">
						<li>
							<div class="icon-box">
								<div class="inner">
									<i class="fa fa-map-marker"></i>
								</div>
							</div>
							<div class="content-box">
								<h4>Address</h4>
								<p> AssistHealth,<br>
#850,
3rd Floor,<br>
opposite Coffee Day,<br>
RMS Layout, Sahakar Nagar,<br> Bengaluru, Karnataka 560092.</p>
							</div>
						</li>
						<li>
							<div class="icon-box">
								<div class="inner">
									<i class="fa fa-phone"></i>
								</div>
							</div>
							<div class="content-box">
								<h4>Phone</h4>
								<p>+91 96112 32519 /<br> +91 96112 32569 </p>
							</div>
						</li>

					</ul>
				</div>
			</div>
		</div>
	</section>


	<section class="contact-content sec-padding">
		<div class="container">


			<br><br>
			<div class="row">
				<div class="col-md-12">
					<h2>Our Location</h2>
					<iframe
						src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3886.462931936231!2d77.58854531458906!3d13.06982106622661!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae19dee0d50c8b%3A0x7db7a659240e58c4!2sL%26T%20Realty%20Raintree%20Boulevard!5e0!3m2!1sen!2sin!4v1687013415508!5m2!1sen!2sin"
						width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
						referrerpolicy="no-referrer-when-downgrade"></iframe>
				</div>
			 
				
				
				
			 
			</div>
		</div>
	</section>




<!-- footer -->
   <?php $this->load->view('Frontend/footer'); ?>

<script>
     $(document).on('click','#send_contact',function(){

        event.preventDefault();
           $("#contact-page-contact-form").valid();
           var email = $("#email").val();
           var name=$("#name").val();
            
           

        if(email != '' && name != ''  ){ // 
          
         $.ajax({
        type:'post',
        url: '<?php echo base_url("login/contactus");?>',
        data: new FormData($("#contact-page-contact-form")[0]),
        contentType: false,
        processData: false, 
        success:function(resp){
        var data=$.parseJSON(resp);
        if(data.status == 'success'){
        $('#contact-page-contact-form')[0].reset();
        $.wnoty({
        type: 'success',
        message: 'Thank you for contactus!',
        autohideDelay: 500,
        position: 'top-right'

        });
        // setTimeout(function(){
        // window.location.href = '<?php echo base_url()?>'+data.url;
        // },1000);
       }else if(data.status == 'error'){
      
              $.wnoty({
                    type: 'error',
                    message: data.message,
                    autohideDelay: 1000,
                    position: 'top-right'

                    });
               setTimeout(function(){
		        window.location.href = '<?php echo base_url()?>';
		        },2000);
        }
        },
        });
        }
     
        return false;
        })



</script>

</body>


</html>