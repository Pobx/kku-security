<style>
	.hide{
		display:none;
	}
	.show{
		display:block;
	}
	input[type="radio"] {
    -ms-transform: scale(1.8); /* IE 9 */
    -webkit-transform: scale(1.8); /* Chrome, Safari, Opera */
    transform: scale(1.8);
	margin:3px;
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
	<label for="victim_name" class="col-sm-2 control-label">ชื่อ-สกุล</label>
	<div class="col-sm-4">
		<label>
			<input type="text" id="victim_name" name="victim_name" placeholder="ชื่อ-สกุล" class="form-control" value="<?php echo $victim_name; ?>">
		</label>
	</div>
</div>

<div class="form-group">
	<label for="gender" class="col-sm-2 control-label">เพศ</label>

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
		<textarea class="form-control" rows="3" id="area" name="area" placeholder="area">  <?php  echo $area; ?>  </textarea>
	</div>
</div>

<div class="form-group">
	<label for="victim_address" class="col-sm-2 control-label">ผลการดำเนินการ</label>
	<div class="col-sm-4">
		<label>
			<input type="radio" name="operation_status" class="flat-red" value="meet_event" <?php if ($operation_status=='meet_event'
			 ) { echo "checked" ;}?>>&nbsp;พบเหตุการณ์
			<input type="radio" name="operation_status" class="flat-red" value="have_not_event" <?php if ($operation_status=='have_not_event'
			 ) { echo "checked" ;}?>>&nbsp;ไม่พบเหตุการณ์
			<input type="radio" name="operation_status" class="flat-red" value="other" <?php if ($operation_status=='other' ) {
			 echo "checked" ;}?>>&nbsp;อื่นๆ

		</label>
	</div>
</div>

<div class="form-group" id="div_other_textbox">
	<label class="col-sm-2 control-label">&nbsp;</label>
	<div class="col-sm-4">
		<textarea class="form-control" rows="3" id="operation_status_note" name="operation_status_note" placeholder="อื่นๆ">  <?php  echo $operation_status_note; ?>  </textarea>
	</div>
</div>

<div class="form-group">

	<label class="col-sm-2 control-label">เอกสารแนบคำขอ</label>
	<div class="col-sm-9">
		<div class="row">
			<div class="col-sm-1">
				<input type="checkbox" class="flat-red" <?php if($picture!="" ){ echo "checked" ; } ?> >
			</div>
			<div class="col-sm-6">
				สำรองข้อมูลไฟล์ภาพ (.jpg, .gif,.tif) จำนวน
			</div>
			<div class="col-sm-2">
				<input type="text" id="picture" name="picture" class="form-control" style="border-top:none; border-left:none; border-right:none;"
				 value="<?php echo $picture; ?>">
			</div>
			<div class="col-sm-1">
				ไฟล์
			</div>
		</div>

		<div class="row">
			<div class="col-sm-1">
				<input type="checkbox" class="flat-red" <?php if($vedio!="" ){ echo "checked" ; } ?> >
			</div>
			<div class="col-sm-6">
				สำรองข้อมูลไฟล์วีดีโอ (.avi, .mov, .wav, .mpeg2) จำนวน
			</div>
			<div class="col-sm-2">
				<input type="text" id="vedio" name="vedio" class="form-control" style="border-top:none; border-left:none; border-right:none;"
				 value="<?php echo $vedio; ?>">
			</div>
			<div class="col-sm-1">
				ไฟล์
			</div>
		</div>
		<br>

		<div class="row">
			<div class="col-sm-1">
				<input type="checkbox" class="flat-red" <?php if($printpicture!="" ){ echo "checked" ; } ?> >
			</div>
			<div class="col-sm-6">
				พิมพ์รูปภาพ จำนวน
			</div>
			<div class="col-sm-2">
				<input type="text" id="printpicture" name="printpicture" class="form-control" style="border-top:none; border-left:none; border-right:none;"
				 value="<?php echo $printpicture; ?>">
			</div>
			<div class="col-sm-1">
				แผ่น
			</div>
		</div>
		<br>

		<div class="row">
			<div class="col-sm-1">
				<input type="checkbox" class="flat-red" <?php if($cd_vcd!="" ){ echo "checked" ; } ?> >
			</div>
			<div class="col-sm-6">
				สำรองข้อมูลบนแผ่นบันทึกข้อมูล CD , VCD จำนวน
			</div>
			<div class="col-sm-2">
				<input type="text" id="cd_vcd" name="cd_vcd" class="form-control" style="border-top:none; border-left:none; border-right:none;"
				 value="<?php echo $cd_vcd; ?>">
			</div>
			<div class="col-sm-1">
				แผ่น
			</div>
		</div>
		<br>

		<div class="row">
			<div class="col-sm-1">
				<input type="checkbox" class="flat-red" <?php if($flash_drive!="" ){ echo "checked" ; } ?> >
			</div>
			<div class="col-sm-6">
				สำรองข้อมูลลงอุปกรณ์เก็บข้อมูล (Flash Drive) จำนวน
			</div>
			<div class="col-sm-2">
				<input type="text" id="flash_drive" name="flash_drive" class="form-control" style="border-top:none; border-left:none; border-right:none;"
				 value="<?php echo $flash_drive; ?>">
			</div>
			<div class="col-sm-1">
				อัน
			</div>
		</div>
		<br>


		<div class="row">
			<div class="col-sm-1">
				<input type="checkbox" class="flat-red" <?php if($computer_name!="" ){ echo "checked" ; } ?> >
			</div>
			<div class="col-sm-6">
				ระบุที่เก็บเครื่อง
			</div>
			<div class="col-sm-2">
				<input type="text" id="computer_name" name="computer_name" class="form-control" style="border-top:none; border-left:none; border-right:none;"
				 value="<?php echo $computer_name; ?>">
			</div>
			<div class="col-sm-1">

			</div>
		</div>
		<br>

		<div class="row">
			<div class="col-sm-1">
				<input type="checkbox" class="flat-red" <?php if($drive!="" ){ echo "checked" ; } ?> >
			</div>
			<div class="col-sm-6">
				ไดร์
			</div>
			<div class="col-sm-2">
				<input type="text" id="drive" name="drive" class="form-control" style="border-top:none; border-left:none; border-right:none;"
				 value="<?php echo $drive; ?>">
			</div>
			<div class="col-sm-1">

			</div>
		</div>
		<br>

		<div class="row">
			<div class="col-sm-1">
				<input type="checkbox" class="flat-red" <?php if($folder!="" ){ echo "checked" ; } ?> >
			</div>
			<div class="col-sm-6">
				โฟร์เดอร์
			</div>
			<div class="col-sm-2">
				<input type="text" id="folder" name="folder" class="form-control" style="border-top:none; border-left:none; border-right:none;"
				 value="<?php echo $folder; ?>">
			</div>
			<div class="col-sm-1">

			</div>
		</div>
		<br>

	</div>
</div>
