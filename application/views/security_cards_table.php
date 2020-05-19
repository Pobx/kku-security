<style>
	.round{
		border-radius: 10px 10px
	}
</style>
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
				<div class="col-md-6">จำนวน <span id="numrow">10</span> แถว</div>
				<div class="col-md-6 text-right">
					<a href="<?php echo $link_go_to_form; ?>" class="btn btn-primary">
						<i class="fa fa-plus-circle"></i>
						เพิ่มข้อมูลใหม่
					</a>
				</div>
			</div>

			<br />

			<table class="table table-bordered table-striped">
				<thead>
					<tr>
								<th>#</th>
						<?php foreach ($header_columns as $key => $value)
							  {	
    					?>
								<th class="text-center">
									<?php echo $value[0]; ?>
									<?php if(($value[1] != 'delete') && ($value[1] != 'edit')){ ?>
										<input type="text" class="form-control round" value="" name="<?php echo $value[1];?>" id="<?php echo $value[1];?>" >
									<?php } ?>
								</th>
						<?php }?>
					</tr>
				</thead>
				<tbody>
					<?php 
						$i =1;
						foreach ($results as $key => $value)
						{
    				?>
					<tr>
						<td class="text-center"><?php echo $i++; ?>
						<td class="text-center">
							<?php echo $value['numbers']; ?>
						</td>
						<td class="text-center">
							<?php echo $value['people_name']; ?>
						</td>
						<td class="text-center">
							<?php echo $value['people_position']; ?>
						</td>

						<td class="text-center">
							<?php echo $value['people_department_name']; ?>
						</td>

						<td class="text-center">
							<?php echo $value['people_phone']; ?>
						</td>

						<td class="text-center">
							<?php echo $value['car_license_plate']; ?>
						</td>

						<td class="text-center">
							<?php echo $value['car_province']; ?>
						</td>

						<td class="text-center">
							<?php echo $value['car_brand']; ?>
						</td>

						<td class="text-center">
							<?php echo $value['car_color']; ?>
						</td>

						<td class="text-center">
							<?php echo $value['issue_date']; ?>
						</td>

						<td class="text-center">
							<?php echo $value['expire_date']; ?>
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


<script>
	$("input").keyup(function(){
		let column_name = $(this).attr("name");
		let val = $(this).val();

		$.get( "security_cards/get_data_by_column", { value: val, column: column_name } )
		.done(function( data ) {
			let a =JSON.parse(data);     //เก็บ row กับ text string
			$('tbody').html(a.results);   //โครงสร้าง table 
			$('#numrow').html(a.rows)
			
		});
	})
</script>