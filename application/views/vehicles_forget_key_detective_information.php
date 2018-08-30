<p>
	<strong>ข้อมูลผู้ตรวจพบ</strong>
</p>

<div class="form-group">
	<label for="detective_name" class="col-sm-2 control-label">ชื่อ&nbsp;-&nbsp;สกุล</label>

	<div class="col-sm-4">
		<input type="text" class="form-control" id="detective_name" name="detective_name" placeholder="ชื่อ - สกุล" value="<?php echo $detective_name; ?>">
	</div>
</div>

<div class="form-group">
	<label for="detective_department_name" class="col-sm-2 control-label">สังกัดหน่วยงาน</label>

	<div class="col-sm-4">
		<input type="text" class="form-control datepicker" id="detective_department_name" name="detective_department_name"
		placeholder="สังกัดหน่วยงาน" value="<?php echo $detective_department_name; ?>">
	</div>
</div>

<div class="form-group">
	<label for="remark" class="col-sm-2 control-label">หมายเหตุ</label>

	<div class="col-sm-4">
		<textarea class="form-control" rows="3" id="remark" name="remark" placeholder="หมายเหตุ"><?php echo $remark;?></textarea>
	</div>
</div>
