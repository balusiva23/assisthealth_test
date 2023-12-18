<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Notification extends CI_Controller {

    function __construct() {
        parent::__construct();
      
           $this->load->model('notification_model');
        
    }

  // public function get_notifications_count() {
  //   $user_id = $this->session->userdata('user_login_id');
  //   //$user_id = 1;
  //   $this->load->model('notification_model');
  //   $count = $this->notification_model->get_notifications_count($user_id);
  //   echo $count;
  // } 

   public function get_admin_notifications_count() {
      $admin_id = $this->session->userdata('user_login_id');
    //$user_id = 1;
    $this->load->model('notification_model');
    $count = $this->notification_model->get_admin_notifications_count($admin_id);
    echo $count;
  }
      public function get_user_notifications_count() {
          $admin_id = $this->session->userdata('user_login_id');
        //$user_id = 1;
        $this->load->model('notification_model');
        $count = $this->notification_model->get_unread_notifications_count($admin_id);
        echo $count;
      }


      public function get_doctor_notifications_count() {
          $admin_id = $this->session->userdata('user_login_id');
        //$user_id = 1;
        $this->load->model('notification_model');
        $count = $this->notification_model->get_unread_doctor_notifications_count($admin_id);
        echo $count;
      }




  public function get_notifications() {
    $user_id = $this->session->userdata('user_login_id');
    //$user_id = 1;
   // $this->load->model('notification_model');
   // $notifications = $this->notification_model->get_notifications($user_id);
        $admin_id = $this->session->userdata('user_login_id');
        $role = $this->session->userdata('role');
     // Retrieve unread notifications based on the role
        $notifications = $this->get_unread_notifications_by_role($admin_id, $role);
       //print_r($notifications);die();
      foreach ($notifications as $notification) {
        $notificationIcon = 'fa fa-check';
        $notificationColor = 'deepPink-bgcolor';
        //$notificationText = 'Congratulations!';
        
        if ($notification->status === 'unread') {
            // If the notification is unread, update the icon and color
          ($notification->icon) ? $notificationIcon = $notification->icon :  $notificationIcon = 'fa fa-check';

          ($notification->color) ? $notificationColor = $notification->color :  $notificationColor = 'bg-success';
           // $notificationColor = 'bg-success';
            $notificationText = $notification->message;
            $formattedDate = date('d-M-Y', strtotime($notification->created_at));
        }
        // ' .   $this->time_ago($notification->created_at)  . '
        /*'.$this->notification_model->mark_notification_as_read($notification->id,"admin_notifications").'*/
        echo '<li>';
        echo '    <a  class="unread" data-notification-id = "'.$notification->id.'" data-table = "admin_notifications" data-url = '.$notification->url.'>';
        echo '        <span class="time">'.$formattedDate.'</span>';
        echo '        <span class="details">';
        echo '            <span class="notification-icon circle ' . $notificationColor . '"><i class="' . $notificationIcon . '"></i></span>';
        echo '            ' . $notificationText . '</span>';
        echo '    </a>';
        echo '</li>';
     
    }

  } 
   public function get_notifications_manager() {
    $user_id = $this->session->userdata('user_login_id');
    //$user_id = 1;
   // $this->load->model('notification_model');
   // $notifications = $this->notification_model->get_notifications($user_id);
        $admin_id = $this->session->userdata('user_login_id');
        $role = $this->session->userdata('role');
     // Retrieve unread notifications based on the role
        $notifications = $this->get_unread_notifications_by_role($admin_id, $role);
       //print_r($notifications);die();
      foreach ($notifications as $notification) {
        $notificationIcon = 'fa fa-check';
        $notificationColor = 'deepPink-bgcolor';
        //$notificationText = 'Congratulations!';
        
        if ($notification->status === 'unread') {
            // If the notification is unread, update the icon and color
          ($notification->icon) ? $notificationIcon = $notification->icon :  $notificationIcon = 'fa fa-check';

          ($notification->color) ? $notificationColor = $notification->color :  $notificationColor = 'bg-success';
           // $notificationColor = 'bg-success';
            $notificationText = $notification->message;
            $formattedDate = date('d-M-Y', strtotime($notification->created_at));
        }
        // ' .   $this->time_ago($notification->created_at)  . '
        /*'.$this->notification_model->mark_notification_as_read($notification->id,"admin_notifications").'*/
        echo '<li>';
        echo '    <a  class="unread" data-notification-id = "'.$notification->id.'" data-table = "manager_notifications" data-url = '.$notification->url.'>';
        echo '        <span class="time">'.$formattedDate.'</span>';
        echo '        <span class="details">';
        echo '            <span class="notification-icon circle ' . $notificationColor . '"><i class="' . $notificationIcon . '"></i></span>';
        echo '            ' . $notificationText . '</span>';
        echo '    </a>';
        echo '</li>';
     
    }

  }
   public function get_notifications_doctor() {
    $user_id = $this->session->userdata('user_login_id');
    //$user_id = 1;
   // $this->load->model('notification_model');
   // $notifications = $this->notification_model->get_notifications($user_id);
        $admin_id = $this->session->userdata('user_login_id');
        $role = $this->session->userdata('role');
     // Retrieve unread notifications based on the role
        $notifications = $this->get_unread_notifications_by_role($admin_id, $role);
       //print_r($notifications);die();
      foreach ($notifications as $notification) {
        $notificationIcon = 'fa fa-check';
        $notificationColor = 'deepPink-bgcolor';
        //$notificationText = 'Congratulations!';
        
        if ($notification->status === 'unread') {
            // If the notification is unread, update the icon and color
          ($notification->icon) ? $notificationIcon = $notification->icon :  $notificationIcon = 'fa fa-check';

          ($notification->color) ? $notificationColor = $notification->color :  $notificationColor = 'bg-success';
           // $notificationColor = 'bg-success';
            $notificationText = $notification->message;
            $formattedDate = date('d-M-Y', strtotime($notification->created_at));
        }
        // ' .   $this->time_ago($notification->created_at)  . '
        /*'.$this->notification_model->mark_notification_as_read($notification->id,"admin_notifications").'*/
        echo '<li>';
        echo '    <a  class="unread" data-notification-id = "'.$notification->id.'" data-table = "doctor_notifications" data-url = '.$notification->url.'>';
        echo '        <span class="time">'.$formattedDate.'</span>';
        echo '        <span class="details">';
        echo '            <span class="notification-icon circle ' . $notificationColor . '"><i class="' . $notificationIcon . '"></i></span>';
        echo '            ' . $notificationText . '</span>';
        echo '    </a>';
        echo '</li>';
     
    }

  }

    private function get_unread_notifications_by_role($admin_id, $role) {
        switch ($role) {
            case 'admin':
                $this->load->model('Notification_model');
                return $this->Notification_model->get_unread_admin_notifications($admin_id);
            case 'manager':
                $this->load->model('Notification_model');
                return $this->Notification_model->get_unread_manager_notifications($admin_id);
            case 'doctor':
                $this->load->model('Notification_model');
                return $this->Notification_model->get_unread_doctor_notifications($admin_id);
            case 'user':
                $this->load->model('Notification_model');
                return $this->Notification_model->get_unread_member_notifications($admin_id);
            default:
                return array(); // Return an empty array if the role is not recognized
        }
    }
  

    public function mark_notification_as_read() {
        $this->load->model('Notification_model');
        $notification_id = $this->input->post('notification_id');
        $table = $this->input->post('table');
        // Mark the notification as read
        $this->Notification_model->mark_notification_as_read($notification_id, $table);//$this->session->userdata('role')

        // Return success response
        $response['status'] = 'success';
        echo json_encode($response);
    }  
    public function All_mark_notification_as_read() {
        $this->load->model('Notification_model');
        $table = 'admin_notifications';
         $userid = $this->session->userdata('user_login_id');
        // Mark the notification as read
        $this->Notification_model->All_mark_notification_as_read($table,$userid);//$this->session->userdata('role')

        // Return success response
        $response['status'] = 'success';
        echo json_encode($response);
    } 
    public function All_mark_notification_as_read_manager() {
        $this->load->model('Notification_model');
        $table = 'manager_notifications';
         $userid = $this->session->userdata('user_login_id');
        // Mark the notification as read
        $this->Notification_model->All_mark_notification_as_read_manager($table,$userid);//$this->session->userdata('role')

        // Return success response
        $response['status'] = 'success';
        echo json_encode($response);
    }   
     public function All_mark_notification_as_read_doctor() {
        $this->load->model('Notification_model');
        $table = 'doctor_notifications';
         $userid = $this->session->userdata('user_login_id');
        // Mark the notification as read
        $this->Notification_model->All_mark_notification_as_read_doctor($table,$userid);//$this->session->userdata('role')

        // Return success response
        $response['status'] = 'success';
        echo json_encode($response);
    }
  }

 ?>