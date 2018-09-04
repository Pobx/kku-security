<style>
	.hide{
		display:none
	}
	.show{
		display:block
	}
</style>
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">
				<?php echo $head_sub_topic_label; ?>
			</h3>
		</div>
		<div class="row">
			<div class="form-group col-md-4">
				<label>เลือกประเภทเหตุการณ์</label>
				<select class="form-control" id="victim_type">
					<option>เลือก...</option>
					<option value="1">งัดที่พักอาศัย</option>
					<option value="2">งัดเบาะรถจักรยานยนต์</option>
					<option value="3">วิ่งราวลักทรัพย์</option>
				</select>
			</div>

		</div>




		<section class="content hide" id="content1">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title" id="head_sub_topic_label">
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
							<label for="date_break" class="col-sm-2 control-label">วันที่เกิดเหตุ</label>
							<div class="col-sm-4">
								<input type="text" class="form-control datepicker" id="date_break" name="date_break" data-provide="datepicker"
								data-date-language="th-th" placeholder="วันที่" value="<?php echo $date_break;?>">
							</div>

							<label for="date_break" class="col-sm-2 control-label">เวลาที่เกิดเหตุ</label>
							<div class="col-sm-4">
								<input type="text" class="form-control datepicker" id="date_break" name="date_break" data-provide="datepicker"
								data-date-language="th-th" placeholder="วันที่" value="<?php echo $date_break;?>">
							</div>
						</div>


						<div class="form-group">
							<label for="owner_home_name" class="col-sm-2 control-label">ชื่อ&nbsp;-&nbsp;สกุลผู้เสียหาย</label>

							<div class="col-sm-4">
								<input type="text" class="form-control" id="victim_name" name="victim_name" placeholder="ชื่อ - สกุล" value="<?php echo $victim_name;?>">
							</div>
						</div>

						<div class="form-group">
							<label for="owner_home_name" class="col-sm-2 control-label">ประเภทผู้เสียหาย</label>
							<div class="col-sm-4">
								<select class="form-control" id="victim_type">
									<option>เลือก...</option>
									<option value="1">นักศึกษา</option>
									<option value="2">บุคลากรมหาวิทยาลัย</option>
									<option value="3">บุคคลภายนอก</option>
								</select>
							</div>
						</div>

					</div>
					<div id="home" class="hide">
						<div class="form-group row">
							<label for="owner_home_name" class="col-sm-2 control-label">สถานที่เกิดเหตุ</label>
							<div class="col-sm-4">
								<select class="form-control" id="victim_area">
									<option>เลือก...</option>
									<option value="1">บ้าน</option>
									<option value="2">แฟลต</option>
									<option value="3">สำนักงาน</option>
									<option value="4">อื่นๆ...</option>
								</select>
							</div>
							<div class="col-sm-5">
								<div id="victim_area_textarea" class="hide">
									<textarea class="form-control" cols="50"></textarea>
								</div>

								<div id="victim_area_office_select" class="hide">
									<div class="form-group">
										<label for="owner_home_name" class="col-sm-3 control-label">เลือกสำนักงาน</label>
										<div class="col-sm-9">
											<select class="form-control" id="victim_area">
												<option>เลือก...</option>
												<option value="1">สำนักอธิการบดี</option>
												<option value="2">กองกิจการนักศึกษา</option>
												<option value="3">โรงอาหารชาย</option>
												<option value="4">หอสมุดกลาง</option>
											</select>
										</div>

									</div>
								</div>

							</div>
						</div>


					</div>

					<div id="motorcycle" class="hide">
						<div class="form-group row">
							<label for="owner_home_name" class="col-sm-2 control-label">สถานที่เกิดเหตุ</label>
							<div class="col-sm-4">
								<textarea class="form-control"></textarea>
							</div>
						</div>
						<div class="form-group row">
							<label for="owner_home_name" class="col-sm-2 control-label">ทะเบียนรถ</label>
							<div class="col-sm-2">
								<input type="text" class="form-control" id="victim_name" name="victim_name" placeholder="ชื่อ - สกุล" value="<?php echo $victim_name;?>">
							</div>

							<label for="owner_home_name" class="col-sm-2 control-label">ยี่ห้อ</label>
							<div class="col-sm-2">
								<input type="text" class="form-control" id="victim_name" name="victim_name" placeholder="ชื่อ - สกุล" value="<?php echo $victim_name;?>">
							</div>
						</div>
						<div class="form-group row">
							<label for="owner_home_name" class="col-sm-2 control-label">รุ่น</label>
							<div class="col-sm-2">
								<input type="text" class="form-control" id="victim_name" name="victim_name" placeholder="ชื่อ - สกุล" value="<?php echo $victim_name;?>">
							</div>

							<label for="owner_home_name" class="col-sm-2 control-label">สี</label>
							<div class="col-sm-2">
								<input type="text" class="form-control" id="victim_name" name="victim_name" placeholder="ชื่อ - สกุล" value="<?php echo $victim_name;?>">
							</div>
						</div>
						
					</div>
					<div id="theive" class="hide">
					<div class="form-group row">
							<label for="owner_home_name" class="col-sm-2 control-label">สถานที่เกิดเหตุ</label>
							<div class="col-sm-4">
								<textarea class="form-control"></textarea>
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




	</div>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	crossorigin="anonymous"></script>


	<script>
		$("#victim_type").change(function () {
			var _value = $(this).val()
			if (_value == 1) {
				$("#content1").attr('class', 'content show')
				$("#head_sub_topic_label").html("สถิติการงัดที่พักอาศัย")
				$("#home").attr('class', 'show')
				
			} else if (_value == 2) {
				$("#content1").attr('class', 'content show')
				$("#head_sub_topic_label").html("งัดเบาะรถจักรยานยนต์")
				$("#motorcycle").attr('class', 'show')
			} else if (_value == 3) {
				$("#content1").attr('class', 'content show')
				$("#head_sub_topic_label").html(" วิ่งราวลักทรัพย์")
				$("#theive").attr('class', 'show')
			}
		});
		$("#victim_area").change(function () {
			var _value = $(this).val()
			if (_value == 3) {
				$("#victim_area_office_select").attr('class', 'show');
				$("#victim_area_textarea").attr('class', 'hide');
			} else if (_value == 1 || _value == 2 || _value == 4) {
				$("#victim_area_textarea").attr('class', 'show');
				$("#victim_area_office_select").attr('class', 'hide');
			} else {
				$("#victim_area_textarea").attr('class', 'hide');
				$("#victim_area_office_select").attr('class', 'hide');
			}
		})
	</script>