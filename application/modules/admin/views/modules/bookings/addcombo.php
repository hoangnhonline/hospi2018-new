<form id="form_add_combo" method="POST" action="">

	<div class="container" id="content">

		<!-- content-->
		<div class="col-md-12" style="border-bottom: 1px solid #ccc;    padding-bottom: 30px;padding-top: 30px;background: white">
			<div class="col-md-7" style="padding-left: 0px;margin-left: -15px;">
				<div class="form-group">
					<label for="select-standard" style="background: #660033;color: white;padding-top: 6px;padding-bottom: 7px;border: 1px solid white;" class="control-label col-md-4">E
						- Booking</label>
					<div class="col-md-5" style="padding-left: 0px">
						<select class="form-control" style="background-color: #ccc;">
							<option>Combo</option>
						</select>
					</div>

				</div>

			</div>
			<div class="col-md-5">
				<div class="col-md-4">
					<div class="form-group">
						<label for="select-standard" class="control-label font-weight-unset">Ngày  <?php echo date("d/m/Y");?></label>

					</div>
				</div>
				<div class="col-md-8">
					<div class="form-group">
						<label for="select-standard" class="control-label font-weight-unset">Nhân viên: <?php echo $admin_name?></label>

					</div>
				</div>
			</div>

		</div>
		<div class="panel panel-default col-md-7" id="div_form_booking">
			<ul class="nav nav-tabs nav-justified" role="tablist">
				<li class="active">
					<a href="#GENERAL" class="text-left clsstaobooking" data-toggle="tab" aria-expanded="true">Tạo
						Booking</a></li>

			</ul>
			<div class="panel-body">
				<div class="tab-content ">
					<div class="tab-pane wow fadeIn animated active" id="GENERAL">
						<div class="row">
							<div>
								<div class="col-md-12">
									<div class="panel panel-default">

										<div class="panel-body" style="padding-top: 15px">

											<form role="form" class="form-horizontal">
												<div class="col-md-7">
													<div class="form-group">
														<label for="select-standard" class="control-label col-md-4 font-weight-unset">Tạo
															mã combo</label>
														<div class="col-md-8">
															<input type="text" name="combo_code" id="txt_combo_code" class="form-control" value="<?php echo $model['combo_code']?>">
														</div>
													</div>
												</div>

												<div class="col-md-5">
													<div class="form-group ">
														<label for="select-standard" id="generate_combo_code" style="cursor: pointer" class="control-label col-md-12 font-weight-unset text-left">
															<u>Lấy mã tự động</u>
														</label>
													</div>
												</div>
												<div class="clearfix"></div>
												<div class="col-md-8">
													<div class="form-group">
														<label for="hotel_city">Tỉnh/TP<span class="red-star">*</span></label>
														<select class="form-control chosen-select" name="city_id" id="location">
															<option value="">-- chọn --</option>
															<?php foreach ($locations as $location) { ?>
																<option value="<?php echo $location->id; ?>" <?php echo isset($model['city_id']) && $location->id == $model['city_id'] ? "selected" : ""; ?>><?php echo $location->location; ?></option>
															<?php } ?>
														</select>
													</div>
													<div class="form-group">
														<label for="hotel_city">Chọn
															combo<span class="red-star">*</span></label>
														<select class="form-control chosen-select" name="combo_id" id="combo">
															<?php if (isset($model['city_id'])) { ?>
																	<?php foreach ($combos as $combo) { ?>
																		<option value="<?php echo $combo->offer_id; ?>" <?php echo isset($model['combo_id']) && $combo->offer_id == $model['combo_id'] ? "selected" : ""; ?>><?php echo $combo->offer_title; ?></option>
																	<?php } ?>
															<?php } ?>
														</select>
													</div>


												</div>
												<div class="clearfix"></div>
                        <div id="chargeList">
												<?php if (isset($model['combo_id'])) { ?>
														<div class="col-md-3">
															<div class="form-group">
																<label for="username0" class=" control-label font-weight-unset">Giá
																	combo trọn gói</label>
																<div>
																	<label style="padding: 6px;background: #e5e5e5"><?php echo $model['baseCharge']['price'] ?>
																		VND</label>
																</div>

															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label for="username0" class=" control-label font-weight-unset">Số
																	lượng</label>
																<input type="text" class="form-control" value="<?php echo $model['baseCharge']['quantity'] ?>" name="basecharge_quantity">
															</div>
														</div>
														<div class="clearfix"></div>
														<?php //echo "<pre>";print_r($model);echo "</pre>";die;
														$i = 0;
														foreach ($model['surcharge_list'] as $key => $surcharge) {
															$i++;
															?>
															<div class="col-md-3">
																<div class="form-group">
																	<label for="username0" class=" control-label font-weight-unset"><?php echo $surcharge['name'] ?></label>
																	<div>
																		<label style="padding: 6px;background: #e5e5e5"><?php echo $surcharge['price'] ?>
																			VND</label>
																	</div>

																</div>
															</div>
															<div class="col-md-3">
																<div class="form-group">
																	<label for="username0" class=" control-label font-weight-unset">Số
																		lượng</label>
																	<input type="text" class="form-control" value="<?php echo $surcharge['quantity'] ?>" name="surcharge_list[<?php echo $i; ?>][quantity]">
																	<input type="hidden" class="form-control" value="<?php echo $surcharge['id'] ?>" name="surcharge_list[<?php echo $i; ?>][id]">
																	<input type="hidden" class="form-control" value="<?php echo $surcharge['name'] ?>" name="surcharge_list[<?php echo $i; ?>][name]">
																	<input type="hidden" class="form-control" value="<?php echo $surcharge['price'] ?>" name="surcharge_list[<?php echo $i; ?>][price]">
																</div>
															</div>
															<div class="clearfix"></div>
														<?php } ?>
												<?php } ?>
                        </div>

												<div class="clearfix"></div>
												<div class="col-md-3">
													<div class="form-group">
														<label for="username0" class=" control-label font-weight-unset">Ngày
															nhận phòng</label>
														<div id="datetimepicker1" class="input-group date">
															<input id="checkin_txt" name="checkin" type="text" class="form-control dpdsingle" value="<?php echo $model['checkin']; ?>">
															<span class="input-group-addon">
                                                        <span class="fa-calendar fa"></span>
                                                      </span>
														</div>
													</div>
												</div>
												<div class="col-md-6" style="margin-left: 15px;    margin-top: 33px;">
													<div class="form-group">
														<label for="username0" class=" control-label font-weight-unset"></label>

														<div class="icheckbox_square-grey" style="position: relative;">
															<input type="checkbox" class="form-control"  id="unknown_date" name="is_unknown_date">
														</div>
														Mua trước đi sau


													</div>
												</div>

												<div class="clearfix"></div>
												<div class="col-md-3">
													<div class="form-group">
														<label class=" control-label font-weight-unset">Người lớn</label>

														<input type="number" class="form-control" name="booking_adults" value=<?php echo $model['booking_adults'] ?>>


													</div>
												</div>
												<div class="col-md-3" style="margin-left: 15px">
													<div class="form-group">
														<label class=" control-label font-weight-unset">Trẻ em</label>

														<input type="number" class="form-control" name="booking_child" value=<?php echo $model['booking_child'] ?>>


													</div>
												</div>
												<div class="col-md-3" style="margin-left: 15px">
													<div class="form-group">
														<label class=" control-label font-weight-unset">Yêu cầu
															giường</label>

														<input type="text" class="form-control" name="booking_extra_beds_request" value="<?php echo $model['booking_extra_beds_request'] ?>">


													</div>
												</div>
												<div class="clearfix"></div>

												<div class="col-md-6">
													<div class="form-group">
														<label class=" control-label font-weight-unset">Chi phí khác</label>
														<input onkeyup="extraFeeChange()" type="text" class="form-control" value="<?php echo number_format($model['booking_extras_fee']) ?>" id="booking_extras_fee_show" name="booking_extras_fee">
														<input type="hidden" class="form-control" value="<?php echo $model['booking_extras_fee'] ?>" id="booking_extras_fee" name="booking_extras_fee" >
													</div>
												</div>
												<div class="col-md-3" style="margin-left: 30px">
													<div class="form-group">
														<label class=" control-label font-weight-unset">Số lượng</label>
														<input  onkeyup="loadPrice()"  type="text" class="form-control" value="<?php echo $model['booking_extras_quantity'] ?>" name="booking_extras_quantity">
													</div>
												</div>
												<div class="clearfix"></div>
												<div class="col-md-10" style="padding-left: 0px;">
													<label class=" control-label font-weight-unset">Ghi chú</label>
													<textarea rows="4" cols="6" class="form-control" placeholder="Nhập thông tin" name="booking_additional_notes"><?php echo $model['booking_additional_notes'] ?></textarea>
												</div>
												<!-- </form> -->
										</div>
									</div>
								</div>
							</div>
							<!-- end-->

						</div>

					</div>

				</div>
			</div>

			<!-- menu -2-->
			<ul class="nav nav-tabs nav-justified" role="tablist">
				<li class="active ">
					<a href="#thongtinbooking" class="text-left clssthongtinbooking" data-toggle="tab" aria-expanded="true">Thông
						tin booking</a></li>
				<li class="">
					<a href="#xuathoadon" class="text-left clssxuathoadon" data-toggle="tab" aria-expanded="false">Xuất
						hóa đơn</a></li>
				<li class="">
					<a href="#phuongthucthanhtoan" class="text-left clssphuongthucthanhtoan" data-toggle="tab" aria-expanded="false">Phương
						thức thanh toán</a></li>

			</ul>
			<div class="panel-body">
				<div class="tab-content ">
					<div class="tab-pane wow fadeIn animated active" id="thongtinbooking">
						<div class="row">
							<div>
								<div class="col-md-12">
									<div class="panel panel-default">

										<div class="panel-body" style="padding-top: 15px">

											<!--                                               <form role="form">
											 -->

                                              <div class="col-md-7">
                                                   <div class="form-group ">
                                                          <label for="select-standard" class="control-label font-weight-unset"></label>
                                                          <input placeholder="Họ tên của bạn" type="text" class="form-control" name="customer_name" value ="<?php echo $model['customer_name']?>">
                                                          
                                                      </div>
                                                    <div class="form-group ">
                                                          <label for="select-standard" class="control-label font-weight-unset"></label>
                                                          <input placeholder="Email" type="text" class="form-control" name="customer_email"  value ="<?php echo $model['customer_email']?>">
                                                          
                                                      </div>
                                                          <div class="form-group ">
                                                          <label for="select-standard" class="control-label font-weight-unset"></label>
                                                          <input placeholder="Số điện thoại" type="text" class="form-control" name="customer_phone" value ="<?php echo $model['customer_phone']?>">
                                                          
                                                      </div>
                                                </div>
											<div class="col-md-5">
												<div class="form-group ">
                                                          <label for="select-standard" class="control-label font-weight-unset" ></label>
                                                         <textarea cols="4" rows="8" class="form-control" placeholder="Bạn có yêu cầu khác" name="customer_request"><?php echo $model['customer_request']?></textarea>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group ">
													<label for="select-standard" class="control-label font-weight-unset"></label>
                                                          <input placeholder="Địa chỉ" type="text" class="form-control"  name="customer_address" value="<?php echo $model['customer_address']?>">

												</div>
											</div>

											<!-- </form> -->
										</div>
									</div>
								</div>
							</div>
							<!-- end-->

						</div>

					</div>
					<div class="tab-pane wow fadeIn animated" id="xuathoadon">
						 	<div class="row">
							<div>
								<div class="col-md-12">
									<div class="panel panel-default">

										<div class="panel-body" style="padding-top: 15px">
											<div class="col-lg-7 col-xs-12 no-padding" style="padding-top:15px">
											  <div class="form-group">
												<input type="text" placeholder="Nhập tên công ty" class="form-control" name="company" value ="<?php echo $model['company']?>">
											  </div>
											</div>
											<div class="col-lg-5 col-xs-12 no-padding-right no-padding-left-mobile" style="padding-top:15px">
											  <div class="form-group">
												
												<input type="text" placeholder="Mã số thuế" class="form-control" name="mst"  value ="<?php echo $model['mst']?>">
												
											  </div>
											</div>
											<div class="col-lg-12 col-xs-12 no-padding">
						                        <div class="form-group">
						                        
						                        <input type="text" class="form-control" placeholder="Địa chỉ công ty" name="companyadd" value ="<?php echo $model['companyadd']?>">
						                        </div>
						                      </div>
						                      <div class="col-md-12 col-sm-12 col-xs-12 go-right no-padding-left no-margin-top-mobile">
						                        <div class="form-group checkbox">
						                        <label class="no-padding-left" style="padding-left:0px">
						                          <div class="icheckbox_square-grey" style="position: relative;">
						                            <input type="checkbox" value="" class="ngayvechang" name="is_other_company" id="is_other_company" ></div>

						                         Bạn muốn gửi hóa đơn về địa chỉ khác ?
						                        </label>
						                        </div>
						                      </div>
						                      <div class="col-lg-12 col-xs-12 no-padding" id ="sendto" style="display: none">
						                        <div class="form-group">
						                        
						                        <input type="text" class="form-control" placeholder="Địa chỉ nhận hóa đơn" name="sentto" value ="<?php echo $model['sentto']?>">
						                        </div>
						                      </div>
                      
											
											<div class="clearfix"></div>

										</div>
									</div>
								</div>
							</div>
							<!-- end-->

						</div>
					</div>
					
              		<div class="tab-pane wow fadeIn animated" id="phuongthucthanhtoan">
							  <!-- noi dung -->
                                <div class="row">
									<div>
										<div class="col-md-12 no-padding">
										  <div class="panel panel-default">
										   
												<div class="panel-body" style="padding-top: 0px;padding-left:0px;padding-right:0px">
											   
													  <form role="form">
													  
															<div class="form-group" style="padding-top:15px">
															  Để thuận tiện cho việc thanh toán khách vui lòng chọn 1 trong những hình thức thanh toán dưới đây
															</div>
															<div class="col-md-4 col-sm-12 col-xs-12 go-right no-padding-left no-margin-top-mobile">
															  <div class="form-group checkbox">
																<label class="no-padding-left" style="padding-left:0px">
																  <input type="checkbox"  class="chuyenkhoan" value="1" name="checkout-type"  id="payment_method1">

																  Chuyển khoản ATM
																</label>
															  </div>
															</div>
															<div class="col-md-4 col-sm-12 col-xs-12 go-right no-padding-left no-margin-top-mobile">
															  <div class="form-group checkbox">
																<label class="no-padding-left"style="padding-left:0px">
																  <input type="checkbox"  class="chuyenkhoan" value="2" name="checkout-type"  id="payment_method2">
																 
																  Văn phòng HOSPI
																</label>
															  </div>
															</div>
															<div class="col-md-4 col-sm-12 col-xs-12 go-right no-padding-left no-margin-top-mobile">
															  <div class="form-group checkbox">
																<label class="no-padding-left" style="padding-left:0px">
																  <input type="checkbox"  class="chuyenkhoan" value="3" name="checkout-type" id="payment_method3">
																 
																  Thanh toán tại nhà
																</label>
															  </div>
															</div>
															<div class="col-lg-12 col-xs-12 no-padding" id="showphuongthuc_1" style="display: block">
															  <div class="form-group">
																Quý khách vui lòng chọn ngân hàng
															  </div>
															  <div class="col-md-3 col-sm-12 col-xs-12 go-right no-padding-left no-margin-top-mobile">
																<div class="form-group checkbox">
																  <label class="no-padding-left">
																	<input type="checkbox" value="vcb" class="value_banking" data-bankname="vcb" name="bank">
																	
																	Vietcombank

																  </label>
																</div>
															  </div>
															  <div class="col-md-3 col-sm-12 col-xs-12 go-right no-padding-left no-margin-top-mobile">
																<div class="form-group checkbox">
																  <label class="no-padding-left">
																	<input type="checkbox" value="acb" class="value_banking" data-bankname="acb" name="bank">
																	ACB
																  </label>
																</div>
															  </div>
															  <div class="col-md-3 col-sm-12 col-xs-12 go-right no-padding-left no-margin-top-mobile ">
																<div class="form-group checkbox">
																  <label class="no-padding-left">
																	<input type="checkbox" value="dongabank" class="value_banking" data-bankname="donga" name="bank">
																
																	DongA Bank
																  </label>
																</div>
															  </div>
															  <div class="col-md-3 col-sm-12 col-xs-12 go-right no-padding-left no-margin-top-mobile ">
																<div class="form-group checkbox">
																  <label class="no-padding-left">
																	<input type="checkbox" value="mbbank" class="value_banking" data-bankname="mb" name="bank">
																	
																	MBBank
																  </label>
																</div>
															  </div>
															  <div class="col-md-3 col-sm-12 col-xs-12 go-right no-padding no-margin-top-mobile">
																<div class="form-group checkbox">
																  <label class="no-padding-left">
																	<input type="checkbox" value="sacombank" class="value_banking" data-bankname="sacom" name="bank">
																	
																	Sacombank
																  </label>
																</div>
															  </div>
															</div>
															<div class="col-lg-12 col-xs-12 conten-visa-card" id="showatm" style="display: none">
															  <div class="col-lg-12 col-xs-12 content-visa-item no-padding bank_info" id="vcb" style="display: none">
																<div class="col-lg-12 col-xs-12"><span>Ngân hàng VCB (Vietcombank)</span></div>
																<div class="col-lg-12 col-xs-12"><span>Sài Gòn, Tp. HCM</span></div>
																<div class="col-lg-12 col-xs-12"><span>Tên tài khoản: CÔNG TY TNHH HOSPI</span></div>
																<div class="col-lg-12 col-xs-12"><span>Số tài khỏa: 0331000465230</span></div>
															  </div>
															  <div class="col-lg-12 col-xs-12 content-visa-item no-padding bank_info" id="acb" style="display: none">
																<div class="col-lg-12 col-xs-12"><span>Ngân hàng Á Châu (ACB)</span></div>
																<div class="col-lg-12 col-xs-12"><span>Chi nhánh: Bến Thành,Tp Hồ Chí Minh</span></div>
																<div class="col-lg-12 col-xs-12"><span>Tên tài khoản: Võ Đình Chi</span></div>
																<div class="col-lg-12 col-xs-12"><span>Số tài khỏa: 227041599</span></div>
															  </div>
															   <div class="col-lg-12 col-xs-12 content-visa-item no-padding bank_info" id="donga" style="display: none">
																<div class="col-lg-12 col-xs-12"><span>Ngân hàng Đông Á Bank</span></div>
																<div class="col-lg-12 col-xs-12"><span>Sài Gòn, Tp. Hồ Chí Minh</span></div>
																<div class="col-lg-12 col-xs-12"><span>Tên tài khoản: Võ Đình Chi(Giám đốc)</span></div>
																<div class="col-lg-12 col-xs-12"><span>Số tài khỏa: 0103812000</span></div>
															  </div>
															   <div class="col-lg-12 col-xs-12 content-visa-item no-padding bank_info" id="mb" style="display: none">
																<div class="col-lg-12 col-xs-12"><span> Ngân hàng Quân Đội (MBBank)</span></div>
																<div class="col-lg-12 col-xs-12"><span>Chi nhánh: Bến Thành,Tp Hồ Chí Minh</span></div>
																<div class="col-lg-12 col-xs-12"><span>Tên tài khoản: Võ Đình Chi</span></div>
																<div class="col-lg-12 col-xs-12"><span>Số tài khỏa: 1460103608001</span></div>
															  </div>
															   <!-- <div class="col-lg-12 col-xs-12 content-visa-item no-padding bank_info" id="sacom" style="display: none">
																<div class="col-lg-12 col-xs-12"><span>Ngân hàng sacom</span></div>
																<div class="col-lg-12 col-xs-12"><span>Chi nhánh: Bến Thành,Tp Hồ Chí Minh</span></div>
																<div class="col-lg-12 col-xs-12"><span>Tên tài khoản: Võ Đình Chi</span></div>
																<div class="col-lg-12 col-xs-12"><span>Số tài khỏa: 227041599</span></div>
															  </div> -->
															  <div class="clearfix"></div>
															  <div class="col-lg-12 col-xs-12 no-padding info-hoa-don" id="nganhangxuathoadon">
																<div class="col-lg-12 col-xs-12 no-padding clss-xuat"><span>Quý khách xuất hóa đơn ?</span></div>
																<div class="form-group checkbox">
																  <label class="no-padding-left">
																	<input type="checkbox" value="1" class="xuahoadonvat">
																	
																	Vietcombank
																  </label>
																</div>
															  </div>
															  <div class="clearfix"></div>
															  <!-- <div class="col-lg-12 col-xs-12 content-visa-item-xuat-hoa-don no-padding" id="ngan-hanh-xuat-hoadon" style="display: none;">
																
																<div class="col-lg-12 col-xs-12"><span>Ngân hàng Vietcombank (VCB)</span></div>
																<div class="col-lg-12 col-xs-12"><span>Chi nhánh: Sài Gòn,Tp Hồ Chí Minh</span></div>
																<div class="col-lg-12 col-xs-12"><span>Tên tài khoản: Công ty TNHH HOSPI</span></div>
																<div class="col-lg-12 col-xs-12"><span>Số tài khỏa: 0331000465230</span></div>
															  </div>
															  <div class="clearfix"></div> -->
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
																  
																  <input type="text" class="form-control"  name="txtAddress">
																</div>
															  </div>
															</div>
															<div class="clearfix"></div>
													  
													  </form>
												 </div>
											</div>
										</div>
									</div>
								</div>
								<!-- end noi dung -->
                              </div>
                            
				</div>
			</div>
			<!-- end -->


		</div>
			<div class="panel panel-default col-md-5" id="div_quote">
				<?php $this->load->view('modules/bookings/includes/addcombo/quote');?>
			</div>

		<!-- eq 4-->

		<div class="clearfix"></div>
	</div>
</form>
<script type="text/javascript">

    $("#generate_combo_code").click(function () {
        $.post("<?php echo base_url();?>admin/bookings/generate_booking__code", {}, function (res) {
            $("#txt_combo_code").val(res);
        });
    });

    $("select#location").change(function () {
        url = "<?php echo base_url();?>admin/bookings/listCombo?city_id=" + $(this).val();//alert(url);
        $.ajax({
            url: url, success: function (result) {//alert(result);
                $("#combo").html(result);
            }
        });
    });


    $("select#combo").change(function () {
        url = "<?php echo base_url();?>admin/bookings/listCharge?combo_id=" + $(this).val();
        $.ajax({
            url: url, success: function (result) {
                //alert(result);
                $("#chargeList").html(result);
                loadPrice();
            }
        });
    });

    $("select#booking_status").change(function () {
        book_status = $(this).val();
        $("#booking_amount_paid").val(0);
        if(book_status == 'reserved'){
        	 $("#booking_amount_paid").removeAttr('disabled');
        }else{
        	$("#booking_amount_paid").attr('disabled','disabled');  
        }
        paid();
    });


$("#is_send").change(function(){//alert(1);

});

$("#chuyenkhoan1").change(function(){//alert(1);

});
function changeatm123(_id,val)
{ 
	/*$("#showphuongthuc_1 input[type='checkbox']").each(function(){
		var _baba=$(this).val(); alert(_baba);
		if(val!=_baba)
		{
			$(this).attr("checked",false);
		}
		
	})*/
/*	$("#show-atm-select").show();
*/
$("#"+_id).show();
}

	function chancePayment(x) {
	  var _val=$(x).data('id');//alert(_val);
	  $(".payment_method").prop('checked',true);
	  $("#showphuongthuc_"+_val+"").prop('checked',true);

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
	}

    function loadPrice() {
        var coupon_code = $("#coupon_code").val();
        simpleAjaxPost(
            "<?php echo base_url();?>admin/bookings/checkCoupon?coupon_code="+coupon_code,
            "#content",
            function (res) {
                if(res.validate_coupon == true ){
	            }else{
	            	alert('Coupon khong hop le');
	            }
	            $("#div_quote").html(res.content);
            }
        );
    }
    
    function checkCoupon() {
        simpleAjaxPost(
            "<?php echo base_url();?>admin/bookings/checkCoupon",
	        "#content",
	        function (res) {
		        if(res.validate_coupon == true ){
	            }else{
	            	alert('Coupon khong hop le');
	            }
	            $("#div_quote").html(res.content);
            }
        );
    }
  function paid(){
    var booking_total = $("#booking_total").val();
    var booking_amount_paid = $("#booking_amount_paid").val();
    booking_amount_paid = booking_amount_paid.replace(',','');
    var remain = parseFloat(booking_total) - parseFloat(booking_amount_paid);
    remain =  numeral(remain).format('0,0'); 
    booking_amount_paid =  numeral(booking_amount_paid).format('0,0'); 
    remain = remain+ ' VND'; 
     $("#remain").html(remain);
     $("#booking_amount_paid").val(booking_amount_paid);
  }


/*$(".chuyenkhoan1").change(function(){alert(1);

  var _val=$(this).val();alert(_val);
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
        $("#showphuongthuc_3").hide();
      }
    }
  }

})*/


$('.chuyenkhoan').on('ifChecked ifUnchecked', function(event) {
	 var _val=$(this).val();
	if (event.type == 'ifChecked') {
       // $(".chuyenkhoan").iCheck('uncheck');
        //$(this).iCheck('check');
			if(_val==1)
			{
				$("#showphuongthuc_"+_val+"").show();
				$("#showphuongthuc_2").hide();
				$("#showphuongthuc_3").hide();
				$("#ngan-hanh-xuat-hoadon").hide();
				$("#show-atm-select").hide();
				$("#payment_method3") .prop('checked',false);
                $("#payment_method2") .prop('checked',false);
                $("#payment_method3").parent().removeClass('checked');
                $("#payment_method2").parent().removeClass('checked');
			}
			else{
				if(_val==2)
				{
					$("#showphuongthuc_"+_val+"").show();
					$("#showphuongthuc_1").hide();
					$("#showphuongthuc_3").hide();
					$("#ngan-hanh-xuat-hoadon").hide();
					$("#show-atm-select").hide();
				$("#payment_method3") .prop('checked',false);
                $("#payment_method1") .prop('checked',false);
                $("#payment_method3").parent().removeClass('checked');
                $("#payment_method1").parent().removeClass('checked');
				}
				else{
					if(_val==3)
					{
						$("#showphuongthuc_"+_val+"").show();
						$("#showphuongthuc_2").hide();
						$("#showphuongthuc_1").hide();
						$("#ngan-hanh-xuat-hoadon").hide();
						$("#show-atm-select").hide();
						$("#payment_method1") .prop('checked',false);
                		$("#payment_method2") .prop('checked',false);
                		$("#payment_method1").parent().removeClass('checked');
                		$("#payment_method2").parent().removeClass('checked');
					}
				}
			}	

	}
	else{
		$(".chuyenkhoan").iCheck('uncheck');
		/*$("#showphuongthuc_"+_val+"").hide();
		$("#showphuongthuc_2").hide();
		$("#showphuongthuc_3").hide();*/
		$("#ngan-hanh-xuat-hoadon").hide();
		$("#show-atm-select").hide();
	}
	

})
$('.value_banking').on('ifChecked ifUnchecked', function(event) {
	var name= $(this).data('bankname');
	val=  $(this).val();
	if (event.type == 'ifChecked') {
		$("#showatm").show();
		$(".bank_info").hide();
		//$(".value_banking").iCheck('uncheck');
		$("#"+name).show();


	}
	else{
	  $("#showphuongthuc_3").hide();
      $("#showphuongthuc_2").hide();
      $("#showphuongthuc_1").hide();
		//$(".value_banking").iCheck('uncheck');
		$("#show-atm-select").hide();
	}
	$("#showphuongthuc_1 input[type='checkbox']").each(function(){
		var _baba=$(this).val();
		if(val!=_baba)
		{		
			$(this).attr("checked",false);
			$(this).parent().removeClass('checked');

		}else{
			$(this).attr("checked",true);

		}
		
	})
})
$('.xuahoadonvat').on('ifChecked ifUnchecked', function(event) {
	if (event.type == 'ifChecked') {
		$("#ngan-hanh-xuat-hoadon").show();
	}
	else{
		$(".xuahoadonvat").iCheck('uncheck');
		$("#ngan-hanh-xuat-hoadon").hide();
	}
	
})

$('#is_other_company').on('ifChecked ifUnchecked', function(event) {

  if (event.type == 'ifChecked') {
    $("#sendto").show();
  }else{
    $("#sendto").hide();

  }

})

$('#unknown_date').on('ifChecked ifUnchecked', function(event) {
  if (event.type == 'ifChecked') {
    $("#checkin_button").html('Mua trước đi sau');
     $("#checkout_div").hide();
  }else{
  	var checkin_txt = $("#checkin_txt").val();
     $("#checkout_div").show();
     $("#checkin_button").html(checkin_txt);
  }
})

function extraFeeChange(){
      var current_price = $("#booking_extras_fee_show").val() ;
     // current_price=  current_price.replace(/(\d)(?=(\d{3})+(,|$))/g, '$1,'); //commaSeparateNumber(current_price);
       current_price =  numeral(current_price).format('0,0'); // "$3,543.76"

      $("#booking_extras_fee_show").val(current_price) ;
       current_price =  numeral(current_price).format('0'); // "$3,543.76"
      $("#booking_extras_fee").val(current_price) ;
      loadPrice();
    }
</script>

   <style>
   .content-visa-item {
    border: 1px solid #ccc;
    width: 300px;
    padding-top: 10px;
    padding-bottom: 10px;
    color: #a9a9a9;
    font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
}
.info-hoa-don {
    margin-top: 20px;
}
.clss-xuat {
    margin-bottom: 10px;
    color: #a9a9a9;
}
.content-visa-item-xuat-hoa-don {
    border: 1px solid #ccc;
    width: 300px;
    padding-top: 10px;
    padding-bottom: 10px;
    color: #a9a9a9;
    font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
}
   </style>
