<?php
class Notification_model extends CI_Model {

     // public function get_notifications_count($user_id) {
     //    $this->db->where('user_id', $user_id);
     //    $this->db->where('status', 'unread');
     //    return $this->db->count_all_results('notifications');
     //  }
    // For admin notifications
    public function create_admin_notification($message, $admin_id) {
        $data = array(
            'message' => $message,
            'status' => 'unread',
            'admin_id' => $admin_id,
            'created_at' => date('Y-m-d H:i:s')
        );
        $this->db->insert('admin_notifications', $data);
    }

    public function get_unread_admin_notifications($admin_id) {
        $this->db->where('admin_id', $admin_id);
        $this->db->where('status', 'unread');
        $this->db->order_by('id', 'desc'); // Change 'notification_date' to the actual column you want to sort by
        $query = $this->db->get('admin_notifications');
        return $query->result();
    }
    //count admin
     public function get_admin_notifications_count($admin_id) {
          $this->db->where('admin_id', $admin_id);
        $this->db->where('status', 'unread');
        return $this->db->count_all_results('admin_notifications');
      }

    // For manager notifications
    public function create_manager_notification($message, $manager_id) {
        $data = array(
            'message' => $message,
            'status' => 'unread',
            'manager_id' => $manager_id,
            'created_at' => date('Y-m-d H:i:s')
        );
        $this->db->insert('manager_notifications', $data);
    }

    public function get_unread_manager_notifications($manager_id) {
        $this->db->where('manager_id', $manager_id);
        $this->db->where('status', 'unread');
         $this->db->order_by('id', 'desc');
        $query = $this->db->get('manager_notifications');
        return $query->result();
    }
    //count manager
     public function get_unread_notifications_count($admin_id) {
          $this->db->where('manager_id', $admin_id);
        $this->db->where('status', 'unread');

        return $this->db->count_all_results('manager_notifications');
      }

       // For Doctor notifications
    public function create_doctor_notification($message, $manager_id) {
        $data = array(
            'message' => $message,
            'status' => 'unread',
            'doctorr_id' => $manager_id,
            'created_at' => date('Y-m-d H:i:s')
        );
        $this->db->insert('doctor_notifications', $data);
    }

    public function get_unread_doctor_notifications($manager_id) {
        $this->db->where('doctor_id', $manager_id);
        $this->db->where('status', 'unread');
         $this->db->order_by('id', 'desc');
        $query = $this->db->get('doctor_notifications');
        return $query->result();
    }

    public function get_unread_doctor_notifications_count($admin_id) {
          $this->db->where('doctor_id', $admin_id);
        $this->db->where('status', 'unread');
        return $this->db->count_all_results('doctor_notifications');
      }
 


    // For member notifications
    public function create_member_notification($message, $member_id) {
        $data = array(
            'message' => $message,
            'status' => 'unread',
            'member_id' => $member_id,
            'created_at' => date('Y-m-d H:i:s')
        );
        $this->db->insert('member_notifications', $data);
    }

    public function get_unread_member_notifications($member_id) {
        $this->db->where('id', $member_id);
        $this->db->where('status', 'unread');
         $this->db->order_by('id', 'desc');
        $query = $this->db->get('member_notifications');
        return $query->result();
    }

    public function mark_notification_as_read($notification_id, $table_name) {
        $data = array('status' => 'read');
        $this->db->where('id', $notification_id);
        return $this->db->update($table_name, $data);
    } 
    public function All_mark_notification_as_read($table_name,$userid) {
        $data = array('status' => 'read');
        $this->db->where('admin_id', $userid);
        return $this->db->update($table_name, $data);
    }
    public function All_mark_notification_as_read_manager($table_name,$userid) {
        $data = array('status' => 'read');
        $this->db->where('manager_id', $userid);
        return $this->db->update($table_name, $data);
    }
    public function All_mark_notification_as_read_doctor($table_name,$userid) {
        $data = array('status' => 'read');
        $this->db->where('doctor_id', $userid);
        return $this->db->update($table_name, $data);
    }
}
?>
