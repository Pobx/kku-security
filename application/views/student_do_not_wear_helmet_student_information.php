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
	<label for="inspect_date" class="col-sm-1 control-label">ช่วงเวลา</label>

	<div class="col-sm-2">
		<label for="inspect_date" class="control-label">
			<input type="radio" name="period_time" class="" id="period_time1" value="morning" checked="checked">
			เช้า</label>
	</div>
	<div class="col-sm-2">
		<label for="inspect_date" class="control-label">
			<input type="radio" name="period_time" class="" id="period_time2" value="afternoon">
			บ่าย</label>
	</div>
</div>

<div class="form-group">
	<label for="place" class="col-sm-2 control-label">สถานที่</label>

	<div class="col-sm-4">
		<input type="text" class="form-control" id="place" name="place" placeholder="สถานที่" value="<?php echo $place; ?>">
	</div>
</div>

<div class="form-group">
	<label for="student_name" class="col-sm-2 control-label">ชื่อ&nbsp;-&nbsp;สกุล</label>

	<div class="col-sm-4">
		<input type="text" class="form-control" id="student_name" name="student_name" placeholder="ชื่อ - สกุล" value="<?php echo $student_name; ?>">
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
		<label for="student_code" class="col-sm-1 control-label">รหัส</label>

		<div class="col-sm-2">
			<input type="text" class="form-control" id="student_code" name="student_code" placeholder="รหัสนักศึกษา" value="<?php echo $student_name; ?>">
		</div>

		<label for="student_code" class="col-sm-1 control-label">คณะ</label>

		<div class="col-sm-3">
			<select class="form-control" name="student_faculty" id="student_faculty">
				<option>เลือก...</option>
				<option value="วิทยาศาสตร์">วิทยาศาสตร์</option>
				<option value="เทคโนโลยี">เทคโนโลยี</option>
				<option value="external_person"> บุคคลภายนอก</option>
			</select>
		</div>
	</div>
	<div id="officer_info" class="hide">
		<label for="student_code" class="col-sm-2 control-label">บัตรประจำตัวประชาชน</label>

		<div class="col-sm-2">
			<input type="text" class="form-control" id="officer_card_id" name="officer_card_id" placeholder="เลขบัตรประชาชน" value="<?php echo $student_name; ?>">
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
			<input type="text" class="form-control" id="ex_person_card_id" name="ex_person_card_id" placeholder="เลขบัตรประชาชน" value="<?php echo $student_name; ?>">
		</div>
		<label for="student_code" class="col-sm-1 control-label">สังกัด</label>

		<div class="col-sm-3">
			<input type="text" class="form-control" id="ex_person_address" name="ex_person_address" placeholder="รหัสนักศึกษา"
			value="<?php echo $student_code; ?>">
		</div>
	</div>

</div>

<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
crossorigin="anonymous"></script>


<script>
	$('#man_type').change(function () {
		console.log('dfdf')
		var mantype = $(this).val();
		console.log(mantype)
		if (mantype == "student") {
			$('#student_info').attr('class', 'show');
			$('#officer_info').attr('class', 'hide');
			$('#external_person_info').attr('class', 'hide');

			$('#officer_card_id').val("");
			$('#officer_office').val("");
			$('#ex_person_address').val("");
			$('#ex_person_card_id').val("")

		} else if (mantype == "officer") {
			$('#student_info').attr('class', 'hide');
			$('#officer_info').attr('class', 'show');
			$('#external_person_info').attr('class', 'hide');

			$('#student_code').val("");
			$('#student_faculty').val("");
			$('#ex_person_address').val("");
			$('#ex_person_card_id').val("")
		} else if (mantype == "external_person") {
			$('#student_info').attr('class', 'hide');
			$('#officer_info').attr('class', 'hide');
			$('#external_person_info').attr('class', 'show');

			$('#student_code').val("");
			$('#student_faculty').val("");
			('#officer_card_id').val("");
			$('#officer_office').val("");
		}
	});
</script>