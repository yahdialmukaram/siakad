<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title><?=$title?> | </title>

	<!-- Bootstrap -->
	<link href="<?=base_url();?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Font Awesome -->
	<link href="<?=base_url();?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- NProgress -->
	<link href="<?=base_url();?>assets/vendors/nprogress/nprogress.css" rel="stylesheet">
	<!-- Datatables -->
	<link href="<?=base_url();?>assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
	<link href="<?=base_url();?>assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
	<link href="<?=base_url();?>assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css"
		rel="stylesheet">
	<link href="<?=base_url();?>assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css"
		rel="stylesheet">
	<link href="<?=base_url();?>assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css"
		rel="stylesheet">
	<!-- bootstrap-daterangepicker -->
	<link href="<?=base_url();?>assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

	<!-- Custom Theme Style -->
	<link href="<?=base_url();?>assets/build/css/custom.min.css" rel="stylesheet">
	<!-- jQuery -->
	
	<script src="<?=base_url();?>assets/vendors/jquery/dist/jquery.min.js"></script>
	<script src="<?=base_url();?>node_modules/sweetalert/dist/sweetalert.min.js"></script>
	<!-- <script src="<?=base_url();?>DataTables/css/jquery.dataTables.min.css"></script> -->
	<!-- <script src="<?=base_url();?>DataTables/js/jquery.dataTables.js"></script> -->

</head>

<body class="nav-md">
	<div class="container body">
		<div class="main_container">
			<div class="col-md-3 left_col">
				<div class="left_col scroll-view">
					<div class="navbar nav_title" style="border: 0;">
						<a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Siakad</span></a>
					</div>

					<div class="clearfix"></div>

					<!-- menu profile quick info -->
					<div class="profile clearfix">
						<div class="profile_pic">
							<img src="<?=base_url();?>assets/images/img.jpg" alt="..." class="img-circle profile_img">
						</div>
						<div class="profile_info">
							<span>Welcome,</span>
							<h2><?= $this->session->userdata('username');
				?></h2>
						</div>
					</div>
					<!-- /menu profile quick info -->

					<br />

					<!-- sidebar menu -->
					<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
						<div class="menu_section">
							<h3>General</h3>
							<ul class="nav side-menu">
								<li><a href="<?=base_url();?>c_admin"><i class="fa fa-home"></i> Home <span class=""></span></a>
								</li>
								<li><a href="<?=base_url();?>c_admin/v_data_user"><i class="fa fa-user"></i> Data Pengguna Siakad <span
											class=""></span></a>
								</li>
								<li><a><i class="fa fa-home"></i> Data Master <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="index.html">Data Tahun Akademik</a></li>
										<li><a href="<?=base_url();?>c_admin/v_data_jurusan">Data Jurusan</a></li>
										<li><a href="<?=base_url();?>c_admin/v_data_guru">Data Guru</a></li>
										<!-- <li><a href="index.html">Data Ruangan</a></li>
										<li><a href="index.html">Data Gedung</a></li>
										<li><a href="index.html">Data Kelas</a></li>
										<li><a href="index.html">Data Golongan</a></li>
										<li><a href="index.html">Data Status Kepegawaian</a></li> -->
									</ul>
								</li>
								<li><a><i class="fa fa-edit"></i> Data Akademik <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="form.html">Data Kelompok Matpel</a></li>
										<li><a href="form.html">Data Matpel</a></li>
										<li><a href="form_advanced.html">Jadwal Pelajaran</a></li>
										<li><a href="form_validation.html">Form Validation</a></li>
										<li><a href="form_wizards.html">Form Wizard</a></li>
										<li><a href="form_upload.html">Form Upload</a></li>
										<li><a href="form_buttons.html">Form Buttons</a></li>
									</ul>
								</li>

							</ul>
						</div>


					</div>
					<!-- /sidebar menu -->

					<!-- /menu footer buttons -->
					<div class="sidebar-footer hidden-small">
						<a data-toggle="tooltip" data-placement="top" title="Settings">
							<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
						</a>
						<a data-toggle="tooltip" data-placement="top" title="FullScreen">
							<span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
						</a>
						<a data-toggle="tooltip" data-placement="top" title="Lock">
							<span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
						</a>
						<a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
							<span class="glyphicon glyphicon-off" aria-hidden="true"></span>
						</a>
					</div>
					<!-- /menu footer buttons -->
				</div>
			</div>

			<!-- top navigation -->
			<div class="top_nav">
				<div class="nav_menu">
					<nav>
						<div class="nav toggle">
							<a id="menu_toggle"><i class="fa fa-bars"></i></a>
						</div>

						<ul class="nav navbar-nav navbar-right">
							<li class="">
								<a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
									aria-expanded="false">
									<img src="<?=base_url()?>assets/images/img.jpg" alt=""><?= $this->session->userdata('username');?>
									<span class=" fa fa-angle-down"></span>
								</a>
								<ul class="dropdown-menu dropdown-usermenu pull-right">
									<!-- <li><a href="javascript:;"> Profile</a></li> -->
									<!-- <li><a href="javascript:;">Help</a></li> -->
									<li><a href="<?=base_url()?>c_login"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
								</ul>
							</li>


						</ul>
					</nav>
				</div>
			</div>
			<!-- /top navigation -->
