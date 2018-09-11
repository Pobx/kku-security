<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">
				<?php echo $head_sub_topic_label;?>
			</h3>

			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
				</button>
			</div>
		</div>

		<div class="box-body">
			<div class="row">
				<div class="col-md-12 text-right">
					<a href="<?php echo $link_go_to_form;?>" class="btn btn-primary">
						<i class="fa fa-plus-circle"></i>
						เพิ่มข้อมูลใหม่
					</a>
				</div>
			</div>

			<br />

			<table class="table table-bordered table-striped mydataTable">
				<thead>
					<tr>
						<?php foreach ($header_columns as $key => $value) {?>
						<th class="text-center">
							<?php echo $value;?>
						</th>
						<?php }?>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($results as $key => $value) {?>
					<tr>
						<td class="text-center">
							<?php if ($value['eval_date'] !='' ) { echo $value['eval_date']; }?>
						</td>
						<td class="text-center">
							<?php echo $value['gender'];?>
						</td>
						<td class="text-center">
							<?php echo $value['age'];?>
						</td>
						<td class="text-center">
							<?php echo $value['personalname'];?>
						</td>
						<td class="text-center">
							<?php echo $value['facultyname'];?>
						</td>
						<td class="text-center">
							<?php echo $value['comment'];?>
						</td>
						
					
						<td class="text-center">
							<a href="<?php echo $link_go_to_form.'/'.$value['id'];?>" class="btn btn-warning">
								<i class="fa fa-eye"></i>
							</a>
						</td>
						<td class="text-center">
							<a href="javascript:removeItem('<?php echo $value['id'];?>', '<?php echo $link_go_to_remove;?>')" class="btn btn-danger">
								<i class="fa fa-trash-o"></i>
							</a>
						</td>

					</tr>
					<?php }?>
				</tbody>
				<tfoot>
					<?php foreach ($header_columns as $key => $value) {?>
					<th class="text-center">
						
					</th>
					<?php }?>
				</tfoot>
			</table>
		</div>

		<div class="box-footer">
		</div>
	</div>

