<style>
	.hide{
		display:none;
	}
	.show{
		display:block;
	}
</style>
<div class="form-group">
	<label for="request_date" class="col-sm-2 control-label">วันที่</label>

	<div class="col-sm-4">
		<input type="text" class="form-control datepicker" id="request_date" name="request_date" data-provide="datepicker"
		data-date-language="th-th" placeholder="วันที่" value="<?php echo $request_date; ?>">
	</div>
</div>

<div class="form-group">
	<label for="name" class="col-sm-2 control-label">ชื่อ-สกุล</label>
	<div class="col-sm-4">
		<label>
			<input type="text" id="name" name="name" placeholder="ชื่อ-สกุล" class="form-control" value="" >
		</label>
	</div>
</div>

<div class="form-group">
	<label for="victim_name" class="col-sm-2 control-label">เพศ</label>

	<div class="col-sm-4">
		<label>
			<input type="radio" name="gender" class="flat-red" value="male" <?php if ($gender=='male' ) { echo "checked" ;}?>>&nbsp;ชาย
			<input type="radio" name="gender" class="flat-red" value="female" <?php if ($gender=='female' ) { echo "checked" ;}?>>&nbsp;หญิง
		</label>
	</div>
</div>

<?php $this->load->view('people_type');?>

<div class="form-group">
	<label class="col-sm-2 control-label">เหตุการณ์</label>
	<div class="col-sm-4">
		<select class="form-control select2" name="cctv_event_id" id="cctv_event_id">
			<option value="">เลือก</option>
			<?php foreach ($results_cctv_event as $key => $value) {?>
			<option value="<?php echo $value['id'];?>">
				<?php echo $value['name'];?>
			</option>
			<?php }?>
		</select>

	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">บริเวณที่เกิดเหตุ</label>
	<div class="col-sm-4">
	<textarea class="form-control" rows="3" id="area" name="area" placeholder="area"></textarea>
	</div>
</div>

<div class="form-group">
	<label for="victim_address" class="col-sm-2 control-label">ผลการดำเนินการ</label>

	<div class="col-sm-4">
		<label>
			<input type="radio" name="operation_status" id="operation_status1" class="flat-red" value="meet_event" <?php if ($operation_status=='meet_event'
			) { echo "checked" ;}?>>&nbsp;พบเหตุการณ์
			<input type="radio" name="operation_status" id="operation_status2" class="flat-red" value="have_not_event" <?php if ($operation_status=='have_not_event'
			) { echo "checked" ;}?>>&nbsp;ไม่พบเหตุการณ์
			<input type="radio" name="operation_status" id="operation_status3" class="flat-red" value="other" <?php if ($operation_status=='other'
			) { echo "checked" ;}?>>&nbsp;อื่นๆ
			<input type="text" name="operation_status_note" class="flat-red hide"  value="<?php $operation_status_note; ?>">

		</label>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">เอกสารแนบคำขอ</label>
	<div class="col-sm-4">
	<input type="checkbox" name="checkbox1" class="flat-red" value="" >
	<br><input type="checkbox" name="checkbox1" class="flat-red" value="" >
	<br><input type="checkbox" name="checkbox1" class="flat-red" value="" >

	<br><input type="checkbox" name="checkbox1" class="flat-red" value="" >

	<br><input type="checkbox" name="checkbox1" class="flat-red" value="" >

	<br><input type="checkbox" name="checkbox1" class="flat-red" value="" >


	</div>
</div>

<script>

$('.operation_status3').click(function(){
		 var operation_status =  $(this).val();
		 if(operation_status == "other"){
			$('#operation_status_note').attr('class', 'flat-red show');
		 }else{
			$('#operation_status_note').attr('class', 'flat-red hide');
		 } 
})
</script>