<br />

<table class="table table-bordered table-striped mydataTable">
	<thead>
		<tr>
			<?php foreach ($header_columns as $key => $value)
{
    ?>
			<th class="text-center">
				<?php echo $value; ?>
			</th>
			<?php }?>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($peoples_results as $key => $value)
{
    ?>
		<tr>
			<td class="text-center">
				<?php echo $value['victim_type_name']; ?>
			</td>

			<td class="text-center">
				<?php echo $value['people_type_name']; ?>
			</td>
			<td class="text-center">
				<?php echo $value['injury_type_name']; ?>
			</td>
			<td class="text-center">
				<?php echo $value['people_name']; ?>
			</td>
			<td class="text-center">
				<?php echo $value['people_department_name']; ?>
			</td>

			<td class="text-center">
				<a href="<?php echo $link_go_to_peoples_form . '/' . $accident_id . '/' . $value['id']; ?>" class="btn btn-warning">
					<i class="fa fa-pencil"></i>
				</a>
			</td>
			<td class="text-center">
				<a href="javascript:removeItem('<?php echo $value['id']; ?>', '<?php echo $link_go_to_peoples_remove; ?>')" class="btn btn-danger">
					<i class="fa fa-trash-o"></i>
				</a>
			</td>

		</tr>
		<?php }?>
	</tbody>
	<tfoot>
		<?php foreach ($header_columns as $key => $value)
{
    ?>
		<th class="text-center">
			<?php echo $value; ?>
		</th>
		<?php }?>
	</tfoot>
</table>
