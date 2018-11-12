<!-- content-->
<div class="panel panel-default">
	<div class="panel-heading"><?= $header_title ?></div>
	<div class="clearfix"></div>
	<div class="panel-body" style="padding-top:5px;">
		<div class="panel panel-default" style="margin-bottom:5px !important">
			<a href="<?= $add_view_link ?>" style="background: #660033;margin-left: 15px;margin-top: 15px;" class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i>
				Tạo E-Voucher</a>
			<div class="panel-body" style="padding-top: 15px;">
				<form class="form-inline" id="searchForm" role="form" method="GET" action="<?php echo base_url() . 'admin/voucher'; ?>">
					<div class="form-group" style="width:200px;">
						<select class="form-control chosen-select" name="type">
							<?php
							foreach ($list_type as $key => $value) {
								$select = "";
								if (isset($params['type']) && $key == $params['type']) {
									$select = "selected";
								}
								?>
								<option value="<?= $key ?>" <?= $select ?>><?= $value ?></option>
								<?php
							}
							?>
						</select>
					</div>

					<div class="form-group">
						<input type="text" class="form-control" value="<?=$params['code']?>" name="code" placeholder="Mã Voucher">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" value="<?=$params['v_phone']?>" name="v_phone" placeholder="Số điện thoại">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" value="<?=$params['v_email']?>" name="v_email" placeholder="Email">
					</div>
					<button type="submit" class="btn btn-inverse btn-sm">Lọc</button>
				</form>
			</div>
		</div>
		<div class="box">
			<div class="btn-group pull-right padding-left-right-15">
				<a style="margin-bottom: 5px;" href="javascript: multiDelVoucher()" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i>
					Xóa mục đã chọn</a>
				<a style="margin-bottom: 5px;margin-left: 20px;" href="" class="btn btn-default"><i class="glyphicon glyphicon-print"></i>
					In trang</a>
				<a style="margin-bottom: 5px;margin-left: 20px;" href="" class="btn btn-default"><i class="glyphicon glyphicon-file"></i>
					Xuất CSV</a>
			</div>
			<div class="clearfix"></div>
			<!-- /.box-header -->
			<div class="box-body">
				<table class="table table-bordered" id="table-list-data">
					<tbody>
					<tr style="background: #d8d8d8">
						<th style="width: 1%">
							<input class="all" type="checkbox" value="" id="select_all">
						</th>
						<th>Mã Voucher</th>
						<th>E - Voucher</th>
						<th>Tên khách</th>
						<th>Email</th>
						<th>Số điện thoại</th>
						<th>Ngày tạo</th>
						<th>Chỉnh Sửa</th>
					</tr>
					</tbody>
					<tbody>
					<?php if (!empty($content)) {
						foreach ($content as $item) {
							?>
							<tr id="row-<?= $item->id ?>" style="background: #e5e5e5">
								<td style="vertical-align: middle;">
									<input type="checkbox" name="id[]" class="checkboxcls" value="<?= $item->id ?>">
								</td>
								<td style="vertical-align: middle;">
									<?= $item->code ?>
								</td>

								<td style="vertical-align: middle;">
									<?= $list_type[$item->type] ?>
								</td>
								<td style="vertical-align: middle;">
									<?= $item->v_name ?>
								</td>

								<td style="vertical-align: middle;">
									<?= $item->v_email ?>
								</td>
								<td style="vertical-align: middle;">
									<?= $item->v_phone ?>
								</td>
								<td style="vertical-align: middle;">
									<?= $item->create_date ?>
								</td>
								<td style="white-space:nowrap; text-align:right;vertical-align: middle;">
									<a href="<?=$detail_link . "?id=". $item->code; ?>" class="btn btn-info btn-sm"><i class="fa fa-search-plus"></i></a>
									<a href="<?= $edit_view_link . "?id=". $item->id; ?>" class="btn btn-warning btn-sm" target="_self"><i class="fa fa-edit"></i></a>
									<a onclick="javascript: delVoucher(<?= $item->id ?>)" class="btn btn-danger btn-sm"><i class="fa fa-remove"></i></a>
								</td>
							</tr>
							<?php
						}
					}
					?>
					</tbody>
				</table>
				<div class="text-center"><?php echo createPagination($info); ?></div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modal_delete_voucher" tabindex="" role="dialog" aria-labelledby="voucherModal" aria-hidden="true"></div>
<!-- end-->

<script type="text/javascript">
    function delVoucher(id) {
        simpleCUDModal(
            '#modal_delete_voucher',
            '#div_delete_voucher',
            '#btn_delete_voucher',
            '<?=$del_view_link?>?id=' + id,
            '<?=$del_link?>',
            delSuccess,
            delError,
            delError);
    }

    function delSuccess(dialogId, actionBtnId, res) {
        location.reload();
    }

    function delError(dialogId, actionBtnId, res) {
        $("#modal_delete_voucher").html(res.content);
    }
    
    function viewVoucher(id) {
	    
    }
    
    function multiDelVoucher() {
        var id = $("#table-list-data :input").serialize();
        simpleCUDModal(
            '#modal_delete_voucher',
            '#div_delete_voucher',
            '#btn_delete_voucher',
            '<?=$del_view_link?>?' + id,
            '<?=$del_link?>',
            delSuccess,
            delError,
            delError);
    }
</script>