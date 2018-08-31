<div class="form-group">
	<label class="col-sm-2 control-label">ประเภทยานพาหนะ</label>

	<div class="col-sm-4">
		<label>
			<input type="radio" name="victim_type" class="flat-red" value="victim" <?php if ($victim_type=='victim' ) { echo
			'checked' ;}?>>&nbsp;ผู้ประสบเหตุ
			<input type="radio" name="victim_type" class="flat-red" value="parties" <?php if ($victim_type=='parties' ) { echo
			'checked' ;}?>>&nbsp;คู่กรณี
		</label>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">ประเภทบุคลากร</label>

	<div class="col-sm-4">
		<label>
			<input type="radio" name="people_type" class="flat-red" value="officer" <?php if ($people_type=='officer' ) { echo
			'checked' ;}?>>&nbsp;บุคลากร
			<input type="radio" name="people_type" class="flat-red" value="student" <?php if ($people_type=='student' ) { echo
			'checked' ;}?>>&nbsp;นักศึกษา
			<input type="radio" name="people_type" class="flat-red" value="people_inside" <?php if ($people_type=='people_inside'
			) { echo 'checked' ;}?>>&nbsp;บุคลคลภายใน
		</label>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">ประเภทยานพาหนะ</label>

	<div class="col-sm-4">
		<label>
			<input type="radio" name="injury_type" class="flat-red" value="injury" <?php if ($injury_type=='injury' ) { echo
			'checked' ;}?>>&nbsp;บาดเจ็บ
			<input type="radio" name="injury_type" class="flat-red" value="dead" <?php if ($injury_type=='dead' ) { echo
			'checked' ;}?>>&nbsp;เสียชีวิต
		</label>
	</div>
</div>

<div class="form-group">
	<label for="people_name" class="col-sm-2 control-label">ชื่อ - สกุล</label>

	<div class="col-sm-4">
		<input type="text" class="form-control" id="people_name" name="people_name" placeholder="ชื่อ - สกุล" value="<?php echo $people_name; ?>">
	</div>
</div>

<div class="form-group">
	<label for="people_department_name" class="col-sm-2 control-label">หน่วยงาน</label>

	<div class="col-sm-4">
		<input type="text" class="form-control" id="people_department_name" name="people_department_name" placeholder="หน่วยงาน"
		value="<?php echo $people_department_name; ?>">
	</div>
</div>
