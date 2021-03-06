<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">
			<?php echo $head_sub_topic_label.' ('.$header_sub_topic_label_detective.')'; ?>
		</h3>
		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
		</div>
	</div>

	<div class="box-body">

		<div class="box-header"></div>

		<div class="box-body">
			<div class="row">
				<div class="col-md-12 text-right">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
						<i class="fa fa-plus-circle"></i>
						เพิ่มข้อมูลใหม่
					</button>
				</div>
			</div>

			<br />

			<table class="table table-bordered table-striped mydataTable">
				<thead>
					<tr>
						<?php foreach ($header_columns_detective as $key => $value)
{
    ?>
						<th class="text-center">
							<?php echo $value; ?>
						</th>
						<?php }?>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($vehicles_forget_key_detective as $key => $value)
{
    ?>
					<tr>
						<td class="text-center">
							<?php echo $value['name']; ?>
						</td>

						<td class="text-center">
							<?php echo $value['department_name']; ?>
						</td>
						<td class="text-center">
							<?php echo $value['remark']; ?>
						</td>

						<td class="text-center">
							<a href="javascript:removeItem('<?php echo $value['id']; ?>', '<?php echo $link_go_to_detective_remove; ?>', 'main_form')"
							class="btn btn-danger">
								<i class="fa fa-trash-o"></i>
							</a>
						</td>

					</tr>
					<?php }?>
				</tbody>
				<tfoot>
					<?php foreach ($header_columns_detective as $key => $value)
{
    ?>
					<th class="text-center">
						<?php echo $value; ?>
					</th>
					<?php }?>
				</tfoot>
			</table>

		</div>

		<div class="box-footer"></div>


	</div>

</div>
