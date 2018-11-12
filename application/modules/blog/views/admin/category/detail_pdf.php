<!-- content-->

<div class="container-fulid clss-header-invoice">
	<div class="container">
		<div class="col-lg-12 col-xs-12" style="font-weight: 600;">
			<div class="col-lg-4 col-xs-12">Mã Voucher : <span class="cl-tim"><?php echo $code ?></span></div>
			<div class="col-lg-4 col-xs-12">Tình trạng :
				<span class="cl-tim"><?php echo $list_payment_status[$payment_status] ?></span></div>
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
							<li class="active"><a data-toggle="tab" class="thongtinbooking" href="#home" style="font-weight: 600;width: 161px;">Thông tin khách hàng</a></li>

						</ul>
						<div class="tab-content">
							<div id="home" class="tab-pane fade in active">
								<div class="col-lg-12 col-xs-12 no-padding">
									<div class="col-lg-4 col-xs-12 no-padding">
										<div class="form-group">
											<label class="control-label font-weight-unset">Họ tên của bạn</label>
											<div>
												<label><?php echo $v_name; ?></label>
											</div>

										</div>
									</div>
									<div class="col-lg-4 col-xs-12 no-padding-left-mobile no-padding-right-mobile">
										<div class="form-group">
											<label class="control-label font-weight-unset">Email</label>
											<div>
												<label><?php echo $email; ?></label>
											</div>


										</div>
									</div>
									<div class="col-lg-4 col-xs-12 no-padding-left-mobile no-padding-right-mobile">
										<div class="form-group">
											<label class="control-label font-weight-unset">Số điện thoại</label>
											<div>
												<label><?php echo $phone; ?></label>
											</div>


										</div>
									</div>
									<div class="col-lg-12 col-xs-12 no-padding">
										<div class="form-group">
											<label class="control-label font-weight-unset">Địa chỉ</label>
											<div>
												<label><?php echo $address; ?></label>
											</div>


										</div>
									</div>
									<div class="col-lg-12 col-xs-12 no-padding">
										<div class="form-group">
											<label class="control-label font-weight-unset">Yêu cầu khác</label>
											<div>
												<label><?= $extra_info ?></label>
											</div>

										</div>
									</div>

								</div>


							</div>

							<!--phuong thuc thanh toan-->
							<ul class="nav nav-tabs nav-tabs-book">
								<li class="active">
									<a data-toggle="tab" class="phuongthucaaa" href="#baogom" style="font-weight: 600;width: 70px;">Bao
										gồm</a></li>

							</ul>
							<div class="tab-content">
								<div id="baogom" class="tab-pane fade in active">
									<div class="col-lg-12 col-xs-12 no-padding">
										<div class="form-group">
											<?= str_replace("\n", "<br/>",$info) ?>
										</div>
									</div>
								</div>
							</div>
							<!--ghi chu -->
							<ul class="nav nav-tabs nav-tabs-book">
								<li class="active">
									<a data-toggle="tab" class="ghichuaaa" href="#thongtinkhac" style="font-weight: 600;width: 110px;">Thông
										tin khác</a>
								</li>

							</ul>
							<div class="tab-content">
								<div id="thongtinkhac" class="tab-pane fade in active">
									<div class="col-lg-12 col-xs-12 no-padding">
										<div class="form-group">
											<?= str_replace("\n", "<br/>",$extra_info) ?>
										</div>
									</div>
								</div>
							</div>
							<!--luu y -->
							<ul class="nav nav-tabs nav-tabs-book">
								<li class="active"><a data-toggle="tab" class="luyaaa" href="#luyaaa" style="font-weight: 600;width: 50px;">Lưu ý</a></li>

							</ul>
							<div class="tab-content">
								<div id="luyaaa" class="tab-pane fade in active">
									<div class="col-lg-12 col-xs-12 no-padding">
										<div class="form-group">
											<?= str_replace("\n", "<br/>",$attentive) ?>
										</div>
									</div>
								</div>
							</div>
						</div>

					</div>
					<div class="col-sm-5 col-xs-12">
						<ul class="nav nav-tabs nav-tabs-book nav-tabs-book-combox">
							<li class="active"><a data-toggle="tab" class="donphongduaban" href="#donphongcuaban" style="font-weight: 600;width: 89px;">Đơn
									phòng</a></li>

						</ul>
						<div class="tab-content">
							<div id="donphongcuaban" class="tab-pane fade in active">
								<div class="col-lg-12 col-xs-12 no-padding">
									<div class="col-lg-3 col-xs-4 no-padding-left">
										<img src="<?php echo PT_OFFERS_IMAGES . $hotel_detail->thumbnail_image; ?>"
										     alt="<?php echo $hotel_detail->hotel_title; ?>" width="108">
									</div>
									<div class="col-lg-9 col-xs-8 info-hotel no-padding-right-mobile">
										<h1><?php echo $hotel_detail->hotel_title; ?></h1>
										<div class="col-lg-12 col-xs-12 no-padding">
											<i style="margin-left:-5px" class="icon-location-6"></i>
											<small class="adddress font-size-14"><?= $hotel_detail->hotel_map_address?>
											</small>
										</div>
										<div class="col-lg-12 col-xs-12 no-padding">
											<i class='star text-warning fa fa-star voted'></i>
											<i class='star text-warning fa fa-star voted'></i>
											<i class='star text-warning fa fa-star voted'></i>
											<i class='star text-warning fa fa-star voted'></i>
											<i class='star text-warning fa fa-star voted'></i>
										</div>
									</div>
									<div class="clearfix"></div>
									<div class="content-checkout info-time-book">
										<div class="col-lg-12 col-xs-12">
											<div class="col-lg-7 col-xs-7 cl-grey no-padding-left">Ngày nhận phòng:
											</div>
											<div class="col-lg-5 col-xs-5 cl-tim no-padding-left" style="font-size: 12px;"><?php echo str_replace("-","/",$start_date) ?> </div>
										</div>
										<div class="col-lg-12 col-xs-12">
											<div class="col-lg-7 col-xs-7 cl-grey no-padding-left">Ngày trả phòng:</div>
											<div class=" col-lg-5 col-xs-5 cl-tim no-padding-left" style="font-size: 12px;"><?php echo str_replace("-","/",$end_date); ?></div>
										</div>
										<div class="col-lg-12 col-xs-12">
											<div class="col-lg-7 col-xs-7 cl-grey no-padding-left">Số đêm:</div>
											<div class="col-lg-5 col-xs-5 cl-tim no-padding-left"><?php  echo $count_night; ?></div>
										</div>
									</div>
									<div class="no-padding info-people">
										<div class="col-lg-12 col-xs-12">
											<div class="col-lg-8 col-xs-7 cl-grey no-padding-left">Người lớn:</div>
											<div class="col-lg-4 col-xs-5 cl-tim no-padding-left"><?php echo $adults; ?> </div>
										</div>
										<div class="col-lg-12 col-xs-12">
											<div class="col-lg-8 col-xs-7 cl-grey no-padding-left">Trẻ em:</div>
											<div class="col-lg-4 col-xs-5 cl-tim no-padding-left"><?php echo $childs; ?></div>
										</div>
										<div class="col-lg-12 col-xs-12">
											<div class="col-lg-8 col-xs-7 cl-grey no-padding-left">Số lượng phòng:</div>
											<div class="col-lg-4 col-xs-5 cl-tim no-padding-left"><?= count($list_room) ?></div>
										</div>
										<div class="col-lg-12 col-xs-12">
											<div class="col-lg-8 col-xs-7 cl-grey no-padding-left">Giường phụ:</div>
											<div class="col-lg-4 col-xs-5 cl-tim no-padding-left"> <?php echo $extra_beds; ?></div>
										</div>
									</div>
								</div>
								<div class="col-lg-12 col-xs-12 no-padding clss-content-book margin-top-30">
									<?php
									if ($list_room != null) {
										foreach ($list_room as $room_item) {
											$id_room = $room_item->room_id;
											$quantity = $room_item->quantity;
											?>
											<div class="col-md-12 col-xs-12" style="padding-left: 5px;padding-top: 7px;">
												<label for="select-standard" style="font-size: 12px;" class="control-label col-md-3 font-weight-unset col-xs-12 no-padding padding-left-mobile-15">Loại
													phòng</label>
												<div class="col-md-9 col-xs-12" style="padding-right: 0px">
													<label class="cl-tim" style="font-size: 12px;padding-left: 0px;"><b><?= $rooms[$id_room]; ?></b></label><label class="font-weight-unset" style="font-size: 11px">(<?= $quantity ?>
														)</label>
												</div>
											</div>
											<?php
										}
									}
									?>
								</div>
								<div class="col-lg-12 col-xs-12 no-padding clss-content-book margin-top-10">
									<div class="col-md-12 col-xs-12 " style="padding-left: 0px;padding-left: 5px; padding-top: 7px;">
										<label for="select-standard" style="font-size: 12px;" class="control-label col-md-4 font-weight-unset col-xs-12 no-padding padding-left-mobile-15">Yêu
											cầu giường</label>
										<div class="col-md-8 col-xs-12" style="padding-right: 0px">
											<label class="cl-tim" style="font-size: 12px;padding-left: 0px;"><b><?= $beds ?></b></label>

										</div>
									</div>
								</div>
								<!--Dieu kien hủy-->
								<ul class="nav nav-tabs nav-tabs-book nav-tabs-book-combox margin-top-10">
									<li class="active margin-top-10"><a data-toggle="tab" class="dieukienhuy" href="#dieukienhuy" style="font-weight: 600;width: 116px;">Điều
											kiện
											hủy</a></li>
								</ul>
								<div class="tab-content">
									<div id="dieukienhuy" class="tab-pane fade in active">
										<div class="col-lg-12 col-xs-12  no-padding">
											<?= str_replace("\n", "<br/>",$cancel_condition) ?>
										</div>
									</div>
								</div>
								<div class="clearfix"></div>
								<!--Dieu kien su dung -->
								<ul class="nav nav-tabs nav-tabs-book nav-tabs-book-combox margin-top-10">
									<li class="active">
										<a data-toggle="tab" class="dieukiensudung" href="#dieukiensudung" style="font-weight: 600;width: 79px;">Hỗ trợ</a>
									</li>
								</ul>
								<div class="tab-content">
									<div id="dieukiensudung" class="tab-pane fade in active">
										<div class="col-lg-12 col-xs-12  no-padding">
											<div class="col-md-12 no-padding">
												<p>Nếu quý khách cần hỗ trợ từ nhân viên HOSPI,Vui lòng gọi</p>
											</div>
											<div class="col-md-12 no-padding col-xs-12">
												<p>(028) 3826 8797 booking@hospi.vn 096 868 0106</p>
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