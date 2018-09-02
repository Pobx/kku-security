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

			<div class="table-responsive">
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
								<?php echo $value['accident_date']; ?>
							</td>
							<td class="text-center">
								<?php echo $value['period_time_name']; ?>
							</td>
							<td class="text-center">
								<?php echo $value['place']; ?>
							</td>
							<td class="text-center">
								<?php echo $value['count_car']; ?>
							</td>
							<td class="text-center">
								<?php echo $value['count_motocycles']; ?>
							</td>
							<td class="text-center">
								<?php 
                  foreach ($value['results_vehicles'] as $car) {
                    echo $car['car_body']."<hr />";
                  }
                ?>
							</td>
							<td class="text-center">
								<?php echo $value['accident_cause']; ?>
							</td>
							<td class="text-center">
								<?php echo $value['count_injury']; ?>
							</td>
							<td class="text-center">
								<?php echo $value['count_dead']; ?>
							</td>
							<td class="text-center">
								<?php 
                  foreach ($value['results_peoples'] as $people) {
                    echo $people['people_name']."<hr />";
                  }
                ?>
							</td>
							<td class="text-center">
								<?php 
                  foreach ($value['results_peoples'] as $people) {
                    echo $people['people_department_name']."<hr />";
                  }
                ?>
							</td>
							<td class="text-center">
								<?php echo $value['count_officer']; ?>
							</td>
							<td class="text-center">
								<?php echo $value['count_student']; ?>
							</td>
							<td class="text-center">
								<?php echo $value['count_people_inside']; ?>
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

		</div>

		<div class="box-footer">
		</div>
	</div>

	<?php $this->load->view('dashboard_admin_bar_chart_monthly');?>
