<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manager_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database(); // Load the database library
    }
    //login
  public function getManagerByUsername($username) {
      $this->db->group_start();
           $this->db->where(array('email'=> $username,'isActive'=> 1));
        $this->db->or_where('mobile_no', $username);
        $this->db->group_end();
        return $this->db->get('manager')->row();
    }
    //  public function getManagerByUsername($username) {
    //     // Query the manager table to retrieve manager details by username
    //     $this->db->where('email', $username);
    //     $query = $this->db->get('manager');
    //     return $query->row();
    // }
    //manager
       public function getNavigatorDetails($Id) {
        $this->db->select('*'); // Specify the fields you want to retrieve excluding password
        $this->db->from('manager');
        $this->db->where(array('id'=> $Id,'isActive'=>1));
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null;
        }
    }

    /*Save member data*/
     public function SaveMemberData($data)
    {
        // Insert the member data into the database
        return $this->db->insert('members', $data);

     
    }

    public function getAllMemberslist()
    {
        $this->db->where(array('isActive'=>1)); //'isSubprofile'=>'' //new
         $this->db->order_by('id', 'desc');
        $query = $this->db->get('members');
        return $query->result();
    }
    public function getAllMembers()
    {
        $this->db->where(array('isActive'=>1,'isSubprofile'=>'')); //'isSubprofile'=>'' //new
         $this->db->order_by('id', 'desc');
        $query = $this->db->get('members');
        return $query->result();
    }
    public function getSubprofile($id)
    {
        $this->db->where(array('isActive'=>1,'parent_member'=>$id)); //'isSubprofile'=>'' //new
        $query = $this->db->get('members');
        return $query->result();
    }
    //navigator members
    //  public function getNavigatorMemberslist($id)
    // {
    //     $this->db->where(array('navigator'=>$id,'isActive'=>1));
    //      $this->db->order_by('id', 'desc');
    //     $query = $this->db->get('members');
    //     return $query->result();
    // }  
    public function getNavigatorMemberslist($id)
    {
        // First, get the members where doctor matches the given ID and isActive is 1
        $this->db->distinct();
        $this->db->select('*');
        $this->db->from('members');
        $this->db->where(array('navigator'=> $id,'isSubprofile'=>''));//new
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
        $this->db->distinct();
        $this->db->select('*');
        $this->db->from('members');
        $this->db->where_in('parent_member', $memberIds);
        $query = $this->db->get();
        $matchedMembers = $query->result();

        // Combine the original members and matched members into a single array
        $result = array_merge($members, $matchedMembers);

        return $result;
    }
     public function getNavigatorMembers($id)
    {
        $this->db->where(array('navigator'=>$id,'isActive'=>1,'isSubprofile !='=>'Yes'));
         $this->db->order_by('id', 'desc');
        $query = $this->db->get('members');
        return $query->result();
    }
    public function getNavSubprofile($nav,$id)
    {
        $this->db->where(array('isActive'=>1,'parent_member'=>$id)); //'navigator'=>$nav,
        $query = $this->db->get('members');
        return $query->result();
    }
     public function getAllNavigators()
    {
        $this->db->where(array('isActive'=>1));
        $query = $this->db->get('manager');
        return $query->result();
    }
   //Navigator
    public function getOngoingMembersbynavigator($id)
    {
       
         $this->db->select('*');
        $this->db->from('members');
         $this->db->where(array('members.navigator'=>$id,'appointment.appointment_status'=>'Ongoing','appointment.isActive'=>1,'members.isActive'=>1,'isSubprofile !='=>'Yes'));
        $this->db->join('appointment', 'members.id = appointment.mid');
        $query = $this->db->get();
       return $result = $query->result();
    }  

    public function getSubProfileOngoingMembersbynavigator($id)
    {
       
         $this->db->select('*');
        $this->db->from('members');
         $this->db->where(array('members.navigator'=>$id,'appointment.appointment_status'=>'Ongoing','appointment.isActive'=>1,'members.isActive'=>1,'isSubprofile ='=>'Yes'));
        $this->db->join('appointment', 'members.id = appointment.mid');
        $query = $this->db->get();
       return $result = $query->result();
    } 
    //completed members
    public function getcompletedMembersbynavigator($id)
    {
       

         $this->db->select('*');
        $this->db->from('members');
         $this->db->where(array('members.navigator'=>$id,'appointment.appointment_status'=>'Completed','appointment.isActive'=>1,'members.isActive'=>1,'isSubprofile !='=>'Yes'));
        $this->db->join('appointment', 'members.id = appointment.mid');
        $query = $this->db->get();
       return $result = $query->result();
    }     
     public function getSubProfilecompletedMembersbynavigator($id)
    {
       

         $this->db->select('*');
        $this->db->from('members');
         $this->db->where(array('members.navigator'=>$id,'appointment.appointment_status'=>'Completed','appointment.isActive'=>1,'members.isActive'=>1,'isSubprofile ='=>'Yes'));
        $this->db->join('appointment', 'members.id = appointment.mid');
        $query = $this->db->get();
       return $result = $query->result();
    }  
      //Pending members
    public function getPendingMembersbynavigator($id)
    {
       

         $this->db->select('*');
        $this->db->from('members');
         $this->db->where(array('members.navigator'=>$id,'appointment.appointment_status'=>'Pending','appointment.isActive'=>1,'members.isActive'=>1,'isSubprofile !='=>'Yes'));
        $this->db->join('appointment', 'members.id = appointment.mid');
        $query = $this->db->get();
       return $result = $query->result();
    }
     public function getSubProfilePendingMembersbynavigator($id)
    {
       

         $this->db->select('*');
        $this->db->from('members');
         $this->db->where(array('members.navigator'=>$id,'appointment.appointment_status'=>'Pending','appointment.isActive'=>1,'members.isActive'=>1,'isSubprofile ='=>'Yes'));
        $this->db->join('appointment', 'members.id = appointment.mid');
        $query = $this->db->get();
       return $result = $query->result();
    }
    //Admin
    //ongoing members
    public function getOngoingMembers()
    {
       
         $this->db->select('*');
        $this->db->from('members');
         $this->db->where(array('appointment.appointment_status'=>'Ongoing','appointment.isActive'=>1,'members.isActive'=>1,'isSubprofile !='=>'Yes'));
        $this->db->join('appointment', 'members.id = appointment.mid');
        $query = $this->db->get();
       return $result = $query->result();
    } 
    
    //ongoing 
      public function getSubprofileOngoingMembers()
    {
       
         $this->db->select('*');
        $this->db->from('members');
         $this->db->where(array('appointment.appointment_status'=>'Ongoing','appointment.isActive'=>1,'members.isActive'=>1,'isSubprofile ='=>'Yes')); //,'isSubprofile !='=>'Yes'
        $this->db->join('appointment', 'members.id = appointment.mid');
        $query = $this->db->get();
       return $result = $query->result();
    } 
       //Pending members
    public function getPendingMembers()
    {
       
         $this->db->select('*');
        $this->db->from('members');
         $this->db->where(array('appointment.appointment_status'=>'Pending','appointment.isActive'=>1,'members.isActive'=>1,'isSubprofile !='=>'Yes')); //,'isSubprofile !='=>'Yes'
        $this->db->join('appointment', 'members.id = appointment.mid');
        $query = $this->db->get();
       return $result = $query->result();
    }       
     //Pending members
    public function getSubprofilePendingMembers()
    {
       
         $this->db->select('*');
        $this->db->from('members');
         $this->db->where(array('appointment.appointment_status'=>'Pending','appointment.isActive'=>1,'members.isActive'=>1,'isSubprofile ='=>'Yes')); //,'isSubprofile !='=>'Yes'
        $this->db->join('appointment', 'members.id = appointment.mid');
        $query = $this->db->get();
       return $result = $query->result();
    } 
    //completed members
    public function getcompletedMembers()
    {
       

         $this->db->select('*');
        $this->db->from('members');
         $this->db->where(array('appointment.appointment_status'=>'Completed','appointment.isActive'=>1,'members.isActive'=>1,'isSubprofile !='=>'Yes'));
        $this->db->join('appointment', 'members.id = appointment.mid');
        $query = $this->db->get();
       return $result = $query->result();
    }
  //completed members
    public function getSubprofilecompletedMembers()
    {
       

         $this->db->select('*');
        $this->db->from('members');
         $this->db->where(array('appointment.appointment_status'=>'Completed','appointment.isActive'=>1,'members.isActive'=>1,'isSubprofile ='=>'Yes'));
        $this->db->join('appointment', 'members.id = appointment.mid');
        $query = $this->db->get();
       return $result = $query->result();
    }
    //get memeber by id
    public function getMemberByID($id) {
 
        $this->db->where('id', $id);
        $query = $this->db->get('members');
        
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null;
        }
    }
      /*update member data*/
    public function UpdateMemberData($data,$id)
    {
        // Update the manager data in the database
        $this->db->where('id', $id);
        return $this->db->update('appointment', $data);

        // if ($this->db->affected_rows() > 0) {
        //     return true;
        // } else {
        //     return false;
        // }
      }  
        /*update persnal member data*/
    public function UpdateMember($data,$id)
    {
        // Update the manager data in the database
        $this->db->where('id', $id);
        return $this->db->update('members', $data);

        // if ($this->db->affected_rows() > 0) {
        //     return true;
        // } else {
        //     return false;
        // }
      }

       //delete member
    public function Memberdelete($id){
     $this->db->where('id', $id);
     return $this->db->delete('appointment');
     //return $this->db->delete('members');
    }  

    //     public function Memberdelete($id){
    //   $data =  array( 'isActive' => 0);
    //  $this->db->where('id', $id);
    // return $this->db->update('appointment',$data); 
    // }   

    //  public function AllMemberdelete($id){
    //   $data =  array( 'isActive' => 0);
    //    $this->db->where('id', $id);
    // return $this->db->update('members',$data); 
    // }   

    public function AllMemberDelete($id) {
    // Delete member from 'members' table
    $this->db->where('id', $id);
    $result_members = $this->db->delete('members');

    // Debug statement
    if (!$result_members) {
        echo "Error deleting from 'members' table: " . $this->db->error();
    }

    // Delete appointments associated with the member from 'appointment' table
    $sql = "DELETE FROM appointment WHERE `mid` = $id";
    $result_appointments = $this->db->query($sql);

    // Debug statement
    if (!$result_appointments) {
        echo "Error deleting from 'appointments' table: " . $this->db->error();
    }

    return true;
}


  //  public function AllMemberdelete($id) {
  //      $data = array('isActive' => 0);
  //   $this->db->where('id', $id);
  //   $result_members = $this->db->update('members', $data);

  //   // Debug statement
  //   if (!$result_members) {
  //       echo "Error updating 'members' table: " . $this->db->error();
  //   }

  //  // Update appointment table based on member's ID
  //   $sql = "UPDATE appointment SET isActive = 0 WHERE `mid` = $id";
  //   $result_appointments = $this->db->query($sql);

  //   // Debug statement
  //   if (!$result_appointments) {
  //       echo "Error updating 'appointments' table: " . $this->db->error();
  //   }

  //   return true;
  // }

  //appointments members by id
        public function getAppointmentsMembersbyID($id)
        {
            // $this->db->where(array('appointment_status'=>'Pending','isActive'=>1,'id'=>$id));
            // $query = $this->db->get('appointment');
            // return $query->result();

            $this->db->select('*');
            $this->db->from('members');
             $this->db->where(array('appointment.appointment_status'=>'Pending','appointment.isActive'=>1,'members.isActive'=>1,'members.id'=>$id));
            $this->db->join('appointment', 'members.id = appointment.mid');
            $query = $this->db->get();
           return $result = $query->result();
        }
    public function getUserDetails($Id) {
        $this->db->select('*'); // Specify the fields you want to retrieve excluding password
        $this->db->from('members');
        $this->db->where(array('id'=> $Id,'isActive'=>1));
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null;
        }
    }

      //get memeber by id
    public function getMemberAppointmentByID($id) {

        $this->db->select('*');
        $this->db->from('members');
        $this->db->join('appointment', 'members.id = appointment.mid');
        $this->db->where('appointment.appointment_status', 'Pending');
        $this->db->where('appointment.isActive', 1);
        $this->db->where('members.isActive', 1);
       
        $this->db->where('appointment.id', $id);
        $query = $this->db->get();
        $result = $query->row();
        return $result;

      
          // $this->db->select('*');
          //   $this->db->from('members');
          //    $this->db->where(array('appointment.appointment_status'=>'Pending','appointment.isActive'=>1,'members.isActive'=>1,'appointment.id'=>$id));
          //   $this->db->join('appointment', 'members.id = appointment.mid');
          //   $query = $this->db->get();
          //  return $result = $query->row();

 
        // $this->db->where('id', $id);
        // $query = $this->db->get('members');
        
        // if ($query->num_rows() > 0) {
        //     return $query->row();
        // } else {
        //     return null;
        // }
    }
     public function getMemberPendingByID($id) {

        $this->db->select('*');
        $this->db->from('members');
        $this->db->join('appointment', 'members.id = appointment.mid');
        $this->db->where('appointment.appointment_status', 'Pending');
        $this->db->where('appointment.isActive', 1);
        $this->db->where('members.isActive', 1);
       
        $this->db->where('appointment.id', $id);
        $query = $this->db->get();
        $result = $query->row();
        return $result;

      
    }   
    public function getMemberOngoingByID($id) {

        $this->db->select('*');
        $this->db->from('members');
        $this->db->join('appointment', 'members.id = appointment.mid');
        $this->db->where('appointment.appointment_status', 'Ongoing');
        $this->db->where('appointment.isActive', 1);
        $this->db->where('members.isActive', 1);
       
        $this->db->where('appointment.id', $id);
        $query = $this->db->get();
        $result = $query->row();
        return $result;

      
    } 
     public function getMemberCompletedByID($id) {

        $this->db->select('*');
        $this->db->from('members');
        $this->db->join('appointment', 'members.id = appointment.mid');
        $this->db->where('appointment.appointment_status', 'Completed');
        $this->db->where('appointment.isActive', 1);
        $this->db->where('members.isActive', 1);
       
        $this->db->where('appointment.id', $id);
        $query = $this->db->get();
        $result = $query->row();
        return $result;

      
    }

    /*Foget*/

    public function getManagerByEmail($email)
    {
        return $this->db->get_where('manager', ['email' => $email])->row();
    }

    public function saveResetToken($email, $token)
    {
        $this->db->where('email', $email);
        $this->db->update('manager', ['reset_token' => $token]);
    }

    public function isValidResetToken($token)
    {
        return $this->db->where('reset_token', $token)->get('manager')->num_rows() === 1;
    }

    public function updatePasswordByToken($token, $password)
    {
        $manager = $this->db->where('reset_token', $token)->get('manager')->row();

        if ($manager) {
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);
            $this->db->where('id', $manager->id);
            $this->db->update('manager', ['password' => $hashed_password, 'reset_token' => null]);
            return true;
        }

        return false;
    }

    //calender count
         public function getnavigatorOngoingAppointmentCountsByDate($id)
    {
        $this->db->select('appointment.appointment_date, COUNT(*) as appointment_count');
        $this->db->from('members');
        $this->db->where(array('members.navigator'=>$id,'appointment.appointment_status' => 'Ongoing', 'appointment.isActive' => 1, 'members.isActive' => 1,));// 'isSubprofile !=' => 'Yes'
        $this->db->join('appointment', 'members.id = appointment.mid');
        $this->db->group_by('appointment.appointment_date');
        $query = $this->db->get();
        return $query->result();
    }
     public function getPendingAppointmentCountsByDate($id)
    {
        $this->db->select('appointment.appointment_date, COUNT(*) as appointment_count');
        $this->db->from('members');
        $this->db->where(array('members.navigator'=>$id,'appointment.appointment_status' => 'Pending', 'appointment.isActive' => 1, 'members.isActive' => 1,));// 'isSubprofile !=' => 'Yes'
        $this->db->join('appointment', 'members.id = appointment.mid');
        $this->db->group_by('appointment.appointment_date');
        $query = $this->db->get();
        return $query->result();
    }

}
