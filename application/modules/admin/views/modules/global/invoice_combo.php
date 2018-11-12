<?php
if($invoice->status =='paid'){
  $payment_status ="Đã thanh toán";
}elseif($invoice->status =='unpaid'){
   $payment_status ="Chưa thanh toán";
}elseif($invoice->status =='reserved'){
   $payment_status ="Đã cọc";
}elseif($invoice->status =='unpaid'){
   $payment_status ="Đã Hủy";
}
?>
<!DOCTYPE html>
<html ng-app="phptravelsApp">
  <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="HOSPI">
    <meta property="fb:app_id" content="159189514584032" />
    <title><?php echo $invoice->offer_detail->offer_title; ?></title>
    <link rel="shortcut icon" href="https://www.hospi.vn/uploads/global/favicon.png">
    <link href="<?php echo $theme_url; ?>assets/css/bootstrap-modal.css" rel="stylesheet" media="screen">
    <link href="<?php echo $theme_url; ?>assets/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="<?php echo $theme_url; ?>assets/css/bootstrap-slider.css" rel="stylesheet" media="screen">
    <link href="<?php echo $theme_url; ?>assets/css/custom.css" rel="stylesheet" media="screen">
    <!-- Duc add css file -->
    <link href="<?php echo $theme_url; ?>style.css" rel="stylesheet" media="screen">
    <link href="<?php echo $theme_url; ?>asset/css/styleNews.css" rel="stylesheet">
    <link href="<?php echo $theme_url; ?>asset/css/Menu.css" rel="stylesheet">
    <link href="<?php echo $theme_url; ?>asset/css/book.css" rel="stylesheet">
   
    <link href="<?php echo $theme_url; ?>asset/css/responsive-cookbook.css" rel="stylesheet">
    <!-- facebook -------->
    <meta property="og:title" content="Novotel Phú Quốc Resort"/>
    <meta property="og:site_name" content="HOSPI - Đặt phòng khách sạn"/>
    <meta property="og:description" content=""/>
    <meta property="og:publisher" content="https://www.facebook.com/HOSPI - Đặt phòng khách sạn"/>
    <script type="application/ld+json">{"@context":"http://schema.org/","@type":"Organization","name":"HOSPI - Đặt phòng khách sạn","url":"https://www.hospi.vn/","logo":"https://www.hospi.vn/uploads/global/favicon.png","sameAs":"https://www.facebook.com/HOSPI - Đặt phòng khách sạn","sameAs":"https://twitter.com/HOSPI - Đặt phòng khách sạn","sameAs":"https://www.pinterest.com/HOSPI - Đặt phòng khách sạn/","sameAs":"https://plus.google.com/u/0/HOSPI - Đặt phòng khách sạn/posts","contactPoint":{"@type":"ContactPoint","telephone":"028 3826 8797","contactType":"Customer Service"}}{"@context":"http://schema.org","@type":"WebSite","name":"HOSPI - Đặt phòng khách sạn","url":"https://www.hospi.vn"}  </script>
    <!--[if lt IE 9]>        <script src="<?php echo $theme_url; ?>assets/js/html5shiv.js"></script> <script src="<?php echo $theme_url; ?>assets/js/respond.min.js"></script><![endif]-->
    <!-- BASE CSS --------->
    <link href="<?php echo $theme_url; ?>style.css" rel="stylesheet">
    <style> @import "<?php echo $theme_url; ?>childtheme/childstyle.css"; </style>
    <!-- Google Maps ------> <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAAgXXrHR9Rf4DY_zdtfkhlqplUtfaOonk&amp;libraries=places"></script>
    <!-- jQuery -----------> <script src="<?php echo $theme_url; ?>assets/js/jquery-1.11.2.min.js"></script> <script src="<?php echo $theme_url; ?>assets/js/wow.min.js"></script>
    <!-- RTL CSS ---------->     <!-- Mobile Redirect -->     <!--[if lt IE 7]>
    <link rel="stylesheet" type="text/css" href="<?php echo $theme_url; ?>assets/css/font-awesome-ie7.css" media="screen" />
    <![endif]-->
    <link rel="stylesheet" href="<?php echo $theme_url; ?>assets/css/jquery-ui.css" />
    <style type="text/css">
      .clss-tongthanhtoan{
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
  padding-left: 0px;
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
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8&appId=159189514584032";
    fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    </script>
    <script src="//apis.google.com/js/platform.js" async defer></script>
    <!-- Duc add html header-top -->
   
    <div class="navbar navbar-static-top navbar-default navbar-custom margin-bottom-30">
      <div class="container">
        <div class="navbar">
          <!-- Navigation-->
          <div class="col-md-2 col-xs-12">
              <div class="navbar-header go-right logo-mobile">
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
                <img class="cs-invoiceHotel-img2" src="<?php echo $theme_url; ?>asset/img/invoice_combo.png" class="img-responsive"/>
              </div>
              </div>
               <div class="text-center"><span class="cl-grey">Phiếu xác nhận thanh toán</span></div>
                <div class="text-center"><span class="cl-grey">Ngày <?php echo $invoice->date ?></span></div>
            </div>
          </div>
        
       
      </div>
    </div>
  </div>
  
<div class="container-fulid clss-header-invoice">
  <div class="container">
    <div class="col-lg-12 col-xs-12">
      <div class="col-lg-4 col-xs-12">Mã booking : <span class="cl-tim"><?php echo $invoice->code ?></span></div>
      <div class="col-lg-4 col-xs-12">Tình trạng : <span class="cl-tim"><?php echo  $payment_status ?></span></div>
      <div class="col-lg-2 col-xs-6 text-right text-left-mobile">In invoice</div>
       <div class="col-lg-2 col-xs-6 text-right text-left-mobile">Tải file PDF</div>
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
              <li class="active"><a data-toggle="tab" class="thongtinbooking" href="#home">Thông tin cá nhân</a></li>
            </ul>

            <div class="tab-content">
              <div id="home" class="tab-pane fade in active">
                <div class="col-lg-12 col-xs-12 no-padding">
                  <div class="col-lg-4 col-xs-12 no-padding">
                    <div class="form-group" style="margin-top:0px;margin-bottom:0px">
                    <label class="control-label font-weight-unset">Họ tên của bạn</label>
                    <div>
                       <label><?php echo $invoice->userFullName;?></label>
                    </div>
                   
                   
                    </div>
                  </div>
                  <div class="col-lg-4 col-xs-12 no-padding">
                    <div class="form-group" style="margin-top:0px;margin-bottom:0px">
                    <label class="control-label font-weight-unset">Email</label>
                    <div>
                       <label><?php echo $invoice->userEmail;?></label>
                    </div>
                   
                   
                    </div>
                  </div>
                   <div class="col-lg-4 col-xs-12 no-padding">
                    <div class="form-group" style="margin-top:0px;margin-bottom:0px">
                    <label class="control-label font-weight-unset">Số điện thoại</label>
                    <div>
                       <label><?php echo $invoice->userMobile;?></label>
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
                    <div class="form-group">
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
                  Để thuận tiện cho việc thanh toán khách vui lòng chọn 1 trong những hình thức thanh toán dưới đây
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12 go-right no-padding-left no-margin-top-mobile">
                  <div class="form-group checkbox">
                    <label class="no-padding-left">
                      <input type="checkbox"  class="chuyenkhoan" value="1">
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                      Chuyển khoản BankingATM
                    </label>
                  </div>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12 go-right no-padding-left no-margin-top-mobile">
                  <div class="form-group checkbox">
                    <label class="no-padding-left">
                      <input type="checkbox"  class="chuyenkhoan" value="2">
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                      Văn phòng HOSPI
                    </label>
                  </div>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12 go-right no-padding-left no-margin-top-mobile">
                  <div class="form-group checkbox">
                    <label class="no-padding-left">
                      <input type="checkbox"  class="chuyenkhoan" value="3">
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
                    <div class="col-lg-12 col-xs-12"><span>Chi nhánh: Bến Thành,Tp Hồ Chí Minh</span></div>
                    <div class="col-lg-12 col-xs-12"><span>Tên tài khoản: Võ Đình Chi</span></div>
                    <div class="col-lg-12 col-xs-12"><span>Số tài khỏa: 227041599</span></div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="col-lg-12 col-xs-12 no-padding info-hoa-don" id="nganhangxuathoadon">
                    <div class="col-lg-12 col-xs-12 no-padding clss-xuat"><span>Quý khách xuất hóa đơn ?</span></div>
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
                    <div class="col-lg-12 col-xs-12"><span>Chi nhánh: Sài Gòn,Tp Hồ Chí Minh</span></div>
                    <div class="col-lg-12 col-xs-12"><span>Tên tài khoản: Công ty TNHH HOSPI</span></div>
                    <div class="col-lg-12 col-xs-12"><span>Số tài khỏa: 0331000465230</span></div>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div class="col-lg-12 col-xs-12 conten-vanphong no-padding" id="showphuongthuc_2" style="display: none">
                  <div class="col-lg-12 col-xs-12 margin-bottom-10"><span>Quý khách đã lựa chọn phương thức thanh toán tại văn phòng công ty HOSPI</span></div>
                  <div class="col-lg-12 col-xs-12"><span>Địa chỉ văn phòng: Lầu 1 ,Số 124 Khánh Hội ,P.6,Quận 4,Tp.Hồ Chí Minh</span></div>
                  <div class="col-lg-12 col-xs-12"><span>Thời gian làm việc: </span></div>
                  <div class="col-lg-12 col-xs-12"><span>8:00 sáng - 20:00 tối (thứ 2 - thứ 6)</span></div>
                  <div class="col-lg-12 col-xs-12 margin-bottom-10"><span>8:00 sáng - 17:00 chiều (thứ 7 và Chủ Nhật)</span></div>
                  <div class="col-lg-12 col-xs-12"><span>Trước khi đến văn phòng công ty HOSPI .Quý khách vui lòng nhớ Mã Đặt Phòng</span></div>
                </div>
                <div class="col-lg-12 col-xs-12 conten-vanphong no-padding" id="showphuongthuc_3" style="display: none">
                  <div class="col-lg-12 col-xs-12"><span>Quý khách đã lựa chọn phương thức thanh toán tại nhà.Hospi chỉ hỗ trợ thu tiền tại Tp.Hồ Chí Minh và mức thu phí được áp dụng</span></div>
                  <div class="col-lg-12 col-xs-12"><span>* Quận 1,Quận 3,Quận 4 ,Quận 5 thu phí 10.000 VND (miễn phí cho đơn phòng trên 5.000.000 VND)</span></div>
                  <div class="col-lg-12col-xs-12"><span>* Quận 10,Quận 7,Quận 11 ,Quận Bình Thạnh,Quận Tân Bình,Phú Nhuận thu phí 20.000 VND (miễn phí cho đơn phòng trên 10.000.000 VND)</span></div>
                  <div class="col-lg-12 col-xs-12"><span>* Quận Tân Phú,Bình Tân,Quận 2 ,Quận Thủ Đức thu phí 50.000 VND (miễn phí cho đơn phòng trên 20.000.000 VND)</span></div>
                  <div class="col-lg-12 col-xs-12"><span>8:00 sáng - 20:00 tối (thứ 2 - thứ 6)</span></div>
                  <div class="col-lg-12 col-xs-12"><span>* Đối với các quận còn lại sẽ báo mức thu phí qua điện thoại mức giá tùy thuộc vào đơn phòng được gửi vào email của quý khách để tiện cho việc thanh toán dễ dàng</span></div>
                  
                  
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
                      
                      <input type="text" class="form-control"  name="diachi">
                    </div>
                  </div>
                </div>
                <div class="clearfix"></div>
              </div>
              <!--hoa don-->
              <?php if(!empty($invoice->company) || !empty($invoice->mst) || !empty($invoice->companyadd)) {?>
              <ul class="nav nav-tabs nav-tabs-book">
                  <li class="active"><a data-toggle="tab" class="thongtinxuathoadon" href="#xuathoadon">Thông tin xuất hóa đơn</a></li>
             
              </ul>
              <div class="tab-content">
                <div id="xuathoadon" class="tab-pane fade in active">
                 
                    <div class="col-lg-6 col-xs-12 no-padding">
                    <div class="form-group" style="margin-top:0px;margin-bottom:0px">
                    <label class="control-label font-weight-unset">Tên công ty</label>
                    <div>
                       <label><?php echo $invoice->company ;?></label>
                    </div>
                   
                   
                    </div>
                  </div>

                  <div class="col-lg-6 col-xs-12 no-padding">
                    <div class="form-group" style="margin-top:0px;margin-bottom:0px">
                    <label class="control-label font-weight-unset">Mã số thuế</label>
                    <div>
                       <label><?php echo $invoice->mst ;?></label>
                    </div>
                   
                   
                    </div>
                  </div>

                   <div class="col-lg-12 col-xs-12 no-padding">
                    <div class="form-group" style="margin-top:0px;margin-bottom:0px">
                    <label class="control-label font-weight-unset">Địa chỉ</label>
                    <div>
                       <label><?php echo $invoice->companyadd ;?> </label>
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
              <?php } ?>
              <div class="hidden-xs">
              <!--phuong thuc thanh toan-->
              <ul class="nav nav-tabs nav-tabs-book">
                  <li class="active"><a data-toggle="tab" class="phuongthucaaa" href="#phuongthucthanhtoan">Phương thức thanh toán</a></li>
             
              </ul>
              <div class="tab-content">
                <div id="phuongthucthanhtoan" class="tab-pane fade in active">
                 
                  <div class="col-lg-12 col-xs-12 no-padding">
                      <div class="form-group" style="margin-bottom: 0px">
                      <label class="control-label font-weight-unset">Quý khách đã chọn hình thức thanh toán</label>
                         <label><?php echo getPayment($invoice->paymethod);?></label>
                      </div>
                  </div>

                  <div class="col-lg-12 col-xs-12 no-padding">
                    <div class="form-group">
                      <?php if($invoice->paymethod=="banktransfer"){echo nl2br(getBookingPaymentinfo($invoice->id)); }else { echo $invoice->paymentInfo;} //echo getBookingPaymentinfo($invoice->id);
                      ?>
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
              <!--ghi chu -->
              <ul class="nav nav-tabs nav-tabs-book">
                  <li class="active"><a data-toggle="tab" class="ghichuaaa" href="#ghichuaaa">Ghi chú</a></li>
             
              </ul>
              <div class="tab-content">
                <div id="ghichuaaa" class="tab-pane fade in active">
                     <?php echo nl2br($invoice->additionaNotes) ?>
                </div>
              </div>
               <!--luu y -->
              <div class="clearfix"></div>
              <ul class="nav nav-tabs nav-tabs-book">
                  <li class="active"><a data-toggle="tab" class="luyaaa" href="#luyaaa">Lưu ý</a></li>
             
              </ul>
              <div class="tab-content">
                <div id="luyaaa" class="tab-pane fade in active">

                    <div class="col-lg-12 col-xs-12 no-padding">
                    <div class="form-group">
                    <label class="control-label font-weight-unset">
                     - Quý khách chỉ thanh toán khi được xác nhận bởi nhân viên HOSPI qua email hoặc điện thoại .
                    </label>
                    <label class="control-label font-weight-unset">
                     - Khi thanh toán chuyển khoản vui lòng ghi rõ, họ tên khách hàng hoặc thanh toán cho mã booking <?php echo $invoice->code ?> .
                    </label>
                     <label class="control-label font-weight-unset">
                     -  Nếu quý khách  chọn phương thức thanh toán chuyển khoản, Quý khách chỉ chuyển khoản theo thông tin tài khoản trong booking này. 
                    </label>
                    <label class="control-label font-weight-unset">
                    - Nếu quý khách các phương thức còn lại thì phải có phiếu thu, giấy giới thiệu thu tiền (nếu có) và các  giấy tờ có chữ ký và con dấu của công ty HOSPI thì mới hợp lệ. 
                    </label>
                     <label class="control-label font-weight-unset">
                   -  Quý khách có thể từ chối thanh toán nếu nhân viên không cung cấp đủ các thông tin trên hoặc liên hệ hotline: 090 345 5152 để được xác nhận .
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
              <li class="active"><a data-toggle="tab" class="donphongduaban" href="#donphongcuaban">Đơn phòng</a></li>
             
            </ul>
            <div class="tab-content">
              <div id="donphongcuaban" class="tab-pane fade in active">
                <div class="col-lg-12 col-xs-12 no-padding">
                  <div class="col-lg-3 col-xs-4 no-padding-left">
                    <img src="<?php echo PT_OFFERS_IMAGES .$invoice->offer_detail->offer_thumb; ?>"
                    alt="Novotel Phú Quốc Resort" width="108">
                  </div>
                  <div class="col-lg-9 col-xs-8 info-hotel no-padding-right-mobile">
                    <h1><?php echo $invoice->offer_detail->offer_title; ?></h1>
                    <div class="col-lg-12 col-xs-12 no-padding">
<!--                       <i style="margin-left:-5px" class="icon-location-6"></i>
 -->                      <small class="adddress font-size-14"><?php echo $invoice->address; ?></small>
                    </div>
                    <div class="col-lg-12 col-xs-12 no-padding">
                       <?php echo $invoice->stars ?> 
                      <!-- <i class='star text-warning fa fa-star voted'></i>
                      <i class='star text-warning fa fa-star voted'></i>
                      <i class='star text-warning fa fa-star voted'></i>
                      <i class='star text-warning fa fa-star voted'></i>
                      <i class='star text-warning fa fa-star voted'></i> -->
                    </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="content-checkout info-time-book">
                    <?php if($invoice->is_unknown_date == 0){?>
                    <div class="col-lg-12 col-xs-12">
                      <div class="col-lg-7 col-xs-7 cl-grey no-padding-left">Ngày nhận phòng:</div>
                      <div class="col-lg-5 col-xs-5 cl-tim no-padding-left"><b><?php echo $invoice->checkin; ?></b></div>
                    </div>
                   <!--  <div class="col-lg-12 col-xs-12">
                      <div class="col-lg-7 col-xs-7 cl-grey no-padding-left">Ngày trả phòng:</div>
                      <div class=" col-lg-5 col-xs-5 cl-tim no-padding-left">25/01/2018</div>
                    </div> -->
                    <div class="col-lg-12 col-xs-12">
                      <div class="col-lg-7 col-xs-7 cl-grey no-padding-left">Số đêm:</div>
                      <div class="col-lg-5 col-xs-5 cl-tim no-padding-left"><?php echo $invoice->nights;?></div>
                    </div>
                    <?php }else{?>
                    <div class="col-lg-12 col-xs-12">
                      <div class="col-lg-7 col-xs-7 cl-grey no-padding-left">Ngày nhận phòng:</div>
                      <div class="col-lg-5 col-xs-5 cl-tim no-padding-left"><b>Mua trước đi sau</b></div>
                    </div>
                   <!--  <div class="col-lg-12 col-xs-12">
                      <div class="col-lg-7 col-xs-7 cl-grey no-padding-left">Ngày trả phòng:</div>
                      <div class=" col-lg-5 col-xs-5 cl-tim no-padding-left">25/01/2018</div>
                    </div> -->
                   
                    <?php }?>

                  </div>
                  <div class="no-padding info-people">
                    <div class="col-lg-12 col-xs-12">
                      <div class="col-lg-8 col-xs-7 cl-grey no-padding-left">Người lớn:</div>
                      <div class="col-lg-4 col-xs-5 cl-tim no-padding-left"><?php echo $invoice->adult;?> </div>
                    </div>
                    <div class="col-lg-12 col-xs-12">
                      <div class="col-lg-8 col-xs-7 cl-grey no-padding-left">Trẻ em:</div>
                      <div class="col-lg-4 col-xs-5 cl-tim no-padding-left"><?php echo $invoice->child;?></div>
                    </div>
                    <div class="col-lg-12 col-xs-12">
                      <div class="col-lg-8 col-xs-7 cl-grey no-padding-left">Số lượng combo:</div>
                      <div class="col-lg-4 col-xs-5 cl-tim no-padding-left"><?php echo $invoice->booking_quantity ?></div>
                    </div>
                    <div class="col-lg-12 col-xs-12">
                      <div class="col-lg-8 col-xs-7 cl-grey no-padding-left">Giường phụ:</div>
                      <div class="col-lg-4 col-xs-5 cl-tim no-padding-left"> <?php echo $invoice->extraBeds;?></div>
                    </div>
                  </div>
                </div>
                <?php $subTotal =  $invoice->offer_detail->offer_price *$invoice->booking_quantity; ?>
                <div class="col-lg-12 col-xs-12 no-padding clss-content-book margin-top-30">
                         <div class="col-lg-12 col-xs-12 cl-tim">
                          <span><?php echo $invoice->offer_detail->offer_title; ?></span>
                        </div>
                        <div class="col-lg-12 col-xs-12 cl-grey font-size-mobile-12">
                          <span><?php echo number_format($invoice->offer_detail->offer_price) ?> x <?php echo $invoice->booking_quantity ?>  = <?php echo number_format($invoice->offer_detail->offer_price *$invoice->booking_quantity); ?> VND</span>
                        </div> 
                 

                  <?php //var_dump($booking_subitem);
                  $x = $booking_subitem ;//echo 'hhhh'.$x[378];
                  //foreach ($invoice->booking_subitem as $k=>$v) {//echo $k.'=>'.$v.'---'.$x[$k].'<br>' ;}
                  if (!empty($invoice->booking_subitem)) {//var_dump($surchargeInfo);
                          foreach ($surchargeInfo as $item) { //echo $item->id;
                              $sub_qty= $booking_subitem[$item->id];//echo $sub_qty;echo 'SSSSSSSS'.$invoice->booking_subitem["378"];
                              $price_surcharge = (int) $item->price   ;//str_replace(',', '', $item->price);
                              //$price_surcharge = $sub_qty * $price_surcharge;
                              $priceSurchargeTotal = $sub_qty * $price_surcharge;
                              $subTotal  += $sub_qty * $price_surcharge;
                        if($sub_qty>0){
                     ?>
                       <div class="col-lg-12 col-xs-12 cl-tim">
                          <span><?php echo $item->name; ?></span>
                        </div>
                        <div class="col-lg-12 col-xs-12 cl-grey font-size-mobile-12">
                          <span><?php echo number_format($price_surcharge).' x '. $sub_qty .' = '. number_format($priceSurchargeTotal); ?> VND</span>
                        </div> 
                 

                      <?php         }
                                }
                            }
                       ?>

                
                
                </div>
                <div class="col-lg-12 col-xs-12 content-item-text no-padding">
                  <div class="col-lg-12 col-xs-12 cl-grey no-padding">
                    <div class="col-lg-6 col-xs-6 text-left"><span>Thành tiền</span></div>
                    <div class="col-lg-6 col-xs-6 text-right"><span><?php echo number_format($subTotal);?>VND</span></div>
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
                  $subTotal += $total_booking_extras_fee;
                  ?>
                    <div class="col-lg-6 col-xs-6 text-right"><span><?php echo number_format($total_booking_extras_fee); ?> VND</span></div>
                  </div>
                  <div class="col-lg-12 col-xs-12 no-padding cl-grey">
                    <div class="col-lg-6 col-xs-6 text-left "><span>Thanh toán</span></div>
                    <div class="col-lg-6 col-xs-6 text-right"><span><b><?php echo number_format($subTotal);?> VND</b></span></div>
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
              
                 <li class="active"><a data-toggle="tab" class="dieukienhuy" href="#dieukienhuy">Điều kiện hủy</a></li>
              </ul>
              <div class="tab-content">
                <div id="dieukienhuy" class="tab-pane fade in active">
                      <div class="col-lg-12 col-xs-12 cotent-huyphong no-padding">
                                                            <?php echo nl2br($invoice->cancel_condition)?>

                  </div>
                </div>
              </div>
              <div class="clearfix"></div>
              <!--Dieu kien su dung -->
               <ul class="nav nav-tabs nav-tabs-book nav-tabs-book-combox margin-top-10">
              
                
                 <li class="active"><a data-toggle="tab" class="dieukiensudung" href="#dieukiensudung">Điều kiện sử dụng</a></li>
              </ul>
               <div class="tab-content">
                <div id="dieukiensudung" class="tab-pane fade in active">
                       <div class="col-lg-12 col-xs-12 cotent-huyphong no-padding">
                                         <?php echo nl2br($invoice->use_condition) ?>

                  </div>
                </div>

            
               <div class="hidden-lg">
              <!--phuong thuc thanh toan-->
              <ul class="nav nav-tabs nav-tabs-book">
                  <li class="active"><a data-toggle="tab" class="phuongthucaaa" href="#phuongthucthanhtoan">Phương thức thanh toán</a></li>
             
              </ul>
              <div class="tab-content">
                <div id="phuongthucthanhtoan" class="tab-pane fade in active">
                 
                  <div class="col-lg-12 col-xs-12 no-padding">
                      <div class="form-group">
                      <label class="control-label font-weight-unset">Quý khách đã chọn hình thức thanh toán</label>
                     
                         <label><?php echo getPayment($invoice->paymethod);?></label>
                      
                     
                     
                      </div>
                  </div>

                  <div class="col-lg-12 col-xs-12 no-padding">
                    <div class="form-group">
                      <?php if($invoice->paymethod=="banktransfer") echo nl2br(getBookingPaymentinfo($invoice->id)); else echo  $invoice->paymentInfo //getBookingPaymentinfo($invoice->id);?>
                    </div>
                  </div>

                </div>
              </div>
              <!--ghi chu -->
              <ul class="nav nav-tabs nav-tabs-book">
                  <li class="active"><a data-toggle="tab" class="ghichuaaa" href="#ghichuaaa">Ghi chú</a></li>
              </ul>
              <div class="tab-content">
                <div id="ghichuaaa" class="tab-pane fade in active">
                     <?php echo nl2br($invoice->additionaNotes) ?>
                </div>
              </div>
               <!--luu y -->
              <ul class="nav nav-tabs nav-tabs-book">
                  <li class="active"><a data-toggle="tab" class="luyaaa" href="#luyaaa">Lưu ý</a></li>
              </ul>
              <div class="tab-content">
                <div id="luyaaa" class="tab-pane fade in active">
                    <div class="col-lg-12 col-xs-12 no-padding">
                    <div class="form-group">
                    <label class="control-label font-weight-unset">
                     - Quý khách chỉ thanh toán khi được xác nhận bởi nhân viên HOSPI qua email hoặc điện thoại .
                    </label>
                    <label class="control-label font-weight-unset">
                     - Khi thanh toán chuyển khoản vui lòng ghi rõ, họ tên khách hàng hoặc thanh toán cho mã booking <?php echo $invoice->code ?> .
                    </label>
                     <label class="control-label font-weight-unset">
                     -  Nếu quý khách  chọn phương thức thanh toán chuyển khoản, Quý khách chỉ chuyển khoản theo thông tin tài khoản trong booking này. 
                    </label>
                    <label class="control-label font-weight-unset">
                    - Nếu quý khách các phương thức còn lại thì phải có phiếu thu, giấy giới thiệu thu tiền (nếu có) và các  giấy tờ có chữ ký và con dấu của công ty HOSPI thì mới hợp lệ. 
                    </label>
                     <label class="control-label font-weight-unset">
                   -  Quý khách có thể từ chối thanh toán nếu nhân viên không cung cấp đủ các thông tin trên hoặc liên hệ hotline: 090 345 5152 để được xác nhận .
                    </label>
                    </div>
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
  <script type='text/javascript'>
  $(window).load(function () {
  $('.showInput').css('display', 'none');
  $('.check_ShowInput').change(function () {
  if ($(this).prop("checked")) {
  $('.showInput').css('display', 'none');
  } else {
  $('.showInput').css('display', 'block');
  }
  $('.showInput').fadeToggle();
  });
  $(".payment_method").click(function () {
  $('.completebook').show();
  var gateway = $(this).val();
  $("#response").html("<div id='rotatingDiv'></div>");
  $.ajax({
  url: "https://www.hospi.vn/invoice/getGatewaylink//",
  type: "GET",
  data: {
  gateway: gateway
  },
  success: function (resp) {
  var response = $.parseJSON(resp);
  if (response.iscreditcard == "1") {
  $(".creditcardform").fadeIn("slow");
  $("#creditcardgateway").val(response.gateway);
  $("#response").html("");
  } else {
  $(".creditcardform").hide();
  $("#response").html(response.htmldata);
  $('#response input').on('change', function () {
  //alert($('input[name=bank]:checked', '#response').val());
  var name = $('input[name=bank]:checked', '#response').val();
  $("#divBankDetails").children().hide();
  $('#span' + name).show();
  });
  }
  }
  });
  });
  function addCommas(nStr) {
  nStr += '';
  x = nStr.split('.');
  x1 = x[0];
  x2 = x.length > 1 ? '.' + x[1] : '';
  var rgx = /(\d+)(\d{3})/;
  while (rgx.test(x1)) {
  x1 = x1.replace(rgx, '$1' + ',' + '$2');
  }
  return x1 + x2;
  }
  $(".applycoupon").on("click", function () {
  var module = $("#btype").val();
  var itemid = $("#itemid").val();
  var coupon = $(".coupon").val();
  $.ajax({
  url: "https://www.hospi.vn/admin/ajaxcalls/checkCoupon",
  type: 'POST',
  data: {
  coupon: coupon,
  module: module,
  itemid: itemid
  },
  //dataType : 'json',
  success: function (response) {
  console.log(response);
  var resp = $.parseJSON(response);
  if (resp.status == "success") {
  $("#couponid").val(resp.couponid);
  $(".couponmsg").html(" <div class='alert alert-success'>Mã giảm giá<strong> " + coupon + " </strong>được áp dụng. Bạn đã giảm được <strong> " + resp.value + resp.type + " </strong>/tổng đơn phòng. Số tiền giảm sẽ thể hiện trong hoá đơn.</div>");
  $(".coupon").prop("readonly", "readonly");
  $(".applycoupon").hide();
  if (resp.type == '%') {
  var tong_chua_giam = $('#tong_chua_giam').val();
  var giam_gia = tong_chua_giam * resp.value / 100;
  $('#giam_gia').val(giam_gia);
  $('#giam_gia_span').html(addCommas(giam_gia) + ' VND');
  $('#tong_thanh_toan').val(tong_chua_giam - giam_gia);
  $('#tong_thanh_toan_span').html(addCommas(tong_chua_giam - giam_gia) + ' VND');
  }
  } else {
  $("#couponid").val("");
  $(".couponmsg").html("");
  if (resp.status == "irrelevant") {
  alert("This coupon is not applicable here");
  } else {
  alert("Invalid Coupon");
  }
  }
  console.log(resp);
  }
  });
  });
  });
  </script>

<div class="container-fulid bk-tim clss-footer" style="margin-top: 20px;height: auto">
    <div class="container ">
        <div class="col-lg-4">&#169; 2018- by HOSPI TRAVEL CO.LTD</div>
        <div class="col-lg-2"><i class="fa fa-chevron-right" aria-hidden="true"></i> Chính sách bảo mật</div>
        <div class="col-lg-2"><i class="fa fa-chevron-right" aria-hidden="true"></i> Điều khoản sử dụng</div>
        <div class="col-lg-4">Lầu 1,số 124 Khánh Hội,P.6, Quận 4,TP.Hồ Chí Minh</div>
    </div>
</div>
                

    <!-- Angular Data -->
    <script src='//ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.js'></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-sanitize.js"></script>
    <link rel="stylesheet" href="<?php echo $theme_url; ?>asset/include/angucomplete/angucomplete.css" />
    <script src="/assets/include/angucomplete/angucomplete.js"></script>
    <script type="text/javascript"> (function () {
    'use strict';
    var app = angular.module('phptravelsApp',['ngSanitize','angucomplete-alt']);
    app.controller('appCtrl', ['$scope', '$http', function appCtrl ($scope, $http) { var self = this; var url = "https://www.hospi.vn/tours/featuredTours/"; $scope.lg = "6"; $scope.md = "6"; $scope.items = []; $http.get(url).success(function(data) { $scope.items = data; $scope.setClasses($scope.items); }); $scope.getData = function(loc){ $http.get(url+loc).success(function(data) { $scope.items = data; $scope.setClasses($scope.items); }); }; $scope.setClasses = function(data){ var totalItems = data.length; if(totalItems == 1){ $scope.lg = "6 tours12"; $scope.md = "6 tours12"; }else if(totalItems == 2){ $scope.lg = "6"; $scope.md = "6"; }else if(totalItems > 2){ $scope.lg = "6"; $scope.md = "6"; } }; } ]);
    app.filter('strLimit', function() { 'use strict'; return function(input, limit) { if (input) { if (limit > input.length) { return input.slice(0, limit); } else { return input.slice(0, limit) + '...'; } } }; });
    app.controller('autoSuggest', ['$scope','$http', function autoSuggest ($scope, $http) {
    $scope.searching = "";
    $scope.modType = "";
    $scope.txtSearch = "";
    $scope.remoteUrlRequestFn = function(str) {
    return {q: str};
    };
    $scope.selectedItem = function(selected) {
    $scope.searching = selected.originalObject.id;
    $scope.modType = selected.originalObject.module;
    };
    } ]);
    })(); </script>
    <!-- End Angular Data -->
    <link href="<?php echo $theme_url; ?>assets/include/select2/select2.css" rel="stylesheet" />
    <script src="<?php echo $theme_url; ?>assets/include/select2/select2.min.js"></script>
    <!-- This page JS -->
    <!-- Custom functions -->
    <script src="<?php echo $theme_url; ?>assets/js/functions.js"></script>
    <!-- Picker UI-->
    <!--<script src="<?php echo $theme_url; ?>assets/js/jquery-ui.js"></script>-->
    <script type="text/javascript" src="//code.jquery.com/ui/1.8.18/jquery-ui.min.js"></script>
    <!-- Easing -->
    <script src="<?php echo $theme_url; ?>assets/js/jquery.easing.js"></script>
    <!-- Nicescroll  -->
    <!--<script src="https://www.hospi.vn<?php echo $theme_url; ?>assets/js/jquery.nicescroll.min.js"></script>-->
    <!-- CarouFredSel -->
    <script src="<?php echo $theme_url; ?>assets/js/jquery.carouFredSel-6.2.1-packed.js"></script>
    <script src="<?php echo $theme_url; ?>assets/js/helper-plugins/jquery.touchSwipe.min.js"></script>
    <script type="text/javascript" src="<?php echo $theme_url; ?>assets/js/helper-plugins/jquery.mousewheel.min.js"></script>
    <script type="text/javascript" src="<?php echo $theme_url; ?>assets/js/helper-plugins/jquery.transit.min.js"></script>
    <script type="text/javascript" src="<?php echo $theme_url; ?>assets/js/helper-plugins/jquery.ba-throttle-debounce.min.js"></script>
    <!-- Custom Select -->
    <script type='text/javascript' src='<?php echo $theme_url; ?>assets/js/jquery.customSelect.js'></script>
    <script src="<?php echo $theme_url; ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo $theme_url; ?>assets/js/bootstrap-slider.js"></script>
    <script src="<?php echo $theme_url; ?>assets/include/datepicker/datepicker.js"></script>
    <link rel="stylesheet" href="<?php echo $theme_url; ?>assets/include/datepicker/datepicker.css" />
    <link rel="stylesheet" href="<?php echo $theme_url; ?>assets/include/datepicker/dp2.css" />
    <script>
    $('#popoverData').popover();
    $('#popoverOption').popover({ trigger: "hover" });
    </script>
    <!-- WOWJs -->
    <script>
    //new WOW().init();
    </script>
    <!-- WOWJs -->
    <script>
    var fmt = "dd/mm/yyyy";
    var baseURL = "https://www.hospi.vn/";
    $(function() {
    /* Wish list global function */
    $(".wishlistcheck").on("click",function(){
    var id = $(this).prop('id');
    var module = $(this).data('module');
    var userid = "";
    var action = "add";
    var thisdiv = $(this);
    if($(this).hasClass('fav')){
    action = "remove";
    }
    $.post(baseURL+'account/wishlist/'+action,{module: module, itemid: id, loggedin: userid},function(resp){
    var response = $.parseJSON(resp);
    if(response.isloggedIn){
    if(action == "remove"){
    $("."+module+"wishsign"+id).html("+");
    //$("."+module+"wishtext"+id).html("Add to Wishlist");
    $("."+module+"wishtext"+id).tooltip('hide').attr('data-original-title', "Add to Wishlist").tooltip('fixTitle').tooltip('show');
    $("."+module+"wishsign"+id).removeClass("fav");
    thisdiv.removeClass('fav');
    }else{
    thisdiv.addClass('fav');
    $("."+module+"wishsign"+id).addClass("fav");
    $("."+module+"wishsign"+id).html("-");
    //$("."+module+"wishtext"+id).html("Remove From Wishlist");
    $("."+module+"wishtext"+id).tooltip('hide').attr('data-original-title', "Remove From Wishlist").tooltip('fixTitle').tooltip('show');
    }
    }else{
    alert("Please Login to add to wishlist.");
    }
    console.log(response);
    });
    })
    /* End Wish list global function */
    /* select2 */
    $('.chosen-select').select2({ width: '100%', maximumSelectionSize: 1  });
    /* homepage main search auto detector */
    $('.nav-tabs li:first-child').addClass('active');  var t  = $('.nav-tabs li:first-child').data('title'); $("#"+t).addClass("active in"); $('.feat li:first-child').addClass('active'); var t  = $('.feat li:first-child').data('title'); $("#"+t).addClass("active in");
    /* tours ajax categories loader */
    $('#location').on('change',function(){ var location = $(this).val(); $.post(baseURL+'tours/tourajaxcalls/onChangeLocation',{location: location},function(resp){ var response = $.parseJSON(resp); console.log(response); if(response.hasResult){ $("#tourtype").html(response.optionsList); }else{ $("#tourtype").html(response.optionsList); } mySelectUpdate(); }) });
    
    /* cars ajax types loader */
    function parseDate(str) {
    var mdy = str.split('https://www.hospi.vn/')
    return new Date(mdy[2],  mdy[1], mdy[0]-1);
    }
    function daydiff(first, second) {
    return (second-first)/(1000*60*60*24);
    }
    function Padder(len, pad) {
    if (len === undefined) {
    len = 1;
    } else if (pad === undefined) {
    pad = '0';
    }
    var pads = '';
    while (pads.length < len) {
    pads += pad;
    }
    this.pad = function (what) {
    var s = what.toString();
    return pads.substring(0, pads.length - s.length) + s;
    };
    }
    /* tooltip */
    $('[data-toggle=tooltip]').tooltip();
    /* datepicker */
    window.prettyPrint&&prettyPrint(),$(".dob").datepicker({format:fmt,autoclose:!0}).on("changeDate",function(){$(this).datepicker("hide")}),$("#dp1").datepicker(),$("#dp2").datepicker();
    window.prettyPrint&&prettyPrint(),$(".dob").datepicker({format:fmt,autoclose:!0}).on("changeDate",function(){$(this).datepicker("hide")}),$("#dp3").datepicker(),$("#dp4").datepicker();
    /* disabling dates */
    var nowTemp = new Date();
    var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
    var checkin = $('.dpd1').datepicker({
    format: fmt,
    language: 'vi',
    onRender: function(date) {
    return date.valueOf() < now.valueOf() ? 'disabled' : '';
    }
    }).on('changeDate', function(ev) {
    if (ev.date.valueOf() > checkout.date.valueOf()) {
    var newDate = new Date(ev.date)
    newDate.setDate(newDate.getDate() + 1);
    checkout.setValue(newDate);
    }
    checkin.hide();
    $('.dpd2')[0].focus();
    if($('.dpd2').val() != '' && $('.dpd1').val() != '' ){
    var number_night = parseInt(daydiff(parseDate($('.dpd1').val()), parseDate($('.dpd2').val())));
    var zero2 = new Padder(2);
    $('#number_night').html(zero2.pad(number_night));
    }
    }).data('datepicker');
    var checkout = $('.dpd2').datepicker({
    format: fmt,
    onRender: function(date) {
    return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
    }
    }).on('changeDate', function(ev) {
    checkout.hide();
    if($('.dpd2').val() != '' && $('.dpd1').val() != '' ){
    var number_night = parseInt(daydiff(parseDate($('.dpd1').val()), parseDate($('.dpd2').val())));
    var zero2 = new Padder(2);
    $('#number_night').html(zero2.pad(number_night));
    }
    }).data('datepicker');
    var checkins = $('.dpd3').datepicker({
    format: fmt,
    language: 'vi',
    onRender: function(date) {
    return date.valueOf() < now.valueOf() ? 'disabled' : '';
    }
    }).on('changeDate', function(ev) {
    if (ev.date.valueOf() > checkouts.date.valueOf()) {
    var newDates = new Date(ev.date)
    newDates.setDate(newDates.getDate() + 1);
    checkouts.setValue(newDates);
    }
    checkins.hide();
    $('.dpd4')[0].focus();
    }).data('datepicker');
    var checkouts = $('.dpd4').datepicker({
    format: fmt,
    onRender: function(date) {
    return date.valueOf() <= checkins.date.valueOf() ? 'disabled' : '';
    }
    }).on('changeDate', function(ev) {
    checkouts.hide();
    }).data('datepicker');
    /* Expedia datepicker */
    /* End Expedia Datepicker*/
    /* Dohop datepicker */
    /* End Dohop Datepicker*/
    // Tours checkin - disabling Single date
    var nowTemp4 = new Date();
    var now4 = new Date(nowTemp4.getFullYear(), nowTemp4.getMonth(), nowTemp4.getDate(), 0, 0, 0, 0);
    var checkin4 = $('#tchkin').datepicker({format: fmt, onRender: function(date) {
    return date.valueOf() < now4.valueOf() ? 'disabled' : ''; } }).on('changeDate', function(ev) {
    $('#tchkin').datepicker('hide');
    });
    
    
    /* Cartrawler datepicker */
    /* End Cartrawler Datepicker*/
    /* Newsletter subscription */
    $(".sub_newsletter").on("click",function(){var e=$(".sub_email").val();$.post("https://www.hospi.vn/home/subscribe",{email:e},function(e){$(".subscriberesponse").html(e).fadeIn("slow"),setTimeout(function(){$(".subscriberesponse").fadeOut("slow")},2000)})});
    /* dropdown on hover */
    $("ul.nav li.dropdown").hover(function(){$(this).find(".dropdown-menu").stop(!0,!0).delay(200).fadeIn(200)},function(){$(this).find(".dropdown-menu").stop(!0,!0).delay(200).fadeOut(200)}); });
    /* start change currency functionality */
    function change_currency(c){$("#loadingbg").css("display","block"),$.post("https://www.hospi.vn/admin/ajaxcalls/changeCurrency",{id:c},function(){location.reload()})}
    /* map iframe modal */
    function showMap(a,o){"modal"==o?($("#mapModal").modal("show"),$("#mapModal").on("shown.bs.modal",function(){$("#mapModal .mapContent").html('<iframe src="'+a+'" width="100%" height="450" frameborder="0" style="border:0"></iframe>')})):$("#"+o).html('<iframe src="'+a+'" width="100%" height="450" frameborder="0" style="border:0"></iframe>')}
    </script>
    <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-86943600-1', 'auto');
    ga('send', 'pageview');
    </script><style type="text/css">
    .block-panel-info{
    line-height: 25px;
    }
    </style>
  </body>
</html>