<div class="box box-widget widget-user">
	<div class="widget-user-header bg-aqua-active">
		<h3 class="widget-user-username">สถิติการลืมกุญแจ</h3>
		<h5 class="widget-user-desc">
			<span>
				<?php echo $year_th;?></span>
		</h5>
	</div>
	<div class="widget-user-image">
		<span class="info-box-icon" style="border-radius:50%; background:#ffffff; color:#000000">
			<i class="fa fa-key"></i></span>
	</div>
	<div class="box-footer">
		<div class="row">
			<div class="col-sm-4 border-right">
				<div class="description-block">
					<h5 class="description-header">
						<?php echo $count_vehicles_forget_key;?>
					</h5>
					<span class="description-text">ครั้ง</span>
					<div class=" no-padding">
						<br><br><br>
					</div>
				</div>
			</div>
			<div class="col-sm-4 border-right">
				<div class="">
					<span class="description-text">ช่วงเวลาเกิดเหตุ</span>
					<div class="box-footer no-padding">
						<ul class="nav nav-stacked">
							<li><a href="#">เช้า <span class="pull-right badge bg-blue">
										<?php echo $count_vehicles_forget_key_morning;?></span></a></li>
							<li><a href="#">บ่าย <span class="pull-right badge bg-aqua">
										<?php echo $count_vehicles_forget_key_afternoon;?></span></a></li>
							<li><a href="#">ดึก <span class="pull-right badge bg-red">
										<?php echo $count_vehicles_forget_key_night;?></span></a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="">
					<span class="description-text">ประเภทบุคคล</span>
					<div class="box-footer no-padding">
						<ul class="nav nav-stacked">
							<li><a href="#">นักศึกษา <span class="pull-right badge bg-blue">
										<?php echo $count_vehicles_forget_key_students;?></span></a></li>
							<li><a href="#">บุคลากร <span class="pull-right badge bg-aqua">
										<?php echo $count_vehicles_forget_key_officer;?></span></a></li>
							<li><a href="#">คนภายนอก <span class="pull-right badge bg-red">
										<?php echo $count_vehicles_forget_key_people_outside;?></span></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
