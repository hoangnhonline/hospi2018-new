<div class="col-md-12" style="border-bottom: 1px solid #ccc;    padding-bottom: 30px;padding-top: 30px;background: white">
	<div class="col-md-8" style="padding-left: 0px;margin-left: -15px;">
		<div class="form-group">
			<label for="select-standard" style="background: #660033;color: white;padding-top: 6px;padding-bottom: 7px;border: 1px solid white;" class="control-label col-md-4">E
				- Voucher</label>
			<div class="col-md-5" style="padding-left: 0px">
				<select class="form-control" style="background-color: #ccc;" name="type" onchange="javascript:changeType($(this).val())">
					<?php
					foreach ($list_type as $key => $value) {
						$select = "";
						if (isset($type) && $key == $type) {
							$select = "selected";
						}
						?>
						<option value="<?= $key ?>" <?= $select ?>><?= $value ?></option>
						<?php
					}
					?>
				</select>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="col-md-5">
			<div class="form-group">
				<label for="select-standard" class="control-label font-weight-unset">Ngày <?= date("d/m/Y"); ?></label>
			</div>
		</div>
		<div class="col-md-7">
			<div class="form-group">
				<label for="select-standard" class="control-label font-weight-unset">Nhân
					viên: <?= $admin_name ?></label>

			</div>
		</div>
	</div>
	<div class="col-md-4" style="margin-top: 20px;">

		<div class="form-group">
			<div class="col-md-8" style="padding-right: 0px;padding-left: 0px;" id="info_customer">
				<input type="text" class="form-control" name="info_customer">
			</div>
			<div class="col-md-4" style="padding-left: 0px; padding-right: 0px;">
				<button style="    background: #660033;color: white;border: 1px solid white;padding-top: 5px;padding-bottom: 8px;" onclick="getInfo()">
					Lấy thông tin
				</button>
			</div>

		</div>

	</div>
</div>
<div class="panel panel-default col-md-8" style="min-height:1253px">
	<ul class="nav nav-tabs nav-justified" role="tablist">
		<li class="active ">
			<a href="#GENERAL" class="text-left clssnhapthongtin" data-toggle="tab" aria-expanded="true">Nhập
				thông tin</a></li>
		<li class="">
			<a href="#FACILITIES" class="text-left clssthongtinhcanhan" data-toggle="tab" aria-expanded="false">Thông
				tin cá nhân</a></li>
		<li class="">
			<a href="#tinhtrangthanhtoan" class="text-left clsstinhtrangthanhtoan" data-toggle="tab" aria-expanded="false">Tình
				trạng thanh toán</a></li>

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
												<label for="select-standard" class="control-label col-md-5 font-weight-unset">Tạo
													mã khách sạn</label>
												<div class="col-md-7">
													<input type="text" name="code" value="<?= $code ?>" id="txt_combo_code" class="form-control">
													<input type="hidden" name="id" value="<?= $id ?>" class="form-control">
												</div>

											</div>
										</div>

										<div class="col-md-5">
											<div class="form-group ">
												<label for="select-standard" id="generate_voucher_code" style="cursor: pointer" class="control-label col-md-12 font-weight-unset text-left">
													<u>Lấy mã tự động</u>
												</label>
											</div>
										</div>
										<div class="clearfix"></div>
										<div class="col-md-8" id="div_hotel">
											<div class="form-group ">
												<label for="select-standard" class="control-label font-weight-unset">
													Tên khách sạn
												</label>
												<select class="form-control chosen-select" name="hotel_id" onchange="javascript:changeHotel()">
													<?php
													foreach ($hotels as $key => $name) {
														$select = "";
														if (isset($hotel_id) && $key == $hotel_id) {
															$select = "selected";
														}
														?>
														<option value="<?= $key ?>" <?= $select ?>><?= $name ?></option>
														<?php
													}
													?>

												</select>
											</div>
										</div>
										<div class="clearfix"></div>
										<div class="col-md-8" id="div_combo">
											<?php
											include "includes/combo_data.php";
											?>
										</div>
										<div class="clearfix"></div>
										<div class="col-md-3">
											<div class="form-group">
												<label for="username0" class=" control-label font-weight-unset">
													Ngày nhận phòng
												</label>
												<div id="datetimepicker1" class="input-group date">
													<input type="text" value="<?= str_replace("-", "/", $start_date) ?>" class="form-control dpd3" id="txt_start_date" name="start_date">
													<span class="input-group-addon">
                                                        <span class="fa-calendar fa"></span>
                                                      </span>
												</div>
											</div>
										</div>
										<div class="col-md-3" style="margin-left: 15px;">
											<div class="form-group">
												<label for="username0" class=" control-label font-weight-unset">Ngày
													trả phòng</label>
												<div id="datetimepicker2" class="input-group date">
													<input type="text" value="<?= str_replace("-", "/", $end_date) ?>" class="form-control dpd4" name="end_date" id="txt_end_date">
													<span class="input-group-addon">
                                                        <span class="fa-calendar fa"></span>
                                                      </span>
												</div>
											</div>
										</div>
										<div class="col-md-3" style="margin-top: 25px;margin-left: 15px;">
											<div class="form-group">
												<label class=" control-label font-weight-unset">Số đêm:
													<b id="b_so_dem"><?= $count_night ?></b></label>
												<input type="hidden" value="<?= $count_night ?>" name="count_night" id="count_night">
											</div>
										</div>
										<div class="clearfix"></div>
										<div class="col-md-3">
											<div class="form-group">
												<label class=" control-label font-weight-unset">Người
													lớn</label>

												<input type="number" class="form-control" name="adults" value="<?= $adults ?>">


											</div>
										</div>
										<div class="col-md-3" style="margin-left: 15px">
											<div class="form-group">
												<label class=" control-label font-weight-unset">Trẻ em</label>

												<input type="number" class="form-control" name="childs" value="<?= $childs ?>">


											</div>
										</div>
										<div class="col-md-3" style="margin-left: 15px">
											<div class="form-group">
												<label class=" control-label font-weight-unset">Yêu cầu
													giường</label>

												<input class="form-control" name="beds" value="<?= $beds ?>">
											</div>
										</div>
										<div class="clearfix"></div>
										<div id="education-box">
											<?php
											include "includes/room_edit_data.php";
											?>
										</div>
										<div class="clearfix" style="margin-top: 15px"></div>
										<div class="col-md-2" style="margin-top: 25px;">
											<div class="form-group">
												<label class=" control-label font-weight-unset">Giường
													phụ</label>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label class=" control-label font-weight-unset">Số
													giường</label>
												<input type="text" class="form-control" name="extra_beds" value="<?= $extra_beds ?>">
											</div>
										</div>

										<div class="clearfix"></div>
										<div class="col-md-4" style="padding-left: 0px;padding-right: 0px;background: white;padding-top: 15px">
											<div class="col-md-12" style="padding-left: 0px;padding-right: 0px">
												<div class="form-group">
													<label class=" control-label font-weight-unset"></label>
													<input type="checkbox" class="checkboxcls" name="is_send"> Gửi
													E-Voucher đến khách hàng
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
			<div class="tab-pane wow fadeIn animated" id="FACILITIES">
				<div class="col-md-6">
					<div class="form-group">
						<label class=" control-label font-weight-unset"></label>
						<input type="text" class="form-control" placeholder="Họ tên của bạn" value="<?= $v_name ?>" name="v_name">
					</div>
					<div class="form-group">
						<label class=" control-label font-weight-unset"></label>
						<input type="text" class="form-control" placeholder="Email" value="<?= $v_email ?>" name="v_email">
					</div>
					<div class="form-group">
						<label class=" control-label font-weight-unset"></label>
						<input type="text" class="form-control" placeholder="Số điện thoại" value="<?= $v_phone ?>" name="v_phone">
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="col-md-12">
					<div class="form-group">
						<label class=" control-label font-weight-unset"></label>
						<input type="text" class="form-control" placeholder="Địa chỉ" value="<?= $v_address ?>" name="v_address">
					</div>
				</div>
			</div>
			<div class="tab-pane wow fadeIn animated" id="tinhtrangthanhtoan">
				<div class="col-md-6">
					<div class="form-group">
						<label class=" control-label font-weight-unset col-md-4">Tình trang thanh toán</label>
						<div class="col-md-8">
							<select class="form-control cl-tim" name="payment_status">
								<?php
								foreach ($list_payment_status as $key => $value) {
									$select = "";
									if (isset($payment_status) && $key == $payment_status) {
										$select = "selected";
									}
									?>
									<option value="<?= $key ?>" <?= $select ?>><?= $value ?></option>
									<?php
								}
								?>
							</select>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="col-md-4" style="padding-left: 0px;padding-right: 0px;background: white;">
	<div class="col-md-12" style="padding-left: 0px;padding-right: 0px;border-bottom: 1px solid #ccc; margin-top: 21px;">
		<div class="col-md-4" style="color: #660033;border-bottom: 2px solid #660033;padding-left: 0px;padding-right: 0px;width: 60px;">
			Bao gồm
		</div>
		<div class="col-md-8" style="padding-left: 0px;padding-right: 0px">&nbsp;</div>
	</div>
	<div class="col-md-12" style="padding-left: 0px;padding-right: 0px">
		<div class="form-group">
			<label class=" control-label font-weight-unset"></label>
			<textarea cols="4" rows="6" class="form-control" name="info" id="txt_info"><?= $info ?></textarea>

		</div>
	</div>
</div>
<!-- ep 2-->
<div class="col-md-4" style="padding-left: 0px;padding-right: 0px;background: white;">
	<div class="col-md-12" style="padding-left: 0px;padding-right: 0px;border-bottom: 1px solid #ccc">
		<div class="col-md-4" style="color: #660033;border-bottom: 2px solid #660033;padding-left: 0px;padding-right: 0px;width: 96px;">
			Thông tin khác
		</div>
		<div class="col-md-8" style="padding-left: 0px;padding-right: 0px">&nbsp;</div>
	</div>
	<div class="col-md-12" style="padding-left: 0px;padding-right: 0px">
		<div class="form-group">
			<label class=" control-label font-weight-unset"></label>
			<textarea cols="4" rows="6" class="form-control" name="extra_info"><?= $extra_info ?></textarea>

		</div>
	</div>
</div>
<!--ep 3 -->
<div class="col-md-4" style="padding-left: 0px;padding-right: 0px;background: white;">
	<div class="col-md-12" style="padding-left: 0px;padding-right: 0px;border-bottom: 1px solid #ccc">
		<div class="col-md-4" style="color: #660033;border-bottom: 2px solid #660033;    padding-left: 0px;padding-right: 0px;width: 89px;">
			Điều kiện hủy
		</div>
		<div class="col-md-8" style="padding-left: 0px;padding-right: 0px">&nbsp;</div>
	</div>
	<div class="col-md-12" style="padding-left: 0px;padding-right: 0px">
		<div class="form-group">
			<label class=" control-label font-weight-unset"></label>
			<textarea cols="4" rows="11" class="form-control" name="cancel_condition" id="txt_cancel_condition"><?= $hotel_detail->hotel_policy ?></textarea>

		</div>
	</div>
</div>
<!-- -->
<div class="col-md-4" style="padding-left: 0px;padding-right: 0px;background: white;">
	<div class="col-md-12" style="padding-left: 0px;padding-right: 0px;border-bottom: 1px solid #ccc">
		<div class="col-md-4" style="color: #660033;border-bottom: 2px solid #660033;padding-left: 0px;
    padding-right: 0px;width: 43px;
    ">Lưu ý
		</div>
		<div class="col-md-10" style="padding-left: 0px;padding-right: 0px;font-size: 12px;margin-top: 4px;">
			Thông tin mặc định (<u style="cursor: pointer;" onclick="javascript:enableLuuY()">chỉnh sửa lại thông
				tin</u>)
		</div>
	</div>
	<div class="col-md-12" style="padding-left: 0px;padding-right: 0px">
		<div class="form-group">
			<label class=" control-label font-weight-unset"></label>
			<textarea cols="4" rows="20" class="form-control" id="txt_attentive" name="attentive"> - Theo quy định của khách sạn giờ nhận phòng :14:00 PM và giờ trả phòng 12:00PM.
- Trong trường hợp đến khách sạn, resort sớm và muốn nhận phòng sớm hơn theo quy định .Vui lòng liên hệ tiếp tân để được hỗ trợ và việc check - in sớm còn tùy thuộc vào tình trạng phòng trong ngày bạn đến.Không được xác nhận trước.
- Theo quy định của pháp luật Việt Nam .Khi một người mang quốc tịch Việt Nam và một người mang quốc tịch nước ngoài ỡ chung phòng thì phải có giấy kết hôn.
- Nếu Quý khách cần hỗ trợ thông tin về(Vật nuôi,xe lăn,nôi em bé ...).Vui lòng gọi (028) 3826 8797 hoặc Hotline: 09 6868 0106 để được nhân viên tư vấn.
			</textarea>

		</div>
	</div>
</div>

<div class="col-md-4" style="padding-left: 0px;padding-right: 0px;background: white;padding-top: 15px">

	<div class="col-md-12 text-center" style="padding-left: 0px;padding-right: 0px">
		<button style="background: #660033;color: white;width: 100%;border: 1px solid white;height: 40px" onclick="javascript:editVoucher()">
			EDIT
			VOUCHER
		</button>
	</div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        enableLuuY();
    });

    function enableLuuY() {
        if ($('#txt_attentive').is(':disabled')) {
            $("#txt_attentive").prop('disabled', false);
        }
        else {
            $("#txt_attentive").prop('disabled', true);
        }

    }

    $("#generate_voucher_code").click(function () {
        $.post("<?php echo base_url();?>admin/voucher/generate_voucher_code", {}, function (res) {
            $("#txt_combo_code").val(res);
        });
    });


    function getInfo() {
        simpleAjaxPost(
            "<?php echo base_url();?>admin/voucher/get_info",
            "#info_customer",
            function (res) {
                $("input[name='v_name']").val(res.content[0].v_name);
                $("input[name='v_email']").val(res.content[0].v_email);
                $("input[name='v_phone']").val(res.content[0].v_phone);
                $("input[name='v_address']").val(res.content[0].v_address);
            }
        );
    }

</script>