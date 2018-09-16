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
		$('#man_type').change(function () {
			console.log('dfdf')
			var mantype = $(this).val();
			console.log(mantype)
			if (mantype == "student") {
				$('#student_info').attr('class', 'show');
				$('#officer_info').attr('class', 'hide');
				$('#external_person_info').attr('class', 'hide');

				$('#officer_card_id').val("");
				$('#officer_office').val("");
				$('#ex_person_address').val("");
				$('#ex_person_card_id').val("")

			} else if (mantype == "officer") {
				$('#student_info').attr('class', 'hide');
				$('#officer_info').attr('class', 'show');
				$('#external_person_info').attr('class', 'hide');

				$('#student_code').val("");
				$('#student_faculty').val("");
				$('#ex_person_address').val("");
				$('#ex_person_card_id').val("")
			} else if (mantype == "external_person") {
				$('#student_info').attr('class', 'hide');
				$('#officer_info').attr('class', 'hide');
				$('#external_person_info').attr('class', 'show');

				$('#student_code').val("");
				$('#student_faculty').val("");
				('#officer_card_id').val("");
				$('#officer_office').val("");
			}
		});

	</script>
