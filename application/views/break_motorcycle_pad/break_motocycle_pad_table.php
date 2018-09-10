<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">
				<?php echo $head_sub_topic_label; ?>
			</h3>

			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
				</button>
			</div>
		</div>

		<div class="box-body">
			<div class="row">
				<div class="col-md-12 text-right">
					<a href="<?php echo $link_go_to_form; ?>" class="btn btn-primary">
						<i class="fa fa-plus-circle"></i>
						เพิ่มข้อมูลใหม่
					</a>
				</div>
			</div>

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
					<?php foreach ($results as $key => $value)
{
    ?>
					<tr>
						<td class="text-center">
							<?php echo $value['period_time_name'];?>
						</td>
						<td class="text-center">
							<?php echo $value['date_break'].' '.$value['date_break_time_only'];?>
						</td>
						<td class="text-center">
							<?php echo $value['victim_name']; ?>
						</td>
						<td class="text-center">
							<?php echo $value['victim_department_name']; ?>
						</td>
						<td class="text-center">
							<?php echo $value['place']; ?>
						</td>
						<td class="text-center">
							<?php echo $value['assets_loses']; ?>
						</td>
						<td>
							<?php echo $value['remark']; ?>
						</td>
						<td class="text-center">
							<?php echo $value['status_name']; ?>
						</td>
						<td class="text-center">
							<a href="<?php echo $link_go_to_form . '/' . $value['id']; ?>" class="btn btn-warning">
								<i class="fa fa-pencil"></i>
							</a>
						</td>
						<td class="text-center">
							<a href="javascript:removeItem('<?php echo $value['id']; ?>', '<?php echo $link_go_to_remove; ?>')" class="btn btn-danger">
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
		</div>

		<div class="box-footer">
		</div>
	</div>

	<?php $this->load->view('dashboard_admin_bar_chart_monthly');?>
