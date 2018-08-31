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
			<td>
				<?php echo $value['accident_date']; ?>
			</td>
			<td>
				<?php echo $value['period_time']; ?>
			</td>
			<td>
				<?php echo $value['place']; ?>
			</td>
			<td>
				<?php echo $value['count_car']; ?>
			</td>
			<td>
				<?php echo $value['count_motocycles']; ?>
			</td>
			<td>
				<?php
foreach ($value['results_vehicles'] as $car)
    {
        echo $car['car_body'] . '<hr />';
    }
    ?>
			</td>
			<td>
				<?php echo $value['accident_cause']; ?>
			</td>
			<td>
				<?php echo $value['count_injury']; ?>
			</td>
			<td>
				<?php echo $value['count_dead']; ?>
			</td>
			<td>
				<?php
foreach ($value['results_peoples'] as $people)
    {
        echo $people['people_name'] . '<hr />';
    }
    ?>
			</td>
			<td>
				<?php
foreach ($value['results_peoples'] as $people)
    {
        echo $people['people_department_name'] . '<hr />';
    }
    ?>
			</td>
			<td>
				<?php echo $value['count_officer']; ?>
			</td>
			<td>
				<?php echo $value['count_student']; ?>
			</td>
			<td>
				<?php echo $value['count_people_inside']; ?>
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
