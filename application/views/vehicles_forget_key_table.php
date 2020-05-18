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
						<td class="text-center">
							<?php echo $value['status_name']; ?>
						</td>
						<td class="text-center">
							<a  href="javascript:void(0)" class="btn btn-info" onclick="get_forgetkeys_detail(<?=$value['id'];?>)"><i class="fa fa-eye"></i></a>

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

		<div class="box-footer">
		</div>
	</div>
	<div id="modal">
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
			aria-hidden="true">
			<div class="modal-dialog bd-example-modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">ข้อมูลเพิ่มเติม
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
						</h5>
						
					</div>
					<div class="modal-body">

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php $this->load->view('dashboard_admin_bar_chart_monthly');?>

<script>
	function get_forgetkeys_detail(fgk_id){
		$.get( "vehicles_forget_key/get_forgetkeys_detail/"+fgk_id )
			.done(function( data ) {
				 //console.log(data)
				$(".modal-body").html(data);
				
			});		
			
				$('#exampleModal').modal();


	//  $('#exampleModal').removeData('modal');
	}
</script>

