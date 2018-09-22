<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">
				<?php echo $head_sub_topic_label; ?>
			</h3>
		</div>

		<div class="box-body">
			<?php $this->load->view('header_form_submit_data');?>

			<div class="box-body">
				<?php $this->load->view('users_details_information');?>

			</div>

			<div class="box-footer">
				<input type="hidden" name="id" value="<?php echo $id; ?>">
				<?php $this->load->view('button_save_and_back_page_in_form');?>
			</div>
			</form>

		</div>

	</div>

	<script>
		$(document).ready(function () {

			// $("#e1").select2();
			var roles = '<?php echo $roles; ?>';
			$('[name=roles]').val(roles);
		});

	</script>
