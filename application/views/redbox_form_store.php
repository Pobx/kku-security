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

			<div class="box-body">
				<?php 
          $this->load->view('redbox_details_information');
          //   $this->load->view('break_motorcycle_pad/break_motorcycle_pad_information');
        ?>

			</div>

			<div class="box-footer">
				<input type="hidden" name="id" value="<?php echo $id; ?>">
				<input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
				<?php 
          if ($permission !='security') {
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
