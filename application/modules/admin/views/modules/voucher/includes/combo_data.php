<div class="form-group ">
	<label for="select-standard" class="control-label font-weight-unset">
		Chọn combo
	</label>
	<select class="form-control chosen-select" name="combo_id" >
		<?php
		foreach ($combos as $combo) {
			$select = "";
			if (isset($params['combo_id']) && $combo->offer_id == $params['combo_id']) {
				$select = "selected";
			}
			?>
			<option value="<?= $combo->offer_id ?>" <?= $select ?>><?= $combo->offer_title ?></option>
			<?php
		}
		?>
	</select>
</div>