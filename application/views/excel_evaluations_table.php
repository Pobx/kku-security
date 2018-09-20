<?php
// header('Content-type: application/vnd.ms-excel');
// header('Content-Disposition: attachment; filename=excel.xls');
// header('Pragma: public');
// header('Cache-Control: max-age=0');
// set_time_limit(0);
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<table border="1">
	<thead>
		<tr>
			<th>อายุ</th>
			<th>จำนวนคน</th>
		</tr>
	</thead>
	<tbody>

		<tr>
			<td class="text-center">21 - 25 ปี</td>
			<td class="text-center">
				<?php echo $count_between_21_and_25;?>
			</td>
		</tr>

		<tr>
			<td class="text-center">26 - 30 ปี</td>
			<td class="text-center">
				<?php echo $count_between_26_and_30;?>
			</td>
		</tr>

		<tr>
			<td class="text-center">31 - 35 ปี</td>
			<td class="text-center">
				<?php echo $count_between_31_and_35;?>
			</td>
		</tr>

		<tr>
			<td class="text-center">36 - 40 ปี</td>
			<td class="text-center">
				<?php echo $count_between_36_and_40;?>
			</td>
		</tr>

		<tr>
			<td class="text-center">51 ปี ขึ้นไป</td>
			<td class="text-center">
				<?php echo $count_more_than_50;?>
			</td>
		</tr>

		<tr>
			<td class="text-center">ต่ำกว่า 20 ปี</td>
			<td class="text-center">
				<?php echo $count_less_than_20;?>
			</td>
		</tr>

		<tr>
			<td class="text-center">ผลรวม</td>
			<td class="text-center">
				<?php echo ($count_less_than_20 + $count_more_than_50 + $count_between_36_and_40 + $count_between_31_and_35 + $count_between_26_and_30 + $count_between_21_and_25);?>
			</td>
		</tr>

	</tbody>
</table>
