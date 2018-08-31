<div class="form-group">
	<label for="date_break" class="col-sm-2 control-label">วันที่</label>

	<div class="col-sm-4">
		<?php echo $date_break_only; ?>
		<?php echo $date_break_time_only; ?>

		<input type="text" class="form-control datepicker" id="date_break" name="date_break" data-provide="datepicker"
		data-date-language="th-th" placeholder="วันที่" value="<?php echo $date_break; ?>">
	</div>
</div>

<div class="form-group">
	<label for="victim_name" class="col-sm-2 control-label">ชื่อ&nbsp;-&nbsp;สกุล</label>

	<div class="col-sm-4">
		<input type="text" class="form-control" id="victim_name" name="victim_name" placeholder="ชื่อ - สกุล" value="<?php echo $victim_name; ?>">
	</div>
</div>

<div class="form-group">
	<label for="victim_address" class="col-sm-2 control-label">สังกัดหน่วยงาน</label>

	<div class="col-sm-4">
		<input type="text" class="form-control" id="victim_address" name="victim_address" placeholder="สังกัดหน่วยงาน" value="<?php echo $victim_address; ?>">
	</div>
</div>

<div class="form-group">
	<label for="place" class="col-sm-2 control-label">สถานที่เกิดเหตุ</label>

	<div class="col-sm-4">
		<textarea class="form-control" id="place" name="place"><?php echo $place; ?></textarea>
	</div>
</div>

<div class="form-group">
	<label for="assets_loses" class="col-sm-2 control-label">รายการของที่สูญหาย</label>

	<div class="col-sm-4">
		<textarea class="form-control" id="assets_loses" name="assets_loses"><?php echo $assets_loses; ?></textarea>
	</div>
</div>

<div class="form-group">
	<label for="remark" class="col-sm-2 control-label">หมายเหตุ</label>

	<div class="col-sm-4">
		<textarea class="form-control" id="remark" name="remark"><?php echo $remark; ?></textarea>
	</div>
</div>
