
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

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
        $this->load->model('User_model');
        $this->load->model('Manager_model');
        $this->load->model('Admin_model');
		$this->load->model('Doctor_model');
         $this->getUserDetails();
    }
	public function index()
	{
		$this->checkLogin();
		$this->load->view('Backend/members/mem-main-page');
	}
	/* Get admin details */
    private function getUserDetails() {
        $this->checkLogin();
        $Id = $this->session->userdata('user_login_id');
        $userDetails['user_data'] = $this->User_model->getUserDetails($Id);
        $this->load->vars($userDetails); // Make $adminDetails available in all views
    }

	// public function Add_Member()
	// {
	// 	$this->checkLogin();
	// 	$this->load->view('Backend/members/m-add-member');
	// }
	public function Edit_Member()
	{
		$this->checkLogin();
		$this->load->view('Backend/members/m-edit-member');
	}
	public function Book_Appointment()
	{
		$this->checkLogin();
		$this->load->view('Backend/members/m-book-appointment');
	}
	public function Subprofile_Book_Appointment()
	{
		$this->checkLogin();
		$id = $this->input->get('id');
		$data['user_data'] = $this->Manager_model->getUserDetails($id);
		$this->load->view('Backend/members/subprofile/subprofile-add-appointment',$data);
	}
	public function View_Appointments()
	{
		$this->checkLogin();
		  $id = $this->session->userdata('user_login_id');
		$data['members'] = $this->User_model->getAppointmentsMembersbyID($id);
		$this->load->view('Backend/members/m-view-booking',$data);
	}
	public function View_Navigator()
	{
		$this->checkLogin();
		$Id = $this->session->userdata('user_login_id');
        $userDetails['user_data'] = $this->User_model->getUserDetails($Id);
		$navigator_id = $userDetails['user_data']->navigator; 
		 $data['navigator_data'] = $this->Manager_model->getNavigatorDetails($navigator_id);
		 //print_r($navigators['navigator_data']);
		$this->load->view('Backend/members/m-view-nav',$data);
	}
	public function View_Doctor()
	{
		$this->checkLogin();
		$Id = $this->session->userdata('user_login_id');
        $userDetails['user_data'] = $this->User_model->getUserDetails($Id);
		$id = $userDetails['user_data']->doctor; 
		 $data['navigator_data'] = $this->Doctor_model->getDoctorDetails($id);
		 //print_r($navigators['navigator_data']);
		$this->load->view('Backend/members/m-view-doc',$data);
	}
	public function Completed_Appointment()
	{
		$this->checkLogin();
		  $id = $this->session->userdata('user_login_id');
		$data['members'] = $this->User_model->getcompletedMembersbyID($id);
		$data['submembers'] = $this->User_model->subprofilegetcompletedMembersbyID($id); 
		$this->load->view('Backend/members/m-completed-appointment',$data);
	}
	public function Ongoing_Appointment()
	{
		$this->checkLogin();
		  $id = $this->session->userdata('user_login_id');
		$data['members'] = $this->User_model->getOngoingMembersbyID($id);
		$data['submembers'] = $this->User_model->subprofile_getOngoingMembersbyID($id);
		$this->load->view('Backend/members/m-ongoing-appointment',$data);
	}
	public function Pending_Appointment()
	{
	    $this->checkLogin(); // Add this line to check login
	     $id = $this->session->userdata('user_login_id');
	    $data['members'] = $this->User_model->getPendingMembersbyID($id);
	    $data['submembers'] = $this->User_model->subprofilegetPendingMembersbyID($id); 
		//print_r( $data['submembers']);die();
	    $this->load->view('Backend/members/m-pending-appointment',$data);
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
	             redirect(base_url() . $role);
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


	public function save_member_data()
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
				       'code' =>$code,
				      'dob' =>$dob,
				      'bloodgroup' =>$bloodgroup,
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
					       'code' =>$code,
				      'dob' =>$dob,
				      'bloodgroup' =>$bloodgroup,
				         'member_status'=>'0'
					    
					);
		      	if ($password) {
					    $data["password"] = $hashed_password;
					}
		      }
               
              // Save the data to the manager table using your model function
		            $success = $this->Manager_model->UpdateMember($data,$id);// print_r($success);die();

		            if ($success) {
		                echo json_encode(array('status' => 'success', 'message' => 'Data Added successfully'));
		            } else {
		            	
		                echo json_encode(array('status' => 'error', 'message' => 'Failed to update data'));
		            }

		    }
		   // }
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
					$services = $this->input->post('services');

					$date = $this->input->post('date');
					$time =  date('H:i', strtotime($this->input->post('time')));
					//$time = $this->input->post('time');
				      $appointmentDate = $this->input->post('appointment_date');
				   	$appointmentTime = $this->input->post('appointment_time');
				
			       $prefix = 'ID_';
                   $uniqueNumber = uniqid($prefix);

                   // $checkdata = array('appointment_date' => $appointmentDate, 'isActive' => 1,'mid'=>$mid);
			       //  if (check_field_exists($checkdata, 'appointment')) {
			       //      echo json_encode(array('status' => 'error', 'message' => '<p>You already applied this date</p>'));
			       //      return;
			       //  } 
				     

			      
			      	$data = array(
						   
						    'mid' => $mid,
						    'services' => $services,
						    'additional_information' => $additional_information,
						    'Reference_id' =>$uniqueNumber,
						    'appointment_date' =>$appointmentDate,
						    'appointment_time' =>$appointmentTime,
						  
						   
						);
			     // }

			      // Save the data to the manager table using your model function
			            $success = $this->User_model->BookAppointmentData($data);

			            if ($success) {

			             $memberData = $this->Manager_model->getMemberByID($mid);
						

						if($memberData->isSubprofile == 'Yes'){
							  $parentmemberData = $this->Manager_model->getMemberByID($memberData->parent_member);
							 $nav = $parentmemberData->navigator;
							 $doc = $parentmemberData->doctor;
							$newMemberId = $memberData->member_id;
							$name = $memberData->name;
						}else{
						    $nav = $memberData->navigator;
						    $doc = $memberData->doctor;
							$newMemberId = $memberData->member_id;
							$name = $memberData->name;

						}

			            		//Notification
		            	  // Retrieve data from the employee table
			                $admin = $this->Admin_model->getAllAdmin();
			                // Insert data into the notification table for each employee
			            
			                    $filetitle = 'New Appointment Booked: <span class="txt-name">'.$name .'-'.$newMemberId.'</span>.';	
			               
			             
			                foreach ($admin as $data) {
			                $data = array(
			                'admin_id' => $data->id,
			                'message' => $filetitle,
			                'created_at' =>$appointmentDate,// date('Y-m-d H:i:s'),
			                'status' => 'unread',
			                'icon' => 'fa fa-user o',
			                'color' => 'blue-bgcolor',
			                  'url' => 'Admin/All_Members'
			                );
			                $this->db->insert('admin_notifications', $data);
			                }
                           //navigator
			              
				             $data1 = array(
			                'manager_id' => $nav,
			                'message' => $filetitle,
			                'created_at' =>$appointmentDate,// date('Y-m-d H:i:s'),
			                'status' => 'unread',
			                'icon' => 'fa fa-user o',
			                'color' => 'blue-bgcolor',
			                 'url' => 'Navigator/My_Members'
			                );
		                $this->db->insert('manager_notifications', $data1);
		                 //Doctor
			                $doctor = $this->session->userdata('user_login_id');
			                 $data2 = array(
			                'doctor_id' => $doc,
			                'message' => $filetitle,
			                'created_at' =>$appointmentDate,// date('Y-m-d H:i:s'),
			                'status' => 'unread',
			                'icon' => 'fa fa-user o',
			                'color' => 'blue-bgcolor',
			                  'url' => 'Doctor/My_Members'
		                     );
		                     $this->db->insert('doctor_notifications', $data2);
			                echo json_encode(array('status' => 'success', 'message' => 'Appointment added successfully'));
			            } else {
			            	
			                echo json_encode(array('status' => 'error', 'message' => 'Failed to save'));
			            }

			
			    } else {
			        redirect(base_url(), 'refresh');
			    }
		}


        /*Medical History */

    // list medical
	public function Member_Medical_history()
	{
		$this->checkLogin();
		$id = $this->session->userdata('user_login_id');//new
	    $data['member'] = $this->User_model->getUserDetails($id);
		$this->load->view('Backend/members/medical-history/m-medical-history-list',$data);
	}  
	 // add medical
	public function Add_medical_history()
	{
		$this->checkLogin();
		$id = $this->input->get('id');
	   //$data['user_data'] = $this->Manager_model->getUserDetails($id);
	   $user_data = $this->User_model->getUserDetails($id);
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
	  $this->load->view('Backend/members/medical-history/m-add-medical-hoistory',$data);
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
	  $this->load->view('Backend/members/medical-history/m-view-medical-hoistory',$data);
	}

	public function Sub_Profile()
	{
		$this->checkLogin();
		$id = $this->session->userdata('user_login_id');//$this->input->get('id');
		$data['members'] = $this->Manager_model->getSubprofile($id);
		
		$this->load->view('Backend/members/sub-profile',$data);
	}
	public function Sub_Profile_Appoinment_list()
	{
		$this->checkLogin();
		$id = $this->session->userdata('user_login_id');//$this->input->get('id');
		$data['members'] = $this->Manager_model->getSubprofile($id);
		
		$this->load->view('Backend/members/sub-profile-appoinment-list',$data);
	}
	//new

	public function Sub_Profile_Navigator()
	{
		$this->checkLogin();
		$Id = $this->input->get('id');// $this->session->userdata('user_login_id');
        $userDetails['user_data'] = $this->User_model->getUserDetails($Id);
		$navigator_id = $userDetails['user_data']->navigator; 
		 $data['navigator_data'] = $this->Manager_model->getNavigatorDetails($navigator_id);
		 //print_r($navigators['navigator_data']);
		// $id =  $this->input->get('id');
		// $data['members'] = $this->Manager_model->getSubprofile($id);
		
		$this->load->view('Backend/members/subprofile/subprofile-view-nav',$data);
	}
    // view doc  subprofile-view-doc
	public function Sub_Profile_Doctor()
	{
		$this->checkLogin();
		$Id = $this->input->get('id');// $this->session->userdata('user_login_id');
;
        $userDetails['user_data'] = $this->User_model->getUserDetails($Id);
		$id = $userDetails['user_data']->doctor; 
		 $data['navigator_data'] = $this->Doctor_model->getDoctorDetails($id);
		
		$this->load->view('Backend/members/subprofile/subprofile-view-doc',$data);
	}
}
