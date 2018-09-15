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
		<?php 
    $total = 0;
    foreach ($results as $key => $value)
{
  $total += $value['results_count_accidents'];
    ?>
		<tr>
			<td>
				<?php echo ($key + 1); ?>
			</td>
			<td>
				<?php echo $value['place_name']; ?>
			</td>
			<td>
				<?php echo $value['results_count_accidents']; ?>
			</td>

		</tr>
		<?php }?>
	</tbody>
	<tfoot>
		<tr>
			<td colspan="2" align="right">รวมทั้งหมด</td>
			<td>
				<?php echo $total;?>
			</td>
		</tr>
	</tfoot>
</table>
