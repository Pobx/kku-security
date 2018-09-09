<?php $this->load->view('period_times');?>
<div class="form-group">
	<label for="date_break" class="col-sm-2 control-label">วันที่</label>

	<div class="col-sm-2">
		<input type="text" class="form-control datepicker" id="date_break" name="date_break" data-provide="datepicker"
		data-date-language="th-th" placeholder="วันที่" value="<?php echo $date_break_only; ?>">
	</div>

	<label for="date_break" class="col-sm-1 control-label">เวลา</label>

	<div class="col-sm-2">
		<input type="text" class="form-control" id="time_break" name="time_break" placeholder="เวลา" value="<?php echo $date_break_time_only; ?>"
		data-inputmask='"mask": "99:99"' data-mask>
	</div>
</div>

<div class="form-group">
	<label for="victim_name" class="col-sm-2 control-label">ชื่อ&nbsp;-&nbsp;สกุล</label>

	<div class="col-sm-4">
		<input type="text" class="form-control" id="victim_name" name="victim_name" placeholder="ชื่อ - สกุล" value="<?php echo $victim_name; ?>">
	</div>
</div>
<?php $this->load->view('people_type');?>

<div class="form-group" id="div_victim_department_name">
	<label for="victim_department_name" id="label_victim_department_name" class="col-sm-2 control-label">สังกัดหน่วยงาน</label>

	<div class="col-sm-4">
		<input type="text" class="form-control" id="victim_department_name" name="victim_department_name" placeholder="สังกัดหน่วยงาน"
		value="<?php echo $victim_department_name; ?>">
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
