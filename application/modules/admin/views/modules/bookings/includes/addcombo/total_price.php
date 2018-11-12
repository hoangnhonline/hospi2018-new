<div class="col-md-12" style="border: 1px solid #ccc;margin-top: 15px;">
	<div class="form-group" style="padding-top: 10px;">
		<label for="select-standard" style="font-size: 12px;padding-right: 0px" class="control-label cl-tim">
			<?php if (isset($model['combo_id'])) echo $model['baseCharge']['name'] ?>
			<?php if (isset($model['city_id'])) echo $model['city_name'] ?></label>
		<?php if (isset($model['combo_id']) && !empty($model['combo_id']) && ($model['basecharge_quantity']>0) ) { ?>
			<div>
				<label class="cl-grey font-weight-unset" style="color: #ccc;font-size: 13px"><?php echo number_format($model['baseCharge']['price']) ?>
					x <?php echo $model['basecharge_quantity'] ?> (combo)
					=<?php echo number_format($model['baseChargeTotal']); ?> VND</label>
			</div>

		<?php } ?>

	</div>
	<div class="col-md-3" style="height: 1px;background: #660033;margin-top: -9px;"></div>
	<div class="clearfix"></div>
	<?php if (isset($model['surcharge_list']) && isset($model['combo_id']) && !empty($model['combo_id'])) {
		foreach ($model['surcharge_list'] as $key => $surcharge) {
			$subTotal = $surcharge['quantity'] * $surcharge['price'];
			if($surcharge['quantity']>0){
			?>

			<div class="form-group">
				<label for="select-standard" style="font-size: 12px;padding-right: 0px" class="control-label cl-tim"><?php echo $surcharge['name'] ?></label>
				<div>
					<label class="cl-grey font-weight-unset" style="color: #ccc;font-size: 13px"><?php echo number_format($surcharge['price']) ?>
						x <?php echo $surcharge['quantity'] ?>(combo)
						= <?php echo number_format($subTotal); ?> VND</label>
				</div>

			</div>

		<?php }
		}
	} ?>

</div>
<div class="col-md-12" style="padding-left: 0px;padding-right: 0px;color: #666666;border: 1px solid #ccc;border-top: 0px">
	<div class="col-md-6 text-left padding-top-bottom-5">
		<span>Thành tiền</span>
	</div>
	<div class="col-md-6 text-right padding-top-bottom-5">
		<span><?php echo number_format($model['subTotal']); ?> VND</span>
	</div>
	<div class="col-md-6 text-left padding-top-bottom-5">
		<span>Phí VAT</span>
	</div>
	<div class="col-md-6  text-right padding-top-bottom-5">
		<span>0 VND</span>
	</div>
	<div class="col-md-6 text-left padding-top-bottom-5">
		<span>Phí dịch vụ</span>
	</div>
	<div class="col-md-6  text-right padding-top-bottom-5">
		<span>0 VND</span>
	</div>
	<div class="col-md-6 text-left padding-top-bottom-5">
		<span>Chi phí khác</span>
	</div>
	<div class="col-md-6  text-right padding-top-bottom-5">
		<span> <?php if(isset( $model['booking_extras_fee']) && (isset( $model['booking_extras_quantity'])) ) {
            $total_booking_extras_fee = $model['booking_extras_fee'] * $model['booking_extras_quantity'] ;
            echo number_format( $total_booking_extras_fee) ;
            }else{  echo '0' ;}?>VND
        </span>
	</div>
	<div class="col-md-6 text-left padding-top-bottom-5">
		<span>Thanh toán</span>
	</div>
	<div class="col-md-6  text-right padding-top-bottom-5">
		<span><?php echo number_format($model['preDiscountTotal']) ?> VND</span>
	</div>
</div>
<div class="col-md-12 no-padding cotent-giamgia">
	<div class="col-md-6">Bạn có mã giảm giá ?</div>
	<div class="col-md-3 no-padding text-center">
		<?php
		/*if ($model[ERROR_CODE] == FIELD_ERROR && isset($model[ERROR_MESSAGE]["coupon_code"])) {
			?>
			<input type="text" class="form-control" style="border: 1px solid red" title="<?php echo $model[ERROR_MESSAGE]["coupon_code"][0] ?>" value="<?php if (isset($model['coupon']['code'])) echo $model['coupon']['code'] ?>" name="coupon_code" id="coupon_code">
			<?php echo $model[ERROR_MESSAGE]["coupon_code"][0] ?>
			<?php
		} else {*/
			?>
			<input type="text" class="form-control" value="<?php if (isset($model['coupon'])) echo $model['coupon']['code'] ?>" name="coupon_code" id="coupon_code">
			<?php
		//}
		?>
	</div>
	<div class="col-md-3 no-padding text-center">
		<input onclick="checkCoupon()" type="button" class="form-control btn-tim" name="" value="Áp dụng">
	</div>
	<div class="col-md-12 cl-grey-cc padding-top-bottom-5">
        <span>
          <?php  if (isset($model['coupon']) && $model['has_coupon']  == true ) { ?>
	          Mã giảm giá <?php echo $model['coupon']['code'] ?> được áp dụng. Bạn đã được giảm
	          <?php echo number_format($model['coupon']['value']) . $model['coupon']['type'] ?>
	          /tổng hóa đơn. Số tiền được giảm thể hiện trong hóa đơn
          <?php } ?>
      </span>
	</div>
	<div class="col-md-6 cl-tim text-left">
		<span>Giảm giá</span>
	</div>
	<div class="col-md-6 cl-tim text-right">
		<span><?php echo number_format($model['discountValue']) ?> VND</span>
	</div>
</div>
<div class="col-md-12 no-padding tongthanhtoan">
	<div class="col-md-6 text-left">
		<span>Tổng thanh toán</span>
	</div>
	<div class="col-md-6 cl-tim text-right">
		<span id="booking_total_txt"><?php echo number_format($model['booking_total']) ?> VND</span>
		<input type="hidden" id ="booking_total" value="<?php echo $model['booking_total'] ?>" >
	</div>
</div>