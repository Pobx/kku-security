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
			<div class="box-header"></div>
			<div class="box-body">
				<?php 
          $this->load->view('break_motorcycle_pad/break_motorcycle_pad_details_information');
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
			var victim_department_name = '<?php echo $victim_department_name;?>';

			if (people_type == 'student') {
				$('#div_victim_department_name').show();
				$('#label_victim_department_name').html('คณะ');
				$('#victim_department_name').val(victim_department_name).attr("placeholder", "คณะ");
			} else if (people_type == 'staff') {
				$('#div_victim_department_name').show();
				$('#label_victim_department_name').html('สังกัดหน่วยงาน');
				$('#victim_department_name').val(victim_department_name).attr("placeholder", "สังกัดหน่วยงาน");
			} else {
				$('#div_victim_department_name').hide();
				$('#victim_department_name').val('');
			}

			$('input[name="people_type"]').on('ifClicked', function (event) {
				if (this.value == 'people_outside') {
					$('#victim_department_name').val('');
					$('#div_victim_department_name').hide();
				} else {
					if (this.value == 'student') {
						console.log(this.value)
						$('#victim_department_name').val('').attr("placeholder", "คณะ");
						$('#label_victim_department_name').html('คณะ');
					} else if (this.value == 'staff') {
						$('#victim_department_name').val('').attr("placeholder", "สังกัดหน่วยงาน");
						$('#label_victim_department_name').html('สังกัดหน่วยงาน');
					}
					$('#div_victim_department_name').show();
				}
			});

		});

	</script>
