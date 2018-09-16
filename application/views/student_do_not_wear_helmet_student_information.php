<style>
	.hide{
		display:none;
	}
	.show{
		display:block
	}
</style>

<div class="form-group">
	<label for="inspect_date" class="col-sm-2 control-label">วันที่</label>

	<div class="col-sm-4">
		<input type="text" class="form-control datepicker" id="inspect_date" name="inspect_date" data-provide="datepicker"
		 data-date-language="th-th" placeholder="วันที่" value="<?php echo $inspect_date; ?>">
	</div>
</div>

<?php $this->load->view('period_times');?>

<div class="form-group">
	<label for="place" class="col-sm-2 control-label">สถานที่</label>

	<div class="col-sm-4">
		<input type="text" class="form-control" id="place" name="place" placeholder="สถานที่" value="<?php echo $place; ?>">
	</div>
</div>

<div class="form-group">
	<label for="people_name" class="col-sm-2 control-label">ชื่อ&nbsp;-&nbsp;สกุล</label>

	<div class="col-sm-4">
		<input type="text" class="form-control" id="people_name" name="people_name" placeholder="ชื่อ - สกุล" value="<?php echo $people_name; ?>">
	</div>
</div>

<div class="form-group">
	<label for="people_type" class="col-sm-2 control-label">ประเภทบุคคล</label>

	<div class="col-sm-2">
		<select class="form-control" name="people_type" id="people_type">
			<option>เลือก...</option>
			<option value="student">นักศึกษา</option>
			<option value="officer">บุคลากรมหาวิทยาลัย</option>
			<option value="people_outside">บุคคลภายนอก</option>
		</select>
	</div>


	<div id="student_info" class="hide">
		<label for="people_code" class="col-sm-1 control-label">รหัส</label>
		<div class="col-sm-2">
			<input type="text" class="form-control" id="people_code" name="people_code" placeholder="รหัสนักศึกษา" value="<?php echo $people_code; ?>">
		</div>

		<label for="department_name" class="col-sm-1 control-label">คณะ</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" id="department_name" name="department_name" placeholder="คณะ" value="
			<?php echo $department_name; ?>">
		</div>
	</div>

	<div id="officer_info" class="hide">
		<label for="id_card" class="col-sm-2 control-label">บัตรประจำตัวประชาชน</label>
		<div class="col-sm-2">
			<input type="text" class="form-control" id="id_card" name="id_card" placeholder="เลขบัตรประชาชน" value="<?php echo $id_card;?>">
		</div>

		<label for="department_name" class="col-sm-1 control-label">สังกัด</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" id="department_name" name="department_name" placeholder="สังกัด" value="<?php echo $department_name; ?>">
		</div>
	</div>

</div>
