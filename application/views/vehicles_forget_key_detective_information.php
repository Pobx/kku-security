<div class="form-group">
	<label for="name" class="col-sm-2 control-label">ชื่อ&nbsp;-&nbsp;สกุล</label>

	<div class="col-sm-4">
		<!-- <input type="text" class="form-control select2" id="name" name="name" placeholder="ชื่อ - สกุล" value=""> -->
		<select class="form-control select2" style="width:240px" id="name" name="name" >
			<option>เลือก...</option>
			<?php foreach($users['results'] as $user){ ?>
				<option value="<?=$user['id'];?>"><?=$user['name'];?></option>

			<?php }?>
		</select>
	</div>
</div>

<div class="form-group">
	<label for="department_name" class="col-sm-2 control-label">สังกัดหน่วยงาน</label>

	<div class="col-sm-4">
		<input type="text" class="form-control" id="department_name" name="department_name" placeholder="สังกัดหน่วยงาน"
		value="">
	</div>
</div>

<div class="form-group">
	<label for="remark" class="col-sm-2 control-label">หมายเหตุ</label>

	<div class="col-sm-4">
		<textarea class="form-control" rows="3" id="remark" name="remark" placeholder="หมายเหตุ"></textarea>
	</div>
</div>
