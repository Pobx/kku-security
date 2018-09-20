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
				<?php
$this->load->view('redbox_only_security_details_information');
?>

			</div>

			<div class="box-footer">
				<input type="hidden" name="id" value="">


				<div class="row">
					<div class="col-sm-12 text-center">
						<button type="submit" class="btn btn-lg btn-block btn-success"><i class="fa fa-save"></i> บันทึกข้อมูล</button>
					</div>
				</div>


			</div>
			</form>

		</div>

	</div>
