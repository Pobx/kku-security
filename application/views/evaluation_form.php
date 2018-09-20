<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">
				<?php echo $head_sub_topic_label; ?>
			</h3>
		</div>

		<div class="box-body">

			<?php $this->load->view('header_form_submit_data');?>

			<div class="box-header"></div>
			<div class="box-body">

				<div class="form-group">
					<label for="gender" class="col-sm-2 control-label">เพศ</label>
					<div class="col-sm-4">
						<input type="radio" class="flat-red" id="gender" name="gender" value="male"> ชาย
						<input type="radio" class="flat-red" id="gender" name="gender" value="female"> หญิง

					</div>
				</div>

				<div class="form-group">
					<label for="age" class="col-sm-2 control-label">อายุ</label>
					<div class="col-sm-4">
						<select class="form-control select2" id="age" name="age">
							<option selected="">อายุ</option>
							<option value="less_than_20"> น้อยกว่า20 </option>
							<option value="between_21_and_25">21-25</option>
							<option value="between_26_and_30">26-30</option>
							<option value="between_31_and_35">31-35</option>
							<option value="between_36_and_40">36-40</option>
							<option value="between_41_and_45">41-45</option>
							<option value="between_46_and_50">46-50</option>
							<option value="more_than_50">มากกว่า50</option>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label for="personal" class="col-sm-2 control-label">สถานะ</label>
					<div class="col-sm-4">
						<select class="form-control select2" id="personal_id" name="personal_id">
							<option value="">สถานะ</option>
							<?php foreach ($personals as $key => $value) {?>
							<option value="<?php echo $value['id'];?>">
								<?php echo $value['name']; ?>
							</option>
							<?php } ?>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label for="faculty" class="col-sm-2 control-label">สังกัด</label>
					<div class="col-sm-4">
						<select class="form-control select2" id="ddl_car_state" name="faculty_id">
							<option value="">สังกัด</option>
							<?php foreach ($faculty as $key => $value) {?>
							<option value="<?php echo $value['id']; ?>">
								<?php echo $value['name']; ?>
							</option>
							<?php } ?>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label for="service" class="col-sm-2 control-label"></label>
					<div class="col-sm-9">
						<h4>
							<label for="service" class="ccol-sm-6 control-label">ภารกิจ
								กลุ่มงานความต้องการที่ขอใช้บริการกองป้องกันและรักษาความปลอดภัย *</label>
						</h4>
						<div class="col-lg-8 col-md-10 ml-auto mr-auto">

							<table class="table">
								<tbody>
									<?php foreach ($services as $key => $value) {?>
									<tr>
										<td class="text-center">
											<input class="form-check-input flat-red" type="checkbox" value="<?php echo $value['id']; ?> " name="service[]">
										</td>
										<td>
											<?php echo $value['name']; ?>
										</td>
									</tr>
									<?php } ?>
								</tbody>
							</table>

						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="evaluation" class="col-sm-2 control-label"></label>
					<div class="col-sm-9">
						<h4>
							<label for="evaluation" class="control-label">ความพึงพอใจของผู้ขอใช้บริการกองป้องกันและรักษาความปลอดภัย</label>
						</h4>

						<h5><label for="evaluation" class="control-label">คุณภาพงาน *</label></h5>

						<div class="table-responsive">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>หัวข้อ</th>
										<th>ดีมาก</th>
										<th>ดี</th>
										<th>ปานกลาง</th>
										<th>น้อย</th>
										<th>น้อยที่สุด</th>
									</tr>
								</thead>

								<tbody>
									<tr>
										<td>ประสิทธิภาพและสมรรถนะการปฏิบัติหน้าที่</td>
										<td><input type="radio" id="performance" name="performance" value="5" class="flat-red"></td>
										<td><input type="radio" id="performance" name="performance" value="4" class="flat-red"></td>
										<td><input type="radio" id="performance" name="performance" value="3" class="flat-red"></td>
										<td><input type="radio" id="performance" name="performance" value="2" class="flat-red"></td>
										<td><input type="radio" id="performance" name="performance" value="1" class="flat-red"></td>
									</tr>

									<tr>
										<td>สำเร็จลุล่วง บรรลุตามวัตถุประสงค์</td>
										<td><input type="radio" id="success" name="success" value="5" class="flat-red"></td>
										<td><input type="radio" id="success" name="success" value="4" class="flat-red"></td>
										<td><input type="radio" id="success" name="success" value="3" class="flat-red"></td>
										<td><input type="radio" id="success" name="success" value="2" class="flat-red"></td>
										<td><input type="radio" id="success" name="success" value="1" class="flat-red"></td>
									</tr>

									<tr>
										<td>รวดเร็ว ตรงตามเวลาที่กำหนด</td>
										<td><input type="radio" id="timeline" name="timeline" value="5" class="flat-red"></td>
										<td><input type="radio" id="timeline" name="timeline" value="4" class="flat-red"></td>
										<td><input type="radio" id="timeline" name="timeline" value="3" class="flat-red"></td>
										<td><input type="radio" id="timeline" name="timeline" value="2" class="flat-red"></td>
										<td><input type="radio" id="timeline" name="timeline" value="1" class="flat-red"></td>
									</tr>

								</tbody>
							</table>

						</div>
					</div>
				</div>


				<div class="form-group">
					<label for="evaluation" class="col-sm-2 control-label"></label>
					<div class="col-sm-9">
						<h5><label for="evaluation" class="control-label">การให้บริการและการจัดการ *</label></h5>
						<div class="table-responsive">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>หัวข้อ</th>
										<th>ดีมาก</th>
										<th>ดี</th>
										<th>ปานกลาง</th>
										<th>น้อย</th>
										<th>น้อยที่สุด</th>
									</tr>
								</thead>

								<tbody>
									<tr>
										<td>มีขั้นตอนการให้บริการและการจัดการที่ชัดเจน</td>
										<td><input type="radio" id="service_clear" name="service_clear" value="5" class="flat-red"></td>
										<td><input type="radio" id="service_clear" name="service_clear" value="4" class="flat-red"></td>
										<td><input type="radio" id="service_clear" name="service_clear" value="3" class="flat-red"></td>
										<td><input type="radio" id="service_clear" name="service_clear" value="2" class="flat-red"></td>
										<td><input type="radio" id="service_clear" name="service_clear" value="1" class="flat-red"></td>
									</tr>

									<tr>
										<td>วัสดุ อุปกรณ์ เครื่องมือ ในการให้บริการครบครัน</td>
										<td><input type="radio" id="materials" name="materials" value="5" class="flat-red"></td>
										<td><input type="radio" id="materials" name="materials" value="4" class="flat-red"></td>
										<td><input type="radio" id="materials" name="materials" value="3" class="flat-red"></td>
										<td><input type="radio" id="materials" name="materials" value="2" class="flat-red"></td>
										<td><input type="radio" id="materials" name="materials" value="1" class="flat-red"></td>
									</tr>

									<tr>
										<td>การให้บริการกริยา วาจา ที่เป็นมิตร</td>
										<td><input type="radio" id="servicemind" name="servicemind" value="5" class="flat-red"></td>
										<td><input type="radio" id="servicemind" name="servicemind" value="4" class="flat-red"></td>
										<td><input type="radio" id="servicemind" name="servicemind" value="3" class="flat-red"></td>
										<td><input type="radio" id="servicemind" name="servicemind" value="2" class="flat-red"></td>
										<td><input type="radio" id="servicemind" name="servicemind" value="1" class="flat-red"></td>
									</tr>

								</tbody>
							</table>

						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="evaluation" class="col-sm-2 control-label"></label>
					<div class="col-sm-9">
						<h5><label for="evaluation" class="control-label">เจ้าหน้าที่ฯ ผู้ดำเนินการ *</label></h5>
						<div class="table-responsive">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>หัวข้อ</th>
										<th>ดีมาก</th>
										<th>ดี</th>
										<th>ปานกลาง</th>
										<th>น้อย</th>
										<th>น้อยที่สุด</th>
									</tr>
								</thead>

								<tbody>
									<tr>
										<td>ความสามารถในการถ่ายทอดและการแนะนำให้ทราบถึงการใช้บริการด้านการรักษาความปลอดภัยและการจราจร</td>
										<td><input type="radio" id="communication" name="communication" value="5" class="flat-red"></td>
										<td><input type="radio" id="communication" name="communication" value="4" class="flat-red"></td>
										<td><input type="radio" id="communication" name="communication" value="3" class="flat-red"></td>
										<td><input type="radio" id="communication" name="communication" value="2" class="flat-red"></td>
										<td><input type="radio" id="communication" name="communication" value="1" class="flat-red"></td>
									</tr>

									<tr>
										<td>ความรอบรู้ทักษะ องค์ความรู้และการแนะนำให้ทราบถึงการใช้บริการด้านการรักษาความปลอดภัยและการจราจร</td>
										<td><input type="radio" id="knowlage" name="knowlage" value="5" class="flat-red"></td>
										<td><input type="radio" id="knowlage" name="knowlage" value="4" class="flat-red"></td>
										<td><input type="radio" id="knowlage" name="knowlage" value="3" class="flat-red"></td>
										<td><input type="radio" id="knowlage" name="knowlage" value="2" class="flat-red"></td>
										<td><input type="radio" id="knowlage" name="knowlage" value="1" class="flat-red"></td>
									</tr>

									<tr>
										<td>การรับฟัง ปัญหา ข้อซักถาม และการแสดงความคิดเห็นต่าง ๆ ต่อการใช้บริการด้านการรักษาความปลอดภัย มข.
											โดยภาพรวม</td>
										<td><input type="radio" id="questions" name="questions" value="5" class="flat-red"></td>
										<td><input type="radio" id="questions" name="questions" value="4" class="flat-red"></td>
										<td><input type="radio" id="questions" name="questions" value="3" class="flat-red"></td>
										<td><input type="radio" id="questions" name="questions" value="2" class="flat-red"></td>
										<td><input type="radio" id="questions" name="questions" value="1" class="flat-red"></td>
									</tr>

									<tr>
										<td>การให้คำแนะนำ เสนอแนวทาง การแก้ไขปัญหาและติดตามความคืบหน้าจากการขอใช้บริกา</td>
										<td><input type="radio" id="followup" name="followup" value="5" class="flat-red"></td>
										<td><input type="radio" id="followup" name="followup" value="4" class="flat-red"></td>
										<td><input type="radio" id="followup" name="followup" value="3" class="flat-red"></td>
										<td><input type="radio" id="followup" name="followup" value="2" class="flat-red"></td>
										<td><input type="radio" id="followup" name="followup" value="1" class="flat-red"></td>
									</tr>
								</tbody>
							</table>

						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="comment" class="col-sm-2 control-label">ข้อเสนอแนะ</label>
					<div class="col-sm-4">
						<textarea class="form-control" rows="3" id="assets_loses" name="comment" placeholder="ข้อเสนอแนะ"></textarea>
					</div>
				</div>
			</div>

			<div class="box-footer">
				<input type="hidden" name="id" value="">
				<input type="hidden" name="status" value="active">
				<div class="row">
					<div class="col-sm-12 text-center">
						<button type="submit" class="btn btn-lg btn-block btn-success"><i class="fa fa-save"></i> บันทึกข้อมูล</button>
					</div>
				</div>
			</div>

			</form>

		</div>

	</div>
