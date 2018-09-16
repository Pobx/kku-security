<!-- <div class="box box-primary"> -->
<div class="box-header bg-yellow">
	<h3 class="box-title">สรุปเหตุการณ์ประจำ
		<?php echo $year_th;?>
	</h3>
	<div class="box-tools pull-right">
		<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
			<i class="fa fa-minus"></i></button>
	</div>

</div>

<div class="box-body table-responsive" style="background:#d2d6de">
	<table class="table table-hover">
		<tr>
			<th class="text-center">เหตุการณ์(ครั้ง)</th>
			<th class="text-center">ทั้งหมด</th>
			<th class="text-center">เจ้าหน้าที่</th>
			<th class="text-center">นักศึกษา</th>
			<th class="text-center">บุคคลภายใน</th>
			<th class="text-center">บุคคลภายนอก</th>
		</tr>
		<tr>
			<td class="text-left text-red"><i class="fa fa-motorcycle"></i> สถิติอุบัติเหตุ</td>
			<td class="text-center">
				<?php echo $count_accidents;?>
			</td>
			<td class="text-center">
				<?php echo $count_accidents_officer;?>
			</td>
			<td class="text-center">
				<?php echo $count_accidents_students;?>
			</td>
			<td class="text-center">
				<?php echo $count_accidents_people_inside;?>
			</td>
			<td class="text-center">0</td>
		</tr>

		<tr>
			<td class="text-left text-green"><i class="fa fa-home"></i> โครงการฝากบ้าน</td>
			<td class="text-center">
				<?php echo $count_security_home;?>
			</td>
			<td class="text-center">0</td>
			<td class="text-center">0</td>
			<td class="text-center">0</td>
			<td class="text-center">0</td>
		</tr>

		<tr>
			<td class="text-left text-aqua"><i class="fa fa-key"></i> สถิติการลืมกุญแจ</td>
			<td class="text-center">
				<?php echo $count_vehicles_forget_key;?>
			</td>
			<td class="text-center">
				<?php echo $count_vehicles_forget_key_officer;?>
			</td>
			<td class="text-center">
				<?php echo $count_vehicles_forget_key_students;?>
			</td>
			<td class="text-center">
				0
			</td>
			<td class="text-center">
				<?php echo $count_vehicles_forget_key_people_outside;?>
			</td>

		</tr>

		<tr>
			<td class="text-left text-yellow"><i class="fa fa-home"></i> สถิติเหตุทรัพย์งัดที่พักอาศัย</td>
			<td class="text-center">
				<?php echo $count_break_homes;?>
			</td>
			<td class="text-center">0</td>
			<td class="text-center">0</td>
			<td class="text-center">0</td>
			<td class="text-center">0</td>
		</tr>

		<tr>
			<td class="text-left text-orange"><i class="fa fa-motorcycle"></i> สถิติงัดเบาะรถจักยานยนต์</td>
			<td class="text-center">
				<?php echo $count_break_motorcycle_pad;?>
			</td>
			<td class="text-center">
				<?php echo $count_break_motorcycle_pad_officer;?>
			</td>
			<td class="text-center">
				<?php echo $count_break_motorcycle_pad_students;?>
			</td>
			<td class="text-center">0</td>
			<td class="text-center">
				<?php echo $count_break_motorcycle_pad_people_outside;?>
			</td>
		</tr>

		<tr>
			<td class="text-left text-blue"><i class="fa fa-motorcycle"></i> สถิติไม่สวมหมวกนิรภัย</td>
			<td class="text-center">
				<?php echo $count_student_do_not_wear_helmet;?>
			</td>
			<td class="text-center">
				<?php echo $count_student_do_not_wear_helmet_officer;?>
			</td>
			<td class="text-center">
				<?php echo $count_student_do_not_wear_helmet_students;?>
			</td>
			<td class="text-center">0</td>
			<td class="text-center">
				<?php echo $count_student_do_not_wear_helmet_people_outside;?>
			</td>
		</tr>

	</table>
</div>
<!-- </div> -->
