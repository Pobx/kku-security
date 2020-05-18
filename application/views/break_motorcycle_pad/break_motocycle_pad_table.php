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
						<!-- here -->
						<td class="text-center">
							<a  href="javascript:void(0)" class="btn btn-info" onclick="get_break_pad_detail(<?=$value['id'];?>)"><i class="fa fa-eye"></i></a>
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
	<style>
	.hiddentext{
		display:none;
	}
	.showtext{
		display:block;
	}
	</style>
	<div id="showtext" class="hiddentext">Test Text</div>
	<button id="show-btn">This is button</button>
	<div id="modal">
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
			aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h1 class="modal-title" id="exampleModalLabel">ข้อมูลการงัดเบาะรถจักรยานยนต์</h1>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<!-- <button type="button" class="btn btn-primary">Save changes</button> -->
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php $this->load->view('dashboard_admin_bar_chart_monthly');?>
	<script>
	function get_break_pad_detail(break_pad_id){
		$.get( "break_motorcycle_pad/get_break_pad_detail/"+break_pad_id )
			.done(function( data ) {
				// console.log(JSON.parse(data))
				var res = JSON.parse(data);
				console.log(res);
				text='<div class="col-md">'+
        
        '<div class="box box-widget widget-user-2">'+
            
            '<div class="widget-user-header bg-aqua-active">'+
                '<div class="widget-user-image">'+
                    '<img class="img-circle" src="../dist/img/woman.png" alt="User Avatar">'+
                '</div>'+
                
                '<h3 class="widget-user-username">'+res[0].victim_name+'</h3>'+
                '<h5 class="widget-user-desc">'+res[0].people_type+'</h5>'+
            '</div>'+
            '<div class="box-footer no-padding">'+
                '<ul class="nav nav-stacked">'+
                    '<li>'+
                        '<h3><img class="img-circle" src="../dist/img/interface.png" width="25" alt="Lost-items Icon"> รายการของที่สูญหาย</h3>'+
                        '<div class="">'+res[0].assets_loses+'</div>'+
                    '</li>'+
                    '<li>'+
                        '<h3><img class="img-circle" src="../dist/img/letter.png" width="25" alt="Lost-items Icon"> สถานที่เกิดเหตุ</h3>'+
                        '<div class="">'+res[0].place+'</div>'+
                    '</li>'+
                    '<li>'+
                        '<h3><img class="img-circle" src="../dist/img/hour.png" width="25" alt="Lost-items Icon"> วันที่</h3>'+
                        '<div class="">'+res[0].date_break+'</div>'+
                    '</li>'+
                '</ul>'+

            '</div>'+
        '</div>'+
        
    '</div>';
				$(".modal-body").html(text);
				
			});		
			
				$('#exampleModal').modal('show');


	//  $('#exampleModal').removeData('modal');
	}
</script>
<script>
	$("#show-btn").click(function(){
		if($("#showtext").hasClass("hiddentext")){
			$("#showtext").removeClass("hiddentext");
			$("#showtext").addClass("showtext");
		}else{
			$("#showtext").removeClass("showtext");
			$("#showtext").addClass("hiddentext");
		}
		
	});
</script>
