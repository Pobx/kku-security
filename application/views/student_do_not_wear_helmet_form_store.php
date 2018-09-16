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
          $this->load->view('student_do_not_wear_helmet_student_information');
          $this->load->view('student_do_not_wear_helmet_vehicles_information');
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
		var people_type = '<?php echo $people_type;?>';
		$('[name=people_type]').val(people_type);
		people_info(people_type);

		$('#people_type').change(function () {
			people_type = $(this).val();
			console.log(people_type);
			people_info(people_type);
			reset_people_info();
		});

		function people_info(people_type) {
			if (people_type == 'student') {
				$('#student_info').attr('class', 'show');
				$('#officer_info').attr('class', 'hide');
			} else if (people_type == 'officer' || people_type == 'people_outside') {
				$('#student_info').attr('class', 'hide');
				$('#officer_info').attr('class', 'show');
			}

		}

		function reset_people_info() {
			$('[name=people_code]').val('');
			$('[name=department_name]').val('');
		}

	</script>
