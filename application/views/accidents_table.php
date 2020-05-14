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
						<?php foreach ($header_columns as $key => $value)
{
    ?>
						<th>
							<?php echo $value; ?>
						</th>
						<?php }?>
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
								<?php echo $value['accident_place_name']; ?>
							</td>
							<td class="text-center">
								<?php echo $value['count_car']; ?>
							</td>
							<td class="text-center">
								<?php echo $value['count_motocycles']; ?>
							</td>
					
							<td class="text-center">
								<?php echo $value['count_injury']; ?>
							</td>
							<td class="text-center">
								<?php echo $value['count_dead']; ?>
							</td>

							
							<td class="text-center">
								<?php echo $value['count_officer']; ?>
							</td>
							<td class="text-center">
								<?php echo $value['count_student']; ?>
							</td>
							<td class="text-center">
								<?php echo $value['count_people_outside']; ?>
							</td>

							<td class="text-center">
							<a  href="javascript:void(0)" class="btn btn-info" onclick="get_accidents_cause(<?=$value['id'];?>)"><i class="fa fa-eye"></i></a>

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
					
				</table>
			</div>

		</div>
		<div class="box-footer">
		</div>
	</div>
	<div id="modal">
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
			aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary">Save changes</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php $this->load->view('dashboard_admin_bar_chart_monthly');?>

<script>
	function get_accidents_cause(acc_id){
		$.get( "accidents/get_accidents_cause/"+acc_id )
			.done(function( data ) {
				// console.log(data)
				$(".modal-body").html(data);
				
			});		
			
				$('#exampleModal').modal();


	//  $('#exampleModal').removeData('modal');
	}
</script>
