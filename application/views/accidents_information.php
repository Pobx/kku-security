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
			<option value="">เลือก</option>
			<?php foreach ($accident_place as $key => $value) {?>
			<option value="<?php echo $value['id'];?>">
				<?php echo $value['name'];?>
			</option>
			<?php }?>
		</select>
	</div>
</div>

<div class="form-group">
	<label for="place" class="col-sm-2 control-label">สถานที่(อื่นๆ)</label>

	<div class="col-sm-4">
		<!-- <textarea class="form-control" rows="3" id="place" name="place" placeholder="สถานที่"><?php //echo $place;?></textarea> -->
		<input type="text" name="place_text" id="place_text" class="form-control">
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">สาเหตุ</label>
	<div class="col-sm-4">
		<select class="form-control select2" name="accident_cause" id="accident_cause">
			<option value="">เลือก</option>
			<?php foreach ($accident_cause as $key => $value) {?>
			<option value="<?php echo $value['id'];?>">
				<?php echo $value['name'];?>
			</option>
			<?php }?>
		</select>
	</div>
</div>

<div class="form-group">
	<label for="accident_cause" class="col-sm-2 control-label">สาเหตุ(อื่นๆ)</label>

	<div class="col-sm-4">
		<input type="text" name="accident_cause_text" id="accident_cause_text" class="form-control">
		<!-- <textarea class="form-control" rows="3" id="accident_cause" name="accident_cause" placeholder="สาเหตุ"><?php //echo $accident_cause;?></textarea> -->
	</div>
</div>
