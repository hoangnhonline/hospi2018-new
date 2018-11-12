<!DOCTYPE html>
<head>
	<base href="<?php echo base_url(); ?>">
	<meta charset="utf-8">
	<title>Dashboard</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<script src="<?php echo base_url(); ?>assets_admin_new/include/pace/pace.min.js"></script>
	<link href="<?php echo base_url(); ?>assets_admin_new/include/pace/dataurl.css" rel="stylesheet"/>
	<link rel="shortcut icon" href="<?php echo base_url(); ?>uploads/global/favicon.png">
	<link href="<?php echo base_url(); ?>assets_admin_new/include/loading/loading.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets_admin_new/css/style.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets_admin_new/css/admin.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets_admin_new/css/themes/facebook.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets_admin_new/css/fa.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets_admin_new/css/animate.min.css" rel="stylesheet">
	<script src="<?php echo base_url(); ?>assets_admin_new/include/ckeditor/ckeditor.js"></script>
	<script src="<?php echo base_url(); ?>assets_admin_new/js/jquery-1.11.2.js"></script>
	<link href="<?php echo base_url(); ?>assets_admin_new/include/alert/css/alert.css" rel="stylesheet"/>
	<link href="<?php echo base_url(); ?>assets_admin_new/include/alert/themes/default/theme.css" rel="stylesheet"/>
	<script src="<?php echo base_url(); ?>assets_admin_new/include/alert/js/alert.js"></script>
	<script src="<?php echo base_url(); ?>assets_admin_new/js/numeral.js"></script>
	<!---Jquery Form--->
	<script src="<?php echo base_url(); ?>assets_admin_new/include/jquery-form/jquery.form.min.js"></script>

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries-->
	<script src="<?php echo base_url(); ?>assets_admin_new/include/alert/js/alert.js"></script>

	<script src="<?php echo base_url(); ?>assets_admin_new/js/ajax_base.js"></script>
	<!--[if lte IE 8]>
	<script src="<?php echo base_url(); ?>assets_admin_new/js/html5shiv.js"></script>
	<script src="<?php echo base_url(); ?>assets_admin_new/js/respond.min.js"></script>
	<script src="<?php echo base_url(); ?>assets_admin_new/js/excanvas.min.js"></script>
	<![endif]-->

	<style>
		.wrapper .main {
			margin-top: 55px;
		}

		@media screen and (max-width: 480px) {
			.wrapper .main {
				margin-top: 100px;
			}
		}

		.nav-tabs.nav-justified > li a {
			background-color: white;
			border: none;

		}

		.nav-tabs.nav-justified > .active > a, .nav-tabs.nav-justified > .active > a:hover, .nav-tabs.nav-justified > .active > a:focus {
			color: #660033;
			border-bottom: #660033;
		}

		.nav-tabs.nav-justified {
			border-bottom: 1px solid #ccc;
		}

		.nav-tabs.nav-justified > .active > a.clsstaobooking,
		.nav-tabs.nav-justified > .active > a.clsstaobooking:hover,
		.nav-tabs.nav-justified > .active > a.clsstaobooking:focus {
			color: #660033;
			border-bottom: 1px solid #660033;
			width: 89px;

			padding-left: 0px;
			padding-right: 0px;
		}

		.nav-tabs.nav-justified > .active > a.clssdonghang,
		.nav-tabs.nav-justified > .active > a.clssdonghang:hover,
		.nav-tabs.nav-justified > .active > a.clssdonghang:focus {
			padding-left: 0px;
			border-bottom: 1px solid #660033;
			width: 66px;
			padding-right: 0px;
		}

		.nav-tabs.nav-justified > .active > a.clssdieukienhuy,
		.nav-tabs.nav-justified > .active > a.clssdieukienhuy:hover,
		.nav-tabs.nav-justified > .active > a.clssdieukienhuy:focus {
			width: 88px;

			border-bottom: 1px solid #660033;
			padding-left: 0px;
			padding-right: 0px;
		}

		.nav-tabs.nav-justified > .active > a.clssdieukiensudung,
		.nav-tabs.nav-justified > .active > a.clssdieukiensudung:hover,
		.nav-tabs.nav-justified > .active > a.clssdieukiensudung:focus {

			width: 118px;
			padding-left: 0px;
			padding-right: 0px;
			text-align: right;
			border-bottom: 1px solid #660033;
			margin-right: -59px;
		}

		.nav-tabs.nav-justified > .active > a.clssthongtinbooking,
		.nav-tabs.nav-justified > .active > a.clssthongtinbooking:hover,
		.nav-tabs.nav-justified > .active > a.clssthongtinbooking:focus {

			border-bottom: 1px solid #660033;
			width: 126px;
			padding-left: 0px;
			padding-right: 0px;
		}

		.nav-tabs.nav-justified > .active > a.clssxuathoadon,
		.nav-tabs.nav-justified > .active > a.clssxuathoadon:hover,
		.nav-tabs.nav-justified > .active > a.clssxuathoadon:focus {
			width: 96px;
			padding-left: 0px;
			padding-right: 0px;
			border-bottom: 1px solid #660033;
		}

		.nav-tabs.nav-justified > .active > a.clssphuongthucthanhtoan,
		.nav-tabs.nav-justified > .active > a.clssphuongthucthanhtoan:hover,
		.nav-tabs.nav-justified > .active > a.clssphuongthucthanhtoan:focus {
			width: 168px;
			padding-left: 0px;
			padding-right: 0px;
			border-bottom: 1px solid #660033;
		}

		.margin-left-15 {
			margin-left: 15px;
		}

	</style>

</head>

<body>

<div class="wrapper">
	<!-- BEGIN SIDEBAR-->
	<?php include 'sidebar_new.php'; ?>
	<!-- END SIDEBAR-->
	<?php include 'headbar_new.php'; ?>
	<div class="main">


