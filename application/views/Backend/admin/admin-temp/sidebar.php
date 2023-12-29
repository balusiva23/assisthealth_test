
  <div class="sidebar-container">
                <div class="sidemenu-container navbar-collapse collapse fixed-menu">
                    <div id="remove-scroll" class="left-sidemenu">
                        <ul class="sidemenu  page-header-fixed slimscroll-style" data-keep-expanded="false"
                            data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                            <li class="sidebar-toggler-wrapper hide">
                                <div class="sidebar-toggler">
                                    <span></span>
                                </div>
                            </li>
                            <li class="sidebar-user-panel">
                                <div class="sidebar-user">
                                    <div class="sidebar-user-picture">
                                       
                                        <?php if($admin_data->profile ) { ?>
                                            <img src="<?php  echo base_url('assets/uploads/admin_profile/').$admin_data->profile; ?> "alt="image">
                                        <?php }else{ ?> 
                                            <img src=" <?php echo base_url('assets/default.png'); ?>  " alt="image">
                                        <?php } ?>
                                    </div>
                                    <div class="sidebar-user-details">
                                        <div class="user-name"><?php echo $admin_data->name; ?></div>
                                        <div class="user-role"><?php echo $admin_data->role; ?></div>
                                    </div>
                                </div>
                            </li>


                            <li class="nav-item">
                                <a href="#" class="nav-link nav-toggle"><i data-feather="book"></i>
                                    <span class="title">Dashboard</span><span class="arrow"></span></a>
                                <ul class="sub-menu">

                                    <li class="nav-item">
                                        <a href="<?php echo base_url(); ?>Admin" class="nav-link "> <span class="title">Main
                                                Dashboard</span>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                            <!-- $this->uri->segment(2) === ; -->
                            <li class="nav-item  ">
                                <a href="#" class="nav-link nav-toggle"><i data-feather="book"></i>
                                    <span class="title"> Navigators</span><span class="arrow"></span></a>
                                <ul class="sub-menu " <?= $this->uri->segment(2) === 'Add_Navigator' || $this->uri->segment(2) === 'All_Navigators'|| $this->uri->segment(2) === 'Assign_Navigators' ? 'style="display: block;"' : '' ?>>

                                    <li class="nav-item  <?= $this->uri->segment(2) === 'Add_Navigator' ? 'active' : '' ?>">
                                        <a href="<?php echo base_url(); ?>Admin/Add_Navigator" class="nav-link "> <span class="title">Add
                                                Navigators
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?= $this->uri->segment(2) === 'All_Navigators' ? 'active' : '' ?>">
                                        <a href="<?php echo base_url(); ?>Admin/All_Navigators" class="nav-link "> <span class="title">All
                                                Navigators
                                            </span>
                                        </a>
                                    </li>

                                    <li class="nav-item <?= $this->uri->segment(2) === 'Assign_Navigators' ? 'active' : '' ?>">
                                        <a href="<?php echo base_url(); ?>Admin/Assign_Navigators" class="nav-link "> <span class="title"> Assign
                                                Navigators
                                            </span>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                                  <!--Doctors  -->
                             <li class="nav-item  ">
                                <a href="#" class="nav-link nav-toggle"><i data-feather="book"></i>
                                    <span class="title"> Doctors</span><span class="arrow"></span></a>
                                <ul class="sub-menu " <?= $this->uri->segment(2) === 'Add_Doctor' || $this->uri->segment(2) === 'All_Doctors'|| $this->uri->segment(2) === 'Assign_Doctors' ? 'style="display: block;"' : '' ?>>

                                    <li class="nav-item  <?= $this->uri->segment(2) === 'Add_Doctor' ? 'active' : '' ?>">
                                        <a href="<?php echo base_url(); ?>Admin/Add_Doctor" class="nav-link "> <span class="title">Add
                                                Doctors
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?= $this->uri->segment(2) === 'All_Doctors' ? 'active' : '' ?>">
                                        <a href="<?php echo base_url(); ?>Admin/All_Doctors" class="nav-link "> <span class="title">All
                                                Doctors
                                            </span>
                                        </a>
                                    </li>

                                    <li class="nav-item <?= $this->uri->segment(2) === 'Assign_Doctors' ? 'active' : '' ?>">
                                        <a href="<?php echo base_url(); ?>Admin/Assign_Doctors" class="nav-link "> <span class="title"> Assign
                                                Doctors
                                            </span>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                             <!--Doctors  -->
                        <li class="nav-item">
                                <a href="#" class="nav-link nav-toggle"><i data-feather="book"></i>
                                    <span class="title">Members</span><span class="arrow"></span></a>
                                <ul class="sub-menu"  <?= $this->uri->segment(2) === 'All_Members' || $this->uri->segment(2) === 'Add_Member' || $this->uri->segment(2) === 'Medical_history' || $this->uri->segment(2) === 'GenerateIDCard'  ? 'style="display: block;"' : '' ?>>
                                    <!-- || $this->uri->segment(2) === 'View_medical_history' -->



                                    <li class="nav-item <?= $this->uri->segment(2) === 'Add_Member' ? 'active' : '' ?>">
                                        <a href="<?php echo base_url(); ?>Admin/Add_Member" class="nav-link "> <span class="title"> Add
                                                Member</span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?= $this->uri->segment(2) === 'All_Members' ? 'active' : '' ?>">
                                        <a href="<?php echo base_url(); ?>Admin/All_Members" class="nav-link "> <span class="title">All
                                                Members</span>
                                        </a>
                                    </li> 
                                    <li class="nav-item <?= $this->uri->segment(2) === 'Medical_history' ? 'active' : '' ?>">
                                        <a href="<?php echo base_url(); ?>Admin/Medical_history" class="nav-link "> <span class="title"> Medical History</span>
                                        </a>
                                    </li>  

                                    <!--  <li class="nav-item <?= $this->uri->segment(2) === 'GenerateIDCard' ? 'active' : '' ?>">
                                        <a href="<?php echo base_url(); ?>Admin/GenerateIDCard" class="nav-link "> <span class="title"> Generate Member ID</span>
                                        </a>
                                    </li>   -->
                                   <!--  <li class="nav-item <?= $this->uri->segment(2) === 'View_medical_history' ? 'active' : '' ?>">
                                        <a href="<?php echo base_url(); ?>Admin/View_medical_history" class="nav-link "> <span class="title">View Medical History</span>
                                        </a>
                                    </li>  -->
                        
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link nav-toggle"><i data-feather="book"></i>
                                    <span class="title">APPOINTMENTS</span><span class="arrow"></span></a>
                                <ul class="sub-menu"  <?= $this->uri->segment(2) === 'View_members' || $this->uri->segment(2) === 'Ongoing_Appointment' ||$this->uri->segment(2) === 'Pending_Appointment' || $this->uri->segment(2) === 'Completed_Appointment' || $this->uri->segment(2) === 'AppointmentConfirmation' ? 'style="display: block;"' : '' ?>>

                                     <li class="nav-item <?= $this->uri->segment(2) === 'View_members' ? 'active' : '' ?> ">
                                        <a href="<?php echo base_url(); ?>Admin/View_members" class="nav-link "> <span class="title">
                                                Book
                                                appointment</span>
                                        </a>
                                    </li> 


                                    <li class="nav-item <?= $this->uri->segment(2) === 'Pending_Appointment' ? 'active' : '' ?>">
                                        <a href="<?php echo base_url(); ?>Admin/Pending_Appointment" class="nav-link "> <span class="title">
                                                Pending Appointment</span>
                                        </a>
                                    </li> 
                                     <li class="nav-item <?= $this->uri->segment(2) === 'Ongoing_Appointment' ? 'active' : '' ?>">
                                        <a href="<?php echo base_url(); ?>Admin/Ongoing_Appointment" class="nav-link "> <span class="title">
                                                Onging Appointment</span>
                                        </a>
                                    </li>
                                    <!-- new -->
                                     <li class="nav-item <?= $this->uri->segment(2) === 'AppointmentConfirmation' ? 'active' : '' ?>">
                                        <a href="<?php echo base_url(); ?>Admin/AppointmentConfirmation" class="nav-link "> <span class="title">
                                        Confirm Appointment </span>
                                        </a>
                                    </li>
                                    <!-- new -->
                                    <li class="nav-item <?= $this->uri->segment(2) === 'Completed_Appointment' ? 'active' : '' ?>">
                                        <a href="<?php echo base_url(); ?>Admin/Completed_Appointment" class="nav-link "> <span class="title">
                                                Completed Appointment</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                                     <!--Internal Doctors  -->
                             <li class="nav-item  ">
                                <a href="#" class="nav-link nav-toggle"><i data-feather="book"></i>
                                    <span class="title">Empanelled Doctors</span><span class="arrow"></span></a>
                                <ul class="sub-menu " <?= $this->uri->segment(2) === 'Add_InternalDoctor' || $this->uri->segment(2) === 'All_InternalDoctors'|| $this->uri->segment(2) === 'Assign_Doctors' ? 'style="display: block;"' : '' ?>>

                                    <li class="nav-item  <?= $this->uri->segment(2) === 'Add_InternalDoctor' ? 'active' : '' ?>">
                                        <a href="<?php echo base_url(); ?>Admin/Add_InternalDoctor" class="nav-link "> <span class="title">Add
                                                Doctors
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?= $this->uri->segment(2) === 'All_InternalDoctors' ? 'active' : '' ?>">
                                        <a href="<?php echo base_url(); ?>Admin/All_InternalDoctors" class="nav-link "> <span class="title">All
                                                Doctors
                                            </span>
                                        </a>
                                    </li>

                                    <!-- <li class="nav-item <?= $this->uri->segment(2) === 'Assign_Doctors' ? 'active' : '' ?>">
                                        <a href="<?php echo base_url(); ?>Admin/Assign_Doctors" class="nav-link "> <span class="title"> Assign
                                                Doctors
                                            </span>
                                        </a>
                                    </li> -->

                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>