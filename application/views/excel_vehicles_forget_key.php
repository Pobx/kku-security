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
							<?php echo $value['date_forget_key'];?>
						</td>
						<td class="text-center">
							<?php echo $value['owner_assets_name']; ?>
						</td>
						<td class="text-center">
							<?php echo $value['owner_assets_department']; ?>
						</td>
						<td class="text-center">
							<?php echo $value['owner_assets_age']; ?>
						</td>
						<td class="text-center">
							<?php echo $value['owner_assets_phone']; ?>
						</td>
						<td>
							<?php echo $value['owner_assets_forget_key_place']; ?>
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
