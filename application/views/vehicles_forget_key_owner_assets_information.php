<p>
	<strong>ข้อมูลเจ้าของทรัพย์สิน</strong>
</p>

<?php $this->load->view('period_times');?>

<div class="form-group">
	<label for="date_forget_key" class="col-sm-2 control-label">วันที่</label>

	<div class="col-sm-4">
		<input type="text" class="form-control datepicker" id="date_forget_key" name="date_forget_key" data-provide="datepicker"
		data-date-language="th-th" placeholder="วันที่" value="<?php echo $date_forget_key; ?>">
	</div>
</div>

<?php $this->load->view('people_type');?>

<div class="form-group">
	<label for="owner_assets_name" class="col-sm-2 control-label">ชื่อ&nbsp;-&nbsp;สกุล</label>

	<div class="col-sm-4">
		<input type="text" class="form-control" id="owner_assets_name" name="owner_assets_name" placeholder="ชื่อ - สกุล"
		value="<?php echo $owner_assets_name; ?>">
	</div>
</div>

<div class="form-group" id="div_owner_assets_department">
	<label for="owner_assets_department" class="col-sm-2 control-label">สังกัดหน่วยงาน</label>

	<div class="col-sm-4">
		<input type="text" class="form-control" id="owner_assets_department" name="owner_assets_department" placeholder="สังกัดหน่วยงาน"
		value="<?php echo $owner_assets_department; ?>">
	</div>
</div>

<div class="form-group">
	<label for="owner_assets_age" class="col-sm-2 control-label">อายุ(ปี)</label>

	<div class="col-sm-4">
		<input type="number" class="form-control" id="owner_assets_age" name="owner_assets_age" placeholder="อายุ(ปี)" value="<?php echo $owner_assets_age; ?>">
	</div>
</div>

<div class="form-group">
	<label for="owner_assets_phone" class="col-sm-2 control-label">เบอร์ติดต่อ</label>

	<div class="col-sm-4">
		<input type="text" class="form-control" id="owner_assets_phone" name="owner_assets_phone" placeholder="เบอร์ติดต่อ"
		value="<?php echo $owner_assets_phone; ?>">
	</div>
</div>

<div class="form-group">
	<label for="owner_assets_forget_key_place" class="col-sm-2 control-label">สถานที่ลืม</label>

	<div class="col-sm-4">
		<input type="text" class="form-control" id="owner_assets_forget_key_place" name="owner_assets_forget_key_place"
		placeholder="สถานที่ลืม" value="<?php echo $owner_assets_forget_key_place; ?>">
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">ประเภทยานพาหนะ</label>

	<div class="col-sm-4">
		<label>
			<input type="radio" name="car_type" class="flat-red" value="car" <?php if ($car_type=='car' ) { echo "checked" ;}?>>&nbsp;รถยนต์
			<input type="radio" name="car_type" class="flat-red" value="motorcycle" <?php if ($car_type=='motorcycle' ||
			$car_type=='' ) { echo "checked" ;}?>>&nbsp;รถจักรยานยนต์
		</label>
	</div>
</div>

<div class="form-group">
	<label for="license_plate" class="col-sm-2 control-label">ทะเบียน</label>

	<div class="col-sm-4">
		<input type="text" class="form-control" id="license_plate" name="license_plate" placeholder="ทะเบียน" value="<?php echo $license_plate; ?>">
	</div>
</div>

<div class="form-group">
	<label for="brand" class="col-sm-2 control-label">ยี่ห้อ</label>

	<div class="col-sm-4">
		<input type="text" class="form-control" id="brand" name="brand" placeholder="ยี่ห้อ" value="<?php echo $brand; ?>">
	</div>
</div>

<div class="form-group">
	<label for="model" class="col-sm-2 control-label">รุ่น</label>

	<div class="col-sm-4">
		<input type="text" class="form-control" id="model" name="model" placeholder="รุ่น" value="<?php echo $model; ?>">
	</div>
</div>

<div class="form-group">
	<label for="color" class="col-sm-2 control-label">สี</label>

	<div class="col-sm-4">
		<input type="text" class="form-control" id="color" name="color" placeholder="สี" value="<?php echo $color; ?>">
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">สภาพรถ</label>
	<div class="col-sm-4">
		<select class="form-control select2" id="ddl_car_state">
			<option selected="selected">เลือก</option>
			<option value="new">ใหม่</option>
			<option value="old">เก่า</option>
			<option value="other">อื่นๆ</option>
		</select>
	</div>
</div>

<div class="form-group" id="div_car_state">
	<label for="car_state" class="col-sm-2 control-label">สภาพรถ(อื่นๆ)</label>

	<div class="col-sm-4">
		<input type="text" class="form-control" id="car_state" name="car_state" placeholder="สภาพรถ" value="<?php echo $car_state; ?>">
	</div>
</div>
