<div class="container" id="content">
	<!-- content-->
	<div class="col-md-12 col-xs-12" style="background: white;padding-bottom: 20px;">
		<div class="col-md-12">
			<div class="col-md-6 col-xs-12" style="padding-top: 20px">
				<img src="/assets/img/hospi-logo.png" class="img-responsive padding-left-38-mobile">
			</div>
			<div class="col-md-6 col-xs-12 text-right">
				<div class="col-md-6 col-xs-12">

				</div>
				<div class="col-md-6 col-xs-12" style="padding-top: 30px">
					<img src="/assets/img/logo-voucher-hotel.png" class="img-responsive margin-left-37 no-margin-left-mobile">
					<span style="color: #ccc">Phiếu xác nhận đặt phòng</span>
					<span style="color: #ccc"><?= $create_date ?></span>
				</div>

			</div>
		</div>


	</div>
	<div class="col-md-12 col-xs-12" style="background: #e5e5e5;z-index: 99">
		<div class="col-md-4 col-xs-12">
			<div class="form-group" style="margin-bottom: 5px;margin-top: 8px;">
				<label for="select-standard" class="control-label">Mã Voucher:
					<span class="cl-tim"><?= $code ?></span></label>


			</div>
		</div>
		<div class="col-md-4 col-xs-12">
			<div class="form-group" style="margin-bottom: 5px;margin-top: 8px;">
				<label for="select-standard" class="control-label">Tình trạng:
					<span class="cl-tim"><?= $list_payment_status[$payment_status] ?></span></label>


			</div>
		</div>
		<div class="col-md-2 col-xs-6">
			<div class="form-group" style="margin-bottom: 5px;margin-top: 8px;">
				<label for="select-standard" class="control-label font-weight-unset"><u>In voucher</u></label>


			</div>
		</div>
		<div class="col-md-2 col-xs-6">
			<div class="form-group" style="margin-bottom: 5px;margin-top: 8px;">
				<label for="select-standard" class="control-label font-weight-unset"><u>Tải PDF</u></label>


			</div>
		</div>
	</div>
	<div class="panel panel-default col-md-8 col-xs-12 padding-right-45 no-padding-right-mobile no-padding-left-mobile" style="z-index: 99">
		<ul class="nav nav-tabs nav-justified" role="tablist">
			<li class="active ">
				<a href="#GENERAL" class="text-left clssthongtinkhachhang" data-toggle="tab" aria-expanded="true">Thông
					tin khách hàng</a></li>
			<li class="hidden-xs"><a href="#" class="text-left" data-toggle="tab" aria-expanded="true"></a></li>
			<li class="hidden-xs"><a href="#" class="text-left" data-toggle="tab" aria-expanded="true"></a></li>
			<li class="hidden-xs"><a href="#" class="text-left" data-toggle="tab" aria-expanded="true"></a></li>
		</ul>
		<div class="panel-body">
			<div class="tab-content ">
				<div class="tab-pane wow fadeIn animated active" id="GENERAL">
					<div class="row">
						<div>
							<div class="col-md-12 col-xs-12 no-padding">
								<div class="panel panel-default" style="margin-bottom: 0px;margin-top: -35px">

									<div class="panel-body no-padding" style="padding-top: 15px;padding-bottom: 0px">

										<form role="form">


											<div class="col-md-4 no-padding padding-left-mobile-15 col-xs-12">
												<div class="form-group ">
													<label for="select-standard" class="control-label font-weight-unset">Họ
														tên của bạn</label>
													<div>
														<label><?= $name ?></label>
													</div>
												</div>

											</div>
											<div class="col-md-4 col-xs-12">
												<div class="form-group ">
													<label for="select-standard" class="control-label font-weight-unset">Email</label>
													<div>
														<label><?= $email ?></label>
													</div>
												</div>

											</div>

											<div class="col-md-4 col-xs-12">
												<div class="form-group ">
													<label for="select-standard" class="control-label font-weight-unset">Số
														điện thoại</label>
													<div>
														<label><?= $phone ?></label>
													</div>
												</div>

											</div>

											<div class="clearfix"></div>
											<div class="col-md-12 no-padding padding-left-mobile-15 col-xs-12">
												<div class="form-group ">
													<label for="select-standard" class="control-label font-weight-unset">Địa
														chỉ</label>
													<div>
														<label><?= $address ?></label>
													</div>
												</div>
												<div class="form-group ">
													<label for="select-standard" class="control-label font-weight-unset">Yêu
														cầu khác</label>
													<div>
														<label><?= $notes ?></label>
													</div>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
						<!-- end-->

					</div>

				</div>


			</div>
		</div>

		<ul class="nav nav-tabs nav-justified nav-no-border" role="tablist" style="    margin-top: -38px;">
			<li class="active padding-left-mobile-15">
				<a href="#GENERAL" class="text-left clssghichu" data-toggle="tab" aria-expanded="true">Ghi chú</a>
			</li>
			<li class="hidden-xs"><a href="#" class="text-left" data-toggle="tab" aria-expanded="true"></a></li>
			<li class="hidden-xs"><a href="#" class="text-left" data-toggle="tab" aria-expanded="true"></a></li>
			<li class="hidden-xs"><a href="#" class="text-left" data-toggle="tab" aria-expanded="true"></a></li>
		</ul>
		<div class="panel-body" style="padding-bottom: 0px;">
			<div class="tab-content ">
				<div class="tab-pane wow fadeIn animated active" id="GENERAL">
				</div>


			</div>
		</div>

		<ul class="nav nav-tabs nav-justified nav-no-border" role="tablist">
			<li class="active padding-left-mobile-15">
				<a href="#GENERAL" class="text-left clssbaogom" data-toggle="tab" aria-expanded="true">Bao Gồm</a>
			</li>
			<li class="hidden-xs"><a href="#" class="text-left" data-toggle="tab" aria-expanded="true"></a></li>
			<li class="hidden-xs"><a href="#" class="text-left" data-toggle="tab" aria-expanded="true"></a></li>
			<li class="hidden-xs"><a href="#" class="text-left" data-toggle="tab" aria-expanded="true"></a></li>
		</ul>
		<div class="panel-body no-padding" style="padding-top: 0px;padding-bottom: 0px">
			<div class="tab-content ">
				<div class="tab-pane wow fadeIn animated active" id="GENERAL">

					<div class="col-md-12 no-padding margin-top-10 col-xs-12">
						<div class="form-group ">
							<label for="select-standard" class="control-label font-weight-unset"></label>
							<div class="col-md-12 no-padding col-xs-12 padding-left-mobile-15">
								<?= $txt_info ?>
							</div>

						</div>
					</div>
				</div>


			</div>
		</div>


		<ul class="nav nav-tabs nav-justified nav-no-border" role="tablist">
			<li class="active padding-left-mobile-15">
				<a href="#GENERAL" class="text-left clssthongtinhkhac" data-toggle="tab" aria-expanded="true">Thông
					tin khác</a></li>
			<li class="hidden-xs"><a href="#" class="text-left" data-toggle="tab" aria-expanded="true"></a></li>
			<li class="hidden-xs"><a href="#" class="text-left" data-toggle="tab" aria-expanded="true"></a></li>
			<li class="hidden-xs"><a href="#" class="text-left" data-toggle="tab" aria-expanded="true"></a></li>
		</ul>
		<div class="panel-body no-padding" style="padding-top: 0px;padding-bottom: 0px">
			<div class="tab-content ">
				<div class="tab-pane wow fadeIn animated active" id="GENERAL">

					<div class="col-md-12 no-padding margin-top-10 col-xs-12">
						<div class="form-group ">
							<label for="select-standard" class="control-label font-weight-unset"></label>
							<div class="col-md-12 no-padding col-xs-12 padding-left-mobile-15">
								<p><?= $extra_info ?></p>
							</div>

						</div>
					</div>
				</div>


			</div>
		</div>

		<ul class="nav nav-tabs nav-justified nav-no-border hidden-xs" role="tablist">
			<li class="active padding-left-mobile-15">
				<a href="#GENERAL" class="text-left clssluy" data-toggle="tab" aria-expanded="true">Lưu ý</a></li>
			<li class="hidden-xs"><a href="#" class="text-left" data-toggle="tab" aria-expanded="true"></a></li>
			<li class="hidden-xs"><a href="#" class="text-left" data-toggle="tab" aria-expanded="true"></a></li>
			<li class="hidden-xs"><a href="#" class="text-left" data-toggle="tab" aria-expanded="true"></a></li>
		</ul>
		<div class="panel-body no-padding hidden-xs" style="padding-top: 0px;padding-bottom: 0px">
			<div class="tab-content ">
				<div class="tab-pane wow fadeIn animated active" id="GENERAL">
					<?= $txt_attentive ?>
				</div>


			</div>
		</div>


	</div>
	<div class="col-md-4 col-xs-12" style="padding-left: 0px;padding-right: 0px;background: white;padding-top: 20px;z-index: 99">
		<div class="col-md-12 col-xs-12 no-padding padding-left-mobile-15">
			<div class="col-md-6 col-xs-12 no-padding" style="color: #660033;border-bottom: 2px solid #660033;width: 128px;">
				Thông tin khách sạn
			</div>
			<div class="col-md-6 col-xs-12 hidden-xs" style="border-bottom: 1px solid #ccc;padding-left: 0px;padding-right: 0px">
				&nbsp;
			</div>
		</div>
		<div class="col-md-12 margin-top-10 col-xs-12" style="padding-left: 0px;padding-right: 0px">
			<div class="col-md-3 col-xs-12 no-padding padding-left-mobile-15 img-mobile-voucher">
				<img src="/assets/img/5.png" class="img-responsive">
			</div>
			<div class="col-md-9 col-xs-12 margin-top-10-mobile">
				<div><span>Six Senses Côn Đảo Resort</span></div>
				<div><i class="fa fa-map-marker " aria-hidden="true"></i><span> Biến Đất Dốc, Côn Đảo</span></div>
				<div><i class="fa fa-star cl-tim" aria-hidden="true"></i>
					<i class="fa fa-star cl-tim" aria-hidden="true"></i>
					<i class="fa fa-star cl-tim" aria-hidden="true"></i>
					<i class="fa fa-star cl-tim" aria-hidden="true"></i>
					<i class="fa fa-star cl-tim" aria-hidden="true"></i></div>

			</div>
			<div class="col-md-12 col-xs-12 no-padding-left no-padding-right-mobile">
				<div class="col-md-7 col-xs-12 no-padding-left border-right-1 padding-left-mobile-15" style="border: 1px solid #ccc;margin-top: 10px;    height: 102px;">
					<form class="form-horizontal">
						<div class="form-group " style="margin-bottom: 0px;">
							<label for="select-standard " style="font-size: 12px" class="control-label col-md-7 font-weight-unset col-xs-7 margin-top-10-mobile">Ngày
								nhận phòng</label>
							<div class="col-md-5 col-xs-5" style="padding-left: 0px">
								<label class="cl-tim"><?= $start_date ?></label>
							</div>

						</div>
						<div class="form-group " style="margin-bottom: 0px;">
							<label for="select-standard" style="font-size: 12px" class="control-label col-md-7 font-weight-unset col-xs-7">Ngày
								trả phòng</label>
							<div class="col-md-5 col-xs-5" style="padding-left: 0px">
								<label class="cl-tim"><?= $end_date ?></label>
							</div>

						</div>
						<div class="form-group " style="margin-bottom: 0px;">
							<label for="select-standard" style="font-size: 12px" class="control-label col-md-7 font-weight-unset col-xs-7">Số
								đêm</label>
							<div class="col-md-5 col-xs-5" style="padding-left: 0px">
								<label class="cl-tim">01</label>
							</div>

						</div>
					</form>
				</div>
				<div class="col-md-5 col-xs-12" style="border: 1px solid #ccc;margin-top: 10px">
					<form class="form-horizontal">
						<div class="margin-bottom-none margin-top-10-mobile">
							<label for="select-standard" style="font-size: 12px" class="control-label col-md-9 font-weight-unset col-xs-7  padding-right-mobile-15 no-padding-right">Người
								lớn</label>
							<div class="col-md-3 col-xs-5 no-padding-left-mobile">
								<label class="cl-tim"> <?= $adults ?></label>
							</div>

						</div>
						<div class="margin-bottom-none">
							<label for="select-standard" style="font-size: 12px" class="control-label col-md-9 font-weight-unset col-xs-7  padding-right-mobile-15 no-padding-right">Trẻ
								em</label>
							<div class="col-md-3 col-xs-5 no-padding-left-mobile">
								<label class="cl-tim"> <?= $childs ?></label>
							</div>

						</div>
						<div class="margin-bottom-none">
							<label for="select-standard" style="font-size: 12px" class="control-label col-md-9 font-weight-unset col-xs-7 padding-right-mobile-15 no-padding-right">Số
								lượng phòng</label>
							<div class="col-md-3 col-xs-5 no-padding-left-mobile">
								<label class="cl-tim"><?= count($list_room) ?></label>
							</div>

						</div>
						<div class="margin-bottom-none">
							<label for="select-standard padding-right-mobile-15 no-padding-right" style="font-size: 12px" class="control-label col-md-9 font-weight-unset col-xs-7">Giường
								phụ</label>
							<div class="col-md-3 col-xs-5 no-padding-left-mobile">
								<label class="cl-tim"><?= $extra_beds ?></label>
							</div>

						</div>
					</form>
				</div>
			</div>
			<div class="col-md-12 col-xs-12 no-padding-right-mobile" style="padding-left: 0px; margin-top: 10px; margin-bottom: 10px;">

				<?php
				if ($list_room != null) {
					foreach ($list_room as $room_item) {
						$id_room = $room_item->room_id;
						$quantity = $room_item->quantity;
						?>
						<div class="col-md-12 col-xs-12" style="padding-left: 5px; border: 1px solid #ccc;padding-top: 7px;">
							<label for="select-standard" style="font-size: 12px;" class="control-label col-md-3 font-weight-unset col-xs-12 no-padding padding-left-mobile-15">Loại
								phòng</label>
							<div class="col-md-9 col-xs-12" style="padding-right: 0px">
								<label class="cl-tim" style="font-size: 12px;padding-left: 0px;"><b><?= $rooms[$id_room]; ?></b></label><label class="font-weight-unset" style="font-size: 11px">(<?= $quantity ?>
									)</label>
								<!--<label class="cl-tim" style="font-size: 12px;padding-left: 0px;"><b>Ocean View</b></label>
								<label class="font-weight-unset" style="font-size: 11px">(01)</label>-->
							</div>
						</div>
						<?php
					}
				}
				?>
			</div>
			<div class="col-md-12 col-xs-12 no-padding-right-mobile" style="padding-left: 0px; margin-top: 10px; margin-bottom: 10px;">
				<div class="col-md-12 col-xs-12 " style="padding-left: 0px;padding-left: 5px; border: 1px solid #ccc;padding-top: 7px;">
					<label for="select-standard" style="font-size: 12px;" class="control-label col-md-4 font-weight-unset col-xs-12 no-padding padding-left-mobile-15">Yêu
						cầu giường</label>
					<div class="col-md-8 col-xs-12" style="padding-right: 0px">
						<label class="cl-tim" style="font-size: 12px;padding-left: 0px;"><b><?= $beds ?> Giường yêu
								cầu</b></label>
						<!--<label class="cl-tim" style="font-size: 12px;padding-left: 0px;"><b>02 giường
								nhỏ</b></label>-->

					</div>
				</div>
			</div>
		</div>
	</div>

	<!--ep 3 -->
	<div class="col-md-4 col-xs-12" style="padding-left: 0px;padding-right: 0px;background: white;z-index: 99">
		<div class="col-md-12 col-xs-12 no-padding padding-left-mobile-15">
			<div class="col-md-4 col-xs-12  width-90 width-100-mobile no-padding" style="color: #660033;border-bottom: 2px solid #660033">
				Điều kiện hủy
			</div>
			<div class="col-md-8 col-xs-12 no-padding hidden-xs" style="border-bottom: 1px solid #ccc;">&nbsp;</div>
		</div>
		<div class="col-md-12 margin-top-10 no-padding col-xs-12 no-padding">
			<div class="form-group">
				<label class=" control-label font-weight-unset"></label>
				<div class="col-lg-12 no-padding padding-left-mobile-15">
					<p>+ Hủy phòng trước 24 ngày trước ngày khách đến (trừ thứ bảy, chủ nhật và Lễ ,Tết) không tính
						phí.</p>
					<p>
						+ Hủy phòng trước 23 ngày đến 13 ngày trước ngày khách đến (trừ thứ bảy, chủ nhật và Lễ
						,Tết) tính 50% tổng tiền phòng.
					</p>
					<p>
						+ Hủy phòng trong vòng 12 ngày trước ngày khách đến (trừ thứ bảy, chủ nhật và Lễ ,Tết) tính
						100% tổng tiền phòng.
					</p>
					<p>
						+ Các booking ngày lễ ,Tết không hủy,không đổi,không hoàn.
					</p>

				</div>

			</div>
		</div>
	</div>


	<!-- -->

	<!-- ep 2-->
	<div class="col-md-4 col-xs-12 no-padding padding-left-mobile-15 padding-bottom-210 no-padding-bottom-mobile" style="background: white;">
		<div class="col-md-12 col-xs-12" style="padding-left: 0px;padding-right: 0px">
			<div class="col-md-4 col-xs-12  width-45 width-100-mobile" style="color: #660033;border-bottom: 2px solid #660033;padding-left: 0px;
    padding-right: 0px;">Hỗ trợ
			</div>
			<div class="col-md-8 col-xs-12 hidden-xs" style="border-bottom: 1px solid #ccc;padding-left: 0px;padding-right: 0px">
				&nbsp;
			</div>
		</div>
		<div class="col-md-12 col-xs-12" style="padding-left: 0px;padding-right: 0px;padding-top: 15px;">
			<div class="col-md-12 no-padding">
				<p>Nếu quý khách cần hỗ trợ từ nhân viên HOSPI,Vui lòng gọi</p>
			</div>
			<div class="col-md-12 no-padding col-xs-12">
				<p>(028) 3826 8797 booking@hospi.vn 096 868 0106</p>
			</div>
		</div>
	</div>


	<div class="col-md-4 col-xs-12 no-padding  padding-bottom-210 no-padding-bottom-mobile visible-xs" style="background: white;">
		<ul class="nav nav-tabs nav-justified nav-no-border" role="tablist">
			<li class="active padding-left-mobile-15">
				<a href="#GENERAL" class="text-left clssluy" data-toggle="tab" aria-expanded="true">Lưu ý</a></li>
			<li class="hidden-xs"><a href="#" class="text-left" data-toggle="tab" aria-expanded="true"></a></li>
			<li class="hidden-xs"><a href="#" class="text-left" data-toggle="tab" aria-expanded="true"></a></li>
			<li class="hidden-xs"><a href="#" class="text-left" data-toggle="tab" aria-expanded="true"></a></li>
		</ul>
		<div class="panel-body no-padding visible-xs" style="padding-top: 0px;padding-bottom: 0px">
			<div class="tab-content ">
				<div class="tab-pane wow fadeIn animated active" id="GENERAL">

					<div class="col-md-12 no-padding col-xs-12 padding-left-mobile-15" style="margin-top: 15px">
						<p>- Theo quy định của khách sạn giờ nhận phòng: 14:00 PM và Giờ trả phòng: 12:00 PM</p>
					</div>
					<div class="col-md-12 no-padding col-xs-12 padding-left-mobile-15">
						<p>- Trong trường hợp đến khách sạn, resort sớm và muốn nhận phòng sớm hơn theo quy định.
							Vui lòng liên hệ với tiếp tân để được hỗ trợ và việc check-in sớm còn tùy thuộc vào tình
							trạng phòng trống ngày bạn đến. Không được xác nhận trước.</p>
					</div>
					<div class="col-md-12 no-padding col-xs-12 padding-left-mobile-15">
						<p>- Quý khách vui lòng mang CMND, Hộ chiếu....(Giấy tờ tùy thân theo luật pháp Việt Nam) và
							Phiếu xác nhận của HOSPI giao cho tiếp tân khi làm thủ tục nhận phòng.</p>
					</div>
					<div class="col-md-12 no-padding col-xs-12 padding-left-mobile-15">
						<p>- Theo Quy định của luật pháp Việt Nam. Khi 1 người mang quốc tịch Việt Nam và một người
							mang quốc tịch nước ngoài ở chung phòng thì phải có giấy kết hôn.</p>
					</div>
					<div class="col-md-12 no-padding col-xs-12 padding-left-mobile-15">
						<p>- Nếu Quý khách cần hỗ trợ thông tin về (Vật nuôi, xe lăn, nôi em bé...) Vui lòng gọi:
							(028) 3826 8797 hoặc Hotline: 09 6868 0106</p>
					</div>

				</div>


			</div>
		</div>
	</div>


	<!-- eq 4-->

	<div class="clearfix"></div>
	<div class="col-md-12 bk-tim col-xs-12 clss-footer no-padding-left-mobile no-padding-right-mobile">
		<div class="container">
			<div class="col-md-4 col-xs-12 no-padding-left-mobile no-padding-right-mobile">
				<span class="font-size-12" style="color: white">&#169; 2018 by HOSIPI TRAVEL CO.LTD</span>
			</div>
			<div class="col-md-2 col-xs-12 no-padding-left-mobile no-padding-right-mobile">
				<span class="font-size-12" style="color: white"><i class="fa fa-chevron-right" aria-hidden="true"></i> Chính sách bảo mật</span>
			</div>
			<div class="col-md-2 col-xs-12 no-padding-left-mobile no-padding-right-mobile">
				<span class="font-size-12" style="color: white"><i class="fa fa-chevron-right" aria-hidden="true"></i> Điều khoản sử dụng</span>
			</div>
			<div class="col-md-4 col-xs-12 no-padding-left-mobile no-padding-right-mobile">
				<span class="font-size-12" style="color: white">Lầu 1,số 124 Khánh Hội,P.6, Quận 4,TP.Hồ Chí Minh</span>
			</div>
		</div>
	</div>
</div>
<div class="clearfix"></div>