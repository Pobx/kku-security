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
			<div class="box-header">
				<?php $this->load->view('button_save_and_back_page_in_form');?>
			</div>
			<div class="box-body">
				<?php 
          $this->load->view('vehicles_forget_key_owner_assets_information');
          //$this->load->view('vehicles_forget_key_detective_information');
        ?>

			</div>

			<div class="box-footer">
				<input type="hidden" name="id" value="<?php echo $id; ?>">
				<input type="hidden" name="status" value="active">
				<?php $this->load->view('button_save_and_back_page_in_form');?>
			</div>
			</form>

		</div>

	</div>

	<script>
		$(document).ready(function () {
			var people_type = '<?php echo $people_type;?>';
			var owner_assets_department = '<?php echo $owner_assets_department;?>';
			var car_state = '<?php echo $car_state;?>';
			var state_comment = '<?php echo $state_comment;?>';

			if (people_type == 'student' || people_type == 'staff') {
				$('#div_owner_assets_department').show();
				$('#owner_assets_department').val(owner_assets_department);
			} else {
				$('#div_owner_assets_department').hide();
				$('#owner_assets_department').val('');
			}


			$('input[name="people_type"]').on('ifClicked', function (event) {
				// alert("You clicked " + this.value);
				if (this.value == 'people_outside') {
					$('#owner_assets_department').val('');
					$('#div_owner_assets_department').hide();
				} else {
					// $('#owner_assets_department').val('');
					$('#div_owner_assets_department').show();
				}
			});


			if (car_state == 'other') {
				$('#div_state_comment').show();
				$('#state_comment').val(state_comment);
			} else {
				$('#div_state_comment').hide();
				$('#car_state').val('');
			}


			$("#car_state").change(function () {

				if ($('#car_state').val() == 'other') {
					$('#state_comment').val('');
					$('#div_state_comment').show();
				} else {
					$('#div_state_comment').hide();
					$('#state_comment').val('');
				}

			});

			$('[name=car_state]').val(car_state);
		});

	</script>
