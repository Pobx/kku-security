<?php
header('Content-type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename=excel.xls');
header('Pragma: public');
header('Cache-Control: max-age=0');
set_time_limit(0);
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<table border="1">
	<thead>
		<tr>
			<th>ประจำเดือน</th>
			<th colspan="3">ช่วงเวลา</th>
			<th colspan="3">ประเภทบุคคล</th>
			<th colspan="2">ประเภทรถ</th>
			<th colspan="2">ความเสียหาย</th>
		</tr>

		<tr>
			<td>&nbsp;</td>
			<td>ผลัดเช้า</td>
			<td>ผลัดบ่าย</td>
			<td>ผลัดดึก</td>

			<td>นักศึกษา</td>
			<td>บุคลากร</td>
			<td>บุคคลภายนอก</td>

			<td>รถจักรยานยนต์</td>
			<td>รถยนต์</td>

			<td>บาดเจ็บ</td>
			<td>เสียชีวิต</td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>
				<?php echo $month_accidents;?>
			</td>

			<td>
				<?php echo $count_accidents_morning;?>
			</td>

			<td>
				<?php echo $count_accidents_afternoon;?>
			</td>

			<td>
				<?php echo $count_accidents_night;?>
			</td>

			<td>
				<?php echo $count_accidents_students;?>
			</td>

			<td>
				<?php echo $count_accidents_people_inside;?>
			</td>

			<td>
				<?php echo $count_accidents_people_outside;?>
			</td>

			<td>
				<?php echo $count_accidents_motorcycle;?>
			</td>

			<td>
				<?php echo $count_accidents_car;?>
			</td>

			<td>
				<?php echo $count_accidents_injury;?>
			</td>

			<td>
				<?php echo $count_accidents_dead;?>
			</td>
		</tr>
	</tbody>

</table>
