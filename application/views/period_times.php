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
