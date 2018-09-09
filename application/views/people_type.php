<div class="form-group">
	<label class="col-sm-2 control-label">ประเภทบุคลากร</label>

	<div class="col-sm-4">
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
