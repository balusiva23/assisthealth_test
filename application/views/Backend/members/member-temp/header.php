     <div class="page-header navbar navbar-fixed-top">
            <div class="page-header-inner ">
                <!-- logo start -->
                <div class="page-logo">
                    <a href="<?php echo base_url(); ?>">
                        <span class=""><img src="<?php echo base_url(); ?>assets/backend_assets/img/alogo.png"></span>
                        <span class="logo-default">AssistHealth</span> </a>
                </div>
                <!-- logo end -->
                <ul class="nav navbar-nav navbar-left in">
                    <li><a href="#" class="menu-toggler sidebar-toggler"><i data-feather="menu"></i></a></li>
                </ul>
          
                <!-- start mobile menu -->
                <a class="menu-toggler responsive-toggler" data-bs-toggle="collapse" data-bs-target=".navbar-collapse">
                    <span></span>
                </a>
                <!-- end mobile menu -->
                <!-- start header menu -->
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">


                        <!-- end message dropdown -->
                        <!-- start manage user dropdown -->
                        <li class="dropdown dropdown-user">
                            <a class="dropdown-toggle" data-bs-toggle="dropdown" data-hover="dropdown"
                                data-close-others="true">
                                <img alt="" class="img-circle " src="<?php if($user_data->profile) { echo base_url('assets/uploads/users_profile/').$user_data->profile; }else{echo base_url('assets/default.png'); }?> " />
                                <span class="username username-hide-on-mobile"> <?= $user_data->name ?>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                                <li>
                                    <a href="<?php echo base_url(); ?>Member/Edit_Member">
                                        <i class="icon-user"></i> Profile </a>
                                </li>

                                <li>
                                    <a href="<?php echo base_url(); ?>Member/Logout">
                                        <i class="icon-logout"></i> Log Out </a>
                                </li>
                            </ul>
                        </li>
                        <!-- end manage user dropdown -->

                    </ul>
                </div>
            </div>
        </div>