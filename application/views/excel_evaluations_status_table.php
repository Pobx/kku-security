<table border="1">
	<thead>
		<tr>
			<th>สถานะ</th>
			<th>นับจำนวน ของ สถานะ</th>
		</tr>
	</thead>
	<tbody>

		<tr>
			<td class="text-center">ข้าราชการ / พนักงาน /ลูกจ้าง</td>
			<td class="text-center">
				<?php echo $count_gov_officer; ?>
			</td>
		</tr>

		<tr>
			<td class="text-center">นักเรียน</td>
			<td class="text-center">
				<?php echo $count_student; ?>
			</td>
		</tr>

		<tr>
			<td class="text-center">นักศึกษา</td>
			<td class="text-center">
				<?php echo $count_student2; ?>
			</td>
		</tr>

		<tr>
			<td class="text-center">บุคคลทั่วไป</td>
			<td class="text-center">
				<?php echo $count_general_people; ?>
			</td>
		</tr>

		<tr>
			<td class="text-center">อาจารย์</td>
			<td class="text-center">
				<?php echo $count_teacher; ?>
			</td>
		</tr>
	</tbody>
</table>
