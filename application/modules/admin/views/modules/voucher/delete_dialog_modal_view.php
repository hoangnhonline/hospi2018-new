<div class="modal-dialog modal-lg">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title"><?= $model_header ?></h4>
		</div>
		<div class="modal-body" id="div_delete_voucher" style="padding:10px">
			<?php
			include "delete_dialog_modal_data.php";
			?>
			<div class="clearfix"></div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-primary submitvoucher" id="btn_delete_voucher">
				<i class="fa fa-save"></i>
				Submit
			</button>
		</div>
	</div>
</div>