
<?php
class Doctor_model extends CI_Model {


    public function __construct()
    {
        parent::__construct();
        $this->load->database(); // Load the database library
    }

    public function getDoctorByUsername($username) {
      $this->db->group_start();
           $this->db->where(array('email'=> $username,'isActive'=> 1));
        $this->db->or_where('mobile_no', $username);
        $this->db->group_end();
        return $this->db->get('doctors')->row();
    }

    public function getDoctorByEmail($email)
    {
        return $this->db->get_where('doctors', ['email' => $email])->row();
    }

    //Doctor save
    public function saveDoctorData($data)
    {
      
        return $this->db->insert('doctors', $data);
    }

	public function UpdateDoctorData($data,$id)
	{

	$this->db->where('id', $id);
	return $this->db->update('doctors', $data);
	}
	//delete
	public function Doctordelete($id){
	$this->db->where('id', $id);
	return $this->db->delete('doctors');
	} 

	public function getDoctors()
	{
	$this->db->where(array('isActive'=> 1));
	$query = $this->db->get('doctors');
	return $query->result();
	}
    public function getAllDoctors()
    {
        $this->db->where(array('isActive'=>1));
        $query = $this->db->get('doctors');
        return $query->result();
    }

	public function getDoctorByID($id) {

	$this->db->where('id', $id);
	$query = $this->db->get('doctors');

	if ($query->num_rows() > 0) {
	    return $query->row();
	} else {
	    return null;
	}
	} 
	 public function getDoctorDetails($Id) {
	$this->db->select('*'); // Specify the fields you want to retrieve excluding password
	$this->db->from('doctors');
	$this->db->where(array('id'=> $Id,'isActive'=>1));
	$query = $this->db->get();

	if ($query->num_rows() > 0) {
	    return $query->row();
	} else {
	    return null;
	}
	}

	  
    //doctor members
     public function getdoctorMembers($id)
    {
        $this->db->where(array('doctor'=>$id,'isActive'=>1));
         $this->db->order_by('id', 'desc');
        $query = $this->db->get('members');
        return $query->result();
    }  
    //   public function getdoctorMemberslist($id)
    // {
    //     $this->db->where(array('doctor'=>$id,'isActive'=>1));
    //      $this->db->order_by('id', 'desc');
    //     $query = $this->db->get('members');
    //     return $query->result();
    // }
    public function getdoctorMemberslist($id)
    {
        // First, get the members where doctor matches the given ID and isActive is 1
        $this->db->select('*');
        $this->db->from('members');
        //$this->db->where('doctor', $id);
         $this->db->where(array('doctor'=> $id,'isSubprofile'=>''));
        $this->db->where('isActive', 1);
        $query = $this->db->get();
        $members = $query->result();

        // Create an array to store member IDs
        $memberIds = array();

        // Add the IDs of the matching members to the array
        foreach ($members as $member) {
            $memberIds[] = $member->id;
        }

        // Now, get the members whose parent_member field matches any of the member IDs
        $this->db->select('*');
        $this->db->from('members');
        $this->db->where_in('parent_member', $memberIds);
        $query = $this->db->get();
        $matchedMembers = $query->result();

        // Combine the original members and matched members into a single array
        $result = array_merge($members, $matchedMembers);

        return $result;
    }
   //doctor
    public function getOngoingMembersbydoctor($id)
    {
       
         $this->db->select('*');
        $this->db->from('members'); //new change
         $this->db->where(array('members.doctor'=>$id,'appointment.appointment_status'=>'Ongoing','appointment.isActive'=>1,'members.isActive'=>1,'isSubprofile !='=>'Yes'));
        $this->db->join('appointment', 'members.id = appointment.mid');
        $query = $this->db->get();
       return $result = $query->result();
    } 


   // Subprofile
       public function getSubprofileOngoingMembersbydoctor($id)
    {
       
         $this->db->select('*');
        $this->db->from('members'); //new change
         $this->db->where(array('members.doctor'=>$id,'appointment.appointment_status'=>'Ongoing','appointment.isActive'=>1,'members.isActive'=>1,'isSubprofile ='=>'Yes'));
        $this->db->join('appointment', 'members.id = appointment.mid');
        $query = $this->db->get();
       return $result = $query->result();
    } 
    //completed members
    public function getcompletedMembersbydoctor($id)
    {
       

         $this->db->select('*');
        $this->db->from('members'); //new change
         $this->db->where(array('members.doctor'=>$id,'appointment.appointment_status'=>'Completed','appointment.isActive'=>1,'members.isActive'=>1,'isSubprofile !='=>'Yes'));
        $this->db->join('appointment', 'members.id = appointment.mid');
        $query = $this->db->get();
       return $result = $query->result();
    }    
     //sub profile completed members
    public function getSubprofilecompletedMembersbydoctor($id)
    {
       

         $this->db->select('*');
        $this->db->from('members'); //new change
         $this->db->where(array('members.doctor'=>$id,'appointment.appointment_status'=>'Completed','appointment.isActive'=>1,'members.isActive'=>1,'isSubprofile ='=>'Yes'));
        $this->db->join('appointment', 'members.id = appointment.mid');
        $query = $this->db->get();
       return $result = $query->result();
    }  
      //Pending members
    public function getPendingMembersbydoctor($id)
    {
         $this->db->select('*');
        $this->db->from('members'); //new change
         $this->db->where(array('members.doctor'=>$id,'appointment.appointment_status'=>'Pending','appointment.isActive'=>1,'members.isActive'=>1,'isSubprofile !='=>'Yes'));
        $this->db->join('appointment', 'members.id = appointment.mid');
        $query = $this->db->get();
       return $result = $query->result();
    }   
    //sub profile
     public function getSubprofilePendingMembersbydoctor($id)
    {
         $this->db->select('*');
        $this->db->from('members'); //new change
         $this->db->where(array('members.doctor'=>$id,'appointment.appointment_status'=>'Pending','appointment.isActive'=>1,'members.isActive'=>1,'isSubprofile ='=>'Yes'));
        $this->db->join('appointment', 'members.id = appointment.mid');
        $query = $this->db->get();
       return $result = $query->result();
    }
    public function getNavigatorMembers($id)
    {
        $this->db->where(array('doctor'=>$id,'isActive'=>1));
        $query = $this->db->get('members');
        return $query->result();
    }
    public function getDocSubprofile($doc,$id)
    {
        $this->db->where(array('isActive'=>1,'parent_member'=>$id)); //'doctor'=>$doc,//new
        $query = $this->db->get('members');
        return $query->result();
    }
    public function Docdelete($id){
        $this->db->where('id', $id);
       return $this->db->delete('doctors');
       }  

       public function is_email_duplicate($email)
       {
           $this->db->where(array('email'=> $email,'isActive'=>1));
           $query = $this->db->get('doctors');
   
           return $query->num_rows() > 0;
       }
       public function is_number_duplicate($number)
       {
           //$this->db->where('number', $number);
           $this->db->where(array('mobile_no'=> $number,'isActive'=>1));
           $query = $this->db->get('doctors');
           return $query->num_rows() > 0;
       }
      
      public function is_number_duplicate_internal_doctors($number)
       {
           //$this->db->where('number', $number);
           $this->db->where(array('contact_number'=> $number,'isActive'=>1));
           $query = $this->db->get('internal_doctors');
           return $query->num_rows() > 0;
       }
      
      //update duplicate check
       public function is_email_duplicate_except($email, $id)
       {
           $this->db->select('id');
           $this->db->from('doctors');
           $this->db->where(array('email'=> $email,'isActive'=>1));
           $this->db->where('id !=', $id);
           $query = $this->db->get();
   
           return ($query->num_rows() > 0);
       }
   
       public function is_number_duplicate_except($number, $id)
       {
           $this->db->select('id');
           $this->db->from('doctors');
           $this->db->where(array('mobile_no'=> $number,'isActive'=>1));
           $this->db->where('id !=', $id);
           $query = $this->db->get();
   
           return ($query->num_rows() > 0);
       }
        //calender count
         public function getdoctorOngoingAppointmentCountsByDate($id)
    {
        $this->db->select('appointment.appointment_date, COUNT(*) as appointment_count');
        $this->db->from('members');
        $this->db->where(array('members.doctor'=>$id,'appointment.appointment_status' => 'Ongoing', 'appointment.isActive' => 1, 'members.isActive' => 1, ));//'isSubprofile !=' => 'Yes'
        $this->db->join('appointment', 'members.id = appointment.mid');
        $this->db->group_by('appointment.appointment_date');
        $query = $this->db->get();
        return $query->result();
    }     
       public function getPendingAppointmentCountsByDate($id)
    {
        $this->db->select('appointment.appointment_date, COUNT(*) as appointment_count');
        $this->db->from('members');
        $this->db->where(array('members.doctor'=>$id,'appointment.appointment_status' => 'Pending', 'appointment.isActive' => 1, 'members.isActive' => 1,));// 'isSubprofile !=' => 'Yes'
        $this->db->join('appointment', 'members.id = appointment.mid');
        $this->db->group_by('appointment.appointment_date');
        $query = $this->db->get();
        return $query->result();
    }
   
     // ------------------------------ Internal Doctors ---------------------------------------------------------------------------------------------------------- //
    //InternalDoctor save
    public function save_InternalDoctor($data)
    {
      
        return $this->db->insert('internal_doctors', $data);
    }

    public function Update_InternalDoctor($data,$id)
    {

    $this->db->where('id', $id);
    return $this->db->update('internal_doctors', $data);
    }
    //delete
    public function delete_InternalDoctor($id){
        $this->db->where('id', $id);
        $data = array('isactive'=>0);
    return $this->db->update('internal_doctors', $data);
    } 

    // public function delete_InternalDoctor($id){
    // $this->db->where('id', $id);
    // return $this->db->delete('internal_doctors');
    // } 
    

    public function get_InternalDoctors()
    {
    $this->db->where(array('isActive'=> 1));
    $query = $this->db->get('internal_doctors');
    return $query->result();
    }
    public function getAll_InternalDoctors()
    {
        $this->db->where(array('isActive'=>1));
        $query = $this->db->get('internal_doctors');
        return $query->result();
    }

    public function get_InternalDoctorByID($id) {

    $this->db->where('id', $id);
    $query = $this->db->get('internal_doctors');

    if ($query->num_rows() > 0) {
        return $query->row();
    } else {
        return null;
    }
    } 
     public function get_InternalDoctors_Details($Id) {
    $this->db->select('*'); // Specify the fields you want to retrieve excluding password
    $this->db->from('internal_doctors');
    $this->db->where(array('id'=> $Id,'isActive'=>1));
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
        return $query->row();
    } else {
        return null;
    }
    }
    ///New-------------------------------------
       public function getProperties($offset, $limit) {
        // Fetch properties from the database using the offset and limit
        $this->db->limit($limit, $offset);
        $query = $this->db->get('properties'); // Replace 'properties' with your actual table name

        // Check if there are results
        if ($query->num_rows() > 0) {
            return $query->result(); // Return an array of properties
        } else {
            return array(); // Return an empty array if no results
        }
    }


    //18/12/23
// function make_query($filters)
// {
//     $query = "SELECT * FROM internal_doctors WHERE isActive = '1' ";
//     $conditions = [];

//     foreach ($filters as $filter) {
//         $field = $filter['id'];
//         $value = $this->db->escape($filter['value']);

//         // Skip empty strings and NULL values
//         if ($value !== "''" && $value !== "NULL") {
//             // You may need to validate or sanitize the input to prevent SQL injection
//             $conditions[] = "$field = $value";
//         }
//     }

//     if (!empty($conditions)) {
//         $query .= " AND " . implode(" AND ", $conditions);
//     }
//     //  if (!empty($conditions)) {
//     //     $query .= " AND " . implode(" OR ", $conditions);
//     // }

// ;

//     return $query;
// }


    //22/1/24
function make_query($filters)
{
    // Initial Active Record query
    $this->db->select('*')->from('internal_doctors')->where('isActive', '1');

    // Loop through filters and add conditions to the WHERE clause
    foreach ($filters as $filter) {
        $field = $filter['id'];
        $value = $this->db->escape_str($filter['value']);

        // Skip empty values
        if ($value !== '') {
            // Use query bindings to prevent SQL injection
            $this->db->where($field, $value);

            // Alternatively, you can add conditions to the array if you prefer
            // $conditions[] = "$field = '$value'";
        }
    }

    // Optionally, you can use the conditions array to build the WHERE clause
    // if (!empty($conditions)) {
    //     $this->db->where(implode(" AND ", $conditions));
    // }

    // Get the final query as a string
    $query = $this->db->get_compiled_select();

    // Return the final query
    return $query;
}



    function fetch_data($limit, $start, $filters)
    {
        $query = $this->make_query($filters);
        $query .= " LIMIT $start, $limit";
        // print_r($query);
        $data = $this->db->query($query);
        $output = '';

        if ($data->num_rows() > 0) {
            foreach ($data->result() as $doctor) {
                // min-width: 530px;min-height: 365px;
          $intro = $doctor->address;

            // Split the string into an array of words
            $intro_words = preg_split('/\s+/', $intro);

            // Get the subset of words up to the specified limit
            $limitedAddress = implode(' ', array_slice($intro_words, 0, 10));

            // Output the result
           // echo $limitedAddress;
                $output .= '
                    <div class="col-md-4">
                        <div class="card" style="">
                            <div class="card-body no-padding">
                                <div class="doctor-profile">
                                    <img src="' . base_url() . '/assets/uploads/internal_doctors/' . $doctor->profile_picture . '" class="doctor-pic" alt="" style="max-height: 112px;">
                                    <div class="profile-usertitle">
                                        <div class="doctor-name">' . $doctor->name . '</div>
                                        <div class="name-center">' . $doctor->speciality . '</div>
                                    </div>
                                    <p>' . $limitedAddress . '<br /></p>
                                    <div>
                                        <p><i class="fa fa-phone"></i><a href="tel:' . $doctor->contact_number . '"> ' . $doctor->contact_number . '</a></p>
                                    </div>
                                    <div class="profile-userbuttons">
                                        <a  class="tblEditBtn" data-id="' . $doctor->id . '">
                                            <i class="fa fa-pencil"></i>
                                        </a> 
                                      
                                        <a href="#" class="delete tblDelBtn" data-id="' . $doctor->id . '">
                                            <i class="fa fa-trash-o"></i>
                                        </a>
                                          <a  class="tblViewBtn"  data-id="' . $doctor->id . '">
                                            <i class="fa fa-eye" style="font-size: 12px; position: relative; line-height: 1; background-color: rgb(63,81,181); border-color: transparent; color: #ffffff; padding: 8px; height: 100%; border-radius: 5px;"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
            }
        } else {
            $output = '<h3>No Data Found</h3>';
        }

        return $output;
    }

    function count_all($filters)
    {
        $query = $this->make_query($filters);
        $data = $this->db->query($query);
        return $data->num_rows();
    }
}
?>
