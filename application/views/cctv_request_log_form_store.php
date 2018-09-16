<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">
				<?php echo $head_sub_topic_label; ?>
			</h3>
		</div>

		<div class="box-body">

			<!-- <form class="form-horizontal form_submit_data"> -->
			<?php $this->load->view('header_form_submit_data_multipart');?>


			<div class="box-body">
				<?php
          $this->load->view('cctv_request_information');
        ?>

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
			var cctv_event_id = '<?php echo $cctv_event_id;?>';
			var operation_status = '<?php echo $operation_status;?>';
			$('[name=cctv_event_id]').val(cctv_event_id);
			$('#div_other_textbox').hide();

			if (operation_status == 'other') {
				$('#div_other_textbox').show();
			}

			$('input[name="operation_status"]').on('ifClicked', function () {
				operation_status = this.value;
				console.log(operation_status);
				$('[name=operation_status_note]').val('');
				if (operation_status == 'other') {
					$('#div_other_textbox').show();
				} else {
					$('#div_other_textbox').hide();
				}
			});

		});

	</script>
