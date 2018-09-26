<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">
				<?php echo $head_sub_topic_label; ?>
			</h3>
		</div>

		<div class="box-body">

			<?php $this->load->view('header_form_submit_data');?>
			<div class="box-header">
			</div>
			<div class="box-body">
				<div class="form-group">
					<label for="date_break" class="col-sm-2 control-label">วันที่</label>
					<div class="col-sm-4">
						<input type="text" class="form-control datepicker" id="date_break" name="date_break" data-provide="datepicker"
						 data-date-language="th-th" placeholder="วันที่" value="">
					</div>
				</div>

				<?php $this->load->view('period_times');?>

				<div class="form-group">
					<label for="owner_home_name" class="col-sm-2 control-label">ชื่อ&nbsp;-&nbsp;สกุล</label>

					<div class="col-sm-4">
						<input type="text" class="form-control" id="victim_name" name="victim_name" placeholder="ชื่อ - สกุล" value="<?php //echo $victim_name; ?>">
					</div>
				</div>
				<div class="form-group">
					<label for="victim_phone" class="col-sm-2 control-label">เบอร์ติดต่อ</label>

					<div class="col-sm-4">
						<input type="text" class="form-control" id="victim_phone" name="victim_phone" placeholder="เบอร์ติดต่อ" value="<?php //echo $victim_phone; ?>">
					</div>
				</div>
				<div class="form-group">
					<label for="department" class="col-sm-2 control-label">สังกัด/หน่วยงาน</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="department" name="department" placeholder="สังกัด/หน่วยงาน" value="<?php //echo $department; ?>">
					</div>
				</div>

				<div class="form-group">
					<label for="address" class="col-sm-2 control-label">ที่อยู่สถานที่เกิดเหตุ</label>
					<div class="col-sm-4">
						<textarea class="form-control" rows="3" id="address" name="address" placeholder="สถานที่เกิดเหตุ"><?php //echo $address; ?></textarea>
					</div>
				</div>

				<div class="form-group">
					<label for="assets_loses" class="col-sm-2 control-label">ทรัพย์สินที่เสียหาย</label>

					<div class="col-sm-4">
						<textarea class="form-control" rows="3" id="assets_loses" name="assets_loses" placeholder="ทรัพย์สินที่เสียหาย"><?php //echo $assets_loses; ?></textarea>
					</div>
				</div>

				<div class="form-group">
					<label for="staff_process" class="col-sm-2 control-label">การติดตามจับกุม</label>
					<div class="col-sm-4">
						<input type="radio" id="staff_process" name="staff_process" value="yes" class="flat-red">
						<label for="staff_process">จับได้</label><br>
						<input type="radio" id="staff_process" name="staff_process" value="no" class="flat-red">
						<label for="staff_process">จับไม่ได้</label><br>
					</div>
				</div>

				<div class="form-group">
					<label for="remark" class="col-sm-2 control-label">หมายเหตุ</label>

					<div class="col-sm-4">
						<input type="text" class="form-control" id="remark" name="remark" placeholder="หมายเหตุ" value="<?php //echo $remark; ?>">
					</div>
				</div>

			</div>

			<div class="box-footer">
				<input type="hidden" name="id" value="<?php //echo $id; ?>">
				<input type="hidden" name="status" value="active">
				<?php $this->load->view('button_save_and_back_page_in_form');?>
			</div>
			</form>
		</div>
	</div>
