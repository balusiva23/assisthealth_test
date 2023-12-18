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
                                        <img alt="image" src="<?php if($manager_data->profile_picture && file_exists(base_url('assets/uploads/manager_profile/').$manager_data->profile_picture)) { echo base_url('assets/uploads/manager_profile/').$manager_data->profile_picture; }else{echo base_url('assets/default.png'); }?>">
                                    </div>
                                    <div class="sidebar-user-details">
                                        <div class="user-name"><?= $manager_data->name ?></div>
                                        <div class="user-role">NAVIGATORS</div>
                                    </div>
                                </div>
                            </li>


                            <li class="nav-item active open">
                                <a href="#" class="nav-link nav-toggle"><i data-feather="book"></i>
                                    <span class="title">Dashboard</span><span class="arrow"></span></a>
                                <ul class="sub-menu"  >

                                    <li class="nav-item active open">
                                        <a href="<?php echo base_url(); ?>Navigator" class="nav-link "> <span class="title">Main
                                                Dashboard</span>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                               <!--Doctors  -->
                             <li class="nav-item  ">
                                <a href="#" class="nav-link nav-toggle"><i data-feather="book"></i>
                                    <span class="title"> Doctors</span><span class="arrow"></span></a>
                                <ul class="sub-menu " <?= $this->uri->segment(2) === 'Add_Doctor' || $this->uri->segment(2) === 'All_Doctors'|| $this->uri->segment(2) === 'Assign_Doctors' ? 'style="display: block;"' : '' ?>>

                                  <!--   <li class="nav-item  <?= $this->uri->segment(2) === 'Add_Doctor' ? 'active' : '' ?>">
                                        <a href="<?php echo base_url(); ?>Navigator/Add_Doctor" class="nav-link "> <span class="title">Add
                                                Doctors
                                            </span>
                                        </a>
                                    </li> -->
                                    <li class="nav-item <?= $this->uri->segment(2) === 'All_Doctors' ? 'active' : '' ?>">
                                        <a href="<?php echo base_url(); ?>Navigator/All_Doctors" class="nav-link "> <span class="title">All
                                                Doctors
                                            </span>
                                        </a>
                                    </li>

                                    <li class="nav-item <?= $this->uri->segment(2) === 'Assign_Doctors' ? 'active' : '' ?>">
                                        <a href="<?php echo base_url(); ?>Navigator/Assign_Doctors" class="nav-link "> <span class="title"> Assign
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
                                <ul class="sub-menu"  <?= $this->uri->segment(2) === 'Add_Member' || $this->uri->segment(2) === 'My_Members' || $this->uri->segment(2) === 'Member_Medical_history'  ? 'style="display: block;"' : '' ?>>



                                    <li class="nav-item <?= $this->uri->segment(2) === 'Add_Member' ? 'active' : '' ?>">
                                        <a href="<?php echo base_url(); ?>Navigator/Add_Member" class="nav-link "> <span class="title"> Add
                                                Member</span>
                                        </a>
                                    </li>
                              <!--       <li class="nav-item <?= $this->uri->segment(2) === 'All_Members' ? 'active' : '' ?>">
                                        <a href="<?php echo base_url(); ?>Navigator/All_Members" class="nav-link "> <span class="title">All
                                                Members</span>
                                        </a>
                                    </li> -->
                                     <li class="nav-item <?= $this->uri->segment(2) === 'My_Members' ? 'active' : '' ?>">
                                        <a href="<?php echo base_url(); ?>Navigator/My_Members" class="nav-link "> <span class="title">My
                                                Members</span>
                                        </a>
                                    </li>
                                        <li class="nav-item <?= $this->uri->segment(2) === 'Member_Medical_history' ? 'active' : '' ?>">
                                        <a href="<?php echo base_url(); ?>Navigator/Member_Medical_history" class="nav-link "> <span class="title"> Medical History</span>
                                        </a>
                                    </li> 
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link nav-toggle"><i data-feather="book"></i>
                                    <span class="title">APPOINTMENTS</span><span class="arrow"></span></a>
                                <ul class="sub-menu"  <?= $this->uri->segment(2) === 'View_members' || $this->uri->segment(2) === 'Ongoing_Appointment'|| $this->uri->segment(2) === 'Pending_Appointment'|| $this->uri->segment(2) === 'Completed_Appointment' || $this->uri->segment(2) === 'AppointmentConfirmation'  ? 'style="display: block;"' : '' ?>>
                                      
                                    <li class="nav-item  <?= $this->uri->segment(2) === 'View_members' ? 'active' : '' ?>">
                                        <a href="<?php echo base_url(); ?>Navigator/View_members" class="nav-link "> <span class="title">
                                                Book
                                                appointment</span>
                                        </a>
                                    </li> 
                                    
                                    <li class="nav-item <?= $this->uri->segment(2) === 'Pending_Appointment' ? 'active' : '' ?>">
                                        <a href="<?php echo base_url(); ?>Navigator/Pending_Appointment" class="nav-link "> <span class="title">
                                                Pending Appointment</span>
                                        </a>
                                    </li> 

                                    <li class="nav-item <?= $this->uri->segment(2) === 'Ongoing_Appointment' ? 'active' : '' ?>">
                                        <a href="<?php echo base_url(); ?>Navigator/Ongoing_Appointment" class="nav-link "> <span class="title">
                                                Onging Appointment</span>
                                        </a>
                                    </li>
                                     <!-- new -->
                                  <li class="nav-item <?= $this->uri->segment(2) === 'AppointmentConfirmation' ? 'active' : '' ?>">
                                        <a href="<?php echo base_url(); ?>Navigator/AppointmentConfirmation" class="nav-link "> <span class="title">
                                        Confirm Appointment </span>
                                        </a>
                                    </li>
                                    <!-- new -->
                                    <li class="nav-item <?= $this->uri->segment(2) === 'Completed_Appointment' ? 'active' : '' ?>">
                                        <a href="<?php echo base_url(); ?>Navigator/Completed_Appointment" class="nav-link "> <span class="title">
                                                Completed Appointment</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>