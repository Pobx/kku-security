<div class="modal fade" id="modal-default">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">
					<?php echo $head_topic_participate_label; ?>
				</h4>
			</div>
			<div class="modal-body">
				<?php 
          $this->load->view('header_form_submit_data');
          $this->load->view('accidents_peoples_information_form_store');
          $this->load->view('accidents_vehicles_information_form_store');
        ?>

				<div class="row">
					<div class="col-md-6 text-left">
						<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> ปิด</button>
					</div>

					<div class="col-md-6 text-right">
						<input type="hidden" name="id" id="id" value="">
						<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> บันทึกข้อมูล</button>
					</div>
				</div>
				</form>
			</div>
			<div class="modal-footer">
			</div>
		</div>

	</div>
</div>
