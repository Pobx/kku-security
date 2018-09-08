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
					<label for="eval_date" class="col-sm-2 control-label">วันที่</label>
					<div class="col-sm-4">
						<input type="text" class="form-control datepicker" id="eval_date" name="eval_date" data-provide="datepicker"
						data-date-language="th-th" placeholder="วันที่" value="<?php echo $eval_date;?>">
					</div>
				</div>

                <div class="form-group">
					<label for="gender" class="col-sm-2 control-label">เพศ</label>
					<div class="col-sm-4">
						<input type="radio"  id="gender" name="gender" value="male" <?php if($gender="male"){ echo "checked=checked"; } ?>> ชาย
                        <input type="radio"  id="gender" name="gender"  value="female" <?php if($gender="female"){ echo "checked=checked"; } ?>> หญิง

                    </div>
				</div>

				<div class="form-group">
					<label for="age" class="col-sm-2 control-label">อายุ</label>
					<div class="col-sm-4">
                    <select class="form-control select2" id="ddl_car_state" name="age"> 
                        <option selected="" >อายุ</option>
                        <option value="<20" <?php if($age=="<20"){ echo "selected"; } ?>> น้อยกว่า20 </option>
                        <option value="21-25"  <?php if($age=="21-25"){ echo "selected"; } ?>>21-25</option>
                        <option value="26-30" <?php if($age=="26-30"){ echo "selected"; } ?>>26-30</option>
                        <option value="31-35" <?php if($age=="31-35"){ echo "selected"; } ?>>31-35</option>
                        <option value="36-40" <?php if($age=="36-40"){ echo "selected"; } ?>>36-40</option>
                        <option value="41-45" <?php if($age=="41-45"){ echo "selected"; } ?>>41-45</option>
                        <option value="46-50" <?php if($age=="46-50"){ echo "selected"; } ?>>46-50</option>
                        <option value=">50" <?php if($age=="21-35"){ echo "selected"; } ?>>มากกว่า50</option>
                    </select>
					</div>
				</div>
                <div class="form-group">
					<label for="personal" class="col-sm-2 control-label">สถานะ</label>
					<div class="col-sm-4">
                    <select class="form-control select2" id="ddl_car_state" name="posonal_id">
                    <option value="">สถานะ</option>
                        <?php foreach ($personals as $key => $value) {?>
                            <option value="<?php echo $value['id']; ?>" <?php if($value['id']==$posonal_id){ echo "selected=selected"; } ?>><?php echo $value['name']; ?></option>
                        <?php } ?>
                    </select>
                    </div>
				</div>
                <div class="form-group">
					<label for="faculty" class="col-sm-2 control-label">สังกัด</label>
					<div class="col-sm-4">
                    <select class="form-control select2" id="ddl_car_state" name="department_id">
                    <option value="">สังกัด</option>

                        <?php foreach ($faculty as $key => $value) {?>
                            <option value="<?php echo $value['id']; ?>" <?php if($value['id']==$department_id){ echo "selected=selected"; } ?>><?php echo $value['name']; ?> </option>
                        <?php } ?>

                    </select>
                    </div>
				</div>
               
                
                <div class="form-group">
                <label for="service" class="col-sm-2 control-label"></label>
				<div class="col-sm-9">
                  <h4><label for="service" class="ccol-sm-6 control-label">ภารกิจ กลุ่มงานความต้องการที่ขอใช้บริการกองป้องกันและรักษาความปลอดภัย  *</label></h4>
                  <div class="col-lg-8 col-md-10 ml-auto mr-auto">
                        <table class="table">
                            <tbody>
                            <?php foreach ($service as $key => $value) {?>
                            <tr>
                                <td class="text-center">
                                <input class="form-check-input" type="checkbox" value="<?php echo $value['id']; ?> " name="service[]" >
                                </td>
                                <td><?php echo $value['name']; ?> </td>
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
                <h4><label for="evaluation" class="control-label">ความพึงพอใจของผู้ขอใช้บริการกองป้องกันและรักษาความปลอดภัย </label></h4>
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
                                    <td >ประสิทธิภาพและสมรรถนะการปฏิบัติหน้าที่</td>
                                    <td><input type="radio"  id="performance" name="performance" value="5" <?php if($performance=="5"){ echo "checked=checked"; } ?>> </td>
                                    <td><input type="radio"  id="performance" name="performance" value="4" <?php if($performance=="4"){ echo "checked=checked"; } ?> > </td>
                                    <td><input type="radio"  id="performance" name="performance" value="3" <?php if($performance=="3"){ echo "checked=checked"; } ?> > </td>
                                    <td><input type="radio"  id="performance" name="performance" value="2" <?php if($performance=="2"){ echo "checked=checked"; } ?> > </td>
                                    <td><input type="radio"  id="performance" name="performance" value="1" <?php if($performance=="1"){ echo "checked=checked"; } ?> > </td>
                                </tr>
                                <tr>
                                <td>สำเร็จลุล่วง บรรลุตามวัตถุประสงค์</td>
                                    <td><input type="radio"  id="success" name="success" value="5"  <?php if($success=="5"){ echo "checked=checked"; } ?>> </td>
                                    <td><input type="radio"  id="success" name="success" value="4"  <?php if($success=="4"){ echo "checked=checked"; } ?>> </td>
                                    <td><input type="radio"  id="success" name="success" value="3"  <?php if($success=="3"){ echo "checked=checked"; } ?>> </td>
                                    <td><input type="radio"  id="success" name="success" value="2"  <?php if($success=="2"){ echo "checked=checked"; } ?>> </td>
                                    <td><input type="radio"  id="success" name="success" value="1"  <?php if($success=="1"){ echo "checked=checked"; } ?>> </td>
                                </tr>
                                <tr>
                                <td>รวดเร็ว ตรงตามเวลาที่กำหนด</td>
                                    <td><input type="radio"  id="timeline" name="timeline" value="5" <?php if($timeline=="5"){ echo "checked=checked"; } ?>> </td>
                                    <td><input type="radio"  id="timeline" name="timeline" value="4" <?php if($timeline=="4"){ echo "checked=checked"; } ?>> </td>
                                    <td><input type="radio"  id="timeline" name="timeline" value="3" <?php if($timeline=="3"){ echo "checked=checked"; } ?>> </td>
                                    <td><input type="radio"  id="timeline" name="timeline" value="2" <?php if($timeline=="2"){ echo "checked=checked"; } ?>> </td>
                                    <td><input type="radio"  id="timeline" name="timeline" value="1" <?php if($timeline=="1"){ echo "checked=checked"; } ?>> </td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                 </div>
				</div>


                <div class="form-group">
                <label for="evaluation" class="col-sm-2 control-label"></label>
				<div class="col-sm-9">
                  <h5><label for="evaluation" class="control-label">การให้บริการและการจัดการ  *</label></h5>
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
                                    <td >มีขั้นตอนการให้บริการและการจัดการที่ชัดเจน</td>
                                    <td><input type="radio"  id="service_clear" name="service_clear" value="5" <?php if($service_clear=="5"){ echo "checked=checked"; } ?>> </td>
                                    <td><input type="radio"  id="service_clear" name="service_clear" value="4" <?php if($service_clear=="4"){ echo "checked=checked"; } ?>> </td>
                                    <td><input type="radio"  id="service_clear" name="service_clear" value="3" <?php if($service_clear=="3"){ echo "checked=checked"; } ?>> </td>
                                    <td><input type="radio"  id="service_clear" name="service_clear" value="2" <?php if($service_clear=="2"){ echo "checked=checked"; } ?>> </td>
                                    <td><input type="radio"  id="service_clear" name="service_clear" value="1" <?php if($service_clear=="1"){ echo "checked=checked"; } ?>> </td>
                                </tr>
                                <tr>
                                <td>วัสดุ อุปกรณ์ เครื่องมือ ในการให้บริการครบครัน</td>
                                    <td><input type="radio"  id="materials" name="materials" value="5" <?php if($materials=="5"){ echo "checked=checked"; } ?>> </td>
                                    <td><input type="radio"  id="materials" name="materials" value="4" <?php if($materials=="4"){ echo "checked=checked"; } ?>> </td>
                                    <td><input type="radio"  id="materials" name="materials" value="3" <?php if($materials=="3"){ echo "checked=checked"; } ?>> </td>
                                    <td><input type="radio"  id="materials" name="materials" value="2" <?php if($materials=="2"){ echo "checked=checked"; } ?>> </td>
                                    <td><input type="radio"  id="materials" name="materials" value="1" <?php if($materials=="1"){ echo "checked=checked"; } ?>> </td>
                                </tr>
                                <tr>
                                <td>การให้บริการกริยา วาจา ที่เป็นมิตร</td>
                                    <td><input type="radio"  id="servicemind" name="servicemind" value="5" <?php if($servicemind=="5"){ echo "checked=checked"; } ?>> </td>
                                    <td><input type="radio"  id="servicemind" name="servicemind" value="4" <?php if($servicemind=="4"){ echo "checked=checked"; } ?>> </td>
                                    <td><input type="radio"  id="servicemind" name="servicemind" value="3" <?php if($servicemind=="3"){ echo "checked=checked"; } ?>> </td>
                                    <td><input type="radio"  id="servicemind" name="servicemind" value="2" <?php if($servicemind=="2"){ echo "checked=checked"; } ?>> </td>
                                    <td><input type="radio"  id="servicemind" name="servicemind" value="1" <?php if($servicemind=="1"){ echo "checked=checked"; } ?>> </td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                 </div>
				</div>

                <div class="form-group">
                <label for="evaluation" class="col-sm-2 control-label"></label>
				<div class="col-sm-9">
                  <h5><label for="evaluation" class="control-label">เจ้าหน้าที่ฯ ผู้ดำเนินการ  *</label></h5>
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
                            <td >ความสามารถในการถ่ายทอดและการแนะนำให้ทราบถึงการใช้บริการด้านการรักษาความปลอดภัยและการจราจร</td>
                            <td><input type="radio"  id="communication" name="communication" value="5"<?php if($communication=="5"){ echo "checked=checked"; } ?>> </td>
                            <td><input type="radio"  id="communication" name="communication" value="4"<?php if($communication=="4"){ echo "checked=checked"; } ?>> </td>
                            <td><input type="radio"  id="communication" name="communication" value="3"<?php if($communication=="3"){ echo "checked=checked"; } ?>> </td>
                            <td><input type="radio"  id="communication" name="communication" value="2"<?php if($communication=="2"){ echo "checked=checked"; } ?>> </td>
                            <td><input type="radio"  id="communication" name="communication" value="1"<?php if($communication=="1"){ echo "checked=checked"; } ?>> </td>
                            </tr>
                            <tr>
                            <td>ความรอบรู้ทักษะ องค์ความรู้และการแนะนำให้ทราบถึงการใช้บริการด้านการรักษาความปลอดภัยและการจราจร</td>
                            <td><input type="radio"  id="knowlage" name="knowlage" value="5"<?php if($knowlage=="5"){ echo "checked=checked"; } ?>> </td>
                            <td><input type="radio"  id="knowlage" name="knowlage" value="4"<?php if($knowlage=="4"){ echo "checked=checked"; } ?>> </td>
                            <td><input type="radio"  id="knowlage" name="knowlage" value="3"<?php if($knowlage=="3"){ echo "checked=checked"; } ?>> </td>
                            <td><input type="radio"  id="knowlage" name="knowlage" value="2"<?php if($knowlage=="2"){ echo "checked=checked"; } ?>> </td>
                            <td><input type="radio"  id="knowlage" name="knowlage" value="1"<?php if($knowlage=="1"){ echo "checked=checked"; } ?>> </td>
                            </tr>
                            <tr>
                            <td>การรับฟัง ปัญหา ข้อซักถาม และการแสดงความคิดเห็นต่าง ๆ ต่อการใช้บริการด้านการรักษาความปลอดภัย มข. โดยภาพรวม</td>
                            <td><input type="radio"  id="questions" name="questions" value="5"<?php if($questions=="5"){ echo "checked=checked"; } ?>> </td>
                            <td><input type="radio"  id="questions" name="questions" value="4"<?php if($questions=="4"){ echo "checked=checked"; } ?>> </td>
                            <td><input type="radio"  id="questions" name="questions" value="3"<?php if($questions=="3"){ echo "checked=checked"; } ?>> </td>
                            <td><input type="radio"  id="questions" name="questions" value="2"<?php if($questions=="2"){ echo "checked=checked"; } ?>> </td>
                            <td><input type="radio"  id="questions" name="questions" value="1"<?php if($questions=="1"){ echo "checked=checked"; } ?>> </td>
                            </tr>
                            <tr>
                            <td>การให้คำแนะนำ เสนอแนวทาง การแก้ไขปัญหาและติดตามความคืบหน้าจากการขอใช้บริกา</td>
                            <td><input type="radio"  id="followup" name="followup" value="5"<?php if($followup=="5"){ echo "checked=checked"; } ?>> </td>
                            <td><input type="radio"  id="followup" name="followup" value="4"<?php if($followup=="4"){ echo "checked=checked"; } ?>> </td>
                            <td><input type="radio"  id="followup" name="followup" value="3"<?php if($followup=="3"){ echo "checked=checked"; } ?>> </td>
                            <td><input type="radio"  id="followup" name="followup" value="2"<?php if($followup=="2"){ echo "checked=checked"; } ?>> </td>
                            <td><input type="radio"  id="followup" name="followup" value="1"<?php if($followup=="1"){ echo "checked=checked"; } ?>> </td>
                            </tr>
                        </tbody>
                    </table>
                  </div>
                 </div>
				</div>
                <div class="form-group">
					<label for="comment" class="col-sm-2 control-label">ข้อเสนอแนะ</label>
					<div class="col-sm-4">
                         <textarea class="form-control" rows="3" id="assets_loses" name="comment" placeholder="ข้อเสนอแนะ"><?php echo $comment;?></textarea>
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
