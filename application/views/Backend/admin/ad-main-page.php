<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="description" content="Responsive Admin Template" />
    <meta name="author" content="RedstarHospital" />
    <title>Admin Panel</title>
       <!-- css -->
     <!-- <?php //$this->load->view('Backend/admin/admin-temp/link-css'); ?>  -->
           <!-- full calendar  css-->
     <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />
    <!-- icons -->
    <link href="<?php echo base_url(); ?>assets/backend_assets/fonts/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/backend_assets/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/backend_assets/fonts/font-awesome/v6/css/all.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/backend_assets/fonts/material-design-icons/material-icon.css" rel="stylesheet" type="text/css" />
    <!--bootstrap -->
    <link href="<?php echo base_url(); ?>assets/backend_assets/bundles/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Material Design Lite CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend_assets/bundles/material/material.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend_assets/css/material_style.css">
    <!-- Theme Styles -->
    <link href="<?php echo base_url(); ?>assets/backend_assets/css/theme_style.css" rel="stylesheet" id="rt_style_components" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/backend_assets/css/plugins.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/backend_assets/css/style.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/backend_assets/css/responsive.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/backend_assets/css/theme-color.css" rel="stylesheet" type="text/css" />
 

     <!-- favicon -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/favicon.ico" />

    <link href="<?php echo base_url(); ?>assets/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
  
  <!-- new -->
   <link href="<?php echo base_url(); ?>assets/wnoty/wnoty.css" rel="stylesheet" type="text/css" />  
   <link href="<?php echo base_url(); ?>assets/wnoty/jquery-confirm.min.css" rel="stylesheet" type="text/css" />  
</head>
<!-- END HEAD -->


<!-- New -->
 <link href="<?php echo base_url(); ?>assets/calendar/dist/fullcalendar.css" rel="stylesheet" type="text/css" /> 

<body
    class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white white-sidebar-color logo-indigo">
    <div class="page-wrapper">
        <!-- start header -->
        <!-- start header -->
         <?php $this->load->view('Backend/admin/admin-temp/header'); ?> 
        <div class="page-container">
            <!-- start sidebar menu -->
            <?php $this->load->view('Backend/admin/admin-temp/sidebar'); ?> 
            <!-- end sidebar menu -->
            <!-- start page content -->
            <div class="page-content-wrapper mt-10">
                <div class="page-content mt-10">
                        <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Dashboard</div>
                            </div>
                    
                        </div>
                    </div>
                        <div class="state-overview">
                        <div class="row">
                              <div class="col-xl-3 col-md-6 col-12">
                                <a href="<?php echo base_url(); ?>Admin/All_Navigators">
                                <div class="info-box bg-orange">
                                    <span class="info-box-icon push-bottom"><i class="material-icons">person</i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Navigators</span>
                                        <span class="info-box-number"><?php echo $this->db->where('isActive', 1)->count_all_results('manager'); ?></span>
                                      
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                               </a>
                                <!-- /.info-box -->
                            </div>
                                <div class="col-xl-3 col-md-6 col-12">
                                    <a href="<?php echo base_url(); ?>Admin/All_Members">
                                <div class="info-box bg-purple">
                                    <span class="info-box-icon push-bottom"><i
                                            class="material-icons">group</i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Members</span>
                                        <span class="info-box-number"><?php echo $this->db->where('isActive', 1)->count_all_results('members'); ?></span>
                                    
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                               </a>
                                <!-- /.info-box -->
                            </div>
                            <div class="col-xl-3 col-md-6 col-12">
                                <a href="<?php echo base_url(); ?>Admin/View_members">
                                <div class="info-box bg-blue">
                                    <span class="info-box-icon push-bottom"><i class="material-icons">domaingroup</i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Appointments</span>
                                        <span class="info-box-number"><?php echo $this->db->where(array('isActive'=> 1,'appointment_status != '=>''))->count_all_results('appointment'); ?></span>
                               
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                </a>
                                <!-- /.info-box -->
                            </div>
                            <!-- /.col -->
                              <!-- /.col -->  
                             <div class="col-xl-3 col-md-6 col-12">
                                <a href="<?php echo base_url(); ?>Admin/Pending_Appointment">
                                <div class="info-box bg-warning ">
                                    <span class="info-box-icon push-bottom"><i
                                            class="material-icons">refresh</i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Pending Appointments</span>
                                        <span class="info-box-number"><?php echo $this->db->where(array('appointment_status'=>'Pending','isActive'=>1))->count_all_results('appointment'); ?></span>
                                    
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                </a>
                                <!-- /.info-box -->
                            </div>  
                             <div class="col-xl-3 col-md-6 col-12">
                                    <a href="<?php echo base_url(); ?>Admin/Ongoing_Appointment" style="color: white;">
                                <div class="info-box bg-info ">
                                    <span class="info-box-icon push-bottom"><i
                                            class="material-icons">done</i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Ongoing Appointments</span>
                                        <span class="info-box-number"><?php echo $this->db->where(array('appointment_status'=>'Ongoing','isActive'=>1))->count_all_results('appointment'); ?></span>
                                    
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                               </a>
                                <!-- /.info-box -->
                            </div>
                            <div class="col-xl-3 col-md-6 col-12">
                                    <a href="<?php echo base_url(); ?>Admin/Completed_Appointment">
                                <div class="info-box bg-success">
                                    <span class="info-box-icon push-bottom"><i
                                            class="material-icons">done_all</i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Completed Appointments</span>
                                        <span class="info-box-number"><?php echo $this->db->where(array('appointment_status'=>'Completed','isActive'=>1))->count_all_results('appointment'); ?></span>
                                    
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                               </a>
                                <!-- /.info-box -->
                            </div>  
                              <div class="col-xl-3 col-md-6 col-12">
                                    <a href="<?php echo base_url(); ?>Admin/All_Members">
                                <div class="info-box deepPink-bgcolor">
                                    <span class="info-box-icon push-bottom"><i
                                            class="material-icons">person</i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">New Members</span>
                                        <span class="info-box-number"><?php $sql = "SELECT COUNT(*) AS total_count FROM members WHERE navigator IS NOT NULL AND doctor IS NOT NULL AND member_status = '1' AND isActive = 1 AND parent_member IS NOT NULL"; $query = $this->db->query($sql); $row = $query->row(); $count = $row->total_count; echo $count; //$this->db->where(array('navigator'=>'','member_status'=>'1','isActive'=>1))->count_all_results('members'); ?></span>
                                    
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                               </a>
                                <!-- /.info-box -->
                            </div>    
                              <div class="col-xl-3 col-md-6 col-12">
                                    <a href="<?php echo base_url(); ?>Admin/All_Doctors" style="color: white;">
                                <div class="info-box yellow-bgcolor" style="background-color: #c49f47;">
                                    <span class="info-box-icon push-bottom"><i
                                            class="icons fa fa-user-md " style="font-size: 18px;"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Doctors</span>
                                        <span class="info-box-number"><?php echo $this->db->where(array('isActive'=>1))->count_all_results('doctors'); ?></span>
                                    
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                            </a>
                                <!-- /.info-box -->
                            </div>
                            
                              <div class="col-xl-3 col-md-6 col-12">
                                    <a href="<?php echo base_url(); ?>Admin/All_Members" style="color: white;">
                                <div class="info-box yellow-bgcolor" style="background-color: #20c997;">
                                    <span class="info-box-icon push-bottom"><i
                                            class="material-icons">group</i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Sub Profiles</span>
                                        <span class="info-box-number"><?php echo $this->db->where(array('isActive'=>1,'isSubprofile ='=>'Yes'))->count_all_results('members'); ?></span>
                                    
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                               </a>
                                <!-- /.info-box -->
                            </div>
                        
                            <!-- /.col -->
                        </div>
                    </div>
                    <div class="row  mt-10">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box  mt-10">
                                <div class="card-head center">
                                    <h2>Welcome  <?php echo $this->session->userdata('name'); ?>  </h2>
                                 
                                </div>
                                <div class="card-body" id="bar-parent">
                                    <div class="doctor-profile">
                                
                                           <?php if($admin_data->profile ) { ?>
                                            <img src="<?php  echo base_url('assets/uploads/admin_profile/').$admin_data->profile; ?> " class="doctor-pic" alt="">
                                        <?php }else{ ?> 
                                            <img src=" <?php echo base_url('assets/default.png'); ?>  "class="doctor-pic" alt="">
                                        <?php } ?> 

                                        <div class="profile-usertitle">
                                            <div class="doctor-name"> <?php echo $this->session->userdata('name'); ?> </div>
                                        </div>
                                        <p> <?php echo $this->session->userdata('email'); ?></p>
                                        <div>
                                            <p><i class="fa fa-phone"></i><a href="<?php echo "+91 ".$admin_data->number; ?> "><?php echo "+91 ".$admin_data->number; ?> </a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
               
                        <div class="col-md-12 col-sm-12">
                            <div class="card">
                                <div class="card-head">
                                    <header>Appoinments</header>
                                </div>
                               <!--  <div class="card-body">
                                    <div class="panel-body">
                                        <div id="calendar" class="has-toolbar"> </div>
                                    </div>
                                </div> -->
                                  <div class="card-body b-l calender-sidebar">
                                <div id="calendar"></div>
                                
                            </div>
                            </div>
                        </div>
                    </div>

                    <!-- end admited patient list -->
                </div>
            </div>
            <!-- end page content -->
            <!-- start chat sidebar -->

            <!-- end chat sidebar -->
        </div>
        <!-- end page container -->
       <!-- start footer -->
          <!-- <?php //$this->load->view('Backend/admin/admin-temp/footer'); ?>  -->
          <!-- Old -->
     <script src="<?php echo base_url(); ?>assets/backend_assets/bundles/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend_assets/bundles/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend_assets/bundles/popper/popper.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend_assets/bundles/jquery-blockUI/jquery.blockui.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend_assets/bundles/jquery.slimscroll/jquery.slimscroll.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend_assets/bundles/feather/feather.min.js"></script>
    <!-- bootstrap -->
    <script src="<?php echo base_url(); ?>assets/backend_assets/bundles/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend_assets/bundles/bootstrap-switch/js/bootstrap-switch.min.js"></script>
    <!-- counterup -->
    <script src="<?php echo base_url(); ?>assets/backend_assets/bundles/counterup/jquery.waypoints.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend_assets/bundles/counterup/jquery.counterup.min.js"></script>
    <!-- Common js-->
    <script src="<?php echo base_url(); ?>assets/backend_assets/app.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend_assets/layout.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend_assets/theme-color.js"></script>
    <!-- material -->
    <script src="<?php echo base_url(); ?>assets/backend_assets/bundles/material/material.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/wnoty/wnoty.js"></script>
    <script src="<?php echo base_url(); ?>assets/wnoty/jquery-confirm.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script> 
    <!-- end js include path -->
    <!-- new -->
    <script src="<?php echo base_url(); ?>assets/moment/moment.js"></script>
    <script type="text/javascript"
      src="<?php echo base_url(); ?>assets/calendar/dist/fullcalendar.min.js"></script>
</body>



</html>
   <!-- // defaultDate: moment('<?php echo $tyear.'-'.$tmonth; ?>'), -->
<script>

//calender
 $(document).ready(function() {

  var date = new Date();
  var d = date.getDate();
  var m = date.getMonth();
  var y = date.getFullYear();
 //var today = new Date('2022-11-2');
 
  var calendar = $('#calendar').fullCalendar({

   editable: true,
   header: {
    left: 'prev,next today',
    center: 'title',
    right: 'month' //,agendaWeek,agendaDay
   },

    
   events: '<?php echo base_url(); ?>Admin/load',
   // <?php echo base_url(); ?>Admin/load
  allDayDefault: false,
 
   eventRender: function(event, element, view) {
   /*new*/
    element.find('.fc-event-time').hide();
        element.find('.fc-time').hide();
    element.attr('data-id', event.dataid);

   if (event.allDay === 'true') {
     event.allDay = true;
    } else {
     event.allDay = false;
    }
   },
   selectable: true,
   selectHelper: true,
   eventOrder: true,

   select: function(start, end, allDay) {
   
    $('[name="startdate"]').val(start.format("YYYY-MM-DD"));
    $('[name="month"]').val(start.format("MM-YYYY"));
    $('#TimesheetDataModal').modal('show');  // modal show

    var date = start.format("YYYY-MM-DD");
    loadtimesheetdata(date);

   if (title) {
   var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
   var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
   $.ajax({
       url: 'add_events.php',
       data: 'title='+ title+'&start='+ start +'&end='+ end,
       type: "POST",
       success: function(json) {
       alert('Added Successfully');
       }
   });
   calendar.fullCalendar('renderEvent',
   {
       title: title,
       start: start,
       end: end,
       allDay: allDay
   },
   true
   );
   }
   calendar.fullCalendar('unselect');
   },


   editable: true,
   eventDrop: function(event, delta) {
   var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
   var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
   $.ajax({
       url: 'update_events.php',
       data: 'title='+ event.title+'&start='+ start +'&end='+ end +'&id='+ event.id ,
       type: "POST",
       success: function(json) {
        alert("Updated Successfully");
       }
   });
   },
   eventClick: function(event) {
/*    var decision = confirm("Do you really want to do that?"); 
    if (decision) {
    $.ajax({
        type: "POST",
        url: "delete_event.php",
        data: "&id=" + event.id,
         success: function(json) {
             $('#calendar').fullCalendar('removeEvents', event.id);
              alert("Updated Successfully");}
    });
    }*/
     var date = event.start.format("YYYY-MM-DD");
    loadtimesheetdata(date);
     $('#TimesheetDataModal').modal('show'); //modal show
    },
   eventResize: function(event) {
       var start = $.fullCalendar.formatDate(event.start, "yyyy-MM-dd HH:mm:ss");
       var end = $.fullCalendar.formatDate(event.end, "yyyy-MM-dd HH:mm:ss");
       $.ajax({
        url: 'update_events.php',
        data: 'title='+ event.title+'&start='+ start +'&end='+ end +'&id='+ event.id ,
        type: "POST",
        success: function(json) {
         alert("Updated Successfully");
        }
       });
    },
    /**/

   
  });
  });

//calender end
</script>
<script>
    //leave
     $(document).on('click','#save-category',function(){

        event.preventDefault();
        $("#addleave").valid();
        var emp_id=$('#emp_id').val();
        var punchdescription=$('#punchdescription').val();
        var startdate=$('#startdate').val();
       
         if( startdate !=''){
        $.ajax({
        type:'post',
        url: '<?php echo base_url("TimeSheet/Add_timesheetleave");?>',
        data: $("#addleave").serialize(),
        success:function(resp){
        var data=$.parseJSON(resp);
        if(data.status == 'success'){
        $('#add-new-event').modal('hide');
        $(".modal-backdrop").remove();

        $('#addleave')[0].reset();
        $.wnoty({
        type: 'success',
        message: data.message,
        autohideDelay: 5000,
        position: 'top-right'

        });
        setTimeout(function(){
         location.reload(true);
        },3000);
        //  
        }else if(data.error) {
           /* $("#startdate").after(data.error);
            $('#startdate').next().css({'color':'red'});
            setTimeout(function(){ 
              $("#startdate").next().remove(); 
              $('#addleave')[0].reset();
            
             },2000); */
        }
        },
        });
        }
        return false;
        })
        //delete
    $(document).on('click','.leave_event_del', function (e) {
    $('#createtimesheetmodel').modal('hide');
    $(".modal-backdrop").remove();
    //var id = $(this).parents('tr').find('#id').val();
    var id = $(this).attr('data-id');
   $.confirm({
    title: 'Delete Warning!',
    content: 'Are you sure, you want to delete this timesheet ?',
    boxWidth: '25%',
    useBootstrap: false,
    buttons: {
    delete: {
    text: 'Delete',
    btnClass: 'btn-primary',
    action: function(){
    $.ajax({
    type: 'post',
    url: '<?php echo base_url('TimeSheet/TimsheetLeaveDelete') ?>',
    data: {id:id},
    success: function (response) {
     var data=$.parseJSON(response);
     if(data.status == 'success'){

    $.wnoty({
    type: 'success',
    message: data.message,
    autohideDelay: 3000,
    position: 'top-right'

    });
    setTimeout(function(){
         location.reload(true);
        },3000);
     }
    } 
   });
    }
    },
    close: function () {
       location.reload(true); 
    }
    }
    });

    });



// New codepen
//     var data = [
//     {
//         title: 'All Day Event',
//         start: '2023-09-01'
//     },
//     {
//         title: 'Long Event',
//         start: '2023-09-07',
//         end: '2023-09-10'
//     },
//     {
//         id: 999,
//         title: 'Repeating Event',
//         start: '2023-09-09T16:00:00'
//     },
//     {
//         id: 999,
//         title: 'Repeating Event',
//         start: '2023-09-16T16:00:00'
//     },
//     {
//         title: 'Conference',
//         start: '2023-09-11',
//         end: '2023-09-13'
//     },
//     {
//         title: 'Meeting',
//         start: '2023-09-12T10:30:00',
//         end: '2023-09-12T12:30:00'
//     },
//     {
//         title: 'Lunch',
//         start: '2023-09-12T12:00:00'
//     },
//     {
//         title: 'Meeting',
//         start: '2023-09-12T14:30:00'
//     },
//     {
//         title: 'Happy Hour',
//         start: '2023-09-12T17:30:00'
//     },
//     {
//         title: 'Dinner',
//         start: '2023-09-12T20:00:00'
//     },
//     {
//         title: 'Birthday Party',
//         start: '2023-09-13T07:00:00'
//     },
//     {
//         title: 'Click for Google',
//         url: 'https://google.com/',
//         start: '2023-09-28'
//     }
// ];

// var newData = [
//     {
//         title: 'stuff',
//         start: '2023-03-01'
//     },
//     {
//         title: 'stuff',
//         start: '2023-03-09'
//     }
// ];

// $(document).ready(function() {

//     $('#calendar').fullCalendar({
//         header: {
//             left: 'prev,next today',
//             center: 'title',
//             right: 'month'
//         },
//         // defaultDate: '2015-02-12',
//         editable: true,
//         eventLimit: true, // allow "more" link when too many events
//         events: data
//     });
    
//     $('#calendar').on('click', '.fc-next-button', function() {
//         //alert('clicked');
//         $('#calendar').fullCalendar( 'removeEvents' );
//         $('#calendar').fullCalendar( 'addEventSource', newData );
//     });
//     $('#calendar').on('click', '.fc-prev-button', function() {
//         //alert('clicked');
//         $('#calendar').fullCalendar( 'removeEvents' );
//         $('#calendar').fullCalendar( 'addEventSource', data );
//     });

// });

//https://codepen.io/adamaoc/pen/NqQEPz


   /*Notification*/
    $(document).ready(function() {
    // Get the number of unread notifications and display it in the badge.
    $.get('<?php echo base_url();?>/notification/get_admin_notifications_count', function(data) {
    $('.count').text(data);
    });
    // Show the notifications in a modal dialog when the user clicks on the notifications button.
    $('.notifications-button').click(function() {
    $.get('<?php echo base_url();?>/notification/get_notifications', function(data) {
    $('.message-center').html(data);
    //$('#notifications-modal').modal('show');
    });
    });
    // Mark a notification as read when the user clicks on it.
   $('#notifications-modal').on('click', '.unread', function() {
   // $('.unread').click(function() {
    var notification_id = $(this).attr('data-notification-id'); //$(this).data('notification-id');
    var table = $(this).attr('data-table'); //$(this).data('notification-id');
    var url = $(this).attr('data-url'); //$(this).data('notification-id');
    //console.log(notification_id)
    $.post('<?php echo base_url();?>/notification/mark_notification_as_read', { notification_id: notification_id,table:table });
    $(this).removeClass('unread').addClass('read');
    var count = $('.count').text();
    $('.count').text(count - 1);
    // var count = $('.notification-badge').text();
    // $('.notification-badge').text(count - 1);
    if(url){
          setTimeout(function(){
        window.location.href = '<?php echo base_url()?>'+url;//Admin/All_Navigators
        },2000);
    }
   
    });



        ////////new
   //clear
    $(document).on('click','#clear',function(){
     //$('#header_notification_bar').on('click', '#clear', function() {
    var table = $(this).attr('data-table'); 
    var url = $(this).attr('data-url'); 
    //console.log(notification_id)
    $.post('<?php echo base_url();?>/notification/All_mark_notification_as_read', {table:table });
    $(".unread").removeClass('unread').addClass('read');
    $("#notifications-modal").html('');
    //$(this).removeClass('unread').addClass('read');
    var count = $('.count').text();
    $('.count').text(0);
    // var count = $('.notification-badge').text();
    // $('.notification-badge').text(count - 1);
    if(url){
          setTimeout(function(){
        window.location.href = '<?php echo base_url()?>'+url;//Admin/All_Navigators
        },2000);
    }
   
    });
    });



   

</script>