<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">
				<?php echo $head_sub_topic_label; ?>
			</h3>
		</div>

		<div class="box-body">

			<div class="box-header"></div>

			<div class="box-body">
				<?php 
          $this->load->view('header_form_submit_data');
          $this->load->view('button_save_and_back_page_in_form');
          $this->load->view('accidents_information');
        ?>

				<input type="hidden" name="id" value="<?php echo $id; ?>">
				<input type="hidden" name="status" value="active">
				<?php $this->load->view('button_save_and_back_page_in_form');?>
				</form>
			</div>

			<div class="box-footer"></div>


		</div>

	</div>
	<?php
    if ($id !='') {
      $this->load->view('accidents_vehicles_table_information');
      $this->load->view('accidents_peoples_table_information');
    }
  ?>
