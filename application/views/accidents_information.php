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
	<label class="col-sm-2 control-label">สถานที่</label>
	<div class="col-sm-4">
		<select class="form-control select2" name="place" id="place">
			<option>เลือก</option>
			<?php foreach ($accident_place as $key => $value) {?>
			<option value="<?php echo $value['id'];?>" <?php if ($place==$value['id']) { echo 'selected' ;}?>>
				<?php echo $value['name'];?>
			</option>
			<?php }?>
		</select>

		<input type="text" name="place_text" id="place_text" class="form-control">
	</div>

	<div class="col-sm-1">
		<input type="checkbox" class="flat-red" name="chk_place" value="checked_new_place">&nbsp;สถานที่(อื่นๆ)
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">สาเหตุ</label>
	<div class="col-sm-4">
		<select class="form-control select2" name="accident_cause" id="accident_cause">
			<option>เลือก</option>
			<?php foreach ($accident_causes as $key => $value) {?>
			<option value="<?php echo $value['id'];?>" <?php if ($accident_cause==$value['id']) { echo 'selected' ;}?>>
				<?php echo $value['name'];?>
			</option>
			<?php }?>
		</select>

		<input type="text" name="accident_cause_text" id="accident_cause_text" class="form-control">
	</div>

	<div class="col-sm-1">
		<input type="checkbox" class="flat-red" name="chk_accident_cause" value="checked_new_accident_cause">&nbsp;สาเหตุ(อื่นๆ)
	</div>
</div>
