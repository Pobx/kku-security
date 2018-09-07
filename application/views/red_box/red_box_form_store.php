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
          $this->load->view('red_box/red_box_details_information');
          //   $this->load->view('break_motorcycle_pad/break_motorcycle_pad_information');
        ?>

			</div>

			<div class="box-footer">
				<input type="hidden" name="rbp_id" value="<?php echo $rbp_id; ?>">
				<?php $this->load->view('button_save_and_back_page_in_form');?>
			</div>
			</form>

		</div>

	</div>
