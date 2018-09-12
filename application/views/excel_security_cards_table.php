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
			<?php foreach ($header_columns as $key => $value)
{
    ?>
			<th>
				<?php echo $value; ?>
			</th>
			<?php }?>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($results as $key => $value)
{
    ?>
		<tr>
			<td class="text-center">
				<?php echo $value['numbers']; ?>
			</td>
			<td class="text-center">
				<?php echo $value['people_name']; ?>
			</td>
			<td class="text-center">
				<?php echo $value['people_position']; ?>
			</td>

			<td class="text-center">
				<?php echo $value['people_department_name']; ?>
			</td>

			<td class="text-center">
				<?php echo $value['people_phone']; ?>
			</td>

			<td class="text-center">
				<?php echo $value['car_license_plate']; ?>
			</td>

			<td class="text-center">
				<?php echo $value['car_province']; ?>
			</td>

			<td class="text-center">
				<?php echo $value['car_brand']; ?>
			</td>

			<td class="text-center">
				<?php echo $value['car_color']; ?>
			</td>

			<td class="text-center">
				<?php echo $value['issue_date']; ?>
			</td>

			<td class="text-center">
				<?php echo $value['expire_date']; ?>
			</td>
		</tr>
		<?php }?>
	</tbody>
	<tfoot>
		<?php foreach ($header_columns as $key => $value)
{
    ?>
		<th>
			<?php echo $value; ?>
		</th>
		<?php }?>
	</tfoot>
</table>
