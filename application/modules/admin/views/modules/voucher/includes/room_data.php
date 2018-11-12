<?php
if ($list_room != null) {
	foreach ($list_room as $room_item) {
		$id = array_keys($room_item)[0];
		$quantity = array_values($room_item)[0];
		?>
		<div class="clonedEducation">
			<div class="col-md-6">
				<div class="form-group">
					<label class=" control-label font-weight-unset">Loại
						phòng</label>
					<select class="form-control chosen-select" name="room_id[]">
						<?php
						foreach ($rooms as $key => $name) {
							$selected = "";
							if (isset($id) && $key == $id) {
								$selected = "selected";
							}
							?>
							<option value="<?= $key ?>" <?= $selected ?>><?= $name ?></option>
							<?php
						}
						?>
					</select>
				</div>
			</div>
			<div class="col-md-2" style="margin-left: 30px">
				<div class="form-group">
					<label class=" control-label font-weight-unset">Số lượng
						phòng</label>
					<input type="number" class="form-control" name="quantity[]" value="<?= $quantity ?>"/>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="noo-addable-actions col-md-9">
				<a class="noo-clone-fields-education pull-left" onclick="javascript:addRoom($(this))">
					<i class="fa fa-plus-circle text-primary"></i>
					Thêm loại phòng
				</a>
				<a class="noo-remove-fields-education pull-right" onclick="javascript:removeRoom($(this))">
					<i class="fa fa-times-circle"></i>
					Xoá
				</a>
			</div>
			<div class="clearfix"></div>
		</div>
		<?php
	}
} else {
	?>
	<div class="clonedEducation">
		<div class="col-md-6">
			<div class="form-group">
				<label class=" control-label font-weight-unset">Loại
					phòng</label>
				<select class="form-control chosen-select" name="room_id[]">
					<?php
					foreach ($rooms as $key => $name) {
						?>
						<option value="<?= $key ?>"><?= $name ?></option>
						<?php
					}
					?>
				</select>
			</div>
		</div>
		<div class="col-md-2" style="margin-left: 30px">
			<div class="form-group">
				<label class=" control-label font-weight-unset">Số lượng
					phòng</label>

				<input type="number" class="form-control" name="quantity[]">
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="noo-addable-actions col-md-9">
			<a class="noo-clone-fields-education pull-left" onclick="javascript:addRoom($(this))">
				<i class="fa fa-plus-circle text-primary"></i>
				Thêm loại phòng
			</a>
			<a class="noo-remove-fields-education pull-right" onclick="javascript:removeRoom($(this))">
				<i class="fa fa-times-circle"></i>
				Xoá
			</a>
		</div>
		<div class="clearfix"></div>
	</div>
	<?php
}

?>
