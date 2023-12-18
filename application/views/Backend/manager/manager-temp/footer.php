<div class="page-footer">
            <div class="page-footer-inner">AssistHealth All rights reserved 2023  <!-- 2023 &copy;-->
                <!-- <a href="mailto:redstartheme@gmail.com" target="_top" class="makerCss">Redstartheme</a> -->
            </div>
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
        </div>
        <!-- end footer -->
    </div>
    <!-- start js include path -->
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
    <!-- chart js -->
 <!--    <script src="<?php echo base_url(); ?>assets/backend_assets/bundles/chart-js/Chart.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend_assets/bundles/chart-js/utils.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend_assets/bundles/apexcharts/apexcharts.min.js"></script> -->
    <!-- <script src="<?php echo base_url(); ?>assets/backend_assets/data/apex-home.js"></script> -->
    
     <!-- datatable -->
    <script src="<?php echo base_url(); ?>assets/datatables/jquery.dataTables.min.js"></script>

    
       <!-- New -->
    <script src="<?php echo base_url(); ?>assets/wnoty/wnoty.js"></script>
    <script src="<?php echo base_url(); ?>assets/wnoty/jquery-confirm.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script> 
    <script src="<?php echo base_url(); ?>assets/backend_assets/data/date-time.init.js"></script>
    
     <?php $this->load->view('Backend/common'); ?> 

    
    <script type="text/javascript">
        function CheckColors(val) {
            var element = document.getElementById('mec');
            if (val == 'pick a color' || val == 'others')
                element.style.display = 'block';
            else
                element.style.display = 'none';
        }

        function CheckColors1(val) {
            var element = document.getElementById('mec1');
            if (val == 'pick a color' || val == 'others')
                element.style.display = 'block';
            else
                element.style.display = 'none';
        }

        function CheckColors2(val) {
            var element = document.getElementById('mec2');
            if (val == 'pick a color' || val == 'others')
                element.style.display = 'block';
            else
                element.style.display = 'none';
        }

        function CheckColors3(val) {
            var element = document.getElementById('mec3');
            if (val == 'pick a color' || val == 'others')
                element.style.display = 'block';
            else
                element.style.display = 'none';
        }

        function CheckColors4(val) {
            var element = document.getElementById('mec4');
            if (val == 'pick a color' || val == 'others')
                element.style.display = 'block';
            else
                element.style.display = 'none';
        }

        function CheckColors5(val) {
            var element = document.getElementById('mec5');
            if (val == 'pick a color' || val == 'others')
                element.style.display = 'block';
            else
                element.style.display = 'none';
        }

        function CheckColors6(val) {
            var element = document.getElementById('mec6');
            if (val == 'pick a color' || val == 'others')
                element.style.display = 'block';
            else
                element.style.display = 'none';
        }


        $('#example4').DataTable({
        });

          //date
          $(document).ready(function () {
          flatpickr("#date", {
            dateFormat: "d-m-Y",
            allowInput: true,
            onOpen: function (selectedDates, dateStr, instance) {
              // Get the current date
              var currentDate = new Date();

              // Set the calendar's date to the current year and month
              instance.currentYear = currentDate.getFullYear();
              instance.currentMonth = currentDate.getMonth();
              instance.redraw();

              // Set the selected date if it exists
              if (instance.input.value) {
                instance.setDate(instance.input.value, false);
              }
            },
          });
        });
          


          
    /*Notification*/
    $(document).ready(function() {
    // Get the number of unread notifications and display it in the badge.
    $.get('<?php echo base_url();?>/notification/get_user_notifications_count', function(data) {
    $('.count').text(data);
    });
    // Show the notifications in a modal dialog when the user clicks on the notifications button.
    $('.notifications-button').click(function() {
    $.get('<?php echo base_url();?>/notification/get_notifications_manager', function(data) {
    $('.message-center').html(data);
    //$('#notifications-modal').modal('show');
    });
    });
    // Mark a notification as read when the user clicks on it.
   $('#notifications-modal').on('click', '.unread', function() {
   // $('.unread').click(function() {
    var notification_id = $(this).attr('data-notification-id'); //$(this).data('notification-id');
    var table = $(this).attr('data-table'); //$(this).data('notification-id');
    var url = $(this).attr('data-url'); 
    //console.log(notification_id)
    $.post('<?php echo base_url();?>/notification/mark_notification_as_read', { notification_id: notification_id,table:table });
    $(this).removeClass('unread').addClass('read');
    var count = $('.count').text();
    $('.count').text(count - 1);
    // var count = $('.notification-badge').text();
    // $('.notification-badge').text(count - 1);

     if(url){
          setTimeout(function(){
        window.location.href = '<?php echo base_url()?>'+url;
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
    $.post('<?php echo base_url();?>/notification/All_mark_notification_as_read_manager', {table:table });
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