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
                                        <img alt="image"  src="<?php if($user_data->profile ) { echo base_url('assets/uploads/users_profile/').$user_data->profile; }else{ echo base_url('assets/default.png'); } ?> " >
                                    </div>
                                    <div class="sidebar-user-details">
                                        <div class="user-name"><?= $user_data->name ?></div>
                                        <div class="user-role">Member</div>
                                         <div class="user-name"><?= $user_data->member_id ?></div>
                                          <div class="user-role"><?= ($user_data->membership) ? $user_data->membership.' Membership' : '' ?>  </div>
                                    </div>
                                </div>
                            </li>


                            <li class="nav-item ">
                                <a href="#" class="nav-link nav-toggle"><i data-feather="book"></i>
                                    <span class="title">Dashboard</span><span class="arrow"></span></a>
                                <ul class="sub-menu " <?= $this->uri->segment(2) === 'Member' || $this->uri->segment(2) === 'Add_Member'|| 
                                $this->uri->segment(2) === 'Edit_Member' || $this->uri->segment(2) === 'Sub_Profile'  ? 'style="display: block;"' : '' ?>>
                                    <li class="nav-item <?= $this->uri->segment(2) === 'Member' ? 'active' : '' ?>">
                                        <a href="<?php echo base_url(); ?>Member/" class="nav-link "> <span class="title">Back to
                                                Dashboard</span>
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="<?php echo base_url(); ?>" class="nav-link "> <span class="title">Back
                                                Home</span>
                                        </a>
                                    </li>
                                    <!-- <li class="nav-item <?= $this->uri->segment(2) === 'Add_Member' ? 'active' : '' ?>">
                                        <a href="<?php echo base_url(); ?>Member/Add_Member" class="nav-link "> <span class="title">Add My
                                                Profile</span>
                                        </a>
                                    </li> -->
                                    <li class="nav-item  <?= $this->uri->segment(2) === 'Edit_Member' ? 'active' : '' ?>">
                                        <a href="<?php echo base_url(); ?>Member/Edit_Member" class="nav-link "> <span class="title">Edit My
                                                Profile</span>
                                        </a>
                                    </li>
                                    <?php if($this->Manager_model->getSubprofile($this->session->userdata('user_login_id'))){ ?>
                                    <li class="nav-item  <?= $this->uri->segment(2) === 'Sub_Profile' ? 'active' : '' ?>">
                                        <a href="<?php echo base_url(); ?>Member/Sub_Profile" class="nav-link "> <span class="title"> My
                                            Sub Profile</span>
                                        </a>
                                    </li>
                                    <?php } ?>


                                </ul>
                            </li>
                                <li class="nav-item">
                                <a href="#" class="nav-link nav-toggle"><i data-feather="book"></i>
                                    <span class="title"> Medical History</span><span class="arrow"></span></a>
                                <ul class="sub-menu " <?= $this->uri->segment(2) === 'Member_Medical_history'  ? 'style="display: block;"' : '' ?>>

                                    <li class="nav-item <?= $this->uri->segment(2) === 'Member_Medical_history' ? 'active' : '' ?>">
                                        <a href="<?php echo base_url(); ?>Member/Member_Medical_history" class="nav-link "> <span class="title"> My
                                                Medical History</span>
                                        </a>
                                    </li>



                                </ul>
                            </li>
                            <li class="nav-item ">
                                <a href="#" class="nav-link nav-toggle"><i class="fa fa-id-card"></i>
                                    <span class="title">Appointments</span><span class="arrow"></span></a>
                                <ul class="sub-menu " <?= $this->uri->segment(2) === 'View_Appointments' || $this->uri->segment(2) === 'Ongoing_Appointment' || $this->uri->segment(2) === 'Pending_Appointment' || $this->uri->segment(2) === 'Completed_Appointment'|| $this->uri->segment(2) === 'Sub_Profile_Appoinment_list' ? 'style="display: block;"' : '' ?>>


                                    <li class="nav-item <?= $this->uri->segment(2) === 'View_Appointments' ? 'active' : '' ?>">
                                        <a href="<?php echo base_url(); ?>Member/View_Appointments" class="nav-link "> <span class="title">
                                                Book
                                                Appointment</span>
                                        </a>
                                    </li> 
                                      <?php if($this->Manager_model->getSubprofile($this->session->userdata('user_login_id'))){ ?>
                                    <li class="nav-item  <?= $this->uri->segment(2) === 'Sub_Profile_Appoinment_list' ? 'active' : '' ?>">
                                        <a href="<?php echo base_url(); ?>Member/Sub_Profile_Appoinment_list" class="nav-link "> <span class="title">
                                            Sub Profile Appointment</span>
                                        </a>
                                    </li>
                                    <?php } ?>
                                    <li class="nav-item <?= $this->uri->segment(2) === 'Pending_Appointment' ? 'active' : '' ?>">
                                        <a href="<?php echo base_url(); ?>Member/Pending_Appointment" class="nav-link "> <span class="title">
                                                Pending Appointment</span>
                                        </a>
                                    </li> 
                                    <li class="nav-item  <?= $this->uri->segment(2) === 'Ongoing_Appointment' ? 'active' : '' ?>">
                                        <a href="<?php echo base_url(); ?>Member/Ongoing_Appointment" class="nav-link "> <span class="title">
                                                Ongoing
                                                Appointment</span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?= $this->uri->segment(2) === 'Completed_Appointment' ? 'active' : '' ?> ">
                                        <a href="<?php echo base_url(); ?>Member/Completed_Appointment" class="nav-link "> <span
                                                class="title">Completed
                                                Appointment</span>
                                        </a>
                                    </li>


                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link nav-toggle"><i class="fa fa-bell"></i>
                                    <span class="title">Navigator</span><span class="arrow"></span></a>
                                <ul class="sub-menu " <?= $this->uri->segment(2) === 'View_Navigator'  ? 'style="display: block;"' : '' ?>>

                                    <li class="nav-item <?= $this->uri->segment(2) === 'View_Navigator' ? 'active' : '' ?>">
                                        <a href="<?php echo base_url(); ?>Member/View_Navigator" class="nav-link "> <span class="title">View My
                                                Navigator</span>
                                        </a>
                                    </li>



                                </ul>
                            </li>  
                            <li class="nav-item">
                                <a href="#" class="nav-link nav-toggle"><i class="fa fa-bell"></i>
                                    <span class="title">Doctor</span><span class="arrow"></span></a>
                                <ul class="sub-menu " <?= $this->uri->segment(2) === 'View_Doctor'  ? 'style="display: block;"' : '' ?>>

                                    <li class="nav-item <?= $this->uri->segment(2) === 'View_Doctor' ? 'active' : '' ?>">
                                        <a href="<?php echo base_url(); ?>Member/View_Doctor" class="nav-link "> <span class="title">View My
                                                Doctor</span>
                                        </a>
                                    </li>



                                </ul>
                            </li>  

                        </ul>
                    </div>
                </div>
            </div>