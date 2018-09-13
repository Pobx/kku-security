<?php 
// echo "<pre>"; print_r($data); die();
      ?>
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
			<?php 
               if($fields['id']!=""){ 
                }else{ ?>
			<div class="box-header"></div>
			<?php } ?>
			<div class="box-body">
				<div class="form-group">
					<label for="eval_date" class="col-sm-2 control-label">วันที่</label>
					<div class="col-sm-4">
						<?php 
                    if($fields['eval_date']!=""){ 
                       echo $fields['eval_date'];
                      }else{ ?>
						<input type="text" class="form-control datepicker" id="eval_date" name="eval_date" data-provide="datepicker"
						 data-date-language="th-th" placeholder="วันที่" value="<?php echo $fields['eval_date'];?>">
						<? } ?>
					</div>
				</div>

				<div class="form-group">
					<label for="gender" class="col-sm-2 control-label">เพศ</label>
					<div class="col-sm-4">
						<input type="radio" id="gender" name="gender" value="male" <?php if($fields['gender']="male" ){ echo
						 "checked=checked" ; } ?>> ชาย
						<input type="radio" id="gender" name="gender" value="female" <?php if($fields['gender']="female" ){ echo
						 "checked=checked" ; } ?>> หญิง

					</div>
				</div>

				<div class="form-group">
					<label for="age" class="col-sm-2 control-label">อายุ</label>
					<div class="col-sm-4">
						<?php 
                    if($fields['age']!=""){ 
                       echo $fields['age'];
                   }else{ ?>
						<select class="form-control select2" id="ddl_car_state" name="age">
							<option selected="">อายุ</option>
							<option value="<20" <?php if($fields['age']=="<20" ){ echo "selected" ; } ?>> น้อยกว่า20 </option>
							<option value="21-25" <?php if($fields['age']=="21-25" ){ echo "selected" ; } ?>>21-25</option>
							<option value="26-30" <?php if($fields['age']=="26-30" ){ echo "selected" ; } ?>>26-30</option>
							<option value="31-35" <?php if($fields['age']=="31-35" ){ echo "selected" ; } ?>>31-35</option>
							<option value="36-40" <?php if($fields['age']=="36-40" ){ echo "selected" ; } ?>>36-40</option>
							<option value="41-45" <?php if($fields['age']=="41-45" ){ echo "selected" ; } ?>>41-45</option>
							<option value="46-50" <?php if($fields['age']=="46-50" ){ echo "selected" ; } ?>>46-50</option>
							<option value=">50" <?php if($fields['age']=="21-35" ){ echo "selected" ; } ?>>มากกว่า50</option>
						</select>
						<?php } ?>
					</div>
				</div>
				<div class="form-group">
					<label for="personal" class="col-sm-2 control-label">สถานะ</label>
					<div class="col-sm-4">
						<?php 
                        if($fields['personal_name']!=""){ 
                        echo $fields['personal_name'];
                   
                     }else{ ?>
						<select class="form-control select2" id="ddl_car_state" name="personal_id">
							<option value="">สถานะ</option>
							<?php foreach ($personals as $key => $value) {?>
							<option value="<?php echo $value['id']; ?>" <?php if($value['id']==$fields['personal_id']){ echo
							 "selected=selected" ; } ?>>
								<?php echo $value['name']; ?>
							</option>
							<?php } ?>
						</select>
						<?php } ?>
					</div>
				</div>
				<div class="form-group">
					<label for="faculty" class="col-sm-2 control-label">สังกัด</label>
					<div class="col-sm-4">
						<?php 
                        if($fields['faculty_name']!=""){ 
                        echo $fields['faculty_name'];
                        }else{ ?>
						<select class="form-control select2" id="ddl_car_state" name="department_id">
							<option value="">สังกัด</option>
							<?php foreach ($faculty as $key => $value) {?>
							<option value="<?php echo $value['id']; ?>" <?php if($value['id']==$fields['department_id']){ echo
							 "selected=selected" ; } ?>>
								<?php echo $value['name']; ?>
							</option>
							<?php } ?>
						</select>
						<?php } ?>
					</div>
				</div>


				<div class="form-group">
					<label for="service" class="col-sm-2 control-label"></label>
					<div class="col-sm-9">
						<h4><label for="service" class="ccol-sm-6 control-label">ภารกิจ
								กลุ่มงานความต้องการที่ขอใช้บริการกองป้องกันและรักษาความปลอดภัย *</label></h4>
						<div class="col-lg-8 col-md-10 ml-auto mr-auto">
							<?php
                                if(count($service_array)>0){
                    ?>
							<table class="table">
								<tbody>
									<?php foreach($service_array as $key => $value){
                                echo "<tr>";
                                echo "<td>";
                                echo $value['service_name'];
                                echo "</td>";
                                echo "</tr>";
                            }
                            ?>
								</tbody>
							</table>
							<?php
                                }else{
                                ?>
							<table class="table">

								<tbody>
									<?php foreach ($service as $key => $value) {?>
									<tr>
										<td class="text-center">
											<input class="form-check-input" type="checkbox" value="<?php echo $value['id']; ?> " name="service[]">
										</td>
										<td>
											<?php echo $value['name']; ?>
										</td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
							<?php } //else;?>
						</div>
					</div>
				</div>


				<div class="form-group">
					<label for="evaluation" class="col-sm-2 control-label"></label>
					<div class="col-sm-9">
						<h4><label for="evaluation" class="control-label">ความพึงพอใจของผู้ขอใช้บริการกองป้องกันและรักษาความปลอดภัย
							</label></h4>
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
										<td><input type="radio" id="performance" name="performance" value="5" <?php if($fields['performance']=="5" ){
											 echo "checked=checked" ; } ?>> </td>
										<td><input type="radio" id="performance" name="performance" value="4" <?php if($fields['performance']=="4" ){
											 echo "checked=checked" ; } ?> > </td>
										<td><input type="radio" id="performance" name="performance" value="3" <?php if($fields['performance']=="3" ){
											 echo "checked=checked" ; } ?> > </td>
										<td><input type="radio" id="performance" name="performance" value="2" <?php if($fields['performance']=="2" ){
											 echo "checked=checked" ; } ?> > </td>
										<td><input type="radio" id="performance" name="performance" value="1" <?php if($fields['performance']=="1" ){
											 echo "checked=checked" ; } ?> > </td>
									</tr>
									<tr>
										<td>สำเร็จลุล่วง บรรลุตามวัตถุประสงค์</td>
										<td><input type="radio" id="success" name="success" value="5" <?php if($fields['success']=="5" ){ echo
											 "checked=checked" ; } ?>> </td>
										<td><input type="radio" id="success" name="success" value="4" <?php if($fields['success']=="4" ){ echo
											 "checked=checked" ; } ?>> </td>
										<td><input type="radio" id="success" name="success" value="3" <?php if($fields['success']=="3" ){ echo
											 "checked=checked" ; } ?>> </td>
										<td><input type="radio" id="success" name="success" value="2" <?php if($fields['success']=="2" ){ echo
											 "checked=checked" ; } ?>> </td>
										<td><input type="radio" id="success" name="success" value="1" <?php if($fields['success']=="1" ){ echo
											 "checked=checked" ; } ?>> </td>
									</tr>
									<tr>
										<td>รวดเร็ว ตรงตามเวลาที่กำหนด</td>
										<td><input type="radio" id="timeline" name="timeline" value="5" <?php if($fields['timeline']=="5" ){ echo
											 "checked=checked" ; } ?>> </td>
										<td><input type="radio" id="timeline" name="timeline" value="4" <?php if($fields['timeline']=="4" ){ echo
											 "checked=checked" ; } ?>> </td>
										<td><input type="radio" id="timeline" name="timeline" value="3" <?php if($fields['timeline']=="3" ){ echo
											 "checked=checked" ; } ?>> </td>
										<td><input type="radio" id="timeline" name="timeline" value="2" <?php if($fields['timeline']=="2" ){ echo
											 "checked=checked" ; } ?>> </td>
										<td><input type="radio" id="timeline" name="timeline" value="1" <?php if($fields['timeline']=="1" ){ echo
											 "checked=checked" ; } ?>> </td>
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
										<td><input type="radio" id="service_clear" name="service_clear" value="5" <?php if($fields['service_clear']=="5"
											 ){ echo "checked=checked" ; } ?>> </td>
										<td><input type="radio" id="service_clear" name="service_clear" value="4" <?php if($fields['service_clear']=="4"
											 ){ echo "checked=checked" ; } ?>> </td>
										<td><input type="radio" id="service_clear" name="service_clear" value="3" <?php if($fields['service_clear']=="3"
											 ){ echo "checked=checked" ; } ?>> </td>
										<td><input type="radio" id="service_clear" name="service_clear" value="2" <?php if($fields['service_clear']=="2"
											 ){ echo "checked=checked" ; } ?>> </td>
										<td><input type="radio" id="service_clear" name="service_clear" value="1" <?php if($fields['service_clear']=="1"
											 ){ echo "checked=checked" ; } ?>> </td>
									</tr>
									<tr>
										<td>วัสดุ อุปกรณ์ เครื่องมือ ในการให้บริการครบครัน</td>
										<td><input type="radio" id="materials" name="materials" value="5" <?php if($fields['materials']=="5" ){ echo
											 "checked=checked" ; } ?>> </td>
										<td><input type="radio" id="materials" name="materials" value="4" <?php if($fields['materials']=="4" ){ echo
											 "checked=checked" ; } ?>> </td>
										<td><input type="radio" id="materials" name="materials" value="3" <?php if($fields['materials']=="3" ){ echo
											 "checked=checked" ; } ?>> </td>
										<td><input type="radio" id="materials" name="materials" value="2" <?php if($fields['materials']=="2" ){ echo
											 "checked=checked" ; } ?>> </td>
										<td><input type="radio" id="materials" name="materials" value="1" <?php if($fields['materials']=="1" ){ echo
											 "checked=checked" ; } ?>> </td>
									</tr>
									<tr>
										<td>การให้บริการกริยา วาจา ที่เป็นมิตร</td>
										<td><input type="radio" id="servicemind" name="servicemind" value="5" <?php if($fields['servicemind']=="5" ){
											 echo "checked=checked" ; } ?>> </td>
										<td><input type="radio" id="servicemind" name="servicemind" value="4" <?php if($fields['servicemind']=="4" ){
											 echo "checked=checked" ; } ?>> </td>
										<td><input type="radio" id="servicemind" name="servicemind" value="3" <?php if($fields['servicemind']=="3" ){
											 echo "checked=checked" ; } ?>> </td>
										<td><input type="radio" id="servicemind" name="servicemind" value="2" <?php if($fields['servicemind']=="2" ){
											 echo "checked=checked" ; } ?>> </td>
										<td><input type="radio" id="servicemind" name="servicemind" value="1" <?php if($fields['servicemind']=="1" ){
											 echo "checked=checked" ; } ?>> </td>
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
										<td><input type="radio" id="communication" name="communication" value="5" <?php if($fields['communication']=="5"
											 ){ echo "checked=checked" ; } ?>> </td>
										<td><input type="radio" id="communication" name="communication" value="4" <?php if($fields['communication']=="4"
											 ){ echo "checked=checked" ; } ?>> </td>
										<td><input type="radio" id="communication" name="communication" value="3" <?php if($fields['communication']=="3"
											 ){ echo "checked=checked" ; } ?>> </td>
										<td><input type="radio" id="communication" name="communication" value="2" <?php if($fields['communication']=="2"
											 ){ echo "checked=checked" ; } ?>> </td>
										<td><input type="radio" id="communication" name="communication" value="1" <?php if($fields['communication']=="1"
											 ){ echo "checked=checked" ; } ?>> </td>
									</tr>
									<tr>
										<td>ความรอบรู้ทักษะ องค์ความรู้และการแนะนำให้ทราบถึงการใช้บริการด้านการรักษาความปลอดภัยและการจราจร</td>
										<td><input type="radio" id="knowlage" name="knowlage" value="5" <?php if($fields['knowlage']=="5" ){ echo
											 "checked=checked" ; } ?>> </td>
										<td><input type="radio" id="knowlage" name="knowlage" value="4" <?php if($fields['knowlage']=="4" ){ echo
											 "checked=checked" ; } ?>> </td>
										<td><input type="radio" id="knowlage" name="knowlage" value="3" <?php if($fields['knowlage']=="3" ){ echo
											 "checked=checked" ; } ?>> </td>
										<td><input type="radio" id="knowlage" name="knowlage" value="2" <?php if($fields['knowlage']=="2" ){ echo
											 "checked=checked" ; } ?>> </td>
										<td><input type="radio" id="knowlage" name="knowlage" value="1" <?php if($fields['knowlage']=="1" ){ echo
											 "checked=checked" ; } ?>> </td>
									</tr>
									<tr>
										<td>การรับฟัง ปัญหา ข้อซักถาม และการแสดงความคิดเห็นต่าง ๆ ต่อการใช้บริการด้านการรักษาความปลอดภัย มข.
											โดยภาพรวม</td>
										<td><input type="radio" id="questions" name="questions" value="5" <?php if($fields['questions']=="5" ){ echo
											 "checked=checked" ; } ?>> </td>
										<td><input type="radio" id="questions" name="questions" value="4" <?php if($fields['questions']=="4" ){ echo
											 "checked=checked" ; } ?>> </td>
										<td><input type="radio" id="questions" name="questions" value="3" <?php if($fields['questions']=="3" ){ echo
											 "checked=checked" ; } ?>> </td>
										<td><input type="radio" id="questions" name="questions" value="2" <?php if($fields['questions']=="2" ){ echo
											 "checked=checked" ; } ?>> </td>
										<td><input type="radio" id="questions" name="questions" value="1" <?php if($fields['questions']=="1" ){ echo
											 "checked=checked" ; } ?>> </td>
									</tr>
									<tr>
										<td>การให้คำแนะนำ เสนอแนวทาง การแก้ไขปัญหาและติดตามความคืบหน้าจากการขอใช้บริกา</td>
										<td><input type="radio" id="followup" name="followup" value="5" <?php if($fields['followup']=="5" ){ echo
											 "checked=checked" ; } ?>> </td>
										<td><input type="radio" id="followup" name="followup" value="4" <?php if($fields['followup']=="4" ){ echo
											 "checked=checked" ; } ?>> </td>
										<td><input type="radio" id="followup" name="followup" value="3" <?php if($fields['followup']=="3" ){ echo
											 "checked=checked" ; } ?>> </td>
										<td><input type="radio" id="followup" name="followup" value="2" <?php if($fields['followup']=="2" ){ echo
											 "checked=checked" ; } ?>> </td>
										<td><input type="radio" id="followup" name="followup" value="1" <?php if($fields['followup']=="1" ){ echo
											 "checked=checked" ; } ?>> </td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="comment" class="col-sm-2 control-label">ข้อเสนอแนะ</label>
					<div class="col-sm-4">
						<?php 
                        if($fields['comment']!=""){
                            echo $fields['comment'];
                        }else{
                        ?>
						<textarea class="form-control" rows="3" id="assets_loses" name="comment" placeholder="ข้อเสนอแนะ"><?php echo $fields['comment'];?></textarea>
						<?php } ?>
					</div>
				</div>
			</div>
			<?php 
           if($fields['id']!=""){
           }else{
           ?>
			<div class="box-footer">
				<input type="hidden" name="id" value="<?php echo $fields['id'];?>">
				<input type="hidden" name="status" value="active">
				<div class="row">
					<div class="col-sm-12 text-center">
						<button type="submit" class="btn btn-lg btn-block btn-success"><i class="fa fa-save"></i> บันทึกข้อมูล</button>
					</div>
				</div>
			</div>
			<?php } ?>
			</form>

		</div>

	</div>
