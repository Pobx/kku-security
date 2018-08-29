<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">
				<?php echo $head_sub_topic_label; ?>
			</h3>
		</div>

		<div class="box-body">

			<!-- <form class="form-horizontal form_submit_data"> -->
			<?php $this->load->view('header_form_submit_data');?>
			<div class="box-header">
				<?php $this->load->view('button_save_and_back_page_in_form');?>
			</div>
			<div class="box-body">
				<div class="form-group">
					<label for="start_date" class="col-sm-2 control-label">วันที่</label>

					<div class="col-sm-4">
						<input type="text" class="form-control datepicker" id="start_date" name="start_date" data-provide="datepicker"
						data-date-language="th-th" placeholder="วันที่">
					</div>

					<label for="end_date" class="col-sm-1 control-label">ถึง</label>

					<div class="col-sm-4">
						<input type="text" class="form-control datepicker" id="end_date" name="end_date" data-provide="datepicker"
						data-date-language="th-th" placeholder="ถึง">
					</div>
				</div>

				<div class="form-group">
					<label for="owner_home_name" class="col-sm-2 control-label">ชื่อ&nbsp;-&nbsp;สกุล</label>

					<div class="col-sm-4">
						<input type="text" class="form-control" id="owner_home_name" name="owner_home_name" placeholder="ชื่อ - สกุล">
					</div>
				</div>

				<div class="form-group">
					<label for="owner_home_position_name" class="col-sm-2 control-label">ตำแหน่ง</label>

					<div class="col-sm-4">
						<input type="text" class="form-control" id="owner_home_position_name" name="owner_home_position_name" placeholder="ตำแหน่ง">
					</div>
				</div>

				<div class="form-group">
					<label for="owner_home_department_name" class="col-sm-2 control-label">สังกัดหน่วยงาน</label>

					<div class="col-sm-4">
						<input type="text" class="form-control" id="owner_home_department_name" name="owner_home_department_name"
						placeholder="สังกัดหน่วยงาน">
					</div>
				</div>

				<div class="form-group">
					<label for="owner_home_office_name" class="col-sm-2 control-label">สำนักงาน&nbsp;/&nbsp;ศูนย์</label>

					<div class="col-sm-4">
						<input type="text" class="form-control" id="owner_home_office_name" name="owner_home_office_name" placeholder="สำนักงาน / ศูนย์">
					</div>
				</div>

				<div class="form-group">
					<label for="address" class="col-sm-2 control-label">ที่อยู่&nbsp;/&nbsp;หมู่บ้าน</label>

					<div class="col-sm-4">
						<textarea class="form-control" rows="3" id="address" name="address" placeholder="ที่อยู่ / หมู่บ้าน"></textarea>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label">การส่งมอบ</label>

					<div class="col-sm-4">
						<label>
							<input type="radio" name="status" class="flat-red" value="stable">&nbsp;ปกติ
							<input type="radio" name="status" class="flat-red" value="not-stable">&nbsp;ไม่ปกติ
						</label>
					</div>
				</div>

			</div>

			<div class="box-footer">
				<input type="text" name="id" value="">
				<?php $this->load->view('button_save_and_back_page_in_form');?>
			</div>
			</form>

		</div>

		<div class="box-footer">
		</div>
	</div>
