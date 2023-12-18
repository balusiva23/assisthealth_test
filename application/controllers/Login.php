<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require FCPATH .'assets/phpmailer/phpmailer/src/Exception.php';
require FCPATH .'assets/phpmailer/phpmailer/src/PHPMailer.php';
require FCPATH .'assets/phpmailer/phpmailer/src/SMTP.php';

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function __construct()
    {
        parent::__construct();
      //  $this->load->model('member_model'); // Assuming you have a model named Member_model to interact with the members table
         // Load necessary models
        $this->load->model('Admin_model');
        $this->load->model('Manager_model');
        $this->load->model('User_model');
       $this->load->model('Doctor_model');
    }

    public function layout()
    {
        $this->load->view('layouts_form');
    }

	public function index()
	{
		//$this->load->view('Backend/login');
        // Check if the user is already authenticated
        if ($this->session->userdata('user_login_access')) {
            // Redirect to the appropriate dashboard based on the user's role
            $role = $this->session->userdata('url');
            redirect(base_url('/').$role, 'refresh');
        } else {
            // User is not authenticated, load the login view
            $this->load->view('Backend/login');
        }
	}
	public function Signup()
	{
       
		$this->load->view('Backend/sign_up1'); //sign_up
	}

	public function savemember()
    {
        $name = $this->input->post('uname');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $number = $this->input->post('number');
        $code = $this->input->post('code');

        // Perform form validation
        $this->load->library('form_validation');
        $this->form_validation->set_rules('uname', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');

        if ($this->form_validation->run() === FALSE) {
            // Form validation failed
            $response = array(
                'status' => 'valid',
                'message' => validation_errors()
            );
        } else {
            // Form validation passed


	        // // Check for duplicate email
	        // if ($this->User_model->is_email_duplicate($email)) {
	        //     $response = array(
	        //         'status' => 'error',
	        //         'message' => 'Email address already exists'
	        //     );
	        // } elseif ($this->User_model->is_number_duplicate($number)) {
            //     $response = array(
            //         'status' => 'error',
            //         'message' => 'Number already exists'
            //     );
            // } else {

            if ($this->User_model->is_email_duplicate($email) && $this->User_model->is_number_duplicate($number)) {
            $response = array(
                'status' => 'error',
                'message' => 'Email address and number already exist'
            );
           // echo json_encode($response);
           } elseif ($this->User_model->is_email_duplicate($email)) {
              
                  $response = array(
                   'status' => 'error',
                     'message' => 'Email address already exists'
               );
             } elseif ($this->User_model->is_number_duplicate($number)) {
             
                  $response = array(
                   'status' => 'error',
                   'message' => 'Number already exists'
                );
            } else {
             
            

             // Generate the new member ID
             $newMemberId = $this->generateUniqueMemberId();
           
            // Encrypt the password
            $encrypted_password = password_hash($password, PASSWORD_BCRYPT);

            // Save the member details in the database
            $member_data = array(
                'name' => $name,
                'email' => $email,
                'password' => $encrypted_password,
                'member_id' =>$newMemberId,
                'number' =>$number,
                'code' =>$code,
                'member_status'=>'1'
            );

            if ($this->User_model->save_member($member_data)) {

                $this->send_mail($name,$email,$number);

                /*Notification*/

                // Retrieve data from the employee table
                $admin = $this->Admin_model->getAllAdmin();
                // Insert data into the notification table for each employee
                $filetitle = 'New user signup: <span class="txt-name">'.$name.'</span>.';
                foreach ($admin as $data) {
                $data = array(
                'admin_id' => $data->id,
                'message' => $filetitle,
                'created_at' => date('Y-m-d H:i:s'),
                'status' => 'unread',
                'icon' => 'fa fa-user o',
                'color' => 'purple-bgcolor',
                  'url' => 'Admin/All_Members'
                );
                $this->db->insert('admin_notifications', $data);
                }

                // Member saved successfully
                $response = array(
                    'status' => 'success',
                    'message' => 'Registration successful'
                );
            } else {
                // Error saving member
                $response = array(
                    'status' => 'error',
                    'message' => 'Error saving member'
                );
            }
        }
       }

        echo json_encode($response);
    }


    //member id
    // public function generateUniqueMemberID()
    // {
    //     // Get the last member ID from the database
    //     $lastMemberID = $this->db->select('member_id')
    //         ->order_by('member_id', 'DESC')
    //         ->limit(1)
    //         ->get('members')
    //         ->row('member_id');

    //     // Check if a member ID already exists
    //     if (!empty($lastMemberID)) {
    //         // Extract the numeric part of the last member ID
    //         $numericPart = (int) substr($lastMemberID, 2);
    //         // Increment the numeric part by 1
    //         $newNumericPart = $numericPart + 1;
    //         // Generate the new member ID
    //         $newMemberID = 'AH' . $newNumericPart;
    //     } else {
    //         // If no member ID exists, start with the default value
    //         $newMemberID = 'AH1001';
    //     }

    //     // Check if the new member ID already exists
    //     $existingMember = $this->db->get_where('members', array('member_id' => $newMemberID))->row();

    //     if ($existingMember) {
    //         // If the new member ID already exists, recursively call the function to generate a new one
    //         return $this->generateUniqueMemberID();
    //     }

    //     return $newMemberID;
    // }
    public function generateUniqueMemberID()
{
    // Get the last member ID from the database
    $lastMemberID = $this->db->select('member_id')
        ->order_by('member_id', 'DESC')
        ->limit(1)
        ->get('members')
        ->row('member_id');

    // Check if a member ID already exists
    if (!empty($lastMemberID)) {
        // Extract the prefix and numeric parts of the last member ID
        $prefix = substr($lastMemberID, 0, 3);
        $numericPart = (int) substr($lastMemberID, 3);

        if ($numericPart < 99) {
            // Increment the numeric part by 1
            $newNumericPart = $numericPart + 1;
            // Generate the new member ID
            $newMemberID = $prefix . str_pad($newNumericPart, 2, '0', STR_PAD_LEFT);
        } else {
            // Increment the prefix and reset the numeric part to 0
            $newPrefix = ++$prefix;
            $newNumericPart = 0;
            // Generate the new member ID
            $newMemberID = $newPrefix . str_pad($newNumericPart, 2, '0', STR_PAD_LEFT);
        }
    } else {
        // If no member ID exists, start with the default value
        $newMemberID = 'AAA00';
    }

    // Check if the new member ID already exists
    $existingMember = $this->db->get_where('members', array('member_id' => $newMemberID))->row();

    if ($existingMember) {
        // If the new member ID already exists, recursively call the function to generate a new one
        return $this->generateUniqueMemberID();
    }

    return $newMemberID;
}


    //Login
 
    public function authenticate() {
        // Get the login credentials from the form
        $username = $this->input->post('email');
        $password = $this->input->post('pswd');
        $remember = $this->input->post('remember'); // Assuming remember checkbox has name "remember"
        
        
        // Check if the remember me checkbox is checked
        $rememberMe = $remember ? true : false;

        // Authenticate the user using the submitted credentials
        $role = $this->determineRole($username, $password);

        // Redirect to the appropriate dashboard based on the user's role
        switch ($role) {
            case 'admin':
                echo json_encode(array("status" => "success", "url" => 'admin/'));
                break;
            case 'manager':
                echo json_encode(array("status" => "success", "url" => 'Navigator/'));
                break;     
            case 'doctor':
                echo json_encode(array("status" => "success", "url" => 'Doctor/'));
                break;
            case 'user':
                echo json_encode(array("status" => "success", "url" => 'Member/'));
                break;
            default:
                //redirect(base_url() .'login');
               echo json_encode(array("status" => "error", "url" => 'login',"message"=>"Please check your login details"));
                break;
        }

        // Set cookies if remember me is checked
        if ($rememberMe) {
            $cookie_username = array(
                'name' => 'username',
                'value' => $username,
                'expire' => 604800, // 1 week
                'domain' => $_SERVER['HTTP_HOST'],
                'secure' => false
            );
          $cookie_pass = array(
                'name' => 'password',
                'value' => base64_encode($password),
                'expire' => 604800, // 1 week
                'domain' => $_SERVER['HTTP_HOST'],
                'secure' => false
            );

            $this->input->set_cookie($cookie_username);
            $this->input->set_cookie($cookie_pass);
        } else {
            // Clear the remember me cookie if the remember option is not checked
          if(!empty($this->input->cookie('username')))
            {
                $this->input->set_cookie('username',' ');
            }
            if(!empty($this->input->cookie('password')))
            {
                $this->input->set_cookie('password',' ');
            }               
            redirect(base_url() . 'login', 'refresh');
        }
    }


    private function determineRole($username, $password) {
        // Authenticate the user's credentials against the database
        
        // Check if the user is an admin
        $admin = $this->Admin_model->getAdminByUsername($username);
        if ($admin && password_verify($password, $admin->password)) {
       
            $this->session->set_userdata('user_login_access', '1');
            $this->session->set_userdata('user_login_id', $admin->id);
            $this->session->set_userdata('name', $admin->name);
            $this->session->set_userdata('email', $admin->email);
            $this->session->set_userdata('url', 'admin/');
            $this->session->set_userdata('role', 'admin');
            return 'admin';
        }
        
        // Check if the user is a manager
        $manager = $this->Manager_model->getManagerByUsername($username);
        if ($manager && password_verify($password, $manager->password)) {

            $this->session->set_userdata('user_login_access', '1');
            $this->session->set_userdata('user_login_id', $manager->id);
            $this->session->set_userdata('name', $manager->name);
            $this->session->set_userdata('email', $manager->email);
            $this->session->set_userdata('url', 'Navigator/');
            $this->session->set_userdata('role', 'manager');

            return 'manager';
        }        
        // Check if the user is a doctor
        $doctor = $this->Doctor_model->getDoctorByUsername($username);
        if ($doctor && password_verify($password, $doctor->password)) {

            $this->session->set_userdata('user_login_access', '1');
            $this->session->set_userdata('user_login_id', $doctor->id);
            $this->session->set_userdata('name', $doctor->name);
            $this->session->set_userdata('email', $doctor->email);
            $this->session->set_userdata('url', 'Doctor/');
            $this->session->set_userdata('role', 'doctor');

            return 'doctor';
        }
        
        // Check if the user is a regular user
        $user = $this->User_model->getUserByUsername($username);
        if ($user && password_verify($password, $user->password)) {

            $this->session->set_userdata('user_login_access', '1');
            $this->session->set_userdata('user_login_id', $user->id);
            $this->session->set_userdata('name', $user->name);
            $this->session->set_userdata('email', $user->email);
            $this->session->set_userdata('url', 'Member/');
            $this->session->set_userdata('role', 'user');

            return 'user';
        }
        
        // If no role is determined, return false
        return false;
    }

	  /*Logout method*/
        function logout() 
        {
        $this->session->sess_destroy();
        $this->session->set_flashdata('feedback', 'logged_out');
         redirect(base_url(),'refresh');
       }




   public function send_mail($name,$email,$number) {
    // $name = $this->input->post('name');
    // $email = $this->input->post('email');
    // $number = $this->input->post('number');
  //  $message = $this->input->post('message');

    // Create the inquiry email
    $inquiryMail = new PHPMailer(true);
    ob_start();
    ?>
    <!-- Inquiry email HTML content -->
  <html>
  <head>
      <meta charset="UTF-8">
      <title></title>
      <style>
          body {
              margin: 0;
              padding: 0;
              font-family: Arial, sans-serif;
          }

          .container {
              max-width: 600px;
              margin: 0 auto;
              padding: 20px;
              background-color: #F5F8FB;
          }

          h1 {
              font-size: 24px;
              margin-top: 0;
          }

          table {
              width: 100%;
          }

          table td {
              padding: 5px;
          }

          .btn {
              display: inline-block;
              padding: 10px 20px;
              background-color: #2196F3;
              color: #ffffff;
              text-decoration: none;
              border-radius: 2px;
              font-weight: bold;
          }

          .caption {
              font-size: 12px;
              color: #616161;
          }

          .signature {
              margin-top: 20px;
              font-size: 12px;
          }

          .logo-image {
              display: inline-block;
              vertical-align: middle;
          }

          .logo-image img {
              max-width: 70px;
              height: auto;
          }

          .unsubscribe-link {
              display: inline-block;
              margin-right: 10px;
              text-decoration: none;
              color: #616161;
          }
      </style>
  </head>
  <body>
      <div class="container">
          <h1>New User Registration</h1>
            <p>Hello Admin,</p>
            <p>A new user has registered on our website. Here are the registration details:</p>
          <table>
              <tr>
                  <td><strong>Name</strong></td>
                  <td><?php if(isset($name)) { echo  $name; } ?></td>
              </tr>
              <tr>
                  <td><strong>Email</strong></td>
                    <td><?php if(isset($email)) { echo  $email; } ?></td>
              </tr>
              <tr>
                  <td><strong>Phone</strong></td>
                    <td><?php if(isset($number)) { echo  $number; } ?></td>
              </tr> 
               <!-- <tr>
                  <td><strong>Message</strong></td>
                    <td><?php if(isset($message)) { echo  $message; } ?></td>
              </tr> -->
          </table>

       <!--    <p style="text-align:center;">
              <a href="#" class="btn">EXAMPLE BUTTON</a>
          </p>
          <p style="text-align:center;">
              <a href="#" class="unsubscribe-link">Unsubscribe</a>
              <span>|</span>
              <a href="#" class="unsubscribe-link">Account Settings</a>
          </p> -->
          <!-- <p class="caption">This is a caption text in the main email body.</p> -->

          <div class="signature">
              <p>
              Thank you,<br>
             AssisHealth,<br>
              #850,
              3rd Floor,<br>
              opposite Coffee Day,<br>
              RMS Layout, Sahakar Nagar,<br> Bengaluru, Karnataka 560092.</p>
              </p>
             <!--  <p>
                  Support: <a href="mailto:#">info@whello.id</a>
              </p> -->
              <!-- <div class="logo-image">
                  <a href="#" target="_blank">
                      <img src="https://zavoloklom.github.io/material-design-iconic-font/icons/mstile-70x70.png" alt="logo-alt">
                  </a>
              </div> -->
          </div>
      </div>
  </body>
  </html>
    <?php
    $inquiryMessage = ob_get_clean();

    try {
        // Configure and send the inquiry email
        $inquiryMail->isSMTP();
        $inquiryMail->Host = 'smtp.gmail.com';
        $inquiryMail->SMTPAuth = true;
        $inquiryMail->Username = USERNAME;
        $inquiryMail->Password = PASSWORD;
        $inquiryMail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $inquiryMail->Port = 465;
        $inquiryMail->setFrom(FROM, FROMNAME);
        $inquiryMail->addAddress(FROM, FROMNAME);
        $inquiryMail->isHTML(true);
        $inquiryMail->Subject = 'New User Registration!!!';
        $inquiryMail->Body = $inquiryMessage;

        // Create the thank you email
        $thankYouMail = new PHPMailer(true);
        ob_start();
        ?>
    <html>
    <head>
        <style>
            /* CSS styles for the email content */
            body {
                font-family: Arial, sans-serif;
              
            }
            
            .container {
                max-width: 600px;
                margin: 0 auto;
                padding: 20px;
                background-color: #F5F8FB;
            }
            
            h1 {
                font-size: 24px;
                color: #333333;
                margin-bottom: 20px;
            }
            
            p {
                font-size: 16px;
                color: #666666;
                margin-bottom: 10px;
            }
            
            .cta-button {
                display: inline-block;
                padding: 10px 20px;
                background-color: #337ab7;
                color: #ffffff;
                text-decoration: none;
                border-radius: 5px;
            }
            
            .footer {
/*                text-align: center;*/
                margin-top: 20px;
                padding: 10px;
            }
            
            .footer p {
                font-size: 14px;
                color: #999999;
                margin-bottom: 5px;
            }
        </style>
    </head>
    <body style="background-color: ">
        <div class="container" style="background-color: #F5F8FB; max-width: 600px; margin: 0 auto; padding: 20px;">
            <h1>Thank you for registering!</h1>
            <p>Dear <?php echo $name; ?>,</p>
            <p>Thank you for registering on our website. We are excited to have you as part of our community.</p>
            <p>If you have any questions or need further assistance, feel free to contact us <a href="mailto:infoassisthealth@gmail.com">infoassisthealth@gmail.com</a>.</p>
            <p><a href="<?php echo base_url()?>" style="display: inline-block; padding: 10px 20px; background-color: #337ab7; color: #ffffff; text-decoration: none; border-radius: 5px;">Visit Our Website</a></p>

              <div class="footer" >
            <!-- <p>Thank you,</p>
            <p>Assist Health</p> -->
            <p>Thank you,<br>
               AssisHealth,<br>
                #850,
                3rd Floor,<br>
                opposite Coffee Day,<br>
                RMS Layout, Sahakar Nagar,<br> Bengaluru, Karnataka 560092.</p>
        </div>
        </div>
       
      
       
    </body>
    </html>
        <?php
        $thankYouMessage = ob_get_clean();

        // Configure and send the thank you email
        $thankYouMail->isSMTP();
        $thankYouMail->Host = 'smtp.gmail.com';
        $thankYouMail->SMTPAuth = true;
        $thankYouMail->Username = USERNAME;
        $thankYouMail->Password = PASSWORD;
        $thankYouMail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $thankYouMail->Port = 465;
        $thankYouMail->setFrom(FROM, FROMNAME);
        $thankYouMail->addAddress($email, $name);
        $thankYouMail->isHTML(true);
        $thankYouMail->Subject = 'Thank you for registering!';
        $thankYouMail->Body = $thankYouMessage;

        // Send both emails
        if ($inquiryMail->send() && $thankYouMail->send()) {
           // echo json_encode(array('status' => 'success', 'message' => 'Register Successfully!!'));
        } else {
           // echo json_encode(array('status' => 'error', 'message' => 'Error in sending emails.'));
        }
    } catch (Exception $e) {
        //echo json_encode(array('status' => 'error', 'message' => "An error occurred. {$e->getMessage()}"));
    }
}
  public function subcribe_mail() {
        
        $name = $this->input->post('name');
        $email = $this->input->post('email');

         $mail = new PHPMailer(true);
          ob_start();
        ?>

<html>
<head>
    <style>
        /* CSS styles for the email content */
        body {
            font-family: Arial, sans-serif;
          
        }
        
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
        }
        
        h1 {
            font-size: 24px;
            color: #333333;
            margin-bottom: 20px;
        }
        
        p {
            font-size: 16px;
            color: #666666;
            margin-bottom: 10px;
        }
        
        .cta-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #337ab7;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
        }
        
        .footer {
            text-align: ;
            margin-top: 20px;
            padding: 10px;
        }
        
        .footer p {
            font-size: 14px;
            color: #999999;
            margin-bottom: 5px;
        }
    </style>
</head>
<body style="background-color: ;">
    <div class="container" style="background-color: #F5F8FB; max-width: 600px; margin: 0 auto; padding: 20px;">
        <h1>Thank you for subscribing!</h1>
        <p>Dear subscriber,</p>
        <p>Thank you for subscribing to our website updates. You will now receive the latest updates.</p>
        <p>We invite you to check out our website for more information and updates.</p>
        <p>If you have any questions or need further assistance, feel free to contact us <a href="mailto:infoassisthealth@gmail.com">infoassisthealth@gmail.com</a>.</p>
        <p><a href="<?php echo base_url()?>" style="display: inline-block; padding: 10px 20px; background-color: #337ab7; color: #ffffff; text-decoration: none; border-radius: 5px;">Visit Our Website</a></p>

         <div class="footer" >
        <!-- <p>Thank you,</p>
        <p>Assist Health</p> -->
        <p>Thank you,<br>
           AssisHealth,<br>
            #850,
            3rd Floor,<br>
            opposite Coffee Day,<br>
            RMS Layout, Sahakar Nagar,<br> Bengaluru, Karnataka 560092.</p>
    </div>
    </div>
   
   
   
</body>
</html>

    <?php
    $message = ob_get_contents();
    ob_end_clean();
     
        try {
            //Server settings
            //$mail->SMTPDebug = 4;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host = 'smtp.gmail.com';//'smtp.gmail.com';//Set the SMTP server to send through
            $mail->SMTPAuth = true;                                   //Enable SMTP authentication
            $mail->Username   = USERNAME;                     //SMTP username
            $mail->Password   = PASSWORD;                                //SMTP password
            $mail->SMTPSecure =  PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            //Recipients
            $mail->setFrom(FROM,FROMNAME);
            //$mail->addAddress('balusiva1299@gmail.com', "siva");     
            $mail->addAddress($email, $name); //$fname    
       
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject='Thank you for subscribing to our website'; 
            $mail->Body = $message;
            //$mail->AltBody = $customer_message;

            if ($mail->send()) {
               
             echo json_encode(array('status'=>'success','message'=>'Register Successfully!!'));
            
            }else{
                // echo json_encode(array('status'=>'error','message'=>'Error in sending Email.'));
            }
        } catch (Exception $e) {
          // echo json_encode(array('status'=>'error',"Message could not be sent. Mailer Error: {$mail->ErrorInfo}"));;
        }
   }

public function contactus() {
    $name = $this->input->post('name');
    $email = $this->input->post('email');
    $number = $this->input->post('phone');
    $message = $this->input->post('message');

    // Create the inquiry email
    $inquiryMail = new PHPMailer(true);
    ob_start();
    ?>
    <!-- Inquiry email HTML content -->
  <html>
  <head>
      <meta charset="UTF-8">
      <title></title>
      <style>
          body {
              margin: 0;
              padding: 0;
              font-family: Arial, sans-serif;
          }

          .container {
              max-width: 600px;
              margin: 0 auto;
              padding: 20px;
              background-color: #F5F8FB;
          }

          h1 {
              font-size: 24px;
              margin-top: 0;
          }

          table {
              width: 100%;
          }

          table td {
              padding: 5px;
          }

          .btn {
              display: inline-block;
              padding: 10px 20px;
              background-color: #2196F3;
              color: #ffffff;
              text-decoration: none;
              border-radius: 2px;
              font-weight: bold;
          }

          .caption {
              font-size: 12px;
              color: #616161;
          }

          .signature {
              margin-top: 20px;
              font-size: 12px;
          }

          .logo-image {
              display: inline-block;
              vertical-align: middle;
          }

          .logo-image img {
              max-width: 70px;
              height: auto;
          }

          .unsubscribe-link {
              display: inline-block;
              margin-right: 10px;
              text-decoration: none;
              color: #616161;
          }
      </style>
  </head>
  <body>
      <div class="container">
          <h1>HI !! You have recived new enquiry today </h1>

          <table>
              <tr>
                  <td><strong>Name</strong></td>
                  <td><?php if(isset($name)) { echo  $name; } ?></td>
              </tr>
              <tr>
                  <td><strong>Email</strong></td>
                    <td><?php if(isset($email)) { echo  $email; } ?></td>
              </tr>
              <tr>
                  <td><strong>Phone</strong></td>
                    <td><?php if(isset($number)) { echo  $number; } ?></td>
              </tr> 
               <tr>
                  <td><strong>Message</strong></td>
                    <td><?php if(isset($message)) { echo  $message; } ?></td>
              </tr>
          </table>

       <!--    <p style="text-align:center;">
              <a href="#" class="btn">EXAMPLE BUTTON</a>
          </p>
          <p style="text-align:center;">
              <a href="#" class="unsubscribe-link">Unsubscribe</a>
              <span>|</span>
              <a href="#" class="unsubscribe-link">Account Settings</a>
          </p> -->
          <!-- <p class="caption">This is a caption text in the main email body.</p> -->

          <div class="signature">
              <p>
              Thank you,<br>
             AssisHealth,<br>
              #850,
              3rd Floor,<br>
              opposite Coffee Day,<br>
              RMS Layout, Sahakar Nagar,<br> Bengaluru, Karnataka 560092.</p>
              </p>
             <!--  <p>
                  Support: <a href="mailto:#">info@whello.id</a>
              </p> -->
              <!-- <div class="logo-image">
                  <a href="#" target="_blank">
                      <img src="https://zavoloklom.github.io/material-design-iconic-font/icons/mstile-70x70.png" alt="logo-alt">
                  </a>
              </div> -->
          </div>
      </div>
  </body>
  </html>
    <?php
    $inquiryMessage = ob_get_clean();

    try {
        // Configure and send the inquiry email
        $inquiryMail->isSMTP();
        $inquiryMail->Host = 'smtp.gmail.com';
        $inquiryMail->SMTPAuth = true;
        $inquiryMail->Username = USERNAME;
        $inquiryMail->Password = PASSWORD;
        $inquiryMail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $inquiryMail->Port = 465;
        $inquiryMail->setFrom(FROM, FROMNAME);
        $inquiryMail->addAddress(FROM, FROMNAME);
        $inquiryMail->isHTML(true);
        $inquiryMail->Subject = 'New Enquiry!!!';
        $inquiryMail->Body = $inquiryMessage;

        // Create the thank you email
        $thankYouMail = new PHPMailer(true);
        ob_start();
        ?>
    <html>
    <head>
        <style>
            /* CSS styles for the email content */
            body {
                font-family: Arial, sans-serif;
              
            }
            
            .container {
                max-width: 600px;
                margin: 0 auto;
                padding: 20px;
                background-color: #F5F8FB;
            }
            
            h1 {
                font-size: 24px;
                color: #333333;
                margin-bottom: 20px;
            }
            
            p {
                font-size: 16px;
                color: #666666;
                margin-bottom: 10px;
            }
            
            .cta-button {
                display: inline-block;
                padding: 10px 20px;
                background-color: #337ab7;
                color: #ffffff;
                text-decoration: none;
                border-radius: 5px;
            }
            
            .footer {
/*                text-align: center;*/
                margin-top: 20px;
                padding: 10px;
            }
            
            .footer p {
                font-size: 14px;
                color: #999999;
                margin-bottom: 5px;
            }
        </style>
    </head>
    <body style="background-color: ">
        <div class="container" style="background-color: #F5F8FB; max-width: 600px; margin: 0 auto; padding: 20px;">
             <h1>Thank You for Your Inquiry!</h1>
            <p>Dear <?php echo $name; ?>,</p>
            <p>We have received your inquiry and will get back to you as soon as possible.</p>
            <p>If you have any questions or need further assistance, feel free to contact us <a href="mailto:infoassisthealth@gmail.com">infoassisthealth@gmail.com</a>.</p>
            <p><a href="<?php echo base_url()?>" style="display: inline-block; padding: 10px 20px; background-color: #337ab7; color: #ffffff; text-decoration: none; border-radius: 5px;">Visit Our Website</a></p>

              <div class="footer" >
            <!-- <p>Thank you,</p>
            <p>Assist Health</p> -->
            <p>Thank you,<br>
               AssisHealth,<br>
                #850,
                3rd Floor,<br>
                opposite Coffee Day,<br>
                RMS Layout, Sahakar Nagar,<br> Bengaluru, Karnataka 560092.</p>
        </div>
        </div>
       
      
       
    </body>
    </html>
        <?php
        $thankYouMessage = ob_get_clean();

        // Configure and send the thank you email
        $thankYouMail->isSMTP();
        $thankYouMail->Host = 'smtp.gmail.com';
        $thankYouMail->SMTPAuth = true;
        $thankYouMail->Username = USERNAME;
        $thankYouMail->Password = PASSWORD;
        $thankYouMail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $thankYouMail->Port = 465;
        $thankYouMail->setFrom(FROM, FROMNAME);
        $thankYouMail->addAddress($email, $name);
        $thankYouMail->isHTML(true);
        $thankYouMail->Subject = 'Thank you for your inquiry!';
        $thankYouMail->Body = $thankYouMessage;

        // Send both emails
        if ($inquiryMail->send() && $thankYouMail->send()) {
            echo json_encode(array('status' => 'success', 'message' => 'Register Successfully!!'));
        } else {
            //echo json_encode(array('status' => 'error', 'message' => 'Error in sending emails.'));
        }
    } catch (Exception $e) {
       // echo json_encode(array('status' => 'error', 'message' => "An error occurred. {$e->getMessage()}"));
    }
}

   /*Forget*/
    public function ForgetPassword()
    {
        $this->load->view('Backend/forget_password');
    }

    // Add this method to your controller

    public function Verify()
    {
        $this->load->library('form_validation');

        // Set validation rules for the email field
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() == false) {
            // Display the forgot password form
           // $this->load->view('forgot_password');
        } else {
            // Get the submitted email address
            $email = $this->input->post('email');

            // Determine the user's role based on the email address
            $role = $this->getUserRoleByEmail($email);

            if ($role) {
            if ($role === 'user') {
                // Generate a unique token for password reset
                $token = md5(uniqid());

                // Save the token and its associated user in the database
                $this->saveResetToken($email, $token, $role);

                // Send the password reset email
                $this->sendResetEmail($email, $token, $role);

                // Display a success message to the user
               // $this->load->view('forgot_password_success');
                 echo json_encode(array('status'=>'success','message'=>' Kindly check your email To reset your password'));
               } else {
                echo json_encode(array('status'=>'error','message'=>'Contact the admin to change the password. '));
             } 
             } else {
                // No user found with the given email address
               // $this->load->view('forgot_password', ['error' => 'Email not found']);
                echo json_encode(array('status'=>'error','message'=>'Email not found'));
            }
        }
    }
        // Add this method to your controller

        private function getUserRoleByEmail($email)
        {
            // Check if the user is an admin
            $admin = $this->Admin_model->getAdminByEmail($email);
            if ($admin) {
                return 'admin';
            }

            // Check if the user is a manager
            $manager = $this->Manager_model->getManagerByEmail($email);
            if ($manager) {
                return 'manager';
            } 

             // Check if the user is a manager
            $doctor =  $this->Doctor_model->getDoctorByEmail($email);
            if ($doctor) {
                return 'doctor';
            }

            // Check if the user is a regular user
            $user = $this->User_model->getUserByEmail($email);
            if ($user) {
                return 'user';
            }

            // If no role is determined, return false
            return false;
        }
        // Add this method to your controller

        private function saveResetToken($email, $token, $role)
        {
            // Save the token and its associated user in the database based on the role
            switch ($role) {
                case 'admin':
                    $this->Admin_model->saveResetToken($email, $token);
                    break;
                case 'manager':
                    $this->Manager_model->saveResetToken($email, $token);
                    break;
                case 'user':
                    $this->User_model->saveResetToken($email, $token);
                    break;
            }
        }
        // Add this method to your controller

        private function sendResetEmail($email, $token, $role)
        {
            // // Load the PHPMailer library
            // $this->load->library('phpmailer_lib');

            // // PHPMailer configuration
            // $mail = $this->phpmailer_lib->load();

            // $mail->isSMTP();
            // $mail->Host       = 'your_smtp_host';
            // $mail->SMTPAuth   = true;
            // $mail->Username   = 'your_smtp_username';
            // $mail->Password   = 'your_smtp_password';
            // $mail->SMTPSecure = 'tls';
            // $mail->Port       = 587;

            // $mail->setFrom('sender_email@example.com', 'Sender Name');
            // $mail->addAddress($email);

            // $mail->isHTML(true);
            // $mail->Subject = 'Password Reset';
            // $mail->Body    = $this->load->view('reset_email', ['token' => $token, 'role' => $role], true);

            // // Send the email
            // $mail->send();

                 $mail = new PHPMailer(true);
                  ob_start();
                ?>

        <html>
        <head>
            <style>
                /* CSS styles for the email content */
                body {
                    font-family: Arial, sans-serif;
                  
                }
                
                .container {
                    max-width: 600px;
                    margin: 0 auto;
                    padding: 20px;
                    background-color: #ffffff;
                }
                
                h1 {
                    font-size: 24px;
                    color: #333333;
                    margin-bottom: 20px;
                }
                
                p {
                    font-size: 16px;
                    color: #666666;
                    margin-bottom: 10px;
                }
                
                .cta-button {
                    display: inline-block;
                    padding: 10px 20px;
                    background-color: #337ab7;
                    color: #ffffff;
                    text-decoration: none;
                    border-radius: 5px;
                }
                
                .footer {
                    text-align: ;
                    margin-top: 20px;
                    padding: 10px;
                }
                
                .footer p {
                    font-size: 14px;
                    color: #999999;
                    margin-bottom: 5px;
                }
            </style>
        </head>
        <body style="background-color: ;">
            <div class="container" style="background-color: #F5F8FB; max-width: 600px; margin: 0 auto; padding: 20px;">
                <h1>Password Reset</h1>
               <p>Hello,</p>
                <p>Please click the following link to reset your password:</p>
                <p><a href="<?= base_url('Login/resetPassword/') . $role . '/' . $token ?>"  style="display: inline-block; padding: 10px 20px; background-color: #337ab7; color: #ffffff; text-decoration: none; border-radius: 5px;">Reset Password</a></p>

                <p>If you have any questions or need further assistance, feel free to contact us <a href="mailto:infoassisthealth@gmail.com">infoassisthealth@gmail.com</a>.</p>
                <!-- <p><a href="<?php echo base_url()?>" style="display: inline-block; padding: 10px 20px; background-color: #337ab7; color: #ffffff; text-decoration: none; border-radius: 5px;">Visit Our Website</a></p> -->

                 <div class="footer" >
                <!-- <p>Thank you,</p>
                <p>Assist Health</p> -->
                <p>Thank you,<br>
                   AssisHealth,<br>
                    #850,
                    3rd Floor,<br>
                    opposite Coffee Day,<br>
                    RMS Layout, Sahakar Nagar,<br> Bengaluru, Karnataka 560092.</p>
            </div>
            </div>
           
           
           
        </body>
        </html>

            <?php
            $message = ob_get_contents();
            ob_end_clean();
             
                try {
                    //Server settings
                    //$mail->SMTPDebug = 4;                      //Enable verbose debug output
                    $mail->isSMTP();                                            //Send using SMTP
                    $mail->Host = 'smtp.gmail.com';//'smtp.gmail.com';//Set the SMTP server to send through
                    $mail->SMTPAuth = true;                                   //Enable SMTP authentication
                    $mail->Username   = USERNAME;                     //SMTP username
                    $mail->Password   = PASSWORD;                                //SMTP password
                    $mail->SMTPSecure =  PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                    $mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                    //Recipients
                    $mail->setFrom(FROM,FROMNAME);
                    //$mail->addAddress('balusiva1299@gmail.com', "siva");     
                    $mail->addAddress($email); //$$name    
               
                    //Content
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject='Password Reset'; 
                    $mail->Body = $message;
                    //$mail->AltBody = $customer_message;

                    if ($mail->send()) {
                       
                    // echo json_encode(array('status'=>'success','message'=>'Register Successfully!!'));
                    
                    }else{
                        // echo json_encode(array('status'=>'error','message'=>'Error in sending Email.'));
                    }
                } catch (Exception $e) {
                  // echo json_encode(array('status'=>'error',"Message could not be sent. Mailer Error: {$mail->ErrorInfo}"));;
                }
        }

        // Add this method to your controller

        public function resetPassword($role, $token)
        {
            // Check if the token is valid for the given role
            $validToken = $this->isValidResetToken($role, $token);

            if ($validToken) {
                // Display the password reset form
                $this->load->view('Backend/reset_password', ['role' => $role, 'token' => $token]);
            } else {
                // Invalid token or role
              //  $this->load->view('Backend/reset_password');
              //  echo json_encode(array('status'=>'error','message'=>'Token Invalid.'));
                echo "<script> alert('Token Invalid ');  location.replace('".base_url()."login')</script >";
            }
        }
        // Add this method to your controller

        private function isValidResetToken($role, $token)
        {
            // Validate the reset token based on the role
            switch ($role) {
                case 'admin':
                    return $this->Admin_model->isValidResetToken($token);
                case 'manager':
                    return $this->Manager_model->isValidResetToken($token);
                case 'user':
                    return $this->User_model->isValidResetToken($token);
            }

            return false;
        }

       
        // Add this method to your controller

        public function updatePassword()
        {
            $this->load->library('form_validation');

            // Set validation rules for the password fields
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
            $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[password]');

            if ($this->form_validation->run() == false) {
                // Display the password reset form with validation errors
               // $this->load->view('reset_password', ['role' => $role, 'token' => $token, 'error' => 'Invalid password']);
                 echo json_encode(array('status'=>'error','message'=>'Invalid password'));
            } else {
                // Get the submitted password and confirm password
                $password = $this->input->post('password');
                $confirmPassword = $this->input->post('confirm_password');
                $role = $this->input->post('role');
                $token = $this->input->post('token');

                // Update the user's password based on the role and token
                $result = $this->updateUserPassword($role, $token, $password);

                if ($result) {
                    // Password updated successfully
                    //$this->load->view('reset_password_success');
                     echo json_encode(array('status'=>'success','message'=>'Password Updated Successfully'));
                } else {
                    // Invalid token or role
                   // $this->load->view('reset_password_error');
                     echo json_encode(array('status'=>'error','message'=>'Invalid Token or Role'));
                }
            }
        }

     // Add this method to your controller

        private function updateUserPassword($role, $token, $password)
        {
            // Update the user's password based on the role and token
            switch ($role) {
                case 'admin':
                    return $this->Admin_model->updatePasswordByToken($token, $password);
                case 'manager':
                    return $this->Manager_model->updatePasswordByToken($token, $password);
                case 'user':
                    return $this->User_model->updatePasswordByToken($token, $password);
            }

            return false;
        }
      

      //clear token

         public function cleartoken()
        {
          
                $role = $this->input->post('role');
                $token = $this->input->post('token');

                // Update the user's password based on the role and token
                $result = $this->removetoken($role, $token);

                if ($result) {
                    // Password updated successfully
                    //$this->load->view('reset_password_success');
                     echo json_encode(array('status'=>'success'));
                } else {
                    // Invalid token or role
                   // $this->load->view('reset_password_error');
                     echo json_encode(array('status'=>'error','message'=>'Invalid Token or Role'));
                }
            
        }

            private function removetoken($role, $token)
        {
            // Update the user's password based on the role and token
            switch ($role) {
                case 'admin':
                    return $this->Admin_model->removetokenbyadmin($token);
                case 'manager':
                    return $this->Admin_model->removetokenbymanager($token);
                case 'user':
                    return $this->Admin_model->removetokenbyuser($token);
            }

            return false;
        }


      

    public function get_country_codes() {
        // Fetch only the country code and country name from the database
        $this->db->select('code, name');
        $result = $this->db->get('countries')->result_array();

        // Return the result as a JSON response.
        echo json_encode($result);
    }



     // ---------------------------------------- new  December 2023----------------------------------------------------
     // ---------------------------------------- Save  member         ----------------------------------------------------

        public function SaveNewMember() {

        $email = $this->input->post('email');
        //$password = $this->input->post('password');
        $number = $this->input->post('number');

        if ($this->User_model->is_email_duplicate($email) && $this->User_model->is_number_duplicate($number)) {
        $response = array(
        'status' => 'error',
        'message' => 'Email address and number already exist'
        );
        // echo json_encode($response);
        } elseif ($this->User_model->is_email_duplicate($email)) {

          $response = array(
           'status' => 'error',
             'message' => 'Email address already exists'
        );
        } elseif ($this->User_model->is_number_duplicate($number)) {

          $response = array(
           'status' => 'error',
           'message' => 'Number already exists'
        );
        } else {
             

        $parentData = array(
            'name'    => $this->input->post('uname'),
            'email'   => $this->input->post('email'),
            'number'  => $this->input->post('number'),
            'dob'     => $this->input->post('dob'),
            'gender'  => $this->input->post('gender'),
            'address' => $this->input->post('address')
        );

        // Save Parent Data
        $parentId = $this->Admin_model->saveNewMember($parentData);

        // Save Sub Profiles
        $memberNames = $this->input->post('mname');
        $memberDobs = $this->input->post('mdob');
        $memberGenders = $this->input->post('mgender');
        $relationships = $this->input->post('relationship');

        foreach ($memberNames as $key => $name) {
            $subProfileData = array(
                'name'           => $name,
                'dob'            => $memberDobs[$key],
                'gender'         => $memberGenders[$key],
               // 'relationship'   => $relationships[$key],
                'isSubprofile'   => 'Yes',
                'parent_member'  => $parentId,
                'member_status'  => 1
            );

            $this->Admin_model->saveNewMember($subProfileData);
        }

        $response = array('status' => 'success', 'message' => 'Data saved successfully.');
        echo json_encode($response);
        }

    }

}
