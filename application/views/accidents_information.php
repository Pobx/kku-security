<div class="form-group">
	<label for="accident_date" class="col-sm-2 control-label">วันที่</label>

	<div class="col-sm-2">
		<input type="text" class="form-control datepicker" id="accident_date" name="accident_date" data-provide="datepicker"
		 data-date-language="th-th" placeholder="วันที่" value="<?php echo $accident_date; ?>">
	</div>

	<label for="date_break" class="col-sm-1 control-label">เวลา</label>

	<div class="col-sm-2">
		<input type="text" class="form-control" id="accident_time" name="accident_time" placeholder="เวลา" value="<?php echo $accident_time; ?>"
		 data-inputmask='"mask": "99:99"' data-mask>
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

<div class="form-group">
	<label for="" class="col-sm-2 control-label">ทรัพย์สินราชการเสียหาย</label>
	<label for="assets_name" class="col-sm-1 control-label">ชื่อทรัพย์สิน</label>
	<div class="col-sm-2">
		<input type="text" class="form-control" id="assets_name" name="assets_name" placeholder="ชื่อทรัพย์สิน" value="<?php echo $assets_name; ?>">
	</div>

	<label for="assets_amount" class="col-sm-1 control-label">จำนวน</label>

	<div class="col-sm-2">
		<input type="text" class="form-control" id="assets_amount" name="assets_amount" placeholder="จำนวน" value="<?php echo $assets_amount; ?>">
	</div>

	<label for="assets_remark" class="col-sm-1 control-label">หมายเหตุ</label>

	<div class="col-sm-2">
		<input type="text" class="form-control" id="assets_remark" name="assets_remark" placeholder="หมายเหตุ" value="<?php echo $accident_time; ?>">
	</div>
</div>
