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
				<?php echo $value['request_date']; ?>
			</td>
			<td class="text-center">
				<?php echo $value['victim_name']; ?>
			</td>
			<td class="text-center">
				<?php echo $value['gender_name']; ?>
			</td>
			<td class="text-center">
				<?php echo $value['people_type_name']; ?>
			</td>
			<td class="text-center">
				<?php echo $value['cctv_event_name']; ?>
			</td>
			<td class="text-center">
				<?php echo $value['area']; ?>
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
