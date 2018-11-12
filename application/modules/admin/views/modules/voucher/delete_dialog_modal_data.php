Bạn chắc chắn muốn . <?= $model_header ?>
<?php
if (is_array($id)) {
	foreach ($id as $item) {
		?>
		<input type="hidden" name="id[]" value="<?= $item ?>"/>
		<?php
	}
} else {
	?>
	<input type="hidden" name="id" value="<?= $id ?>"/>
	<?php
}
?>
