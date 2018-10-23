<div class="row">
	<div class="form-group col-md-4">
	<!-- <php $this->load->view('period_times');?> -->

		<label class="col-sm-4 control-label">ช่วงเวลา</label>

		<div class="col-sm-8">
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

	<div class="form-group col-md-3">
		<label for="date_forget_key" class="col-sm-4 control-label">วันที่</label>

		<div class="col-sm-8">
			<input type="text" class="form-control datepicker" id="date_forget_key" name="date_forget_key" data-provide="datepicker"
			data-date-language="th-th" placeholder="วันที่" value="<?php echo $date_forget_key; ?>">
		</div>
	</div>

	<div class="form-group col-md-5">
		<!-- <php $this->load->view('ppeople_type');?> -->

		<label class="col-sm-3 control-label">ประเภท</label>

		<div class="col-sm-9">
			<label>
				<input type="radio" name="people_type" class="flat-red" value="student" <?php if ($people_type=='student' ) { echo
				"checked" ;}?>>&nbsp;นักศึกษา
				<input type="radio" name="people_type" class="flat-red" value="staff" <?php if ($people_type=='staff' ) { echo
				"checked" ;}?>>&nbsp;บุคลากร
				<input type="radio" name="people_type" class="flat-red" value="people_outside" <?php if ($people_type=='people_outside'
				) { echo "checked" ;}?>>&nbsp;คนภายนอก
			</label>
		</div>
	</div>
</div>


<div class="row">
	<div class="form-group col-md-6">
		<label for="owner_assets_name" class="col-sm-4 control-label">ชื่อ&nbsp;-&nbsp;สกุล</label>

		<div class="col-sm-8">
			<input type="text" class="form-control" id="owner_assets_name" name="owner_assets_name" placeholder="ชื่อ - สกุล"
			value="<?php echo $owner_assets_name; ?>">
		</div>
	</div>

	<div class="form-group col-md-6" id="">
		<label for="owner_assets_department" class="col-sm-4 control-label">สังกัดหน่วยงาน</label>

		<div class="col-sm-8">
			<input type="text" class="form-control" id="owner_assets_department" name="owner_assets_department" placeholder="สังกัดหน่วยงาน"
			value="<?php echo $owner_assets_department; ?>">
		</div>
	</div>

</div>


<div class="row">
	<div class="form-group col-md-6">
		<label for="owner_assets_age" class="col-sm-4 control-label">อายุ(ปี)</label>

		<div class="col-sm-8">
			<input type="number" class="form-control" id="owner_assets_age" name="owner_assets_age" placeholder="อายุ(ปี)" value="<?php echo $owner_assets_age; ?>">
		</div>
	</div>
	<div class="form-group col-md-6">
		<label for="owner_assets_phone" class="col-sm-4 control-label">เบอร์ติดต่อ</label>

		<div class="col-sm-8">
			<input type="text" class="form-control" id="owner_assets_phone" name="owner_assets_phone" placeholder="เบอร์ติดต่อ"
			value="<?php echo $owner_assets_phone; ?>">
		</div>
	</div>

</div>

<div class="row">
	<div class="form-group">
		<label for="owner_assets_forget_key_place" class="col-sm-2 control-label">สถานที่ลืม</label>

		<div class="col-sm-4">
			<select class="form-control select2" name="vehicles_forget_key_place_id" id="vehicles_forget_key_place_id">
				<option>เลือก</option>
				<?php foreach ($resluts_forget_key_place as $key => $value) {?>
				<option value="<?php echo $value['id'];?>">
					<?php echo $value['name'];?>
				</option>
				<?php }?>
			</select>

			<input type="text" class="form-control" id="place_text" name="place_text" placeholder="สถานที่ลืม" value="">
		</div>

		<div class="col-sm-2">
			<input type="checkbox" class="flat-red" name="chk_place" value="checked_new_place">&nbsp;สถานที่(อื่นๆ)
		</div>
	</div>
</div>


<!-- <div class="form-group">
	<label for="owner_assets_forget_key_place" class="col-sm-2 control-label">ผู้ที่เก็บได้</label>

	<div class="col-sm-4">
		<select class="form-control select2" name="vehicles_forget_key_security_id" style="display:block" id="vehicles_forget_key_security_id">
			<option value="">เลือก</option>
			<php foreach ($key_keeper as $key => $val) {?>
			<option value="<php echo $val['id'];?>">
				<php echo $val['name'];?>
			</option>
			<php }?>
		</select>
		
	</div>

	
</div> -->
<!-- <div class="form-group">
	<label for="owner_assets_forget_key_place" class="col-sm-2 control-label">&nbsp;</label>
	<div class="col-sm-4">
		<div class="row">
				<div class="col-sm-3">
					<input type="checkbox"  name="chk_keeper" id="chk_keeper">บุคคลอื่น
				</div>
				<div class="col-sm-9">
					<input type="text" name="keeper_no_as_security" id="keeper_no_as_security" 
						placeholder="ใส่ชื่อผู้ที่เก็บได้ที่ไม่ใช่เจ้าที่ รปภ." class="form-control" style="display:none">

				</div>
		</div>
		
	</div>
</div> -->

<div class="row">
	<div class="form-group col-md-6">
		<label class="col-sm-4 control-label">ประเภทยานพาหนะ</label>

		<div class="col-sm-8">
			<label>
				<input type="radio" name="car_type" class="flat-red" value="car" <?php if ($car_type=='car' ) { echo "checked" ;}?>>&nbsp;รถยนต์
				<input type="radio" name="car_type" class="flat-red" value="motorcycle" <?php if ($car_type=='motorcycle' ||
				$car_type=='' ) { echo "checked" ;}?>>&nbsp;รถจักรยานยนต์
			</label>
		</div>
	</div>

	<div class="form-group col-md-6">
		<label for="license_plate" class="col-sm-4 control-label">ทะเบียน</label>

		<div class="col-sm-8">
			<input type="text" class="form-control" id="license_plate" name="license_plate" placeholder="ทะเบียน" value="<?php echo $license_plate; ?>">
		</div>
	</div>
</div>

<div class="row">
	<div class="form-group col-md-3">
		<label for="brand" class="col-sm-4 control-label">ยี่ห้อ</label>

		<div class="col-sm-8">
			<input type="text" class="form-control" id="brand" name="brand" placeholder="ยี่ห้อ" value="<?php echo $brand; ?>">
		</div>
	</div>

	<div class="form-group col-md-3">
		<label for="model" class="col-sm-4 control-label">รุ่น</label>

		<div class="col-sm-8">
			<input type="text" class="form-control" id="model" name="model" placeholder="รุ่น" value="<?php echo $model; ?>">
		</div>
	</div>

	<div class="form-group col-md-3">
		<label for="color" class="col-sm-4 control-label">สี</label>

		<div class="col-sm-8">
			<input type="text" class="form-control" id="color" name="color" placeholder="สี" value="<?php echo $color; ?>">
		</div>
	</div>

	<div class="form-group col-md-3">
		<label class="col-sm-5 control-label">สภาพรถ</label>
		<div class="col-sm-7">
			<select class="form-control select2" id="car_state" name="car_state">
				<option selected="selected">เลือก</option>
				<option value="new">ใหม่</option>
				<option value="old">เก่า</option>
				<option value="other">อื่นๆ</option>
			</select>
		</div>
	</div>

	<div class="form-group col-md-3" id="div_state_comment">
		<label for="state_comment" class="col-sm-5 control-label">สภาพรถ(อื่นๆ)</label>

		<div class="col-sm-7">
			<input type="text" class="form-control" id="state_comment" name="state_comment" placeholder="สภาพรถ" value="<?php echo $state_comment; ?>">
		</div>
	</div>
</div>

