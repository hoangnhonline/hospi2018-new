<div class="block-breadcrumb">
    <div class="container">
        <?php echo $breadcrumb; ?>
    </div>
</div>

<div class="container pagecontainer offset-0">
  <div class="offer-page rightcontent col-md-12 offset-0">
    <div class="itemscontainer offset-1">
      <div class="result"></div>
      <div class="page-info-user">
        <form class="row block-panel-info ng-pristine ng-valid" id="bookingdetails">
          <div class="col-sm-7 col-xs-12">
            <ul class="nav nav-tabs nav-tabs-book">
              <li class="active"><a data-toggle="tab" class="thongtinbooking" href="#home" aria-expanded="true">Thông tin booking</a></li>
              <li class="pading-top-5-mobile"><a class="xuathoadon no-padding" data-toggle="tab" href="#xuathoadon" aria-expanded="false">Bạn cần xuất hóa đơn</a></li>
              <li class="phuongthuc pading-top-5-mobile margin-bottom-5-mobile"><a class="phuongthuca" data-toggle="tab" href="#phuongthucthanhtoan" aria-expanded="false">Phương thức thanh toán</a></li>
            </ul>
            <div class="tab-content">
              <div id="home" class="tab-pane fade active in">
                <div class="col-lg-6 col-xs-12 no-padding">
                  <div class="form-group">
                    
                    <input type="text" placeholder="Họ tên của bạn" class="form-control" name="lastname">
                  </div>
                  <div class="form-group">
                    
                    <input type="text" placeholder="Email" class="form-control" name="email">
                  </div>
                  <div class="form-group">
                    
                    <input type="text" placeholder="Số điện thoại" class="form-control" name="phone">
                  </div>
                </div>
                 <div class="col-lg-12 col-xs-12 no-padding visible-xs">
                  <div class="form-group">
                    
                    <input type="text" class="form-control" placeholder="Địa chỉ" name="address">
                  </div>
                </div>
                <div class="col-lg-6 col-xs-12 no-padding-right no-padding-left-mobile">
                  <div class="form-group">
                    
                    <textarea class="form-control" cols="4" rows="6" placeholder="Yêu cầu khác" name="additionalnotes"></textarea>
                    
                  </div>
                </div>
                <div class="col-lg-12 col-xs-12 no-padding hidden-xs">
                  <div class="form-group">
                    
                    <input type="text" class="form-control" placeholder="Địa chỉ" name="address">
                  </div>
                </div>
                
                <div class="clearfix"></div>
              </div>
              <div id="xuathoadon" class="tab-pane fade">
                <div class="col-lg-7 col-xs-12 no-padding">
                  <div class="form-group">
                    <input type="text" placeholder="Nhập tên công ty" class="form-control" name="company">
                  </div>
                </div>
                <div class="col-lg-5 col-xs-12 no-padding-right no-padding-left-mobile">
                  <div class="form-group">
                    
                    <input type="text" placeholder="Mã số thuế" class="form-control" name="mst">
                    
                  </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 go-right no-padding-left no-margin-top-mobile">
                  <div class="form-group checkbox">
                    <label class="no-padding-left">
                      <input type="checkbox" value="" class="ngayvechang">
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                     Bạn muốn gửi hóa đơn về địa chỉ khác ?
                    </label>
                  </div>
                </div>
                <div class="col-lg-12 col-xs-12 no-padding">
                  <div class="form-group">
                    
                    <input type="text" class="form-control" placeholder="Địa chỉ công ty" name="companyadd">
                  </div>
                </div>
                
                <div class="clearfix"></div>
              </div>
              <div id="phuongthucthanhtoan" class="tab-pane fade">
                <div class="form-group">
                  Để thuận tiện cho việc thanh toán khách vui lòng chọn 1 trong những hình thức thanh toán dưới đây
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12 go-right no-padding-left no-margin-top-mobile">
                  <div class="form-group checkbox">
                    <label class="no-padding-left">
                      <input type="checkbox" class="chuyenkhoan payment_method" data-id = "1" value="banktransfer"  name="checkout-type">
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok "></i></span>
                      Chuyển khoản BankingATM
                    </label>
                  </div>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12 go-right no-padding-left no-margin-top-mobile">
                  <div class="form-group checkbox">
                    <label class="no-padding-left">
                      <input type="checkbox" class="chuyenkhoan payment_method" data-id = "2" value="payatoffice" name="checkout-type">
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                      Văn phòng HOSPI
                    </label>
                  </div>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12 go-right no-padding-left no-margin-top-mobile">
                  <div class="form-group checkbox">
                    <label class="no-padding-left">
                      <input type="checkbox" class="chuyenkhoan payment_method" data-id = "3"  value="cod" name="checkout-type">
                      <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                      Thanh toán tại nhà
                    </label>
                  </div>
                </div>
                <div class="col-lg-12 col-xs-12 no-padding" id="showphuongthuc_1" style="display: none">
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
                  <div class="col-lg-12 col-xs-12"><span>* Quận 10,Quận 7,Quận 11 ,Quận Bình Thạnh,Quận Tân Bình,Phú Nhuận thu phí 20.000 VND (miễn phí cho đơn phòng trên 10.000.000 VND)</span></div>
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
                      
                      <input type="text" class="form-control" name="txtAddress">
                    </div>
                  </div>
                </div>
                <div class="clearfix"></div>
              </div>
            </div>
            
          </div>
          <div class="col-sm-5 col-xs-12">
            <ul class="nav nav-tabs nav-tabs-book">
              <li class="active"><a data-toggle="tab" class="donphongduaban" href="#donphongcuaban">Đơn phòng</a></li>
              <li class="text-center pading-top-5-mobile margin-bottom-5-mobile"><a data-toggle="tab" class="dieukienhuy" href="#dieukienhuy">Điều kiện hủy</a></li>
            </ul>
            <div class="tab-content">
              <div id="donphongcuaban" class="tab-pane fade in active">
                <div class="col-lg-12 col-xs-12 no-padding">
                  <div class="col-lg-3 col-xs-4 no-padding-left">
                    <img src="<?php echo $module->thumbnail; ?>" alt="<?php echo $module->title; ?>" width="108">
                  </div>
                  <div class="col-lg-9 col-xs-8 info-hotel">
                    <h1><?php echo $module->hotel_title; ?></h1>
                    <div class="col-lg-12 col-xs-12 no-padding">
                      <i style="margin-left:-5px" class="icon-location-6"></i>

                      <small class="adddress font-size-14"><?php echo $module->hotel_map_city; ?></small>
                    </div>
                    <div class="col-lg-12 col-xs-12 no-padding">
                      <?php
                                       $res = "";
                                        for ($stars = 1; $stars <= 5; $stars++) {

                                            if ($stars <= $module->hotel_stars) {
                                                $res .= " <i class=\"star text-warning fa fa-star voted\"></i>" ; //PT_STARS_ICON;
                                            } else {
                                                $res .= PT_EMPTY_STARS_ICON;
                                            }
                                        }

                                        echo $res;
                                        ?>
                    <!--                     
                      <i class="star text-warning fa fa-star voted"></i>
                      <i class="star text-warning fa fa-star voted"></i>
                      <i class="star text-warning fa fa-star voted"></i>
                      <i class="star text-warning fa fa-star voted"></i>
                      <i class="star text-warning fa fa-star voted"></i> -->
                    </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="content-checkout info-time-book">
                    <div class="col-lg-12 col-xs-12">
                      <div class="col-lg-7 col-xs-7 cl-grey no-padding-left">Ngày nhận phòng:</div>
                      <div class="col-lg-5 col-xs-5 cl-tim no-padding-left"><?php echo $checkin; ?></div>
                    </div>
                    <div class="col-lg-12 col-xs-12">
                      <div class="col-lg-7 col-xs-7 cl-grey no-padding-left">Ngày trả phòng:</div>
                      <div class=" col-lg-5 col-xs-5 cl-tim no-padding-left"><?php echo $checkout; ?></div>
                    </div>
                    <div class="col-lg-12 col-xs-12">
                      <div class="col-lg-7 col-xs-7 cl-grey no-padding-left">Số đêm:</div>
                      <div class="col-lg-5 col-xs-5 cl-tim no-padding-left"><?php echo $stay; ?></div>
                    </div>
                  </div>
                  <div class="no-padding info-people">
                    <div class="col-lg-12 col-xs-12">
                      <div class="col-lg-8 col-xs-7 cl-grey no-padding-left">Người lớn:</div>
                      <div class="col-lg-4  col-xs-5 cl-tim no-padding-left"><?php echo $adults; ?></div>
                    </div>
                    <div class="col-lg-12 col-xs-12">
                      <div class="col-lg-8 col-xs-7 cl-grey no-padding-left">Trẻ em:</div>
                      <div class="col-lg-4 col-xs-5 cl-tim no-padding-left"><?php echo $child; ?></div>
                    </div>
                    <div class="col-lg-12 col-xs-12">
                      <div class="col-lg-8 col-xs-7 cl-grey no-padding-left">Số lượng phòng:</div>
                      <div class="col-lg-4 col-xs-5 cl-tim no-padding-left"><?php echo $totalRooms; ?></div>
                    </div>
                    <div class="col-lg-12 col-xs-12">
                      <div class="col-lg-8 col-xs-7 cl-grey no-padding-left">Giường phụ:</div>
                      <div class="col-lg-4 col-xs-5 cl-tim no-padding-left">01</div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12 col-xs-12 no-padding margin-top-10">
                  <div class="form-group">
                    
                    <input type="text" class="form-control" placeholder="Yêu cầu giường" name="diachi">
                  </div>
                </div>
               

                <div class="col-lg-12 col-xs-12  no-padding clss-content-book">
                   <?php
                  $room_quantity = json_decode($room_quantity, true);
                  $extra_beds = json_decode($extra_beds, true);

                  $priceTotal = $so_giuong_phu = 0;
                  if (!empty($room)) {

                      $priceExtraBedTotal = 0;
                      foreach ($room as $roomId => $rDetail) {
                   
                          $priceOne = 0;
                          $priceExtraBed = 0;
                         
                          foreach ($rDetail->Info['detail'] as $tmp) {                              
                              $priceOne += $tmp->total;
                              $priceExtraBed += $tmp->bed_total;
                                                         
                          }
                          $priceOne = $priceOne / count($rDetail->Info['detail']);
                          $priceExtraBedTotal += $priceExtraBed * $extra_beds[$roomId];
                          $so_giuong_phu += $extra_beds[$roomId];


                          $quantity = $room_quantity[$roomId];                          
                          $priceOne = $priceChoose[$roomId];
                          $priceBedOne = $priceBedChoose[$roomId];
                          $thanh_tien_phong = $priceOne * $quantity * $stay;
                          $thanh_tien_giuong = $priceBedOne * $quantity * $stay;
                          ?>
                          <div class="clearfix"></div>
                            <div class="col-lg-12 col-xs-12 cl-tim">
                              <?php 
                              if($name_uudai[$roomId]){
                              ?>
                              <span><?php echo $name_uudai[$roomId]; ?></span><br>
                            <?php } ?>
                              <span><?php echo $rDetail->title; ?></span>
                            </div>
                            <div class="col-lg-12 col-xs-12 cl-grey">
                              <span><?php echo number_format($priceOne); ?> x <?php echo $stay; ?> (đêm)
                                  x <?php echo $quantity; ?> (phòng)
                                  = <?php echo number_format($thanh_tien_phong); ?> VND</span>
                          </div>
                          <?php
                          $priceTotal += $rDetail->Info['total'] * $quantity;
                         }
                  } ?>
                  
<!--                   <div class="col-lg-3 col-xs-3 line-book"></div>
 -->                 
                 

                  <div class="col-lg-12 col-xs-12 cl-tim">
                    <span>* Giường phụ</span>
                  </div>
                  <div class="col-lg-12 col-xs-12 cl-grey">
                    <span><?php echo number_format($thanh_tien_giuong); ?></span>
                  </div>
                </div>
                <input type="hidden" name="so_giuong_phu" value="<?php echo $so_giuong_phu; ?>">
                <input type="hidden" name="phi_giuong_phu" value="<?php echo $priceExtraBedTotal; ?>">
                <div class="col-lg-12 col-xs-12 content-item-text no-padding">
                  <div class="col-lg-12 col-xs-12 cl-grey no-padding">
                    <div class="col-lg-6 col-xs-6 text-left"><span>Thành tiền</span></div>
                    <div class="col-lg-6 col-xs-6 text-right"><span><?php echo number_format($thanh_tien_phong + $thanh_tien_giuong ); ?> VND</span></div>
                  </div>
                  <?php
                  $phi_vat = $phi_dich_vu = 0;
                  if ($module->hotel_tax_fixed > 0) {
                      $phi_vat = $module->hotel_tax_fixed;
                  } elseif ($module->hotel_tax_percentage > 0) {
                      $phi_vat = $priceTotal * ($module->hotel_tax_percentage / 100);
                  }
                  if ($module->hotel_service_fixed > 0) {
                      $phi_dich_vu = $module->hotel_service_fixed;
                  } elseif ($module->hotel_service_percentage > 0) {
                      $phi_dich_vu = $priceTotal * ($module->hotel_service_percentage / 100);
                  }
                  ?>
                  <div class="col-lg-12 col-xs-12 cl-grey no-padding">
                    <div class="col-lg-6 col-xs-6 text-left"><span>Phí VAT</span></div>
                    <div class="col-lg-6 col-xs-6 text-right"><span><?php echo number_format($phi_vat); ?>  VND</span></div>
                    <input type="hidden" name="phi_vat" value="<?php echo $phi_vat; ?>">
                  </div>
                  <div class="col-lg-12 col-xs-12 cl-grey no-padding">
                    <div class="col-lg-6 col-xs-6 text-left"><span>Phí dịch vụ</span></div>
                    <div class="col-lg-6 col-xs-6 text-right"><span><?php echo number_format($phi_dich_vu); ?> VND</span></div>
                    <input type="hidden" name="phi_dich_vu" value="<?php echo $phi_dich_vu; ?>">
                  </div>
                  <div class="col-lg-12 col-xs-12 cl-grey no-padding">
                    <div class="col-lg-6 col-xs-6 text-left"><span>Chi phí khác</span></div>
                    <div class="col-lg-6 col-xs-6 text-right"><span>0 VND</span></div>
                  </div>
                  <div class="col-lg-12 col-xs-12 no-padding cl-grey">
                    <div class="col-lg-6 col-xs-6 text-left "><span>Thanh toán</span></div>
                    <div class="col-lg-6 col-xs-6 text-right"><span><b><?php echo number_format($thanh_tien_giuong + $thanh_tien_phong + $phi_vat + $phi_dich_vu); ?> VND</b></span></div>
                    <input type="hidden" name="tong_chua_giam" id="tong_chua_giam"   value="<?php echo $thanh_tien_giuong + $thanh_tien_phong + $phi_vat + $phi_dich_vu; ?>">
                  </div>
                </div>
                <div class="col-lg-12 col-xs-12 content-giam-gia no-padding padding-top-10">
                  <div class="col-lg-5 col-xs-12"><span>Bạn có mã giảm giá ?</span></div>
                  <div class="col-lg-4 col-xs-12">
                    <div class="form-group">
                      
                      <input type="text" class="form-control coupon" placeholder="Mã giảm giá" name="coupon_code">
                    </div>
                  </div>
                  <div class="col-lg-2 col-xs-12 no-padding">
                    <div class="form-group">
                      
                      <input type="button" class="form-control button-tim applycoupon" value="Áp dụng">
                    </div>
                  </div>
                  <div class="col-lg-12 col-xs-12">
                    <span class="cl-grey couponmsg"> </span>
                  </div>
                  <div class="col-lg-12 col-xs-12 no-padding cl-tim">
                    <div class="col-lg-6 col-xs-6 text-left "><span>Giảm giá </span></div>
                    <div class="col-lg-6 col-xs-6 text-right"><span  id="giam_gia_span" ><b>0 VND</b></span></div>
                     <input type="hidden" name="giam_gia" value="0" id="giam_gia">

                  </div>
                  <div class="col-lg-12 col-xs-12 no-padding cl-tim clss-tongthanhtoan">
                    <div class="col-lg-6 col-xs-6 text-left "><span>Tổng thanh toán </span></div>
                    <div class="col-lg-6 col-xs-6 text-right"><span id="tong_thanh_toan_span"><b><?php echo number_format($thanh_tien_phong + $thanh_tien_giuong); ?> VND</b></span></div>
                    <input type="hidden" name="tong_thanh_toan" id="tong_thanh_toan" value="<?php echo($thanh_tien_giuong + $thanh_tien_phong); ?>">
                  </div>
                  <div class="col-lg-12 col-xs-12 no-padding cl-grey clss-finish">
                    <div class="col-lg-12 col-xs-12 text-left ">
                      <span>Tôi đã đọc  và chấp nhận điều kiện và chính sách của khách sạn,<span class="cl-tim"><u>Điều khoản sử dụng</u></span> và
                      <span><u class="cl-tim">chính sách bảo mật</u></span> của HOSPI </span></div>
                      
                    </div>
                    <div class="col-lg-12 col-xs-12 no-padding">
                      <button class="button-tim completebook" type ="submit" name="<?php if (empty($usersession)) {
                        echo "guest";
                    } else {
                        echo "logged";
                    } ?>" onclick="return completebook('<?php echo base_url(); ?>','<?php echo trans('0159') ?>');">Hoàn thành</button>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div id="dieukienhuy" class="tab-pane fade">
                  <div class="col-lg-12 col-xs-12 cotent-huyphong no-padding">
                       <?php echo nl2br($module->cancel_condition); ?>
                  </div>
                </div>
               
              </div>
            </div>
           <input type="hidden" name="country" value="VN" id="country"/>
            <input type="hidden" id="itemid" name="itemid" value="<?php echo $module->hotel_id; ?>"/>
            <input type="hidden" name="checkout" value="<?php echo $checkout; ?>"/>
            <input type="hidden" name="adults" value="<?php echo $adults; ?>"/>
            <input type="hidden" name="child" value="<?php echo $child; ?>"/>
            <input type="hidden" name="nights" value="<?php echo $stay; ?>"/>
            <input type="hidden" id="couponid" name="couponid" value=""/>
            <input type="hidden" id="btype" name="btype" value="<?php echo $appModule; ?>"/>
             <input type="hidden" name="subitemid" value="<?php echo $room_id; ?>"/>
            <input type="hidden" name="roomscount" value='<?php echo json_encode($room_quantity); ?>'/>
            <input type="hidden" name="bedscount" value='<?php echo json_encode($extra_beds); ?>'/>
            <input type="hidden" name="checkin" value="<?php echo $checkin; ?>"/>
             <!-- <input type="hidden" name="adults" value= 0 />
            <input type="hidden" name="child" value= 0 /> -->
          </form>
        </div>
      </div>
    </div>
  </div>

  <div id="waiting" d></div>
  <div  style=" height :100px ;dmargin-bottom: 100px"></div>

         
<style>
    #rotatingImg {
        display: none;
    }

    .booking-bg {
        padding: 10px 0 5px 0;
        width: 100%;
        background-image: url('<?php echo $theme_url; ?>assets/images/step-bg.png');
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
<?php if ($appModule != "ean") { ?>
    <script src="<?php echo base_url(); ?>assets/js/booking.js"></script>
<?php } ?>
<div class="clearfix"></div>
<script type='text/javascript'>
    $(window).load(function () {
       $(".chuyenkhoan").change(function(){
  var _val=$(this).data('id');
  if(_val==1)
  {
    $("#showphuongthuc_"+_val+"").show();
    $("#showphuongthuc_2").hide();
    $("#showphuongthuc_3").hide();
  }
  else{
    if(_val==2)
    {
      $("#showphuongthuc_"+_val+"").show();
      $("#showphuongthuc_1").hide();
      $("#showphuongthuc_3").hide();
    }
    else{
      if(_val==3)
      {
        $("#showphuongthuc_"+_val+"").show();
        $("#showphuongthuc_2").hide();
        $("#showphuongthuc_1").hide();
      }
    }
  }

});

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
                url: "<?php echo base_url();?>invoice/getGatewaylink",  ///<?php //echo $invoice->id?>/<?php //echo $invoice->code;?>
                type: "GET",
                data: {
                    gateway: gateway
                },
                success: function (resp) {
                   /* var response = $.parseJSON(resp);
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

                    }*/
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
                url: "<?php echo base_url();?>admin/ajaxcalls/checkCoupon",
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
                        $(".couponmsg").html(" <div class='alert alert-success'><?php echo trans('0512'); ?><strong> " + coupon + " </strong><?php echo trans('0821'); ?> <strong> " + resp.value + resp.type + " </strong><?php echo trans('0822'); ?></div>");
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

                            alert("<?php echo trans('0520'); ?>");
  } else {

                            alert("<?php echo trans('0513'); ?>");
  }
  }
  console.log(resp);
  }
  });
  });
  });
  </script>