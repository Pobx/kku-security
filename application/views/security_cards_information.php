<div class="form-group">
	<label for="numbers" class="col-sm-2 control-label">เลขที่บัตร</label>

	<div class="col-sm-4">
		<input type="text" class="form-control" id="numbers" name="numbers" placeholder="เลขที่บัตร" value="<?php echo $numbers; ?>">
	</div>
</div>

<div class="form-group">
	<label for="people_name" class="col-sm-2 control-label">ชื่อ - สกุล</label>

	<div class="col-sm-4">
		<input type="text" class="form-control" id="people_name" name="people_name" placeholder="ชื่อ - สกุล" value="<?php echo $people_name; ?>">
	</div>
</div>


<div class="form-group">
	<label for="people_position" class="col-sm-2 control-label">ตําแหน่ง</label>

	<div class="col-sm-4">
		<input type="text" class="form-control" id="people_position" name="people_position" placeholder="ตําแหน่ง" value="<?php echo $people_position; ?>">
	</div>
</div>

<div class="form-group">
	<label for="people_department_name" class="col-sm-2 control-label">สังกัด</label>

	<div class="col-sm-4">
		<input type="text" class="form-control" id="people_department_name" name="people_department_name" placeholder="สังกัด"
		value="<?php echo $people_department_name; ?>">
	</div>
</div>

<div class="form-group">
	<label for="car_license_plate" class="col-sm-2 control-label">ทะเบียน</label>

	<div class="col-sm-4">
		<input type="text" class="form-control" id="car_license_plate" name="car_license_plate" placeholder="ทะเบียน" value="<?php echo $car_license_plate; ?>">
	</div>
</div>

<div class="form-group">
	<label for="car_brand" class="col-sm-2 control-label">ยี่ห้อ</label>

	<div class="col-sm-4">
		<input type="text" class="form-control" id="car_brand" name="car_brand" placeholder="ยี่ห้อ" value="<?php echo $car_brand; ?>">
	</div>
</div>

<div class="form-group">
	<label for="car_color" class="col-sm-2 control-label">สี</label>

	<div class="col-sm-4">
		<input type="text" class="form-control" id="car_color" name="car_color" placeholder="สี" value="<?php echo $car_color; ?>">
	</div>
</div>

<div class="form-group">
	<label for="issue_date" class="col-sm-2 control-label">วันออกบัตร</label>

	<div class="col-sm-4">
		<input type="text" class="form-control datepicker" id="issue_date" name="issue_date" data-provide="datepicker"
		data-date-language="th-th" placeholder="วันออกบัตร" value="<?php echo $issue_date; ?>">
	</div>
</div>

<div class="form-group">
	<label for="expire_date" class="col-sm-2 control-label">วันหมดอายุ</label>

	<div class="col-sm-4">
		<input type="text" class="form-control datepicker" id="expire_date" name="expire_date" data-provide="datepicker"
		data-date-language="th-th" placeholder="วันหมดอายุ" value="<?php echo $expire_date; ?>">
	</div>
</div>
