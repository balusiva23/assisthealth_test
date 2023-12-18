<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require FCPATH .'assets/phpmailer/phpmailer/src/Exception.php';
require FCPATH .'assets/phpmailer/phpmailer/src/PHPMailer.php';
require FCPATH .'assets/phpmailer/phpmailer/src/SMTP.php';

class Admin extends CI_Controller {

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
	function __construct() {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->model('Manager_model');
        $this->load->model('User_model');
        $this->load->model('Doctor_model');
       $this->getAdminDetails();
    }
 /* Get admin details */
    private function getAdminDetails() {
        $this->checkLogin();
        $adminId = $this->session->userdata('user_login_id');
        $adminDetails['admin_data'] = $this->Admin_model->getAdminDetails($adminId);
        $this->load->vars($adminDetails); // Make $adminDetails available in all views
    }


    public function index()
	{
	    $this->checkLogin(); // Add this line to check login
	  
	    $this->load->view('Backend/admin/ad-main-page');
	}

	public function Add_Navigator()
	{
	    $this->checkLogin(); // Add this line to check login
	    
	    $this->load->view('Backend/admin/ad-add-nav');
	}

	public function All_Navigators()
	{
	    $this->checkLogin(); // Add this line to check login
	    $navigators = $this->Admin_model->getNavigators();
        $data['navigators'] = $navigators;
      
	    $this->load->view('Backend/admin/ad-all-navigators',$data);
	}

		public function Add_Member()
	{
		$this->checkLogin();
		$data['allmembers'] = $this->Manager_model->getAllMembers();
		$this->load->view('Backend/admin/ad-add-member',$data);
	}
	public function All_Members()
	{
		$this->checkLogin();
		$data['members'] = $this->Manager_model->getAllMemberslist();
		$this->load->view('Backend/admin/ad-all-members',$data);
	}
	public function Sub_Profile()
	{
		$this->checkLogin();
		$id = $this->input->get('id');
		$data['members'] = $this->Manager_model->getSubprofile($id);
		
		$this->load->view('Backend/admin/sub-profile',$data);
	}
	public function  Assign_Navigators()
	{
		$this->checkLogin();
		//$data['members'] = $this->Manager_model->getAllMembers();
		$data['members'] = $this->Manager_model->getAllMemberslist();
		
		$data['navigators'] = $this->Manager_model->getAllNavigators();
		$this->load->view('Backend/admin/ad-assign-navigators',$data);
	}
	//new sub profile
	public function  Sub_Profile_Assign_Navigators()
	{
		$this->checkLogin();
		$id = $this->input->get('id');
		$data['members'] = $this->Manager_model->getSubprofile($id);
		$data['navigators'] = $this->Manager_model->getAllNavigators();
		$this->load->view('Backend/admin/subprofile/subprofile-assign-navigators',$data);
	}

	public function Completed_Appointment()
	{
	    $this->checkLogin(); // Add this line to check login
	    $data['members'] = $this->Manager_model->getcompletedMembers();
	      $data['submembers'] = $this->Manager_model->getSubprofilecompletedMembers();
	    $this->load->view('Backend/admin/ad-completed-appointment',$data);
	}

	public function Ongoing_Appointment()
	{
	    $this->checkLogin(); // Add this line to check login
	    $data['members'] = $this->Manager_model->getOngoingMembers();
	        $data['submembers'] = $this->Manager_model->getSubprofileOngoingMembers();
	    $this->load->view('Backend/admin/ad-ongoing-appointment',$data);
	}
	public function Pending_Appointment()
	{
	    $this->checkLogin(); // Add this line to check login
	    $data['members'] = $this->Manager_model->getPendingMembers();
	    $data['submembers'] = $this->Manager_model->getSubprofilePendingMembers();
	    $this->load->view('Backend/admin/ad-pending-appointment',$data);
	}


	 //booking main page
	public function View_members()
	{
		$this->checkLogin();
		  $id = $this->session->userdata('user_login_id');
		//$data['members'] = $this->Manager_model->getAllMembers();
		$data['members'] = $this->Manager_model->getAllMemberslist();
		$this->load->view('Backend/admin/ad-book-appointment',$data);
	}
	public function Subprofile_View_members()
	{
		$this->checkLogin();
		$id = $this->input->get('id');
		$data['members'] = $this->Manager_model->getSubprofile($id);
		$this->load->view('Backend/admin/subprofile/subprofile-book-appointment',$data);
	}
	// specific appointment view
	public function View_Appointments()
	{
		$this->checkLogin();
		 $id = $this->input->get('id');
		$data['members'] = $this->Manager_model->getAppointmentsMembersbyID($id);
	
		$this->load->view('Backend/admin/ad-view-booking',$data);
	}
	// add booking
	public function Book_Appointment()
	{
		$this->checkLogin();
		$id = $this->input->get('id');
			$data['user_data'] = $this->Manager_model->getUserDetails($id);
		$this->load->view('Backend/admin/ad-add-appointment',$data);
	}



    //check login
	// private function checkLogin()
	// {
	//     if (!$this->session->userdata('user_login_access')) {
	//         redirect(base_url() . 'login'); // Redirect to the login page if not logged in
	//     }
	// }
	private function checkLogin()
	{
	    if (!$this->session->userdata('user_login_access')) {
	        redirect(base_url() . 'login'); // Redirect to the login page if not logged in
	    } else {
	        // Get the requested URL and user's role from the session
	        $requestedUrl = $this->uri->segment(1); // Assuming the role controller is the first segment of the URL
	        $role = $this->session->userdata('url');

	        // Remove the trailing slash from the role if present
              $role = rtrim($role, '/');

                // Convert both the requested URL and the role to lowercase for comparison
		        $requestedUrl = strtolower($requestedUrl);
		        $role = strtolower($role);

	        // Check if the requested URL matches the user's role
	        if ($requestedUrl !== $role) {
	            // Display an error message or take appropriate action
	            echo "<script>alert('Access denied. You do not have permission to access this page')</script>";
	            // Or you can redirect to a specific error page
	             redirect(base_url() . $role);;
	            exit; // Stop further execution
	        }
	    }
	}




	    /*Logout method*/
    function logout() {
        $this->session->sess_destroy();
        $this->session->set_flashdata('feedback', 'logged_out');
        redirect(base_url().'login');
    }

	 //save manager

	  public function Save_manager()
	{
	    if ($this->session->userdata('user_login_access') != False) {
	        $name = $this->input->post('firstname');
	        $email = $this->input->post('email');
	        $gender = $this->input->post('gender');
	        $mobileNo = $this->input->post('number');
	        $languageSpoken = $this->input->post('language');
	      //  print_r($languageSpoken); die();
	        $intro = $this->input->post('address');
	        $password = $this->input->post('password');
             // Hash the password
           $hashed_password = password_hash($password, PASSWORD_DEFAULT);
	        $this->load->library('form_validation');
	        $this->form_validation->set_error_delimiters();
	        $this->form_validation->set_rules('firstname', 'Name', 'trim|required|max_length[255]|xss_clean');
	        $this->form_validation->set_rules('email', 'Email ID', 'trim|required|max_length[255]|valid_email|xss_clean');
	        // Add more validation rules as needed for other fields

	        if ($this->form_validation->run() == FALSE) {
	            echo validation_errors();
	            // Handle validation errors
	        } else {
	        	// Check if the name already exists in the manager table
		        $checkdata = array('email' => $email, 'isActive' => 1);
		        if (check_field_exists($checkdata, 'manager')) {
		            echo json_encode(array('status' => 'error', 'message' => '<p>This Email is already exists</p>'));
		        } else {

		     if($_FILES['file_url']['name']){
            $file_name = $_FILES['file_url']['name'];
			$fileSize = $_FILES["file_url"]["size"]/1024;
			$fileType = $_FILES["file_url"]["type"];
			$new_file_name='';
            $new_file_name .= $file_name;

            $config = array(
                'file_name' => $new_file_name,
                'upload_path' => "./assets/uploads/manager_profile",
                'allowed_types' => "gif|jpg|png|jpeg|pdf|doc|docx",
                'overwrite' => False,
                'max_size' => "50720000"
            );
            //create directory
              if(!is_dir($config['upload_path'])) mkdir($config['upload_path'], 0777, TRUE);
    
            $this->load->library('Upload', $config);
            $this->upload->initialize($config);                
            if (!$this->upload->do_upload('file_url')) {
                echo $this->upload->display_errors();
                #redirect("notice/All_notice");
			}
   
			else {

                $path = $this->upload->data();
                $img_url = $path['file_name'];
	            $data = array(
	                'name' => $name,
	                'email' => $email,
	                'gender' => $gender,
	                'mobile_no' => $mobileNo,
	                'profile_picture'=>$img_url,
	                'language_spoken' => implode(',', $languageSpoken),
	                'intro' => $intro,
	                'password' => $hashed_password
	            );
	            
	        }
	      }else{

	      	 $data = array(
	                'name' => $name,
	                'email' => $email,
	                'gender' => $gender,
	                'mobile_no' => $mobileNo,
	              
	                'language_spoken' => implode(',', $languageSpoken),
	                'intro' => $intro,
	                'password' => $hashed_password
	            );
	      	 

	      }

	       //print_r($data); die();
	            // Save the data to the manager table using your model function
	            $success = $this->Admin_model->saveManagerData($data);

	            if ($success) {
	            	$number = $mobileNo;
	            	$this->send_mail_manager($name,$email,$number,$password);
	                echo json_encode(array('status' => 'success', 'message' =>'Manager saved successfully'));
	            } else {
	                echo json_encode(array('status' => 'error', 'message' => 'Failed to save manager'));
	            }
	     }
	    }
	    } else {
	        redirect(base_url(), 'refresh');
	    }
	}
	 public function Update_manager()
		{
		    if ($this->session->userdata('user_login_access') != False) {
		    	$id = $this->input->post('id');
		        $name = $this->input->post('firstname');
		        $email = $this->input->post('email');
		        $gender = $this->input->post('gender');
		        $mobileNo = $this->input->post('number');
		        $languageSpoken = $this->input->post('language');
		      //  print_r($languageSpoken); die();
		        $intro = $this->input->post('address');
		        $password = $this->input->post('password');
	             // Hash the password
	           $hashed_password = password_hash($password, PASSWORD_DEFAULT);
		        $this->load->library('form_validation');
		        $this->form_validation->set_error_delimiters();
		        $this->form_validation->set_rules('firstname', 'Name', 'trim|required|max_length[255]|xss_clean');
		        $this->form_validation->set_rules('email', 'Email ID', 'trim|required|max_length[255]|valid_email|xss_clean');
		        // Add more validation rules as needed for other fields

		        if ($this->form_validation->run() == FALSE) {
		            echo validation_errors();
		            // Handle validation errors
		        } else {
		       

			     if($_FILES['file_url']['name']){
	            $file_name = $_FILES['file_url']['name'];
				$fileSize = $_FILES["file_url"]["size"]/1024;
				$fileType = $_FILES["file_url"]["type"];
				$new_file_name='';
	            $new_file_name .= $file_name;

	            $config = array(
	                'file_name' => $new_file_name,
	                'upload_path' => "./assets/uploads/manager_profile",
	                'allowed_types' => "gif|jpg|png|jpeg|pdf|doc|docx",
	                'overwrite' => False,
	                'max_size' => "50720000"
	            );
	            //create directory
	              if(!is_dir($config['upload_path'])) mkdir($config['upload_path'], 0777, TRUE);
	    
	            $this->load->library('Upload', $config);
	            $this->upload->initialize($config);                
	            if (!$this->upload->do_upload('file_url')) {
	                echo $this->upload->display_errors();
	                #redirect("notice/All_notice");
				}
	   
				else {

	                $path = $this->upload->data();
	                $img_url = $path['file_name'];
		            $data = array(
		                'name' => $name,
		                'email' => $email,
		                'gender' => $gender,
		                'mobile_no' => $mobileNo,
		                'profile_picture'=>$img_url,
		                'language_spoken' => implode(',', $languageSpoken),
		                'intro' => $intro,
		               // 'password' => $hashed_password
		            );
		              if ($password) {
				    $data["password"] = $hashed_password;
				}

		            
		        }
		      }else{

		      	 $data = array(
		                'name' => $name,
		                'email' => $email,
		                'gender' => $gender,
		                'mobile_no' => $mobileNo,
		               
		                'language_spoken' => implode(',', $languageSpoken),
		                'intro' => $intro,
		                // 'password' => $hashed_password
		            );
		      	   if ($password) {
				    $data["password"] = $hashed_password;
				}

		      }

		      // Save the data to the manager table using your model function
		            $success = $this->Admin_model->UpdateManagerData($data,$id);

		            if ($success) {
		                
		                  $data["id"] = $id;
		                echo json_encode(array('status' => 'success', 'message' => 'Manager updated successfully','member'=>$data));
		            } else {
		                echo json_encode(array('status' => 'error', 'message' => 'Failed to update manager'));
		            }


		    // }
		    }
		    } else {
		        redirect(base_url(), 'refresh');
		    }
		}
 //member - book appointment
	    public function Book_member_appoinment()
		{
			$this->checkLogin();
			if ($this->session->userdata('user_login_access') != False) {
	             //die();
			   
			    	$mid = $this->input->post('mid');
			    	$name = $this->input->post('name');
			    	$member_id = $this->input->post('member_id');
			    
					$medical_conditions = $this->input->post('medical_conditions');
					$medications = $this->input->post('medications');
					$surgical_history = $this->input->post('surgical_history');
					$family_medical_history = $this->input->post('family_medical_history');
					$immunizations = $this->input->post('immunizations');
					$lifestyle_and_habits = $this->input->post('lifestyle_and_habits');
					$mental_health = $this->input->post('mental_health');
				
					$exercise_habits = $this->input->post('exercise_habits');
					$diet_preferences = $this->input->post('diet_preferences');
					$additional_information = $this->input->post('additional_information');

					$date = $this->input->post('date');
					$time = date('H:i', strtotime($this->input->post('time')));
				    $services = $this->input->post('services');
				      $appointmentDate = $this->input->post('appointment_date');
				   	$appointmentTime =  $this->input->post('appointment_time');
				
			       $prefix = 'ID_';
                   $uniqueNumber = uniqid($prefix);

                    // $checkdata = array('appointment_date' => $appointmentDate, 'isActive' => 1,'mid'=>$mid);
			        // if (check_field_exists($checkdata, 'appointment')) {
			        //     echo json_encode(array('status' => 'error', 'message' => '<p>Already applied this date</p>'));
			        //     return;
			        // } 
				        
			      
			    	$data = array(
						   
						    'mid' => $mid,
						    'services' => $services,
						    'additional_information' => $additional_information,
						    'Reference_id' =>$uniqueNumber,
						    'appointment_date' =>$appointmentDate,
						    'appointment_time' =>$appointmentTime,
						   
						);

			      // Save the data to the manager table using your model function
			            $success = $this->User_model->BookAppointmentData($data);

			            if ($success) {

				        /*Notification*/

		                // Retrieve data from the employee table
		                $admin = $this->Admin_model->getAllAdmin();
		                // Insert data into the notification table for each employee
		                $filetitle = 'New Booking: <span class="txt-name">'.$name .'-'.$member_id.'</span>.';
		                foreach ($admin as $data) {
		                $data = array(
		                'admin_id' => $data->id,
		                'message' => $filetitle,
		                'created_at' => date('Y-m-d H:i:s'),
		                'status' => 'unread',
		                'icon' => 'fa fa-comments-o',
		                'color' => 'blue-bgcolor',
		                'url' => 'Admin/View_Appointments?id='.$mid.'',
		                );
		                $this->db->insert('admin_notifications', $data);
		                }
			                
			            echo json_encode(array('status' => 'success', 'message' => 'Appointment added successfully'));
			            } else {
			            	
			                echo json_encode(array('status' => 'error', 'message' => 'Failed to save'));
			            }

			
			    } else {
			        redirect(base_url(), 'refresh');
			    }
		}

//ongoing status update
      public function update_ongoing_member()
	{
		$this->checkLogin();
		if ($this->session->userdata('user_login_access') != False) {
             //die();
		    	$id = $this->input->post('id');
		    $firstName = $this->input->post('name');
			$address = $this->input->post('address');
			$mobileNumber = $this->input->post('number');
			$appointment = $this->input->post('appointment');
			$services = $this->input->post('services');
			$appointmentDate = $this->input->post('appointment_date');
			$appointmentTime = date('H:i', strtotime($this->input->post('appointment_time'))); //$this->input->post('appointment_time');
			$comments = $this->input->post('comments');
			$paymentStatus = $this->input->post('payment_status');
			$appointmentStatus = $this->input->post('appointment_status');


		        $this->load->library('form_validation');
		        $this->form_validation->set_error_delimiters();
		        //$this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[255]|xss_clean');
		 


				    $data = array(
				    
				    'services' => $services,
				    'appointment_date' => $appointmentDate,
				    'appointment_time' => $appointmentTime,
				    'comments' => $comments,
				    'payment_status' => $paymentStatus,
				    'appointment_status' => $appointmentStatus
				);

		      
		     

		      // Save the data to the manager table using your model function
		            $success = $this->Manager_model->UpdateMemberData($data,$id);

		            if ($success) {
		              $data["id"] = $id;
		                echo json_encode(array('status' => 'success', 'message' => 'Data Added successfully','member'=>$data));
		            } else {
		            	
		                echo json_encode(array('status' => 'error', 'message' => 'Failed to update data'));
		            }

		  
		    } else {
		        redirect(base_url(), 'refresh');
		    }
	}
	  public function update_completed_member_data()
	{
		$this->checkLogin();
		if ($this->session->userdata('user_login_access') != False) {
             //die();
		    $id = $this->input->post('id');
		    $firstName = $this->input->post('name');
			$address = $this->input->post('address');
			$mobileNumber = $this->input->post('number');
			$appointment = $this->input->post('appointment');
			$appointmentDate = $this->input->post('appointment_date');
			$appointmentTime = $this->input->post('appointment_time');
			$comments = $this->input->post('comments');
			$paymentStatus = $this->input->post('payment_status');
			$appointmentStatus = $this->input->post('appointment_status');
			$services = $this->input->post('services');

		        $this->load->library('form_validation');
		        $this->form_validation->set_error_delimiters();
		        $this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[255]|xss_clean');
		      
		        if ($this->form_validation->run() == FALSE) {
		            echo validation_errors();
		            // Handle validation errors
		        } else {
		        
		         // if($password){

		         // 	$data["password"] = $hashed_password;
		         // }
 
			     if($_FILES['file_url']['name']){
	            $file_name = $_FILES['file_url']['name'];
				$fileSize = $_FILES["file_url"]["size"]/1024;
				$fileType = $_FILES["file_url"]["type"];
				$new_file_name='';
	            $new_file_name .= $file_name;

	            $config = array(
	                'file_name' => $new_file_name,
	                'upload_path' => "./assets/uploads/completed_invoice",
	                'allowed_types' => "gif|jpg|png|jpeg|pdf|doc|docx",
	                'overwrite' => False,
	                'max_size' => "50720000"
	            );
	            //create directory
	              if(!is_dir($config['upload_path'])) mkdir($config['upload_path'], 0777, TRUE);
	    
	            $this->load->library('Upload', $config);
	            $this->upload->initialize($config);                
	            if (!$this->upload->do_upload('file_url')) {
	                echo $this->upload->display_errors();
	                #redirect("notice/All_notice");
				}

	   
				else {

	                $path = $this->upload->data();
	                $img_url = $path['file_name'];
		              $data = array(
				
				    'services' => $services,
				 
				    'appointment_date' => $appointmentDate,
				    'appointment_time' => $appointmentTime,
				    'comments' => $comments,
				    'payment_status' => $paymentStatus,
				    'appointment_status' => $appointmentStatus,
				    'invoice'=>$img_url 
				);
          
		            
		        }
		      }else{

		         $data = array(
				   
				    'services' => $services,
				   
				    'appointment_date' => $appointmentDate,
				    'appointment_time' => $appointmentTime,
				    'comments' => $comments,
				    'payment_status' => $paymentStatus,
				    'appointment_status' => $appointmentStatus,
				  
				);
		      
		      }
               
              // print_r($data);die();

		      // Save the data to the manager table using your model function
		            $success = $this->Manager_model->UpdateMemberData($data,$id);

		            if ($success) {
		               $data["id"] = $id;
		                echo json_encode(array('status' => 'success', 'message' => 'Data Added successfully','member'=>$data));
		            } else {
		            	
		                echo json_encode(array('status' => 'error', 'message' => 'Failed to update data'));
		            }

		    }
		   // }
		    } else {
		        redirect(base_url(), 'refresh');
		    }
	}

     //appointment edit modal
   public function getMemberAppointmentByID() {
        // Get the ID parameter from the AJAX request
        $id = $this->input->get('id'); //echo $id;
        $member = $this->Manager_model->getMemberAppointmentByID($id);
       // print_r($member); die();
        // Prepare the response data as an array
       $response = array(
	    'id' => $member->id,
	    'member_id' => $member->member_id,
	    'name' => $member->name,
	    'email' => $member->email,
	    'password' => $member->password,
	    'gender' => $member->gender,
	    'number' => $member->number,
	    'emergency_contact_name' => $member->emergency_contact_name,
	    'emergency_contact_relationship' => $member->emergency_contact_relationship,
	    'emergency_contact_phone' => $member->emergency_contact_phone,
	    'weight' => $member->weight,
	    'height' => $member->height,
	  
	    'employment_status' => $member->employment_status,
	    'education_level' => $member->education_level,
	    'marital_status' => $member->marital_status,
	   
	    'additional_information' => $member->additional_information,
	    'address' => $member->address,
	    'profile' => $member->profile,
	    'appointment' => $member->appointment,
	    'appointment_date' => $member->appointment_date,
	    'appointment_time' => $member->appointment_time,
	    'comments' => $member->comments,
	    'payment_status' => $member->payment_status,
	    'appointment_status' => $member->appointment_status,
	    	    'services' => $member->services
	);

        
        // Send the response as JSON
        echo json_encode($response);
    }
    //update modal get data ongoing
   public function getMemberPendingByID() {
        // Get the ID parameter from the AJAX request
        $id = $this->input->get('id');//echo $id;
        //$member = $this->Manager_model->getMemberByID($id);
        $member = $this->Manager_model->getMemberPendingByID($id);
      //  print_r($member); die();
        // Prepare the response data as an array
       $response = array(
	    'id' => $member->id,
	    'member_id' => $member->member_id,
	    'name' => $member->name,
	    'email' => $member->email,
	    'password' => $member->password,
	    'gender' => $member->gender,
	    'number' => $member->number,
	    'emergency_contact_name' => $member->emergency_contact_name,
	    'emergency_contact_relationship' => $member->emergency_contact_relationship,
	    'emergency_contact_phone' => $member->emergency_contact_phone,
	    'weight' => $member->weight,
	    'height' => $member->height,
	   'employment_status' => $member->employment_status,
	    'education_level' => $member->education_level,
	    'marital_status' => $member->marital_status,
	    'additional_information' => $member->additional_information,
	    'address' => $member->address,
	    'profile' => $member->profile,
	    'appointment' => $member->appointment,
	    'appointment_date' => $member->appointment_date,
	    'appointment_time' => $member->appointment_time,
	    'comments' => $member->comments,
	    'payment_status' => $member->payment_status,
	    'appointment_status' => $member->appointment_status,
	    'services' => $member->services,
	    'doctor' => $member->doctor,
       
	);

        
        // Send the response as JSON
        echo json_encode($response);
    }    
     //update modal get data ongoing
   public function getMemberOngoingByID() {
        // Get the ID parameter from the AJAX request
        $id = $this->input->get('id');//echo $id;
        //$member = $this->Manager_model->getMemberByID($id);
        $member = $this->Manager_model->getMemberOngoingByID($id);
      //  print_r($member); die();
        // Prepare the response data as an array
       $response = array(
	    'id' => $member->id,
	    'member_id' => $member->member_id,
	    'name' => $member->name,
	    'email' => $member->email,
	    'password' => $member->password,
	    'gender' => $member->gender,
	    'number' => $member->number,
	    'emergency_contact_name' => $member->emergency_contact_name,
	    'emergency_contact_relationship' => $member->emergency_contact_relationship,
	    'emergency_contact_phone' => $member->emergency_contact_phone,
	    'weight' => $member->weight,
	    'height' => $member->height,
	
	    'employment_status' => $member->employment_status,
	    'education_level' => $member->education_level,
	    'marital_status' => $member->marital_status,
	    'additional_information' => $member->additional_information,
	    'address' => $member->address,
	    'profile' => $member->profile,
	    'appointment' => $member->appointment,
	    'appointment_date' => $member->appointment_date,
	    'appointment_time' => $member->appointment_time,
	    'comments' => $member->comments,
	    'payment_status' => $member->payment_status,
	    'appointment_status' => $member->appointment_status,
	    'services' => $member->services
	);

        
        // Send the response as JSON
        echo json_encode($response);
    } 
    //update modal get data completed
   public function getMemberCompletedByID() {
     
        $id = $this->input->get('id');//echo $id;

        $member = $this->Manager_model->getMemberCompletedByID($id);
        
       $response = array(
	    'id' => $member->id,
	    'member_id' => $member->member_id,
	    'name' => $member->name,
	    'email' => $member->email,
	    'password' => $member->password,
	    'gender' => $member->gender,
	    'number' => $member->number,
	    'emergency_contact_name' => $member->emergency_contact_name,
	    'emergency_contact_relationship' => $member->emergency_contact_relationship,
	    'emergency_contact_phone' => $member->emergency_contact_phone,
	    'weight' => $member->weight,
	    'height' => $member->height,
	 
	    'employment_status' => $member->employment_status,
	    'education_level' => $member->education_level,
	    'marital_status' => $member->marital_status,
	 
	    'additional_information' => $member->additional_information,
	    'address' => $member->address,
	    'profile' => $member->profile,
	    'appointment' => $member->appointment,
	    'appointment_date' => $member->appointment_date,
	    'appointment_time' => $member->appointment_time,
	    'comments' => $member->comments,
	    'payment_status' => $member->payment_status,
	    'appointment_status' => $member->appointment_status,
	    'services' => $member->services
	);

        
        // Send the response as JSON
        echo json_encode($response);
    }
    
   //Member delete
     public function Memberdelete(){
        if($this->session->userdata('user_login_access') != False) { 
            $id = $this->input->post('id');
            $result_del = $this->Manager_model->Memberdelete($id);//
         
          if($result_del){
                echo json_encode(array('status'=>'success','message'=> 'Deleted Successfully'));
               
            }else{
                 echo json_encode(array('status'=>'failed','message'=> 'Not deleted'));
             
            }
           
            }
        else{
            redirect(base_url() , 'refresh');
        }       
     } 
       public function AllMemberdelete(){
        if($this->session->userdata('user_login_access') != False) { 
            $id = $this->input->post('id');
            $result_del = $this->Manager_model->AllMemberdelete($id);//
          if($result_del){
                echo json_encode(array('status'=>'success','message'=> 'Deleted Successfully'));
               
            }else{
                 echo json_encode(array('status'=>'failed','message'=> 'Not deleted'));
             
            }
           
            }
        else{
            redirect(base_url() , 'refresh');
        }       
     }
    
   //update modal get data
   public function getNavigatorByID() {
        // Get the ID parameter from the AJAX request
        $id = $this->input->get('id');
        $navigator = $this->Admin_model->getNavigatorByID($id);
        
        // Prepare the response data as an array
        $response = array(
            'id' => $navigator->id,
            'name' => $navigator->name,
            'email' => $navigator->email,
            'gender' => $navigator->gender,
            'mobile_no' => $navigator->mobile_no,
            'intro' => $navigator->intro,
            'language_spoken' => $navigator->language_spoken,
            'profile_picture' => $navigator->profile_picture
        );
        
        // Send the response as JSON
        echo json_encode($response);
    }

    //Manager delete
     public function Managerdelete(){
        if($this->session->userdata('user_login_access') != False) { 
            $id = $this->input->post('id');
            $result_del = $this->Admin_model->Managerdelete($id);//
          if($result_del){
                echo json_encode(array('status'=>'success','message'=> 'Deleted Successfully'));
               
            }else{
                 echo json_encode(array('status'=>'failed','message'=> 'Not deleted'));
             
            }
           
            }
        else{
            redirect(base_url() , 'refresh');
        }       
     }

            //member - user
    public function Add_member_data()
	{
		$this->checkLogin();
		if ($this->session->userdata('user_login_access') != False) {
             //die();
		    	$id = $this->input->post('id');
		    	$name = $this->input->post('name');
				$email = $this->input->post('email');
				$gender = $this->input->post('gender');
				$number = $this->input->post('number');
				$emergency_contact_name = $this->input->post('emergency_contact_name');
				$emergency_contact_relationship = $this->input->post('emergency_contact_relationship');
				$emergency_contact_phone = $this->input->post('emergency_contact_phone');
				$weight = $this->input->post('weight');
				$height = $this->input->post('height');
				$medical_conditions = $this->input->post('medical_conditions');
				$medications = $this->input->post('medications');
				$surgical_history = $this->input->post('surgical_history');
				$family_medical_history = $this->input->post('family_medical_history');
				$immunizations = $this->input->post('immunizations');
				$lifestyle_and_habits = $this->input->post('lifestyle_and_habits');
				$mental_health = $this->input->post('mental_health');
				$employment_status = $this->input->post('employment_status');
				$education_level = $this->input->post('education_level');
				$marital_status = $this->input->post('marital_status');
				$exercise_habits = $this->input->post('exercise_habits');
				$diet_preferences = $this->input->post('diet_preferences');
				$additional_information = $this->input->post('additional_information');
				$address = $this->input->post('address');
				//new
				$code = $this->input->post('code');
				$dob = $this->input->post('dob');
				$bloodgroup = $this->input->post('blood-group');
				$membership = $this->input->post('membership');
				$parent_member = $this->input->post('parent_member');
				if($this->input->post('subprofile_checkbox')){

						//getMemberByID
						 $member = $this->Manager_model->getMemberByID($parent_member);
						 $nav = $member->navigator;
						 $doc = $member->doctor;
				 }



		        $this->load->library('form_validation');
		        $this->form_validation->set_error_delimiters();
		        $this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[255]|xss_clean');
		        //$this->form_validation->set_rules('email', 'Email ID', 'trim|required|max_length[255]|valid_email|xss_clean');

		        // Add more validation rules as needed for other fields

                // Generate the new member ID
                $newMemberId = $this->generateUniqueMemberId();
                //password
                 // $password = $number;
                  $password = $this->input->post('password');
                  $hashed_password = password_hash($password, PASSWORD_DEFAULT);

		        if ($this->form_validation->run() == FALSE) {
		            echo validation_errors();
		            // Handle validation errors
		        } else {
		      
              
	            if ($this->User_model->is_email_duplicate($email) && $this->User_model->is_number_duplicate($number) && !$this->input->post('subprofile_checkbox')) {
	            $response = array(
	                'status' => 'error',
	                'message' => 'Email address and number already exist'
	            );
	            echo json_encode($response);
	           } elseif ($this->User_model->is_email_duplicate($email) && !$this->input->post('subprofile_checkbox')) {
		          
		              echo json_encode(array('status' => 'error', 'message' => 'Email address already exists'));
		         } elseif ($this->User_model->is_number_duplicate($number) && !$this->input->post('subprofile_checkbox')) {
	             
	                 echo json_encode(array('status' => 'error', 'message' => 'Number already exists'));
	            } else {
					
			    if($_FILES['file_url']['name']){
	            $file_name = $_FILES['file_url']['name'];
				$fileSize = $_FILES["file_url"]["size"]/1024;
				$fileType = $_FILES["file_url"]["type"];
				$new_file_name='';
	            $new_file_name .= $file_name;

	            $config = array(
	                'file_name' => $new_file_name,
	                'upload_path' => "./assets/uploads/users_profile",
	                'allowed_types' => "gif|jpg|png|jpeg|pdf|doc|docx",
	                'overwrite' => False,
	                'max_size' => "50720000"
	            );
	            //create directory
	              if(!is_dir($config['upload_path'])) mkdir($config['upload_path'], 0777, TRUE);
	    
	            $this->load->library('Upload', $config);
	            $this->upload->initialize($config);                
	            if (!$this->upload->do_upload('file_url')) {
	                echo $this->upload->display_errors();
	                #redirect("notice/All_notice");
				}
	   
				else {
          
	                $path = $this->upload->data();
	                $img_url = $path['file_name'];
					if($this->input->post('subprofile_checkbox')){

						//getMemberByID
						 $member = $this->Manager_model->getMemberByID($id);
						$data = array(
							'name' => $name,
						
							'gender' => $gender,
						
							'emergency_contact_name' => $emergency_contact_name,
							'emergency_contact_relationship' => $emergency_contact_relationship,
							'emergency_contact_phone' => $emergency_contact_phone,
							'weight' => $weight,
							'height' => $height,
							
							'employment_status' => $employment_status,
							'education_level' => $education_level,
							'marital_status' => $marital_status,
							
							'additional_information' => $additional_information,
							'address' => $address,
							'profile' => $img_url,
							'member_id' =>$newMemberId,
								'code' =>$code,
								'dob' =>$dob,
							'bloodgroup' =>$bloodgroup,
		
							'membership' =>$membership,
							'member_status'=>'1',
							'isSubprofile'=>"Yes",//new
							'parent_member'=> $parent_member,//new
							// 'navigator'=> $nav,
							// 'doctor'=> $doc,
						);
					  if ($nav) {
				       $data["navigator"] = $nav;
				      } 
				      if ($doc) {
				       $data["doctor"] = $doc;
				      }

					  }else{
		           $data = array(
				    'name' => $name,
				    'email' => $email,
				    'gender' => $gender,
				    'number' => $number,
				    'emergency_contact_name' => $emergency_contact_name,
				    'emergency_contact_relationship' => $emergency_contact_relationship,
				    'emergency_contact_phone' => $emergency_contact_phone,
				    'weight' => $weight,
				    'height' => $height,
		
				    'employment_status' => $employment_status,
				    'education_level' => $education_level,
				    'marital_status' => $marital_status,
				   
				    'additional_information' => $additional_information,
				    'address' => $address,
				    'profile' => $img_url,
				    'member_id' =>$newMemberId,
				    'password' => $hashed_password,
				      'code' =>$code,
				      'dob' =>$dob,
				      'bloodgroup' =>$bloodgroup,
				      'membership' =>$membership,
					  'member_status'=>'1',
					  
				);
			    }
		            
		        }
		      }else{
              if($this->input->post('subprofile_checkbox')){
				$data = array(
					'name' => $name,
				
					'gender' => $gender,
				
					'emergency_contact_name' => $emergency_contact_name,
					'emergency_contact_relationship' => $emergency_contact_relationship,
					'emergency_contact_phone' => $emergency_contact_phone,
					'weight' => $weight,
					'height' => $height,
					
					'employment_status' => $employment_status,
					'education_level' => $education_level,
					'marital_status' => $marital_status,
					
					'additional_information' => $additional_information,
					'address' => $address,
					'member_id' =>$newMemberId,
						'code' =>$code,
						'dob' =>$dob,
					'bloodgroup' =>$bloodgroup,

					'membership' =>$membership,
					'member_status'=>'1',
					'isSubprofile'=>"Yes",//new
					  'parent_member'=> $parent_member,//new
					  'navigator'=> $nav,
					   'doctor'=> $doc,
				);
				 if ($nav) {
				       $data["navigator"] = $nav;
				      } 
				      if ($doc) {
				       $data["doctor"] = $doc;
				      }
			  }else{
				$data = array(
					'name' => $name,
					'email' => $email,
					'gender' => $gender,
					'number' => $number,
					'emergency_contact_name' => $emergency_contact_name,
					'emergency_contact_relationship' => $emergency_contact_relationship,
					'emergency_contact_phone' => $emergency_contact_phone,
					'weight' => $weight,
					'height' => $height,
					
					'employment_status' => $employment_status,
					'education_level' => $education_level,
					'marital_status' => $marital_status,
					
					'additional_information' => $additional_information,
					'address' => $address,
					'member_id' =>$newMemberId,
						'password' => $hashed_password,
						'code' =>$code,
						'dob' =>$dob,
					'bloodgroup' =>$bloodgroup,

					'membership' =>$membership,
					'member_status'=>'1'
				);
			  }
				
		      }

		      // Save the data to the manager table using your model function
		            $success = $this->Manager_model->SaveMemberData($data);

		            if ($success) {
		                echo json_encode(array('status' => 'success', 'message' => 'Member Added successfully'));
		            } else {

						$error = $this->db->error(); // Get the database error details
						$error_message = isset($error['message']) ? $error['message'] : 'Unknown Database Error';
						echo json_encode(array('status' => 'error', 'message' => 'Failed to add data: ' . $error_message));
		            	die();
		                echo json_encode(array('status' => 'error', 'message' => 'Failed to add data'));
		            }


		    }
		    }
		    } else {
		        redirect(base_url(), 'refresh');
		    }
	}


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

    
    public function update_member_data()
	{
		//$this->checkLogin();
		if ($this->session->userdata('user_login_access') != False) {
             //die();
		    	$id = $this->input->post('id');
		    	$name = $this->input->post('name');
				$email = $this->input->post('email');
				$gender = $this->input->post('gender');
				$number = $this->input->post('number');
				$emergency_contact_name = $this->input->post('emergency_contact_name');
				$emergency_contact_relationship = $this->input->post('emergency_contact_relationship');
				$emergency_contact_phone = $this->input->post('emergency_contact_phone');
				$weight = $this->input->post('weight');
				$height = $this->input->post('height');
				$medical_conditions = $this->input->post('medical_conditions');
				$medications = $this->input->post('medications');
				$surgical_history = $this->input->post('surgical_history');
				$family_medical_history = $this->input->post('family_medical_history');
				$immunizations = $this->input->post('immunizations');
				$lifestyle_and_habits = $this->input->post('lifestyle_and_habits');
				$mental_health = $this->input->post('mental_health');
				$employment_status = $this->input->post('employment_status');
				$education_level = $this->input->post('education_level');
				$marital_status = $this->input->post('marital_status');
				$exercise_habits = $this->input->post('exercise_habits');
				$diet_preferences = $this->input->post('diet_preferences');
				$additional_information = $this->input->post('additional_information');
				$address = $this->input->post('address');
				$password = $this->input->post('password');
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                //new
				$code = $this->input->post('code');
				$dob = $this->input->post('dob');
				$bloodgroup = $this->input->post('blood-group');
				$membership = $this->input->post('membership');
				$subprofile = $this->input->post('subprofile');

		        $this->load->library('form_validation');
		        $this->form_validation->set_error_delimiters();
		        $this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[255]|xss_clean');
                if(!$subprofile){
					$this->form_validation->set_rules('email', 'Email ID', 'trim|required|max_length[255]|valid_email|xss_clean');
				}
		       
		        // Add more validation rules as needed for other fields

		        if ($this->form_validation->run() == FALSE) {
		            echo validation_errors();
		            // Handle validation errors
		        } else {


		        
			     // Check for duplicate email and number
				if ($this->User_model->is_email_duplicate_except($email, $id) && $this->User_model->is_number_duplicate_except($number, $id)) {
				    $response = array(
				        'status' => 'error',
				        'message' => 'Email address and number already exist'
				    );
				    echo json_encode($response);
				    return;
				} elseif ($this->User_model->is_email_duplicate_except($email, $id)) {
				    $response = array(
				        'status' => 'error',
				        'message' => 'Email address already exists'
				    );
				    echo json_encode($response);
				    return;
				} elseif ($this->User_model->is_number_duplicate_except($number, $id)) {
				    $response = array(
				        'status' => 'error',
				        'message' => 'Number already exists'
				    );
				    echo json_encode($response);
				    return;
				}

		        
 
			     if($_FILES['file_url']['name']){
	            $file_name = $_FILES['file_url']['name'];
				$fileSize = $_FILES["file_url"]["size"]/1024;
				$fileType = $_FILES["file_url"]["type"];
				$new_file_name='';
	            $new_file_name .= $file_name;

	            $config = array(
	                'file_name' => $new_file_name,
	                'upload_path' => "./assets/uploads/users_profile",
	                'allowed_types' => "gif|jpg|png|jpeg|pdf|doc|docx",
	                'overwrite' => False,
	                'max_size' => "50720000"
	            );
	            //create directory
	              if(!is_dir($config['upload_path'])) mkdir($config['upload_path'], 0777, TRUE);
	    
	            $this->load->library('Upload', $config);
	            $this->upload->initialize($config);                
	            if (!$this->upload->do_upload('file_url')) {
	                echo $this->upload->display_errors();
	                #redirect("notice/All_notice");
				}

	   
				else {

	                $path = $this->upload->data();
	                $img_url = $path['file_name'];
		            $data = array(
				    'name' => $name,
				    'email' => $email,
				    'gender' => $gender,
				    'number' => $number,
				    'emergency_contact_name' => $emergency_contact_name,
				    'emergency_contact_relationship' => $emergency_contact_relationship,
				    'emergency_contact_phone' => $emergency_contact_phone,
				    'weight' => $weight,
				    'height' => $height,
				 
				    'employment_status' => $employment_status,
				    'education_level' => $education_level,
				    'marital_status' => $marital_status,
				  
				    'additional_information' => $additional_information,
				    'address' => $address,
				    'profile' => $img_url,
				     // 'code' =>$code,
				      'dob' =>$dob,
				      'bloodgroup' =>$bloodgroup,
				      'membership' =>$membership,
					  'member_status'=>'0'
				   
				);
               if ($password) {
				    $data["password"] = $hashed_password;
				}
		            
		        }
		      }else{

		      	$data = array(
					    'name' => $name,
					    'email' => $email,
					    'gender' => $gender,
					    'number' => $number,
					    'emergency_contact_name' => $emergency_contact_name,
					    'emergency_contact_relationship' => $emergency_contact_relationship,
					    'emergency_contact_phone' => $emergency_contact_phone,
					    'weight' => $weight,
					    'height' => $height,
					 
					    'employment_status' => $employment_status,
					    'education_level' => $education_level,
					    'marital_status' => $marital_status,
					
					    'additional_information' => $additional_information,
					    'address' => $address,
					     // 'code' =>$code,
				            'dob' =>$dob,
				      'bloodgroup' =>$bloodgroup,
				      'membership' =>$membership,
					  'member_status'=>'0'
					    
					);
		      	if ($password) {
					    $data["password"] = $hashed_password;
					}
		      }
               
            //  print_r($data);die();

		      // Save the data to the manager table using your model function
		            $success = $this->Manager_model->UpdateMember($data,$id);// print_r($success);die();

		            if ($success) {
		            	$data["id"] = $id;
		            	if($subprofile){
							//$p_id = $member->parent_member;
							$parent_member = $this->Manager_model->getMemberByID($id); 
							$p_member = $this->Manager_model->getMemberByID($parent_member->parent_member); 
							$pemail = $p_member->email;
							$pnumber = $p_member->number;
							$data = array(
						    'name' => $name,
						    'email' => $pemail,
						    'gender' => $gender,
						    'number' => $pnumber,
						    'emergency_contact_name' => $emergency_contact_name,
						    'emergency_contact_relationship' => $emergency_contact_relationship,
						    'emergency_contact_phone' => $emergency_contact_phone,
						    'weight' => $weight,
						    'height' => $height,
						 
						    'employment_status' => $employment_status,
						    'education_level' => $education_level,
						    'marital_status' => $marital_status,
						
						    'additional_information' => $additional_information,
						    'address' => $address,
						     // 'code' =>$code,
					            'dob' =>$dob,
					      'bloodgroup' =>$bloodgroup,
					      'membership' =>$membership,
						  'member_status'=>'0'
						    
						);
		            	}
		                echo json_encode(array('status' => 'success', 'message' => 'Data Added successfully','member'=>$data));
		            } else {
		            	
		                echo json_encode(array('status' => 'error', 'message' => 'Failed to update data'));
		            }

		    }
		   // }
		    } else {
		        redirect(base_url(), 'refresh');
		    }
	}  
    public function Add_Assign_Navigators()
	{
		//$this->checkLogin();
		if ($this->session->userdata('user_login_access') != False) {
             //die();
		    	$id = $this->input->post('id');
		    	$name = $this->input->post('name');
				$email = $this->input->post('email');
				$gender = $this->input->post('gender');
				$number = $this->input->post('number');
				$emergency_contact_name = $this->input->post('emergency_contact_name');
				$emergency_contact_relationship = $this->input->post('emergency_contact_relationship');
				$emergency_contact_phone = $this->input->post('emergency_contact_phone');
				$weight = $this->input->post('weight');
				$height = $this->input->post('height');
				
				$employment_status = $this->input->post('employment_status');
				$education_level = $this->input->post('education_level');
				$marital_status = $this->input->post('marital_status');
				
				$additional_information = $this->input->post('additional_information');
				$address = $this->input->post('address');
				$password = $this->input->post('password');
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                 $navigator = $this->input->post('navigator');

                 	$member_id = $this->input->post('member_id');

		        $this->load->library('form_validation');
		        $this->form_validation->set_error_delimiters();
		        $this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[255]|xss_clean');
				if(!$this->input->post('subprofile')){
                $this->form_validation->set_rules('email', 'Email ID', 'trim|required|max_length[255]|valid_email|xss_clean');
			    }
		        // Add more validation rules as needed for other fields

                 $navigator_data =  $this->Manager_model->getNavigatorDetails($navigator);



		        if ($this->form_validation->run() == FALSE) {
		            echo validation_errors();
		            // Handle validation errors
		        } else {
		        
          
		

		      	$data = array(
					    'name' => $name,
					    'email' => $email,
					    'gender' => $gender,
					    'number' => $number,
				        'navigator' => $navigator,
				         'navigator_status'=>'1'
					    
					);
		      	if ($password) {
					    $data["password"] = $hashed_password;
					}
		      }
               
            //  print_r($data);die();

		      // Save the data to the manager table using your model function
		            $success = $this->Manager_model->UpdateMember($data,$id);// print_r($success);die();

		            if ($success) {

		            	 /*Notification*/

		                $filetitle = 'New member assignment: <span class="txt-name">'.$name .'-'.$member_id.'</span>.';
		               // foreach ($admin as $data) {
		                $data = array(
		                'manager_id' => $navigator,
		                'message' => $filetitle,
		                'created_at' => date('Y-m-d H:i:s'),
		                'status' => 'unread',
		                'icon' => 'fa fa-comments-o',
		                'color' => 'blue-bgcolor',
		                 'url' => 'Navigator/My_Members'
		                );
		                $this->db->insert('manager_notifications', $data);
		                //}

					      	$data = array(
								    'name' => $name,
								    'email' => $email,
								    'gender' => $gender,
								    'number' => $number,
							
								     'navigator' => $navigator,
								    
								);
			                
			              $data["id"] = $id;
			                $data['manager_name'] =    $navigator_data->name;
		                echo json_encode(array('status' => 'success', 'message' => 'Data Added successfully','member'=>$data));

		                $this->send_mail_assign_memeber($navigator_data->email,$navigator_data->name,$name,$email,$number);
		            } else {
		            	
		                echo json_encode(array('status' => 'error', 'message' => 'Failed to update data'));
		            }

		   // }
		   // }
		    } else {
		        redirect(base_url(), 'refresh');
		    }
	}
        //assigning mail
	  public function send_mail_assign_memeber($manageremail,$recivername,$name,$email,$number) {
 

    // Create the inquiry email
    $Mail = new PHPMailer(true);
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
         
            <p>Dear <?=$recivername; ?></p><br>
            <p>I hope this message finds you well. I wanted to inform you that a member has been assigned to you.</p>
            
           <h3>Assigned Member Details:</h3>
          <table>
              <tr>
                  <td><strong>Name</strong></td>
                  <td><?php if(isset($name)) { echo  $name; } ?></td>
              </tr>
              <?php if(isset($email)) { ?>
              <tr>
                  <td><strong>Email</strong></td>
                    <td><?php if(isset($email)) { echo  $email; } ?></td>
              </tr>
              <?php } ?>
              <?php if(isset($number)) { ?>
              <tr>
                  <td><strong>Phone</strong></td>
                    <td><?php if(isset($number)) { echo  $number; } ?></td>
              </tr> 
             <?php } ?>
          </table>

       <!-- <p><a href="<?php echo base_url('login')?>" style="display: inline-block; padding: 10px 20px; background-color: #337ab7; color: #ffffff; text-decoration: none; border-radius: 5px;">Login Our Website</a></p> -->

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
        $Mail->isSMTP();
        $Mail->Host = 'smtp.gmail.com';
        $Mail->SMTPAuth = true;
        $Mail->Username = USERNAME;
        $Mail->Password = PASSWORD;
        $Mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $Mail->Port = 465;
        $Mail->setFrom(FROM, FROMNAME);
        $Mail->addAddress($manageremail,$recivername);
        $Mail->isHTML(true);
        $Mail->Subject = ' Member Assignment Notification';
        $Mail->Body = $inquiryMessage;

        ?>
  
        <?php
       

        // Send both emails
        if ($Mail->send()) {
           // echo json_encode(array('status' => 'success', 'message' => 'Register Successfully!!'));
        } else {
            //echo json_encode(array('status' => 'error', 'message' => 'Error in sending emails.'));
        }
    } catch (Exception $e) {
        //echo json_encode(array('status' => 'error', 'message' => "An error occurred. {$e->getMessage()}"));
    }
}


 //update modal get getMemberByID
   public function getMemberByID() {
        // Get the ID parameter from the AJAX request
        $id = $this->input->get('id');//echo $id;
        $member = $this->Manager_model->getMemberByID($id);
		if($member->isSubprofile == 'Yes'){
	
		$p_member = $this->Manager_model->getMemberByID($member->parent_member); 
		$email = $p_member->email;
		$number = $p_member->number;
    
		}else{
		$email = $member->email;
		$number = $member->number;
		}
       $response = array(
	    'id' => $member->id,
	    'member_id' => $member->member_id,
	    'name' => $member->name,
	    'email' => $email,
	    'password' => $member->password,
	    'gender' => $member->gender,
	    'number' => $number,
	    'emergency_contact_name' => $member->emergency_contact_name,
	    'emergency_contact_relationship' => $member->emergency_contact_relationship,
	    'emergency_contact_phone' => $member->emergency_contact_phone,
	    'weight' => $member->weight,
	    'height' => $member->height,
	    'employment_status' => $member->employment_status,
	    'education_level' => $member->education_level,
	    'marital_status' => $member->marital_status,
	
	    'additional_information' => $member->additional_information,
	    'address' => $member->address,
	    'profile' => $member->profile,
	    'appointment' => $member->appointment,
	    'appointment_date' => $member->appointment_date,
	    'appointment_time' => $member->appointment_time,
	    'comments' => $member->comments,
	    'payment_status' => $member->payment_status,
	    'appointment_status' => $member->appointment_status,
	    'navigator' => $member->navigator,
	     //new
	    'dob' => $member->dob,
	    'bloodgroup' => $member->bloodgroup,
	    'doctor' => $member->doctor,
	    'membership' => $member->membership,
	    'isSubprofile' => $member->isSubprofile
	);

        
        // Send the response as JSON
        echo json_encode($response);
    }

    /*Medical History */

    // list medical
	public function Medical_history()
	{
		$this->checkLogin();
		$id = $this->input->get('id');
			//$data['members'] = $this->Manager_model->getAllMembers();
			$data['members'] = $this->Manager_model->getAllMemberslist();
		$this->load->view('Backend/admin/ad-medical-history-list',$data);
	}  
	public function SubMedical_history()
	{
		$this->checkLogin();
		$id = $this->input->get('id');
		$data['members'] = $this->Manager_model->getSubprofile($id);
		$this->load->view('Backend/admin/subprofile-medical-history-list',$data);
	}  
	 // add medical
	public function Add_medical_history()
	{
		$this->checkLogin();
		$id = $this->input->get('id');
	   //$data['user_data'] = $this->Manager_model->getUserDetails($id);
	   $user_data = $this->Manager_model->getUserDetails($id);
        $member_id = $id;
			      // Fetch data from the main Medical History table based on id and member_id
        $medical_history = $this->Admin_model->get_medical_history( $member_id);//
       
	    if ($medical_history) {
	        // Fetch data from child tables based on medical_history_id and member_id
	        $previous_medical_conditions = $this->Admin_model->get_previous_medical_conditions($medical_history->id, $member_id);
	        $surgeries_procedures = $this->Admin_model->get_surgeries_procedures($medical_history->id, $member_id);
	        $allergies = $this->Admin_model->get_allergies($medical_history->id, $member_id);
	        $current_medications = $this->Admin_model->get_current_medications($medical_history->id, $member_id);
	        $family_medical_history = $this->Admin_model->get_family_medical_history($medical_history->id, $member_id);
	        $immunization_history = $this->Admin_model->get_immunization_history($medical_history->id, $member_id);
	        $previous_medical_test_results = $this->Admin_model->get_previous_medical_test_results($medical_history->id, $member_id);
	        $current_symptoms_concerns = $this->Admin_model->get_current_symptoms_concerns($medical_history->id, $member_id);

	        // Prepare data to be sent to the view
	        $data = array(
	            'member_id' => $member_id,
	            'user_data' => $user_data,
	            'medical_history' => $medical_history,
	            'previous_medical_conditions' => $previous_medical_conditions,
	            'surgeries_procedures' => $surgeries_procedures,
	            'allergies' => $allergies,
	            'current_medications' => $current_medications,
	            'family_medical_history' => $family_medical_history,
	            'immunization_history' => $immunization_history,
	            'previous_medical_test_results' => $previous_medical_test_results,
	            'current_symptoms_concerns' => $current_symptoms_concerns
	        );
	        // echo "<pre>";
	        // print_r($data); die();
		
	  }else{
	  	    $previous_medical_conditions = '';
	        $surgeries_procedures = '';
	        $allergies = '';
	        $current_medications = '';
	        $family_medical_history = '';
	        $immunization_history = '';
	        $previous_medical_test_results = '';
	        $current_symptoms_concerns = '';
	  	 $data = array(
	  	 	     'member_id' => $member_id,
	            'user_data' => $user_data,
	            'medical_history' => $medical_history,
	            'previous_medical_conditions' => $previous_medical_conditions,
	            'surgeries_procedures' => $surgeries_procedures,
	            'allergies' => $allergies,
	            'current_medications' => $current_medications,
	            'family_medical_history' => $family_medical_history,
	            'immunization_history' => $immunization_history,
	            'previous_medical_test_results' => $previous_medical_test_results,
	            'current_symptoms_concerns' => $current_symptoms_concerns
	        );
	  }
	  $this->load->view('Backend/admin/ad-add-medical-hoistory',$data);
	}
  /*medical history*/
	public function save_medical_history() {
		$this->checkLogin();
        // Retrieve form data for the Medical History main table
        $physician_name = $this->input->post('physician_name');
        $physician_no = $this->input->post('physician_no');
        $smoking = $this->input->post('smoking');
        $alcohol = $this->input->post('alcohol');
        $exercise_habits = $this->input->post('exercise_habits');
        $insurance_provider = $this->input->post('insurance_provider');
        $policy_number = $this->input->post('policy_no');
        $policy_number = $this->input->post('policy_no');
        $member_id = $this->input->post('member_id');

        
        //update data
        // Check if the member_id already exists in the Medical History table
		$existing_medical_history = $this->Admin_model->get_medical_history_by_member_id($member_id);
        
		if ($existing_medical_history) {
		    // Member already has a medical history, update the existing records

		    // Update the Medical History main table data
		    $medical_history_data = array(
		        'physician_name' => $physician_name,
		        'physician_no' => $physician_no,
		        'smoking' => $smoking,
		        'alcohol' => $alcohol,
		        'exercise_habits' => $exercise_habits,
		        'insurance_provider' => $insurance_provider,
		        'policy_number' => $policy_number,
		        'member_id' => $member_id
		    );
		   $update = $this->Admin_model->update_medical_history($existing_medical_history->id, $medical_history_data);
		//    echo 'medical_history_data';
        //   print_r($medical_history_data);
		//    echo 'update';
        //   print_r($update);
        
		//   echo 'post';
        //   print_r($existing_medical_history);
		  
		    // Delete existing child records for the member
		    $this->Admin_model->delete_previous_medical_conditions_by_medical_history_id($existing_medical_history->id);
		    $this->Admin_model->delete_surgeries_procedures_by_medical_history_id($existing_medical_history->id);
		    $this->Admin_model->delete_allergies_by_medical_history_id($existing_medical_history->id);
		    $this->Admin_model->delete_current_medications_by_medical_history_id($existing_medical_history->id);
		    $this->Admin_model->delete_family_medical_history_by_medical_history_id($existing_medical_history->id);
		    $this->Admin_model->delete_immunization_history_by_medical_history_id($existing_medical_history->id);
		    $this->Admin_model->delete_previous_medical_test_results_by_medical_history_id($existing_medical_history->id);
		    $this->Admin_model->delete_current_symptoms_concerns_by_medical_history_id($existing_medical_history->id);

		    //balance deletes
			// echo '<br>';
			// echo 'delete';
			// print_r($this->Admin_model->delete_previous_medical_conditions_by_medical_history_id($existing_medical_history->id));
		    //child table

		    // Previous Medical Conditions section
		    $medical_conditions = $this->input->post('medical_conditions');
		    $medical_condition_dates = $this->input->post('medical_condition_date');
		    $treatment_received = $this->input->post('treatment_received');

		    // Save data for each record in the Previous Medical Conditions section
		    if (!empty($medical_conditions)) {
		        foreach ($medical_conditions as $index => $condition) {
		            if (!empty($condition) && !empty($medical_condition_dates[$index])) {
		                $condition_data = array(
		                    'medical_history_id' => $existing_medical_history->id,
		                    'member_id' => $member_id,
		                    'condition_name' => $condition,
		                    'diagnosis_date' => $medical_condition_dates[$index],
		                    'treatment_received' => $treatment_received[$index]
		                );
		                $this->Admin_model->insert_previous_medical_condition($condition_data);
		            }
		        }
		    } 
			
		     // Surgeries or Procedures section
            $surgeries = $this->input->post('surgeries');
            $surgeries_dates = $this->input->post('surgeries_date');
            $surgeon_names = $this->input->post('Surgeon');

            // Save data for each record in the Surgeries or Procedures section
             if (!empty($surgeries)) {
            foreach ($surgeries as $index => $surgery) {
             if (!empty($surgery) && !empty($surgeries_dates[$index]) && !empty($surgeon_names[$index])) {
                $surgery_data = array(
                    'medical_history_id' => $existing_medical_history->id,
                    'member_id' => $member_id,
                    'procedure_name' => $surgery,
                    'procedure_date' => $surgeries_dates[$index],
                    'surgeon' => $surgeon_names[$index]
                );
                $this->Admin_model->insert_surgery_procedure($surgery_data);
            }
            }
           }
		  
	            // Allergies section
	            $medications = $this->input->post('medications');
	            $food_allergies = $this->input->post('food');
	            $other_allergies = $this->input->post('other');

	            // Save data for each record in the Allergies section
	             if (!empty($medications)) {
	            foreach ($medications as $index => $medication) {
	            	  if (!empty($medication) || !empty($food_allergies[$index]) || !empty($other_allergies[$index])) {
	                $allergy_data = array(
	                    'medical_history_id' =>$existing_medical_history->id,
	                    'member_id' =>$member_id,
	                    'medications' => $medication,
	                    'food' => $food_allergies[$index],
	                    'other' => $other_allergies[$index]
	                );
	                $this->Admin_model->insert_allergy($allergy_data);
	            }
	            }
	        }

	            // Current Medications section
	            $medication_names = $this->input->post('medication_name');
	            $dosages = $this->input->post('medication_dosage');
	            $frequencies = $this->input->post('medication_frequency');

	            // Save data for each record in the Current Medications section
	             if (!empty($medication_names)) {
	            foreach ($medication_names as $index => $medication_name) {
	            	   if (!empty($medication_name) && !empty($dosages[$index]) && !empty($frequencies[$index])) {
	                $medication_data = array(
	                    'medical_history_id' => $existing_medical_history->id,
	                    'member_id' => $member_id,
	                    'medication_name' => $medication_name,
	                    'dosage' => $dosages[$index],
	                    'frequency' => $frequencies[$index]
	                );
	                $this->Admin_model->insert_medication($medication_data);
	            }
	            }
	        }

	            // Family Medical History section
	            $family_conditions = $this->input->post('family_medical_history');
	            $relationship_to_patient = $this->input->post('relationship_to_patient');

	            // Save data for each record in the Family Medical History section
	             if (!empty($family_conditions)) {
	            foreach ($family_conditions as $index => $condition) {
	            	   if (!empty($condition) && !empty($relationship_to_patient[$index])) {
	                $family_data = array(
	                    'medical_history_id' => $existing_medical_history->id,
	                    'member_id' => $member_id,
	                    'condition_name' => $condition,
	                    'relationship_to_patient' => $relationship_to_patient[$index]
	                );
	                $this->Admin_model->insert_family_medical_history($family_data);
	            }
	            }
	        }

	            // Immunization History section
	            $vaccinations = $this->input->post('vaccination');
	            $vaccination_dates = $this->input->post('vaccination_date');

	            // Save data for each record in the Immunization History section
	             if (!empty($vaccinations)) {
	            foreach ($vaccinations as $index => $vaccination) {
	            	     if (!empty($vaccination) && !empty($vaccination_dates[$index])) {
	                $immunization_data = array(
	                    'medical_history_id' => $existing_medical_history->id,
	                    'member_id' => $member_id,
	                    'vaccination' => $vaccination,
	                    'vaccination_date' => $vaccination_dates[$index]
	                );
	                $this->Admin_model->insert_immunization($immunization_data);
	            }
	            }
	        }

	            // Previous Medical Test Results section
	            $medical_tests = $this->input->post('medical_test');

	            // Save data for each record in the Previous Medical Test Results section
	             if (!empty($medical_tests)) {
	            foreach ($medical_tests as $index => $test) {
	            	 if (!empty($test)) {
	                $test_data = array(
	                    'medical_history_id' => $existing_medical_history->id,
	                    'member_id' => $member_id,
	                    'test_name' => $test
	                );
	                $this->Admin_model->insert_medical_test($test_data);
	            }
	            }
	          }

	            // Current Symptoms or Concerns section
	            $symptoms = $this->input->post('symptom');
	            $concerns = $this->input->post('concerns');

	            // Save data for each record in the Current Symptoms or Concerns section
	             if (!empty($symptoms)) {
	            foreach ($symptoms as $index => $symptom) {
	            	  if (!empty($symptom) && !empty($concerns[$index])) {
	                $symptom_data = array(
	                    'medical_history_id' => $existing_medical_history->id,
	                    'member_id' => $member_id,
	                    'symptom' => $symptom,
	                    'concerns' => $concerns[$index]
	                );
	                $this->Admin_model->insert_symptom($symptom_data);
	            }
	            }
	         }

			 //die();

		      // echo "All data has been saved successfully.";
		    if($update){
              echo json_encode(array('status' => 'success', 'message' =>'Updated successfully'));
		    }


        } else {
        //insert data

        // Create an array for the Medical History main table data
        $medical_history_data = array(
            'physician_name' => $physician_name,
            'physician_no' => $physician_no,
            'smoking' => $smoking,
            'alcohol' => $alcohol,
            'exercise_habits' => $exercise_habits,
            'insurance_provider' => $insurance_provider,
            'policy_number' => $policy_number,
            'member_id' => $member_id,

        );

        // Insert the Medical History data into the main table
        $medical_history_id = $this->Admin_model->insert_medical_history($medical_history_data);

        if ($medical_history_id) {
            // Previous Medical Conditions section
            $medical_conditions = $this->input->post('medical_conditions');
            $medical_condition_dates = $this->input->post('medical_condition_date');
            $treatment_received = $this->input->post('treatment_received');

            // Save data for each record in the Previous Medical Conditions section
             if (!empty($medical_conditions)) {
            foreach ($medical_conditions as $index => $condition) {
            if (!empty($condition) && !empty($medical_condition_dates[$index])) {
                $condition_data = array(
                    'medical_history_id' => $medical_history_id,
                    'member_id' => $member_id,
                    'condition_name' => $condition,
                    'diagnosis_date' => $medical_condition_dates[$index],
                    'treatment_received' => $treatment_received[$index]
                );
                $this->Admin_model->insert_previous_medical_condition($condition_data);
            }
            }
           }

            // Surgeries or Procedures section
            $surgeries = $this->input->post('surgeries');
            $surgeries_dates = $this->input->post('surgeries_date');
            $surgeon_names = $this->input->post('Surgeon');

            // Save data for each record in the Surgeries or Procedures section
             if (!empty($surgeries)) {
            foreach ($surgeries as $index => $surgery) {
             if (!empty($surgery) && !empty($surgeries_dates[$index]) && !empty($surgeon_names[$index])) {
                $surgery_data = array(
                    'medical_history_id' => $medical_history_id,
                    'member_id' => $member_id,
                    'procedure_name' => $surgery,
                    'procedure_date' => $surgeries_dates[$index],
                    'surgeon' => $surgeon_names[$index]
                );
                $this->Admin_model->insert_surgery_procedure($surgery_data);
            }
            }
           }

            // Allergies section
            $medications = $this->input->post('medications');
            $food_allergies = $this->input->post('food');
            $other_allergies = $this->input->post('other');

            // Save data for each record in the Allergies section
             if (!empty($medications)) {
            foreach ($medications as $index => $medication) {
            	  if (!empty($medication) || !empty($food_allergies[$index]) || !empty($other_allergies[$index])) {
                $allergy_data = array(
                    'medical_history_id' =>$medical_history_id,
                    'member_id' =>$member_id,
                    'medications' => $medication,
                    'food' => $food_allergies[$index],
                    'other' => $other_allergies[$index]
                );
                $this->Admin_model->insert_allergy($allergy_data);
            }
            }
        }

            // Current Medications section
            $medication_names = $this->input->post('medication_name');
            $dosages = $this->input->post('medication_dosage');
            $frequencies = $this->input->post('medication_frequency');

            // Save data for each record in the Current Medications section
             if (!empty($medication_names)) {
            foreach ($medication_names as $index => $medication_name) {
            	   if (!empty($medication_name) && !empty($dosages[$index]) && !empty($frequencies[$index])) {
                $medication_data = array(
                    'medical_history_id' => $medical_history_id,
                    'member_id' => $member_id,
                    'medication_name' => $medication_name,
                    'dosage' => $dosages[$index],
                    'frequency' => $frequencies[$index]
                );
                $this->Admin_model->insert_medication($medication_data);
            }
            }
        }

            // Family Medical History section
            $family_conditions = $this->input->post('family_medical_history');
            $relationship_to_patient = $this->input->post('relationship_to_patient');

            // Save data for each record in the Family Medical History section
             if (!empty($family_conditions)) {
            foreach ($family_conditions as $index => $condition) {
            	   if (!empty($condition) && !empty($relationship_to_patient[$index])) {
                $family_data = array(
                    'medical_history_id' => $medical_history_id,
                    'member_id' => $member_id,
                    'condition_name' => $condition,
                    'relationship_to_patient' => $relationship_to_patient[$index]
                );
                $this->Admin_model->insert_family_medical_history($family_data);
            }
            }
        }

            // Immunization History section
            $vaccinations = $this->input->post('vaccination');
            $vaccination_dates = $this->input->post('vaccination_date');

            // Save data for each record in the Immunization History section
             if (!empty($vaccinations)) {
            foreach ($vaccinations as $index => $vaccination) {
            	     if (!empty($vaccination) && !empty($vaccination_dates[$index])) {
                $immunization_data = array(
                    'medical_history_id' => $medical_history_id,
                    'member_id' => $member_id,
                    'vaccination' => $vaccination,
                    'vaccination_date' => $vaccination_dates[$index]
                );
                $this->Admin_model->insert_immunization($immunization_data);
            }
            }
        }

            // Previous Medical Test Results section
            $medical_tests = $this->input->post('medical_test');

            // Save data for each record in the Previous Medical Test Results section
             if (!empty($medical_tests)) {
            foreach ($medical_tests as $index => $test) {
            	 if (!empty($test)) {
                $test_data = array(
                    'medical_history_id' => $medical_history_id,
                    'member_id' => $member_id,
                    'test_name' => $test
                );
                $this->Admin_model->insert_medical_test($test_data);
            }
            }
          }

            // Current Symptoms or Concerns section
            $symptoms = $this->input->post('symptom');
            $concerns = $this->input->post('concerns');

            // Save data for each record in the Current Symptoms or Concerns section
             if (!empty($symptoms)) {
            foreach ($symptoms as $index => $symptom) {
            	  if (!empty($symptom) && !empty($concerns[$index])) {
                $symptom_data = array(
                    'medical_history_id' => $medical_history_id,
                    'member_id' => $member_id,
                    'symptom' => $symptom,
                    'concerns' => $concerns[$index]
                );
                $this->Admin_model->insert_symptom($symptom_data);
            }
            }
        }
       

             // echo "All data has been saved successfully.";
              echo json_encode(array('status' => 'success', 'message' =>'All data has been saved successfully'));

           
        } else {
           
                 echo json_encode(array('status' => 'error', 'message' =>'Failed to save'));
            }

        }
        }
        //delete items
       public function delete_items(){
        if($this->session->userdata('user_login_access') != False) { 
            $id = $this->input->post('id');
            $table = base64_decode($this->input->post('table'));
            $result_del = $this->Admin_model->delete_items($id,$table);//
          if($result_del){
                echo json_encode(array('status'=>'success','message'=> 'Deleted Successfully'));
               
            }else{
                 echo json_encode(array('status'=>'failed','message'=> 'Not deleted'));
             
            }
           
            }
        else{
            redirect(base_url() , 'refresh');
        }       
     }
   	 // View Medical history
	public function View_medical_history()
	{
		$this->checkLogin();
		$id = $this->input->get('id');
	   //$data['user_data'] = $this->Manager_model->getUserDetails($id);
	   $user_data = $this->Manager_model->getUserDetails($id);
	   
        $member_id = $id;
			      // Fetch data from the main Medical History table based on id and member_id
        $medical_history = $this->Admin_model->get_medical_history( $member_id);//
       
	    if ($medical_history) {
	        // Fetch data from child tables based on medical_history_id and member_id
	        $previous_medical_conditions = $this->Admin_model->get_previous_medical_conditions($medical_history->id, $member_id);
	        $surgeries_procedures = $this->Admin_model->get_surgeries_procedures($medical_history->id, $member_id);
	        $allergies = $this->Admin_model->get_allergies($medical_history->id, $member_id);
	        $current_medications = $this->Admin_model->get_current_medications($medical_history->id, $member_id);
	        $family_medical_history = $this->Admin_model->get_family_medical_history($medical_history->id, $member_id);
	        $immunization_history = $this->Admin_model->get_immunization_history($medical_history->id, $member_id);
	        $previous_medical_test_results = $this->Admin_model->get_previous_medical_test_results($medical_history->id, $member_id);
	        $current_symptoms_concerns = $this->Admin_model->get_current_symptoms_concerns($medical_history->id, $member_id);

	        // Prepare data to be sent to the view
	        $data = array(
	        	    'member_id' => $member_id,
	            'user_data' => $user_data,
	            'medical_history' => $medical_history,
	            'previous_medical_conditions' => $previous_medical_conditions,
	            'surgeries_procedures' => $surgeries_procedures,
	            'allergies' => $allergies,
	            'current_medications' => $current_medications,
	            'family_medical_history' => $family_medical_history,
	            'immunization_history' => $immunization_history,
	            'previous_medical_test_results' => $previous_medical_test_results,
	            'current_symptoms_concerns' => $current_symptoms_concerns
	        );
	        // echo "<pre>";
	        // print_r($data); die();
		
	  }else{
	  	    $previous_medical_conditions = '';
	        $surgeries_procedures = '';
	        $allergies = '';
	        $current_medications = '';
	        $family_medical_history = '';
	        $immunization_history = '';
	        $previous_medical_test_results = '';
	        $current_symptoms_concerns = '';
	  	 $data = array(
	  	 	    'member_id' => $member_id,
	            'user_data' => $user_data,
	            'medical_history' => $medical_history,
	            'previous_medical_conditions' => $previous_medical_conditions,
	            'surgeries_procedures' => $surgeries_procedures,
	            'allergies' => $allergies,
	            'current_medications' => $current_medications,
	            'family_medical_history' => $family_medical_history,
	            'immunization_history' => $immunization_history,
	            'previous_medical_test_results' => $previous_medical_test_results,
	            'current_symptoms_concerns' => $current_symptoms_concerns
	        );
	  }
	  $this->load->view('Backend/admin/ad-view-medical-hoistory',$data);
	}


    /**/
    public function Edit_Profile(){
    	$this->checkLogin();
    	$this->load->view('Backend/admin/ad-edit-profile');

    }
	//create admin
	 public function insert_admin() {
   
    
    // Get the input data from the form
    $email = 'admin@gmail.com';
    $password = 'admin';
    //  $email = $this->input->post('email');
    // $password = $this->input->post('password');
    $isActive = $this->input->post('isActive');
    
     // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare the data to be inserted
    $data = array(
        'email' => $email,
        'password' => $hashed_password,
        'isActive' => $isActive
    );
    
    // Call the insert_admin() method of the model
    $insert_id = $this->Admin_model->insert_admin($data);
    
    if ($insert_id) {
        // Insert successful
        echo 'Admin inserted successfully. Insert ID: ' . $insert_id;
    } else {
        // Insert failed
        echo 'Failed to insert admin.';
    }
    }

    //update
//     public function update_admin($admin_id = '') {
//     $this->load->model('Admin_model');
//     $admin_id = 1;
//     // Get the input data from the form
//     $email = $this->input->post('email');
//     $password = $this->input->post('password');
//     $isActive = $this->input->post('isActive');
    

//      // Hash the password
//     $hashed_password = password_hash($password, PASSWORD_DEFAULT);

//     // Prepare the data to be updated
//     $data = array(
        
//         'name'=>'Dr. Vasu G Ramakrishna',
//          'role'=>"Administrator"
//     );
//     // $data = array(
//     //     'email' => $email,
//     //     'password' => $hashed_password,
//     //     'isActive' => $isActive
//     // );
    
//     // Call the update_admin() method of the model
//     $update_result = $this->Admin_model->update_admin($admin_id, $data);
    
//     if ($update_result) {
//         // Update successful
//         echo 'Admin updated successfully.';
//     } else {
//         // Update failed
//         echo 'Failed to update admin.';
//     }
// }
public function update_admin()
	{
		//$this->checkLogin();
		if ($this->session->userdata('user_login_access') != False) {
             //die();
		    	$id = $this->input->post('id');
		    	$name = $this->input->post('name');
				$email = $this->input->post('email');
				$number = $this->input->post('number');
	
				$password = $this->input->post('password');
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

		        $this->load->library('form_validation');
		        $this->form_validation->set_error_delimiters();
		        $this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[255]|xss_clean');
		        $this->form_validation->set_rules('email', 'Email ID', 'trim|required|max_length[255]|valid_email|xss_clean');
		        // Add more validation rules as needed for other fields

		        if ($this->form_validation->run() == FALSE) {
		            echo validation_errors();
		            // Handle validation errors
		        } else {
		        
 
			     if($_FILES['file_url']['name']){
	            $file_name = $_FILES['file_url']['name'];
				$fileSize = $_FILES["file_url"]["size"]/1024;
				$fileType = $_FILES["file_url"]["type"];
				$new_file_name='';
	            $new_file_name .= $file_name;

	            $config = array(
	                'file_name' => $new_file_name,
	                'upload_path' => "./assets/uploads/admin_profile",
	                'allowed_types' => "gif|jpg|png|jpeg|pdf|doc|docx",
	                'overwrite' => False,
	                'max_size' => "50720000"
	            );
	            //create directory
	              if(!is_dir($config['upload_path'])) mkdir($config['upload_path'], 0777, TRUE);
	    
	            $this->load->library('Upload', $config);
	            $this->upload->initialize($config);                
	            if (!$this->upload->do_upload('file_url')) {
	                echo $this->upload->display_errors();
	                #redirect("notice/All_notice");
				}

	   
				else {

	                $path = $this->upload->data();
	                $img_url = $path['file_name'];
		            $data = array(
				   'name' => $name,
					    'email' => $email,
					    'number' => $number,
				    'profile' => $img_url,
				   
				);
               if ($password) {
				    $data["password"] = $hashed_password;
				}
		            
		        }
		      }else{

		      	$data = array(
					    'name' => $name,
					    'email' => $email,
					    'number' => $number,
	
					);
		      	if ($password) {
					    $data["password"] = $hashed_password;
					}
		      }
        
         // print_r($data);die();
		      // Save the data to the manager table using your model function
		            $success = $this->Admin_model->update_admin($id, $data);// print_r($success);die();

		            if ($success) {
		                echo json_encode(array('status' => 'success', 'message' => 'Profile Updated Successfully'));
		            } else {
		            	
		                echo json_encode(array('status' => 'error', 'message' => 'Failed to update data'));
		            }

		    }
		   // }
		    } else {
		        redirect(base_url(), 'refresh');
		    }
	}


   public function send_mail_manager($name,$email,$number,$password) {
    // $name = $this->input->post('name');
    // $email = $this->input->post('email');
    // $number = $this->input->post('number');
  //  $message = $this->input->post('message');

    // Create the inquiry email
    $Mail = new PHPMailer(true);
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
          <h1>Registration Details</h1>
            <p>Thank you for registering an account. Below is your login information:</p>
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
                  <td><strong>Password</strong></td>
                    <td><?php if(isset($password)) { echo  $password; } ?></td>
              </tr> 
          </table>

       <p><a href="<?php echo base_url('login')?>" style="display: inline-block; padding: 10px 20px; background-color: #337ab7; color: #ffffff; text-decoration: none; border-radius: 5px;">Login Our Website</a></p>

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
        $Mail->isSMTP();
        $Mail->Host = 'smtp.gmail.com';
        $Mail->SMTPAuth = true;
        $Mail->Username = USERNAME;
        $Mail->Password = PASSWORD;
        $Mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $Mail->Port = 465;
        $Mail->setFrom(FROM, FROMNAME);
        $Mail->addAddress($email, $name);
        $Mail->isHTML(true);
        $Mail->Subject = 'Welcome to our website!!!';
        $Mail->Body = $inquiryMessage;

        ?>
  
        <?php
       

        // Send both emails
        if ($Mail->send()) {
           // echo json_encode(array('status' => 'success', 'message' => 'Register Successfully!!'));
        } else {
            //echo json_encode(array('status' => 'error', 'message' => 'Error in sending emails.'));
        }
    } catch (Exception $e) {
        //echo json_encode(array('status' => 'error', 'message' => "An error occurred. {$e->getMessage()}"));
    }
}


    /*New*/

// pdf

    //     public function generate_pdf1(){
    //     // echo $this->input->get('id');
    //      $selectedCheckboxes = $this->input->get('checkboxes');
    //     // echo  $this->input->get('checkboxes');
    //       $checkboxValues = explode(',', $selectedCheckboxes);

    //     /*New */
	//         $id = $this->input->get('id');
	// 	   //$data['user_data'] = $this->Manager_model->getUserDetails($id);
	// 	   $user_data = $this->Manager_model->getUserDetails($id);
	//         $member_id = $id;
	// 			      // Fetch data from the main Medical History table based on id and member_id
	//         $medical_history = $this->Admin_model->get_medical_history($member_id);//
			
	// 	    if ($medical_history) {
	// 	        // Fetch data from child tables based on medical_history_id and member_id
	// 	        $previous_medical_conditions = $this->Admin_model->get_previous_medical_conditions($medical_history->id, $member_id);
	// 	        $surgeries_procedures = $this->Admin_model->get_surgeries_procedures($medical_history->id, $member_id);
	// 	        $allergies = $this->Admin_model->get_allergies($medical_history->id, $member_id);
	// 	        $current_medications = $this->Admin_model->get_current_medications($medical_history->id, $member_id);
	// 	        $family_medical_history = $this->Admin_model->get_family_medical_history($medical_history->id, $member_id);
	// 	        $immunization_history = $this->Admin_model->get_immunization_history($medical_history->id, $member_id);
	// 	        $previous_medical_test_results = $this->Admin_model->get_previous_medical_test_results($medical_history->id, $member_id);
	// 	        $current_symptoms_concerns = $this->Admin_model->get_current_symptoms_concerns($medical_history->id, $member_id);

	// 	        // Prepare data to be sent to the view
	// 	        $data = array(
	// 	            'user_data' => $user_data,
	// 	            'medical_history' => $medical_history,
	// 	            'previous_medical_conditions' => $previous_medical_conditions,
	// 	            'surgeries_procedures' => $surgeries_procedures,
	// 	            'allergies' => $allergies,
	// 	            'current_medications' => $current_medications,
	// 	            'family_medical_history' => $family_medical_history,
	// 	            'immunization_history' => $immunization_history,
	// 	            'previous_medical_test_results' => $previous_medical_test_results,
	// 	            'current_symptoms_concerns' => $current_symptoms_concerns
	// 	        );
	// 	        // echo "<pre>";
	// 	        // print_r($data); die();
			
	// 	  }else{
	// 	  	    $previous_medical_conditions = '';
	// 	        $surgeries_procedures = '';
	// 	        $allergies = '';
	// 	        $current_medications = '';
	// 	        $family_medical_history = '';
	// 	        $immunization_history = '';
	// 	        $previous_medical_test_results = '';
	// 	        $current_symptoms_concerns = '';
	// 	  	 $data = array(
	// 	            'user_data' => $user_data,
	// 	            'medical_history' => $medical_history,
	// 	            'previous_medical_conditions' => $previous_medical_conditions,
	// 	            'surgeries_procedures' => $surgeries_procedures,
	// 	            'allergies' => $allergies,
	// 	            'current_medications' => $current_medications,
	// 	            'family_medical_history' => $family_medical_history,
	// 	            'immunization_history' => $immunization_history,
	// 	            'previous_medical_test_results' => $previous_medical_test_results,
	// 	            'current_symptoms_concerns' => $current_symptoms_concerns
	// 	        );
	// 	  }
	//         /*New*/
    
	// 		$this->load->library('Pdf');
	
	// 		$pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
	// 		$pdf->SetCreator(PDF_CREATOR);
	// 		$pdf->SetAuthor('');
	// 		$pdf->SetTitle('Medical History');
	// 		$pdf->SetSubject('ReportReport');
	// 		$pdf->SetKeywords('TCPDF, PDF, example, test, guide');
	// 		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
	// 		$pdf->setFooterData(array(0, 64, 0), array(0, 64, 128));
	// 		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
	// 		//$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
	// 		$pdf->SetFooterMargin(10); // Adjust the footer margin here (10mm in this example)
	// 		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
	// 		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
	// 		//$pdf->setPrintHeader(false);//new
	// 		$pdf->SetMargins(10, 40, 10, 0);
			
	// 		$pdf->setCellPaddings(0, 0, 0, 0);
	// 		$pdf->SetFont('dejavusans', '', 10);

	// 		//new
		
	
	// 		//new
	
	// 		$pdf->AddPage();

			
    //      $data['checkboxValues'] = $checkboxValues;//seected values

    //      $html =   $this->load->view('Backend/pdf/medical_history_pdf_view', $data, true);
	
    //     //$pdf->Cell(0, 50,'This is system generated payslip', 0, $ln=0, 'C', 0, '', 0, false,  'T', 'M');
	// 	//$pdf->SetY(50);
    //     $filename = "Report";

		

    //     //$pdf->writeHTML($html, true, false, true, false, '');
	// 	$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

    //     // reset pointer to the last page
    //    // $pdf->lastPage();

    //     ob_end_clean();
	// 	$pdf->end = 'true';
    //     //Close and output PDF document
    //     $pdf->Output($filename.'.pdf', 'I');
    //     }

		public function generate_pdf()
		{
			$selectedCheckboxes = $this->input->get('checkboxes');
			// echo  $this->input->get('checkboxes');
			  $checkboxValues = explode(',', $selectedCheckboxes);
	
			/*New */
				$id = $this->input->get('id');
			   //$data['user_data'] = $this->Manager_model->getUserDetails($id);
			   $user_data = $this->Manager_model->getUserDetails($id);
				$member_id = $id;
						  // Fetch data from the main Medical History table based on id and member_id
				$medical_history = $this->Admin_model->get_medical_history($member_id);//
			    
				$d_id = $user_data->doctor;
				$doctor = $this->Doctor_model->getDoctorByID($d_id );
				if ($medical_history) {
					// Fetch data from child tables based on medical_history_id and member_id
					$previous_medical_conditions = $this->Admin_model->get_previous_medical_conditions($medical_history->id, $member_id);
					$surgeries_procedures = $this->Admin_model->get_surgeries_procedures($medical_history->id, $member_id);
					$allergies = $this->Admin_model->get_allergies($medical_history->id, $member_id);
					$current_medications = $this->Admin_model->get_current_medications($medical_history->id, $member_id);
					$family_medical_history = $this->Admin_model->get_family_medical_history($medical_history->id, $member_id);
					$immunization_history = $this->Admin_model->get_immunization_history($medical_history->id, $member_id);
					$previous_medical_test_results = $this->Admin_model->get_previous_medical_test_results($medical_history->id, $member_id);
					$current_symptoms_concerns = $this->Admin_model->get_current_symptoms_concerns($medical_history->id, $member_id);
	
					// Prepare data to be sent to the view
					$data = array(
						'user_data' => $user_data,
						'medical_history' => $medical_history,
						'previous_medical_conditions' => $previous_medical_conditions,
						'surgeries_procedures' => $surgeries_procedures,
						'allergies' => $allergies,
						'current_medications' => $current_medications,
						'family_medical_history' => $family_medical_history,
						'immunization_history' => $immunization_history,
						'previous_medical_test_results' => $previous_medical_test_results,
						'current_symptoms_concerns' => $current_symptoms_concerns
					);
					// echo "<pre>";
					// print_r($data); die();
				
			  }else{
					  $previous_medical_conditions = '';
					$surgeries_procedures = '';
					$allergies = '';
					$current_medications = '';
					$family_medical_history = '';
					$immunization_history = '';
					$previous_medical_test_results = '';
					$current_symptoms_concerns = '';
				   $data = array(
						'user_data' => $user_data,
						'medical_history' => $medical_history,
						'previous_medical_conditions' => $previous_medical_conditions,
						'surgeries_procedures' => $surgeries_procedures,
						'allergies' => $allergies,
						'current_medications' => $current_medications,
						'family_medical_history' => $family_medical_history,
						'immunization_history' => $immunization_history,
						'previous_medical_test_results' => $previous_medical_test_results,
						'current_symptoms_concerns' => $current_symptoms_concerns
					);
			  }
		    
			//--------
			$this->load->library('MYPDF1');
	
			$pdf = new MYPDF1(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'utf-8', false);
	
			$pdf->SetCreator(PDF_CREATOR);
			$pdf->SetAuthor('Appointment Confirmation');
			$pdf->SetTitle('Appointment Confirmation');
			$pdf->SetSubject('Appointment Confirmation');
			//$pdf->SetKeywords('TCPDF, PDF, example, test, codeigniter');
	
			// set default header data
			$pdf->SetHeaderData(PDF_HEADER_LOGO, "", PDF_HEADER_TITLE, PDF_HEADER_STRING);
	
			// set header and footer fonts
			$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
			$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
	
			$pdf->SetHeaderMargin(PDF_MARGIN_HEADER); 
	
			$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
	
			// $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
			// $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
			$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
			
			// set auto page breaks
			$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
	
			// set image scale factor
			$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

	
		   $pdf->id = $user_data->member_id;
	
	
			// add a page
			$pdf->AddPage();
	
	
					// Calculate the center position
			$centerX = $pdf->getPageWidth() / 2;
			$centerY = $pdf->getPageHeight() - 130; // Adjust the Y position as needed for spacing
			// Set the line color to black
				
			$data['checkboxValues'] = $checkboxValues;//seected values

			$html =   $this->load->view('Backend/pdf/medical_history_pdf_view', $data, true);
	   
		   //$pdf->Cell(0, 50,'This is system generated payslip', 0, $ln=0, 'C', 0, '', 0, false,  'T', 'M');
		   //$pdf->SetY(50);
		   $filename = "Report";
         
		   
		   
   
		   //$pdf->writeHTML($html, true, false, true, false, '');
		   $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
   
		   // reset pointer to the last page
		  // $pdf->lastPage();

		  // Check if it's the last page
			if ($pdf->getPage() === $pdf->getNumPages()) {
				// Add a content cell before the footer
				if($doctor->name){
					$pdf->Cell(0, 3, ' '.$doctor->name, 0, 1, 'L');
					$pdf->Cell(0, 3, 'AssistHealth Doctor', 0, 1, 'L');
				}
			
		
		   
			}

   
		   ob_end_clean();
	       ob_clean();

		   
			
			//Close and output PDF document
			$pdf->Output('Medical_History.pdf', 'I');
		}

		


        /*New*/
        /*Doctors*/

      	//doctors pages
		public function Add_Doctor()
		{
		    $this->checkLogin(); // Add this line to check login
		    
		    $this->load->view('Backend/admin/doctors/add-doctor');
		}

		public function All_Doctors()
		{
		    $this->checkLogin(); // Add this line to check login
		    $navigators = $this->Doctor_model->getDoctors();
	        $data['navigators'] = $navigators;
	      
		    $this->load->view('Backend/admin/doctors/all-doctors',$data);
		}

		public function  Assign_Doctors()
		{
			$this->checkLogin();
			//$data['members'] = $this->Manager_model->getAllMembers();
			$data['members'] = $this->Manager_model->getAllMemberslist();
	
			$data['doctors'] = $this->Doctor_model->getAllDoctors();
			$this->load->view('Backend/admin/doctors/assign-doctors',$data);
		}
		public function Subprofile_Assign_Doctors()
		{
			$this->checkLogin();
			$id = $this->input->get('id');
			$data['members'] = $this->Manager_model->getSubprofile($id);
			$data['doctors'] = $this->Doctor_model->getAllDoctors();
			$this->load->view('Backend/admin/doctors/subprofile-assign-doctors',$data);
		}
	//doctors pages

	  public function Save_doctor()
	{
	    if ($this->session->userdata('user_login_access') != False) {
	        $name = $this->input->post('firstname');
	        $email = $this->input->post('email');
	        $gender = $this->input->post('gender');
	        $mobileNo = $this->input->post('number');
	        $languageSpoken = $this->input->post('language');
	      //  print_r($languageSpoken); die();
	        $intro = $this->input->post('address');
	        $password = $this->input->post('password');
	        $qualification = $this->input->post('qualification');
	        $medical_council_no = $this->input->post('medical_council_no');
             // Hash the password
           $hashed_password = password_hash($password, PASSWORD_DEFAULT);
	        $this->load->library('form_validation');
	        $this->form_validation->set_error_delimiters();
	        $this->form_validation->set_rules('firstname', 'Name', 'trim|required|max_length[255]|xss_clean');
	        $this->form_validation->set_rules('email', 'Email ID', 'trim|required|max_length[255]|valid_email|xss_clean');
	        // Add more validation rules as needed for other fields

	        if ($this->form_validation->run() == FALSE) {
	            echo validation_errors();
	            // Handle validation errors
	        } else {
	        	// Check if the name already exists in the manager table
		        // $checkdata = array('email' => $email, 'isActive' => 1);
		        // if (check_field_exists($checkdata, 'manager')) {
		        //     echo json_encode(array('status' => 'error', 'message' => '<p>This Email is already exists</p>'));
		        // } else {
			if ($this->Doctor_model->is_email_duplicate($email) && $this->Doctor_model->is_number_duplicate($number) ) {
			$response = array(
				'status' => 'error',
				'message' => 'Email address and number already exist'
			);
			echo json_encode($response);
			} elseif ($this->Doctor_model->is_email_duplicate($email) ) {
				
					echo json_encode(array('status' => 'error', 'message' => 'Email address already exists'));
				} elseif ($this->Doctor_model->is_number_duplicate($number) ) {
				
					echo json_encode(array('status' => 'error', 'message' => 'Number already exists'));
			} else {

		     if($_FILES['file_url']['name']){
            $file_name = $_FILES['file_url']['name'];
			$fileSize = $_FILES["file_url"]["size"]/1024;
			$fileType = $_FILES["file_url"]["type"];
			$new_file_name='';
            $new_file_name .= $file_name;

            $config = array(
                'file_name' => $new_file_name,
                'upload_path' => "./assets/uploads/doctor_profile",
                'allowed_types' => "gif|jpg|png|jpeg|pdf|doc|docx",
                'overwrite' => False,
                'max_size' => "50720000"
            );
            //create directory
              if(!is_dir($config['upload_path'])) mkdir($config['upload_path'], 0777, TRUE);
    
            $this->load->library('Upload', $config);
            $this->upload->initialize($config);                
            if (!$this->upload->do_upload('file_url')) {
                echo $this->upload->display_errors();
                #redirect("notice/All_notice");
			}
   
			else {

                $path = $this->upload->data();
                $img_url = $path['file_name'];
	            $data = array(
	                'name' => $name,
	                'email' => $email,
	                'gender' => $gender,
	                'mobile_no' => $mobileNo,
	                'profile_picture'=>$img_url,
	                'language_spoken' => implode(',', $languageSpoken),
	                'intro' => $intro,
	                'password' => $hashed_password,
	                'qualification' => $qualification,
	                'medical_council_no' => $medical_council_no,

	            );
	            
	        }
	      }else{

	      	 $data = array(
	                'name' => $name,
	                'email' => $email,
	                'gender' => $gender,
	                'mobile_no' => $mobileNo,
	              
	                'language_spoken' => implode(',', $languageSpoken),
	                'intro' => $intro,
	                'password' => $hashed_password,
	                 'qualification' => $qualification,
	                'medical_council_no' => $medical_council_no,
	            );
	      	 

	      }

	       //print_r($data); die();
	            // Save the data to the manager table using your model function
	            $success = $this->Doctor_model->saveDoctorData($data); //Doctor_model

	            if ($success) {
	            	$number = $mobileNo;
	            	$this->send_mail_manager($name,$email,$number,$password);
	                echo json_encode(array('status' => 'success', 'message' =>'Doctor saved successfully'));
	            } else {
	                echo json_encode(array('status' => 'error', 'message' => 'Failed to save manager'));
	            }
	     }
	    }
	    } else {
	        redirect(base_url(), 'refresh');
	    }
	}
	 public function Update_doctor()
		{
		    if ($this->session->userdata('user_login_access') != False) {
		    	$id = $this->input->post('id');
		        $name = $this->input->post('firstname');
		        $email = $this->input->post('email');
		        $gender = $this->input->post('gender');
		        $mobileNo = $this->input->post('number');
		        $languageSpoken = $this->input->post('language');
		      //  print_r($languageSpoken); die();
		        $intro = $this->input->post('address');
		        $password = $this->input->post('password');
	             // Hash the password
	           $hashed_password = password_hash($password, PASSWORD_DEFAULT);
	           	        $qualification = $this->input->post('qualification');
	        $medical_council_no = $this->input->post('medical_council_no');
		        $this->load->library('form_validation');
		        $this->form_validation->set_error_delimiters();
		        $this->form_validation->set_rules('firstname', 'Name', 'trim|required|max_length[255]|xss_clean');
		        $this->form_validation->set_rules('email', 'Email ID', 'trim|required|max_length[255]|valid_email|xss_clean');
		        // Add more validation rules as needed for other fields

		        if ($this->form_validation->run() == FALSE) {
		            echo validation_errors();
		            // Handle validation errors
		        } else {
		       

			     if($_FILES['file_url']['name']){
	            $file_name = $_FILES['file_url']['name'];
				$fileSize = $_FILES["file_url"]["size"]/1024;
				$fileType = $_FILES["file_url"]["type"];
				$new_file_name='';
	            $new_file_name .= $file_name;

	            $config = array(
	                'file_name' => $new_file_name,
	                'upload_path' => "./assets/uploads/doctor_profile",
	                'allowed_types' => "gif|jpg|png|jpeg|pdf|doc|docx",
	                'overwrite' => False,
	                'max_size' => "50720000"
	            );
	            //create directory
	              if(!is_dir($config['upload_path'])) mkdir($config['upload_path'], 0777, TRUE);
	    
	            $this->load->library('Upload', $config);
	            $this->upload->initialize($config);                
	            if (!$this->upload->do_upload('file_url')) {
	                echo $this->upload->display_errors();
	                #redirect("notice/All_notice");
				}
	   
				else {

	                $path = $this->upload->data();
	                $img_url = $path['file_name'];
		            $data = array(
		                'name' => $name,
		                'email' => $email,
		                'gender' => $gender,
		                'mobile_no' => $mobileNo,
		                'profile_picture'=>$img_url,
		                'language_spoken' => implode(',', $languageSpoken),
		                'intro' => $intro,
		                 'qualification' => $qualification,
	                'medical_council_no' => $medical_council_no,
		               // 'password' => $hashed_password
		            );
		              if ($password) {
				    $data["password"] = $hashed_password;
				}

		            
		        }
		      }else{

		      	 $data = array(
		                'name' => $name,
		                'email' => $email,
		                'gender' => $gender,
		                'mobile_no' => $mobileNo,
		               
		                'language_spoken' => implode(',', $languageSpoken),
		                'intro' => $intro,
		               'qualification' => $qualification,
	                'medical_council_no' => $medical_council_no,
		            );
		      	   if ($password) {
				    $data["password"] = $hashed_password;
				}

		      }

		      // Save the data to the manager table using your model function
		            $success = $this->Doctor_model->UpdateDoctorData($data,$id);

		            if ($success) {
		                
		                  $data["id"] = $id;
		                echo json_encode(array('status' => 'success', 'message' => 'Doctor updated successfully','member'=>$data));
		            } else {
		                echo json_encode(array('status' => 'error', 'message' => 'Failed to update manager'));
		            }


		    // }
		    }
		    } else {
		        redirect(base_url(), 'refresh');
		    }
		}
	  //update modal get data
	   public function getDoctorByID() {
	        // Get the ID parameter from the AJAX request
	        $id = $this->input->get('id');
	        $navigator = $this->Doctor_model->getDoctorByID($id);
	        
	        // Prepare the response data as an array
	        $response = array(
	            'id' => $navigator->id,
	            'name' => $navigator->name,
	            'email' => $navigator->email,
	            'gender' => $navigator->gender,
	            'mobile_no' => $navigator->mobile_no,
	            'intro' => $navigator->intro,
	            'language_spoken' => $navigator->language_spoken,
	            'profile_picture' => $navigator->profile_picture,
	                'qualification' => $navigator->qualification,
	                'medical_council_no' => $navigator->medical_council_no,
	        );
	        
	        // Send the response as JSON
	        echo json_encode($response);
	    }

	    //Doctor delete
	     public function Doctordelete(){
	        if($this->session->userdata('user_login_access') != False) { 
	            $id = $this->input->post('id');
	            $result_del = $this->Doctor_model->Docdelete($id);//
	          if($result_del){
	                echo json_encode(array('status'=>'success','message'=> 'Deleted Successfully'));
	               
	            }else{
	                 echo json_encode(array('status'=>'failed','message'=> 'Not deleted'));
	             
	            }
	           
	            }
	        else{
	            redirect(base_url() , 'refresh');
	        }       
	     }
      public function Add_Assign_Doctors()
	{
		//$this->checkLogin();
		if ($this->session->userdata('user_login_access') != False) {
             //die();
		    	$id = $this->input->post('id');
		    	$name = $this->input->post('name');
				$email = $this->input->post('email');
				$gender = $this->input->post('gender');
				$number = $this->input->post('number');

				$address = $this->input->post('address');
				$password = $this->input->post('password');
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                 $doctor = $this->input->post('doctor');

                 	$member_id = $this->input->post('member_id');

		        $this->load->library('form_validation');
		        $this->form_validation->set_error_delimiters();
		        $this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[255]|xss_clean');
				if(!$this->input->post('subprofile')){
					$this->form_validation->set_rules('email', 'Email ID', 'trim|required|max_length[255]|valid_email|xss_clean');
					}
		        // Add more validation rules as needed for other fields

                 $doctor_data =  $this->Doctor_model->getDoctorDetails($doctor);



		        if ($this->form_validation->run() == FALSE) {
		            echo validation_errors();
		            // Handle validation errors
		        } else {
		        
          
		

		      	$data = array(
					    'name' => $name,
					    'email' => $email,
					    'gender' => $gender,
					    'number' => $number,
				        'doctor' => $doctor,
				         'doctor_status'=>'1'
					    
					);
		      	if ($password) {
					    $data["password"] = $hashed_password;
					}
		      }
               
            //  print_r($data);die();

		      // Save the data to the manager table using your model function
		            $success = $this->Manager_model->UpdateMember($data,$id);// print_r($success);die();

		            if ($success) {

		            	 /*Notification*/

		                $filetitle = 'New member assignment: <span class="txt-name">'.$name .'-'.$member_id.'</span>.';
		               // foreach ($admin as $data) {
		                $data = array(
		                'doctor_id' => $doctor,
		                'message' => $filetitle,
		                'created_at' => date('Y-m-d H:i:s'),
		                'status' => 'unread',
		                'icon' => 'fa fa-comments-o',
		                'color' => 'blue-bgcolor',
		                 'url' => 'Doctor/My_Members'
		                );
		                $this->db->insert('doctor_notifications', $data);
		                //}

					      	$data = array(
								    'name' => $name,
								    'email' => $email,
								    'gender' => $gender,
								    'number' => $number,
							
								     'doctor' => $doctor,
								    
								);
			                
			              $data["id"] = $id;
			                $data['manager_name'] =    $doctor_data->name;


		                echo json_encode(array('status' => 'success', 'message' => 'Data Added successfully','member'=>$data));

                        $this->send_mail_assign_memeber($doctor_data->email,$doctor_data->name,$name,$email,$number);
                        
		            } else {
		            	
		                echo json_encode(array('status' => 'error', 'message' => 'Failed to update data'));
		            }

		   // }
		   // }
		    } else {
		        redirect(base_url(), 'refresh');
		    }
	}
  //new AppointmentConfirmation
  public function AppointmentConfirmation()
  {
	  $this->checkLogin(); // Add this line to check login
	  $data['members'] = $this->Manager_model->getOngoingMembers();
	   $data['submembers'] = $this->Manager_model->getSubprofileOngoingMembers();
	  $this->load->view('Backend/admin/confirm-appointment',$data);
  }
  public function Appointmentpdf()
	{

		$name = $this->input->post('name');
		$address = $this->input->post('address');
		$number = $this->input->post('number');
		$services =  ucwords($this->input->post('services'));
		$appointment_date = $this->input->post('appointment_date');
		$appointment_time = $this->input->post('appointment_time');
		$doctor_name = $this->input->post('doctor_name');
		$specialization = $this->input->post('specialization');
		$clinic_name = $this->input->post('clinic_name');
		$clinic_address = $this->input->post('clinic_address');

		// Now you can use these individual variables to handle the form data in CodeIgniter.

		$this->load->library('MYPDF');

		$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'utf-8', false);

		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Appointment Confirmation');
		$pdf->SetTitle('Appointment Confirmation');
		$pdf->SetSubject('Appointment Confirmation');
		$pdf->SetKeywords('TCPDF, PDF, example, test, codeigniter');

		// set default header data
		$pdf->SetHeaderData(PDF_HEADER_LOGO, "", PDF_HEADER_TITLE, PDF_HEADER_STRING);

		// set header and footer fonts
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));


		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		// $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		// set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		// set font
		// $pdf->SetFont('times', 'BI', 12);
		$pdf->SetMargins(0, 10, 0, 0);
		  // Remove footer margin
        $pdf->SetFooterMargin(0);

		// Disable footer printing
        $pdf->setPrintFooter(false);


        

		// add a page
		$pdf->AddPage();

				// Calculate the center position
		$centerX = $pdf->getPageWidth() / 2;
		$centerY = $pdf->getPageHeight() - 130; // Adjust the Y position as needed for spacing
        // Set the line color to black
        $pdf->SetDrawColor(0, 0, 0); // RGB values for black
        // Set the line thickness
       $pdf->SetLineWidth(1);
		// Draw a centered bottom border using Line method
		$pdf->Line($centerX - 30, $centerY, $centerX + 30, $centerY);


		// set some text to print
		$txt = <<<EOD
		    <br><br><br><br><br><br>
		<h1 style="text-align: center;text-decoration: underline;">Appointment Confirmation Form</h1>
	
		<br><br>			
		<table>
			<tr>
			<td style="width:10%;"></td>
				<td style="width:10%;font-size:16px;">Dear :</td>
				<td style="width:50%;background-color:#009CB7;font-size:14px;color:white">$name</td>
				<td style="width:10%;"></td>
			</tr> <br>
			<tr>
			    <td style="width:10%;"></td>
				<td style="width:80%;font-size:15px;">We are pleased to inform you that your doctor appointment has been confirmed. Below are the details of your appointment:</td>
				<td style=""></td>
				<td style="width:10%;"></td>
			</tr>
		
			<br>
			
			<tr>
			<td style="width:10%;"></td>
				<td style="width:30%;font-size:16px;">Appointment Details :</td>
				<td style="width:50%;background-color:#009CB7;font-size:14px;color:white; text-transform: capitalize;">$services</td>
				<td style="width:10%;"></td>
			</tr>
			</table>
			<br><br>
			<table>
			<tr>
			<td style="width:10%;"></td>
				<td style="width:30%;font-size:16px;">Appointment Date :</td>
				<td style="width:50%;background-color:#009CB7;font-size:14px;color:white">$appointment_date</td>
				<td style="width:10%;"></td>
			</tr>
			</table>
			<br><br>
			<table>
			<tr>
			<td style="width:10%;"></td>
				<td style="width:30%;font-size:16px;">Appointment Time :</td>
				<td style="width:50%;background-color:#009CB7;font-size:14px;color:white">$appointment_time</td>
				<td style="width:10%;"></td>
			</tr>
			</table>
			<br><br>
			<table>
			<tr>
			<td style="width:10%;"></td>
				<td style="width:30%;font-size:16px;">Doctor's Name :</td>
				<td style="width:50%;background-color:#009CB7;font-size:14px;color:white">$doctor_name</td>
				<td style="width:10%;"></td>
			</tr>
			</table>
			<br><br>
			<table>
			<tr>
			<td style="width:10%;"></td>
				<td style="width:30%;font-size:16px;">Doctor's Specialization :</td>
				<td style="width:50%;background-color:#009CB7;font-size:14px;color:white">$specialization</td>
				<td style="width:10%;"></td>
			</tr>
			</table>
			<br><br>
			<table>
			<tr>
			<td style="width:10%;"></td>
				<td style="width:30%;font-size:16px;">Clinic/Hospital Name :</td>
				<td style="width:50%;background-color:#009CB7;font-size:14px;color:white">$clinic_name </td>
				<td style="width:10%;"></td>
			</tr>
			</table>
			<br><br>
			<table>
			<tr>
			<td style="width:10%;"></td>
				<td style="width:30%;font-size:16px;">Clinic/Hospital Address :</td>
				<td style="width:50%;background-color:#009CB7;font-size:14px;color:white">$clinic_address</td>
				<td style="width:10%;"></td>
			</tr>
			</table>
			
			

		
			
		EOD;

		// print a block of text using Write()
		$pdf->writeHTML($txt, true, false, true, false, '');
       
		       // Additional information table
		$infoTable = <<<EOD
		 <br><br><br>
		 <table>
			<tr>
			<td style="width:10%;"></td>
				<td style="width:50%;font-size:15px;">Please note the following important information:</td>
				<td style="width:30%;"></td>
				<td style="width:10%;"></td>
			</tr>
			</table>
			<br><br>
			 <table>
			<tr>
			    <td style="width:10%;"></td>
				<td style="width:70%;font-size:15px;">Please arrive at the clinic/hospital at least 15 minutes before your scheduled</td>
				<td style="width:10%;"></td>
				<td style="width:10%;"></td>
			</tr>
			<tr>
			<td style="width:10%;"></td>
				<td style="width:70%;font-size:15px;">appointment time to complete any necessary paperwork or registration processes.</td>
				<td style="width:10%;"></td>
				<td style="width:10%;"></td>
			</tr>
			<br>
			 <table>
			<tr>
			    <td style="width:10%;"></td>
				<td style="width:80%;font-size:15px;">If you need to cancel or reschedule your appointment, kindly inform us at least 24</td>
				<td style="width:;"></td>
				<td style="width:10%;"></td>
			</tr>
			<tr>
			<td style="width:10%;"></td>
				<td style="width:70%;font-size:15px;">hours in advance.</td>
				<td style="width:10%;"></td>
				<td style="width:10%;"></td>
			</tr>
			<br>
			
			<tr>
			    <td style="width:10%;"></td>
				<td style="width:80%;font-size:15px;">For any questions or assistance regarding your appointment, please contact our</td>
				<td style="width:;"></td>
				<td style="width:10%;"></td>
			</tr>
			<tr>
			<td style="width:10%;"></td>
				<td style="width:70%;font-size:15px;">AssistHealth team at <strong>9611232519</strong> or <a href="mailto:support@assisthealth.com" style="color:black;text-decoration: none;">support@assisthealth.com.</a></td>
				<td style="width:10%;"></td>
				<td style="width:10%;"></td>
			</tr>

			<br>	
			<tr>
			<td style="width:10%;"></td>
				<td style="width:70%;font-size:15px;">We look forward to helping you with your healthcare needs and ensuring a smooth and beneficial doctor consultation.</td>
				<td style="width:10%;"></td>
				<td style="width:10%;"></td>
			</tr>
			
			<tr>
			
			<br>
			<td style="width:10%;"></td>
				<td style="width:70%;font-size:16px;">Best regards,<br>Team AssistHealth</td>
				<td style="width:10%;"></td>
				<td style="width:10%;"></td>
			</tr>
			</table>
			
		EOD;
	   


		// Print the additional information table
		$pdf->writeHTML($infoTable, true, false, true, false, '');

		

		// ---------------------------------------------------------
		 ob_clean();
		//Close and output PDF document
		$pdf->Output('AppointmentConfirmation.pdf', 'I');

		echo '<script type="text/javascript">
        window.open("' . base_url('Admin/Appointmentpdf') . '", "_blank");
      </script>';
	}

	// Calander view
	 public  function load()
     {

 
	$appointment_counts = $this->Admin_model->getOngoingAppointmentCountsByDate();
	$data = array();
    $j = 1;
	foreach ($appointment_counts as $row) {
	    if ($row->appointment_count > 1) {
	        $data[] = array(
	            'id' => $j,
	            'title' => "Ongoing Appointments : "."  ". $row->appointment_count,
	            'start' => $row->appointment_date,
	            'end' => $row->appointment_date,
	            'className' => 'bg-info',
	        );
	        $j++;
	    }
	    // Include data for all dates, even if there's only one appointment
	    else {
	        $data[] = array(
	            'id' => $j,
	            'title' =>  "Ongoing Appointment : "."  ". $row->appointment_count,
	            'start' => $row->appointment_date,
	            'end' => $row->appointment_date,
	            'className' => 'bg-info',
	        );
	        $j++;
	    }
       }
       //New
     $pending_appointment_counts = $this->Admin_model->getPendingAppointmentCountsByDate();
	//$data = array();
    $j = 1;
	foreach ($pending_appointment_counts as $row) {
	    if ($row->appointment_count > 1) {
	        $data[] = array(
	            'id' => $j,
	            'title' => "Pending Appointments : "."  ". $row->appointment_count,
	            'start' => $row->appointment_date,
	            'end' => $row->appointment_date,
	            'className' => 'bg-warning',
	        );
	        $j++;
	    }
	    // Include data for all dates, even if there's only one appointment
	    else {
	        $data[] = array(
	            'id' => $j,
	            'title' =>  "Pending Appointment : "."  ". $row->appointment_count,
	            'start' => $row->appointment_date,
	            'end' => $row->appointment_date,
	            'className' => 'bg-warning',
	        );
	        $j++;
	    }
       }

      echo json_encode($data);
   
  }

  //ID card
	public function GenerateIDCard()
	{
	$this->checkLogin();
	$data['allmembers'] = $this->Manager_model->getAllMembers();
	$this->load->view('Backend/admin/IdCard/ad-member-idcard',$data);
	}



     // ------------------------------ December --------------------------------------------------------- //
     // ------------------------------ Internal Doctors ---------------------------------------------------- //

	public function Add_InternalDoctor()
	{
	    $this->checkLogin(); // Add this line to check login


	    
	    $this->load->view('Backend/admin/internal_doctors/add-internal-doctor');
	}

	public function All_InternalDoctors()
	{
	    $this->checkLogin(); // Add this line to check login
	    $navigators = $this->Doctor_model->getAll_InternalDoctors();
        $data['navigators'] = $navigators;
      
	    $this->load->view('Backend/admin/internal_doctors/all-internal-doctors',$data);
	}

	  public function Save_internal_doctor()
	{
	    if ($this->session->userdata('user_login_access') != False) {
	        $name = $this->input->post('firstname');
		    $gender = $this->input->post('gender');
		    $qualification = $this->input->post('qualification');
		    $speciality = $this->input->post('speciality');
		    $specializedIn = $this->input->post('specializedIn');
		    $experience = $this->input->post('experience');
		    $address = $this->input->post('address');
		    $timing = $this->input->post('timing');
		    $fees = $this->input->post('fees');
		    $number = $this->input->post('number');
		    $hospital = $this->input->post('hospital');

		    // echo $speciality;
		    // echo $specializedIn;

		    //    print_r($_POST);
		    //  die();
             // Hash the password
          // $hashed_password = password_hash($password, PASSWORD_DEFAULT);
	        $this->load->library('form_validation');
	        $this->form_validation->set_error_delimiters();
	        $this->form_validation->set_rules('firstname', 'Name', 'trim|required|max_length[255]|xss_clean');
	       // $this->form_validation->set_rules('email', 'Email ID', 'trim|required|max_length[255]|valid_email|xss_clean');
	        // Add more validation rules as needed for other fields

	        if ($this->form_validation->run() == FALSE) {
	            echo validation_errors();
	            // Handle validation errors
	        } else {
	        

			// if ($this->Doctor_model->is_email_duplicate($email) && $this->Doctor_model->is_number_duplicate($number) ) {
			// $response = array(
			// 	'status' => 'error',
			// 	'message' => 'Email address and number already exist'
			// );
			// echo json_encode($response);
			// } else

           //$this->Doctor_model->is_email_duplicate($email)
			if ( $this->Doctor_model->is_number_duplicate($number)) {
				
					echo json_encode(array('status' => 'error', 'message' => 'Email address already exists'));
				// } elseif ($this->Doctor_model->is_number_duplicate($number) ) {
				
				// 	echo json_encode(array('status' => 'error', 'message' => 'Number already exists'));
			} else {

		     if($_FILES['file_url']['name']){
            $file_name = $_FILES['file_url']['name'];
			$fileSize = $_FILES["file_url"]["size"]/1024;
			$fileType = $_FILES["file_url"]["type"];
			$new_file_name='';
            $new_file_name .= $file_name;

            $config = array(
                'file_name' => $new_file_name,
                'upload_path' => "./assets/uploads/doctor_profile",
                'allowed_types' => "gif|jpg|png|jpeg|pdf|doc|docx",
                'overwrite' => False,
                'max_size' => "50720000"
            );
            //create directory
              if(!is_dir($config['upload_path'])) mkdir($config['upload_path'], 0777, TRUE);
    
            $this->load->library('Upload', $config);
            $this->upload->initialize($config);                
            if (!$this->upload->do_upload('file_url')) {
                echo $this->upload->display_errors();
                #redirect("notice/All_notice");
			}
   
			else {

                $path = $this->upload->data();
                $img_url = $path['file_name'];
	         
	            $data = array(
				    'name' => $name,
				    'gender' => $gender,
				    'qualification' => $qualification,
				    'speciality' => $speciality,
				    'specialized_in' => $specializedIn,
				    'experience' => $experience,
				    'address' => $address,
				    'timing' => $timing,
				    'fees' => $fees,
				    'contact_number' => $number,
				    'hospital' => $hospital, // Assuming you've processed the uploaded file as shown in the previous response
				    'profile_picture' => $img_url, // Assuming you've processed the uploaded file as shown in the previous response
				);

	            
	        }
	      }else{

	         $data = array(
				    'name' => $name,
				    'gender' => $gender,
				    'qualification' => $qualification,
				    'speciality' => $speciality,
				    'specialized_in' => $specializedIn,
				    'experience' => $experience,
				    'address' => $address,
				    'timing' => $timing,
				    'fees' => $fees,
				    'contact_number' => $number,
				    'hospital' => $hospital,
				);
	      	 

	      }

	      // print_r($data); die();
	            // Save the data to the manager table using your model function
	            $success = $this->Doctor_model->save_InternalDoctor($data); //Doctor_model

	            if ($success) {
	            	$number = $mobileNo;
	            	//$this->send_mail_manager($name,$email,$number,$password);
	                echo json_encode(array('status' => 'success', 'message' =>'Doctor saved successfully'));
	            } else {
	                echo json_encode(array('status' => 'error', 'message' => 'Failed to save manager'));
	            }
	     }
	    }
	    } else {
	        redirect(base_url(), 'refresh');
	    }
	}
		 public function Update_internal_doctor()
		{
		    if ($this->session->userdata('user_login_access') != False) {
		    	$id = $this->input->post('id');
		         $name = $this->input->post('firstname');
			    $gender = $this->input->post('gender');
			    $qualification = $this->input->post('qualification');
			    $speciality = $this->input->post('speciality');
			    $specializedIn = $this->input->post('specializedIn');
			    $experience = $this->input->post('experience');
			    $address = $this->input->post('address');
			    $timing = $this->input->post('timing');
			    $fees = $this->input->post('fees');
			    $number = $this->input->post('number');


		        $this->load->library('form_validation');
		        $this->form_validation->set_error_delimiters();
		        $this->form_validation->set_rules('firstname', 'Name', 'trim|required|max_length[255]|xss_clean');
		        //$this->form_validation->set_rules('email', 'Email ID', 'trim|required|max_length[255]|valid_email|xss_clean');
		        // Add more validation rules as needed for other fields

		        if ($this->form_validation->run() == FALSE) {
		            echo validation_errors();
		            // Handle validation errors
		        } else {
		       

			     if($_FILES['file_url']['name']){
	            $file_name = $_FILES['file_url']['name'];
				$fileSize = $_FILES["file_url"]["size"]/1024;
				$fileType = $_FILES["file_url"]["type"];
				$new_file_name='';
	            $new_file_name .= $file_name;

	            $config = array(
	                'file_name' => $new_file_name,
	                'upload_path' => "./assets/uploads/internal_doctors",
	                'allowed_types' => "gif|jpg|png|jpeg|pdf|doc|docx",
	                'overwrite' => False,
	                'max_size' => "50720000"
	            );
	            //create directory
	              if(!is_dir($config['upload_path'])) mkdir($config['upload_path'], 0777, TRUE);
	    
	            $this->load->library('Upload', $config);
	            $this->upload->initialize($config);                
	            if (!$this->upload->do_upload('file_url')) {
	                echo $this->upload->display_errors();
	                #redirect("notice/All_notice");
				}
	   
				else {

	                $path = $this->upload->data();
	                $img_url = $path['file_name'];
		           
	            $data = array(
				    'name' => $name,
				    'gender' => $gender,
				    'qualification' => $qualification,
				    'speciality' => $speciality,
				    'specialized_in' => $specializedIn,
				    'experience' => $experience,
				    'address' => $address,
				    'timing' => $timing,
				    'fees' => $fees,
				    'contact_number' => $number,
				    'profile_picture' => $fileUrl, // Assuming you've processed the uploaded file as shown in the previous response
				);


		            
		        }
		      }else{

		      	
	            $data = array(
				    'name' => $name,
				    'gender' => $gender,
				    'qualification' => $qualification,
				    'speciality' => $speciality,
				    'specialized_in' => $specializedIn,
				    'experience' => $experience,
				    'address' => $address,
				    'timing' => $timing,
				    'fees' => $fees,
				    'contact_number' => $number,
				   
				);


		      }

		      // Save the data to the manager table using your model function
		            $success = $this->Doctor_model->Update_InternalDoctor($data,$id);

		            if ($success) {
		                
		                  $data["id"] = $id;
		                echo json_encode(array('status' => 'success', 'message' => 'Doctor updated successfully','member'=>$data));
		            } else {
		                echo json_encode(array('status' => 'error', 'message' => 'Failed to update manager'));
		            }


		    // }
		    }
		    } else {
		        redirect(base_url(), 'refresh');
		    }
		}
	  //update modal get data
	   public function getInternal_DoctorByID() {
	        // Get the ID parameter from the AJAX request
	        $id = $this->input->get('id');
	        $navigator = $this->Doctor_model->get_InternalDoctorByID($id);
	        
	        // Prepare the response data as an array
	       $response = array(
		    'id' => $navigator->id,
		    'name' => $navigator->name,
		    'gender' => $navigator->gender,
		    'qualification' => $navigator->qualification,
		    'speciality' => $navigator->speciality,
		    'specialized_in' => $navigator->specialized_in,
		    'experience' => $navigator->experience,
		    'address' => $navigator->address,
		    'timing' => $navigator->timing,
		    'fees' => $navigator->fees,
		    'contact_number' => $navigator->contact_number,
		    'profile_picture' => $navigator->profile_picture,
		    'hospital' => $navigator->hospital,
		    //'createdOn' => $navigator->createdOn,
		   // 'isActive' => $navigator->isActive,
		);
	        
	        // Send the response as JSON
	        echo json_encode($response);
	    }

	    //Doctor delete
	     public function delete_internal_doctor(){
	        if($this->session->userdata('user_login_access') != False) { 
	            $id = $this->input->post('id');
	            $result_del = $this->Doctor_model->delete_InternalDoctor($id);//
	          if($result_del){
	                echo json_encode(array('status'=>'success','message'=> 'Deleted Successfully'));
	               
	            }else{
	                 echo json_encode(array('status'=>'failed','message'=> 'Not deleted'));
	             
	            }
	           
	            }
	        else{
	            redirect(base_url() , 'refresh');
	        }       
	     }

	     //17/12/23
	     // New
		function fetch_data()
		{
			sleep(2);
			
			$name = $this->input->post('name');
			$speciality = $this->input->post('speciality');
			$timings = $this->input->post('timings');
			$fees = $this->input->post('fees');


			$filters = $this->input->post('filters');



			$this->load->library("pagination");
			$config = array();
			$config["base_url"] = "#";
			//$config["total_rows"] = $this->Property_model->count_all($minimum_price, $maximum_price, $brand, $ram, $storage);
			//$config["total_rows"] = $this->Doctor_model->count_all($name, $speciality,$timings,$fees);
			$config["total_rows"] = $this->Doctor_model->count_all($filters);
			$config["per_page"] = 12;
			$config["uri_segment"] = 3;
			$config["use_page_numbers"] = TRUE;
			
			//new
			$config['full_tag_open'] = '<ul class="pagination">';        
		    $config['full_tag_close'] = '</ul>';        
		    $config['first_link'] = 'First';        
		    $config['last_link'] = 'Last';        
		    $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';        
		    $config['first_tag_close'] = '</span></li>';        
		    $config['prev_link'] = '&laquo';        
		    $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';        
		    $config['prev_tag_close'] = '</span></li>';        
		    $config['next_link'] = '&raquo';        
		    $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';        
		    $config['next_tag_close'] = '</span></li>';        
		    $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';        
		    $config['last_tag_close'] = '</span></li>';        
		    $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';        
		    $config['cur_tag_close'] = '</a></li>';        
		    $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';        
		    $config['num_tag_close'] = '</span></li>';

			$config["num_links"] = 3;

			
			$this->pagination->initialize($config);
			$page = $this->uri->segment('3');
			$start = ($page - 1) * $config["per_page"];
			
			$output = array(
				'pagination_link'		=>	$this->pagination->create_links(),
			
				//'product_list'			=>	$this->Doctor_model->fetch_data($config["per_page"], $start,$name, $speciality,$timings,$fees)
				'product_list'			=>	$this->Doctor_model->fetch_data($config["per_page"], $start,$filters)
			);
			echo json_encode($output);
		}



	         // ------------------------------ Internal Doctors ---------------------------------------------------- //
	         // ------------------------------ ID CARD ---------------------------------------------------- //
	     public function generate_IdCard()
		{ //IDCARD

		$m_name = base64_decode($this->input->get('m_name'));
		$m_id = base64_decode($this->input->get('m_id'));

		$this->load->library('IDCARD');
        // Create instance of TCPDF
		$pdf = new IDCARD(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'utf-8', false);


		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('ID CARD');
		$pdf->SetTitle('ID CARD');
		$pdf->SetSubject('ID CARD');
		//$pdf->SetKeywords('TCPDF, PDF, example, test, codeigniter');

		// set default header data
		$pdf->SetHeaderData(PDF_HEADER_LOGO, "", PDF_HEADER_TITLE, PDF_HEADER_STRING);

		// set header and footer fonts
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));


		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		// $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		// set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		// set font
		// $pdf->SetFont('times', 'BI', 12);
		  $pdf->SetMargins(10, 10, 10, 0);
		  // Remove footer margin
		$pdf->SetFooterMargin(0);
		// remove default header/footer
		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);

		    // $pdf->SetFont('times', 'BI', 12);

		// Add a page
		$pdf->AddPage();
       //assets\backend_assets\img\id
		$img_file = base_url().'assets/backend_assets/img/id/bg1.jpg';

		$pdf->Image($img_file, 10, 10, 140, 70, '', '', '', false, 300, '', false, false, 0);
		  $pdf->SetMargins(10, 10, 10, 0);
		// HTML content
		$html = '
		<table border="0" cellspacing="0" cellpadding="0" width="100%" style="margin-right:5%">
		    <tr>
		    <br>
		    <td style="width: 48%; "><p style="font-weight: bold; color: #38B6FF;"> &nbsp;&nbsp;ASSISTHEALTH<br><span style="color: white;font-size:12px;background:white">  &nbsp;&nbsp;MEMBERSHIP CARD</span> 
		        <br> &nbsp;&nbsp;<span style="background-color: ; border-radius: 10px;  margin-left: 10px; width:10%"><span style="color:#38B6FF;text-transform: uppercase;">'.$m_name.' &nbsp;&nbsp;&nbsp;</span></span><br>&nbsp;&nbsp;&nbsp;<span style="color: white;background-color: ;border-radius: 10px;  ">ASSISTHEALTH ID:<span style="color: #aa893f;background-color: ;">'.$m_id.'</span></span> </p><p style="font-weight: bold; color: #38B6FF; font-size:12px"> &nbsp;&nbsp;COMPLETE HEALTHCARE SUPPORT,<br>   JUST A CALL AWAY</p>
		           <span style="font-weight: bold; color: black; text-transform: uppercase;background-color: #38B6FF;"> &nbsp;&nbsp;9611232593 / 9611232519</span><br>
		        <span style="color: white; font-size: 10px;"> &nbsp;&nbsp;Valid for registered members only.</span><br>
		        <span style="color: white; font-size: 10px;"> &nbsp;&nbsp;Use this membership card to schedule any AssistHealth services.</span><br>
		        <span style="color: white; font-size: 10px;"> &nbsp;&nbsp;Keep these contact numbers handy for quick access to your  <br> &nbsp;&nbsp;   Navigators.</span>
		                        
		                  
		        </td>
		        <td style="width: 52%; float:right">
		            <table border="0" cellspacing="0" cellpadding="0" width="100%">
		                <tr>
		                    <td><img src="'.base_url().'assets/backend_assets/img/id//logo.png" style="width:100px"/>
		                    </td>
		                </tr>
		                <tr>
		                <br> <td style="color: white; font-size: 12px; font-weight: lighter; float: right; margin:0">
		                        <span style="color: white; font-size: 12px;">CONTACT DETAILS</span><br><br>
		                         <span style="color: white; font-size: 12px;"><a href="tel:919611232569" style="color: white; text-decoration: none;">+91 9611232569</a></span><br>
		                        <span style="color: white; font-size: 12px;"><a href="mailto:infoassisthealth@gmail.com" style="color: white; text-decoration: none;">infoassisthealth@gmail.com</a></span><br>
		                        <span style="color: white; font-size: 12px;"><a href="www.assisthealth.in" style="color: white; text-decoration: none;">www.assisthealth.in</a></span>
		                    </td>
		                </tr>
		            </table>
		        </td>
		    </tr>
		</table>';

		$inputString = $m_name;
         $outputString = str_replace(' ', '_', strtolower($inputString));

		// Write HTML content to the PDF
		$pdf->writeHTML($html, true, false, true, false, '');
         ob_end_clean();
	       ob_clean();
		// Output the PDF to the browser or save it to a file
		$pdf->Output($outputString.'_membership_card.pdf', 'I');
		}





}
