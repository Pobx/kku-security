<div class="form-group">
	<label for="accident_date" class="col-sm-2 control-label">วันที่</label>

	<div class="col-sm-4">
		<input type="text" class="form-control datepicker" id="accident_date" name="accident_date" data-provide="datepicker"
		data-date-language="th-th" placeholder="วันที่" value="<?php echo $accident_date; ?>">
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">ช่วงเวลา</label>

	<div class="col-sm-4">
		<label>
			<input type="radio" name="period_time" class="flat-red" value="morning" <?php if ($period_time=='morning' ) { echo
			"checked" ;}?>>&nbsp;เช้า
			<input type="radio" name="period_time" class="flat-red" value="afternoon" <?php if ($period_time=='afternoon' ) {
			echo "checked" ;}?>>&nbsp;บ่าย
			<input type="radio" name="period_time" class="flat-red" value="night" <?php if ($period_time=='night' ) { echo
			"checked" ;}?>>&nbsp;ดึก
		</label>
	</div>
</div>

<div class="form-group">
	<label for="place" class="col-sm-2 control-label">สถานที่</label>

	<div class="col-sm-4">
		<textarea class="form-control" rows="3" id="place" name="place" placeholder="สถานที่"><?php echo $place;?></textarea>
	</div>
</div>

<div class="form-group">
	<label for="accident_cause" class="col-sm-2 control-label">สาเหตุ</label>

	<div class="col-sm-4">
		<textarea class="form-control" rows="3" id="accident_cause" name="accident_cause" placeholder="สาเหตุ"><?php echo $accident_cause;?></textarea>
	</div>
</div>
