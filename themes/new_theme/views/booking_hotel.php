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
                    <!-- class="col-sm-7 col-xs-12" -->
                    <div class="col-sm-7 col-xs-12">
                        <div class="clearfix">
                            <div class="block-payment block-payment-item">
                                <div class="block-title">
                                    <span class="num">1</span>
                                    Nhập thông tin
                                </div>
                                <div class="block-content">
                                    <div class="row">
                                        <div class="col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <label for="" class="fontf_arial form_title">Họ tên bạn</label>
                                                <input type="text" placeholder="" class="form-control" name="lastname">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <label for="" class="fontf_arial form_title">Email</label>
                                                <input type="text" placeholder="" class="form-control" name="email">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <label for="" class="fontf_arial form_title">Số điện thoại</label>
                                                <input type="text" placeholder="" class="form-control" name="phone">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label for="" class="fontf_arial form_title">Yêu cầu khác</label>
                                                <textarea class="form-control" cols="4" rows="6" placeholder="" name="additionalnotes"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="block-xuathoadon">
                                        <button type="button" class="collapsebtn go-text-right collapsed" data-toggle="collapse" data-target="#xuathoadon">Bạn cần xuất hóa đơn <span class="collapsearrow"></span></button>
                                        <div id="xuathoadon" class="collapse out collapse-br">
                                            <div class="row">
                                                <div class="col-lg-7 col-xs-12 no-padding-right">
                                                    <div class="form-group">
                                                        <label for="" class="fontf_arial form_title">Tên công ty</label>
                                                        <input type="text" placeholder="" class="form-control" name="company">
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 col-xs-12">
                                                    <div class="form-group">
                                                        <label for="" class="fontf_arial form_title">Mã số thuế</label>
                                                        <input type="text" placeholder="" class="form-control" name="mst">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-xs-12">
                                                    <div class="form-group">
                                                        <label for="" class="fontf_arial form_title">Địa chỉ công ty</label>
                                                        <input type="text" class="form-control" placeholder="" name="address">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 go-right">
                                                    <div class="form-group checkbox">
                                                        <label class="no-padding-left">
                                                            <input type="checkbox" value="" class="ngayvechang">
                                                            <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                                            Gửi hóa đơn về địa chỉ khác
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12 col-xs-12">
                                                    <div class="form-group">
                                                        <label for="" class="fontf_arial form_title">Địa chỉ nhận hóa đơn</label>
                                                        <input type="text" class="form-control" placeholder="" name="companyadd">
                                                    </div>
                                                </div>
                                            </div>                                      
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="block-payment block-payment-item">
                                <div class="block-title">
                                    <span class="num">2</span>
                                    Phương thức thanh toán
                                </div>
                                <div class="block-content">
                                    <p>Để thuận tiện cho việc thanh toán khách vui lòng chọn 1 trong những hình thức thanh toán dưới đây</p>
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12 col-xs-12 go-right">
                                            <div class="form-group checkbox">
                                                <label class="no-padding-left">
                                                    <input type="checkbox" class="chuyenkhoan payment_method" data-id="1" value="banktransfer" name="checkout-type">
                                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok "></i></span>
                                                    Chuyển khoản
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12 col-xs-12 go-right">
                                            <div class="form-group checkbox">
                                                <label class="no-padding-left">
                                                    <input type="checkbox" class="chuyenkhoan payment_method" data-id="2" value="payatoffice" name="checkout-type">
                                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                                    Văn phòng HOSPI
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12 col-xs-12 go-right">
                                            <div class="form-group checkbox">
                                                <label class="no-padding-left">
                                                    <input type="checkbox" class="chuyenkhoan payment_method" data-id="3" value="cod" name="checkout-type">
                                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                                    Tại nhà
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-xs-12" id="showphuongthuc_1" style="display: none">
                                            <div class="form-group">
                                                Quý khách vui lòng chọn ngân hàng<br>
                                                <i>Lưu ý: Quý khách chỉ tích vào để lấy thông tin tài khoản từ HOSPI.vn. Việc tiến hành thanh toán chỉ sau khi được xác nhận bởi nhân viên qua email hoặc điện thoại.</i>
                                            </div>
                                            <input type="hidden" name="bank_id" id="bank_id">
                                            <div class="col-md-3 col-sm-12 col-xs-12 go-right no-padding-left no-margin-top-mobile">
                                                <div class="form-group checkbox">
                                                    <label class="no-padding-left">
                                                        <input class="choose_bank" type="checkbox" value="1" onchange="changeatm('viettinbank',1)">
                                                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                                        ViettinBank
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-12 col-xs-12 go-right no-padding-left no-margin-top-mobile">
                                                <div class="form-group checkbox">
                                                    <label class="no-padding-left">
                                                        <input class="choose_bank"  type="checkbox" value="2" onchange="changeatm('acb',2)">
                                                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                                        ACB
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-12 col-xs-12 go-right no-padding-left no-margin-top-mobile ">
                                                <div class="form-group checkbox">
                                                    <label class="no-padding-left">
                                                        <input class="choose_bank" type="checkbox" value="3" onchange="changeatm('vietcombank',3)">
                                                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                                        Vietcombank
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-12 col-xs-12 go-right no-padding-left no-margin-top-mobile ">
                                                <div class="form-group checkbox">
                                                    <label class="no-padding-left">
                                                        <input class="choose_bank"  type="checkbox" value="4" onchange="changeatm('mbbank',4)">
                                                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                                        MBBank
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-12 col-xs-12 go-right no-padding no-margin-top-mobile">
                                                <div class="form-group checkbox">
                                                    <label class="no-padding-left">
                                                        <input  class="choose_bank" type="checkbox" value="5" onchange="changeatm('sacombank',5)">
                                                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                                        Sacombank
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="col-sm-12 col-xs-12 no-padding conten-visa-card" id="show-atm-select" style="display: none">
                                                <div class="content-visa-item bank_1" style="display: none">
                                                    <div class="row">
                                                        <div class="col-sm-4 col-xs-12"></div>
                                                        <div class="col-sm-8 col-xs-12">
                                                            <div class=""><span>TMCP Công Thương Việt Nam - Vietinbank</span></div>
                                                            <div class=""><span>Chi nhánh: Quận 10, Tp.HCM</span></div>
                                                            <div class=""><span>Tên tài khoản: CÔNG TY TNHH HOSPI</span></div>
                                                            <div class=""><span>Số tài khoản: 111002667553 </span></div>
                                                        </div>                                                    
                                                    </div>
                                                </div>
                                                <div class="content-visa-item bank_1_bk" style="display: none">
                                                    <div class="row">
                                                        <div class="col-sm-4 col-xs-12"></div>
                                                        <div class="col-sm-8 col-xs-12">
                                                            <div class=""><span>Ngân hàng VCB (Vietcombank)</span></div>
                                                            <div class=""><span>Chi nhánh: Bến Thành,Tp Hồ Chí Minh</span></div>
                                                            <div class=""><span>Tên tài khoản: CÔNG TY TNHH HOSPI</span></div>
                                                            <div class=""><span>Số tài khoản: 0331000465230 </span></div>
                                                        </div>                                                    
                                                    </div>
                                                </div>
                                                <div class="content-visa-item bank_2" style="display: none">
                                                    <div class="row">
                                                        <div class="col-sm-4 col-xs-12"></div>
                                                        <div class="col-sm-8 col-xs-12">
                                                            <div class=""><span>Ngân hàng Á Châu (ACB)</span></div>
                                                            <div class=""><span>Chi nhánh:  Bến Thành, Tp. Hồ Chí Minh</span></div>
                                                            <div class=""><span>Tên tài khoản: Võ Đình Chi</span></div>
                                                            <div class=""><span>Số tài khoản: 227041599</span></div>
                                                        </div>                                                    
                                                    </div>
                                                </div>
                                                <div class="content-visa-item bank_3" style="display: none">
                                                    <div class="row">
                                                        <div class="col-sm-4 col-xs-12"></div>
                                                        <div class="col-sm-8 col-xs-12">
                                                            <div class=""><span>TMCP Ngoại Thương Việt Nam - Vietcombank</span></div>
                                                            <div class=""><span>Chi nhánh: Sài Gòn, Tp. HCM</span></div>
                                                            <div class=""><span>Tên tài khoản: VÕ ĐÌNH CHI</span></div>
                                                            <div class=""><span>Số tài khoản: 0331000443348</span></div>
                                                        </div>                                                    
                                                    </div>
                                                </div>
                                                <div class="content-visa-item bank_3_bk" style="display: none">
                                                    <div class="row">
                                                        <div class="col-sm-4 col-xs-12"></div>
                                                        <div class="col-sm-8 col-xs-12">
                                                            <div class=""><span>Ngân hàng Đông Á</span></div>
                                                            <div class=""><span>Chi nhánh: Sài Gòn, Tp. Hồ Chí Minh</span></div>
                                                            <div class=""><span>Tên tài khoản: Võ Đình Chi</span></div>
                                                            <div class=""><span>Số tài khoản: 0103812000</span></div>
                                                        </div>                                                    
                                                    </div>
                                                </div>
                                                <div class="content-visa-item bank_4" style="display: none">
                                                    <div class="row">
                                                        <div class="col-sm-4 col-xs-12"></div>
                                                        <div class="col-sm-8 col-xs-12">
                                                            <div class=""><span> Ngân hàng Quân Đội (MBBank)</span></div>
                                                            <div class=""><span>Chi nhánh:  Bến Thành, Tp. Hồ Chí Minh</span></div>
                                                            <div class=""><span>Tên tài khoản: Võ Đình Chi</span></div>
                                                            <div class=""><span>Số tài khoản: 1460103608001 </span></div>
                                                        </div>                                                    
                                                    </div>
                                                </div>
                                                <div class="content-visa-item bank_5" style="display: none">
                                                    <div class="row">
                                                        <div class="col-sm-4 col-xs-12"></div>
                                                        <div class="col-sm-8 col-xs-12">
                                                            <div class=""><span>Ngân hàng Sacombank (ACB)</span></div>
                                                            <div class=""><span>Chi nhánh: Bến Thành,Tp Hồ Chí Minh</span></div>
                                                            <div class=""><span>Tên tài khoản: Võ Đình Chi</span></div>
                                                            <div class=""><span>Số tài khoản: </span></div>
                                                        </div>                                                    
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="info-hoa-don" id="nganhangxuathoadon">
                                                    <div class="clss-xuat"><span class="cl-tim">Quý khách xuất hóa đơn, chuyển vào tài khoản này</span></div>
                                                    <div class="form-group checkbox">
                                                        <label class="no-padding-left">
                                                            <input class="choose_bank" type="checkbox" value="6">
                                                            <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                                            Vietcombank
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="content-visa-item-xuat-hoa-don" id="ngan-hanh-xuat-hoadon" >
                                                    <div class="row">
                                                        <div class="col-sm-4">

                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class=""><span>Ngân hàng TMCP Ngoại Thương Việt Nam - Vietcombank</span></div>
                                                            <div class=""><span>Chủ tài khoản: CÔNG TY TNHH DU LỊCH HOSPI</span></div>
                                                            <div class=""><span>Số tài khoản: 0331000465230</span></div>
                                                            <div class=""><span>Chi nhánh: Sài Gòn, Tp.HCM</span></div>                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-xs-12" id="showphuongthuc_2" style="display: none">
                                            <div class="conten-vanphong">
                                                <div class=""><span>Quý khách đã lựa chọn phương thức thanh toán tại văn phòng công ty HOSPI</span></div>
                                                <div class=""><span><strong>Địa chỉ văn phòng:</strong> Lầu 1 ,Số 124 Khánh Hội ,P.6,Quận 4,Tp.Hồ Chí Minh</span></div>
                                                <div class=""><span><strong>Thời gian làm việc:</strong> 8:00 sáng - 20:00 tối (thứ 2 - thứ 6)</span></div>
                                                <div class=""><span>8:00 sáng - 17:00 chiều (thứ 7 và Chủ Nhật)</span></div>
                                                <div class=""><span>Trước khi đến thanh toán. Quý khách vui lòng nhớ Mã Đặt Phòng hoặc số điện thoại</span></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-xs-12" id="showphuongthuc_3" style="display: none">
                                            <div class="conten-vanphong ">
                                                <div class=""><span>Quý khách đã lựa chọn phương thức thanh toán tại nhà.Hospi chỉ hỗ trợ thu tiền tại Tp.Hồ Chí Minh và mức thu phí được áp dụng</span></div>
                                                <div class=""><span>* Quận 1,Quận 3,Quận 4 ,Quận 5 thu phí 10.000 VND (miễn phí cho đơn phòng trên 5.000.000 VND)</span></div>
                                                <div class=""><span>* Quận 10,Quận 7,Quận 11 ,Quận Bình Thạnh,Quận Tân Bình,Phú Nhuận thu phí 20.000 VND (miễn phí cho đơn phòng trên 10.000.000 VND)</span></div>
                                                <div class=""><span>* Quận Tân Phú,Bình Tân,Quận 2 ,Quận Thủ Đức thu phí 50.000 VND (miễn phí cho đơn phòng trên 20.000.000 VND)</span></div>
                                                <div class=""><span>8:00 sáng - 20:00 tối (thứ 2 - thứ 6)</span></div>
                                                <div class=""><span>* Đối với các quận còn lại sẽ báo mức thu phí qua điện thoại mức giá tùy thuộc vào đơn phòng được gửi vào email của quý khách để tiện cho việc thanh toán dễ dàng</span></div>
                                                <div class="">
                                                    <div class="form-group checkbox">
                                                        <label class="no-padding-left">
                                                            <input type="checkbox" value="">
                                                            <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                                            <span class="cl-tim cl-bold">Nhập địa chỉ thu tiền</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="txtAddress">
                                                    </div>
                                                </div>
                                            </div>                                              
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <!-- class="col-sm-7 col-xs-12" -->

                    <!-- class="col-sm-5 col-xs-12" -->
                    <div class="col-sm-5 col-xs-12">
                        <div class="block-tab-order">
                            <ul class="nav nav-tabs nav-tabs-book">
                                <li class="active"><a data-toggle="tab" class="donphongduaban andes" href="#donphongcuaban">Thông tin chi tiết</a></li>
                                <li class="text-center pading-top-5-mobile margin-bottom-5-mobile"><a data-toggle="tab" class="dieukienhuy andes" href="#dieukienhuy">Điều kiện hủy</a></li>
                            </ul>                            
                            <div class="tab-content">
                                <div id="donphongcuaban" class="tab-pane fade in active">
                                    <div class="col-lg-12 col-xs-12 no-padding">
                                        <div class="col-lg-3 col-xs-4">
                                            <img src="<?php echo "https://www.hospi.vn/uploads/images/hotels/slider/thumbs/".$module->thumbnail_image; ?>" alt="<?php echo $module->hotel_title; ?>" width="108">
                                        </div>
                                        <div class="col-lg-9 col-xs-8 info-hotel">
                                            <h1 style="font-size: 16px;"><?php echo $module->hotel_title; ?></h1>
                                            <div class="no-padding">
                                                <i style="margin-left:-5px" class="icon-location-6"></i>
                                                <small class="adddress font-size-14"><?php echo $module->hotel_map_city; ?></small>
                                            </div>
                                            <div class="no-padding">
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
                                                    <!-- <i class="star text-warning fa fa-star voted"></i>
                                                    <i class="star text-warning fa fa-star voted"></i>
                                                    <i class="star text-warning fa fa-star voted"></i>
                                                    <i class="star text-warning fa fa-star voted"></i>
                                                    <i class="star text-warning fa fa-star voted"></i> -->
                                            </div>
                                        </div> 
                                        <div style="margin-bottom: 10px; clear: both"></div>                                       
                                        <div class="clearfix block-info-time-book">
                                            <div class="info-time-book">
                                                <div class="">
                                                    <span class="cl-black text-bold">Ngày nhận phòng</span>
                                                    <span>:</span>
                                                    <span class="cl-tim cl-bold"><?php echo $checkin; ?></span>
                                                </div>
                                                <div class="">
                                                    <span class="cl-black">Ngày trả phòng</span>
                                                    <span>:</span>
                                                    <span class=" cl-tim cl-bold"><?php echo $checkout; ?></span>
                                                </div>
                                                <div class="">
                                                    <span class="cl-black">Số đêm</span>
                                                    <span>:</span>
                                                    <span class="cl-tim cl-bold"><?php echo $stay; ?></span>
                                                </div>
                                            </div>
                                            <div class="info-people">
                                                <div class="">
                                                    <span class="cl-black">Người lớn</span>
                                                    <span>:</span>
                                                    <span class="cl-tim cl-bold"><?php echo $adults; ?></span>
                                                </div>
                                                <div class="">
                                                    <span class="cl-black">Trẻ em</span>
                                                    <span>:</span>
                                                    <span class="cl-tim cl-bold"><?php echo $child; ?></span>
                                                </div>
                                                <div class="">
                                                    <span class="cl-black">Số lượng</span>
                                                    <span>:</span>
                                                    <span class="cl-tim cl-bold"><?php echo $totalRooms; ?></span>
                                                </div>
                                                <div class="">
                                                    <span class="cl-black">Giường phụ</span>
                                                    <span>:</span>
                                                    <span class="cl-tim cl-bold"><?php echo (int) $extra_beds_decode[$roomId]; ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-xs-12 margin-top-10">
                                        <div class="block-requirement">
                                            <span>Yêu cầu giường:</span>
                                            <span class="cl-tim cl-bold"><?php echo $radiobeds ? $radiobeds : 1 ;?> giường</span>
                                        </div>
                                    </div>

                                    <input type="hidden" name="booking_extra_beds_request" value="<?php echo $radiobeds ? $radiobeds : 1 ;?>">
                                    <div class="col-lg-12 col-xs-12">
                                        <input type="hidden" name="room_price" value="<?php echo $priceChoose[$roomId]; ?>">
                                        <input type="hidden" name="bed_price" value="<?php echo $priceBedChoose[$roomId]; ?>">
                                        <div class="clss-content-book">
                                            <?php 
                                            $thanh_tien_phong = $priceChoose[$roomId]*$stay*$room_quantity_decode[$roomId];
                                            $thanh_tien_giuong = $priceBedChoose[$roomId]*$stay*$extra_beds_decode[$roomId];
                                            ?>
                                            <p class="cl-tim cl-bold">
                                                <?php 
                                                if($name_uudai[$roomId]){
                                                ?>
                                                <input type="hidden" name="price_type" value="<?php echo $name_uudai[$roomId]; ?>">
                                                <span><?php echo $name_uudai[$roomId]; ?></span><br>
                                                <?php }else{ ?>
                                                <input type="hidden" name="price_type" value="">
                                                <?php } ?>
                                                <span><?php echo $room[$roomId]->title; ?></span>

                                            </p>
                                            <p>
                                                <span><?php echo number_format($priceChoose[$roomId]); ?> x <?php echo $stay; ?> (đêm)
                                                    x <?php echo $room_quantity_decode[$roomId]; ?> (phòng)
                                                    = <?php echo number_format($priceChoose[$roomId]*$stay*$room_quantity_decode[$roomId]); ?> VND</span>
                                            </p>
                                            <?php 
                                            if((int) $extra_beds_decode[$roomId] > 0){
                                            ?>
                                            <p class="cl-tim">* Giường phụ</p>
                                            <p>
                                                <span><?php echo number_format($priceBedChoose[$roomId]); ?> x <?php echo $stay; ?> (đêm)
                                                    x <?php echo $extra_beds_decode[$roomId]; ?> (giường)
                                                    = <?php echo number_format($priceBedChoose[$roomId]*$stay*$extra_beds_decode[$roomId]); ?> VND</span>

                                            </p>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <input type="hidden" name="so_giuong_phu" value="<?php echo $extra_beds_decode[$roomId]; ?>">
                                    <input type="hidden" name="phi_giuong_phu" value="<?php echo $priceBedChoose[$roomId]*$stay*$extra_beds_decode[$roomId]; ?>">
                                    <div class="col-lg-12 col-xs-12">
                                        <div class="content-item-text clearfix">
                                            <div class="col-lg-12 col-xs-12 no-padding">
                                                <div class="col-lg-6 col-xs-6 text-left"><span>Tiền phòng</span></div>
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
                                            <div class="col-lg-12 col-xs-12 no-padding">
                                                <div class="col-lg-6 col-xs-6 text-left"><span>Phí VAT</span></div>
                                                <div class="col-lg-6 col-xs-6 text-right"><span><?php echo number_format($phi_vat); ?>  VND</span></div>
                                                <input type="hidden" name="phi_vat" value="<?php echo $phi_vat; ?>">
                                            </div>
                                            <div class="col-lg-12 col-xs-12 no-padding">
                                                <div class="col-lg-6 col-xs-6 text-left"><span>Phí dịch vụ</span></div>
                                                <div class="col-lg-6 col-xs-6 text-right"><span><?php echo number_format($phi_dich_vu); ?> VND</span></div>
                                                <input type="hidden" name="phi_dich_vu" value="<?php echo $phi_dich_vu; ?>">
                                            </div>
                                            <div class="col-lg-12 col-xs-12 no-padding">
                                                <div class="col-lg-6 col-xs-6 text-left"><span>Chi phí khác</span></div>
                                                <div class="col-lg-6 col-xs-6 text-right"><span>0 VND</span></div>
                                            </div>
                                            <div class="col-lg-12 col-xs-12 no-padding">
                                                <div class="col-lg-6 col-xs-6 text-left "><span>Tổng tiền</span></div>
                                                <div class="col-lg-6 col-xs-6 text-right"><span><b><?php echo number_format($thanh_tien_giuong + $thanh_tien_phong + $phi_vat + $phi_dich_vu); ?> VND</b></span></div>
                                                <input type="hidden" name="tong_chua_giam" id="tong_chua_giam"   value="<?php echo $thanh_tien_giuong + $thanh_tien_phong + $phi_vat + $phi_dich_vu; ?>">                                               
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-xs-12 padding-top-10">
                                        <div class="content-giam-gia">
                                            <div class="clearfix">
                                                <p class="cl-tim">Bạn có mã giảm giá ?</p>
                                                <div class="block-btn-inline">
                                                    <div class="form-group clearfix">
                                                        <input type="text" class="form-control coupon" placeholder="Mã giảm giá" name="coupon_code">
                                                        <button type="button" class="form-control button-tim applycoupon andes">Áp dụng</button>
                                                    </div>
                                                </div>
                                                <!-- <p class="cl-grey block-couponmsg">
                                                    Mã giảm giá <strong>01728</strong> đã được áp dụng<br>Bạn đã được giảm được 300,000 VND /tổng booking
                                                </p> -->
                                                <!-- <div class="block-discount row">
                                                    <div class="col-sm-6 col-xs-6 text-left cl-tim cl-bold"><span>Giảm giá </span></div>
                                                    <div class="col-lg-6 col-xs-6 text-right"><span  id="giam_gia_span" ><b>0 VND</b></span></div>
                                                    <input type="hidden" name="giam_gia" value="0" id="giam_gia">
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-xs-12 no-padding cl-tim clss-tongthanhtoan">
                                        <div class="col-lg-6 col-xs-6 text-left "><span style="font-weight: bold;">Tổng thanh toán </span></div>
                                        <div class="col-lg-6 col-xs-6 text-right"><span id="tong_thanh_toan_span"><b><?php echo number_format($thanh_tien_phong + $thanh_tien_giuong); ?> VND</b></span></div>
                                        <input type="hidden" name="tong_thanh_toan" id="tong_thanh_toan" value="<?php echo($thanh_tien_giuong + $thanh_tien_phong); ?>">
                                    </div>
                                    <!-- <div class="col-lg-12 col-xs-12 no-padding cl-grey clss-dathanhtoan">
                                        <div class="col-lg-6 col-xs-6 text-left "><span>Đã thanh toán</span></div>
                                        <div class="col-lg-6 col-xs-6 text-right"><span id="tong_thanh_toan_span"><b>0 VND</b></span></div>
                                        <input type="hidden" name="da_thanh_oan" id="da_thanh_oan" value="0">
                                    </div>
                                    <div class="col-lg-12 col-xs-12 no-padding cl-tim clss-conlai">
                                        <div class="col-lg-6 col-xs-6 text-left"><span class="cl-bold">Còn lại</span></div>
                                        <div class="col-lg-6 col-xs-6 text-right"><span id="tong_thanh_toan_span"><b>5,483,000 VND</b></span></div>
                                        <input type="hidden" name="con_lai" id="con_lai" value="0">
                                    </div> -->
                                    <div class="col-lg-12 col-xs-12 no-padding cl-grey clss-finish">
                                        <div class="col-lg-12 col-xs-12 text-left ">
                                            <span>Tôi đã đọc và chấp nhận <span class="cl-tim cl-bold">điều khoản và chính sách của khách sạn</span> và <span class="cl-tim cl-bold">điều khoản và chính sách bảo mật</span> của HOSPI </span>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-xs-12 no-padding">
                                        <button class="button-tim completebook" type ="submit" name="<?php if (empty($usersession)) {
                                        echo "guest";
                                        } else {
                                        echo "logged";
                                        } ?>" onclick="return completebook('<?php echo base_url(); ?>','<?php echo trans('0159') ?>');">Hoàn thành</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div id="dieukienhuy" class="tab-pane fade">
                                    <div class="clearfix">
                                        <div class="col-lg-12 col-xs-12 cotent-huyphong no-padding">
                                            <?php echo nl2br($module->hotel_policy); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- class="col-sm-5 col-xs-12" -->
                    <input type="hidden" name="country" value="VN" id="country">
                    <input type="hidden" id="itemid" name="itemid" value="<?php echo $module->hotel_id; ?>">
                    <input type="hidden" name="checkout" value="<?php echo date('d/m/Y', strtotime($checkout));?>">
                    <input type="hidden" name="adults" value="<?php echo $adults; ?>">
                    <input type="hidden" name="child" value="<?php echo $child; ?>">
                    <input type="hidden" name="nights" value="<?php echo $stay; ?>">
                    <input type="hidden" id="couponid" name="couponid" value="">
                    <input type="hidden" id="btype" name="btype" value="hotels">
                    <input type="hidden" name="subitemid" value="<?php echo json_encode(array($roomId));?>">
                    <input type="hidden" name="roomscount" value='<?php echo $room_quantity; ?>'>
                    <input type="hidden" name="bedscount" value='<?php echo $extra_beds; ?>'>
                    <input type="hidden" name="checkin" value="<?php echo date('d/m/Y', strtotime($checkin));?>">
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
$(function(){
        $('input.choose_bank').click(function(){
            var obj = $(this);
            if(obj.prop('checked') == true){
                    $('input.choose_bank').prop('checked', false);
                    obj.prop('checked', true);
                $('#bank_id').val(obj.val());
            }else{
                    $('input.choose_bank').prop('checked', false);
                    $('#bank_id').val('');
            }
        });
});
</script>