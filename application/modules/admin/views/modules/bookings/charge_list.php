<div class="col-md-3">
	<div class="form-group">
		<label for="username0" class=" control-label font-weight-unset">Giá combo trọn gói</label>
		<div>
			<label style="padding: 6px;background: #e5e5e5"><?php echo $model['baseCharge']['price'] ?> VND</label>
		</div>

	</div>
</div>
<div class="col-md-3">
	<div class="form-group">
		<label for="username0" class=" control-label font-weight-unset">Số lượng</label>

		<input onkeyup ="loadPrice()" type="text" class="form-control" value="0" name="basecharge_quantity">

	</div>
</div>
<div class="clearfix"></div>
<?php
$i = 0;
foreach ($model['surcharge_list'] as $key => $surcharge) {
	$i++;
	?>
	<div class="col-md-3">
		<div class="form-group">
			<label for="username0" class=" control-label font-weight-unset"><?php echo $surcharge['name'] ?></label>
			<div>
				<label style="padding: 6px;background: #e5e5e5"><?php echo number_format($surcharge['price']) ?> VND</label>
			</div>

		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<label for="username0" class=" control-label font-weight-unset">Số lượng</label>
			<input onkeyup ="loadPrice()" type="text" class="form-control" value="0" name="surcharge_list[<?php echo $i; ?>][quantity]">
			<input type="hidden" class="form-control" value="<?php echo $surcharge['id'] ?>" name="surcharge_list[<?php echo $i; ?>][id]">
			<input type="hidden" class="form-control" value="<?php echo $surcharge['name'] ?>" name="surcharge_list[<?php echo $i; ?>][name]">
			<input type="hidden" class="form-control" value="<?php echo $surcharge['price'] ?>" name="surcharge_list[<?php echo $i; ?>][price]">

		</div>
	</div>
	<div class="clearfix"></div>
<?php } ?>