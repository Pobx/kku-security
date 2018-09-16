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
	<label for="man_type" class="col-sm-2 control-label">ประเภทบุคคล</label>

	<div class="col-sm-2">
		<select class="form-control" name="man_type" id="man_type">
			<option>เลือก...</option>
			<option value="student">นักศึกษา</option>
			<option value="officer">บุคลากรมหาวิทยาลัย</option>
			<option value="external_person"> บุคคลภายนอก</option>
		</select>
	</div>

	<div id="student_info" class="hide">
		<label for="people_code" class="col-sm-1 control-label">รหัส</label>

		<div class="col-sm-2">
			<input type="text" class="form-control" id="people_code" name="people_code" placeholder="รหัสนักศึกษา" value="<?php echo $people_code; ?>">
		</div>

		<label for="faculty_id" class="col-sm-1 control-label">คณะ</label>

		<div class="col-sm-3">
			<select class="form-control" name="faculty_id" id="faculty_id">
				<option>เลือก</option>
				<?php foreach ($results_faculty as $key => $value) {?>
				<option value="<?php echo $value['id'];?>" <?php if ($place==$value['id']) { echo 'selected' ;}?>>
					<?php echo $value['name'];?>
				</option>
				<?php }?>
			</select>
		</div>
	</div>
	<div id="officer_info" class="hide">
		<label for="student_code" class="col-sm-2 control-label">บัตรประจำตัวประชาชน</label>

		<div class="col-sm-2">
			<input type="text" class="form-control" id="officer_card_id" name="officer_card_id" placeholder="เลขบัตรประชาชน"
			 value="<?php echo $student_name; ?>">
		</div>
		<label for="student_code" class="col-sm-1 control-label">สังกัด</label>

		<div class="col-sm-3">
			<select class="form-control" name="officer_office" id="officer_office">
				<option>เลือก...</option>
				<option value="student">สำนักทะเบียน</option>
				<option value="officer">เทคโนดลยี</option>
				<option value="external_person"> บุคคลภายนอก</option>
			</select>
		</div>
	</div>
	<div id="external_person_info" class="hide">
		<label for="student_code" class="col-sm-2 control-label">บัตรประจำตัวประชาชน</label>

		<div class="col-sm-2">
			<input type="text" class="form-control" id="ex_person_card_id" name="ex_person_card_id" placeholder="เลขบัตรประชาชน"
			 value="<?php echo $student_name; ?>">
		</div>
		<label for="student_code" class="col-sm-1 control-label">สังกัด</label>

		<div class="col-sm-3">
			<input type="text" class="form-control" id="ex_person_address" name="ex_person_address" placeholder="รหัสนักศึกษา"
			 value="<?php echo $student_code; ?>">
		</div>
	</div>

</div>
