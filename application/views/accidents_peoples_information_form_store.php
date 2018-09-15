<div class="form-group">
	<label class="col-sm-2 control-label">ประเภทผู้ประสบเหตุ</label>

	<div class="col-sm-4">
		<label>
			<input type="radio" name="victim_type" class="flat-red" value="victim">&nbsp;ผู้ประสบเหตุ
			<input type="radio" name="victim_type" class="flat-red" value="parties">&nbsp;คู่กรณี
		</label>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">ประเภทบุคคล</label>

	<div class="col-sm-4">
		<label>
			<input type="radio" name="people_type" class="flat-red" value="officer">&nbsp;บุคลากร
			<input type="radio" name="people_type" class="flat-red" value="student">&nbsp;นักศึกษา
			<input type="radio" name="people_type" class="flat-red" value="people_inside">&nbsp;บุคลคลภายใน
		</label>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-3 control-label">ความรุนแรงการบาดเจ็บ</label>
	<!-- <label class="col-sm-2 control-label">ความรุนแรง</label> -->

	<div class="col-sm-4">
		<label>
			<input type="radio" name="injury_type" class="flat-red" value="injury">&nbsp;บาดเจ็บเล็กน้อย
			<input type="radio" name="injury_type" class="flat-red" value="injury_hard">&nbsp;สาหัส
			<input type="radio" name="injury_type" class="flat-red" value="dead">&nbsp;เสียชีวิต
			<input type="radio" name="injury_type" class="flat-red" value="">&nbsp;ไม่มี
		</label>

	</div>
</div>

<div class="form-group">
	<label for="people_name" class="col-sm-2 control-label">ชื่อ - สกุล</label>

	<div class="col-sm-4">
		<input type="text" class="form-control" id="people_name" name="people_name" placeholder="ชื่อ - สกุล" value="">
	</div>
</div>

<div class="form-group">
	<label for="people_department_name" class="col-sm-2 control-label">หน่วยงาน</label>

	<div class="col-sm-4">
		<input type="text" class="form-control" id="people_department_name" name="people_department_name" placeholder="หน่วยงาน"
		 value="">
	</div>
</div>
