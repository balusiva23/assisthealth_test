<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->


<!-- Mirrored from www.einfosoft.com/templates/admin/redstar/source/light/layouts_form.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 18 Oct 2022 13:45:32 GMT -->
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<meta name="description" content="Responsive Admin Template" />
	<meta name="author" content="RedstarHospital" />
	<title>Redstar Hospital | Bootstrap Responsive Hospital Admin Template</title>
	<!-- google font -->
       <?php $this->load->view('Backend/admin/admin-temp/link-css'); ?> 
             <!-- Date Time item CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend_assets/bundles/flatpicker/css/flatpickr.min.css" />
</head>
<!-- END HEAD -->

<body
	class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white white-sidebar-color logo-indigo">
	<div class="page-wrapper">
		<!-- start header -->
		<div class="page-header navbar navbar-fixed-top">
			<div class="page-header-inner ">
				<!-- logo start -->
				<div class="page-logo">
					<a href="index-2.html">
						<span class="logo-icon fa fa-stethoscope fa-rotate-45"></span>
						<span class="logo-default">REDSTAR</span> </a>
				</div>
				<!-- logo end -->
				<ul class="nav navbar-nav navbar-left in">
					<li><a href="#" class="menu-toggler sidebar-toggler"><i data-feather="menu"></i></a></li>
				</ul>
				<form class="search-form-opened" action="#" method="GET">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Search..." name="query">
						<span class="input-group-btn">
							<a href="javascript:;" class="btn submit">
								<i class="icon-magnifier"></i>
							</a>
						</span>
					</div>
				</form>
				<!-- start mobile menu -->
				<a class="menu-toggler responsive-toggler" data-bs-toggle="collapse" data-bs-target=".navbar-collapse">
					<span></span>
				</a>
				<!-- end mobile menu -->
				<!-- start header menu -->
				>
			</div>
		</div>
		<!-- end header -->
		<!-- start color quick setting -->
<!-- 		<div class="settingSidebar">
			<a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
			</a>
			<div class="settingSidebar-body ps-container ps-theme-default">
				<div class=" fade show active">
					<div class="setting-panel-header">Setting Panel
					</div>
					<div class="quick-setting slimscroll-style">
						<ul id="themecolors">
							<li>
								<p class="sidebarSettingTitle">Sidebar Color</p>
							</li>
							<li class="complete">
								<div class="theme-color sidebar-theme">
									<a href="#" data-theme="white"><span class="head"></span><span
											class="cont"></span></a>
									<a href="#" data-theme="dark"><span class="head"></span><span
											class="cont"></span></a>
									<a href="#" data-theme="blue"><span class="head"></span><span
											class="cont"></span></a>
									<a href="#" data-theme="indigo"><span class="head"></span><span
											class="cont"></span></a>
									<a href="#" data-theme="cyan"><span class="head"></span><span
											class="cont"></span></a>
									<a href="#" data-theme="green"><span class="head"></span><span
											class="cont"></span></a>
									<a href="#" data-theme="red"><span class="head"></span><span
											class="cont"></span></a>
								</div>
							</li>
							<li>
								<p class="sidebarSettingTitle">Header Brand color</p>
							</li>
							<li class="theme-option">
								<div class="theme-color logo-theme">
									<a href="#" data-theme="logo-white"><span class="head"></span><span
											class="cont"></span></a>
									<a href="#" data-theme="logo-dark"><span class="head"></span><span
											class="cont"></span></a>
									<a href="#" data-theme="logo-blue"><span class="head"></span><span
											class="cont"></span></a>
									<a href="#" data-theme="logo-indigo"><span class="head"></span><span
											class="cont"></span></a>
									<a href="#" data-theme="logo-cyan"><span class="head"></span><span
											class="cont"></span></a>
									<a href="#" data-theme="logo-green"><span class="head"></span><span
											class="cont"></span></a>
									<a href="#" data-theme="logo-red"><span class="head"></span><span
											class="cont"></span></a>
								</div>
							</li>
							<li>
								<p class="sidebarSettingTitle">Header color</p>
							</li>
							<li class="theme-option">
								<div class="theme-color header-theme">
									<a href="#" data-theme="header-white"><span class="head"></span><span
											class="cont"></span></a>
									<a href="#" data-theme="header-dark"><span class="head"></span><span
											class="cont"></span></a>
									<a href="#" data-theme="header-blue"><span class="head"></span><span
											class="cont"></span></a>
									<a href="#" data-theme="header-indigo"><span class="head"></span><span
											class="cont"></span></a>
									<a href="#" data-theme="header-cyan"><span class="head"></span><span
											class="cont"></span></a>
									<a href="#" data-theme="header-green"><span class="head"></span><span
											class="cont"></span></a>
									<a href="#" data-theme="header-red"><span class="head"></span><span
											class="cont"></span></a>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div> -->
		<!-- end color quick setting -->
		<!-- start page container -->
		<div class="page-container">
			<!-- start sidebar menu -->
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
										<img alt="image" src="img/dp.jpg">
									</div>
									<div class="sidebar-user-details">
										<div class="user-name">Dr. Kiran Patel</div>
										<div class="user-role">Administrator</div>
									</div>
								</div>
							</li>
							<li class="nav-item ">
								<a href="#" class="nav-link nav-toggle">
									<i data-feather="airplay"></i>
									<span class="title">Dashboard</span>
									<span class="arrow"></span>
								</a>
								<ul class="sub-menu">
									<li class="nav-item">
										<a href="index-2.html" class="nav-link ">
											<span class="title">Dashboard 1</span>
										</a>
									</li>
									<li class="nav-item ">
										<a href="dashboard2.html" class="nav-link ">
											<span class="title">Dashboard 2</span>
										</a>
									</li>
									<li class="nav-item  ">
										<a href="dashboard3.html" class="nav-link ">
											<span class="title">Dashboard 3</span>
										</a>
									</li>
								</ul>
							</li>
							<li class="nav-item">
								<a href="#" class="nav-link nav-toggle">
									<i data-feather="mail"></i>
									<span class="title">Email</span>
									<span class="arrow"></span>
									<span class="label label-rouded label-menu deepPink-bgcolor">3</span>
								</a>
								<ul class="sub-menu">
									<li class="nav-item  ">
										<a href="email_inbox.html" class="nav-link ">
											<span class="title">Inbox</span>
										</a>
									</li>
									<li class="nav-item  ">
										<a href="email_view.html" class="nav-link ">
											<span class="title">View Mail</span>
										</a>
									</li>
									<li class="nav-item  ">
										<a href="email_compose.html" class="nav-link ">
											<span class="title">Compose Mail</span>
										</a>
									</li>
								</ul>
							</li>
							<li class="nav-item">
								<a href="calendar.html" class="nav-link nav-toggle"> <i data-feather="calendar"></i>
									<span class="title">Calendar</span>
								</a>
							</li>
							<li class="nav-item  ">
								<a href="#" class="nav-link nav-toggle"><i data-feather="book"></i>
									<span class="title">Appointment</span><span class="arrow"></span></a>
								<ul class="sub-menu">

									<li class="nav-item  ">
										<a href="book_appointment.html" class="nav-link "> <span class="title">Book
												Appointment</span>
										</a>
									</li>
									<li class="nav-item  ">
										<a href="book_appointment_material.html" class="nav-link "> <span
												class="title">Book Appointment Material</span>
										</a>
									</li>
									<li class="nav-item  ">
										<a href="edit_appointment.html" class="nav-link "> <span class="title">Edit
												Appointment</span>
										</a>
									</li>
									<li class="nav-item  ">
										<a href="view_appointment.html" class="nav-link "> <span class="title">View All
												Appointment</span>
										</a>
									</li>
								</ul>
							</li>
							<li class="nav-item  ">
								<a href="#" class="nav-link nav-toggle"> <i data-feather="user"></i>
									<span class="title">Doctors</span> <span class="arrow"></span>
								</a>
								<ul class="sub-menu">
									<li class="nav-item  ">
										<a href="all_doctors.html" class="nav-link "> <span class="title">All
												Doctor</span>
										</a>
									</li>
									<li class="nav-item  ">
										<a href="add_doctor.html" class="nav-link "> <span class="title">Add
												Doctor</span>
										</a>
									</li>
									<li class="nav-item  ">
										<a href="add_doctor_material.html" class="nav-link "> <span class="title">Add
												Doctor Material</span>
										</a>
									</li>
									<li class="nav-item  ">
										<a href="edit_doctor.html" class="nav-link "> <span class="title">Edit
												Doctor</span>
										</a>
									</li>
									<li class="nav-item  ">
										<a href="doctor_profile.html" class="nav-link "> <span class="title">About
												Doctor</span>
										</a>
									</li>
								</ul>
							</li>
							<li class="nav-item  ">
								<a href="#" class="nav-link nav-toggle"> <i data-feather="users"></i>
									<span class="title">Other Staff</span> <span class="arrow"></span>
								</a>
								<ul class="sub-menu">
									<li class="nav-item  ">
										<a href="all_staffs.html" class="nav-link "> <span class="title">All
												Staff</span>
										</a>
									</li>
									<li class="nav-item  ">
										<a href="add_staff.html" class="nav-link "> <span class="title">Add Staff</span>
										</a>
									</li>
									<li class="nav-item  ">
										<a href="add_staff_material.html" class="nav-link "> <span class="title">Add
												Staff Material</span>
										</a>
									</li>
									<li class="nav-item  ">
										<a href="edit_staff.html" class="nav-link "> <span class="title">Edit
												Staff</span>
										</a>
									</li>
									<li class="nav-item  ">
										<a href="staff_profile.html" class="nav-link "> <span class="title">Staff
												Profile</span>
										</a>
									</li>
								</ul>
							</li>
							<li class="nav-item  ">
								<a href="#" class="nav-link nav-toggle"> <i data-feather="smile"></i>
									<span class="title">Patients</span> <span class="arrow"></span>
								</a>
								<ul class="sub-menu">
									<li class="nav-item  ">
										<a href="all_patients.html" class="nav-link "> <span class="title">All
												Patients</span>
										</a>
									</li>
									<li class="nav-item  ">
										<a href="add_patient.html" class="nav-link "> <span class="title">Add
												Patient</span>
										</a>
									</li>
									<li class="nav-item  ">
										<a href="add_patient_material.html" class="nav-link "> <span class="title">Add
												Patient Material</span>
										</a>
									</li>
									<li class="nav-item  ">
										<a href="edit_patient.html" class="nav-link "> <span class="title">Edit
												Patient</span>
										</a>
									</li>
									<li class="nav-item  ">
										<a href="patient_profile.html" class="nav-link "> <span class="title">Patient
												Profile</span>
										</a>
									</li>
								</ul>
							</li>
							<li class="nav-item  ">
								<a href="#" class="nav-link nav-toggle"> <i data-feather="file-plus"></i>
									<span class="title">Room Allotment</span> <span class="arrow"></span>
								</a>
								<ul class="sub-menu">
									<li class="nav-item  ">
										<a href="room_allotment.html" class="nav-link "> <span class="title">Alloted
												Rooms</span>
										</a>
									</li>
									<li class="nav-item  ">
										<a href="add_room_allotment.html" class="nav-link "> <span class="title">New
												Allotment</span>
										</a>
									</li>
									<li class="nav-item  ">
										<a href="add_room_allotment_material.html" class="nav-link "> <span
												class="title">New Allotment Material</span>
										</a>
									</li>
									<li class="nav-item  ">
										<a href="edit_room_allotment.html" class="nav-link "> <span class="title">Edit
												Allotment</span>
										</a>
									</li>
								</ul>
							</li>
							<li class="nav-item  ">
								<a href="#" class="nav-link nav-toggle"> <i data-feather="dollar-sign"></i>
									<span class="title">Payments</span> <span class="arrow"></span>
								</a>
								<ul class="sub-menu">
									<li class="nav-item  ">
										<a href="payments.html" class="nav-link "> <span class="title">Payments</span>
										</a>
									</li>
									<li class="nav-item  ">
										<a href="add_payment.html" class="nav-link "> <span class="title">Add
												Payments</span>
										</a>
									</li>
									<li class="nav-item  ">
										<a href="invoice_payment.html" class="nav-link "> <span class="title">Patient
												Invoice</span>
										</a>
									</li>
								</ul>
							</li>
							<li class="nav-item  ">
								<a href="widget.html" class="nav-link nav-toggle"> <i data-feather="gift"></i>
									<span class="title">Widget</span>
								</a>
							</li>
							<li class="nav-item  ">
								<a href="#" class="nav-link nav-toggle">
									<i data-feather="copy"></i>
									<span class="title">UI Elements</span>
									<span class="label label-rouded label-menu">10</span>
									<span class="arrow"></span>
								</a>
								<ul class="sub-menu">
									<li class="nav-item  ">
										<a href="ui_buttons.html" class="nav-link ">
											<span class="title">Buttons</span>
										</a>
									</li>
									<li class="nav-item  ">
										<a href="ui_tabs_accordions_navs.html" class="nav-link ">
											<span class="title">Tabs &amp; Accordions</span>
										</a>
									</li>
									<li class="nav-item  ">
										<a href="sweet_alert.html" class="nav-link ">
											<span class="title">Alert</span>
										</a>
									</li>
									<li class="nav-item  ">
										<a href="ui_typography.html" class="nav-link ">
											<span class="title">Typography</span>
										</a>
									</li>
									<li class="nav-item  ">
										<a href="notifications.html" class="nav-link ">
											<span class="title">Notifications</span>
										</a>
									</li>
									<li class="nav-item  ">
										<a href="ui_icons.html" class="nav-link ">
											<span class="title">Icons</span>
										</a>
									</li>
									<li class="nav-item  ">
										<a href="ui_modal.html" class="nav-link ">
											<span class="title">Modals</span>
										</a>
									</li>
									<li class="nav-item  ">
										<a href="ui_panels.html" class="nav-link ">
											<span class="title">Panels</span>
										</a>
									</li>
									<li class="nav-item  ">
										<a href="ui_grid.html" class="nav-link ">
											<span class="title">Grids</span>
										</a>
									</li>
									<li class="nav-item  ">
										<a href="ui_tree.html" class="nav-link ">
											<span class="title">Tree View</span>
										</a>
									</li>
									<li class="nav-item  ">
										<a href="ui_carousel.html" class="nav-link ">
											<span class="title">Carousel</span>
										</a>
									</li>
								</ul>
							</li>
							<li class="nav-item  ">
								<a href="#" class="nav-link nav-toggle">
									<i data-feather="layers"></i>
									<span class="title">Material Elements</span>
									<span class="label label-rouded label-menu deepPink-bgcolor">14</span>
									<span class="arrow"></span>
								</a>
								<ul class="sub-menu">
									<li class="nav-item  ">
										<a href="material_button.html" class="nav-link ">
											<span class="title">Buttons</span>
										</a>
									</li>
									<li class="nav-item  ">
										<a href="material_tab.html" class="nav-link ">
											<span class="title">Tabs</span>
										</a>
									</li>
									<li class="nav-item  ">
										<a href="material_chips.html" class="nav-link ">
											<span class="title">Chips</span>
										</a>
									</li>
									<li class="nav-item  ">
										<a href="material_grid.html" class="nav-link ">
											<span class="title">Grid</span>
										</a>
									</li>
									<li class="nav-item  ">
										<a href="material_icons.html" class="nav-link ">
											<span class="title">Icon</span>
										</a>
									</li>
									<li class="nav-item  ">
										<a href="material_form.html" class="nav-link ">
											<span class="title">Form</span>
										</a>
									</li>
									<li class="nav-item  ">
										<a href="material_datepicker.html" class="nav-link ">
											<span class="title">DatePicker</span>
										</a>
									</li>
									<li class="nav-item  ">
										<a href="material_select.html" class="nav-link ">
											<span class="title">Select Item</span>
										</a>
									</li>
									<li class="nav-item  ">
										<a href="material_loading.html" class="nav-link ">
											<span class="title">Loading</span>
										</a>
									</li>
									<li class="nav-item  ">
										<a href="material_menu.html" class="nav-link ">
											<span class="title">Menu</span>
										</a>
									</li>
									<li class="nav-item  ">
										<a href="material_slider.html" class="nav-link ">
											<span class="title">Slider</span>
										</a>
									</li>
									<li class="nav-item  ">
										<a href="material_tables.html" class="nav-link ">
											<span class="title">Tables</span>
										</a>
									</li>
									<li class="nav-item  ">
										<a href="material_toggle.html" class="nav-link ">
											<span class="title">Toggle</span>
										</a>
									</li>
									<li class="nav-item  ">
										<a href="material_badges.html" class="nav-link ">
											<span class="title">Badges</span>
										</a>
									</li>
								</ul>
							</li>
							<li class="nav-item active open ">
								<a href="javascript:;" class="nav-link nav-toggle">
									<i data-feather="server"></i>
									<span class="title">Forms </span>
									<span class="selected"></span>
									<span class="arrow open"></span>
								</a>
								<ul class="sub-menu">
									<li class="nav-item active open ">
										<a href="layouts_form.html" class="nav-link ">
											<span class="title">Form Layout</span>
											<span class="selected"></span>
										</a>
									</li>
									<li class="nav-item  ">
										<a href="advance_form.html" class="nav-link ">
											<span class="title">Advance Component</span>
										</a>
									</li>
									<li class="nav-item  ">
										<a href="wizard_form.html" class="nav-link ">
											<span class="title">Form Wizard</span>
										</a>
									</li>
									<li class="nav-item  ">
										<a href="validation_form.html" class="nav-link ">
											<span class="title">Form Validation</span>
										</a>
									</li>
									<li class="nav-item  ">
										<a href="editable_form.html" class="nav-link ">
											<span class="title">Editor</span>
										</a>
									</li>
								</ul>
							</li>
							<li class="nav-item  ">
								<a href="javascript:;" class="nav-link nav-toggle">
									<i data-feather="grid"></i>
									<span class="title">Data Tables</span>
									<span class="arrow"></span>
								</a>
								<ul class="sub-menu">
									<li class="nav-item  ">
										<a href="basic_table.html" class="nav-link ">
											<span class="title">Basic Tables</span>
										</a>
									</li>
									<li class="nav-item  ">
										<a href="advanced_table.html" class="nav-link ">
											<span class="title">Advance Tables</span>
										</a>
									</li>
									<li class="nav-item  ">
										<a href="export_table.html" class="nav-link ">
											<span class="title">Export Tables</span>
										</a>
									</li>
									<li class="nav-item  ">
										<a href="child_row_table.html" class="nav-link ">
											<span class="title">Child Row Tables</span>
										</a>
									</li>
									<li class="nav-item  ">
										<a href="group_table.html" class="nav-link ">
											<span class="title">Grouping</span>
										</a>
									</li>
									<li class="nav-item  ">
										<a href="tableData.html" class="nav-link ">
											<span class="title">Tables With Sourced Data</span>
										</a>
									</li>
								</ul>
							</li>
							<li class="nav-item  ">
								<a href="javascript:;" class="nav-link nav-toggle">
									<i data-feather="pie-chart"></i>
									<span class="title">Charts</span>
									<span class="arrow"></span>
								</a>
								<ul class="sub-menu">
									<li class="nav-item">
										<a href="charts_apexchart.html" class="nav-link ">
											<span class="title">Apex chart</span>
										</a>
									</li>
									<li class="nav-item">
										<a href="charts_amchart.html" class="nav-link ">
											<span class="title">amChart</span>
										</a>
									</li>
									<li class="nav-item">
										<a href="charts_plotly.html" class="nav-link ">
											<span class="title">Plotly Charts</span>
										</a>
									</li>
									<li class="nav-item  ">
										<a href="charts_echarts.html" class="nav-link ">
											<span class="title">eCharts</span>
										</a>
									</li>
									<li class="nav-item  ">
										<a href="charts_morris.html" class="nav-link ">
											<span class="title">Morris Charts</span>
										</a>
									</li>
									<li class="nav-item  ">
										<a href="charts_chartjs.html" class="nav-link ">
											<span class="title">Chartjs</span>
										</a>
									</li>
								</ul>
							</li>
							<li class="nav-item  ">
								<a href="javascript:;" class="nav-link nav-toggle">
									<i data-feather="map-pin"></i>
									<span class="title">Maps</span>
									<span class="arrow"></span>
								</a>
								<ul class="sub-menu">
									<li class="nav-item  ">
										<a href="google_maps.html" class="nav-link ">
											<span class="title">Google Maps</span>
										</a>
									</li>
									<li class="nav-item  ">
										<a href="vector_maps.html" class="nav-link ">
											<span class="title">Vector Maps</span>
										</a>
									</li>
								</ul>
							</li>
							<li class="nav-item  ">
								<a href="javascript:;" class="nav-link nav-toggle"><i data-feather="anchor"></i>
									<span class="title">Extra pages</span>
									<span class="label label-rouded label-menu purple-bgcolor">7</span>
									<span class="arrow"></span>
								</a>
								<ul class="sub-menu">
									<li class="nav-item  ">
										<a href="login.html" class="nav-link "> <span class="title">Login</span>
										</a>
									</li>
									<li class="nav-item  ">
										<a href="sign_up.html" class="nav-link "> <span class="title">Sign Up</span>
										</a>
									</li>
									<li class="nav-item  ">
										<a href="forgot_password.html" class="nav-link "> <span class="title">Forgot
												Password</span>
										</a>
									</li>
									<li class="nav-item  "><a href="user_profile.html" class="nav-link "><span
												class="title">Profile</span>
										</a>
									</li>
									<li class="nav-item  ">
										<a href="contact.html" class="nav-link "> <span class="title">Contact Us</span>
										</a>
									</li>
									<li class="nav-item  ">
										<a href="lock_screen.html" class="nav-link "> <span class="title">Lock
												Screen</span>
										</a>
									</li>
									<li class="nav-item  ">
										<a href="page-404.html" class="nav-link "> <span class="title">404 Page</span>
										</a>
									</li>
									<li class="nav-item  ">
										<a href="page-500.html" class="nav-link "> <span class="title">500 Page</span>
										</a>
									</li>
									<li class="nav-item  ">
										<a href="blank_page.html" class="nav-link "> <span class="title">Blank
												Page</span>
										</a>
									</li>
								</ul>
							</li>
							<li class="nav-item">
								<a href="javascript:;" class="nav-link nav-toggle">
									<i data-feather="chevrons-down"></i>
									<span class="title">Multi Level Menu</span>
									<span class="arrow "></span>
								</a>
								<ul class="sub-menu">
									<li class="nav-item">
										<a href="javascript:;" class="nav-link nav-toggle">
											<i data-feather="alert-octagon"></i> Item 1
											<span class="arrow"></span>
										</a>
										<ul class="sub-menu">
											<li class="nav-item">
												<a href="javascript:;" class="nav-link nav-toggle">
													<i data-feather="aperture"></i> Arrow Toggle
													<span class="arrow "></span>
												</a>
												<ul class="sub-menu">
													<li class="nav-item">
														<a href="javascript:;" class="nav-link">
															<i data-feather="battery"></i> Sample Link 1</a>
													</li>
													<li class="nav-item">
														<a href="#" class="nav-link">
															<i data-feather="award"></i> Sample Link 2</a>
													</li>
													<li class="nav-item">
														<a href="#" class="nav-link">
															<i data-feather="box"></i> Sample Link 3</a>
													</li>
												</ul>
											</li>
											<li class="nav-item">
												<a href="#" class="nav-link">
													<i data-feather="clock"></i> Sample Link 1</a>
											</li>
											<li class="nav-item">
												<a href="#" class="nav-link">
													<i data-feather="database"></i> Sample Link 2</a>
											</li>
											<li class="nav-item">
												<a href="#" class="nav-link">
													<i data-feather="edit"></i> Sample Link 3</a>
											</li>
										</ul>
									</li>
									<li class="nav-item">
										<a href="javascript:;" class="nav-link nav-toggle">
											<i data-feather="folder"></i> Arrow Toggle
											<span class="arrow"></span>
										</a>
										<ul class="sub-menu">
											<li class="nav-item">
												<a href="#" class="nav-link">
													<i data-feather="film"></i> Sample Link 1</a>
											</li>
											<li class="nav-item">
												<a href="#" class="nav-link">
													<i data-feather="file"></i> Sample Link 1</a>
											</li>
											<li class="nav-item">
												<a href="#" class="nav-link">
													<i data-feather="heart"></i> Sample Link 1
												</a>
											</li>
										</ul>
									</li>
									<li class="nav-item">
										<a href="#" class="nav-link">
											<i data-feather="lock"></i> Item 3 </a>
									</li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- end sidebar menu -->
			<!-- start page content -->
			<div class="page-content-wrapper">
				<div class="page-content">
					<form id="" method="post" class="">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">AssistHealth Medical History Form</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="index-2.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="#">Forms</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active"></li>
							</ol>
						</div>
					</div>
					
						
							<div class="card card-box">
								<div class="card-head">
									<header>Patient Details</header>
									
								</div>
								<div class="card-body " id="bar-parent">
									<form>
										<div class="row">
										<div class="col-md-4 col-sm-4">
										<div class="form-group">
											<label for="simpleFormEmail">Name</label>
											<input type="text" class="form-control" id="simpleFormEmail"
												placeholder="Enter your name">
										</div>
										<div class="form-group">
											<label for="simpleFormPassword">Date Of Birth</label>
											 <input class="form-control" type="text" name="date" id="date" required>
                                                               <span class="error"></span>
 
									 	</div>
									  </div>
									  <div class="col-md-4 col-sm-4">
										
											<div class="form-group">
													<label for="simpleFormPassword">Gender</label><br>

												<input type="radio" name="optionsRadios" id="optionsRadios1"
														value="option1" checked>
													<label for="optionsRadios1">Male</label>	
													<input type="radio" name="optionsRadios" id="optionsRadios2"
														value="option2" checked>
													<label for="optionsRadios2">Female</label>
													<input type="radio" name="optionsRadios" id="optionsRadios2"
														value="option3" checked>
													<label for="optionsRadios3">Other</label>
													<input type="radio" name="optionsRadios" id="optionsRadios4"
														value="option4" checked>
													<label for="optionsRadios4">Prefer not to say</label>
												
											</div>
										 <div class="form-group mt-4">
											<label for="simpleFormPassword">Contact Number</label>
											<input type="number" class="form-control" id="simpleFormPassword"
												placeholder="Password">
									 	</div>
									  </div>
									   <div class="col-md-4 col-sm-4">
										<div class="form-group">
											<label for="simpleFormEmail">Email address</label>
											<input type="email" class="form-control" id="simpleFormEmail"
												placeholder="Enter email address">
									 	</div>
									       <div class="form-group">
									 			<label>Address</label>
												<textarea class="form-control" rows="2"
													placeholder="Enter ..."></textarea>
											</div>
									  </div>
									  </div>
										
									</form>
								</div>
							</div>
				
				
					<div class="row">
						<div class="col-md-6 col-sm-6">
							<div class="card card-box">
								<div class="card-head">
									<header>Emergency Contact</header>
									
								</div>
								<div class="card-body " id="bar-parent1">
									<div class="row">
										<div class="col-md-3 col-sm-3">
										<div class="form-group">
											<label for="simpleFormEmail">Name</label>
											<input type="text" class="form-control" id="simpleFormEmail"
												placeholder="Enter email address">
										</div>
									</div>
										<div class="col-md-4 col-sm-3">
										<div class="form-group">
											<label for="simpleFormEmail">Relationship with patient</label>
											<input type="text" class="form-control" id="simpleFormEmail"
												placeholder="Enter email address">
										</div>
									</div>
										<div class="col-md-3 col-sm-3">
										<div class="form-group">
											<label for="simpleFormPassword">Contact Number</label>
											<input type="number" class="form-control" id="simpleFormPassword"
												placeholder="Number">
										</div>
										
									</div>
										<div class="col-md-2 col-sm-3 mt-4">
									<button type="button" name="add" id="add" class="btn btn-success">+</button>
								      </div>

									</div>
									
										
									
								</div>
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="card card-box">
								<div class="card-head">
									<header>Primary Care Physician (AssistHealth Doctor) :</header>
									
								</div>
								<div class="card-body " id="bar-parent">
									<div class="row">
										<div class="col-md-6 col-sm-3">
										<div class="form-group">
											<label for="simpleFormEmail">Name</label>
											<input type="text" class="form-control" id="simpleFormEmail"
												placeholder="Enter email address">
										</div>
									</div>
										
										<div class="col-md-6 col-sm-3">
										<div class="form-group">
											<label for="simpleFormPassword">Contact Number</label>
											<input type="number" class="form-control" id="simpleFormPassword"
												placeholder="Number">
										</div>
									</div>
									</div>
									
										
									
								</div>
							</div>
						</div>
				
					
					</div>	
					<div class="row">
						<div class="col-md-6 col-sm-6">
							<div class="card card-box">
								<div class="card-head">
									<header>Previous Medical Conditions (If applicable) :</header>
									
								</div>
								<div class="card-body " id="bar-parent">
									<div class="row">
										<div class="col-md-4 col-sm-3">
										<div class="form-group">
											<label for="simpleFormEmail">Condition 1</label>
											<input type="text" class="form-control" id="simpleFormEmail"
												placeholder="Enter Condition">
										</div>
									</div>
										<div class="col-md-4 col-sm-3">
										<div class="form-group">
											<label for="simpleFormEmail">Diagnosis  Date</label>
											<input type="date"  id="date" class="form-control" id="simpleFormEmail"
												placeholder="Enter Date">
										</div>
									</div>
										<div class="col-md-4 col-sm-3">
										<div class="form-group">
											<label for="simpleFormPassword">Treatment Received</label>
											<input type="text" class="form-control" id="simpleFormPassword"
												placeholder="">
										</div>
									</div>
									</div>
									
										
									
								</div>
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="card card-box">
								<div class="card-head">
									<header>Previous Medical Conditions (If applicable) :</header>
									
								</div>
								<div class="card-body " id="bar-parent">
									<div class="row">
										<div class="col-md-4 col-sm-3">
										<div class="form-group">
											<label for="simpleFormEmail">Condition 2</label>
											<input type="text" class="form-control" id="simpleFormEmail"
												placeholder="Enter Condition">
										</div>
									</div>
										<div class="col-md-4 col-sm-3">
										<div class="form-group">
											<label for="simpleFormEmail">Diagnosis  Date</label>
											<input type="date"  id="date" class="form-control" id="simpleFormEmail"
												placeholder="Enter Date">
										</div>
									</div>
										<div class="col-md-4 col-sm-3">
										<div class="form-group">
											<label for="simpleFormPassword">Treatment Received</label>
											<input type="text" class="form-control" id="simpleFormPassword"
												placeholder="">
										</div>
									</div>
									</div>
									
										
									
								</div>
							</div>
						</div>
				
					
					</div>
					<div class="row">
						<div class="col-md-6 col-sm-6">
							<div class="card card-box">
								<div class="card-head">
									<header>Surgeries or Procedures (if applicable) :</header>
									
								</div>
								<div class="card-body " id="bar-parent">
									<div class="row">
										<div class="col-md-4 col-sm-3">
										<div class="form-group">
											<label for="simpleFormEmail">Procedure  1</label>
											<input type="text" class="form-control" id="simpleFormEmail"
												placeholder="Enter Procedure ">
										</div>
									</div>
										<div class="col-md-4 col-sm-3">
										<div class="form-group">
											<label for="simpleFormEmail">  Date</label>
											<input type="date"  id="date" class="form-control" id="simpleFormEmail"
												placeholder="Enter Date">
										</div>
									</div>
										<div class="col-md-4 col-sm-3">
										<div class="form-group">
											<label for="simpleFormPassword">Surgeon/Doctor</label>
											<input type="text" class="form-control" id="simpleFormPassword"
												placeholder="">
										</div>
									</div>
									</div>
									
										
									
								</div>
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
									<div class="card card-box">
								<div class="card-head">
									<header>Surgeries or Procedures (if applicable) :</header>
									
								</div>
								<div class="card-body " id="bar-parent">
									<div class="row">
										<div class="col-md-4 col-sm-3">
										<div class="form-group">
											<label for="simpleFormEmail">Procedure  2</label>
											<input type="text" class="form-control" id="simpleFormEmail"
												placeholder="Enter Procedure ">
										</div>
									</div>
										<div class="col-md-4 col-sm-3">
										<div class="form-group">
											<label for="simpleFormEmail">  Date</label>
											<input type="date"  id="date" class="form-control" id="simpleFormEmail"
												placeholder="Enter Date">
										</div>
									</div>
										<div class="col-md-4 col-sm-3">
										<div class="form-group">
											<label for="simpleFormPassword">Surgeon/Doctor</label>
											<input type="text" class="form-control" id="simpleFormPassword"
												placeholder="">
										</div>
									</div>
									</div>
									
										
									
								</div>
							</div>
						</div>
				
					
					</div>		
					<div class="row">
						<div class="col-md-6 col-sm-6">
							<div class="card card-box">
								<div class="card-head">
									<header>Allergies</header>
									
								</div>
								<div class="card-body " id="bar-parent">
									<div class="row">
										<div class="col-md-4 col-sm-3">
										<div class="form-group">
											<label for="simpleFormEmail">Medications</label>
											<input type="text" class="form-control" id="simpleFormEmail"
												placeholder="Enter  Medications">
										</div>
									</div>
										<div class="col-md-4 col-sm-3">
										<div class="form-group">
											<label for="simpleFormEmail">  Food</label>
											<input type="text"   class="form-control" id="simpleFormEmail"
												placeholder="Enter Food">
										</div>
									</div>
										<div class="col-md-4 col-sm-3">
										<div class="form-group">
											<label for="simpleFormPassword">Other</label>
											<input type="text" class="form-control" id="simpleFormPassword"
												placeholder="">
										</div>
									</div>
									</div>
									
										
									
								</div>
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
									<div class="card card-box">
								<div class="card-head">
									<header>Current Medications</header>
									
								</div>
								<div class="card-body " id="bar-parent">
									<div class="row">
										<div class="col-md-4 col-sm-3">
										<div class="form-group">
											<label for="simpleFormEmail">1) Medication Name</label>
											<input type="text" class="form-control" id="simpleFormEmail"
												placeholder="">
										</div>
									</div>
										<div class="col-md-4 col-sm-3">
										<div class="form-group">
											<label for="simpleFormEmail">  Dosage</label>
											<input type="text"   class="form-control" id="simpleFormEmail"
												placeholder="">
										</div>
									</div>
										<div class="col-md-4 col-sm-3">
										<div class="form-group">
											<label for="simpleFormPassword">Frequency</label>
											<input type="text" class="form-control" id="simpleFormPassword"
												placeholder="">
										</div>
									</div>
									</div>
									
										
									
								</div>
							</div>
						</div>
				
					
					</div>
						<div class="row">
					
						<div class="col-md-6 col-sm-6">
									<div class="card card-box">
								<div class="card-head">
									<header>Current Medications</header>
									
								</div>
								<div class="card-body " id="bar-parent">
									<div class="row">
										<div class="col-md-4 col-sm-3">
										<div class="form-group">
											<label for="simpleFormEmail">2) Medication Name</label>
											<input type="text" class="form-control" id="simpleFormEmail"
												placeholder="">
										</div>
									</div>
										<div class="col-md-4 col-sm-3">
										<div class="form-group">
											<label for="simpleFormEmail">  Dosage</label>
											<input type="text"   class="form-control" id="simpleFormEmail"
												placeholder="Enter Date">
										</div>
									</div>
										<div class="col-md-4 col-sm-3">
										<div class="form-group">
											<label for="simpleFormPassword">Frequency</label>
											<input type="text" class="form-control" id="simpleFormPassword"
												placeholder="">
										</div>
									</div>
									</div>
									
										
									
								</div>
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
									<div class="card card-box">
								<div class="card-head">
									<header>Family Medical History</header>
									
								</div>
								<div class="card-body " id="bar-parent">
									<div class="row">
										<div class="col-md-6 col-sm-3">
										<div class="form-group">
											<label for="simpleFormEmail">Conditions (e.g., heart disease, diabetes, cancer)</label>
											<input type="text" class="form-control" id="simpleFormEmail"
												placeholder="">
										</div>
									</div>
										<div class="col-md-6 col-sm-3">
										<div class="form-group">
											<label for="simpleFormEmail">  Relationship to Patient</label>
											<input type="text"   class="form-control" id="simpleFormEmail"
												placeholder=" ">
										</div>
									</div>
									
									</div>
									
										
									
								</div>
							</div>
						</div>
				  </div>	
				  <div class="row">
					
						<div class="col-md-6 col-sm-6">
									<div class="card card-box" style="height:203px">
								<div class="card-head">
									<header>Immunization History</header>
									
								</div>
								<div class="card-body " id="bar-parent">
									<div class="row">
										<div class="col-md-6 col-sm-3">
										<div class="form-group">
											<label for="simpleFormEmail">Vaccination</label>
											<input type="text" class="form-control" id="simpleFormEmail"
												placeholder="">
										</div>
									</div>
										<div class="col-md-6 col-sm-3">
										<div class="form-group">
											<label for="simpleFormEmail">  Date Received</label>
											<input type="date"  id="date"  class="form-control" id="simpleFormEmail"
												placeholder="Enter Date">
										</div>
									</div>
									
									</div>
									
										
									
								</div>
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
									<div class="card card-box">
								<div class="card-head">
									<header>Lifestyle Habits</header>
									
								</div>
								<div class="card-body " id="bar-parent">
									<div class="row">
										<div class="col-md-6 col-sm-3">
										<div class="form-group">
													<label for="simpleFormPassword">Smoking</label><br>

												<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
													<label for="optionsRadios1">Yes</label>	
													<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2" checked="">
													<label for="optionsRadios2">No</label>
													<input type="radio" name="optionsRadios" id="optionsRadios2" value="option3" checked="">
													<label for="optionsRadios3">Occasional</label>
													
												
											</div>
									</div>
										<div class="col-md-6 col-sm-3">
											<div class="form-group">
													<label for="simpleFormPassword">Alcohol Consumption</label><br>

													<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
													<label for="optionsRadios1">Yes</label>	
													<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2" checked="">
													<label for="optionsRadios2">No</label>
													<input type="radio" name="optionsRadios" id="optionsRadios2" value="option3" checked="">
													<label for="optionsRadios3">Occasional</label>
												
											</div>
									</div>
										<div class="col-md-6 col-sm-3">
										<div class="form-group">
													<label for="simpleFormPassword">Exercise</label><br>

													<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
													<label for="optionsRadios1">Yes</label>	
													<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2" checked="">
													<label for="optionsRadios2">No</label>
													<input type="radio" name="optionsRadios" id="optionsRadios2" value="option3" checked="">
													<label for="optionsRadios3">Occasional</label>
												
											</div>
									</div>
									
									</div>
									
										
									
								</div>
							</div>
						</div>
				  </div>  
				  <div class="row">
					
						<div class="col-md-6 col-sm-6">
									<div class="card card-box" >
								<div class="card-head">
									<header>Current Symptoms or Concerns</header>
									
								</div>
								<div class="card-body " id="bar-parent">
									<h5>List any symptoms or concerns you would like to discuss with the doctor:</h5>
									<div class="row">
										<div class="col-md-6 col-sm-3">
										<div class="form-group">
											<label for="simpleFormEmail">Symptom 1</label>
											<input type="text" class="form-control" id="simpleFormEmail"
												placeholder="">
										</div>
									</div>	
									<div class="col-md-6 col-sm-3">
										<div class="form-group">
											<label for="simpleFormEmail">Concerns</label>
											<input type="text" class="form-control" id="simpleFormEmail"
												placeholder="">
										</div>
									</div>
									
									
									</div>
									
										
									
								</div>
							</div>
						</div>
							<div class="col-md-6 col-sm-6">
									<div class="card card-box" >
								<div class="card-head">
									<header>Current Symptoms or Concerns</header>
									
								</div>
								<div class="card-body " id="bar-parent">
									<h5>List any symptoms or concerns you would like to discuss with the doctor:</h5>
									<div class="row">
										<div class="col-md-6 col-sm-3">
										<div class="form-group">
											<label for="simpleFormEmail">Symptom 2</label>
											<input type="text" class="form-control" id="simpleFormEmail"
												placeholder="">
										</div>
									</div>	
									<div class="col-md-6 col-sm-3">
										<div class="form-group">
											<label for="simpleFormEmail">Concerns</label>
											<input type="text" class="form-control" id="simpleFormEmail"
												placeholder="">
										</div>
									</div>
									
									
									</div>
									
										
									
								</div>
							</div>
						</div>
				  </div> 
				  <div class="row">
					
						<div class="col-md-6 col-sm-6">
									<div class="card card-box" >
								<div class="card-head">
									<header>Previous Medical Test Results</header>
									
								</div>
								<div class="card-body " id="bar-parent">
									<h5>List any relevant medical test results and their dates (e.g., blood tests, imaging reports)</h5>
									<div class="row">
										<div class="col-md-12 col-sm-3">
										<div class="form-group">
											<label for="simpleFormEmail"></label>
											<input type="text" class="form-control" id="simpleFormEmail"
												placeholder="">
										</div>
									</div>	
									
									
									
									</div>
									
										
									
								</div>
							</div>
						</div>
							<div class="col-md-6 col-sm-6">
									<div class="card card-box" style="height:185px">
								<div class="card-head">
									<header>Health Insurance Information:</header>
									
								</div>
								<div class="card-body " id="bar-parent">
								
									<div class="row">
										<div class="col-md-6 col-sm-3">
										<div class="form-group">
											<label for="simpleFormEmail">Insurance Provider 1</label>
											<input type="text" class="form-control" id="simpleFormEmail"
												placeholder="">
										</div>
									</div>	
									<div class="col-md-6 col-sm-3">
										<div class="form-group">
											<label for="simpleFormEmail">Policy Number</label>
											<input type="text" class="form-control" id="simpleFormEmail"
												placeholder="">
										</div>
									</div>
									
									
									</div>
									
										
									
								</div>
							</div>
						</div>
				  </div>
				  	<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="card card-box">
								<div class="card-head">
									<header>Health Insurance Information:</header>
									
								</div>
								<div class="card-body " id="bar-parent5">
									<div class="row">
										<div class="col-md-6 col-sm-3">
										<div class="form-group">
											<label for="simpleFormEmail">Insurance Provider 2</label>
											<input type="text" class="form-control" id="simpleFormEmail"
												placeholder="">
										</div>
									</div>	
									<div class="col-md-6 col-sm-3">
										<div class="form-group">
											<label for="simpleFormEmail">Policy Number</label>
											<input type="text" class="form-control" id="simpleFormEmail"
												placeholder="">
										</div>
									</div>
									
									
									</div>
										<button type="submit" class="btn btn-primary">Submit</button>
			                         	<button type="submit" class="btn btn-default">Cancel</button>
								</div>
							</div>
						</div>
					</div>
			
			</div>
			<!-- end page content -->
			<!-- start chat sidebar -->
			
			<!-- end chat sidebar -->
		</div>
	   <!-- start js include path -->
    <?php $this->load->view('Backend/admin/admin-temp/footer'); ?> 
    <!-- end js include path -->

    <script src="<?php echo base_url(); ?>assets/backend_assets/bundles/material/material.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend_assets/bundles/flatpicker/js/flatpicker.min.js"></script>
	<!-- end js include path -->
</body>


<!-- Mirrored from www.einfosoft.com/templates/admin/redstar/source/light/layouts_form.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 18 Oct 2022 13:45:32 GMT -->
</html>
<script type="text/javascript">
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

            $(document).ready(function(){  
            var i=1;  
            $('#add').click(function(){  
                 i++;  /*<td><input type="text" name="allowance[]" placeholder="Enter Allowance" class="form-control name_list" /></td>*/
                 $('#bar-parent1').append('<div id="row'+i+'" class="addfields row"> <div class="col-md-3 col-sm-3"> <div class="form-group"> <label for="simpleFormEmail">Name</label> <input type="text" class="form-control" id="simpleFormEmail" placeholder="Enter email address"> </div> </div> <div class="col-md-4 col-sm-3"> <div class="form-group"> <label for="simpleFormEmail">Relationship with patient</label> <input type="text" class="form-control" id="simpleFormEmail" placeholder="Enter email address"> </div> </div> <div class="col-md-3 col-sm-3"> <div class="form-group"> <label for="simpleFormPassword">Contact Number</label> <input type="number" class="form-control" id="simpleFormPassword" placeholder="Number"> </div> </div> <div class="col-md-2 col-sm-3 mt-4"> <button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></div> </div></div>');  
            });  
            $(document).on('click', '.btn_remove', function(){  
                 var button_id = $(this).attr("id");   
                
                 $('#row'+button_id+'').remove();  
                
            }); 
            }); 
</script>