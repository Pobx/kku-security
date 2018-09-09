<div class="form-group">
	<label for="victim_name" class="col-sm-2 control-label">เพศ</label>

	<div class="col-sm-4">
		<label>
			<input type="radio" name="gender" class="flat-red" value="student" <?php if ($gender=='male' ) { echo "checked" ;}?>>&nbsp;ชาย
			<input type="radio" name="gender" class="flat-red" value="staff" <?php if ($gender=='female' ) { echo "checked" ;}?>>&nbsp;หญิง
		</label>
	</div>
</div>

<div class="form-group">
	<label for="victim_address" class="col-sm-2 control-label">สถานะ</label>

	<div class="col-sm-4">
		<div class="form-group">
			<div class="radio">
				<label>
					<input type="radio" name="status" id="status1" class="flat-red" value="1" checked="checked">
					ปกติ
				</label>
			</div>
			<div class="radio">
				<label>
					<input type="radio" name="status" id="status2" class="flat-red" value="2">
					ไม่ปกติ
				</label>
			</div>

		</div>
	</div>
</div>



<div class="form-group">
	<label for="remark" class="col-sm-2 control-label">หมายเหตุ</label>

	<div class="col-sm-4">
		<textarea class="form-control" id="comment" name="comment"></textarea>
	</div>
</div>


<script>
	$(document).ready(function () {
		$("#e1").select2();
	});

</script>
