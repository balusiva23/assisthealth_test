<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database(); // Load the database library
    }

   // public function getAdminByUsername($username) {
   //      // Query the admin table to retrieve admin details by username
   //      $this->db->where(array('email'=> $username,'isActive'=> 1));
   //      $query = $this->db->get('admin');
   //      return $query->row();
   //  }


    public function getAllAdmin()
    {
        $this->db->where(array('isActive'=>1));
        $query = $this->db->get('admin');
        return $query->result();
    }
    public function getAdminByUsername($username)
    {
        $this->db->group_start();
        $this->db->where(array('email'=> $username,'isActive'=> 1));
        $this->db->or_where('number', $username);
        $this->db->group_end();
        return $this->db->get('admin')->row();
    }



    public function insert_admin($data) {
        $this->db->insert('admin', $data);
        return $this->db->insert_id();
    }

    public function update_admin($admin_id, $data) {
    $this->db->where('id', $admin_id);
    return $this->db->update('admin', $data);
   }
   
    public function getAdminDetails($adminId) {
        $this->db->select('id, name,role,number, email,profile'); // Specify the fields you want to retrieve excluding password
        $this->db->from('admin');
        $this->db->where(array('id'=> $adminId,'isActive'=>1));
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null;
        }
    }
    //manager save
    public function saveManagerData($data)
    {
        // Assuming you have a model called "Manager_model" for managing manager-related database operations

        // Insert the data into the manager table
         $this->db->insert('manager', $data);

        // Check if the insert was successful
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function UpdateManagerData($data,$id)
{
   
     $this->db->where('id', $id);
        return $this->db->update('manager', $data);
  }
  //delete
   public function Managerdelete($id){
     $this->db->where('id', $id);
    return $this->db->delete('manager');
    }  
   public function Docdelete($id){
     $this->db->where('id', $id);
    return $this->db->delete('doctors');
    }  
    //  public function Managerdelete($id){
    //   $data =  array( 'isActive' => 0);
    //  $this->db->where('id', $id);
    // return $this->db->update('manager',$data); 
    // } 

   //get navigator
    public function getNavigators()
    {
        // $query = $this->db->get('manager'); // Assuming 'manager' is the table name
        // return $query->result(); // Return the result as an array of objects

        $this->db->where(array('isActive'=> 1));
        $query = $this->db->get('manager');
        return $query->result();
    }


    public function getNavigatorByID($id) {
 
        $this->db->where('id', $id);
        $query = $this->db->get('manager');
        
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null;
        }
    }
 /*medical history*/
  public function insert_medical_history($data) {
        $this->db->insert('medical_history', $data);
        return $this->db->insert_id();
    }

    public function insert_previous_medical_condition($data) {
        $this->db->insert('previous_medical_conditions', $data);
    }

    public function insert_surgery_procedure($data) {
        $this->db->insert('surgeries_procedures', $data);
    }

    public function insert_allergy($data) {
        $this->db->insert('allergies', $data);
    }

    public function insert_medication($data) {
        $this->db->insert('current_medications', $data);
    }

    public function insert_family_medical_history($data) {
        $this->db->insert('family_medical_history', $data);
    }

    public function insert_immunization($data) {
        $this->db->insert('immunization_history', $data);
    }

    public function insert_medical_test($data) {
        $this->db->insert('previous_medical_test_results', $data);
    }

    public function insert_symptom($data) {
        $this->db->insert('current_symptoms_concerns', $data);
    }

    /*Fetch medical history*/
       public function get_medical_history($member_id) { //$id, 
        //$this->db->where('id', $id);
        $this->db->where('member_id', $member_id);
        return $this->db->get('medical_history')->row();
    }

    public function get_previous_medical_conditions($medical_history_id, $member_id) {
        $this->db->where('medical_history_id', $medical_history_id);
        $this->db->where('member_id', $member_id);
        return $this->db->get('previous_medical_conditions')->result();
    }

    public function get_surgeries_procedures($medical_history_id, $member_id) {
        $this->db->where('medical_history_id', $medical_history_id);
        $this->db->where('member_id', $member_id);
        return $this->db->get('surgeries_procedures')->result();
    }

    public function get_allergies($medical_history_id, $member_id) {
        $this->db->where('medical_history_id', $medical_history_id);
        $this->db->where('member_id', $member_id);
        return $this->db->get('allergies')->result();
    }

    public function get_current_medications($medical_history_id, $member_id) {
        $this->db->where('medical_history_id', $medical_history_id);
        $this->db->where('member_id', $member_id);
        return $this->db->get('current_medications')->result();
    }

    public function get_family_medical_history($medical_history_id, $member_id) {
        $this->db->where('medical_history_id', $medical_history_id);
        $this->db->where('member_id', $member_id);
        return $this->db->get('family_medical_history')->result();
    }

    public function get_immunization_history($medical_history_id, $member_id) {
        $this->db->where('medical_history_id', $medical_history_id);
        $this->db->where('member_id', $member_id);
        return $this->db->get('immunization_history')->result();
    }

    public function get_previous_medical_test_results($medical_history_id, $member_id) {
        $this->db->where('medical_history_id', $medical_history_id);
        $this->db->where('member_id', $member_id);
        return $this->db->get('previous_medical_test_results')->result();
    }

    public function get_current_symptoms_concerns($medical_history_id, $member_id) {
        $this->db->where('medical_history_id', $medical_history_id);
        $this->db->where('member_id', $member_id);
        return $this->db->get('current_symptoms_concerns')->result();
    }

    //update part
    public function get_medical_history_by_member_id($member_id) {
    $this->db->where('member_id', $member_id);
    return $this->db->get('medical_history')->row();
    }
    //medical_history
    public function update_medical_history($medical_history_id, $data) {
        $this->db->where('id', $medical_history_id);
        return $this->db->update('medical_history', $data);
    }
   //previous_medical_conditions
    public function delete_previous_medical_conditions_by_medical_history_id($medical_history_id) {
        $this->db->where('medical_history_id', $medical_history_id);
        return $this->db->delete('previous_medical_conditions');
    }
   //surgeries_procedures
    public function delete_surgeries_procedures_by_medical_history_id($medical_history_id) {
        $this->db->where('medical_history_id', $medical_history_id);
        return $this->db->delete('surgeries_procedures');
    }
   //allergies
    public function delete_allergies_by_medical_history_id($medical_history_id) {
        $this->db->where('medical_history_id', $medical_history_id);
        return $this->db->delete('allergies');
    }
    /*new*/
      public function delete_current_medications_by_medical_history_id($medical_history_id) {
            $this->db->where('medical_history_id', $medical_history_id);
            return $this->db->delete('current_medications');
        }
      public function delete_family_medical_history_by_medical_history_id($medical_history_id) {
            $this->db->where('medical_history_id', $medical_history_id);
            return $this->db->delete('family_medical_history');
        }
      public function delete_immunization_history_by_medical_history_id($medical_history_id) {
            $this->db->where('medical_history_id', $medical_history_id);
            return $this->db->delete('immunization_history');
        }
      public function delete_previous_medical_test_results_by_medical_history_id($medical_history_id) {
            $this->db->where('medical_history_id', $medical_history_id);
            return $this->db->delete('previous_medical_test_results');
        }
      public function delete_current_symptoms_concerns_by_medical_history_id($medical_history_id) {
            $this->db->where('medical_history_id', $medical_history_id);
            return $this->db->delete('current_symptoms_concerns');
        } 

         public function delete_items($id,$table) {
            $this->db->where('id', $id);
            return $this->db->delete($table);
        }


        /*Foget password*/
         public function getAdminByEmail($email)
        {
            return $this->db->get_where('admin', ['email' => $email])->row();
        }

        public function saveResetToken($email, $token)
        {
            $this->db->where('email', $email);
            $this->db->update('admin', ['reset_token' => $token]);
        }

        public function isValidResetToken($token)
        {
            return $this->db->where('reset_token', $token)->get('admin')->num_rows() === 1;
        }

        public function updatePasswordByToken($token, $password)
        {
            $admin = $this->db->where('reset_token', $token)->get('admin')->row();

            if ($admin) {
                $hashed_password = password_hash($password, PASSWORD_BCRYPT);
                $this->db->where('id', $admin->id);
                $this->db->update('admin', ['password' => $hashed_password, 'reset_token' => null]);
                return true;
            }

            return false;
        }
     

     //remove token

      public function removetokenbyadmin($token)
        {
            $admin = $this->db->where('reset_token', $token)->get('admin')->row();

            if ($admin) {
              //  $hashed_password = password_hash($password, PASSWORD_BCRYPT);
                $this->db->where('id', $admin->id);
                $this->db->update('admin', ['reset_token' => null]);
                return true;
            }

            return false;
        }
      public function removetokenbyuser($token)
        {
            $admin = $this->db->where('reset_token', $token)->get('members')->row();

            if ($admin) {
               // $hashed_password = password_hash($password, PASSWORD_BCRYPT);
                $this->db->where('id', $admin->id);
                $this->db->update('members', [ 'reset_token' => null]);
                return true;
            }

            return false;
        }
      public function removetokenbymanager($token)
        {
            $admin = $this->db->where('reset_token', $token)->get('manager')->row();

            if ($admin) {
               // $hashed_password = password_hash($password, PASSWORD_BCRYPT);
                $this->db->where('id', $admin->id);
                $this->db->update('manager', ['reset_token' => null]);
                return true;
            }

            return false;
        }

        // Calender
        public function getOngoingMembersbydate()
        {
           
             $this->db->select('*');
            $this->db->from('members');
             $this->db->where(array('appointment.appointment_status'=>'Ongoing','appointment.isActive'=>1,'members.isActive'=>1,'isSubprofile !='=>'Yes'));
            $this->db->join('appointment', 'members.id = appointment.mid');
            $query = $this->db->get();
           return $result = $query->result();
        }


        // public function getOngoingAppointmentCountsByDate()
        // {
        //     $this->db->select('appointment.appointment_date, COUNT(*) as appointment_count');
        //     $this->db->from('members');
        //     $this->db->where(array('appointment.appointment_status' => 'Ongoing', 'appointment.isActive' => 1, 'members.isActive' => 1, 'isSubprofile !=' => 'Yes'));
        //     $this->db->join('appointment', 'members.id = appointment.mid');
        //     $this->db->group_by('appointment.appointment_date');
        //     $this->db->having('appointment_count >', 1); // Filter dates with more than one appointment
        //     $query = $this->db->get();
        //     return $query->result();
        // }
        public function getOngoingAppointmentCountsByDate()
        {
            $this->db->select('appointment.appointment_date, COUNT(*) as appointment_count');
            $this->db->from('members');
            $this->db->where(array('appointment.appointment_status' => 'Ongoing', 'appointment.isActive' => 1, 'members.isActive' => 1,));// 'isSubprofile !=' => 'Yes'
            $this->db->join('appointment', 'members.id = appointment.mid');
            $this->db->group_by('appointment.appointment_date');
            $query = $this->db->get();
            return $query->result();
        } 

       //Pending members
        public function getPendingAppointmentCountsByDate()
        {
           
           //   $this->db->select('*');
           //  $this->db->from('members');
           //   $this->db->where(array('appointment.appointment_status'=>'Pending','appointment.isActive'=>1,'members.isActive'=>1,'isSubprofile !='=>'Yes')); //,'isSubprofile !='=>'Yes'
           //  $this->db->join('appointment', 'members.id = appointment.mid');
           //  $query = $this->db->get();
           // return $result = $query->result();
              $this->db->select('appointment.appointment_date, COUNT(*) as appointment_count');
            $this->db->from('members');
            $this->db->where(array('appointment.appointment_status' => 'Pending', 'appointment.isActive' => 1, 'members.isActive' => 1, ));//'isSubprofile !=' => 'Yes'
            $this->db->join('appointment', 'members.id = appointment.mid');
            $this->db->group_by('appointment.appointment_date');
            $query = $this->db->get();
            return $query->result();
        }


        //---------------------------------------------New december --------------------------------
         public function saveNewMember($data) {
            $this->db->insert('members', $data);
            return $this->db->insert_id();
          }
}
