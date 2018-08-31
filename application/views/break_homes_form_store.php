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
					<label for="date_break" class="col-sm-2 control-label">วันที่</label>
					<div class="col-sm-4">
						<input type="text" class="form-control datepicker" id="date_break" name="date_break" data-provide="datepicker"
						data-date-language="th-th" placeholder="วันที่" value="<?php echo $date_break;?>">
					</div>
				</div>


				<div class="form-group">
					<label for="owner_home_name" class="col-sm-2 control-label">ชื่อ&nbsp;-&nbsp;สกุล</label>

					<div class="col-sm-4">
						<input type="text" class="form-control" id="victim_name" name="victim_name" placeholder="ชื่อ - สกุล" value="<?php echo $victim_name;?>">
					</div>
				</div>



				<div class="form-group">
					<label for="address" class="col-sm-2 control-label">สถานที่เกิดเหตุ</label>

					<div class="col-sm-4">
						<textarea class="form-control" rows="3" id="address" name="address" placeholder="สถานที่เกิดเหตุ"><?php echo $address;?></textarea>
					</div>
				</div>

				<div class="form-group">
					<label for="assets_loses" class="col-sm-2 control-label">ทรัพย์สินที่เสียหาย</label>

					<div class="col-sm-4">
						<textarea class="form-control" rows="3" id="assets_loses" name="assets_loses" placeholder="ทรัพย์สินที่เสียหาย"><?php echo $assets_loses;?></textarea>
					</div>
				</div>

				<div class="form-group">
					<label for="remark" class="col-sm-2 control-label">หมายเหตุ</label>

					<div class="col-sm-4">
						<input type="text" class="form-control" id="remark" name="remark" placeholder="หมายเหตุ" value="<?php echo $remark;?>">
					</div>
				</div>

			</div>

			<div class="box-footer">
				<input type="hidden" name="id" value="<?php echo $id;?>">
				<input type="hidden" name="status" value="active">
				<?php $this->load->view('button_save_and_back_page_in_form');?>
			</div>
			</form>

		</div>

	</div>
