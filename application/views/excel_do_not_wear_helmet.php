<?php
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=excel.xls");
header("Pragma: public");
header("Cache-Control: max-age=0");
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
							<?php echo $value['inspect_date']; ?>
						</td>
						<td class="text-center">
							<?php echo $value['place']; ?>
						</td>
						<td class="text-center">
							<?php echo $value['student_name']; ?>
						</td>
						<td class="text-center">
							<?php echo $value['student_code']; ?>
						</td>
						<td class="text-center">
							<?php echo $value['id_card']; ?>
						</td>
						<td>
							<?php echo $value['department_name']; ?>
						</td>

						<td>
							<?php echo $value['car_body']; ?>
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
