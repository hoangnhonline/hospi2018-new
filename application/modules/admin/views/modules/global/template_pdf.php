<!DOCTYPE html>
<html ng-app="phptravelsApp">
<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="HOSPI">
	<meta property="fb:app_id" content="159189514584032"/>
	<title>Novotel Phú Quốc Resort</title>
	<link rel="shortcut icon" href="https://www.hospi.vn/uploads/global/favicon.png">
	<link href="<?php echo $theme_url; ?>assets/css/bootstrap-modal.css" rel="stylesheet" media="screen">
	<link href="<?php echo $theme_url; ?>assets/css/bootstrap.css" rel="stylesheet" media="screen">
	<link href="<?php echo $theme_url; ?>assets/css/custom.css" rel="stylesheet" media="screen">
	<!-- Duc add css file -->
	<link href="<?php echo $theme_url; ?>style.css" rel="stylesheet" media="screen">
	<link href="<?php echo $theme_url; ?>asset/css/styleNews.css" rel="stylesheet">
	<link href="<?php echo $theme_url; ?>asset/css/book.css" rel="stylesheet">

	<!-- facebook -------->
	<meta property="og:title" content="Novotel Phú Quốc Resort"/>
	<meta property="og:site_name" content="HOSPI - Đặt phòng khách sạn"/>
	<meta property="og:description" content=""/>
	<meta property="og:publisher" content="https://www.facebook.com/HOSPI - Đặt phòng khách sạn"/>
	<!--[if lt IE 9]>
	<!-- BASE CSS --------->
	<link href="<?php echo $theme_url; ?>style.css" rel="stylesheet">
	<style> @import "<?php echo $theme_url; ?>childtheme/childstyle.css"; </style>
	<script src="<?php echo $theme_url; ?>assets/js/jquery-1.11.2.min.js"></script>
	<style type="text/css">
		body {
			font-family: "Open Sans", "Helvetica Neue", Helvetica, Arial, sans-serif;
			font-size: 13px;
			line-height: 1.42857143;
			color: #333333;
		}

		.text-logo {
			text-align: right;
		}

		label {
			margin-bottom: 0;
		}

		.img-responsive {
			float: right;
		}

		@media only screen and (max-device-width: 640px) {
			.text-logo {
				text-align: center;
			}

			.img-responsive {
				float: none;
			}

			.logo-mobile {
				text-align: center;
			}

			.navbar-brand > img {
				display: inherit;
			}

			.navbar-brand {
				float: none;
			}

			.book_info {
				margin-top: 10px;
			}
		}

		@media only screen and (max-device-width: 768px) {
			.text-logo {
				text-align: center;
			}

			.img-responsive {
				float: none;
			}

			.navbar-brand > img {
				display: inherit;
			}

			.navbar-brand {
				float: none;
			}

			.logo-mobile {
				text-align: center;
			}

			.book_info {
				margin-top: 10px;
			}
		}

	</style>
</head>
<body id="top">
<div id="wait">
	<div class="lds-css ng-scope">
		<div style="width:100%;height:100%" class="lds-flickr">
			<!-- <div class="rotatingwait"></div> -->
			<div class="spinner">
				<div class="dot1"></div>
				<div class="dot2"></div>
				<div class="dot3"></div>
			</div>
		</div>
	</div>
</div>
<!-- Duc add html header-top -->

<div class="navbar navbar-static-top navbar-default navbar-custom margin-bottom-30">
	<div class="container">
		<div class="navbar">
			<!-- Navigation-->
			<div class="col-md-5 col-xs-12" style="padding: 0">
				<div class="navbar-header go-right logo-mobile" style="    margin-top: 10px;">
					<a href="<?php echo $theme_url; ?>" class="navbar-brand"><img src="<?php echo $theme_url; ?>assets/img/logo.png" alt="HOSPI - Đặt phòng khách sạn" class="logo"/></a>
				</div>

			</div>
			<div class="col-md-7 col-xs-12 text-logo">
				<div class="col-md-12 margin-top-15 col-xs-12" style="padding-right: 0">
					<div class=" clss-img-combo">
						<?php
						if ($type == "hotel") {
							?>
							<img src="<?php echo $theme_url; ?>asset/img/HotelCombo.png" class="img-responsive"/>.
							<?php
						} else {
							?>
							<img src="<?php echo $theme_url; ?>asset/img/logo-voucher.png" class="img-responsive"/>.
							<?php
						}
						?>
					</div>
					<div class="col-xs-12" style="padding-right: 0">
						<span class="cl-grey">Phiếu xác nhận đặt phòng</span></div>
					<div class="col-xs-12" style="padding-right: 0">
						<span class="cl-grey">Ngày <?php echo date("d/m/Y", strtotime($create_date)); ?></span></div>
				</div>
			</div>


		</div>
	</div>
</div>
<?php
$this->load->view($main_content);
?>
<!-- END OF CONTENT -->
<div class="clearfix"></div>

<div class="container-fulid bk-tim clss-footer margin-top-15">
	<div class="col-lg-4 bk-tim ">&#169; 2018- by HOSPI TRAVEL CO.LTD</div>
	<div class="col-lg-2 bk-tim "><i class="fa fa-chevron-right" aria-hidden="true"></i>
		<a style="color: white;" href="https://www.hospi.vn/chinh-sach-bao-mat" title="Chính sách bảo mật">Chính
			sách bảo mật</a></div>
	<div class="col-lg-2 bk-tim "><i class="fa fa-chevron-right" aria-hidden="true"></i>
		<a style="color: white;" href="https://www.hospi.vn/dieu-khoan-su-dung" title="Điều khoản sử dụng">Điều
			khoản sử dụng</a></div>
	<div class="col-lg-4 bk-tim ">Lầu 1,số 124 Khánh Hội,P.6, Quận 4,TP.Hồ Chí Minh</div>
</div>


<style type="text/css">
	.block-panel-info {
		line-height: 24px;
	}
</style>
<script src="<?php echo $theme_url; ?>assets/js/jspdf.min.js"></script>
<script src="<?php echo $theme_url; ?>assets/js/html2canvas.min.js"></script>
</body>
</html>




