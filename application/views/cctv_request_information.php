<div class="form-group">
	<label for="victim_name" class="col-sm-2 control-label">เพศ</label>

	<div class="col-sm-4">
		<label>
			<input type="radio" name="gender" class="flat-red" value="student" <?php if ($gender=='male' ) { echo "checked" ;}?>>&nbsp;ชาย
			<input type="radio" name="gender" class="flat-red" value="staff" <?php if ($gender=='female' ) { echo "checked" ;}?>>&nbsp;หญิง
		</label>
	</div>
</div>

<?php $this->load->view('people_type');?>

<div class="form-group">
	<label class="col-sm-2 control-label">เหตุการณ์</label>
	<div class="col-sm-4">
		<select class="form-control select2" name="cctv_event_id" id="cctv_event_id">
			<option>เลือก</option>
			<?php foreach ($results_cctv_event as $key => $value) {?>
			<option value="<?php echo $value['id'];?>">
				<?php echo $value['name'];?>
			</option>
			<?php }?>
		</select>

	</div>
</div>

<div class="form-group">
	<label for="victim_address" class="col-sm-2 control-label">ผลการดำเนินการ</label>

	<div class="col-sm-4">
		<label>
			<input type="radio" name="operation_status" class="flat-red" value="student" <?php if ($operation_status=='meet_event'
			) { echo "checked" ;}?>>&nbsp;พบเหตุการณ์
			<input type="radio" name="operation_status" class="flat-red" value="staff" <?php if ($operation_status=='have_not_event'
			) { echo "checked" ;}?>>&nbsp;ไม่พบเหตุการณ์
		</label>
	</div>
</div>

<div class="form-group">
	<label for="link_copy_polic_doc" class="col-sm-2 control-label">สำเนาบันทึกแจ้งความประจำวัน</label>

	<div class="col-sm-4">
		<input class="form-control" type="file" name="link_copy_polic_doc" id="link_copy_polic_doc">
	</div>
</div>

<div class="form-group">
	<label for="link_copy_gov_doc" class="col-sm-2 control-label">สำเนาบัตรประจำตัวนักศึกษา/สำเนาบัตรประชาชน/สำเนาบัตรข้าราชการ</label>

	<div class="col-sm-4">
		<input class="form-control" type="file" name="link_copy_gov_doc" id="link_copy_gov_doc">
	</div>
</div>

<div class="form-group">
	<label for="link_copy_other_gov_doc" class="col-sm-2 control-label">สำเนาบัตรอื่นๆ ที่หน่วยงานราชการออกให้</label>

	<div class="col-sm-4">
		<input class="form-control" type="file" name="link_copy_other_gov_doc" id="link_copy_other_gov_doc">
	</div>
</div>
