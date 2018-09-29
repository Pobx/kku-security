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

				<?php 
          $this->load->view('period_times');
          $this->load->view('people_type');
        ?>

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
					<label for="snatch_events" class="col-sm-2 control-label">การดำเนินการ</label>
					<div class="col-sm-10">
						<label>
							<input type="radio" id="snatch_events" name="snatch_events" value="polic_daily" class="flat-red">&nbsp;มีบันทึกประจำวัน
							<input type="radio" name="snatch_events" value="request_cctv" class="flat-red">&nbsp;ขอดูกล้องวงจรปิด
							<input type="radio" name="snatch_events" value="other" class="flat-red">&nbsp;อื่นๆ
						</label>
					</div>
				</div>

				<div class="form-group" id="div_events_other">
					<label for="events_other" class="col-sm-2 control-label">อื่นๆ</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="events_other" name="events_other" placeholder="อื่นๆ" value="<?php //echo $events_other; ?>">
					</div>
				</div>

			</div>

			<div class="form-group">
				<label for="arrested_status" class="col-sm-2 control-label">การติดตามจับกุม</label>
				<div class="col-sm-4">
					<label>
						<input type="radio" id="arrested_status" name="arrested_status" value="arrested" class="flat-red">&nbsp;จับได้
						<input type="radio" name="arrested_status" value="not_arrested" class="flat-red">&nbsp;ยังจับกุมไม่ได้
						<input type="radio" name="arrested_status" value="arrested_other" class="flat-red">&nbsp;อื่นๆ
					</label>
				</div>
			</div>

			<div class="form-group" id="div_arrested_other">
				<label for="arrested_other" class="col-sm-2 control-label">อื่นๆ</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" id="arrested_other" name="arrested_other" placeholder="อื่นๆ" value="<?php //echo $arrested_other; ?>">
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

	<script>
		$(document).ready(function () {
			var snatch_events = '';
			var events_other = '<?php echo $events_other;?>';

			$('#div_events_other').hide();

			if (snatch_events == 'other') {
				$('#div_events_other').show();
				$('#events_other').val(events_other);
			} else {
				$('#div_events_other').hide();
				$('#events_other').val('');
			}

			$('input[name="snatch_events"]').on('ifClicked', function (event) {
				// alert("You clicked " + this.value);
				if (this.value == 'other') {
					$('#div_events_other').show();
					$('#events_other').val('');
				} else {
					$('#div_events_other').hide();
					$('#events_other').val('');
				}
			});

			var arrested_status = '';
			var arrested_other = '<?php echo $arrested_other;?>';


			$('#div_arrested_other').hide();

			if (snatch_events == 'other') {
				$('#div_arrested_other').show();
				$('#arrested_other').val(events_other);
			} else {
				$('#div_arrested_other').hide();
				$('#arrested_other').val('');
			}

			$('input[name="arrested_status"]').on('ifClicked', function (event) {
				// alert("You clicked " + this.value);
				if (this.value == 'arrested_other') {
					$('#div_arrested_other').show();
					$('#arrested_other').val('');
				} else {
					$('#div_arrested_other').hide();
					$('#arrested_other').val('');
				}
			});

		});

	</script>
