<?php include 'main/auth.inc.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<title><?php echo "$title"; ?> - Tinyatech Associates </title>
		<meta name="description" content="">
		<meta name="author" content="">

		<!-- Favicon -->
		<!-- <link rel="shortcut icon" href="assets/images/favicon.ico"> -->

		<!-- Switchery css -->
		<link href="assets/plugins/switchery/switchery.min.css" rel="stylesheet" />
		
		<!-- Bootstrap CSS -->
		<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<!-- Favicon -->
    <link rel="icon" href="../img/core-img/favicon.png">
		<!-- Font Awesome CSS -->
		<link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
		
		<!-- Custom CSS -->
		<link href="assets/css/style.css" rel="stylesheet" type="text/css" />

        <!-- BEGIN CSS for this page -->
        <link href="assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css"/>
        <!-- END CSS for this page -->
		<!-- Datatables -->
    <link href="assets/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="assets/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="assets/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="assets/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="assets/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
		<script src="assets/js/modernizr.min.js"></script>
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/moment.min.js"></script>
        <!-- BEGIN CSS for this page -->
        <link rel="stylesheet" href="assets/plugins/trumbowyg/ui/trumbowyg.min.css">
        <!-- END CSS for this page -->
                

		<!-- BEGIN CSS for this page -->
		<style>
		.parsley-error {
			border-color: #ff5d48 !important;
		}
		.parsley-errors-list.filled {
			display: block;
		}
		.parsley-errors-list {
			display: none;
			margin: 0;
			padding: 0;
		}
		.parsley-errors-list > li {
			font-size: 12px;
			list-style: none;
			color: #ff5d48;
			margin-top: 5px;
		}
		.form-section {
			padding-left: 15px;
			border-left: 2px solid #FF851B;
			display: none;
		}
		.form-section.current {
			display: inherit;
		}
		</style>
		<!-- END CSS for this page -->
				
</head>

<body class="adminbody">

<div id="main">

	<!-- top bar navigation -->
	<div class="headerbar">

		<!-- LOGO -->
        <div class="headerbar-left">
			<a href="dashboard" class="logo"><img alt="logo" src="../images/logo-1.png" /> <span></span></a>
        </div>

        <nav class="navbar-custom">

                    <ul class="list-inline float-right mb-0">
						<li class="list-inline-item dropdown notif">
                            <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="fa fa-fw fa-bell-o"></i><span class="notif-bullet"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-lg">
								<!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h5><small><span class="label label-danger pull-xs-right">5</span>Allerts</small></h5>
                                </div>
								
                                <!-- item-->
                                <a href="#" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-faded">
                                        <img src="assets/images/avatars/avatar2.png" alt="img" class="rounded-circle img-fluid">
                                    </div>
                                    <p class="notify-details">
                                        <b>John Doe</b>
                                        <span>User registration</span>
                                        <small class="text-muted">3 minutes ago</small>
                                    </p>
                                </a>

                                <!-- item-->
                                <a href="#" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-faded">
                                        <img src="assets/images/avatars/avatar3.png" alt="img" class="rounded-circle img-fluid">
                                    </div>
                                    <p class="notify-details">
                                        <b>Michael Cox</b>
                                        <span>Task 2 completed</span>
                                        <small class="text-muted">12 minutes ago</small>
                                    </p>
                                </a>

                                <!-- item-->
                                <a href="#" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-faded">
                                        <img src="assets/images/avatars/avatar4.png" alt="img" class="rounded-circle img-fluid">
                                    </div>
                                    <p class="notify-details">
                                        <b>Michelle Dolores</b>
                                        <span>New job completed</span>
                                        <small class="text-muted">35 minutes ago</small>
                                    </p>
                                </a>

                                <!-- All-->
                                <a href="#" class="dropdown-item notify-item notify-all">
                                    View All Allerts
                                </a>

                            </div>
                        </li>

                        <li class="list-inline-item dropdown notif">
                            <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false"><?php echo "$DB_display"; ?>
                                <img src="assets/images/avatars/admin.png" alt="Profile image" class="avatar-rounded">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-dropdown">
                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h5 class="text-overflow"><small>Hello, <?php echo "$DB_user"; ?></small> </h5>
                                </div>

                                <!-- item-->
                                <a href="pro-profile.html" class="dropdown-item notify-item">
                                    <i class="fa fa-user"></i> <span>Profile</span>
                                </a>
    <!-- item-->
                                <a target="_blank" href="add-user" class="dropdown-item notify-item">
                                    <i class="fa fa-users"></i> <span>Add User</span>
                                </a>

                                <!-- item-->
                                <a href="logout" class="dropdown-item notify-item">
                                    <i class="fa fa-power-off"></i> <span>Logout</span>
                                </a>
								
							
								
                            </div>
                        </li>

                    </ul>

                    <ul class="list-inline menu-left mb-0">
                        <li class="float-left">
                            <button class="button-menu-mobile open-left">
								<i class="fa fa-fw fa-bars"></i>
                            </button>
                        </li>                        
                    </ul>

        </nav>

	</div>
	<!-- End Navigation -->
	
 
	<!-- Left Sidebar -->
	<div class="left main-sidebar">
	 
		<div class="sidebar-inner leftscroll">

			<div id="sidebar-menu">
        
			<ul>

					<li class="submenu">
						<a href="dashboard"><i class="fa fa-fw fa-bars"></i><span> Dashboard </span> </a>
                    </li>
				<!-- 	
                    <li class="submenu">
                        <a href="#"><i class="fa  fa-object-group"></i> <span> Categories </span><span class="menu-arrow"></span><span class="label radius-circle bg-primary float-right"><?php echo "$count"; ?></span> </a>
                            <ul class="list-unstyled">
                               <li><a href="category">Insert </a></li>
                                <li><a href="view_category">View </a></li>
                            </ul>
                    </li> -->
                     <li class="submenu">
                        <a href="#"><i class="fa fa-file-text"></i> <span> Posts </span><span class="menu-arrow"></span> </a>
                            <ul class="list-unstyled">
                               <li><a href="post">Add</a></li>
                                <li><a href="view_post">View </a></li>
                            </ul>
                    </li>
                    <!-- <li class="submenu">
                        <a href="#"><i class="fa  fa-shopping-cart"></i> <span> Products </span><span class="menu-arrow"></span><span class="label radius-circle bg-primary float-right"><?php echo "$count"; ?></span> </a>
                            <ul class="list-unstyled">
                               <li><a href="products">Insert Product</a></li>
                                <li><a href="view-products">View Products</a></li>
                            </ul>
                    </li> -->
					<li class="submenu">
                        <a href="volunteer_info"><i class="fa fa-users"></i> <span> Volunteer Information </span><span class="label radius-circle bg-primary float-right"><?php echo "$count2"; ?></span> </a>
                    </li>
                    <!-- <li class="submenu">
                        <a href="comments"><i class="fa fa-comments"></i> <span> Comments </span><span class="label radius-circle bg-primary float-right"><?php echo "$count"; ?></span> </a>
                    </li> -->
                    <li class="submenu">
                        <a href="contact-info"><i class="fa fa-map"></i> <span> Contact Information </span><span class="label radius-circle bg-primary float-right"><?php echo "$count4"; ?></span> </a>
                    </li>
                    <li class="submenu">
                        <a href="newsletter"><i class="fa fa-fw fa-table"></i> <span> News Letter </span><span class="label radius-circle bg-primary float-right"><?php echo "$count1"; ?></span> </a>
                    </li>
                    
						 <li class="submenu">
                        <a href="upload_images"><span class="label radius-circle bg-primary float-right"><?php// echo "$count2"; ?></span><i class="fa  fa-file-picture-o"></i><span> Upload Images </span></a>
                    </li>				
					<!-- <li class="submenu">
                        <a href="newsletter"><span class="label radius-circle bg-primary float-right"><?php// echo "$count1"; ?></span><i class="fa fa-fw fa-indent"></i><span> News Letter </span></a>
                    </li> -->
                     <li class="submenu">
                        <a href="#"><i class="fa fa-envelope"></i> <span> Communications </span><span class="menu-arrow"></span><span> </a>
                            <ul class="list-unstyled">
                               <li><a href="Send-Email">Send Email</a></li>
                            </ul>
                    </li>
                  
                     <li class="submenu">
                        <a href="add-user"><!-- <span class="label radius-circle bg-primary float-right"><?php //echo "$count2"; ?></span> --><i class="fa fa-cogs"></i><span> Manage Accounts </span></a>
                    </li>
					   <li class="submenu">
                        <a href="users"><span class="label radius-circle bg-primary float-right"></span><i class="fa fa-fw fa-indent"></i><span> Logout </span></a>
                    </li>
            </ul>

            <div class="clearfix"></div>

			</div>
        
			<div class="clearfix"></div>

		</div>

	</div>
	<!-- End Sidebar -->
      <div class="content-page">
    
        <!-- Start content -->
        <div class="content">
            
            <div class="container-fluid">


            <div class="row">
                    <div class="col-xl-12">
                            <div class="breadcrumb-holder">
                                    <h1 class="main-title float-left text-uppercase"> Control Panel </h1>
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item">Control Panel</li>
                                        <li class="breadcrumb-item active"><?php echo "$title"; ?></li>
                                    </ol>
                                    <div class="clearfix"></div>
                            </div>
                    </div>
            </div>
            <!-- end row -->