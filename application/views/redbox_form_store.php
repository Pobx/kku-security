<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">
				<?php echo $head_sub_topic_label; ?>
			</h3>
		</div>

		<div class="box-body">
			<!-- <form class="form-horizontal form_submit_data"> -->
			<?php $this->load->view('header_form_submit_data');?>

			<div class="row">
				<div class="col-sm-12 col-md-4">
					<?php 
						$this->load->view('redbox_details_information');
					?>
				</div>
				<div class="col-sm-12 col-md-2"></div>
				<div class="col-sm-12 col-md-4">
						<div class="box box-widget widget-user-2">
						<!-- Add the bg color to the header using any of the bg-* classes -->
						<div class="widget-user-header bg-green">
						<div class="widget-user-image">
							<div style="width: 65px;
								height: auto;
								float: left;
								vertical-align: middle;
								border-radius: 50%;
								"
								>
							<h4 style="color:yellow"><?=$redbox_checked_rows." / ".$redbox_total_rows;?></h4>
							</div>
						</div>
						<!-- /.widget-user-image -->
					
						<h4 class="widget-user-username" style="font-size:20px; font-weight:bold">จุดที่ตรวจสอบแล้ว</h4>
						<h5 class="widget-user-desc"><?php echo $name ." (kku".$user_id.")"; ?></h5>
						</div>
						<div class="box-footer no-padding">
						<ul class="nav nav-stacked">
							<?php 
								foreach($checked_redbox_place as $key => $checked_place){
									$i=$key+1;
							?>
								<li><a href="#">
								<?=$checked_place['name'];?>
								 <span class="pull-right badge bg-green"><?=$i;?></span></a></li>

							<?php
								}
							?>
							</ul>
						</div>
					</div>

			</div>

			<div class="box-footer">
				<input type="hidden" name="id" value="<?php echo $id; ?>">
				<input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
				<?php 
          if ($roles !='security') {
            $this->load->view('button_save_and_back_page_in_form');
            
          }else {
          ?>

				<div class="row">
					<div class="col-sm-12 text-center">
						<button type="submit" class="btn btn-lg btn-block btn-success"><i class="fa fa-save"></i> บันทึกข้อมูล</button>
					</div>
				</div>

				<?php
          }
        ?>
		
			</div>
			
			</form>

		</div>

	</div>

	<script>
		$(document).ready(function () {

			// $("#e1").select2();
			var redbox_place_id = '<?php echo $redbox_place_id;?>';
			$('[name=redbox_place_id]').val(redbox_place_id);
		});

	</script>
