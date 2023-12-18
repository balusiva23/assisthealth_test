<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database(); // Load the database library
    }

    //login
    public function getUserByUsername($username) {
        $this->db->group_start();
         $this->db->where(array('email'=> $username,'isActive'=> 1));
        //$this->db->where('email', $username);
        $this->db->or_where('number', $username);
        $this->db->group_end();
        return $this->db->get('members')->row();
    }
      // public function getUserByUsername($username) {
      //       // Query the user table to retrieve user details by username
      //       $this->db->where('email', $username);
      //       $query = $this->db->get('members');
      //       return $query->row();
      //   }


     public function save_member($data)
    {
        return $this->db->insert('members', $data); // Assuming 'members' is the name of your table
    }

    public function is_email_duplicate($email)
    {
        $this->db->where(array('email'=> $email,'isActive'=>1));
        $query = $this->db->get('members');

        return $query->num_rows() > 0;
    }
    public function is_number_duplicate($number)
    {
        //$this->db->where('number', $number);
        $this->db->where(array('number'=> $number,'isActive'=>1));
        $query = $this->db->get('members');
        return $query->num_rows() > 0;
    }
   
   //update duplicate check
    public function is_email_duplicate_except($email, $id)
    {
        $this->db->select('id');
        $this->db->from('members');
        $this->db->where(array('email'=> $email,'isActive'=>1));
        $this->db->where('id !=', $id);
        $query = $this->db->get();

        return ($query->num_rows() > 0);
    }

    public function is_number_duplicate_except($number, $id)
    {
        $this->db->select('id');
        $this->db->from('members');
        $this->db->where(array('number'=> $number,'isActive'=>1));
        $this->db->where('id !=', $id);
        $query = $this->db->get();

        return ($query->num_rows() > 0);
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
    /*Save member data*/
    public function SaveMemberData($data,$id)
    {
        // Update the manager data in the database
        $this->db->where('id', $id);
        $this->db->update('members', $data);

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
      }  
        /*Save Appointment data*/
    public function BookAppointmentData($data)
    {
        return $this->db->insert('appointment', $data);
      }
     //check time based duplicate
      // public function getLastAppointmentTime($mid)
      //   {
      //   $this->db->select('created_on'); // Replace 'created_on' with the actual column name in your appointment table that stores the timestamp
      //   $this->db->where('mid', $mid);
      //   $this->db->order_by('created_on', 'desc'); // Replace 'created_on' with the actual column name in your appointment table that stores the timestamp
      //   $this->db->limit(1);
      //   $query = $this->db->get('appointment'); // Replace 'appointment_table' with the actual table name in your database

      //   if ($query->num_rows() > 0) {
      //       $row = $query->row();
      //       return $row->created_on; // Replace 'timestamp_column' with the actual column name in your appointment table that stores the timestamp
      //   }

      //   return null;
      //   }

      public function getLastAppointmentTime($mid)
        {
            $this->db->select('created_on');
            $this->db->where('mid', $mid);
            $this->db->order_by('created_on', 'desc');
            $this->db->limit(1);
            $query = $this->db->get('appointment');

            if ($query->num_rows() > 0) {
                $row = $query->row();
                return $row->created_on;
            } else {
                // Debugging: Output the generated SQL query and any database errors
                echo $this->db->last_query();
                echo $this->db->error();
            }

            return null;
        }



           //Pending members by id
        public function getPendingMembersbyID($id)
        {
            // $this->db->where(array('appointment_status'=>'Ongoing','isActive'=>1,'id'=>$id));
            // $query = $this->db->get('members');
            // return $query->result();
             $this->db->select('*');
            $this->db->from('members');
             $this->db->where(array('appointment.appointment_status'=>'Pending','appointment.isActive'=>1,'members.isActive'=>1,'members.id'=>$id));
            $this->db->join('appointment', 'members.id = appointment.mid');
            $query = $this->db->get();
           return $result = $query->result();
        }    //sub profile
        public function subprofilegetPendingMembersbyID($id)
        {
            $this->db->select('*');
            $this->db->from('members');
             $this->db->where(array('appointment.appointment_status'=>'Pending','appointment.isActive'=>1,'members.isActive'=>1,'members.parent_member'=>$id)); //,'isSubprofile !='=>'Yes'
            $this->db->join('appointment', 'members.id = appointment.mid');
            $query = $this->db->get();
           return $result = $query->result();
        }    
           //ongoing members by id
        public function getOngoingMembersbyID($id)
        {
            // $this->db->where(array('appointment_status'=>'Ongoing','isActive'=>1,'id'=>$id));
            // $query = $this->db->get('members');
            // return $query->result();
             $this->db->select('*');
            $this->db->from('members');
             $this->db->where(array('appointment.appointment_status'=>'Ongoing','appointment.isActive'=>1,'members.isActive'=>1,'members.id'=>$id));
            $this->db->join('appointment', 'members.id = appointment.mid');
            $query = $this->db->get();
           return $result = $query->result();
        } 
        public function subprofile_getOngoingMembersbyID($id)
        {
            // $this->db->where(array('appointment_status'=>'Ongoing','isActive'=>1,'id'=>$id));
            // $query = $this->db->get('members');
            // return $query->result();
             $this->db->select('*');
            $this->db->from('members');
             $this->db->where(array('appointment.appointment_status'=>'Ongoing','appointment.isActive'=>1,'members.isActive'=>1,'members.parent_member'=>$id));
            $this->db->join('appointment', 'members.id = appointment.mid');
            $query = $this->db->get();
           return $result = $query->result();
        } 
        //completed members by id
        public function getcompletedMembersbyID($id)
        {
            // $this->db->where(array('appointment_status'=>'Completed','isActive'=>1,'id'=>$id));
            // $query = $this->db->get('members');
            // return $query->result();
             $this->db->select('*');
            $this->db->from('members');
             $this->db->where(array('appointment.appointment_status'=>'Completed','appointment.isActive'=>1,'members.isActive'=>1,'members.id'=>$id));
            $this->db->join('appointment', 'members.id = appointment.mid');
            $query = $this->db->get();
           return $result = $query->result();
        }
        public function subprofilegetcompletedMembersbyID($id)
        {
         
             $this->db->select('*');
            $this->db->from('members');
             $this->db->where(array('appointment.appointment_status'=>'Completed','appointment.isActive'=>1,'members.isActive'=>1,'members.parent_member'=>$id));
            $this->db->join('appointment', 'members.id = appointment.mid');
            $query = $this->db->get();
           return $result = $query->result();
        }
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

        /*forget*/

         public function getUserByEmail($email)
        {
            return $this->db->get_where('members', ['email' => $email])->row();
        }

        public function saveResetToken($email, $token)
        {
            $this->db->where('email', $email);
            $this->db->update('members', ['reset_token' => $token]);
        }

        public function isValidResetToken($token)
        {
            return $this->db->where('reset_token', $token)->get('members')->num_rows() === 1;
        }

        public function updatePasswordByToken($token, $password)
        {
            $user = $this->db->where('reset_token', $token)->get('members')->row();

            if ($user) {
                $hashed_password = password_hash($password, PASSWORD_BCRYPT);
                $this->db->where('id', $user->id);
                $this->db->update('members', ['password' => $hashed_password, 'reset_token' => null]);
                return true;
            }

            return false;
        }



}
