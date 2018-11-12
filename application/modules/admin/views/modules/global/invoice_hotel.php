<?php
if($invoice->status =='paid'){
  $payment_status ="Đã thanh toán";
}elseif($invoice->status =='unpaid'){
   $payment_status ="Chưa thanh toán";
}elseif($invoice->status =='reserved'){
   $payment_status ="Đã cọc";
}elseif($invoice->status =='unpaid'){
   $payment_status ="Đã hủy";
}
?>
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
  <title><?php echo $invoice->title; ?></title>
  <link rel="shortcut icon" href="https://www.hospi.vn/uploads/global/favicon.png">
  <link href="<?php echo $theme_url; ?>assets/css/bootstrap-modal.css" rel="stylesheet" media="screen">
  <link href="<?php echo $theme_url; ?>assets/css/bootstrap.css" rel="stylesheet" media="screen">
  <link href="<?php echo $theme_url; ?>assets/css/bootstrap-slider.css" rel="stylesheet" media="screen">
  <link href="<?php echo $theme_url; ?>assets/css/custom.css" rel="stylesheet" media="screen">
  <!-- Duc add css file -->
  <link href="<?php echo $theme_url; ?>style.css" rel="stylesheet" media="screen">
  <link href="<?php echo $theme_url; ?>asset/css/styleNews.css" rel="stylesheet">
  <link href="<?php echo $theme_url; ?>asset/css/book.css" rel="stylesheet">

  <meta property="og:title" content="Novotel Phú Quốc Resort"/>
  <meta property="og:site_name" content="HOSPI - Đặt phòng khách sạn"/>
  <meta property="og:description" content=""/>
  <meta property="og:publisher" content="https://www.facebook.com/HOSPI - Đặt phòng khách sạn"/>
  <link rel="stylesheet" href="<?php echo $theme_url; ?>assets/css/jquery-ui.css"/>
  <style type="text/css">
    .clss-tongthanhtoan {
      border-bottom: none;

    }
    body {
   font-family: "Open Sans", "Helvetica Neue", Helvetica, Arial, sans-serif;
   font-size: 13px;
   line-height: 1.42857143;
   color: #333333;
  }
  .logo-mobile {
        text-align: center;
      }
    

@media (max-width: 980px) and (min-width: 767px) {
  .cs-invoiceHotel-img1{
  display: block;
  margin-left: auto;
  margin-right: auto;
  padding-left: 293px;
  }
  .cs-invoiceHotel-img2{
  display: block;
  margin-left: auto;
  margin-right: auto;
  padding-left: 192px;
  }
}

@media (max-width: 767px) and (min-width: 756px) {
  .cs-invoiceHotel-img1{
  display: block;
  margin-left: auto;
  margin-right: auto;
  padding-left: 280px;
  }
  .cs-invoiceHotel-img2{
  display: block;
  margin-left: auto;
  margin-right: auto;
  padding-left: 190px;
  }   
}

@media (max-width: 756px) and (min-width: 610px) {
  .cs-invoiceHotel-img1{
  display: block;
  margin-left: auto;
  margin-right: auto;
  padding-left: 212px;
  }
  .cs-invoiceHotel-img2{
  display: block;
  margin-left: auto;
  margin-right: auto;
  padding-left: 118px;
  }   
}

@media (max-width: 767px) and (min-width: 651px) {
  .cs-invoiceHotel-img1{
  display: block;
  margin-left: auto;
  margin-right: auto;
  padding-left: 238px;
  }
  .cs-invoiceHotel-img2{
  display: block;
  margin-left: auto;
  margin-right: auto;
  padding-left: 135px;
  }   
}

@media (max-width: 651px) and (min-width: 514px) {
  .cs-invoiceHotel-img1{
  display: block;
  margin-left: auto;
  margin-right: auto;
  padding-left: 175px;
  }
  .cs-invoiceHotel-img2{
  display: block;
  margin-left: auto;
  margin-right: auto;
  padding-left: 70px;
  }   
}

@media (max-width: 514px) and (min-width: 481px) {
  .cs-invoiceHotel-img1{
  display: block;
  margin-left: auto;
  margin-right: auto;
  padding-left: 156px;
  }
  .cs-invoiceHotel-img2{
  display: block;
  margin-left: auto;
  margin-right: auto;
  padding-left: 69px;
  }   
}

@media (max-width: 480px) and (min-width: 448px) {
  .cs-invoiceHotel-img1{
  display: block;
  margin-left: auto;
  margin-right: auto;
  padding-left: 138px;
  }
  .cs-invoiceHotel-img2{
  display: block;
  margin-left: auto;
  margin-right: auto;
  padding-left: 90px;
  }    
}

@media (max-width: 448px) and (min-width: 300px) {
  .cs-invoiceHotel-img1{
  display: block;
  margin-left: auto;
  margin-right: auto;
  padding-left: 60px;
  }
  .cs-invoiceHotel-img2{
  display: block;
  margin-left: auto;
  margin-right: auto;
  padding-left: 40px;
  }    
}

@media (max-width: 300px) and (min-width: 120px) {
  .cs-invoiceHotel-img1{
  display: block;
  margin-left: auto;
  margin-right: auto;
  padding-left: 70px;
  }
  .cs-invoiceHotel-img2{
  display: block;
  margin-left: auto;
  margin-right: auto;
  padding-left: 0px;
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
<div class="navbar navbar-static-top navbar-default navbar-custom margin-bottom-30">
  <div class="container">
    <div class="navbar">
      <!-- Navigation-->
      <div class="col-md-2 col-xs-12">
        <div class="navbar-header go-right logo-mobile ">
          <a href="index.html" class="navbar-brand"><img class="cs-invoiceHotel-img1" style="margin:0 auto;" src="<?php echo $theme_url; ?>assets/img/logo.png" alt="HOSPI - Đặt phòng khách sạn" class="logo"/></a>
        </div>

      </div>
      <div class="col-md-10 col-xs-12">
        <div class="col-md-8 margin-top-30 no-margin-top-mobile col-xs-12">
          <div class="text-center"><span class="cl-grey">Hỗ trợ khách hàng (028) 3826 8797</span></div>
          <div class="text-center"><span class="cl-grey">Hotline 09 6868 0106</span></div>
        </div>
        <div class="col-md-4 margin-top-15 col-xs-12">
          <div class="text-center clss-img-combo">
            <img class="cs-invoiceHotel-img2" src="<?php echo $theme_url; ?>asset/img/invoice_hotel.png" class="img-responsive"/></div>
          <div class="text-center"><span class="cl-grey text-center">Phiếu xác nhận thanh toán</span></div>
          <div class="text-center"><span class="cl-grey text-center">Ngày <?php echo $invoice->date ?></span></div>
        </div>
      </div>


    </div>
  </div>
</div>

<div class="container clss-header-invoice" style="height: auto;">
  <div class="container">
    <div class="col-lg-12 col-xs-12">
      <div class="col-lg-4 col-xs-12">Mã booking : <span class="cl-tim" style="font-weight: bold;"><?php echo $invoice->code ?></span></div>
      <div class="col-lg-4 col-xs-12">Tình trạng : <span class="cl-tim"><?php echo $payment_status ?></span>
      </div>
      <div class="col-lg-2 col-xs-6 text-right text-left-mobile" id="btnPrint">In invoice</div>
      <div class="col-lg-2 col-xs-6 text-right text-left-mobile" id="btn">Tải file PDF</div>
    </div>
  </div>
</div>
<div class="container pagecontainer offset-0">
  <div class="offer-page rightcontent col-md-12 offset-0">
    <div class="itemscontainer offset-1 offset-15">
      <div class="result"></div>
      <div class="page-info-user">
        <form class="row block-panel-info" id="bookingdetails">
          <div class="col-lg-7 col-xs-12">
            <ul class="nav nav-tabs nav-tabs-book">
              <li class="active"><a data-toggle="tab" class="thongtinbooking" href="#home">Thông tin cá
                  nhân</a></li>

            </ul>
            <div class="tab-content">
              <div id="home" class="tab-pane fade in active">
                <div class="col-lg-12 col-xs-12 no-padding">
                  <div class="col-lg-4 col-xs-12 no-padding">
                    <div class="form-group" style="margin-top:0px;margin-bottom:0px">
                      <label class="control-label font-weight-unset">Họ tên của bạn</label>
                      <div>
                        <label><?php echo $invoice->userFullName; ?></label>
                      </div>


                    </div>
                  </div>
                  <div class="col-lg-4 col-xs-12 no-padding">
                    <div class="form-group" style="margin-top:0px;margin-bottom:0px">
                      <label class="control-label font-weight-unset">Email</label>
                      <div>
                        <label><?php echo $invoice->userEmail; ?></label>
                      </div>


                    </div>
                  </div>
                  <div class="col-lg-4 col-xs-12 no-padding">
                    <div class="form-group" style="margin-top:0px;margin-bottom:0px">
                      <label class="control-label font-weight-unset">Số điện thoại</label>
                      <div>
                        <label><?php echo $invoice->userMobile; ?></label>
                      </div>


                    </div>
                  </div>
                  <div class="col-lg-12 col-xs-12 no-padding">
                    <div class="form-group" style="margin-top:0px;margin-bottom:0px">
                      <label class="control-label font-weight-unset">Địa chỉ</label>
                      <div>
                        <label><?php echo $invoice->userAddress; ?></label>
                      </div>


                    </div>
                  </div>
                  <div class="col-lg-12 col-xs-12 no-padding">
                    <div class="form-group" style="margin-top:0px;margin-bottom:0px">
                      <label class="control-label font-weight-unset">Yêu cầu khác</label>
                      <div>
                        <label><?php echo $invoice->customer_request ?></label>
                      </div>
                    </div>
                  </div>

                </div>


              </div>

              <div id="phuongthucthanhtoan" class="tab-pane fade">
                <div class="form-group">
                  Để thuận tiện cho việc thanh toán khách vui lòng chọn 1 trong những hình thức thanh
                  toán dưới đây
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12 go-right no-padding-left no-margin-top-mobile">
                  <div class="form-group checkbox">
                    <label class="no-padding-left">
                      <input type="checkbox" class="chuyenkhoan" value="1">
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                      Chuyển khoản BankingATM
                    </label>
                  </div>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12 go-right no-padding-left no-margin-top-mobile">
                  <div class="form-group checkbox">
                    <label class="no-padding-left">
                      <input type="checkbox" class="chuyenkhoan" value="2">
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                      Văn phòng HOSPI
                    </label>
                  </div>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12 go-right no-padding-left no-margin-top-mobile">
                  <div class="form-group checkbox">
                    <label class="no-padding-left">
                      <input type="checkbox" class="chuyenkhoan" value="3">
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                      Thanh toán tại nhà
                    </label>
                  </div>
                </div>
                <div class="col-lg-12 col-xs-12 showphuongthuc_1 no-padding" id="showphuongthuc_1" style="display: none">
                  <div class="form-group">
                    Quý khách vui lòng chọn ngân hàng
                  </div>
                  <div class="col-md-3 col-sm-12 col-xs-12 go-right no-padding-left no-margin-top-mobile">
                    <div class="form-group checkbox">
                      <label class="no-padding-left">
                        <input type="checkbox" value="1" onchange="changeatm('vietcombank',1)">
                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                        Vietcombank
                      </label>
                    </div>
                  </div>
                  <div class="col-md-2 col-sm-12 col-xs-12 go-right no-padding-left no-margin-top-mobile">
                    <div class="form-group checkbox">
                      <label class="no-padding-left">
                        <input type="checkbox" value="2" onchange="changeatm('acb',2)">
                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                        ACB
                      </label>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-12 col-xs-12 go-right no-padding-left no-margin-top-mobile ">
                    <div class="form-group checkbox">
                      <label class="no-padding-left">
                        <input type="checkbox" value="3" onchange="changeatm('dongabank',3)">
                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                        DongA Bank
                      </label>
                    </div>
                  </div>
                  <div class="col-md-2 col-sm-12 col-xs-12 go-right no-padding-left no-margin-top-mobile ">
                    <div class="form-group checkbox">
                      <label class="no-padding-left">
                        <input type="checkbox" value="4" onchange="changeatm('mbbank',4)">
                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                        MBBank
                      </label>
                    </div>
                  </div>
                  <div class="col-md-2 col-sm-12 col-xs-12 go-right no-padding no-margin-top-mobile">
                    <div class="form-group checkbox">
                      <label class="no-padding-left">
                        <input type="checkbox" value="5" onchange="changeatm('sacombank',5)">
                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                        Sacombank
                      </label>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12 col-xs-12 conten-visa-card no-padding" id="show-atm-select" style="display: none">
                  <div class="col-lg-12 col-xs-12 content-visa-item no-padding">
                    <div class="col-lg-12 col-xs-12"><span>Ngân hàng Á Châu (ACB)</span></div>
                    <div class="col-lg-12 col-xs-12">
                      <span>Chi nhánh: Bến Thành,Tp Hồ Chí Minh</span></div>
                    <div class="col-lg-12 col-xs-12"><span>Tên tài khoản: Võ Đình Chi</span></div>
                    <div class="col-lg-12 col-xs-12"><span>Số tài khỏa: 227041599</span></div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="col-lg-12 col-xs-12 no-padding info-hoa-don" id="nganhangxuathoadon">
                    <div class="col-lg-12 col-xs-12 no-padding clss-xuat"><span>Quý khách xuất hóa đơn ?</span>
                    </div>
                    <div class="form-group checkbox">
                      <label class="no-padding-left">
                        <input type="checkbox" value="1" onchange="nganhangxuathoadon('vietcombank',1)">
                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                        Vietcombank
                      </label>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="col-lg-12 col-xs-12 content-visa-item-xuat-hoa-don no-padding" id="ngan-hanh-xuat-hoadon" style="display: none;">

                    <div class="col-lg-12 col-xs-12"><span>Ngân hàng Vietcombank (VCB)</span></div>
                    <div class="col-lg-12 col-xs-12"><span>Chi nhánh: Sài Gòn,Tp Hồ Chí Minh</span>
                    </div>
                    <div class="col-lg-12 col-xs-12"><span>Tên tài khoản: Công ty TNHH HOSPI</span>
                    </div>
                    <div class="col-lg-12 col-xs-12"><span>Số tài khỏa: 0331000465230</span></div>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div class="col-lg-12 col-xs-12 conten-vanphong no-padding" id="showphuongthuc_2" style="display: none">
                  <div class="col-lg-12 col-xs-12 margin-bottom-10"><span>Quý khách đã lựa chọn phương thức thanh toán tại văn phòng công ty HOSPI</span>
                  </div>
                  <div class="col-lg-12 col-xs-12"><span>Địa chỉ văn phòng: Lầu 1 ,Số 124 Khánh Hội ,P.6,Quận 4,Tp.Hồ Chí Minh</span>
                  </div>
                  <div class="col-lg-12 col-xs-12"><span>Thời gian làm việc: </span></div>
                  <div class="col-lg-12 col-xs-12"><span>8:00 sáng - 20:00 tối (thứ 2 - thứ 6)</span>
                  </div>
                  <div class="col-lg-12 col-xs-12 margin-bottom-10"><span>8:00 sáng - 17:00 chiều (thứ 7 và Chủ Nhật)</span>
                  </div>
                  <div class="col-lg-12 col-xs-12"><span>Trước khi đến văn phòng công ty HOSPI .Quý khách vui lòng nhớ Mã Đặt Phòng</span>
                  </div>
                </div>
                <div class="col-lg-12 col-xs-12 conten-vanphong no-padding" id="showphuongthuc_3" style="display: none">
                  <div class="col-lg-12 col-xs-12"><span>Quý khách đã lựa chọn phương thức thanh toán tại nhà.Hospi chỉ hỗ trợ thu tiền tại Tp.Hồ Chí Minh và mức thu phí được áp dụng</span>
                  </div>
                  <div class="col-lg-12 col-xs-12"><span>* Quận 1,Quận 3,Quận 4 ,Quận 5 thu phí 10.000 VND (miễn phí cho đơn phòng trên 5.000.000 VND)</span>
                  </div>
                  <div class="col-lg-12col-xs-12"><span>* Quận 10,Quận 7,Quận 11 ,Quận Bình Thạnh,Quận Tân Bình,Phú Nhuận thu phí 20.000 VND (miễn phí cho đơn phòng trên 10.000.000 VND)</span>
                  </div>
                  <div class="col-lg-12 col-xs-12"><span>* Quận Tân Phú,Bình Tân,Quận 2 ,Quận Thủ Đức thu phí 50.000 VND (miễn phí cho đơn phòng trên 20.000.000 VND)</span>
                  </div>
                  <div class="col-lg-12 col-xs-12"><span>8:00 sáng - 20:00 tối (thứ 2 - thứ 6)</span>
                  </div>
                  <div class="col-lg-12 col-xs-12"><span>* Đối với các quận còn lại sẽ báo mức thu phí qua điện thoại mức giá tùy thuộc vào đơn phòng được gửi vào email của quý khách để tiện cho việc thanh toán dễ dàng</span>
                  </div>


                  <div class="col-lg-12 col-xs-12">
                    <div class="form-group checkbox">
                      <label class="no-padding-left">
                        <input type="checkbox" value="">
                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                        Nhập địa chỉ thu tiền
                      </label>
                    </div>
                  </div>
                  <div class="col-lg-12 col-xs-12">
                    <div class="form-group">

                      <input type="text" class="form-control" name="diachi">
                    </div>
                  </div>
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="hidden-xs">
              <!--hoa don-->
              <?php if(!empty($invoice->company) || !empty($invoice->mst) || !empty($invoice->companyadd)) {?>
              <ul class="nav nav-tabs nav-tabs-book">
                <li class="active"><a data-toggle="tab" class="thongtinxuathoadon" href="#xuathoadon">Thông tin xuất hóa đơn</a></li>
              </ul>
              <div class="tab-content">
                <div id="xuathoadon" class="tab-pane fade in active">

                  <div class="col-lg-6 col-xs-12 no-padding">
                    <div class="form-group" style="margin-bottom: 0px">
                      <label class="control-label font-weight-unset">Tên công ty</label>
                      <div>
                        <label><?php echo $invoice->company; ?></label>
                      </div>


                    </div>
                  </div>

                  <div class="col-lg-6 col-xs-12 no-padding">
                    <div class="form-group" style="margin-bottom: 05px">
                      <label class="control-label font-weight-unset">Mã số thuế</label>
                      <div>
                        <label><?php echo $invoice->mst; ?></label>
                      </div>


                    </div>
                  </div>
                  <div class="col-lg-12 col-xs-12 no-padding">
                    <div class="form-group" style="margin-bottom: 0px">
                      <label class="control-label font-weight-unset">Địa chỉ</label>
                      <div>
                        <label><?php echo $invoice->companyadd; ?> </label>
                      </div>


                    </div>
                  </div>

                  <div class="col-lg-12 col-xs-12 no-padding">
                    <div class="form-group" style="margin-top:0px;margin-bottom:0px">
                    <label class="control-label font-weight-unset">Địa chỉ nhận hóa đơn</label>
                    <div>
                       <label><?php echo $invoice->sentto ;?> </label>
                    </div>
                   
                   
                    </div>
                  </div>
                  

                </div>
              </div>
              <?php }?>
              <!--phuong thuc thanh toan-->
              <ul class="nav nav-tabs nav-tabs-book">
                <li class="active">
                  <a data-toggle="tab" class="phuongthucaaa" href="#phuongthucthanhtoan">Phương thức
                    thanh toán</a></li>

              </ul>
              <div class="tab-content">
                <div id="phuongthucthanhtoan" class="tab-pane fade in active">

                  <div class="col-lg-12 col-xs-12 no-padding">
                    <div class="form-group">
                      <label class="control-label font-weight-unset">Quý khách đã chọn hình thức
                        thanh toán</label>

                      <label><?php echo getPayment($invoice->paymethod); ?></label>


                    </div>
                  </div>

                  <div class="col-lg-12 col-xs-12 no-padding">
                    <div class="form-group" style="border: 2px solid #ccc; ">
                      <?php if ($invoice->paymethod == "banktransfer") echo nl2br(getBookingPaymentinfo($invoice->id));
                       else echo $invoice->paymentInfo ;//getBookingPaymentinfo($invoice->id); ?>
                      <!-- <label class="control-label font-weight-unset">
                        Quý khách đã lựa chọn phương thức thanh toán tại nhà.Hospi chỉ hỗ trợ thu tiền tại Tp.Hồ Chí Minh và mức thu phí được áp dụng
                      </label>
                      <label class="control-label font-weight-unset">
                        Quận 1,Quận 3,Quận 4 ,Quận 5 thu phí 10.000 VND (miễn phí cho đơn phòng trên 5.000.000 VND)
                      </label>
                       <label class="control-label font-weight-unset">
                        * Quận 10,Quận 7,Quận 11 ,Quận Bình Thạnh,Quận Tân Bình,Phú Nhuận thu phí 20.000 VND (miễn phí cho đơn phòng trên 10.000.000 VND)
                      </label>
                      <label class="control-label font-weight-unset">
                       * Quận Tân Phú,Bình Tân,Quận 2 ,Quận Thủ Đức thu phí 50.000 VND (miễn phí cho đơn phòng trên 20.000.000 VND)
                      </label>
                       <label class="control-label font-weight-unset">
                      * Đối với các quận còn lại sẽ báo mức thu phí qua điện thoại mức giá tùy thuộc vào đơn phòng được gửi vào email của quý khách để tiện cho việc thanh toán dễ dàng
                      </label>
                      </div>
                      </div>
                        <div class="col-lg-12 col-xs-12 no-padding">
                      <div class="form-group">
                      <label class="control-label font-weight-unset">Địa chỉ thu tiền</label>
                      <div>
                         <label>Lầu 1,phòng 101, số 124 khánh hội ,quận 4, Tp.Hồ Chí Minh, Việt Nam</label>
                      </div>
                      -->

                    </div>
                  </div>


                </div>
              </div>
              </div>
             
              <!--luu y -->
              <div class="hidden-xs">
                   <!--ghi chu -->
                <ul class="nav nav-tabs nav-tabs-book">
                  <li class="active"><a data-toggle="tab" class="ghichuaaa" href="#ghichuaaa">Ghi chú</a>
                  </li>

                </ul>
                <div class="tab-content">
                  <div id="ghichuaaa" class="tab-pane fade in active">
                       <?php echo nl2br($invoice->additionaNotes) ?>  
                  </div>
                </div>
                <div class="clearfix"></div>
                <br>
                    <!--luu y -->
                  <ul class="nav nav-tabs nav-tabs-book">
                    <li class="active"><a data-toggle="tab" class="luyaaa" href="#luyaaa">Lưu ý</a></li>

                  </ul>
                  <div class="tab-content">
                    <div id="luyaaa" class="tab-pane fade in active">
                      <div class="col-lg-12 col-xs-12 no-padding">
                        <div class="form-group">
                          <label class="control-label font-weight-unset">
                            - Quý khách chỉ thanh toán khi được xác nhận bởi nhân viên HOSPI qua email hoặc điện thoại.
                          </label>
                          <label class="control-label font-weight-unset">
                            - Khi thanh toán chuyển khoản vui lòng ghi rõ, họ tên khách hàng hoặc thanh toán cho mã booking  <?php echo $invoice->code ?> .
                          </label>
                          <label class="control-label font-weight-unset">
                            - Nếu quý khách  chọn phương thức thanh toán chuyển khoản, Quý khách chỉ chuyển khoản theo thông tin tài khoản trong booking này. 
                          </label>
                          <label class="control-label font-weight-unset">
                            - Nếu quý khách các phương thức còn lại thì phải có phiếu thu, giấy giới thiệu thu tiền (nếu có) và các  giấy tờ có chữ ký và con dấu của công ty HOSPI thì mới hợp lệ. 
                          </label>
                          <label class="control-label font-weight-unset">
                            - Quý khách có thể từ chối thanh toán nếu nhân viên không cung cấp đủ các thông tin trên hoặc liên hệ hotline: 090 345 5152 để được xác nhận .
                          </label>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
            </div>

          </div>
          <div class="col-sm-5 col-xs-12">
            <ul class="nav nav-tabs nav-tabs-book nav-tabs-book-combox">
              <li class="active"><a data-toggle="tab" class="donphongduaban" href="#donphongcuaban">Đơn
                  phòng</a></li>

            </ul>
            <div class="tab-content">
              <div id="donphongcuaban" class="tab-pane fade in active">
                <div class="col-lg-12 col-xs-12 no-padding">
                  <div class="col-lg-3 col-xs-4 no-padding-left">
                    <img src="<?php echo $invoice->thumbnail; ?>"
                         alt="<?php echo $invoice->title; ?>" width="108">
                  </div>
                  <div class="col-lg-9 col-xs-8 info-hotel no-padding-right-mobile">
                    <h1><?php echo $invoice->title; ?></h1>
                    <div class="col-lg-12 col-xs-12 no-padding">
                      <i style="margin-left:-5px" class="icon-location-6"></i>
                      <small class="adddress font-size-14"><?php echo $invoice->address ?>
                      </small>
                    </div>
                    <div class="col-lg-12 col-xs-12 no-padding">
                      <?php echo $invoice->stars ?> 
<!-- 
                      <i class='star text-warning fa fa-star voted'></i>
                      <i class='star text-warning fa fa-star voted'></i>
                      <i class='star text-warning fa fa-star voted'></i>
                      <i class='star text-warning fa fa-star voted'></i>
                      <i class='star text-warning fa fa-star voted'></i> -->
                    </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="row" style="margin-left:0px">
                    <div class="info-time-book col-lg-6 col-sm-12" style="float:left">
                      <div class="col-lg-12 col-xs-12">
                        <div class="col-lg-7 col-xs-7 cl-grey no-padding-left">Ngày nhận phòng:
                        </div>
                        <div class="col-lg-5 col-xs-5 cl-tim no-padding-left"><b><?php echo $invoice->checkin; ?> </b></div>
                      </div>
                      <div class="col-lg-12 col-xs-12">
                        <div class="col-lg-7 col-xs-7 cl-grey no-padding-left">Ngày trả phòng:</div>
                        <div class=" col-lg-5 col-xs-5 cl-tim no-padding-left"><b><?php echo $invoice->checkout; ?> </b></div>
                      </div>
                      <div class="col-lg-12 col-xs-12">
                        <div class="col-lg-7 col-xs-7 cl-grey no-padding-left">Số đêm:</div>
                        <div class="col-lg-5 col-xs-5 cl-tim no-padding-left"><b><?php echo $nights; ?> </b></div>
                      </div>
                    </div>
                    <div class="no-padding col-lg-5 col-sm-12" style="padding-bottom: 15px;height:100px;border: 1px solid #ccc; margin-top: 10px;padding-top: 12px;float:left" >
                      <div class="col-lg-12 col-xs-12">
                        <div class="col-lg-8 col-xs-7 cl-grey no-padding-left">Người lớn:</div>
                        <div class="col-lg-4 col-xs-5 cl-tim no-padding-left"><b><?php echo $invoice->adult; ?> </b></div>
                      </div>
                      <div class="col-lg-12 col-xs-12">
                        <div class="col-lg-8 col-xs-7 cl-grey no-padding-left">Trẻ em:</div>
                        <div class="col-lg-4 col-xs-5 cl-tim no-padding-left"><b><?php echo $invoice->child; ?></b></div>
                      </div>
                      <div class="col-lg-12 col-xs-12">
                        <div class="col-lg-8 col-xs-7 cl-grey no-padding-left">Số lượng phòng:</div>
                        <div class="col-lg-4 col-xs-5 cl-tim no-padding-left"><b><?php echo $total_room ; ?></b></div>
                      </div>
                      <div class="col-lg-12 col-xs-12">
                        <div class="col-lg-8 col-xs-7 cl-grey no-padding-left">Giường phụ:</div>
                        <div class="col-lg-4 col-xs-5 cl-tim no-padding-left"> <b><?php echo $total_extra_bed ;//$invoice->extraBeds; ?></b></div>
                      </div>
                    </div>
                   </div>
                </div>
                <div class="col-lg-12 col-xs-12 no-padding clss-content-book margin-top-30" style="padding-top: 10px;padding-bottom: 10px">
                  <div class="col-lg-12 col-xs-12">
                    <span class="cl-grey">Yêu cầu giường</span><span class="cl-tim" style="font-weight: bold;"> <?php echo $invoice->booking_extra_beds_request;?></span>

                  </div>
                </div>
                <div class="col-lg-12 col-xs-12 no-padding clss-content-book margin-top-30" style="padding-top: 10px;padding-bottom: 10px">
                  <?php // var_dump($bookInfo);
                  $stay = $nights ;//$invoice->nights;
                  $priceTotal = $so_giuong_phu = 0;
                  //  $priceExtraBedTotal = 0;
                  foreach ($bookInfo as $roomId => $rDetail) {
                    $priceOne = 0;
                    $priceExtraBed = 0;
                    foreach ($rDetail->Info['detail'] as $tmp) {
                      $priceOne += $tmp->total;
                      $priceExtraBed += $tmp->bed_total;
                    }
                    $priceOne = $priceOne / count($rDetail->Info['detail']);
                    $extraBedCharges = $priceExtraBed * $rDetail->extraBedsCount;
                    $priceExtraBed = $priceExtraBed / count($rDetail->Info['detail']);

                    // $priceExtraBedTotal += $priceExtraBed * $extra_beds[$roomId];
                    $so_giuong_phu += $extra_beds[$roomId];
                    $quantity = $rDetail->roomscount;
                    $quantityBed = $rDetail->extraBedsCount;

                    ?>
                    <div class="col-lg-12 col-xs-12 cl-tim">
                      <span style="font-weight: bold;"><?php echo $rDetail->title; ?></span>
                    </div>
                    <div class="col-lg-12 col-xs-12 cl-grey font-size-mobile-12">
                      <span> <?php echo number_format($priceOne); ?> x <?php echo $stay; ?>
                        (đêm) x <?php echo $quantity; ?>
                        (phòng) =<?php echo number_format($rDetail->Info['total'] * $quantity); ?>
                        VND</span>
                    </div>
                    <?php if($quantityBed > 0 ){?>
                     <div class="col-lg-12 col-xs-12 cl-tim">
                      <span style="font-weight: bold;">* Giường phụ : <?php  ?></span>
                    </div>
                     <div class="col-lg-12 col-xs-12 cl-grey font-size-mobile-12">
                      <span><?php echo number_format($priceExtraBed); ?> x <?php echo $stay; ?>
                        (đêm) x <?php echo $quantityBed; ?>
                        (giường) =<?php echo number_format($extraBedCharges); ?>
                        VND</span>
                    </div>
                      <?php }?>
                    <?php
                    $priceTotal += $rDetail->Info['total'] * $quantity;
                    $priceTotal += $extraBedCharges;

                  } ?>




                <!--   <div class="col-lg-12 col-xs-12 cl-tim">
                    <span style="font-weight: bold;">* Giường phụ : <?php //echo $invoice->extraBeds ?></span>
                  </div> 
                  <div class="col-lg-12 col-xs-12 cl-grey font-size-mobile-12">
                    <span><?php //echo number_format($invoice->extraBedsCharges) ?> VND</span>
                  </div>-->
                </div>
                <div class="col-lg-12 col-xs-12 content-item-text no-padding" style="padding-top: 10px;padding-bottom: 10px">
                  <div class="col-lg-12 col-xs-12 cl-grey no-padding">
                    <div class="col-lg-6 col-xs-6 text-left"><span>Thành tiền</span></div>
                    <div class="col-lg-6 col-xs-6 text-right">
                      <span><?php echo number_format($priceTotal); ?> VND</span></div>
                  </div>
                  <div class="col-lg-12 col-xs-12 cl-grey no-padding">
                    <div class="col-lg-6 col-xs-6 text-left"><span>Phí VAT</span></div>
                    <div class="col-lg-6 col-xs-6 text-right"><span>0 VND</span></div>
                  </div>
                  <div class="col-lg-12 col-xs-12 cl-grey no-padding">
                    <div class="col-lg-6 col-xs-6 text-left"><span>Phí dịch vụ</span></div>
                    <div class="col-lg-6 col-xs-6 text-right"><span>0 VND</span></div>
                  </div>
                  <div class="col-lg-12 col-xs-12 cl-grey no-padding">
                    <div class="col-lg-6 col-xs-6 text-left"><span>Chi phí khác</span></div>
                  <?php
                  //$priceTotal += $invoice->extraBedsCharges;

                  $total_booking_extras_fee =  $invoice->booking_extras_fee *  $invoice->booking_extras_quantity;
                  $priceTotal += $total_booking_extras_fee;
                  ?>
                    <div class="col-lg-6 col-xs-6 text-right"><span><?php echo number_format($total_booking_extras_fee); ?> VND</span></div>
                  </div>
                  <div class="col-lg-12 col-xs-12 no-padding cl-grey">
                    <div class="col-lg-6 col-xs-6 text-left "><span>Thanh toán</span></div>
                    <div class="col-lg-6 col-xs-6 text-right">
                      <span><b><?php echo number_format($priceTotal); ?>
                          VND</b></span></div>
                  </div>
                </div>
                <div class="col-lg-12 col-xs-12 content-giam-gia no-padding padding-top-10">
                    <?php if($invoice->couponCode!=""){?>
                  <div class="col-lg-5 col-xs-12"><span>Bạn có mã giảm giá ?</span></div>
                  <div class="col-lg-4 col-xs-12">
                    <div class="form-group">

                      <input type="text" class="form-control" placeholder="Mã giảm giá" name="diachi" value="<?php echo $invoice->couponCode ?>" disabled >
                    </div>
                  </div>
                  <!-- <div class="col-lg-2 col-xs-12 no-padding">
                    <div class="form-group">

                      <input type="button" class="form-control button-tim" value="Áp dụng">
                    </div>
                  </div> -->
                  <div class="col-lg-12 col-xs-12">
                    <span class="cl-grey">Mã giảm giá <?php echo $invoice->couponCode ?> được áp dụng .Bạn đã giảm được <?php echo number_format($coupon['value']) . $coupon['type'] ?>/tổng đơn phòng. Số tiền giảm sẽ thể hiện trong hóa đơn</span>
                  </div>
                  <div class="col-lg-12 col-xs-12 no-padding cl-tim">
                    <div class="col-lg-6 col-xs-6 text-left "><span>Giảm giá </span></div>
                    <div class="col-lg-6 col-xs-6 text-right">
                      <span><b><?php echo number_format($invoice->discount_value) ?>VND</b></span>
                    </div>
                  </div>
                  <?php }?>

                  <div class="col-lg-12 col-xs-12 no-padding cl-tim clss-tongthanhtoan">
                    <div class="col-lg-6 col-xs-6 text-left "><span>Đã thanh toán </span></div>
                    <div class="col-lg-6 col-xs-6 text-right">
                      <span><b><?php echo number_format($invoice->amountPaid); ?>VND</b></span>
                    </div>
                  </div>

                  <div class="col-lg-12 col-xs-12 no-padding cl-tim clss-tongthanhtoan">
                    <div class="col-lg-6 col-xs-6 text-left "><span>Tổng thanh toán </span></div>
                    <div class="col-lg-6 col-xs-6 text-right">
                      <span><b><?php echo number_format($invoice->remainingAmount); ?>VND</b></span>
                    </div>
                  </div>


                </div>
                <div class="clearfix"></div>
              </div>


            </div>
            <!--Dieu kien hủy-->
            <ul class="nav nav-tabs nav-tabs-book nav-tabs-book-combox margin-top-10">

              <li class="active"><a data-toggle="tab" class="dieukienhuy" href="#dieukienhuy">Điều kiện
                  hủy</a></li>
            </ul>
            <div class="tab-content">
              <div id="dieukienhuy" class="tab-pane fade in active">
                <div class="col-lg-12 col-xs-12 cotent-huyphong no-padding">
                  <?php echo nl2br($invoice->cancel_condition) ?>

                </div>
              </div>
              <div class="hidden-lg">
                  <!--ghi chu -->
                <ul class="nav nav-tabs nav-tabs-book">
                  <li class="active"><a data-toggle="tab" class="ghichuaaa" href="#ghichuaaa">Ghi chú</a>
                  </li>

                </ul>
                <div class="tab-content">
                  <div id="ghichuaaa" class="tab-pane fade in active">
                       <?php echo nl2br($invoice->additionaNotes) ?>  
                  </div>
                </div>
              <!--hoa don-->
              <?php if(!empty($invoice->company) || !empty($invoice->mst) || !empty($invoice->companyadd)) {?>
              <ul class="nav nav-tabs nav-tabs-book">
                <li class="active"><a data-toggle="tab" class="thongtinxuathoadon" href="#xuathoadon">Thông tin xuất hóa đơn</a></li>
              </ul>
              <div class="tab-content">
                <div id="xuathoadon" class="tab-pane fade in active">

                  <div class="col-lg-6 col-xs-12 no-padding">
                    <div class="form-group" style="margin-bottom: 0px">
                      <label class="control-label font-weight-unset">Tên công ty</label>
                      <div>
                        <label><?php echo $invoice->company; ?></label>
                      </div>


                    </div>
                  </div>

                  <div class="col-lg-6 col-xs-12 no-padding">
                    <div class="form-group" style="margin-bottom: 0px">
                      <label class="control-label font-weight-unset">Mã số thuế</label>
                      <div>
                        <label><?php echo $invoice->mst; ?></label>
                      </div>


                    </div>
                  </div>
                  <div class="col-lg-12 col-xs-12 no-padding">
                    <div class="form-group" style="margin-bottom: 0px">
                      <label class="control-label font-weight-unset">Địa chỉ</label>
                      <div>
                        <label><?php echo $invoice->companyadd; ?> </label>
                      </div>


                    </div>
                  </div>


                </div>
              </div>
              <?php } ?>
              <!--phuong thuc thanh toan-->
              <ul class="nav nav-tabs nav-tabs-book">
                <li class="active">
                  <a data-toggle="tab" class="phuongthucaaa" href="#phuongthucthanhtoan">Phương thức
                    thanh toán</a></li>

              </ul>
              <div class="tab-content">
                <div id="phuongthucthanhtoan" class="tab-pane fade in active">

                  <div class="col-lg-12 col-xs-12 no-padding">
                    <div class="form-group">
                      <label class="control-label font-weight-unset">Quý khách đã chọn hình thức
                        thanh toán</label>

                      <label><?php echo getPayment($invoice->paymethod); ?></label>


                    </div>
                  </div>

                  <div class="col-lg-12 col-xs-12 no-padding">
                    <div class="form-group" style = "border: 1px solid #ccc; ">
                      <?php if ($invoice->paymethod == "banktransfer") echo nl2br(getBookingPaymentinfo($invoice->id)); else echo  $invoice->paymentInfo ;//getBookingPaymentinfo($invoice->id); ?>
                      <!-- <label class="control-label font-weight-unset">
                        Quý khách đã lựa chọn phương thức thanh toán tại nhà.Hospi chỉ hỗ trợ thu tiền tại Tp.Hồ Chí Minh và mức thu phí được áp dụng
                      </label>
                      <label class="control-label font-weight-unset">
                        Quận 1,Quận 3,Quận 4 ,Quận 5 thu phí 10.000 VND (miễn phí cho đơn phòng trên 5.000.000 VND)
                      </label>
                       <label class="control-label font-weight-unset">
                        * Quận 10,Quận 7,Quận 11 ,Quận Bình Thạnh,Quận Tân Bình,Phú Nhuận thu phí 20.000 VND (miễn phí cho đơn phòng trên 10.000.000 VND)
                      </label>
                      <label class="control-label font-weight-unset">
                       * Quận Tân Phú,Bình Tân,Quận 2 ,Quận Thủ Đức thu phí 50.000 VND (miễn phí cho đơn phòng trên 20.000.000 VND)
                      </label>
                       <label class="control-label font-weight-unset">
                      * Đối với các quận còn lại sẽ báo mức thu phí qua điện thoại mức giá tùy thuộc vào đơn phòng được gửi vào email của quý khách để tiện cho việc thanh toán dễ dàng
                      </label>
                      </div>
                      </div>
                        <div class="col-lg-12 col-xs-12 no-padding">
                      <div class="form-group">
                      <label class="control-label font-weight-unset">Địa chỉ thu tiền</label>
                      <div>
                         <label>Lầu 1,phòng 101, số 124 khánh hội ,quận 4, Tp.Hồ Chí Minh, Việt Nam</label>
                      </div>
                      -->

                    </div>
                  </div>


                </div>
              </div>
              </div>
               <!--luu y -->
              <div class="hidden-lg" style="margin-top: 30px">
                  <ul class="nav nav-tabs nav-tabs-book">
                    <li class="active"><a data-toggle="tab" class="luyaaa" href="#luyaaa">Lưu ý</a></li>

                  </ul>
                  <div class="tab-content">
                    <div id="luyaaa" class="tab-pane fade in active">
                      <div class="col-lg-12 col-xs-12 no-padding">
                        <div class="form-group">
                          <label class="control-label font-weight-unset">
                            - Quý khách chỉ thanh toán khi được xác nhận bởi nhân viên HOSPI qua email hoặc điện thoại.
                          </label>
                          <label class="control-label font-weight-unset">
                            - Khi thanh toán chuyển khoản vui lòng ghi rõ, họ tên khách hàng hoặc thanh toán cho mã booking  <?php echo $invoice->code ?> .
                          </label>
                          <label class="control-label font-weight-unset">
                            - Nếu quý khách  chọn phương thức thanh toán chuyển khoản, Quý khách chỉ chuyển khoản theo thông tin tài khoản trong booking này. 
                          </label>
                          <label class="control-label font-weight-unset">
                            - Nếu quý khách các phương thức còn lại thì phải có phiếu thu, giấy giới thiệu thu tiền (nếu có) và các  giấy tờ có chữ ký và con dấu của công ty HOSPI thì mới hợp lệ. 
                          </label>
                          <label class="control-label font-weight-unset">
                            - Quý khách có thể từ chối thanh toán nếu nhân viên không cung cấp đủ các thông tin trên hoặc liên hệ hotline: 090 345 5152 để được xác nhận .
                          </label>
                        </div>
                      </div>
                    </div>
                </div>
              </div>

            </div>
            
          </div>


        </form>
      </div>
    </div>
  </div>
</div>
<!-- END OF CONTENT -->
<div id="waiting"></div>
<style>
  #rotatingImg {
    display: none;
  }

  .booking-bg {
    padding: 10px 0 5px 0;
    width: 100%;
    background-image: url('https://www.hospi.vn<?php echo $theme_url; ?>assets/images/step-bg.png');
    background-color: #222;
    text-align: center;
  }

  .bookingFlow__message {
    color: white;
    font-size: 18px;
    margin-top: 5px;
    margin-bottom: 15px;
    letter-spacing: 1px;
  }

  .select2-choice {
    font-size: 13px !important;
    padding: 0 0 0 10px !important;
  }
</style>
<div class="clearfix"></div>

<div class="container-fulid bk-tim clss-footer" style="margin-top: 20px;height: auto">
  <div class="container ">
    <div class="row">
    <div class="col-lg-4">&#169; 2018- by HOSPI TRAVEL CO.LTD</div>
    <div class="col-lg-2"><i class="fa fa-chevron-right" aria-hidden="true"></i> Chính sách bảo mật</div>
    <div class="col-lg-2"><i class="fa fa-chevron-right" aria-hidden="true"></i> Điều khoản sử dụng</div>
    <div class="col-lg-4">Lầu 1,số 124 Khánh Hội,P.6, Quận 4,TP.Hồ Chí Minh</div>
    </div>
  </div>
</div>
<a href="#" id="image"></a>
<script src="<?php echo $theme_url; ?>assets/js/jquery-1.11.2.min.js"></script>
<script src="<?php echo $theme_url; ?>assets/js/jspdf.min.js"></script>
<script src="<?php echo $theme_url; ?>assets/js/html2canvas.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#btn').click(function () {
            var container = document.getElementById("top");
            html2canvas(container, {
                onrendered: function (snapshot) {
                    var tempcanvas = document.createElement('canvas');
                    tempcanvas.width = container.clientWidth;
                    tempcanvas.height = container.clientHeight;
                    var context = tempcanvas.getContext('2d');
                    context.drawImage(snapshot, 0, 0);
                    var base64ImageString = tempcanvas.toDataURL('image/jpeg');
                    // Save as a pdf
                    var doc = new jsPDF();
                    doc.addImage(base64ImageString, 'JPEG', 5, 20, 200, 250);
                    doc.save('invoice_<?php echo $code; ?>.pdf');
                }
            });
        });

        $('#btnPrint').click(function () {
            var container = document.getElementById("top");
            html2canvas(container, {
                onrendered: function (snapshot) {
                    var tempcanvas = document.createElement('canvas');
                    tempcanvas.width = container.clientWidth;
                    tempcanvas.height = container.clientHeight;
                    var context = tempcanvas.getContext('2d');
                    context.drawImage(snapshot, 0, 0);
                    var base64ImageString = tempcanvas.toDataURL('image/jpeg');
                    // Download image
                    var image = base64ImageString.replace("image/png", "application/octet-stream;headers=Content-Disposition: attachment; filename=invoice.png");
                    var anchor = document.getElementById('image');
                    anchor.href = image;
                    anchor.download = 'invoice_' + Date.now() + '.png';
                    anchor.click();
                }
            });
        });
    });
</script>
</body>
</html>